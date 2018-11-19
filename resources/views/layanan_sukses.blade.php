@extends('app')

@section('title', 'Layanan Sukses')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h4 class="title-custom hide-on-small-only">Selamat!</h4>
                <h6 class="subtitle-custom hide-on-small-only">Anda telah berhasil menyelesaikan submisi layanan</h6>
                <h5 class="title-custom hide-on-med-and-up">Selamat!</h5>
                <h6 class="subtitle-custom hide-on-med-and-up">Anda telah berhasil menyelesaikan submisi layanan</h6>
            </div>
        </div>
        <div class="row">
            <div class="card col s12 teal white-text">
                <div class="card-content">
                    <span class="card-title">
                        Silahkan pantau kemajuan layanan anda dengan menggunakan nomor pendaftaran dan pin di <a class="yellow-text" href="{{ URL::to('/kemajuan') }}">link berikut</a>.
                    </span>
                </div>
            </div>
        </div>
    </div>
@endsection
