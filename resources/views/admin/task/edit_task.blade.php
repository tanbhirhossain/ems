@extends('admin.admin_master')
@section('page_title', 'Edit Task | EMS')
@section('admin_content')
<div id="content-wrapper">

  <div class="container-fluid">

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="#">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">Edit Task</li>
    </ol>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Task</div>
                <small>
                         <p class="text-center  alert-success">{{Session::get('message_success')}}</p>
                         <p class="text-center  alert-danger">{{Session::get('message_error')}}</p>
                     </small>
                <div class="card-body">
                    <form method="post" action="{{ route('task.update', $e_task->id) }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Select Task</label>


                            <div class="col-md-6">
                              <select class="form-control" name="task_id" required>
                                <option value="1">Facebook Page Like</option>
                                <option value="2">Youtube Subscribe</option>
                                <option value="3">Apps Download & Review</option>
                                <option value="4">News Share</option>

                              </select>

                                @if ($errors->has('task_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('task_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" required>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">FB ID /  CHANEL / GMAIL ID / APPS GMAIL ID</label>

                            <div class="col-md-6">
                                <textarea type="text" class="form-control" name="identity_id" value="{{ $e_task->identity_id }}" required>{{ $e_task->identity_id }} </textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Phone Number</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" value="@if($e_task != NULL){{ $e_task->phone }}@endif" name="phone_number">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right" >Time</label>

                            <div class="col-md-6">
                                <input type="time" class="form-control" value="{{$e_task->time}}" name="time" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" name="submit" class="btn btn-primary">
                                  Update Task
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
