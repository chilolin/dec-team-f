<?php

namespace App\Http\Controllers;


use App\Models\Skill;
use App\Models\User;
use App\Models\Matter;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * ダッシュボードを表示。
     */
    public function index()
    {
        $process = Skill::specific_skills('process');
        $language = Skill::specific_skills('language');
        $design_pattern = Skill::specific_skills('design_pattern');
        $engineer_type = Skill::specific_skills('engineer_type');
        $position = Skill::specific_skills('position');
        $proceeding = Skill::specific_skills('proceeding');
        $framework = Skill::specific_skills('framework');
        $infrastructure = Skill::specific_skills('infrastructure');
        $database = Skill::specific_skills('database');

        $id = Auth::id();
        $matter = User::find($id) -> matters;
        for ($i=0; $i < count($matter); $i++){ 
            $matter[$i] = $matter[$i] -> matter_skills;
        }
        
        return view('dashboard', [
            'process' => $process,
            'language' => $language,
            'design_pattern' => $design_pattern, 
            'engineer_type' => $engineer_type, 
            'position' => $position, 
            'proceeding' => $proceeding, 
            'framework' => $framework,
            'infrastructure' => $infrastructure,
            'database' => $database,
            'id' => $id,
            'matter' => $matter
        ]);
    }

    /**
     * ダッシュボードを表示。
     */
    public function modal()
    {
        // $matter = User::matters();
        //これ使えない $thisって何？
        return view ('layouts/modal', ['id' => $id]);
    }

}
