@extends('admin/layouts.backend')
@section('title', 'Add Tv')
@section('content')

        
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Tv <span class="card-description">
                Add
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
				<form role="form" action="{{ asset('admin/add_tv_action') }}" method="POST" enctype='multipart/form-data'>
				@CSRF
				
				<!-- <div class="form-group">                  
                    <label>Group</label>
                    <select class="js-example-basic-single w-100  @error('group_id') is-invalid @enderror" name="group_id">
						@if(isset($grouptv))							
							@foreach($grouptv as $list)
							  <option value="{{ $list->id }}">{{ $list->group_name }}</option>							  
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
                    <label>Sub Group</label>
                    <select class="js-example-basic-single w-100  @error('sub_group_id') is-invalid @enderror" name="sub_group_id">
						@if(isset($Subgrouptv))							
							@foreach($Subgrouptv as $list)
							  <option value="{{ $list->id }}">{{ $list->sub_group_name }}</option>							  
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
                  <label for="exampleInputUsername1">Tv Number</label>
                  <input type="text" class="form-control @error('tv_number') is-invalid @enderror" name="tv_number" id="tv_number" value="{{ old('tv_number') }}" required placeholder="Tv Number">
				    @error('tv_number')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
                </div>
				
				<div class="form-group">
                  <label for="exampleInputUsername1">Tv Name</label>
                  <input type="text" class="form-control @error('tv_name') is-invalid @enderror" name="tv_name" id="tv_name" value="{{ old('tv_name') }}" required placeholder="Tv Name">
				    @error('tv_number')
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

@endsection
