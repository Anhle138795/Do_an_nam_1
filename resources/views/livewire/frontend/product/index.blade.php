<div>
    <div class="row">

        <div class="col-md-3">
            @if ($category->brands)
            <div class="card">
                <div class="card-header">
                    <h4>Brands</h4>
                </div>
                <div class="card-body">
                    @foreach ($category->brands as $brandItem)
                    <div class="d-block checkbox-wrapper-4">
                        <input type="checkbox" wire:model="brandInputs" value="{{ $brandItem->name }}" id="morning" class="inp-cbx">
                        <label for="morning" class="cbx"><span>
                        <svg height="10px" width="12px">

                        </svg></span><span>{{$brandItem->name}}</span></label>
                        <svg class="inline-svg">
                          <symbol viewBox="0 0 12 10" id="check-4">
                            <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                          </symbol>
                        </svg>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
            <div class="card mt-3">
                <div class="card-header">
                    <h4>Price</h4>
                </div>
                <div class="card-body">
                    <label class="radio-button">
                        <input type="radio" name="priceSort" wire:model="priceInput" value="high-to-low"/>
                        <span class="radio"></span> Hight to Low
                    </label>
                    <label class="radio-button">
                        <input type="radio" name="priceSort" wire:model="priceInput" value="low-to-high"/>
                        <span class="radio"></span> Low to Hight
                    </label>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="row">
                @forelse ($products as $productItem)
                <div class="col-md-4">
                    <div class="product-card">
                        <div class="product-card-img">
                            @if ($productItem->quantity > 0)
                            <label class="stock bg-success">In Stock</label>
                            @else
                            <label class="stock bg-success">Out of Stock</label>
                            @endif
                            @if ($productItem->productImages->count() > 0)
                            <a href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug) }}">
                                <img src="{{ asset($productItem->productImages[0]->image) }}"
                                    alt="{{ $productItem->name }}">
                            </a>
                            @endif
                        </div>
                        <div class="product-card-body">
                            <p class="product-brand">{{$productItem->brand}}</p>
                            <h5 class="product-name">
                                <a
                                    href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug) }}">
                                    {{$productItem->name}}
                                </a>
                            </h5>
                            <div>
                                <span class="selling-price">${{$productItem->selling_price}}</span>
                                <span class="original-price">${{$productItem->original_price}}</span>
                            </div>

                        </div>
                    </div>
                </div>
                @empty
                <div class="col-md-12">
                    <div class="p-2">
                        <h4>No Products Available for {{ $category->name }}</h4>
                    </div>
                </div>
                @endforelse
            </div>
        </div>

    </div>
</div>
