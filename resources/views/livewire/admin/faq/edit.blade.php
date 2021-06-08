<form wire:submit.prevent="store" class="box">
    
    <div class="header">
        Edit Faq

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
            <div class="form-group col-md-10">
                <label for="question">Question</label>
                <input wire:model="question" class="form-control @error('question') is-invalid @enderror" type="text" name="question" id="question" placeholder="Question">
                @error('question')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
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

            <div class="form-group col-12">
                <label for="answer">Answer</label>
                <textarea wire:model="answer" class="form-control @error('answer') is-invalid @enderror" name="answer" id="answer" placeholder="Answer"></textarea>
                @error('answer')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <button class="btn bg-accent rounded-pill px-5 mt-3" type="submit">Update</button>
        
    </div>
</form>