<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alternative;
use App\Models\Criterion;
use App\Models\Value;

class SpkController extends Controller
{
    // 1. tampilkan dashboard / ringkasan
    public function index()
    {
        $criteria = Criterion::all();
        $alternatives = Alternative::with('values.criterion')->get();
        return view('spk.index', compact('criteria','alternatives'));
    }

    // 2. perhitungan SAW -> mengembalikan array skor
    public function calculate()
    {
        $criteria = Criterion::all();
        $alternatives = Alternative::with('values')->get();

        // 1) hitung max/min per kriteria
        $norm = [];
        foreach ($criteria as $c) {
            $vals = $c->values()->pluck('value')->toArray();
            if (empty($vals)) {
                $norm[$c->id] = ['max' => 0, 'min' => 0, 'type' => $c->type, 'weight' => $c->weight];
                continue;
            }
            $norm[$c->id] = [
                'max' => max($vals),
                'min' => min($vals),
                'type' => $c->type,
                'weight' => $c->weight
            ];
        }

        $scores = [];
        foreach ($alternatives as $alt) {
            $total = 0.0;
            foreach ($criteria as $c) {
                $valObj = $alt->values->firstWhere('criterion_id', $c->id);
                $v = $valObj ? floatval($valObj->value) : 0.0;

                if ($norm[$c->id]['type'] === 'benefit') {
                    $normalized = $norm[$c->id]['max'] > 0 ? ($v / $norm[$c->id]['max']) : 0;
                } else {
                    $normalized = $v > 0 ? ($norm[$c->id]['min'] / $v) : 0;
                }

                $weighted = $normalized * floatval($c->weight);
                $total += $weighted;
            }

            $scores[] = [
                'alternative_id' => $alt->id,
                'alternative_name' => $alt->name,
                'score' => $total
            ];
        }

        usort($scores, function($a,$b){ return $b['score'] <=> $a['score']; });

        return response()->json($scores);
    }

    // 3. tampilkan top5 (blade)
    public function top5()
    {
        $scoresResponse = $this->calculate()->getData(); // JSON response data
        $top5 = array_slice($scoresResponse, 0, 5);
        return view('spk.top5', compact('top5'));
    }

    // 4. detail alternative
    public function show($id)
    {
        $alt = Alternative::with('values.criterion')->findOrFail($id);
        return view('spk.show', compact('alt'));
    }
}
