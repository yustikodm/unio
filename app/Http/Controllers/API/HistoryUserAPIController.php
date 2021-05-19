<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Review;
use Illuminate\Support\Facades\DB;

class HistoryUserAPIController extends AppBaseController
{
    public function index(Request $request){

        if ($request->user_id) {

        }else{
            return $this->sendResponse([], 'Wishlists retrieved successfully');
        }

        $filter = '';
        if ($request->entity_type) {
            $filter = "AND entity_type = '$request->entity_type'";
        }

    	$user_id = $request->input('user_id');
    	$name = $request->input('name');

    	$return['order_list'] = Transaction::where('user_id', $user_id)->get();
    	foreach ($return['order_list'] as &$row) {
    		$id = $row->id;
    		$row->details = DB::select("SELECT * FROM transaction_details WHERE transaction_id = $id");
    	}
    	$return['review'] = DB::select(
            DB::raw("SELECT * FROM (
                    SELECT w.*, j.name, j.description, j.picture, i.id detail_id, i.name detail_name FROM review w 
                        JOIN vendor_services j ON j.id = w.entity_id 
                        JOIN vendors i ON i.id = j.vendor_id 
                        WHERE w.entity_name = 'services' AND w.user_id = $user_id AND j.name LIKE '%$name%'
                    UNION ALL 
                    SELECT w.*, j.title name, j.description, j.picture, '' detail_id, '' detail_name FROM review w 
                        JOIN articles j ON j.id = w.entity_id
                        WHERE w.entity_name = 'articles' AND w.user_id = $user_id AND j.title LIKE '%$name%'
                    UNION ALL 
                    SELECT w.*, j.name, j.description, i.logo_src picture, i.id detail_id, i.name detail_name FROM review w 
                        JOIN university_majors j ON j.id = w.entity_id 
                        JOIN universities i ON i.id = j.university_id 
                        WHERE w.entity_name = 'majors' AND w.user_id = $user_id AND j.name LIKE '%$name%'
                    UNION ALL 
                    SELECT w.*, j.name, j.description, j.picture, '' detail_id, '' detail_name FROM review w 
                        JOIN place_to_live j ON j.id = w.entity_id 
                        WHERE w.entity_name = 'place_lives' AND w.user_id = $user_id AND j.name LIKE '%$name%'
                    ) t $filter
            ")
        );

    	return response()->json([
    		'success' => true,
    		'message' => 'Success',
    		'data' => $return
    	]);
    }
}
