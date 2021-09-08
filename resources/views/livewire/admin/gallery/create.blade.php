<form wire:submit.prevent="store" class="box">
    <div class="header">
        Add Gallery Item

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
                <select wire:model="privacy" class="form-control @error('privacy') is-invalid @enderror">
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
                <label for="type">Type</label>
                <select wire:model="type" class="form-control @error('type') is-invalid @enderror">
                    <option value="1">Image</option>
                    <option value="2">Video</option>
                </select>
                @error('type')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="title">Title</label>
                <input wire:model="title" class="form-control @error('title') is-invalid @enderror" type="text" id="title" placeholder="Title">
                @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            @if($type == 1)
            <div class="form-group col-md-4">
                <label for="images">Image(s)</label>
                <input wire:model="images" class="form-control @error('images') is-invalid @enderror" type="file" name="images" id="images">
                @error('images')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            @else
            <div class="form-group col-md-4">
                <label for="video_link">Video Link</label>
                <input wire:model="video_link" class="form-control @error('video_link') is-invalid @enderror" type="text" id="video_link" placeholder="Video Link">
                @error('video_link')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            @endif
        </div>

        <button wire:loading.remove type="submit" class="btn bg-accent rounded-pill px-5">Store</button>
        
    </div>
</form>