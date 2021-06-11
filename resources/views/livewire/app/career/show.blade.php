<article>
    <section class="py-5 bg-light">
        <div class="{{ env('BS_CONTAINER') }}">
            <h1 class="blog-title">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-briefcase-fill me-2 text-accent" viewBox="0 0 16 16">
                    <path d="M6.5 1A1.5 1.5 0 0 0 5 2.5V3H1.5A1.5 1.5 0 0 0 0 4.5v1.384l7.614 2.03a1.5 1.5 0 0 0 .772 0L16 5.884V4.5A1.5 1.5 0 0 0 14.5 3H11v-.5A1.5 1.5 0 0 0 9.5 1h-3zm0 1h3a.5.5 0 0 1 .5.5V3H6v-.5a.5.5 0 0 1 .5-.5z"/>
                    <path d="M0 12.5A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5V6.85L8.129 8.947a.5.5 0 0 1-.258 0L0 6.85v5.65z"/>
                </svg>
                {{ $career->title }}
            </h1>

            <div class="social-share-icon my-4">
                <span>Share this job: </span>
                <a class="icon" target="_blank" href="https://web.facebook.com/sharer.php?t={{ $career->title }}&u={{ URL::current() }}">
                    <img height="40" width="40" src="{{ asset('assets/icons/share-icon/facebook.svg') }}" alt="facebook">
                </a>
                <a class="icon" target="_blank" href="https://www.linkedin.com/shareArticle?title={{ $career->title }}&url={{ URL::current() }}">
                    <img height="40" width="40" src="{{ asset('assets/icons/share-icon/linkedin.svg') }}" alt="linkedin">
                </a>
                <a class="icon" target="_blank" href="https://twitter.com/intent/tweet?text={{ $career->title }}&url={{ URL::current() }}">
                    <img height="40" width="40" src="{{ asset('assets/icons/share-icon/twitter.svg') }}" alt="twitter">
                </a>
                <a class="icon" target="_blank" class="share-icon" href="https://www.tumblr.com/share?t={{ $career->title }}&u={{ URL::current() }}&v=3">
                    <img height="40" width="40" src="{{ asset('assets/icons/share-icon/tumblr.svg') }}" alt="tumblr">
                </a>
                <a class="icon" onclick="window.print()">
                    <img height="40" width="40" src="{{ asset('assets/icons/share-icon/printer.svg') }}" alt="printer">
                </a>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="{{ env('BS_CONTAINER') }}">
            <div class="row mb-5">
            <div class="col-md-10 mx-auto">
                <div class="blog-details article text-justify">
                    {!! $career->article !!}
                </div>
            </div>
            </div>
        </div>
    </section>
</article>