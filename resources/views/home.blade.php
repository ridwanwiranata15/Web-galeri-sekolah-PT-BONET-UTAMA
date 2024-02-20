<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('bootstrap.min.css') }}">
    <link rel="shortcut icon" href="{{ asset('logo.png') }}" type="image/x-icon">
    <title>Beranda | SMK DIGITAL INDONESIA</title>
</head>

<body>
    <nav class="navbar bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand d-flex align-align-item" href="#">
                <img src="{{ asset('logo.png') }}" alt="Bootstrap" width="100" height="100"
                    class="d-inline-block align-text-top me-3">
                <div class="profile">
                    <h4 class="my-0">SMK DIGITAL INDNESIA</h4>
                    <P class="my-0">Maju seiring perkembangan zaman</P>
                </div>
            </a>
        </div>
    </nav>
    {{-- Stiker --}}
    <div id="carouselExampleCaptions" class="carousel slide">
        @forelse ($sliders as $slider)
            <div class="carousel-inner @if ($loop->iteration == 1) active @endif">
                <div class="carousel-item active">
                    <img src="{{ url('storage/' . $slider->file) }}" class="d-block" alt="..." width="100%">
                    <div class="carousel-caption d-none d-md-block" style="background-color:#00000088">
                        <h5>{{ $slider->title }}</h5>
                    </div>
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                            aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div>
                </div>

            </div>
            
            @empty
                <h4>Tidak ada foto</h4>
        @endforelse
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
    </div>
    {{-- galleri sekolah --}}
    <div class="container my-4">
        <hr>
        <h2 class="text-center">Galeri kegiatan</h2>
        @forelse ($posts as $post)
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{ url('storage/' . $post->galleries[0]->images[0]->file ?? '') }}"
                            class="img-fluid rounded-start" alt="{{ $post->title }}">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h4 class="card-title">{{ $post->title }}</h4>
                            <p class="card-text">{{ $post->amount }}</p>
                            <p class="card-text"><small class="text-body-secondary">Last updated
                                    {{ \Carbon\Carbon::parse($post->updated_at)->diffForHumans() }}</small></p>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <h4>Tidak ada galeri yang di tampilkan</h4>
        @endforelse
    </div>
    <div class="container mt-4">
        <div class="row">
            <div class="col-12 col-md-6">
                <h2 class="text-center m-4">Agenda sekolah</h2>
                <ul class="list-group">
                    @forelse ($agendas as $agenda)
                        <li class="list-group-item">{{$agenda->title}}</li>
                    @empty

                    @endforelse
                </ul>
            </div>
            <div class="col-12 col-md-6">
                <h1 class="text-center">Informasi terkini</h1>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                                {{$information->title}}
                        </h5>
                        <img src="{{url('storage/'.$information->galleries[0]->images[0]->file)}}" alt="" height="100%">
                        <p>{{$information->amount}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-4">
        <hr>
        <div class="row">
            <div class="col-12 col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            {{$map->title}}
                            <p>{{$map->amount}}</p>
                        </h5>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-8">
                <img src="{{url('storage/'.$map->galleries[0]->images[0]->file)}}" alt="{{$map->title}}" width="100%">
            </div>
        </div>
    </div>
    <script src="{{ asset('bootstrap.min.js') }}"></script>
</body>

</html>
