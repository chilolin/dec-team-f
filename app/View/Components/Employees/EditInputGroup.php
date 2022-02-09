<?php

namespace App\View\Components\Employees;

use Illuminate\View\Component;

class EditInputGroup extends Component
{
    public $skillType;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($skillType)
    {
        $this->skillType = $skillType;
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
