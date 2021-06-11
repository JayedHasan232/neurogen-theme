<div>
    <form wire:submit.prevent="store" class="box">
        <div class="header">
            Add a Partner

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
                <div class="form-group col-md-6">
                    <label for="name">Name</label>
                    <input wire:model.lazy="name" class="form-control @error('name') is-invalid @enderror" type="text" id="name" placeholder="Title">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-4">
                    <label for="image">Image</label>
                    <input wire:model="image" class="form-control @error('image') is-invalid @enderror" type="file" name="image" id="image">
                    @error('image')
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
            Existing Partners
        </div>
        <div class="body">
            <div class="row">
                @foreach($partners as $partner)
                <div class="col-4 col-md-2">
                    <div class="card">
                        <img wire:click="selectedPartner({{ $partner->id }})" src="{{ asset('storage/' . $partner->image) }}" alt="" class="card-img-top" data-bs-toggle="modal" data-bs-target="#partner{{ $partner->id }}Modal">
                    </div>
                </div>

                <!-- Modal -->
                <div wire:ignore.self class="modal fade" id="partner{{ $partner->id }}Modal" tabindex="-1" aria-labelledby="partner{{ $partner->id }}ModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <form wire:submit.prevent="update({{ $partner->id }})" class="modal-content box">
                            <div class="modal-header">
                                <h5 class="modal-title" id="partner{{ $partner->id }}ModalLabel">{{ $partner->name }}</h5>
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
                                    <div class="form-group col-md-8">
                                        <label for="name">Name</label>
                                        <input wire:model.lazy="update_name" class="form-control @error('name') is-invalid @enderror" type="text" id="name" placeholder="Title">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="image">Image</label>
                                        <input wire:model="image" class="form-control @error('image') is-invalid @enderror" type="file" name="image" id="image">
                                        @error('image')
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