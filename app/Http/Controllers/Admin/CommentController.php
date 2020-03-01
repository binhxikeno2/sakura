<?php

namespace App\Http\Controllers\Admin;

use App\Model\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    public function __construct(Comment $comment)
    {
        $this->Comment = $comment;
    }

    public function index() {
        $arComment = $this->Comment->getIndex();
        return view('shop.admin.comment.index',compact('arComment'));
    }
    //del
    public function del($id,Request $request) {
        $result = $this->Comment->del($id);
        $request->session()->flash('msg','Xóa thành công');
        return redirect()->route('admin.comment.index');
    }
}
