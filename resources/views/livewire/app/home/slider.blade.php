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
                    @auth()
                        @if(Auth::user()->role != 0)
                            <a href="{{ route('admin.slider.edit', $slider->id) }}" class="btn btn-accent rounded-pill p-md-23 py-md-1 mt-md-3" title="Only admin or modarator can see this." target="_blank">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                </svg>
                                Edit
                            </a>
                        @endif
                    @endauth
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