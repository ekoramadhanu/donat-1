@extends('app')

@section('title', 'Kemajuan Pelayanan')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h4 class="title-custom hide-on-small-only">Status Dokumen</h4>
                <h5 class="title-custom hide-on-med-and-up">Status Dokumen</h5>
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
                        <tr>
                            <td>Jenis Layanan</td>
                            <td>:</td>
                            <td><b>{{ $serviceName }}</b></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>:</td>
                            @switch($data->status)
                                @case(null)
                                    <td class="red-text"><b>Belum disubmit</b></td>
                                    @break
                                @case(1)
                                    <td><b>Verifikasi</b></td>
                                    @break
                                @case(2)
                                    <td class="green-text"><b>Valid</b></td>
                                    @break
                                @case(0)
                                    <td class="red-text"><b>Tidak Valid</b></td>
                                    @break
                                @default
                                    
                            @endswitch
                        </tr>
                        <tr>
                            <td>Keterangan</td>
                            <td>:</td>
                            @if ($data->keterangan != null)
                                <td><b>{{ $data->keterangan }}</b></td>                                
                            @else
                                <td><b>Belum ada keterangan</b></td>
                            @endif
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col s12">
                <h4 class="title-custom hide-on-small-only">Dokumen Lampiran</h4>
                <h5 class="title-custom hide-on-med-and-up">Dokumen Lampiran</h5>
            </div>
        </div>
        @switch($data->jenis_layanan)
            @case("1")
                <div class="row">
                    <div class="col s12">
                        <table class="striped">
                            <tbody>
                                <tr>
                                    <td>Foto sekolah tampak depan</td>
                                    <td>:</td>
                                    @if ($data->foto_depan != null)
                                        <td><a href="{{ $data->foto_depan }}" target="_blank"><b>Lihat data</b></a></td>
                                    @else
                                        <td class="red-text"><b>Belum submit</b></td>
                                    @endif
                                </tr>
                                <tr>
                                    <td>Foto sekolah tampak samping</td>
                                    <td>:</td>
                                    @if ($data->foto_samping != null)
                                        <td><a href="{{ $data->foto_samping }}" target="_blank"><b>Lihat data</b></a></td>
                                    @else
                                        <td class="red-text"><b>Belum submit</b></td>
                                    @endif
                                </tr>
                                <tr>
                                    <td>Foto sekolah tampak belakang</td>
                                    <td>:</td>
                                    @if ($data->foto_belakang != null)
                                        <td><a href="{{ $data->foto_belakang }}" target="_blank"><b>Lihat data</b></a></td>
                                    @else
                                        <td class="red-text"><b>Belum submit</b></td>
                                    @endif
                                </tr>
                                <tr>
                                    <td>Foto papan nama sekolah</td>
                                    <td>:</td>
                                    @if ($data->foto_papan != null)
                                        <td><a href="{{ $data->foto_papan }}" target="_blank"><b>Lihat data</b></a></td>
                                    @else
                                        <td class="red-text"><b>Belum submit</b></td>
                                    @endif
                                </tr>
                                <tr>
                                    <td>Surat Kemenkumham (pendirian lembaga/ijin surat yayasan)</td>
                                    <td>:</td>
                                    @if ($data->surat_kemenkumham != null)
                                        <td><a href="{{ $data->surat_kemenkumham }}" target="_blank"><b>Lihat data</b></a></td>
                                    @else
                                        <td class="red-text"><b>Belum submit</b></td>
                                    @endif
                                </tr>
                                <tr>
                                    <td>Surat pengantar pengajuan dari sekolah</td>
                                    <td>:</td>
                                    @if ($data->surat_pengantar != null)
                                        <td><a href="{{ $data->surat_pengantar }}" target="_blank"><b>Lihat data</b></a></td>
                                    @else
                                        <td class="red-text"><b>Belum submit</b></td>
                                    @endif
                                </tr>
                                <tr>
                                    <td>Form pengajuan NPSN baru</td>
                                    <td>:</td>
                                    @if ($data->form_pengajuan != null)
                                        <td><a href="{{ $data->form_pengajuan }}" target="_blank"><b>Lihat data</b></a></td>
                                    @else
                                        <td class="red-text"><b>Belum submit</b></td>
                                    @endif
                                </tr>
                                <tr>
                                    <td>Lampiran (opsional)</td>
                                    <td>:</td>
                                    @if ($data->lampiran != null)
                                        <td><a href="{{ $data->lampiran }}" target="_blank"><b>Lihat data</b></a></td>
                                    @else
                                        <td class="red-text"><b>Belum submit</b></td>
                                    @endif
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                @break
            @case("2")
                <div class="row">
                    <div class="col s12">
                        <table class="striped">
                            <tbody>
                                <tr>
                                    <td>Surat rekomendasi dari bankesbangpol</td>
                                    <td>:</td>
                                    @if ($data->surat_rekomendasi != null)
                                        <td><a href="{{ $data->surat_rekomendasi }}" target="_blank"><b>Lihat data</b></a></td>
                                    @else
                                        <td class="red-text"><b>Belum submit</b></td>
                                    @endif
                                </tr>
                                <tr>
                                    <td>Surat pengantar dari lembaga/perguruan tinggi/instansi asal</td>
                                    <td>:</td>
                                    @if ($data->surat_pengantar != null)
                                        <td><a href="{{ $data->surat_pengantar }}" target="_blank"><b>Lihat data</b></a></td>
                                    @else
                                        <td class="red-text"><b>Belum submit</b></td>
                                    @endif
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                @break
            @default
                
        @endswitch
    </div>
@endsection

@section('snippet-content')
    <!-- JS import -->
    <script src='https://www.google.com/recaptcha/api.js'></script>
@endsection