<section class="section home-circle-of-care">
    <div class="{{ env('BS_CONTAINER') }}">
        <h2 class="section-title">Evidence Based Healthcare</h2>
        {{--<p class="section-overview text-justify-center">
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Culpa eos blanditiis labore, non iusto alias, eaque, deleniti doloribus qui id itaque nesciunt! Eos, hic recusandae consequatur quisquam voluptatem error maxime. Lorem ipsum, dolor sit amet consectetur adipisicing elit.
        </p>--}}

        <div class="row g-4">
            @foreach($services as $service)
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
            @endforeach
        </div>
    </div>
</section>