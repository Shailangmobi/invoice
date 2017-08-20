$(function(){
	
	$('#submitCustomer').click(function(){
		var data = $('#loginForm').serialize();
		alert(data);
		$.ajax({
			
			"url":"/api/addCustomer",
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
	});
	$('#submitProfile').click(function(){
		 addProfile();
	});
});
function addProfile(){


	var data = $('#profile').serialize();
	
	$.ajax({
			
			"url":"/api/addProfile",
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