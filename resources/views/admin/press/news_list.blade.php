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
         <li class="breadcrumb-item active">News List</li>
       </ol>

       <!-- DataTables Example -->
       <div class="card mb-3">
         <div class="card-header">
           <i class="fas fa-table"></i>
           News List</div>
           <?php
            $roles = Auth::user()->role;
           ?>
           @if($roles != 'admin')
           <a class="btn btn-primary" href="{{route('news.index')}}">Submit a News Post Request</a>
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
                   <th>Title</th>
                   
                   <th width="40%">Details</th>
                   <th>Time</th>
                   <th width="11%">Status</th>
                   <th width="13%">Action</th>
                 </tr>
               </thead>

               <tbody>
                 @foreach($show_news as $task)
                 <tr>
                  @if($roles == 'admin')
                    <td>{{$task->ban_id}}</td>
                    <td>{{$task->name}}</td>
                  @endif
                   <td>{{$task->news_title}}</td>
                  <td>{{ str_limit($task->news_details, $limit = 200, $end = '.............') }} <a class=""  href="{{route('admin-news.show', $task->id)}}">Details.....</a></td>                   <td>{{$task->created_at}}</td>
                   <td>
                    @if($roles == 'admin')
                        @if($task->status == NULL)
                        <i style="padding: 10px; border: 2px solid black; padding-left: 20px; padding-right: 20px;"  class="btn btn-primary">In Review</i>
                       @elseif($task->status == 1)
                        <i style="padding: 10px; border: 2px solid black; padding-left: 20px; padding-right: 20px;" class="btn btn-success">Published</i>
                       @elseif($task->status == 2)
                        <i style="padding: 10px; border: 2px solid black; padding-left: 20px; padding-right: 20px;" class="btn btn-danger">violated &nbsp;</i>

                       @endif
                       <hr>

                        <a style="color:white" class="btn btn-primary">In Review&nbsp;</a>
                        <a style="color:white" class="btn btn-success">Published</a>
                        <a  style="color:white" class="btn btn-danger">violated&nbsp;&nbsp;&nbsp;</a>

                    @else
                       @if($task->status == NULL)
                        <button class="btn btn-primary">In Review</button>
                       @elseif($task->status == 1)
                        <button class="btn btn-success">Published</button>
                       @elseif($task->status == 2)
                        <button class="btn btn-danger">violated</button>
                       @endif
                    @endif



                   </td>
                

                   <td>

                     <a class="btn btn-primary"  href="{{route('news.show', $task->id)}}"><i class="fa fa-eye"></i></a>

                     <a class="btn btn-warning"  href="{{route('news.edit', $task->id)}}"><i class="fa fa-edit"></i></a>

                     <a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="{{route('news.destroy', $task->id)}}"><i class="fa fa-trash"></i></a>

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
