<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Configuration extends Model
{
    protected $table = 'configurations';

    protected $guarded = [];

    protected $casts = [
        'active' => 'boolean',
        'deletable' => 'boolean'
    ];

    protected $appends = [
        'short_date',
        'state',
        'value_short',
        'value_cast'
    ];

    public static function getSupportedTypes($implodeKey = false)
    {
        $data = collect([
            ['key' => 'boolean', 'default' => false, 'caster' => 'boolval', 'text' => 'Boolean'],
            ['key' => 'float', 'default' => false, 'caster' => 'floatval', 'text' => 'Float'],
            ['key' => 'integer', 'default' => false, 'caster' => 'intval', 'text' => 'Integer'],
            ['key' => 'json', 'default' => false, 'caster' => 'json_decode', 'text' => 'JSON String'],
            ['key' => 'string', 'default' => true, 'caster' => 'strval', 'text' => 'String']
        ]);

        return ($implodeKey ? $data->implode('key', ',') : $data);
    }

    public function getShortDateAttribute()
    {
        return $this->created_at->format('d M, H:i');
    }

    public function getStateAttribute()
    {
        if ($this->active)
            return ['element' => 'success', 'message' => 'Enabled'];
        else
            return ['element' => 'secondary', 'message' => 'Disabled'];
    }

    public function getValueShortAttribute()
    {
        return Str::limit($this->value, 50);
    }

    public function getValueCastAttribute()
    {
        foreach (self::getSupportedTypes() as $type) {
            if ($type['key'] == $this->type) {
                return transform($this->value, $type['caster']);
            }
        }

        return $this->value;
    }
}
