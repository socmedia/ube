<?php

namespace Modules\Lead\Http\Controllers;

use App\Exports\LeadExport;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Maatwebsite\Excel\Facades\Excel;

class LeadController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('lead::index');
    }

    /**
     * Export resource become excel
     *
     * @return excel
     */
    public function exportAsExcel()
    {
        if (request()->date) {
            return Excel::download(new LeadExport(
                request()->input('lead-type'),
                request()->date,
                request()->custom_date
            ), 'lead_' . now()->format('dmYHis') . '.xlsx');
        }

        return abort(404);
    }
}