@extends('layouts.main')
@section('content')
    @include('partials.navbar')
    @include('partials.header')
    @include('partials.sidebar')
    <div class="content-body">
        <div class="container-fluid">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Table Data Produk</h4>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#modal_produk_baru">Tambah Produk</button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-responsive-sm">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Produk</th>
                                        <th>Deskripsi</th>
                                        <th>Price</th>
                                        <th>foto</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($produk as $p)
                                        <tr>
                                            <td>{{ $loop->index + 1 + ($produk->perPage() * ($produk->currentPage() - 1)) }}</td>
                                            <td>{{ $p->produk_name }}</td>
                                            <td>{{ $p->deskripsi }}</td>
                                            <td>{{ $p->price }}</td>
                                            <td><img src="{{ Storage::url('images/' . $p->image_url) }}" alt="Gambar Produk" width="80px" class="rounded-circle"></td>
                                            <td>
                                                <div class="btn-group">
                                                    <!-- Tombol Edit untuk membuka modal -->
                                                    <form style="display: inline;">
                                                        <div class="btn-group">
                                                            <!-- Tombol Edit untuk membuka modal -->
                                                            <button type="button" class="btn btn-primary" style="margin-left: 5px;" data-toggle="modal" data-target="#modal_update_produk-{{ $p->produk_id }}">Edit</button>
                                                        </div>
                                                    </form>
                                                    <form action="{{ route('admin_produk.destroy', $p->produk_id) }}" method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger" style="margin-left: 5px;" onclick="return confirm('Apakah Anda Yakin Untuk Menghapus?')">Hapus</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        {{ $produk->links() }}
                    </div>
                </div>
                <!-- /# card -->
            </div>

             
             <!-- Modal -->
             <div class="modal fade" id="modal_produk_baru">
                 <div class="modal-dialog modal-dialog-centered" role="document">
                     <div class="modal-content">
                         <div class="modal-header">
                             <h5 class="modal-title">Masukan Produk Baru</h5>
                             <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                             </button>
                         </div>
                         
                         <div class="modal-body">
                           <div class="basic-form">
                                    <form action="admin_produk" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" class="form-control input-rounded" placeholder="Nama Produk" name="produk_name">
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control" rows="4" id="comment" placeholder="Deskripsi" name="deskripsi"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control input-rounded" placeholder="Harga" name="price">
                                        </div>
                                        <div class="form-group">
                                            <div class="form-group">
                                                
                                                <select class="form-control" name="category_id">
                                                    <option value="">Pilih Kategori</option>
                                                    @foreach ($data as $d)
                                                        <option value="{{$d->category_id}}">{{$d->category_name}}</option>
                                                    @endforeach
                                                </select>
                                                
                                            </div>
                                            
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="image_url">
                                                <label class="custom-file-label">Choose file</label>
                                            </div>
                                        </div>
                                </div>
                         </div>
                         <div class="modal-footer">
                             <button type="button" class="btn btn-danger light" data-dismiss="modal">Close</button>
                             <button type="submit" class="btn btn-primary sweet-success">Kirim</button>
                         </div>
                        </form>
                     </div>
                 </div>
             </div>
             
             
             @foreach ($produk as $p)
             <div class="modal fade" id="modal_update_produk-{{ $p->produk_id }}">
                <div class="modal-dialog modal-dialog-centered" role="document" >
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Update Produk</h5>
                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <div class="basic-form">
                                <form action="{{ route('admin_produk.update', $p->produk_id) }}" method="POST" enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" class="form-control input-rounded" placeholder="Nama Produk" name="produk_name" value="{{ $p->produk_name }}">
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="4" id="comment" placeholder="Deskripsi" name="deskripsi">{{ $p->deskripsi }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control input-rounded" placeholder="Harga" name="price" value="{{ $p->price }}">
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control" name="category_id">
                                            <option value="">Pilih Kategori</option>
                                            @foreach ($data as $d)
                                                <option value="{{ $d->category_id }}" {{ $d->category_id == $p->category_id ? 'selected' : '' }}>{{ $d->category_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="image_url">
                                            <label class="custom-file-label">Choose file</label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary sweet-success">Update</button>
                                </form>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger light" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

             
            
                       
        </div>
    </div>


    
    
@endsection