<?php

namespace App\Http\Controllers\Admin;

use App\Model\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function __construct(Contact $contact)
    {
        $this->Contact = $contact;
    }

    public function index() {
        $arContact = $this->Contact->getIndex();
        return view('shop.admin.contact.index',compact('arContact'));
    }
    public function del($id,Request $request) {
        $result = $this->Contact->del($id);
        $request->session()->flash('msg','Xóa thành công');
        return redirect()->route('admin.contact.index');
    }
}
