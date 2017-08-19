$(function(){
	var now = new Date();
    var day = ("0" + now.getDate()).slice(-2);
    var month = ("0" + (now.getMonth() + 1)).slice(-2);
    var today = now.getFullYear() + "-" + (month) + "-" + (day);
	
	$('#h_date').val(today);
	$('#date').text(today);
	$('#submitInvoice').click(function(){
		submitInvoice();
	});
});
function placeOfSup(str){
		

}
function calcTax(amount){
	amount = parseInt(amount);
	
	var amount1 = parseInt($('#amount1').val());
	var amount2 = parseInt($('#amount2').val());
	var amount3 = parseInt($('#amount3').val());
	var amount = amount1 + amount2 + amount3;
	$('#h_Sub_amount').val(amount);
	$('#Sub_amount').text(amount);
	var placeoforder = $('#place_of_supply').val();
	if(placeoforder == "Maharashtra"){
		var cgst = 9/2;
	    var CGST_Amount = Math.round(amount*(cgst/100));

	    var sgst = 9/2;
	  	var SGST_Amount = Math.round(amount*(sgst/100));
		$('#cgst').text(CGST_Amount);
		$('#sgst').text(CGST_Amount);
		var total =CGST_Amount+SGST_Amount;
		
		$('#h_total_tax').val(total);
		$('#total_tax').text(total);
		$('#h_total_amount').val(Math.round(CGST_Amount+SGST_Amount+amount));
		$('#total_amount').text(Math.round(CGST_Amount+SGST_Amount+amount));
		$('#h_cgst').val(Math.round(CGST_Amount));
		$('#h_sgst').val(Math.round(CGST_Amount));
		$('#igst').text("");
	}else{
		$('#cgst').text("");
		$('#sgst').text("");
		$('#h_cgst').val("");
		$('#h_sgst').val("");
		var igst = 18/2;
		var IGST_Amount = amount*(igst/100);
		var igst = IGST_Amount;
		$('#h_total_tax').val(igst);
		$('#total_tax').text(igst);

		var totalAmount = igst + amount;
		var round_igst=Math.round(IGST_Amount);
		$('#h_total_amount').val(totalAmount);
		$('#total_amount').text(totalAmount);
		$('#igst').text(igst);
		$('#h_igst').val(igst);
	}
}
function EditcalcTax(amount){
	amount = parseInt(amount);
	
	var amount1 = parseInt($('#amount1').val());
	var amount2 = parseInt($('#amount2').val());
	var amount3 = parseInt($('#amount3').val());
	var amount = amount1 + amount2 + amount3;

	$('#sub_total').val(amount);
	
	var placeoforder = $('#place_of_supply').val();
	if(placeoforder == "Maharashtra"){
		var cgst = 9/2;
	    var CGST_Amount = Math.round(amount*(cgst/100));

	    var sgst = 9/2;
	  	var SGST_Amount = Math.round(amount*(sgst/100));
		$('#cgst').val(CGST_Amount);
		$('#sgst').val(SGST_Amount);
		var total =CGST_Amount+SGST_Amount;
		
		
		$('#total_tax').val(total);
		
		$('#total_amount').val(Math.round(CGST_Amount+SGST_Amount+amount));
		
		$('#igst').val(0);
	}else{
		$('#cgst').val(0);
		$('#sgst').val(0);
		
		var igst = 18/2;
		var IGST_Amount = amount*(igst/100);
		var igst = IGST_Amount;
		
		$('#total_tax').val(igst);

		var totalAmount = igst + amount;
		var round_igst=Math.round(IGST_Amount);
		
		$('#total_amount').val(totalAmount);
		$('#igst').val(igst);
		
	}
}
function submitInvoice(){

	/*var flag = true;
	flag = $("#forgotForm").valid();
	if(flag==false){
		return false;
	}*/
	var data = $('#invoiceForm').serialize();
	alert(data);

	$.ajax({
		
		"url":"/api/insertInvoice",
		"method":"POST",
		
		"data":data,
		"dataType":"JSON",
		beforeSend:function(){
		console.log(data);
		},
		success:function(response){
			
			console.log(response);
			if(response.code == 200){
				alert(response.message);
				window.location.href = "/";
			}else{
				alert(response.message);
			}
		},
		complete:function(){
			
		
		}
	});
}

function pdfGenerate(id){
       
        $.ajax({
		
			"url":"/api/pdfgen/"+id,
			"method":"GET",
			
			
			"dataType":"JSON",
			beforeSend:function(){
			
			},
			success:function(response){
				
				console.log(response);
				if(response.code == 200){
					alert(response.message);
					location.reload();
				}else{
					alert(response.message);
				}
			},
			complete:function(){
				
			
			}
		});
        
}
function getCompanyAddress(id){
	
	$.ajax({
		
		"url":"/api/getCompanyDetails/"+id,
		"method":"GET",
		
		
		"dataType":"JSON",
		beforeSend:function(){
		
		},
		success:function(response){
			
			console.log(response);
			if(response.code == 200){
				$('#name').val(response.data[0].name);
				$('#id').val(response.data[0].id);
				$('#address').val(response.data[0].company_address);
				$('#GSTIN').val(response.data[0].gistin);
				$('#address').val(response.data[0].company_address);
				
			}else{
				
			}
		},
		complete:function(){
			
		
		}
	});
}

function getCompanyDetails(){
	var data = $('#searchForm').serialize();
	$.ajax({
		
		"url":"/api/getCompanyDetails",
		"method":"POST",
		
		"data":data,
		"dataType":"JSON",
		beforeSend:function(){
		console.log(data);
		},
		success:function(response){
			
			console.log(response);
			if(response.code == 200){
				alert(response.message);
				location.reload();
			}else{
				alert(response.message);
			}
		},
		complete:function(){
			
		
		}
	});
}

function editInvoice(){
	var data = $('#invoiceForm').serialize();
	alert(data);
	
	$.ajax({
		
		"url":"/api/editInvoice",
		"method":"POST",
		
		"data":data,
		"dataType":"JSON",
		beforeSend:function(){
		console.log(data);
		},
		success:function(response){
			
			console.log(response);
			if(response.code == 200){
				alert(response.message);
				/*location.reload();*/
			}else{
				alert(response.message);
			}
		},
		complete:function(){
			
		
		}
	});
}