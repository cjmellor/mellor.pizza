<?php

namespace App\Http\Controllers\Trix;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AttachmentController extends Controller
{
    public function store(Request $request): bool|string|FileNotFoundException
    {
        $file = $request->file('file')->getClientOriginalName();

        if ($request->hasFile('file')) {
            return $request->file('file')->storeAs('', $file, 'trix-attachments');
        }

        return new FileNotFoundException('File not found');
    }

    public function destroy(Request $request)
    {
        $file = $request->file('file')->getClientOriginalName();

        Storage::disk('trix-attachments')->delete($file);
    }
}
