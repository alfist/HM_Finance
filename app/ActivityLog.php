<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
	protected $fillable = [
        "user_id",
        "fitur",
        "method",
        "payload",
    ];
}
