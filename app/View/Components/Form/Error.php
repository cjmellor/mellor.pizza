<?php

namespace App\View\Components\Form;

use Illuminate\Support\Str;
use Illuminate\Support\ViewErrorBag;
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
     * A default title that shows how many error messages there are.
     *
     * @param  \Illuminate\Support\ViewErrorBag  $errors
     * @return string
     */
    public function errorCountTitle(ViewErrorBag $errors): string
    {
        return $errors->count().' '.Str::plural('error', $errors->count()).' require your attention';
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('components.form.error');
    }
}
