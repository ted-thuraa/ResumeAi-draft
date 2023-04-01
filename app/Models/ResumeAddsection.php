<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResumeAddsection extends Model
{
    use HasFactory;

    protected $fillable = [
        'title' ,
        'description' ,
        'resume_id' ,
    ];

    public function resume()
    {
        return $this->belongsTo(Resume::class);
    }
}
