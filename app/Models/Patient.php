<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = ['age'];

    public function services() {
        return $this->hasMany('App\Models\Service')->orderBy('date','DESC');
    }

    public function getAgeAttribute() {
        return Carbon::parse($this->birth_date)->age;
    }
}
