<?php

namespace App\View\Components;

use App\Consts\SkillType;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class Modal extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $matters = Auth::user()
                    ->matters
                    ->filter(function($matter) {
                        return $matter->start_at <= date("Y-m-d") && date("Y-m-d") <= $matter->end_at;
                    })
                    ->sortBy('start_at')
                    ->reduce(function($matters, $matter) {
                        $skills = [];
                        foreach (SkillType::SKILL_TYPES as $skill_type)
                        {
                            $specific_skills = $matter
                                                ->skills
                                                ->where('skill_type', $skill_type)
                                                ->map(function($specific_skill) {
                                                    $skill = Auth::user()->skills->where('id', $specific_skill->id)->where('pivot.is_practice', true);
                                                    $disabled = (bool)count($skill);
                                                    return [
                                                        'id' => $specific_skill['id'],
                                                        'name' => $specific_skill['name'],
                                                        'disabled' => $disabled,
                                                        'level' => $disabled ? $skill->first()->pivot->level : null,
                                                    ];
                                                });

                            if (!count($specific_skills)) continue;

                            $skills[$skill_type] = $specific_skills;
                        }

                        $matters[] = [
                            'id' => $matter->id,
                            'name' => $matter->name,
                            'start_at' => $matter->start_at,
                            'end_at' => $matter->end_at,
                            'skills' => $skills
                        ];

                        return $matters;
                    }, []);

        return view('components.modal', ['matters' => $matters]);
    }
}
