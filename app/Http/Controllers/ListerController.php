<?php

namespace App\Http\Controllers;

use App\Models\Lister;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return view('/user/create_list', compact('user'));
    }

    public function createList(Request $request)
    {
        $lister = new Lister();
        //Conta a quantidade de listas que o usuário possui e adiciona à variável.
        $quantityLists = Lister::where('user_id', $request->input('userId'))->count();

        $lister->user_id = $request->input('userId');
        //Se a lista não tiver título, será nomeada com 'Lista' seguido do número de listas que o usuário possui.
        $lister->title = $request->input('title') ?? "Lista " . $quantityLists + 1;
        $lister->scheduled_date = $request->input('scheduled_date') ?? date('Y-m-d');
        $lister->save();
        return redirect('/');
    }
}
