<div>
    <div class="uni-banner-default" style="background: url({{ asset('storage/' . \App\Models\SiteInfo::find(1)->header_bg) }}) no-repeat;">
        <div class="container">
            <!-- Page title -->
            <div class="page-title">
                <div class="page-title-inner">
                    <h1>Details</h1>
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
    
    <div class="uni-doctor-details-body">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="uni-our-doctor-item-default">
                        <div class="item-img">
                            <img src="{{ asset('storage/' . $member->image) }}" alt="{{ $member->name }}" class="img-responsive">
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
                                            <td>Faculty</td>
                                            <td>Medicine, DU</td>
                                        </tr>
                                        <tr>
                                            <td>MS</td>
                                            <td>MDMR</td>
                                        </tr>
                                        <tr>
                                            <td>NeuroGen</td>
                                        </tr>
                                    </tbody>--}}
                                    <tfoot>
                                        <tr>
                                            <td colspan="2">
                                                <ul>
                                                    <li>
                                                        <a href="mailto: farjanaslt@gmail.com"><i class="fa fa-envelope" aria-hidden="true"></i></a>
                                                    </li>
                                                    @auth()
                                                        @if(Auth::user()->role != 0)
                                                        <li>
                                                            <a href="{{ route('admin.team.edit', $member->id) }}" target="_blank" title="Only admin or modarator can see this."><i class="fa fa-edit" aria-hidden="true"></i></a>
                                                        </li>
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

                <div class="col-md-8">
                    <div class="uni-doctor-details-right">

                        <!--SUMMARY-->
                        <div class="uni-doctor-details-summary">
                            <div class="uni-doctor-details-title">
                                <h3>Summary</h3>
                                <div class="uni-divider"></div>
                            </div>
                            <p>{{ $member->summary }}</p>
                        </div>

                        <!--EDUCATION/DEGREE-->
                        <div class="uni-doctor-details-degrees">
                            <div class="uni-doctor-details-title">
                                <h3>Degrees</h3>
                                <div class="uni-divider"></div>
                            </div>
                            <ul>
                                @php
                                    $degrees = explode(',', $member->degrees);
                                @endphp

                                @foreach($degrees as $degree)
                                <li>
                                    <span>{{ $degree }}</span>
                                </li>
                                @endforeach
                            </ul>
                        </div>

                        <!--CONTACT-->
                        <div class="uni-doctor-details-contact">
                            <div class="uni-doctor-details-title">
                                <h3>Contact</h3>
                                <div class="uni-divider"></div>
                            </div>
                            <ul>
                                <li> <i class="fa fa-map-marker" aria-hidden="true"></i>{{ $info->address }}</li>
                                <li><i class="fa fa-phone" aria-hidden="true"></i>+88{{ $info->mobile }}</li>
                                <li><i class="fa fa-envelope-o" aria-hidden="true"></i>{{ $info->email }}</li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
