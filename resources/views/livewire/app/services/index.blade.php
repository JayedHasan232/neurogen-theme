<div class="{{ env('BS_CONTAINER') }} py-5">
    <div class="sec-head d-block">
        <div class="breadcrumb d-flex align-items-center m-0 mb-5">
            <a href="/" class="me-2 text-muted text-capitalize">
                {{ __( 'Home' ) }}
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                </svg>
            </a>
            <h1 class="me-2 text-accent text-capitalize">
                {{ __('Services') }}
            </h1>
        </div>
    </div>

    <div class="row g-4">
        @foreach($services as $service)
        <div class="col-sm-6 col-md-4">
            <div class="blog-post">
                <div class="informations">
                    <div class="image-frame">
                        <img src="{{ asset('storage/' . ($service->image_medium ?? $service->image) ) }}" alt="{{ $service->title }}" class="card-img-top">
                    </div>
                    <h3 class="title">{{ $service->title }}</h3>
                    <div class="d-block text-left mb-2">
                        <span class="badge bg-light d-inline text-accent mr-1" title="Reading time">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-watch" viewBox="0 0 16 16">
                                <path d="M8.5 5a.5.5 0 0 0-1 0v2.5H6a.5.5 0 0 0 0 1h2a.5.5 0 0 0 .5-.5V5z"/>
                                <path d="M5.667 16C4.747 16 4 15.254 4 14.333v-1.86A5.985 5.985 0 0 1 2 8c0-1.777.772-3.374 2-4.472V1.667C4 .747 4.746 0 5.667 0h4.666C11.253 0 12 .746 12 1.667v1.86a5.99 5.99 0 0 1 1.918 3.48.502.502 0 0 1 .582.493v1a.5.5 0 0 1-.582.493A5.99 5.99 0 0 1 12 12.473v1.86c0 .92-.746 1.667-1.667 1.667H5.667zM13 8A5 5 0 1 0 3 8a5 5 0 0 0 10 0z"/>
                            </svg>
                            {{ readingTime( $service->article ) }} Min
                        </span>
                    </div>
                    <p class="overview">{{ Str::limit(strip_tags($service->overview), 150, '...') }}</p>
                </div>
                <div class="link-group">
                    <a href="{{ route('app.services.show', $service->url) }}" class="link">
                        Read More
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right arrow" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                        </svg>
                    </a>
                    @auth()
                        @if(Auth::user()->role != 0)
                            <a href="{{ route('admin.service.edit', $service->id) }}" class="link" title="Only admin or modarator can see this." target="_blank">
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
</div>