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

        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="form-tab" data-bs-toggle="tab" data-bs-target="#form" type="button" role="tab" aria-controls="form" aria-selected="true">Form</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="medicine-tab" data-bs-toggle="tab" data-bs-target="#medicine" type="button" role="tab" aria-controls="medicine" aria-selected="false">Medicines</button>
            </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="form" role="tabpanel" aria-labelledby="form-tab">
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
                                <div class="prescription-uploader">
                                    <label for="prescription" class="btn">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor" class="bi bi-cloud-arrow-up-fill" viewBox="0 0 16 16">
                                            <path d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2zm2.354 5.146a.5.5 0 0 1-.708.708L8.5 6.707V10.5a.5.5 0 0 1-1 0V6.707L6.354 7.854a.5.5 0 1 1-.708-.708l2-2a.5.5 0 0 1 .708 0l2 2z"/>
                                        </svg>

                                        Upload your prescription
                                    </label>
                                    <input wire:model="prescription" type="file" class="form-control" id="prescription"/>
                                </div>
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
                <div class="tab-pane fade" id="medicine" role="tabpanel" aria-labelledby="medicine-tab">
                    <div class="row g-4 py-3">
                        @foreach($medicines_data as $medicine)
                        <div class="col-sm-6 col-md-3">
                            <div class="card medicine overflow-hidden h-100">
                                <div class="image-frame">
                                    <img src="{{ asset('storage/' . ($medicine->image ?? $medicine->image) ) }}" alt="" class="card-img-top">
                                </div>
                                <div class="card-body">
                                    <h4 class="title">{{ $medicine->title }}</h4>
                                    <h4 class="price">Price: {{ $medicine->price }}</h4>
                                    <p class="overview text-justify-center">{{ $medicine->overview }}</p>
                                </div>    
                                
                            @auth()
                                @if(Auth::user()->role != 0)
                                    <a href="{{ route('admin.medicine.edit', $medicine->id) }}" class="link" title="Only admin or modarator can see this." target="_blank">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                        </svg>
                                        Edit
                                    </a>
                                @endif
                            @endauth                    
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
    </div>
</section>