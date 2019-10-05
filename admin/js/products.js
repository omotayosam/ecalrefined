$(document).ready(function(){

	var productList;

	function getProducts(){
		$.ajax({
			url : '../admin/classes/Products.php',
			method : 'POST',
			data : {GET_PRODUCT:1},
			success : function(response){
				//console.log(response);
				var resp = $.parseJSON(response);
				if (resp.status == 202) {

					var productHTML = '';

					productList = resp.message.products;

					if (productList) {
						$.each(resp.message.products, function(index, value){

							productHTML += '<tr>'+
								              '<td>'+''+'</td>'+
								              '<td>'+value.currency+' '+ value.item_name +'</td>'+
								              '<td><img width="60" height="60" src="./../'+value.item_pic+'"></td>'+
								              '<td>'+ value.price +'</td>'+
								              '<td>'+ value.no_item_left +'</td>'+
								              '<td>'+ value.cat_title +'</td>'+
								              '<td>'+ value.brand_title +'</td>'+
								              '<td><a class="btn btn-sm btn-info edit-product" style="color:#fff;"><span style="display:none;">'+JSON.stringify(value)+'</span><i class="fas fa-pencil-alt"></i></a>&nbsp;<a pid="'+value.product_id+'" class="btn btn-sm btn-danger delete-product" style="color:#fff;"><i class="fas fa-trash-alt"></i></a></td>'+
								            '</tr>';

						});

						$("#product_list").html(productHTML);
					}

					


					var catSelectHTML = '<option value="">Select Category</option>';
					$.each(resp.message.categories, function(index, value){

						catSelectHTML += '<option value="'+ value.cat_id +'">'+ value.cat_title +'</option>';

					});

					$(".category_list").html(catSelectHTML);

					var brandSelectHTML = '<option value="">Select Brand</option>';
					$.each(resp.message.brands, function(index, value){

						brandSelectHTML += '<option value="'+ value.brand_id +'">'+ value.brand_title +'</option>';

					});

					$(".brand_list").html(brandSelectHTML);

				}
			}

		});
	}

	getProducts();

	$(".add-product").on("click", function(){

		$.ajax({

			url : '../admin/classes/Products.php',
			method : 'POST',
			data : new FormData($("#add-product-form")[0]),
			contentType : false,
			cache : false,
			processData : false,
			dataType: 'json',
			success : function(resp){
				// console.log(response);
				// var resp = $.parseJSON(response);
				if (resp.status == 202) {
					$("#add-product-form").trigger("reset");
					$("#add_product_modal").modal('hide');
					alert(resp.message);
					getProducts();
					
				} else if(resp.status == 303){
					alert(resp.message);
				}
			}

		});

	});


	$(document.body).on('click', '.edit-product', function(){

		console.log($(this).find('span').text());

		var product = $.parseJSON($.trim($(this).find('span').text()));

		console.log(product);

		$("input[name='e_product_name']").val(product.item_name);
		$("select[name='e_brand_id']").val(product.brand_id);
		$("select[name='e_category_id']").val(product.cat_id);
		$("textarea[name='e_product_desc']").val(product.item_details);
		$("input[name='e_product_qty']").val(product.no_item_left);
		$("input[name='e_product_price']").val(product.price);
		$("input[name='e_product_keywords']").val(product.item_keywords);
		$("input[name='e_product_image']").siblings("img").attr("src", "../images/"+product.item_pic);
		$("input[name='pid']").val(product.id);
		$("#edit_product_modal").modal('show');

	});

	$(".submit-edit-product").on('click', function(){

		$.ajax({

			url : '../admin/classes/Products.php',
			method : 'POST',
			data : new FormData($("#edit-product-form")[0]),
			contentType : false,
			cache : false,
			processData : false,
			success : function(response){
				console.log(response);
				var resp = $.parseJSON(response);
				if (resp.status == 202) {
					$("#edit-product-form").trigger("reset");
					$("#edit_product_modal").modal('hide');
					getProducts();
					alert(resp.message);
				}else if(resp.status == 303){
					alert(resp.message);
				}
			}

		});


	});

	$(document.body).on('click', '.delete-product', function(){

		var pid = $(this).attr('pid');
		if (confirm("Are you sure to delete this item ?")) {
			$.ajax({

				url : '../admin/classes/Products.php',
				method : 'POST',
				data : {DELETE_PRODUCT:1, pid:pid},
				success : function(response){
					var resp = $.parseJSON(response);
					if (resp.status == 202) {
						alert(resp.message);
						getProducts();
					}else if (resp.status == 303) {
						alert(resp.message);
					}
				}

			});
		}else{
			alert('Cancelled');
		}
		

	});

});