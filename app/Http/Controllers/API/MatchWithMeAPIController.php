<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\Wishlist;
use App\Models\Biodata;
// use App\Wishlist;
use Illuminate\Support\Facades\Auth;

class MatchWithMeAPIController extends AppBaseController
{
    public function index(){
    	try{
    		$user = Biodata::where('user_id', auth()->id())->first();
    		$postRequest = json_encode(['hc' => $user->hc]);
	    	$url = getenv('APP_URL_ML')."v1/fos";
			$cURLConnection = curl_init($url);
			curl_setopt($cURLConnection, CURLOPT_POSTFIELDS, $postRequest);
			curl_setopt($cURLConnection, CURLOPT_HTTPHEADER, array(
			    'Accept: application/json',
			    'Content-Type: application/json'
			));
			curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);

			$apiResponse = curl_exec($cURLConnection);
			curl_close($cURLConnection);
			
			$jsonArrayResponse = json_decode($apiResponse, true);

			if($jsonArrayResponse['status'] == 200){

				$temp = array_slice($jsonArrayResponse['res']['majors'], 0, 10);		

				$tempInsert = [];

				foreach ($temp as $row) {
					array_push($tempInsert, [
							'user_id' => auth()->id(), 
							'entity_id' => $row['major_id'], 
							'entity_type' => 'majors',
							'created_at' => date('Y-m-d H:i:s'),
							'updated_at' => date('Y-m-d H:i:s'),
						]);
				}

				foreach ($tempInsert as $row) {
					$check = Wishlist::query('user_id', $row['user_id'])->where('entity_id', $row['entity_id'])->where('entity_type', $row['entity_type'])->first();
					if(empty($check)){
						Wishlist::create($row);
					} 
				}			


				$dataReturn = $temp;

				return response()->json([
					'data' => $dataReturn,
					'message' => $jsonArrayResponse['msg'],
					'success' => true
				]);
			}else{
				return response()->json([
					// 'data' => $jsonArrayResponse['res'],
					'success' => false,
					'message' => $jsonArrayResponse['msg']
				]);
			}
    	}catch(\Exception $err){
			return response()->json([
				// 'data' => $jsonArrayResponse['res'],
				'success' => false,
				'message' => $err->getMessage()
			]);
    	}    		
    }

		public function getcip($hc) {
			try {
				$postRequest = json_encode(['hc' => $hc]);

				$url = getenv('APP_URL_ML')."v1/cip";
				$cURLConnection = curl_init($url);
				curl_setopt($cURLConnection, CURLOPT_POSTFIELDS, $postRequest);
				curl_setopt($cURLConnection, CURLOPT_HTTPHEADER, array(
						'Accept: application/json',
						'Content-Type: application/json'
				));
				curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);

				$apiResponse = curl_exec($cURLConnection);
				curl_close($cURLConnection);
				
				$jsonArrayResponse = json_decode($apiResponse, true);

				if ($jsonArrayResponse['status'] == 200) {
					// return mactchedFos
					$dataReturn = $jsonArrayResponse['res']['matchedFos'];

					return response()->json([
						'data' => $dataReturn,
						'message' => $jsonArrayResponse['msg'],
						'success' => true
					]);

				} else {
					return response()->json([
						// 'data' => $jsonArrayResponse['res'],
						'success' => false,
						'message' => $jsonArrayResponse['msg']
					]);
				}

			} catch (\Exception $err) {
				return response()->json([
					// 'data' => $jsonArrayResponse['res'],
					'success' => false,
					'message' => $err->getMessage()
				]);
			}
		}

		public function index_v2(Request $request){
    	try{
				
    		$postRequest = json_encode([
					'cip' => $request->input('cip'),
					'country_id' => $request->has('country_id') ? $request->input('country_id') : [],
					'level'=> $request->has('level') ? $request->input('level') : []
				]);

	    	$url = getenv('APP_URL_ML')."v2/fos";
				$cURLConnection = curl_init($url);
				curl_setopt($cURLConnection, CURLOPT_POSTFIELDS, $postRequest);
				curl_setopt($cURLConnection, CURLOPT_HTTPHEADER, array(
						'Accept: application/json',
						'Content-Type: application/json'
				));
				curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);

				$apiResponse = curl_exec($cURLConnection);
				curl_close($cURLConnection);
				
				$jsonArrayResponse = json_decode($apiResponse, true);

				if($jsonArrayResponse['status'] == 200){


					$dataReturn = $jsonArrayResponse['res'];

					return response()->json([
						'data' => $dataReturn,
						'message' => $jsonArrayResponse['msg'],
						'success' => true
					]);
				}else{
					return response()->json([
						// 'data' => $jsonArrayResponse['res'],
						'success' => false,
						'message' => $jsonArrayResponse['msg']
					]);
				}
    	}catch(\Exception $err){
				return response()->json([
					// 'data' => $jsonArrayResponse['res'],
					'success' => false,
					'message' => $err->getMessage()
				]);
    	}    		
    }
}
