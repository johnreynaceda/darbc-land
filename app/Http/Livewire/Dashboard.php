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
    public $total_polomolok;
    public $tupi;
    public $total_tupi;
    public $gensan;
    public $total_gensan;
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

    //per municipality
    public $polomolok_loss_in_case;
    public $polomolok_cancelled_cloa;
    public $polomolok_exchange_lot;
    public $polomolok_free_lot;
    public $polomolok_compromise_agreement;
    public $polomolok_darbc_projects;
    public $total_deduction_title_area_polomolok;

    public $tupi_loss_in_case;
    public $tupi_cancelled_cloa;
    public $tupi_exchange_lot;
    public $tupi_free_lot;
    public $tupi_compromise_agreement;
    public $tupi_darbc_projects;
    public $total_deduction_title_area_tupi;

    public $gensan_loss_in_case;
    public $gensan_cancelled_cloa;
    public $gensan_exchange_lot;
    public $gensan_free_lot;
    public $gensan_compromise_agreement;
    public $gensan_darbc_projects;
    public $total_deduction_title_area_gensan;


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

        //polomolok area total
        $this->total_polomolok = BasicInformation::where('municipality', 'like', '%' . 'Polomolok' . '%')->sum('title_area');
        $this->polomolok_loss_in_case = BasicInformation::where('municipality', 'like', '%' . 'Polomolok' . '%')->where('status_id', 1)->sum('title_area');
        $this->polomolok_cancelled_cloa = BasicInformation::where('municipality', 'like', '%' . 'Polomolok' . '%')->where('status_id', 2)->sum('title_area');
        $this->polomolok_exchange_lot = BasicInformation::where('municipality', 'like', '%' . 'Polomolok' . '%')->where('status_id', 3)->sum('title_area');
        $this->polomolok_free_lot = BasicInformation::where('municipality', 'like', '%' . 'Polomolok' . '%')->where('status_id', 4)->sum('title_area');
        $this->polomolok_compromise_agreement = BasicInformation::where('municipality', 'like', '%' . 'Polomolok' . '%')->where('status_id', 5)->sum('title_area');
        $this->polomolok_darbc_projects = BasicInformation::where('municipality', 'like', '%' . 'Polomolok' . '%')->where('status_id', 6)->sum('title_area');
        $this->total_deduction_title_area_polomolok = $this->polomolok_loss_in_case +
        $this->polomolok_cancelled_cloa + $this->polomolok_exchange_lot + $this->polomolok_free_lot +
        $this->polomolok_compromise_agreement + $this->polomolok_darbc_projects;

        //tupo area total
        $this->total_tupi = BasicInformation::where('municipality', 'like', '%' . 'TUPI' . '%')->sum('title_area');
        $this->tupi_loss_in_case = BasicInformation::where('municipality', 'like', '%' . 'TUPI' . '%')->where('status_id', 1)->sum('title_area');
        $this->tupi_cancelled_cloa = BasicInformation::where('municipality', 'like', '%' . 'TUPI' . '%')->where('status_id', 2)->sum('title_area');
        $this->tupi_exchange_lot = BasicInformation::where('municipality', 'like', '%' . 'TUPI' . '%')->where('status_id', 3)->sum('title_area');
        $this->tupi_free_lot = BasicInformation::where('municipality', 'like', '%' . 'TUPI' . '%')->where('status_id', 4)->sum('title_area');
        $this->tupi_compromise_agreement = BasicInformation::where('municipality', 'like', '%' . 'TUPI' . '%')->where('status_id', 5)->sum('title_area');
        $this->tupi_darbc_projects = BasicInformation::where('municipality', 'like', '%' . 'TUPI' . '%')->where('status_id', 6)->sum('title_area');
        $this->total_deduction_title_area_tupi = $this->tupi_loss_in_case +
        $this->tupi_cancelled_cloa + $this->tupi_exchange_lot + $this->tupi_free_lot +
        $this->tupi_compromise_agreement + $this->tupi_darbc_projects;
        //gensan area total
        $this->total_gensan = BasicInformation::where('municipality', 'like', '%' . 'GENERAL SANTOS' . '%')->sum('title_area');
        $this->gensan_loss_in_case = BasicInformation::where('municipality', 'like', '%' . 'GENERAL SANTOS' . '%')->where('status_id', 1)->sum('title_area');
        $this->gensan_cancelled_cloa = BasicInformation::where('municipality', 'like', '%' . 'GENERAL SANTOS' . '%')->where('status_id', 2)->sum('title_area');
        $this->gensan_exchange_lot = BasicInformation::where('municipality', 'like', '%' . 'GENERAL SANTOS' . '%')->where('status_id', 3)->sum('title_area');
        $this->gensan_free_lot = BasicInformation::where('municipality', 'like', '%' . 'GENERAL SANTOS' . '%')->where('status_id', 4)->sum('title_area');
        $this->gensan_compromise_agreement = BasicInformation::where('municipality', 'like', '%' . 'GENERAL SANTOS' . '%')->where('status_id', 5)->sum('title_area');
        $this->gensan_darbc_projects = BasicInformation::where('municipality', 'like', '%' . 'GENERAL SANTOS' . '%')->where('status_id', 6)->sum('title_area');
        $this->total_deduction_title_area_gensan = $this->gensan_loss_in_case +
        $this->gensan_cancelled_cloa + $this->gensan_exchange_lot + $this->gensan_free_lot +
        $this->gensan_compromise_agreement + $this->gensan_darbc_projects;
        // $this->deleted_land = BasicInformation::where('remarks', 'LIKE','%Loss In Case%')->sum('title_area');
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
