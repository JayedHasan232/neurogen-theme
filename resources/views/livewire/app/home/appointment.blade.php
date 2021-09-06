<article class="appointment-page bg-light">
    <section class="{{ env('BS_CONTAINER') }} pb-5">
        <div class="row g-5">
            <div class="col-md-6 order-md-last">
                <h1 class="mb-5">Get Appointment</h1>
                <form wire:submit.prevent="send" class="row g-3">
                    <div class="col-md-6">
                        <div class="input-group">
                            <span class="input-group-text" id="inputGroupPrepend1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
                                    <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z"/>
                                </svg>
                            </span>
                            <input wire:model="name" type="text" class="form-control" id="name" aria-describedby="name" placeholder="Name" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group">
                            <span class="input-group-text" id="inputGroupPrepend2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                                </svg>
                            </span>
                            <input wire:model="phone" type="text" class="form-control" id="phone" maxlength="11" aria-describedby="phone" placeholder="Mobile" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group">
                            <span class="input-group-text" id="inputGroupPrepend3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                                    <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/>
                                </svg>
                            </span>
                            <input wire:model="email" type="email" class="form-control" id="email" aria-describedby="email" placeholder="Email" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group">
                            <span class="input-group-text" id="inputGroupPrepend3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-plus-fill" viewBox="0 0 16 16">
                                    <path d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4V.5zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2zM8.5 8.5V10H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V11H6a.5.5 0 0 1 0-1h1.5V8.5a.5.5 0 0 1 1 0z"/>
                                </svg>
                            </span>
                            <input wire:model="date" type="date" class="form-control" id="date" aria-describedby="date"required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="input-group">
                            <span class="input-group-text" id="inputGroupPrepend4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-square-dots-fill" viewBox="0 0 16 16">
                                    <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2h-2.5a1 1 0 0 0-.8.4l-1.9 2.533a1 1 0 0 1-1.6 0L5.3 12.4a1 1 0 0 0-.8-.4H2a2 2 0 0 1-2-2V2zm5 4a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm4 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                                </svg>
                            </span>
                            <textarea wire:model="message" class="form-control" id="note" aria-describedby="note" placeholder="Your note" required></textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-accent rounded-0 px-3" type="submit">Submit Now</button>
                        @if(session('success'))
                            <span class="text-success ms-2">{{ session('success') }}</span>
                        @endif
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <div class="list-group" style="max-height:400px; overflow-y:scroll">
                    @foreach($blogs as $blog)
                    <a href="{{ route('app.blog.show', $blog->url) }}" class="list-group-item list-group-item-action" aria-current="true">
                        <h5 class="mb-1">{{ $blog->title }}</h5>
                        <p class="mb-1 text-muted">{!! Str::limit(strip_tags($blog->article), 150, '...') !!}</p>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</article>