<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requirement extends Model
{
    public function course()
    {
    	return $this->belonsTo(Course::class);
    }
}
