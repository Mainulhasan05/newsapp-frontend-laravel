<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(Categories::class, 'category_id');
    }

    public function sub_category()
    {
        return $this->belongsTo(Categories::class, 'sub_category_id');
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id');
    }

    public function sub_district()
    {
        return $this->belongsTo(Subdistrict::class, 'sub_district_id');
    }
}
