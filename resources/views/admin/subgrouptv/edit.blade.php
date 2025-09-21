@extends('admin/layouts.backend')
@section('title', 'Edit Group Tv')
@section('content')


<div class="main-panel">        
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Sub Group Tv <span class="card-description">
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
				<form role="form" action="{{ asset('admin/edit_subgrouptv_action') }}" method="POST" enctype='multipart/form-data'>
				@CSRF
				<input type="hidden" name="id" value="{{ $grouptvInfo->id }}" required>
				<div class="form-group">                  
                    <label>Group</label>
                    <select class="js-example-basic-single w-100  @error('group_id') is-invalid @enderror" name="group_id">
						@if(isset($grouptv))							
							@foreach($grouptv as $list)
							  <option value="{{ $list->id }}" @if($list->id == $grouptvInfo->group_id) {{"selected"}} @endif >{{ $list->group_name }}</option>							  
							@endforeach
						@endif
                    </select>					
					@error('group_id')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
                  </div>
				  
				
                <div class="form-group">
                  <label for="exampleInputUsername1">Sub Group Name</label>
                  <input type="text" class="form-control @error('sub_group_name') is-invalid @enderror" name="sub_group_name" id="sub_group_name" value="{{ $grouptvInfo->sub_group_name }}" required placeholder="Sub group name">
				    @error('sub_group_name')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
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
</div>

@endsection
