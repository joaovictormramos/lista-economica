<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ListerController;
use App\Http\Controllers\ListerProductController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductStoreController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\StoreController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('index');
//Route::get('/home', [HomeController::class, 'index'])->name('index');
Route::get('/estabelecimentos', [StoreController::class, 'getStores'])->name('stores');
Route::get('/secoes', [SectionController::class, 'getSections'])->name('sections');
Route::get('/marcas', [BrandController::class, 'getBrands'])->name('brands');
Route::get('/produtos', [ProductController::class, 'getProducts'])->name('products');
Route::get('/estabelecimento/{id}', [ProductStoreController::class, 'indexStore'])->name('store.products');
Route::get('/results', [HomeController::class, 'search'])->name('search');

//Admin routes
Route::prefix('admin')->middleware(['role:superadmin,admin'])->group(function () {
    Route::get('/', [AdminController::class, 'management'])->name('admin.management');
   // Route::get('/gerenciar', [AdminController::class, 'management'])->name('admin.management');

    //Stores routes
    Route::get('/estabelecimentos', [StoreController::class, 'getStores'])->name('admin.stores');

    Route::get('/cadastrar-estabelecimento', [StoreController::class, 'formRegisterStore']);

    Route::post('/cadastrar-estabelecimento', [StoreController::class, 'registerStore']);

    Route::get('/editar-estabelecimento/{id}', [StoreController::class, 'formUpdateStore']);

    Route::get('/excluir-estabelecimento/{id}', [StoreController::class, 'deleteStore']);

    //ProductStore routes
    Route::get('/gerenciar-estoque/{id}', [ProductStoreController::class, 'manageStoreProducts'])->name('admin.manage.store');

    Route::get('/editar-produto-estabelecimento/{id}', [ProductStoreController::class, 'listSetStoreProducts'])->name('admin.formeditproduct');

    Route::get('/adicionar-produto/{id}', [ProductStoreController::class, 'listAddStoreProduct'])->name('admin.formaddproduct');

    Route::post('/adicionar-produto', [ProductStoreController::class, 'addStoreProduct']);

    Route::get('/editar-produto-estabelecimento/{storeId}/{productId}', [ProductStoreController::class, 'formSetSetoreProduct']);

    Route::post('/editar-produto-estabelecimento', [ProductStoreController::class, 'setSetoreProduct'])->name('admin.edit.store.product');

    Route::get('/remover-produto-estoque/{storeId}/{storeProductId}', [ProductStoreController::class, 'deleteProductStore']);

    //Sections routes
    Route::get('/secoes', [SectionController::class, 'getSections']);

    Route::get('/cadastrar-secao', [SectionController::class, 'formRegisterSection']);

    Route::post('/cadastrar-secao', [SectionController::class, 'registerSection']);

    Route::get('/editar-secao/{id}', [SectionController::class, 'formUpdateSection']);

    Route::get('/excluir-secao/{id}', [SectionController::class, 'deleteSection']);

    //Brands routes
    Route::get('/marcas', [BrandController::class, 'getBrands'])->name('admin.brands');

    Route::get('/cadastrar-marca', [BrandController::class, 'formRegisterBrand'])->name('admin.registerBrand');

    Route::post('/cadastrar-marca', [BrandController::class, 'registerBrand']);

    Route::get('/editar-marca/{id}', [BrandController::class, 'formUpdateBrand']);

    Route::get('/excluir-marca/{id}', [BrandController::class, 'deleteBrand']);

    //Products routes
    Route::get('/produtos', [ProductController::class, 'getProducts'])->name('products.index');

    Route::get('/cadastrar-produto', [ProductController::class, 'formRegisterProduct'])->name('admin.registerproduct');

    Route::post('/cadastrar-produto', [ProductController::class, 'registerProduct']);

    Route::get('/editar-produto/{id}', [ProductController::class, 'formUpdateProduct'])->name('admin.editproduct');

    Route::get('/excluir-produto/{id}', [ProductController::class, 'deleteProduct'])->name('admin.deleteproduct');

    //Package routes
    Route::get('/embalagens', [PackageController::class, 'getPackages']);

    Route::get('/cadastrar-embalagem', [PackageController::class, 'formRegisterPackage']);

    Route::post('/cadastrar-embalagem', [PackageController::class, 'registerPackage']);

    Route::get('/editar-embalagem/{id}', [PackageController::class, 'formUpdatePackage']);

    Route::get('/excluir-embalagem/{id}', [PackageController::class, 'deletePackage']);
});

Route::prefix('user')->middleware(['role:user'])->group(function () {});

Route::get('/auth/{provider}/redirect', function (string $provider) {
    return Socialite::driver($provider)->redirect();
})->name('auth');

Route::get('/auth/{provider}/callback', function (string $provider) {
    try {
    	$provideruser = Socialite::driver($provider)->user();
    	$user = Socialite::driver($provider)->user();
    	$user = User::updateOrCreate([
        	'email' => $provideruser->email,
    	], [
        	'provider_id' => $provideruser->id,
        	'name' => $provideruser->name,
        	'provider_avatar' => $provideruser->provider_avatar,
        	'provider_name' => $provider,
    	]);
    	Auth::login($user);
    	return redirect()->route('/');
    } catch (\Exception $e) {
	return redirect()->route('login')->with('error', 'O login foi cancelado ou houve um erro.');
    }
});

//Route::get()
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/minhas-listas/{id}', [ListerController::class, 'getListerUser'])->name('user.lists');
    Route::get('/nova-lista', [ListerController::class, 'formCreateList'])->name('user.formCreatelist');
    Route::post('/nova-lista', [ListerController::class, 'createList'])->name('user.createlist');
    Route::get('/perfil', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/adicionar-produto', [ListerProductController::class, 'addProduct'])->name('user.addProduct');
    Route::post('/buscar-menor-preco', [ListerProductController::class, 'lowerPrice'])->name('user.lowerPrice');
    Route::get('/detalhes-lista/{id}', [ListerController::class, 'details'])->name('list.details');
    Route::delete('/apagar-lista/{id}', [ListerController::class, 'delete'])->name('list.delete');
});

require __DIR__ . '/auth.php';
