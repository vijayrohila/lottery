$(function(){
    if($("#login").length > 0){
        $("#login").validate(); 
    }

    if($("#register").length > 0){
        $("#register").validate({
            rules: {
            'type[]': {
                required: true
            },
            "name":{
                maxlength:50
            },
            "email":{
                maxlength:50
            },
            "password":{
                maxlength:20
            },
            "address":{
                maxlength:150
            },
            "price[]":{
                 required: true,
                maxlength:10000
            },
            "duration[]":{
                 required: true,
                maxlength:60
            }
        }
        }); 
    }

    var len=1;
      
    $("body").on('click', '.add-more', function () {
        let html;

        html='<div class="form-group row">\
                <label for="password-confirm" class="col-md-4 col-form-label text-md-right"></label>\
                <div class="col-md-2">\
                    <select name="appointment['+len+'][type]" class="form-control" required="">\
                        <option value="">Select appointment type</option>\
                        <option value="emergency">Emergency</option>\
                        <option value="routine">Routine</option>\
                        <option value="telephone">Telephone</option>\
                    </select>\
                </div>    \
                <div class="col-md-2">\
                    <input id="duration" type="number" class="form-control" name="appointment['+len+'][duration]" required placeholder="duration in minutes" min="1" max="60">\
                </div><div class="col-md-2"><input id="cost" type="number" class="form-control" name="appointment['+len+'][cost]" required placeholder="cost" min="1" max="10000">\
                </div></div>';

        $(".add-colum").before(html);        
        len++;
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