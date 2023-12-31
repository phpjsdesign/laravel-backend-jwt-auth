<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    use HasFactory;

    const STATUS_IN_PROGRESS = 'В прогрессе';
    const STATUS_COMPLETED = 'Завершено';
    const STATUS_OVERDUE = 'Просрочено';
    const PRIORITY_NORMAL = 'Нормальный';
    const PRIORITY_URGENT = 'Срочно';

    protected $fillable = [
        "project_id",
        "user_id",
        "task_title",
        "spent_time",
        "description",
        "deadline",
        "status",
        "reminder"
    ];

    protected $casts = [
        'deadline' => 'datetime:Y-m-d',
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
