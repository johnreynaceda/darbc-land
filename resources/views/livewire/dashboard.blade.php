<div class="flex  w-full gap-4">
    <div class="w-4/12">
      <div class="bg-gray-50 rounded-xl p-2 px-4 shadow">
        @php
        //   $leased = App\Models\Actual::where('land_status', 'Leased')->count();
        //   $unplanted = App\Models\Actual::where('land_status', 'Unplanted')->count();
        //   $growers = App\Models\Actual::where('land_status', 'Growers')->count();
        //   $compromise = App\Models\Actual::where('land_status', 'Compromise Agreement')->count();
        //   $deleted = App\Models\Actual::where('land_status', 'Deleted')->count();
        //   $others = App\Models\Actual::where('land_status', 'Others')->count();
        $total_hectars = $leased + $growers + $livelihood_program + $facility + $unplanted + $additional_lot + $deleted + $darbc_quarry;
          //$total_hectars = App\Models\BasicInformation::where('municipality', 'like', '%' . 'Polomolok' . '%')->sum('title_area') + App\Models\BasicInformation::where('municipality', 'like', '%' . 'TUPI' . '%')->sum('title_area');
        @endphp
        <div class="flex justify-between">
            <header class=" font-bold">LAND SUMMARY (Status)</header>
        </div>
        <div>
        <x-modal.card width="xl" align="center" title="Land Summary ({{$land_summary_type}})" blur wire:model="showLandSummaryModal">
            <div>
                <div class="inline-block min-w-full py-2">
                    @switch($land_summary_type)
                        @case('Leased')
                        <div class="flex justify-end py-2">
                            {{-- @php
                                $sum = App\Models\Actual::where('land_status', 'LEASED')->sum('dolephil_leased');
                            @endphp --}}
                            <h1 class="font-semibold text-md">Total Area: {{number_format($leased,2)}}</h1>
                        </div>
                        @break
                        @case('DARBC Growership')
                        <div class="flex justify-end py-2">
                            {{-- @php
                                $sum = App\Models\Actual::where('land_status', 'GROWERS')->sum('darbc_grower');
                            @endphp --}}
                            <h1 class="font-semibold text-md">Total Area: {{number_format($growers,2)}}</h1>
                        </div>
                        @break
                        @case('Livelihood Program')
                        <div class="flex justify-end py-2">
                            {{-- @php
                                $sum = App\Models\Actual::where('land_status', 'UNPLANTED')->sum('owned_but_not_planted');
                            @endphp --}}
                            <h1 class="font-semibold text-md">Total Area: {{number_format($livelihood_program,2)}}</h1>
                        </div>
                        @break
                        @case('Facility')
                        <div class="flex justify-end py-2">
                            {{-- @php
                                $sum = App\Models\Actual::where('land_status', 'COMPROMISE AGREEMENT')->sum('owned_but_not_planted');
                            @endphp --}}
                            <h1 class="font-semibold text-md">Total Area: {{number_format($facility,2)}}</h1>
                        </div>
                        @break
                        @case('Unplanted')
                        <div class="flex justify-end py-2">
                            {{-- @php
                                $sum = App\Models\Actual::where('land_status', 'DELETED')->sum('owned_but_not_planted');
                            @endphp --}}
                            <h1 class="font-semibold text-md">Total Area: {{number_format($unplanted,2)}}</h1>
                        </div>
                        @break
                        @case('Additional Lot')
                        <div class="flex justify-end py-2">
                            {{-- @php
                                $sum = App\Models\Actual::where('land_status', 'OTHERS')->sum('owned_but_not_planted');
                            @endphp --}}
                            <h1 class="font-semibold text-md">Total Area: {{number_format($additional_lot,2)}}</h1>
                        </div>
                        @break
                        @case('Deleted Area')
                        <div class="flex justify-end py-2">
                            {{-- @php
                                $sum = App\Models\Actual::where('land_status', 'OTHERS')->sum('owned_but_not_planted');
                            @endphp --}}
                            <h1 class="font-semibold text-md">Total Area: {{number_format($deleted,2)}}</h1>
                        </div>
                        @break
                        @case('DARBC Quarry')
                        <div class="flex justify-end py-2">
                            {{-- @php
                                $sum = App\Models\Actual::where('land_status', 'OTHERS')->sum('owned_but_not_planted');
                            @endphp --}}
                            <h1 class="font-semibold text-md">Total Area: {{number_format($darbc_quarry,2)}}</h1>
                        </div>
                        @break
                        @default

                    @endswitch
                    @if($land_summary_type == 'Leased' || $land_summary_type == 'DARBC Growership')
                    <livewire:tables.land-summary-table :record="$land_summary_type"/>
                    @else
                    <livewire:tables.land-summary-basic-information-table :record="$land_summary_type"/>
                    @endif
                  </div>
            </div>

            <x-slot name="footer">
                <div class="flex justify-between gap-x-4">
                    <div></div>
                    <div class="flex">
                        <x-button slate label="CLOSE" wire:click="closeModal" />
                    </div>
                </div>
            </x-slot>
        </x-modal.card>
    </div>


    <div>
    <x-modal.card width="xl" align="center" title="Land Summary ({{$overall_land_summary_type}})" blur wire:model="showOverallLandSummaryModal">
        <div>
            <div class="inline-block min-w-full py-2">
                @switch($overall_land_summary_type)
                @case('Areas Leased by Dolefil')
                <div class="flex justify-end py-2">
                    {{-- @php
                        $sum = App\Models\Actual::where('land_status', 'LEASED')->sum('dolephil_leased');
                    @endphp --}}
                    <h1 class="font-semibold text-md">Total Area: {{number_format($leased,2)}}</h1>
                </div>
                @break
                @case('DARBC Growership')
                <div class="flex justify-end py-2">
                    {{-- @php
                        $sum = App\Models\Actual::where('land_status', 'GROWERS')->sum('darbc_grower');
                    @endphp --}}
                    <h1 class="font-semibold text-md">Total Area: {{number_format($growers,2)}}</h1>
                </div>
                @break
                @case('Livelihood Program')
                <div class="flex justify-end py-2">
                    {{-- @php
                        $sum = App\Models\Actual::where('land_status', 'UNPLANTED')->sum('owned_but_not_planted');
                    @endphp --}}
                    <h1 class="font-semibold text-md">Total Area: {{number_format($livelihood_program,2)}}</h1>
                </div>
                @break
                @case('Facility')
                <div class="flex justify-end py-2">
                    {{-- @php
                        $sum = App\Models\Actual::where('land_status', 'COMPROMISE AGREEMENT')->sum('owned_but_not_planted');
                    @endphp --}}
                    <h1 class="font-semibold text-md">Total Area: {{number_format($facility,2)}}</h1>
                </div>
                @break
                @case('Unplanted')
                <div class="flex justify-end py-2">
                    {{-- @php
                        $sum = App\Models\Actual::where('land_status', 'DELETED')->sum('owned_but_not_planted');
                    @endphp --}}
                    <h1 class="font-semibold text-md">Total Area: {{number_format($unplanted,2)}}</h1>
                </div>
                @break
                @case('Additional Lot')
                <div class="flex justify-end py-2">
                    {{-- @php
                        $sum = App\Models\Actual::where('land_status', 'OTHERS')->sum('owned_but_not_planted');
                    @endphp --}}
                    <h1 class="font-semibold text-md">Total Area: {{number_format($additional_lot,2)}}</h1>
                </div>
                @break
                @case('Deleted Area')
                <div class="flex justify-end py-2">
                    {{-- @php
                        $sum = App\Models\Actual::where('land_status', 'OTHERS')->sum('owned_but_not_planted');
                    @endphp --}}
                    <h1 class="font-semibold text-md">Total Area: {{number_format($deleted,2)}}</h1>
                </div>
                @break
                @case('DARBC Quarry')
                <div class="flex justify-end py-2">
                    {{-- @php
                        $sum = App\Models\Actual::where('land_status', 'OTHERS')->sum('owned_but_not_planted');
                    @endphp --}}
                    <h1 class="font-semibold text-md">Total Area: {{number_format($darbc_quarry,2)}}</h1>
                </div>
                @break
            @endswitch
            @if($overall_land_summary_type == 'Areas Leased by Dolefil' || $overall_land_summary_type == 'DARBC Growership')
            <livewire:tables.overall-land-summary-table :record="$overall_land_summary_type"/>
            @else
            <livewire:tables.overall-land-summary-basic-information-table :record="$overall_land_summary_type"/>
            @endif
              </div>
        </div>

        <x-slot name="footer">
            <div class="flex justify-between gap-x-4">
                <div></div>
                <div class="flex">
                    <x-button slate label="CLOSE" wire:click="closeOverallModal" />
                </div>
            </div>
        </x-slot>
    </x-modal.card>
