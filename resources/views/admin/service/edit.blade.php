@extends('layouts.admin')

@push('scripts')
    <script src="{{ asset('plugins/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('plugins/tinymce/init-tinymce.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
@endpush

@section('content')
<form action="{{route('admin.services.update', $service->id)}}" method="post" enctype="multipart/form-data" class="box">
    @method('patch')
    @csrf

    <div class="header">
        Edit Service

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
                <label for="type">Type</label>
                <select  class="form-control @error('type') is-invalid @enderror" name="type" id="type" placeholder="Type">
                    <option value="regular" {{ $service->type == 'regular' ? "selected" : "" }}>Regular</option>
                    <option value="genetic_test" {{ $service->type == 'genetic_test' ? "selected" : "" }}>Genetic Test</option>
                    <option value="deep_clinical_assessment" {{ $service->type == 'deep_clinical_assessment' ? "selected" : "" }}>Deep Clinical Assessment</option>
                </select>
                @error('type')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-md-5">
                <label for="title">Title</label>
                <input  class="form-control @error('title') is-invalid @enderror" type="text" name="title" id="title" value="{{ old('title', $service->title) }}" placeholder="Title">
                @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-md-5">
                <label for="url">URL</label>
                <input  class="form-control @error('url') is-invalid @enderror" type="text" name="url" id="url" value="{{ old('title', $service->url) }}" placeholder="URL">
                @error('url')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group col-md-6">
                <label for="meta_title">Meta Title</label>
                <input  class="form-control @error('meta_title') is-invalid @enderror" type="text" name="meta_title" id="meta_title" value="{{ old('title', $service->meta_title) }}" placeholder="Title">
                @error('meta_title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-md-2">
                <label for="privacy">Privacy</label>
                <select name="privacy" class="form-control @error('privacy') is-invalid @enderror">
                    <option value="1" {{ $service->privacy == 1 ? "selected" : "" }}>Visible</option>
                    <option value="0" {{ $service->privacy == 0 ? "selected" : "" }}>Hidden</option>
                </select>
                @error('privacy')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="image">Image</label>
                <input  class="form-control @error('image') is-invalid @enderror" type="file" name="image" id="image">
                @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group col-md-12">
                <label for="article">Article</label>
                <textarea  class="form-control @error('article') is-invalid @enderror tinymce" type="text" name="article" id="article" placeholder="Article">{{ old('article', $service->article) }}</textarea>
                @error('article')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group col-md-12">
                <label for="overview">Overview</label>
                <textarea  class="form-control @error('overview') is-invalid @enderror" type="text" name="overview" id="overview" placeholder="Overview">{{ old('overview', $service->overview) }}</textarea>
                @error('overview')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group col-md-6">
                <label for="meta_description">Meta Description</label>
                <textarea  class="form-control @error('meta_description') is-invalid @enderror" type="text" name="meta_description" id="meta_description" placeholder="Meta Description">{{ old('meta_description', $service->meta_description) }}</textarea>
                @error('meta_description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group col-md-6">
                <label for="meta_keywords">Meta Keywords</label>
                <textarea  class="form-control @error('meta_keywords') is-invalid @enderror" type="text" name="meta_keywords" id="meta_keywords" placeholder="Meta Keywords">{{ old('meta_keywords', $service->meta_keywords) }}</textarea>
                @error('meta_keywords')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <button type="submit" class="btn bg-accent rounded-pill px-5">Update</button>
        
    </div>
</form>
@endsection

@push('scripts')
    <script>
        var title = document.getElementById('title');
        var url = document.getElementById('url');

        title.addEventListener("keyup", function(){
            axios.post('/generate-slug', {
                title: title.value
            })
                .then(({data}) => {
                    url.value = data;
                })
                .catch(error => console.log(error))
        });
    </script>
@endpush