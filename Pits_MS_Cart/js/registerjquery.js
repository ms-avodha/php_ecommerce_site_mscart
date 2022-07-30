    $("form[name='register']").validate({
        rules: {
            firstname: "required",
            lastname: "required",
            address: "required",
            zipcode: { 
                required: true,
                minlength: 6,
                digits: true
            },
            country: "required",
            phone: {
                phonevalidation:true,
                // matches: "/\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/",
                // required:true,
                minlength: 10,
                maxlength: 15
                // digits: true,
                
            },
            email: {
                required: true,
                email: true,
                // regex: /^\b[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i
            },
            username: "required",
            password: { 
                required: true,
                minlength: 8,
                maxlength: 16,
                // digits:true,
                // alphabet:true
            },
            repassword: {
                required: true,
                equalTo: "#mspassword"
            },        
        },
        // Specify validation error messages
        messages: {
            firstname: " enter your firstname",
            lastname: " enter your lastname",
            address: " enter your address",
            zipcode:" enter your 6 digit pin",
            country: " enter your country",
            // phone: " enter your phone no",
            email: " enter your valid email",
            username: " enter your usersame",
            password:  " enter your valid password",
            repassword: " re-enter your valid password"    
        }
  
  
    });
    //addMethod
    $.validator.addMethod("phonevalidation",
    function(value, element) {
            return /^(?=.*[0-9])[- +()0-9]+$/.test(value);
    }, " enter your phone no"
);
//   });

