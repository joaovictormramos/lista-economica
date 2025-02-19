<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;

class ProductStoreController extends Controller
{
    //Mostra as opções de gerenciamento do estabelecimento.
    public function manageStoreProducts($id)
    {
        $store = Store::find($id);
        //$formattedStoreName = formatStoreNameForUrl($storeName);
        return view('/store_products/store_options', compact('store' /*, 'storeName'*/));
    }

    //Recebe o ID do estabelecimento e retorna seus produtos.
    public function getProductsStore($id)
    {
        $store = Store::with(['products', 'products.brand', 'products.section', 'products.package'])->find($id);
        $products = $store->products;
        return compact('store', 'products');
    }

    public function indexStore($id)
    {
        $data = $this->getProductsStore($id);
        //dd($productsStore);
        return view('/store_products/show_products_store', $data);
    }

    //Lista todos os produtos registrados no estabelecimento.
    public function listSetStoreProducts($id)
    {
        $storeProducts = $this->getProductsStore($id);
        //var_dump($storeProducts);
        return view('/store_products/store_products_set', compact('storeProducts', 'id'));
    }

    //Lista todos os produtos que não estão vinculados ao estabelecimento.
    public function listAddStoreProduct($id)
    {
        $productsToRegisterAtStore = Product::whereDoesntHave('stores', function ($query) use ($id) {
            $query->where('store_id', $id);
        })->get();
        $store = Store::find($id);
        return view('/store_products/store_products_to_register', compact('productsToRegisterAtStore', 'store'));
    }

    //Recebe os produtos selecionados e adiciona ao estabelecimento.
    public function addStoreProduct(Request $request)
    {
        $products = $request->input('addProducts', []);
        $storeId = $request->input('store_id');

        // Encontra a loja pelo ID
        $store = Store::find($storeId);

        if ($store) {
            foreach ($products as $product => $dataProduct) {
                if (isset($dataProduct['selected'])) {
                    // Prepara os dados a serem inseridos na tabela pivô (store_product)
                    $pivotData = [
                        'product_price' => $dataProduct['price'] ?? null, // Preço, se definido
                    ];
                    // Associa o produto à loja, incluindo os dados adicionais da tabela pivô
                    $store->products()->attach($dataProduct['selected'], $pivotData);
                }
            }
        }
        return redirect('/admin/gerenciar-estoque/' . $storeId);
    }

    //Mostra os detalhes do produto selecionado para atualizar preço
    public function formSetSetoreProduct($storeId, $productId)
    {
        $store = Store::find($storeId);
        $product = $store->products()
            ->with(['brand', 'package', 'section'])
            ->where('products.id', $productId)
            ->first();
        return view('/store_products/form_store_set_product', compact('product'));
    }

    //Recebe os dados para atualizar o produto.
    public function setSetoreProduct(Request $request)
    {
        $id = $request->input('storeProductId');
        $price = $request->input('price');
        $storeId = $request->input('storeId');
        $store = Store::find($storeId);
        $storeProduct = $store->products()->where('products.id', $id)->first();
        if ($storeProduct) {
            $storeProduct->pivot->product_price = $price;
            $storeProduct->pivot->save();
        }
        return redirect('/admin/editar-produto-estabelecimento/' . $storeId);
    }

    //Remove um produto de um estabelecimento.
    public function deleteProductStore($storeId, $productId)
    {
        $store = Store::find($storeId);
        if (!$store) {
            return redirect()->back()->with('error', 'Loja não encontrada.');
        }
        $store->products()->detach($productId);
        return redirect('/admin/editar-produto-estabelecimento/' . $storeId);
    }

    public function editPrice(Request $request)
    {
        return redirect()->return('');
    }
}
