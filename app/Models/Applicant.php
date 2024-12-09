<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Applicant extends Model
{
    /**
     * Fillable fields
     */
    protected $fillable = [
        'user_id',
        'work_id',
        'full_name',
        'contact_phone',
        'contact_email',
        'message',
        'location',
        'resume_path'
    ];

    /**
     * Get the work that owns the Applicant
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function work(): BelongsTo
    {
        return $this->belongsTo(Work::class);
    }

    /**
     * Get the user that owns the Applicant
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The bookmarkedByUsers that belong to the Work
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function bookmarkedByUsers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'bookmarks')->withTimestamps();
    }
}
