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
    public $showOverallLandSummaryModal = false;
    public $leased;
    public $growers;
    public $livelihood_program;
    public $unplanted;
    public $additional_lot;
    public $deleted;
    public $darbc_quarry;
    public $compromise;
    public $others;
    public $overall_land_summary_type;
    public $overall_actual_land_summary_type;
    public $overall_actual_land_summary_label;
    public $land_summary_type;
    public $land_summary_value;

    //actual summary
    public $showActualLandSummaryModal = false;
    public $showOverallActualLandSummaryModal = false;
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
    public $overall_title_status_type;
    public $showTitleStatusModal = false;
    public $twc;
    public $twoc;
    public $uwc;
    public $uwoc;
    public $title_status;
    public $selected_municipality;

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

    public $polomolok_area_twc;
    public $polomolok_area_twoc;
    public $polomolok_area_uwc;
    public $polomolok_area_uwoc;

    public $polomolok_total_twc;
    public $polomolok_total_twoc;
    public $polomolok_total_uwc;
    public $polomolok_total_uwoc;

    public $tupi_area_twc;
    public $tupi_area_twoc;
    public $tupi_area_uwc;
    public $tupi_area_uwoc;

    public $tupi_total_twc;
    public $tupi_total_twoc;
    public $tupi_total_uwc;
    public $tupi_total_uwoc;


    public $gensan_area_twc;
    public $gensan_area_twoc;
    public $gensan_area_uwc;
    public $gensan_area_uwoc;

    public $gensan_total_twc;
    public $gensan_total_twoc;
    public $gensan_total_uwc;
    public $gensan_total_uwoc;

    public $total_twc;
    public $total_twoc;
    public $total_uwc;
    public $total_uwoc;


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

    public function showTitleStatusReport($index, $label, $value)
    {
        $this->title_status = $label;
        $this->overall_title_status_type = 'overall';
        switch($index)
        {
            case 0:
            $this->selected_municipality = "POLOMOLOK";
            break;
            case 1:
            $this->selected_municipality = "TUPI";
            break;
            case 2:
            $this->selected_municipality = "GENERAL SANTOS";
            break;
        }

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
        $this->emit('showTitleStatusReportData', $index, $label);
        $this->showTitleStatusModal = true;
    }

    public function showOverallTitleStatusReport($index, $label)
    {
        $this->title_status = $label;
        $this->overall_title_status_type = 'municipality';
        switch($index)
        {
            case 0:
            $this->selected_municipality = "POLOMOLOK";
            break;
            case 1:
            $this->selected_municipality = "TUPI";
            break;
            case 2:
            $this->selected_municipality = "GENERAL SANTOS";
            break;
        }

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
        $this->emit('showOverallTitleStatusReportData', $index, $label);
        $this->showTitleStatusModal = true;
    }

    public function closeModal()
    {
        $refresh;
        $this->showLandSummaryModal = false;
    }

    public function closeOverallModal()
    {
        $refresh;
        $this->showOverallLandSummaryModal = false;
    }

    public function closeActualModal()
    {
        $refresh;
        $this->showActualLandSummaryModal = false;
    }

    public function closeOverAllActualModal()
    {
        $refresh;
        $this->showOverallActualLandSummaryModal = false;
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

    public function overAllAwardedLot($value, $label)
    {
        if($label == 'all')
        {
            $this->overall_actual_land_summary_label = 'Overall';
            switch ($value) {
                case '1':
                    $this->overall_land_summary_type = 'Areas Leased by Dolefil';
                    $this->emit('showOverallReportData', $this->overall_land_summary_type);
                    $this->showOverallLandSummaryModal = true;
                    break;
                case '2':
                    $this->overall_land_summary_type = 'DARBC Growership';
                    $this->emit('showOverallReportData', $this->overall_land_summary_type);
                    $this->showOverallLandSummaryModal = true;
                    break;
                case '3':
                    $this->overall_land_summary_type = 'Livelihood Program';
                    $this->emit('showOverallBasicInformationReportData', $this->overall_land_summary_type);
                    $this->showOverallLandSummaryModal = true;
                    break;
                case '4':
                    $this->overall_land_summary_type = 'Facility';
                    $this->emit('showOverallBasicInformationReportData', $this->overall_land_summary_type);
                    $this->showOverallLandSummaryModal = true;
                    break;
                case '5':
                    $this->overall_land_summary_type = 'Unplanted';
                    $this->emit('showOverallBasicInformationReportData', $this->overall_land_summary_type);
                    $this->showOverallLandSummaryModal = true;
                    break;
                case '6':
                    $this->overall_land_summary_type = 'Additional Lot';
                    $this->emit('showOverallBasicInformationReportData', $this->overall_land_summary_type);
                    $this->showOverallLandSummaryModal = true;
                    break;
                case '7':
                    $this->overall_land_summary_type = 'Deleted Area';
                    $this->emit('showOverallBasicInformationReportData', $this->overall_land_summary_type);
                    $this->showOverallLandSummaryModal = true;
                    break;
                case '8':
                    $this->overall_land_summary_type = 'DARBC Quarry';
                    $this->emit('showOverallBasicInformationReportData', $this->overall_land_summary_type);
                    $this->showOverallLandSummaryModal = true;
                    break;
                case '9':
                    $this->overall_actual_land_summary_type = 'Loss in Case';
                    $this->emit('showOverallActualReportData', $this->overall_actual_land_summary_type);
                    $this->showOverallActualLandSummaryModal = true;
                    break;
                case '10':
                    $this->overall_actual_land_summary_type = 'Cancelled CLOA';
                    $this->emit('showOverallActualReportData', $this->overall_actual_land_summary_type);
                    $this->showOverallActualLandSummaryModal = true;
                    break;
                case '11':
                    $this->overall_actual_land_summary_type = 'Exchange Lot';
                    $this->emit('showOverallActualReportData', $this->overall_actual_land_summary_type);
                    $this->showOverallActualLandSummaryModal = true;
                    break;
                case '12':
                    $this->overall_actual_land_summary_type = 'Free Lot';
                    $this->emit('showOverallActualReportData', $this->overall_actual_land_summary_type);
                    $this->showOverallActualLandSummaryModal = true;
                    break;
                case '13':
                    $this->overall_actual_land_summary_type = 'Compromise Agreement';
                    $this->emit('showOverallActualReportData', $this->overall_actual_land_summary_type);
                    $this->showOverallActualLandSummaryModal = true;
                    break;
                case '14':
                    $this->overall_actual_land_summary_type = 'DARBC Projects';
                    $this->emit('showOverallActualReportData', $this->overall_actual_land_summary_type);
                    $this->showOverallActualLandSummaryModal = true;
                    break;
            }
        }elseif($label == 'polomolok'){
            $this->overall_actual_land_summary_label = 'Polomolok';
            switch ($value) {
                case '1':
                    $this->overall_actual_land_summary_type = 'Loss in Case';
                    $this->emit('showOverallActualReportDataPolomolok', $this->overall_actual_land_summary_type);
                    $this->showOverallActualLandSummaryModal = true;
                    break;
                case '2':
                    $this->overall_actual_land_summary_type = 'Cancelled CLOA';
                    $this->emit('showOverallActualReportDataPolomolok', $this->overall_actual_land_summary_type);
                    $this->showOverallActualLandSummaryModal = true;
                    break;
                case '3':
                    $this->overall_actual_land_summary_type = 'Exchange Lot';
                    $this->emit('showOverallActualReportDataPolomolok', $this->overall_actual_land_summary_type);
                    $this->showOverallActualLandSummaryModal = true;
                    break;
                case '4':
                    $this->overall_actual_land_summary_type = 'Free Lot';
                    $this->emit('showOverallActualReportDataPolomolok', $this->overall_actual_land_summary_type);
                    $this->showOverallActualLandSummaryModal = true;
                    break;
                case '5':
                    $this->overall_actual_land_summary_type = 'Compromise Agreement';
                    $this->emit('showOverallActualReportDataPolomolok', $this->overall_actual_land_summary_type);
                    $this->showOverallActualLandSummaryModal = true;
                    break;
                case '6':
                    $this->overall_actual_land_summary_type = 'DARBC Projects';
                    $this->emit('showOverallActualReportDataPolomolok', $this->overall_actual_land_summary_type);
                    $this->showOverallActualLandSummaryModal = true;
                    break;
            }
        }elseif($label == 'tupi'){
            $this->overall_actual_land_summary_label = 'Tupi';
            switch ($value) {
                case '1':
                    $this->overall_actual_land_summary_type = 'Loss in Case';
                    $this->emit('showOverallActualReportDataTupi', $this->overall_actual_land_summary_type);
                    $this->showOverallActualLandSummaryModal = true;
                    break;
                case '2':
                    $this->overall_actual_land_summary_type = 'Cancelled CLOA';
                    $this->emit('showOverallActualReportDataTupi', $this->overall_actual_land_summary_type);
                    $this->showOverallActualLandSummaryModal = true;
                    break;
                case '3':
                    $this->overall_actual_land_summary_type = 'Exchange Lot';
                    $this->emit('showOverallActualReportDataTupi', $this->overall_actual_land_summary_type);
                    $this->showOverallActualLandSummaryModal = true;
                    break;
                case '4':
                    $this->overall_actual_land_summary_type = 'Free Lot';
                    $this->emit('showOverallActualReportDataTupi', $this->overall_actual_land_summary_type);
                    $this->showOverallActualLandSummaryModal = true;
                    break;
                case '5':
                    $this->overall_actual_land_summary_type = 'Compromise Agreement';
                    $this->emit('showOverallActualReportDataTupi', $this->overall_actual_land_summary_type);
                    $this->showOverallActualLandSummaryModal = true;
                    break;
                case '6':
                    $this->overall_actual_land_summary_type = 'DARBC Projects';
                    $this->emit('showOverallActualReportDataTupi', $this->overall_actual_land_summary_type);
                    $this->showOverallActualLandSummaryModal = true;
                    break;
            }
        }elseif($label == 'gensan'){
            $this->overall_actual_land_summary_label = 'General Santos';
            switch ($value) {
                case '1':
                    $this->overall_actual_land_summary_type = 'Loss in Case';
                    $this->emit('showOverallActualReportDataGensan', $this->overall_actual_land_summary_type);
                    $this->showOverallActualLandSummaryModal = true;
                    break;
                case '2':
                    $this->overall_actual_land_summary_type = 'Cancelled CLOA';
                    $this->emit('showOverallActualReportDataGensan', $this->overall_actual_land_summary_type);
                    $this->showOverallActualLandSummaryModal = true;
                    break;
                case '3':
                    $this->overall_actual_land_summary_type = 'Exchange Lot';
                    $this->emit('showOverallActualReportDataGensan', $this->overall_actual_land_summary_type);
                    $this->showOverallActualLandSummaryModal = true;
                    break;
                case '4':
                    $this->overall_actual_land_summary_type = 'Free Lot';
                    $this->emit('showOverallActualReportDataGensan', $this->overall_actual_land_summary_type);
                    $this->showOverallActualLandSummaryModal = true;
                    break;
                case '5':
                    $this->overall_actual_land_summary_type = 'Compromise Agreement';
                    $this->emit('showOverallActualReportDataGensan', $this->overall_actual_land_summary_type);
                    $this->showOverallActualLandSummaryModal = true;
                    break;
                case '6':
                    $this->overall_actual_land_summary_type = 'DARBC Projects';
                    $this->emit('showOverallActualReportDataGensan', $this->overall_actual_land_summary_type);
                    $this->showOverallActualLandSummaryModal = true;
                    break;
            }
        }

    }



    public function mount()
    {
        // $this->leased = Actual::sum('dolephil_leased');
        // $this->growers = Actual::sum('darbc_grower');
        $this->leased = BasicInformation::whereHas('actuals', function($query) {
            $query->where('land_status', 'LEASED');
        })->sum('title_area');
        $this->growers = BasicInformation::whereHas('actuals', function($query) {
            $query->where('land_status', 'GROWERS');
        })->sum('title_area');
        $this->livelihood_program = BasicInformation::where('status_id', 7)->sum('title_area');
        $this->facility = BasicInformation::where('status_id', 8)->sum('title_area');
        $this->unplanted = BasicInformation::where('status_id', 9)->sum('title_area');
        $this->additional_lot = BasicInformation::where('status_id', 10)->sum('title_area');
        $this->deleted = BasicInformation::where('status_id', 11)->sum('title_area');
        $this->darbc_quarry = BasicInformation::where('status_id', 12)->sum('title_area');

        $this->compromise = Actual::where('land_status', 'Compromise Agreement')->count();
        $this->others = Actual::where('land_status', 'Others')->count();
        $this->gross = Actual::sum('gross_area');
        $this->planted = Actual::sum('planted_area');
        $this->gulley = Actual::sum('gulley_area');
        $this->total = Actual::sum('total_area');

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
        $this->polomolok_area_twc = BasicInformation::where('title_status_id', 1)->where('municipality', 'like', '%' . 'Polomolok' . '%')->sum('title_area');
        $this->polomolok_area_twoc = BasicInformation::where('title_status_id', 2)->where('municipality', 'like', '%' . 'Polomolok' . '%')->sum('title_area');
        $this->polomolok_area_uwc = BasicInformation::where('title_status_id', 3)->where('municipality', 'like', '%' . 'Polomolok' . '%')->sum('title_area');
        $this->polomolok_area_uwoc = BasicInformation::where('title_status_id', 4)->where('municipality', 'like', '%' . 'Polomolok' . '%')->sum('title_area');
        $this->total_polomolok = $this->polomolok_area_twc + $this->polomolok_area_twoc + $this->polomolok_area_uwc + $this->polomolok_area_uwoc;
        //$this->total_polomolok = BasicInformation::where('municipality', 'like', '%' . 'Polomolok' . '%')->sum('title_area');
        $this->polomolok_loss_in_case = BasicInformation::where('municipality', 'like', '%' . 'Polomolok' . '%')->where('status_id', 1)->sum('title_area');
        $this->polomolok_cancelled_cloa = BasicInformation::where('municipality', 'like', '%' . 'Polomolok' . '%')->where('status_id', 2)->sum('title_area');
        $this->polomolok_exchange_lot = BasicInformation::where('municipality', 'like', '%' . 'Polomolok' . '%')->where('status_id', 3)->sum('title_area');
        $this->polomolok_free_lot = BasicInformation::where('municipality', 'like', '%' . 'Polomolok' . '%')->where('status_id', 4)->sum('title_area');
        $this->polomolok_compromise_agreement = BasicInformation::where('municipality', 'like', '%' . 'Polomolok' . '%')->where('status_id', 5)->sum('title_area');
        $this->polomolok_darbc_projects = BasicInformation::where('municipality', 'like', '%' . 'Polomolok' . '%')->where('status_id', 6)->sum('title_area');
        $this->total_deduction_title_area_polomolok = $this->polomolok_loss_in_case +
        $this->polomolok_cancelled_cloa + $this->polomolok_exchange_lot + $this->polomolok_free_lot +
        $this->polomolok_compromise_agreement + $this->polomolok_darbc_projects;

        $total_pol_twc = $this->polomolok_area_twc - $this->total_deduction_title_area_polomolok;
        $total_pol_twoc = $this->polomolok_area_twoc - $this->total_deduction_title_area_polomolok;
        $total_pol_uwc = $this->polomolok_area_uwc - $this->total_deduction_title_area_polomolok;
        $total_pol_uwoc = $this->polomolok_area_uwoc - $this->total_deduction_title_area_polomolok;

        $this->polomolok_total_twc = $total_pol_twc < 0 ? 0 : $total_pol_twc;
        $this->polomolok_total_twoc = $total_pol_twoc < 0 ? 0 : $total_pol_twoc;
        $this->polomolok_total_uwc = $total_pol_uwc < 0 ? 0 : $total_pol_uwc;
        $this->polomolok_total_uwoc = $total_pol_uwoc < 0 ? 0 : $total_pol_uwoc;


        //tupi area total
        $this->tupi_area_twc = BasicInformation::where('title_status_id', 1)->where('municipality', 'like', '%' . 'TUPI' . '%')->sum('title_area');
        $this->tupi_area_twoc = BasicInformation::where('title_status_id', 2)->where('municipality', 'like', '%' . 'TUPI' . '%')->sum('title_area');
        $this->tupi_area_uwc = BasicInformation::where('title_status_id', 3)->where('municipality', 'like', '%' . 'TUPI' . '%')->sum('title_area');
        $this->tupi_area_uwoc = BasicInformation::where('title_status_id', 4)->where('municipality', 'like', '%' . 'TUPI' . '%')->sum('title_area');
        $this->total_tupi = $this->tupi_area_twc + $this->tupi_area_twoc + $this->tupi_area_uwc + $this->tupi_area_uwoc;
       // $this->total_tupi = BasicInformation::where('municipality', 'like', '%' . 'TUPI' . '%')->sum('title_area');
        $this->tupi_loss_in_case = BasicInformation::where('municipality', 'like', '%' . 'TUPI' . '%')->where('status_id', 1)->sum('title_area');
        $this->tupi_cancelled_cloa = BasicInformation::where('municipality', 'like', '%' . 'TUPI' . '%')->where('status_id', 2)->sum('title_area');
        $this->tupi_exchange_lot = BasicInformation::where('municipality', 'like', '%' . 'TUPI' . '%')->where('status_id', 3)->sum('title_area');
        $this->tupi_free_lot = BasicInformation::where('municipality', 'like', '%' . 'TUPI' . '%')->where('status_id', 4)->sum('title_area');
        $this->tupi_compromise_agreement = BasicInformation::where('municipality', 'like', '%' . 'TUPI' . '%')->where('status_id', 5)->sum('title_area');
        $this->tupi_darbc_projects = BasicInformation::where('municipality', 'like', '%' . 'TUPI' . '%')->where('status_id', 6)->sum('title_area');
        $this->total_deduction_title_area_tupi = $this->tupi_loss_in_case +
        $this->tupi_cancelled_cloa + $this->tupi_exchange_lot + $this->tupi_free_lot +
        $this->tupi_compromise_agreement + $this->tupi_darbc_projects;

        $total_tupi_twc = $this->tupi_area_twc - $this->total_deduction_title_area_tupi;
        $total_tupi_twoc = $this->tupi_area_twoc - $this->total_deduction_title_area_tupi;
        $total_tupi_uwc = $this->tupi_area_uwc - $this->total_deduction_title_area_tupi;
        $total_tupi_uwoc = $this->tupi_area_uwoc - $this->total_deduction_title_area_tupi;

        $this->tupi_total_twc = $this->tupi_area_twc - $this->total_deduction_title_area_tupi;
        // $this->tupi_total_twc = $total_tupi_twc < 0 ? 0 : $total_tupi_twc;
        $this->tupi_total_twoc = $total_tupi_twoc < 0 ? 0 : $total_tupi_twoc;
        $this->tupi_total_uwc = $total_tupi_uwc < 0 ? 0 : $total_tupi_uwc;
        $this->tupi_total_uwoc = $total_tupi_uwoc < 0 ? 0 : $total_tupi_uwoc;

        //gensan area total
        $this->gensan_area_twc = BasicInformation::where('title_status_id', 1)->where('municipality', 'like', '%' . 'GENERAL SANTOS' . '%')->sum('title_area');
        $this->gensan_area_twoc = BasicInformation::where('title_status_id', 2)->where('municipality', 'like', '%' . 'GENERAL SANTOS' . '%')->sum('title_area');
        $this->gensan_area_uwc = BasicInformation::where('title_status_id', 3)->where('municipality', 'like', '%' . 'GENERAL SANTOS' . '%')->sum('title_area');
        $this->gensan_area_uwoc = BasicInformation::where('title_status_id', 4)->where('municipality', 'like', '%' . 'GENERAL SANTOS' . '%')->sum('title_area');
        $this->total_gensan = $this->gensan_area_twc + $this->gensan_area_twoc + $this->gensan_area_uwc + $this->gensan_area_uwoc;
        // $this->total_gensan = BasicInformation::where('municipality', 'like', '%' . 'GENERAL SANTOS' . '%')->sum('title_area');
        $this->gensan_loss_in_case = BasicInformation::where('municipality', 'like', '%' . 'GENERAL SANTOS' . '%')->where('status_id', 1)->sum('title_area');
        $this->gensan_cancelled_cloa = BasicInformation::where('municipality', 'like', '%' . 'GENERAL SANTOS' . '%')->where('status_id', 2)->sum('title_area');
        $this->gensan_exchange_lot = BasicInformation::where('municipality', 'like', '%' . 'GENERAL SANTOS' . '%')->where('status_id', 3)->sum('title_area');
        $this->gensan_free_lot = BasicInformation::where('municipality', 'like', '%' . 'GENERAL SANTOS' . '%')->where('status_id', 4)->sum('title_area');
        $this->gensan_compromise_agreement = BasicInformation::where('municipality', 'like', '%' . 'GENERAL SANTOS' . '%')->where('status_id', 5)->sum('title_area');
        $this->gensan_darbc_projects = BasicInformation::where('municipality', 'like', '%' . 'GENERAL SANTOS' . '%')->where('status_id', 6)->sum('title_area');
        $this->total_deduction_title_area_gensan = $this->gensan_loss_in_case +
        $this->gensan_cancelled_cloa + $this->gensan_exchange_lot + $this->gensan_free_lot +
        $this->gensan_compromise_agreement + $this->gensan_darbc_projects;

        $total_gen_twc = $this->gensan_area_twc - $this->total_deduction_title_area_gensan;
        $total_gen_twoc = $this->gensan_area_twoc - $this->total_deduction_title_area_gensan;
        $total_gen_uwc = $this->gensan_area_uwc - $this->total_deduction_title_area_gensan;
        $total_gen_uwoc = $this->gensan_area_uwoc - $this->total_deduction_title_area_gensan;

        $this->gensan_total_twc = $total_gen_twc < 0 ? 0 : $total_gen_twc;
        $this->gensan_total_twoc = $total_gen_twoc < 0 ? 0 : $total_gen_twoc;
        $this->gensan_total_uwc = $total_gen_uwc < 0 ? 0 : $total_gen_uwc;
        $this->gensan_total_uwoc = $total_gen_uwoc < 0 ? 0 : $total_gen_uwoc;

        $this->total_twc = $this->polomolok_area_twc + $this->tupi_area_twc + $this->gensan_area_twc;
        $this->total_twoc = $this->polomolok_area_twoc + $this->tupi_area_twoc + $this->gensan_area_twoc;
        $this->total_uwc = $this->polomolok_area_uwc + $this->tupi_area_uwc + $this->gensan_area_uwc;
        $this->total_uwoc = $this->polomolok_area_uwoc + $this->tupi_area_uwoc + $this->gensan_area_uwoc;
        // $this->deleted_land = BasicInformation::where('remarks', 'LIKE','%Loss In Case%')->sum('title_area');
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
