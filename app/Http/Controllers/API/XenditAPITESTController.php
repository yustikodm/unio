<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Xendit\Xendit;
use Response;
use Carbon\Carbon;
use App\Models\Payment;

class XenditAPITESTController extends AppBaseController
{
    private $token = "xnd_development_mt417RoNZoaUgSw295bI2d6gVKLE3fJmhkOtZh1RoGa04i9Nxs0eaxKbwOZsvLqF";

    public function getListVa(){
    	Xendit::setApiKey($this->token);

    	$getVABanks = \Xendit\VirtualAccounts::getVABanks();

    	return response()->json([
    		'data' => $getVABanks,
    	])->setStatusCode(200);
    }    

    public function createVa(Request $request){
    	Xendit::setApiKey($this->token);
        $ext_id = "VA".time();
	 	$params = [ 
	    	"external_id" => $ext_id,
	    	"bank_code" => $request->input('bank_id'),
	    	"name" => $request->input('name'),
            "expected_amount" => $request->input('price'),
            "is_closed" => true,
            "expiration_date" => Carbon::now()->addDays(1)->toISOString(),
            "is_single_use" => true,
            "virtual_account_number" => $request->input('virtual_account_number')
	  	];

        $insert = Payment::insert([
            "external_id" => $ext_id,
            "payment_channel" => "Virtual Account",
            "email" => $request->input('name'),
            "price" => $request->input('price')
        ]);

	  	$createVA = \Xendit\VirtualAccounts::create($params);
	  	
	  	return response()->json([
    		'data' => $createVA,
    	])->setStatusCode(200);
    }

    public function callbackVa(Request $request){
        $ext_id = $request->input('external_id');
        $status = $request->input('status');
        $payment = Payment::where('external_id', $ext_id)->exists();
        if($payment){
            if($status == "ACTIVE"){
                $update = Payment::where('external_id', $ext_id)->update([
                    "status" => 1
                ]);
                if($update > 0){
                    return 'OK';
                }
                return false;
            }   
        }else{
            return response()->json([
                'message' => 'Data Not Found'
            ]);
        }
    }
}
