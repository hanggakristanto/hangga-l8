@section('title')
Sliders &mdash; {{ $setting->admin_title }}
@endsection

<div class="row justify-content-center">
    <div class="col-md-8">
        @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif
        <div class="card border-0 shadow-sm rounded-lg">
            <div class="card-header">
                <i class="fa fa-laptop"></i> SLIDERS
            </div>
            <div class="card-body">
                <div class="table-responsive mt-3">
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">NO.</th>
                                <th scope="col">IMAGE</th>
                                <th scope="col">OPTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sliders as $no => $slider)
                            <tr>
                                <th class="text-center" scope="row">
                                    {{ ++$no + ($sliders->currentPage()-1) * $sliders->perPage() }}</th>
                                <td class="text-center">
                                    <img src="{{ Storage::url('public/sliders/'.$slider->image) }}" class="w-100 rounded" style="height: 200px">
                                    <br>
                                    <p class="mt-2">{{ $slider->link }}</p>
                                </td>
                                <td class="text-center">
                                    <button wire:click="destroy({{ $slider->id }})"
                                        class="btn btn-sm btn-danger">DELETE</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $sliders->links() }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        @if (session()->has('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif
        <div class="card border-0 shadow-sm rounded-lg">
            <div class="card-header">
                <i class="fa fa-image"></i> UPLOAD SLIDER
            </div>
            <div class="card-body">
                @if($image)
                <div class="text-center">
                    <img src="{{ $image }}" alt="" style="height: 250px;width:100%;object-fit:cover"
                        class="img-thumbnail">
                    <p>PREVIEW</p>
                </div>
                @else
                <div class="text-center">
                    <img src="{{ asset('images/image.png') }}" alt="" style="height: 250px;width:100%;object-fit:cover"
                        class="img-thumbnail">
                    <p>PREVIEW</p>
                </div>
                @endif
                <hr>
                <form wire:submit.prevent="store">
                    <div class="form-group">
                        <input type="file" id="image" class="form-control" wire:change="$emit('fileChoosen')" required>
                        @error('image')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Link Slider</label>
                        <input type="text" class="form-control" wire:model.lazy="link" placeholder="Link Slider">
                        @error('link')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary btn-block mt-4">UPLOAD</button>
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