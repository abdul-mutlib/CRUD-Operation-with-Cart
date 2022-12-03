$(document).ready(function(){  
	// code to get all records from table via select box
	$("#month").change(function() {    
		var order_month = $(this).find(":selected").val();
		var dataString = 'empid='+ order_month;    
		$.ajax({
			url: 'getMonth.php',
			dataType: "json",
			data: dataString,  
			cache: false,
			success: function(employeeData) {
			   if(employeeData) {
			   		$("#errorMassage").addClass('hidden').text("");
					$("#recordListing").removeClass('hidden');	
					$("#heading").show();		  
					$("#no_records").hide();					
					$("#invoice_no").text(employeeData.invoice_no);
					$("#order_month").text(employeeData.order_month);
					//$("#order_date").text(employeeData.order_date);
					$("#order_quantity").text(employeeData.order_quantity);
					$("#order_amount").text(employeeData.order_amount);
					$("#records").show();		 
				} else {
					$("#recordListing").addClass('hidden');	
					$("#errorMassage").removeClass('hidden').text("No record found!");
				}   	
			} 
		});
 	}) 
});