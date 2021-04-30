<?php

namespace App\Http\Controllers;

use App\DataTables\CartDataTable;
use Illuminate\Http\Request;
use App\Http\Requests\CreateCartRequest;
use App\Http\Requests\UpdateCartRequest;
use App\Repositories\CartRepository;
use Laracasts\Flash\Flash;
use App\Http\Controllers\AppBaseController;
use App\Repositories\TransactionRepository;

class CartController extends AppBaseController
{
    /** @var  CartRepository */
    private $cartRepository;

    /** @var  TransactionRepository */
    private $transactionRepository;

    public function __construct(CartRepository $cartRepo, TransactionRepository $transactionRepo)
    {
        $this->cartRepository = $cartRepo;

        $this->transactionRepository = $transactionRepo;
    }

    /**
     * Display a listing of the Cart.
     *
     * @param CartDataTable $cartDataTable
     * @return Response
     */
    // public function index(CartDataTable $cartDataTable)
    // {
    //     return $cartDataTable->render('carts.index');
    // }
    public function index(CartDataTable $cartDataTable)
    {
        return $cartDataTable->render('carts.index');
    }

    /**
     * Store a newly created Cart in storage.
     *
     * @param CreateCartRequest $request
     *
     * @return Response
     */
    public function store(CreateCartRequest $request)
    {
        $input = $request->only([
            'user_id',
            'entity_id',
            'entity_type',
            'qty',
        ]);

        $cart = $this->cartRepository->create($input);

        Flash::success('Cart saved successfully.');

        return redirect(route('carts.index'));
    }

    /**
     * Display the specified Cart.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $cart = $this->cartRepository->find($id);

        if (empty($cart)) {
            Flash::error('Cart not found');

            return redirect(route('carts.index'));
        }

        return view('carts.show')->with('cart', $cart);
    }

    /**
     * Update the specified Cart in storage.
     *
     * @param  int              $id
     * @param UpdateCartRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCartRequest $request)
    {
        $cart = $this->cartRepository->find($id);

        if (empty($cart)) {
            Flash::error('Cart not found');

            return redirect(route('carts.index'));
        }

        $input = $request->only([
            'user_id',
            'entity_id',
            'entity_type',
            'qty',
        ]);

        $cart = $this->cartRepository->update($input, $id);

        Flash::success('Cart updated successfully.');

        return redirect(route('carts.index'));
    }

    /**
     * Remove the specified Cart from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $cart = $this->cartRepository->find($id);

        if (empty($cart)) {
            Flash::error('Cart not found');

            return redirect(route('carts.index'));
        }

        $this->cartRepository->delete($id);

        Flash::success('Cart deleted successfully.');

        return redirect(route('carts.index'));
    }

    public function checkout()
    {
        $carts = $this->cartRepository->getByUserLogin();

        try {
            $grandtotal = 0;
            $transactions = $this->transactionRepository->create([
                'user_id' => auth()->id(),
                'code' => rand(100, 1000),
                'grand_total' => 0,
                'status' => 'pending',
            ]);

            foreach ($carts as $cart) {
                $this->transactionRepository->insertDetails([
                    'transaction_id' => $transactions->id,
                    'entity_id' => $cart->entity_id,
                    'entity_type' => $cart->entity_type,
                    'quantity' => $cart->qty,
                    'amount' => $cart->amount
                ]);
                
                $grandtotal += ($cart->qty * $cart->amount);
            }

            $transactions->update([
                'grand_total' => $grandtotal
            ]);

            // $cart->delete();
        } catch (\Exception $error) {
            return 'Error! ' . $error->getMessage().$error->getFile().$error->getLine();
        }

        echo 'sukses';
    }

    public function current(Request $request)
    {
        $carts = $this->cartRepository->getByUserLogin();

        return view('carts.data_carts', compact('carts'));
    }
}
