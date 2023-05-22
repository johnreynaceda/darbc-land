<div>
    <div>
        <div class="grid grid-cols-4">
          <div class="border bg-green-600 p-0.5 flex space-x-2 items-center">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-6 w-6 fill-white">
              <path
                d="M16 2L21 7V21.0082C21 21.556 20.5551 22 20.0066 22H3.9934C3.44476 22 3 21.5447 3 21.0082V2.9918C3 2.44405 3.44495 2 3.9934 2H16ZM13.529 14.4464L15.7395 16.6569L17.1537 15.2426L14.9432 13.0322C15.8492 11.4983 15.6432 9.48951 14.3252 8.17157C12.7631 6.60948 10.2305 6.60948 8.66839 8.17157C7.1063 9.73367 7.1063 12.2663 8.66839 13.8284C9.98633 15.1464 11.9951 15.3524 13.529 14.4464ZM12.911 12.4142C12.13 13.1953 10.8637 13.1953 10.0826 12.4142C9.30156 11.6332 9.30156 10.3668 10.0826 9.58579C10.8637 8.80474 12.13 8.80474 12.911 9.58579C13.6921 10.3668 13.6921 11.6332 12.911 12.4142Z">
              </path>
            </svg>
            <span class="font-bold text-gray-700">BASIC INFORMATION</span>
          </div>
          <div class="border flex items-center">
            <span class="px-2 pr-10 py-2 text-xs font-bold border-r bg-gray-100 text-gray-700">USER:</span>
            <span class="bg-yellow-50 flex-1 py-1 text-center uppercase font-bold text-gray-700">
              {{ $basicInfo->previous_land_owner ?? '' }}</span>
          </div>
          <div class="border bg-green-600 p-0.5 flex space-x-2 items-center">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-6 w-6 fill-white">
                  <path
                    d="M16 2L21 7V21.0082C21 21.556 20.5551 22 20.0066 22H3.9934C3.44476 22 3 21.5447 3 21.0082V2.9918C3 2.44405 3.44495 2 3.9934 2H16ZM13.529 14.4464L15.7395 16.6569L17.1537 15.2426L14.9432 13.0322C15.8492 11.4983 15.6432 9.48951 14.3252 8.17157C12.7631 6.60948 10.2305 6.60948 8.66839 8.17157C7.1063 9.73367 7.1063 12.2663 8.66839 13.8284C9.98633 15.1464 11.9951 15.3524 13.529 14.4464ZM12.911 12.4142C12.13 13.1953 10.8637 13.1953 10.0826 12.4142C9.30156 11.6332 9.30156 10.3668 10.0826 9.58579C10.8637 8.80474 12.13 8.80474 12.911 9.58579C13.6921 10.3668 13.6921 11.6332 12.911 12.4142Z">
                  </path>
                </svg>
            <span class="px-2 font-bold  text-gray-700">LAND SECTION</span>
          </div>
          <div class="border flex items-center">
            <span class="px-2 font-bold text-sm border-r bg-gray-100 text-gray-700 py-1">ID:</span>
            <span class="bg-yellow-50 flex-1 text-center uppercase font-bold text-gray-700 py-1">
              {{ $basicInfo->id ?? '' }}</span>
          </div>
        </div>
        <div class="grid grid-cols-4 mt-0.5">
          <div class="flex items-center">
            <span class="rounded-l-lg text-xs bg-gray-100 border font-bold px-2 w-32 py-2">LOT NO:</span>
            <span class="flex-1 text-center bg-green-50 border py-1">{{ $basicInfo->lot_number ?? '' }}</span>
          </div>
          <div class="flex items-center">
            <span class=" pr-4 py-2 text-xs bg-gray-100 font-bold border px-2">FIELD NO:</span>
            <span class="flex-1 text-center bg-green-50 border py-1">{{ $basicInfo->field_number ?? '' }}</span>
          </div>
          <div class="flex col-span-2 items-center">
            <span class="bg-gray-100 text-xs font-bold border px-2 pr-8 py-2">MUNICIPALITY: </span>
            <span class="flex-1 text-center bg-green-50 border py-1">{{ $basicInfo->municipality ?? '' }}</span>
          </div>
          <div class="flex col-span-2 items-center">
            <span class="rounded-l-lg text-xs bg-gray-100 font-bold border px-2 w-32 py-2">SURVEY NO:</span>
            <span class="flex-1 text-center bg-green-50 border py-1">{{ $basicInfo->survey_number ?? '' }}</span>
          </div>
          <div class="flex  items-center">
            <span class=" text-xs bg-gray-100 font-bold border px-2 w-32 py-2">TITLE:</span>
            <span class="flex-1 text-center bg-green-50 border py-1">{{ $basicInfo->title ?? '' }}</span>
          </div>
          <div class="flex  items-center">
            <span class="text-xs bg-gray-100 font-bold border px-2 w-32 py-2">PAGE:</span>
            <span class="flex-1 text-center bg-green-50 border py-1">{{ $basicInfo->page ?? '' }}</span>
          </div>
          <div class="flex col-span-2 items-center">
            <span class="rounded-l-lg text-xs bg-gray-100 font-bold border px-2 w-32 py-2">TITLED AREA:</span>
            <span class="flex-1 text-center bg-green-50 border py-1">{{ $basicInfo->title_area ?? '' }}</span>
          </div>
          <div class="flex col-span-2 items-center">
            <span class="text-xs bg-gray-100 font-bold border px-2 w-32 py-2">CLOA NO.:</span>
            <span class="flex-1 text-center bg-green-50 border py-1">{{ $basicInfo->cloa_number ?? '' }}</span>
          </div>
          <div class="flex col-span-2 items-center">
            <span class="rounded-l-lg bg-gray-100 text-xs font-bold border px-2 w-32 py-2">AWARDED AREA:</span>
            <span class="flex-1 text-center bg-green-50 border py-1">{{ $basicInfo->awarded_area ?? '' }}</span>
          </div>
          <div class="flex col-span-2 items-center">
            <span class="bg-gray-100 text-xs font-bold border px-2 w-32 ">
              <h1>VARIANCE AREA:</h1>

              <h1 class="text-2xs">AWARDED VS. TITLE</h1>
            </span>
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
            <span class="flex-1 text-center bg-green-50 border py-1">{{$area}}</span>
          </div>
          <div class="flex col-span-2 items-center">
            <span class="rounded-l-lg bg-gray-100 text-2xs font-bold border px-2 w-32 py-2">PREV. LAND OWNER:</span>
            <span class="flex-1 text-center bg-green-50 border py-1">{{$basicInfo->previous_land_owner ?? ''}}</span>
          </div>
          <div class="flex col-span-1 items-center">
            <span class="bg-gray-100 text-xs font-bold border px-2 w-32 py-2">TYPE OF TITLE:</span>
            <span class="flex-1 text-center bg-green-50 border py-1">{{$type}}</span>
          </div>
          <div class="flex col-span-1 items-center">
            <span class="bg-gray-100 text-xs font-bold border px-2 w-32 py-2">TITLE NO:</span>
            <span class="flex-1 text-center bg-green-50 border py-1">{{$number}}</span>
          </div>
          <div class="flex col-span-2 items-center">
            <span class="rounded-l-lg text-xs bg-gray-100 font-bold border px-2 w-32 py-2">BARANGAY:</span>
            <span class="flex-1 text-center bg-green-50 border py-1">{{$basicInfo->location ?? ''}}</span>
          </div>
          <div class="flex col-span-2 items-center">
            <span class="text-xs bg-gray-100 font-bold border px-2 w-32 py-2">TITLE STATUS:</span>
            <span class="flex-1 text-center bg-green-50 border py-1">{{$basicInfo->title_status ?? ''}}</span>
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
          <div class="grid grid-cols-2">
            <div>
              <div class="mt-5 md:col-span-2 md:mt-0">
                <div class="border  p-5">
                  <div class="flex justify-between items-center">
                    <div class="flex space-x-3 items-center">
                      <h1 class="font-bold text-lg text-gray-600 font-montserrat">ACTUAL</h1>
                      <x-native-select wire:model="tax_get">
                        @foreach ($tax_years as $item)
                          <option value="{{ $item }}">{{ $item }}</option>
                        @endforeach

                      </x-native-select>
                    </div>
                    <div>
                      <x-button label="New Actual" icon="plus" positive wire:click="$set('addActualModal', true)" />
                    </div>
                  </div>
                  <div class="mt-3">

                    <div class="">
                      <div class=" flow-root">
                        <div class="">
                          <div class="border overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-300">
                              <thead>
                                <tr class="divide-x divide-gray-200">
                                  <th scope="col"
                                    class="py-3.5 pl-4 pr-4 text-left text-sm font-semibold text-gray-900 ">LAND STATUS
                                  </th>
                                  <th scope="col" class="px-4 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    LEASED AREA
                                  </th>
                                  <th scope="col" class="px-4 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    UPLANTED AREA
                                  </th>
                                  <th scope="col"
                                    class="py-3.5 pl-4 pr-4 text-left text-sm font-semibold text-gray-900">
                                    STATUS</th>
                                  <th scope="col"
                                    class="py-3.5 pl-4 pr-4 text-left text-sm font-semibold text-gray-900">
                                    REMARKS</th>

                                </tr>
                              </thead>
                              <tbody class="divide-y divide-gray-200 bg-white">
                                @foreach ($actuals as $item)
                                  <tr class="divide-x divide-gray-200">
                                    <td class="whitespace-nowrap py-4 pl-4 pr-4 text-sm font-medium text-gray-900 ">
                                      {{ $item->land_status }}</td>
                                    <td class="whitespace-nowrap p-4 text-sm text-gray-500">{{ $item->dolephil_leased }}
                                    </td>
                                    <td class="whitespace-nowrap p-4 text-sm text-gray-500">
                                      {{ $item->owned_but_not_planted }}</td>
                                    <td class="whitespace-nowrap py-4 pl-4 pr-4 text-sm text-gray-500 ">
                                      {{ $item->status }}
                                    </td>
                                    <td class="whitespace-nowrap py-4 pl-4 pr-4 text-sm text-gray-500 ">
                                      {{ $item->remarks }}</td>
                                  </tr>
                                @endforeach
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="mt-5 md:col-span-2 md:mt-0">
                <div class="border p-5">
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
                      <x-button label="Add New" positive icon="plus" wire:click="$set('addTaxModal', true)" />
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
                                  <th scope="col"
                                    class="py-3.5 pl-4 pr-4 text-left text-sm font-semibold text-gray-900 ">Year</th>
                                  <th scope="col" class="px-4 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    Area
                                    in Title HA./S
                                  </th>
                                  <th scope="col" class="px-4 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    Tax
                                    Declaration No.
                                  </th>
                                  <th scope="col"
                                    class="py-3.5 pl-4 pr-4 text-left text-sm font-semibold text-gray-900">
                                    Owner</th>
                                  <th scope="col"
                                    class="py-3.5 pl-4 pr-4 text-left text-sm font-semibold text-gray-900">
                                    Market Value</th>
                                  <th scope="col"
                                    class="py-3.5 pl-4 pr-4 text-left text-sm font-semibold text-gray-900">
                                    Assesed Value</th>

                                  <th scope="col"
                                    class="py-3.5 pl-4 pr-4 text-left text-sm font-semibold text-gray-900">
                                    Paid By Leased To Dolefil</th>
                                  <th scope="col"
                                    class="py-3.5 pl-4 pr-4 text-left text-sm font-semibold text-gray-900">
                                    Paid By Tax Payment</th>
                                  <th scope="col"
                                    class="py-3.5 pl-4 pr-4 text-left text-sm font-semibold text-gray-900">
                                    Paid By Year of Payment</th>
                                  <th scope="col"
                                    class="py-3.5 pl-4 pr-4 text-left text-sm font-semibold text-gray-900">
                                    Official Receipt</th>
                                </tr>
                              </thead>
                              <tbody class="divide-y divide-gray-200 bg-white">
                                @foreach ($taxss as $item)
                                  <tr class="divide-x divide-gray-200">
                                    <td class="whitespace-nowrap py-4 pl-4 pr-4 text-sm font-medium text-gray-900 ">
                                      {{ $item->year }}</td>
                                    <td class="whitespace-nowrap p-4 text-sm text-gray-500">{{ $basicInfo->title_area }}
                                    </td>
                                    <td class="whitespace-nowrap p-4 text-sm text-gray-500">
                                      {{ $item->rax_declaration_number }}</td>
                                    <td class="whitespace-nowrap py-4 pl-4 pr-4 text-sm text-gray-500 ">
                                      {{ $item->owner }}
                                    </td>
                                    <td class="whitespace-nowrap py-4 pl-4 pr-4 text-sm text-gray-500 ">
                                      {{ $item->market_value }}</td>
                                    <td class="whitespace-nowrap py-4 pl-4 pr-4 text-sm text-gray-500 ">
                                      {{ $item->assessed_value }}</td>
                                    <td class="whitespace-nowrap py-4 pl-4 pr-4 text-sm text-gray-500 ">
                                      {{ $item->lease_to_dolefil }}</td>
                                    <td class="whitespace-nowrap py-4 pl-4 pr-4 text-sm text-gray-500 ">
                                      {{ $item->darbc_growers_hip }}</td>
                                    <td class="whitespace-nowrap py-4 pl-4 pr-4 text-sm text-gray-500 ">
                                      {{ $item->darbc_area_not_planted_pineapple }}</td>
                                    <td class="whitespace-nowrap py-4 pl-4 pr-4 text-sm text-gray-500 ">
                                      {{ $item->official_receipt }}</td>

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
                    <div class="flex space-x-4 items-center">
                      <h1 class="font-bold text-lg text-gray-600 font-montserrat">LANDBANK AMORTIZATION</h1>

                    </div>
                    <div class="mt-3">
                      <ul role="list" class="divide-y divide-gray-200 border-gray-200">
                        <li class="relative py-5 focus-within:ring-2 focus-within:ring-inset focus-within:ring-blue-600">
                          <div class="flex items-start border-b py-2">
                            <p class="lg:w-48 border-r mr-2 font-bold text-sm text-gray-600">AMORTIZATION </p>
                            <div class="font-rubik text-black uppercase text-sm text-right">
                              {{ $basicInfo->land_bank_amortization ?? '' }}
                            </div>
                          </div>
                          <div class="flex items-start border-b py-2">
                            <p class="lg:w-48 border-r mr-2 font-bold text-sm text-gray-600"> AMOUNT </p>
                            <div class="font-rubik text-black uppercase text-sm text-right">
                              {{ $basicInfo->amount ?? '' }}
                            </div>
                          </div>
                          <div class="flex items-start border-b py-2">
                            <p class="lg:w-48 border-r mr-2 font-bold text-sm text-gray-600">DATE PAID</p>
                            <div class="font-rubik text-black uppercase text-sm text-right">
                              {{ Carbon\Carbon::parse($basicInfo->date_paid ?? '')->format('F d, Y') }}
                            </div>
                          </div>
                          <div class="flex items-start border-b py-2">
                            <p class="lg:w-48 border-r mr-2 font-bold text-sm text-gray-600">DATE OF CERT</p>
                            <div class="font-rubik text-black uppercase text-sm text-right">
                              {{ Carbon\Carbon::parse($basicInfo->date_of_cert ?? '')->format('F d, Y') }}
                            </div>
                          </div>
                          <div class="flex items-start border-b py-2">
                            <p class="lg:w-48 border-r mr-2 font-bold  text-sm text-gray-600 leading-4">
                              NDC DIRECT PAYMENT SCHEME
                            </p>
                            <div class="font-rubik  uppercase text-sm text-right bg-green-600 text-white px-2 rounded ">

                              {{ $basicInfo->ncd_direct_payment_scheme ?? '' }}
                            </div>
                          </div>
                          <div class="flex items-start border-b py-2">
                            <p class="lg:w-48 border-r mr-2 font-bold text-sm text-gray-600">NDC REMARKS</p>
                            <div class="font-rubik text-black uppercase text-sm text-right">
                              {{ $basicInfo->ncd_remarks ?? '' }}
                            </div>
                          </div>
                          <div class="flex items-start border-b py-2">
                            <p class="lg:w-48 border-r mr-2 font-bold text-sm text-gray-600">NOTES</p>
                            <div class="ctd font-rubik text-black leading-5 text-sm left ">
                              {{ $basicInfo->notes ?? '' }}
                            </div>
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
        <div class="mt-0 5">
          <div class="flex items-center bg-green-600 space-x-1 py-1 px-2">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-6 w-6 fill-white">
              <path
                d="M16 2L21 7V21.0082C21 21.556 20.5551 22 20.0066 22H3.9934C3.44476 22 3 21.5447 3 21.0082V2.9918C3 2.44405 3.44495 2 3.9934 2H16ZM13 12H16L12 8L8 12H11V16H13V12Z">
              </path>
            </svg>
            <span class="font-bold text-black">DOCUMENT ATTACHMENTS</span>
          </div>
          <div class="grid grid-cols-6 mt-3 gap-4 border py-3 mb-5">
            <div class="grid place-content-center">
              <button class="flex justify-center items-center flex-col hover:text-green-500">
                <img src="{{ asset('images/upload.png') }}" class="h-10" alt="">
                <span class="font-bold text-gray-600 ">TITLE</span>
              </button>
            </div>
            <div class="grid place-content-center">
              <button class="flex justify-center items-center flex-col hover:text-green-500">
                <img src="{{ asset('images/upload.png') }}" class="h-10" alt="">
                <span class="font-bold text-gray-600 ">TAX DEC</span>
              </button>
            </div>
            <div class="grid place-content-center">
              <button class="flex justify-center items-center flex-col hover:text-green-500">
                <img src="{{ asset('images/upload.png') }}" class="h-10" alt="">
                <span class="font-bold text-gray-600 ">SKETCH PLAN & VICINITY MAP</span>
              </button>
            </div>
            <div class="grid place-content-center">
              <button class="flex justify-center items-center flex-col hover:text-green-500">
                <img src="{{ asset('images/upload.png') }}" class="h-10" alt="">
                <span class="font-bold text-gray-600 ">ACTUAL PHOTO</span>
              </button>
            </div>
            <div class="grid place-content-center">
              <button class="flex justify-center items-center flex-col hover:text-green-500">
                <img src="{{ asset('images/upload.png') }}" class="h-10" alt="">
                <span class="font-bold text-gray-600 ">VIDEO</span>
              </button>
            </div>
            <div class="grid place-content-center">
              <button class="flex justify-center items-center flex-col hover:text-green-500">
                <img src="{{ asset('images/upload.png') }}" class="h-10" alt="">
                <span class="font-bold text-gray-600 ">OTHERS</span>
              </button>
            </div>
          </div>
        </div>
      </div>

    {{-- MODALS --}}
    <x-modal align="center" wire:model.defer="addActualModal">
        <x-card title="Add Actual Lot">
          <div class="space-y-3">
            <div class="grid grid-cols-2 gap-4">
              <x-input label="Land Status" placeholder="Status" wire:model.defer="land_status" />
              <x-input label="DOLEPHIL Leased" placeholder="Leased Area" wire:model.defer="leased_area" />
              <x-input label="DARBC Grower" placeholder="DARBC Grower" wire:model.defer="darbc_grower" />
              <x-input label="Other Area" placeholder="Owned but not planted by DOLEPHIL"
                wire:model.defer="other_area" />
            </div>

            <div class="grid grid-cols-2 gap-4">
              <x-textarea label="Status" placeholder="" wire:model.defer="status" />
              <x-textarea label="Remarks" placeholder="" wire:model.defer="remarks" />
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
          <div class="bg-gray-200 rounded-md space-y-2 p-2 mt-3">
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
          </div>

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
            <div class="">

              {{ $this->form }}
            </div>

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

</div>
