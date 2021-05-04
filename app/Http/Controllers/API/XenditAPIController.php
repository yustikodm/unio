<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use App\Repositories\XenditRepository;
use Illuminate\Http\Request;

class XenditAPIController extends AppBaseController
{
    /** @var  XenditRepository */
    private $xenditRepository;

    public function __construct(XenditRepository $xenditRepo)
    {
        $this->xenditRepository = $xenditRepo;
    }
    
    public function getBalance()
    {
        $listVA = $this->xenditRepository->getBalance();
    
        return $this->sendResponse($listVA, 'Balance retrieved successfully');
        
    }

    public function getListVA()
    {
        $listVA = $this->xenditRepository->getVirtualAccountList();

        return $this->sendResponse($listVA, 'Virtual Account list retrieved successfully');
    }
    
    public function getTransaction($method, $id)
    {
        $trans = $this->xenditRepository->retrieveTransaction($method, $id);

        if (empty($trans)) {
            return $this->sendError('Transaction not found');
        }

        return $this->sendResponse($trans, 'Transaction retrieved successfully');
    }
}
