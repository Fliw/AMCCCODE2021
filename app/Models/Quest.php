<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Quest extends Model
{
    protected $table = 'quests';

    protected $guarded = [];

    protected $appends = [
        'date_diff',
        'is_open',
        'state',
        'short_note',
        'short_date'
    ];

    public function getDateDiffAttribute()
    {
        return $this->created_at->locale('id_ID')->diffForHumans();
    }

    public function getIsOpenAttribute()
    {
        return ($this->status == 'issued');
    }

    public function getStateAttribute()
    {
        switch ($this->status) {
            case 'issued':
                return ['element' => 'warning', 'message' => 'Menunggu Respon'];
            case 'submitted':
                return ['element' => 'primary', 'message' => 'Dalam Review'];
            case 'accepted':
                return ['element' => 'success', 'message' => 'Diterima'];
            case 'rejected':
                return ['element' => 'danger', 'message' => 'Ditolak'];
            default:
                return ['element' => 'default', 'message' => 'No Status'];
        }
    }

    public function getShortNoteAttribute()
    {
        return Str::limit($this->reviewer_note, 50);
    }

    public function getShortDateAttribute()
    {
        return $this->created_at->format('d M, H:i');
    }

    public function scopeOpen($query)
    {
        return $query->where('status', 'issued');
    }

    public function team()
    {
        return $this->belongsTo('App\Models\Team');
    }
}
