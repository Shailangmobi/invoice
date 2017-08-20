<?php

namespace App\Http\Controllers\Api\V1;
use Illuminate\Http\Request;
use App\Http\Requests;
use Dingo\Api\Routing\Helpers;
use App\Http\Controllers\Controller;
use League\Csv\Reader;
use File;
use Mail;
use App\Invoice;
use Session;
use View;
use DB;
use PDF;

class UserController extends Controller
{
    //

    public function login(Request $request){

        $input = $request->all();

        $insert = Invoice::login($input);
        return $insert;

    }

    public function insertInvoice(Request $request){

    	$input = $request->all();

    	$insert = Invoice::insertInvoiceData($input);
    	return $insert;

    }

    public function viewInvoice(){

    	$result = Invoice::getInvoice();
    		return \View('viewInvoice')->with('data',$result);

    }

    public function viewCustomer(){

        $result = Invoice::viewCustomer();
            return \View('viewCustomer')->with('data',$result);

    }
    public function edit($id){

        $result = Invoice::getInvoiceById($id);
            return \View('editInvoice')->with('data',$result);

    }

    public function editInvoice(Request $request){
        $input = $request->all();
        $result = Invoice::editInvoice($input);
            if(sizeof($result) > 0 ){
            $message['code']=200;
            $message['message']="Edit Success";
            $message['data']=$result;
        }else{
            $message['code']=400;
            $message['message']="Edit Failed";
            $message['data']=$result;
        }
        return $message;
           

    }

    public function getCompanyDetails($request){
       
        $result = Invoice::getCompanyDetails($request);

        if(sizeof($result) > 0 ){
            $message['code']=200;
            $message['message']="Data Found";
            $message['data']=$result;
        }else{
            $message['code']=400;
            $message['message']="Data not Found";
            $message['data']=$result;
        }
        return $message;
           
    }

    public function addCustomer(Request $request){

       $input = $request->all();
       $insert = Invoice::insertCustomer($input);
       return  $insert;

    }

    public function addProfile(Request $request){

       $input = $request->all();
       $insert = Invoice::addProfile($input);
       return  $insert;

    }

    public function editCustomer(Request $request){

       $input = $request->all();
      
       $insert = Invoice::editCustomer($input);
       return  $insert;

    }

    public function getCustomerById($id){

       

       $insert = Invoice::getCustomerById($id);
      if(sizeof($insert) > 0){
        $message['code'] = 200;
        $message['status'] ="Success";
        $message['message'] = "Data Found";
        $message['data'] = $insert;

      }else{
        $message['code'] = 200;
        $message['status'] ="Success";
        $message['message'] = "Data Found";
        $message['data'] = $insert;
      }
      return response()->json($message);

    }

    public function pdfview(Request $request,$id)
    {
       
        $items = DB::table("invoice")->where('invoice','=',$id)->get();
        $data = DB::table("company_master")->where('status','=',1)->get();
        view()->share('invoices',$items);
        view()->share('data',$data);
        $pdf = PDF::loadView('pdf.pdfView');

        
        if($request->has('download')){
            $pdf = PDF::loadView('pdf.pdfView');
            return $pdf->download('pdfView.pdf');
        }
        return $pdf->stream('pdfView.pdf');
        return view('pdf.pdfView');
    }
}
