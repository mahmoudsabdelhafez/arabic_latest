<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demonstrative extends Model
{
    use HasFactory;

    protected $table = 'demonstratives'; // اسم الجدول في قاعدة البيانات

    protected $fillable = ['name', 'definition']; // الحقول القابلة للتعبئة
}
