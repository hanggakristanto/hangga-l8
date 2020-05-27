@section('title')
Tag &mdash; {{ $setting->admin_title }}
@endsection

<div class="row justify-content-center">
    <div class="col-md-12">
        @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif
        <div class="card border-0 shadow rounded-lg">
            <div class="card-header">
                <i class="fa fa-tags"></i> TAGS
            </div>
            <div class="card-body">

                <form action="" method="GET">
                    <div class="input-group">
                        <div class="input-group-append">
                            <a href="{{ route('console.tags.create') }}" class="btn btn-dark"><i
                                    class="fa fa-plus-circle"></i>
                                ADD
                            </a>
                        </div>
                        <input type="text" name="q" placeholder="cari sesuatu disini..." class="form-control">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-dark"><i class="fa fa-search"></i> SEARCH
                            </button>
                        </div>
                    </div>
                </form>

                <div class="table-responsive mt-3">
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">NO.</th>
                                <th scope="col">TAG</th>
                                <th scope="col">OPTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tags as $no => $tag)
                            <tr>
                                <th class="text-center" scope="row">{{ ++$no + ($tags->currentPage()-1) * $tags->perPage() }}</th>
                                <td>{{ $tag->name }}</td>
                                <td class="text-center">
                                    <a href="{{ route('console.tags.edit', $tag->id) }}"
                                        class="btn btn-sm btn-primary">EDIT</a>
                                    <button wire:click="destroy({{ $tag->id }})" class="btn btn-sm btn-danger">DELETE</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $tags->links() }}
                </div>

            </div>
        </div>
    </div>
</div>