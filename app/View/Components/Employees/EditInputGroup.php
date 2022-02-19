<?php

namespace App\View\Components\Employees;

use Illuminate\View\Component;

class EditInputGroup extends Component
{
    public $skillType;
    public $index;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($skillType, $index)
    {
        $this->skillType = $skillType;
        $this->index = (int)$index;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.employees.edit-input-group');
    }
}
