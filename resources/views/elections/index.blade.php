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
                        <span class="input-group-text bg-primary text-light border-0 shadow-sm">
                            <i class="fas fa-search"></i>
                        </span>
                      </div>
                      <input type="text" class="form-control border-0 shadow-sm" placeholder="Cari pemilihan">
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
            <div class="col-2">
                <h6 class="font-weight-bold text-secondary mb-3 mt-3"><i class="fas fa-filter"></i> FILTER</h6>
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Semua</a>
                    <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Akan dimulai</a>
                    <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Telah selesai</a>
                </div>
            </div>

            <div class="col">
                
                @forelse($elections->chunk(3) as $chunk)
                <div class="row mb-4">
                  @foreach($chunk as $election)
                    <div class="col-md-4">
                        <div class="card-deck">
                          <div class="card border-0 shadow-sm">
                            <div class="card-body">
                              <div style="margin-left: -1.25rem;
                                          padding-left: 1.25rem;
                                          border-left: 5px solid #3490dc">
                                <a href="{{ route('elections.show', $election->id) }}" class="no-underline text-decoration-none">
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