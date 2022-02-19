<?php

namespace App\View\Components\Forms;

use App\Models\Skill;
use Illuminate\View\Component;

class SkillSelect extends Component
{
    public $candidateSkills;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($skillType)
    {
        if ($skillType == 'all') {
            $this->candidateSkills = Skill::all();
        } else {
            $this->candidateSkills = Skill::where('skill_type', $skillType)->get();
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $candidates = $this->candidateSkills->map(function($skill) {
            return [
                'value' => $skill->id,
                'text' => $skill->name,
            ];
        });

        return view('components.forms.skill-select', ['candidates' => $candidates]);
    }
}
