@extends('layouts.template')
@section('sidebar')
@include('layouts.sidebar', array('level' => 'admin'))
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Transaksi</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Data Transaksi</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tabel Transaksi</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">

                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Id Transaksi</th>
                            <th>Nama User</th>
                            <th>Produk</th>
                            <th>Mitra</th>
                            <th>Status</th>
                            <th>Nominal</th>
                            <th>Transaksi Dibuat</th>
                            <th>Transaksi Selesai</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($transaksi->count() > 0)
                        @foreach($transaksi as $key => $m)
                        @if($key === 0 || $m->id !== $transaksi[$key - 1]->id)
                            <tr>
                                <td>{{$m->id}}</td>
                                <td>{{$m->username}}</td>
                                <td>
                                    @foreach($transaksi as $item)
                                        @if($item->username === $m->username)
                                            {{$item->nama_produk}}<br>
                                        @endif
                                    @endforeach
                                </td>
                                <td>{{$m->nama_mitra}}</td>
                                <td>
                                    @if($m->status === '0')
                                        <span class="badge badge-info">Menunggu ditolak</span>
                                    @elseif($m->status === '1')
                                        <span class="badge badge-warning">Menunggu Konfirmasi</span>
                                    @elseif($m->status === '2')
                                        <span class="badge badge-success">Pesanan Diterima</span>
                                    @elseif($m->status === '3')
                                        <span class="badge badge-danger">Pesanan Siap</span>
                                    @elseif($m->status === '4')
                                        <span class="badge badge-primary">Pesanan Selesai</span>
                                    @elseif($m->status === '5')
                                        <span class="badge badge-danger">Pesanan Dibatalkan</span>
                                    @endif</td>
                                <td>{{$m->total}}</td>
                                <td>{{$m->created_at}}</td>
                                <td>{{$m->updated_at}}</td>
                            </tr>
                        @endif
                        @endforeach

                        @else
                        <tr>
                            <td colspan="6" class="text-center">Data tidak ada</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            <!-- /.card-body -->
            <div class="card-footer">
                <div class="row">
                    <div class="col">
                        <!--Tampilkan pagination-->
                        {{$transaksi->links()}}
                    </div>
                    <a href="{{ route('admin.mitra') }}" class="btn btn-default">Kembali</a>
                </div>
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>

@endsection