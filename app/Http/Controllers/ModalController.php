<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ModalController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'skills.*.level' => 'float',
            'skills.*.id' => 'int',
        ]);

        User::find(Auth::id())
        ->skills()
        ->attach(
            collect($request->skills)
            ->reduce(function($attach_skills, $specific_skills) {
                foreach($specific_skills as $skill) {
                    if (!array_key_exists('checked', $skill)) continue;
                    $attach_skills[$skill['id']] = ['level' => $skill['level'] ? $skill['level'] : 0.50, 'is_practice' => true];
                }

                return $attach_skills;
            }, [])
        );

        return redirect()->route('employees.show', ['id' => Auth::id()]);
    }
}
