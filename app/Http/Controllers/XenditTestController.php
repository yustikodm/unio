<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Xendit\Xendit;


class XenditController extends Controller
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
	    	"bank_code" => "BCA",
	    	"name" => "Dani Cahya Suryanda"
	  	];

	  	$createVA = \Xendit\VirtualAccounts::create($params);

	  	return response()->json([
    		'data' => $createVA,
    	])->setStatusCode(200);
    }
}
