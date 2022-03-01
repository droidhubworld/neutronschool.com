@extends('trainer.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')
{{--
<strong>@lang('strings.backend.dashboard.welcome') {{ $logged_in_user->name }}!</strong>

{!! __('strings.backend.welcome') !!} --}}

<h1 class="h3 mb-3">@lang('labels.general.settings')</h1>

					<div class="row">
						<div class="col-md-3 col-xl-2">

							<div class="card">
								<div class="card-header">
									<h5 class="card-title mb-0">@lang('labels.general.profile_settings')</h5>
								</div>

								<div class="list-group list-group-flush" role="tablist">
									<a class="list-group-item list-group-item-action active" data-bs-toggle="list" href="#account" role="tab">
                                        @lang('labels.general.account')
                                    </a>
									<a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#password" role="tab">
                                        @lang('labels.general.password')
                                    </a>
									<a class="list-group-item list-group-item-action" data-bs-toggle="list" id="showaddress" href="#add_address" role="tab">
                                        @lang('labels.general.add_address')
                                    </a>
									<a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#document" role="tab">
                                        @lang('labels.general.document')
                                    </a>
									<a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#bank_account" role="tab">
                                        @lang('labels.general.bank_account')
                                    </a>
									<a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#delete_account" role="tab">
                                        @lang('labels.general.delete_account')
                                    </a>
								</div>
							</div>
						</div>

						<div class="col-md-9 col-xl-10">
							<div class="tab-content">
                                {{-- accounts panel --}}
								<div class="tab-pane fade show active" id="account" role="tabpanel">

									<div class="card">
										<div class="card-header">
											<div class="card-actions float-end">
												<div class="dropdown position-relative">
													<a href="#" data-bs-toggle="dropdown" data-bs-display="static">
                                                        <i class="align-middle" data-feather="more-horizontal"></i>
                                                    </a>

													<div class="dropdown-menu dropdown-menu-end">
														<a class="dropdown-item" href="#">Action</a>
														<a class="dropdown-item" href="#">Another action</a>
														<a class="dropdown-item" href="#">Something else here</a>
													</div>
												</div>
											</div>
											<h5 class="card-title mb-0">@lang('labels.general.public_info')</h5>
										</div>
										<div class="card-body">
											{{ html()->modelForm($logged_in_user, 'POST', route('trainer.myaccount.profile.update'))->class('form-horizontal')->attribute('enctype', 'multipart/form-data')->open() }}
                                            @method('PATCH')
                                                <div class="row">
													<div class="col-md-8">
														<div class="mb-3">
															{{ html()->label(__('validation.attributes.frontend.first_name'))->class('form-label')->for('first_name') }}
                                                            {{ html()->text('first_name')
                                                            ->class('form-control')
                                                            ->placeholder(__('validation.attributes.frontend.first_name'))
                                                            ->attribute('maxlength', 191)
                                                            ->required()
                                                            ->autofocus() }}
														</div>
														<div class="mb-3">
															{{ html()->label(__('validation.attributes.frontend.last_name'))->class('form-label')->for('last_name') }}

                                                            {{ html()->text('last_name')
                                                                ->class('form-control')
                                                                ->placeholder(__('validation.attributes.frontend.last_name'))
                                                                ->attribute('maxlength', 191)
                                                                ->required() }}
                                                        </div>
													</div>
													<div class="col-md-4">
														<div class="text-center">
															<img alt="{{ $logged_in_user->full_name }}" src="{{ $logged_in_user->picture }}" class="rounded-circle img-responsive mt-2" width="128" height="128" />
															<div class="form-group">
                                                                {{-- {{ html()->label(__('validation.attributes.frontend.avatar'))->for('avatar') }} --}}

                                                                <div>
                                                                    <input type="radio" name="avatar_type" value="gravatar" {{ $logged_in_user->avatar_type == 'gravatar' ? 'checked' : '' }} /> Gravatar
                                                                    <input type="radio" name="avatar_type" value="storage" {{ $logged_in_user->avatar_type == 'storage' ? 'checked' : '' }} /> Upload

                                                                    @foreach($logged_in_user->providers as $provider)
                                                                        @if(strlen($provider->avatar))
                                                                            <input type="radio" name="avatar_type" value="{{ $provider->provider }}" {{ $logged_in_user->avatar_type == $provider->provider ? 'checked' : '' }} /> {{ ucfirst($provider->provider) }}
                                                                        @endif
                                                                    @endforeach
                                                                </div>
                                                            </div><!--form-group-->
                                                            <div class="mt-2">
																{{ html()->file('avatar_location')->class('form-control-file') }}
                                                                {{-- <span class="btn btn-primary"><i class="fa fa-upload"></i> </span> --}}
															</div>
															<small>@lang('labels.general.profile_image_hint')</small>
														</div>
													</div>
												</div>
                                                {{ form_submit(__('labels.general.buttons.update'))->class('btn btn-primary') }}
											{{ html()->form()->close() }}

										</div>
									</div>

									<div class="card">
										<div class="card-header">
											<div class="card-actions float-end">
												<div class="dropdown position-relative">
													<a href="#" data-bs-toggle="dropdown" data-bs-display="static">
                  <i class="align-middle" data-feather="more-horizontal"></i>
                </a>

													<div class="dropdown-menu dropdown-menu-end">
														<a class="dropdown-item" href="#">Action</a>
														<a class="dropdown-item" href="#">Another action</a>
														<a class="dropdown-item" href="#">Something else here</a>
													</div>
												</div>
											</div>
											<h5 class="card-title mb-0">Private info</h5>
										</div>
										<div class="card-body">
											<form>
												<div class="row">
													<div class="mb-3 col-md-6">
														<label for="inputFirstName" class="form-label">First name</label>
														<input type="text" class="form-control" id="inputFirstName" placeholder="First name">
													</div>
													<div class="mb-3 col-md-6">
														<label for="inputLastName" class="form-label">Last name</label>
														<input type="text" class="form-control" id="inputLastName" placeholder="Last name">
													</div>
												</div>
												<div class="mb-3">
													<label for="inputEmail4" class="form-label">Email</label>
													<input type="email" class="form-control" id="inputEmail4" placeholder="Email">
												</div>
												<div class="mb-3">
													<label for="inputAddress" class="form-label">Address</label>
													<input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
												</div>
												<div class="mb-3">
													<label for="inputAddress2" class="form-label">Address 2</label>
													<input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
												</div>
												<div class="row">
													<div class="mb-3 col-md-6">
														<label for="inputCity" class="form-label">City</label>
														<input type="text" class="form-control" id="inputCity">
													</div>
													<div class="mb-3 col-md-4">
														<label for="inputState" class="form-label">State</label>
														<select id="inputState" class="form-control">
                    <option selected>Choose...</option>
                    <option>...</option>
                  </select>
													</div>
													<div class="mb-3 col-md-2">
														<label for="inputZip" class="form-label">Zip</label>
														<input type="text" class="form-control" id="inputZip">
													</div>
												</div>
												<button type="submit" class="btn btn-primary">Save changes</button>
											</form>

										</div>
									</div>

								</div>
                                {{-- accounts panel end --}}

                                {{-- password panel --}}
								<div class="tab-pane fade" id="password" role="tabpanel">
									<div class="card">
										<div class="card-body">
											<h5 class="card-title">Password</h5>

											{{ html()->form('PATCH', route('frontend.auth.password.update'))->class('form-horizontal')->open() }}
												<div class="mb-3">
                                                    {{ html()->label(__('validation.attributes.frontend.current_password'))->class('form-label')->for('old_password') }}

                                                    {{ html()->password('old_password')
                                                        ->class('form-control')
                                                        ->placeholder(__('validation.attributes.frontend.old_password'))
                                                        ->autofocus()
                                                        ->required() }}
													<small><a href="#">Forgot your password?</a></small>
												</div>
												<div class="mb-3">
                                                    {{ html()->label(__('validation.attributes.frontend.password'))->class('form-label')->for('password') }}

                                                    {{ html()->password('password')
                                                        ->class('form-control')
                                                        ->placeholder(__('validation.attributes.frontend.password'))
                                                        ->required() }}
                                                </div>
												<div class="mb-3">
                                                    {{ html()->label(__('validation.attributes.frontend.password_confirmation'))->class('form-label')->for('password_confirmation') }}

                                                    {{ html()->password('password_confirmation')
                                                        ->class('form-control')
                                                        ->placeholder(__('validation.attributes.frontend.password_confirmation'))
                                                        ->required() }}
                                                </div>
                                                {{ form_submit(__('labels.general.buttons.update') . ' ' . __('validation.attributes.frontend.password'))->class('btn btn-primary') }}

                                            {{ html()->form()->close() }}

										</div>
									</div>
								</div>
                                {{-- password panel end --}}

								{{-- add_address panel --}}
								<div class="tab-pane fade" id="add_address" role="tabpanel">
									<div class="card">
										<div class="card-body">

										<table id="pages-table" class="table" data-ajax_url="{{ route("trainer.address.get") }}">
											<thead>
												<tr>
												<th>{{ trans('addresses.title') }}</th>
												<th>{{ trans('addresses.fields.city') }}</th>
												<th>{{ trans('addresses.fields.state') }}</th>
												<th>{{ trans('addresses.fields.status') }}</th>
												<th>{{ trans('addresses.fields.post_code') }}</th>
												<th>{{ trans('labels.general.actions') }}</th>
												</tr>
											</thead>
											<tbody>
											</tbody>
										</table>


											<h5 class="card-title">@lang('labels.general.add_address')</h5>

											{{ html()->modelForm($logged_in_user, 'POST', route('trainer.address.store'))->class('form-horizontal')->attribute('enctype')->open() }}
											{{-- Form::open(['route' => 'trainer.address.store', 'class' => 'form-horizontal', 'address' => 'form', 'method' => 'post', 'id' => 'create-address']) --}}

                                                <div class="row">
													<div class="col-md-8">
														<div class="mb-3">
															{{ html()->label(__('addresses.fields.address1'))->class('form-label')->for('address1') }}
                                                            {{ html()->text('address1')
                                                            ->class('form-control')
                                                            ->placeholder(__('addresses.fields.address1'))
                                                            ->attribute('maxlength', 200)
                                                            ->required()
                                                            ->autofocus() }}
														</div>
														<div class="mb-3">
															{{ html()->label(__('addresses.fields.address2'))->class('form-label')->for('address2') }}
                                                            {{ html()->text('address2')
                                                            ->class('form-control')
                                                            ->placeholder(__('addresses.fields.address2'))
                                                            ->attribute('maxlength', 200)
                                                            ->autofocus() }}
                                                        </div>
														<div class="mb-3">
															{{ html()->label(__('addresses.fields.city'))->class('form-label')->for('city') }}
                                                            {{ html()->text('city')
                                                            ->class('form-control')
                                                            ->placeholder(__('addresses.fields.city'))
                                                            ->attribute('maxlength', 200)
                                                            ->required()
                                                            ->autofocus() }}
                                                        </div>
														<div class="mb-3">
															{{ html()->label(__('addresses.fields.state'))->class('form-label')->for('state') }}
                                                            {{ html()->text('state')
                                                            ->class('form-control')
                                                            ->placeholder(__('addresses.fields.state'))
                                                            ->attribute('maxlength', 200)
                                                            ->required()
                                                            ->autofocus() }}
                                                        </div>
														<div class="mb-3">
															{{ html()->label(__('addresses.fields.post_code'))->class('form-label')->for('post_code') }}
                                                            {{ html()->text('post_code')
                                                            ->class('form-control')
                                                            ->placeholder(__('addresses.fields.post_code'))
                                                            ->attribute('maxlength', 200)
                                                            ->required()
                                                            ->autofocus() }}
                                                        </div>														
														<div class="mb-3">
															{{ html()->label(__('addresses.fields.country'))->class('form-label')->for('country_id') }}
                                                            {{ html()->text('country_id')
                                                            ->class('form-control')
                                                            ->placeholder(__('addresses.fields.country'))
                                                            ->attribute('maxlength', 200)
                                                            ->required()
                                                            ->autofocus() }}
                                                        </div>
													</div>
													
												</div>
                                                {{ form_submit(__('labels.general.buttons.save'))->class('btn btn-primary') }}
											{{ html()->form()->close() }}

										</div>
									</div>
								</div>
								{{-- add_address panel end --}}

                                {{-- document panel --}}
								<div class="tab-pane fade" id="document" role="tabpanel">
									<div class="card">
										<div class="card-body">
											<h5 class="card-title">@lang('labels.general.document')</h5>



										</div>
									</div>
								</div>
                                {{-- document panel end --}}

                                {{-- bank_account panel --}}
								<div class="tab-pane fade" id="bank_account" role="tabpanel">
									<div class="card">
										<div class="card-body">
											<h5 class="card-title">@lang('labels.general.bank_account')</h5>



										</div>
									</div>
								</div>
                                {{-- bank_account panel end --}}

                                {{-- delete_account panel --}}
								<div class="tab-pane fade" id="delete_account" role="tabpanel">
									<div class="card">
										<div class="card-body">
											<h5 class="card-title">@lang('labels.general.delete_account')</h5>



										</div>
									</div>
								</div>
                                {{-- delete_account panel end--}}
							</div>
						</div>
					</div>




@endsection

@section('pagescript')

<script>
 $('#showaddress').click(function (e) {
        e.preventDefault();
		//alert("sdasdasd");
        FTX.Address.list.init();
    });

</script>
@endsection
