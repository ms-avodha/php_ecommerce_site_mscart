$("form[name='product']").validate({
    rules: {
        image: "required",
        product_name: "required",
        product_name1: "required",
        description: "required",
        description1: "required",
        price: { 
            required: true,
            minlength: 1,
            digits: true
        },
        stock: { 
            required: true,
            minlength: 1,
            digits: true
        },       
    },
    // Specify validation error messages
    messages: {
        image: " select product image",
        product_name: " enter your product name (en)",
        product_name1: " enter your product name (ge)",
        description:" enter your description (en)",
        description1: " enter your description (ge)",
        price: " enter your price",
        stock: " enter your stock"    
    }


});


