@push('stylesheets')
<link href="{{ asset('css/blog.css') }}" rel="stylesheet">
@endpush

<div>
    <div class="uni-banner-default" style="background: url({{ asset('storage/' . \App\Models\SiteInfo::find(1)->header_bg) }}) no-repeat; margin-bottom: 2.5em">
        <div class="container">
            <!-- Page title -->
            <div class="page-title">
                <div class="page-title-inner">
                    <h1>{{ $service->title }}</h1>
                </div>
            </div>
            <!-- End page title -->

            <!-- Breadcrumbs -->
            <ul class="breadcrumbs">
                <li><a href="/">Home</a></li>
                <li><a href="#">Services</a></li>
            </ul>
            <!-- End breadcrumbs -->
        </div>
    </div>
    <div class="uni-our-services-1">
        <div class="uni-shortcode-icons-box-5" style="padding-top: 2em">
            <div class="container blog-show">
                <div class="image">
                    <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->title }}" class="img-responsive">
                </div>
                <div class="article">
                    {!! $service->article !!}
                </div>
            </div>
        </div>
    </div>
</div>