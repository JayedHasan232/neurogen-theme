<section class="sticky-top top-0">
    <div class="indicator-container">
        <div class="indicator-bar" id="scrollIndicator"></div>
    </div>
    <nav class="navbar navbar-expand-md navbar-light bg-white">
        <div class="{{ env('BS_CONTAINER') }}">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ logo() }}" alt="{{ __('Logo') }}">
            </a>

            <ul class="navbar-nav d-none d-md-flex">
                <li class="nav-item">
                    <a class="nav-link dropdown-toggle" href="{{ route('app.welcome') }}">{{ __('Home') }}</a>
                    <ul class="submenu">
                        <li class="sm-item">
                            <a class="sm-link" href="{{ route('app.about') }}">
                                {{ __('About Us') }}
                            </a>
                        </li>
                        <li class="sm-item">
                            <a class="sm-link" href="#">{{ __('Our Team') }}</a>
                            <ul class="childmenu">
                                <li class="cm-item">
                                    <a class="cm-link" href="{{ route('app.our-team.index', 'executive-team') }}">{{ __('Executive Team') }}</a>
                                </li>
                                <li class="cm-item">
                                    <a class="cm-link" href="{{ route('app.our-team.index', 'scientific-advisory-team') }}">{{ __('Scientific Advisory Team') }}</a>
                                </li>
                            </ul>
                        </li>
                        <li class="sm-item">
                            <a class="sm-link" href="{{ url('/#faq') }}">
                                {{ __('FAQ') }}
                            </a>
                        </li>
                        <li class="sm-item">
                            <a class="sm-link" href="{{ route('app.contact') }}">
                                {{ __('Contact Us') }}
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link dropdown-toggle" href="{{ route('app.services') }}">{{ __('Healthcare Service') }}</a>
                    <ul class="submenu">
                        <li class="sm-item">
                            <a class="sm-link" href="{{ route('app.pharmacy') }}">{{ __('Pharmacy') }}</a>
                        </li>
                        <li class="sm-item">
                            <a class="sm-link" href="{{ route('app.welcome') }}">{{ __('Clinics') }}</a>
                            <ul class="childmenu">
                                <li class="cm-item">
                                    <a class="cm-link" href="{{ route('app.healthcare.neurodevelopmental-disorders') }}">{{ __('Neurodevelopmental Disorders') }}</a>
                                </li>
                                <li class="cm-item">
                                    <a class="cm-link" href="#">{{ __('Oncology') }}</a>
                                </li>
                                <li class="cm-item">
                                    <a class="cm-link" href="#">{{ __('Cardiovascular Diseases') }}</a>
                                </li>
                            </ul>
                        </li>
                        <li class="sm-item">
                            <a class="sm-link" href="#">{{ __('Genetics and Genomic Medicine Centre') }}</a>
                            <ul class="childmenu">
                                <li class="cm-item">
                                    <a class="cm-link" href="{{ route('app.healthcare.genetic-counseling') }}">{{ __('Genetic Counseling') }}</a>
                                </li>
                                <li class="cm-item">
                                    <a class="cm-link" href="{{ route('app.healthcare.team.index', 'lab-personnel') }}">{{ __('Genetic Laboratory Personnel') }}</a>
                                </li>
                                <li class="cm-item">
                                    <a class="cm-link" href="{{ route('app.healthcare.genetic-test') }}">{{ __('Genetic Tests') }}</a>
                                </li>
                            </ul>
                        </li>
                        <li class="sm-item">
                            <a class="sm-link" href="#">{{ __('Centre for Precision Therapeutics') }}</a>
                            <ul class="childmenu">
                                <li class="cm-item">
                                    <a class="cm-link" href="{{ route('app.healthcare.deep-clinical-assessment') }}">{{ __('Deep Clinical Assessment') }}</a>
                                </li>
                                <li class="cm-item">
                                    <a class="cm-link" href="{{ route('app.healthcare.therapeutics') }}">{{ __('Therapeutics') }}</a>
                                </li>
                                <li class="cm-item">
                                    <a class="cm-link" href="{{ route('app.healthcare.team.index', 'psychologists') }}">{{ __('Clinical Psychologists') }}</a>
                                </li>
                                <li class="cm-item">
                                    <a class="cm-link" href="{{ route('app.healthcare.team.index', 'therapists') }}">{{ __('Therapists') }}</a>
                                </li>
                                <li class="cm-item">
                                    <a class="cm-link" href="{{ route('app.healthcare.team.index', 'nutritionists') }}">{{ __('Nutritional Guidance') }}</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('app.research') }}">{{ __('Research') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('app.blog.index') }}">{{ __('Blog') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link dropdown-toggle" href="{{ route('app.gallery') }}">{{ __('Gallery') }}</a>
                    <ul class="submenu">
                        <li class="sm-item">
                            <a class="sm-link" href="{{ route('app.gallery', 'images') }}">
                                {{ __('Image') }}
                            </a>
                        </li>
                        <li class="sm-item">
                            <a class="sm-link" href="{{ route('app.gallery', 'videos') }}">
                                {{ __('Video') }}
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('app.career.index') }}">{{ __('Career') }}</a>
                </li>
            </ul>

            <ul class="navbar-nav">
                <li class="nav-item d-flex align-items-center">
                    <a class="btn btn-accent rounded-pill px-3" href="{{ route('app.appointment') }}">{{ __('Get Appointment') }}</a>
                </li>
            </ul>
        </div>
    </nav>
</section>