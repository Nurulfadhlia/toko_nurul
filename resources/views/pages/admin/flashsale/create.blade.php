@extends('layouts.admin.main')

@section('title', 'Admin Tambah Product')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Flash Sale</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="{{ route('admin.flash_sale') }}">Flash Sale</a></div>
                <div class="breadcrumb-item">Tambah Flash Sale</div>
            </div>
        </div>

        <a href="{{ route('admin.flash_sale') }}" class="btn btn-icon icon-left btn-warning"> Kembali</a>

        <div class="card mt-4">
            <form action="{{ route('flash_sale.send') }}" class="needs-validation" novalidate="" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="name">Nama Flash Sale</label>
                                <input id="name" type="text" class="form-control" name="name" required="">
                                <div class="invalid-feedback">Kolom ini harus di isi!</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="diskon_price">Harga Diskon (Point)</label>
                                <input id="diskon_price" type="number" class="form-control" name="diskon_price" required="">
                                <div class="invalid-feedback">Kolom ini harus di isi!</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="original_price">Harga Asli (Point)</label>
                                <input id="original_price" type="number" class="form-control" name="original_price" required="">
                                <div class="invalid-feedback">Kolom ini harus di isi!</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="category">Kategori Flash Sale</label>
                                <input id="category" type="text" class="form-control" name="category" required="">
                                <div class="invalid-feedback">Kolom ini harus di isi!</div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="description">Deskripsi Flash Sale</label>
                                <textarea class="form-control" name="description" id="description" cols="30" rows="4" required=""></textarea>
                                <div class="invalid-feedback">Isi berita harus di isi!</div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <div class="custom-file">
                                    <input class="custom-file-input" name="image" id="customFile" type="file" required="">
                                    <label class="custom-file-label" for="customFile">Pilih Gambar</label>
                                    <div class="invalid-feedback">Kolom ini harus di isi!</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-icon icon-left btn-primary">
                        <i class="fas fa-plus"></i> Tambah
                    </button>
                </div>
            </form>
        </div>
    </section>
</div>
@endsection
