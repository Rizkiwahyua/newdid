<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\DocumentCategory;
use App\Models\DocumentCode;
use App\Models\WorkUnit;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function index()
    {
        $documents = Document::with(['category', 'code', 'workUnit'])->get();
        return view('admin.documents.index', compact('documents'));
    }

    public function create()
    {
        return view('admin.documents.create', [
            'categories' => DocumentCategory::all(),
            'codes'      => DocumentCode::all(),
            'units'      => WorkUnit::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'                => 'required',
            'document_category_id' => 'required',
            'document_code_id'     => 'required',
            'work_unit_id'         => 'required',
        ]);

        Document::create($request->all());

        return redirect()->route('admin.documents.index');
    }
}
