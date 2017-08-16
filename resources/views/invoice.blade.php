<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
		  <head>
          
		  <style>
		  
			  #table_td{				  
				  padding:10px;
				  font-size:12px;
			  }
			  #table-bordered>tbody>tr>td 
			   
			  
			 
			   {border: 1px solid #080000 !important;}
			  table tfoot td{
				  /*text-align:center;*/
			  }
			 #headtxt{
				 text-align:center;
				 padding:0 !important;
				 font-weight:bold;
				 font-size:2em;
			 }
		</style>
		  </head>


		<body>
        <br><br><br><br><br>
        <form id="invoiceForm">
        <table id="table-bordered"  style="width:100%;">
        <tr>
        <td id="headtxt">INVOICE</td>
        </tr>
        </table>
		<table id="table-bordered" style="width:100%;">

		

			<tr>
				<td id="table_td"  rowspan="2"><strong>Customer Details:-</strong><br>
                Customer Name:<input type="text" id="name" name="name"><br>
				Company Name:<input type="text" id="company" name="company"><br>
				Address:<input type="text" id="address" name="address">
				</td>

				<td id="table_td" >Invoice no:-<input readonly="" id="invoice" name="invoice" value="IN/{{$data[0]->count}}"></td>

				<td id="table_td" rowspan="2" ><strong>SMARTFIN Corporate Advisors Pvt Ltd</strong><br>
				Add : H-004, Platform level, Railway station complex<br>
				CBD Belapur, Navi Mumbai - 400614<br>
				Email : Smartfincorporate@gmail.com<br>
				Tel No: 022-27561324/25<br>
                <strong>CIN No</strong>.: U74900MH2011PTC216001
                
					
                 </td>
			</tr>

		<tr><td id="table_td">Date:- <input type="hidden" name="date" id="h_date"><span id="date"></span>
        </td></tr>

		<tr>
		
        
		<td id="table_td"><strong>Customer GSTIN No.</strong>:- <input id="GSTIN" name="GSTIN">
		</td>
        <td id="table_td">Place of Supply:
        <select id="place_of_supply" name="place_of_supply" onchange="placeOfSup(this.value);">
        <option value="0">Select</option>
        <option value="MH">Maharashtra</option>
         <option value="Ot">Others</option>
        </select></td>
		<td id="table_td"><strong>GSTIN</strong>: 27AAHC1232C1ZZ<br></td>
		</tr>

		
		
        
        
		</table>


		


		<table id="table-bordered"  style="width:100%;">
		<tr>
		<td id="table_td" >Sr. No.</td>
		<td id="table_td">Description</td>
        <td id="table_td">SAC Code</td>
		
		<td id="table_td">Amount</td>
		</tr>

		<tr style="height:150px;">
		<td id="table_td">1.</td>
		<td id="table_td">
		<select id="product" name="product">
			<option value="promo">Bulk SMS- Transactinal</option>
			<option value="trans">Bulk SMS- Promotional</option>
		</select></td>
        <td id="table_td">998413</td>
		
		<td>Rs:-<input type="text" name="amount" onchange="calcTax(this.value);"></td>
		</tr>
		


		<tr>
       <td id="table_td" rowspan="5" ></td>
        
		<td id="table_td" colspan="2" style="text-align:right">Sub total</td>
		<td id="table_td"><input type="hidden" name="h_Sub_amount" id="h_Sub_amount"><span id="Sub_amount" name="Sub_amount"></span></td>
		</tr>
        
        <tr>
       
        
		<td id="table_td" colspan="2" style="text-align:right">
		CGST : 9%<br>
        SGST : 9%<br>
        IGST : 18%
        </td>
		<td id="table_td">
		Rs:-<input type="hidden" name="h_cgst" id="h_cgst"><span id="cgst" name="cgst"></span><br>
        Rs:-<input type="hidden" name="h_sgst" id="h_sgst"><span id="sgst" name="sgst"></span><br>
        Rs:-<input type="hidden" name="h_igst" id="h_igst"><span id="igst" name="isgst"></span>
		</tr>
        
        
        
		<tr>
        
        
		<td colspan="2" style="text-align:right">GST TAX Total</td>
		<td id="table_td"><input type="hidden" name="h_total_tax" id="h_total_tax">Rs:-<span id="total_tax" name="total_tax"></span></td>
		</tr>
		
        <tr>
        
        
		<td id="table_td" colspan="2" style="text-align:right">Total Amount</td>
		<td id="table_td">Rs:-
		<input type="hidden" name="h_total_amount" id="h_total_amount"><span id="total_amount" name="total_amount"></span>
		</td>
		</tr>
        
		<tr>
		<td colspan="4" id="table_td" align="left"> Rupees: Ten thousand six hunderd and twenty rupees Only/-</td>
		</tr>

		</table>


		


		<center><p>This is Computer Generated Invoice.</p></center>
		


		<button type="button" id="submitInvoice">Submit</button>
		</form>
		</body>
		</html>
		<script type="text/javascript">
			$(function(){
				var now = new Date();
			    var day = ("0" + now.getDate()).slice(-2);
			    var month = ("0" + (now.getMonth() + 1)).slice(-2);
			    var today = now.getFullYear() + "-" + (month) + "-" + (day);
				
				$('#h_date').val(today);
				$('#date').text(today);
				$('#submitInvoice').click(function(){
					var data = $('#invoiceForm').serialize();
					alert(data);
				});
			});
			function placeOfSup(str){
					alert(str);

			}
			function calcTax(amount){
				amount = parseInt(amount);
				$('#h_Sub_amount').val(amount);
				$('#Sub_amount').text(amount);
				var placeoforder = $('#place_of_supply').val();
				if(placeoforder == "MH"){

				    var CGST_Amount = amount*(9/100);

				   
				  	var SGST_Amount = amount*(9/100);
					$('#cgst').text(CGST_Amount);
					$('#sgst').text(SGST_Amount);
					$('#h_total_tax').val(CGST_Amount+SGST_Amount);
					$('#total_tax').text(CGST_Amount+SGST_Amount);
					$('#h_total_amount').val(CGST_Amount+SGST_Amount+amount);
					$('#total_amount').text(CGST_Amount+SGST_Amount+amount);
					$('#h_cgst').val(CGST_Amount);
					$('#h_sgst').val(CGST_Amount);
					$('#igst').text(0);
				}else{
					$('#cgst').text(0);
					$('#sgst').text(0);
					$('#h_cgst').val(0);
					$('#h_sgst').val(0);
					var IGST_Amount = amount*(18/100);
					$('#h_total_tax').val(IGST_Amount);
					$('#total_tax').text(IGST_Amount);
					$('#h_total_amount').val(IGST_Amount + amount);
					$('#total_amount').text(IGST_Amount + amount);
					$('#igst').text(IGST_Amount);
					$('#h_igst').val(IGST_Amount);
				}
			}
		</script>