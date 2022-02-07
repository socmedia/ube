<?php

namespace App\Http\Livewire\Lead;

use App\Constants\LeadStatus;
use App\Constants\LeadTypes;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Lead\Entities\Lead;

class Table extends Component
{
    use WithPagination;

    public $perPage = 10, $dateStart = '', $dateEnd = '', $search = '', $type = '';

    public function getAll($type, $date, $search)
    {
        $lead = Lead::orderBy('created_at', 'desc');

        if ($type !== '') {
            $lead->where('lead_type', $type);
        }

        if ($date[0] !== '' && $date[1] === '') {
            $lead->where('created_at', 'like', '%' . $date[0] . '%');
        }

        if ($date[0] !== '' && $date[1] !== '') {
            $lead->whereBetween('created_at', [$date[0] . ' 00:00:00', $date[1] . ' 00:00:00']);
        }

        if ($search !== '') {
            $lead->where(function ($lead) use ($search) {
                $lead->where('name', 'like', '%' . $search . '%')
                    ->orWhere('phone', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%')
                    ->orWhere('address', 'like', '%' . $search . '%')
                    ->orWhere('created_at', 'like', '%' . $search . '%');
            });
        }

        return $lead->simplePaginate($this->perPage);
    }

    public function updateStatus($id, $status)
    {
        $lead = Lead::find($id);
        $lead->status = $status;
        $lead->save();

        $this->dispatchBrowserEvent('status-updated', 'Status lead berhasil diperbarui.');
    }

    public function isReaded($id)
    {
        $lead = Lead::find($id);
        $lead->is_readed = $lead->is_readed === 1 ? 0 : 1;
        $lead->save();
    }

    public function preview($id)
    {
        $lead = Lead::find($id);
        $lead->is_readed = 1;
        $lead->save();
        $this->dispatchBrowserEvent('preview-mode', $lead ? $lead : 'Lead tidak ditemukan.');
    }

    public function render(LeadTypes $leadTypes)
    {
        return view('livewire.lead.table', [
            'leads' => $this->getAll(
                $this->type,
                [
                    $this->dateStart,
                    $this->dateEnd,
                ],
                $this->search
            ),
            'statusLabel' => new LeadStatus(),
            'types' => $leadTypes->getAll(),
        ]);
    }
}