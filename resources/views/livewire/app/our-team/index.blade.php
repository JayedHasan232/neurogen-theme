<section class="{{ env('BS_CONTAINER') }} py-5">
    <div class="sec-head d-block">
        <div class="breadcrumb d-flex align-items-center m-0 mb-5">
            <a href="/" class="me-2 text-muted text-capitalize">
                {{ __( 'Home' ) }}
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                </svg>
            </a>
            <a href="#" class="me-2 text-muted text-capitalize">
                {{ __( 'Our Team' ) }}
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                </svg>
            </a>
            <h1 class="me-2 text-accent text-capitalize">
                @if($type == 6)
                    Executive Team
                @elseif($type == 7)
                    Scientific Advisory Team
                @endif
            </h1>
        </div>
    </div>

    <div class="row g-4 doctors" id="teamReorder">
        @foreach($members as $member)
            <div class="col-sm-6 col-md-3" id="member_{{ $member->id }}">
                <div class="card h-100">
                    <div class="image-frame">
                        <img src="{{ asset('storage/' .  ($member->image_medium ?? $member->image)) }}" alt="{{ $member->name }}" class="card-img-top">
                    </div>
                    <div class="card-body">
                        <div class="contents">
                            <h3 class="title">{{ $member->name }}</h3>
                            <h4 class="designation">{{ $member->designation }}</h4>
                            <h5 class="degrees">{{ $member->degrees }}</h5>
                        </div>
                        <div class="link-group">
                            <a href="mailto:{{ $member->email }}" class="link">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                                    <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/>
                                </svg>
                            </a>
                            <a href="{{ route('app.our-team.show', ['type' => $member_type, 'url' => $member->url, ]) }}" class="link">
                                Read More
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right arrow" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                </svg>
                            </a>
                        </div>
                    </div>                        
                </div>
            </div>
        @endforeach
    </div>
</section>

@push('scripts')
    @auth()
        @if(Auth::user()->role != 0)
            <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" defer></script>
        @endif
    @endauth
@endpush