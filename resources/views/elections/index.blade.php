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
                
                <div class="row mb-4">
                    <div class="col">
                        <div class="card-deck">
                          <div class="card border-0 shadow-sm">
                            <div class="card-body">
                              <div style="margin-left: -1.25rem;
                                          padding-left: 1.25rem;
                                          border-left: 5px solid #3490dc">
                                <a href="#" class="no-underline text-decoration-none">
                                    <h4 class="card-title">Pemilihan kepala suku</h4>
                                </a>
                              </div>
                              <p class="card-text">
                                Pemilihan umum untuk memilih kepala suku di organisasi {{ auth()->user()->organization->name }}.
                              </p>
                              <div class="d-flex flex-column mb-2">
                                <span class="text-secondary" style="font-size: 14px">
                                    <i class="fas fa-hourglass-start"></i> 25 Mei 2019 07:00
                                </span>
                                <span class="text-secondary" style="font-size: 14px">
                                    <i class="fas fa-hourglass-end"></i> 25 Mei 2019 12:00
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
                          <div class="card border-0 shadow-sm">
                            <div class="card-body">
                              <h5 class="card-title">Card title</h5>
                              <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                            </div>
                          </div>
                          <div class="card border-0 shadow-sm">
                            <div class="card-body">
                              <h5 class="card-title">Card title</h5>
                              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <div class="card-deck">
                          <div class="card border-0 shadow-sm">
                            <div class="card-body">
                              <div style="margin-left: -1.25rem; padding-left: 1.25rem; border-left: 5px solid #3490dc">
                                <h5 class="card-title">Card title</h5>
                              </div>
                              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            </div>
                          </div>
                          <div class="card border-0 shadow-sm">
                            <div class="card-body">
                              <h5 class="card-title">Card title</h5>
                              <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                            </div>
                          </div>
                          <div class="card border-0 shadow-sm">
                            <div class="card-body">
                              <h5 class="card-title">Card title</h5>
                              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <nav aria-label="Page navigation example">
                          <ul class="pagination justify-content-center">
                            <li class="page-item disabled">
                              <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                              <a class="page-link" href="#">Next</a>
                            </li>
                          </ul>
                        </nav>
                    </div>
                </div>




            </div>
        </div>
    </div>
@endsection