<?php

namespace App\View\Components\Employees;

use App\Models\Skill;
use Illuminate\View\Component;

class SearchAccordion extends Component
{
    public $skillType;
    public $skills;
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
        return view('components.employees.search-accordion');
    }
}
