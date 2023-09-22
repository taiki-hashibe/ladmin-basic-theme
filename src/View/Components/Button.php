<?php

namespace LowB\LadminBasicTheme\View\Components;

use Illuminate\Support\Arr;
use Illuminate\View\Component;
use Illuminate\View\View;

class Button extends Component
{
    public string $variantClass;

    public array $variantClassMap = [
        'primary' => 'bg-sky-300 text-white',
        'info' => '',
        'danger' => 'bg-red-600 text-white',
    ];

    public function __construct(string $variant)
    {
        if (!Arr::exists($this->variantClassMap, $variant)) {
            throw new \Exception("Invalid variant: $variant");
        }
        $this->variantClass = $this->variantClassMap[$variant];
    }

    public function render(): View
    {
        return view('ladmin-basic-theme::components.button');
    }
}
