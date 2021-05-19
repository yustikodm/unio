<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\University;
use App\Models\Vendor;
use App\Models\PlaceToLive;
use App\Models\Article;
use App\Models\Review;

class FrontendHomeAPIController extends AppBaseController
{
    public function index(){
    	$return['university'] = University::query()->limit(6)->get();
    	$return['vendor'] = Vendor::query()->limit(6)->get();
    	$return['placetolive'] = PlaceToLive::query()->limit(6)->get();
    	$return['article'] = Article::query()->limit(6)->get();
    	$return['review'] = Review::query()
    					->join('users', 'users.id', '=', 'review.user_id')
    					->join('biodata', 'biodata.user_id', '=', 'review.user_id')
    					->join('university_majors', 'university_majors.id', '=', 'review.entity_id')
    					->where('review.entity_name', 'majors')
    					->limit(6)
    					->get();

    	return response()->json([
    		'success' => true,
    		'message' => 'success',
    		'data' => $return
    	]);
    }
}
