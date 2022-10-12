<?php

namespace App\Exports;

use App\Models\Proposal;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;


class ProposalsExport implements FromView, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        return view('exports.proposals', [
            'proposals' => Proposal::with('users.fraction')->get()
        ]);
    }
}
