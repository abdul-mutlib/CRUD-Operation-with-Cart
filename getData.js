 
  $(document).ready(function(){  
    // code to get all records from table via select box
    $("#product").change(function() {    
        var product_id = $(this).find(":selected").val();
        var dataString = 'productid='+ product_id;    
        $.ajax({
            url: 'getproducts.php',
            dataType: "json",
            data: dataString,  
            cache: false,
            success: function(productsData) {
               if(productsData) {
                           
                                       
                   $("#heading").show();
                   $("#no_records").hide();
                   $("#product_name").text(productsData.product_name);
                    $("#product_sale_price").text(productsData.product_sale_price);
                    $("#records").show();        
                } else {
                    $("#heading").hide();
                    $("#records").hide();
                    $("#no_records").show();
                }       
            } 
        });
    }) 
});
