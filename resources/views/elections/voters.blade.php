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

  <div class="row">
    <div class="col">

      <div class="mb-3">
        <a href="{{ route('elections.show', $election->hash_id) }}#voters">
          <i class="fas fa-arrow-left"></i> Kembali ke pemilihan
        </a>
      </div>

      <div class="card border-0 shadow-sm">
        <div class="card-header border-0 bg-primary text-white">
          <strong><a class="text-white" href="{{ route('elections.show', $election->hash_id) }}">{{ $election->name }}</a></strong>: daftar pemilih
        </div>
        <div class="card-body">
          <div class="d-flex flex-column flex-md-row mb-3">
            <form action="{{ route('elections.voters', $election->hash_id) }}" class="form-inline" method="GET">
                <div class="input-group mb-2 mr-sm-2">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="fas fa-search"></i>
                    </div>
                  </div>
                  <input type="text" class="form-control" name="search" placeholder="Cari pemilih..." value="{{ request()->search }}" autocomplete="off">
                  @if (request()->has('search'))
                    <div class="input-group-append">
                        <a class="btn btn-danger" href="{{ url()->previous() }}">
                          <i class="fas fa-times"></i>
                        </a>
                    </div>
                  @endif
                </div>
                <select class="custom-select mb-2 mr-sm-2" name="status">
                  <option value="">Filter status</option>
                  <option value="1">Aktif</option>
                  <option value="0">Tidak aktif</option>
                </select>
            </form>
          </div>
          <div class="table-responsive" id="voter-list">
            <table class="table table-hover mb-0">
              <thead>
                <tr class="bg-light">
                  <th class="border-0">No</th>
                  <th class="border-0">Identitas</th>
                  <th class="border-0">Nama</th>
                  <th class="border-0">Aktif</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($voters as $voter)
                  <tr>
                    <td class="bg-light text-dark text-center">{{ $voters->perPage() * ($voters->currentPage() - 1) + $loop->iteration }}</td>
                    <td>{{ $voter->identity }}</td>
                    <td>{{ $voter->name }}</td>
                    <td>
                    <div class="custom-control custom-switch">
                      <input type="checkbox" class="custom-control-input toggle-voter-status" id="status-{{$voter->id}}" data-url="{{ route('elections.updateVoters', ['election' => $election->hash_id, 'voter' => $voter->id]) }}" @if ($voter->pivot->status) checked @endif>
                      <label class="custom-control-label" for="status-{{$voter->id}}"></label>
                    </div>
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="6" class="text-center">Tidak ada data pemilih <a href="#">tambah sekarang</a>.</td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>
          <div class="bg-light p-2 border-top">
              {{ $voters->appends(request()->all())->fragment('voter-list')->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection