$(function(){
    var $validate = $("#formvalidation");
    if($validate.length){
        $validate.validate({
            rules:{
                firstname:{
                    required : true
                },
                lastname:{
                    required : true
                },
                email:{
                    required : true,
                    email:true
                },
                password:{
                    required : true,
                    minlength : 8
                },
                gender:{
                    required : true
                },
                native:{
                    required : true
                },
                skills:{
                    required : true
                },
                location:{
                    required: true
                }
            },
            messages:{
                firstname:{
                    required:'This field is required'
                },
                lastname:{
                    required:'This field is required'
                },
                email:{
                    required:'This field is required',
                    required: 'Email should end with @gmail.com'
                },
                password:{
                    required:'This field is required',
                    required:'Must contain 8 character'
                },
                gender:{
                    required:'This field is required'
                },
                native:{
                    required:'This field is required'
                },
                skills:{
                    required:'This field is required'
                },
                location:{
                    required:'This field is required'
                },
                submit:function(formvalidation){
                    formvalidation.submit();
                }

            }
        })
    }
})