<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quest extends Model
{
    protected $table = 'quests';

    protected $appends = [
        'date_diff',
        'is_open',
        'state'
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

    public function scopeOpen($query)
    {
        return $query->where('status', 'issued');
    }
}
