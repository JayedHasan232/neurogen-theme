<div>
    <div class="uni-banner-default" style="background: url({{ asset('storage/' . \App\Models\SiteInfo::find(1)->header_bg) }}) no-repeat; margin-bottom: 2.5em">
        <div class="container">
            <!-- Page title -->
            <div class="page-title">
                <div class="page-title-inner">
                    <h1>Genetic Tests</h1>
                </div>
            </div>
            <!-- End page title -->

            <!-- Breadcrumbs -->
            <ul class="breadcrumbs">
                <li><a href="#">Home</a></li>
                <li><a href="#">Healthcare Services</a></li>
                <li><a href="#">Genetic Tests</a></li>
            </ul>
            <!-- End breadcrumbs -->
        </div>
    </div>


    <div class="uni-shortcode-typography-body">

        <div class="container">
            <div class="uni-typography-text-alight-default">
                {!! $test->article !!}
            </div>
        </div>
    </div>
</div>