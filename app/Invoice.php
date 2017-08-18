<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Invoice extends Model
{
    //

      public static function insertCustomer($data)
    {
        
		try {
			$insertDetails = DB::table('company')->insert($data);
			if(sizeof($insertDetails) > 0 ){
				$message['code']= 200 ;
				$message['status']= "Success" ;
				$message['message']= "Customer Data Inserted !";
				
				return response()->json($message);
			}else{
				$message['code']= 400 ;
				$message['status']= "Failed" ;
				$message['message']= "Customer Data Not Inserted !";
				return response()->json($message);
			}
				
		
		} catch (\Exception $e) {
				$message['code']= 401 ;
				$message['status']= "Exception Caought" ;
				$message['message']= "There was an ERROR !";
				return response()->json($message);
		}
		
		

    }
    public static function insertInvoiceData($data)
    {
        $insertData['gstin'] = $data['GSTIN'];
        $insertData['name'] = $data['name'];
        $company = DB::table('company')->select('company_name')->where('id','=',$data['company'])->get();
        $insertData['company_name'] = $company[0]->company_name;
		$insertData['address'] = $data['address'];
		$insertData['invoice'] = $data['invoice'];
		
		$insertData['amount'] = $data['amount1'];
		$insertData['product'] = $data['product'];
		$insertData['place_of_supply'] = $data['place_of_supply'];
		$insertData['date'] = $data['date'];
		$insertData['sub_total'] = $data['h_Sub_amount'];
		$insertData['cgst'] = $data['h_cgst'];
		$insertData['igst'] = $data['h_igst'];
		$insertData['sgst'] = $data['h_sgst'];
		$insertData['total_tax'] = $data['h_total_tax'];
		$insertData['total_amount'] = $data['h_total_amount'];
		$insertData['user_id'] = "21";
		$insertData['customer_id'] = $data['id'];
		try {
			if($data['amount'] != 0 || $data['amount'] != "" || $data['amount'] != null){
				$insertDetails = DB::table('invoice')->insert($insertData);
			}
			if($data['amount2'] != 0 || $data['amount2'] != "" || $data['amount2'] != null) {
				$insertData['amount'] = $data['amount2'];
				$insertData['product'] = $data['product2'];
				$insertDetails = DB::table('invoice')->insert($insertData);
			}
			if ($data['amount3'] != 0 || $data['amount3'] != "" || $data['amount3'] != null) {
				$insertData['product'] = $data['product3'];
				$insertData['amount'] = $data['amount3'];
				$insertDetails = DB::table('invoice')->insert($insertData);
			}
			
			if(sizeof($insertDetails) > 0 ){
				$message['code']= 200 ;
				$message['status']= "Success" ;
				$message['message']= "Invoice Data Inserted !";
				$invoiceCount=Invoice::getCount();
				return response()->json($message);
			}else{
				$message['code']= 400 ;
				$message['status']= "Failed" ;
				$message['message']= "Invoice Data Not Inserted !";
				return response()->json($message);
			}
				
		
		} catch (Exception $e) {
				$message['code']= 401 ;
				$message['status']= "Exception Caought" ;
				$message['message']= "There was an ERROR !";
				return response()->json($message);
		}
		
		

    }
    public static function getInvoice(){

    	$result = DB::table('invoice')->where('status','=',1)->orderBy('id','desc')->groupBy('invoice')->get();
    	return $result;
    
    }

     public static function getInvoiceById($id){

    	$result = DB::table('invoice')->where('status','=',1)->where('invoice','=',$id)->get();
    	return $result;
    
    }

    public static function getCompanyDetails($query){
    	
    	$result = DB::table('company')->where('status','=',1)
    	->where('id','=',$query)
    	->get();
    	return $result;
    
    }
    public static function getCount()
    {
        $count = DB::table('invoice_count')->select('count')->get();
       	$invoiceCount['count'] = $count[0]->count;
       	$invoiceCount['count']++;
       	$update=DB::table('invoice_count')->where('id','=',1)->update($invoiceCount);
    }

    public static function editInvoice($data){

    	$result = DB::table('invoice')->where('id','=',$data['id'])->update($data);
    	return $result;
    
    }
}
