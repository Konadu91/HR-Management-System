<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Inputswitch extends Component
{
    public $name;
    public $label;
    public $type;
    public $placeholder;
    public $value;
    public $employees;

    /**
     * Create a new component instance.
     *
     * @param string $name
     * @param string $label
     * @param string $type
     * @param string $placeholder
     * @param string $value
     * @param string $employees
     */
    public function __construct($name, $label, $type = 'text', $placeholder = '', $value = null, $employees = null)
    {
        $this->name = $name;
        $this->label = $label;
        $this->type = $type;
        $this->placeholder = $placeholder;
        $this->value = $value;
        $this->employees = $employees;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.inputswitch');
    }
}