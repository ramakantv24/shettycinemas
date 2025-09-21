@extends('admin/layouts.backend')
@section('title', 'Edit Tv')
@section('content')

       
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title"> Tv <span class="card-description">
                Edit
              </span></h4>
              
                @if(session()->has('success'))
					<div class="alert alert-success">
					  <strong>Success!</strong> {{ session()->get('success') }}
					</div>
				@endif
				@if(session()->has('error'))
					<div class="alert alert-danger">
						<strong>Warning!</strong> {{ session()->get('error') }}
					</div>
				@endif
				<form role="form" action="{{ asset('admin/edit_tvdata_action') }}" method="POST" enctype='multipart/form-data'>
				@CSRF
				<input type="hidden" name="id" value="{{ $TvtypeInfo->id }}" required>
				<div class="form-group">                  
                    <label>Group</label>
                    <select class="js-example-basic-single w-100  @error('group_id') is-invalid @enderror" name="group_id">
						@if(isset($grouptv))							
							@foreach($grouptv as $list)
							  <option value="{{ $list->id }}" @if($list->id == $TvtypeInfo->group_id) {{"selected"}} @endif >{{ $list->group_name }}</option>							  
							@endforeach
						@endif
                    </select>					
					@error('group_id')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
                </div>
				
				<!-- <div class="form-group">                  
                    <label>Sub Group</label>
                    <select class="js-example-basic-single w-100  @error('sub_group_id') is-invalid @enderror" name="sub_group_id">
						@if(isset($Subgrouptv))							
							@foreach($Subgrouptv as $list)
							  <option value="{{ $list->id }}" @if($list->id == $TvtypeInfo->sub_group_id) {{"selected"}} @endif >{{ $list->sub_group_name }}</option>							  
							@endforeach
						@endif
                    </select>					
					@error('sub_group_id')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
                </div> -->
				
				<div class="form-group">                  
                    <label>Tv Type</label>
                    <select class="js-example-basic-single w-100  @error('tv_type_id') is-invalid @enderror" name="tv_type_id">
						@if(isset($Tvtype))							
							@foreach($Tvtype as $list)
							  <option value="{{ $list->id }}" @if($list->id == $TvtypeInfo->tv_type_id) {{"selected"}} @endif >{{ $list->tv_name }}</option>							  
							@endforeach
						@endif
                    </select>					
					@error('tv_type_id')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
                </div>
				  
				
                <div class="form-group">                  
                    <label>Type</label>
                    <select id="typefile" class="w-100  @error('type') is-invalid @enderror" name="type">
						<option value="Image" @if('Image' == $TvtypeInfo->type) {{"selected"}} @endif >Image</option>
						<option value="Video" @if('Video' == $TvtypeInfo->type) {{"selected"}} @endif >Video</option>
                    </select>					
					@error('type')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
                </div>
				  
				<div class="form-group" id="imageType">
                  <label for="exampleInputUsername1">Image</label>
                  <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="image" >
				    @error('image')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
					
                </div>
				
				<!-- <div class="form-group" id="videoLink" style="display:none;">
                  <label for="exampleInputUsername1">Enter the youtube video id only</label>
                  <input type="text" class="form-control @error('video_link') is-invalid @enderror" name="video_link" id="video_link" value="{{ old('video_link') }}" placeholder="Enter the youtube video id only">
				    @error('video_link')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
                </div> -->

                <div class="form-group col-6" id="videoLink" style="display:none;">                    
                    <div class="row" style="margin-top: 28px;">
                        <div class="form-group col-6">
                            <button type="button" class="btn btn-primary upload-btn uploadbtn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i class="mdi mdi-upload"></i> Add Video</button>
                        </div>
                        <div class="form-group col-6">
                            <input type="text" class="form-control @error('video_link') is-invalid @enderror" name="video_link" id="video_link" value="{{ $TvtypeInfo->value }}" placeholder="Enter the video id only">
                        </div>
                    </div>                    
                </div> 
                

                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <!-- <button class="btn btn-light">Cancel</button> -->
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>  
    <!-- content-wrapper ends -->

<div class="modal fade" id="exampleModal" tabindex="-1	" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title " id="exampleModalLabel">Upload Video</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body mt-2">
                <form id="fileUploadForm" method="POST" action="{{ asset('admin/upload_tvvideo_action') }}" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="form-group mb-3">
                        <input name="videofile" type="file" class="form-control">
                    </div>

                    <div class="form-group">
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
                        </div>
                    </div>

                    <div class="d-grid mb-3">
                        <input type="submit" value="Submit" class="btn btn-primary">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
<script>
$(document).ready(function(){
        $(".uploadbtn").click(function(){
            $("#exampleModal").modal('show');
        });
        $(".btn-close").click(function(){
            $("#exampleModal").modal('hide');
        });
    });
</script>
<script>     
    $(function() {
        $(document).ready(function() {
            $('#fileUploadForm').ajaxForm({
                cache: false,
                beforeSend: function() {
                    var percentage = '0';
                },
                uploadProgress: function(event, position, total, percentComplete) {
                    var percentage = percentComplete;
                    $('.progress .progress-bar').css("width", percentage + '%', function() {
                        return $(this).attr("aria-valuenow", percentage) + "%";
                    })
                },
                success: function(res) {
                    if (res.success) {
                        alert('Add Successfully');

                        $("#video_link").val(res.file_name);             

                        $("#fileUploadForm")[0].reset();
                        $(".modal .btn-close").click();
                        var percentage = '0';
                        $('.progress .progress-bar').css("width", percentage + '%', function() {
                            return $(this).attr("aria-valuenow", percentage) + "%";
                        });
                    }
                }
            });
        });
    });    
</script> 

<script>
$(function() {	
    $('#typefile').change(function(){
        if(this.value == "Image"){
			$('#videoLink').hide();
			$('#imageType').show();
		}else if(this.value == "Video"){
			$('#videoLink').show();
			$('#imageType').hide();
		}			
    });

    var ftype = "{{ $TvtypeInfo->type ?? "" }}";
	
	if(ftype=="Image"){
		$('#videoLink').hide();
		$('#imageType').show();
	}else if(ftype == "Video"){
		$('#videoLink').show();
		$('#imageType').hide();
	}

});
</script>

@endsection
