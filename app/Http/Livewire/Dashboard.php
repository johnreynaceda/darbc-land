<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Actual;
use App\Models\BasicInformation;
use Illuminate\Support\Facades\Storage;
class Dashboard extends Component
{
    protected $listeners = ['showReport', 'showActualReport', 'showMunicipalityReport', 'showTitleStatusReport'];
    public $showLandSummaryModal = false;
    public $leased;
    public $unplanted;
    public $growers;
    public $compromise;
    public $others;
    public $land_summary_type;
    public $land_summary_value;

    //actual summary
    public $showActualLandSummaryModal = false;
    public $gross;
    public $planted;
    public $gulley;
    public $total;
    public $facility;
    public $unutilized;
    public $actual_land_summary_type;

    //Municipality
    public $showMunicipalitySummaryModal = false;
    public $polomolok;
    public $tupi;
    public $gensan;
    public $municipality_type;

    //Title Status
    public $showTitleStatusModal = false;
    public $twc;
    public $twoc;
    public $uwc;
    public $uwoc;
    public $title_status;

    //overall land status
    public $loss_in_case;
    public $cancelled_cloa;
    public $deleted_land;
    public $exchange_lot;
    public $free_lot;
    public $compromise_agreement;
    public $darbc_projects;
    public $total_deduction_title_area;


    public function getFileUrl($filename)
    {
        return Storage::url($filename);
    }

    public function showReport($label, $value)
    {
        $this->land_summary_type = $label;
        $this->emit('showReportData', $label);
        $this->showLandSummaryModal = true;
    }

    public function showActualReport($label, $value)
    {
        $this->actual_land_summary_type = $label;
        $this->emit('showActualReportData', $label);
        $this->showActualLandSummaryModal = true;
    }

    public function showMunicipalityReport($label, $value)
    {
        $this->municipality_type = $label;
        $this->emit('showMunicipalityReportData', $label);
        $this->showMunicipalitySummaryModal = true;
    }

    public function showTitleStatusReport($label, $value)
    {
        $this->title_status = $label;
        switch ($label) {
            case 'Titled with CLOA':
                $label = 'TWC';
              break;
            case 'Titled without CLOA':
                $label = 'TWOC';
              break;
            case 'Untitled with CLOA':
                $label = 'UWC';
              break;
              case 'Untitled without CLOA':
                $label = 'UWOC';
              break;
            default:
            $label = 'TWC';
          }
        $this->emit('showTitleStatusReportData', $label);
        $this->showTitleStatusModal = true;
    }

    public function closeModal()
    {
        $refresh;
        $this->showLandSummaryModal = false;
    }

    public function closeActualModal()
    {
        $refresh;
        $this->showActualLandSummaryModal = false;
    }

    public function closeMunicipalityModal()
    {
        $refresh;
        $this->showMunicipalitySummaryModal = false;
    }

    public function closeTitleStatusModal()
    {
        $refresh;
        $this->showTitleStatusModal = false;
    }



    public function mount()
    {
        $this->leased = Actual::where('land_status', 'Leased')->count();
        $this->unplanted = Actual::where('land_status', 'Unplanted')->count();
        $this->growers = Actual::where('land_status', 'Growers')->count();
        $this->compromise = Actual::where('land_status', 'Compromise Agreement')->count();
        $this->deleted = Actual::where('land_status', 'Deleted')->count();
        $this->others = Actual::where('land_status', 'Others')->count();
        $this->gross = Actual::sum('gross_area');
        $this->planted = Actual::sum('planted_area');
        $this->gulley = Actual::sum('gulley_area');
        $this->total = Actual::sum('total_area');
        $this->facility = Actual::sum('facility_area');
        $this->unutilized = Actual::sum('unutilized_area');
        $this->polomolok = BasicInformation::where('municipality', 'like', '%' . 'POLOMOLOK' . '%')->count();
        $this->tupi = BasicInformation::where('municipality', 'like', '%' . 'TUPI' . '%')->count();
        $this->gensan = BasicInformation::where('municipality', 'like', '%' . 'GENERAL SANTOS' . '%')->count();
        $this->twc = BasicInformation::where('title_status', 'TWC')->count();
        $this->twoc = BasicInformation::where('title_status', 'TWOC')->count();
        $this->uwc = BasicInformation::where('title_status', 'UWC')->count();
        $this->uwoc = BasicInformation::where('title_status', 'UWOC')->count();


        //overall land status
        $this->loss_in_case = BasicInformation::where('status_id', 1)->sum('title_area');
        $this->cancelled_cloa = BasicInformation::where('status_id', 2)->sum('title_area');
        $this->exchange_lot = BasicInformation::where('status_id', 3)->sum('title_area');
        $this->free_lot = BasicInformation::where('status_id', 4)->sum('title_area');
        $this->compromise_agreement = BasicInformation::where('status_id', 5)->sum('title_area');
        $this->darbc_projects = BasicInformation::where('status_id', 6)->sum('title_area');
        $this->total_deduction_title_area = $this->loss_in_case + $this->cancelled_cloa + $this->exchange_lot + $this->free_lot
        + $this->compromise_agreement + $this->darbc_projects;
        // $this->deleted_land = BasicInformation::where('remarks', 'LIKE','%Loss In Case%')->sum('title_area');
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
