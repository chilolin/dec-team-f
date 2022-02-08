<?php

namespace App\View\Components\Forms;

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
        $candidates = $this->candidateSkills->map(function($skill) {
            return $skill->name;
        });

        $candidate_map = $this->candidateSkills->reduce(function($candidates, $skill) {
            $candidates[$skill->name] = $skill->id;
            return $candidates;
        }, []);

        return view('components.forms.skill-input', ['candidates' => $candidates, 'candidate_map' => $candidate_map]);
    }
}
