<?php

namespace App\Http\Controllers;

use App\Repositories\XenditRepository;
use Illuminate\Http\Request;

class XenditController extends Controller
{
    private $xenditRepository;

    public function __construct(XenditRepository $xenditRepo)
    {
        $this->xenditRepository = $xenditRepo;
    }

    public function getBalance()
    {
        $balance = $this->xenditRepository->getBalance();
    }
}
