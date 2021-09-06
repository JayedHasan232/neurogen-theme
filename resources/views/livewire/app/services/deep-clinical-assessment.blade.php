<div class="{{ env('BS_CONTAINER') }} py-5">
    <div class="sec-head d-block">
        <div class="breadcrumb d-flex align-items-center m-0 mb-5">
            <a href="/" class="me-2 text-muted text-capitalize">
                {{ __( 'Home' ) }}
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                </svg>
            </a>
            <a href="{{ route('app.services') }}" class="me-2 text-muted text-capitalize">
                {{ __('Healthcare Services') }}
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                </svg>
            </a>
            <a href="#" class="me-2 text-muted text-capitalize">
                {{ __('CPT') }}
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                </svg>
            </a>
            <h1 class="me-2 text-accent text-capitalize">
                {{ __('Deep Clinical Assessment') }}
            </h1>
        </div>
    </div>
</div>
<section class="section home-circle-of-care" style="margin-top:-5em">
    <div class="{{ env('BS_CONTAINER') }}">
        <div class="row g-4">
            @foreach($services as $service)
                @if($service->url == 'psychological-assessment' || $service->url == 'ados-2-test' || $service->url == 'adhd-screening' || $service->url == 'iq-test' || $service->url == 'behavior-modification-therapy')
                <div class="col-sm-6 col-md-4">
                    <div class="card h-100">
                        <div class="image-frame">
                            <img src="{{ asset('storage/' . ($service->image_medium ?? $service->image) ) }}" alt="" class="card-img-top">
                        </div>
                        <div class="card-body">
                            <div class="contents">
                                <h3 class="title">{{ $service->title }}</h3>
                                <p class="overview text-justify-center">{{ $service->overview }}</p>
                            </div>
                            @if($service->article)
                            <a href="{{ route('app.services.show', $service->url) }}" class="link">
                                Read More
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right arrow" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                </svg>
                            </a>
                            @endif
                        </div>                        
                    </div>
                </div>
                @endif
            @endforeach
        </div>
    </div>
</section>