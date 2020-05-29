<div class="container-fluid mt-3">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            @php $active = "active" @endphp
            @foreach ($sliders as $slider)
                <div class="carousel-item {{ $active }}">
                    <a href="{{ $slider->link }}">
                        <img src="{{ Storage::url('public/sliders/').$slider->image }}" class="d-block w-100 rounded-lg">
                    </a>
                </div>
                {{ $active = "" }}
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>

<div class="container-fluid mt-3">
    <div class="row text-center">
        @foreach ($global_categories as $category)
        <div class="col-4 col-md-2 mb-4">
            <a href="" class="text-decoration-none text-dark">
                <div class="card h-100 border-0 shadow-sm p-2">
                    <div class="card-img">
                        <img src="{{ Storage::url('public/categories/'.$category->image) }}" class="w-50 rounded-lg">
                        <div class="title-category mt-2 font-weight-bold">{{ $category->name }}</div>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>

<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-6 col-md-3 mb-3">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-img">
                    <img src="https://firebasestorage.googleapis.com/v0/b/project-2059615900628317391.appspot.com/o/vegetable-new%2F1562915479497_wortel%20value%20300.jpg?alt=media" class="w-100 rounded-top" style="height: 15em;object-fit:cover">
                </div>
                <div class="card-body">
                    <div class="card-title font-weight-bold" style="font-size:20px">
                        Wortel Jepang Import
                    </div>
                    <div class="satuan" style="color: #999">500 gram/pack</div>
                    <div class="discount mt-2" style="color: #999"><s>Rp. 11.700</s> <span style="background-color: #F69C07" class="badge badge-pill badge-warning text-white">Save 40%</span></div>
                    <div class="price font-weight-bold mt-3" style="color: #47b04b;font-size:20px">Rp. 7.700</div>
                    <button class="btn btn-success btn-md mt-3 btn-block shadow-sm">Beli</button>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3 mb-3">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-img">
                    <img src="https://firebasestorage.googleapis.com/v0/b/project-2059615900628317391.appspot.com/o/vegetable-new%2F1562147976214_curly_lettuce_value_300.jpg?alt=media" class="w-100 rounded-top" style="height: 15em;object-fit:cover">
                </div>
                <div class="card-body">
                    <div class="card-title font-weight-bold" style="font-size:20px">
                        Curly Lettuce
                    </div>
                    <div class="satuan" style="color: #999">250 gram</div>
                    <div class="discount mt-2" style="color: #999"><s>Rp. 9.200</s> <span style="background-color: #F69C07" class="badge badge-pill badge-warning text-white">Save 28%</span></div>
                    <div class="price font-weight-bold mt-3" style="color: #47b04b;font-size:20px">Rp. 6.600</div>
                    <button class="btn btn-success btn-md mt-3 btn-block shadow-sm">Beli</button>
                </div>
            </div>
        </div>
    </div>
</div>