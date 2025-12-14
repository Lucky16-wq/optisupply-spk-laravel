<?php
namespace App\Http\Controllers;

use App\Models\Criterion;
use Illuminate\Http\Request;

class CriteriaController extends Controller
{
    public function index()
    {
        $criteria = Criterion::all();
        return view('criteria.index', compact('criteria'));
    }

    public function create()
    {
        return view('criteria.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'type' => 'required|in:benefit,cost',
            'weight' => 'required|numeric|min:0'
        ]);
        Criterion::create($data);
        return redirect()->route('criteria.index')->with('success','Kriteria berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $c = Criterion::findOrFail($id);
        return view('criteria.edit', compact('c'));
    }

    public function update(Request $request, $id)
    {
        $c = Criterion::findOrFail($id);
        $data = $request->validate([
            'name' => 'required|string',
            'type' => 'required|in:benefit,cost',
            'weight' => 'required|numeric|min:0'
        ]);
        $c->update($data);
        return redirect()->route('criteria.index')->with('success','Kriteria diperbarui.');
    }

    public function destroy($id)
    {
        Criterion::findOrFail($id)->delete();
        return redirect()->route('criteria.index')->with('success','Kriteria dihapus.');
    }
}
