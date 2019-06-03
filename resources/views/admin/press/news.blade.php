@extends('admin.admin_master')
@section('page_title', 'Post News | EMS')
@section('style')
 
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
<style type="text/css">
	body {
  font-family: sans-serif;
  background-color: #eeeeee;
}

.file-upload {
  background-color: #ffffff;
  width: 600px;
  margin: 0 auto;
  padding: 20px;
}

.file-upload-btn {
  width: 100%;
  margin: 0;
  color: #fff;
  background: #1FB264;
  border: none;
  padding: 10px;
  border-radius: 4px;
  border-bottom: 4px solid #15824B;
  transition: all .2s ease;
  outline: none;
  text-transform: uppercase;
  font-weight: 700;
}

.file-upload-btn:hover {
  background: #1AA059;
  color: #ffffff;
  transition: all .2s ease;
  cursor: pointer;
}

.file-upload-btn:active {
  border: 0;
  transition: all .2s ease;
}

.file-upload-content {
  display: none;
  text-align: center;
}

.file-upload-input {
  position: absolute;
  margin: 0;
  padding: 0;
  width: 100%;
  height: 100%;
  outline: none;
  opacity: 0;
  cursor: pointer;
}

.image-upload-wrap {
  margin-top: 20px;
  border: 4px dashed #1FB264;
  position: relative;
}

.image-dropping,
.image-upload-wrap:hover {
  background-color: #1FB264;
  border: 4px dashed #ffffff;
}

.image-title-wrap {
  padding: 0 15px 15px 15px;
  color: #222;
}

.drag-text {
  text-align: center;
}

.drag-text h3 {
  font-weight: 100;
  text-transform: uppercase;
  color: #15824B;
  padding: 60px 0;
}

.file-upload-image {
  max-height: 400px;
  max-width: 600px;
  margin: auto;
  padding: 20px;
}

.remove-image {
  width: 400px;
  margin: 0;
  color: #fff;
  background: #cd4535;
  border: none;
  padding: 10px;
  border-radius: 4px;
  border-bottom: 4px solid #b02818;
  transition: all .2s ease;
  outline: none;
  text-transform: uppercase;
  font-weight: 700;
}

.remove-image:hover {
  background: #c13b2a;
  color: #ffffff;
  transition: all .2s ease;
  cursor: pointer;
}

.remove-image:active {
  border: 0;
  transition: all .2s ease;
}
</style>

<script type="text/javascript">
	function readURL(input) {
  if (input.files && input.files[0]) {

    var reader = new FileReader();

    reader.onload = function(e) {
      $('.image-upload-wrap').hide();

      $('.file-upload-image').attr('src', e.target.result);
      $('.file-upload-content').show();

      $('.image-title').html(input.files[0].name);
    };

    reader.readAsDataURL(input.files[0]);

  } else {
    removeUpload();
  }
}

function removeUpload() {
  $('.file-upload-input').replaceWith($('.file-upload-input').clone());
  $('.file-upload-content').hide();
  $('.image-upload-wrap').show();
}
$('.image-upload-wrap').bind('dragover', function () {
        $('.image-upload-wrap').addClass('image-dropping');
    });
    $('.image-upload-wrap').bind('dragleave', function () {
        $('.image-upload-wrap').removeClass('image-dropping');
});
</script>

@endsection
@section('admin_content')


<div id="content-wrapper">

  <div class="container-fluid">

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="#">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">News</li>
    </ol>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Post a News</div>
                <small>
                         <p class="text-center  alert-success">{{Session::get('message_success')}}</p>
                         <p class="text-center  alert-danger">{{Session::get('message_error')}}</p>
                     </small>
                <div class="card-body">
                    <form method="POST" action="{{ route('news.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="news_title" class="col-md-2 col-form-label text-md-right">News Title</label>


                            <div class="col-md-10">
                              <input type="text" name="news_title" class="form-control" required>

                                @if ($errors->has('news_title'))
                                    <span class="invalidnews_title-feedback" role="alert">
                                        <strong>{{ $errors->first('news_title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" required>
                       
                        <div class="form-group row">
                            <label for="news_details" class="col-md-2 col-form-label text-md-right">News Details</label>


                            <div class="col-md-10">
                              <textarea class="form-control" name="news_details" required></textarea> 
                              <script>
                      			  CKEDITOR.replace( 'news_details' );
                		  	  </script>

                                @if ($errors->has('news_details'))
                                    <span class="invalidnews_title-feedback" role="alert">
                                        <strong>{{ $errors->first('news_details') }}</strong>
                                    </span>
                                @endif
                            </div>


                        </div>

                         <script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
						<div style="margin-left:160px;" class="file-upload form-group row">
            
						  <div class="image-upload-wrap col-md-12">
						    <input class="file-upload-input" name="fetured_image" type='file' onchange="readURL(this);" accept="image/*" />
						    <div class="drag-text">
						      <h3>Drag and drop or select a FEATURED IMAGE</h3>
						    </div>
						  </div>
						  <div class="file-upload-content">
						    <img class="file-upload-image" src="#" alt="your image" />
						    <div class="image-title-wrap">
						      <button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">Uploaded Image</span></button>
						    </div>
						  </div>
						</div>

						<div class="form-group row">
						<label for="news_details" class="col-md-2 col-form-label text-md-right">Others Files/Images</label>
						<div class="col-md-10">
						<div class="col-md-6">
								<input class="form-control" type="file" name="others_1">
							</div>
							<div class="col-md-6">
								<input class="form-control" type="file" name="others_2">
							</div>
							<div class="col-md-6">
								<input class="form-control" type="file" name="others_3">
							</div>
							<div class="col-md-6">
								<input class="form-control" type="file" name="others_4">
							</div>
              <div class="col-md-6">
                <input class="form-control" type="file" name="others_5">
              </div>
              <div class="col-md-6">
                <input class="form-control" type="file" name="others_6">
              </div>
						</div>
						</div>

                     
                            <div class="col-md-12">
                                <button type="submit" name="submit" class="col-md-12 btn btn-success">
                                  Submit a News Post Request
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
@include('admin.press.upload')