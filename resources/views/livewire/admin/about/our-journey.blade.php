<div>
    <form wire:submit.prevent="store" class="box">
        <div class="header">
            Add a Journey

            @if(session('success'))
            <span class="text-success ms-2">
                {{ session('success') }}
            </span>
            @elseif(session('warning'))
            <span class="text-danger ms-2">
                {{ session('warning') }}
            </span>
            @endif
        </div>
        <div class="body">

            <div class="row g-3 mb-4">
                <div class="form-group col-md-2">
                    <label for="privacy">Privacy</label>
                    <select wire:model="privacy" class="form-control @error('privacy') is-invalid @enderror" type="text" id="privacy">
                        <option value="1">Visible</option>
                        <option value="0">Hidden</option>
                    </select>
                    @error('privacy')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-2">
                    <label for="identifier">Identifier</label>
                    <select wire:model="identifier" class="form-control @error('identifier') is-invalid @enderror" type="text" id="identifier">
                        <option value="">Select</option>
                        @foreach($identifiers as $identifier)
                        <option value="{{ $identifier }}">{{ $identifier }}</option>
                        @endforeach
                    </select>
                    @error('identifier')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-4">
                    <label for="title">Title</label>
                    <input wire:model.lazy="title" class="form-control @error('title') is-invalid @enderror" type="text" id="title" placeholder="Title">
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-4">
                    <label for="image">Image</label>
                    <input wire:model="image" class="form-control @error('image') is-invalid @enderror" type="file" id="image">
                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-12">
                    <label for="overview">Overview</label>
                    <textarea wire:model="overview" class="form-control @error('overview') is-invalid @enderror" id="overview" placeholder="Overview"></textarea>
                    @error('overview')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <button wire:loading.remove type="submit" class="btn bg-accent rounded-pill px-5">Store</button>
            
        </div>
    </form>

    <div class="box">
        <div class="header">
            Existing Contents
        </div>
        <div class="body">
            <div class="row g-2">
                @foreach($journeys as $journey)
                <div class="col-4 col-md-2">
                    <div class="card">
                        @if($journey->image)
                        <img wire:click="selectedJourney({{ $journey->id }})" src="{{ asset('storage/' . $journey->image) }}" alt="" class="card-img-top" data-bs-toggle="modal" data-bs-target="#journey{{ $journey->id }}Modal">
                        @else
                            <button wire:click="selectedJourney({{ $journey->id }})" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#journey{{ $journey->id }}Modal">{{ $journey->title }}</button>
                        @endif
                    </div>
                </div>
                
                <!-- Modal -->
                <div wire:ignore.self class="modal fade" id="journey{{ $journey->id }}Modal" tabindex="-1" aria-labelledby="journey{{ $journey->id }}ModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <form wire:submit.prevent="update({{ $journey->id }})" class="modal-content box">
                            <div class="modal-header">
                                <h5 class="modal-title" id="journey{{ $journey->id }}ModalLabel">{{ $journey->title }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body body">
                                
                                <div class="row g-3 mb-4">
                                    <div class="form-group col-md-4">
                                        <label for="privacy">Privacy</label>
                                        <select wire:model="update_privacy" class="form-control @error('privacy') is-invalid @enderror" type="text" id="privacy">
                                            <option value="1">Visible</option>
                                            <option value="0">Hidden</option>
                                        </select>
                                        @error('privacy')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="identifier">Identifier</label>
                                        <select wire:model="update_identifier" class="form-control @error('identifier') is-invalid @enderror" type="text" id="identifier">
                                            @foreach($identifiers as $identifier)
                                            <option value="{{ $identifier }}">{{ $identifier }}</option>
                                            @endforeach
                                        </select>
                                        @error('identifier')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="title">Title</label>
                                        <input wire:model.lazy="update_title" class="form-control @error('title') is-invalid @enderror" type="text" id="title" placeholder="Title">
                                        @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="image">Image</label>
                                        <input wire:model="image" class="form-control @error('image') is-invalid @enderror" type="file" id="image">
                                        @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="overview">Overview</label>
                                        <textarea wire:model="update_overview" class="form-control @error('overview') is-invalid @enderror" id="overview" placeholder="Overview"></textarea>
                                        @error('overview')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Close</button>
                                <button wire:loading.remove type="submit" class="btn bg-accent rounded-pill px-5">Update</button>
                            </div>
                        </form>
                    </div>
                </div>

                @endforeach
            </div>
        </div>
    </div>
</div>