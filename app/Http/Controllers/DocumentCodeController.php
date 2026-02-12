<?php

namespace App\Http\Controllers;

use App\Models\DocumentCode;
use Illuminate\Http\Request;

class DocumentCodeController extends Controller
{
    public function index()
    {
        $codes = DocumentCode::all();
        return view('admin.document-codes.index', compact('codes'));
    }

    public function create()
    {
        return view('admin.document-codes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:document_codes,code'
        ]);

        DocumentCode::create([
            'code' => strtoupper($request->code),
            'description' => $request->description,
            'is_active' => true
        ]);

        return redirect()->route('admin.document-codes.index');
    }
}
