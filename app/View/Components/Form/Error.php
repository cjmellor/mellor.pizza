<?php

namespace App\View\Components\Form;

use Illuminate\Support\Str;
use Illuminate\View\Component;

class Error extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * A default title that shows how many error messages there are
     *
     * @param $errors
     * @return string
     */
    public function errorCountTitle($errors): string
    {
        return $errors->count().' '.Str::plural('error', $errors->count()).' requires your attention';
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.error');
    }
}
