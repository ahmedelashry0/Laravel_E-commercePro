<section class="product_section layout_padding" id="products">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>Our <span>products</span></h2>
        </div>
        <div class="input-group mb-3 mx-2">
            <form action="{{ route('products.search') }}" method="get" class="w-100">
                <div class="input-group">
                    <input type="text" name="search" id="search" class="form-control small-input" placeholder="Search Products" value="{{ request('search') }}">
{{--                    <button type="submit" class="btn btn-primary">Search</button>--}}
                </div>
            </form>
        </div>
        <div class="row">
            @foreach($products as $product)
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="box">
                        <div class="option_container">
                            <div class="options">
                                <a href="{{ route('product_details', $product->id) }}" class="option1">Product details</a>
                                <form action="{{ route('add_to-cart', $product->id) }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-4">
                                            <input type="number" name="quantity" value="1" min="1">
                                        </div>
                                        <div class="col-md-4">
                                            <input type="submit" value="Add to cart">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="img-box">
                            <img src="/product/{{ $product->image }}" alt="{{ $product->title }}">
                        </div>
                        <div class="detail-box">
                            <h5>{{ $product->title }}</h5>
                            @if($product->discount_price)
                                <h6 class="mx-2" style="color: dodgerblue">
                                    Discount Price:<br>${{ $product->discount_price }}
                                </h6>
                                <h6 style="color: orangered;">
                                    <del>Price:<br>${{ $product->price }}</del>
                                </h6>
                            @else
                                <h6>Price:<br>${{ $product->price }}</h6>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="pagination-container mt-4">
            {{ $products->withQueryString()->links('pagination::bootstrap-5') }}
        </div>
    </div>
</section>
