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
         <li class="breadcrumb-item active">News View</li>
       </ol>

       <div class="row">
         <div class="col-md-7">
            <h3>@if($show_news != Null){!! $show_news->news_title !!}@endif</h3>
            <div>{!! $show_news->news_details !!}</div>
         </div>

         <div class="col-md-5">
            <p>Fetured Image</p>
             <img src="{{asset($show_news->fetured_image)}}"></img>

             <p>Others Image 1</p>
             <img src="{{asset($show_news->others_1)}}"></img>
             <p>Others Image 2</p>
             <img src="{{asset($show_news->others_2)}}"></img>
             <p>Others Image 3</p>
             <img src="{{asset($show_news->others_3)}}"></img>
             <p>Others Image 4</p>
             <img src="{{asset($show_news->others_4)}}"></img>
             <p>Others Image 5</p>
             <img src="{{asset($show_news->others_5)}}"></img>
             <p>Others Image 6</p>
             <img src="{{asset($show_news->others_6)}}"></img>
               </div>
       </div>

      

      

@endsection