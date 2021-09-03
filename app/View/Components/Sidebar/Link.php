<?php

namespace App\View\Components\Sidebar;

use Illuminate\View\Component;

class Link extends Component
{
    public bool $active = false;
    public string $title = '';
    public string $link = '';
    
    public function __construct(string $title, string $link, bool $active)
    {
        $this->title = $title;
        $this->link = $link;
        $this->active = $active;
    }
    
    public function render()
    {
        return view('components.sidebar.link');
    }
}
