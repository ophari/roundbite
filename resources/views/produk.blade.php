{{-- @extends('layouts.main')
@include('partials.navbar')
@include('partials.sidebar')
@section('content')
@extends('partials.modals')
        @section('bodyform')
        <form action="{{ route('produk.store')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group row">
              <label for="produk_name" class="col-sm-2 col-form-label">Nama Produk</label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="produk_name"  name="produk_name">
                  @error('produk_name')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
              </div>
          </div>
          <div class="form-group row">
              <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
              <div class="col-sm-10">
                  <textarea name="deskripsi" id="deskripsi" cols="5" rows="1" class="form-control"></textarea>
                  @error('deskripsi')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
              </div>
          </div>
          <div class="form-group row">
              <label for="price" class="col-sm-2 col-form-label">Harga</label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="price" placeholder="Harga" name="price" >
                  @error('price')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
              </div>
          </div>
          <div class="form-group">
              <label>Kategori</label>
              <select class="form-control select2" style="width: 100%;" name="category_id">
                  <option value="">Pilih Kategori...</option>
                  @foreach ($data as $d)
                      <option value="{{$d->category_id}}">{{$d->category_name}}</option>
                  @endforeach
              </select>
              @error('category_id')
                  <span class="text-danger">{{ $message }}</span>
              @enderror
          </div>
          <div class="form-group row">
              <label for="foto" class="col-sm-2 col-form-label">Photo</label>
              <div class="col-sm-10">
                  <input type="file" class="form-control-file" id="foto" name="image_url">
                  @error('image_url')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
              </div>
          </div>
          <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Kirim</button>
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
                                data-target="#myModal">Tambah Data</button>
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
                      <th>Foto</th>
                      <th>Nama Produk</th>
                      <th>Price</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($produk as $p)
                    <tr>
                      <form action="{{ route('keranjang.store') }}" method="post">
                        @csrf <!-- Tambahkan ini untuk keamanan Laravel -->
                        <input type="hidden" name="produk_id" value="{{$p->produk_id}}">
                        <input type="hidden" name="price_per_unit" value="{{$p->price}}">
                        <input type="hidden" name="produk_name" value="{{$p->produk_name}}">
                        <td>{{$loop->iteration}}</td>
                        <td><img src="{{ Storage::url('images/' . $p->image_url) }}" alt="Gambar Produk" width="200px"></td>
                        <td>{{$p->produk_name}}</td>
                        <td>{{$p->price}}</td>
                       
                        <td>
                          <input type="number" name="jumlah_barang" class="form-control">
                          <button class="btn btn-primary" type="submit">Tambah ke Keranjang</button>
                        </td>
                      </form>
                    </tr>
                    @endforeach
                    
                  </tbody>
                 
                </table>
                
              </div>
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
@endsection --}}


