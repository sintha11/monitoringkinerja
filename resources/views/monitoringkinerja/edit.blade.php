@extends('layouts.main')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="my-4">Edit Monitoring Kinerja</h1>

            <div class="card mb-4">
                <div class="card-body">

                    <form action="{{ route('monitoringkinerja.update', $monitoringKinerja->id) }}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="indikator_kinerja" class="form-label">Indikator Kinerja</label>
                            <input type="text" class="form-control" id="indikator_kinerja" value="{{ $monitoringKinerja->indikator_kinerja }}" name="indikator_kinerja" required>
                        </div>

                        <div class="mb-3">
                            <label for="program_kegiatan" class="form-label">Program Kegiatan</label>
                            <input type="text" class="form-control" id="program_kegiatan" value="{{ $monitoringKinerja->program_kegiatan}}" name="program_kegiatan" required>
                        </div>

                        <div class="mb-3">
                            <label for="target_kinerja" class="form-label">Target Kinerja</label>
                            <input type="text" class="form-control" id="target_kinerja" value="{{ $monitoringKinerja->target_kinerja }}" name="target_kinerja" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="realisasi_kinerja" class="form-label">Realisasi Kinerja</label>
                            <input type="text" class="form-control" id="realisasi_kinerja" value="{{ $monitoringKinerja->realisasi_kinerja}}" name="realisasi_kinerja" required>
                        </div>

                        <div class="mb-3">
                            <label for="capaian_kinerja" class="form-label">Capaian Kinerja</label>
                            <input type="text" class="form-control" id="capaian_kinerja" value="{{ $monitoringKinerja->capaian_kinerja}}" name="capaian_kinerja" required>
                        </div>

                        <div class="mb-3">
                            <label for="permasalahan" class="form-label">Permasalahan</label>
                            <input type="text" class="form-control" id="permasalahan" value="{{ $monitoringKinerja->permasalahan}}" name="permasalahan" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('monitoringkinerja.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>

                </div>
            </div>
        </div>
    </main>
@endsection