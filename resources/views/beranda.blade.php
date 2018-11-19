@extends('app')

@section('title', 'Beranda')
    
@section('content')
    <!--Block UMUM-->
    <section id="umum" class="block umum scrollspy">
        <div class="container">
            <div class="row">
                <div class="col s12">
                    <h4 class="title-custom hide-on-small-only">Ngalam Halokes</h4>
                    <h6 class="subtitle-custom hide-on-small-only">Platform pendidikan kota malang</h6>
                    <h5 class="title-custom hide-on-med-and-up">Ngalam Halokes</h5>
                    <h6 class="subtitle-custom hide-on-med-and-up">Platform pendidikan kota malang</h6>
                </div>
            </div>
            <div class="row">
                <!--Card npsn umum-->
                <div class="col s12 l4">
                    <a href="{{ URL::to('/npsn') }}">
                        <div class="card card-umum-body waves-effect waves-light">
                            <div id="desc-card-umum-0" class="desc-card desc-card-umum">
                                <p class="white-text desc-text-card">Melayani penerbitan <b>Nomor Pokok Sekolah Nasional</b> untuk tingkat sekolah dasar dan sekolah menengah pertama</p>
                            </div>
                            <div class="card-content white-text fixed-size-card">
                                <p class="title-card-custom">Penerbitan Nomor Pokok Sekolah Nasional</p>
                            </div>
                            <div class="card-image hide-on-med-and-down padding-5">
                                <img class="activator" src="{{ URL::asset('/svg/npsn.svg') }}">
                            </div>
                            <div class="waves-effect waves-dark card-action card-umum-footer" data-target="desc-card-umum-0">
                                <a href="{{ URL::to('/npsn') }}">Deskripsi</a>
                            </div>
                        </div>
                    </a>
                </div>
                <!--Card npsn umum-->
                <div class="col s12 l4">
                    <a href="{{ URL::to('/penelitian') }}">
                        <div class="card card-umum-body waves-effect waves-light">
                            <div id="desc-card-umum-1" class="desc-card desc-card-umum">
                                <p class="white-text desc-text-card">Melayani pembuatan surat rekomendasi penelitian</p>
                            </div>
                            <div class="card-content white-text fixed-size-card">
                                <p class="title-card-custom">Rekomendasi Penelitian</p>
                            </div>
                            <div class="card-image hide-on-med-and-down padding-5">
                                <img class="activator" src="{{ URL::asset('/svg/rp.svg') }}">
                            </div>
                            <div class="waves-effect waves-dark card-action card-umum-footer" data-target="desc-card-umum-1">
                                <a href="{{ URL::to('/penelitian') }}">Deskripsi</a>
                            </div>
                        </div>
                    </a>
                </div>
                <!--Card category-->
                <div class="col s12 l4 hide-on-med-and-down">
                    <div class="card card-category-body">
                        <div class="card-content">
                            <p class="title-card-custom grey-text">
                                Kategori Lainnya
                                <ul id="category">
                                    <a href="#sd">
                                        <li class="waves-effect waves-dark collection-item card-category-sd-body">
                                            <span class="title white-text title-card-category">Sekolah Dasar</span>
                                            <p class="white-text subtitle-card-category">
                                                Pelayanan Pendidikan Sekolah Dasar
                                            </p>
                                        </li>
                                    </a>
                                    <a href="#smp">
                                        <li class="waves-effect waves-dark collection-item card-category-smp-body">
                                            <span class="title white-text title-card-category">Sekolah Menengah Pertama</span>
                                            <p class="white-text subtitle-card-category">
                                                Pelayanan Pendidikan Sekolah Sekolah Menengah Pertama
                                            </p>
                                        </li>
                                    </a>
                                    <a href="#informal">
                                        <li class="waves-effect waves-dark collection-item card-category-informal-body">
                                            <span class="title white-text title-card-category">Informal</span>
                                            <p class="white-text subtitle-card-category">
                                                Pelayanan Pendidikan Informal
                                            </p>
                                        </li>
                                    </a>
                                </ul>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--Block SD-->
    <section id="sd" class="block sd scrollspy">
        <div class="container">
            <div class="row">
                <div class="col s12">
                    <h4 class="title-custom hide-on-small-only white-text">Sekolah Dasar</h4>
                    <h6 class="subtitle-custom hide-on-small-only white-text">Pelayanan Sub Bagian Sekolah Dasar</h6>
                    <h5 class="title-custom hide-on-med-and-up white-text">Sekolah Dasar</h5>
                    <h6 class="subtitle-custom hide-on-med-and-up white-text">Pelayanan Sub Bagian Sekolah Dasar</h6>
                </div>
            </div>
            <div class="row">
                <!--Card sekolah baru-->
                <div class="col s12 l4">
                    <a href="{{ URL::to('/npsn') }}">
                        <div class="card card-nonumum-body waves-effect waves-light">
                            <div id="desc-card-sd-0" class="desc-card desc-card-sd">
                                <p class="white-text desc-text-card">Melayani legalitas pendirian sekolah baru tingkat sekolah dasar</p>
                            </div>
                            <div class="card-content button-sd fixed-size-card">
                                <p class="title-card-custom">Legalitas Pendirian Sekolah Baru</p>
                            </div>
                            <div class="card-image hide-on-med-and-down padding-5">
                                <img class="activator" src="{{ URL::asset('/svg/s-red.svg') }}">
                            </div>
                            <div class="waves-effect waves-dark card-action card-sd-footer" data-target="desc-card-sd-0">
                                <a href="{{ URL::to('/npsn') }}">Deskripsi</a>
                            </div>
                        </div>
                    </a>
                </div>
                <!--Card mutasi-->
                <div class="col s12 l4">
                    <a href="{{ URL::to('/npsn') }}">
                        <div class="card card-nonumum-body waves-effect waves-light">
                            <div id="desc-card-sd-1" class="desc-card desc-card-sd">
                                <p class="white-text desc-text-card">Melayani pengurusan mutasi siswa tingkat sekolah dasar</p>
                            </div>
                            <div class="card-content button-sd fixed-size-card">
                                <p class="title-card-custom">Pengurusan Mutasi Siswa</p>
                            </div>
                            <div class="card-image hide-on-med-and-down padding-5">
                                <img class="activator" src="{{ URL::asset('/svg/l-red.svg') }}">
                            </div>
                            <div class="waves-effect waves-dark card-action card-sd-footer" data-target="desc-card-sd-1">
                                <a href="{{ URL::to('/npsn') }}">Deskripsi</a>
                            </div>
                        </div>
                    </a>
                </div>
                <!--Card perpanjangan-->
                <div class="col s12 l4">
                    <a href="{{ URL::to('/npsn') }}">
                        <div class="card card-nonumum-body waves-effect waves-light">
                            <div id="desc-card-sd-2" class="desc-card desc-card-sd">
                                <p class="white-text desc-text-card">Melayani perpanjangan ijin operasional sekolah dasar</p>
                            </div>
                            <div class="card-content button-sd fixed-size-card">
                                <p class="title-card-custom">Perpanjangan Ijin Operasional</p>
                            </div>
                            <div class="card-image hide-on-med-and-down padding-5">
                                <img class="activator" src="{{ URL::asset('/svg/c-red.svg') }}">
                            </div>
                            <div class="waves-effect waves-dark card-action card-sd-footer" data-target="desc-card-sd-2">
                                <a href="{{ URL::to('/npsn') }}">Deskripsi</a>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!--Block SMP-->
    <section id="smp" class="block smp scrollspy">
        <div class="container">
            <div class="row">
                <div class="col s12">
                    <h4 class="title-custom hide-on-small-only white-text">Sekolah Menengah Pertama</h4>
                    <h6 class="subtitle-custom hide-on-small-only white-text">Pelayanan Sub Bagian Sekolah Menengah
                        Pertama</h6>
                    <h5 class="title-custom hide-on-med-and-up white-text">Sekolah Menengah Pertama</h5>
                    <h6 class="subtitle-custom hide-on-med-and-up white-text">Pelayanan Sub Bagian Sekolah Menengah
                        Pertama</h6>
                </div>
            </div>
            <div class="row">
                <!--Card sekolah baru-->
                <div class="col s12 l4">
                    <a href="{{ URL::to('/npsn') }}">
                        <div class="card card-nonumum-body waves-effect waves-light">
                            <div id="desc-card-smp-0" class="desc-card desc-card-smp">
                                <p class="white-text desc-text-card">Melayani legalitas pendirian sekolah baru sekolah menengah pertama</p>
                            </div>
                            <div class="card-content button-smp fixed-size-card">
                                <p class="title-card-custom">Legalitas Pendirian Sekolah Baru</p>
                            </div>
                            <div class="card-image hide-on-med-and-down padding-5">
                                <img class="activator" src="{{ URL::asset('/svg/s-blue.svg') }}">
                            </div>
                            <div class="waves-effect waves-dark card-action card-smp-footer" data-target="desc-card-smp-0">
                                <a href="{{ URL::to('/npsn') }}">Deskripsi</a>
                            </div>
                        </div>
                    </a>
                </div>
                <!--Card mutasi-->
                <div class="col s12 l4">
                    <a href="{{ URL::to('/npsn') }}">
                        <div class="card card-nonumum-body waves-effect waves-light">
                            <div id="desc-card-smp-1" class="desc-card desc-card-smp">
                                <p class="white-text desc-text-card">Melayani pengurusan mutasi siswa sekolah menengah pertama</p>
                            </div>
                            <div class="card-content button-smp fixed-size-card">
                                <p class="title-card-custom">Pengurusan Mutasi Siswa</p>
                            </div>
                            <div class="card-image hide-on-med-and-down padding-5">
                                <img class="activator" src="{{ URL::asset('/svg/l-blue.svg') }}">
                            </div>
                            <div class="waves-effect waves-dark card-action card-smp-footer" data-target="desc-card-smp-1">
                                <a href="{{ URL::to('/npsn') }}">Deskripsi</a>
                            </div>
                        </div>
                    </a>
                </div>
                <!--Card perpanjangan-->
                <div class="col s12 l4">
                    <a href="{{ URL::to('/npsn') }}">
                        <div class="card card-nonumum-body waves-effect waves-light">
                            <div id="desc-card-smp-2" class="desc-card desc-card-smp">
                                <p class="white-text desc-text-card">Melayani perpanjangan ijin operasional sekolah menengah pertama</p>
                            </div>
                            <div class="card-content button-smp fixed-size-card">
                                <p class="title-card-custom">Perpanjangan Ijin Operasional</p>
                            </div>
                            <div class="card-image hide-on-med-and-down padding-5">
                                <img class="activator" src="{{ URL::asset('/svg/c-blue.svg') }}">
                            </div>
                            <div class="waves-effect waves-dark card-action card-smp-footer" data-target="desc-card-smp-2">
                                <a href="{{ URL::to('/npsn') }}">Deskripsi</a>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!--Block INFORMAL-->
    <section id="informal" class="block informal scrollspy">
        <div class="container">
            <div class="row">
                <div class="col s12">
                    <h4 class="title-custom hide-on-small-only white-text">Informal</h4>
                    <h6 class="subtitle-custom hide-on-small-only white-text">Pelayanan Sub Bagian Informal</h6>
                    <h5 class="title-custom hide-on-med-and-up white-text">Sekolah Informal</h5>
                    <h6 class="subtitle-custom hide-on-med-and-up white-text">Pelayanan Sub Bagian Informal</h6>
                </div>
            </div>
            <div class="row">
                <!--Card sekolah baru-->
                <div class="col s12 l4">
                    <a href="{{ URL::to('/npsn') }}">
                        <div class="card card-nonumum-body waves-effect waves-light">
                            <div id="desc-card-informal-0" class="desc-card desc-card-informal">
                                <p class="white-text desc-text-card">Melayani legalitas pendirian atau perpanjangan ijin operasional pendidikan anak usia dini (PAUD)</p>
                            </div>
                            <div class="card-content button-informal fixed-size-card">
                                <p class="title-card-custom">Legalitas Pendirian/ Perpanjangan Ijin Operasional PAUD</p>
                            </div>
                            <div class="card-image hide-on-med-and-down padding-5">
                                <img class="activator" src="{{ URL::asset('/svg/s-green.svg') }}">
                            </div>
                            <div class="waves-effect waves-dark card-action card-informal-footer" data-target="desc-card-informal-0">
                                <a href="{{ URL::to('/npsn') }}">Deskripsi</a>
                            </div>
                        </div>
                    </a>
                </div>
                <!--Card mutasi-->
                <div class="col s12 l4">
                    <a href="{{ URL::to('/npsn') }}">
                        <div class="card card-nonumum-body waves-effect waves-light">
                            <div id="desc-card-informal-1" class="desc-card desc-card-informal">
                                <p class="white-text desc-text-card">Melayani legalitas pendirian atau perpanjangan ijin operasional lembaga kursus dan pelatihan (LKP)</p>
                            </div>
                            <div class="card-content button-informal fixed-size-card">
                                <p class="title-card-custom">Legalitas Pendirian/ Perpanjangan Ijin Operasional LKP</p>
                            </div>
                            <div class="card-image hide-on-med-and-down padding-5">
                                <img class="activator" src="{{ URL::asset('/svg/c-green.svg') }}">
                            </div>
                            <div class="waves-effect waves-dark card-action card-informal-footer" data-target="desc-card-informal-1">
                                <a href="{{ URL::to('/npsn') }}">Deskripsi</a>
                            </div>
                        </div>
                    </a>
                </div>
                <!--Card perpanjangan-->
                <div class="col s12 l4">
                    <a href="{{ URL::to('/npsn') }}">
                        <div class="card card-nonumum-body waves-effect waves-light">
                            <div id="desc-card-informal-2" class="desc-card desc-card-informal">
                                <p class="white-text desc-text-card">Melayani penerbitan <b>Nomor Pokok Sekolah Nasional</b> pendidikan anak usia dini (PAUD)</p>
                            </div>
                            <div class="card-content button-informal fixed-size-card">
                                <p class="title-card-custom">Penerbitan NPSN Pendidikan Anak Usia Dini</p>
                            </div>
                            <div class="card-image hide-on-med-and-down padding-5">
                                <img class="activator" src="{{ URL::asset('/svg/npsn-green.svg') }}">
                            </div>
                            <div class="waves-effect waves-dark card-action card-informal-footer" data-target="desc-card-informal-2">
                                <a href="{{ URL::to('/npsn') }}">Deskripsi</a>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('snippet-content')
    <!-- JS import -->
    <script src="/js/beranda.js"></script>
@endsection