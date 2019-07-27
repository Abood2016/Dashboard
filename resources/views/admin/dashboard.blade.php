@extends('base_layout.master_layout')

@section('title')
	<h4 style="font-family:Helvetica ">Dashboard</h4>
@endsection

@section('content')
	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" >
                                <div class="dashboard-stat blue" >
                                    <div class="visual">
                                        <i class="fa fa-briefcase fa-icon-medium"></i>
                                    </div>
                                    <div class="details text-center" >
                                        <div class="number" >  </div>
                                        <div class="desc">Products </div>
                                    </div>
                                    <a class="more" href=""> Product
                                        <i class="m-icon-swapright m-icon-white"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <div class="dashboard-stat red" >
                                    <div class="visual">
                                        <i class="fa fa-briefcase fa-icon-medium"></i>
                                    </div>
                                    <div class="details text-center" >
                                        <div class="number" > 20 </div>
                                        <div class="desc">Orders </div>
                                    </div>
                                    <a class="more" href="javascript:;"> Orders
                                        <i class="m-icon-swapright m-icon-white"></i>
                                    </a>
                                </div>
                            </div>

                              <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <div class="dashboard-stat green" >
                                    <div class="visual">
                                        <i class="fa fa-briefcase fa-icon-medium"></i>
                                    </div>
                                    <div class="details text-center" >
                                        <div class="number" > 60 </div>
                                        <div class="desc">Users </div>
                                    </div>
                                    <a class="more" href="javascript:;"> Users
                                        <i class="m-icon-swapright m-icon-white"></i>
                                    </a>
                                </div>
                            </div>
                               <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <div class="dashboard-stat purple" >
                                    <div class="visual">
                                        <i class="fa fa-briefcase fa-icon-medium"></i>
                                    </div>
                                    <div class="details" >
                                        <div class="number" > 60 </div>
                                        <div class="desc">Messages </div>
                                    </div>
                                    <a class="more" href="javascript:;"> Users
                                        <i class="m-icon-swapright m-icon-white"></i>
                                    </a>
                                </div>
                            </div>


@endsection