@extends('app')

@section('title', 'Registrasi')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col s12">
        <h4 class="title-custom hide-on-small-only">Registrasi</h4>
        <h6 class="subtitle-custom hide-on-small-only">Silahkan melakukan registrasi layanan</h6>
        <h5 class="title-custom hide-on-med-and-up">Registrasi</h5>
        <h6 class="subtitle-custom hide-on-med-and-up">Silahkan melakukan registrasi layanan</h6>
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
      <form class="col s12" action="{{ URL::to('/registrasi') }}" method="POST">
        {{ csrf_field() }}
        <div class="row">
          <div class="input-field col s12">
            <label for="inputName">Nama pemohon</label>
            <input type="text" class="form-control" id="inputName" placeholder="Masukkan nama lengkap anda" name='name' required>
          </div>
        </div>

        <div class="row">
          <div class="input-field col s12">
            <label for="inputAddress">Alamat</label>
            <input type="text" class="form-control" id="inputAddress" placeholder="Masukkan alamat lengkap" name='address' required>
          </div>
        </div>

        <div class="row">
          <div class="input-field col s12">
              <label for="inputEmail">Email</label>
              <input type="email" class="form-control" id="inputEmail" placeholder="Masukkan email" name='email' required>
          </div>
        </div>

        <div class="row">
          <div class="input-field col s12">
            <label for="inputPhone">No HP</label>
            <input type="number" class="form-control" id="inputPhone" placeholder="Masukkan email" name='phone' required>
          </div>
        </div>

        <div class="row">
          <div class="input-field col s12">
            <select id="inputServices" required name="services">
              <option value="0" disabled selected>Pilih layanan</option>
              <option value="1">Penerbitan NPSN</option>
              <option value="2">Rekomendasi penelitian</option>
              <option value="3">Legalitas Pendirian Sekolah Baru SD</option>
              <option value="4">Pengurusan Mutasi Siswa SD</option>
              <option value="5">Perpanjangan Ijin Operasional SD</option>
              <option value="6">Legalitas Pendirian Sekolah Baru SMP</option>
              <option value="7">Pengurusan Mutasi Siswa SMP</option>
              <option value="8">Perpanjangan Ijin Operasional SMP</option>
              <option value="9">Legalitas Pendirian/ Perpanjangan Ijin Operasional PAUD</option>
              <option value="10">Legalitas Pendirian/ Perpanjangan Ijin Operasional LKP</option>
              <option value="11">Penerbitan NPSN Pendidikan Anak Usia Dini</option>
            </select>
          </div>
        </div>

        <div class="row">
          <div class="input-field col s12">
            <div class="g-recaptcha" data-sitekey="6LceHHsUAAAAAKLpqKGfl-DzqdLsIgqhsJ5LG4cI" aria-describedby="error"></div>
          </div>
        </div>

        <div class="row">
          <div class="input-field col s12">
            <button type="submit" class="waves-effect waves-dark btn-large blue button-umum right white-text">Registrasi</button>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection

@section('snippet-content')
    <!-- JS import -->
    <script src="https://www.google.com/recaptcha/api.js"></script>
@endsection