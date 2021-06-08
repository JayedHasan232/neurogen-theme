<div>
    <div class="uni-banner-default" style="background: url({{ asset('storage/' . \App\Models\SiteInfo::find(1)->header_bg) }}) no-repeat; margin-bottom: 2.5em">
        <div class="container">
            <!-- Page title -->
            <div class="page-title">
                <div class="page-title-inner">
                    <h1>Precision Therapeutics</h1>
                </div>
            </div>
            <!-- End page title -->

            <!-- Breadcrumbs -->
            <ul class="breadcrumbs">
                <li><a href="#">Healthcare Services</a></li>
                <li><a href="#">Precision Therapeutics</a></li>
                <li><a href="#">Therapists</a></li>
            </ul>
            <!-- End breadcrumbs -->
        </div>
    </div>

    <div class="uni-shortcode-tabs-body">
        <div class="container">
            <div class="uni-shortcode-tabs-default">
                <div class="uni-shortcode-tab-3">
                    <div class="tabbable-panel">
                        <div class="tabbable-line">
                            <ul class="nav nav-tabs ">
                                <li class="active">
                                    <a href="{{ route('app.healthcare.therapeutics') }}">
                                        Therapeutics
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('app.healthcare.deep-clinical-assessment') }}">
                                        Deep Clinical Assessment
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_default_32">
                                    {!! $test->article !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>