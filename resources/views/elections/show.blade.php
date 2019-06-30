@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mb-4">
            <div class="col">
                <h5 class="mb-0 font-weight-normal">
                    <a class="text-decoration-none text-dark" href="{{ route('elections.index') }}">
                        <i class="fas fa-arrow-left mr-2"></i> Daftar pemilihan
                    </a>
                </h5>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col">
                <div class="card border-0 shadow-sm">
                    <div class="card-header border-0 bg-light">
                        <h5 class="font-weight-normal my-1">
                            {{ $election->name }}
                        </h5>
                    </div>
                    <div class="card-body">

                        <div class="alert alert-warning">
                            <i class="fas fa-exclamation-triangle"></i> <strong>Perhatian</strong> Pemilihan ini tidak aktif karena belum memiliki daftar kandidat. 
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-3">
                                <strong style="font-size: 16px">Detail pemilihan</strong>
                                <a class="text-secondary" href="{{ route('elections.edit', $election->hash_id) }}"><i class="fas fa-edit"></i></a>
                                <p class="text-secondary">
                                    Berisikan informasi pemilihan.
                                </p>
                            </div>
                            <div class="col-12 col-md-9">
                                <div class="table-responsive">
                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr>
                                                <th class="border-top-0" style="width: 35%">Nama pemilihan</th>
                                                <td class="border-top-0">{{ $election->name }}</td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Pemungutan suara di mulai
                                                    <small class="d-none d-md-block font-weight-normal text-muted">Pemilihan akan mulai dilaksanakan pada</small>
                                                </th>
                                                <td style="vertical-align: middle">
                                                    {{ $election->voting_starts_on->format('d-m-Y H:i') }} WIB
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Pemungutan suara di tutup
                                                    <small class="d-block font-weight-normal text-muted">Pemilihan akan mulai dilaksanakan pada</small>
                                                </th>
                                                <td style="vertical-align: middle">
                                                    {{ $election->voting_ends_on->format('d-m-Y H:i') }} WIB
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Status pemilihan</th>
                                                <td>
                                                    <span class="badge badge-danger">Tidak aktif</span> <a href="#" class="text-secondary"><i class="fas fa-question-circle"></i></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="row pt-4" style="border-top: 1px solid #dee2e6">
                            <div class="col-12 col-md-3">
                                <strong style="font-size: 16px">Kandidat</strong>
                                <a class="text-secondary" href="{{ route('elections.candidates.index', $election->hash_id) }}"><i class="fas fa-edit"></i></a>
                                <p class="text-secondary">
                                    Berisikan informasi kandidat pemilihan.
                                </p>
                            </div>
                            <div class="col-12 col-md-9">
                                <div class="table-responsive">
                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr>
                                                <th class="border-top-0" style="width: 35%">Jumlah</th>
                                                <td class="border-top-0">
                                                    {{ $election->candidates_count }} kandidat
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Daftar kandidat</th>
                                                <td>
                                                    <span class="badge badge-warning">
                                                        Pemilihan ini belum memiliki kandidat.
                                                    </span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="row pt-4" style="border-top: 1px solid #dee2e6" id="voters">
                            <div class="col-12 col-md-3">
                                <strong style="font-size: 16px">Daftar pemilih</strong>
                                <a class="text-secondary" href="{{ route('elections.voters', $election->hash_id) }}"><i class="fas fa-edit"></i></a>
                                <p class="text-secondary">
                                    Berisikan informasi kandidat pemilihan.
                                </p>
                            </div>
                            <div class="col-12 col-md-9">
                                <div class="table-responsive">
                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr>
                                                <th class="border-top-0" style="width: 35%">Jumlah</th>
                                                <td class="border-top-0">{{ $election->voters_count }} pemilih</td>
                                            </tr>
                                            <tr>
                                                <th class="border-top-0" style="width: 35%">Aktif</th>
                                                <td class="border-top-0">{{ $election->voters_active_count }} pemilih</td>
                                            </tr>
                                            <tr>
                                                <th class="border-top-0" style="width: 35%">Tidak aktif</th>
                                                <td class="border-top-0">{{ $election->voters_inactive_count }} pemilih</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="row pt-4" style="border-top: 1px solid #dee2e6">
                            <div class="col-12 col-md-3">
                                <strong style="font-size: 16px">Hasil</strong>
                                <p class="text-secondary">
                                    Grafik pemilihan terhadap kandidat.
                                </p>
                            </div>
                            <div class="col-12 col-md-9">
                                <div class="alert alert-info">
                                    Hasil tidak dapat di tampilkan karena pemilihan belum dimulai.
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer border-0">
                        <div class="d-flex justify-content-end">
                            <a class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteElectionModal" href="#">
                                <i class="fas fa-trash"></i> Hapus pemilihan
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteElectionModal" tabindex="-1" role="dialog" aria-labelledby="deleteElectionConfirmation" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form action="{{ route('elections.destroy', $election->hash_id) }}" method="POST">
          @method('DELETE')
          @csrf
          <div class="modal-header">
            <h5 class="modal-title" id="deleteElectionConfirmation">Apakah anda ingin menghapus ?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
                <div class="form-group">
                    <div class="alert alert-warning">
                        <strong>Perhatian !</strong><br> Aksi penghapusan ini bersifat selamanya dan aksi ini tidak dapat di kembalikan.
                    </div>
                    <p class="form-text">Silakan tulis kembali ID Pemilihan <b>{{$election->hash_id}}</b> dibawah</p>
                    <input type="text" class="form-control" name="election_id" autocomplete="off">
                </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Batalkan</button>
            <button type="submit" class="btn btn-danger">Ya, hapus sekarang</button>
          </div>
          </form>
        </div>
      </div>
    </div>
@endsection