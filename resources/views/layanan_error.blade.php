@extends('app')

@section('title', 'Layanan Error')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h4 class="title-custom hide-on-small-only red-text">{{ $title }}</h4>
                <h5 class="title-custom hide-on-med-and-up red-text">{{ $title }}</h5>
            </div>
            <div class="card col s12 red darken-1 white-text">
                <div class="card-content">
                    <span class="card-title">Perhatian!</span>
                    <span>
                        {{ $msg }}
                    </span>
                </div>
            </div>
        </div>
    </div>
@endsection
