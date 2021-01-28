@if(!empty($search_post))
    @foreach($search_post as $product)
      <div class="col-md-4">
        <div class="product-wrapper">
           <div class="product-image-wrapper">
              <img src="{{url('/admin/public/product/1598189039download.jpg')}}">
           </div>
           <div class="product-content-wrapper">
              <div class="product-title">{{$product['name']}}</div>
              <div class="product-price">${{$product['cost']}}/-</div>
              <div class="product-id">{{$product['product_id']}}</div>
              <div class="product-actions">     
                  <a href="#" class="btn btn-primary">Link</a>
                  <ion-icon name="add"></ion-icon>
              </div>
           </div>
        </div>
      </div>
    @endforeach
@else
      <div class="col-md-4">
        Posts not found.
      </div>
@endif    
