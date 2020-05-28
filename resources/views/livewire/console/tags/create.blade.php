@section('title')
Add Tag &mdash; {{ $setting->admin_title }}
@endsection

<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card border-0 shadow-sm rounded-lg">
            <div class="card-header">
                <i class="fa fa-tags"></i> ADD TAG
            </div>
            <div class="card-body">
                <form wire:submit.prevent="store">

                    <div class="form-group">
                        <label>Tag Name</label>
                        <input type="text" wire:model.lazy="name"
                            class="form-control @error('name') is-invalid @enderror" placeholder="Fullname">
                        @error('name')
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