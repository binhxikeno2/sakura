<?php

namespace App\Http\Controllers\Shop;

use App\Http\Requests\CheckOutRequest;
use App\Http\Requests\DangKyRequest;
use App\Mail\RegisteredUser;
use App\Model\Categories;
use App\Model\Comment;
use App\Model\Contact;
use App\Model\Customer_Type;
use App\Model\GiftCode;
use App\Model\News;
use App\Model\Pay;
use App\Model\Point;
use App\Model\Products;
use App\Model\Reward;
use App\Model\Slide;
use App\Model\Transaction;
use App\Model\Transaction_detail;
use App\User;
use Barryvdh\DomPDF\PDF;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class IndexController extends Controller
{
    public function __construct(Categories $categories,Products $products,Slide $slide,News $news,Contact $contact,GiftCode $giftCode,Transaction $transaction,Pay $pay,Transaction_detail $transaction_detail,User $user,Comment $comment,Point $point,Customer_Type $customer_Type,Reward $reward)
    {
        $this->Slide      = $slide;
        $this->Categories = $categories;
        $this->Products   = $products;
        $this->News       = $news;
        $this->Contact    = $contact;
        $this->GiftCode   = $giftCode;
        $this->Transaction= $transaction;
        $this->Pay        = $pay;
        $this->Transaction_detail = $transaction_detail;
        $this->User       = $user;
        $this->Comment    = $comment;
        $this->Point      = $point;
        $this->Customer_Type = $customer_Type;
        $this->Reward     = $reward;
    }

    public function index() {
        $productIndex  = $this->Products->getIndexPublic(1);
        $slide         = $this->Slide->getAll();
        $saleMax       = $this->Products->saleMax();
        $newFirst1     = $this->News->first();
        $newFirst2     = $this->News->first2($newFirst1);
        return view('shop.shop.index',compact('productIndex','slide','saleMax','newFirst1','newFirst2'));
    }
    public function cat($id) {
        $cat        = $this->Categories->getId($id);
        $objectItem = $this->Products->getDetailCat($id,1);
        return view('shop.shop.page.categories',compact('cat','objectItem'));
    }
    public function cart() {
        return view('shop.shop.page.cart');
    }
    //add cart
    public function addCart($id) {
        if (Request()->ajax()) {
            $id = Request()->get('id');
            $product = $this->Products->getProduct($id);
            Cart::add([
                'id'    => $id,
                'name'  => $product->nameproduct,
                'qty'   => 1,
                'price' => $product->price,
                'weight'=> 0,
                'options'=>[
                    'picture' => $product->picture,
                    'namecat' => $product->namecat
                ]
            ]);
            return count(Cart::content());
        }
        else {
            $product = $this->Products->getProduct($id);
            Cart::add([
                'id'    => $id,
                'name'  => $product->nameproduct,
                'qty'   => 1,
                'price' => $product->price,
                'weight'=> 0,
                'options'=>[
                    'picture' => $product->picture,
                    'namecat' => $product->namecat
                ]
            ]);
            return redirect()->route('shop.shop.cart');
        }
    }
    //update
   public function update() {
        if (Request()->ajax()) {
           $rowid= Request()->get('id');
           $qty  = Request()->get('qty');
           Cart::update($rowid, $qty);
           $arReturn = [
               'amountProduct' => number_format(str_replace(',', '', Cart::get($rowid)->subtotal())).' đ',
               'subtotal'      => number_format(str_replace(',','',Cart::subtotal(0,3))).' đ',
               'tax'           => number_format(str_replace(',','',Cart::tax(0,3))).' đ',
               'total'         => number_format(str_replace(',','',Cart::total(0,3))).' đ'
           ];
           return  json_encode($arReturn);
        }
   }
    //dell cart
    public function delCart($id) {
        Cart::remove($id);
        return redirect()->route('shop.shop.cart');
    }
    //dell cart
    public function dellAllCart() {
        Cart::destroy();
        return redirect()->route('shop.shop.cart');
    }
    //giftcode
    public function giftCode() {
        if (Request()->ajax()) {
            $gifcode = Request()->get('giftcode');
            if (!empty($gifcode)) {
                $arGift = $this->GiftCode->getGift($gifcode);
                if (!empty($arGift)) {

                    return $arGift->value.'%';
                }
            }
        }
    }
    public function product($id) {
        $objectItem  = $this->Products->getProduct($id);
        $arRelate    = $this->Products->getRelate($id,1);
        $comment     = $this->Comment->getComment($id);
        return view('shop.shop.page.product',compact('objectItem','arRelate','comment'));
    }
    public function contact() {
        return view('shop.shop.page.contact');
    }
    public function postContact(Request $request) {
        $arContact = [
            'fullname' => $request->fullname,
            'email'    => $request->email,
            'title'    => $request->title,
            'content'  => $request->content
        ];
        $result = $this->Contact->add($arContact);
        if ($result) {
            $request->session()->flash('msg','Nội dung của bạn đã được gởi đến hệ thống, vui lòng chờ phản hồi của admin');
            return redirect()->route('shop.shop.contact');
        }else {
            $request->session()->flash('error','Có lỗi xảy ra');
            return redirect()->route('shop.shop.contact');
        }
    }
    public function checkout(Request $request) {
        if (Auth::check()) {
            $pay = $this->Pay->getPay();
            $discount = $this->User->getTypeUser(Auth::user()->id);
            return view('shop.shop.page.checkout',compact('pay','discount'));
        }else {
            echo '<script>alert("Vui lòng đăng nhập để thanh toán");window.location= "userlogin"</script>';
        }
    }
    public function postCheckOut(CheckOutRequest $request) {
        $total  = str_replace(',','',Cart::total(0,3));
        if (!empty($request->gift)) {
            $checkGift = $this->GiftCode->checkGift($request->gift);
            if (!empty($checkGift)) {
                $total = $total - $total/100*$checkGift->value;
            }
        }
        $transaction = [
            'amount'  => $total,
            'status'  => 2,
            'id_user' => Auth::user()->id,
            'id_pay'  => $request->pay
        ];
        $id_transaction = $this->Transaction->add($transaction);
        foreach (Cart::content() as $key => $value) {
            $transactiondt = [
                'qty'            => $value->qty,
                'total'          => $value->subtotal,
                'id_transaction' => $id_transaction,
                'id_product'     => $value->id,
            ];
            $this->Transaction_detail->add($transactiondt);
        }
        $qty = Cart::count();
        $qtyPoint = $qty* $this->Point->getPoint()->point;
        $pointUser = $this->User->point($qtyPoint,Auth::user()->id);
        $accumulated = $this->User->accumulated(Auth::user()->id,Cart::count());
        Cart::destroy();
        if ($request->pay==1) {
            echo '<script>alert("Mua hàng thành công. Bạn được cộng '.$qty.' vào tài khoản");window.location="/donhang/'.Auth::user()->id.'"</script>';
        }else {
            return view('shop.shop.page.thanhtoan', compact('total'));
        }
    }
    //history
    public function myOrder($id) {
        $arTransaction = $this->Transaction->getMyOrder($id);
        return view('shop.shop.page.order',compact('arTransaction'));
    }
    //order detail
    public function myOrderDetail($id) {
        $Transaction = $this->Transaction->getId($id);
        $arOrderDt = $this->Transaction_detail->getDetail($id);
        return view('shop.shop.page.orderdetail',compact('arOrderDt','Transaction'));
    }

    //thanh toan
    public function thanhToan() {
        return view('shop.shop.page.thanhtoan');
    }
    public function news() {
        $news = $this->News->getIndex();
        return view('shop.shop.page.news',compact('news'));
    }
    public function newsDetail($id) {
        $newsDetail = $this->News->getId($id);
        return view('shop.shop.page.newsdetail',compact('newsDetail'));
    }
    //info user
    public function info() {
        $user = $this->User->getId2(Auth::user()->id);
        //update danh hieu
        $customer = $this->Customer_Type->getAll();
        foreach ($customer as $key => $value) {
            if (Auth::user()->accumulated >= $value->customer_point){
                $this->User->customer(Auth::user()->id,$value->id_customer);
            }
        }
        return view('shop.shop.page.info',compact('user'));
    }
    public function postInfo(Request $request,$id) {
        $password = password_hash($request->password,PASSWORD_DEFAULT);
        if (empty($request->password)) {
            $password = Auth::user()->password;
        }
        $arInfo = [
            'username' => $request->username,
            'password' => $password,
            'fullname' => $request->fullname,
            'email'    => $request->email,
            'address'  => $request->address,
            'phone'    => $request->phone,
            'id_level' => Auth::user()->id_level
        ];
        $result = $this->User->edit($id,$arInfo);
        if ($result) {
            $request->session()->flash('msg','Cập nhập thành công');
            return redirect()->route('shop.shop.info',Auth::user()->id);
        }else {
            $request->session()->flash('error','Có lỗi xảy ra');
            return redirect()->route('shop.shop.info',Auth::user()->id);
        }
    }
    //update info
    public function updateInfo() {
        if (Request()->ajax()) {
            $arObject = [
                'fullname' => Request()->get('fullname'),
                'address'  => Request()->get('address'),
                'email'    => Request()->get('email'),
                'phone'    => Request()->get('phone')
            ];
           $result = $this->User->updateInfo(Request()->get('id'),$arObject);
           if (isset($result)) {
               return view('shop.shop.page.form.info');
           }
        }
    }
    //dang ky
    public function dangKy() {
        return view('shop.auth.dangky');
    }
    public function postDangKy(DangKyRequest $request) {
        $arUser = [
            'username' => $request->username,
            'password' => password_hash($request->password,PASSWORD_DEFAULT),
            'fullname' => $request->fullname,
            'email'    => $request->email,
            'address'  => $request->address,
            'phone'    => $request->phone,
            'id_level' => 3
        ];
        $result = $this->User->add($arUser);
        if ($result) {
            echo '<script>alert("Đăng ký thành công");window.location = "userlogin"</script>';
        }else {
            $request->session()->flash('error','Có lỗi xảy ra');
            return redirect()->route('shop.auth.logoutUser');
        }
    }
    //comment
    public function postComment() {
        if (Request()->ajax()) {
            if (Auth::check()) {
                $comment = Request()->get('content');
                if (!empty($comment)) {
                    $arComment = [
                        'content' => $comment,
                        'id_user' => Auth::user()->id,
                        'id_product' => Request()->get('idproduct')
                    ];
                    $result = $this->Comment->add($arComment);
                    $resultComment = $this->Comment->getComment(Request()->get('idproduct'));
                    return view('shop.shop.page.form.comment',compact('resultComment'));
                }
                return 'Vui lòng nhập nội dung';
            }
            return 'vui lòng đăng nhập';
        }
    }
    //gift
    public function exchange() {
        $arExchange = $this->Products->getIndexPublic(2);
        return view('shop.shop.page.exchange',compact('arExchange'));
    }
    public function productExchange($id) {
        $objectItem  = $this->Products->getProduct($id);
        $arRelate    = $this->Products->getRelate($id,2);
        $comment     = $this->Comment->getComment($id);
        return view('shop.shop.page.productExchange',compact('objectItem','arRelate','comment'));
    }
    public function postExchange() {
        if (Request()->ajax()) {
            $qty = Request()->get('qty');
            return $qty;
        }
    }
    //change
    public function change($id,Request $request) {
        $total = implode(explode(',',$request->total));
        $qtyProduct = $this->Products->getId($id)->qty;
        $reward = Auth::user()->rewardpoint;
        if ($reward>=$total) {
            if ($request->qty > $qtyProduct) {
                echo '<script>alert("Số lượng sản phẩm không đủ");window.location = "/sanphamdoithuong/'.$id.'"</script>';
                die();
            }else {
                $arReward = [
                    'id_product' => $id,
                    'id_user'    => Auth::user()->id,
                    'qty'        => $request->qty,
                    'amount'     => $total
                ];
               $result = $this->Reward->add($arReward);
               if (isset($result)) {
                   $rewardpoint = $reward-$total;
                   $update = $this->User->rewardPoint(Auth::user()->id,$rewardpoint);
                   $updateProduct = $this->Products->updateQty($id,$request->qty);
                   echo '<script>alert("Đổi thưởng thành công");window.location = "/lichsudoithuong/'.Auth::user()->id.'"</script>';
               }
            }
        }else {
            echo '<script>alert("Bạn không đủ điểm để đổi");window.location = "/sanphamdoithuong/'.$id.'"</script>';
        }
    }
    //my Reward
    public function myReward() {
        $arReward = $this->Reward->myReward(Auth::user()->id);
        return view('shop.shop.page.myreward',compact('arReward'));
    }
    public function search() {
        return view('shop.shop.page.search');
    }
}
