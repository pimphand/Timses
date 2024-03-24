<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $searchableColumns = ['code', 'name', 'city.name'];

    protected $table = 'indonesia_districts';

    public function city()
    {
        return $this->belongsTo('Laravolt\Indonesia\Models\City', 'city_code', 'code');
    }

    public function villages()
    {
        return $this->hasMany('Laravolt\Indonesia\Models\Village', 'district_code', 'code');
    }

    public function getCityNameAttribute()
    {
        return $this->city->name;
    }

    public function getProvinceNameAttribute()
    {
        return $this->city->province->name;
    }

    public function tps()
    {
        return $this->hasMany(Tps::class, 'district_id', 'id');
    }
}
