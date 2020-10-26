<nav>
    <div class="nav">
        <div class="container-fluid">

                <!-- Start Menu For big screens-->
                <div class="nav1">
                    <div class="logo"> <a href="{{route('homepage')}}">إلا صلاتي</a> </div>

                    <div class="d-flex">
                        <ul class="items m-0 p-0 d-none d-md-flex">
                            {{--
                            <li class="item"> <a href="#">اذكار  <i class="fas fa-moon iconmenu"></i> </a> </li>
                            <li class="item"> <a href="#">دعاء <i class="fas fa-leaf iconmenu"></i> </a> </li>
                            --}}
                            <li class="item"> <a href="#">بحث <i class="fas fa-search-location iconmenu"></i> </a> </li>
                        </ul>

                        <ul class="items m-0 p-0">
                            <li class="item d-sm-block d-md-none"><a href="#" id="bars"><i class="fa fa-bars" id="icon-bars"></i></a></li>
                        <li class="item activeitem"> <a href="{{route('homepage')}}">الرئيسية <i class="fas fa-home iconmenu"></i> </a> </li>
                        </ul>
                    </div>
                </div>
                <!-- End Menu For big screens-->
        </div>
    </div>
    <!-- Start Menu For Small screens-->
    <div class="items-mobile d-md-none" id="items-mobile">
        <ul class="list-items-mobile container-fluid m-0">
            {{--
            <li class="item-mobile"> <a href="#">اذكار  <i class="fas fa-moon iconmenu pr-3"></i> </a> </li>
            <li class="item-mobile"> <a href="#">دعاء <i class="fas fa-leaf iconmenu pr-3"></i> </a> </li>
            --}}
            <li class="item-mobile"> <a href="#">بحث <i class="fas fa-search-location iconmenu pr-3"></i> </a> </li>
        </ul>
        <div class="m-0 p-0 drawer" id="drawer"></div>
    </div>
    <!-- End Menu For Small screens-->

</nav>
