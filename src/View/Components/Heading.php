<?php

namespace LowB\LadminBasicTheme\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Heading extends Component
{
    public function render(): View
    {
        return view('ladmin-basic-theme::components.heading');
    }
}
