@extends('admin/layouts.backend')
@section('title', 'Add Group Tv')
@section('content')

       
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Group Tv <span class="card-description">
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
				<form role="form" action="{{ asset('admin/add_grouptv_action') }}" method="POST" enctype='multipart/form-data'>
				@CSRF
                <div class="form-group">
                  <label for="exampleInputUsername1">name</label>
                  <input type="text" class="form-control @error('title') is-invalid @enderror" name="group_name" id="group_name" value="{{ old('group_name') }}" required placeholder="group name">
				    @error('group_name')
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
