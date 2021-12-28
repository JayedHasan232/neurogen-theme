@push('scripts')
    <script src="{{ asset('plugins/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('plugins/tinymce/init-tinymce.js') }}"></script>
@endpush

<form class="box" action="{{ route('admin.blog.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="header">
        Add Post

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
                <input wire:model="title" class="form-control @error('title') is-invalid @enderror" type="text" name="title" id="title" placeholder="Title">
                @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label for="url">URL</label>
                <input wire:model="url" class="form-control @error('url') is-invalid @enderror" type="text" name="url" id="url" placeholder="URL">
                @error('url')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group col-md-2">
                <label for="privacy">Privacy</label>
                <select wire:model="privacy" name="privacy" class="form-control @error('privacy') is-invalid @enderror">
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
                <label for="category">Category</label>
                <select wire:model="category" name="category" class="form-control @error('category') is-invalid @enderror">
                    <option value="">Category</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
                @error('category')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-md-2">
                <label for="subcategory">Subcategory</label>
                <select wire:model="subcategory" name="subcategory" class="form-control @error('subcategory') is-invalid @enderror">
                    <option value="">Subcategory</option>
                    @foreach($subcategories as $subcategory)
                    <option value="{{ $subcategory->id }}">{{ $subcategory->title }}</option>
                    @endforeach
                </select>
                @error('subcategory')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label for="image">Image</label>
                <input class="form-control @error('image') is-invalid @enderror" type="file" name="image" id="image">
                @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-md-12" wire:ignore>
                <label for="article">Article</label>
                <textarea class="form-control @error('article') is-invalid @enderror tinymce" type="text" name="article" id="article" placeholder="Article"></textarea>
                @error('article')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group col-md-6">
                <label for="meta_title">Meta Title</label>
                <input wire:model="meta_title" class="form-control @error('meta_title') is-invalid @enderror" type="text" name="meta_title" id="meta_title" placeholder="Title">
                @error('meta_title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group col-md-12">
                <label for="meta_description">Meta Description</label>
                <textarea wire:model="meta_description" class="form-control @error('meta_description') is-invalid @enderror" type="text" name="meta_description" id="meta_description" placeholder="Meta Description"></textarea>
                @error('meta_description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group col-md-6">
                <label for="tags">Tags</label>
                <textarea wire:model="tags" class="form-control @error('tags') is-invalid @enderror" type="text" name="tags" id="tags" placeholder="Tags"></textarea>
                @error('tags')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group col-md-6">
                <label for="meta_keywords">Meta Keywords</label>
                <textarea wire:model="meta_keywords" class="form-control @error('meta_keywords') is-invalid @enderror" type="text" name="meta_keywords" id="meta_keywords" placeholder="Meta Keywords"></textarea>
                @error('meta_keywords')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <button wire:loading.remove type="submit" class="btn bg-accent rounded-pill px-5">Store</button>
        
    </div>
</form>