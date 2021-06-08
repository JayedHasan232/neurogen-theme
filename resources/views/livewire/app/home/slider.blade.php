<div id="slider" class="carousel slide carousel-fade" data-bs-ride="carousel">

    <ol class="carousel-indicators">
        @for($item = 0; $item < $sliders->count(); $item++)
            <li data-bs-target="#slider" data-bs-slide-to="{{ $item }}" class="{{ $item == 0 ? 'active' : '' }}"></li>
        @endfor
    </ol>

    <div class="carousel-inner">
        @foreach($sliders as $slider)
        <div class="carousel-item {{ $loop->index == 0 ? 'active' : '' }}">
            <img src="{{ asset('storage/' . $slider->image) }}" class="d-block w-100 h-100" alt="">
            <div class="box">
                <div class="title">{{ Str::limit( $slider->title, 50, '...' ) ?? 'Slider title' }}</div>
                <div class="body">
                    <p class="description text-justify">{{ Str::limit( $slider->overview, 195, '...' ) ?? 'Slider description' }}</p>
                    <a href="{{ $slider->link }}" class="btn btn-accent rounded-pill p-md-23 py-md-1 mt-md-3">{{ $slider->link_title }}</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <a class="carousel-control-prev" href="#slider" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </a>
    <a class="carousel-control-next" href="#slider" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </a>
</div>