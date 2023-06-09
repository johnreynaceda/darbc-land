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
          $total_hectars = App\Models\BasicInformation::where('municipality', 'like', '%' . 'Polomolok' . '%')->sum('title_area') + App\Models\BasicInformation::where('municipality', 'like', '%' . 'TUPI' . '%')->sum('title_area');
        @endphp
        <div class="flex justify-between">
            <header class=" font-bold">LAND SUMMARY</header>
        </div>
        <div>
        <x-modal.card width="xl" align="center" title="Land Summary ({{$land_summary_type}})" blur wire:model="showLandSummaryModal">
            <div>
                <div class="inline-block min-w-full py-2">
                    @switch($land_summary_type)
                        @case('Leased')
                        <div class="flex justify-end py-2">
                            @php
                                $sum = App\Models\Actual::where('land_status', 'LEASED')->sum('dolephil_leased');
                            @endphp
                            <h1 class="font-semibold text-md">Total Area: {{number_format($sum,3)}}</h1>
                        </div>
                        @break
                        @case('Growers')
                        <div class="flex justify-end py-2">
                            @php
                                $sum = App\Models\Actual::where('land_status', 'GROWERS')->sum('darbc_grower');
                            @endphp
                            <h1 class="font-semibold text-md">Total Area: {{number_format($sum,3)}}</h1>
                        </div>
                        @break
                        @case('Unplanted')
                        <div class="flex justify-end py-2">
                            @php
                                $sum = App\Models\Actual::where('land_status', 'UNPLANTED')->sum('owned_but_not_planted');
                            @endphp
                            <h1 class="font-semibold text-md">Total Area: {{number_format($sum,3)}}</h1>
                        </div>
                        @break
                        @case('Compromise Agreement')
                        <div class="flex justify-end py-2">
                            @php
                                $sum = App\Models\Actual::where('land_status', 'COMPROMISE AGREEMENT')->sum('owned_but_not_planted');
                            @endphp
                            <h1 class="font-semibold text-md">Total Area: {{number_format($sum,3)}}</h1>
                        </div>
                        @break
                        @case('Deleted')
                        <div class="flex justify-end py-2">
                            @php
                                $sum = App\Models\Actual::where('land_status', 'DELETED')->sum('owned_but_not_planted');
                            @endphp
                            <h1 class="font-semibold text-md">Total Area: {{number_format($sum,3)}}</h1>
                        </div>
                        @break
                        @case('Others')
                        <div class="flex justify-end py-2">
                            @php
                                $sum = App\Models\Actual::where('land_status', 'OTHERS')->sum('owned_but_not_planted');
                            @endphp
                            <h1 class="font-semibold text-md">Total Area: {{number_format($sum,3)}}</h1>
                        </div>
                        @break
                        @default

                    @endswitch

                    <livewire:tables.land-summary-table :record="$land_summary_type"/>
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

        <span class="leading-3 text-sm">Total Hectares: {{ $total_hectars }}</span>
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
        <header class=" font-bold">ACTUAL LAND SUMMARY </header>
        <x-modal.card width="xl" align="center" title="Actual Land Summary ({{$actual_land_summary_type}})" blur wire:model="showActualLandSummaryModal">
            <div>
                <div class="inline-block min-w-full py-2">
                        @switch($actual_land_summary_type)
                        @case('Planted Area')
                        <div class="flex justify-end py-2">
                            @php
                                $sum = App\Models\Actual::with('basic_information')->sum('planted_area');
                            @endphp
                            <h1 class="font-semibold text-md">Total Area: {{number_format($sum,3)}}</h1>
                        </div>
                        @break
                        @case('Gulley Area')
                        <div class="flex justify-end py-2">
                            @php
                                $sum = App\Models\Actual::with('basic_information')->sum('gulley_area');
                            @endphp
                            <h1 class="font-semibold text-md">Total Area: {{number_format($sum,3)}}</h1>
                        </div>
                        @break
                        @case('Total Area')
                        <div class="flex justify-end py-2">
                            @php
                                $sum = App\Models\Actual::with('basic_information')->sum('total_area');
                            @endphp
                            <h1 class="font-semibold text-md">Total Area: {{number_format($sum,3)}}</h1>
                        </div>
                        @break
                        @case('Facilty Area')
                        <div class="flex justify-end py-2">
                            @php
                                $sum = App\Models\Actual::with('basic_information')->sum('facility_area');
                            @endphp
                            <h1 class="font-semibold text-md">Total Area: {{number_format($sum,3)}}</h1>
                        </div>
                        @break
                        @case('Unutilized Area')
                        <div class="flex justify-end py-2">
                            @php
                                $sum = App\Models\Actual::with('basic_information')->sum('unutilized_area');
                            @endphp
                            <h1 class="font-semibold text-md">Total Area: {{number_format($sum,3)}}</h1>
                        </div>
                        @break
                        @case('Gross Area')
                        <div class="flex justify-end py-2">
                            @php
                                $sum = App\Models\Actual::with('basic_information')->sum('gross_area');
                            @endphp
                            <h1 class="font-semibold text-md">Total Area: {{number_format($sum,3)}}</h1>
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
        <span class="leading-3 text-sm">Total Hectares: {{ $total_hectars }}</span>
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
                        @php
                            $sum = App\Models\BasicInformation::where('municipality', 'like', '%' . 'POLOMOLOK' . '%')->sum('title_area');
                        @endphp
                        <h1 class="font-semibold text-md">Total Area: {{number_format($sum,3)}}</h1>
                    </div>
                    @break
                    @case('TUPI')
                    <div class="flex justify-end py-2">
                        @php
                            $sum = App\Models\BasicInformation::where('municipality', 'like', '%' . 'TUPI' . '%')->sum('title_area');
                        @endphp
                        <h1 class="font-semibold text-md">Total Area: {{number_format($sum,3)}}</h1>
                    </div>
                    @break
                    @case('GENERAL SANTOS')
                    <div class="flex justify-end py-2">
                        @php
                            $sum = App\Models\BasicInformation::where('municipality', 'like', '%' . 'GENERAL SANTOS' . '%')->sum('title_area');
                        @endphp
                        <h1 class="font-semibold text-md">Total Area: {{number_format($sum,3)}}</h1>
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
        <span class="leading-3 text-sm">Total Hectares: {{ $total_hectars }}</span>
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
        <x-modal.card width="xl" align="center" title="Title Status ({{$title_status}})" blur wire:model="showTitleStatusModal">
            <div>
                <div class="inline-block min-w-full py-2">
                    @switch($title_status)
                    @case('Titled with CLOA')
                    <div class="flex justify-end py-2">
                        @php
                            $sum = App\Models\BasicInformation::where('title_status', 'TWC')->sum('title_area');
                        @endphp
                        <h1 class="font-semibold text-md">Total Area: {{number_format($sum,3)}}</h1>
                    </div>
                    @break
                    @case('Titled without CLOA')
                    <div class="flex justify-end py-2">
                        @php
                            $sum = App\Models\BasicInformation::where('title_status', 'TWOC')->sum('title_area');
                        @endphp
                        <h1 class="font-semibold text-md">Total Area: {{number_format($sum,3)}}</h1>
                    </div>
                    @break
                    @case('Untitled with CLOA')
                    <div class="flex justify-end py-2">
                        @php
                            $sum = App\Models\BasicInformation::where('title_status', 'UWC')->sum('title_area');
                        @endphp
                        <h1 class="font-semibold text-md">Total Area: {{number_format($sum,3)}}</h1>
                    </div>
                    @break
                    @case('Untitled without CLOA')
                    <div class="flex justify-end py-2">
                        @php
                            $sum = App\Models\BasicInformation::where('title_status', 'UWOC')->sum('title_area');
                        @endphp
                        <h1 class="font-semibold text-md">Total Area: {{number_format($sum,3)}}</h1>
                    </div>
                    @break
                    @default

                    @endswitch
                    <livewire:tables.title-status-table :record="$title_status"/>
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
        <span class="leading-3 text-sm">Total Hectares: {{ $total_hectars }}</span>
        <div class="mt-2">
          <div wire:ignore>
            <canvas id="title_status" height="200"></canvas>
          </div>
        </div>
      </div>
    </div>
    <div class="flex-1 ">
      <div id="img-container" class=" flex justify-center">
        @if (App\Models\MapImage::get()->count() === 0)
        <img src="{{ asset('images/darbcmap3.jpg') }}" class="h-96" alt="">
        @else
        @php
            $path = App\Models\MapImage::first()->path;
        @endphp
        <img src="{{ $this->getFileUrl($path) }}" class="h-96 mb-2" alt="">
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
            $total = App\Models\BasicInformation::sum('title_area');
          @endphp
          {{ number_format($total, 2) }}
        </h1>
      </div>
      <div class="mt-5 grid grid-cols-2 gap-5">
        <div>
          <div class="mt-2 flow-root">
            <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
              <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <div class="p-1 bg-gray-100 text-xs font-bold">
                  @php
                    $total = App\Models\BasicInformation::where('municipality', 'like', '%' . 'Polomolok' . '%')->sum('title_area');
                  @endphp
                  <span>POLOMOLOK AREA: {{ $total }}</span>
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

                    </tr>
                  </thead>
                  <tbody class="bg-white">
                    <tr>
                      <td class="whitespace-nowrap border-b py-2 pl-4 pr-3 text-xs font-medium text-gray-900 sm:pl-3">
                        Titled with CLOA</td>
                      @php
                        $area = App\Models\BasicInformation::whereNotNull('title')
                            ->where('cloa_number', '!=', 'NO CLOA')
                            ->where('municipality', 'like', '%' . 'Polomolok' . '%')
                            ->sum('title_area');
                        $lots = App\Models\BasicInformation::whereNotNull('title')
                            ->where('cloa_number', '!=', 'NO CLOA')
                            ->where('municipality', 'like', '%' . 'Polomolok' . '%')
                            ->count();
                      @endphp
                      <td class="whitespace-nowrap border-b px-3 py-2 text-xs text-gray-500">{{ $area }}</td>
                      <td class="whitespace-nowrap border-b px-3 py-2 text-xs text-gray-500">{{ $lots }}
                      </td>
                    </tr>
                    <tr>
                      <td class="whitespace-nowrap border-b py-2 pl-4 pr-3 text-xs font-medium text-gray-900 sm:pl-3">
                        Titled without CLOA</td>
                      @php
                        $area = App\Models\BasicInformation::whereNotNull('title')
                            ->where('cloa_number', '=', 'NO CLOA')
                            ->where('municipality', 'like', '%' . 'Polomolok' . '%')
                            ->sum('title_area');
                        $lots = App\Models\BasicInformation::whereNotNull('title')
                            ->where('cloa_number', '=', 'NO CLOA')
                            ->where('municipality', 'like', '%' . 'Polomolok' . '%')
                            ->count();
                      @endphp
                      <td class="whitespace-nowrap border-b px-3 py-2 text-xs text-gray-500">{{ $area }}</td>
                      <td class="whitespace-nowrap border-b px-3 py-2 text-xs text-gray-500">{{ $lots }}
                      </td>
                    </tr>
                    <tr>
                      <td class="whitespace-nowrap border-b py-2 pl-4 pr-3 text-xs font-medium text-gray-900 sm:pl-3">
                        Untitled with CLOA</td>
                      @php
                        $area = App\Models\BasicInformation::where('title', '=', '')
                            ->where('cloa_number', '!=', 'NO CLOA')
                            ->where('municipality', 'like', '%' . 'Polomolok' . '%')
                            ->sum('title_area');

                        $lots = App\Models\BasicInformation::where('title', '=', '')
                            ->where('cloa_number', '!=', 'NO CLOA')
                            ->where('municipality', 'like', '%' . 'Polomolok' . '%')
                            ->count();
                      @endphp
                      <td class="whitespace-nowrap border-b px-3 py-2 text-xs text-gray-500">{{ $area }}</td>
                      <td class="whitespace-nowrap border-b px-3 py-2 text-xs text-gray-500">{{ $lots }}
                      </td>
                    </tr>
                    <tr>
                      <td class="whitespace-nowrap border-b py-2 pl-4 pr-3 text-xs font-medium text-gray-900 sm:pl-3">
                        Untitled without CLOA</td>
                      @php
                        $area = App\Models\BasicInformation::where('title', '=', '')
                            ->where('cloa_number', '=', 'NO CLOA')
                            ->where('municipality', 'like', '%' . 'Polomolok' . '%')
                            ->sum('title_area');

                        $lots = App\Models\BasicInformation::where('title', '=', '')
                            ->where('cloa_number', '=', 'NO CLOA')
                            ->where('municipality', 'like', '%' . 'Polomolok' . '%')
                            ->count();
                      @endphp
                      <td class="whitespace-nowrap border-b px-3 py-2 text-xs text-gray-500">{{ $area }}</td>
                      <td class="whitespace-nowrap border-b px-3 py-2 text-xs text-gray-500">{{ $lots }}
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

                <table class="min-w-full divide-y divide-gray-300">
                  <thead>
                    <tr>
                      <th scope="col" class="py-2 pl-4 pr-3 text-left text-xs font-semibold text-gray-900 sm:pl-3">
                        STATUS</th>
                      <th scope="col" class="px-3 py-2 text-left text-xs font-semibold text-gray-900">AREA IN
                        HECTARES</th>

                    </tr>
                  </thead>
                  <tbody class="bg-white">
                    <tr>
                      <td class="whitespace-nowrap border-b py-2 pl-4 pr-3 text-xs font-medium text-gray-900 sm:pl-3">
                        Areas Leased by Dolefil</td>
                      <td class="whitespace-nowrap border-b px-3 py-2 text-xs text-gray-500">
                        {{ App\Models\Actual::sum('dolephil_leased') }}</td>
                      </td>
                    </tr>
                    <tr>
                      <td class="whitespace-nowrap border-b py-2 pl-4 pr-3 text-xs font-medium text-gray-900 sm:pl-3">
                        DARBC Growership</td>
                      <td class="whitespace-nowrap border-b px-3 py-2 text-xs text-gray-500">
                        {{ App\Models\Actual::sum('darbc_grower') }}</td>
                      </td>
                      </td>
                    </tr>

                    <td class="whitespace-nowrap border-b py-2 pl-4 pr-3 text-xs font-medium text-gray-900 sm:pl-3">
                      FREE LOTS</td>
                    <td class="whitespace-nowrap border-b px-3 py-2 text-xs text-gray-500">
                      {{ App\Models\Actual::where('dolephil_leased', '=', '')->where('darbc_grower', '=', '')->count() }}
                    </td>
                    </td>
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
                  @php
                    $total = App\Models\BasicInformation::where('municipality', 'like', '%' . 'TUPI' . '%')->sum('title_area');
                  @endphp
                  <span>TUPI AREA: {{ $total }}</span>
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

                    </tr>
                  </thead>
                  <tbody class="bg-white">
                    <tr>
                      <td class="whitespace-nowrap border-b py-2 pl-4 pr-3 text-xs font-medium text-gray-900 sm:pl-3">
                        Titled with CLOA</td>
                      @php
                        $area = App\Models\BasicInformation::whereNotNull('title')
                            ->where('cloa_number', '!=', 'NO CLOA')
                            ->where('municipality', 'like', '%' . 'TUPI' . '%')
                            ->sum('title_area');
                        $lots = App\Models\BasicInformation::whereNotNull('title')
                            ->where('cloa_number', '!=', 'NO CLOA')
                            ->where('municipality', 'like', '%' . 'TUPI' . '%')
                            ->count();
                      @endphp
                      <td class="whitespace-nowrap border-b px-3 py-2 text-xs text-gray-500">{{ $area }}</td>
                      <td class="whitespace-nowrap border-b px-3 py-2 text-xs text-gray-500">{{ $lots }}
                      </td>
                    </tr>
                    <tr>
                      <td class="whitespace-nowrap border-b py-2 pl-4 pr-3 text-xs font-medium text-gray-900 sm:pl-3">
                        Titled without CLOA</td>
                      @php
                        $area = App\Models\BasicInformation::whereNotNull('title')
                            ->where('cloa_number', '=', 'NO CLOA')
                            ->where('municipality', 'like', '%' . 'TUPI' . '%')
                            ->sum('title_area');
                        $lots = App\Models\BasicInformation::whereNotNull('title')
                            ->where('cloa_number', '=', 'NO CLOA')
                            ->where('municipality', 'like', '%' . 'TUPI' . '%')
                            ->count();
                      @endphp
                      <td class="whitespace-nowrap border-b px-3 py-2 text-xs text-gray-500">{{ $area }}</td>
                      <td class="whitespace-nowrap border-b px-3 py-2 text-xs text-gray-500">{{ $lots }}
                      </td>
                    </tr>
                    <tr>
                      <td class="whitespace-nowrap border-b py-2 pl-4 pr-3 text-xs font-medium text-gray-900 sm:pl-3">
                        Untitled with CLOA</td>
                      @php
                        $area = App\Models\BasicInformation::where('title', '=', '')
                            ->where('cloa_number', '!=', 'NO CLOA')
                            ->where('municipality', 'like', '%' . 'TUPI' . '%')
                            ->sum('title_area');

                        $lots = App\Models\BasicInformation::where('title', '=', '')
                            ->where('cloa_number', '!=', 'NO CLOA')
                            ->where('municipality', 'like', '%' . 'TUPI' . '%')
                            ->count();
                      @endphp
                      <td class="whitespace-nowrap border-b px-3 py-2 text-xs text-gray-500">{{ $area }}</td>
                      <td class="whitespace-nowrap border-b px-3 py-2 text-xs text-gray-500">{{ $lots }}
                      </td>
                    </tr>
                    <tr>
                      <td class="whitespace-nowrap border-b py-2 pl-4 pr-3 text-xs font-medium text-gray-900 sm:pl-3">
                        Untitled without CLOA</td>
                      @php
                        $area = App\Models\BasicInformation::where('title', '=', '')
                            ->where('cloa_number', '=', 'NO CLOA')
                            ->where('municipality', 'like', '%' . 'TUPI' . '%')
                            ->sum('title_area');

                        $lots = App\Models\BasicInformation::where('title', '=', '')
                            ->where('cloa_number', '=', 'NO CLOA')
                            ->where('municipality', 'like', '%' . 'TUPI' . '%')
                            ->count();
                      @endphp
                      <td class="whitespace-nowrap border-b px-3 py-2 text-xs text-gray-500">{{ $area }}</td>
                      <td class="whitespace-nowrap border-b px-3 py-2 text-xs text-gray-500">{{ $lots }}
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div>

        </div>
        <div>
          <div class="mt-2 flow-root">
            <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
              <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <div class="p-1 bg-gray-100 text-xs font-bold">
                  @php
                    $total = App\Models\BasicInformation::where('municipality', 'like', '%' . 'GENSAN' . '%')->sum('title_area');
                  @endphp
                  <span>GENSAN AREA: {{ $total }}</span>
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

                    </tr>
                  </thead>
                  <tbody class="bg-white">
                    <tr>
                      <td class="whitespace-nowrap border-b py-2 pl-4 pr-3 text-xs font-medium text-gray-900 sm:pl-3">
                        Titled with CLOA</td>
                      @php
                        $area = App\Models\BasicInformation::whereNotNull('title')
                            ->where('cloa_number', '!=', 'NO CLOA')
                            ->where('municipality', 'like', '%' . 'GENERAL SANTOS' . '%')
                            ->sum('title_area');
                        $lots = App\Models\BasicInformation::whereNotNull('title')
                            ->where('cloa_number', '!=', 'NO CLOA')
                            ->where('municipality', 'like', '%' . 'GENERAL SANTOS' . '%')
                            ->count();
                      @endphp
                      <td class="whitespace-nowrap border-b px-3 py-2 text-xs text-gray-500">{{ $area }}</td>
                      <td class="whitespace-nowrap border-b px-3 py-2 text-xs text-gray-500">{{ $lots }}
                      </td>
                    </tr>
                    <tr>
                      <td class="whitespace-nowrap border-b py-2 pl-4 pr-3 text-xs font-medium text-gray-900 sm:pl-3">
                        Titled without CLOA</td>
                      @php
                        $area = App\Models\BasicInformation::whereNotNull('title')
                            ->where('cloa_number', '=', 'NO CLOA')
                            ->where('municipality', 'like', '%' . 'GENERAL SANTOS' . '%')
                            ->sum('title_area');
                        $lots = App\Models\BasicInformation::whereNotNull('title')
                            ->where('cloa_number', '=', 'NO CLOA')
                            ->where('municipality', 'like', '%' . 'GENERAL SANTOS' . '%')
                            ->count();
                      @endphp
                      <td class="whitespace-nowrap border-b px-3 py-2 text-xs text-gray-500">{{ $area }}</td>
                      <td class="whitespace-nowrap border-b px-3 py-2 text-xs text-gray-500">{{ $lots }}
                      </td>
                    </tr>
                    <tr>
                      <td class="whitespace-nowrap border-b py-2 pl-4 pr-3 text-xs font-medium text-gray-900 sm:pl-3">
                        Untitled with CLOA</td>
                      @php
                        $area = App\Models\BasicInformation::where('title', '=', '')
                            ->where('cloa_number', '!=', 'NO CLOA')
                            ->where('municipality', 'like', '%' . 'GENERAL SANTOS' . '%')
                            ->sum('title_area');

                        $lots = App\Models\BasicInformation::where('title', '=', '')
                            ->where('cloa_number', '!=', 'NO CLOA')
                            ->where('municipality', 'like', '%' . 'GENERAL SANTOS' . '%')
                            ->count();
                      @endphp
                      <td class="whitespace-nowrap border-b px-3 py-2 text-xs text-gray-500">{{ $area }}</td>
                      <td class="whitespace-nowrap border-b px-3 py-2 text-xs text-gray-500">{{ $lots }}
                      </td>
                    </tr>
                    <tr>
                      <td class="whitespace-nowrap border-b py-2 pl-4 pr-3 text-xs font-medium text-gray-900 sm:pl-3">
                        Untitled without CLOA</td>
                      @php
                        $area = App\Models\BasicInformation::where('title', '=', '')
                            ->where('cloa_number', '=', 'NO CLOA')
                            ->where('municipality', 'like', '%' . 'GENERAL SANTOS' . '%')
                            ->sum('title_area');

                        $lots = App\Models\BasicInformation::where('title', '=', '')
                            ->where('cloa_number', '=', 'NO CLOA')
                            ->where('municipality', 'like', '%' . 'GENERAL SANTOS' . '%')
                            ->count();
                      @endphp
                      <td class="whitespace-nowrap border-b px-3 py-2 text-xs text-gray-500">{{ $area }}</td>
                      <td class="whitespace-nowrap border-b px-3 py-2 text-xs text-gray-500">{{ $lots }}
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
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

      new ImageZoom(document.getElementById("img-container"), options2);
    </script>
  </div>
