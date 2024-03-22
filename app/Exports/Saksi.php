<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class Saksi implements FromCollection, WithHeadings
{
    protected $users;

    public function __construct($users)
    {
        $this->users = $users;
    }

    public function collection()
    {
        return $this->users->map(function ($user) {
            // Ambil TPS pengguna
            $tps = $user->tps;

            return [
                'Email' => $user->email,
                'Password' => $user->token,
                'TPS' => $tps ? $tps->name : '',
                'Kecamatan' => $tps ? $tps->district->name : '',
                'Kelurahan' => $tps ? $tps->village->name : '',
            ];
        });
    }

    public function headings(): array
    {
        return [
            'Email',
            'Password',
            'TPS',
            'Kecamatan',
            'Kelurahan',
        ];
    }
}
