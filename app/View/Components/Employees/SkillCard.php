<?php

namespace App\View\Components\Employees;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class SkillCard extends Component
{
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
            case "practice_learning":
                $skillList = User::find($this->uid)->skills->where('skill_type', $this->skillType);
                break;
            case "career":
                $skillList = User::find($this->uid)->career_skills->where('skill_type', $this->skillType);
                break;
        }
        return view('components.employees.skill-card', ['skillList' => $skillList, 'is_auth' => Auth::id() == $this->uid,]);
    }
}
