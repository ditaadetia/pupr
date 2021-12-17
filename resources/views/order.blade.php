@extends('layouts.headerPrimary')
@section('isicard')
<?php
  use Carbon\Carbon;
  setlocale(LC_TIME, 'id_ID');
  \Carbon\Carbon::setLocale('id');
  \Carbon\Carbon::now()->formatLocalized("%A, %d %B %Y"); 
?>
<div class="container-fluid mt--6">
  <!-- Dark table -->
  <div class="row">
    <div class="col">
      <div class="card bg-default shadow" style="border-radius:50px !important;">
        <div class="card-header bg-default">
          <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main" action="/cari-order" method="get">
            <input type="hidden" name="category" value="{{ request('category') }}">
            <div class="form-group mb-0">
            <div class="input-group input-group-alternative input-group-merge">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
                <input class="form-control" placeholder="Cari" type="search" name="keyword" id="search" onkeyup="searchTable()" value="{{ request('keyword') }}">
              </div>
            </div>
            <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
          </form>
        </div>
        <div class="table-responsive">
          <table class="table align-items-center table-dark table-hover table-flush">
            <thead class="thead-dark" style="height:80px !important">
              <tr style="text-align:center !important;">
                <th style="color:white !important;" scope="col">No.</th>
                <th style="color:white !important;" scope="col">Nama Kegiatan</th>
                <th style="color:white !important;" scope="col">Nama Penyewa</th>
                <th style="color:white !important;" scope="col">Tanggal Pengajuan Sewa</th>
                {{-- <th style="color:white !important;" scope="col">Nama Instansi</th>
                <th style="color:white !important;" scope="col">Jabatan</th>
                <th style="color:white !important;" scope="col">Alamat Instansi</th> --}}
                <th style="color:white !important;" scope="col">Status</th>
                <th style="color:white !important;" scope="col"></th>
              </tr>
            </thead>
            <tbody class="list">
              <?php $no = 0 ?>
              @if($orders->count()>0)
                @foreach ($orders as $order)
                  <?php $no++ ?>
                  <tr style="text-align:center !important;">
                    <td class="no">
                      {{ $no }}
                    </td>
                    <td>
                      {{ $order->nama_kegiatan }}
                    </td>
                    <td>
                      {{ $order->tenant->nama }}
                    </td>
                    <td>
                      {{ Carbon::parse($order->created_at)->locale('id')->isoFormat('dddd, D MMMM YYYY') }}
                    </td>
                    <td>
                      @can('admin')
                        @if($order->ket_verif_admin === 'belum')
                          Belum diverifikasi
                        @elseif($order->ket_verif_admin === 'verif')
                          Pengajuan diterima
                        @elseif($order->ket_verif_admin === 'tolak')
                          Pengajuan ditolak
                        @endif
                      @endcan
                      @can('kepala_uptd')
                        @if($order->ket_persetujuan_kepala_uptd === 'belum')
                          Belum disetujui
                        @elseif($order->ket_persetujuan_kepala_uptd === 'setuju')
                          Pengajuan diterima
                        @elseif($order->ket_persetujuan_kepala_uptd === 'tolak')
                          Pengajuan ditolak
                        @endif
                      @endcan
                      @can('kepala_dinas')
                        @if($order->ket_persetujuan_kepala_dinas === 'belum')
                          Belum disetujui
                        @elseif($order->ket_persetujuan_kepala_dinas === 'setuju')
                          Pengajuan diterima
                        @elseif($order->ket_persetujuan_kepala_dinas === 'tolak')
                          Pengajuan ditolak
                        @endif
                      @endcan
                    </td>
                    <td>
                      <a href="{{ route('show', ['id' => $order->id]) }}">
                        <i class="fa fa-search"></i>
                        <span class="nav-link-text">Detail</span>
                      </a>
                    </td>
                  </tr>
                @endforeach
              @else
                <tr>
                  <td>
                    <p>Tidak ada data!</p>
                  </td>
                </tr>
              @endif
            </tbody>
          </table>
        </div>
        <div class="card-footer">
          <form>
            <input type="hidden" name="category" value="{{ request('category') }}">
            {{ $orders->appends(['category' => request('category')])->links() }}
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection