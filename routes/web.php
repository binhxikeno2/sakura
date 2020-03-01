<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//auth
Route::group(['namespace'=>'Auth'],function(){
    Route::get('login',[
        'uses' => 'AuthController@login',
        'as'   => 'shop.auth.login'
    ]);
    //post login
    Route::post('login',[
        'uses' => 'AuthController@postLogin',
        'as'   => 'shop.auth.postLogin'
    ]);
    //logout
    Route::get('logout',[
        'uses' => 'AuthController@logout',
        'as'   => 'shop.auth.logout'
    ]);
    //login user
    Route::get('userlogin',[
        'uses' => 'AuthController@loginUser',
        'as'   => 'shop.auth.loginUser'
    ]);
    //post login user
    Route::post('userlogin',[
        'uses' => 'AuthController@postLoginUser',
        'as'   => 'shop.auth.postLoginUser'
    ]);
    //logout user
    Route::get('logoutUser/{id}',[
        'uses' => 'AuthController@logoutUser',
        'as'   => 'shop.auth.logoutUser'
    ]);
});
//public
Route::group(['namespace'=>'Shop'],function(){
    Route::get('',[
        'uses' => 'IndexController@index',
        'as'   => 'shop.shop.index'
    ]);
    Route::get('danhmuc/{id}',[
        'uses' => 'IndexController@cat',
        'as'   => 'shop.shop.cat'
    ]);
    Route::get('giohang',[
        'uses' => 'IndexController@cart',
        'as'   => 'shop.shop.cart'
    ]);
    //post post
    Route::get('update/{id}/{qty}',[
        'uses' => 'IndexController@update',
        'as'   => 'shop.shop.update'
    ]);
    //giftcode
    Route::post('maquatang',[
        'uses' => 'IndexController@giftCode',
        'as'   => 'shop.shop.giftcode'
    ]);
    // add cart
    Route::get('addcart/{id}',[
        'uses' => 'IndexController@addCart',
        'as'   => 'shop.shop.addCart'
    ]);
    //delete cart
    Route::get('delCart/{id}',[
        'uses' => 'IndexController@delCart',
        'as'   => 'shop.shop.delCart'
    ]);
    //dell cart all
    Route::get('delAllCart',[
        'uses' => 'IndexController@dellAllCart',
        'as'   => 'shop.shop.dellAllCart'
    ]);
    //product
    Route::get('sanpham/{id}',[
        'uses' => 'IndexController@product',
        'as'   => 'shop.shop.product'
    ]);
    Route::get('lienhe',[
        'uses' => 'IndexController@contact',
        'as'   => 'shop.shop.contact'
    ]);
    Route::post('contact',[
        'uses' => 'IndexController@postContact',
        'as'   => 'shop.shop.postContact'
    ]);
    Route::get('checkout',[
        'uses' => 'IndexController@checkout',
        'as'   => 'shop.shop.checkout'
    ]);
    //post check out
    Route::post('checkout',[
        'uses' => 'IndexController@postCheckOut',
        'as'   => 'shop.shop.postCheckOut'
    ]);
    Route::get('tintuc',[
        'uses' => 'IndexController@news',
        'as'   => 'shop.shop.news'
    ]);
    Route::get('tintuc/{id}',[
        'uses' => 'IndexController@newsDetail',
        'as'   => 'shop.shop.newsDetail'
    ]);
    //hinh thuc thanh toan;
    Route::get('thanhtoan',[
        'uses' => 'IndexController@thanhToan',
        'as'   => 'shop.shop.thanhToan'
    ]);
    //history
    Route::get('donhang/{id}',[
        'uses' => 'IndexController@myOrder',
        'as'   => 'shop.shop.myOrder'
    ]);
    //detail order
    Route::get('myorderdetail/{id}',[
        'uses' => 'IndexController@myOrderDetail',
        'as'   => 'shop.shop.myOrderDetail'
    ]);
    //infor user
    Route::get('thongtin/{id}',[
        'uses' => 'IndexController@info',
        'as'   => 'shop.shop.info'
    ]);
    //post infor user
    Route::post('info/{id}',[
        'uses' => 'IndexController@postInfo',
        'as'   => 'shop.shop.postInfo'
    ]);
    //update check out
    Route::post('updateInfo',[
        'uses' => 'IndexController@updateInfo',
        'as'   => 'shop.shop.updateInfo'
    ]);
    //dang ky
    Route::get('dangky',[
        'uses' => 'IndexController@dangKy',
        'as'   => 'shop.shop.dangKy'
    ]);
    //post dang ky
    Route::post('dangky',[
        'uses' => 'IndexController@postDangKy',
        'as'   => 'shop.shop.postDangKy'
    ]);
    //comment
    Route::post('comment/{id}',[
        'uses' => 'IndexController@postComment',
        'as'   => 'shop.shop.postComment'
    ]);
    //gift
    Route::get('doithuong',[
        'uses' => 'IndexController@exchange',
        'as'   => 'shop.shop.exchange'
    ]);
    //detail exchange
    Route::get('sanphamdoithuong/{id}',[
        'uses' => 'IndexController@productExchange',
        'as'   => 'shop.shop.productExchange'
    ]);
    //post
    Route::get('postExchange',[
        'uses' => 'IndexController@postExchange',
        'as'   => 'shop.shop.postExchange'
    ]);
    //model exchange
    Route::post('sanphamdoithuong/{id}',[
        'uses' => 'IndexController@change',
        'as'   => 'shop.shop.change'
    ]);
    //my reward
    Route::get('lichsudoithuong/{id}',[
        'uses' => 'IndexController@myReward',
        'as'   => 'shop.shop.myReward'
    ]);
    //tim kiem
    Route::get('timkiem-{key}',[
        'uses' => 'IndexController@search',
        'as'   => 'shop.shop.search'
    ]);

});
//admin
Route::group(['namespace'=>'Admin','prefix'=>'admin','middleware'=>'auth'],function (){
    //index
    Route::get('',[
        'uses' => 'IndexController@index',
        'as'   => 'admin.admin.index'
    ]);
    //categories
    Route::group(['prefix'=>'categories'],function (){
        //index
        Route::get('',[
            'uses' => 'CatController@index',
            'as'   => 'admin.cat.index'
        ]);
        //add
        Route::get('add',[
            'uses' => 'CatController@add',
            'as'   => 'admin.cat.add'
        ]);
        //post add
        Route::post('add',[
            'uses' => 'CatController@postAdd',
            'as'   => 'admin.cat.postAdd'
        ]);
        //edit
        Route::get('edit/{id}',[
            'uses' => 'CatController@edit',
            'as'   => 'admin.cat.edit'
        ]);
        //post edit
        Route::post('edit/{id}',[
            'uses' => 'CatController@postEdit',
            'as'   => 'admin.cat.postEdit'
        ]);
        //del
        Route::get('del/{id}',[
            'uses' => 'CatController@del',
            'as'   => 'admin.cat.del'
        ]);
        //status
        Route::get('status/{id}',[
            'uses' => 'CatController@status',
            'as'   => 'admin.cat.status'
        ]);
    });
    //product
    Route::group(['prefix'=>'product'],function(){
        //index
        Route::get('',[
            'uses' => 'ProductController@index',
            'as'   => 'admin.product.index'
        ]);
        //add
        Route::get('add',[
            'uses' => 'ProductController@add',
            'as'   => 'admin.product.add'
        ]);
        Route::post('add',[
            'uses' => 'ProductController@postAdd',
            'as'   => 'admin.product.postAdd'
        ]);
        //del
        Route::get('del/{id}/{page}',[
            'uses' => 'ProductController@del',
            'as'   => 'admin.product.del'
        ]);
        //edit
        Route::get('edit/{id}/{page}',[
            'uses' => 'ProductController@edit',
            'as'   => 'admin.product.edit'
        ]);
        //post edit
        Route::post('edit/{id}/{page}',[
            'uses' => 'ProductController@postEdit',
            'as'   => 'admin.product.postEdit'
        ]);
        //status
        Route::get('status/{id}',[
            'uses' => 'ProductController@status',
            'as'   => 'admin.product.status'
        ]);
    });
    //users
    Route::group(['prefix'=>'users'],function(){
        //index
        Route::get('',[
            'uses' => 'UserController@index',
            'as'   => 'admin.users.index'
        ]);
        //add
        Route::get('add',[
            'uses' => 'UserController@add',
            'as'   => 'admin.users.add'
        ])->middleware('role:1');
        //post add
        Route::post('add',[
            'uses' => 'UserController@postAdd',
            'as'   => 'admin.users.postAdd'
        ]);
        //edit
        Route::get('edit/{id}',[
            'uses' => 'UserController@edit',
            'as'   => 'admin.users.edit'
        ]);
        //post edit
        Route::post('edit/{id}',[
            'uses' => 'UserController@postEdit',
            'as'   => 'admin.users.postEdit'
        ]);
        //del
        Route::get('del/{id}',[
            'uses' => 'UserController@del',
            'as'   => 'admin.users.del'
        ])->middleware('role:1');
    });
    //contact
    Route::group(['prefix'=>'contact'],function(){
        //index
        Route::get('',[
            'uses' => 'ContactController@index',
            'as'   => 'admin.contact.index'
        ]);
        //add
        Route::get('del/{id}',[
            'uses' => 'ContactController@del',
            'as'   => 'admin.contact.del'
        ]);
    });
    //exchane point
    Route::group(['prefix'=>'point'],function(){
        Route::get('',[
            'uses' => 'PointController@index',
            'as'   => 'admin.point.index'
        ]);
        Route::get('del/{id}',[
            'uses' => 'PointController@del',
            'as'   => 'admin.point.del'
        ]);
        Route::get('add',[
            'uses' => 'PointController@add',
            'as'   => 'admin.point.add'
        ]);
        Route::post('add',[
            'uses' => 'PointController@postAdd',
            'as'   => 'admin.point.postAdd'
        ]);
        Route::get('edit/{id}',[
            'uses' => 'PointController@edit',
            'as'   => 'admin.point.edit'
        ]);
        Route::post('postEdit/{id}',[
            'uses' => 'PointController@postEdit',
            'as'   => 'admin.point.postEdit'
        ]);
        Route::post('editpoint/{id}',[
            'uses' => 'PointController@editPoint',
            'as'   => 'admin.point.editPoint'
        ]);
    });
    //gift code
    Route::group(['prefix'=>'giftcode'],function(){
        //index
        Route::get('',[
            'uses' => 'GiftController@index',
            'as'   => 'admin.gift.index'
        ]);
        //add
        Route::get('add',[
            'uses' => 'GiftController@add',
            'as'   => 'admin.gift.add'
        ]);
        //post add
        Route::post('add',[
            'uses' => 'GiftController@postAdd',
            'as'   => 'admin.gift.postAdd'
        ]);
        //del
        Route::get('del/{id}/{page}',[
            'uses' => 'GiftController@del',
            'as'   => 'admin.gift.del'
        ]);
        //edit
        Route::get('edit/{id}/{page}',[
            'uses' => 'GiftController@edit',
            'as'   => 'admin.gift.edit'
        ]);
        //post edit
        Route::post('edit/{id}/{page}',[
            'uses' => 'GiftController@postEdit',
            'as'   => 'admin.gift.postEdit'
        ]);
    });
    //comment
    Route::group(['prefix'=>'comment'],function(){
        Route::get('',[
            'uses' => 'CommentController@index',
            'as'   => 'admin.comment.index'
        ]);
        //del
        Route::get('del/{id}',[
            'uses' => 'CommentController@del',
            'as'   => 'admin.comment.del'
        ]);
    });
    //silde
    Route::group(['prefix'=>'silde'],function(){
        //index
        Route::get('',[
            'uses' => 'SlideController@index',
            'as'   => 'admin.slide.index'
        ]);
        //add
        Route::get('add',[
            'uses' => 'SlideController@add',
            'as'   => 'admin.slide.add'
        ]);
        //post add
        Route::post('add',[
            'uses' => 'SlideController@postAdd',
            'as'   => 'admin.slide.postAdd'
        ]);
        //del
        Route::get('del/{id}/{page}',[
            'uses' => 'SlideController@del',
            'as'   => 'admin.slide.del'
        ]);
        //edit
        Route::get('edit/{id}/{page}',[
            'uses' => 'SlideController@edit',
            'as'   => 'admin.slide.edit'
        ]);
        //post edit
        Route::post('edit/{id}/{page}',[
            'uses' => 'SlideController@postEdit',
            'as'   => 'admin.slide.postEdit'
        ]);
    });
    Route::group(['prefix'=>'news'],function(){
        //index
        Route::get('',[
            'uses' => 'NewController@index',
            'as'   => 'admin.new.index'
        ]);
        //add
        Route::get('add',[
            'uses' => 'NewController@add',
            'as'   => 'admin.new.add'
        ]);
        //post add
        Route::post('add',[
            'uses' => 'NewController@postAdd',
            'as'   => 'admin.new.postAdd'
        ]);
        //del
        Route::get('del/{id}/{page}',[
            'uses' => 'NewController@del',
            'as'   => 'admin.new.del'
        ]);
        //edit
        Route::get('edit/{id}/{page}',[
            'uses' => 'NewController@edit',
            'as'   => 'admin.new.edit'
        ]);
        //post edit
        Route::post('edit/{id}/{page}',[
            'uses' => 'NewController@postEdit',
            'as'   => 'admin.new.postEdit'
        ]);
    });
    //transaction
    Route::group(['prefix'=>'transaction'],function(){
        //index
        Route::get('',[
            'uses' => 'TransactionController@index',
            'as'   => 'admin.transaction.index'
        ]);
        //detail
        Route::get('detail/{id}',[
            'uses' => 'TransactionController@detail',
            'as'   => 'admin.transaction.detail'
        ]);
        //delete
        Route::get('del/{id}',[
            'uses' => 'TransactionController@del',
            'as'   => 'admin.transaction.del'
        ]);
        //status
        Route::get('status/{id}',[
            'uses' => 'TransactionController@status',
            'as'   => 'admin.transaction.status'
        ]);
        //export
        Route::get('export/{id}',[
            'uses' => 'TransactionController@export',
            'as'   => 'admin.transaction.export'
        ]);
    });
    //thông ke
    Route::group(['prefix'=>'statistical'],function(){
        //index
        Route::get('',[
            'uses' => 'StatisticalController@index',
            'as'   => 'admin.statistical.index'
        ]);
    });
});
//clear cache
Route::get('/clear-cache', function () {
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('view:clear');
    return 'DONE'; //Return anything
});