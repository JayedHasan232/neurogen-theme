<form wire:submit.prevent="store" class="box">
    <div class="header">
        Add Research Item

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
            <div class="form-group col-md-3">
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
            <div class="form-group col-md-3">
                <label for="author">Author</label>
                <input wire:model="author" class="form-control @error('author') is-invalid @enderror" type="text" id="author" placeholder="Author">
                @error('author')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-md-3">
                <label for="title">Title</label>
                <input wire:model="title" class="form-control @error('title') is-invalid @enderror" type="text" id="title" placeholder="Title">
                @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-md-3">
                <label for="date">Date</label>
                <input wire:model="date" class="form-control @error('date') is-invalid @enderror" type="text" id="date" placeholder="Date">
                @error('date')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-12">
                <label for="source">Source</label>
                <input wire:model="source" class="form-control @error('source') is-invalid @enderror" type="text" name="source" id="source">
                @error('source')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group col-md-12">
                <label for="overview">Overview</label>
                <textarea wire:model="overview" class="form-control @error('overview') is-invalid @enderror" type="text" name="overview" id="overview" placeholder="Overview"></textarea>
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