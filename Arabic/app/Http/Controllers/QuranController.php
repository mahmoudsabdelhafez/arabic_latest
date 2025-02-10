<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quran;

class QuranController extends Controller
{

    public function show()
    {
        return view('quran.index');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
    
        // الحصول على العدد الكلي للنتائج
        $totalCount = Quran::whereRaw("BINARY text LIKE ?", ["%$query%"])->count();
    
        // جلب البيانات مع التصفح (pagination)
        $results = Quran::whereRaw("BINARY text LIKE ?", ["%$query%"])->paginate(20);
    
        return response()->json([
            'total_count' => $totalCount,
            'results' => $results->items(),
            'current_page' => $results->currentPage(),
            'last_page' => $results->lastPage(),
            'prev_page_url' => $results->previousPageUrl(),
            'next_page_url' => $results->nextPageUrl(),
        ]);
    }
    
}

