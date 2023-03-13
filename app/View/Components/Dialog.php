<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Dialog extends Component
{
    public $model;
 
    /**
     * Create the component instance.
     *
     * @param string $model
     * @return void
     */
    public function __construct($model)
    {
        $this->model = $model;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dialog');
    }
}
