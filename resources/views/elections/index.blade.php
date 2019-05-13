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

        <div class="row border-bottom pb-3 mb-3">
            <div class="col">
                <form>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-transparent shadow-sm">
                            <i class="fas fa-search"></i>
                        </span>
                      </div>
                      <input type="text" class="form-control shadow-sm" placeholder="Cari pemilihan">
                    </div>
                </form>
            </div>

            <div class="col d-flex justify-content-end">
                <a class="btn btn-primary border-0 shadow-sm" href="{{ route('elections.create') }}">
                    <i class="fas fa-poll-h"></i> Buat pemilihan baru
                </a>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                @forelse($elections->chunk(2) as $chunk)
                <div class="row mb-4">
                  @foreach($chunk as $election)
                    <div class="col-md-6">
                        <div class="card-deck">
                          <div class="card border-0 shadow-sm">
                            <div class="card-body">
                              <div class="card-title-wrapper">
                                <a href="{{ route('elections.show', $election->hash_id) }}" class="no-underline text-decoration-none">
                                    <h4 class="card-title">{{ $election->name }}</h4>
                                </a>
                              </div>
                              <div class="d-flex flex-column mb-2">
                                <span class="text-secondary" style="font-size: 14px">
                                    <i class="fas fa-hourglass-start"></i> {{ $election->voting_starts_on->format('d M Y H:i:s') }}
                                </span>
                                <span class="text-secondary" style="font-size: 14px">
                                    <i class="fas fa-hourglass-end"></i> {{ $election->voting_ends_on->format('d M Y H:i:s') }}
                                </span>
                              </div>
                                <div class="d-flex justify-content-between">
                                    <span class="text-secondary">
                                        <i class="fas fa-users"></i> 2 kandidat
                                    </span>
                                    <span class="text-secondary">
                                        <i class="fas fa-person-booth"></i> 1200 pemilih
                                    </span>
                                </div>
                            </div>
                          </div>
                        </div>
                    </div>
                  @endforeach
                </div>
                @empty
                  @if (auth()->user()->organization->elections()->count()  > 0)
                    <div class="alert alert-warning">
                      <h5>Uh-oh 😣</h5>Pemilihan tidak ditemukan.
                    </div>
                  @else
                    <div class="alert alert-primary">
                      <h5>Hmm 🤔</h5> Sepertinya organisasi kamu belum pernah membuat pemilihan, <a href="{{ route('elections.create') }}">buat pemilihan baru disini</a>.
                    </div>
                  @endif
                @endif
            </div>
        </div>
    </div>
@endsection