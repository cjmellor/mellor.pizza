<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AttachmentController extends Controller
{
    public function __invoke(Request $request): bool|string|FileNotFoundException
    {
        Validator::make($request->all(), [
            'file' => [
                'required',
                'file',
                'max:3072',
                'mimes:jpg,jpeg,webp,png,avif',
            ],
        ])->validate();

        $file = $request->file('file')->getClientOriginalName();

        if (! $request->hasFile('file')) {
            return new FileNotFoundException('File not found');
        }

        return $request->file('file')->storeAs('', $file, 'attachments');
    }
}
