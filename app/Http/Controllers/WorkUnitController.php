<?php

namespace App\Http\Controllers;

use App\Models\WorkUnit;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class WorkUnitController extends Controller
{
    public function index()
    {
        $units = WorkUnit::all();
        return view('admin.work-units.index', compact('units'));
    }

    public function create()
    {
        return view('admin.work-units.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:work_units,name'
        ]);

        WorkUnit::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'is_active' => true
        ]);

        return redirect()->route('admin.work-units.index');
    }
}
