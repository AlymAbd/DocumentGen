<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemplateTags extends Model
{
    protected $connection = 'pgsql';
    protected $table = 'template_tag_list';
}
