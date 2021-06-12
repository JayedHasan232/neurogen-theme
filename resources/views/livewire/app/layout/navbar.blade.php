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
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill me-1" viewBox="0 0 16 16">
                                    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                                </svg>
                                {{ __('About') }}
                            </a>
                        </li>
                        <li class="sm-item">
                            <a class="sm-link" href="{{ route('app.contact') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-lines-fill me-1" viewBox="0 0 16 16">
                                    <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z"/>
                                </svg>
                                {{ __('Contact') }}
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link dropdown-toggle" href="{{ route('app.services') }}">{{ __('Healthcare Service') }}</a>
                    <ul class="submenu">
                        <li class="sm-item">
                            <a class="sm-link" href="{{ route('app.welcome') }}">{{ __('Clinics') }}</a>
                            <ul class="childmenu">
                                <li class="cm-item">
                                    <a class="cm-link" href="{{ route('app.healthcare.team.index', 'doctors') }}">{{ __('Doctors') }}</a>
                                </li>
                            </ul>
                        </li>
                        <li class="sm-item">
                            <a class="sm-link" href="#">{{ __('Genetics and Genomic Medicine Centre') }}</a>
                            <ul class="childmenu">
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
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-image me-1" viewBox="0 0 16 16">
                                    <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                                    <path d="M1.5 2A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13zm13 1a.5.5 0 0 1 .5.5v6l-3.775-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12v.54A.505.505 0 0 1 1 12.5v-9a.5.5 0 0 1 .5-.5h13z"/>
                                </svg>
                                {{ __('Image') }}
                            </a>
                        </li>
                        <li class="sm-item">
                            <a class="sm-link" href="{{ route('app.gallery', 'videos') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-youtube me-1" viewBox="0 0 16 16">
                                    <path d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z"/>
                                </svg>    
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