@extends('layouts.main')

@section('content')
  <main>
    <style>
      .datatable-top {
        display: none;
      }

      .dataTables_length {
        display: none;
      }

      .dataTables_filter {
        display: none;
      }
    </style>
    <link type="text/css" rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <div class="container-fluid px-4">
      <h1 class="mt-4">Monitoring Kinerja</h1>

      <div class="card mb-4">
        <div class="card-body">
          <div class="row">
            <div class="col-2"><a class="btn btn-success mb-3" href="{{ route('monitoringkinerja.create') }}"
                role="button">Create New</a></div>
            <div class="col-2">
              <form action="#" method="POST" name="importform" enctype="multipart/form-data"
                style="margin-left: -100px;">
                @csrf
                <div class="form-group">
                  <a class="btn btn-secondary" href="{{ route('monitoringkinerja.export') }}">Export Excel File</a>
                </div>
              </form>
            </div>
          </div>

          <select class="form-select filter w-25 mb-5" name="" id="filter-bulan">
            <option value="" selected>-- Pilih Bulan --</option>
            <option value="01">Januari</option>
            <option value="02">Februari</option>
            <option value="03">Maret</option>
            <option value="04">April</option>
            <option value="05">Mei</option>
            <option value="06">Juni</option>
            <option value="07">Juli</option>
            <option value="08">Agustus</option>
            <option value="09">September</option>
            <option value="10">Oktober</option>
            <option value="11">November</option>
            <option value="12">Desember</option>
          </select>
          <table id="datatablesSimple" class="table table-striped">
            <thead>
              <tr>
                <th>Indikator Kinerja</th>
                <th>Program Kegiatan</th>
                <th>Target Kinerja</th>
                <th>Realisasi Kinerja</th>
                <th>Capaian Kinerja</th>
                <th>Permasalahan</th>
                <th>Aksi</th>
            </thead>

          </table>
        </div>

        <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
        <script src="https://code.jquery.com/jquery.js"></script>
        <script src="https://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
        <script src="https://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js   "></script>
        <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
        <script>
          $(function() {
            let bulan = $("#filter-bulan").val()
            var i = 1;

            const table = $('#datatablesSimple').DataTable({
              paging: false,
              processing: true,
              serverSide: true,
              "ajax": {
                url: '{!! route('monitoringkinerja.index') !!}',
                data: function(d) {
                  d.bulan = bulan;
                  return d
                }
              }, // memanggil route yang menampilkan data json
              columns: [{
                  data: 'indikator_kinerja',
                  name: 'indikator_kinerja',
                },
                {
                  data: 'program_kegiatan',
                  name: 'program_kegiatan',
                },
                {
                  data: 'target_kinerja',
                  name: 'target_kinerja',
                },
                {
                  data: 'realisasi_kinerja',
                  name: 'realisasi_kinerja',
                },
                {
                  data: 'capaian_kinerja',
                  name: 'capaian_kinerja',
                },
                {
                  data: 'permasalahan',
                  name: 'permasalahan',
                },
                {
                  data: 'action',
                  name: 'action',
                }
              ]
            });
            $(".filter").on('change', function() {
              bulan = $("#filter-bulan").val()
              table.ajax.reload(null, false)
            });
          });
        </script>
      </div>
    </div>
  </main>
@endsection
