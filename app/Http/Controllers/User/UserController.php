<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\FlashSale;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;


class UserController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $flash_sales = FlashSale::all();

        return view('pages.user.index', compact('products','flash_sales'));
    }

    public function detail_product($id)
    {
        $product = Product::findOrFail($id);

        return view('pages.user.detail', compact('product'));
    }
    public function detail_flash($id)
    {
        $flash_sale = Flashsale::findOrFail($id);

        return view('pages.user.detailFlash', compact('flash_sale'));
    }

    public function purchase($productId, $userId)
    {
        $product = Product::findOrFail($productId);
        $user = User::findOrfail($userId);

        if ($user->point > $product->price) {
            $totalPoints = $user->point - $product->price;

            $user->update([
                'point'=> $totalPoints,
            ]);

            Alert::success('Berhasil!', 'Produk berhasil dibeli!');
            return redirect()->back();
        } else {
            Alert::error('Gagal!', 'Point anda tidak cukup!');
            return redirect()->back();
        }
    }
    public function purchaseSale($flash_saleId, $userId)
    {
        $flash_sale = FlashSale::findOrFail($flash_saleId);
        $user = User::findOrfail($userId);

        if ($user->point > $flash_sale->diskon_price) {
            $totalPoints = $user->point - $flash_sale->diskon_price;

            $user->update([
                'point'=> $totalPoints,
            ]);

            Alert::success('Berhasil!', ' Flash Sale berhasil dibeli!');
            return redirect()->back();
        } else {
            Alert::error('Gagal!', 'Point anda tidak cukup!');
            return redirect()->back();
        }
    }
}
