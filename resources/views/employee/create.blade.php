@extends('layout')

@section('title', 'Employee')

@section('content')

  <!-- Page Header (content-header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Add Employee [{{ $organization->title }}]</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Add Employee</li>
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
              <h3 class="card-title">Add Employee for {{ $organization->title }}</h3>
            </div>
            <!-- /.card-header -->

            <!-- /.card-header -->
            <div class="card-body">
                <!-- Employee Form -->
                <form method="post" action="{{ route('employee.store') }}" autocomplete="off">
                    @csrf
                    
                    <!-- Name -->
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name" class="form-control form-control-sm" required>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <!-- Email -->
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" id="email" name="email" class="form-control form-control-sm" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <!-- Designation -->
                            <div class="form-group">
                                <label for="designation">Designation:</label>
                                <select class="form-control form-control-sm" name="designation" id="designation" required>
                                    <option value="">Select Designation</option>
                                        {{-- only the designations available for that organization is given
                                        hence, create form needs organization id --}}
                                        @forelse($organization->designations as $designation)
                                            <option value="{{ $designation }}">{{ $designation }}</option>
                                        @empty              
                                            <option disabled>Designation for the orgnization empty</option>
                                        @endforelse
                                </select>
                            </div> 
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <!-- Password -->
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" id="password" name="password" class="form-control form-control-sm" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <!-- Confirm Password -->
                            <div class="form-group">
                                <label for="confirm_password">Confirm Password:</label>
                                <input type="password" id="confirm_password" name="confirm_password" class="form-control form-control-sm" required>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" id="orgn_id" name="orgn_id" value="{{ $organization->id }}" required>
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