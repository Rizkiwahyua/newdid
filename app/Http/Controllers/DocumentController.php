<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\DocumentCategory;
use App\Models\DocumentCode;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{

    public function index(Request $request)
    {
        $query = Document::with(['category', 'code', 'department']);

        if ($request->has('category') && $request->category != 'all') {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }
        $documents = $query->latest()->get();

        // ===== HITUNG STATISTIK =====
        $totalDocuments = Document::count();

        $ratifikasi = Document::whereHas('category', fn($q) =>
        $q->where('slug', 'ratifikasi'))->count();

        $pedoman = Document::whereHas('category', fn($q) =>
        $q->where('slug', 'pedoman'))->count();

        $prosedur = Document::whereHas('category', fn($q) =>
        $q->where('slug', 'prosedur'))->count();

        $instruksikerja = Document::whereHas('category', fn($q) =>
        $q->where('slug', 'instruksikerja'))->count();

        $formulir = Document::whereHas('category', fn($q) =>
        $q->where('slug', 'formulir'))->count();

        $totalDepartments = Department::count();
        $totalUsers = User::count();

        $total = max($totalDocuments, 1);

        $ratifikasiPercent = round(($ratifikasi / $total) * 100);
        $pedomanPercent = round(($pedoman / $total) * 100);
        $prosedurPercent = round(($prosedur / $total) * 100);
        $instruksikerjaPercent = round(($instruksikerja / $total) * 100);
        $formulirPercent = round(($formulir / $total) * 100);

        return view('admin.documents.index', compact(
            'documents',
            'totalDocuments',
            'ratifikasi',
            'pedoman',
            'prosedur',
            'instruksikerja',
            'formulir',
            'totalDepartments',
            'totalUsers'
        ));
    }

    public function byCategory($slug)
    {
        if ($slug == 'all') {
            $documents = Document::with(['category', 'code', 'department'])
                ->latest()
                ->get();
        } else {
            $documents = Document::with(['category', 'code', 'department'])
                ->whereHas('category', function ($q) use ($slug) {
                    $q->where('slug', $slug);
                })
                ->latest()
                ->get();
        }

        $title = ucfirst(str_replace('-', ' ', $slug));

        return view('admin.documents.category', compact('documents', 'title'));
    }
    public function create()
    {
        return view('admin.documents.create', [
            'categories'  => DocumentCategory::all(),
            'codes'       => DocumentCode::all(),
            'departments' => Department::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'                => 'required|string|max:300',
            'document_category_id' => 'required',
            'document_code_id'     => 'required',
            'department_id'        => 'required',
            'document_number'      => 'nullable|string|max:255',
            'revision'             => 'nullable|string|max:50',
            'document_date'        => 'nullable|date',
            'description'          => 'nullable|string',
            'file_document'        => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx|max:10000',
        ]);

        $data = $request->except('file_document');

        if ($request->hasFile('file_document')) {

            $file = $request->file('file_document');

            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

            // Pastikan folder ada
            $destinationPath = public_path('documents');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            $file->move($destinationPath, $filename);

            $data['file_document'] = 'documents/' . $filename;
        }

        Document::create($data);

        return redirect()->route('admin.documents.index')
            ->with('success', 'Dokumen berhasil ditambahkan');
    }


    public function edit(Document $document)
    {
        return view('admin.documents.edit', [
            'document'    => $document,
            'categories'  => DocumentCategory::all(),
            'codes'       => DocumentCode::all(),
            'departments' => Department::all(),
        ]);
    }

    public function update(Request $request, Document $document)
    {
        $request->validate([
            'title'                => 'required|string|max:300',
            'document_category_id' => 'required',
            'document_code_id'     => 'required',
            'department_id'        => 'required',
            'document_number'      => 'nullable|string|max:255',
            'revision'             => 'nullable|string|max:50',
            'document_date'        => 'nullable|date',
            'description'          => 'nullable|string',
            'file_document'        => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx|max:10000',
        ]);

        $data = $request->except('file_document');

        if ($request->hasFile('file_document')) {

            // Hapus file lama
            if ($document->file_document && file_exists(public_path($document->file_document))) {
                unlink(public_path($document->file_document));
            }

            $file = $request->file('file_document');

            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

            $destinationPath = public_path('documents');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            $file->move($destinationPath, $filename);

            $data['file_document'] = 'documents/' . $filename;
        }

        $document->update($data);

        return redirect()->route('admin.documents.index')
            ->with('success', 'Dokumen berhasil diperbarui');
    }


    public function destroy(Document $document)
    {
        if ($document->file_document && file_exists(public_path($document->file_document))) {
            unlink(public_path($document->file_document));
        }

        $document->delete();

        return redirect()->route('admin.documents.index')
            ->with('success', 'Dokumen berhasil dihapus');
    }
}
