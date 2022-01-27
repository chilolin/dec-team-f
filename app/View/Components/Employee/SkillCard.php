<?php

namespace App\View\Components\Employee;

use App\Models\User;
use Illuminate\View\Component;

class SkillCard extends Component
{
    public $skillTypeTranslator = [
        'language' => 'プログラミング言語',
        'framework' => 'フレームワーク',
        'design_pattern' => 'デザインパターン',
        'process' => '開発工程',
        'proceeding' => '開発の進め方',
        'engineer_type' => 'エンジニアの種類',
        'position' => '役職',
        'database' => 'データベース',
        'infrastructure' => 'インフラ技術',
    ];

    public $listType;
    public $skillType;
    public $uid;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($listType, $skillType, $uid)
    {
        $this->listType = $listType;
        $this->skillType = $skillType;
        $this->uid = $uid;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        switch ($this->listType) {
            case "practice":
                $skillList = User::find($this->uid)->skills->where('skill_type', $this->skillType)->where('pivot.is_practice', true);
                break;
            case "learning":
                $skillList = User::find($this->uid)->skills->where('skill_type', $this->skillType)->where('pivot.is_learning', true);
                break;
            case "career":
                $skillList = User::find($this->uid)->career_skills->where('skill_type', $this->skillType);
                break;
        }
        return view('components.employee.skill-card', ['skillList' => $skillList]);


    }
}
