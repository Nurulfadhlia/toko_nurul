@extends('layouts.admin.main')
@section('title', 'Admin Product')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Flash Sale</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item">Flash Sale</div>
            </div>
        </div>
        <a href="{{ route('flash_sale.create') }}" class="btn btn-icon icon-left btn-primary"><i class="fas fa-plus"></i> Flash Sale</a>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-md">
                    <tr>
                        <th>#</th>
                        <th>Nama Produk</th>
                        <th>Harga Produk Diskon</th>
                        <th>Harga Produk Asli</th>
                        <th>Action</th>
                    </tr>
                    @php
                        $no = 0
                    @endphp
                    @forelse ($flash_sales as $item)
                    <tr>
                        <td>{{ $no += 1 }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->diskon_price }} Points</td>
                        <td>{{ $item->original_price }} Points</td>
                        <td>
                        <a href="{{ route('flash_sale.detail', $item->id) }}" class="badge badge-info">Detail</a>
                        <a href="{{ route('flash_sale.edit', $item->id) }}" class="badge badge-warning"> Edit </a>
                        <a href="{{ route('flash_sale.delete', $item->id) }}" class="badge badge-danger" data-confirm-delete="true">Hapus</a>
                        </td>
                    </tr>
                    @empty
                    <td colspan="5" class="text-center">Data Flash Sale Kosong</td>
                    @endforelse
                </table>
            </div>
        </div>
    </div>
</div>
@endsection