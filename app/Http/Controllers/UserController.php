<?php

namespace App\Http\Controllers;

use App\Consts\SkillType;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * 社員一覧を表示。
     */
    public function search()
    {
        $users = User::all();
        return view('employees.index', ['users' => $users]);
    }
}
