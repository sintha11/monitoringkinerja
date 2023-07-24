@extends('layouts.main')

@section('content')
  <main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <div class="container-fluid px-4">
      <h1 class="mt-4">Selamat Datang {{ Auth::user()->name }}</h1>
      <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
      <div class="row">
        <div class="col-md-6">
          <div class="card bg-secondary text-white mb-4">
            <div class="card-body">
              <h5>Monitoring Kinerja</h5>
              <h5>Total {{ $TotalmonitoringKinerja }} Data Monitoring Kinerja</h5>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
              <a class="small text-white stretched-link" href="{{ route('monitoringkinerja.index') }}">View Details</a>
              <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card bg-secondary text-white mb-4">
            <div class="card-body">
              <h5>User</h5>
              <h5>Total {{ $Totaluser }} Data User</h5>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
              <a class="small text-white stretched-link" href="{{ route('user.index') }}">View Details</a>
              <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
          </div>
        </div>

        <div class="chart py-5">
          <div class="card">
            <div class="card-header">
              <h4>Grafik Monitoring Kinerja</h4>
            </div>
            <div class="card-body">
              <canvas id="myChart" class="p-2" style="width:100%;"></canvas>
            </div>
          </div>

          <script>
            const xValues = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];
            const yValues = [0, 14.18, 18.69, 33.3, 22.73];

            new Chart("myChart", {
              type: "line",
              data: {
                labels: xValues,
                datasets: [{
                  fill: false,
                  lineTension: 0,
                  backgroundColor: "rgba(0,0,255,1.0)",
                  borderColor: "rgba(0,0,255,0.1)",
                  data: yValues
                }]
              },
              options: {
                legend: {
                  display: false
                },
                scales: {
                  yAxes: [{
                    ticks: {
                      min: 0,
                      max: 100
                    }
                  }],
                }
              }
            });
          </script>
        </div>

        <div class="card mb-4">
          <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Data Table Monitoring Kinerja
          </div>
          <div class="card-body">
            <table id="dataTable" class="table table-striped">
              <table id="datatablesSimple">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Indikator Kinerja</th>
                    <th>Program Kegiatan</th>
                    <th>Target Kinerja</th>
                    <th>Realisasi Kinerja</th>
                    <th>Capaian Kinerja</th>
                    <th>Permasalahan</th>
                </thead>
                <tbody>
                  @foreach ($monitoringKinerja as $monitoringKinerja)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $monitoringKinerja->indikator_kinerja }}</td>
                      <td>{{ $monitoringKinerja->program_kegiatan }}</td>
                      <td>{{ $monitoringKinerja->target_kinerja }}</td>
                      <td>{{ $monitoringKinerja->realisasi_kinerja }}</td>
                      <td>{{ $monitoringKinerja->capaian_kinerja }}</td>
                      <td>{{ $monitoringKinerja->permasalahan }}</td>
                    </tr>
                  @endforeach
                  </body>
              </table>
          </div>
        </div>
      </div>
  </main>
@endsection
