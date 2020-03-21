<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class Helpdesk extends Model
{
    protected $table = 'helpdesks';

    protected $appends = [
        'is_available',
        'workdays_name',
        'status',
        'help_pretty',
    ];

    public function getWorkdaysAttribute($value)
    {
        return array_map('intval', explode(',', $value));
    }

    public function setWorkdaysAttribute($value)
    {
        $this->attributes['workdays'] = implode(',', $value);
    }

    public function getWorkdaysNameAttribute()
    {
        $workdays = $this->workdays;
        $daysName = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
        
        return array_map(function ($dayIndex) use ($daysName) {
            return ((--$dayIndex) >= 0) ? $daysName[$dayIndex] : null;
        }, $workdays);
    }

    public function getFromAttribute($value)
    {
        return Str::is('*:*', $value) ? explode(':', $value) : ['00', '00']; 
    }

    public function getToAttribute($value)
    {
        return Str::is('*:*', $value) ? explode(':', $value) : ['00', '00']; 
    }

    public function getIsAvailableAttribute()
    {
        /*
            Here we make an assumption that if the workdays is not specificied 
            (or incorrectly formed), then it might supposed to be a non-human support 
            helpdesk. So, we'll make it always available
        */

        $workdays = $this->workdays;
        $fromHour = Carbon::createFromTime($this->from[0], $this->from[1], 0);
        $toHour = Carbon::createFromTime($this->to[0], $this->to[1], 0);

        $isHumanSupport = (!in_array(0, $workdays));
        $isInWorkingDays = in_array(now()->dayOfWeekIso, $workdays);
        $isInWorkingHours = now()->between($fromHour, $toHour) ? true : false;

        if ($isHumanSupport) {
            return $isInWorkingDays ? $isInWorkingHours : false;
        }

        // Always available for non human support
        return true;
    }

    public function getStatusAttribute()
    {
        if ($this->is_available) {
            return ['element' => 'success', 'message' => 'Tersedia'];
        } else {
            return ['element' => 'secondary', 'message' => 'Sedang Istirahat'];
        }
    }

    public function getHelpPrettyAttribute()
    {
        $operationDays = value(function () {
            $workdays = $this->workdays_name;

            if (count($workdays) == 1) {
                return $workdays[0];
            } else if (count($workdays) > 1) {
                $firstDay = $workdays[0];
                $lastDay = $workdays[array_key_last($workdays)];
                return "$firstDay - $lastDay";
            }
        });
        
        $operationHours = value(function () {
            return implode(':', $this->from) . ' - ' . implode(':', $this->to);
        });

        $placeholder = 'Tersedia ? ?';
        $daysWord = $operationDays ?? 'Setiap Hari';
        $hoursWord = ($operationHours == '00:00 - 00:00') ? '' : 'Jam ' . $operationHours;

        return Str::replaceArray('?', [$daysWord, $hoursWord], $placeholder);
    }
}
