<form wire:submit.prevent="updateInfo" class="box">
    <div class="header">
        About Page Data

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
            <div class="form-group col-md-6">
                <label for="title">Title</label>
                <input wire:model="title" class="form-control @error('title') is-invalid @enderror" type="text" id="title" placeholder="Title">
                @error('title')
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
            <div class="form-group col-md-6">
                <label for="overview">Overview</label>
                <textarea wire:model="overview" class="form-control @error('overview') is-invalid @enderror" type="text" name="overview" id="overview" placeholder="Overview"></textarea>
                @error('overview')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label for="circle">Circle</label>
                <textarea wire:model="circle" class="form-control @error('circle') is-invalid @enderror" type="text" name="circle" id="circle" placeholder="Separate by comma (,)"></textarea>
                @error('circle')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <button wire:loading.remove type="submit" class="btn bg-accent rounded-pill px-5">Update</button>
        
    </div>
</form>