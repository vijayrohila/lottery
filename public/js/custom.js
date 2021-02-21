$(function(){
    if($("#pop-login-form").length > 0){
        $("#pop-login-form").validate({
            errorElement: 'span',
            errorPlacement: function (error, element) {
              error.addClass('invalid-feedback');
              element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
              $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
              $(element).removeClass('is-invalid');
            }
        }); 
    }

    if ($('#traffic-list').length > 0) {
        $('#traffic-list').DataTable({
            processing: true,
            serverSide: true,
            ajax: base_url + "/traffic/create",
            columns: [
                {data: 'date', name: 'date'},
                {data: 'visitor', name: 'trust_name'},                               
            ]
        });
    }

    if($("#register").length > 0){
        $("#register").validate({
            rules: {
                name: {
                    maxlength:150
                },                
                email: {
                    maxlength:100
                },                
                company_name: {
                    maxlength:150
                }, 
                promotional_link: {
                    maxlength:250
                },                
                mobile: {
                    maxlength:10,
                    minlength:10
                },
                cost: {
                    maxlength:5
                },
                term: {
                    required:true
                }            
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
          error.addClass('invalid-feedback');
          element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        }
        }); 
    } 

    /*$("body").on('change', '#language', function (event) {
      let code = $(this).find(':selected').val();
      //alert(code);
      if(!code) {                    
          return false;
      }
      $.ajax({
            url: base_url + "/language-post/" + code,
            type: 'get',
            data: {id: id},
            dataType: "json",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },            
            success: function (result) {
                $("#district").html("<option value=''>Select Language</option>");
                $.each(result, function( index, value ) {
                    $("#district").append("<option value='"+value.district_name+"'>"+value.district_name+"</option>");
                }); 
            }
      });
    });*/  

    

    $("body").on('click', '.pick-one', function (event) {
        let avail = parseInt($(".avail-post").text());
        if (avail > 0) {
            timer();
            let product_id = `${new Date().getDate()}${new Date().getHours()}${new Date().getSeconds()}${new Date().getMilliseconds()}`+Math.random().toString(36).substr(2, 5).toUpperCase();
            $(".product-id").html("Post ID: PID"+product_id);
            $("#product_id").val("PID"+product_id);
            //$(".avail-post").text(avail-1);
            $("#form-div").show();
            $(".generate-id").show();
            $(this).prop("disabled",true);
            updateProductId("PID"+product_id);
        } else {
            toastr.error("No Posts Available in this Hour", 'Note:');
        }        
    });

    function updateProductId(product_id) {
        $.ajax({
            url: base_url+"/product-id-post",
            type: 'POST',
            data: { product_id:product_id },        
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')             
            },
            beforeSend: function () {
                $("#loading").show();
            },
            complete: function () {
                $("#loading").hide();
            },
            success: function (response) {
                if (response.status == "success") {
                    if(response.count > 0) {
                        $(".avail-post").html(response.count - 1);
                    } else {
                        toastr.error("No Posts Available in this Hour", 'Note:');
                    }
                    
                } else {
                    toastr.error(response.message, 'Error');
                }
            },
            error: function(xhr) {            
                toastr.error("Something Went Wrong", 'Error');
            }
        });
    }

    var amount = 0;
    //var currency = '';

    $("body").on('change', '#country', function (event) {
        let tax = $("#country :selected").attr("data-tax");       
        let fee = $("#country :selected").attr("data-fee"); 
        //let currency = $("#country :selected").attr("data-currency"); 
        amount =  parseFloat(fee) + parseFloat(tax);  
        //currency =  currency;  
        $("#tax").val(tax);  
        $("#fee").val(fee);  
        $("#total").val(amount);  
        $("#pay-total").html(amount);
    });

    

    $("body").on('click', '#pay-btn', function (event) { 
            let form = $("#register");
            form.validate()
            if (form.valid() == true) {  

                if($("script[src='https://checkout.razorpay.com/v1/checkout.js']").length > 0) {
                    $("script[src='https://checkout.razorpay.com/v1/checkout.js']").remove();
                    $(".razorpay-payment-button").remove();
                    
                }     

                let currency = $("#country :selected").attr("data-currency");

                //alert(currency);

                loadfile('https://checkout.razorpay.com/v1/checkout.js',amount,currency);           

                setTimeout(function() {
                    if($(".razorpay-payment-button").length > 0) {
                        $(".razorpay-payment-button").trigger('click');
                    } else {                        
                        toastr.error("Something Went Wrong", 'Error');
                    }

                }, 1000);
                                              
            }
    });

    $("body").on('click', '#search-lang-post', function (event) {

        let lang = $("#language").val();

        if(!lang) {
            toastr.error("Please Select Language", 'Error');
            return false;
        }

        $.ajax({
            url: base_url+"/search-post",
            type: 'POST',
            data: {language:lang},        
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')             
            },
            beforeSend: function () {
                $("#loading").show();
            },
            complete: function () {
                $("#loading").hide();
            },
            success: function (response) {
                if (response.status == "success") {
                    $("#search-add-post").html(response.result);
                    $("#prmt").hide();
                } else {
                    toastr.error(response.message, 'Error');
                }
            },
            error: function(xhr) {            
                toastr.error("Something Went Wrong", 'Error');
            }
        });
    });

    $("body").on('click', '.delete-post', function (event) {
        swal({
            title: "Are You Sure! You want to Delete this Post ?",
            text: "",
            icon: "warning",
            buttons: ["Cancel", "Yes"],
        }).then((willDelete) => {
            if (willDelete) {
                let id = $(this).attr("id");
                $.ajax({
                    url: base_url+"/product/"+id,
                    type: 'DELETE',
                    //data: {id:id},        
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')             
                    },
                    beforeSend: function () {
                        $("#loading").show();
                    },
                    complete: function () {
                        $("#loading").hide();
                    },
                    success: function (response) {
                        if (response.status == "success") {
                            $("#search-lang-post").click();
                        } else {
                            toastr.error(response.message, 'Error');
                        }
                    },
                    error: function(xhr) {            
                        toastr.error("Something Went Wrong", 'Error');
                    }
                });
            }
        });        
    });                
       

    $("#search-post-id").validate({
        submitHandler: function (form) {              
            $.ajax({
                url: base_url+"/search-post-id",
                type: 'POST',
                data: $("#search-post-id").serialize(),        
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')             
                },
                beforeSend: function () {
                    $("#loading").show();
                },
                complete: function () {
                    $("#loading").hide();
                },
                success: function (response) {
                    if (response.status == "success") {
                        $("#search-add-post").html(response.result);
                        $("#prmt").hide();
                    } else {
                        toastr.error(response.message, 'Error');
                    }
                },
                error: function(xhr) {            
                    toastr.error("Something Went Wrong", 'Error');
                }
            });
        }
    }); 

       
          
});

