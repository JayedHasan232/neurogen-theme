<article>
    <section class="py-5 bg-light">
        <div class="{{ env('BS_CONTAINER') }}">
            <div class="row">
                <div class="col-md-7 order-md-2 mb-3 mb-md-0 featured-image">
                    <img class="img-fluid" src='{{ asset("storage/$service->image") }}' alt="{{ $service->title }}" title="{{ $service->title }}">
                </div>
                <div class="col-md-5 order-md-1">

                    <div class="blog-information">
                        <h1 class="blog-title">{{ $service->title }}</h1>
                    </div>

                    <div class="social-share-icon my-4">
                        <span class="badge bg-light d-inline text-accent mr-1" title="Reading time">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-watch" viewBox="0 0 16 16">
                                <path d="M8.5 5a.5.5 0 0 0-1 0v2.5H6a.5.5 0 0 0 0 1h2a.5.5 0 0 0 .5-.5V5z"/>
                                <path d="M5.667 16C4.747 16 4 15.254 4 14.333v-1.86A5.985 5.985 0 0 1 2 8c0-1.777.772-3.374 2-4.472V1.667C4 .747 4.746 0 5.667 0h4.666C11.253 0 12 .746 12 1.667v1.86a5.99 5.99 0 0 1 1.918 3.48.502.502 0 0 1 .582.493v1a.5.5 0 0 1-.582.493A5.99 5.99 0 0 1 12 12.473v1.86c0 .92-.746 1.667-1.667 1.667H5.667zM13 8A5 5 0 1 0 3 8a5 5 0 0 0 10 0z"/>
                            </svg>
                            {{ readingTime( $service->article ) }} Min
                        </span>

                        <a class="icon" target="_blank" href="https://web.facebook.com/sharer.php?t={{ $service->title }}&u={{ URL::current() }}">
                            <img height="40" width="40" src="{{ asset('assets/icons/share-icon/facebook.svg') }}" alt="facebook">
                        </a>
                        <a class="icon" target="_blank" href="https://www.linkedin.com/shareArticle?title={{ $service->title }}&url={{ URL::current() }}">
                            <img height="40" width="40" src="{{ asset('assets/icons/share-icon/linkedin.svg') }}" alt="linkedin">
                        </a>
                        <a class="icon" target="_blank" href="https://twitter.com/intent/tweet?text={{ $service->title }}&url={{ URL::current() }}">
                            <img height="40" width="40" src="{{ asset('assets/icons/share-icon/twitter.svg') }}" alt="twitter">
                        </a>
                        <a class="icon" target="_blank" class="share-icon" href="https://www.tumblr.com/share?t={{ $service->title }}&u={{ URL::current() }}&v=3">
                            <img height="40" width="40" src="{{ asset('assets/icons/share-icon/tumblr.svg') }}" alt="tumblr">
                        </a>
                        <a class="icon" onclick="window.print()">
                            <img height="40" width="40" src="{{ asset('assets/icons/share-icon/printer.svg') }}" alt="printer">
                        </a>
                    </div>

                    <div class="author-information">
                        <div class="image">
                            <img src="{{ asset('https://rayple.com/media/dummy/user.jpg') }}" alt="{{ env('APP_NAME') }}" title="{{ env('APP_NAME') }}">
                        </div>
                        <div class="information">
                            <h3 class="name">{{ env('APP_NAME') }}</h3>
                            <small class="date">{{ $service->created_at->format('d M Y') }}</small>
                        </div>
                    </div>

                    @auth
                        @if(Auth::user()->role == 1)
                        <a href="{{ route('admin.service.edit', $service->id) }}" class="btn btn-accent mt-5 rounded-pill" title="Only Admin can see this."><i class="fas fa-edit mr-1"></i>Edit</a>
                        @endif
                    @endauth

                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="{{ env('BS_CONTAINER') }}">
            <div class="row mb-5">
            <div class="col-md-10 mx-auto">
                <div class="blog-details article text-justify">
                    {!! $service->article !!}
                </div>
            </div>
            </div>
        </div>
    </section>

    @if( $relatedServices->count() )
    <section class="{{ env('BS_CONTAINER') }} py-5">
        <h2 class="d-block mb-5">Evidence Based Healthcare</h2>
        <div class="row g-4">
            @foreach($relatedServices as $service)
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
    </section>
    @endif
</article>