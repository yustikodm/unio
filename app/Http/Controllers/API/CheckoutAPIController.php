<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCartAPIRequest;
use App\Http\Requests\API\UpdateCartAPIRequest;
use App\Models\Cart;
use App\Models\Transaction;
use App\Models\PointLog;
use App\Models\Family;
use App\Models\Biodata;
use App\User;
use App\Repositories\CartRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\CartResource;
use Response;
use PDF;
use Illuminate\Support\Facades\DB;

/**
 * Class ArticleController
 * @package App\Http\Controllers\API
 */

class CheckoutAPIController extends AppBaseController
{  
  /**
   * Display a listing of the Article.
   * GET|HEAD /articles
   *
   * @return Response
   */
  public function index(Request $request)
  {   
    return $this->sendResponse([], 'retrieved successfully');
  }

  public function checkout(Request $request)
  {   
    DB::beginTransaction();
    
    try{              
      //Get User Data
      $user = User::query()->where('id', $request->input('user_id'))->with("roles")->first();

      //Get Parent Id
      $parent = NULL;
      if($user->roles[0]->name == "Student"){
        $family = Family::query()->where('parent_id', $request->input('user_id'))->first();
        if(empty($family)){
          $parent = $request->input('user_id');
        }else{
          $parent = $family->parent_id;
        }
      }else{
        $parent = $request->input('user_id');
      }      

      //query item cart
      $data = Cart::query()->where('user_id', $request->input('user_id'))->whereIn('id', $request->input('items'))->get();      

      //check validation item
      if(count($data) == 0){
        throw new \Exception("items is no available");      
      }
      
      //totalPrice
      $totalPrice = 0;

      //totalQty
      $totalQty = 0;

      //poinUser
      $userPoint = 99999999;

      //setTotal Qty and Price
      foreach ($data as $row) {
        $totalQty += $row->qty;
        $totalPrice += $row->total_price;
      }

      //Validation check user point and total price
      if($userPoint <= $totalPrice){
        throw new \Exception("Your points are insufficient");      
      }

      //add transaction to db
      $transaction = new Transaction();
      $transaction->user_id = $request->input('user_id');
      $transaction->code = "UNIO".mt_rand(1000,9999).mt_rand(10, 99)."SERVICE";
      $transaction->grand_total = $totalPrice;
      $transaction->status = "Active";
      if($transaction->save()){

        //add detail transaction
        foreach ($data as $row) {
          $input = [
            "transaction_id" => $transaction->id,
            "entity_id" => $row->entity_id,
            "entity_type" => $row->entity_type,
            "quantity" => $row->qty,
            "amount" => $row->price
          ];
          Transaction::insertDetails($input);
          Cart::find($row->id)->delete();
        }   

        //add log poin
        $logPoin = [
          "parent_id" => $parent,
          "transaction_id" => $transaction->id,
          "transaction_type" => "services",
          "point_before" => intval($userPoint),
          "point_after" => intval($userPoint) - intval($totalPrice),
        ];
        PointLog::insertLog($logPoin);             
        // $this->cetakInvoicePdf($transaction->id);
      }else{
        throw new \Exception("Can't save your transaction");
      }
    }catch(\Exception $err){
      DB::rollback();
      return Response::json(['message' => $err->getMessage(), "success" => false], 200);
    }      
    DB::commit();

    //return for invoice
    $ret = [
      "transaction_code" => $transaction->code,
      "transaction_date" => $transaction->created_at,
      "transaction_status" => $transaction->status,
      "total_price" => $totalPrice,
      "total_qty" => $totalQty,
      "current_point" => $userPoint,
      "items" => $data,
      "url" => "/print/invoice/".$transaction->id
    ];  

    return $this->sendResponse($ret, 'Your transaction successfully to save');        
  }

  public function cetakInvoicePdf($id)
  {
    $trx = Transaction::query()->where('code', $id)->first();
    $trx->user = Biodata::query()->where('user_id', $trx->user_id)->first();
    $trxdetail = DB::table('transaction_details')
                    ->join('vendor_services', 'vendor_services.id', '=', 'transaction_details.entity_id')
                    ->join('vendors', 'vendor_services.vendor_id', '=', 'vendors.id')
                    ->select('transaction_details.*', 'vendor_services.name as service_name', 'vendors.name as vendor_name')
                    ->where('transaction_id', $trx->id)
                    ->get();    
    $pdf_name = time() . ".pdf";
    $path = public_path('/invoice/pdf/' . $pdf_name);    
    $date = date("dMYH:i:s");
    $fileName = $date . '.' . 'pdf' ;
    $data["trx"] = $trx; 
    $data["detail"] = $trxdetail; 
    $pdf = PDF::loadview("invoice.pdf", $data);    
    $pdf->setOptions(['defaultPaperSize' => "A5"]);
    return $pdf->download($fileName);    
  }
}
