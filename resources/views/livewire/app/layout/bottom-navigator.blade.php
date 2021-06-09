<div class="d-block d-md-none">
    <div class="bottom-navigator">
        <div class="container-xl">
            <div class="bn-navs">
                <a href="{{ route('app.contact') }}" class="bn-nav">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-fill" viewBox="0 0 16 16">
                        <path d="M8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6-.097 1.016-.417 2.13-.771 2.966-.079.186.074.394.273.362 2.256-.37 3.597-.938 4.18-1.234A9.06 9.06 0 0 0 8 15z"/>
                    </svg>
                </a>
                <a href="/" class="bn-nav">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                        <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
                    </svg>
                </a>
                <a href="{{ route('app.services') }}" class="bn-nav">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-basket2-fill" viewBox="0 0 16 16">
                        <path d="M5.929 1.757a.5.5 0 1 0-.858-.514L2.217 6H.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h.623l1.844 6.456A.75.75 0 0 0 3.69 15h8.622a.75.75 0 0 0 .722-.544L14.877 8h.623a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1.717L10.93 1.243a.5.5 0 1 0-.858.514L12.617 6H3.383L5.93 1.757zM4 10a1 1 0 0 1 2 0v2a1 1 0 1 1-2 0v-2zm3 0a1 1 0 0 1 2 0v2a1 1 0 1 1-2 0v-2zm4-1a1 1 0 0 1 1 1v2a1 1 0 1 1-2 0v-2a1 1 0 0 1 1-1z"/>
                    </svg>
                </a>
                <a href="{{ route('app.healthcare.team.index', 'doctors') }}" class="bn-nav">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                        <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"/>
                    </svg>
                </a>
                <div class="bn-nav" data-bs-toggle="offcanvas" data-bs-target="#offcanvasMobile" role="button" aria-controls="offcanvasMobile">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasMobile" aria-labelledby="offcanvasMobileLabel">
        <div class="offcanvas-sidebar-contents">
            <div class="offcanvas-header">
                <img class="logo" src="{{ logo() }}" alt="Logo">
            </div>

            <nav class="offcanvas-menu accordion" id="sidebarAccordion">
                <ul class="oc-list-group">
                    <!-- Healthcare Service -->
                    <li class="oc-li1" id="healthcareService">
                        <a class="oc-li1-link" data-bs-toggle="collapse" data-bs-target="#collapseHealthcareService" aria-expanded="true" aria-controls="collapseHealthcareService">Healthcare Service</a>
                        <ul class="collapse oc-list-group2" id="collapseHealthcareService" aria-labelledby="headingHealthcareService" data-bs-parent="#sidebarAccordion">
                            <li class="oc-li2" id="clinic">
                                <a class="oc-li2-link" href="{{ route('app.healthcare.team.index', 'doctors') }}">{{ __('Doctors') }}</a>
                            </li>
                            <li class="oc-li2">
                                <a class="oc-li2-link" href="{{ route('app.healthcare.team.index', 'lab-personnel') }}">{{ __('Genetic Laboratory Personnel') }}</a>
                            </li>
                            <li class="oc-li2">
                                <a class="oc-li2-link" href="{{ route('app.healthcare.genetic-test') }}">{{ __('Genetic Tests') }}</a>
                            </li>
                            <li class="oc-li2">
                                <a class="oc-li2-link" href="{{ route('app.healthcare.deep-clinical-assessment') }}">{{ __('Deep Clinical Assessment') }}</a>
                            </li>
                            <li class="oc-li2">
                                <a class="oc-li2-link" href="{{ route('app.healthcare.therapeutics') }}">{{ __('Therapeutics') }}</a>
                            </li>
                            <li class="oc-li2">
                                <a class="oc-li2-link" href="{{ route('app.healthcare.team.index', 'psychologists') }}">{{ __('Clinical Psychologists') }}</a>
                            </li>
                            <li class="oc-li2">
                                <a class="oc-li2-link" href="{{ route('app.healthcare.team.index', 'therapists') }}">{{ __('Therapists') }}</a>
                            </li>
                            <li class="oc-li2">
                                <a class="oc-li2-link" href="{{ route('app.healthcare.team.index', 'nutritionists') }}">{{ __('Nutritional Guidance') }}</a>
                            </li>
                        </ul>
                    </li>

                    <li class="oc-li1">
                        <a class="oc-li1-link" href="{{ route('app.research') }}">{{ __('Research') }}</a>
                    </li>
                    <li class="oc-li1">
                        <a class="oc-li1-link" href="{{ route('app.blog.index') }}">{{ __('Blog') }}</a>
                    </li>

                    <!-- Gallery -->
                    <li class="oc-li1" id="gallery">
                        <a class="oc-li1-link" data-bs-toggle="collapse" data-bs-target="#collapseGallery" aria-expanded="true" aria-controls="collapseGallery">Gallery</a>
                        <ul class="collapse oc-list-group2" id="collapseGallery" aria-labelledby="headingGallery" data-bs-parent="#sidebarAccordion">
                            <li class="oc-li2">
                                <a class="oc-li2-link" href="{{ route('app.gallery', 'images') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-image me-1" viewBox="0 0 16 16">
                                        <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                                        <path d="M1.5 2A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13zm13 1a.5.5 0 0 1 .5.5v6l-3.775-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12v.54A.505.505 0 0 1 1 12.5v-9a.5.5 0 0 1 .5-.5h13z"/>
                                    </svg>
                                    {{ __('Image') }}
                                </a>
                            </li>
                            <li class="oc-li2">
                                <a class="oc-li2-link" href="{{ route('app.gallery', 'videos') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-youtube me-1" viewBox="0 0 16 16">
                                        <path d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z"/>
                                    </svg>    
                                    {{ __('Video') }}
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="oc-li1">
                        <a class="oc-li1-link" href="{{ route('app.career.index') }}">{{ __('Career') }}</a>
                    </li>
                    <li class="oc-li1">
                        <a class="oc-li1-link" href="{{ route('app.about') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill me-1" viewBox="0 0 16 16">
                                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                            </svg>
                            {{ __('About') }}
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>