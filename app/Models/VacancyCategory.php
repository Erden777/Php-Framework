<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VacancyCategory extends Model
{
	public $timestamps = false;
    use HasFactory;
    protected $table = 'category_vacancy';
}
