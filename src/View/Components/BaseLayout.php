<?php

namespace LowB\LadminBasicTheme\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class BaseLayout extends Component
{
    public function render(): View
    {
        return view('ladmin-basic-theme::layouts.base');
    }
}
