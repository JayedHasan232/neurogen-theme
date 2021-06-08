<div>
    <div class="uni-banner-default" style="background: url({{ asset('storage/' . \App\Models\SiteInfo::find(1)->header_bg) }}) no-repeat;">
        <div class="container">
            <!-- Page title -->
            <div class="page-title">
                <div class="page-title-inner">
                    @if($type == 1)
                        <h1>Doctors</h1>
                    @elseif($type == 2)
                        <h1>Lab Personnel</h1>
                    @elseif($type == 3)
                        <h1>Clinical Psychologists</h1>
                    @elseif($type == 4)
                        <h1>Therapists</h1>
                    @elseif($type == 5)
                        <h1>Nutritionists</h1>
                    @endif
                </div>
            </div>
            <!-- End page title -->

            <!-- Breadcrumbs -->
            <ul class="breadcrumbs">
                <li><a href="#">Healthcare Services</a></li>
                @if($type == 1)
                    <li><a>Clinics</a></li>
                    <li><a>Doctors</a></li>
                @elseif($type == 2)
                    <li><a>GGMC</a></li>
                    <li><a>Lab Personnel</a></li>
                @elseif($type == 3)
                    <li><a>Precision Therapeutics</a></li>
                    <li><a>Clinical Psychologists</a></li>
                @elseif($type == 4)
                    <li><a>Precision Therapeutics</a></li>
                    <li><a>Therapists</a></li>
                @elseif($type == 5)
                    <li><a>Precision Therapeutics</a></li>
                    <li><a>Nutritionists</a></li>
                @endif
            </ul>
            <!-- End breadcrumbs -->
        </div>
    </div>

    <div class="uni-our-doctor-body" style="margin-top: 2em">
        <div class="container">
            <div class="row">
                @foreach($members as $member)
                <div class="col-md-4 col-sm-6">
                    <div class="uni-our-doctor-item-default">
                        <div class="item-img">
                            <a href="{{ route('app.healthcare.team.show', [ 'type' => $member_type, 'url' => $member->url ]) }}">
                                <img src="{{ asset('storage/' . $member->image) }}" alt="{{ $member->name }}" class="img-responsive">
                            </a>
                        </div>
                        <div class="item-caption">
                            <div class="item-caption-head">
                                <div class="col-md-12 col-sm-9 col-xs-9 uni-clear-padding">
                                    <div class="item-title">
                                        <h4>{{ $member->name }}</h4>
                                        <span>{{ $member->designation }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="item-caption-info">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <td>Degrees</td>
                                            <td>{{ $member->degrees }}</td>
                                        </tr>
                                    </thead>
                                    {{--<tbody>
                                        <tr>
                                            <td>Child Neurologist</td>
                                            <!-- <td>8:00 am - 17:00 pm</td> -->
                                        </tr>
                                        <tr>
                                            <td>Associate Professor</td>
                                            <!-- <td>10:00 am - 15:00 pm</td> -->
                                        </tr>
                                        <tr>
                                            <td>BSMMU</td>
                                            <!-- <td>8:00 am - 12:00 pm</td> -->
                                        </tr>
                                    </tbody>--}}
                                    <tfoot>
                                        <tr>
                                            <td colspan="2">
                                                <ul>
                                                    <li><a href="mailto:{{ $member->email }}"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>
                                                    @auth()
                                                        @if(Auth::user()->role != 0)
                                                        <li><a href="{{ route('admin.team.edit', $member->id) }}" class="readmore" target="_blank" title="Only admin or modarator can see this."><i class="fa fa-edit" aria-hidden="true"></i></a></li>
                                                        @endif
                                                    @endauth
                                                </ul>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
