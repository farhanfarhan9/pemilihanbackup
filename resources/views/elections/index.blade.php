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
                      <div class="input-group-append">
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
                              <div class="d-flex justify-content-end">
                                  <a class="btn btn-info text-white btn-sm mr-1" href="{{route('elections.edit',$election->id)}}"><i class="fas fa-edit"></i> Edit</a>
                                  <form action="{{route('elections.destroy',$election->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</button>
                                  </form>
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