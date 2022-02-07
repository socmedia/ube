<?php

namespace App\Exports;

use Illuminate\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Modules\Lead\Entities\Lead;

class LeadExport implements FromView
{
    public $type, $date, $dateRange;

    /**
     * Class constructor.
     */
    public function __construct($type, $date, $dateRange)
    {
        $this->type = $type;
        $this->date = $date;
        $this->dateRange = $dateRange;
    }

    public function findLead($type, $date, $dateRange)
    {

        $lead = Lead::orderBy('created_at', 'asc');

        if ($type !== 'all') {
            $lead->where('lead_type', $type);
        }

        if ($date === 'today') {
            $lead->where('created_at', 'like', '%' . now()->format('y-m-d') . '%');
        }

        if ($date === 'this_week') {
            $lead->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()]);
        }

        if ($date === 'this_month') {
            $lead->whereBetween('created_at', [now()->startOfMonth(), now()->endOfMonth()]);
        }

        if ($date === 'custom') {
            if (count(explode(' - ', $dateRange)) == 2) {
                $lead->whereRaw('created_at BETWEEN "' . explode(' - ', $dateRange)[0] . ' 00:00:00" AND "' . explode(' - ', $dateRange)[1] . ' 23:59:59"');
            }
        }

        return $lead->get();
    }

    public function view(): View
    {
        return view('lead::export.excel', [
            'leads' => $this->findLead($this->type, $this->date, $this->dateRange),
        ]);
    }
}