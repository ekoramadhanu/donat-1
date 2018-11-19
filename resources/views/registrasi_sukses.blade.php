@extends('app')

@section('title', 'Registrasi Sukses')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h4 class="title-custom hide-on-small-only">Selamat!</h4>
                <h6 class="subtitle-custom hide-on-small-only">Anda terdaftar dalam layanan {{ $serviceName }}</h6>
                <h5 class="title-custom hide-on-med-and-up">Selamat!</h5>
                <h6 class="subtitle-custom hide-on-med-and-up">Anda terdaftar dalam layanan {{ $serviceName }}</h6>
            </div>
        </div>
        <div class="row">
            <div class="card col s12 teal white-text">
                <div class="card-content">
                    <span class="card-title">Informasi akun</span>
                    <span>
                        <table border="0">
                            <tr>
                                <td>No. pendaftaran </td>
                                <td>&nbsp;&nbsp; : </td>
                                <td><b>{{ $regNum }}</b></td>
                            </tr>
                            <tr>
                                <td>PIN </td>
                                <td>&nbsp;&nbsp; : </td>
                                <td><b>{{ $pin }}</b></td>
                            </tr>
                        </table>
                    </span>
                </div>
                <div class="card-action">
                    <span>
                        Simpan No Pendaftaran dan PIN untuk melakukan submission dokumen dan mengecek status kemajuan dokumen.
                    </span>
                </div>
            </div>
            <div class="card col s12 yellow darken-1 black-text">
                <div class="card-content">
                    <span class="card-title">Perhatian!</span>
                    <span>
                        1 nomor pendaftaran dan pin, hanya untuk 1 layanan
                    </span>
                </div>
            </div>
        </div>
    </div>
@endsection
