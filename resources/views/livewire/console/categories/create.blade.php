@section('title')
Add Category &mdash; {{ $setting->admin_title }}
@endsection

<div class="row justify-content-center">
    <div class="col-md-12">
        @if (session()->has('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif
        <div class="card border-0 shadow rounded-lg">
            <div class="card-header">
                <i class="fa fa-folder"></i> ADD CATEGORY
            </div>
            <div class="card-body">
                <form wire:submit.prevent="store" enctype="multipart/form-data">

                    <div class="row">
                        <div class="col-md-12">
                            @if($image)
                            <div class="text-center">
                                <img src="{{ $image }}" alt="" style="height: 150px;width:150px;object-fit:cover"
                                    class="img-thumbnail">
                            </div>
                            @else
                                <div class="text-center">
                                <img src="{{ asset('images/image.png') }}" alt="" style="height: 150px;width:150px;object-fit:cover"
                                    class="img-thumbnail">
                                    <p>PREVIEW</p>
                                </div>
                            @endif
                            
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" id="image" class="form-control" wire:change="$emit('fileChoosen')"
                                    required>
                                @error('image')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Category Name</label>
                                <input type="text" wire:model.lazy="name"
                                    class="form-control @error('name') is-invalid @enderror" placeholder="Fullname">
                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">SAVE</button>
                    <button type="reset" class="btn btn-warning">RESET</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    window.livewire.on('fileChoosen', () => {
        let inputField = document.getElementById('image')
        let file = inputField.files[0]
        let reader = new FileReader();
        reader.onloadend = () => {
            window.livewire.emit('fileUpload', reader.result)
        }
        reader.readAsDataURL(file);
    })
</script>