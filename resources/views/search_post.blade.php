@if(!empty($search_post))
    @foreach($search_post as $product)
      <!-- <div class="col-md-4">
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
      </div> -->
      <!-- <div class="product">
          <a href="#product"><img src="{{url('/admin/public/product/1598189039download.jpg')}}" class="img-responsive" alt=""></a>
          <div class="info-bg">
              <h5><a href="#product">{{$product['name']}}</a></h5>
          </div>
      </div> -->
      <div class="product">
          <a href="#product">
            <img src="{{url('/public/product/'.$product['image'])}}" class="img-responsive" alt=""></a>
          <div class="info-bg">
              <h5><a href="#product">Post ID: {{$product['product_id']}}</a></h5>
              <div>
                  <i class="fa fa-eye"></i>
                  {{$product['view']}}
                  <a href="{{$product['promotional_link']}}" class="button-type-1">
                      {!! $product['network']['icon'] !!}
                      Click Here
                  </a>
                  <!-- <a class="button-type-2 share-post">
                      <i class="fa fa-share-alt"></i>
                      Share
                  </a> -->
              </div>
          </div>
          <a href="" class="settings-dropdown">
              <i class="fa fa-ellipsis-v"></i>
          </a>
          <ul class="settings-dropdown-wrapper">
              <li id="{{encrypt($product['id'])}}" class="delete-post">
                Delete: {{$product['delete_count']}}/{{$total_delete->value}}
              </li>
              <!-- <li></li> -->
          </ul>
      </div>
    @endforeach
@else
      <div class="col-md-12">
        
      </div>
      <div class="col-md-12" style="text-align: center !important;">
        No Posts Available
      </div>
@endif    
