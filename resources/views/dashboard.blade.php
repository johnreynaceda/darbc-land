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
            <canvas id="bar" height="200"></canvas>
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
        <h1 class="text-2xl font-bold font-montserrat text-gray-700">9,086,8016,123</h1>
      </div>
      <div class="mt-5 grid grid-cols-2 gap-5">
        <div>
          <div class="mt-2 flow-root">
            <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
              <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <div class="p-1 bg-gray-100 text-xs font-bold">
                  <span>POLOMOLOK AREA: 6,669,4968</span>
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
          </div>
        </div>
        <div>
          <div class="mt-2 flow-root">
            <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
              <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <div class="p-1 bg-gray-100 text-xs font-bold">
                  <span>POLOMOLOK AREA: 6,669,4968</span>
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
          </div>
        </div>
        <div>
          <div class="mt-2 flow-root">
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
                  <span>GENSAN AREA: 6,669,4968</span>
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
      // Get the canvas element and create a new chart instance
      var canvas = document.getElementById('bar');
      var chart = new Chart(canvas, {
        type: 'bar',
        data: {
          labels: ['POLOMOLOK', 'TUPI', 'GENSAN', ],
          datasets: [{
            label: 'No. of Lots',
            data: [{{ $polomolok }}, {{ $tupi }}, {{ $gensan }}, 8, 10],
            backgroundColor: [
              'rgba(255, 99, 132, 0.2)',
              'rgba(54, 162, 235, 0.2)',
              'rgba(255, 206, 86, 0.2)',

            ],
            borderColor: [
              'rgba(255, 99, 132, 1)',
              'rgba(54, 162, 235, 1)',
              'rgba(255, 206, 86, 1)',

            ],
            borderWidth: 1
          }]
        },
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: true
              }
            }]
          }
        }
      });
    </script>
  </div>
</x-main-layout>
