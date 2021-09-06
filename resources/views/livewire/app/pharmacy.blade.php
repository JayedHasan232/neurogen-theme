<section>
    <div class="{{ env('BS_CONTAINER') }} py-5">
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        <form wire:submit.prevent="send_pres">
            @foreach($medicines as $index => $value)
                <div class="row g-4 mb-2">
                    <div class="col-md-4">
                        <div class="form-group">
                            <input wire:model="medicines.{{ $index }}.name" type="text" class="form-control" placeholder="Item Name" />
                            @error('medicines'.$index.'name') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <select wire:model="medicines.{{ $index }}.quantity" class="form-control">
                                @for($quantity=1; $quantity <= 10; $quantity++)
                                    <option value="{{ $quantity }}">{{ $quantity }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <select wire:model="medicines.{{ $index }}.unit" class="form-control">
                                <option value="strip">Strip</option>
                                <option value="bottol">Bottol</option>
                                <option value="pcs">Pcs</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <button class="btn text-white btn-info btn-sm" wire:click.prevent="add">Add</button>
                        @if($index > 0)
                        <button class="btn btn-danger btn-sm" wire:click.prevent="remove({{$index}})">Remove</button>
                        @endif
                    </div>
                </div>
            @endforeach

            <div class="row">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-success btn-sm">Submit</button>
                </div>
            </div>
        </form>
    </div>
</section>