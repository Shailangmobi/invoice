<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script> -->
<script src="vendor/jquery/dist/jquery.min.js"></script>
<script src="app/js/invoice.js"></script>

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
		<input type="hidden" name="id" id="id">
		

			<tr>
				<td id="table_td"  rowspan="2"><strong>Customer Details:-</strong><br>
                Company Name:<select id="company" name="company" onchange="getCompanyAddress(this.value);">
                					<option value="">Select</option>
                				@foreach($company as $company)
                					<option value="{{$company->id}}">{{$company->company_name}}</option>
                				@endforeach
                			  </select><br>
				Customer Name:<input type="text" id="name" name="name"><br>
				Address:<input type="text" id="address" name="address">
				</td>

				<td id="table_td" >Invoice no:-<input readonly="" id="invoice" name="invoice" value="IN-{{$data[0]->count}}"></td>

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
       
        <option value="Maharashtra">Maharashtra</option>
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
		@php ($i = 1)
		@foreach($product as $products)
		<select id="product{{$i}}" name="product{{$i}}">
		@php ($i++)
			<option value="">Select</option>
			@foreach($product as $name)
			<option value="{{$name->product_name}}">{{$name->product_name}}</option>
				
			@endforeach
		</select><br>
		@endforeach
		
		</td>

        <td id="table_td">998413</td>
		
		<td>
		@php ($i = 1)
		@foreach($product as $product)
		Rs:-<input type="text" id="amount{{$i}}" name="amount{{$i}}" value="0" onchange="calcTax(this.value);"><br>
		@php ($i++)
		@endforeach
		</td>
		</tr>
		


		<tr>
       <td id="table_td" rowspan="5" ></td>
        
		<td id="table_td" colspan="2" style="text-align:right">Sub total</td>
		<td id="table_td">Rs:-<input type="hidden" name="h_Sub_amount" id="h_Sub_amount"><span id="Sub_amount" name="Sub_amount"></span></td>
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
		