@extends('admin.admin_master')
@section('page_title', 'Register | EMS')
@section('admin_content')
<?php
$roles = Auth::user()->role;

?>

@if($roles == 'superAdmin')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>
                <small>
                         <p class="text-center  alert-success">{{Session::get('message_success')}}</p>
                         <p class="text-center  alert-danger">{{Session::get('message_error')}}</p>
                     </small>
                <div class="card-body">
                    <form method="POST" action="{{ route('store.user') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="phone" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" required>

                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Ban Id No') }}</label>

                            <div class="col-md-6">
                                <input id="ban_id" type="number" class="form-control{{ $errors->has('ban_id') ? ' is-invalid' : '' }}" name="ban_id" value="{{ old('ban_id') }}" required>

                                @if ($errors->has('ban_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('ban_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                          <label for="role" class="col-md-4 col-form-label text-md-right">Role</label>

                          <div class="col-md-6">
                              <select name="role" class="form-control" >
                                <option value="">Select Role</option>
                                  <option value="admin">Admin</option>
                                  <option value="office">Office</option>
                                  <option value="press">Press</option>
                                  <option value="agent">Agent</option>
                                  <option value="customer">Customer</option>
                              </select>
                          </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Position</label>
                            <div class="col-md-6">
                              <input type="text" name="position" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Division</label>
                            <div class="col-md-6">
                              <select class="form-control" name="division" required>
                                <option value="">Select Division</option>
                                <option value="dhaka">Dhaka</option>
                                <option value="chittagong">Chittagong</option>
                                <option value="rajshahi">Rajshahi</option>
                                <option value="khulna">Khulna</option>
                                <option value="sylhet">Sylhet</option>
                                <option value="barishal">Barishal</option>
                                <option value="mymensingh">Mymensingh</option>
                                <option value="rangpur">Rangpur</option>
                              </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">District</label>
                            <div class="col-md-6">
                              <input type="text" name="district" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Upozila</label>
                            <div class="col-md-6">
                              <input type="text" name="upozila" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Union</label>
                            <div class="col-md-6">
                              <input type="text" name="union" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Ward</label>
                            <div class="col-md-6">
                              <input type="text" name="ward" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Blood Group</label>
                            <div class="col-md-6">
                              <input type="text" name="blood_group" class="form-control" required>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Work Since</label>
                            <div class="col-md-6">
                              <input type="date" name="ward" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Expired Contact</label>
                            <div class="col-md-6">
                              <input type="date" name="ward" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@else
<h1 style="text-align:center;">You have no rights to do that. please contact with Administrator</h1>
@endif
@endsection
