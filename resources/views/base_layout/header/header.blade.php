<div class="page-header navbar navbar-fixed-top">
                <!-- BEGIN HEADER INNER -->
                <div class="page-header-inner ">
                    <!-- BEGIN LOGO -->
                    <div class="page-logo">
                        <a href="index.html">
                            <img src="{{asset('control/assets/layouts/layout/img/logo.png')}}" alt="logo" class="logo-default" /> </a>
                        <div class="menu-toggler sidebar-toggler">
                            <span></span>
                        </div>
                    </div>
                    <!-- END LOGO -->
                    <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                    <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                        <span></span>
                    </a>
                    <!-- END RESPONSIVE MENU TOGGLER -->
                    <!-- BEGIN TOP NAVIGATION MENU -->
                    <div class="top-menu">
                        <ul class="nav navbar-nav pull-right">
                            <li class="dropdown dropdown-user">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <!-- <img alt="" class="img-circle" src="{{asset('control/assets/layouts/layout/img/avatar3_small.jpg')}}" /> -->
                                    <span class="username username-hide-on-mobile">  {{app()->getLocale() == 'en' ? 'English' : 'العربية' }} </span>
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-default">
                                     <li>
                                        <a href="{{route('local.change',['lang' => 'en'])}}" class="text-center">
                                            @lang('dashboard.english') 
                                            <img alt="" src="/control/assets/global/img/flags/us.png">
                                            </a>
                                    </li>
                                    <li>
                                        <a href="{{route('local.change',['lang' => 'ar'])}}" class="text-center">
                                             @lang('dashboard.arabic') 
                                            <img  src="/control/assets/global/img/flags/eg.png" alt="">
                                            
                                            </a>
                                    </li>
                                  
                                </ul>


                           <!--  <li class="dropdown dropdown-quick-sidebar-toggler">
                                <a href="" class="dropdown-toggle">
                                    <i class="icon-logout"></i>
                                </a>
                            </li> -->
                            <!-- END QUICK SIDEBAR TOGGLER -->
                        </ul>
                    </div>

                        <!--User Account Profile By Abed -->
                     <div class="top-menu">
                        <ul class="nav navbar-nav pull-right">
                            <li class="dropdown dropdown-user">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <img alt="" class="img-circle" src="{{URL::asset('/admin_uploads/'.Auth::user()->image)}}"/>
                                    <span class="username username-hide-on-mobile">{{ auth()->guard('admin')->check() ? auth()->user()->name : 'Account'}}</span>
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-default">
                                     <li>
                                 <a href="{{ route('profile.index') }}" ><i class="glyphicon glyphicon-user">
                                     
                                         <span > Profile</span>
                                 </i>
                                 </a>
                                    </li>
                                    <li>
                                        <a href="{{ url('admin/logout') }}" >
                                            <i class="glyphicon glyphicon-off">
                                           <span>logout</span>  
                                            </i>
                                            </a>
                                    </li>
                                    
                                </ul>

                        </ul>
                    </div>
                    <!-- END TOP NAVIGATION MENU -->
                </div>
                <!-- END HEADER INNER -->
            </div>