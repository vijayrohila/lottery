$(function () {
    if ($('#user-list').length > 0) {
        $('#user-list').DataTable({
            processing: true,
            serverSide: true,
            ajax: base_url + "/user/create",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'item_name'},
                {data: 'image', name: 'image', orderable: false, searchable: false},
                {data: 'contact', name: 'contact'},
                {data: 'hr', name: 'hr'},
                {data: 'rp', name: 'rp'},
                {data: 'created_at', name: 'created_at'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
    } 

    if ($('#product-list').length > 0) {
        $('#product-list').DataTable({
            processing: true,
            serverSide: true,
            ajax: base_url + "/product/create",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                {data: 'start', name: 'start'},
                {data: 'end', name: 'end'},
                {data: 'title', name: 'title'},
                {data: 'product_id', name: 'product_id'},
                {data: 'image', name: 'image', orderable: false, searchable: false},
                {data: 'price', name: 'price'},
                {data: 'created_at', name: 'created_at'},
                {data: 'action', name: 'action', orderable: false, searchable: false}               
            ]
        });
    }

    if ($('#donate-list').length > 0) {
        $('#donate-list').DataTable({
            processing: true,
            serverSide: true,
            ajax: base_url + "/donate/create",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                {data: 'trust_name', name: 'trust_name'},
                {data: 'country', name: 'country'},
                {data: 'state', name: 'state'},                
                {data: 'date', name: 'date'},
                {data: 'image', name: 'image', orderable: false, searchable: false},
                {data: 'amount', name: 'amount'},
                {data: 'created_at', name: 'created_at'},
                {data: 'action', name: 'action', orderable: false, searchable: false}               
            ]
        });
    }

    if ($('#winner-list').length > 0) {
        $('#winner-list').DataTable({
            processing: true,
            serverSide: true,
            ajax: base_url + "/winner/create",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                {data: 'product_id', name: 'product_id'},
                {data: 'product_name', name: 'product_name'},
                {data: 'user_id', name: 'user_id'},
                {data: 'amount', name: 'amount'},
                {data: 'position', name: 'position'},
                {data: 'image', name: 'image', orderable: false, searchable: false},
                {data: 'date', name: 'date'},
                {data: 'action', name: 'action', orderable: false, searchable: false}  
            ]
        });
    } 

    if ($('#search-list').length > 0) {
        $('#search-list').DataTable();
    } 

    if ($('#statistic-list').length > 0) {
        $('#statistic-list').DataTable({
            processing: true,
            serverSide: true,
            ajax: base_url + "/statistic/create",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                {data: 'from_date', name: 'product_id'},
                {data: 'to_date', name: 'product_name'},
                {data: 'action', name: 'action', orderable: false, searchable: false}  
            ]
        });
    }       

    if ($('#user-winner-list').length > 0) {
        $('#user-winner-list').DataTable({
            processing: true,
            serverSide: true,
            ajax: base_url + "/user-winner/create/"+$("#user_id").val(),
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
            ajax: base_url + "/user-bat/create/"+$("#user_id").val(),
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
});

$(function(){

    $("#add-user").validate();  
    $("#add-product").validate({
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

    if($("#change-password").length > 0){
        $("#change-password").validate({
            rules: {
                    password:{
                        maxlength:20
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

    if($(".lottery").length > 0) {
        $(".lottery").validate({
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

    $("#add-donation").validate({
        rules: {
                start_date:{
                    required:true
                },
                end_date : {
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

    $("body").on('click', '#cal-find', function (event) {
        $.ajax({
                url: base_url + "/search-calucation",
                type: 'post',
                data: $("#search-calucation").serialize(),
                dataType: "json",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                beforeSend: function () {
                  $('#loading').show(); 
                },
                complete: function () {
                  $('#loading').hide();
                },
                success: function (result) {
                    if(result.status == "error"){
                        toastr.error(result.message, 'Error');
                    } else {
                        $("#cal-tb").html(result.data);
                    }
                    $('#loading').hide();
                }
        });        
    });

    $("#search-calucation").validate({
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

    $("body").on('click', '.delete', function (event) {
        let obj = $(this);
        swal({
            title: "Are you sure you want to delete?",
            text: "",
            icon: "warning",
            buttons: ["Cancel", "Yes"],
        }).then((willDelete) => {
            if (willDelete) {
                let id = $(this).attr("id");
                //alert(id);
                let table = $(this).attr("data-table");
                $.ajax({
                    url: base_url+"/"+table+"/"+id,
                    type: 'delete',
                    //data: {id: id},
                    dataType: "json",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    },
                    beforeSend: function () {
                        //obj.ladda().ladda('start');
                    },
                    complete: function () {
                        //obj.ladda().ladda('stop');
                    },
                    success: function (result) {
                        if (result.status == "success") {
                            $("#"+table+"-list").DataTable().ajax.reload();
                            toastr.success(result.message, 'Success');
                        } else {
                            toastr.error(result.message, 'Error');
                        }
                    }
                });
            }
        });
    });   

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

    $('.mySelect2').select2({
      selectOnClose: true
    });
})


$( function() {

    $("#date").datepicker({dateFormat:"yy-mm-dd"});

    var dateFormat = "yy-mm-dd",
      from = $( "#start" )
        .datepicker({
          minDate: 0,
          dateFormat:"yy-mm-dd",
          //changeMonth: true,
          //numberOfMonths: 3
        })
        .on( "change", function() {
          to.datepicker( "option", "minDate", getDate( this ) );
        }),
      to = $( "#end" ).datepicker({
        defaultDate: "+1w",
        dateFormat:"yy-mm-dd",
        //changeMonth: true,
        //numberOfMonths: 3
      })
      .on( "change", function() {
        from.datepicker( "option", "maxDate", getDate( this ) );
      });
 
    function getDate( element ) {
      var date;
      try {
        date = $.datepicker.parseDate( dateFormat, element.value );
      } catch( error ) {
        date = null;
      }
 
      return date;
    }
});

$( function() {
    var dateFormat = "yy-mm-dd",
      from = $( "#start_date" )
        .datepicker({
          //minDate: 0,
          dateFormat:"yy-mm-dd",
          //changeMonth: true,
          //numberOfMonths: 3
        })
        .on( "change", function() {
          to.datepicker( "option", "minDate", getDate( this ) );
        }),
      to = $( "#end_date" ).datepicker({
        defaultDate: "+1w",
        dateFormat:"yy-mm-dd",
        //changeMonth: true,
        //numberOfMonths: 3
      })
      .on( "change", function() {
        from.datepicker( "option", "maxDate", getDate( this ) );
      });
 
    function getDate( element ) {
      var date;
      try {
        date = $.datepicker.parseDate( dateFormat, element.value );
      } catch( error ) {
        date = null;
      } 
      return date;
    }
});
