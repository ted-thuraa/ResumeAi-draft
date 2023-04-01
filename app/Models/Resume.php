<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\SlugOptions;
use Spatie\Sluggable\HasSlug;

class Resume extends Model
{
    use HasFactory, HasSlug;


    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'template',
        'country',
        'first_name',
        'last_name',
        'address',
        'city',
        'state',
        'Zipcode',
        'email',
        'phone',
        'skills',
        'language',
        'professional_summary',
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    //create relation with questions
    public function experiences()
    {
        return $this->hasMany(ResumeExperience::class);
    }

    public function educations()
    {
        return $this->hasMany(ResumeEducation::class);
    }

    public function links()
    {
        return $this->hasMany(Resumelink::class);
    }

    public function sections()
    {
        return $this->hasMany(ResumeAddsection::class);
    }
}
