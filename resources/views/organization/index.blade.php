@extends('layout')

@section('title', 'Organization')

@section('content')

  <!-- Page Header (content-header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Organization List</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Organization</li>
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
                  <div class="input-group input-group-sm" style="width: 300px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>

                {{-- Button --}}
                <div class="col-md-6 d-flex justify-content-end">
                  <a href="{{ route('organization.create') }}" class="btn btn-sm btn-primary mr-4">Add Organization</a> 
                </div>
              </div><!-- row -->

            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Orgn Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Employees</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse ($organizations as $organization)
                        
                        <tr>
                          {{-- 
                            1. $organizations->currentPage() ==> retrieves the current page number being displayed.
                            2. $organizations->perPage() ==> retrieves the number of items displayed per page.
                            3. $loop->iteration ==> is a variable provided by the @forelse loop. It contains 
                               the current iteration of the loop, which increments for every organization displayed. 
                          --}}
                            <td>{{ ($organizations->currentPage()-1) * $organizations->perPage() + $loop->iteration }}</td>
                            <td>{{ $organization->title }}</td>
                            <td>{{ $organization->email }}</td>
                            <td>{{ $organization->address }}</td>
                            <td>{{ $organization->users_count }}</td>
                            {{-- <td>{{ $organization->totalEmployees() }}</td> --}}
                            <td class="d-flex justify-content-start">

                                <!-- View Button -->
                                <a href="{{ route('organization.show', [$organization->slug]) }}" class="btn btn-sm btn-primary">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </a>
                                &nbsp;

                                <!-- Edit Button -->
                                <a href="{{ route('organization.edit', [$organization->slug]) }}" class="btn btn-sm btn-success">
                                    <i class="fas fa-edit aria-hidden="true"></i>
                                </a>
                                &nbsp;

                                <!-- Delete Button -->
                                <form action="{{ route('organization.destroy', [$organization->id]) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this organization?')">
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
                {{ $organizations->links() }}
            </div>
          </div>
          <!-- /.card -->
        </div>
      </div>

    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->

@endsection