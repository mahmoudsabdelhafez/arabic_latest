<?php

namespace App\Http\Controllers;

use App\Models\Linking_tool;
use App\Models\WordType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Schema;
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

    
    public function wordDetails($name){
        $table = strtolower($name).'s';
    
        // التحقق مما إذا كان الجدول موجودًا
        if (!Schema::hasTable($table)) {
            return back()->with('error', "الجدول '{$table}' غير موجود في قاعدة البيانات.");
        }
    
        $branches = DB::table($table)->get();
        return view('tree.word-details', compact(['branches', 'name']));
    }
    
}
