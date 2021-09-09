<?php

namespace App\View\Components\Table;

use Illuminate\View\Component;

class Table extends Component
{
    
    public array $header = [];

    public function __construct(array $header)
    {
        $this->header = $header;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.table.table');
    }
}
