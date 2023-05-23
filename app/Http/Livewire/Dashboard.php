<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Actual;
class Dashboard extends Component
{
    protected $listeners = ['showReport'];
    public $showLandSummaryModal = false;
    public $leased;
    public $unplanted;
    public $growers;
    public $compromise;
    public $others;
    public $land_summary_type;
    public $land_summary_value;

    public function showReport($label, $value)
    {
        $this->land_summary_type = $label;
        $this->emit('showReportData', $label);
        $this->showLandSummaryModal = true;

    }

    public function closeModal()
    {
        $refresh;
        $this->showLandSummaryModal = false;
    }


    public function mount()
    {
        $this->leased = Actual::where('land_status', 'Leased')->count();
        $this->unplanted = Actual::where('land_status', 'Unplanted')->count();
        $this->growers = Actual::where('land_status', 'Growers')->count();
        $this->compromise = Actual::where('land_status', 'Compromise Agreement')->count();
        $this->deleted = Actual::where('land_status', 'Deleted')->count();
        $this->others = Actual::where('land_status', 'Others')->count();
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