@extends('layouts.main')
@section('content')
    @include('partials.navbar')
    @include('partials.header')
    @include('partials.sidebar')
    <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
          <div class="container-fluid">
           
              <div class="row page-titles mx-0">
                  <div class="col-sm-6 p-md-0">
                      <div class="welcome-text">
                          <h4>Hi, welcome back!</h4>
                          <p class="mb-0">Your business dashboard template</p>
                      </div>
                  </div>
                  <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                      <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="javascript:void(0)">Layout</a></li>
                          <li class="breadcrumb-item active"><a href="javascript:void(0)">Blank</a></li>
                      </ol>
                  </div>
              </div>
              <div class="row">
                @foreach ($produk as $p)
                <div class="col-xl-3 col-lg-6 col-md-4 col-sm-6">
                    <a href="#">
                    <div class="card">
                        <div class="card-body">
                            <div class="new-arrival-product">
                                <div class="new-arrivals-img-contnent">
                                    <img class="img-fluid" src="{{ Storage::url('images/' . $p->image_url) }}" alt="">
                                </div>
                                <div class="new-arrival-content text-center mt-3">
                                    <h4>{{$p->produk_name}}</h4>
                                    <ul class="star-rating">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star-half-empty"></i></li>
                                        <li><i class="fa fa-star-half-empty"></i></li>
                                    </ul>
                                    <span class="price">{{$p->price}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
                @endforeach
                  
                  {{-- <div class="col-xl-3 col-lg-6 col-md-4 col-sm-6">
                      <div class="card">
                          <div class="card-body">
                              <div class="new-arrival-product">
                                  <div class="new-arrivals-img-contnent">
                                      <img class="img-fluid" src="images/product/2.jpg" alt="">
                                  </div>
                                  <div class="new-arrival-content text-center mt-3">
                                      <h4>Striped Dress</h4>
                                      <ul class="star-rating">
                                          <li><i class="fa fa-star"></i></li>
                                          <li><i class="fa fa-star"></i></li>
                                          <li><i class="fa fa-star"></i></li>
                                          <li><i class="fa fa-star"></i></li>
                                          <li><i class="fa fa-star"></i></li>
                                      </ul>
                                      <span class="price">$159.00</span>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-xl-3 col-lg-6 col-md-4 col-sm-6">
                      <div class="card">
                          <div class="card-body">
                              <div class="new-arrival-product">
                                  <div class="new-arrivals-img-contnent">
                                      <img class="img-fluid" src="images/product/3.jpg" alt="">
                                  </div>
                                  <div class="new-arrival-content text-center mt-3">
                                      <h4>BBow polka-dot</h4>
                                      <ul class="star-rating">
                                          <li><i class="fa fa-star"></i></li>
                                          <li><i class="fa fa-star"></i></li>
                                          <li><i class="fa fa-star"></i></li>
                                          <li><i class="fa fa-star"></i></li>
                                          <li><i class="fa fa-star"></i></li>
                                      </ul>
                                      <span class="price">$357.00</span>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-xl-3 col-lg-6 col-md-4 col-sm-6">
                      <div class="card">
                          <div class="card-body">
                              <div class="new-arrival-product">
                                  <div class="new-arrivals-img-contnent">
                                      <img class="img-fluid" src="images/product/4.jpg" alt="">
                                  </div>
                                  <div class="new-arrival-content text-center mt-3">
                                      <h4>Z Product 360</h4>
                                      <ul class="star-rating">
                                          <li><i class="fa fa-star"></i></li>
                                          <li><i class="fa fa-star"></i></li>
                                          <li><i class="fa fa-star"></i></li>
                                          <li><i class="fa fa-star-half-empty"></i></li>
                                          <li><i class="fa fa-star-half-empty"></i></li>
                                      </ul>
                                      <span class="price">$654.00</span>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-xl-3 col-lg-6 col-md-4 col-sm-6">
                      <div class="card">
                          <div class="card-body">
                              <div class="new-arrival-product">
                                  <div class="new-arrivals-img-contnent">
                                      <img class="img-fluid" src="images/product/5.jpg" alt="">
                                  </div>
                                  <div class="new-arrival-content text-center mt-3">
                                      <h4>Chair Grey</h4>
                                      <ul class="star-rating">
                                          <li><i class="fa fa-star"></i></li>
                                          <li><i class="fa fa-star"></i></li>
                                          <li><i class="fa fa-star"></i></li>
                                          <li><i class="fa fa-star"></i></li>
                                          <li><i class="fa fa-star"></i></li>
                                      </ul>
                                      <span class="price">$369.00</span>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-xl-3 col-lg-6 col-md-4 col-sm-6">
                      <div class="card">
                          <div class="card-body">
                              <div class="new-arrival-product">
                                  <div class="new-arrivals-img-contnent">
                                      <img class="img-fluid" src="images/product/6.jpg" alt="">
                                  </div>
                                  <div class="new-arrival-content text-center mt-3">
                                      <h4>fox sake withe</h4>
                                      <ul class="star-rating">
                                          <li><i class="fa fa-star"></i></li>
                                          <li><i class="fa fa-star"></i></li>
                                          <li><i class="fa fa-star"></i></li>
                                          <li><i class="fa fa-star"></i></li>
                                          <li><i class="fa fa-star"></i></li>
                                      </ul>
                                      <span class="price">$245.00</span>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-xl-3 col-lg-6 col-md-4 col-sm-6">
                      <div class="card">
                          <div class="card-body">
                              <div class="new-arrival-product">
                                  <div class="new-arrivals-img-contnent">
                                      <img class="img-fluid" src="images/product/7.jpg" alt="">
                                  </div>
                                  <div class="new-arrival-content text-center mt-3">
                                      <h4>Back Bag</h4>
                                      <ul class="star-rating">
                                          <li><i class="fa fa-star"></i></li>
                                          <li><i class="fa fa-star"></i></li>
                                          <li><i class="fa fa-star"></i></li>
                                          <li><i class="fa fa-star"></i></li>
                                          <li><i class="fa fa-star"></i></li>
                                      </ul>
                                      <span class="price">$364.00</span>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-xl-3 col-lg-6 col-md-4 col-sm-6">
                      <div class="card">
                          <div class="card-body">
                              <div class="new-arrival-product">
                                  <div class="new-arrivals-img-contnent">
                                      <img class="img-fluid" src="images/product/1.jpg" alt="">
                                  </div>
                                  <div class="new-arrival-content text-center mt-3">
                                      <h4>FLARE DRESS</h4>
                                      <ul class="star-rating">
                                          <li><i class="fa fa-star"></i></li>
                                          <li><i class="fa fa-star"></i></li>
                                          <li><i class="fa fa-star"></i></li>
                                          <li><i class="fa fa-star-half-empty"></i></li>
                                          <li><i class="fa fa-star-half-empty"></i></li>
                                      </ul>
                                      <span class="price">$548.00</span>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div> --}}
              </div>
          </div>
      </div>
      <!--**********************************
          Content body end
      ***********************************-->
  
@endsection