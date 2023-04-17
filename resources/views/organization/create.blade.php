@extends('layout')

@section('title', 'Organization')

@section('content')

  <!-- Page Header (content-header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Add Organization</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Add Organization</li>
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
              <h3 class="card-title">Add Organization</h3>
            </div>
            <!-- /.card-header -->

            <!-- /.card-header -->
            <div class="card-body">
                <!-- Organization Form -->
                <form method="post" action="{{ route('organization.store') }}" autocomplete="off">
                    @csrf
                    <!-- Title -->
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" id="title" name="title" class="form-control form-control-sm" required>
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
                            <!-- Address -->
                            <div class="form-group">
                                <label for="address">Address:</label>
                                <input type="text" id="address" name="address" class="form-control form-control-sm" required>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Description -->
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea id="description" name="description" rows="3" class="form-control form-control-sm"></textarea>
                    </div>        

                    <div class="row">
                        <div class="col-sm-6">
                            <!-- Estd Date -->
                            <div class="form-group">
                                <label for="estd_date">Estd Date:</label>
                                <input type="date" id="estd_date" name="estd_date" class="form-control form-control-sm" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <!-- Status -->
                            <div class="form-group">
                                <label for="status">Status:</label>
                                <select id="status" name="status" class="form-control form-control-sm">
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>  
                        </div>
                    </div>

                    <!-- Designations in Orgn -->
                    <div class="form-group">
                        <label for="designations">Designations:</label>
                        <input type="text" id="designations" name="designations" id="designations" class="form-control form-control-sm" required>
                        <small>Enter designations separated by comma (e.g. manager,developer,designer)</small>
                    </div>        

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