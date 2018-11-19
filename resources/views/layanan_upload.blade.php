@extends('app')

@section('title', 'Layanan Halokes Malang')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col s12">
        <h4 class="title-custom hide-on-small-only">Unggah Dokumen</h4>
        <h5 class="title-custom hide-on-med-and-up">Unggah Dokumen</h5>
      </div>
    </div>
    <div class="card col s12 yellow darken-1 black-text">
        <div class="card-content">
            <span class="card-title">Perhatian!</span>
            <span>
                Dengan menekan tombol Submit, Maka dokumen tidak akan bisa diubah kembali.
                <br><b>Ukuran file maksimal 1000 KB</b>
            </span>
        </div>
    </div>
    <div class="row">
        <form class="col s12" action="{{ URL::to("/$serviceUrl") }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" value="{{ $regNum }}" name="regNum">
            <input type="hidden" value="{{ $pin }}" name="pin">
            @switch($service)
                @case(1)
                    <div class="row">
                        <div class="file-field input-field">
                            <div class="btn">
                                <span>Foto depan sekolah (jpg)</span>
                                <input type="file" name="foto_depan">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="file-field input-field">
                            <div class="btn">
                                <span>Foto samping sekolah (jpg)</span>
                                <input type="file" name="foto_samping">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="file-field input-field">
                            <div class="btn">
                                <span>Foto belakang sekolah (jpg)</span>
                                <input type="file" name="foto_belakang">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="file-field input-field">
                            <div class="btn">
                                <span>Foto papan sekolah (jpg)</span>
                                <input type="file" name="foto_papan">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="file-field input-field">
                            <div class="btn">
                                <span>Surat Kemenkumham (pendirian lembaga/ijin surat yayasan) (pdf)</span>
                                <input type="file" name="surat_kemenkumham">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="file-field input-field">
                            <div class="btn">
                                <span>Surat pengantar pengajuan dari sekolah (pdf)</span>
                                <input type="file" name="surat_pengantar">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="file-field input-field">
                            <div class="btn">
                                <span>Form pengajuan NPSN baru (pdf)</span>
                                <input type="file" name="form_pengajuan">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="file-field input-field">
                            <div class="btn">
                                <span>Lampiran (opsional) (pdf)</span>
                                <input type="file" name="lampiran">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text">
                            </div>
                        </div>
                    </div>
                    @break
                @case(2)
                    <div class="row">
                            <div class="file-field input-field">
                                <div class="btn">
                                    <span>Surat rekomendasi dari bankesbangpol (pdf)</span>
                                    <input type="file" name="surat_rekomendasi">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="file-field input-field">
                                <div class="btn">
                                    <span>Surat pengantar dari lembaga/perguruan tinggi/instansi asal (pdf)</span>
                                    <input type="file" name="surat_pengantar">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text">
                                </div>
                            </div>
                        </div>
                    @break
                @default
            @endswitch
            <div class="row">
                <div class="input-field col s12">
                    <button type="submit" class="waves-effect waves-dark btn-large blue button-umum right white-text">Submit</button>
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