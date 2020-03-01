<form action="#" id="checkout_form" class="checkout_form">
    <div>
        <!-- Company -->
        <p><span class="fa fa-address-book-o"></span> {{Auth::user()->fullname}}</p>
        <p><span class="fa fa-address-card"></span> {{Auth::user()->address}}</p>
        <p><span class="fa fa-phone"></span> {{Auth::user()->phone}}</p>
        <p><span class="fa fa-envelope"></span> {{Auth::user()->email}}</p>
        <a href="" style="margin: 20px auto;background-color:#DADADA" class="btn btn-primary" data-toggle="modal" data-target="#modalLoginForm">Thay đổi</a>
    </div>
</form>