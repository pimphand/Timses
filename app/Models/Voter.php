<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Voter extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $hidden = ['updated_at', 'deleted_at'];

    protected $guarded = [];

    public function village()
    {
        return $this->belongsTo('Laravolt\Indonesia\Models\Village', 'village_id', 'id');
    }
}
