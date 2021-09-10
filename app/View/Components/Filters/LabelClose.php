<?php

namespace App\View\Components\Filters;

use Illuminate\View\Component;

class LabelClose extends Component
{
    public string $text = '';
    
    public function __construct(string $text)
    {
        $this->text = $text;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.filters.label-close');
    }
}
