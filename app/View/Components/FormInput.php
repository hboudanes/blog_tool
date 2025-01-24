<?php

namespace App\View\Components;

use App\Enums\InputType;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormInput extends Component
{
    public string $name;
    public string $for;
    public string $type;
    public InputType $inputType;
    public mixed $value;
    public bool $required;
    /**
     * Create a new component instance.
     *
     * @param string $name
     * @param string $for
     * @param string $type
     * @param InputType $inputType
     * @param mixed $value
     * @param bool $required
     */
    public function __construct(
        string $name,
        string $for,
        InputType $inputType = InputType::DEFAULT,
        string $type = "",
        mixed $value = null,
        bool $required = false,
       
    ) {
        $this->name = $name;
        $this->for = $for;
        $this->inputType = $inputType;
        $this->type = $type;
        $this->value = $value;
        $this->required = $required;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.form-input');
    }
}
