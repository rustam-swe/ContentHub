<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class Thumbnail extends Component
{
    public function __construct(
        public  $contents,
        public string           $orientation
    ) {
    }

    public function render(): View|Closure|string
    {
        return view('components.thumbnail');
    }
}
