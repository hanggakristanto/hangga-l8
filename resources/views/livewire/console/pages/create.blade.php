@section('title')
Add Page &mdash; {{ $setting->admin_title }}
@endsection

<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card border-0 shadow rounded-lg">
            <div class="card-header">
                <i class="fa fa-dice-d6"></i> ADD PAGE
            </div>
            <div class="card-body">
                <form wire:submit.prevent="store">

                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" wire:model="title"
                            class="form-control @error('title') is-invalid @enderror" placeholder="Title Page">
                        @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div wire:ignore class="form-group">
                        <label>Content</label>
                        <textarea class="form-control @error('content') is-invalid @enderror" id="content" placeholder="Content Page"
                            rows="8" wire:model="content">{{ $content }}</textarea>
                        @error('content')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Keywords</label>
                        <input type="text" wire:model="keywords"
                            class="form-control @error('keywords') is-invalid @enderror" placeholder="Keywords Page">
                        @error('keywords')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" placeholder="Description Page"
                            rows="3" wire:model="description">{{ $description }}</textarea>
                        @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">SAVE</button>
                    <button type="reset" class="btn btn-warning">RESET</button>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('content').on('change', function(e){
        @this.set('{{ $content }}', e.editor.getData());
    });
</script> --}}