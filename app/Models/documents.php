<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\document_templates;

class documents extends Model
{
    use HasFactory;

    public function template(){
        return $this->belongsTo(document_templates::class,'document');
    }
}
