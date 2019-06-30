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
          <a class="btn btn-primary border-0 shadow-sm" href="{{ route('voters.create') }}">
            <i class="fas fa-person-booth"></i> Tambah pemilih
          </a>
          <a class="btn btn-secondary border-0 shadow-sm" href="#">
            <i class="fas fa-upload"></i> Impor pemilih
          </a>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover mb-0">
              <thead>
                <tr class="bg-light">
                  <th class="border-0">No</th>
                  <th class="border-0">Identitas</th>
                  <th class="border-0">IPK</th>
                  <th class="border-0">Nama</th>
                  <th class="border-0">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @forelse($voters as $voter)
                <tr>
                  <td class="bg-light text-dark text-center">{{ $voters->perPage() * ($voters->currentPage() - 1) + $loop->iteration }}</td>
                  <td>{{ $voter->identity }}</td>
                  <td>{{ $voter->ipk }}</td>
                  <td>{{ $voter->name }}</td>
                  <td>
                    <a class="text-secondary text-decoration-none" href="{{ route('voters.show', $voter->hash_id) }}">
                      <i class="fas fa-eye"></i>
                    </a>
                    <a class="text-secondary text-decoration-none" href="{{ route('voters.edit', $voter->hash_id) }}">
                      <i class="fas fa-edit"></i>
                    </a>
                    <a class="text-secondary text-decoration-none" href="{{ route('voters.destroy', $voter->hash_id) }}">
                      <i class="fas fa-trash"></i>
                    </a>
                  </td>
                </tr>
                @empty
                <tr>
                  <td colspan="4">Tidak ditemukan data pemilih</td>
                </tr>
                @endforelse
              </tbody>
            </table>
          </div>

          <div>
            {{ $voters->links() }}
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection