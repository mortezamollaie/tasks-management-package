<?php

namespace Mortezamollaie\TasksManagement\Models;

use App\Models\User;
use DateTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Task extends Model
{
    protected $appends = ['is_highlighted'];

    protected $fillable = [
        'title',
        'description',
        'attachment',
        'due_date',
        'is_completed',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getIsHighlightedAttribute()
    {
        $now = new DateTime();
        $date = new DateTime($this->due_date);
        $diff = $date->diff($now);

        $totalHours = ($diff->days * 24) + $diff->h;

        return $date > $now && $totalHours <= 24;
    }
}
