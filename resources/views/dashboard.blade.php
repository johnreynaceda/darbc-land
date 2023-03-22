@section('title', 'Dashboard')
<x-main-layout>
  <div class="flex  w-full gap-4">
    <div class="w-4/12">
      <div class="bg-gray-50 rounded-xl p-2 px-4 shadow">
        @php
          $leased = App\Models\Actual::where('land_status', 'Leased')->count();
          $unplanted = App\Models\Actual::where('land_status', 'Unplanted')->count();
          $growers = App\Models\Actual::where('land_status', 'Growers')->count();
          $compromise = App\Models\Actual::where('land_status', 'Compromise Agreement')->count();
          $deleted = App\Models\Actual::where('land_status', 'Deleted')->count();
          $others = App\Models\Actual::where('land_status', 'Others')->count();
          
        @endphp
        <header class=" font-bold">STATUS</header>
        <div class="mt-2">
          <div class="">
            <div id="chart" style="width: 400px; height: 400px;"></div>
          </div>
        </div>
      </div>
      <div class="bg-gray-50  mt-3 rounded-xl p-2 px-4 shadow">
        @php
          $gross = App\Models\Actual::sum('gross_area');
          $planted = App\Models\Actual::sum('planted_area');
          $gulley = App\Models\Actual::sum('gulley_area');
          $total = App\Models\Actual::sum('total_area');
          $facility = App\Models\Actual::sum('facility_area');
          $unutilized = App\Models\Actual::sum('unutilized_area');
        @endphp
        <header class=" font-bold">ACTUAL SUMMARY </header>
        <div class="mt-2">
          <div class="">
            <div id="chart1" style="width: 400px; height: 400px;"></div>
          </div>
        </div>
      </div>
      <div class="bg-gray-50  mt-3 rounded-xl p-2 px-4 shadow">
        @php
          $polomolok = App\Models\BasicInformation::where('municipality', 'like', '%' . 'Polomolok' . '%')->count();
          $tupi = App\Models\BasicInformation::where('municipality', 'like', '%' . 'Tupi' . '%')->count();
          $gensan = App\Models\BasicInformation::where('municipality', 'like', '%' . 'GenSan' . '%')->count();
        @endphp
        <header class=" font-bold">MUNICIPALITIES</header>
        <div class="mt-2 flex justify-center w-full">
          <div style="padding-top: 10px" class="h-56 ">
            <canvas id="piechart3" height="200"></canvas>
          </div>
        </div>
      </div>
    </div>
    <div class="flex-1 ">
      <div class=" flex justify-center">
        <img src="{{ asset('images/darbcmap3.jpg') }}" class="h-96" alt="">
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
                        HECTARS</th>
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
                        HECTARS</th>

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
                        HECTARS</th>
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
          {{-- <div class="mt-2 flow-root">
            <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
              <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <div class="p-1 bg-gray-100 text-xs font-bold">
                  <span>TUPI AREA: 6,669,4968</span>
                </div>
                <table class="min-w-full divide-y divide-gray-300">
                  <thead>
                    <tr>
                      <th scope="col" class="py-2 pl-4 pr-3 text-left text-xs font-semibold text-gray-900 sm:pl-3">
                        STATUS</th>
                      <th scope="col" class="px-3 py-2 text-left text-xs font-semibold text-gray-900">AREA IN
                        HECTARS</th>
                      <th scope="col" class="px-3 py-2 text-left text-xs font-semibold text-gray-900">NO. OF LOTS
                      </th>

                    </tr>
                  </thead>
                  <tbody class="bg-white">
                    <tr>
                      <td class="whitespace-nowrap border-b py-2 pl-4 pr-3 text-xs font-medium text-gray-900 sm:pl-3">
                        Lindsay
                        Walton</td>
                      <td class="whitespace-nowrap border-b px-3 py-2 text-xs text-gray-500">Front-end Developer</td>
                      <td class="whitespace-nowrap border-b px-3 py-2 text-xs text-gray-500">lindsay.walton@example.com
                      </td>
                    </tr>
                    <tr>
                      <td class="whitespace-nowrap border-b py-2 pl-4 pr-3 text-xs font-medium text-gray-900 sm:pl-3">
                        Lindsay
                        Walton</td>
                      <td class="whitespace-nowrap border-b px-3 py-2 text-xs text-gray-500">Front-end Developer</td>
                      <td class="whitespace-nowrap border-b px-3 py-2 text-xs text-gray-500">lindsay.walton@example.com
                      </td>
                    </tr>
                    <tr>
                      <td class="whitespace-nowrap border-b py-2 pl-4 pr-3 text-xs font-medium text-gray-900 sm:pl-3">
                        Lindsay
                        Walton</td>
                      <td class="whitespace-nowrap border-b px-3 py-2 text-xs text-gray-500">Front-end Developer</td>
                      <td class="whitespace-nowrap border-b px-3 py-2 text-xs text-gray-500">lindsay.walton@example.com
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div> --}}
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
                        HECTARS</th>
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
                            ->where('municipality', 'like', '%' . 'GENSAN' . '%')
                            ->sum('title_area');
                        $lots = App\Models\BasicInformation::whereNotNull('title')
                            ->where('cloa_number', '!=', 'NO CLOA')
                            ->where('municipality', 'like', '%' . 'GENSAN' . '%')
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
                            ->where('municipality', 'like', '%' . 'GENSAN' . '%')
                            ->sum('title_area');
                        $lots = App\Models\BasicInformation::whereNotNull('title')
                            ->where('cloa_number', '=', 'NO CLOA')
                            ->where('municipality', 'like', '%' . 'GENSAN' . '%')
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
                            ->where('municipality', 'like', '%' . 'GENSAN' . '%')
                            ->sum('title_area');
                        
                        $lots = App\Models\BasicInformation::where('title', '=', '')
                            ->where('cloa_number', '!=', 'NO CLOA')
                            ->where('municipality', 'like', '%' . 'GENSAN' . '%')
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
                            ->where('municipality', 'like', '%' . 'GENSAN' . '%')
                            ->sum('title_area');
                        
                        $lots = App\Models\BasicInformation::where('title', '=', '')
                            ->where('cloa_number', '=', 'NO CLOA')
                            ->where('municipality', 'like', '%' . 'GENSAN' . '%')
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

    <script>
      var myChart = echarts.init(document.getElementById('chart'));
      var option = {

        tooltip: {
          trigger: 'item'
        },

        label: {
          formatter: "{b}: {c} ({d}%)",
        },

        series: [{

          type: 'pie',

          radius: '40%',
          data: [{
              value: {{ $leased }},
              name: 'Leased'
            },
            {
              value: {{ $unplanted }},
              name: 'Unplanted'
            },
            {
              value: {{ $growers }},
              name: 'Growers'
            },
            {
              value: {{ $deleted }},
              name: 'Deleted'
            },
            {
              value: {{ $compromise }},
              name: 'Compromise Aggrement'
            }, {
              value: {{ $others }},
              name: 'Others'
            }
          ],
          labelType: {
            type: Object,
            default: {
              fontSize: 12,
            },
          },
          emphasis: {
            itemStyle: {
              shadowBlur: 10,
              shadowOffsetX: 0,
              shadowColor: 'rgba(0, 0, 0, 0.5)'
            }
          }
        }]
      };
      myChart.setOption(option);
    </script>

    <script>
      var myChart1 = echarts.init(document.getElementById('chart1'));
      var option = {

        tooltip: {
          trigger: 'item'
        },

        label: {
          formatter: "{b}: {c} ({d}%)",
        },

        series: [{

          type: 'pie',

          radius: '40%',
          data: [{
              value: {{ $gross }},
              name: 'Gross Area'
            },
            {
              value: {{ $planted }},
              name: 'Planted Area'
            },
            {
              value: {{ $gulley }},
              name: 'Gulley Area'
            },
            {
              value: {{ $total }},
              name: 'Total Area'
            },
            {
              value: {{ $facility }},
              name: 'Facility Area'
            }, {
              value: {{ $unutilized }},
              name: 'Unutilized Area'
            }
          ],
          labelType: {
            type: Object,
            default: {
              fontSize: 12,
            },
          },
          emphasis: {
            itemStyle: {
              shadowBlur: 10,
              shadowOffsetX: 0,
              shadowColor: 'rgba(0, 0, 0, 0.5)'
            }
          }
        }]
      };
      myChart1.setOption(option);
    </script>

    <script>
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
    </script>
  </div>
</x-main-layout>
