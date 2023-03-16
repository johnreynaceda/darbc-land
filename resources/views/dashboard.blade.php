@section('title', 'Dashboard')
<x-main-layout>
  <div class="flex  w-full gap-4">
    <div class="w-4/12">
      <div class="bg-gray-50 rounded-xl p-2 px-4 shadow">
        <header class=" font-bold">DARBC LAND STATUS</header>
        <div class="mt-2">
          <div class="">
            <div id="chart" style="width: 400px; height: 400px;"></div>
          </div>
        </div>
      </div>
      <div class="bg-gray-50  mt-3 rounded-xl p-2 px-4 shadow">
        <header class=" font-bold">DARBC LAND </header>
        <div class="mt-2 flex justify-center">
          <div style="padding-top: 10px" class="h-56">
            <canvas id="piechart2" width="200" height="200"></canvas>
          </div>
        </div>
      </div>
      <div class="bg-gray-50  mt-3 rounded-xl p-2 px-4 shadow">
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
          position: "oter",
        },

        series: [{
          name: 'Access From',
          type: 'pie',

          radius: '50%',
          data: [{
              value: 1048,
              name: 'Search Engine'
            },
            {
              value: 735,
              name: 'Direct'
            },
            {
              value: 580,
              name: 'Email'
            },
            {
              value: 484,
              name: 'Union Ads'
            },
            {
              value: 300,
              name: 'asdasdsdsadasdsad'
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
      const pieChart1 = new Chart(document.getElementById('piechart1'), {
        type: 'pie',
        data: {
          labels: [
            'Red',
            'Blue',
            'Yellow'
          ],
          datasets: [{
            label: 'Patient Counts',
            data: [300, 50, 100],
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
        //set time
        // setInterval(function() {
        //   pieChart1.update();
        // }, 1000);
      });

      const pieChart2 = new Chart(document.getElementById('piechart2'), {
        type: 'pie',
        data: {
          labels: [
            'Red',
            'Blue',
            'Yellow'
          ],
          datasets: [{
            label: 'Patient Counts',
            data: [300, 50, 100],
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

      const pieChart3 = new Chart(document.getElementById('piechart3'), {
        type: 'bar',
        data: {
          labels: [
            'Red',
            'Blue',
            'Yellow'
          ],
          datasets: [{
            label: 'Patient Counts',
            data: [300, 50, 100],
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
