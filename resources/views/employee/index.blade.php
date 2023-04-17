@extends('layout')

@section('title', 'Employee')

@section('content')

  <!-- Page Header (content-header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Employee List</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Employee List</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.page-header -->

   <!-- Main content -->
   <section class="content">
    <div class="container-fluid">

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">

              <div class="row">
                
                {{-- Search Field --}}
                <div class="col-md-6">
                  <form action="{{ route('employee.index') }}" method="get">
                    <div class="input-group input-group-sm" style="width: 300px;">
                      <input type="text" name="table_search" class="form-control float-right" placeholder="Search" value="{{ request()->input('table_search') }}">
                      <div class="input-group-append">
                        <button type="submit" class="btn btn-default">
                          <i class="fas fa-search"></i>
                        </button>
                      </div>
                    </div>
                  </form>
                </div>

                {{-- Button --}}
                <div class="col-md-6 d-flex justify-content-end">
                  {{-- <a href="{{ route('employee.create') }}" class="btn btn-sm btn-primary mr-4">Add Employee</a>  --}}
                </div>
              </div><!-- row -->
              
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Designations</th>
                    <th>Organization</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)

                        <tr>
                            <td>{{ ($users->currentPage()-1) * $users->perPage() + $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->designation }}</td>
                            <td>{{ $user->organization->title }}</td>
                            <td class="d-flex justify-content-start">

                                <!-- Edit Button -->
                                <a href="{{ route('employee.edit', [$user->slug]) }}"" class="btn btn-sm btn-success">
                                    <i class="fas fa-edit aria-hidden="true"></i>
                                </a>
                                &nbsp;

                                <!-- Delete Button -->
                                <form action="{{ route('employee.destroy', [$user->id]) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this employee?')">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                          <td>
                            Table Data Empty!
                          </td>
                        </tr>
                    @endforelse
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
              {{-- Pagination --}}
              
              {{-- {{ $users->links('pagination::bootstrap-4') }} --}}
              {{ $users->links() }}
            </div>
          </div>
          <!-- /.card -->
        </div>
      </div>

    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->

@endsection