<?php

namespace LowB\LadminBasicTheme\View\Components;

use Illuminate\Support\Facades\View as FacadesView;
use Illuminate\View\Component;
use Illuminate\View\View;

class AuthLayout extends Component
{
    public function render(): View
    {
        return FacadesView::first([
            'admin.layouts.auth',
            'ladmin-basic-theme::layouts.auth'
        ]);
    }
}
