<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FormField extends Component
{
    public $name;
    public $required;
    public $title;
    public $type;
    public $description;
    public $value;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $required, $type, $title)
    {
        $this->name = $name;
        $this->required = $required == 'true';
        $this->title = $title;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.form_field');
    }
}
