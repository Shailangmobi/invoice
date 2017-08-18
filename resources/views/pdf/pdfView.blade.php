<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
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

 @foreach ($invoices as $invoices)
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
                Customer Name:<span>{{$invoices->name}}</span><br>
				Company Name:<span>{{$invoices->company_name}}</span><br>
				Address:<span>{{$invoices->address}}</span>
				</td>

				<td id="table_td" >Invoice no:-<span>{{$invoices->invoice}}</span></td>

				<td id="table_td" rowspan="2" ><strong>SMARTFIN Corporate Advisors Pvt Ltd</strong><br>
				Add : H-004, Platform level, Railway station complex<br>
				CBD Belapur, Navi Mumbai - 400614<br>
				Email : Smartfincorporate@gmail.com<br>
				Tel No: 022-27561324/25<br>
                <strong>CIN No</strong>.: U74900MH2011PTC216001
                
					
                 </td>
			</tr>

		<tr><td id="table_td">Date:- <input type="hidden" name="date" id="h_date"><span id="date">{{$invoices->date}}</span>
        </td></tr>

		<tr>
		
        
		<td id="table_td"><strong>Customer GSTIN No.</strong>:- <input id="GSTIN" name="GSTIN">
		</td>
        <td id="table_td">Place of Supply:<span>{{$invoices->place_of_supply}}</span>
       </td>
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
		<span>{{$invoices->product}}</span></td>
        <td id="table_td">998413</td>
		
		<td>Rs:-<span>{{$invoices->amount}}</span></td>
		</tr>
		


		<tr>
       <td id="table_td" rowspan="5" ></td>
        
		<td id="table_td" colspan="2" style="text-align:right">Sub total</td>
		<td><span>Rs:-{{$invoices->sub_total}}</span></td>
		</tr>
        
        <tr>
       
        
		<td id="table_td" colspan="2" style="text-align:right">
		CGST : 9%<br>
        SGST : 9%<br>
        IGST : 18%
        </td>
		<td id="table_td">
		Rs:-<span id="cgst" name="cgst">{{$invoices->cgst}}</span><br>
        Rs:-<span id="sgst" name="sgst">{{$invoices->sgst}}</span><br>
        Rs:-<span id="igst" name="isgst">{{$invoices->igst}}</span>
		</tr>
        
        
        
		<tr>
        
        
		<td colspan="2" style="text-align:right">GST TAX Total</td>
		<td id="table_td">Rs:-<span id="total_tax" name="total_tax">{{$invoices->total_tax}}</span></td>
		</tr>
		
        <tr>
        
        
		<td id="table_td" colspan="2" style="text-align:right">Total Amount</td>
		<td id="table_td">Rs:-
		<span id="total_amount" name="total_amount">{{$invoices->total_amount}}</span>
		</td>
		</tr>
        
		<tr>
		<td colspan="4" id="table_td" align="left"></td>
		</tr>

		</table>


		


		<center><p>This is Computer Generated Invoice.</p></center>
		

		@endforeach
		<!-- <button type="button" id="submitInvoice">Submit</button> -->
		</form>
		</body>
		</html>
		