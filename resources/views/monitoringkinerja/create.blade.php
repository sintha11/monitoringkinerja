@extends('layouts.main')

@section('content')
  <main>
    <div class="container-fluid px-4">
      <h1 class="my-4">Monitoring Kinerja</h1>

      <div class="card mb-4">
        <div class="card-body">

          <form action="{{ route('monitoringkinerja.store') }}" method="POST">
            @csrf

            <div class="mb-3">
              <label for="indikator kinerja" class="form-label">Indikator Kinerja</label>
              <input type="text" class="form-control @error('indikator kinerja') is-invalid @enderror"
                id="indikator kinerja" value="{{ old('indikator kinerja') }}" name="indikator kinerja" required>
              @error('indikator kinerja')
                <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>
            <div class="mb-3">
              <label for="program kegiatan" class="form-label">Program Kegiatan</label>
              <input type="text" class="form-control @error('program kegiatan') is-invalid @enderror"
                id="program kegiatan" value="{{ old('program kegiatan') }}" name="program kegiatan" required>
              @error('program kegiatan')
                <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>
            <div class="mb-3">
              <label for="target kinerja" class="form-label">Target Kinerja</label>
              <select type="select" class="form-select @error('target kinerja') is-invalid @enderror" id="target kinerja"
                name="target kinerja" required>
                @error('target kinerja')
                  <small class="text-danger">{{ $message }}</small>
                @enderror
                <option disabled selected>-- Pilih Target Kinerja --</option>
                <option value="10%">10%</option>
                <option value="20%">20%</option>
                <option value="30%">30%</option>
                <option value="40%">40%</option>
                <option value="50%">50%</option>
                <option value="60%">60%</option>
                <option value="70%">70%</option>
                <option value="80%">80%</option>
                <option value="90%">90%</option>
                <option value="100%">100%</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="realisasi kinerja" class="form-label">Realisasi Kinerja</label>
              <select type="select" class="form-select @error('realisasi kinerja') is-invalid @enderror"
                id="realisasi kinerja" name="realisasi kinerja" required>
                @error('realisasi kinerja')
                  <small class="text-danger">{{ $message }}</small>
                @enderror
                <option disabled selected>-- Pilih Realisasi Kinerja --</option>
                <option value="10%">10%</option>
                <option value="20%">20%</option>
                <option value="30%">30%</option>
                <option value="40%">40%</option>
                <option value="50%">50%</option>
                <option value="60%">60%</option>
                <option value="70%">70%</option>
                <option value="80%">80%</option>
                <option value="90%">90%</option>
                <option value="100%">100%</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="capaian kinerja" class="form-label">Capaian Kinerja</label>
              <select type="select" class="form-select @error('capaian kinerja') is-invalid @enderror"
                id="capaian kinerja" name="capaian kinerja" required>
                @error('capaian kinerja')
                  <small class="text-danger">{{ $message }}</small>
                @enderror
                <option disabled selected>-- Pilih Capaian Kinerja --</option>
                <option value="10%">10%</option>
                <option value="20%">20%</option>
                <option value="30%">30%</option>
                <option value="40%">40%</option>
                <option value="50%">50%</option>
                <option value="60%">60%</option>
                <option value="70%">70%</option>
                <option value="80%">80%</option>
                <option value="90%">90%</option>
                <option value="100%">100%</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="permasalahan" class="form-label">Permasalahan</label>
              <input type="text" class="form-control @error('permasalahan') is-invalid @enderror" id="permasalahan"
                value="{{ old('permasalahan') }}" name="permasalahan" required>
              @error('permasalahan')
                <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('monitoringkinerja.index') }}" class="btn btn-secondary">Cancel</a>
          </form>
        </div>
      </div>
    </div>
  </main>
@endsection
