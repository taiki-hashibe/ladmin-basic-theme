<?php

namespace LowB\Ladmin\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class GuestLayout extends Component
{
    public function render(): View
    {
        return view('ladmin-basic-theme::layouts.guest');
    }
}
