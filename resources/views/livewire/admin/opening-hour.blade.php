<form wire:submit.prevent="store" class="box">
    
    <div class="header">
        Opening Hours

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

            <div class="form-group col-md-4">
                <label for="day">Day</label>
                <input wire:model="day" class="form-control @error('day') is-invalid @enderror" type="text" name="day" id="day" placeholder="Day">
                @error('day')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group col-md-3">
                <label for="from">From</label>
                <input wire:model="from" class="form-control @error('from') is-invalid @enderror" type="text" name="from" id="from" placeholder="From">
                @error('from')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group col-md-3">
                <label for="to">To</label>
                <input wire:model="to" class="form-control @error('to') is-invalid @enderror" type="text" name="to" id="to" placeholder="To">
                @error('to')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <button class="btn bg-accent rounded-pill px-5 mt-3" type="submit">Store</button>
        
    </div>
</form>