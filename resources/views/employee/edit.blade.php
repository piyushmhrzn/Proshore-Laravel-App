@extends('layout')

@section('title', 'Employee')

@section('content')

  <!-- Page Header (content-header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Edit Employee [{{ $user->organization->title }}]</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Edit Employee</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.page-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row d-flex justify-content-center">
        <!-- left column -->
        <div class="col-md-8 col-sm-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Edit Employee for {{ $user->organization->title }}</h3>
            </div>
            <!-- /.card-header -->

            <!-- /.card-header -->
            <div class="card-body">
                <!-- Employee Form -->
                <form method="post" action="{{ route('employee.update', [$user->id]) }}" autocomplete="off">
                    @method('PUT')
                    @csrf
                    
                    <!-- Name -->
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name" value="{{ $user->name }}" class="form-control form-control-sm" required>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <!-- Email -->
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" id="email" name="email"  value="{{ $user->email }}" class="form-control form-control-sm" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <!-- Designation -->
                            <div class="form-group">
                                <label for="designation">Designation:</label>
                                <select class="form-control form-control-sm" name="designation" id="designation" required>
                                    <option value="{{ $user->designation }}">{{ $user->designation }}</option>
                                        @forelse($user->organization->designations as $designation)
                                            <option value="{{ $designation }}">{{ $designation }}</option>
                                        @empty              
                                            <option disabled>Designation for the orgnization empty</option>
                                        @endforelse
                                </select>
                            </div> 
                        </div>
                    </div>

                    <input type="hidden" id="orgn_id" name="orgn_id" value="{{ $user->organization->id }}" required>
                    <button type="submit" class="btn btn-success btn-sm">Submit</button>
                </form> 
                
              </div class="error">
                @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
                @endif
              </div>

            </div>    
          </div>
          <!-- /.card -->

        </div>
        <!--/.col (left) -->

      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->

@endsection