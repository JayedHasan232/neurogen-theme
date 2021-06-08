<section class="section bg-light home-appointment" style="background-image: linear-gradient(to right, #019ec5a9, rgba(0, 106, 133, 0.644)), url('https://www.neurogenbd.com/wp-content/uploads/2017/09/Neurogen-Slider-3-2.jpg');">
    <div class="{{ env('BS_CONTAINER') }}">
        <div class="row">
            <div class="col-md-4">
                <div class="image-frame">
                    <img src="{{ asset('assets/images/doctor.png') }}" alt="">
                </div>
            </div>
            <div class="col-md-8">
                <div class="informations">
                    <h2 class="title">Consultation with your best doctor<br>anywhere and anytime.</h2>
                    <p class="overview">Now you can make an appointment with your doctor anywhere and anytime<br>via online booking which make it easier.</p>
                    <div class="benefits">
                        <span class="item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-check-fill" viewBox="0 0 16 16">
                                <path d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4V.5zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2zm-5.146-5.146-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708.708z"/>
                            </svg>
                            Easy online booking here
                        </span>
                        <span class="item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                                <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                <path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z"/>
                                <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
                            </svg>
                            Served directly by experts
                        </span>
                    </div>
                    <a class="btn btn-light text-accent rounded-pill px-3" href="#">{{ __('Get Appointment') }}</a>
                </div>
            </div>
        </div>
    </div>
</section>