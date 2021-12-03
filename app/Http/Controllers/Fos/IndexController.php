<?php

namespace App\Http\Controllers\Fos;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class IndexController extends Controller
{
    public function __invoke(): View
    {
        return view('fos.index');
    }
}
