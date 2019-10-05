$(document).ready(function(){

	getCustomers();
	getCustomerOrders();

	function getCustomers(){
		$.ajax({
			url : '../admin/classes/Customers.php',
			method : 'POST',
			data : {GET_CUSTOMERS:1},
			success : function(response){
				
				console.log(response);
				var resp = $.parseJSON(response);
				if (resp.status == 202) {

					var customersHTML = "";

					$.each(resp.message, function(index, value){

						customersHTML += '<tr>'+
									          '<td>'+value.id+'</td>'+
									          '<td>'+value.fname+' '+value.lname+'</td>'+
									          '<td>'+value.email+'</td>'+
									          '<td>'+value.phone_number+'</td>'+
									          '<td>'+value.resident_address+' '+value.lga+' '+value.state+'</td>'+
									       '</tr>'

					});

					$("#customer_list").html(customersHTML);

				}else if(resp.status == 303){

				}

			}
		})
		
	}

	function getCustomerOrders(){
		$.ajax({
			url : '../admin/classes/Customers.php',
			method : 'POST',
			data : {GET_CUSTOMER_ORDERS:1},
			success : function(response){
				
				console.log(response);
				var resp = $.parseJSON(response);
				if (resp.status == 202) {

					var customerOrderHTML = "";

					$.each(resp.message, function(index, value){

						customerOrderHTML +='<tr>'+
								              '<td>#</th>'+
								              '<td>'+ value.order_id +'</td>'+
								              '<td>'+ value.id +'</td>'+
								              '<td>'+ value.item_name +'</td>'+
								              '<td>'+ value.qty +'</td>'+
								              '<td>'+ value.trx_id +'</td>'+
								              '<td>'+ value.p_status +'</td>'+
								            '</tr>';

					});

					$("#customer_order_list").html(customerOrderHTML);

				}else if(resp.status == 303){
					$("#customer_order_list").html(resp.message);
				}

			}
		})
		
	}


});