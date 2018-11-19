@extends('app')

@section('title', 'Layanan Halokes Malang')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col s12">
        <h4 class="title-custom hide-on-small-only">{{ $serviceName }}</h4>
        <h6 class="subtitle-custom hide-on-small-only">Halaman submission {{ $serviceName }}</h6>
        <h5 class="title-custom hide-on-med-and-up">{{ $serviceName }}</h5>
        <h6 class="subtitle-custom hide-on-med-and-up">Halaman submission {{ $serviceName }}</h6>
      </div>
    </div>
    @if(session()->has('error'))
        <div class="row">
            <div class="col s12">
                <h5 class="red-text">{{ session()->get('error') }}</h4>
            </div>
        </div>
    @endif
    <div class="row">
      <form class="col s12" action="{{ URL::to("/$serviceUrl") }}" method="POST">
        {{ csrf_field() }}
        <div class="row">
          <div class="input-field col s12">
            <label for="inputNum">No pendaftaran</label>
            <input type="number" class="form-control" id="inputNum" placeholder="Masukkan no pendaftaran" name='regNum' required>
          </div>
        </div>

        <div class="row">
          <div class="input-field col s12">
            <label for="inputAddress">Pin</label>
            <input type="password" class="form-control" id="inputAddress" placeholder="Masukkan pin" name='pin' required>
          </div>
        </div>

        <div class="row">
          <div class="input-field col s12">
            <div class="g-recaptcha" data-sitekey="6LceHHsUAAAAAKLpqKGfl-DzqdLsIgqhsJ5LG4cI" aria-describedby="error"></div>
          </div>
        </div>

        <div class="row">
          <div class="input-field col s12">
            <button type="submit" class="waves-effect waves-dark btn-large blue button-umum right white-text">Cek Dokumen</button>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection

@section('snippet-content')
    <!-- JS import -->
    <script src='https://www.google.com/recaptcha/api.js'></script>
@endsection