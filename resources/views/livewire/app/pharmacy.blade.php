<section>
    <div class="{{ env('BS_CONTAINER') }} pt-5">
        <div class="sec-head d-block">
            <div class="breadcrumb d-flex align-items-center m-0 mb-5">
                <a href="/" class="me-2 text-muted text-capitalize">
                    {{ __( 'Home' ) }}
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                    </svg>
                </a>
                <h1 class="me-2 text-accent text-capitalize">
                    {{ __('Pharmacy') }}
                </h1>
            </div>
        </div>
    </div>

    <div class="{{ env('BS_CONTAINER') }} pb-5">

        @if(session('success'))
        <span class="text-success ms-2">
            {{ session('success') }}
        </span>
        @elseif(session('warning'))
        <span class="text-danger ms-2">
            {{ session('warning') }}
        </span>
        @endif

        <form wire:submit.prevent="send" class="pharmacy-form">

            <h4 class="mb-3">Medicine Items</h4>
            
            @foreach($medicines as $index => $value)
            <div class="row g-4 mb-2">
                <div class="col-md-4">
                    <div class="form-group">
                        @if($index == 0)<label for="name">Item Name</label>@endif
                        <input wire:model="medicines.{{ $index }}.name" type="text" class="form-control" placeholder="Item Name" required/>
                        @error('medicines'.$index.'name') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        @if($index == 0)<label for="name">Quantity</label>@endif
                        <select wire:model="medicines.{{ $index }}.quantity" class="form-control" required>
                            @for($quantity=1; $quantity <= 10; $quantity++)
                                <option value="{{ $quantity }}">{{ $quantity }}</option>
                            @endfor
                        </select>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="form-group">
                        @if($index == 0)<label for="name">Unit</label>@endif
                        <select wire:model="medicines.{{ $index }}.unit" class="form-control" required>
                            <option value="strip">Strip</option>
                            <option value="bottol">Bottol</option>
                            <option value="pcs">Pcs</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-2">
                    <button class="btn text-white btn-success" wire:click.prevent="add">Add</button>
                    @if($index > 0)
                    <button class="btn btn-danger" wire:click.prevent="remove({{$index}})">Remove</button>
                    @endif
                </div>
            </div>
            @endforeach
            
            <h4 class="mt-5">Upload your prescription</h4>
            <div class="row mt-3">
                <div class="col-md-12">
                    <input wire:model="prescription" type="file" class="form-control" />
                    <small class="text-muted">Accepted file types: jpeg, png, bmp, gif, svg, or webp. Max. file size: 5 MB.</small>
                </div>
            </div>

            <h4 class="mt-5">Contact Information</h4>
            <div class="row g-4 mt-3">
                <div class="col-md-4">
                    <input wire:model="name" type="text" class="form-control" placeholder="Name*" required/>
                </div>
                <div class="col-md-4">
                    <input wire:model="email" type="email" class="form-control" placeholder="Email*"/>
                </div>
                <div class="col-md-4">
                    <input wire:model="phone" type="text" class="form-control" placeholder="Phone*" required/>
                </div>
                <div class="col-md-12">
                    <input wire:model="address" type="text" class="form-control" placeholder="Delivery Address*" required/>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-md-6">
                    <h5 class="mt-5">Are you a registered patient at NeuroGen?</h5>
                    <div class="mt-3 d-flex gap-4">
                        <div class="form-check">
                            <input wire:model="registered_patient" class="form-check-input" type="radio" id="yes_registered_patient" value="Yes">
                            <label class="form-check-label" for="yes_registered_patient">Yes</label>
                        </div>
                        <div class="form-check">
                            <input wire:model="registered_patient" class="form-check-input" type="radio" id="no_registered_patient" value="No" checked>
                            <label class="form-check-label" for="no_registered_patient">
                                No
                            </label>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <h5 class="mt-5">Do you have a discount reference?</h5>
                    <div class="mt-3 d-flex gap-4">
                        <div class="form-check">
                            <input wire:model="reference" class="form-check-input" type="radio" id="yes_reference" value="Yes">
                            <label class="form-check-label" for="yes_reference">Yes</label>
                        </div>
                        <div class="form-check">
                            <input wire:model="reference" class="form-check-input" type="radio" id="no_reference" value="No" checked>
                            <label class="form-check-label" for="no_reference">
                                No
                            </label>
                        </div>
                    </div>

                    @if($reference == "Yes")
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <input wire:model="employee_name" type="text" class="form-control" placeholder="Employee Name*" required/>
                        </div>
                        <div class="col-md-6">
                            <input wire:model="employee_id" type="text" class="form-control" placeholder="Employee ID*" required/>
                        </div>
                    </div>
                    @endif
                </div>
            </div>

            <div class="row g-4">
                <div class="col-md-6">
                    <h5 class="mt-5 mb-3">Preferred payment method</h5>
                    <div class="form-group">
                        <select wire:model="payment_method" class="form-control">
                            <option value="mobile_banking">Bkash/Nagad/Rocket</option>
                            <option value="cash_on_delivery">Cash on Delivery</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <h5 class="mt-5 mb-3">Additional Remarks</h5>
                    <div class="form-group">
                        <textarea wire:model="remark" type="text" class="form-control" placeholder="Additional Remarks"></textarea>
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <div class="form-check">
                    <input wire:model="aggreement" class="form-check-input" type="checkbox" id="aggreement">
                    <label class="form-check-label" for="aggreement">
                        I accept NeuroGen Pharmacy’s terms and conditions
                    </label>
                </div>
            </div>
            
            <div class="row mt-3" wire:loading.remove>
                <div class="col-md-12">
                    @if($aggreement == "on")
                    <button type="submit" class="btn btn-success">Submit</button>
                    @else
                    <button type="button" class="btn btn-success" disabled>Submit</button>
                    @endif
                </div>
            </div>
        </form>
    </div>
</section>