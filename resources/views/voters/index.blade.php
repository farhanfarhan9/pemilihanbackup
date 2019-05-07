@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mb-3">
            <div class="col">
                <div class="d-flex justify-content-between">
                    <h3 class="font-weight-normal">
                        <i class="fas fa-person-booth"></i> Pemilih terdaftar
                    </h3>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="card border-0 shadow-sm">
                    <div class="card-header pt-4 bg-white border-0">
                            <div class="d-flex justify-content-between">
                                <form class="form-inline">
                                    <div class="mr-2 form-group">
                                        <select class="form-control select2" style="width: 150px">
                                            <option>Filter status</option>
                                            <option>Aktif</option>
                                            <option>Tidak aktif</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                          <input type="text" class="form-control shadow-sm" style="width: 300px" placeholder="Cari pemilih">
                                          <div class="input-group-append">
                                            <span class="input-group-text bg-primary text-light border-0 shadow-sm">
                                                <i class="fas fa-search"></i>
                                            </span>
                                          </div>
                                        </div>
                                    </div>
                                </form>

                                <div>
                                    <a class="btn btn-primary border-0 shadow-sm" href="{{ route('voters.create') }}">
                                        <i class="fas fa-person-booth"></i> Tambah pemilih
                                    </a>
                                    <a class="btn btn-secondary border-0 shadow-sm" href="#">
                                        <i class="fas fa-upload"></i> Impor pemilih
                                    </a>
                                </div>
                            </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <th class="bg-light">
                                        <div class="custom-control custom-checkbox">
                                          <input type="checkbox" class="custom-control-input" id="selectAllVoter">
                                          <label class="custom-control-label" for="selectAllVoter"></label>
                                        </div>
                                    </th>
                                    <th class="bg-light">Identitas</th>
                                    <th class="bg-light">Nama</th>
                                    <th class="bg-light">Aksi</th>
                                </thead>
                                <tbody>
                                    @forelse($voters as $voter)
                                        <tr>
                                            <td>
                                                <div class="custom-control custom-checkbox">
                                                  <input type="checkbox" class="custom-control-input" name="voter[{{ $voter->id }}]" id="voter[{{ $voter->id }}]">
                                                  <label class="custom-control-label" for="voter[{{ $voter->id }}]"></label>
                                                </div>
                                            </td>
                                            <td>{{ $voter->identity }}</td>
                                            <td>{{ $voter->name }}</td>
                                            <td>
                                                <a class="text-secondary text-decoration-none" href="{{ route('voters.show', $voter->id) }}">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a class="text-secondary text-decoration-none" href="{{ route('voters.edit', $voter->id) }}">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a class="text-secondary text-decoration-none" href="{{ route('voters.destroy', $voter->id) }}">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3">Tidak ditemukan data pemilih</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <div class="d-flex">
                            <form class="mr-auto form-inline">
                                <div class="mr-2 form-group">
                                    <select class="form-control select2" style="width: 150px">
                                        <option>Aksi masal</option>
                                        <option>Hapus</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-outline-primary" type="submit">Simpan</button>
                                </div>
                            </form>

                            {{ $voters->links() }}
                        </div>
                            
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection