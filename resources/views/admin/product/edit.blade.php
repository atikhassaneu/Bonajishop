@extends('layouts.admin')
@section('title', 'Dashboard')
@push('css') @endpush

@section('title-btn')
    <a href="{{route('admin.product.index')}}" class="btn btn-info">Back To Product</a>
@endsection

@section('add-btn')
    {{--        <a href="{{route('admin.slider.create')}}" class="btn btn-primary">Add New Slider</a>--}}
@endsection


@section('content')

    <div class="card mb-3 mx-lg-5">
        <div class="card-header">
            <i class="fab fa-fw fa-product-hunt"></i> Edit Product
        </div>
        <div class="card-body">
            @include('admin.message.msg')
            <form action="{{ route('admin.product.update',$product->id) }}" method="post" enctype="multipart/form-data">
                @csrf @method('PUT')
                <div class="form-group">
                    <label for="productTitle">Product Title *</label>
                    <textarea name="productTitle" id="productTitle" rows="4" class="form-control @error('productTitle') is-invalid @enderror">{{ $product->title }}</textarea>
                    @error('productTitle')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="category">Select Category *</label>
                    <select class="form-control" id="category" name="category">
                        @foreach($categories as $category)
                            <option @if($product->category_id == $category->id) selected @endif value="{{ $category->id }}">{{ $category->category }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="price">Price *</label>
                            <input type="text" name="price" placeholder="1000" class="form-control @error('price') is-invalid @enderror" value="{{ $product->price }}" id="price">
                            @error('price')
                            <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                             </span>
                            @enderror

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="discount">Discounted Price </label>
                            <div class="input-group">
                                <input type="text" name="discounted_price" class="form-control @error('discounted_price') is-invalid @enderror" value="{{ $product->discounted_price}}" id="discounted_price">
                                @error('discounted_price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                 </span>
                                @enderror
                            </div>

                        </div>

                    </div>
                </div>

                <div class="form-group">
                    <label for="productShortDescription">Product Short Description *</label>
                    <textarea name="productShortDescription" id="productShortDescription" rows="5" class="form-control @error('productShortDescription') is-invalid @enderror">{{ $product->short_description }}</textarea>
                    @error('productShortDescription')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="productDescription">Product Description *</label>
                    <textarea name="productDescription" id="productDescription" rows="15" class="form-control editor @error('productDescription') is-invalid @enderror">{{ $product->description }}</textarea>
                    @error('productDescription')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="input-group">
                                        <a id="thumbnailBtn" class="btn btn-primary" href="#" data-input="thumbnail" data-preview="previewThumbnail">
                                            <i class="fas fa-image"></i> Thumbnail Image
                                        </a>
                                        <input type="hidden" name="thumbnail" id="thumbnail">
                                    </div>
                                    <img id="previewThumbnail" class="p-2 img-fluid" style="max-height: 100px;">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="input-group">
                                        <a id="productImageFirstBtn" class="btn btn-primary" href="#" data-input="productImageFirst" data-preview="previewProductImageFirst">
                                            <i class="fas fa-image"></i> Product Image
                                        </a>
                                        <input type="hidden" name="productImageFirst" id="productImageFirst">
                                    </div>
                                    <img id="previewProductImageFirst" class="p-2 img-fluid" style="max-height: 100px;">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="input-group">
                                        <a id="productImageSecondBtn" class="btn btn-primary" href="#" data-input="ProductImageSecond" data-preview="previewProductImageSecond">
                                            <i class="fas fa-image"></i> Choose another
                                        </a>
                                        <input type="hidden" name="ProductImageSecond" id="ProductImageSecond">
                                    </div>
                                    <img id="previewProductImageSecond" class="p-2 img-fluid" style="max-height: 100px;">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="input-group text-center">
                                        <a id="productImageThirdBtn" class="btn btn-primary" href="#" data-input="ProductImageThird" data-preview="previewProductImageThird">
                                            <i class="fas fa-image"></i> Choose another
                                        </a>
                                        <input type="hidden" name="ProductImageThird" id="ProductImageThird">
                                    </div>
                                    <img id="previewProductImageThird" class="p-2 img-fluid" style="max-height: 100px;">
                                </div>
                            </div>
                            @if($errors->has('thumbnail') || $errors->has('productImageFirst') || $errors->has('ProductImageSecond') || $errors->has('ProductImageThird'))
                                <span class="text-danger small">
                                    <strong>{{ "The image field is required!" }}</strong>
                                </span>
                            @endif
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select id="status" name="status" class="form-control">
                                <option @if($product->status == 1)  selected @endif value="1">Published</option>
                                <option @if($product->status == 0)  selected @endif value="0">Unpublished</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="stock">Stock *</label>
                            <input type="text" name="stock" id="stock" class="form-control @error('stock') is-invalid @enderror" value="{{ $product->stock }}">
                            @error('stock')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="productTag">Tag *</label>
                    <textarea name="productTag" id="productTag" rows="2" placeholder="abc, def etc" class="form-control @error('productTag') is-invalid @enderror">{{ $product->tag }}</textarea>
                    @error('productTag')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <input type="submit" class="btn btn-primary btn-block px-3" value="Submit">

            </form>
        </div>

    </div>


@endsection



@push('js')
    <script src="{{asset('vendor/tinymce/tinymce.js')}}"></script>
    <script>
        var route_prefix = "{{ url(config('lfm.url_prefix', config('lfm.prefix'))) }}";
        $('#thumbnailBtn').filemanager('image', {prefix: route_prefix});
        $('#productImageFirstBtn').filemanager('image', {prefix: route_prefix});
        $('#productImageSecondBtn').filemanager('image', {prefix: route_prefix});
        $('#productImageThirdBtn').filemanager('image', {prefix: route_prefix});
    </script>
@endpush