<?php
namespace App\Http\Controllers;

use App\Models\Alternative;
use App\Models\Criterion;
use App\Models\Value;
use Illuminate\Http\Request;

class AlternativeController extends Controller
{
    public function index()
    {
        $alternatives = Alternative::with('values.criterion')->get();
        return view('alternatives.index', compact('alternatives'));
    }

    public function create()
    {
        $criteria = Criterion::all();
        return view('alternatives.create', compact('criteria'));
    }

    public function store(Request $request)
    {
        $request->validate(['name'=>'required|string','description'=>'nullable|string']);
        $alt = Alternative::create($request->only(['name','description']));

        // store values
        $values = $request->input('values', []);
        foreach ($values as $criterionId => $val) {
            Value::create([
                'alternative_id' => $alt->id,
                'criterion_id' => $criterionId,
                'value' => floatval($val)
            ]);
        }

        return redirect()->route('alternatives.index')->with('success','Alternatif ditambah.');
    }

    public function edit($id)
    {
        $alt = Alternative::with('values')->findOrFail($id);
        $criteria = Criterion::all();
        return view('alternatives.edit', compact('alt','criteria'));
    }

    public function update(Request $request, $id)
    {
        $alt = Alternative::findOrFail($id);
        $alt->update($request->only(['name','description']));

        $values = $request->input('values', []);
        foreach ($values as $criterionId => $val) {
            Value::updateOrCreate(
                ['alternative_id'=>$alt->id,'criterion_id'=>$criterionId],
                ['value'=>floatval($val)]
            );
        }

        return redirect()->route('alternatives.index')->with('success','Alternatif diperbarui.');
    }

    public function destroy($id)
    {
        Alternative::findOrFail($id)->delete();
        return redirect()->route('alternatives.index')->with('success','Alternatif dihapus.');
    }
}
