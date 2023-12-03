
@extends('layouts.adminmaster')

		@section('styles')

		@endsection

							@section('content')

							<!--Page header-->
							<div class="page-header d-xl-flex d-block">
								<div class="page-leftheader">
									<h4 class="page-title"><span class="font-weight-normal text-muted ms-2">{{trans('langconvert.admindashboard.rolepermissions')}}</span></h4>
								</div>
							</div>
							<!--End Page header-->

							<!--Role Create-->
							<div class="col-xl-12 col-lg-12 col-md-12">
								<div class="card ">
									
									<form method="POST" action="{{url('/admin/role/create')}}" enctype="multipart/form-data">
									@csrf

									@honeypot

									<div class="card-header border-0">
										<h4 class="card-title">{{trans('langconvert.admindashboard.createrolepermissions')}}</h4>
										<div class="card-options card-header-styles switch pe-3">
											<div class="switch_section my-0">
												<div class="switch-toggle d-flex float-end mt-2 me-5">
													<a class="onoffswitch2">
														<input type="checkbox"  id="rolecheckall" class=" toggle-class onoffswitch2-checkbox"  >
														<label for="rolecheckall" class="toggle-class onoffswitch2-label" ></label>
													</a>
													<label class="form-label ps-3">{{trans('langconvert.admindashboard.selectall')}}</label>
												</div>
											</div>
											<div class="form-group  ">
												<input type="submit" class="btn btn-secondary" value="{{trans('langconvert.admindashboard.save')}}" onclick="this.disabled=true;this.form.submit();">
											</div>
										</div>
									</div>
										<div class="card-body" >
											
											<div class="row">
												<div class="col-sm-12 col-md-12">
													<div class="">
														<div class="form-group">
															<label class="form-label ">{{trans('langconvert.admindashboard.role')}} <span class="text-red">*</span></label>
															<input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name')}}" >
															@error('name')
	
																<span class="invalid-feedback" role="alert">
																	<strong>{{ $message }}</strong>
																</span>
															@enderror
	
														</div>
													</div>
												</div>
												<div class="col-sm-12 col-md-12">
													<div class="form-group">
														<div class="switch-selectall">
															<label class="form-label">{{trans('langconvert.admindashboard.permissions')}}</label>
															
														</div>

														<div class="row">
															@foreach($permission as $permissions)
															
																<div class="col-xl-3">
																	<div class="switch_section">
																		<div class="switch-toggle d-flex mt-4">
																			<a class="onoffswitch2">
																				<input type="checkbox" name="permission[]" id="myonoffswitch{{$permissions->id}}" class=" toggle-class onoffswitch2-checkbox rolecheck" Value="{{$permissions->id}}" >
																				<label for="myonoffswitch{{$permissions->id}}" class="toggle-class onoffswitch2-label" ></label>
																			</a>
																			<label class="form-label ps-3">{{ $permissions->name }}</label>
																		</div>
																	</div>
																</div>
															@endforeach

														</div>
													</div>
												</div>
												
											</div>
										</div>
										<div class="col-md-12 card-footer ">
											<div class="form-group float-end">
												<input type="submit" class="btn btn-secondary" value="{{trans('langconvert.admindashboard.save')}}" onclick="this.disabled=true;this.form.submit();">
											</div>
										</div>
									</form>
								</div>
							</div>
							<!--End Role Create-->

							@endsection

		@section('scripts')

		<!-- INTERNAL Vertical-scroll js-->
		<script src="{{asset('assets/plugins/vertical-scroll/jquery.bootstrap.newsbox.js')}}?v=<?php echo time(); ?>"></script>

		<!-- INTERNAL Index js-->
		<script src="{{asset('assets/js/support/support-sidemenu.js')}}?v=<?php echo time(); ?>"></script>

		<script type="text/javascript">

			"use strict";

			(function($)  {

				// select all switch
				$('#rolecheckall').on('click', function() {
					if(this.checked){
						$('.rolecheck').each(function(){
							this.checked = true;
						});
					}else{
						$('.rolecheck').each(function(){
							this.checked = false;
						});
					}
					
				});
				
				// select all switch
				$('.rolecheck').on('click',function(){
					if($('.rolecheck:checked').length == $('.rolecheck').length){
						$('#rolecheckall').prop('checked',true);
					}else{
						$('#rolecheckall').prop('checked',false);
					}
				});
				
			})(jQuery);
		</script>
		
		@endsection