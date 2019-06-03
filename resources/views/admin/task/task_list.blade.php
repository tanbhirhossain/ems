@extends('admin.admin_master')
@section('page_title', 'Task List | EMS')
@section('admin_content')
<div id="content-wrapper">

     <div class="container-fluid">

       <!-- Breadcrumbs-->
       <ol class="breadcrumb">
         <li class="breadcrumb-item">
           <a href="#">Dashboard</a>
         </li>
         <li class="breadcrumb-item active">Task List</li>
       </ol>

       <!-- DataTables Example -->
       <div class="card mb-3">
         <div class="card-header">
           <i class="fas fa-table"></i>
           Task List</div>
           <?php
            $roles = Auth::user()->role;
           ?>
           @if($roles != 'admin')
           <a class="btn btn-primary" href="{{route('task.create')}}">Submit a Task</a>
           @endif
           <small>
                    <p class="text-center  alert-success">{{Session::get('message_success')}}</p>
                    <p class="text-center  alert-danger">{{Session::get('message_error')}}</p>
                </small>
         <div class="card-body">
           <div class="table-responsive">
             <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
               <thead>
                 <tr>
                  @if($roles == 'admin')
                    <th>EMP ID</th>
                    <th>EMP NAME</th>
                  @endif
                   <th>Task Name</th>
                   <th width="20%">Identity Id</th>
                   <th>phone</th>
                   <th>Task time</th>
                   <th>Submitted time</th>
                   <th width="12%">Action</th>
                 </tr>
               </thead>

               <tbody>
                 @foreach($show_task as $task)
                 <tr>
                  @if($roles == 'admin')
                    <td>{{$task->ban_id}}</td>
                    <td>{{$task->name}}</td>
                  @endif
                   <td>

                     <?php
                      if ($task->task_id == 1) {
                        echo "Facebook Page Like";
                      }elseif ($task->task_id == 2) {
                        echo "Youtube Subscribe";
                      }elseif ($task->task_id == 3) {
                        echo "Apps Download & Review";
                      }elseif ($task->task_id == 4) {
                        echo "News Share";
                      }
                     ?>
                  </td>
                   <td id ="description">{{$task->identity_id}}</td>
                   <td>{{$task->phone}}</td>
                   <td>{{$task->time}}</td>
                   <td>{{$task->created_at}}</td>

                   <td>
                     <a class="btn btn-warning"  href="{{route('task.edit', $task->id)}}"><i class="fa fa-edit"></i></a>
                     <a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="{{route('task.destroy', $task->id)}}"><i class="fa fa-trash"></i></a>
                   </td>
                 </tr>
                 @endforeach
               </tbody>
             </table>
           </div>
         </div>
         <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
       </div>

       <p class="small text-center text-muted my-5">
         <em>More table examples coming soon...</em>
       </p>

     </div>
     <!-- /.container-fluid -->

@endsection
