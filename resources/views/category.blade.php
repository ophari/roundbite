@extends('layouts.main')
@include('partials.navbar')
@include('partials.sidebar')
@section('content')
@extends('partials.modals')
        @section('bodyform')
            <form action="{{ route('category.store')}}" method="POST">
                @csrf
                <div class="form-group row">
                    <div class="col-sm-10">
                        <label for="category" class=" form-label">Nama Kategori</label>
                        <input type="text" class="form-control" id="category" name="category_name">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Kirim</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </form>
            
        @endsection
        @section('bodyform-category-update')
        
        <form id="editForm" action="#" method="POST">
          @csrf
          @method('PUT')
          <div class="modal-body">
              <div class="form-group">
                  <label for="edit_category_name">Category Name</label>
                  <input type="text" class="form-control" id="edit_category_name" name="category_name">
              </div>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Update</button>
          </div>
      </form>
        @endsection
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        
      <div class="container-fluid">
        <div class="row">
            
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <div class="card-tools">
                    <div class="input-group input-group-sm " style="width: 350px;">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-primary " data-toggle="modal"
                                data-target="#myModal-category">Tambah Data</button>
                        </div>
                        <input type="text" name="table_search" id="myInput" class="form-control float-right"
                            placeholder="Search" style="margin-left: 5px;">

                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Category</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($data as $category)
                      <tr>
                          <td>{{ $loop->iteration}}</td> 
                          <td>{{ $category->category_name }}</td>
                          <td>
                              <div class="btn-group">
                                  <!-- Tombol Edit untuk membuka modal -->
                                <form style="display: inline;">
                                  <button type="button" class="btn btn-primary openEditModal " style="margin-left: 5px;" data-toggle="modal" data-target="#myModal-category-update-{{ $category->category_id }}" style="display: inline">Edit</button>
                                </form>
                              <form action="{{ route('category.destroy', ['category' => $category->category_id]) }}" method="POST" >
                                  @method('DELETE')
                                  @csrf
                                  <button type="submit" class="btn btn-danger" style="margin-left: 5px;" onclick="return confirm('Apakah Anda Yakin Untuk Menghapus?')">Hapus</button>
                              </form>

                              </div>
                          </td>
                      </tr>
                
                      @endforeach
                   
                      <!-- Modal -->
                      @foreach ($data as $category)
                      <div id="myModal-category-update-{{ $category->category_id }}" class="modal fade" role="dialog">
                          <div class="modal-dialog">
                              <!-- Modal content-->
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <h4 class="modal-title">Update Category</h4>
                                  </div>
                                  <div class="modal-body">
                                      <form method="POST" action="{{ route('category.update', ['category' => $category->category_id]) }}">
                                          @csrf
                                          @method('PUT')
                                          <div class="form-group">
                                              <label for="category_name">Category Name:</label>
                                              <input type="text" class="form-control" id="category_name" name="category_name" value="{{ $category->category_name }}">
                                          </div>
                                          <button type="submit" class="btn btn-primary">Update</button>
                                      </form>
                                  </div>
                              </div>
                          </div>
                      </div>
                      @endforeach
            </div>
            
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        {{-- {{ $data->links() }} --}}
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection