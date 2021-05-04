<?php

namespace App\Repositories;

use Xendit\Xendit;
use Carbon\Carbon;
use Xendit\Balance;
use Xendit\CardlessCredit;
use Xendit\Cards;
use Xendit\EWallets;
use Xendit\Invoice;
use Xendit\Retail;
use Xendit\VirtualAccounts;

/**
 * Class XenditRepository
 * @package App\Repositories
 * @version March 3, 2021, 3:00 pm WIB
 */

class XenditRepository
{  
  public function __construct()
  {
    Xendit::setApiKey('xnd_development_Ji3OOwWBTIKRzkPZIkFyPoTaU5beLRv6xCJ4guaQoyvIxmoOl22RaCnVp4wq8j9');
  }

  public function getBalance($param = 'CASH')
  {
    return Balance::getBalance($param);
  }

  public function getVirtualAccountList()
  {    
    return VirtualAccounts::getVABanks();
  }
  
  public function createTransaction($method, $input)
  {
    switch ($method) {
      case 'VAC':
        $trans = VirtualAccounts::create([
                    'external_id' => $input->code,
                    'bank_code' => $input->bank_code,
                    'name' => $input->fullname,
                    'expected_amount' => $input->amount,
                    'is_closed' => true,
                    'is_single_use' => true,
                    'expiration_date' => Carbon::now()->addDays(1)->toISOString(),
                    // 'virtual_account_number' => '245245234'
                ]);
        break;

      case 'CCR':
        $trans = Cards::create([
                    'token_id' => '5e2e8231d97c174c58bcf644',
                    'external_id' => 'card_' . time(),
                    'authentication_id' => '5e2e8658bae82e4d54d764c0',
                    'amount' => 100000,
                    'card_cvn' => '123',
                    'capture' => false,
                ]);
        break;

      case 'RTL':
        $trans = Retail::create([
                    'external_id' => 'TEST-123456789',
                    'retail_outlet_name' => 'ALFAMART',
                    'name' => 'JOHN DOE',
                    'expected_amount' => 25000
                ]);

      case 'EWT':
        $trans = EWallets::createEWalletCharge([
                    'reference_id' => $input->code,
                    'currency' => 'IDR',
                    'amount' => 50000,
                    'checkout_method' => 'ONE_TIME_PAYMENT',
                    'channel_code' => 'ID_OVO',
                    'channel_properties' => [
                        'success_redirect_url' => 'https://locahost:8000/topup-packages/1',
                    ],
                    'metadata' => [
                        'branch_code' => 'tree_branch'
                    ],
                    'mobile_number' => biodata($input['user_id'])->phone,
                ]);

      case 'CCL':
        $trans = CardlessCredit::create([
                    'cardless_credit_type' => 'KREDIVO',
                    'external_id' => 'test-cardless-credit-02',
                    'amount' => 800000,
                    'payment_type' => '3_months',
                    'items' => [
                        [
                            'id' => '123123',
                            'name' => 'Phone Case',
                            'price' => 200000,
                            'type' => 'Smartphone',
                            'url' => 'http=>//example.com/phone/phone_case',
                            'quantity' => 2
                        ],
                        [
                            'id' => '234567',
                            'name' => 'Bluetooth Headset',
                            'price' => 400000,
                            'type' => 'Audio',
                            'url' => 'http=>//example.com/phone/bluetooth_headset',
                            'quantity' => 1
                        ]
                    ],
                    'customer_details' => [
                        'first_name' => 'customer first name',
                        'last_name' => 'customer last name',
                        'email' => 'customer@yourwebsite.com',
                        'phone' => '081513114262'
                    ],
                    'shipping_address' => [
                        'first_name' => 'first name',
                        'last_name' => 'last name',
                        'address' => 'Jalan Teknologi No. 12',
                        'city' => 'Jakarta',
                        'postal_code' => '12345',
                        'phone' => '081513114262',
                        'country_code' => 'IDN'
                    ],
                    'redirect_url' => 'https://example.com',
                    'callback_url' => 'http://example.com/callback-cardless-credit'
                ]);
        break;

      case 'INV':
        $trans = Invoice::create([
                    'external_id' => 'TEST-123456789',
                    'retail_outlet_name' => 'ALFAMART',
                    'name' => 'JOHN DOE',
                    'expected_amount' => 25000
                ]);

      default:
        $trans = [];
        break;
    }

    return $trans;
  }
  
  public function retrieveTransaction(String $transMethod, String $transId)
  {
    switch ($transMethod) {
      case 'VAC':
        $trans = VirtualAccounts::retrieve($transId);
        break;

      case 'CCR':
        $trans = Cards::retrieve($transId);
        break;
      
      case 'RTL':
        $trans = Retail::retrieve($transId);
        break;
      
      case 'EWT':
        $trans = EWallets::getEWalletChargeStatus($transId);
        break;
      
      case 'INV':
        $trans = Invoice::retrieve($transId);
        break;
        
      default:
        $trans = [];
        break;
    }

    return $trans;
  }
}
