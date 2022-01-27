<?php

namespace App\View\Components\Employee;

use Illuminate\View\Component;

class SkillCardList extends Component
{
    public $listTypes = [
        "practice" => [
            "title" => "実務スキル",
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
        "learning" => [
            "title" => "学習スキル",
            "skillTypeList" => [
                'language',
                'framework',
                'design_pattern',
                'process',
                'proceeding',
            ],
        ],
        "career" => [
            "title" => "キャリア",
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
        return view('components.employee.skill-card-list');
    }
}
