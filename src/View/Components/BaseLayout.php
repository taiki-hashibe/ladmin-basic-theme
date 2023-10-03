<?php

namespace LowB\LadminBasicTheme\View\Components;

use Illuminate\Support\Facades\View as FacadesView;
use Illuminate\View\Component;
use Illuminate\View\View;

class BaseLayout extends Component
{
    public function render(): View
    {
        return FacadesView::first([
            'admin.layouts.base',
            'ladmin-basic-theme::layouts.base',
        ]);
    }
}
