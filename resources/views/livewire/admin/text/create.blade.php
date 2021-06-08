<form wire:submit.prevent="store" class="box">
    
    <div class="header">
        Create Text

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

        <div class="row g-3">
            <div class="form-group col-md-3">
                <label for="identifier">Identifier</label>
                <input wire:model="identifier" class="form-control @error('identifier') is-invalid @enderror" type="text" name="identifier" id="identifier" placeholder="identifier">
                @error('identifier')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group col-12">
                <label for="article">Article</label>
                <textarea wire:model="article" class="form-control @error('article') is-invalid @enderror tinymce" name="article" id="article" placeholder="Article"></textarea>
                @error('article')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <button class="btn bg-accent rounded-pill px-5 mt-3" type="submit">Store</button>
        
    </div>
</form>