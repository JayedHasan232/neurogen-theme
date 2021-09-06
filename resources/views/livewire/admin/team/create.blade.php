<form wire:submit.prevent="store" class="box">
    <div class="header">
        Add Team Member

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
                    <option value="1">Doctor</option>
                    <option value="2">Lab Personel</option>
                    <option value="3">Psychologists</option>
                    <option value="4">Therapists</option>
                    <option value="5">Nutritionist</option>
                    <option value="6">Executive Team</option>
                    <option value="7">Scientific Advisory Team</option>
                </select>
                @error('type')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="name">Name</label>
                <input wire:model="name" class="form-control @error('name') is-invalid @enderror" type="text" id="name" placeholder="Name">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="url">URL</label>
                <input wire:model="url" class="form-control @error('url') is-invalid @enderror" type="text" id="url" placeholder="URL">
                @error('url')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="designation">Designation</label>
                <input wire:model="designation" class="form-control @error('designation') is-invalid @enderror" type="text" id="designation" placeholder="Designation">
                @error('designation')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="degrees">Degrees</label>
                <input wire:model="degrees" class="form-control @error('degrees') is-invalid @enderror" type="text" name="degrees" id="degrees" placeholder="Separate by comma (,)">
                @error('degrees')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="email">Email</label>
                <input wire:model="email" class="form-control @error('email') is-invalid @enderror" type="email" name="email" id="email" placeholder="Email">
                @error('email')
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

            <div class="form-group col-md-12">
                <label for="summary">Summary</label>
                <textarea wire:model="summary" class="form-control @error('summary') is-invalid @enderror" type="text" name="summary" id="summary" placeholder="Summary"></textarea>
                @error('summary')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <button wire:loading.remove type="submit" class="btn bg-accent rounded-pill px-5">Store</button>
        
    </div>
</form>