<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\DocumentCategory;
use App\Models\DocumentCode;
use App\Models\Department; // ganti WorkUnit ke Department
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function index()
    {
        // Ubah relasi workUnit ke department
        $documents = Document::with(['category', 'code', 'department'])->get();
        return view('admin.documents.index', compact('documents'));
    }

    public function create()
    {
        return view('admin.documents.create', [
            'categories' => DocumentCategory::all(),
            'codes'      => DocumentCode::all(),
            'departments' => Department::all(), // ganti 'units' jadi 'departments'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'                => 'required',
            'document_category_id' => 'required',
            'document_code_id'     => 'required',
            'department_id'        => 'required', // tetap pakai department_id
        ]);

        Document::create($request->all());

        return redirect()->route('admin.documents.index');
    }
}
