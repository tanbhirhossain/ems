@extends('admin.admin_master')
@section('page_title', 'Dashboard | EMS')
@section('admin_content')
<div id="content-wrapper">

  <div class="container-fluid">

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="#">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">Profile</li>
    </ol>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Update Profile</div>

                <div class="card-body">
                    <form method="POST" action="">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Phone</label>
                            <div class="col-md-6">
                              <input type="phone" name="phone" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">BAN id no</label>
                            <div class="col-md-6">
                              <input type="number" name="ban_id" placeholder="LAST 5 DIGIT OF YOUR PHONE NUMBER" class="form-control" required>
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



                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                  Update Profile
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
