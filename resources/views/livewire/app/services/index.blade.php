<div>
    <div class="uni-banner-default" style="background: url({{ asset('storage/' . \App\Models\SiteInfo::find(1)->header_bg) }}) no-repeat; margin-bottom: 2.5em">
        <div class="container">
            <!-- Page title -->
            <div class="page-title">
                <div class="page-title-inner">
                    <h1>Services</h1>
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

    <div class="uni-our-services-2" style="background: url({{ asset('storage/' . \App\Models\SiteInfo::find(1)->header_bg) }}) repeat;">
        <div class="container">
            <div class="uni-services-title">
                <h3>Circle of Care</h3>
            </div>

            <div class="uni-our-service-2-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="tab-nav">
                            <ul class="nav-pills nav-stacked">
                                @php
                                    $flag = 1
                                @endphp
                                @foreach($services as $service)
                                    <li class="{{ $flag == 1 ? 'active' : '' }}"><a href="#tab_{{ $flag }}" data-toggle="pill">{{ $service->title }}</a></li>

                                    @php
                                        $flag++
                                    @endphp
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="tab-content">
                            @php
                                $flag = 1
                            @endphp
                            @foreach($services as $service)
                                <div class="tab-pane {{ $flag == 1 ? 'active' : '' }}" id="tab_{{ $flag }}">
                                    <div class="uni-our-service-2-content-default">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="item-img">
                                                    <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->title }}" class="img-responsive">
                                                </div>
                                            </div>
                                            <div class="col-md-7">
                                                <div class="item-caption">
                                                    <div class="item-caption-title">
                                                        <h3>{{ $service->title }}</h3>
                                                        <div class="uni-line"></div>
                                                    </div>
                                                    <p>{{ $service->overview }} <a href="{{ route('app.services.show', $service->url) }}">Read More</a></p>
                                                    @auth()
                                                        @if(Auth::user()->role != 0)
                                                        <a href="{{ route('admin.service.edit', $service->id) }}" class="readmore" target="_blank" title="Only admin or modarator can see this."><i class="fa fa-edit" aria-hidden="true"></i>Edit</a>
                                                        @endif
                                                    @endauth
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @php
                                    $flag++
                                @endphp
                            @endforeach

                            <div class="tab-pane" id="tab_b">
                                <div class="uni-our-service-2-content-default">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="item-img">
                                                <img src="images/services/Deep Clinical Assessment.jpg" alt="" class="img-responsive">
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="item-caption">
                                                <div class="item-caption-title">
                                                    <h3>Deep Clinical Assessment</h3>
                                                    <div class="uni-line"></div>
                                                </div>
                                                <p>
                                                    শিশুদের অতিরিক্ত চঞ্চলতা, অমনোযোগ, সমবয়সীদের সাথে মিশতে না পারা বা যেকোনো মানসিক বিকাশজনিত সমস্যাগুলি চিহ্নিত করার প্রাথমিক ধাপ হচ্ছে Deep Clinical Assessment.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab_c">
                                <div class="uni-our-service-2-content-default">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="item-img">
                                                <img src="images/services/Behavior Modification Therapy.jpg" alt="" class="img-responsive">
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="item-caption">
                                                <div class="item-caption-title">
                                                    <h3>Behavior Modification Therapy</h3>
                                                    <div class="uni-line"></div>
                                                </div>
                                                <p>
                                                    যে সকল শিশুদের আচার-আচরণে সমস্যা দেখা যায়, চোখের দিকে তাকিয়ে কথা বলতে পারে না, নির্দেশনা অনুসরণ করতে পারে না, তাদের জন্য কার্যকরী প্রক্রিয়া হচ্ছে Behaviour Modification.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab_d">
                                <div class="uni-our-service-2-content-default">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="item-img">
                                                <img src="images/services/Speech and Language Therapy.jpg" alt="" class="img-responsive">
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="item-caption">
                                                <div class="item-caption-title">
                                                    <h3>Speech and Language Therapy</h3>
                                                    <div class="uni-line"></div>
                                                </div>
                                                <p>
                                                    Speech and Language Therapy হলো কথা ও ভাষার বিকাশের চিকিৎসা ব্যবস্থা। অটিজম ও অন্যান্য ভাষাগত সমস্যার সমাধান হচ্ছে Speech and Language Therapy.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab_e">
                                <div class="uni-our-service-2-content-default">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="item-img">
                                                <img src="images/services/Occupational Therapy.jpg" alt="" class="img-responsive">
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="item-caption">
                                                <div class="item-caption-title">
                                                    <h3>Occupational Therapy</h3>
                                                    <div class="uni-line"></div>
                                                </div>
                                                <p>
                                                    Occupational Therapy একটি বিজ্ঞান সম্মত চিকিৎসা যা একজন ব্যক্তির শারীরিক, মানসিক, সামাজিক এবং পরিবেশগত সমস্যা দূর করার মাধ্যমে তাকে দৈনন্দিন কাজে যথাসম্ভব স্বনির্ভর করার লক্ষে অটিজম ও অন্যান্য নিউরো-ডেভেলপমেন্টাল ডিজিজের চিকিৎসা সেবা প্রদান করে থাকে।
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab_f">
                                <div class="uni-our-service-2-content-default">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="item-img">
                                                <img src="images/services/Physiotherapy.jpg" alt="" class="img-responsive">
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="item-caption">
                                                <div class="item-caption-title">
                                                    <h3>Physiotherapy</h3>
                                                    <div class="uni-line"></div>
                                                </div>
                                                <p>
                                                    যেকোনো ধরনের আঘাত ও স্নায়বিক সমস্যার কারণে শিশুদের মাংস পেশির দুর্বলতা,ভারসাম্যহীনতা. হাটতে বসতে  ও চলতে দেরি করা. খিচুনির জন্য হাটতে বা  বসতে দেরি করা এবং  ঘাড় শক্ত বা নরম হওয়া; চলাচলের অক্ষমতাজনিত যাবতীয় সমস্যা ও গতিশীলতা বৃদ্ধির জন্য যে স্বাস্থ্য ও পুনর্বাসন সেবা প্রদান করা হয় তার নাম হলো Physiotherapy.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>