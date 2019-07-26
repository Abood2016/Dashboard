<div class="page-sidebar-wrapper">
    <!-- BEGIN SIDEBAR -->
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true"
            data-slide-speed="200" style="padding-top: 20px">
            <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
            <li class="sidebar-toggler-wrapper hide">
                <div class="sidebar-toggler">
                    <span></span>
                </div>
            </li>
            <!-- END SIDEBAR TOGGLER BUTTON -->
            <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
            <li class="sidebar-search-wrapper hidden">
                <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
                <!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->
                <!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->
                <form class="sidebar-search  " action="page_general_search_3.html" method="POST">
                    <a href="javascript:;" class="remove">
                        <i class="icon-close"></i>
                    </a>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                                            <a href="javascript:;" class="btn submit">
                                                <i class="icon-magnifier"></i>
                                            </a>
                                        </span>
                    </div>
                </form>
                <!-- END RESPONSIVE QUICK SEARCH FORM -->
            </li>
            <li class="nav-item start ">
                <a href="{{route('index.dashboard')}}" class="nav-link nav-toggle">
                    <i class="fa fa-dashboard"></i>
                    <span class="title">@lang('dashboard.dashboard')</span>
                    <!-- <span class="arrow"></span> -->
                </a>
              <!--  <ul class="sub-menu">
                <li class="nav-item start ">
                            <a href="" class="nav-link ">
                                <i class="fa fa-list"></i>
                                <span class="title">Products</span>
                            </a>
                        </li> 
                         <li class="nav-item">
                            <a href="" class="nav-link ">
                                <i class="fa fa-plus"></i>
                                <span class="title">Add Product</span>
                            </a>
                        </li> 
                 </ul> 
            </li> -->

            <li class="nav-item start ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-book"></i>
                    <span class="title">Products</span>
                    <!-- <span class="arrow"></span> -->
                </a>
                <ul class="sub-menu">
                <li class="nav-item start ">
                            <a href="{{route('product.create')}}" class="nav-link ">
                                <i class="fa fa-plus"></i>
                                <span class="title">Add Product</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('product.index')}}" class="nav-link ">
                                <i class="fa fa-list"></i>
                                <span class="title">Products</span>
                            </a>
                        </li>
             <li class="nav-item start ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-book"></i>
                    <span class="title">Colors</span>
                    <!-- <span class="arrow"></span> -->
                </a>
                <ul class="sub-menu">
                <li class="nav-item start ">
                            <a href="{{route('color.create')}}" class="nav-link ">
                                <i class="fa fa-plus"></i>
                                <span class="title">Add Color</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('color.index')}}" class="nav-link ">
                                <i class="fa fa-list"></i>
                                <span class="title">Colors</span>
                            </a>
                        </li>
                </ul>
            </li>
            <li class="nav-item start ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-book"></i>
                    <span class="title">Product Size</span>
                    <!-- <span class="arrow"></span> -->
                </a>
                <ul class="sub-menu">
                <li class="nav-item start ">
                            <a href="{{route('size.create')}}" class="nav-link ">
                                <i class="fa fa-plus"></i>
                                <span class="title">Add Size</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('size.index')}}" class="nav-link ">
                                <i class="fa fa-list"></i>
                                <span class="title">Product Size</span>
                            </a>
                        </li>
                </ul>
            </li>

            
                </ul>
            </li>
        <li class="nav-item start ">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <i class="fa fa-book"></i>
                            <span class="title">Orders</span>
                    <!-- <span class="arrow"></span> -->
                </a>
                <ul class="sub-menu">
               
                        <li class="nav-item">
                            <a href="{{route('order.index')}}" class="nav-link ">
                                <i class="fa fa-list"></i>
                                <span class="title">All Orders</span>
                            </a>
                        </li>
                </ul>
            </li>
            <li class="nav-item start ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-book"></i>
                    <span class="title">Categories</span>
                    <!-- <span class="arrow"></span> -->
                </a>
                <ul class="sub-menu">
                <li class="nav-item start ">
                            <a href="{{route('category.create')}}" class="nav-link ">
                                <i class="fa fa-plus"></i>
                                <span class="title">Add Category</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('category.index') }}" class="nav-link ">
                                <i class="fa fa-list"></i>
                                <span class="title">Categories</span>
                            </a>
                        </li>
                </ul>
            </li>



            
            <!-- <li class="nav-item start ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-book"></i>
                    <span class="title"></span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                <li class="nav-item start ">
                            <a href="" class="nav-link ">
                                <i class="fa fa-list"></i>
                                <span class="title"></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link ">
                                <i class="fa fa-plus"></i>
                                <span class="title"></span>
                            </a>
                        </li>
                </ul>
            </li> -->
        </ul>
        <!-- END SIDEBAR MENU -->
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>
