<?php

namespace App\View\Components\Employees;

use Illuminate\View\Component;

class SkillCardList extends Component
{
    public $listTypes = [
        "practice_learning" => [
            "title" => "実務・学習スキル",
            "skillTypeList" => [
                'language',
                'framework',
                'design_pattern',
                'process',
                'proceeding',
                'engineer_type',
                'position',
                'database',
                'infrastructure',
            ],
        ],
        "career" => [
            "title" => "学習希望スキル",
            "skillTypeList" => [
                'language',
                'proceeding',
                'engineer_type',
                'position',
            ],
        ],
    ];

    public $listType;
    public $uid;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($listType, $uid)
    {
        $this->listType = $listType;
        $this->uid = $uid;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.employees.skill-card-list');
    }
}
