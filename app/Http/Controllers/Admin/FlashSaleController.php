<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FlashSale;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;

class FlashSaleController extends Controller
{
    public function index()
    {
        $flash_sales = FlashSale::all();

        confirmDelete('Hapus Data!', 'Apakah anda yakin ingin menghapus data ini?');

        return view('pages.admin.flashsale.index', compact('flash_sales'));
    }

    public function create()
    {
        return view('pages.admin.flashsale.create');
    }

    public function send(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'diskon_price' => 'numeric',
            'original_price' => 'numeric',
            'category' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:png,jpeg,jpg',
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal!', 'Pastikan semua terisi dengan benar!');
            return redirect()->back();
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move('images/', $imageName);
        }

        $flash_sales = FlashSale::create([
            'name' => $request->name,
            'diskon_price' => $request->diskon_price,
            'original_price' => $request->original_price,
            'category' => $request->category,
            'description' => $request->description,
            'image' => $imageName,
        ]);

        if ($flash_sales) {
            Alert::success('Berhasil!', 'Flash Sale berhasil ditambahkan!');
            return redirect()->route('admin.flash_sale');
        } else {
            Alert::error('Gagal!', 'Flash Sale gagal ditambahkan!');
            return redirect()->back();
        }
    }

    public function detail($id)
    {
        $flash_sales = FlashSale::findOrFail($id);

        return view('pages.admin.flashsale.detail', compact('flash_sales'));
    }

    public function edit($id)
    {
        $flash_sales = FlashSale::findOrFail($id);

        return view('pages.admin.flashsale.edit', compact('flash_sales'));
    }

    public function update(Request $request, $id)
    {
        $validator =Validator::make($request->all(), [
            'name' => 'required',
            'diskon_price' => 'numeric',
            'original_price' => 'numeric',
            'category' => 'required',
            'description' => 'required',
            'image' => 'nullable|mimes:png,jpeg,jpg',
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal!', 'Pastikan semua terisi dengan benar!');
            return redirect()->back();
        }

        $flash_sales = FlashSale::findOrFail($id);

        if ($request->hasFile('image')) {
            $oldPath = public_path('images/'. $flash_sales->image);
            if (File::exists($oldPath)) {
                File::delete($oldPath);
            }

            $image =$request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move('images/', $imageName);
        } else {
            $imageName = $flash_sales->image;    
        }

        $flash_sales->update([
            'name' => $request->name,
            'diskon_price' => $request->diskon_price,
            'original_price' => $request->original_price,
            'category' => $request->category,
            'description' => $request->description,
            'image' => $imageName,
        ]);

        if ($flash_sales) {
            Alert::success('Berhasil!', 'Flash sale berhasil diperbarui!');
            return redirect()->route('admin.flash_sale');
        } else {
            Alert::error('Gagal!', 'Flash sale gagal diperbarui!');
            return redirect()->back();
        }
    }
    public function delete($id)
    {
        $flash_sales = FlashSale::findOrFail($id);

        $oldPath = public_path('images/' . $flash_sales->image);
        if (File::exists($oldPath)) {
            File::delete($oldPath);
        }

        $flash_sales->delete();

        if ($flash_sales) {
            Alert::success('Berhasil!', 'Flash sale berhasil dihapus!');
            return redirect()->back();
        } else {
            Alert::error('Gagal!', 'Flash sale gagal dihapus!');
            return redirect()->back();
        }
        
    }
}