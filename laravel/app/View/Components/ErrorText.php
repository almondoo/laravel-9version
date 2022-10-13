<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ErrorText extends Component
{
    /**
     * @param string $message エラーメッセージ
     */
    public function __construct(public string $message)
    {
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.error-text');
    }
}
