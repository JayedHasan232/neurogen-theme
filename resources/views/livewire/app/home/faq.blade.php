<section class="section home-faq" id="faq">
    <div class="{{ env('BS_CONTAINER') }}">
        <h2 class="section-title">FAQs</h2>
        {{--<p class="section-overview text-justify-center">
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Culpa eos blanditiis labore, non iusto alias, eaque, deleniti doloribus qui id itaque nesciunt! Eos, hic recusandae consequatur quisquam voluptatem error maxime. Lorem ipsum, dolor sit amet consectetur adipisicing elit.
        </p>--}}

        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="accordion accordion-flush" id="accordionExample">
                    @foreach($faqs as $faq)
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faq{{ $faq->id }}">
                            <button class="accordion-button {{ $loop->index != 0 ? 'collapsed' : '' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $faq->id }}" aria-expanded="{{ $loop->index == 0 ? 'true' : 'false' }}" aria-controls="collapse{{ $faq->id }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-patch-question-fill me-2 text-accent" viewBox="0 0 16 16">
                                    <path d="M5.933.87a2.89 2.89 0 0 1 4.134 0l.622.638.89-.011a2.89 2.89 0 0 1 2.924 2.924l-.01.89.636.622a2.89 2.89 0 0 1 0 4.134l-.637.622.011.89a2.89 2.89 0 0 1-2.924 2.924l-.89-.01-.622.636a2.89 2.89 0 0 1-4.134 0l-.622-.637-.89.011a2.89 2.89 0 0 1-2.924-2.924l.01-.89-.636-.622a2.89 2.89 0 0 1 0-4.134l.637-.622-.011-.89a2.89 2.89 0 0 1 2.924-2.924l.89.01.622-.636zM7.002 11a1 1 0 1 0 2 0 1 1 0 0 0-2 0zm1.602-2.027c.04-.534.198-.815.846-1.26.674-.475 1.05-1.09 1.05-1.986 0-1.325-.92-2.227-2.262-2.227-1.02 0-1.792.492-2.1 1.29A1.71 1.71 0 0 0 6 5.48c0 .393.203.64.545.64.272 0 .455-.147.564-.51.158-.592.525-.915 1.074-.915.61 0 1.03.446 1.03 1.084 0 .563-.208.885-.822 1.325-.619.433-.926.914-.926 1.64v.111c0 .428.208.745.585.745.336 0 .504-.24.554-.627z"/>
                                </svg>
                                {{ $faq->question }}
                            </button>
                        </h2>
                        <div id="collapse{{ $faq->id }}" class="accordion-collapse collapse {{ $loop->index == 0 ? 'show' : '' }}" aria-labelledby="faq{{ $faq->id }}" data-bs-parent="#accordionExample">
                            <div class="accordion-body">{{ $faq->answer }}</div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>