@extends('layouts.admin.main')
@section('title', 'Admin Distributor')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Distributor</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item">Distributor</div>
            </div>
        </div>
        <a href="#" class="btn btn-icon icon-left btn-primary"><i class="fas fa-plus"></i> Distributor</a>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-md">
                    <tr>
                        <th>nama distributor</th>
                        <th>lokasi</th>
                        <th>Kontak</th>
                        <th>email</th>
                        <th>action</th>

                    </tr>
                    @php
                    $no = 0
                    @endphp
                    @forelse ($distributors as $item)
                    <tr>
                        <td>{{ $item->nama_distributor }}</td>
                        <td>{{ $item->lokasi }}</td>
                        <td>{{ $item->kontak }}</td>
                        <td>{{ $item->email }}</td>
                        <td>
                        <a href="#" class="badge badge-info">Detail</a>
                        <a href="#" class="badge badge-warning"> Edit </a>
                        <a href="" class="badge badge-danger"> Hapus </a>
                        </td>
                    </tr>
                    @empty
                    <td colspan="5" class="text-center">Data Distributor Kosong</td>
                    @endforelse
                </table>
            </div>
        </div>
    </div>
</div>
@endsection