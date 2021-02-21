@if(!empty($search_post))
<div id="products4-block" class="text-center" style="padding: 0;padding-bottom: 40px;">
    <div class="wrapper">            
        <input id="tab1" type="radio" name="tabs" checked="">            
        <section id="content1" class="tab-content text-left">
          <h3 class="title-main" id="prmt">Promoted</h3>
            <div class="d-grid grid-col-3" id="search-add-post">              
              @foreach($search_post as $product)
                <div class="product">
                    <a href="#product">
                      @if(date("Y-m-d",strtotime($product['created_at'])) == date("Y-m-d"))
                      <img src="{{url('/public/product/'.$product['image'])}}" class="img-responsive" alt="">
                      @else
                      <img src="{{url('/public/images/dummy-pos.jpg')}}" class="img-responsive" alt="">
                      @endif
                    </a>
                    <div class="info-bg">
                        <h5>
                          <a href="#product">Status: 
                            @if($product['is_deleted'] == 1)
                              Deleted
                            @elseif(date("Y-m-d",strtotime($product['created_at'])) > date("Y-m-d"))
                              Timer
                            @else 
                              Active
                            @endif                        
                          </a>
                        </h5>
                        <h5><a href="#product">Post ID: {{$product['product_id']}}</a></h5>
                        <h5><a href="#product">Date: {{date("Y-m-d",strtotime($product['created_at']))}} to {{date("Y-m-d",strtotime($product['created_at']))}}</a></h5>
                        <h5><a href="#product">Views: {{$product['view']}}</a></h5>
                        <div style="font-size: 20px;font-weight: 700;color: #232323;">Link: <a href="{{$product['promotional_link']}}" class="button-type-1" target="_blank">Link Button</a></div>
                        <h5><a href="#product">Delete: {{$product['delete_count']}}/{{$total_delete->value}}</a></h5>
                    </div>
                </div>
              @endforeach
          </div>
        </section>
    </div>
</div>
@else
      <div class="col-md-12">        
      </div>
      <div class="col-md-12" style="text-align: center !important;">
        No Posts Available
      </div>
@endif    
