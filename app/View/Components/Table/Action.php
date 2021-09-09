<?php

namespace App\View\Components\Table;

use Illuminate\View\Component;

class Action extends Component
{
   
    public string $type = 'show';

    public function __construct(string $type)
    {
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.table.action');
    }
}
