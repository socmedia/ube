<?php

namespace App\Http\Livewire\Dashboard;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Modules\Dashboard\Transformers\LeadResource;
use Modules\Lead\Entities\Lead as LeadEntities;

class Lead extends Component
{
    protected $listeners = [
        'initChart',
    ];

    public function initChart()
    {
        $this->dispatchBrowserEvent('initChart', $this->leadResource('true'));
    }

    public function leadResource($isChard)
    {
        if ($isChard === 'true') {
            return new LeadResource([
                'count' => [
                    $this->countLead('perMonth', '01'),
                    $this->countLead('perMonth', '02'),
                    $this->countLead('perMonth', '03'),
                    $this->countLead('perMonth', '04'),
                    $this->countLead('perMonth', '05'),
                    $this->countLead('perMonth', '06'),
                    $this->countLead('perMonth', '07'),
                    $this->countLead('perMonth', '08'),
                    $this->countLead('perMonth', '09'),
                    $this->countLead('perMonth', '10'),
                    $this->countLead('perMonth', '11'),
                    $this->countLead('perMonth', '12'),
                ],
            ]);
        }

        return [
            [
                'label' => 'Total Lead ' . date('Y'),
                'data' => $this->countLead('thisYear'),
            ],
            [
                'label' => 'Lead Bulan Ini',
                'data' => $this->countLead('thisMonth'),
            ],
            [
                'label' => 'Lead Minggu Ini',
                'data' => $this->countLead('thisWeek'),
            ],
            [
                'label' => 'Lead Minggu Lalu',
                'data' => $this->countLead('previousWeek'),
            ],
        ];
    }

    public function event($request)
    {
        if ($request->gender === 'true') {
            return new LeadResource([
                $this->countEventLead($request->event, 'gender'),
            ]);
        }

        if ($request->age === 'true') {
            return new LeadResource([
                $this->countEventLead($request->event, 'age'),
            ]);
        }
    }

    public function countLead($date = '', $month = '')
    {
        $lead = LeadEntities::select('id');

        $this->overview($date, $lead);
        $this->overview($date, $lead, $month);

        return $lead->count();
    }

    public function countEventLead(string $eventName, string $column, $attribute = '', $value = '')
    {
        $lead = DB::table('leads')
            ->where('lead_type', $eventName)
            ->select($column, DB::raw('count(*) as total'))
            ->groupBy($column);

        return $lead->get()->pluck('total', $column);
    }

    public function overview($date, $collection, $month = '')
    {
        $startOfMonth = now()->startOfMonth()->toDateTimeString();
        $endOfMonth = now()->endOfMonth()->toDateTimeString();
        $startOfWeek = now()->startOfWeek()->toDateTimeString();
        $endOfWeek = now()->endOfWeek()->toDateTimeString();
        $startOfPreviousWeek = now()->startOfWeek()->subWeek()->toDateTimeString();
        $endOfPreviousWeek = now()->endOfWeek()->subWeek()->toDateTimeString();

        switch ($date) {
            case 'thisMonth':
                $collection->whereRaw('created_at BETWEEN "' . $startOfMonth . '" AND "' . $endOfMonth . '"');
                break;
            case 'thisWeek':
                $collection->whereRaw('created_at BETWEEN "' . $startOfWeek . '" AND "' . $endOfWeek . '"');
                break;
            case 'previousWeek':
                $collection->whereRaw('created_at BETWEEN "' . $startOfPreviousWeek . '" AND "' . $endOfPreviousWeek . '"');
                break;
            case 'thisYear':
                $collection->where('created_at', 'like', '%' . date('Y-') . '%');
                break;
            case 'perMonth':
                $collection->where('created_at', 'like', '%' . date('Y-' . $month) . '%');
                break;
        }
    }

    public function render()
    {
        return view('livewire.dashboard.lead', [
            'leads' => $this->leadResource('false'),
        ]);
    }
}