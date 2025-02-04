<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TajweedCategory;
use App\Models\NunSakinahAndTanween;
use App\Models\TajweedDefinition;

class TajweedCategoryController extends Controller
{
    // Show all categories


    public function menu(){
        return view('tajweedcategories.menu');
    }

    public function showConcept()
    {
        // Fetch the first concept of Tajweed from the database (or change to fetch specific data as needed)
        $tajweedConcept = TajweedDefinition::first(); // Change this as necessary

        // Pass the data to the view
        return view('tajweedcategories.concept', compact('tajweedConcept'));
    }


    public function index()
{
    $categories = [
        'أحكام النون الساكنة والتنوين' => TajweedCategory::where('id', 1)->get(),
        'أحكام الميم' => TajweedCategory::where('id', 2)->get(),
        'أحكام الادغام' => TajweedCategory::where('id', 3)->get(),
        'أحكام التفخيم والترقيق' => TajweedCategory::whereIn('id', [4, 7])->get(),
        'أحكام المدود' => TajweedCategory::where('id', 5)->get(),
        'أحكام اللامات الساكنة' => TajweedCategory::where('id', 6)->get(),
        'أحكام الوقف والابتداء والسكت والقطع' => TajweedCategory::whereIn('id', [9, 10, 11, 12, 15])->get(),
        'أحكام الحروف وصفاتها' => TajweedCategory::whereIn('id', [13, 14, 16, 17])->get(),
        'أحكام متفرقة' => TajweedCategory::where('id',1)->get(),
    ];

    return view('tajweedcategories.index', compact('categories'));
}

    // Show rules related to a specific category
    // public function show($id)
    // {
    //     $category = TajweedCategory::findOrFail($id);
    //     $rules = NunSakinahAndTanween::where('category_id', $id)->get();

    //     return view('tajweedcategories.show', compact('category', 'rules'));
    // }


    public function show($id)
{
    $category = TajweedCategory::findOrFail($id);
    $rules = NunSakinahAndTanween::where('category_id', $id)->get();

    return view('tajweedcategories.show', compact('category', 'rules'));
}


public function showRule($id)
{
    $rule = NunSakinahAndTanween::findOrFail($id);
    return view('tajweedcategories.rule-details', compact('rule'));
}




}
