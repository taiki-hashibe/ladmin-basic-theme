<?php

namespace LowB\LadminBasicTheme\View\Components\Anchor;

use Illuminate\View\Component;
use Illuminate\View\View;

class Base extends Component
{
    public string $view = '';

    public string $href;

    public function __construct($href)
    {
        $this->href = $href;
    }

    public function render(): View
    {
        return view("ladmin-basic-theme::components.anchor.$this->view");
    }
}
