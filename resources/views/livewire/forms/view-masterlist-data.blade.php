<div x-data>
    <div>
        <div class="flex justify-end py-2">
            <x-button label="PRINT" class="font-bold" icon="printer" dark @click="printOut($refs.printContainer.outerHTML);" />
        </div>
        <div x-ref="printContainer" >
            <div class="grid grid-cols-1">
                <div class="border bg-green-700 p-0.5 flex space-x-2 items-center">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-6 w-6 fill-white">
                    <path
                      d="M16 2L21 7V21.0082C21 21.556 20.5551 22 20.0066 22H3.9934C3.44476 22 3 21.5447 3 21.0082V2.9918C3 2.44405 3.44495 2 3.9934 2H16ZM13.529 14.4464L15.7395 16.6569L17.1537 15.2426L14.9432 13.0322C15.8492 11.4983 15.6432 9.48951 14.3252 8.17157C12.7631 6.60948 10.2305 6.60948 8.66839 8.17157C7.1063 9.73367 7.1063 12.2663 8.66839 13.8284C9.98633 15.1464 11.9951 15.3524 13.529 14.4464ZM12.911 12.4142C12.13 13.1953 10.8637 13.1953 10.0826 12.4142C9.30156 11.6332 9.30156 10.3668 10.0826 9.58579C10.8637 8.80474 12.13 8.80474 12.911 9.58579C13.6921 10.3668 13.6921 11.6332 12.911 12.4142Z">
                    </path>
                  </svg>
                  <span class="font-bold text-black">BASIC INFORMATION</span>
                </div>
                @php
                if($encumbered == null)
                {
                    $area = '';
                  $variance = '';
                }else{
                    $json1 = json_decode($encumbered, true);
                    $area = $json1['area'];
                    $variance = $json1['variance'];
                }

                if($previous_copy_of_title == null)
                {
                    $type = '';
                    $number = '';
                }else{
                    $json2 = json_decode($previous_copy_of_title, true);
                    $type = $json2['type of title'];
                    $number = $json2['no.'];
                }
              @endphp
              </div>
              <div class="grid grid-cols-4 mt-0.5">
                <div class="flex items-center">
                  <span class="rounded-l-sm text-2xs bg-gray-100 border font-bold px-2 w-32 py-2">LOT NO:</span>
                  <span class="flex-1 text-xs text-center bg-green-100 border py-2">{{ $basicInfo->lot_number == null ? '--' : $basicInfo->lot_number }}</span>
                </div>
                <div class="flex items-center">
                  <span class=" pr-4 py-2 text-2xs bg-gray-100 font-bold border px-2">SURVEY NO:</span>
                  <span class="flex-1 text-center text-xs bg-green-100 border py-2">{{ $basicInfo->survey_number == null ? '--' : $basicInfo->survey_number }}</span>
                </div>
                <div class="flex col-span-2 items-center">
                  <span class="bg-gray-100 text-2xs font-bold border px-2 pr-8 py-2  w-40">PREV. LAND OWNER: </span>
                  <span class="flex-1 text-xs  text-center bg-green-100 border py-2">{{ $basicInfo->previous_land_owner == null ? '--' : $basicInfo->previous_land_owner }}</span>
                </div>
                <div class="flex items-center">
                  <span class="rounded-l-sm text-2xs bg-gray-100 border font-bold px-2 w-32 py-2">FIELD NO:</span>
                  <span class="flex-1 text-xs text-center bg-green-100 border py-2">{{ $basicInfo->field_number == null ? '--' : $basicInfo->field_number }}</span>
                </div>
                <div class="flex items-center">
                  <span class=" pr-4 py-2 text-2xs bg-gray-100 font-bold border px-2">TITLE AREA:</span>
                  <span class="flex-1 text-xs text-center bg-green-100 border py-2">{{ $basicInfo->title_area == null ? '--' : $basicInfo->title_area }}</span>
                </div>
                <div class="flex col-span-2  items-center">
                  <span class=" text-2xs bg-gray-100 font-bold border px-2 w-40 py-2">AWARDED AREA:</span>
                  <span class="flex-1 text-xs text-center bg-green-100 border py-2">{{ $basicInfo->awarded_area == null ? '--' : $basicInfo->awarded_area }}</span>
                </div>
                <div class="flex items-center">
                  <span class="rounded-l-sm text-2xs bg-gray-100 border font-bold px-2 w-32 py-2">TITLE NO:</span>
                  <span class="flex-1 text-xs text-center bg-green-100 border py-2">{{ $basicInfo->taxes->first()?->title_number == null ? '--' : $basicInfo->taxes->first()?->title_number }}</span>
                </div>
                <div class="grid grid-cols-2">
                  <div class="flex items-center">
                      <span class=" pr-7 py-2 text-2xs bg-gray-100 font-bold border px-2">CLOA NO:</span>
                      <span class="flex-1 text-xs text-center bg-green-100 border py-2">{{ $basicInfo->cloa_number == null ? '--' : $basicInfo->cloa_number }}</span>
                    </div>
                    <div class="flex items-center">
                      <span class=" pr-4 py-2 text-2xs bg-gray-100 font-bold border px-2">PAGE:</span>
                      <span class="flex-1 text-xs text-center bg-green-100 border py-2">{{ $basicInfo->page == null ? '--' : $basicInfo->page }}</span>
                    </div>
                </div>
                <div class="flex items-center">
                  <span class="text-2xs bg-gray-100 font-bold border px-2 w-40 py-2">TYPE OF TITLE. :</span>
                  @if ($type == null)
                  <span class="flex-1 text-xs text-center bg-green-100 border py-2">--</span>
                  @else
                  @if ($type === "TCT")
                  <span class="flex-1 text-xs text-center bg-green-100 border py-2">Transfer Certificate Title (TCT)</span>
                  @else
                  <span class="flex-1 text-xs text-center bg-green-100 border py-2">Original Certificate Title (OCT)</span>
                  @endif
                  @endif

                </div>
                <div class="flex items-center">
                  <span class="text-2xs bg-gray-100 font-bold border px-2 w-32 py-2">PREV. TITLE NO. :</span>
                  <span class="flex-1 text-xs text-center bg-green-100 border py-2">{{ $number == null ? '--' : $number }}</span>
                </div>
                <div class="flex col-span-2 items-center">
                  <span class="rounded-l-sm bg-gray-100 text-2xs font-bold border px-2 w-32 py-2">BARANGAY:</span>
                  <span class="flex-1 text-xs text-center bg-green-100 border py-2">{{ $basicInfo->location == null ? '--' : $basicInfo->location }}</span>
                </div>
                <div class="flex  items-center">
                  <span class="bg-gray-100 text-2xs font-bold border px-2 w-40 ">
                    <h1>ENCUMBERED:</h1>
                    <h1 class="text-2xs">AREA</h1>
                  </span>
                  <span class="flex-1 text-xs text-center bg-green-100 border py-2">{{$area == null ? '0' : $area}}</span>
                </div>
                <div class="flex  items-center">
                  <span class="bg-gray-100 text-2xs font-bold border px-2 w-32 ">
                    <h1>ENCUMBERED:</h1>
                    <h1 class="text-2xs">VARIANCE</h1>
                  </span>
                  <span class="flex-1 text-xs text-center bg-green-100 border py-2">{{$variance == null ? '0' : $variance}}</span>
                </div>
                <div class="flex col-span-2 items-center">
                  <span class="rounded-l-sm bg-gray-100 text-2xs font-bold border px-2 w-32 py-2">MUNICIPALITY:</span>
                  <span class="flex-1 text-xs text-center bg-green-100 border py-2">{{$basicInfo->municipality == null ? '--' : $basicInfo->municipality}}</span>
                </div>
                <div class="flex col-span-2 items-center">
                  <span class="text-2xs bg-gray-100 font-bold border px-2 w-40 py-2">REMARKS :</span>
                  <span class="flex-1 text-xs text-center bg-green-100 border py-2">{{ $basicInfo->remarks == null ? '--' : $basicInfo->remarks }}</span>
                </div>
                <div class="flex col-span-2 items-center">
                  <span class="rounded-l-sm text-2xs bg-gray-100 font-bold border px-2 w-32 py-2">TITLE STATUS:</span>
                  @if ($basicInfo->title_status == null)
                  <span class="flex-1 text-xs text-center bg-green-100 border py-2">--</span>
                  @else
                  @switch($basicInfo->title_status)
                      @case('TWC')
                      <span class="flex-1 text-xs text-center bg-green-100 border py-2">Title With CLOA (TWC)</span>
                          @break
                      @case('TWOC')
                          <span class="flex-1 text-xs text-center bg-green-100 border py-2">Title Without CLOA (TWOC)</span>
                           @break
                      @case('UWC')
                           <span class="flex-1 text-xs text-center bg-green-100 border py-2">Untitled With CLOA (UWC)</span>
                            @break
                      @case('UWOC')
                            <span class="flex-1 text-xs text-center bg-green-100 border py-2">Untitled Without CLOA (UWOC)</span>
                             @break
                      @default
                      <span class="flex-1 text-xs text-center bg-green-100 border py-2">--</span>
                      @break
                  @endswitch
                  @endif
                  {{-- <span class="flex-1 text-xs text-center bg-green-100 border py-2">{{$basicInfo->title_status == null ? '--' : $basicInfo->title_status}}</span> --}}
                </div>
                <div class="flex col-span-2 items-center">
                  <span class="rounded-l-sm text-2xs bg-gray-100 font-bold border px-2 w-40 py-2">STATUS:</span>
                  <span class="flex-1 text-xs text-center bg-green-100 border py-2">{{$basicInfo->status == null ? '--' : $basicInfo->status}}</span>
                </div>
              </div>
              <div class="mt-0 5">
                <div class="flex items-center bg-orange-500 space-x-1 py-1 px-2">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                    class="h-6 w-6 fill-green-500 rounded-full bg-white">
                    <path
                      d="M12 2C17.52 2 22 6.48 22 12C22 17.52 17.52 22 12 22C6.48 22 2 17.52 2 12C2 6.48 6.48 2 12 2ZM12 11H8V13H12V16L16 12L12 8V11Z">
                    </path>
                  </svg>
                  <span class="font-bold text-black">ADDITIONAL INFORMATION</span>
                </div>
                <div class="grid grid-cols-2 bg-green-100">
                  <div>
                    <div class="mt-5 md:col-span-2 md:mt-0">
                      <div class="border h-80 overflow-y-auto p-5">
                        <div class="flex justify-between items-center">
                          <div class="flex space-x-3 items-center">
                            <h1 class="font-bold text-lg text-gray-600 font-montserrat">ACTUAL</h1>
                            {{-- <x-native-select wire:model="tax_get">
                              @foreach ($tax_years as $item)
                                <option value="{{ $item }}">{{ $item }}</option>
                              @endforeach

                            </x-native-select> --}}
                          </div>
                          <div>
                            <x-button label="New Actual" icon="plus" class="print-button" positive wire:click="$set('addActualModal', true)" />
                          </div>
                        </div>
                        <div class="mt-3">

                          <div class="">
                            <div class=" flow-root">
                              <div class="">
                                <div class="border overflow-x-auto">
                                    @foreach ($actuals as $item)
                                    <div class="mb-4">
                                        @if ($item->land_status === "LEASED")
                                        <div class="">
                                            <table class="min-w-full divide-y divide-gray-300">
                                                <thead>
                                                  <tr class="divide-x divide-gray-200">
                                                    <th scope="col"
                                                      class="py-3.5 pl-4 pr-4 text-left text-xs font-semibold text-gray-900 bg-gray-100  whitespace-nowrap">LAND STATUS
                                                    </th>
                                                    <th scope="col" class="px-4 py-3.5 text-left text-xs font-semibold text-gray-900 bg-gray-100 whitespace-nowrap">
                                                      LEASED AREA
                                                    </th>
                                                    <th scope="col"
                                                      class="py-3.5 pl-4 pr-4 text-left text-xs font-semibold text-gray-900 bg-gray-100  whitespace-nowrap">
                                                      FIELD NUMBER</th>
                                                    <th scope="col"
                                                      class="py-3.5 pl-4 pr-4 text-center text-xs font-semibold text-gray-900 bg-gray-100  whitespace-nowrap">
                                                      ACTION</th>
                                                  </tr>
                                                </thead>
                                                <tbody class="divide-y divide-gray-200 bg-gray-100">
                                                    <tr class="divide-x divide-gray-200">
                                                      <td class="whitespace-nowrap py-4 pl-4 pr-4 text-xs font-medium text-gray-900 ">
                                                        {{ $item->land_status }}</td>
                                                      <td class="whitespace-nowrap p-4 text-xs text-gray-500">{{ $item->dolephil_leased }}
                                                      </td>
                                                      <td class="whitespace-nowrap py-4 pl-4 pr-4 text-xs text-gray-500 ">
                                                        {{ $item->field_number }}
                                                      </td>
                                                      <td class="whitespace-nowrap py-4 pl-4 pr-4 text-xs text-gray-500 ">
                                                        <div class="print-button flex space-x-3 justify-center">
                                                            <button wire:click="updateActual({{$item->id}})">
                                                                <svg class="h-5 w-5 flex-shrink-0 text-green-800 font-medium" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                                  </svg>
                                                            </button>
                                                            <button wire:click="deleteActual({{$item->id}})">
                                                            <svg class="h-5 w-5 flex-shrink-0 font-medium text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                           </svg>
                                                          </button>
                                                         </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                              </table>
                                        </div>

                                        @elseif ($item->land_status === "GROWERS")
                                        <div class="">
                                            <table class="min-w-full divide-y divide-gray-300">
                                                <thead>
                                                  <tr class="divide-x divide-gray-200">
                                                    <th scope="col"
                                                      class="py-3.5 pl-4 pr-4 text-left text-xs font-semibold text-gray-900 bg-gray-100  whitespace-nowrap">LAND STATUS
                                                    </th>
                                                    <th scope="col" class="px-4 py-3.5 text-left text-xs font-semibold text-gray-900 bg-gray-100 whitespace-nowrap">
                                                      GROWERS AREA
                                                    </th>
                                                    <th scope="col"
                                                      class="py-3.5 pl-4 pr-4 text-left text-xs font-semibold text-gray-900 bg-gray-100  whitespace-nowrap">
                                                      FIELD NUMBER</th>
                                                    <th scope="col"
                                                      class="py-3.5 pl-4 pr-4 text-center text-xs font-semibold text-gray-900 bg-gray-100  whitespace-nowrap">
                                                      ACTION</th>
                                                  </tr>
                                                </thead>
                                                <tbody class="divide-y divide-gray-200 bg-gray-100">
                                                    <tr class="divide-x divide-gray-200">
                                                      <td class="whitespace-nowrap py-4 pl-4 pr-4 text-xs font-medium text-gray-900 ">
                                                        {{ $item->land_status }}</td>
                                                      <td class="whitespace-nowrap p-4 text-xs text-gray-500">{{ $item->darbc_grower }}
                                                      </td>
                                                      <td class="whitespace-nowrap py-4 pl-4 pr-4 text-xs text-gray-500 ">
                                                        {{ $item->field_number }}
                                                      </td>
                                                      <td class="whitespace-nowrap py-4 pl-4 pr-4 text-xs text-gray-500 ">
                                                        <div class="print-button flex space-x-3 justify-center">
                                                            <button wire:click="updateActual({{$item->id}})">
                                                                <svg class="h-5 w-5 flex-shrink-0 text-green-800 font-medium" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                                  </svg>
                                                            </button>
                                                            <button wire:click="deleteActual({{$item->id}})">
                                                            <svg class="h-5 w-5 flex-shrink-0 font-medium text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                           </svg>
                                                          </button>
                                                         </div></td>
                                                    </tr>
                                                </tbody>
                                              </table>
                                        </div>

                                        @elseif ($item->land_status === "UNPLANTED")
                                        <div class="">
                                            <table class="min-w-full divide-y divide-gray-300">
                                                <thead>
                                                  <tr class="divide-x divide-gray-200">
                                                    <th scope="col"
                                                      class="py-3.5 pl-4 pr-4 text-left text-xs font-semibold text-gray-900 bg-gray-100  whitespace-nowrap">LAND STATUS
                                                    </th>
                                                    <th scope="col" class="px-4 py-3.5 text-left text-xs font-semibold text-gray-900 bg-gray-100 whitespace-nowrap">
                                                      UNPLANTED AREA
                                                    </th>
                                                    <th scope="col"
                                                      class="py-3.5 pl-4 pr-4 text-left text-xs font-semibold text-gray-900 bg-gray-100  whitespace-nowrap">
                                                      FIELD NUMBER</th>
                                                    <th scope="col"
                                                      class="py-3.5 pl-4 pr-4 text-center text-xs font-semibold text-gray-900 bg-gray-100  whitespace-nowrap">
                                                      ACTION</th>
                                                  </tr>
                                                </thead>
                                                <tbody class="divide-y divide-gray-200 bg-gray-100">
                                                    <tr class="divide-x divide-gray-200">
                                                      <td class="whitespace-nowrap py-4 pl-4 pr-4 text-xs font-medium text-gray-900 ">
                                                        {{ $item->land_status }}</td>
                                                      <td class="whitespace-nowrap p-4 text-xs text-gray-500">{{ $item->owned_but_not_planted }}
                                                      </td>
                                                      <td class="whitespace-nowrap py-4 pl-4 pr-4 text-xs text-gray-500 ">
                                                        {{ $item->field_number }}
                                                      </td>
                                                      <td class="whitespace-nowrap py-4 pl-4 pr-4 text-xs text-gray-500 ">
                                                        <div class="print-button flex space-x-3 justify-center">
                                                            <button wire:click="updateActual({{$item->id}})">
                                                                <svg class="h-5 w-5 flex-shrink-0 text-green-800 font-medium" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                                  </svg>
                                                            </button>
                                                            <button wire:click="deleteActual({{$item->id}})">
                                                            <svg class="h-5 w-5 flex-shrink-0 font-medium text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                           </svg>
                                                          </button>
                                                         </div></td>
                                                    </tr>
                                                </tbody>
                                              </table>
                                        </div>
                                        @elseif ($item->land_status === "COMPROMISE AGREEMENT")
                                        <div class="">
                                            <table class="min-w-full divide-y divide-gray-300">
                                                <thead>
                                                  <tr class="divide-x divide-gray-200">
                                                    <th scope="col"
                                                      class="py-3.5 pl-4 pr-4 text-left text-xs font-semibold text-gray-900 bg-gray-100  whitespace-nowrap">LAND STATUS
                                                    </th>
                                                    <th scope="col" class="px-4 py-3.5 text-left text-xs font-semibold text-gray-900 bg-gray-100 whitespace-nowrap">
                                                      UNPLANTED AREA
                                                    </th>
                                                    <th scope="col"
                                                      class="py-3.5 pl-4 pr-4 text-left text-xs font-semibold text-gray-900 bg-gray-100  whitespace-nowrap">
                                                      FIELD NUMBER</th>
                                                    <th scope="col"
                                                      class="py-3.5 pl-4 pr-4 text-center text-xs font-semibold text-gray-900 bg-gray-100  whitespace-nowrap">
                                                      ACTION</th>
                                                  </tr>
                                                </thead>
                                                <tbody class="divide-y divide-gray-200 bg-gray-100">
                                                    <tr class="divide-x divide-gray-200">
                                                      <td class="whitespace-nowrap py-4 pl-4 pr-4 text-xs font-medium text-gray-900 ">
                                                        {{ $item->land_status }}</td>
                                                      <td class="whitespace-nowrap p-4 text-xs text-gray-500">{{ $item->owned_but_not_planted }}
                                                      </td>
                                                      <td class="whitespace-nowrap py-4 pl-4 pr-4 text-xs text-gray-500 ">
                                                        {{ $item->field_number }}
                                                      </td>
                                                      <td class="whitespace-nowrap py-4 pl-4 pr-4 text-xs text-gray-500 ">
                                                        <div class="print-button flex space-x-3 justify-center">
                                                            <button wire:click="updateActual({{$item->id}})">
                                                                <svg class="h-5 w-5 flex-shrink-0 text-green-800 font-medium" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                                  </svg>
                                                            </button>
                                                            <button wire:click="deleteActual({{$item->id}})">
                                                            <svg class="h-5 w-5 flex-shrink-0 font-medium text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                           </svg>
                                                          </button>
                                                         </div></td>
                                                    </tr>
                                                </tbody>
                                              </table>
                                        </div>
                                        @elseif ($item->land_status === "DELETED")
                                        <div class="">
                                            <table class="min-w-full divide-y divide-gray-300">
                                                <thead>
                                                  <tr class="divide-x divide-gray-200">
                                                    <th scope="col"
                                                      class="py-3.5 pl-4 pr-4 text-left text-xs font-semibold text-gray-900 bg-gray-100  whitespace-nowrap">LAND STATUS
                                                    </th>
                                                    <th scope="col" class="px-4 py-3.5 text-left text-xs font-semibold text-gray-900 bg-gray-100 whitespace-nowrap">
                                                      UNPLANTED AREA
                                                    </th>
                                                    <th scope="col"
                                                      class="py-3.5 pl-4 pr-4 text-left text-xs font-semibold text-gray-900 bg-gray-100  whitespace-nowrap">
                                                      FIELD NUMBER</th>
                                                    <th scope="col"
                                                      class="py-3.5 pl-4 pr-4 text-center text-xs font-semibold text-gray-900 bg-gray-100  whitespace-nowrap">
                                                      ACTION</th>
                                                  </tr>
                                                </thead>
                                                <tbody class="divide-y divide-gray-200 bg-gray-100">
                                                    <tr class="divide-x divide-gray-200">
                                                      <td class="whitespace-nowrap py-4 pl-4 pr-4 text-xs font-medium text-gray-900 ">
                                                        {{ $item->land_status }}</td>
                                                      <td class="whitespace-nowrap p-4 text-xs text-gray-500">{{ $item->owned_but_not_planted }}
                                                      </td>
                                                      <td class="whitespace-nowrap py-4 pl-4 pr-4 text-xs text-gray-500 ">
                                                        {{ $item->field_number }}
                                                      </td>
                                                      <td class="whitespace-nowrap py-4 pl-4 pr-4 text-xs text-gray-500 ">
                                                        <div class="print-button flex space-x-3 justify-center">
                                                            <button wire:click="updateActual({{$item->id}})">
                                                                <svg class="h-5 w-5 flex-shrink-0 text-green-800 font-medium" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                                  </svg>
                                                            </button>
                                                            <button wire:click="deleteActual({{$item->id}})">
                                                            <svg class="h-5 w-5 flex-shrink-0 font-medium text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                           </svg>
                                                          </button>
                                                         </div></td>
                                                    </tr>
                                                </tbody>
                                              </table>
                                        </div>
                                        @else
                                        <div class="">
                                            <table class="min-w-full divide-y divide-gray-300">
                                                <thead>
                                                  <tr class="divide-x divide-gray-200">
                                                    <th scope="col"
                                                      class="py-3.5 pl-4 pr-4 text-left text-xs font-semibold text-gray-900 bg-gray-100  whitespace-nowrap">LAND STATUS
                                                    </th>
                                                    <th scope="col" class="px-4 py-3.5 text-left text-xs font-semibold text-gray-900 bg-gray-100 whitespace-nowrap">
                                                      LEASED AREA
                                                    </th>
                                                    <th scope="col"
                                                      class="py-3.5 pl-4 pr-4 text-left text-xs font-semibold text-gray-900 bg-gray-100  whitespace-nowrap">
                                                      FIELD NUMBER</th>
                                                    <th scope="col"
                                                      class="py-3.5 pl-4 pr-4 text-center text-xs font-semibold text-gray-900 bg-gray-100  whitespace-nowrap">
                                                      ACTION</th>
                                                  </tr>
                                                </thead>
                                                <tbody class="divide-y divide-gray-200 bg-gray-100">
                                                    <tr class="divide-x divide-gray-200">
                                                      <td class="whitespace-nowrap py-4 pl-4 pr-4 text-xs font-medium text-gray-900 ">
                                                        {{ $item->land_status }}</td>
                                                      <td class="whitespace-nowrap p-4 text-xs text-gray-500">{{ $item->dolephil_leased }}
                                                      </td>
                                                      <td class="whitespace-nowrap py-4 pl-4 pr-4 text-xs text-gray-500 ">
                                                        {{ $item->field_number }}
                                                      </td>
                                                      <td class="whitespace-nowrap py-4 pl-4 pr-4 text-xs text-gray-500 ">
                                                        <div class="print-button flex space-x-3 justify-center">
                                                            <button wire:click="updateActual({{$item->id}})">
                                                                <svg class="h-5 w-5 flex-shrink-0 text-green-800 font-medium" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                                  </svg>
                                                            </button>
                                                            <button wire:click="deleteActual({{$item->id}})">
                                                            <svg class="h-5 w-5 flex-shrink-0 font-medium text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                           </svg>
                                                          </button>
                                                         </div></td>
                                                    </tr>
                                                </tbody>
                                              </table>
                                        </div>
                                        @endif
                                    </div>
                                    @endforeach
                                  {{-- <table class="min-w-full divide-y divide-gray-300">
                                    <thead>
                                      <tr class="divide-x divide-gray-200">
                                        <th scope="col"
                                          class="py-3.5 pl-4 pr-4 text-left text-xs font-semibold text-gray-900 bg-gray-100  whitespace-nowrap">LAND STATUS
                                        </th>
                                        <th scope="col" class="px-4 py-3.5 text-left text-xs font-semibold text-gray-900 bg-gray-100 whitespace-nowrap">
                                          LEASED AREA
                                        </th>
                                        <th scope="col" class="px-4 py-3.5 text-left text-xs font-semibold text-gray-900 bg-gray-100 whitespace-nowrap">
                                          UPLANTED AREA
                                        </th>
                                        <th scope="col"
                                          class="py-3.5 pl-4 pr-4 text-left text-xs font-semibold text-gray-900 bg-gray-100  whitespace-nowrap">
                                          STATUS</th>
                                        <th scope="col"
                                          class="py-3.5 pl-4 pr-4 text-left text-xs font-semibold text-gray-900 bg-gray-100  whitespace-nowrap">
                                          REMARKS</th>
                                      </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 bg-gray-100">
                                      @foreach ($actuals as $item)
                                        <tr class="divide-x divide-gray-200">
                                          <td class="whitespace-nowrap py-4 pl-4 pr-4 text-xs font-medium text-gray-900 ">
                                            {{ $item->land_status }}</td>
                                          <td class="whitespace-nowrap p-4 text-xs text-gray-500">{{ $item->dolephil_leased }}
                                          </td>
                                          <td class="whitespace-nowrap p-4 text-xs text-gray-500">
                                            {{ $item->owned_but_not_planted }}</td>
                                          <td class="whitespace-nowrap py-4 pl-4 pr-4 text-xs text-gray-500 ">
                                            {{ $item->status }}
                                          </td>
                                          <td class="whitespace-nowrap py-4 pl-4 pr-4 text-xs text-gray-500 ">
                                            {{ $item->remarks }}</td>
                                        </tr>
                                      @endforeach
                                    </tbody>
                                  </table> --}}
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="mt-5 md:col-span-2 md:mt-0">
                      <div class="border h-80 overflow-y-auto p-5">
                        <div class="flex justify-between items-center">
                          <div class="flex space-x-4 items-center">
                            <h1 class="font-bold text-lg text-gray-600 font-montserrat">TAX</h1>
                            <x-native-select wire:model="tax_get">
                              @foreach ($tax_years as $item)
                                <option value="{{ $item }}">{{ $item }}</option>
                              @endforeach

                            </x-native-select>
                          </div>
                          <div>
                            <x-button label="New Tax" positive icon="plus" class="print-button" wire:click="$set('addTaxModal', true)" />
                          </div>
                        </div>
                        <div class="mt-3">
                          <div class="">
                            <div class=" flow-root">
                              <div class="">
                                <div class="border overflow-x-auto">
                                  <table class="min-w-full divide-y divide-gray-300 ">
                                    <thead>
                                      <tr class="divide-x divide-gray-200">
                                        <th scope="col" class="px-4 py-3.5 text-left text-xs font-semibold text-gray-900 bg-gray-100 whitespace-wrap">
                                         TAX DECLARATION NO.
                                        </th>
                                        <th scope="col"
                                          class="py-3.5 pl-4 pr-4 text-left text-xs font-semibold text-gray-900 bg-gray-100 whitespace-nowrap">
                                          OWNER</th>
                                        <th scope="col"
                                          class="py-3.5 pl-4 pr-4 text-left text-xs font-semibold text-gray-900 bg-gray-100 whitespace-nowrap">
                                          STATUS</th>
                                        <th scope="col"
                                          class="py-3.5 pl-4 pr-4 text-left text-xs font-semibold text-gray-900 bg-gray-100 whitespace-nowrap">
                                          TAX PAYMENT</th>

                                        <th scope="col"
                                          class="py-3.5 pl-4 pr-4 text-left text-xs font-semibold text-gray-900 bg-gray-100 whitespace-wrap">
                                          YEAR OF PAYMENT</th>
                                        <th scope="col"
                                          class="py-3.5 pl-4 pr-4 text-left text-xs font-semibold text-gray-900 bg-gray-100 whitespace-nowrap">
                                          OFFICIAL RECEIPT</th>
                                      </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 bg-gray-100">
                                      @foreach ($taxss as $item)
                                        <tr class="divide-x divide-gray-200">
                                          <td class="whitespace-nowrap p-4 text-sm text-gray-500">
                                            {{ $item->basicInformation->tax_dec_number }}</td>
                                          <td class="whitespace-nowrap py-4 pl-4 pr-4 text-xs text-gray-500 ">
                                            {{ $item->owner }}
                                          </td>
                                          <td class="whitespace-nowrap py-4 pl-4 pr-4 text-xs text-gray-500 ">
                                            {{ $item->basicInformation->title_status }}</td>
                                          <td class="whitespace-nowrap py-4 pl-4 pr-4 text-xs text-gray-500 ">
                                            {{ $item->tax_payment }}</td>
                                          <td class="whitespace-nowrap py-4 pl-4 pr-4 text-xs text-gray-500 ">
                                            {{ $item->year_of_payment }}</td>
                                          <td class="whitespace-nowrap py-4 pl-4 pr-4 text-xs text-gray-500 ">
                                             @if ($item->tax_receipt != null)
                                             <div class="print-button flex space-x-3 justify-center">
                                              <a href="{{ $this->getFileUrl($item->tax_receipt->image_path) }}" x-data="{}" target='_blank' class="">
                                              <svg class="h-5 w-5 flex-shrink-0 text-indigo-800 font-medium" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                              <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                              <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                              </svg>
                                              </a>
                                              <button wire:click="deleteTaxReceiptAttachment({{ $item->tax_receipt->id }})">
                                              <svg class="h-5 w-5 flex-shrink-0 font-medium text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                              <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                             </svg>
                                            </button>
                                           </div>
                                           @else
                                           <div class="flex space-x-3 justify-center">
                                              <x-button emerald icon="plus" sm label="Add" class="print-button" wire:click="$set('addTaxReceiptModal', true)" />
                                           </div>
                                             @endif

                                        </tr>
                                      @endforeach

                                      <!-- More people... -->
                                    </tbody>
                                  </table>
                                </div>
                              </div>
                            </div>
                          </div>

                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="border">
                    <div class="">

                      <div class="">
                        <div class=" p-5">
                          <div class="grid grid-cols-2 space-x-4">
                              <div class="">
                                  <h1 class="font-bold text-lg text-gray-600 font-montserrat">LANDBANK AMORTIZATION</h1>
                                  <div class="mt-9">
                                      <ul role="list" class="divide-y divide-gray-200 border-gray-200">
                                        <li class="relative py-5 focus-within:ring-2 focus-within:ring-inset focus-within:ring-blue-600">
                                          <div class="flex items-start border-b py-2">
                                            <p class="lg:w-48 border-r mr-2 font-bold text-xs text-gray-600">AMORTIZATION </p>
                                            <div class="font-rubik text-black uppercase text-xs text-right">
                                              {{ $basicInfo->land_bank_amortization ?? '' }}
                                            </div>
                                          </div>
                                          <div class="flex items-start border-b py-2">
                                            <p class="lg:w-48 border-r mr-2 font-bold text-xs text-gray-600"> AMOUNT </p>
                                            <div class="font-rubik text-black uppercase text-xs text-right">
                                              {{ $basicInfo->amount ?? '' }}
                                            </div>
                                          </div>
                                          <div class="flex items-start border-b py-2">
                                            <p class="lg:w-48 border-r mr-2 font-bold text-xs text-gray-600">DATE PAID</p>
                                            <div class="font-rubik text-black uppercase text-xs text-right">
                                              {{ Carbon\Carbon::parse($basicInfo->date_paid ?? '')->format('F d, Y') }}
                                            </div>
                                          </div>
                                          <div class="flex items-start border-b py-2">
                                            <p class="lg:w-48 border-r mr-2 font-bold text-xs text-gray-600">DATE OF CERT</p>
                                            <div class="font-rubik text-black uppercase text-xs text-right">
                                              {{ Carbon\Carbon::parse($basicInfo->date_of_cert ?? '')->format('F d, Y') }}
                                            </div>
                                          </div>
                                        </li>
                                      </ul>
                                    </div>
                              </div>
                              <div class="border-l-2 pl-4">
                                  <h1 class="font-bold text-lg text-gray-600 font-montserrat">NATIONAL DEVELOPMENT COMPANY (NDC)</h1>

                                  <div class="mt-2">
                                      <ul role="list" class="divide-y divide-gray-200 border-gray-200">
                                        <li class="relative py-5 focus-within:ring-2 focus-within:ring-inset focus-within:ring-blue-600">
                                          <div class="flex items-start border-b py-2">
                                            <p class="lg:w-48 border-r mr-2 font-bold text-xs text-gray-600">DIRECT PAYMENT SCHEME </p>
                                            <div class="font-rubik text-black uppercase text-xs text-right">
                                              {{ $basicInfo->ndc_direct_payment_scheme ?? '' }}
                                            </div>
                                          </div>
                                          <div class="border-b py-2">
                                            <p class="lg:w-48 font-bold mb-1 text-xs text-gray-600"> NDC REMARKS : </p>
                                            <span class="font-rubik text-black uppercase text-xs text-left">{{ $basicInfo->ndc_remarks ?? '' }}</span>
                                          </div>
                                        </li>
                                      </ul>
                                    </div>
                              </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
        </div>



        <div class="mt-0 5">
          <div class="flex items-center bg-green-700 space-x-1 py-1 px-2">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-6 w-6 fill-white">
              <path
                d="M16 2L21 7V21.0082C21 21.556 20.5551 22 20.0066 22H3.9934C3.44476 22 3 21.5447 3 21.0082V2.9918C3 2.44405 3.44495 2 3.9934 2H16ZM13 12H16L12 8L8 12H11V16H13V12Z">
              </path>
            </svg>
            <span class="font-bold text-black">DOCUMENT ATTACHMENTS</span>
          </div>
          <div class="grid grid-cols-7 bg-green-100 mt-3 gap-4 border py-3 mb-5">
            <div class="grid place-content-center space-y-3">
              <button wire:click="$set('titleAttachmentModal', true)" class="flex justify-center items-center flex-col hover:text-green-500">
                <img src="{{ asset('images/upload.png') }}" class="h-10" alt="">
                <span class="font-bold text-sm text-gray-600 ">TITLE</span>
              </button>
                {{-- <div class="mx-auto">
                    <x-button emerald icon="eye" label="View" />
                </div> --}}
            </div>
            <div class="grid place-content-center space-y-3">
                <button wire:click="$set('deedOfSaleAttachmentModal', true)" class="flex justify-center items-center flex-col hover:text-green-500">
                  <img src="{{ asset('images/upload.png') }}" class="h-10" alt="">
                  <span class="font-bold text-sm text-gray-600 ">DEED OF SALE</span>
                </button>
                  {{-- <div class="mx-auto">
                      <x-button emerald icon="eye" label="View" />
                  </div> --}}
              </div>
            <div class="grid place-content-center space-y-3">
              <button wire:click="$set('taxDecAttachmentModal', true)" class="flex justify-center items-center flex-col hover:text-green-500">
                <img src="{{ asset('images/upload.png') }}" class="h-10" alt="">
                <span class="font-bold text-sm text-gray-600 ">TAX DEC</span>
              </button>
                {{-- <div class="mx-auto">
                    <x-button emerald icon="eye" label="View" />
                </div> --}}
            </div>
            <div class="grid place-content-center space-y-3">
              <button wire:click="$set('sketchPlanAttachmentModal', true)" class="flex justify-center items-center flex-col hover:text-green-500">
                <img src="{{ asset('images/upload.png') }}" class="h-10" alt="">
                <span class="font-bold text-sm text-gray-600 ">SKETCH PLAN & VICINITY MAP</span>
              </button>
              {{-- <div class="mx-auto">
                <x-button emerald icon="eye" label="View" />
              </div> --}}
            </div>
            <div class="grid place-content-center space-y-3">
              <button wire:click="$set('actualPhotoAttachmentModal', true)" class="flex justify-center items-center flex-col hover:text-green-500">
                <img src="{{ asset('images/upload.png') }}" class="h-10" alt="">
                <span class="font-bold text-sm text-gray-600 ">ACTUAL PHOTO</span>
              </button>
              {{-- <div class="mx-auto">
                <x-button emerald icon="eye" label="View" />
              </div> --}}
            </div>
            <div class="grid place-content-center space-y-3">
              <button wire:click="$set('videoAttachmentModal', true)" class="flex justify-center items-center flex-col hover:text-green-500">
                <img src="{{ asset('images/upload.png') }}" class="h-10" alt="">
                <span class="font-bold text-sm text-gray-600 ">VIDEO</span>
              </button>
              {{-- <div class="mx-auto">
                <x-button emerald icon="eye" label="View" />
              </div> --}}
            </div>
            <div class="grid place-content-center space-y-3">
              <button wire:click="$set('othersAttachmentModal', true)" class="flex justify-center items-center flex-col hover:text-green-500">
                <img src="{{ asset('images/upload.png') }}" class="h-10" alt="">
                <span class="font-bold text-sm text-gray-600 ">OTHERS</span>
              </button>
            </div>
            {{-- buttons --}}
            <div class="grid place-content-center space-y-2">
                <div class="mx-auto">
                    <x-button emerald icon="eye" wire:click="viewAttachment({{$basicInfo->id}}, 'TITLE')" label="View" />
                  </div>
            </div>
            <div class="grid place-content-center space-y-2">
                <div class="mx-auto">
                    <x-button emerald icon="eye" wire:click="viewAttachment({{$basicInfo->id}}, 'DEED OF SALE')" label="View" />
                  </div>
            </div>
            <div class="grid place-content-center space-y-2">
                <div class="mx-auto">
                    <x-button emerald icon="eye" wire:click="viewAttachment({{$basicInfo->id}}, 'TAX DEC')"   label="View" />
                  </div>
            </div>
            <div class="grid place-content-center space-y-2">
                <div class="mx-auto">
                    <x-button emerald icon="eye" wire:click="viewAttachment({{$basicInfo->id}}, 'SKETCH PLAN')"   label="View" />
                  </div>
            </div>
            <div class="grid place-content-center space-y-2">
                <div class="mx-auto">
                    <x-button emerald icon="eye" wire:click="viewAttachment({{$basicInfo->id}}, 'ACTUAL PHOTO')"   label="View" />
                  </div>
            </div>
            <div class="grid place-content-center space-y-2">
                <div class="mx-auto">
                    <x-button emerald icon="eye" wire:click="viewAttachment({{$basicInfo->id}}, 'VIDEO')"   label="View" />
                  </div>
            </div>
            <div class="grid place-content-center space-y-2">
                <div class="mx-auto">
                    <x-button emerald icon="eye" wire:click="viewAttachment({{$basicInfo->id}}, 'OTHERS')"   label="View" />
                  </div>
            </div>
          </div>
        </div>
      </div>

    {{-- MODALS --}}
    <x-modal align="center" wire:model.defer="addActualModal">
        <x-card title="Add Actual Lot">
          <div class="space-y-3">
            <div class="grid grid-cols-1 gap-4">
              {{-- <x-input label="Land Status" placeholder="Status" wire:model.defer="land_status" /> --}}
              <x-select label="Land Status" placeholder="Select one" wire:model="land_status">
                    <x-select.option label="Leased" value="LEASED" />
                    <x-select.option label="Growers" value="GROWERS" />
                    <x-select.option label="Unplanted" value="UNPLANTED" />
                    <x-select.option label="Compromise Agreement" value="COMPROMISE AGREEMENT" />
                    <x-select.option label="Deleted" value="DELETED" />
                </x-select>

                @if ($land_status === "LEASED")
                <x-input label="Leased Area" placeholder="" wire:model.defer="leased_area" />
                @elseif($land_status === "GROWERS")
                <x-input label="Growers Area" placeholder="" wire:model.defer="darbc_grower" />
                @elseif($land_status === "UNPLANTED" || $land_status === "COMPROMISE AGREEMENT" || $land_status === "DELETED")
                <x-input label="Unplanted Area" placeholder=""
                wire:model.defer="other_area" />
                @endif
                <x-input label="Field Number" placeholder="" wire:model.defer="actual_field_number" />

            </div>



          </div>
          <div class="grid grid-cols-3 gap-4 mt-3">
            <x-input label="Gross Area" placeholder="0" wire:model.defer="gross_area" />
            <x-input label="Planted Area" placeholder="0" wire:model.defer="planted_area" />
            <x-input label="Gulley Area" placeholder="0" wire:model.defer="gulley_area" />
            <x-input label="Total Area" placeholder="0" wire:model.defer="total_area" />
            <x-input label="Facility Area" placeholder="0" wire:model.defer="facility_area" />
            <x-input label="Unutilized Area" placeholder="0" wire:model.defer="unutilized_area" />
          </div>
          <div class="mt-3 grid grid-cols-1 gap-4">
            <x-textarea label="Status" placeholder="" wire:model.defer="status" />
            <x-textarea label="Remarks" placeholder="" wire:model.defer="remarks" />
          </div>
          {{-- <div class="bg-gray-200 rounded-md space-y-2 p-2 mt-3">
            <div class="grid grid-cols-3 gap-4">
              <x-input label="Portion Field" placeholder="0" wire:model.defer="portion_field_array.0" />
              <x-input label="Planted Area" placeholder="0" wire:model.defer="planted_area_array.0" />
              <x-input label="Gulley Area" placeholder="0" wire:model.defer="gulley_area_array.0" />
            </div>
            <div class="grid grid-cols-2 gap-4">
              <x-input label="Total Area" placeholder="0" wire:model.defer="total_area_array.0" />
              <x-input label="Unutilized Area" placeholder="0" wire:model.defer="unutilized_area_array.0" />
            </div>
          </div>
          <div class="bg-gray-200 rounded-md space-y-2 p-2 mt-3">
            <div class="grid grid-cols-3 gap-4">
              <x-input label="Portion Field" placeholder="0" wire:model.defer="portion_field_array.1" />
              <x-input label="Planted Area" placeholder="0" wire:model.defer="planted_area_array.1" />
              <x-input label="Gulley Area" placeholder="0" wire:model.defer="gulley_area_array.1" />
            </div>
            <div class="grid grid-cols-2 gap-4">
              <x-input label="Total Area" placeholder="0" wire:model.defer="total_area_array.1" />
              <x-input label="Unutilized Area" placeholder="0" wire:model.defer="unutilized_area_array.1" />
            </div>
          </div> --}}

          <x-slot name="footer">
            <div class="flex justify-end gap-x-4">
              <x-button flat label="Cancel" x-on:click="close" />
              <x-button primary label="Submit"
                x-on:confirm="{
                        title: 'Are you sure you want to save this information?',
                        icon: 'question',
                        method: 'saveActualLot'
                    }" />
            </div>
          </x-slot>
        </x-card>
      </x-modal>

        <x-modal align="center" wire:model.defer="updateActualModal">
        <x-card title="Update Actual Lot">
          <div class="space-y-3">
            <div class="grid grid-cols-1 gap-4">
              {{-- <x-input label="Land Status" placeholder="Status" wire:model.defer="land_status" /> --}}
              <x-select label="Land Status" placeholder="Select one" wire:model="update_land_status">
                    <x-select.option label="Leased" value="LEASED" />
                    <x-select.option label="Growers" value="GROWERS" />
                    <x-select.option label="Unplanted" value="UNPLANTED" />
                    <x-select.option label="Compromise Agreement" value="COMPROMISE AGREEMENT" />
                    <x-select.option label="Deleted" value="DELETED" />
                </x-select>

                @if ($update_land_status === "LEASED")
                <x-input label="Leased Area" placeholder="" wire:model.defer="update_leased_area" />
                @elseif($update_land_status === "GROWERS")
                <x-input label="Growers Area" placeholder="" wire:model.defer="update_darbc_grower" />
                @elseif($update_land_status === "UNPLANTED" || $update_land_status === "COMPROMISE AGREEMENT" || $update_land_status === "DELETED")
                <x-input label="Unplanted Area" placeholder=""
                wire:model.defer="update_other_area" />
                @endif
                <x-input label="Field Number" placeholder="" wire:model.defer="update_actual_field_number" />

            </div>



          </div>
          <div class="grid grid-cols-3 gap-4 mt-3">
            <x-input label="Gross Area" placeholder="0" wire:model.defer="update_gross_area" />
            <x-input label="Planted Area" placeholder="0" wire:model.defer="update_planted_area" />
            <x-input label="Gulley Area" placeholder="0" wire:model.defer="update_gulley_area" />
            <x-input label="Total Area" placeholder="0" wire:model.defer="update_total_area" />
            <x-input label="Facility Area" placeholder="0" wire:model.defer="update_facility_area" />
            <x-input label="Unutilized Area" placeholder="0" wire:model.defer="update_unutilized_area" />
          </div>
          <div class="mt-3 grid grid-cols-1 gap-4">
            <x-textarea label="Status" placeholder="" wire:model.defer="update_status" />
            <x-textarea label="Remarks" placeholder="" wire:model.defer="update_remarks" />
          </div>
          {{-- <div class="bg-gray-200 rounded-md space-y-2 p-2 mt-3">
            <div class="grid grid-cols-3 gap-4">
              <x-input label="Portion Field" placeholder="0" wire:model.defer="portion_field_array.0" />
              <x-input label="Planted Area" placeholder="0" wire:model.defer="planted_area_array.0" />
              <x-input label="Gulley Area" placeholder="0" wire:model.defer="gulley_area_array.0" />
            </div>
            <div class="grid grid-cols-2 gap-4">
              <x-input label="Total Area" placeholder="0" wire:model.defer="total_area_array.0" />
              <x-input label="Unutilized Area" placeholder="0" wire:model.defer="unutilized_area_array.0" />
            </div>
          </div>
          <div class="bg-gray-200 rounded-md space-y-2 p-2 mt-3">
            <div class="grid grid-cols-3 gap-4">
              <x-input label="Portion Field" placeholder="0" wire:model.defer="portion_field_array.1" />
              <x-input label="Planted Area" placeholder="0" wire:model.defer="planted_area_array.1" />
              <x-input label="Gulley Area" placeholder="0" wire:model.defer="gulley_area_array.1" />
            </div>
            <div class="grid grid-cols-2 gap-4">
              <x-input label="Total Area" placeholder="0" wire:model.defer="total_area_array.1" />
              <x-input label="Unutilized Area" placeholder="0" wire:model.defer="unutilized_area_array.1" />
            </div>
          </div> --}}

          <x-slot name="footer">
            <div class="flex justify-end gap-x-4">
              <x-button flat label="Cancel" x-on:click="close" />
              <x-button primary label="Submit"
                x-on:confirm="{
                        title: 'Are you sure you want to update this information?',
                        icon: 'question',
                        method: 'updateActualLot'
                    }" />
            </div>
          </x-slot>
        </x-card>
      </x-modal>

      <x-modal align="center" wire:model.defer="addTaxModal">
        <x-card title="Add Tax">
          <div class="space-y-3">
            <x-input label="Title Number" placeholder="" wire:model.defer="title_number" />
            <x-input label="Tax Declaration Number" placeholder="" wire:model.defer="tax_declaration_number" />
            <x-input label="Owner" placeholder="" wire:model.defer="owner" />
            <div class="grid grid-cols-3 gap-4">
              <x-input label="Lease to DOLEFIL" placeholder="" wire:model.defer="lease_to_dolefil" />
              <x-input label="DARBC Growership" placeholder="" wire:model.defer="darbc_growers_hip" />
              <x-input label="Area not planted pineapple" placeholder="" wire:model.defer="darbc_not_planted" />
            </div>
            <x-textarea label="Remarks" placeholder="" wire:model.defer="remarks" />
            <div class="grid grid-cols-2 gap-4">
              <x-input label="Market Value" placeholder="" wire:model.defer="market_value" />
              <x-input label="Assessed Value" placeholder="" wire:model.defer="assessed_value" />
            </div>
            <div class="grid grid-cols-2 gap-4">
              <x-input label="Year" placeholder="" wire:model.defer="year" />
              <x-input label="Square Meters" placeholder="" wire:model.defer="square_meter" />
              <x-input label="Year of payment" placeholder="" wire:model.defer="year_of_payment" />
              <x-input label="Official Receipt" placeholder="" wire:model.defer="official_receipt" />
            </div>
            {{-- <div class="">
              {{ $this->form }}
            </div> --}}

          </div>

          <x-slot name="footer">
            <div class="flex justify-end gap-x-4">
              <x-button flat label="Cancel" x-on:click="close" />
              <x-button primary label="Submit"
                x-on:confirm="{
                        title: 'Are you sure you want to save this information?',
                        icon: 'question',
                        method: 'saveTax'
                    }" />
            </div>
          </x-slot>
        </x-card>
      </x-modal>

        {{-- ADD TAX MODAL --}}
        @if ($basicInfo->taxes->first() != null)
        <x-modal.card title="Upload" align="center" blur wire:model.defer="addTaxReceiptModal">
            <livewire:forms.upload-tax-receipt :tax_id="$basicInfo->taxes->first()->id" />
        </x-modal.card>
        @endif


      {{-- TITLE ATTACHMENT MODAL --}}
       <x-modal.card title="Upload" align="center" blur wire:model.defer="titleAttachmentModal">
            <livewire:forms.upload-title-attachment :basicinfo_id="$basicInfo->id" />
        </x-modal.card>
        {{-- DEED OF SALE ATTACHMENT MODAL --}}
       <x-modal.card title="Upload" align="center" blur wire:model.defer="deedOfSaleAttachmentModal">
        <livewire:forms.upload-deed-of-sale-attachment :basicinfo_id="$basicInfo->id" />
        </x-modal.card>
          {{-- TAX DEC ATTACHMENT MODAL --}}
          <x-modal.card title="Upload" align="center" blur wire:model.defer="taxDecAttachmentModal">
            <livewire:forms.upload-tax-dec-attachment :basicinfo_id="$basicInfo->id" />
          </x-modal.card>
        {{-- SKETCH PLAN ATTACHMENT MODAL --}}
        <x-modal.card title="Upload" align="center" blur wire:model.defer="sketchPlanAttachmentModal">
        <livewire:forms.upload-sketch-plan-attachment :basicinfo_id="$basicInfo->id" />
        </x-modal.card>
         {{-- ACTUAL PHOTO  ATTACHMENT MODAL --}}
       <x-modal.card title="Upload" align="center" blur wire:model.defer="actualPhotoAttachmentModal">
        <livewire:forms.upload-actual-photo-attachment :basicinfo_id="$basicInfo->id" />
        </x-modal.card>
          {{-- VIDEO ATTACHMENT MODAL --}}
          <x-modal.card title="Upload" align="center" blur wire:model.defer="videoAttachmentModal">
            <livewire:forms.upload-video-attachment :basicinfo_id="$basicInfo->id" />
            </x-modal.card>
        {{-- OTHERS ATTACHMENT MODAL --}}
        <x-modal.card title="Upload" align="center" blur wire:model.defer="othersAttachmentModal">
            <livewire:forms.upload-others-attachment :basicinfo_id="$basicInfo->id" />
         </x-modal.card>

</div>
