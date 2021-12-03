<?php

namespace App\View\Components\Form;

use Illuminate\Support\Str;
use Illuminate\Support\ViewErrorBag;
use Illuminate\View\Component;

class Error extends Component
{
    public function __construct()
    {
        //
    }

    public function errorCountTitle(ViewErrorBag $errors): string
    {
        return $errors->count().' '.Str::plural('error', $errors->count()).' require your attention';
    }

    public function render()
    {
        return view('components.form.error');
    }
}
