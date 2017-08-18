<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;

class InvoicController extends Controller
{
    //
    protected function getCount()
    {
        $count = DB::table('invoice_count')->select('count')->get();
        $company = DB::table('company')->select('company_name','id')->get();
        return View('invoice')->with('data',$count)->with('company',$company);
    }

   
}
