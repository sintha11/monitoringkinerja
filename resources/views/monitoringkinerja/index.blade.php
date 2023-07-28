@extends('layouts.main')

@section('content')
  <main>
    <!-- datatable style -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
    <!-- bootstrap 4 css  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
      integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!-- css tambahan  -->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css">

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

      .dt-button {
        position: absolute !important;
        z-index: 1;
        top: -140px;
        left: 265px;
        background-color: #6C757D !important;
        border: 1px white !important;
        color: white !important;
        border-radius: 5px !important;
      }
    </style>
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
                <th>Tanggal</th>
                <th>Target Kinerja</th>
                <th>Realisasi Kinerja</th>
                <th>Capaian Kinerja</th>
                <th>Permasalahan</th>
                <th>Aksi</th>
            </thead>

          </table>
        </div>

        <!-- jquery -->
        <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
        <!-- jquery datatable -->
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>

        <!-- script tambahan  -->
        <script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>

        <script>
          $(function() {
            let bulan = $("#filter-bulan").val()
            var i = 1;

            const table = $('#datatablesSimple').DataTable({
              dom: 'Bfrtip',
              buttons: [{
                extend: 'print',
                exportOptions: {
                  columns: [0, 1, 2, 3, 4, "visible"]
                }
              }],
              paging: false,
              processing: false,
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
                  orderable: false,
                },
                {
                  data: 'program_kegiatan',
                  name: 'program_kegiatan',
                  orderable: false,
                },
                {
                  data: 'tanggal',
                  name: 'tanggal',
                  orderable: false,
                },
                {
                  data: 'target_kinerja',
                  name: 'target_kinerja',
                  orderable: false,
                },
                {
                  data: 'realisasi_kinerja',
                  name: 'realisasi_kinerja',
                  orderable: false,
                },
                {
                  data: 'capaian_kinerja',
                  name: 'capaian_kinerja',
                  orderable: false,
                },
                {
                  data: 'permasalahan',
                  name: 'permasalahan',
                  orderable: false,
                },
                {
                  data: 'action',
                  name: 'action',
                  orderable: false,
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
