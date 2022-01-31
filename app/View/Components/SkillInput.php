<?php

namespace App\View\Components;

use App\Models\Skill;
use Illuminate\View\Component;

class SkillInput extends Component
{
    public $candidateSkills;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($skillType)
    {
        $this->candidateSkills = Skill::where('skill_type', $skillType)->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $dataOptions = $this->candidateSkills->reduce(function($dataOptions, $skill) {
            return $dataOptions . ',' . $skill->name;
        }, '');

        return view('components.skill-input', ['dataOptions' => $dataOptions]);
    }
}
