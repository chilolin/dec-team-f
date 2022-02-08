<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class MultiSelect extends Component
{
    public $selectableHeader;
    public $selectionHeader;
    public $options;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($selectableHeader, $selectionHeader, $options)
    {
        $this->selectableHeader = $selectableHeader;
        $this->selectionHeader = $selectionHeader;
        $this->options = $options;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.multi-select');
    }
}
