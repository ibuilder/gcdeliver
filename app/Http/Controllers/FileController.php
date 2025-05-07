<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
class FileController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:pdf,doc,docx,xls,xlsx,jpg,jpeg,png|max:2048',
            'fileable_id' => 'required|integer',
            'fileable_type' => 'required|string',
        ]);

        $fileableType = $request->input('fileable_type');

        $modelClass = match ($fileableType) {
            'App\Models\Project' => \App\Models\Project::class,
            'App\Models\Delivery' => \App\Models\Delivery::class,
            'App\Models\DailyReport' => \App\Models\DailyReport::class,
            default => throw new \Exception('Invalid fileable type'),
        };

        $fileable = $modelClass::findOrFail($request->input('fileable_id'));

        $filePath = $request->file('file')->store('uploads', 'public');

        $file = new File();
        $file->file_name = $request->file('file')->getClientOriginalName();
        $file->file_path = $filePath;
        $file->mime_type = $request->file('file')->getMimeType();
        $file->size = $request->file('file')->getSize();

        $fileable->files()->save($file);

        return back()->with('success', 'File uploaded successfully.');
    }

    public function download(File $file){
        return Storage::disk('public')->download($file->file_path, $file->file_name);
    }

}
