<?php

namespace App\View\Components\Employees;

use App\Consts\SkillType;
use App\Models\Skill;
use Illuminate\View\Component;

class SearchAccordion extends Component
{
    public $skillType;
    public $skills;
    public $borderType;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($skillType)
    {
        $this->skillType = $skillType;
        $this->skills = Skill::where('skill_type', $skillType)->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        switch ($this->skillType) {
            case SkillType::LANGUAGE:
                $this->borderType = "text-primary";
                break;
            case SkillType::FRAMEWORK:
                $this->borderType = "text-secondary";
                break;
            case SkillType::DESIGN_PATTERN:
                $this->borderType = "text-success";
                break;
            case SkillType::PROCESS:
                $this->borderType = "text-danger";
                break;
            case SkillType::PROCEEDING:
                $this->borderType = "text-warning";
                break;
            case SkillType::ENGINEER_TYPE:
                $this->borderType = "text-info";
                break;
            case SkillType::POSITION:
                $this->borderType = "text-pink";
                break;
            case SkillType::DATABASE:
                $this->borderType = "text-dark";
                break;
            case SkillType::INFRASTRUCTURE:
                $this->borderType = "text-purple";
                break;
        }
        return view('components.employees.search-accordion');
    }
}
