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

    if ($('#donate-list').length > 0) {
        $('#donate-list').DataTable({
            processing: true,
            serverSide: true,
            ajax: base_url + "/donate/create",
            columns: [
                {data: 'date', name: 'date'},
                {data: 'trust_name', name: 'trust_name'},
                {data: 'state', name: 'state'}, 
                {data: 'country', name: 'country'},
                {data: 'amount', name: 'amount'},                 
                {data: 'image', name: 'image', orderable: false, searchable: false}               
            ]
        });
    }

    if ($('#winner-list').length > 0) {
        $('#winner-list').DataTable({
            processing: true,
            serverSide: true,
            ajax: base_url + "/winner/create",
            columns: [
                {data: 'date', name: 'date'},
                {data: 'user_id', name: 'user_id'},
                {data: 'product_id', name: 'product_id'},
                {data: 'amount', name: 'amount'},
                {data: 'position', name: 'position'},
                {data: 'image', name: 'image', orderable: false, searchable: false}  
            ]
        });
    } 

    if ($('#user-winner-list').length > 0) {
        $('#user-winner-list').DataTable({
            processing: true,
            serverSide: true,
            ajax: base_url + "/user-winner/create",
            columns: [
                {data: 'date', name: 'date'},
                //{data: 'user_id', name: 'user_id'},
                {data: 'product_id', name: 'product_id'},
                {data: 'amount', name: 'amount'},
                {data: 'position', name: 'position'},
                {data: 'image', name: 'image', orderable: false, searchable: false}  
            ]
        });
    } 

    if ($('#user-bat-list').length > 0) {
        $('#user-bat-list').DataTable({
            processing: true,
            serverSide: true,
            ajax: base_url + "/user-bat/create",
            columns: [
                {data: 'date', name: 'date'},
                //{data: 'user_id', name: 'user_id'},
                {data: 'product_id', name: 'product_id'},
                {data: 'amount', name: 'amount'},
                {data: 'position', name: 'position'},
                {data: 'image', name: 'image', orderable: false, searchable: false}  
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

    if($("#change-password").length > 0){
        $("#change-password").validate({
            rules: {
                old_password:{
                    maxlength:20
                    //minlength:8
                }, 
                password:{
                    maxlength:20,
                    minlength:8
                },
                password_confirmation : {
                    maxlength : 20,
                    equalTo : "#password"
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

    $("body").on('click', '.copyToClip', function (event) {
          /* Get the text field */
          var copyText = document.getElementById("copy");
          /* Select the text field */
          copyText.select();
          copyText.setSelectionRange(0, 99999); /*For mobile devices*/
          /* Copy the text inside the text field */
          document.execCommand("copy");
          /* Alert the copied text */
          //alert("Copied the text: " + copyText.value);
          toastr.success("Copied the text", 'success');
    });



    $("body").on('click', '.add-cart', function (event) {
          let id = $(this).attr("id");

            $.ajax({
                url: base_url + "/add",
                type: 'post',
                data: {id: id},
                dataType: "json",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },            
                success: function (result) {
                    if(result.status = "success"){
                        toastr.success(result.message, 'success');
                    } else {
                        toastr.error(result.error_message, 'Error');
                    }
                }
            });
    });
          
});

function redirectLogin(){
    window.location.href = base_url + "/login";
}

$(function () {
    $("body").on('keypress', 'input[type=number]', function (e) {
        e = e || window.event;
        var charCode = (typeof e.which == "undefined") ? e.keyCode : e.which;
        var charStr = String.fromCharCode(charCode);
        if (!charStr.match(/^[0-9]+$/))
        e.preventDefault();
    });
})
 