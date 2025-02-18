<?php

namespace App\Http\Controllers;

use App\Models\Lister;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ListerProductController extends Controller
{
    public function addProduct(Request $request)
    {
        $listsId = $request->input('list_id');
        $productId = $request->input('product');
        $product = Product::find($productId);

        if (!$listsId || !$product) {
            return Redirect::back()->with(['error' => 'Lista ou produto não encontrado']);
        }

        foreach ($listsId as $listId) {
            // Aqui você adiciona o produto à lista correspondente
            $list = Lister::find($listId);
            if ($list) {
                $list->products()->attach($product->id);
            }
        }
        return Redirect::back()->with(['message' => 'Produto adicionado à lista "' . $list->title . '" com sucesso']);
    }

    public function lowerPrice(Request $request)
    {
        //recebe o id da lista
        $listId = $request->input('listId');
        $list = Lister::find($listId);

        $lowerTotalPriceStore = DB::table('product_store')
            ->join('products', 'product_store.product_id', '=', 'products.id')
            ->join('lister_product', 'products.id', '=', 'lister_product.product_id')
            ->where('lister_product.lister_id', $listId)
            ->select(
                'product_store.store_id',
                DB::raw('SUM(product_store.product_price) as total_price'),
                DB::raw('COUNT(product_store.product_id) as total_quantity')
            )
            ->groupBy('product_store.store_id')
            ->orderBy('total_price', 'asc')
            ->first();
        // var_dump($lowerTotalPriceStore);
        $lowerStore = Store::find($lowerTotalPriceStore->store_id);
        $storeName = $lowerStore->store_name;
        $storeId = $lowerTotalPriceStore->store_id;
        $total_price = $lowerTotalPriceStore->total_price;

        $list->total = $total_price;
        $list->store_name = $storeName;
        $list->save();

        // session(['total_price' => $total_price, 'storeName' => $storeName, 'storeId' => $storeId]);

        return redirect('/');
    }
}
