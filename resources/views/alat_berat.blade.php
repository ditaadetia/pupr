@extends('layouts.header')
@section('isicard')
<div class="container-fluid mt--6">
  <!-- Dark table -->
  <div class="row">
    <div class="col">
      <div class="card shadow" style="border-radius:50px !important;">
        <div class="card-header border-0">
            <a href="{{ route('equipments.create') }}" class="btn btn-primary btn-icon">
                <i class="ni ni-fat-add"></i>
                <span class="nav-link-text">Tambah Alat Berat</span>
            </a>
            <!-- <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
                <div class="form-group mb-0">
                <div class="input-group input-group-alternative input-group-merge">
                    <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                    </div>
                    <input class="form-control" placeholder="Search" type="text" id="input" onkeyup="searchTable()">
                </div>
                </div>
                <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </form> -->
        </div>
        <div class="table-responsive table-striped" style="margin-top:30px">
          <table class="table align-items-center table-hover table-flush" id="table_id">
            <thead class="thead-dark" style="height:80px !important">
              <tr style="text-align:center !important;">
                <th style="color:white !important;" scope="col">No.</th>
                <th style="color:white !important;" scope="col">Nama</th>
                <th style="color:white !important; width: 100% !important;" scope="col">Foto</th>
                <th style="color:white !important;" scope="col">Jenis</th>
                <th style="color:white !important;" scope="col">Kegunaan</th>
                <th style="color:white !important;" scope="col">Harga Sewa Perjam</th>
                <th style="color:white !important;" scope="col">Harga Sewa Perhari</th>
                <th style="color:white !important;" scope="col">Keterangan</th>
                <th style="color:white !important;" scope="col">Kondisi</th>
                <th></th>
              </tr>
            </thead>
            <tbody class="list">
              <?php $no = 0 ?>
              @foreach ($equipments as $equipment)
                <tr style="text-align:center !important;">
                  <td class="no">
                      {{ $loop->index }}
                  </td>
                  <td>
                    {{ $equipment->nama }}
                  </td>
                  <td>
                      <img src="{{ asset('storage/' . $equipment->foto) }}" width="200%;">
                  </td>
                  <td>
                    {{ $equipment->jenis }}
                  </td>
                  <td>
                    {{ $equipment->kegunaan }}
                  </td>
                  <td>
                    {{ $equipment->harga_sewa_perjam }}
                  </td>
                  <td>
                    {{ $equipment->harga_sewa_perhari }}
                  </td>
                  <td>
                    {{ $equipment->keterangan }}
                  </td>
                  <td>
                    {{ $equipment->kondisi }}
                  </td>
                  <td class="text-right">
                    <div class="dropdown">
                      <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v"></i>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                        <a class="dropdown-item" href="{{ route('equipments.edit', ['equipment' => $equipment->id]) }}">Edit Alat</a>
                        <a class="dropdown-item" href="{{ route('equipments.destroy', ['equipment' => $equipment->id]) }}">Hapus Alat</a>
                      </div>
                    </div>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <!-- <div class="card-footer py-4">
        <nav aria-label="...">
            <ul class="pagination justify-content-end mb-0">
              <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1">
                  <i class="fas fa-angle-left"></i>
                  <span class="sr-only">Previous</span>
                </a>
              </li>
              <li class="page-item active">
                <a class="page-link" href="#">1</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
              </li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item">
                <a class="page-link" href="#">
                  <i class="fas fa-angle-right"></i>
                  <span class="sr-only">Next</span>
                </a>
              </li>
            </ul>
        </nav>
        </div> -->
      </div>
    </div>
  </div>
@endsection
