<?php

namespace LowB\LadminBasicTheme\View\Components;

use Illuminate\Support\Facades\View as FacadesView;
use Illuminate\View\Component;
use Illuminate\View\View;

class GuestLayout extends Component
{
    public function render(): View
    {
        return FacadesView::first([
            'admin.layouts.guest',
            'ladmin-basic-theme::layouts.guest',
        ]);
    }
}
