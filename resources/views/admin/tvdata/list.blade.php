@extends('admin/layouts.backend')
@section('title', 'Tv Data List')
@section('content')

<div class="content-wrapper">
<div class="row">
<div class="col-lg-12 stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Tv Data  <span class="card-description">
                   List
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
                  <div class="table-responsive">
                    <table class="table table-bordered table-striped project-orders-table">
                      <thead>
                        <tr>
							<th>#</th>
							<th>Group Name</th>
							<th>File Type</th>
							<th>Tv Number</th>
							<th>Tv Name</th>							
							<th>Created At</th>
							<th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @if(isset($tv))
							@php
								$i=1;
							@endphp
							@foreach($tv as $list)
								
								<tr>
									<td>{{ $i }}</td>
									<td>{{ $list->group_name }}</td>
									<td>{{ $list->type }}</td>
									<td>{{ $list->tv_number }}</td>
									<td>{{ $list->tv_name }}</td>
									<td>{{ $list->created_at }}</td>
									<td><a href="{{ url('/admin/tvdata/edit') }}/{{ $list->id }}"><button type="button" class="btn btn-success btn-sm btn-icon-text mr-3">Edit <i class="typcn typcn-edit btn-icon-append"></i></button></a> <a href="{{ url('/admin/tvdata/delete') }}/{{ $list->id }}" onclick="return validateDelete(this);"><button type="button" class="btn btn-danger btn-sm btn-icon-text">Delete <i class="typcn typcn-delete-outline btn-icon-append"></i></button></a></td>
								</tr>
								@php
									$i++;
								@endphp
							@endforeach
						@endif
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            </div>
            </div>
 
<script>
  function validateDelete(){ 
	var confirms = confirm('Do you want to delete ?.');
	if(confirms==false){
		return false;
	}
  }
</script>

@endsection
