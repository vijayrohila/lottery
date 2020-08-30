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
                    maxlength:20
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

    $("body").on('change', '#state', function (event) {
      let code = $(this).find(':selected').attr("code");
      //alert(code);
      if(!code) {
          $("#district").html("<option value=''>Select District</option>");          
          return false;
      }
      $.ajax({
            url: base_url + "/district-list/" + code,
            type: 'get',
            //data: {id: id},
            dataType: "json",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },            
            success: function (result) {
                $("#district").html("<option value=''>Select District</option>");
                $.each(result, function( index, value ) {
                    $("#district").append("<option value='"+value.district_name+"'>"+value.district_name+"</option>");
                }); 
            }
      });
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