@extends('layouts.main')
@include('partials.navbar')
@include('partials.sidebar')
@section('content')
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
            <table class="table">
                <thead>
                    <tr>
                        <th>no</th>
                        <th>nama barang</th>
                        <th>jumlah barang</th>
                        <th>subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cart as $c)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$c->produk_name}}</td>
                        <td>{{$c->jumlah_barang}}</td>
                        <td>{{$c->price_per_unit}}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <form action="{{ route('checkout.store') }}" method="post">
                        @csrf
                        <tr>
                            <td colspan="2">Total :</td>
                            <td>{{ $totalHarga }}</td>
                            <input type="hidden" name="total_price" value="{{ $totalHarga }}">
                        </tr>
                        <tr>
                            <td colspan="3">
                                <select name="metode_pembayaran" id="">
                                    <option value="cash">cash</option>
                                    <option value="transfer">transfer</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3"><button type="submit">bayar</button></td>
                        </tr>
                    </form>
                    
                </tfoot>
            </table>
            
          
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
   
    </div><!--/. container-fluid -->
  </section>
  <!-- /.content -->
</div>

@endsection
  