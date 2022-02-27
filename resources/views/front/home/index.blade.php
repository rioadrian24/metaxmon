@extends('layout.front')

@section('content')
<section id="home" class="hero">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 align-self-center">
                <h1 class="text-white title-hero fw-bold">{{ banner()->title }}</h1>
                <h4 class="text-muted">{{ banner()->description }}</h4>
            </div>
            <div class="col-lg-5 col-10">
                <img src="{{ Storage::url(banner()->thumbnail) }}" class="img-fluid" alt="">
            </div>
        </div>
    </div>
</section>
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            @foreach(nfts() as $nft)
            <div class="col-lg-3 mb-3">
                    <img src="{{ Storage::url($nft->nft) }}" class="img-fluid">
                    <img src="{{ Storage::url($nft->egg) }}" class="img-fluid">
            </div>
            @endforeach
        </div>
    </div>
</section>
<section id="work" class="py-5">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-7">
                <h4 class="text-muted text-center">{{ description()->description }}</h4>
            </div>
        </div>
        <div class="row justify-content-center">
            @foreach (works() as $work)
            <div class="col-lg-3 mb-4">
                <div class="card shadow border-0 card-work bg-dark">
                    <div class="card-body py-4">
                        <h3 class="text-white font-weight-semibold">{{ $work->title }}</h3>
                        <p class="text-muted h6">{{ $work->description }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section id="roadmap" class="py-5">
    <div class="container">
        <div class="row justify-content-center my-5">
            <div class="col-lg-9 text-center">
                <h2 class="text-white mb-2 fw-bold">ROADMAP</h2>
            </div>
        </div>
        <ul class="timeline">
            @foreach (roadmaps() as $maps)
            @if ($loop->iteration % 2 == 0)
            <li class="timeline-inverted">
                @else
            <li>
                @endif
                <div class="timeline-badge"></div>
                <div class="timeline-panel">
                    @if ($loop->iteration % 2 == 0)
                    <div class="timeline-heading">
                        @else
                        <div class="timeline-heading text-lg-end">
                            @endif
                            <h4 class="timeline-title fw-semibold text-white">{{ $maps->title }}</h3>
                        </div>
                        @if ($loop->iteration % 2 == 0)
                        <div class="timeline-body">
                            @else
                            <div class="timeline-body text-lg-end">
                                @endif
                                <h6 class="text-muted">{{ $maps->description }}</h6>
                            </div>
                        </div>
            </li>
            @endforeach
        </ul>
    </div>
</section>
@stop