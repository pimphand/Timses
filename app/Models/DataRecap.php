<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DataRecap extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $guarded = [];

    public function details()
    {
        return $this->hasMany(DetailDataRecap::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tps()
    {
        return $this->belongsTo(Tps::class);
    }

    public function village()
    {
        return $this->belongsTo('Laravolt\Indonesia\Models\Village', 'village', 'id');
    }

    public function district()
    {
        return $this->belongsTo('Laravolt\Indonesia\Models\District', 'district', 'id');
    }
}
