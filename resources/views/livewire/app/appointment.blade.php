<div>
    <div class="uni-banner-default" style="background: url({{ asset('storage/' . \App\Models\SiteInfo::find(1)->header_bg) }}) no-repeat;">
        <div class="container">
            <!-- Page title -->
            <div class="page-title">
                <div class="page-title-inner">
                    <h1>Book Appointment</h1>
                </div>
            </div>
            <!-- End page title -->

            <!-- Breadcrumbs -->
            <ul class="breadcrumbs">
                <li><a href="#">home</a></li>
                <li><a href="#">Book Appointment</a></li>
            </ul>
            <!-- End breadcrumbs -->
        </div>
    </div>

    <div class="uni-contact-us-body">

        <div class="uni-contact-us-body-content">
            <div class="container">
                <div class="row">
                    
                    <div class="col-md-5">
                        <div class="uni-services-opinging-hours">
                            <div class="uni-services-opinging-hours-title">
                                <div class="icon">
                                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                                </div>
                                <h4>Opening hours</h4>
                            </div>
                            <div class="uni-services-opinging-hours-content">
                                <table class="table">
                                    @foreach($opening_hours as $time)
                                    <tr>
                                        <td>{{ $time->day }}</td>
                                        <td>{{ $time->from }} - {{ $time->to }}</td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="uni-single-department-appointment-form">

                            <div class="uni-home-title">
                                <h3 style="font-size: 25px">Book an appoitment</h3><hr>
                                <h3 style="font-size: 25px">or <i class="fa fa-phone-square" style="color: green"></i><a href="tel:+88{{ $info->mobile }}"> +88{{ $info->mobile }}</a> for appointment</h3>
                            </div>

                            <form action="#">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="input-group form-group">
                                            <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                                            <input type="text" class="form-control" name="name" value="" placeholder="your name">
                                        </div>
                                        <div class="input-group form-group">
                                            <span class="input-group-addon"><i class="fa fa-phone" aria-hidden="true"></i></span>
                                            <input type="tel" class="form-control" name="phone" value="" placeholder="phone number">
                                        </div>
                                        <div class="input-group form-group">
                                            <span class="input-group-addon"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                                            <input type="email" class="form-control" name="email" value="" placeholder="email">
                                        </div>
                                        <div class="input-group form-group">
                                            <div class="input-group date date-check-in" data-date="12-02-2017" data-date-format="mm-dd-yyyy">
                                                <span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                                <input name="date1" class="form-control" type="text" value="12-02-2017">
                                                <span class="input-group-addon btn"><i class="fa fa-calendar" id="ti-calendar1" aria-hidden="true"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="input-group form-group">
                                            <textarea id="message" name="phone" class="form-control" placeholder="note"></textarea>
                                        </div>
                                        <button class="vk-btn vk-btn-send">send</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
