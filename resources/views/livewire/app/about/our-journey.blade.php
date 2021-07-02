<div class="{{ env('BS_CONTAINER') }} py-5 text-center">
    <h2 class="section-title mb-5">আমাদের এগিয়ে চলার গল্প</h2>

    <div id="slider" class="carousel slide carousel-slide our-journey" data-bs-ride="carousel">
        <ul class="carousel-indicators">
            @foreach($identifiers as $identifier)
                <li data-bs-target="#slider" data-bs-slide-to="{{ $loop->index }}" class="{{ $loop->index == 0 ? 'active' : '' }}">
                    {{ $identifier }}
                </li>
            @endforeach
        </ul>

        <div class="carousel-inner">
            @foreach($identifiers as $identifier)
            <div class="carousel-item {{ $loop->index == 0 ? 'active' : '' }}">
                <div class="row g-5">
                    @foreach($journeys as $journey)

                        @if($journey->identifier == $identifier)

                            @if($journey->image)
                            <div class="col-md-3">
                                <div class="image">
                                    <img src="{{ asset('storage/' . $journey->image) }}" class="card-img-top" alt="{{ $journey->title }}">
                                    <p class="caption">{{ $journey->title }}</p>
                                </div>
                            </div>
                            @else
                            <div class="col">
                                <div class="info text-start">
                                    <h3 class="title">{{ $journey->title }}</h3>
                                    @if($journey->identifier != "অর্জন")
                                    <p class="overview text-justify">{{ $journey->overview }}</p>
                                    @else
                                    <pre class="overview text-justify">{{ $journey->overview }}</pre>
                                    @endif
                                </div>
                            </div>
                            @endif
                        @endif
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
