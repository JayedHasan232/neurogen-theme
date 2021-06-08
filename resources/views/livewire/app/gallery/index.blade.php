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
                {{ $identifier == 'images' ? 'Image' : 'Video' }} Gallery
            </h1>
        </div>
    </div>

    <div class="row g-4">
        @foreach($items as $item)
        <div class="col-sm-6 col-md-4">
            <div class="blog-post">
                <div class="informations">
                    @if($identifier == 'images')
                    <div class="image-frame">
                        <img src="{{ asset('storage/' . ($item->image_medium ?? $item->source) ) }}" alt="{{ $item->title }}" class="card-img-top">
                    </div>
                    @else
                    <div class="image-frame">
                        <iframe src="https://www.youtube.com/embed/{{ $item->source }}" title="{{ $item->title }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        @endforeach

        @if($qty <= $items->count() && $qty < $totalItems)
        <div class="col-12" wire:loading.remove>
            <div class="btn btn-accent rounded-pill" wire:click="loadMore">Load more</div>
        </div>
        @endif
    </div>

    <div class="mt-3" wire:loading>
        <div class="btn text-white bg-accent">Loading...</div>
    </div>
</div>