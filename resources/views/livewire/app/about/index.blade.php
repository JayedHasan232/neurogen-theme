<section class="about-page">
    <div class="{{ env('BS_CONTAINER') }} py-5">
        <div class="row g-5 align-items-center">
            <div class="col-md-5">
                    <img src="{{ asset('storage/' . $about->image) }}" alt="Circle of care" class="card-img-top">
            </div>
            <div class="col-md-7">
                <div class="informations text-justify">
                    <h1 class="page-title">{{ $about->title }}</h1>
                    <p class="overview">{{ $about->overview }}</p>
                    <h2 class="service-title">Evidence Based Healthcare</h2>
                    <ul class="services">
                        @foreach( explode(',', $about->circle) as $circle )
                        <li class="service-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill text-accent me-1" viewBox="0 0 16 16">
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                            </svg>
                            {{ $circle }}
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    @livewire('app.about.partners')
    @livewire('app.about.our-journey')
</section>