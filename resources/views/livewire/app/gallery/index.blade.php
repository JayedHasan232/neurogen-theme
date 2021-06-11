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
                    <div class="image-frame">
                        @if($identifier == 'images')
                            <img src="{{ asset('storage/' . ($item->image_medium ?? $item->source) ) }}" alt="{{ $item->title }}" class="card-img-top" data-bs-toggle="modal" data-bs-target="#item{{ $item->id }}Modal">
                        @else
                            <iframe src="https://www.youtube.com/embed/{{ $item->source }}" title="{{ $item->title }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        @endif
                        @auth()
                            @if(Auth::user()->role != 0)
                                <a href="{{ route('admin.gallery.edit', $item->id) }}" class="link d-block mt-2" title="Only admin or modarator can see this." target="_blank">
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
        </div>
        <!-- Modal -->
        <div class="modal fade bd-example-modal-lg" id="item{{ $item->id }}Modal" tabindex="-1" aria-labelledby="item{{ $item->id }}ModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <img src="{{ asset('storage/' . ($item->source ?? $item->image_medium) ) }}" alt="" class="card-img-top">
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