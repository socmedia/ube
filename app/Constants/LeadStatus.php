<?php

namespace App\Constants;

class LeadStatus
{
    const STATUS = [
        ['name' => 'Belum Diproses', 'slug_name' => 'belum diproses'],
        ['name' => 'Diproses', 'slug_name' => 'diproses'],
        ['name' => 'Selesai', 'slug_name' => 'selesai'],
    ];

    public function getAll()
    {
        return collect(self::STATUS);
    }

    public function getLabel($status)
    {
        switch ($status) {
            case 'belum diproses':
                return '<small class="px-2 py-1 bg-dark text-white rounded">Belum Diproses</small>';
                break;
            case 'diproses':
                return '<small class="px-2 py-1 bg-primary text-white rounded">Diproses</small>';
                break;
            case 'selesai':
                return '<small class="px-2 py-1 bg-success text-white rounded">Selesai</small>';
                break;

            default:
                return '<small class="px-2 py-1 bg-secondary text-white rounded">-</small>';
                break;
        }
    }

    public function getOnlyLabelClass($status)
    {
        switch ($status) {
            case 'belum diproses':
                return 'px-2 py-1 bg-dark text-white rounded';
                break;
            case 'diproses':
                return 'px-2 py-1 bg-primary text-white rounded';
                break;
            case 'selesai':
                return 'px-2 py-1 bg-success text-white rounded';
                break;

            default:
                return 'px-2 py-1 bg-secondary text-white rounded';
                break;
        }
    }
}