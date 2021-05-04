<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Xendit\Xendit;
use Response;
use Carbon\Carbon;

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

	 	$params = [ 
	    	"external_id" => \uniqid(),
	    	"bank_code" => $request->input('bank_id'),
	    	"name" => $request->input('name'),
            "expected_amount" => $request->input('price'),
            "is_closed" => true,
            "expiration_date" => Carbon::now()->addDays(1)->toISOString(),
            "is_single_use" => true,
	  	];

	  	$createVA = \Xendit\VirtualAccounts::create($params);
	  	
	  	return response()->json([
    		'data' => $createVA,
    	])->setStatusCode(200);
    }
}
