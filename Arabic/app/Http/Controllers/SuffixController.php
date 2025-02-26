<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pronoun;

class SuffixController extends Controller
{
    // Display the form for inputting a verb
    public function index()
    {
        $pronouns = Pronoun::with(['sawabeqs', 'suffixes'])->get();
        return view('prefix_suffix.verb', compact('pronouns'));
    }

    public function past($verb, $pronounId)
    {
        $letters = mb_str_split($verb);
        if (count($letters) < 3) {
            return redirect()->back()->with('error', 'Please enter a verb with at least 3 characters.');
        }

        // Apply diacritics
        $letters[0] .= 'َ'; // Fatha on first letter
        $letters[1] .= 'َ'; // Fatha on second letter

        $letters[2] .= match ($pronounId) {
            8, 9, 10 => 'َ', // Fatha
            11 => 'ُ',       // Damma
            default => 'ْ',   // Sukun
        };

        return implode('', $letters);
    }

    public function present($verb, $pronounId)
    {
        $letters = mb_str_split($verb);
        if (count($letters) < 3) {
            return redirect()->back()->with('error', 'Please enter a verb with at least 3 characters.');
        }

        // Apply diacritics
        $letters[0] .= 'ْ'; // Sukun on first letter
        $letters[1] .= 'ُ'; // Damma on second letter

        $letters[2] .= match ($pronounId) {
            7, 12 => 'ْ', // Sukun
            5, 10 => 'َ', // Fatha
            4 => 'ِ',     // Kasra
            default => 'ُ', // Damma
        };

        $modifiedVerb = implode('', $letters);
        return mb_substr($modifiedVerb, 0, 1) === 'و' ? mb_substr($modifiedVerb, 2) : $modifiedVerb;
    }

    public function applyPrefixesAndSuffixesToVerb(Request $request)
    {
        $request->validate([
            'verb' => 'required|string|max:255',
        ]);

        $pronouns = Pronoun::with(['sawabeqs', 'suffixes'])->get();
        dd($pronouns);
        $results = [];

        foreach ($pronouns as $pronoun) {
            $modaraResult = $amrResult = $madiResult = null;
            
            foreach ($pronoun->sawabeqs as $sawabeq) {
                $types = explode(' - ', $sawabeq->type);

                if (in_array('حروف مضارعة', $types)) {
                    $suffix = $pronoun->suffixes->first(fn($s) => str_contains($s->type, 'مضارع'));
                    $modaraResult = $sawabeq->name . $this->present($request->verb, $pronoun->id) . ($suffix ? $suffix->formula : '');
                }

                if (in_array('أمر', $types)) {
                    $suffix = $pronoun->suffixes->first(fn($s) => str_contains($s->type, 'أمر'));
                    $varb = $this->present($request->verb, $pronoun->id);
                    if ($pronoun->id == 3) {
                        $letters = mb_str_split($varb);
                        $letters[5] = 'ْ'; // Apply sukun
                        $varb = implode('', $letters);
                    }
                    $amrResult = mb_substr($request->verb, 0, 1) === 'و' ? $varb . ($suffix ? $suffix->formula : '') : $sawabeq->name . $varb . ($suffix ? $suffix->formula : '');
                }
            }

            $suffix = $pronoun->suffixes->first(fn($s) => str_contains($s->type, 'ماضي'));
            $madiResult = $this->past($request->verb, $pronoun->id) . ($suffix ? $suffix->formula : '');

            $results[] = [
                'pronoun' => $pronoun->name,
                'modara' => $modaraResult ?? '-',
                'amr' => $amrResult ?? '-',
                'madi' => $madiResult ?? '-',
            ];
        }

        return response()->json($results);
    }
}
