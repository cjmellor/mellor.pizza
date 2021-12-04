<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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

        $uploadedFile = $request->file('file')->storeAs('attachments', $file, 's3');

        return Storage::disk('s3')->url($uploadedFile);
    }
}
