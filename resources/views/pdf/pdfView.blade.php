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
                Customer Name:<span>{{$invoices[0]->name}}</span><br>
				Company Name:<span>{{$invoices[0]->company_name}}</span><br>
				Address:<span>{{$invoices[0]->address}}</span>
				</td>

				<td id="table_td" >Invoice no:-<span>{{$invoices[0]->invoice}}</span></td>

				<td id="table_td" rowspan="2" ><strong>{{$data[0]->company_name}}</strong><br>
				{{$data[0]->company_address}}<br>
                <strong>CIN No</strong>:{{$data[0]->cin}}
                
					
                 </td>
			</tr>

		<tr><td id="table_td">Date:- <input type="hidden" name="date" id="h_date"><span id="date">{{$invoices[0]->date}}</span>
        </td></tr>

		<tr>
		
        
		<td id="table_td"><strong>Customer GSTIN No.</strong>:{{$invoices[0]->gstin}}
		</td>
        <td id="table_td">Place of Supply:<span>{{$invoices[0]->place_of_supply}}</span>
       </td>
		<td id="table_td"><strong>GSTIN</strong>:{{$data[0]->gistin}}<br></td>
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
		@php($i=1)
		<td id="table_td">@foreach ($invoices as $sr)
		{{$i}}.<br>
		@php ($i++)
		@endforeach
		</td>
		<td id="table_td">
		@foreach ($invoices as $invoice)
		<span>{{$invoice->product}}</span><br>
		@endforeach
		</td>
        <td id="table_td">998413</td>
        	<td>
		@foreach ($invoices as $amount)
			Rs:-<span>{{$amount->amount}}</span><br>
		@endforeach
		</td>
		</tr>
		


		<tr>
       <td id="table_td" rowspan="7" ></td>
        
		<td id="table_td" colspan="2" style="text-align:right">Sub total</td>
		<td><span >Rs:-{{$invoices[0]->sub_total}}</span></td>
		</tr>
        
        <tr>
       
        
		<td id="table_td" colspan="2" style="text-align:right">
		CGST : 9%<br>
        SGST : 9%<br>
        IGST : 18%
        </td>
		<td id="table_td">
		Rs:-<span id="cgst" name="cgst">{{$invoices[0]->cgst}}</span><br>
        Rs:-<span id="sgst" name="sgst">{{$invoices[0]->sgst}}</span><br>
        Rs:-<span id="igst" name="isgst">{{$invoices[0]->igst}}</span>
		</tr>
        
        
        
		<tr>
        
        
		<td colspan="2" style="text-align:right">GST TAX Total</td>
		<td id="table_td" >Rs:-<span id="total_tax" name="total_tax">{{$invoices[0]->total_tax}}</span></td>
		</tr>
		
        <tr>
        
        
		<td id="table_td" colspan="2" style="text-align:right">Total Amount</td>
		<td id="table_td">Rs:-
		<span id="total_amount" name="total_amount">{{$invoices[0]->total_amount}}</span>
		</td>
		</tr>
        <tr>
		<td colspan="4" id="table_td" align="left"> Rupees: </td>
		</tr>
		<tr>
		<td colspan="4" id="table_td" align="left">
		<strong>Company Name:</strong><span>Mobisoft Technology India Pvt Ltd.</span><br>
		<strong>Bank Name:</strong><span>ICICI Bank</span><br>
		<strong>Account No:</strong><span>015105012883</span><br>
		<strong>RTGS/NEFT/IFSC/CODE:</strong><span>ICIC0000151</span>
		</td>
		</tr>
		<tr>
		<td colspan="4" id="table_td" align="left">
		<strong>Company Name:</strong><span>Mobisoft Technology India Pvt Ltd.</span><br>
		<strong>Bank Name:</strong><span>Central Bank of India Details</span><br>
		<strong>Account No:</strong><span>3497063665</span><br>
		<strong>RTGS/NEFT/IFSC/CODE:</strong><span>CBIN0283154</span>
		</td>
		</tr>

		</table>


		


		<center><p>This is Computer Generated Invoice.</p></center>
		

		
		<!-- <button type="button" id="submitInvoice">Submit</button> -->
		</form>
		</body>
		</html>
		