</div>

        <span class="leading-3 text-sm">Total Area in Hectares: {{ number_format($total_hectars, 2) }}</span>
        <div class="mt-2">
          <div wire:ignore>
            <canvas id="land_summary" height="200"></canvas>
          </div>
        </div>
      </div>
      <div class="bg-gray-50  mt-3 rounded-xl p-2 px-4 shadow">
        @php
        //   $gross = App\Models\Actual::sum('gross_area');
        //   $planted = App\Models\Actual::sum('planted_area');
        //   $gulley = App\Models\Actual::sum('gulley_area');
        //   $total = App\Models\Actual::sum('total_area');
        //   $facility = App\Models\Actual::sum('facility_area');
        //   $unutilized = App\Models\Actual::sum('unutilized_area');
        @endphp
        {{-- <header class=" font-bold">ACTUAL LAND SUMMARY </header> --}}
        <header class=" font-bold">OVERALL LAND STATUS</header>
        <x-modal.card width="xl" align="center" title="Actual Land Summary ({{$actual_land_summary_type}})" blur wire:model="showActualLandSummaryModal">
            <div>
                <div class="inline-block min-w-full py-2">
                        @switch($actual_land_summary_type)
                        @case('Loss in Case')
                        <div class="flex justify-end py-2">
                            {{-- @php
                                $sum = App\Models\Actual::with('basic_information')->sum('planted_area');
                            @endphp --}}
                            <h1 class="font-semibold text-md">Total Area: {{number_format($loss_in_case,2)}}</h1>
                        </div>
                        @break
                        @case('Cancelled CLOA')
                        <div class="flex justify-end py-2">
                            {{-- @php
                                $sum = App\Models\Actual::with('basic_information')->sum('gulley_area');
                            @endphp --}}
                            <h1 class="font-semibold text-md">Total Area: {{number_format($cancelled_cloa,2)}}</h1>
                        </div>
                        @break
                        @case('Exchange Lot')
                        <div class="flex justify-end py-2">
                            {{-- @php
                                $sum = App\Models\Actual::with('basic_information')->sum('total_area');
                            @endphp --}}
                            <h1 class="font-semibold text-md">Total Area: {{number_format($exchange_lot,2)}}</h1>
                        </div>
                        @break
                        @case('Free Lot')
                        <div class="flex justify-end py-2">
                            {{-- @php
                                $sum = App\Models\Actual::with('basic_information')->sum('facility_area');
                            @endphp --}}
                            <h1 class="font-semibold text-md">Total Area: {{number_format($free_lot,2)}}</h1>
                        </div>
                        @break
                        @case('Compromise Agreement')
                        <div class="flex justify-end py-2">
                            {{-- @php
                                $sum = App\Models\Actual::with('basic_information')->sum('unutilized_area');
                            @endphp --}}
                            <h1 class="font-semibold text-md">Total Area: {{number_format($compromise_agreement,2)}}</h1>
                        </div>
                        @break
                        @case('DARBC Projects')
                        <div class="flex justify-end py-2">
                            {{-- @php
                                $sum = App\Models\Actual::with('basic_information')->sum('gross_area');
                            @endphp --}}
                            <h1 class="font-semibold text-md">Total Area: {{number_format($darbc_projects,2)}}</h1>
                        </div>
                        @break
                        @default
                        @endswitch
                    <livewire:tables.actual-land-summary-table :record="$actual_land_summary_type"/>
                  </div>
            </div>

            <x-slot name="footer">
                <div class="flex justify-between gap-x-4">
                    <div></div>
                    <div class="flex">
                        <x-button slate label="CLOSE" wire:click="closeActualModal" />
                    </div>
                </div>
            </x-slot>
        </x-modal.card>

        {{-- TOTAL OVERALL LAND STATUS MODAL --}}

        <x-modal.card width="xl" align="center" title="Actual Land Summary ({{$overall_actual_land_summary_type}}) - {{$overall_actual_land_summary_label}}" blur wire:model="showOverallActualLandSummaryModal">
            <div>
                <div class="inline-block min-w-full py-2">
                        @switch($overall_actual_land_summary_type)
                        @case('Loss in Case')
                        <div class="flex justify-end py-2">
                            {{-- @php
                                $sum = App\Models\Actual::with('basic_information')->sum('planted_area');
                            @endphp --}}
                            @if($overall_actual_land_summary_label == 'Overall')
                            <h1 class="font-semibold text-md">Total Area: {{number_format($loss_in_case,2)}}</h1>
                            @elseif($overall_actual_land_summary_label == 'Polomolok')
                            <h1 class="font-semibold text-md">Total Area: {{number_format($polomolok_loss_in_case,2)}}</h1>
                            @elseif($overall_actual_land_summary_label == 'Tupi')
                            <h1 class="font-semibold text-md">Total Area: {{number_format($tupi_loss_in_case,2)}}</h1>
                            @elseif($overall_actual_land_summary_label == 'General Santos')
                            <h1 class="font-semibold text-md">Total Area: {{number_format($gensan_loss_in_case,2)}}</h1>
                            @endif

                        </div>
                        @break
                        @case('Cancelled CLOA')
                        <div class="flex justify-end py-2">
                            {{-- @php
                                $sum = App\Models\Actual::with('basic_information')->sum('gulley_area');
                            @endphp --}}
                            @if($overall_actual_land_summary_label == 'Overall')
                            <h1 class="font-semibold text-md">Total Area: {{number_format($cancelled_cloa,2)}}</h1>
                            @elseif($overall_actual_land_summary_label == 'Polomolok')
                            <h1 class="font-semibold text-md">Total Area: {{number_format($polomolok_cancelled_cloa,2)}}</h1>
                            @elseif($overall_actual_land_summary_label == 'Tupi')
                            <h1 class="font-semibold text-md">Total Area: {{number_format($tupi_cancelled_cloa,2)}}</h1>
                            @elseif($overall_actual_land_summary_label == 'General Santos')
                            <h1 class="font-semibold text-md">Total Area: {{number_format($gensan_cancelled_cloa,2)}}</h1>
                            @endif
                        </div>
                        @break
                        @case('Exchange Lot')
                        <div class="flex justify-end py-2">
                            {{-- @php
                                $sum = App\Models\Actual::with('basic_information')->sum('total_area');
                            @endphp --}}
                            @if($overall_actual_land_summary_label == 'Overall')
                            <h1 class="font-semibold text-md">Total Area: {{number_format($exchange_lot,2)}}</h1>
                            @elseif($overall_actual_land_summary_label == 'Polomolok')
                            <h1 class="font-semibold text-md">Total Area: {{number_format($polomolok_exchange_lot,2)}}</h1>
                            @elseif($overall_actual_land_summary_label == 'Tupi')
                            <h1 class="font-semibold text-md">Total Area: {{number_format($tupi_exchange_lot,2)}}</h1>
                            @elseif($overall_actual_land_summary_label == 'General Santos')
                            <h1 class="font-semibold text-md">Total Area: {{number_format($gensan_exchange_lot,2)}}</h1>
                            @endif


                        </div>
                        @break
                        @case('Free Lot')
                        <div class="flex justify-end py-2">
                            {{-- @php
                                $sum = App\Models\Actual::with('basic_information')->sum('facility_area');
                            @endphp --}}
                            @if($overall_actual_land_summary_label == 'Overall')
                            <h1 class="font-semibold text-md">Total Area: {{number_format($free_lot,2)}}</h1>
                            @elseif($overall_actual_land_summary_label == 'Polomolok')
                            <h1 class="font-semibold text-md">Total Area: {{number_format($polomolok_free_lot,2)}}</h1>
                            @elseif($overall_actual_land_summary_label == 'Tupi')
                            <h1 class="font-semibold text-md">Total Area: {{number_format($tupi_free_lot,2)}}</h1>
                            @elseif($overall_actual_land_summary_label == 'General Santos')
                            <h1 class="font-semibold text-md">Total Area: {{number_format($gensan_free_lot,2)}}</h1>
                            @endif

                        </div>
                        @break
                        @case('Compromise Agreement')
                        <div class="flex justify-end py-2">
                            {{-- @php
                                $sum = App\Models\Actual::with('basic_information')->sum('unutilized_area');
                            @endphp --}}
                            @if($overall_actual_land_summary_label == 'Overall')
                            <h1 class="font-semibold text-md">Total Area: {{number_format($compromise_agreement,2)}}</h1>
                            @elseif($overall_actual_land_summary_label == 'Polomolok')
                            <h1 class="font-semibold text-md">Total Area: {{number_format($polomolok_compromise_agreement,2)}}</h1>
                            @elseif($overall_actual_land_summary_label == 'Tupi')
                            <h1 class="font-semibold text-md">Total Area: {{number_format($tupi_compromise_agreement,2)}}</h1>
                            @elseif($overall_actual_land_summary_label == 'General Santos')
                            <h1 class="font-semibold text-md">Total Area: {{number_format($gensan_compromise_agreement,2)}}</h1>
                            @endif
                        </div>
                        @break
                        @case('DARBC Projects')
                        <div class="flex justify-end py-2">
                            {{-- @php
                                $sum = App\Models\Actual::with('basic_information')->sum('gross_area');
                            @endphp --}}
                            @if($overall_actual_land_summary_label == 'Overall')
                            <h1 class="font-semibold text-md">Total Area: {{number_format($darbc_projects,2)}}</h1>
                            @elseif($overall_actual_land_summary_label == 'Polomolok')
                            <h1 class="font-semibold text-md">Total Area: {{number_format($polomolok_darbc_projects,2)}}</h1>
                            @elseif($overall_actual_land_summary_label == 'Tupi')
                            <h1 class="font-semibold text-md">Total Area: {{number_format($tupi_darbc_projects,2)}}</h1>
                            @elseif($overall_actual_land_summary_label == 'General Santos')
                            <h1 class="font-semibold text-md">Total Area: {{number_format($gensan_darbc_projects,2)}}</h1>
                            @endif
                        </div>
                        @break
                        @default
                        @endswitch
                    <livewire:tables.overall-actual-land-summary-table :record="$overall_actual_land_summary_type"/>
                  </div>
            </div>

            <x-slot name="footer">
                <div class="flex justify-between gap-x-4">
                    <div></div>
                    <div class="flex">
                        <x-button slate label="CLOSE" wire:click="closeOverAllActualModal" />
                    </div>
                </div>
            </x-slot>
        </x-modal.card>

        {{-- END TOTAL OVERALL LAND STATUS --}}

        <span class="leading-3 text-sm text-red-500">Total Area in Hectares: {{ number_format($total_deduction_title_area, 2) }}</span>
        <div class="mt-2">
          <div class="" wire:ignore>
            <canvas id="actual_summary" height="200"></canvas>
          </div>
        </div>
      </div>
      <div class="bg-gray-50  mt-3 rounded-xl p-2 px-4 shadow">
        @php
        //   $polomolok = App\Models\BasicInformation::where('municipality', 'like', '%' . 'Polomolok' . '%')->count();
        //   $tupi = App\Models\BasicInformation::where('municipality', 'like', '%' . 'Tupi' . '%')->count();
        //   $gensan = App\Models\BasicInformation::where('municipality', 'like', '%' . 'GenSan' . '%')->count();
        @endphp
        <header class=" font-bold">MUNICIPALITIES</header>
        <x-modal.card width="xl" align="center" title="Municipality ({{$municipality_type}})" blur wire:model="showMunicipalitySummaryModal">
            <div>
                <div class="inline-block min-w-full py-2">
                    @switch($municipality_type)
                    @case('POLOMOLOK')
                    <div class="flex justify-end py-2">
                        {{-- @php
                            $sum = App\Models\BasicInformation::where('municipality', 'like', '%' . 'POLOMOLOK' . '%')->sum('title_area');
                        @endphp --}}
                        <h1 class="font-semibold text-md">Total Area: {{number_format($total_polomolok,2)}}</h1>
                    </div>
                    @break
                    @case('TUPI')
                    <div class="flex justify-end py-2">
                        {{-- @php
                            $sum = App\Models\BasicInformation::where('municipality', 'like', '%' . 'TUPI' . '%')->sum('title_area');
                        @endphp --}}
                        <h1 class="font-semibold text-md">Total Area: {{number_format($total_tupi,2)}}</h1>
                    </div>
                    @break
                    @case('GENERAL SANTOS')
                    <div class="flex justify-end py-2">
                        {{-- @php
                            $sum = App\Models\BasicInformation::where('municipality', 'like', '%' . 'GENERAL SANTOS' . '%')->sum('title_area');
                        @endphp --}}
                        <h1 class="font-semibold text-md">Total Area in Hectares: {{number_format($total_gensan,2)}}</h1>
                    </div>
                    @break
                    @default
                    @endswitch
                    <livewire:tables.municipality-table :record="$municipality_type"/>
                  </div>
            </div>

            <x-slot name="footer">
                <div class="flex justify-between gap-x-4">
                    <div></div>
                    <div class="flex">
                        <x-button slate label="CLOSE" wire:click="closeMunicipalityModal" />
                    </div>
                </div>
            </x-slot>
        </x-modal.card>
        @php
        $total_awarded_lots = $total_polomolok + $total_tupi + $total_gensan;
       @endphp
        <span class="leading-3 text-sm">Total Area in Hectares: {{ number_format($total_awarded_lots, 2) }}</span>
        <div class="mt-2">
          <div wire:ignore>
            <canvas id="piechart3" height="200"></canvas>
          </div>
        </div>
      </div>
      <div class="bg-gray-50  mt-3 rounded-xl p-2 px-4 shadow">
        @php
        //   $twc = App\Models\BasicInformation::where('title_status', 'TWC')->count();
        //   $twoc = App\Models\BasicInformation::where('title_status', 'TWOC')->count();
        //   $uwc = App\Models\BasicInformation::where('title_status', 'UWC')->count();
        //   $uwoc = App\Models\BasicInformation::where('title_status', 'UWOC')->count();
        @endphp
        <header class=" font-bold">TITLE STATUS</header>
        <x-modal.card width="xl" align="center" title="Title Status ({{$title_status}} - {{$selected_municipality}})" blur wire:model="showTitleStatusModal">
            <div>
                <div class="inline-block min-w-full py-2">
                    @switch($title_status)
                    @case('Titled with CLOA')
                    <div class="flex justify-end py-2">
                        {{-- @php
                            $sum = App\Models\BasicInformation::where('title_status', 'TWC')->sum('title_area');
                        @endphp --}}
                        @if ($selected_municipality == "POLOMOLOK")
                            @if ($overall_title_status_type == 'overall')
                            <h1 class="font-semibold text-md">Total Area: {{number_format($polomolok_total_twc,2)}}</h1>
                            @else
                            <h1 class="font-semibold text-md">Total Area: {{number_format($polomolok_area_twc,2)}}</h1>
                            @endif

                        @elseif ($selected_municipality == "TUPI")
                            @if ($overall_title_status_type == 'overall')
                            <h1 class="font-semibold text-md">Total Area: {{number_format($tupi_total_twc,2)}}</h1>
                            @else
                            <h1 class="font-semibold text-md">Total Area: {{number_format($tupi_area_twc,2)}}</h1>
                            @endif
                        @elseif ($selected_municipality == "GENERAL SANTOS")
                            @if ($overall_title_status_type == 'overall')
                            <h1 class="font-semibold text-md">Total Area: {{number_format($gensan_total_twc,2)}}</h1>
                            @else
                            <h1 class="font-semibold text-md">Total Area: {{number_format($gensan_area_twc,2)}}</h1>
                            @endif
                        @endif
                    </div>
                    @break
                    @case('Titled without CLOA')
                    <div class="flex justify-end py-2">
                        {{-- @php
                            $sum = App\Models\BasicInformation::where('title_status', 'TWOC')->sum('title_area');
                        @endphp --}}
                        @if ($selected_municipality == "POLOMOLOK")
                            @if ($overall_title_status_type == 'overall')
                            <h1 class="font-semibold text-md">Total Area: {{number_format($polomolok_total_twoc,2)}}</h1>
                            @else
                            <h1 class="font-semibold text-md">Total Area: {{number_format($polomolok_area_twoc,2)}}</h1>
                            @endif
                        @elseif ($selected_municipality == "TUPI")
                            @if ($overall_title_status_type == 'overall')
                            <h1 class="font-semibold text-md">Total Area: {{number_format($tupi_total_twoc,2)}}</h1>
                            @else
                            <h1 class="font-semibold text-md">Total Area: {{number_format($tupi_area_twoc,2)}}</h1>
                            @endif
                        @elseif ($selected_municipality == "GENERAL SANTOS")
                            @if ($overall_title_status_type == 'overall')
                            <h1 class="font-semibold text-md">Total Area: {{number_format($gensan_total_twoc,2)}}</h1>
                            @else
                            <h1 class="font-semibold text-md">Total Area: {{number_format($gensan_area_twoc,2)}}</h1>
                            @endif
                        @endif
                    </div>
                    @break
                    @case('Untitled with CLOA')
                    <div class="flex justify-end py-2">
                        {{-- @php
                            $sum = App\Models\BasicInformation::where('title_status', 'UWC')->sum('title_area');
                        @endphp --}}
                        @if ($selected_municipality == "POLOMOLOK")
                            @if ($overall_title_status_type == 'overall')
                            <h1 class="font-semibold text-md">Total Area: {{number_format($polomolok_total_uwc,2)}}</h1>
                            @else
                            <h1 class="font-semibold text-md">Total Area: {{number_format($polomolok_area_uwc,2)}}</h1>
                            @endif
                        @elseif ($selected_municipality == "TUPI")
                            @if ($overall_title_status_type == 'overall')
                            <h1 class="font-semibold text-md">Total Area: {{number_format($tupi_total_uwc,2)}}</h1>
                            @else
                            <h1 class="font-semibold text-md">Total Area: {{number_format($tupi_area_uwc,2)}}</h1>
                            @endif
                        @elseif ($selected_municipality == "GENERAL SANTOS")
                            @if ($overall_title_status_type == 'overall')
                            <h1 class="font-semibold text-md">Total Area: {{number_format($gensan_total_uwc,2)}}</h1>
                            @else
                            <h1 class="font-semibold text-md">Total Area: {{number_format($gensan_area_uwc,2)}}</h1>
                            @endif
                        @endif
                    </div>
                    @break
                    @case('Untitled without CLOA')
                    <div class="flex justify-end py-2">
                        {{-- @php
                            $sum = App\Models\BasicInformation::where('title_status', 'UWOC')->sum('title_area');
                        @endphp --}}
                        @if ($selected_municipality == "POLOMOLOK")
                            @if ($overall_title_status_type == 'overall')
                            <h1 class="font-semibold text-md">Total Area: {{number_format($polomolok_total_uwoc,2)}}</h1>
                            @else
                            <h1 class="font-semibold text-md">Total Area: {{number_format($polomolok_area_uwoc,2)}}</h1>
                            @endif
                        @elseif ($selected_municipality == "TUPI")
                            @if ($overall_title_status_type == 'overall')
                            <h1 class="font-semibold text-md">Total Area: {{number_format($tupi_total_uwoc,2)}}</h1>
                            @else
                            <h1 class="font-semibold text-md">Total Area: {{number_format($tupi_area_uwoc,2)}}</h1>
                            @endif
                        @elseif ($selected_municipality == "GENERAL SANTOS")
                            @if ($overall_title_status_type == 'overall')
                            <h1 class="font-semibold text-md">Total Area: {{number_format($gensan_total_uwoc,2)}}</h1>
                            @else
                            <h1 class="font-semibold text-md">Total Area: {{number_format($gensan_area_uwoc,2)}}</h1>
                            @endif
                        @endif
                    </div>
                    @break
                    @default

                    @endswitch
                    @if ($overall_title_status_type == 'overall')
                    <livewire:tables.title-status-table :record="$title_status"/>
                    @elseif($overall_title_status_type == 'municipality')
                    <livewire:tables.overall-title-status-table :record="$title_status"/>
                    @endif

                  </div>
            </div>

            <x-slot name="footer">
                <div class="flex justify-between gap-x-4">
                    <div></div>
                    <div class="flex">
                        <x-button slate label="CLOSE" wire:click="closeTitleStatusModal" />
                    </div>
                </div>
            </x-slot>
        </x-modal.card>
        @php
          //  $total_title_status = $total_twc + $total_twoc + $total_uwc + $total_uwoc;
            $total_area = $total_polomolok + $total_tupi + $total_gensan;
            $total = $total_area - $total_deduction_title_area;
        @endphp
        <span class="leading-3 text-sm">Total Area in Hectares: {{ number_format($total, 2) }}</span>
        <div class="mt-2">
          <div wire:ignore>
            <canvas id="title_status" height="200"></canvas>
          </div>

          <div class="overflow-x-auto m-3">
            <table class="min-w-full divide-y divide-gray-200">
              <thead>
                <tr>
                  <th class="px-4 py-3 bg-gray-200 text-left text-xs leading-4 font-medium text-gray-600 uppercase tracking-wider"></th>
                  <th class="px-4 py-3 bg-gray-200 text-left text-2xs leading-4 font-medium text-gray-600 uppercase tracking-wider">TWC</th>
                  <th class="px-4 py-3 bg-gray-200 text-left text-2xs leading-4 font-medium text-gray-600 uppercase tracking-wider">TWOC</th>
                  <th class="px-4 py-3 bg-gray-200 text-left text-2xs leading-4 font-medium text-gray-600 uppercase tracking-wider">UWC</th>
                  <th class="px-4 py-3 bg-gray-200 text-left text-2xs leading-4 font-medium text-gray-600 uppercase tracking-wider">UWOC</th>
                </tr>
              </thead>
              <tbody class="bg-white divide-y divide-gray-200">
                <tr>
                  @php
                    $pol_loss_in_case = App\Models\BasicInformation::where('municipality', 'like', '%' . 'POLOMOLOK' . '%')->where('status_id', 1)->count();
                    $pol_cancelled_cloa = App\Models\BasicInformation::where('municipality', 'like', '%' . 'POLOMOLOK' . '%')->where('status_id', 2)->count();
                    $pol_exchange_lot = App\Models\BasicInformation::where('municipality', 'like', '%' . 'POLOMOLOK' . '%')->where('status_id', 3)->count();
                    $pol_free_lot = App\Models\BasicInformation::where('municipality', 'like', '%' . 'POLOMOLOK' . '%')->where('status_id', 4)->count();
                    $pol_comp_aggree = App\Models\BasicInformation::where('municipality', 'like', '%' . 'POLOMOLOK' . '%')->where('status_id', 5)->count();
                    $pol_darbc_project = App\Models\BasicInformation::where('municipality', 'like', '%' . 'POLOMOLOK' . '%')->where('status_id', 6)->count();

                    $pol_total_less = $pol_loss_in_case + $pol_cancelled_cloa + $pol_exchange_lot + $pol_free_lot + $pol_comp_aggree + $pol_darbc_project;

                    $pol_twc_count = App\Models\BasicInformation::where('municipality', 'like', '%' . 'POLOMOLOK' . '%')->where('title_status_id', 1)->where('status_id', null)->count();
                    $pol_twoc_count = App\Models\BasicInformation::where('municipality', 'like', '%' . 'POLOMOLOK' . '%')->where('title_status_id', 2)->where('status_id', null)->count();
                    $pol_uwc_count = App\Models\BasicInformation::where('municipality', 'like', '%' . 'POLOMOLOK' . '%')->where('title_status_id', 3)->where('status_id', null)->count();
                    $pol_uwoc_count = App\Models\BasicInformation::where('municipality', 'like', '%' . 'POLOMOLOK' . '%')->where('title_status_id', 4)->where('status_id', null)->count();

                    $tupi_loss_in_case = App\Models\BasicInformation::where('municipality', 'like', '%' . 'TUPI' . '%')->where('status_id', 1)->count();
                    $tupi_cancelled_cloa = App\Models\BasicInformation::where('municipality', 'like', '%' . 'TUPI' . '%')->where('status_id', 2)->count();
                    $tupi_exchange_lot = App\Models\BasicInformation::where('municipality', 'like', '%' . 'TUPI' . '%')->where('status_id', 3)->count();
                    $tupi_free_lot = App\Models\BasicInformation::where('municipality', 'like', '%' . 'TUPI' . '%')->where('status_id', 4)->count();
                    $tupi_comp_aggree = App\Models\BasicInformation::where('municipality', 'like', '%' . 'TUPI' . '%')->where('status_id', 5)->count();
                    $tupi_darbc_project = App\Models\BasicInformation::where('municipality', 'like', '%' . 'TUPI' . '%')->where('status_id', 6)->count();

                    $tupi_total_less = $tupi_loss_in_case + $tupi_cancelled_cloa + $tupi_exchange_lot + $tupi_free_lot + $tupi_comp_aggree + $tupi_darbc_project;

                    $tupi_twc_count = App\Models\BasicInformation::where('municipality', 'like', '%' . 'TUPI' . '%')->where('title_status_id', 1)->where('status_id', null)->count();
                    $tupi_twoc_count = App\Models\BasicInformation::where('municipality', 'like', '%' . 'TUPI' . '%')->where('title_status_id', 2)->where('status_id', null)->count();
                    $tupi_uwc_count = App\Models\BasicInformation::where('municipality', 'like', '%' . 'TUPI' . '%')->where('title_status_id', 3)->where('status_id', null)->count();
                    $tupi_uwoc_count = App\Models\BasicInformation::where('municipality', 'like', '%' . 'TUPI' . '%')->where('title_status_id', 4)->where('status_id', null)->count();

                    $gensan_loss_in_case = App\Models\BasicInformation::where('municipality', 'like', '%' . 'GENERAL SANTOS' . '%')->where('status_id', 1)->count();
                    $gensan_cancelled_cloa = App\Models\BasicInformation::where('municipality', 'like', '%' . 'GENERAL SANTOS' . '%')->where('status_id', 2)->count();
                    $gensan_exchange_lot = App\Models\BasicInformation::where('municipality', 'like', '%' . 'GENERAL SANTOS' . '%')->where('status_id', 3)->count();
                    $gensan_free_lot = App\Models\BasicInformation::where('municipality', 'like', '%' . 'GENERAL SANTOS' . '%')->where('status_id', 4)->count();
                    $gensan_comp_aggree = App\Models\BasicInformation::where('municipality', 'like', '%' . 'GENERAL SANTOS' . '%')->where('status_id', 5)->count();
                    $gensan_darbc_project = App\Models\BasicInformation::where('municipality', 'like', '%' . 'GENERAL SANTOS' . '%')->where('status_id', 6)->count();

                    $gensan_total_less = $gensan_loss_in_case + $gensan_cancelled_cloa + $gensan_exchange_lot + $gensan_free_lot + $gensan_comp_aggree + $gensan_darbc_project;

                    $gen_twc_count = App\Models\BasicInformation::where('municipality', 'like', '%' . 'GENERAL SANTOS' . '%')->where('title_status_id', 1)->where('status_id', null)->count();
                    $gen_twoc_count = App\Models\BasicInformation::where('municipality', 'like', '%' . 'GENERAL SANTOS' . '%')->where('title_status_id', 2)->where('status_id', null)->count();
                    $gen_uwc_count = App\Models\BasicInformation::where('municipality', 'like', '%' . 'GENERAL SANTOS' . '%')->where('title_status_id', 3)->where('status_id', null)->count();
                    $gen_uwoc_count = App\Models\BasicInformation::where('municipality', 'like', '%' . 'GENERAL SANTOS' . '%')->where('title_status_id', 4)->where('status_id', null)->count();
                  @endphp
                  <td class="px-4 py-4 text-xs whitespace-no-wrap">Polomolok</td>
                  <td class="px-4 py-4 text-xs whitespace-no-wrap">{{$pol_twc_count}}</td>
                  <td class="px-4 py-4 text-xs whitespace-no-wrap">{{$pol_twoc_count}}</td>
                  <td class="px-4 py-4 text-xs whitespace-no-wrap">{{$pol_uwc_count}}</td>
                  <td class="px-4 py-4 text-xs whitespace-no-wrap">{{$pol_uwoc_count}}</td>
                </tr>
                <tr>
                  <td class="px-4 py-4 text-xs whitespace-no-wrap">Tupi</td>
                  <td class="px-4 py-4 text-xs whitespace-no-wrap">{{$tupi_twc_count}}</td>
                  <td class="px-4 py-4 text-xs whitespace-no-wrap">{{$tupi_twoc_count}}</td>
                  <td class="px-4 py-4 text-xs whitespace-no-wrap">{{$tupi_uwc_count}}</td>
                  <td class="px-4 py-4 text-xs whitespace-no-wrap">{{$tupi_uwoc_count}}</td>
                </tr>
                <tr>
                  <td class="px-4 py-4 text-xs whitespace-no-wrap">Gensan</td>
                  <td class="px-4 py-4 text-xs whitespace-no-wrap">{{$gen_twc_count}}</td>
                  <td class="px-4 py-4 text-xs whitespace-no-wrap">{{$gen_twoc_count}}</td>
                  <td class="px-4 py-4 text-xs whitespace-no-wrap">{{$gen_uwc_count}}</td>
                  <td class="px-4 py-4 text-xs whitespace-no-wrap">{{$gen_uwoc_count}}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="flex-1 ">
        <div class="flex justify-center overflow-hidden relative">
            @if (App\Models\MapImage::get()->count() === 0)
            <img src="{{ asset('images/darbcmap3.jpg') }}"  id="img-container" class="h-96 img-zoomable" alt="">
            @else
            @php
                $path = App\Models\MapImage::first()->path;
            @endphp
            <img src="{{ $this->getFileUrl($path) }}"  id="img-container" class="h-96 mb-2 img-zoomable" alt="">
            @endif
        </div>
      <div class="relative">
        <div class="absolute inset-0 flex items-center" aria-hidden="true">
          <div class="w-full border-t border-gray-300"></div>
        </div>
        <div class="relative flex justify-center">
          <div
            class="inline-flex items-center gap-x-1.5 rounded-full bg-white px-3 py-1.5 text-xs font-bold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300">
            TOTAL LANDHOLDINGS
          </div>
        </div>
      </div>
      <div class="mt-2 text-center">
        <h1 class="text-2xl font-bold font-montserrat text-gray-700">
          @php
        //  $total_polomolok = App\Models\BasicInformation::where('municipality', 'like', '%' . 'Polomolok' . '%')->sum('title_area');
            // $total_tupi = App\Models\BasicInformation::where('municipality', 'like', '%' . 'TUPI' . '%')->sum('title_area');
            // $total_gensan = App\Models\BasicInformation::where('municipality', 'like', '%' . 'GENERAL SANTOS' . '%')->sum('title_area');
            $total_area = $total_polomolok + $total_tupi + $total_gensan;
            // $total_area = App\Models\BasicInformation::sum('title_area');
            $total = $total_area - $total_deduction_title_area;
          @endphp
          {{ number_format($total, 2) }}
        </h1>
      </div>
      <div class="mt-5 grid grid-cols-2 gap-5">
        <div>
            <div class="flow-root">
              <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">

                  <table class="min-w-full divide-y divide-gray-300">
                    <thead>
                      <tr>
                        <th scope="col" class="py-2 pl-4 pr-3 text-left text-xs font-semibold text-gray-900 sm:pl-3">
                          STATUS</th>
                        <th scope="col" class="px-3 py-2 text-left text-xs font-semibold text-gray-900">AREA IN
                          HECTARES</th>
                          <th scope="col" class="px-3 py-2 text-left text-xs font-semibold text-gray-900"></th>

                      </tr>
                    </thead>
                    <tbody class="bg-white">
                      <tr>
                        <td class="whitespace-nowrap border-b py-2 pl-4 pr-3 text-xs font-medium text-gray-900 sm:pl-3">
                          Areas Leased by Dolefil</td>
                        <td class="whitespace-nowrap border-b text-center px-3 py-2 text-xs text-gray-500">
                          {{-- {{ number_format(App\Models\Actual::sum('dolephil_leased'), 2) }} --}}
                          {{number_format($leased, 2)}}
                        </td>
                        <td class="whitespace-nowrap border-b px-3 py-2 text-xs text-gray-500">
                          <button wire:click="overAllAwardedLot({{1}}, 'all')">
                            <svg class="w-5 h-5 text-indigo-600 hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                              <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                              <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" clip-rule="evenodd" />
                            </svg>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td class="whitespace-nowrap border-b py-2 pl-4 pr-3 text-xs font-medium text-gray-900 sm:pl-3">
                          DARBC Growership</td>
                        <td class="whitespace-nowrap border-b text-center px-3 py-2 text-xs text-gray-500">
                          {{-- {{ number_format(App\Models\Actual::sum('darbc_grower'), 2) }} --}}
                          {{number_format($growers, 2)}}
                        </td>
                        </td>
                        <td class="whitespace-nowrap border-b px-3 py-2 text-xs text-gray-500">
                          <button wire:click="overAllAwardedLot({{2}}, 'all')">
                            <svg class="w-5 h-5 text-indigo-600 hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                              <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                              <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" clip-rule="evenodd" />
                            </svg>
                          </button>
                        </td>
                      </tr>
                    <tr>
                        <td class="whitespace-nowrap border-b py-2 pl-4 pr-3 text-xs font-medium text-gray-900 sm:pl-3">
                          Livelihood Program</td>
                        <td class="whitespace-nowrap border-b px-3 py-2 text-center text-xs text-gray-500">
                          {{ number_format($livelihood_program, 2) }}
                        </td>
                        <td class="whitespace-nowrap border-b px-3 py-2 text-xs text-gray-500">
                          <button wire:click="overAllAwardedLot({{3}}, 'all')">
                            <svg class="w-5 h-5 text-indigo-600 hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                              <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                              <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" clip-rule="evenodd" />
                            </svg>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td class="whitespace-nowrap border-b py-2 pl-4 pr-3 text-xs font-medium text-gray-900 sm:pl-3">
                          Facility</td>
                        <td class="whitespace-nowrap border-b px-3 py-2 text-center text-xs text-gray-500">
                           {{ number_format(App\Models\BasicInformation::where('status_id', 8)->sum('title_area'), 2) }}
                        </td>
                        <td class="whitespace-nowrap border-b px-3 py-2 text-xs text-gray-500">
                          <button wire:click="overAllAwardedLot({{4}}, 'all')">
                            <svg class="w-5 h-5 text-indigo-600 hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                              <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                              <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" clip-rule="evenodd" />
                            </svg>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td class="whitespace-nowrap border-b py-2 pl-4 pr-3 text-xs font-medium text-gray-900 sm:pl-3">
                          UNPLANTED<small>(AGREED WITH DAR, DARBC & DOLE)</small></td>
                        <td class="whitespace-nowrap border-b px-3 py-2 text-center text-xs text-gray-500">
                          {{ number_format(App\Models\BasicInformation::where('status_id', 9)->sum('title_area'), 2) }}
                        </td>
                        <td class="whitespace-nowrap border-b px-3 py-2 text-xs text-gray-500">
                          <button wire:click="overAllAwardedLot({{5}}, 'all')">
                            <svg class="w-5 h-5 text-indigo-600 hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                              <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                              <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" clip-rule="evenodd" />
                            </svg>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td class="whitespace-nowrap border-b py-2 pl-4 pr-3 text-xs font-medium text-gray-900 sm:pl-3">
                          Additional Lot</td>
                        <td class="whitespace-nowrap border-b px-3 py-2 text-center text-xs text-gray-500">
                           {{ number_format(App\Models\BasicInformation::where('status_id', 10)->sum('title_area'), 2) }}
                        </td>
                        <td class="whitespace-nowrap border-b px-3 py-2 text-xs text-gray-500">
                          <button wire:click="overAllAwardedLot({{6}}, 'all')">
                            <svg class="w-5 h-5 text-indigo-600 hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                              <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                              <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" clip-rule="evenodd" />
                            </svg>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td class="whitespace-nowrap border-b py-2 pl-4 pr-3 text-xs font-medium text-gray-900 sm:pl-3">
                          Deleted Area as Planted Pineapple</td>
                        <td class="whitespace-nowrap border-b px-3 py-2 text-center text-xs text-gray-500">
                           {{ number_format(App\Models\BasicInformation::where('status_id', 11)->sum('title_area'), 2) }}
                        </td>
                        <td class="whitespace-nowrap border-b px-3 py-2 text-xs text-gray-500">
                          <button wire:click="overAllAwardedLot({{7}}, 'all')">
                            <svg class="w-5 h-5 text-indigo-600 hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                              <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                              <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" clip-rule="evenodd" />
                            </svg>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td class="whitespace-nowrap border-b py-2 pl-4 pr-3 text-xs font-medium text-gray-900 sm:pl-3">
                          DARBC Quarry</td>
                        <td class="whitespace-nowrap border-b px-3 text-center py-2 text-xs text-gray-500">
                           {{ number_format(App\Models\BasicInformation::where('status_id', 12)->sum('title_area'), 2) }}
                        </td>
                        <td class="whitespace-nowrap border-b px-3 py-2 text-xs text-gray-500">
                          <button wire:click="overAllAwardedLot({{8}}, 'all')">
                            <svg class="w-5 h-5 text-indigo-600 hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                              <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                              <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" clip-rule="evenodd" />
                            </svg>
                          </button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

        <div>
            <div class="mt-2 flow-root">
              <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                    <div class="p-1 bg-gray-100 text-xs text-red-600 font-bold">
                        <span>TOTAL OVERALL LAND STATUS (LESS) : {{ number_format($total_deduction_title_area, 2) }}</span>
                      </div>
                  <table class="min-w-full divide-y divide-gray-300">
                    <thead>
                      <tr>
                        <th scope="col" class="py-2 pl-4 pr-3 text-left text-xs font-semibold text-gray-900 sm:pl-3">
                          OVERALL LAND STATUS</th>
                        <th scope="col" class="px-3 py-2 text-xs text-center font-semibold text-gray-900">AREA IN
                          HECTARES</th>
                          <th scope="col" class="px-3 py-2 text-left text-xs font-semibold text-gray-900"></th>
                      </tr>
                    </thead>
                    <tbody class="bg-white">
                      <tr>
                        <td class="whitespace-nowrap border-b py-2 pl-4 pr-3 text-xs font-medium text-gray-900 sm:pl-3">
                          Loss in Case</td>
                        <td class="whitespace-nowrap border-b px-3 text-center py-2 text-xs text-red-700">
                          {{ number_format($loss_in_case, 2) }}
                          {{-- ------ --}}
                        </td>
                        <td class="whitespace-nowrap border-b px-3 text-center py-2 text-xs text-red-700">
                          <button wire:click="overAllAwardedLot({{9}}, 'all')">
                            <svg class="w-5 h-5 text-indigo-600 hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                              <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                              <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" clip-rule="evenodd" />
                            </svg>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td class="whitespace-nowrap border-b py-2 pl-4 pr-3 text-xs font-medium text-gray-900 sm:pl-3">
                          Cancelled CLOA</td>
                        <td class="whitespace-nowrap border-b px-3 text-center py-2 text-xs text-red-700">
                          {{ number_format($cancelled_cloa, 2) }}
                          {{-- ------ --}}
                        </td>
                        <td class="whitespace-nowrap border-b px-3 text-center py-2 text-xs text-red-700">
                          <button wire:click="overAllAwardedLot({{10}}, 'all')">
                            <svg class="w-5 h-5 text-indigo-600 hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                              <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                              <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" clip-rule="evenodd" />
                            </svg>
                          </button>
                        </td>
                      </tr>

                      <td class="whitespace-nowrap border-b py-2 pl-4 pr-3 text-xs font-medium text-gray-900 sm:pl-3">
                        Exchange Lot</td>
                      <td class="whitespace-nowrap border-b px-3 text-center py-2 text-xs text-red-700">
                        {{ number_format($exchange_lot, 2) }}
                        {{-- ------ --}}
                      </td>
                      <td class="whitespace-nowrap border-b px-3 text-center py-2 text-xs text-red-700">
                        <button wire:click="overAllAwardedLot({{11}}, 'all')">
                          <svg class="w-5 h-5 text-indigo-600 hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                            <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" clip-rule="evenodd" />
                          </svg>
                        </button>
                      </td>
                      </tr>
                      <tr>
                        <td class="whitespace-nowrap border-b py-2 pl-4 pr-3 text-xs font-medium text-gray-900 sm:pl-3">
                          Free Lot</td>
                        <td class="whitespace-nowrap border-b px-3 text-center py-2 text-xs text-red-700">
                          {{ number_format($free_lot, 2) }}
                          {{-- ------ --}}
                        </td>
                        <td class="whitespace-nowrap border-b px-3 text-center py-2 text-xs text-red-700">
                          <button wire:click="overAllAwardedLot({{12}}, 'all')">
                            <svg class="w-5 h-5 text-indigo-600 hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                              <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                              <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" clip-rule="evenodd" />
                            </svg>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td class="whitespace-nowrap border-b py-2 pl-4 pr-3 text-xs font-medium text-gray-900 sm:pl-3">
                          Compromise Agreement</td>
                        <td class="whitespace-nowrap border-b px-3 text-center py-2 text-xs text-red-700">
                          {{ number_format($compromise_agreement, 2) }}
                          {{-- ------ --}}
                        </td>
                        <td class="whitespace-nowrap border-b px-3 text-center py-2 text-xs text-red-700">
                          <button wire:click="overAllAwardedLot({{13}}, 'all')">
                            <svg class="w-5 h-5 text-indigo-600 hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                              <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                              <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" clip-rule="evenodd" />
                            </svg>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td class="whitespace-nowrap border-b py-2 pl-4 pr-3 text-xs font-medium text-gray-900 sm:pl-3">
                          DARBC Projects</td>
                        <td class="whitespace-nowrap border-b px-3 text-center py-2 text-xs text-red-700">
                          {{ number_format($darbc_projects, 2) }}
                          {{-- ------ --}}
                        </td>
                        <td class="whitespace-nowrap border-b px-3 text-center py-2 text-xs text-red-700">
                          <button wire:click="overAllAwardedLot({{14}}, 'all')">
                            <svg class="w-5 h-5 text-indigo-600 hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                              <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                              <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" clip-rule="evenodd" />
                            </svg>
                          </button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>



        <div>
          <div class="mt-2 flow-root">
            <div class="text-center font-semibold text-lg">
                <span class="text-center mx-auto underline">AWARDED LOT</span>
            </div>

            <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
              <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <div class="p-1 bg-gray-100 text-xs font-bold">
                  {{-- @php
                    $total = App\Models\BasicInformation::where('municipality', 'like', '%' . 'Polomolok' . '%')->sum('title_area');
                  @endphp --}}
                  <span>POLOMOLOK AREA: {{ number_format($total_polomolok, 2) }}</span>
                </div>
                <table class="min-w-full divide-y divide-gray-300">
                  <thead>
                    <tr>
                      <th scope="col" class="py-2 pl-4 pr-3 text-left text-xs font-semibold text-gray-900 sm:pl-3">
                        STATUS</th>
                      <th scope="col" class="px-3 py-2 text-left text-xs font-semibold text-gray-900">AREA IN
                        HECTARES</th>
                      <th scope="col" class="px-3 py-2 text-left text-xs font-semibold text-gray-900">NO. OF LOTS
                      </th>
                      <th scope="col" class="px-3 py-2 text-left text-xs font-semibold text-gray-900"></th>

                    </tr>
                  </thead>
                  <tbody class="bg-white">
                    <tr>
                      <td class="whitespace-nowrap border-b py-2 pl-4 pr-3 text-xs font-medium text-gray-900 sm:pl-3">
                        Titled with CLOA</td>
                      @php
                        $area = App\Models\BasicInformation::where('title_status_id', 1)
                            ->where('municipality', 'like', '%' . 'Polomolok' . '%')
                            ->sum('title_area');
                        $lots = App\Models\BasicInformation::where('title_status_id', 1)
                            ->where('municipality', 'like', '%' . 'Polomolok' . '%')
                            ->count();
                      @endphp
                      <td class="whitespace-nowrap border-b px-3 py-2 text-center text-xs text-gray-500">{{ number_format($area, 2) }}</td>
                      <td class="whitespace-nowrap border-b px-3 py-2 text-center text-xs text-gray-500">{{ $lots }}
                      </td>
                      <td class="whitespace-nowrap border-b px-3 py-2 text-xs text-gray-500">
                        <button wire:click="showOverallTitleStatusReport({{0}}, 'Titled with CLOA')">
                          <svg class="w-5 h-5 text-indigo-600 hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                            <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" clip-rule="evenodd" />
                          </svg>
                        </button>
                      </td>
                    </tr>
                    <tr>
                      <td class="whitespace-nowrap border-b py-2 pl-4 pr-3 text-xs font-medium text-gray-900 sm:pl-3">
                        Titled without CLOA</td>
                      @php
                         $area = App\Models\BasicInformation::where('title_status_id', 2)
                            ->where('municipality', 'like', '%' . 'Polomolok' . '%')
                            ->sum('title_area');
                        $lots = App\Models\BasicInformation::where('title_status_id', 2)
                            ->where('municipality', 'like', '%' . 'Polomolok' . '%')
                            ->count();
                        // $area = App\Models\BasicInformation::whereNotNull('title')
                        //     ->where('cloa_number', '=', 'NO CLOA')
                        //     ->where('municipality', 'like', '%' . 'Polomolok' . '%')
                        //     ->sum('title_area');
                        // $lots = App\Models\BasicInformation::whereNotNull('title')
                        //     ->where('cloa_number', '=', 'NO CLOA')
                        //     ->where('municipality', 'like', '%' . 'Polomolok' . '%')
                        //     ->count();
                      @endphp
                      <td class="whitespace-nowrap border-b px-3 py-2 text-center text-xs text-gray-500">{{ number_format($area, 2) }}</td>
                      <td class="whitespace-nowrap border-b px-3 py-2 text-center text-xs text-gray-500">{{ $lots }}
                      </td>
                      <td class="whitespace-nowrap border-b px-3 py-2 text-xs text-gray-500">
                        <button wire:click="showOverallTitleStatusReport({{0}}, 'Titled without CLOA')">
                          <svg class="w-5 h-5 text-indigo-600 hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                            <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" clip-rule="evenodd" />
                          </svg>
                        </button>
                      </td>
                    </tr>
                    <tr>
                      <td class="whitespace-nowrap border-b py-2 pl-4 pr-3 text-xs font-medium text-gray-900 sm:pl-3">
                        Untitled with CLOA</td>
                      @php
                        $area = App\Models\BasicInformation::where('title_status_id', 3)
                            ->where('municipality', 'like', '%' . 'Polomolok' . '%')
                            ->sum('title_area');

                        $lots = App\Models\BasicInformation::where('title_status_id', 3)
                            ->where('municipality', 'like', '%' . 'Polomolok' . '%')
                            ->count();
                      @endphp
                      <td class="whitespace-nowrap border-b px-3 py-2 text-center text-xs text-gray-500">{{ number_format($area, 2) }}</td>
                      <td class="whitespace-nowrap border-b px-3 py-2 text-center text-xs text-gray-500">{{ $lots }}
                      </td>
                      <td class="whitespace-nowrap border-b px-3 py-2 text-xs text-gray-500">
                        <button wire:click="showOverallTitleStatusReport({{0}}, 'Untitled with CLOA')">
                          <svg class="w-5 h-5 text-indigo-600 hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                            <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" clip-rule="evenodd" />
                          </svg>
                        </button>
                      </td>
                    </tr>
                    <tr>
                      <td class="whitespace-nowrap border-b py-2 pl-4 pr-3 text-xs font-medium text-gray-900 sm:pl-3">
                        Untitled without CLOA</td>
                      @php
                        $area = App\Models\BasicInformation::where('title_status_id', 4)
                            ->where('municipality', 'like', '%' . 'Polomolok' . '%')
                            ->sum('title_area');

                        $lots = App\Models\BasicInformation::where('title_status_id', 4)
                            ->where('municipality', 'like', '%' . 'Polomolok' . '%')
                            ->count();
                      @endphp
                      <td class="whitespace-nowrap border-b px-3 py-2 text-center text-xs text-gray-500">{{ number_format($area, 2) }}</td>
                      <td class="whitespace-nowrap border-b px-3 py-2 text-center text-xs text-gray-500">{{ $lots }}
                      </td>
                      <td class="whitespace-nowrap border-b px-3 py-2 text-xs text-gray-500">
                        <button wire:click="showOverallTitleStatusReport({{0}}, 'Untitled without CLOA')">
                          <svg class="w-5 h-5 text-indigo-600 hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                            <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" clip-rule="evenodd" />
                          </svg>
                        </button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

       <div>
            <div class="mt-2 flow-root">
                <div class="text-center font-semibold text-lg">
                    <span class="text-center mx-auto underline">ACTUAL LOT</span>
                </div>
              <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                    <div class="p-1 bg-gray-100 text-xs text-red-600 font-bold">
                        <span>TOTAL LAND STATUS (LESS) : {{ number_format($total_deduction_title_area_polomolok, 2) }}</span>
                      </div>
                  <table class="min-w-full divide-y divide-gray-300">
                    <thead>
                      <tr>
                        <th scope="col" class="py-2 pl-4 pr-3 text-left text-xs font-semibold text-gray-900 sm:pl-3">
                          OVERALL LAND STATUS</th>
                        <th scope="col" class="px-3 py-2 text-left text-xs font-semibold text-gray-900">AREA IN
                          HECTARES</th>
                          <th scope="col" class="px-3 py-2 text-left text-xs font-semibold text-gray-900">
                            NO. OF LOTS</th>
                            <th scope="col" class="px-3 py-2 text-left text-xs font-semibold text-gray-900"></th>
                      </tr>
                    </thead>
                    <tbody class="bg-white">
                      <tr>
                        <td class="whitespace-nowrap border-b py-2 pl-4 pr-3 text-xs font-medium text-gray-900 sm:pl-3">
                          Loss in Case</td>
                        <td class="whitespace-nowrap border-b px-3 py-2 text-center text-xs text-red-700">
                          {{ number_format($polomolok_loss_in_case, 2) }}
                          {{-- ------ --}}
                        </td>
                        @php
                        $polomolok_loss_in_case_lots = App\Models\BasicInformation::where('municipality', 'like', '%' . 'Polomolok' . '%')
                            ->where('status_id', 1)
                            ->count();
                      @endphp
                        <td class="whitespace-nowrap border-b px-3 py-2 text-center text-xs text-gray-500">{{ $polomolok_loss_in_case_lots }}</td>
                        <td class="whitespace-nowrap border-b px-3 py-2 text-xs text-red-700">
                          <button wire:click="overAllAwardedLot({{1}}, 'polomolok')">
                            <svg class="w-5 h-5 text-indigo-600 hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                              <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                              <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" clip-rule="evenodd" />
                            </svg>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td class="whitespace-nowrap border-b py-2 pl-4 pr-3 text-xs font-medium text-gray-900 sm:pl-3">
                          Cancelled CLOA</td>
                        <td class="whitespace-nowrap border-b px-3 py-2 text-center text-xs text-red-700">
                          {{ number_format($polomolok_cancelled_cloa, 2) }}
                          {{-- ------ --}}
                        </td>

                        @php
                        $polomolok_cancelled_cloa_lots = App\Models\BasicInformation::where('municipality', 'like', '%' . 'Polomolok' . '%')
                            ->where('status_id', 2)
                            ->count();
                      @endphp
                        <td class="whitespace-nowrap border-b px-3 py-2 text-center text-xs text-gray-500">{{ $polomolok_cancelled_cloa_lots }}</td>
                        <td class="whitespace-nowrap border-b px-3 py-2 text-xs text-red-700">
                          <button wire:click="overAllAwardedLot({{2}}, 'polomolok')">
                            <svg class="w-5 h-5 text-indigo-600 hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                              <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                              <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" clip-rule="evenodd" />
                            </svg>
                          </button>
                        </td>
                      </tr>

                      <td class="whitespace-nowrap border-b py-2 pl-4 pr-3 text-xs font-medium text-gray-900 sm:pl-3">
                        Exchange Lot</td>
                      <td class="whitespace-nowrap border-b px-3 py-2 text-center text-xs text-red-700">
                        {{ number_format($polomolok_exchange_lot, 2) }}
                        {{-- ------ --}}
                      </td>
                      @php
                      $polomolok_exchange_lot_lots = App\Models\BasicInformation::where('municipality', 'like', '%' . 'Polomolok' . '%')
                          ->where('status_id', 3)
                          ->count();
                     @endphp
                      <td class="whitespace-nowrap border-b px-3 py-2 text-center text-xs text-gray-500">{{ $polomolok_exchange_lot_lots }}</td>
                      <td class="whitespace-nowrap border-b px-3 py-2 text-xs text-red-700">
                        <button wire:click="overAllAwardedLot({{3}}, 'polomolok')">
                          <svg class="w-5 h-5 text-indigo-600 hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                            <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" clip-rule="evenodd" />
                          </svg>
                        </button>
                      </td>
                      </tr>
                      <tr>
                        <td class="whitespace-nowrap border-b py-2 pl-4 pr-3 text-xs font-medium text-gray-900 sm:pl-3">
                          Free Lot</td>
                        <td class="whitespace-nowrap border-b px-3 py-2 text-center text-xs text-red-700">
                          {{ number_format($polomolok_free_lot, 2) }}
                          {{-- ------ --}}
                        </td>
                        @php
                        $polomolok_free_lot_lots = App\Models\BasicInformation::where('municipality', 'like', '%' . 'Polomolok' . '%')
                            ->where('status_id', 4)
                            ->count();
                       @endphp
                        <td class="whitespace-nowrap border-b px-3 py-2 text-center text-xs text-gray-500">{{ $polomolok_free_lot_lots }}</td>
                        <td class="whitespace-nowrap border-b px-3 py-2 text-xs text-red-700">
                          <button wire:click="overAllAwardedLot({{4}}, 'polomolok')">
                            <svg class="w-5 h-5 text-indigo-600 hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                              <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                              <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" clip-rule="evenodd" />
                            </svg>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td class="whitespace-nowrap border-b py-2 pl-4 pr-3 text-xs font-medium text-gray-900 sm:pl-3">
                          Compromise Agreement</td>
                        <td class="whitespace-nowrap border-b px-3 py-2 text-center text-xs text-red-700">
                          {{ number_format($polomolok_compromise_agreement, 2) }}
                          {{-- ------ --}}
                        </td>
                        @php
                        $polomolok_compromise_agreement_lots = App\Models\BasicInformation::where('municipality', 'like', '%' . 'Polomolok' . '%')
                            ->where('status_id', 5)
                            ->count();
                       @endphp
                        <td class="whitespace-nowrap border-b px-3 py-2 text-center text-xs text-gray-500">{{ $polomolok_compromise_agreement_lots }}</td>
                        <td class="whitespace-nowrap border-b px-3 py-2 text-xs text-red-700">
                          <button wire:click="overAllAwardedLot({{5}}, 'polomolok')">
                            <svg class="w-5 h-5 text-indigo-600 hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                              <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                              <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" clip-rule="evenodd" />
                            </svg>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td class="whitespace-nowrap border-b py-2 pl-4 pr-3 text-xs font-medium text-gray-900 sm:pl-3">
                          DARBC Projects</td>
                        <td class="whitespace-nowrap border-b px-3 py-2 text-center text-xs text-red-700">
                          {{ number_format($polomolok_darbc_projects, 2) }}
                          {{-- ------ --}}
                        </td>
                        @php
                        $polomolok_darbc_projects_lots = App\Models\BasicInformation::where('municipality', 'like', '%' . 'Polomolok' . '%')
                            ->where('status_id', 6)
                            ->count();
                       @endphp
                        <td class="whitespace-nowrap border-b px-3 py-2 text-center text-xs text-gray-500">{{ $polomolok_darbc_projects_lots }}</td>
                        <td class="whitespace-nowrap border-b px-3 py-2 text-xs text-red-700">
                          <button wire:click="overAllAwardedLot({{6}}, 'polomolok')">
                            <svg class="w-5 h-5 text-indigo-600 hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                              <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                              <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" clip-rule="evenodd" />
                            </svg>
                          </button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>



        <div>
          <div class="mt-2 flow-root">
            <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
              <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <div class="p-1 bg-gray-100 text-xs font-bold">
                  {{-- @php
                    $total = App\Models\BasicInformation::where('municipality', 'like', '%' . 'TUPI' . '%')->sum('title_area');
                  @endphp --}}
                  <span>TUPI AREA: {{ number_format($total_tupi, 2) }}</span>
                </div>
                <table class="min-w-full divide-y divide-gray-300">
                  <thead>
                    <tr>
                      <th scope="col" class="py-2 pl-4 pr-3 text-left text-xs font-semibold text-gray-900 sm:pl-3">
                        STATUS</th>
                      <th scope="col" class="px-3 py-2 text-left text-xs font-semibold text-gray-900">AREA IN
                        HECTARES</th>
                      <th scope="col" class="px-3 py-2 text-left text-xs font-semibold text-gray-900">NO. OF LOTS
                      </th>
                      <th scope="col" class="px-3 py-2 text-left text-xs font-semibold text-gray-900"></th>
                    </tr>
                  </thead>
                  <tbody class="bg-white">
                    <tr>
                      <td class="whitespace-nowrap border-b py-2 pl-4 pr-3 text-xs font-medium text-gray-900 sm:pl-3">
                        Titled with CLOA</td>
                      @php
                        $area = App\Models\BasicInformation::where('title_status_id', 1)
                            ->where('municipality', 'like', '%' . 'TUPI' . '%')
                            ->sum('title_area');
                        $lots = App\Models\BasicInformation::where('title_status_id', 1)
                            ->where('municipality', 'like', '%' . 'TUPI' . '%')
                            ->count();
                      @endphp
                      <td class="whitespace-nowrap border-b px-3 py-2 text-center text-xs text-gray-500">{{ number_format($area, 2) }}</td>
                      <td class="whitespace-nowrap border-b px-3 py-2 text-center text-xs text-gray-500">{{ $lots }}
                      </td>
                      <td class="whitespace-nowrap border-b px-3 py-2 text-xs text-red-700">
                        <button  wire:click="showOverallTitleStatusReport({{1}}, 'Titled with CLOA')">
                          <svg class="w-5 h-5 text-indigo-600 hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                            <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" clip-rule="evenodd" />
                          </svg>
                        </button>
                      </td>
                    </tr>
                    <tr>
                      <td class="whitespace-nowrap border-b py-2 pl-4 pr-3 text-xs font-medium text-gray-900 sm:pl-3">
                        Titled without CLOA</td>
                      @php
                        $area = App\Models\BasicInformation::where('title_status_id', 2)
                            ->where('municipality', 'like', '%' . 'TUPI' . '%')
                            ->sum('title_area');
                        $lots = App\Models\BasicInformation::where('title_status_id', 2)
                            ->where('municipality', 'like', '%' . 'TUPI' . '%')
                            ->count();
                      @endphp
                      <td class="whitespace-nowrap border-b px-3 py-2 text-center text-xs text-gray-500">{{ number_format($area, 2) }}</td>
                      <td class="whitespace-nowrap border-b px-3 py-2 text-center text-xs text-gray-500">{{ $lots }}
                      </td>
                      <td class="whitespace-nowrap border-b px-3 py-2 text-xs text-red-700">
                        <button wire:click="showOverallTitleStatusReport({{1}}, 'Titled without CLOA')">
                          <svg class="w-5 h-5 text-indigo-600 hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                            <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" clip-rule="evenodd" />
                          </svg>
                        </button>
                      </td>
                    </tr>
                    <tr>
                      <td class="whitespace-nowrap border-b py-2 pl-4 pr-3 text-xs font-medium text-gray-900 sm:pl-3">
                        Untitled with CLOA</td>
                      @php
                        $area = App\Models\BasicInformation::where('title_status_id', 3)
                            ->where('municipality', 'like', '%' . 'TUPI' . '%')
                            ->sum('title_area');

                        $lots = App\Models\BasicInformation::where('title_status_id', 3)
                            ->where('municipality', 'like', '%' . 'TUPI' . '%')
                            ->count();
                      @endphp
                      <td class="whitespace-nowrap border-b px-3 py-2 text-center text-xs text-gray-500">{{ number_format($area, 2) }}</td>
                      <td class="whitespace-nowrap border-b px-3 py-2 text-center text-xs text-gray-500">{{ $lots }}
                      </td>
                      <td class="whitespace-nowrap border-b px-3 py-2 text-xs text-red-700">
                        <button  wire:click="showOverallTitleStatusReport({{1}}, 'Untitled with CLOA')">
                          <svg class="w-5 h-5 text-indigo-600 hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                            <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" clip-rule="evenodd" />
                          </svg>
                        </button>
                      </td>
                    </tr>
                    <tr>
                      <td class="whitespace-nowrap border-b py-2 pl-4 pr-3 text-xs font-medium text-gray-900 sm:pl-3">
                        Untitled without CLOA</td>
                      @php
                        $area = App\Models\BasicInformation::where('title_status_id', 4)
                            ->where('municipality', 'like', '%' . 'TUPI' . '%')
                            ->sum('title_area');

                        $lots = App\Models\BasicInformation::where('title_status_id', 4)
                            ->where('municipality', 'like', '%' . 'TUPI' . '%')
                            ->count();
                      @endphp
                      <td class="whitespace-nowrap border-b px-3 py-2 text-center text-xs text-gray-500">{{ number_format($area, 2) }}</td>
                      <td class="whitespace-nowrap border-b px-3 py-2 text-center text-xs text-gray-500">{{ $lots }}
                      </td>
                      <td class="whitespace-nowrap border-b px-3 py-2 text-xs text-red-700">
                        <button wire:click="showOverallTitleStatusReport({{1}}, 'Untitled without CLOA')">
                          <svg class="w-5 h-5 text-indigo-600 hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                            <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" clip-rule="evenodd" />
                          </svg>
                        </button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div>

            <div>
                <div class="mt-2 flow-root">
                  <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                        <div class="p-1 bg-gray-100 text-xs text-red-600 font-bold">
                            <span>TOTAL OVERALL LAND STATUS (LESS) : {{ number_format($total_deduction_title_area_tupi, 2) }}</span>
                          </div>
                      <table class="min-w-full divide-y divide-gray-300">
                        <thead>
                          <tr>
                            <th scope="col" class="py-2 pl-4 pr-3 text-left text-xs font-semibold text-gray-900 sm:pl-3">
                              OVERALL LAND STATUS</th>
                            <th scope="col" class="px-3 py-2 text-left text-xs font-semibold text-gray-900">AREA IN
                              HECTARES</th>
                              <th scope="col" class="px-3 py-2 text-left text-xs font-semibold text-gray-900">NO. OF LOTS
                            </th>
                            <th scope="col" class="px-3 py-2 text-left text-xs font-semibold text-gray-900"></th>
                          </tr>
                        </thead>
                        <tbody class="bg-white">
                          <tr>
                            <td class="whitespace-nowrap border-b py-2 pl-4 pr-3 text-xs font-medium text-gray-900 sm:pl-3">
                              Loss in Case</td>
                            <td class="whitespace-nowrap border-b px-3 text-center py-2 text-xs text-red-700">
                                @php
                                $tupi_loss_in_case_area = App\Models\BasicInformation::where('municipality', 'like', '%' . 'TUPI' . '%')
                                    ->where('status_id', 1)
                                    ->sum('title_area');
                               @endphp
                              {{ number_format($tupi_loss_in_case_area, 2) }}
                              {{-- ------ --}}
                            </td>
                            @php
                            $tupi_loss_in_case_lots = App\Models\BasicInformation::where('municipality', 'like', '%' . 'TUPI' . '%')
                                ->where('status_id', 1)
                                ->count();
                           @endphp
                            <td class="whitespace-nowrap border-b px-3 text-center py-2 text-xs text-gray-500">{{ $tupi_loss_in_case_lots }}</td>
                            <td class="whitespace-nowrap border-b px-3 py-2 text-xs text-red-700">
                              <button wire:click="overAllAwardedLot({{1}}, 'tupi')">
                                <svg class="w-5 h-5 text-indigo-600 hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                  <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                                  <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" clip-rule="evenodd" />
                                </svg>
                              </button>
                            </td>
                          </tr>
                          <tr>
                            <td class="whitespace-nowrap border-b py-2 pl-4 pr-3 text-xs font-medium text-gray-900 sm:pl-3">
                              Cancelled CLOA</td>
                            <td class="whitespace-nowrap border-b px-3 text-center py-2 text-xs text-red-700">
                              {{ number_format($tupi_cancelled_cloa, 2) }}
                              {{-- ------ --}}
                            </td>
                            @php
                            $tupi_cancelled_cloa_lots = App\Models\BasicInformation::where('municipality', 'like', '%' . 'TUPI' . '%')
                                ->where('status_id', 2)
                                ->count();
                           @endphp
                            <td class="whitespace-nowrap border-b px-3 text-center py-2 text-xs text-gray-500">{{ $tupi_cancelled_cloa_lots }}</td>
                            <td class="whitespace-nowrap border-b px-3 py-2 text-xs text-red-700">
                              <button wire:click="overAllAwardedLot({{2}}, 'tupi')">
                                <svg class="w-5 h-5 text-indigo-600 hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                  <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                                  <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" clip-rule="evenodd" />
                                </svg>
                              </button>
                            </td>
                          </tr>

                          <td class="whitespace-nowrap border-b py-2 pl-4 pr-3 text-xs font-medium text-gray-900 sm:pl-3">
                            Exchange Lot</td>
                          <td class="whitespace-nowrap border-b px-3 py-2 text-center text-xs text-red-700">
                            {{ number_format($tupi_exchange_lot, 2) }}
                            {{-- ------ --}}
                          </td>
                          @php
                          $tupi_exchange_lot_lots = App\Models\BasicInformation::where('municipality', 'like', '%' . 'TUPI' . '%')
                              ->where('status_id', 3)
                              ->count();
                         @endphp
                          <td class="whitespace-nowrap border-b px-3 py-2 text-center text-xs text-gray-500">{{ $tupi_exchange_lot_lots }}</td>
                          <td class="whitespace-nowrap border-b px-3 py-2 text-xs text-red-700">
                            <button wire:click="overAllAwardedLot({{3}}, 'tupi')">
                              <svg class="w-5 h-5 text-indigo-600 hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                                <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" clip-rule="evenodd" />
                              </svg>
                            </button>
                          </td>
                          </tr>
                          <tr>
                            <td class="whitespace-nowrap border-b py-2 pl-4 pr-3 text-xs font-medium text-gray-900 sm:pl-3">
                              Free Lot</td>
                            <td class="whitespace-nowrap border-b px-3 py-2 text-center text-xs text-red-700">
                              {{ number_format($tupi_free_lot, 2) }}
                              {{-- ------ --}}
                            </td>
                            @php
                            $tupi_free_lot_lots = App\Models\BasicInformation::where('municipality', 'like', '%' . 'TUPI' . '%')
                                ->where('status_id', 4)
                                ->count();
                           @endphp
                            <td class="whitespace-nowrap border-b px-3 py-2 text-center text-xs text-gray-500">{{ $tupi_free_lot_lots }}</td>
                            <td class="whitespace-nowrap border-b px-3 py-2 text-xs text-red-700">
                              <button wire:click="overAllAwardedLot({{4}}, 'tupi')">
                                <svg class="w-5 h-5 text-indigo-600 hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                  <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                                  <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" clip-rule="evenodd" />
                                </svg>
                              </button>
                            </td>
                          </tr>
                          <tr>
                            <td class="whitespace-nowrap border-b py-2 pl-4 pr-3 text-xs font-medium text-gray-900 sm:pl-3">
                              Compromise Agreement</td>
                            <td class="whitespace-nowrap border-b px-3 py-2 text-center text-xs text-red-700">
                              {{ number_format($tupi_compromise_agreement, 2) }}
                              {{-- ------ --}}
                            </td>
                            @php
                            $tupi_compromise_agreement_lots = App\Models\BasicInformation::where('municipality', 'like', '%' . 'TUPI' . '%')
                                ->where('status_id', 5)
                                ->count();
                           @endphp
                            <td class="whitespace-nowrap border-b px-3 py-2 text-center text-xs text-gray-500">{{ $tupi_compromise_agreement_lots }}</td>
                            <td class="whitespace-nowrap border-b px-3 py-2 text-xs text-red-700">
                              <button wire:click="overAllAwardedLot({{5}}, 'tupi')">
                                <svg class="w-5 h-5 text-indigo-600 hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                  <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                                  <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" clip-rule="evenodd" />
                                </svg>
                              </button>
                            </td>
                          </tr>
                          <tr>
                            <td class="whitespace-nowrap border-b py-2 pl-4 pr-3 text-xs font-medium text-gray-900 sm:pl-3">
                              DARBC Projects</td>
                            <td class="whitespace-nowrap border-b px-3 py-2 text-center text-xs text-red-700">
                              {{ number_format($tupi_darbc_projects, 2) }}
                              {{-- ------ --}}
                            </td>
                            @php
                            $tupi_darbc_projects_lots = App\Models\BasicInformation::where('municipality', 'like', '%' . 'TUPI' . '%')
                                ->where('status_id', 6)
                                ->count();
                           @endphp
                            <td class="whitespace-nowrap border-b px-3 py-2 text-center text-xs text-gray-500">{{ $tupi_darbc_projects_lots }}</td>
                            <td class="whitespace-nowrap border-b px-3 py-2 text-xs text-red-700">
                              <button wire:click="overAllAwardedLot({{6}}, 'tupi')">
                                <svg class="w-5 h-5 text-indigo-600 hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                  <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                                  <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" clip-rule="evenodd" />
                                </svg>
                              </button>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>

        </div>
        <div>
          <div class="mt-2 flow-root">
            <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
              <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <div class="p-1 bg-gray-100 text-xs font-bold">
                  {{-- @php
                    $total = App\Models\BasicInformation::where('municipality', 'like', '%' . 'GENERAL SANTOS' . '%')->sum('title_area');
                  @endphp --}}
                  <span>GENSAN AREA: {{ number_format($total_gensan, 2) }}</span>
                </div>
                <table class="min-w-full divide-y divide-gray-300">
                  <thead>
                    <tr>
                      <th scope="col" class="py-2 pl-4 pr-3 text-left text-xs font-semibold text-gray-900 sm:pl-3">
                        STATUS</th>
                      <th scope="col" class="px-3 py-2 text-left text-xs font-semibold text-gray-900">AREA IN
                        HECTARES</th>
                      <th scope="col" class="px-3 py-2 text-left text-xs font-semibold text-gray-900">NO. OF LOTS
                      </th>
                      <th scope="col" class="px-3 py-2 text-left text-xs font-semibold text-gray-900"></th>

                    </tr>
                  </thead>
                  <tbody class="bg-white">
                    <tr>
                      <td class="whitespace-nowrap border-b py-2 pl-4 pr-3 text-xs font-medium text-gray-900 sm:pl-3">
                        Titled with CLOA</td>
                      @php
                        $area = App\Models\BasicInformation::where('title_status_id', 1)
                            ->where('municipality', 'like', '%' . 'GENERAL SANTOS' . '%')
                            ->sum('title_area');
                        $lots = App\Models\BasicInformation::where('title_status_id', 1)
                            ->where('municipality', 'like', '%' . 'GENERAL SANTOS' . '%')
                            ->count();
                      @endphp
                      <td class="whitespace-nowrap border-b px-3 py-2 text-center text-xs text-gray-500">{{ number_format($area, 2) }}</td>
                      <td class="whitespace-nowrap border-b px-3 py-2 text-center text-xs text-gray-500">{{ $lots }}
                      </td>
                      <td class="whitespace-nowrap border-b px-3 py-2 text-xs text-red-700">
                        <button wire:click="showOverallTitleStatusReport({{2}}, 'Titled with CLOA')">
                          <svg class="w-5 h-5 text-indigo-600 hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                            <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" clip-rule="evenodd" />
                          </svg>
                        </button>
                      </td>
                    </tr>
                    <tr>
                      <td class="whitespace-nowrap border-b py-2 pl-4 pr-3 text-xs font-medium text-gray-900 sm:pl-3">
                        Titled without CLOA</td>
                      @php
                        $area = App\Models\BasicInformation::where('title_status_id', 2)
                            ->where('municipality', 'like', '%' . 'GENERAL SANTOS' . '%')
                            ->sum('title_area');
                        $lots = App\Models\BasicInformation::where('title_status_id', 2)
                            ->where('municipality', 'like', '%' . 'GENERAL SANTOS' . '%')
                            ->count();
                      @endphp
                      <td class="whitespace-nowrap border-b px-3 py-2 text-center text-xs text-gray-500">{{ number_format($area, 2) }}</td>
                      <td class="whitespace-nowrap border-b px-3 py-2 text-center text-xs text-gray-500">{{ $lots }}
                      </td>
                      <td class="whitespace-nowrap border-b px-3 py-2 text-xs text-red-700">
                        <button wire:click="showOverallTitleStatusReport({{2}}, 'Titled without CLOA')">
                          <svg class="w-5 h-5 text-indigo-600 hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                            <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" clip-rule="evenodd" />
                          </svg>
                        </button>
                      </td>
                    </tr>
                    <tr>
                      <td class="whitespace-nowrap border-b py-2 pl-4 pr-3 text-xs font-medium text-gray-900 sm:pl-3">
                        Untitled with CLOA</td>
                      @php
                        $area = App\Models\BasicInformation::where('title_status_id', 3)
                            ->where('municipality', 'like', '%' . 'GENERAL SANTOS' . '%')
                            ->sum('title_area');

                        $lots = App\Models\BasicInformation::where('title_status_id', 3)
                            ->where('municipality', 'like', '%' . 'GENERAL SANTOS' . '%')
                            ->count();
                      @endphp
                      <td class="whitespace-nowrap border-b px-3 py-2 text-center text-xs text-gray-500">{{ number_format($area, 2) }}</td>
                      <td class="whitespace-nowrap border-b px-3 py-2 text-center text-xs text-gray-500">{{ $lots }}
                      </td>
                      <td class="whitespace-nowrap border-b px-3 py-2 text-xs text-red-700">
                        <button wire:click="showOverallTitleStatusReport({{2}}, 'Untitled with CLOA')">
                          <svg class="w-5 h-5 text-indigo-600 hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                            <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" clip-rule="evenodd" />
                          </svg>
                        </button>
                      </td>
                    </tr>
                    <tr>
                      <td class="whitespace-nowrap border-b py-2 pl-4 pr-3 text-xs font-medium text-gray-900 sm:pl-3">
                        Untitled without CLOA</td>
                      @php
                        $area = App\Models\BasicInformation::where('title_status_id', 4)
                            ->where('municipality', 'like', '%' . 'GENERAL SANTOS' . '%')
                            ->sum('title_area');

                        $lots = App\Models\BasicInformation::where('title_status_id', 4)
                            ->where('municipality', 'like', '%' . 'GENERAL SANTOS' . '%')
                            ->count();
                      @endphp
                      <td class="whitespace-nowrap border-b px-3 py-2 text-center text-xs text-gray-500">{{ number_format($area,2) }}</td>
                      <td class="whitespace-nowrap border-b px-3 py-2 text-center text-xs text-gray-500">{{ $lots }}
                      </td>
                      <td class="whitespace-nowrap border-b px-3 py-2 text-xs text-red-700">
                        <button wire:click="showOverallTitleStatusReport({{2}}, 'Untitled without CLOA')">
                          <svg class="w-5 h-5 text-indigo-600 hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                            <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" clip-rule="evenodd" />
                          </svg>
                        </button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

        <div>
            <div class="mt-2 flow-root">
              <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                    <div class="p-1 bg-gray-100 text-xs text-red-600 font-bold">
                        <span>TOTAL OVERALL LAND STATUS (LESS) : {{ number_format($total_deduction_title_area_gensan, 2) }}</span>
                      </div>
                  <table class="min-w-full divide-y divide-gray-300">
                    <thead>
                      <tr>
                        <th scope="col" class="py-2 pl-4 pr-3 text-left text-xs font-semibold text-gray-900 sm:pl-3">
                          OVERALL LAND STATUS</th>
                        <th scope="col" class="px-3 py-2 text-left text-xs font-semibold text-gray-900">AREA IN
                          HECTARES</th>
                          <th scope="col" class="px-3 py-2 text-left text-xs font-semibold text-gray-900">NO. OF LOTS</th>
                          <th scope="col" class="px-3 py-2 text-left text-xs font-semibold text-gray-900"></th>
                      </tr>
                    </thead>
                    <tbody class="bg-white">
                      <tr>
                        <td class="whitespace-nowrap border-b py-2 pl-4 pr-3 text-xs font-medium text-gray-900 sm:pl-3">
                          Loss in Case</td>
                        <td class="whitespace-nowrap border-b px-3 py-2 text-center text-xs text-red-700">
                          {{ number_format($gensan_loss_in_case, 2) }}
                          {{-- ------ --}}
                        </td>
                        @php
                        $gensan_loss_in_case_lots = App\Models\BasicInformation::where('municipality', 'like', '%' . 'GENERAL SANTOS' . '%')
                            ->where('status_id', 1)
                            ->count();
                       @endphp
                        <td class="whitespace-nowrap border-b px-3 py-2 text-center text-xs text-gray-500">{{ $gensan_loss_in_case_lots }}</td>
                        <td class="whitespace-nowrap border-b px-3 py-2 text-xs text-red-700">
                          <button wire:click="overAllAwardedLot({{1}}, 'gensan')">
                            <svg class="w-5 h-5 text-indigo-600 hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                              <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                              <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" clip-rule="evenodd" />
                            </svg>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td class="whitespace-nowrap border-b py-2 pl-4 pr-3 text-xs font-medium text-gray-900 sm:pl-3">
                          Cancelled CLOA</td>
                        <td class="whitespace-nowrap border-b px-3 py-2 text-center text-xs text-red-700">
                          {{ number_format($gensan_cancelled_cloa, 2) }}
                          {{-- ------ --}}
                        </td>
                        @php
                        $gensan_cancelled_cloa_lots = App\Models\BasicInformation::where('municipality', 'like', '%' . 'GENERAL SANTOS' . '%')
                            ->where('status_id', 2)
                            ->count();
                       @endphp
                        <td class="whitespace-nowrap border-b px-3 py-2 text-center text-xs text-gray-500">{{ $gensan_cancelled_cloa_lots }}</td>
                        <td class="whitespace-nowrap border-b px-3 py-2 text-xs text-red-700">
                          <button wire:click="overAllAwardedLot({{2}}, 'gensan')">
                            <svg class="w-5 h-5 text-indigo-600 hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                              <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                              <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" clip-rule="evenodd" />
                            </svg>
                          </button>
                        </td>
                      </tr>

                      <td class="whitespace-nowrap border-b py-2 pl-4 pr-3 text-xs font-medium text-gray-900 sm:pl-3">
                        Exchange Lot</td>
                      <td class="whitespace-nowrap border-b px-3 py-2 text-center text-xs text-red-700">
                        {{ number_format($gensan_exchange_lot, 2) }}
                        {{-- ------ --}}
                      </td>
                      @php
                      $gensan_exchange_lot_lots = App\Models\BasicInformation::where('municipality', 'like', '%' . 'GENERAL SANTOS' . '%')
                          ->where('status_id', 3)
                          ->count();
                     @endphp
                      <td class="whitespace-nowrap border-b px-3 py-2 text-center text-xs text-gray-500">{{ $gensan_exchange_lot_lots }}</td>
                      <td class="whitespace-nowrap border-b px-3 py-2 text-xs text-red-700">
                        <button wire:click="overAllAwardedLot({{3}}, 'gensan')">
                          <svg class="w-5 h-5 text-indigo-600 hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                            <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" clip-rule="evenodd" />
                          </svg>
                        </button>
                      </td>
                      </tr>
                      <tr>
                        <td class="whitespace-nowrap border-b py-2 pl-4 pr-3 text-xs font-medium text-gray-900 sm:pl-3">
                          Free Lot</td>
                        <td class="whitespace-nowrap border-b px-3 py-2 text-center text-xs text-red-700">
                          {{ number_format($gensan_free_lot, 2) }}
                          {{-- ------ --}}
                        </td>
                        @php
                        $gensan_free_lot_lots = App\Models\BasicInformation::where('municipality', 'like', '%' . 'GENERAL SANTOS' . '%')
                            ->where('status_id', 4)
                            ->count();
                       @endphp
                        <td class="whitespace-nowrap border-b px-3 py-2 text-center text-xs text-gray-500">{{ $gensan_free_lot_lots }}</td>
                        <td class="whitespace-nowrap border-b px-3 py-2 text-xs text-red-700">
                          <button wire:click="overAllAwardedLot({{4}}, 'gensan')">
                            <svg class="w-5 h-5 text-indigo-600 hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                              <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                              <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" clip-rule="evenodd" />
                            </svg>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td class="whitespace-nowrap border-b py-2 pl-4 pr-3 text-xs font-medium text-gray-900 sm:pl-3">
                          Compromise Agreement</td>
                        <td class="whitespace-nowrap border-b px-3 py-2 text-center text-xs text-red-700">
                          {{ number_format($gensan_compromise_agreement, 2) }}
                          {{-- ------ --}}
                        </td>
                        @php
                        $gensan_compromise_agreement_lots = App\Models\BasicInformation::where('municipality', 'like', '%' . 'GENERAL SANTOS' . '%')
                            ->where('status_id', 5)
                            ->count();
                       @endphp
                        <td class="whitespace-nowrap border-b px-3 py-2 text-center text-xs text-gray-500">{{ $gensan_compromise_agreement_lots }}</td>
                        <td class="whitespace-nowrap border-b px-3 py-2 text-xs text-red-700">
                          <button wire:click="overAllAwardedLot({{5}}, 'gensan')">
                            <svg class="w-5 h-5 text-indigo-600 hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                              <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                              <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" clip-rule="evenodd" />
                            </svg>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td class="whitespace-nowrap border-b py-2 pl-4 pr-3 text-xs font-medium text-gray-900 sm:pl-3">
                          DARBC Projects</td>
                        <td class="whitespace-nowrap border-b px-3 py-2 text-center text-xs text-red-700">
                          {{ number_format($gensan_darbc_projects, 2) }}
                          {{-- ------ --}}
                        </td>
                        @php
                        $gensan_darbc_projects_lots = App\Models\BasicInformation::where('municipality', 'like', '%' . 'GENERAL SANTOS' . '%')
                            ->where('status_id', 6)
                            ->count();
                       @endphp
                        <td class="whitespace-nowrap border-b px-3 py-2 text-center text-xs text-gray-500">{{ $gensan_darbc_projects_lots }}</td>
                        <td class="whitespace-nowrap border-b px-3 py-2 text-xs text-red-700">
                          <button wire:click="overAllAwardedLot({{6}}, 'gensan')">
                            <svg class="w-5 h-5 text-indigo-600 hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                              <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                              <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" clip-rule="evenodd" />
                            </svg>
                          </button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          @php
            $total_awarded_lot = $total_polomolok + $total_tupi + $total_gensan;
          @endphp
          <div class="text-left font-semibold text-sm">
            <span class="text-center mx-auto">TOTAL AWARDED LOT (HECTARES) : {{number_format($total_awarded_lot, 2)}}</span>
        </div>
        @php
            $total_actual_lot = $total_deduction_title_area_polomolok + $total_deduction_title_area_tupi + $total_deduction_title_area_gensan;
        @endphp
        <div class="text-left font-semibold text-sm">
            <span class="text-center mx-auto ">TOTAL ACTUAL LOT (HECTARES) : {{number_format($total_actual_lot, 2)}}</span>
        </div>
      </div>
    </div>
   @include('charts.land-summary')
   @include('charts.actual-land-summary')
   @include('charts.municipalities')
   @include('charts.title-status')
    {{-- <script>
      const actual_summary = new Chart(document.getElementById('actual_summary'), {
        type: 'bar',
        data: {
          labels: [
            'Planted Area',
            'Gulley Area',
            'Total Area',
            'Facilty Area',
            'Unutilized Area',
            'Gross Area',

          ],
          datasets: [{
            label: 'Land Summary',
            data: [{{ $planted }}, {{ $gulley }}, {{ $total }}, {{ $facility }},
              {{ $unutilized }}, {{ $gross }}
            ],
            backgroundColor: [
              '#FF6384',
              '#36A2EB',
              '#FFCE56',
              '#E7E9ED',
              '#8C9EFF',
              '#FF7F50'
            ]
          }]
        },
        options: {
          responsive: true
        }
      });
    </script> --}}

    {{-- <script>
      const pieChart3 = new Chart(document.getElementById('piechart3'), {
        type: 'bar',
        data: {
          labels: [
            'Polomolok',
            'Tupi',
            'GenSan'
          ],
          datasets: [{
            label: 'Lot Count',
            data: [{{ $polomolok }}, {{ $tupi }}, {{ $gensan }}],
            backgroundColor: [
              '#FF6384',
              '#36A2EB',
              '#FFCE56',
              '#E7E9ED',
              '#8C9EFF',
              '#FF7F50'
            ]
          }]
        },
        options: {
          responsive: true
        }
      });
    </script> --}}
    {{-- <script>
      const title_status = new Chart(document.getElementById('title_status'), {
        type: 'bar',
        data: {
          labels: [
            'Titled with CLOA',
            'Titled without CLOA',
            'Untitled with CLOA',
            'Untitled without CLOA'
          ],
          datasets: [{
            label: 'Title Status',
            data: [{{ $twc }}, {{ $twoc }}, {{ $uwc }}, {{ $uwoc }}],
            backgroundColor: [
              '#FF6384',
              '#36A2EB',
              '#FFCE56',
              '#E7E9ED',
              '#8C9EFF',
              '#FF7F50'
            ]
          }]
        },
        options: {
          responsive: true
        }
      });
    </script> --}}
    <script>
      var options1 = {
        width: 40,
        zoomWidth: 40,
        offset: {
          vertical: 0,
          horizontal: 10
        }
      };

      // If the width and height of the image are not known or to adjust the image to the container of it
      var options2 = {
        width: 500,
        zoomWidth: 500,
        fillContainer: true,
        offset: {
          vertical: 0,
          horizontal: -500
        }
      };

    const elem = document.getElementById('img-container')
    const panzoom = Panzoom(elem, {
    maxScale: 30,
    minScale: 1,
    })
    panzoom.pan(10, 10)
    panzoom.zoom(1, { animate: true })

    // Panning and pinch zooming are bound automatically (unless disablePan is true).
    // There are several available methods for zooming
    // that can be bound on button clicks or mousewheel.
    elem.addEventListener("wheel", function (e) {
            panzoom.zoomWithWheel(e);
        });
          // Center the image on zoom
    elem.addEventListener('panzoomzoom', function (e) {
        panzoom.moveTo(0, 0); // Center the image
    });
    </script>
  </div>
