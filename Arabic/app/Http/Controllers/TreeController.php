<?php

namespace App\Http\Controllers;

use App\Models\WordType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TreeController extends Controller
{
    public function index()
    {
        // Fetch the root word type (الكلمة)
        $roots = WordType::whereNull('parent_id')->get();
        // dd($root);
        $root = $roots[0];
        return view('tree.index', compact('root'));
    }

    public function getBranchData($parentId)
    {
        // Fetch the data for the clicked branch
        $rootIds = WordType::whereNull('parent_id')->pluck('id')->toArray();

        if ($parentId == $rootIds[0]) {
            $branches = WordType::where('parent_id', $parentId)->get();
        } else {
            $branches = WordType::where('id', $parentId)->get();
            $branches = DB::table($branches[0]->table_name)->get();
        }
        
        return response()->json($branches);
    }
}
