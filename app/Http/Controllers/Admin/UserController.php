<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        return view('admin.users.index', [
            'users' => User::query()->paginate(config('app.count_per_page'))
        ]);
    }

    public function toggleAdmin(User $user){
        if ($user->id != Auth::id()) {
            $user->is_admin = !$user->is_admin;
            $user->save();
            return redirect()->route('admin.users.index')->withSuccess(
                ($user->is_admin)
                ? "Пользователь {$user->name} успешно назначен админом"
                : "Пользователь {$user->name} больше не админ");
        } else {
            return redirect()->route('admin.users.index')->withError('Нельзя снять админа с себя');
        }
    }
}
