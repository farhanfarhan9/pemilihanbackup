@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row mb-3">
      <div class="col">
        <h4>Kandidat pemilihan</h4>
      </div>
    </div>

    <div class="row">
      <div class="col">
        <!-- -->
        <div class="row">
          <div class="mb-3 col-md-3">
              <div class="card border-0 shadow-sm">
                <div class="card-header border-0 bg-primary text-white text-center">
                  <span class="font-weight-bold">
                    Nomor Urut
                  </span>
                </div>
                <div class="mx-auto bg-primary" style="height: 250px; width: 200px">
                  <img src="{{ url('images/default_candidate.jpg') }}" style="width: 200px; height: 250px; object-fit: contain; background-color: grey">
                </div>
                <div class="card-body">
                  123
                </div>
              </div>
          </div>
          <div class="mb-3 col-md-3">
              <div class="card border-0 shadow-sm">
                <div class="card-header border-0 bg-primary text-white text-center">
                  <span class="font-weight-bold">
                    Nomor Urut
                  </span>
                </div>
                <img src="{{ url('images/default_candidate.jpg') }}" class="img-fluid card-img-top">
                <div class="card-body">
                  123
                </div>
              </div>
          </div>
          <div class="mb-3 col-md-3">
              <div class="card border-0 shadow-sm">
                <div class="card-header border-0 bg-primary text-white text-center">
                  <span class="font-weight-bold">
                    Nomor Urut
                  </span>
                </div>
                <img src="{{ url('images/default_candidate.jpg') }}" class="img-fluid card-img-top">
                <div class="card-body">
                  123
                </div>
              </div>
          </div>
          <div class="mb-3 col-md-3">
              <div class="card border-0 shadow-sm">
                <div class="card-header border-0 bg-primary text-white text-center">
                  <span class="font-weight-bold">
                    Nomor Urut
                  </span>
                </div>
                <img src="{{ url('images/default_candidate.jpg') }}" class="img-fluid card-img-top">
                <div class="card-body">
                  123
                </div>
              </div>
          </div>
          <div class="mb-3 col-md-3">
              <div class="card border-0 shadow-sm">
                <div class="card-header border-0 bg-primary text-white text-center">
                  <span class="font-weight-bold">
                    Nomor Urut
                  </span>
                </div>
                <img src="{{ url('images/default_candidate.jpg') }}" class="img-fluid card-img-top">
                <div class="card-body">
                  123
                </div>
              </div>
          </div>
        </div>
        <!-- -->
      </div>
    </div>
  </div>
@endsection