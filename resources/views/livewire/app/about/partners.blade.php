<div class="{{ env('BS_CONTAINER') }} py-5 text-center">
    <h2 class="section-title mb-5">আমরা যেসব আন্তর্জাতিক সংস্থার সাথে সম্পৃক্ত</h2>

    <div class="row justify-content-center g-4">
        @foreach($partners as $partner)
        <div class="col-4 col-md-3">
            <div class="card">
                <img src="{{ asset('storage/' . ($partner->image_medium ?? $partner->image) ) }}" alt="{{ $partner->name }}" class="card-img-top">
            </div>
        </div>
        @endforeach
    </div>
</div>