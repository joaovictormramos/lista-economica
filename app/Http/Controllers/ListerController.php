<?php

namespace App\Http\Controllers;

use App\Models\Lister;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ListerController extends Controller
{
    public function getListerUser($id)
    {
        $user = User::find($id);
        $lists = $user->lists()->orderBy('scheduled_date')->get();
        //var_dump($lists);
        return view('/user/user_lists', compact('lists', 'user'));
    }

    public function formCreateList()
    {
        $user = Auth::user();
        if ($user) {
            $userId = $user->id;
        } else {
            return redirect()->route('login');
        }
        $listsQuantity = Lister::where('user_id', $user->id)->count() + 1;
        $hoje = date('Y-m-d');
        return view('/user/create_list', compact('user', 'listsQuantity', 'hoje'));
    }

    public function createList(Request $request)
    {
        $lister = new Lister();
        //Conta a quantidade de listas que o usuário possui e adiciona à variável.
        $listsQuantity = Lister::where('user_id', $request->input('userId'))->count();

        $lister->user_id = $request->input('userId');
        //Se a lista não tiver título, será nomeada com 'Lista' seguido do número de listas que o usuário possui.
        $lister->title = $request->input('title') ?? "Lista " . $listsQuantity + 1;
        $lister->scheduled_date = $request->input('scheduled_date') ?? date('Y-m-d');
        $lister->save();
        return redirect('/');
    }

    public function details($id)
    {
        $list = Lister::with('products.package', 'products.brand', 'users')->find($id); // Filtra pelo ID da lista
        $userId = $list->user_id;
        $products = $list->products;
        return view('/user/details_list', compact('list', 'userId'));
    }

    public function delete($id)
    {
	$list = Lister::with('users')->findOrFail($id);
	$userId = $list->user_id;
	$list->delete();
	return redirect()->route('user.lists', $userId);
    }

}
