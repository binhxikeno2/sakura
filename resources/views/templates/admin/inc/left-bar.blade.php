<div class="nav-left-sidebar sidebar-dark">
    <div class="menu-list">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav flex-column">
                    <li class="nav-divider">
                        Menu
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link active" href="{{route('admin.admin.index')}}"><i class="fa fa-fw fa-user-circle"></i>Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fa fa-fw fa-rocket"></i>Quản lý sản phẩm</a>
                        <div id="submenu-2" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('admin.cat.index')}}">Quản lý loại sản phẩm</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('admin.product.index')}}">Quản lý sản phẩm</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.transaction.index')}}"  aria-controls="submenu-5"><i class="fas fa-fw fa-table"></i>Quản lý hóa đơn</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.users.index')}}" aria-controls="submenu-3"><i class="fa fa-address-card"></i>Quản lý người dùng</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.gift.index')}}" aria-controls="submenu-3"><i class="fas fa-fw fa-chart-pie"></i>Mã giảm giá</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.contact.index')}}" aria-controls="submenu-3"><i class="	fa fa-comment"></i>Quản lý liên hệ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.point.index')}}" aria-controls="submenu-3"><i class="	fa fa-archive"></i>Quản lý điểm thưởng</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.comment.index')}}" aria-controls="submenu-3"><i class="fas fa-fw fa-chart-pie"></i>Bình luận</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.slide.index')}}" aria-controls="submenu-3"><i class="	fa fa-film"></i>Silde Show</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.new.index')}}" aria-controls="submenu-3"><i class="fa fa-assistive-listening-systems"></i>Tin tức</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{route('admin.statistical.index')}}"  aria-controls="submenu-4"><i class="fab fa-fw fa-wpforms"></i>Thống kê</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>