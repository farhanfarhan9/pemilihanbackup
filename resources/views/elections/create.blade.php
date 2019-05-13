@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row mb-3">
    <div class="col">
      <a href="{{ route('elections.index') }}">
        <i class="fas fa-angle-left"></i> Kembali ke daftar pemilihan
      </a>
    </div>
  </div>
  <div class="row mb-3 justify-content-center">
    <div class="col-12">
      <div class="card shadow-sm border-0">
          <div class="card-header bg-primary text-light border-0">
            <h5 class="m-0 font-weight-normal">
              <i class="fas fa-poll-h"></i> Buat pemilihan baru
            </h5>
          </div>

          <div class="card-body">
            <form action="{{ route('elections.store') }}" method="POST">
              @csrf

              <div class="px-3 py-2 bg-secondary text-white" style="margin: -1.25rem -1.25rem 1.25rem -1.25rem">
                <span class="font-weight-bold">
                  <i class="d-none d-md-inline fas fa-file-alt"></i> Informasi pemilihan
                </span>
              </div>

              <div class="form-group">
                <div class="form-row">
                  <div class="col-sm-12 col-md-4">
                    <label class="font-weight-bold" for="name">Nama</label>
                  </div>
                  <div class="col-sm-12 col-md-8">
                    <input class="form-control @error('name') is-invalid @enderror" type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Nama pemilihan" autocomplete="off">

                    @error('name')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="form-row">
                  <div class="col-sm-12 col-md-4">
                    <label class="font-weight-bold" for="description">Deskripsi</label>
                  </div>
                  <div class="col-sm-12 col-md-8">
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" placeholder="Pemilihan ini adalah pemilihan..." rows="5">{{ old('description') }}</textarea>

                    @error('description')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="form-row">
                  <div class="col-sm-12 col-md-4">
                    <label class="font-weight-bold" for="poster">Poster pemilihan</label>
                    <small class="form-text text-muted">Opsional</small>
                  </div>
                  <div class="col-sm-12 col-md-8">
                    <input type="file" class="form-control-file" id="poster" name="poster">
                    <small id="fieldNameHelp" class="form-text text-muted">Ekstensi: [.jpg, .png, .jpeg]. Dengan ukuran maksimal 1MB.</small>

                    @error('poster')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                </div>
              </div>

              <div class="px-3 py-2 bg-secondary text-white" style="margin: 1.25rem -1.25rem 1.25rem -1.25rem">
                <span class="font-weight-bold">
                  <i class="d-none d-md-inline fas fa-calendar"></i> Jadwal Pemilihan
                </span>
              </div>

              <div class="form-group">
                <div class="form-row">
                  <div class="col-sm-12 col-md-4">
                    <label class="font-weight-bold" for="voting_starts_on">Waktu pemungutan suara</label>
                    <small class="form-text text-muted">Semua waktu dalam zona waktu UTC+7</small>
                  </div>
                  <div class="col-sm-12 col-md-8">
                    <div class="form-row">
                      <div class="col">
                        <label for="voting_starts_on">Mulai</label>
                        <datetimepicker>
                          <input class="form-control @error('voting_starts_on') is-invalid @enderror" type="text" id="voting_starts_on" name="voting_starts_on" placeholder="DD-MM-YYYY HH:MM" value="{{ old('voting_starts_on') }}" autocomplete="off">
                        </datetimepicker>

                        @error('voting_starts_on')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                      </div>
                      <div class="col">
                        <label for="voting_ends_on">Berakhir</label>
                        <input class="form-control @error('voting_ends_on') is-invalid @enderror" type="text" id="voting_ends_on" name="voting_ends_on" placeholder="DD-MM-YYYY HH:MM" value="{{ old('voting_ends_on') }}" autocomplete="off">

                        @error('voting_ends_on')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="px-3 py-2 bg-secondary text-white" style="margin: 1.25rem -1.25rem 1.25rem -1.25rem">
                <span class="font-weight-bold">
                  <i class="d-none d-md-inline fas fa-person-booth"></i> Daftar pemilih
                </span>
              </div>

              <div class="form-group">
                <div class="form-row">
                  <div class="col-sm-12 col-md-4">
                    <label class="font-weight-bold" for="activeVoter">Pemilih aktif</label>
                  </div>
                  <div class="col-sm-12 col-md-8">
                    <div class="form-row">
                      <div class="col-12 col-md-6">
                        <div class="custom-control custom-radio">
                          <input type="radio" id="selectActiveVoter" class="custom-control-input" checked>
                          <label class="custom-control-label" for="selectActiveVoter">Semua di daftar pemilih</label>
                        </div>
                      </div>

                      <div class="col-12 col-md-6">
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="exceptVoter" name="exceptionVotersIs">
                          <label class="custom-control-label" for="exceptVoter">Kecuali</label>
                        </div>
                        <div>
                          <select multiple="multiple" name="exceptionVoters" class="custom-select select2">
                            @foreach(auth()->user()->organization->voters as $voter)
                            <option>{{ $voter->identity }} {{$voter->name}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>

                    </div>

                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="form-row">
                  <div class="col-sm-12 col-md-4">
                    <label class="font-weight-bold">Masuk menggunakan</label>
                  </div>
                  <div class="col-sm-12 col-md-8">

                    <div class="custom-control custom-checkbox custom-control-inline">
                      <input type="checkbox" class="custom-control-input" id="loginWithEmail" name="voterLogin[email]">
                      <label class="custom-control-label" for="loginWithEmail">Alamat email</label>
                    </div>
                    <div class="custom-control custom-checkbox custom-control-inline">
                      <input type="checkbox" class="custom-control-input" id="loginWithSMS" name="voterLogin[sms]">
                      <label class="custom-control-label" for="loginWithSMS">SMS</label>
                    </div>
                    <div class="custom-control custom-checkbox custom-control-inline">
                      <input type="checkbox" class="custom-control-input" id="loginWithWhatsApp" disabled="disabled">
                      <label class="custom-control-label" for="loginWithWhatsApp">WhatsApp</label>
                    </div>
                  </div>
                </div>
              </div>

              <div class="px-3 py-2 bg-secondary text-white" style="margin: 1.25rem -1.25rem 1.25rem -1.25rem">
                <span class="font-weight-bold">
                  <i class="d-none d-md-inline fas fa-file-contract"></i> Ketentuan layanan
                </span>
              </div>

              <div class="form-group text-center">
                <span class="form-text text-muted">Dengan mengeklik "Buat pemilihan" dibawah, Anda menyetujui <a class="font-weight-bold" href="#">Ketentuan Layanan</a> dan <a class="font-weight-bold" href="#">Kebijakan Privasi</a>.</span>

                <div class="mt-3">
                  <button class="btn btn-primary w-100 shadow-sm"><i class="fas fa-check"></i> Buat pemilihan</button>
                </div>
              </div>

          </form>
        </div> <!-- end card body -->

        <div class="card-footer border-0 d-block d-md-none">
          <div id="stepsButtonNavigation" class="d-flex">
            <a id="formStepPrevious" class="text-decoration-none d-none text-danger" href="#">
              <i class="fas fa-angle-left"></i> sebelumnya
            </a>
            <a id="formStepNext" class="text-decoration-none ml-auto d-none" href="#">
              selanjutnya <i class="fas fa-angle-right"></i>
            </a>

            <a id="formStepReview" class="text-decoration-none ml-auto d-none text-info" href="#">
              review <i class="fas fa-angle-right"></i>
            </a>

            <a id="formStepFinish" class="text-decoration-none ml-auto d-none text-success" href="#">
              selesai <i class="fas fa-check"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection