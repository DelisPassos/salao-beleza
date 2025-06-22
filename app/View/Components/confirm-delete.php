<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class ConfirmDelete extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        // Aqui você pode adicionar propriedades como $name, $route, etc., se quiser usar no PHP
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modals.confirm-delete');
    }
}
