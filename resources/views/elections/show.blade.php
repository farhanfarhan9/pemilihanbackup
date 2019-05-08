@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mb-3">
            <div class="col">
                <h3 class="font-weight-normal">
                    <i class="fas fa-poll-h"></i> Pemilihan
                </h3>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col">
                <div class="card border-0 shadow-sm">
                    <div class="card-header border-0 bg-primary text-light">
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
                                <a class="text-secondary" href="{{ route('elections.edit', $election->id) }}"><i class="fas fa-edit"></i></a>
                                <p class="text-secondary">
                                    Berisikan informasi pemilihan.
                                </p>
                            </div>
                            <div class="col-12 col-md-9">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <th class="border-top-0" style="width: 35%">Nama pemilihan</th>
                                                <td class="border-top-0">{{ $election->name }}</td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Voting dibuka
                                                    <small class="d-none d-md-block font-weight-normal text-muted">Pemilihan akan mulai dilaksanakan pada</small>
                                                </th>
                                                <td style="vertical-align: middle">
                                                    {{ $election->voting_starts_on->format('d-m-Y h:i') }} WIB
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Voting dimulai
                                                    <small class="d-block font-weight-normal text-muted">Pemilihan akan mulai dilaksanakan pada</small>
                                                </th>
                                                <td style="vertical-align: middle">
                                                    {{ $election->voting_starts_on->format('d-m-Y h:i') }} WIB
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

                        <div class="row pt-4" style="border-top: 2px solid #dee2e6">
                            <div class="col-12 col-md-3">
                                <strong style="font-size: 16px">Kandidat</strong>
                                <a class="text-secondary" href="#"><i class="fas fa-edit"></i></a>
                                <p class="text-secondary">
                                    Berisikan informasi kandidat pemilihan.
                                </p>
                            </div>
                            <div class="col-12 col-md-9">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <th class="border-top-0" style="width: 35%">Jumlah</th>
                                                <td class="border-top-0">
                                                    {{ $election->candidates->count() }} kandidat
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

                        <div class="row pt-4" style="border-top: 2px solid #dee2e6">
                            <div class="col-12 col-md-3">
                                <strong style="font-size: 16px">Daftar pemilih</strong>
                                <a class="text-secondary" href="#"><i class="fas fa-edit"></i></a>
                                <p class="text-secondary">
                                    Berisikan informasi kandidat pemilihan.
                                </p>
                            </div>
                            <div class="col-12 col-md-9">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <th class="border-top-0" style="width: 35%">Jumlah</th>
                                                <td class="border-top-0">
                                                    {{ auth()->user()->organization->voters->count() }} pemilih
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Daftar pemilih</th>
                                                <td>
                                                    Semua <a href="{{ route('voters.index') }}">pemilih terdaftar</a>.
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="row pt-4" style="border-top: 2px solid #dee2e6">
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

                    <div class="card-footer boder-0">
                        <a class="text-decoration-none" href="{{ route('elections.index') }}">
                            <i class="fas fa-arrow-left"></i> Kembali ke daftar pemilihan
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection