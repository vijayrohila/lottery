@extends('layouts.main')
@section('content')
 <style type="text/css">
        input[type=text] {
          width: 300px;
          padding: 12px 20px;
          margin: 8px 0;
          box-sizing: border-box;
        }
        .btn{
                color: white;
    border: none;
    background-color: #5a2e0b;
    padding: 14px 120px;
    font-size: 18px;
    cursor: pointer;
    border-radius: 5px;
        }
      </style>

      <div class="content">
            <div class="content-text">
               <h2>Promotional Link</h2>
               <div class="content-details">
                  <input type="text" name="promostional_links" class="online-ads-field">
                  <br>   
                  <button class="btn btn-primary">Update</button>
               </div>
            </div>
            <div class="content-text">
               <h2>Yesterday's Traffic</h2>
               <div class="content-details">
                  <input type="text" name="yesterday_traffic" class="online-ads-field">
                  <br>   
                  <button class="btn btn-primary">Update</button>
               </div>
            </div>
            
         </div>
@endsection