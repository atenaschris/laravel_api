<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $fillable = [
        'firstName','lastName','dateOfBirth','streetAddress'
    ];
}
