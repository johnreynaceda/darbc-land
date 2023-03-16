<div>
  <x-button label="Add Land Owner" indigo wire:click="$set('add_modal', true)" spinner="$set('add_modal', true)" />

  <div class="mt-4">
    {{ $this->table }}
  </div>

  <x-modal.card title="" fullscreen wire:model.defer="view_modal">

    <div>
      <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="md:col-span-1">
          <div class="px-4 sm:px-0">
            <div class="p-5">
              <div class="py-5">
                <div class="border rounded-lg bg-gray-500 h-96 relative">
                  <img
                    src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/65/No-Image-Placeholder.svg/330px-No-Image-Placeholder.svg.png"
                    class="absolute top-0 h-full w-full object-cover " alt="">
                </div>
              </div>
              <div>
                {{ $this->form }}
              </div>


            </div>
          </div>
        </div>
        <div class="mt-5 md:col-span-2 md:mt-0">
          <div class="border rounded-lg p-5">
            <h1 class="font-bold text-lg text-gray-600 font-montserrat">BASIC INFORMATION</h1>
            <div class="mt-3">
              <ul role="list" class="divide-y divide-gray-200 border-gray-200">
                <li class="relative py-5 px-6 focus-within:ring-2 focus-within:ring-inset focus-within:ring-blue-600">


                  <div class="">
                    <div class="flex items-start border-b py-2">
                      <p class="lg:w-48 border-r mr-2 text-sm text-gray-600">No.</p>
                      <div class="font-rubik text-black uppercase text-sm text-right rounded ">
                        {{ $datas->number ?? '' }}
                      </div>
                    </div>
                    <div class="flex items-start border-b py-2">
                      <p class="lg:w-48 border-r mr-2 text-sm text-gray-600">Lot No.</p>
                      <div class="font-rubik text-black uppercase text-sm text-right"> {{ $datas->lot_number ?? '' }}
                      </div>
                    </div>
                    <div class="flex items-start border-b py-2">
                      <p class="lg:w-48 border-r mr-2 text-sm text-gray-600">Survey No.</p>
                      <div class="font-rubik text-black uppercase text-sm text-right">
                        {{ $datas->survey_number ?? '' }}
                      </div>
                    </div>
                    <div class="flex items-start border-b py-2">
                      <p class="lg:w-48 border-r mr-2 text-sm text-gray-600">Title Area</p>
                      <div class="font-rubik text-black uppercase text-sm text-right">
                        {{ $datas->title_area ?? '' }}
                      </div>
                    </div>
                    <div class="flex items-start border-b py-2">
                      <p class="lg:w-48 border-r mr-2 text-sm text-gray-600">Award Area</p>
                      <div class="font-rubik text-black uppercase text-sm text-right">
                        {{ $datas->awarded_area ?? '' }}
                      </div>
                    </div>
                    <div class="flex items-start border-b py-2">
                      <p class="lg:w-48 border-r mr-2 text-sm text-gray-600">
                        Previous Land Owner
                      </p>
                      <div class="font-rubik text-black uppercase text-sm text-right">
                        {{ $datas->previous_land_owner ?? '' }}
                      </div>
                    </div>

                    <div class="flex items-start border-b py-2">
                      <p class="lg:w-48 border-r mr-2 text-sm text-gray-600">Field No.</p>
                      <div class="font-rubik text-black uppercase text-sm text-right">
                        {{ $datas->field_number ?? '' }}
                      </div>
                    </div>
                    <div class="flex items-start border-b py-2">
                      <p class="lg:w-48 border-r mr-2 text-sm text-gray-600">Barangay</p>
                      <div class="font-rubik text-black uppercase text-sm text-right">
                        {{ $datas->location ?? '' }}
                      </div>
                    </div>
                    <div class="flex items-start border-b py-2">
                      <p class="lg:w-48 border-r mr-2 text-sm text-gray-600">Municipality</p>
                      <div class="font-rubik text-black uppercase text-sm text-right">
                        {{ $datas->municipality ?? '' }}
                      </div>
                    </div>
                    <div class="flex items-start border-b py-2">
                      <p class="lg:w-48 border-r mr-2 text-sm text-gray-600">Title</p>
                      <div class="font-rubik text-black uppercase text-sm text-right">
                        {{ $datas->title ?? '' }}
                      </div>
                    </div>
                    <div class="flex items-start border-b py-2">
                      <p class="lg:w-48 border-r mr-2 text-sm text-gray-600">Cloa No.</p>
                      <div class="font-rubik text-black uppercase text-sm text-right"> {{ $datas->cloa_number ?? '' }}
                      </div>
                    </div>
                    <div class="flex items-start border-b py-2">
                      <p class="lg:w-48 border-r mr-2 text-sm text-gray-600">Page</p>
                      <div class="font-rubik text-black uppercase text-sm text-right">
                        {{ $datas->page ?? '' }}
                      </div>
                    </div>

                    <div class="flex items-start border-b py-2">
                      @php
                        $encumbered_array = json_decode($datas->encumbered ?? '', true);
                        
                        $previous_title_array = json_decode($datas->previous_copy_of_title ?? '', true);
                        
                      @endphp
                      <p class="lg:w-48 border-r mr-2 text-sm text-gray-600">Encumbered</p>
                      <div class="lg:w-24 font-rubik mb-1">
                        <p class="text-sm text-gray-900">Area</p>
                        <p class="text-sm text-black fot-rubik"> {{ $encumbered_array['area'] ?? '' }}</p>
                      </div>
                      <div class="lg:w-24 font-rubik mb-1">
                        <p class="text-sm text-gray-900">Variance</p>
                        <p class="text-sm uppercase">{{ $encumbered_array['variance'] ?? '' }} </p>
                      </div>
                    </div>
                    <div class="flex items-start border-b py-2">
                      <p class="lg:w-48 border-r mr-2 text-sm text-gray-600">Previous Copy of Title </p>
                      <div class="lg:w-24 font-rubik ">
                        <p class="text-sm text-gray-900 mb-1 ">Type of title</p>
                        <p class="text-sm text-black fot-rubik">{{ $previous_title_array['type of title'] ?? '' }}</p>
                      </div>
                      <div class="lg:w-24 font-rubik ">
                        <p class="text-sm text-gray-900  mb-1 ">No.</p>
                        <p class="text-sm uppercase">{{ $previous_title_array['no.'] ?? '' }}</p>
                      </div>
                    </div>

                    <div class="flex items-start border-b py-2">
                      <p class="lg:w-48 border-r mr-2 text-sm text-gray-600">TITLE STATUS</p>
                      <div class="font-rubik text-black uppercase text-sm text-right">
                        {{ $datas->title_status ?? '' }}
                      </div>
                    </div>
                    <div class="flex items-start border-b py-2">
                      <p class="lg:w-48 border-r mr-2 text-sm text-gray-600">TITLE COPY</p>
                      <div class="font-rubik text-black uppercase text-sm text-right">
                        {{ $datas->title_copy ?? '' }}
                      </div>
                    </div>

                  </div>
                </li>
              </ul>

            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="hidden sm:block" aria-hidden="true">
      <div class="py-5">
        <div class="border-t border-gray-200"></div>
      </div>
    </div>

    <div class="mt-10 sm:mt-0">
      <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="md:col-span-1">
          <div class="p-5">
            <div class="mt-4">
              <div class="sm:col-span-2">
                <dt class="text-sm font-bold text-gray-700">LOT DOCUMENTS</dt>
                <dd class="mt-1 text-sm text-gray-900">
                  <ul role="list" class="divide-y divide-gray-200 rounded-md border border-gray-200">
                    <li class="flex items-center justify-between py-3 pl-3 pr-4 text-sm">
                      <div class="flex w-0 flex-1 items-center">
                        <svg class="h-5 w-5 flex-shrink-0 text-gray-400" viewBox="0 0 20 20" fill="currentColor"
                          aria-hidden="true">
                          <path fill-rule="evenodd"
                            d="M15.621 4.379a3 3 0 00-4.242 0l-7 7a3 3 0 004.241 4.243h.001l.497-.5a.75.75 0 011.064 1.057l-.498.501-.002.002a4.5 4.5 0 01-6.364-6.364l7-7a4.5 4.5 0 016.368 6.36l-3.455 3.553A2.625 2.625 0 119.52 9.52l3.45-3.451a.75.75 0 111.061 1.06l-3.45 3.451a1.125 1.125 0 001.587 1.595l3.454-3.553a3 3 0 000-4.242z"
                            clip-rule="evenodd" />
                        </svg>
                        <span class="ml-2 w-0 flex-1 truncate">resume_back_end_developer.pdf</span>
                      </div>
                      <div class="ml-4 flex-shrink-0">
                        <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">Download</a>
                      </div>
                    </li>
                    <li class="flex items-center justify-between py-3 pl-3 pr-4 text-sm">
                      <div class="flex w-0 flex-1 items-center">
                        <svg class="h-5 w-5 flex-shrink-0 text-gray-400" viewBox="0 0 20 20" fill="currentColor"
                          aria-hidden="true">
                          <path fill-rule="evenodd"
                            d="M15.621 4.379a3 3 0 00-4.242 0l-7 7a3 3 0 004.241 4.243h.001l.497-.5a.75.75 0 011.064 1.057l-.498.501-.002.002a4.5 4.5 0 01-6.364-6.364l7-7a4.5 4.5 0 016.368 6.36l-3.455 3.553A2.625 2.625 0 119.52 9.52l3.45-3.451a.75.75 0 111.061 1.06l-3.45 3.451a1.125 1.125 0 001.587 1.595l3.454-3.553a3 3 0 000-4.242z"
                            clip-rule="evenodd" />
                        </svg>
                        <span class="ml-2 w-0 flex-1 truncate">coverletter_back_end_developer.pdf</span>
                      </div>
                      <div class="ml-4 flex-shrink-0">
                        <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">Download</a>
                      </div>
                    </li>
                  </ul>
                </dd>
              </div>
              <div class="sm:col-span-2 mt-4">
                <dt class="text-sm font-bold text-gray-700">OTHER DOCUMENTS</dt>
                <dd class="mt-1 text-sm text-gray-900">
                  <ul role="list" class="divide-y divide-gray-200 rounded-md border border-gray-200">
                    <li class="flex items-center justify-between py-3 pl-3 pr-4 text-sm">
                      <div class="flex w-0 flex-1 items-center">
                        <svg class="h-5 w-5 flex-shrink-0 text-gray-400" viewBox="0 0 20 20" fill="currentColor"
                          aria-hidden="true">
                          <path fill-rule="evenodd"
                            d="M15.621 4.379a3 3 0 00-4.242 0l-7 7a3 3 0 004.241 4.243h.001l.497-.5a.75.75 0 011.064 1.057l-.498.501-.002.002a4.5 4.5 0 01-6.364-6.364l7-7a4.5 4.5 0 016.368 6.36l-3.455 3.553A2.625 2.625 0 119.52 9.52l3.45-3.451a.75.75 0 111.061 1.06l-3.45 3.451a1.125 1.125 0 001.587 1.595l3.454-3.553a3 3 0 000-4.242z"
                            clip-rule="evenodd" />
                        </svg>
                        <span class="ml-2 w-0 flex-1 truncate">resume_back_end_developer.pdf</span>
                      </div>
                      <div class="ml-4 flex-shrink-0">
                        <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">Download</a>
                      </div>
                    </li>
                    <li class="flex items-center justify-between py-3 pl-3 pr-4 text-sm">
                      <div class="flex w-0 flex-1 items-center">
                        <svg class="h-5 w-5 flex-shrink-0 text-gray-400" viewBox="0 0 20 20" fill="currentColor"
                          aria-hidden="true">
                          <path fill-rule="evenodd"
                            d="M15.621 4.379a3 3 0 00-4.242 0l-7 7a3 3 0 004.241 4.243h.001l.497-.5a.75.75 0 011.064 1.057l-.498.501-.002.002a4.5 4.5 0 01-6.364-6.364l7-7a4.5 4.5 0 016.368 6.36l-3.455 3.553A2.625 2.625 0 119.52 9.52l3.45-3.451a.75.75 0 111.061 1.06l-3.45 3.451a1.125 1.125 0 001.587 1.595l3.454-3.553a3 3 0 000-4.242z"
                            clip-rule="evenodd" />
                        </svg>
                        <span class="ml-2 w-0 flex-1 truncate">coverletter_back_end_developer.pdf</span>
                      </div>
                      <div class="ml-4 flex-shrink-0">
                        <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">Download</a>
                      </div>
                    </li>
                  </ul>
                </dd>
              </div>
            </div>
          </div>
        </div>
        <div class="mt-5 md:col-span-2 md:mt-0">
          <div class="border rounded-lg p-5">
            <h1 class="font-bold text-lg text-gray-600 font-montserrat">ACTUAL</h1>
            <div class="mt-3">
              <ul role="list" class="divide-y divide-gray-200 border-gray-200">
                <li class="relative py-5 px-6 focus-within:ring-2 focus-within:ring-inset focus-within:ring-blue-600">

                  <div class="">
                    <div class="flex items-start border-b py-2">
                      <p class="lg:w-48 border-r mr-2 text-sm text-gray-600">Land Status</p>
                      <div class="font-rubik text-black uppercase text-sm text-right">
                        Leased/Unplanted
                      </div>
                    </div>
                    <div class="flex items-start border-b py-2">
                      <p class="lg:w-48 border-r mr-2 text-sm text-gray-600">Leased Area</p>
                      <div class="font-rubik text-black uppercase text-sm text-right">
                        82.7065
                      </div>
                    </div>

                    <div class="flex items-start border-b py-2">
                      <p class="lg:w-48 border-r mr-2 text-sm text-gray-600">
                        Unplanted Area
                      </p>
                      <div class="font-rubik text-black uppercase text-sm text-right">
                        247.233
                      </div>
                    </div>
                    <div class="flex items-start border-b py-2">
                      <p class="lg:w-48 border-r mr-2 text-sm text-gray-600">Status</p>
                      <div class="font-rubik text-black uppercase text-sm text-right">
                        TWOC
                      </div>
                    </div>
                    <div class="flex items-start border-b py-2">
                      <p class="lg:w-48 border-r mr-2 text-sm text-gray-600">Remarks</p>
                      <div class="font-rubik text-black uppercase text-sm text-right">
                        AREAS NOT PLANTED TO P/A AS AGREED W/ DFL & DARBC
                      </div>
                    </div>
                  </div>


                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="hidden sm:block" aria-hidden="true">
      <div class="py-5">
        <div class="border-t border-gray-200"></div>
      </div>
    </div>

    <div class="mt-10 sm:mt-0">
      <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="md:col-span-1">

        </div>
        <div class="mt-5 md:col-span-2 md:mt-0">
          <div class="border rounded-lg p-5">
            <div class="flex space-x-4 items-center">
              <h1 class="font-bold text-lg text-gray-600 font-montserrat">TAX</h1>
              <x-native-select wire:model="model">
                <option>2023</option>
                <option>2022</option>
                <option>2021</option>
                <option>2020</option>
              </x-native-select>
            </div>
            <div class="mt-3">
              <ul role="list" class="divide-y divide-gray-200 border-gray-200">
                <li class="relative py-5 px-6 focus-within:ring-2 focus-within:ring-inset focus-within:ring-blue-600">
                  <div class="flex items-start border-b py-2">
                    <p class="lg:w-48 border-r mr-2 text-sm text-gray-600">Year</p>
                    <div class="font-rubik text-black uppercase text-sm text-right">
                      2023
                    </div>
                  </div>
                  <div class="" v-if="selected_item != null">
                    <div class="flex items-start border-b py-2">
                      <p class="lg:w-48 border-r mr-2 text-sm text-gray-600">
                        Area in Title HA./S
                      </p>
                      <div class="font-rubik text-black uppercase text-sm text-right">
                        DSD
                      </div>
                    </div>
                    <div class="flex items-start border-b py-2">
                      <p class="lg:w-48 border-r mr-2 text-sm text-gray-600">
                        Tax Declaration No.
                      </p>
                      <div class="font-rubik text-black uppercase text-sm text-right">
                        SD
                      </div>
                    </div>
                    <div class="flex items-start border-b py-2">
                      <p class="lg:w-48 border-r mr-2 text-sm text-gray-600">Owner</p>
                      <div class="font-rubik text-black uppercase text-sm text-right">
                        SD
                      </div>
                    </div>
                    <div class="flex items-start border-b py-2">
                      <p class="lg:w-48 border-r mr-2 text-sm text-gray-600">Market Value</p>
                      <div class="font-rubik text-black uppercase text-sm text-right">
                        ₱ 121
                      </div>
                    </div>
                    <div class="flex items-start border-b py-2">
                      <p class="lg:w-48 border-r mr-2 text-sm text-gray-600">Assesed Value</p>
                      <div class="font-rubik text-black uppercase text-sm text-right">
                        ₱2323
                      </div>
                    </div>
                    <div class="flex items-start border-b py-2">
                      <p class="lg:w-48 border-r mr-2 text-sm text-gray-600">Paid By</p>
                      <div class="font-rubik text-black uppercase text-sm text-right">
                        Dolefile
                      </div>
                    </div>
                    <div class="flex items-start border-b py-2">
                      <p class="lg:w-48 border-r mr-2 text-sm text-gray-600">Leased To Dolefil</p>
                      <div class="font-rubik text-black uppercase text-sm text-right">
                        10.6291
                      </div>
                    </div>

                    <div class="flex items-start border-b py-2">
                      <p class="lg:w-48 border-r mr-2 text-sm text-gray-600">Tax Payment</p>
                      <div class="font-rubik text-black uppercase text-sm text-right">
                        ₱ 5456.64
                      </div>
                    </div>
                    <div class="flex items-start border-b py-2">
                      <p class="lg:w-48 border-r mr-2 text-sm text-gray-600">Year of Payment</p>
                      <div class="font-rubik text-black uppercase text-sm text-right">
                        2023
                      </div>
                    </div>
                    <div class="flex items-start border-b py-2">
                      <p class="lg:w-48 border-r mr-2 text-sm text-gray-600">Official Reciept</p>
                      <div class="font-rubik text-black uppercase text-sm text-right">
                        229436
                      </div>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="hidden sm:block" aria-hidden="true">
      <div class="py-5">
        <div class="border-t border-gray-200"></div>
      </div>
    </div>

    <div class="mt-10 sm:mt-0">
      <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="md:col-span-1">

        </div>
        <div class="mt-5 md:col-span-2 md:mt-0">
          <div class="border rounded-lg p-5">
            <div class="flex space-x-4 items-center">
              <h1 class="font-bold text-lg text-gray-600 font-montserrat">LAND AMORTIZATION</h1>

            </div>
            <div class="mt-3">
              <ul role="list" class="divide-y divide-gray-200 border-gray-200">
                <li class="relative py-5 focus-within:ring-2 focus-within:ring-inset focus-within:ring-blue-600">
                  <div class="flex items-start border-b py-2">
                    <p class="lg:w-48 border-r mr-2 text-sm text-gray-600">Amortization </p>
                    <div class="font-rubik text-black uppercase text-sm text-right">
                      FULLY PAID
                    </div>
                  </div>
                  <div class="flex items-start border-b py-2">
                    <p class="lg:w-48 border-r mr-2 text-sm text-gray-600"> AMOUNT </p>
                    <div class="font-rubik text-black uppercase text-sm text-right">
                      ₱ 124,985.6
                    </div>
                  </div>
                  <div class="flex items-start border-b py-2">
                    <p class="lg:w-48 border-r mr-2 text-sm text-gray-600">Date Paid</p>
                    <div class="font-rubik text-black uppercase text-sm text-right">
                      March 1, 2023
                    </div>
                  </div>
                  <div class="flex items-start border-b py-2">
                    <p class="lg:w-48 border-r mr-2 text-sm text-gray-600">Date of Cert</p>
                    <div class="font-rubik text-black uppercase text-sm text-right">
                      April 7, 2023
                    </div>
                  </div>
                  <div class="flex items-start border-b py-2">
                    <p class="lg:w-48 border-r mr-2 text-sm text-gray-600 leading-4">
                      NDC DIRECT PAYMENT SCHEME
                    </p>
                    <div class="font-rubik  uppercase text-sm text-right bg-green-600 text-white px-2 rounded ">

                      FULLY PAID
                    </div>
                  </div>
                  <div class="flex items-start border-b py-2">
                    <p class="lg:w-48 border-r mr-2 text-sm text-gray-600">NDC REMARKS</p>
                    <div class="font-rubik text-black uppercase text-sm text-right">
                      March 24, 2023
                    </div>
                  </div>
                  <div class="flex items-start border-b py-2">
                    <p class="lg:w-48 border-r mr-2 text-sm text-gray-600">NOTES</p>
                    <div class="ctd font-rubik text-black leading-5 text-sm left ">
                      DEED OF SALE (ALFREDO RADAZA-NDC) ORIGINAL CERTIFICATE TITLE P-21334 5 HA. IN DEED OF SALE AND
                      3.6HA IN DEED OF AWARD AND TRANSFER 1.4 HA LEASED CONTRACT TO DOLEFIL BETWEEN RADAZA.
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </x-modal.card>

  <x-modal wire:model.defer="add_modal" align="center" max-width="6xl">
    <x-card title="NEW LAND OWNER">
      <div class="grid grid-cols-5 gap-4">
        <x-input wire:model="_number" label="No." placeholder="" />
        <x-input wire:model="_lot_number" label="Lot No." placeholder="" />
        <x-input wire:model="_survey_number" label="Survey No." placeholder="" />
        <x-input wire:model="_title_area" label="Title Area Has.S" placeholder="" />
        <x-input wire:model="_awarded_area" label="Awarded Area Has.S" placeholder="" />
        <x-input wire:model="_previous_land_owner" label="Previous Land Owner" placeholder="" />
        <x-input wire:model="_field_number" label="Field No." placeholder="" />
        <x-input wire:model="_location" label="Location" placeholder="" />
        <x-input wire:model="_municipality" label="Municipality" placeholder="" />
        <x-input wire:model="_title" label="Title" placeholder="" />
        <x-input wire:model="_cloa_number" label="Cloa No." placeholder="" />
        <x-input wire:model="_page" label="Page" placeholder="" />
        <div class="col-span-5 border-y-2 py-3 border-gray-500">
            <div class="grid grid-cols-2">
                <h1>Encumbered</h1>
                <h1>Previous Copy Of Title</h1>
            </div>
          <div class="grid grid-cols-2 gap-4 mt-1">
            <div class="grid grid-cols-2 gap-4 mt-1">
            <x-input wire:model="_encumbered_area" label="Area" placeholder="" />
            <x-input wire:model="_encumbered_variance" label="Variance" placeholder="" />
            </div>
            <div class="grid grid-cols-2 gap-4 mt-1">
            <x-input wire:model="_previous_copy_of_title_type_of_title" label="Type Of Title" placeholder="" />
            <x-input wire:model="_previous_copy_of_title_number" label="No." placeholder="" />
            </div>
          </div>
        </div>
        {{-- <x-input wire:model="_title_status" label="Title Status" placeholder="" /> --}}
        <x-input wire:model="_title_copy" label="Title Copy" placeholder="" />
        <x-input wire:model="_title_status" label="Title Status" placeholder="" />
        <x-input wire:model="_land_bank_amortization" label="Land Bank Amortization" placeholder="" />
        <div class="col-span-3">
          <x-textarea wire:model="_remarks" label="Remarks" placeholder="Your comment" />
        </div>
        <div class="col-span-2">
          <x-textarea wire:model="_status" label="Status" placeholder="Your comment" />
        </div>

        <x-input wire:model="_amount" label="Amount" placeholder="" />
        {{-- <x-input wire:model="" label="Date Paid" placeholder="" /> --}}
        <x-datetime-picker without-time label="Date Paid" placeholder="Date Paid" wire:model.defer="_date_paid"/>
        <x-datetime-picker without-time label="Date of Certificate" placeholder="Date of Certificate" wire:model.defer="_date_of_cert"/>
        {{-- <x-input wire:model="" label="Date of Certificate" placeholder="" /> --}}
        <x-input wire:model="_ndc_direct_payment_scheme" label="NDC Direct Payment Scheme" placeholder="" />
        <div class="col-span-3">
          <x-textarea wire:model="_ndc_remarks" label="NDC Remarks" placeholder="Your comment" />
        </div>
        <div class="col-span-2">
          <x-textarea wire:model="_notes" label="Notes" placeholder="Your comment" />
        </div>
      </div>

      <x-slot name="footer">
        <div class="flex justify-end gap-x-4">
          <x-button flat label="Cancel" x-on:click="close" />
          <x-button indigo right-icon="save-as" label="Save Owner" wire:click="saveBasicInformation" />
        </div>
      </x-slot>
    </x-card>
  </x-modal>
</div>
