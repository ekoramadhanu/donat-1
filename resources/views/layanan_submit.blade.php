@extends('app')

@section('title', 'Layanan Halokes Malang')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col s12">
        <h4 class="title-custom hide-on-small-only">Informasi Pemohon</h4>
        <h6 class="subtitle-custom hide-on-small-only">Halaman submission {{ $serviceName }}</h6>
        <h5 class="title-custom hide-on-med-and-up">Informasi pemohon</h5>
        <h6 class="subtitle-custom hide-on-med-and-up">Halaman submission {{ $serviceName }}</h6>
      </div>
    </div>
    <div class="row">
        <div class="col s12">
            <table class="striped">
                <tbody>
                    <tr>
                        <td>Nama Pemohon</td>
                        <td>:</td>
                        <td><b>{{ $data->nama_pemohon }}</b></td>
                    </tr>
                    <tr>
                        <td>Alamat Pemohon</td>
                        <td>:</td>
                        <td><b>{{ $data->alamat_pemohon }}</b></td>
                    </tr>
                    <tr>
                        <td>Email Pemohon</td>
                        <td>:</td>
                        <td><b>{{ $data->email_pemohon }}</b></td>
                    </tr>
                    <tr>
                        <td>No. HP Pemohon</td>
                        <td>:</td>
                        <td><b>{{ $data->nohp_pemohon }}</b></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
      <div class="col s12">
        <h4 class="title-custom hide-on-small-only">Data Yang Dibutuhkan</h4>
        <h5 class="title-custom hide-on-med-and-up">Data Yang Dibutuhkan</h5>
      </div>
    </div>
    <div class="row">
      <form class="col s12" action="{{ URL::to("/$serviceUrl") }}" method="POST">
        {{ csrf_field() }}
        <input type="hidden" value="{{ $data->no_registrasi }}" name="regNum">
        <input type="hidden" value="{{ $data->pin }}" name="pin">
        @switch($service)
            @case(1)
                <div class="row">
                    <div class="input-field col s12">
                        <label for="nama_kepsek">Nama kepala sekolah</label>
                        <input value="{{ $data->nama_kepsek }}" type="text" class="form-control" id="nama_kepsek" placeholder="Masukkan nama kepala sekolah" name="nama_kepsek" required>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <label for="nama_sekolah">Nama sekolah</label>
                        <input value="{{ $data->nama_sekolah }}" type="text" class="form-control" id="nama_sekolah" placeholder="Masukkan nama sekolah" name="nama_sekolah" required>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <label for="alamat">Alamat sekolah</label>
                        <input value="{{ $data->alamat }}" type="text" class="form-control" id="alamat" placeholder="Masukkan alamat sekolah" name="alamat" required>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <select class="form-control" id="jenjang_sekolah" name="jenjang_sekolah" required>
                            <option value="0" disabled @if ($data->jenjang_sekolah == null) selected @endif>Masukkan jenjang sekolah</option>
                            <option value="1" @if ($data->jenjang_sekolah == 1) selected @endif>TK/RA</option>
                            <option value="2" @if ($data->jenjang_sekolah == 2) selected @endif>SD/MI</option>
                            <option value="3" @if ($data->jenjang_sekolah == 3) selected @endif>SMP/MTS</option>
                            <option value="4" @if ($data->jenjang_sekolah == 4) selected @endif>SLB</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <select class="form-control" id="status_sekolah" name="status_sekolah" required>
                            <option value="0" disabled @if ($data->status_sekolah == null) selected @endif>Masukkan status sekolah</option>
                            <option value="1" @if ($data->status_sekolah == 1) selected @endif>Negeri</option>
                            <option value="2" @if ($data->status_sekolah == 2) selected @endif>Swasta</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <label for="provinsi">Provinsi sekolah</label>
                        <input value="{{ $data->provinsi }}" type="text" class="form-control" id="provinsi" placeholder="Masukkan provinsi sekolah" name="provinsi" required>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <label for="kota">Kota sekolah</label>
                        <input value="{{ $data->kota }}" type="text" class="form-control" id="kota" placeholder="Masukkan kota sekolah" name="kota" required>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <label for="kecamatan">Kecamatan sekolah</label>
                        <input value="{{ $data->kecamatan }}" type="text" class="form-control" id="kecamatan" placeholder="Masukkan kecamatan sekolah" name="kecamatan" required>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <label for="kelurahan">Kelurahan sekolah</label>
                        <input value="{{ $data->kelurahan }}" type="text" class="form-control" id="kelurahan" placeholder="Masukkan kelurahan sekolah" name="kelurahan" required>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <label for="email">Email Sekolah</label>
                        <input value="{{ $data->email }}" type="email" class="form-control" id="email" placeholder="Masukkan email sekolah" name="email" required>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <label for="no_sk_pendirian">No.SK/izin pendirian sekolah</label>
                        <input value="{{ $data->no_sk_pendirian }}" type="number" class="form-control" id="no_sk_pendirian" placeholder="Masukkan no.SK/izin pendirian sekolah" name="no_sk_pendirian" required>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <label for="tanggal_sk_pendirian">Tanggal sk pendirian</label>
                        <input value="{{ $data->tanggal_sk_pendirian }}" type="text" class="form-control datepicker" id="tanggal_sk_pendirian" placeholder="Masukkan tanggal sk pendirian" name="tanggal_sk_pendirian" required>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <label for="no_sk_operasional">No.SK/izin operasional sekolah</label>
                        <input value="{{ $data->no_sk_operasional }}" type="number" class="form-control" id="no_sk_operasional" placeholder="Masukkan no.SK/izin operasional sekolah" name="no_sk_operasional" required>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <label for="tanggal_sk_operasional">Tanggal sk operasional</label>
                        <input value="{{ $data->tanggal_sk_operasional }}" type="text" class="form-control datepicker" id="tanggal_sk_operasional" placeholder="Masukkan tanggal sk operasional" name="tanggal_sk_operasional" required>
                    </div>
                </div>
                @break
            @case(2)
                @break
            @default
        @endswitch
        <div class="row">
          <div class="input-field col s12">
            <button type="submit" class="waves-effect waves-dark btn-large blue button-umum right white-text">Next</button>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection

@section('snippet-content')
    <!-- JS import -->
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script src="/js/datePicker.js"></script>
@endsection