<?php

namespace App\View\Components\Sidebar;

use Illuminate\View\Component;

class Dropdown extends Component
{
    
    public string $title = '';
    public bool $active = false;
    
    public function __construct(string $title, bool $active)
    {
        $this->title = $title;
        $this->active = $active;
    }

    public function render()
    {
        return view('components.sidebar.dropdown');
    }
}
