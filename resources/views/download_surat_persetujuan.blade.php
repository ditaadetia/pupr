<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
        <meta name="author" content="Creative Tim">
        <title>SI-ALBERT - UPTD Alat Berat PUPR Kota Pontianak</title>
        <!-- Icons -->
        <!-- Page plugins -->
        <!-- Argon CSS -->
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/logo_pupr.jpeg') }}">
    <style>
        .header {
            width: 100%;
            padding: 10px 0;
            border-bottom: 5px double;
            display: inline-block;
        }
        .judul {
            font-size: 14px;
            margin-top: -100px;
        }
        .text-center {
            text-align: center;
        }
        .font12 {
            font-size: 12px;
        }
        .font24 {
            font-size: 18px;
        }
        table {
            width: 100%;
            color: #212121;
        }
        tr, td {
            padding: 8px!important;
        }
        .p {
            font-family: 'Times New Roman', Times, serif;
            font-size: 12pt;
            color: black;
        }
    </style>

<!-- jquery -->
</head>
<?php
  use Carbon\Carbon;
  setlocale(LC_TIME, 'id_ID');
  \Carbon\Carbon::setLocale('id');
  \Carbon\Carbon::now()->formatLocalized("%A, %d %B %Y");
?>
<body>
    {{-- <script>window.open('#', '_blank');</script> --}}
    <div class="page2">
        <div class="header">
            <img src="{{ asset('img/Logo-Kota-Pontianak.png') }}" alt="" style="width:100px; height:90px;">
            <h5 class="judul text-center">PEMERINTAH KOTA PONTIANAK<br><b><span class="font24">DINAS PEKERJAAN UMUM DAN PENATAAN RUANG</span></b><br><small>Alamat Jalan A. Yani Telpon : +62561-732300 Fax : +62561-747329</small><br><span class="font12"><b>PONTIANAK - KALBAR</b><span></h5>
        </div>
        <p class="p" style="text-align: right">Pontianak, {{ Carbon::now()->isoFormat('d MMMM YYYY') }}</p>
        <div class="col-4" style="float: right">
            <p class="p" style="text-align: center;">Kepada</p>
            <p class="p">Yth, <b style="font-style: italic; font-weight:bold">Direktur CV. {{ $order->nama_instansi }}</b></p>
            <p class="p" style="text-align:center; margin-left:-5cm"> di -</p>
            <p class="p" style="text-decoration: underline; font-weight: bold; text-align:center">Pontianak</p>
        </div>
        <p class="p">Nomor &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $order->id }} / {{ Carbon::now()->isoFormat('M') }} / D-PUPR.UPT</p>
        <p class="p">Lampiran &nbsp;: -</p>
        <p class="p">Perihal &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <b>Persetujuan Pinjam Pakai Alat Berat</b></p>
        <br><br><br>
        <div class="row offset-1">
            <p class="p">Sehubungan dengan Surat Saudara <b style="font-weight:bold">{{ $order->nama }}</b> atas nama CV <b style="font-weight:bold">{{ $order->nama_instansi }}</b> Nomor : Tanggal : Perihal Permohonan Penyewaan 
            @foreach($detail_orders as $detail_order)
                <b style="font-weight:bold"> {{ $detail_order->nama }}, </b>
            @endforeach
            untuk Pekerjaan <b style="font-weight:bold">{{ $order->nama_kegiatan }}</b>, maka prinsipnya kami tidak keberatan selama permohonan Saudara tetap berpedoman pada peraturan dan syarat-syarat yang telah ditentukan oleh Pemerintah Kota Pontianak UP. Dinas Pekerjaan Umum dan Penataan Ruang Kota Pontianak.
            </p>
            <br><br>
            <p class="p">Demikian Surat Persetujuan ini kami buat agar dapat dipergunakan sebagaimana mestinya.</p>
        </div>
        <div class="col-5" style="float: right; margin-top:250px">
            <p class="p" style="text-align: center;">KEPALA DINAS PEKERJAAN UMUM DAN PENATAAN RUANG KOTA PONTIANAK</p>
            @if($order->ket_persetujuan_kepala_dinas == 'belum' OR $order->ket_persetujuan_kepala_dinas == 'tolak' OR $order->ttd_kepala_dinas =='')
            <br><br><br>
        @else
            <img src="public_path('storage/{{ $order->ttd_kepala_dinas }}')" alt="" style="width:60px; height:60px;">
        @endif
        <p class="p" style="text-decoration: underline; text-align:center"><b style="margin-top: -12px; font-weight:bold">{{ $kepala_dinas->name }}</b><br>
            <p class="p" style="margin-top: -12px; text-align:center">{{ $kepala_dinas->pangkat }}</p>
            <p class="p" style="margin-top: -12px; text-align:center">{{ $kepala_dinas->nip }}</p>
        </p>
        </div>
    </div>
    {{-- <script src="{{ asset('assets/vendor/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/js-cookie/js.cookie.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>
    <!-- Optional JS -->
    <script src="{{ asset('assets/vendor/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/chart.js/dist/Chart.extension.js') }}"></script>
    <!-- Argon JS -->
    <script src="{{ asset('assets/js/argon.js?v=1.2.0') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>
    <script src="{{ asset('assets/vendor/signature-pad.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
        <script>
            $(document).ready( function () {
                $('#table_id').DataTable();
            } );
        </script> --}}
</body>
</html>