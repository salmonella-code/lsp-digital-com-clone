@extends('home.layouts.app')

@section('content')
    <div class="container-fluid px-0">
        <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                @foreach ($banners as $key => $banner)
                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                        <img src="{{ asset('images/banner/' . $banner->image) }}" class="d-block w-100" alt="banner">
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-target="#carouselExampleInterval" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-target="#carouselExampleInterval" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </button>
        </div>
    </div>

    <div class="container text-center my-5">
        <h2 class="font-weight-bold">Lembaga Sertifikasi Profesi</h2>
        <h4 class="font-weight-bold">Mengapa Kami ?</h4>
        <h6>Karena komitmen kami untuk meningkatkan kebertrimaan Sertifikat Kompetensi oleh industri baik di tingkat
            nasional maupun internasional.</h6>

        <div class="row mt-5">
            <div class="col-lg-4">
                <i class="fas fa-fw fa-scroll h1 text-info"></i>
                <h3 class="font-weight-bold">36 Skema Sertifikasi</h3>
                <p>
                    Skema / Profesi / Jabatan / Pekerjaan di bidang-bidang strategis sektor Teknologi Informasi dan
                    Komunikasi
                </p>
                <a href="{{ route('user.skema.index') }}" class="btn btn-link">Jadwal Sertifikkasi</a>
            </div>
            <div class="col-lg-4">
                <i class="fas fa-fw fa-drafting-compass h1 text-info"></i>
                <h3 class="font-weight-bold">300++ Link DUDI </h3>
                <p>
                    Perusahaan mitra LSP yang siap untuk menerima profesional bidang IT yang telah tersertifikasi, kompeten
                    dan sesuai bidang keahliannya.
                </p>
                <a href="{{ url('/') }}" class="btn btn-link">Lowongan Pekerjaan</a>
            </div>
            <div class="col-lg-4">
                <i class="fas fa-fw fa-child h1 text-info"></i>
                <h3 class="font-weight-bold"> 1000++ SDM Tersertifikasi </h3>
                <p>
                    Daftar tenaga kerja profesional yang telah tersertifikasi oleh LSP Teknologi Digital. Siap untuk
                    menjawab kebutuhan industri.
                </p>
                <a href="{{ url('/') }}" class="btn btn-link">Mecari Talenta</a>
            </div>
        </div>
    </div>
@endsection
