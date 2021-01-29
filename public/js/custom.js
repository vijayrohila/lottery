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
                first_name:{
                    maxlength:50
                },
                last_name:{
                    maxlength:50
                },
                email:{
                    maxlength:100
                },
                password:{
                    maxlength:20,
                    minlength:9
                },
                password_confirmation : {
                    maxlength : 20,
                    equalTo : "#password"
                },
                address:{
                    maxlength:150
                },
                pincode:{
                    maxlength:8
                },
                phone:{
                    maxlength:10,
                    minlength:10
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

    $("#search-post").validate({
        submitHandler: function (form) {              
            $.ajax({
                url: base_url+"/search-post",
                type: 'POST',
                data: $("#search-post").serialize(),        
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
                    } else {
                        toastr.error(response.message, 'Error');
                    }
                },
                error: function(xhr) {            
                    toastr.error("Something went wrong", 'Error');
                }
            });
        }
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
                    } else {
                        toastr.error(response.message, 'Error');
                    }
                },
                error: function(xhr) {            
                    toastr.error("Something went wrong", 'Error');
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
 