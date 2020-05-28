@section('title')
Settings &mdash; {{ $setting->admin_title }}
@endsection

<div class="row justify-content-center">
    <div class="col-md-8">
        @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif
        <div class="card border-0 shadow rounded-lg">
            <div class="card-header">
                <i class="fa fa-cog"></i> SETTING
            </div>
            <div class="card-body">

                <form wire:submit.prevent="update">
                    <input type="hidden" wire:model="settingId">
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Admin Title</label>
                                <input type="text" wire:model="admin_title"
                                    class="form-control @error('admin_title') is-invalid @enderror" placeholder="Admin Title">
                                @error('admin_title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Admin Footer</label>
                                <input type="text" wire:model="admin_footer"
                                    class="form-control @error('admin_footer') is-invalid @enderror" placeholder="Admin Footer">
                                @error('admin_footer')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Site Title</label>
                                <input type="text" wire:model="site_title"
                                    class="form-control @error('site_title') is-invalid @enderror" placeholder="Site Title">
                                @error('site_title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Site Footer</label>
                                <input type="text" wire:model="site_footer"
                                    class="form-control @error('site_footer') is-invalid @enderror" placeholder="Site Footer">
                                @error('site_footer')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email Recived Order</label>
                                <input type="text" wire:model="email_recived"
                                    class="form-control @error('email_recived') is-invalid @enderror" placeholder="Email Recived Order">
                                @error('email_recived')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>City Origin</label>
                                <input type="text" wire:model="city"
                                    class="form-control @error('city') is-invalid @enderror" placeholder="City Origin">
                                @error('city')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Keywords</label>
                                <input type="text" wire:model="keywords"
                                    class="form-control @error('keywords') is-invalid @enderror" placeholder="Keywords">
                                @error('keywords')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" rows="4" placeholder="Description" wire:model="description">{{ $description }}</textarea>
                                @error('description')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>


                    <button type="submit" class="btn btn-primary">UPDATE</button>
                    <button type="reset" class="btn btn-warning">RESET</button>
                </form> 

            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-0 shadow rounded-lg">
            <div class="card-header">
                <i class="fa fa-image"></i> LOGO
            </div>
            <div class="card-body">
                <img src="{{ $logo }}">
            </div>
        </div>
    </div>
</div>