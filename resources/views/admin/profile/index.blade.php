@extends('base_layout.master_layout')

@section('title')
	<h4 style="font-family:Helvetica ">Your Profile</h4>
@endsection

@section('content')
<div id="user-profile-2" class="user-profile">
		<div class="tabbable">
			<ul class="nav nav-tabs padding-18">
				<li class="active">
					<a data-toggle="tab" href="#home">
						<i class="green ace-icon fa fa-user bigger-120"></i>
						Profile
					</a>
				</li>

			</ul>

						@foreach($admins as $admin)
			<div class="tab-content no-border padding-24">
				<div id="home" class="tab-pane in active">
					<div class="row">
						<div class="col-xs-12 col-sm-3 center">
							<span class="profile-picture">
								<img class="editable img-responsive" alt=" Avatar" id="avatar2" src="{{asset('/admin_uploads').'/'.$admin->image}}">
							</span>

							<div class="space space-4"></div>
	
							</div> 							
						<div class="col-xs-12 col-sm-9">
							<a href="{{route('profile.edit',['id'=>$admin->id])}}" title="Edit Profile" class="btn btn-primary pull-right">
								<span class="glyphicon glyphicon-edit"></span>
							</a>
							<h4 class="blue">
								<span class="middle">{{$admin->name}}</span>

								<span class="label label-purple arrowed-in-right">
									<i class="ace-icon fa fa-circle smaller-80 align-middle" style="color: green"></i>
									online
								</span>
							</h4>

							<div class="profile-user-info">
								<div class="profile-info-row">
									<div class="profile-info-name"> Username </div>

									<div class="profile-info-value">
										<span>{{$admin->username}}</span>
									</div>
								</div>

								<div class="profile-info-row">
									<div class="profile-info-name"> Location </div>

									<div class="profile-info-value">
										<i class="fa fa-map-marker light-orange bigger-110"></i>
										<span>{{$admin->address}}</span>
										
									</div>
								</div>

								<div class="profile-info-row">
									<div class="profile-info-name"> Age </div>

									<div class="profile-info-value">
										<span>{{ $admin->age }}</span>
									</div>
								</div>

								<div class="profile-info-row">
									<div class="profile-info-name"> Joined </div>

									<div class="profile-info-value">
										<span>{{$admin->created_at ->diffForHumans()}}</span>
									</div>
								</div>

							</div>

							<div class="hr hr-8 dotted"></div>

							<div class="profile-user-info">
								<div class="profile-info-row">
									<div class="profile-info-name">
										<i class="middle ace-icon fa fa-facebook-square bigger-150 blue"></i>
									</div>

									<div class="profile-info-value">
										<a href="{{$admin->facebook}}" target="_blank">Find me on Facebook</a>
									</div>
								</div>

								<div class="profile-info-row">
									<div class="profile-info-name">
										<i class="middle ace-icon fa fa-twitter-square bigger-150 light-blue"></i>
									</div>

									<div class="profile-info-value">
										<a href="{{ $admin->twitter }}" target="_blank">Follow me on Twitter</a>
									</div>
								</div>
							</div>
						</div><!-- /.col -->
					</div><!-- /.row -->

					<div class="space-20"></div>
					<div class="row">
						<hr>
							<div class="col-xs-12 col-sm-6">
							<div class="widget-box transparent">
								<div class="widget-header widget-header-small">
									<h4 class="widget-title smaller">
									<i class="ace-icon fa fa-check-square-o bigger-110"></i>
										Little About Me
									</h4>
								</div>

								<div class="widget-body">
									<div class="widget-main">
										<strong style="font-family:Helvetica">
											{!! $admin->description !!}
										</strong>
										
									</div>
								</div>
							</div>
						</div>
					</div>
						@endforeach
				</div>
			</div>
		</div>
	</div>

@endsection