$(function () {
    $("body").on('keypress', 'input[type=number]', function (e) {
        e = e || window.event;
        var charCode = (typeof e.which == "undefined") ? e.keyCode : e.which;
        var charStr = String.fromCharCode(charCode);
        if (!charStr.match(/^[0-9]+$/))
        e.preventDefault();
    });
})

function timer() {

    // Set the date we're counting down to
    var countDownDate = new Date().getTime();

    countDownDate = countDownDate + 3*60*1000;


    // Update the count down every 1 second
    var x = setInterval(function() {

      // Get today's date and time
      var now = new Date().getTime();
        
      // Find the distance between now and the count down date
      var distance = countDownDate - now;

      //console.log(distance);
        
      // Time calculations for days, hours, minutes and seconds
      var days = Math.floor(distance / (1000 * 60 * 60 * 24));
      var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      var seconds = Math.floor((distance % (1000 * 60)) / 1000);
        
      // Output the result in an element with id="demo"
      document.getElementById("demo").innerHTML = minutes + "m " + seconds + "s ";
        
      // If the count down is over, write some text 
      if (distance < 0) {
        clearInterval(x);
          let avail = parseInt($(".avail-post").text());      
          $(".avail-post").text(avail + 1);
          $("#form-div").hide();
          $(".generate-id").hide();
          $(".pick-one").prop("disabled",false);      
          document.getElementById("demo").innerHTML = "EXPIRED";
      }
    }, 1000);
} 
 