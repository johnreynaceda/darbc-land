<div x-data>
  <div>
    <div class="">
      <div>
        {{-- <h1 class="font-bold font-montserrat uppercase text-lg text-gray-700">Search</h1> --}}
        {{-- <h1 class="text-gray-500 text-sm">
          You can search anything you like as long as the datails existed in the table columns
        </h1> --}}
        <div wire:ignore class="pt-4 w-full">
            <x-select label="Select Columns" placeholder="Select one status" searchable multiselect wire:model="selected_columns">
                <x-select.option label="NO." value="number" />
                <x-select.option label="LOT NO." value="lot_number" />
                <x-select.option label="SURVEY NO." value="survey_number" />
                <x-select.option label="TITLE AREA" value="title_area" />
                <x-select.option label="AWARDED AREA" value="awarded_area" />
                <x-select.option label="PREVIOUS LAND OWNER" value="previous_land_owner" />
                <x-select.option label="FIELD NO." value="field_number" />
                <x-select.option label="BARANGAY" value="location" />
                <x-select.option label="MUNICIPALITY" value="municipality" />
                <x-select.option label="TITLE" value="title" />
                <x-select.option label="CLOA NO." value="cloa_number" />
                <x-select.option label="PAGE" value="page" />
                <x-select.option label="ENCUMBERED AREA" value="encumbered_area" />
                <x-select.option label="ENCUMBERED VARIANCE" value="encumbered_variance" />
                <x-select.option label="PREVIOUS COPY OF TITLE (TYPE)" value="previous_copy_of_title_type" />
                <x-select.option label="PREVIOUS COPY OF TITLE (NO.)" value="previous_copy_of_title_number" />
                <x-select.option label="TITLE STATUS" value="title_status" />
                <x-select.option label="TITLE COPY" value="title_copy" />
                <x-select.option label="TAX DECLARATION NUMBER" value="tax_dec_number" />
                <x-select.option label="REMARKS" value="remarks" />
                <x-select.option label="STATUS" value="status" />
                <x-select.option label="LAND BANK AMORTIZATION" value="land_bank_amortization" />
                <x-select.option label="AMOUNT" value="amount" />
                <x-select.option label="DATE PAID" value="date_paid" />
                <x-select.option label="DATE OF CERT" value="date_of_cert" />
                <x-select.option label="NDC" value="ndc_remarks" />
                <x-select.option label="NOTES" value="notes" />
            </x-select>
        </div>

      </div>
    </div>
    <div class="hidden grid grid-cols-4 gap-2 mt-4">
      <div class="border p-1 px-3 rounded">
        <x-checkbox label="N0." wire:model="filters.number" />
      </div>
      <div class="border p-1 px-3 rounded">
        <x-checkbox label="LOT NO." wire:model="filters.lot_number" />
      </div>
      <div class="border p-1 px-3 rounded">
        <x-checkbox id="right-label" label="SURVEY NO." wire:model="filters.survey_number" />
      </div>
      <div class="border p-1 px-3 rounded">
        <x-checkbox id="right-label" label="TITLE AREA" wire:model="filters.title_area" />
      </div>
      <div class="border p-1 px-3 rounded">
        <x-checkbox id="right-label" label="
        AWARDED-AREA" wire:model="filters.awarded_area" />
      </div>
      <div class="border p-1 px-3 rounded">
        <x-checkbox id="right-label" label="PREVIOUS LAND OWNER" wire:model="filters.previous_land_owner" />
      </div>
      <div class="border p-1 px-3 rounded">
        <x-checkbox id="right-label" label="
        FIELD NO." wire:model="filters.field_number" />
      </div>
      <div class="border p-1 px-3 rounded">
        <x-checkbox id="right-label" label="BARANGAY" wire:model="filters.location" />
      </div>
      <div class="border p-1 px-3 rounded">
        <x-checkbox id="right-label" label="MUNICIPALITY" wire:model="filters.municipality" />
      </div>
      <div class="border p-1 px-3 rounded">
        <x-checkbox id="right-label" label="TITLE" wire:model="filters.title" />
      </div>
      <div class="border p-1 px-3 rounded">
        <x-checkbox id="right-label" label="CLOA NO." wire:model="filters.cloa_number" />
      </div>
      <div class="border p-1 px-3 rounded">
        <x-checkbox id="right-label" label="PAGE" wire:model="filters.page" />
      </div>
      {{-- <div class="border p-1 px-3 rounded">
        <x-checkbox id="right-label" label="
            ENCUMBERED" wire:model="filters.encumbered" />
      </div> --}}
      <div class="border p-1 px-3 rounded">
        <x-checkbox id="right-label" label="
            ENCUMBERED AREA" wire:model="filters.encumbered_area" />
      </div>
      <div class="border p-1 px-3 rounded">
        <x-checkbox id="right-label" label="
            ENCUMBERED VARIANCE" wire:model="filters.encumbered_variance" />
      </div>
      {{-- <div class="border p-1 px-3 rounded">
        <x-checkbox id="right-label" label="
            AREA" wire:model="filters.encumbered" />
      </div>
      <div class="border p-1 px-3 rounded">
        <x-checkbox id="right-label" label="
            VARIANCE" wire:model="filters.encumbered" />
      </div> --}}
      {{-- <div class="border p-1 px-3 rounded">
        <x-checkbox id="right-label" label="PREVIOUS COPY OF TITLE" wire:model="filters.previous_copy_of_title" />
      </div> --}}
      <div class="border p-1 px-3 rounded">
        <x-checkbox id="right-label" label="PREVIOUS COPY OF TITLE (TYPE)" wire:model="filters.previous_copy_of_title_type" />
      </div>
      <div class="border p-1 px-3 rounded">
        <x-checkbox id="right-label" label="PREVIOUS COPY OF TITLE (NO.)" wire:model="filters.previous_copy_of_title_number" />
      </div>
      <div class="border p-1 px-3 rounded">
        <x-checkbox id="right-label" label="
            TITLE STATUS" wire:model="filters.title_status" />
      </div>
      <div class="border p-1 px-3 rounded">
        <x-checkbox id="right-label" label="
            TITLE COPY" wire:model="filters.title_copy" />
      </div>
      <div class="border p-1 px-3 rounded">
        <x-checkbox id="right-label" label="
            TAX DECLARATION NUMBER" wire:model="filters.tax_dec_number" />
      </div>
      <div class="border p-1 px-3 rounded">
        <x-checkbox id="right-label" label="
            REMARKS" wire:model="filters.remarks" />
      </div>
      <div class="border p-1 px-3 rounded">
        <x-checkbox id="right-label" label="
            STATUS" wire:model="filters.status" />
      </div>
      <div class="border p-1 px-3 rounded">
        <x-checkbox id="right-label" label="
            LAND BANK AMORTIZATION" wire:model="filters.land_bank_amortization" />
      </div>
      <div class="border p-1 px-3 rounded">
        <x-checkbox id="right-label" label="
            AMOUNT" wire:model="filters.amount" />
      </div>
      <div class="border p-1 px-3 rounded">
        <x-checkbox id="right-label" label="
            DATE PAID" wire:model="filters.date_paid" />
      </div>
      <div class="border p-1 px-3 rounded">
        <x-checkbox id="right-label" label="
            DATE OF CERT" wire:model="filters.date_of_cert" />
      </div>
      <div class="border p-1 px-3 rounded">
        <x-checkbox id="right-label" label="
            NDC" wire:model="filters.ndc_direct_payment_scheme" />
      </div>
      <div class="border p-1 px-3 rounded">
        <x-checkbox id="right-label" label="
            NOTES" wire:model="filters.notes" />
      </div>
    </div>

    {{-- filters --}}
    <div class=" grid grid-cols-4 gap-4 mt-4">
            @php
            $count = count(
                array_filter($filters, function ($value) {
                    return $value !== null;
                }),
            );
        @endphp


    </div>
    <div class="grid grid-cols-5 space-x-3">
        <div class="{{in_array('municipality', $selected_columns) ? '' : 'hidden'}} col-span-1">
            <x-select label="Select Municipality" multiselect placeholder="All" wire:model="municipalities">
            <x-select.option label="POLOMOLOK" value="POLOMOLOK" />
            <x-select.option label="TUPI" value="TUPI" />
            <x-select.option label="GENERAL SANTOS" value="GENERAL SANTOS" />
        </x-select>
        </div>
        <div class="{{in_array('location', $selected_columns) ? '' : 'hidden'}} col-span-1">
            <x-select label="Select Barangay" multiselect placeholder="All" wire:model="locations">
            <x-select.option label="ACMONAN" value="ACMONAN" />
            <x-select.option label="APOPONG" value="Apopong" />
            <x-select.option label="AQUINO GATE" value="AQUINO GATE" />
            <x-select.option label="CANNERY" value="CANNERY" />
            <x-select.option label="CANNERY SITE" value="CANNERY SITE" />
            <x-select.option label="CEBUANO" value="CEBUANO" />
            <x-select.option label="CR. PALKAN" value="CR. PALKAN" />
            <x-select.option label="KABLON" value="KABLON" />
            <x-select.option label="KINILES" value="KINILES" />
            <x-select.option label="KINILIS" value="KINILIS" />
            <x-select.option label="KLINAN" value="KLINAN" />
            <x-select.option label="LAGAO" value="LAGAO" />
            <x-select.option label="LAMCALIAF" value="LAMCALIAF" />
            <x-select.option label="PAGALUNGAN" value="PAGALUNGAN" />
            <x-select.option label="LINAN" value="LINAN" />
            <x-select.option label="LUMAKIL" value="LUMAKIL" />
            <x-select.option label="MALIGO" value="MALIGO" />
            <x-select.option label="LANDAN" value="LANDAN" />
            <x-select.option label="SANGRILA" value="SANGRILA" />
            <x-select.option label="MATINAO" value="MATINAO" />
            <x-select.option label="MATUTUM" value="MATUTUM" />
            <x-select.option label="MATINAO" value="MATINAO" />
        </x-select>
        </div>
        <div class="{{in_array('title_status', $selected_columns) ? '' : 'hidden'}} col-span-1">
            <x-select label="Select Title Status" multiselect placeholder="All" wire:model="title_statuses">
            <x-select.option label="TWC" value="TWC" />
            <x-select.option label="TWOC" value="TWOC" />
            <x-select.option label="UWC" value="UWC" />
            <x-select.option label="UWOC" value="UWOC" />
        </x-select>
        </div>
        <div class="{{in_array('previous_copy_of_title_type', $selected_columns) ? '' : 'hidden'}} col-span-1">
            <x-select label="Select Title Type" multiselect placeholder="All" wire:model="title_types">
            <x-select.option label="TCT" value="TCT" />
            <x-select.option label="OCT" value="OCT" />
        </x-select>
        </div>

        <div class="col-span-1 col-start-5">
            <div class="flex space-x-3">
                <x-input label="Search" placeholder="" wire:model="search"/>
                    <x-select label="Filter" placeholder="Select One" wire:model="title_filter">
                      @if (in_array('number', $selected_columns))
                      <x-select.option label="NO." value="number" />
                      @endif
                      @if (in_array('lot_number', $selected_columns))
                      <x-select.option label="LOT NO." value="lot_number" />
                      @endif
                      @if (in_array('survey_number', $selected_columns))
                      <x-select.option label="SURVEY NO." value="survey_number" />
                      @endif
                      @if (in_array('title_area', $selected_columns))
                      <x-select.option label="TITLE AREA" value="title_area" />
                      @endif
                      @if (in_array('awarded_area', $selected_columns))
                      <x-select.option label="AWARDED AREA" value="awarded_area" />
                      @endif
                      @if (in_array('previous_land_owner', $selected_columns))
                      <x-select.option label="PREVIOUS LAND OWNER" value="previous_land_owner" />
                      @endif
                      @if (in_array('field_number', $selected_columns))
                      <x-select.option label="FIELD NO." value="field_number" />
                      @endif
                      @if (in_array('location', $selected_columns))
                      <x-select.option label="BARANGAY" value="location" />
                      @endif
                      @if (in_array('municipality', $selected_columns))
                      <x-select.option label="MUNICIPALITY" value="municipality" />
                      @endif
                      @if (in_array('title', $selected_columns))
                      <x-select.option label="TITLE" value="title" />
                      @endif
                      @if (in_array('cloa_number', $selected_columns))
                      <x-select.option label="CLOA NO." value="cloa_number" />
                      @endif
                      @if (in_array('page', $selected_columns))
                      <x-select.option label="PAGE" value="page" />
                      @endif
                      @if (in_array('encumbered_area', $selected_columns))
                      <x-select.option label="ENCUMBERED AREA" value="encumbered_area" />
                      @endif
                      @if (in_array('encumbered_variance', $selected_columns))
                      <x-select.option label="ENCUMBERED VARIANCE" value="encumbered_variance" />
                      @endif
                      @if (in_array('previous_copy_of_title_type', $selected_columns))
                      <x-select.option label="PREVIOUS COPY OF TITLE (TYPE)" value="previous_copy_of_title_type" />
                      @endif
                      @if (in_array('previous_copy_of_title_number', $selected_columns))
                      <x-select.option label="PREVIOUS COPY OF TITLE (NO.)" value="previous_copy_of_title_number" />
                      @endif
                      @if (in_array('title_status', $selected_columns))
                      <x-select.option label="TITLE STATUS" value="title_status" />
                      @endif
                      @if (in_array('title_copy', $selected_columns))
                      <x-select.option label="TITLE COPY" value="title_copy" />
                      @endif
                      @if (in_array('tax_dec_number', $selected_columns))
                      <x-select.option label="TAX DECLARATION NUMBER" value="tax_dec_number" />
                      @endif
                      @if (in_array('remarks', $selected_columns))
                      <x-select.option label="REMARKS" value="remarks" />
                      @endif
                      @if (in_array('status', $selected_columns))
                      <x-select.option label="STATUS" value="status" />
                      @endif
                      @if (in_array('land_bank_amortization', $selected_columns))
                      <x-select.option label="LAND BANK AMORTIZATION" value="land_bank_amortization" />
                      @endif
                      @if (in_array('amount', $selected_columns))
                      <x-select.option label="AMOUNT" value="amount" />
                      @endif
                      @if (in_array('ndc_remarks', $selected_columns))
                        <x-select.option label="NDC" value="ndc_remarks" />
                      @endif
                      @if (in_array('notes', $selected_columns))
                      <x-select.option label="NOTES" value="notes" />
                      @endif
                    </x-select>
            </div>
        </div>
    </div>

    <div class="mt-4 relative">
      <div class="p-3 border rounded-lg">
        <div class="flex mb-2 justify-between items-center">
          <div>
            {{-- <div class="border rounded-lg flex items-center  px-1.5">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-5 w-5 fill-gray-500">
                <path fill="none" d="M0 0h24v24H0z" />
                <path
                  d="M11 2c4.968 0 9 4.032 9 9s-4.032 9-9 9-9-4.032-9-9 4.032-9 9-9zm0 16c3.867 0 7-3.133 7-7 0-3.868-3.133-7-7-7-3.868 0-7 3.132-7 7 0 3.867 3.132 7 7 7zm8.485.071l2.829 2.828-1.415 1.415-2.828-2.829 1.414-1.414z" />
              </svg>
              <input type="text" wire:model="search" class="border-0 outline-none focus:ring-0"
                placeholder="Search">
            </div> --}}
          </div>
          <div>
            <x-button label="PRINT" class="font-bold" icon="printer" dark @click="printOut($refs.printContainer.outerHTML);" />
            <x-button label="Export" class="font-bold" icon="document-text" positive class="font-bold uppercase" wire:click="$emit('exportTableData')" />
          </div>
        </div>
        <div class="flow-root overflow-x-auto" x-ref="printContainer" id="print_table">
          @php
            $count = count(
                array_filter($filters, function ($value) {
                    return $value !== null;
                }),
            );
          @endphp
          <table id="my-table" class="min-w-full divide-y divide-gray-300">
            <thead>
              @if ($count < 1)
                <tr class="divide-x divide-gray-200">

                  {{-- <th
                    class="whitespace-nowrap border-t py-1 pl-4 pr-4 text-center text-sm font-semibold bg-indigo-500 text-white">
                    NO.
                  </th> --}}
                  <th
                    class="whitespace-nowrap border-t px-4 py-1 text-center text-sm font-semibold bg-indigo-500 text-white">
                    LOT#
                  </th>
                  <th
                    class=" whitespace-nowrap border-t px-4 py-1 text-center text-sm font-semibold bg-indigo-500 text-white">
                    SURVEY
                    NO.
                  </th>
                  <th
                    class="whitespace-nowrap border-t  py-1 pl-4 pr-4 text-center text-sm font-semibold bg-indigo-500 text-white ">
                    TITLE
                    AREA
                  </th>
                  <th
                    class=" whitespace-nowrap border-t py-1 pl-4 pr-4 text-center text-sm font-semibold bg-indigo-500 text-white ">
                    AWARDED AREA
                  </th>
                  {{-- <th
                    class="whitespace-nowrap border-t py-1 pl-4 pr-4 text-center text-sm font-semibold bg-indigo-500 text-white ">
                    PREVIOUS LAND OWNER
                  </th>
                  <th
                    class="whitespace-nowrap border-t py-1 pl-4 pr-4 text-center text-sm font-semibold bg-indigo-500 text-white ">
                    FIELD
                  </th> --}}
                  <th
                    class="whitespace-nowrap border-t py-1 pl-4 pr-4 text-center text-sm font-semibold bg-indigo-500 text-white ">
                    BARANGAY
                  </th>
                  <th
                    class="whitespace-nowrap border-t py-1 pl-4 pr-4 text-center text-sm font-semibold bg-indigo-500 text-white ">
                    MUNICIPALITY
                  </th>
                  {{-- <th
                    class="whitespace-nowrap border-t py-1 pl-4 pr-4 text-center text-sm font-semibold bg-indigo-500 text-white ">
                    TITLE
                  </th> --}}
                  <th
                    class="whitespace-nowrap border-t py-1 pl-4 pr-4 text-center text-sm font-semibold bg-indigo-500 text-white ">
                    CLOA
                    NO.
                  </th>
                  {{-- <th
                    class="whitespace-nowrap border-t py-1 pl-4 pr-4 text-center text-sm font-semibold bg-indigo-500 text-white ">
                    PAGE
                  </th>
                  <th
                    class="whitespace-nowrap border-t py-1 pl-4 pr-4 text-center text-sm font-semibold bg-indigo-500 text-white ">
                    ENCUMBERED
                  </th> --}}
                  <th
                    class="whitespace-nowrap border-t py-1 pl-4 pr-4 text-center text-sm font-semibold bg-indigo-500 text-white ">
                    PREVIOUS COPY OF
                    TITLE (NO.)
                  </th>
                  {{-- <th
                    class="whitespace-nowrap border-t py-1 pl-4 pr-4 text-center text-sm font-semibold bg-indigo-500 text-white ">
                    TITLE
                    STATUS
                  </th> --}}
                  {{-- <th
                    class="whitespace-nowrap border-t py-1 pl-4 pr-4 text-center text-sm font-semibold bg-indigo-500 text-white ">
                    TITLE
                    COPY
                  </th>
                  <th
                    class="whitespace-nowrap border-t py-1 pl-4 pr-4 text-center text-sm font-semibold bg-indigo-500 text-white ">
                    REMARKS
                  </th>
                  <th
                    class="whitespace-nowrap border-t py-1 pl-4 pr-4 text-center text-sm font-semibold bg-indigo-500 text-white ">
                    STATUS
                  </th>
                  <th
                    class="whitespace-nowrap border-t py-1 pl-4 pr-4 text-center text-sm font-semibold bg-indigo-500 text-white ">
                    LAND
                    BANK
                    AMORTIZATION
                  </th>
                  <th
                    class="whitespace-nowrap border-t py-1 pl-4 pr-4 text-center text-sm font-semibold bg-indigo-500 text-white ">
                    AMOUNT
                  </th>
                  <th
                    class="whitespace-nowrap border-t py-1 pl-4 pr-4 text-center text-sm font-semibold bg-indigo-500 text-white ">
                    DATE
                    PAID
                  </th>
                  <th
                    class="whitespace-nowrap border-t py-1 pl-4 pr-4 text-center text-sm font-semibold bg-indigo-500 text-white ">
                    DATE
                    OF CERT
                  </th>
                  <th
                    class="whitespace-nowrap border-t py-1 pl-4 pr-4 text-center text-sm font-semibold bg-indigo-500 text-white ">
                    NDC
                  </th>
                  <th
                    class="whitespace-nowrap border-t py-1 pl-4 pr-4 text-center text-sm font-semibold bg-indigo-500 text-white ">
                    NDC REMARKS
                  </th>
                  <th
                    class="whitespace-nowrap border-t py-1 pl-4 pr-4 text-center text-sm font-semibold bg-indigo-500 text-white ">
                    <div class="flex w-64 text-center justify-center">
                      NOTES
                    </div>
                  </th> --}}

                {{-- </tr>
                <tr class="divide-x divide-gray-200">
                  <th
                    class="whitespace-nowrap  py-1 pl-4 pr-4 text-center text-sm font-semibold bg-indigo-500 text-white">

                  </th>
                  <th
                    class="whitespace-nowrap  py-1 pl-4 pr-4 text-center text-sm font-semibold bg-indigo-500 text-white">

                  </th>
                  <th
                    class="whitespace-nowrap border-t px-4 py-1 text-center text-sm font-semibold bg-indigo-500 text-white">
                  </th>
                  <th
                    class=" whitespace-nowrap border-t px-4 py-1 text-center text-sm font-semibold bg-indigo-500 text-white">

                  </th>
                  <th
                    class="whitespace-nowrap border-t  py-1 pl-4 pr-4 text-center text-sm font-semibold bg-indigo-500 text-white ">
                    HAS./S
                  </th>
                  <th
                    class=" whitespace-nowrap border-t py-1 pl-4 pr-4 text-center text-sm font-semibold bg-indigo-500 text-white ">
                    HAS./S
                  </th>
                  <th
                    class="whitespace-nowrap border-t py-1 pl-4 pr-4 text-center text-sm font-semibold bg-indigo-500 text-white ">
                    LAND OWNER
                  </th>
                  <th
                    class="whitespace-nowrap border-t py-1 pl-4 pr-4 text-center text-sm font-semibold bg-indigo-500 text-white ">
                    NO.
                  </th>
                  <th
                    class="whitespace-nowrap border-t py-1 pl-4 pr-4 text-center text-sm font-semibold bg-indigo-500 text-white ">

                  </th>
                  <th
                    class="whitespace-nowrap border-t py-1 pl-4 pr-4 text-center text-sm font-semibold bg-indigo-500 text-white ">

                  </th>
                  <th
                    class="whitespace-nowrap border-t py-1 pl-4 pr-4 text-center text-sm font-semibold bg-indigo-500 text-white ">

                  </th>
                  <th
                    class="whitespace-nowrap border-t py-1 pl-4 pr-4 text-center text-sm font-semibold bg-indigo-500 text-white ">
                    NO.
                  </th>
                  <th
                    class="whitespace-nowrap border-t py-1 pl-4 pr-4 text-center text-sm font-semibold bg-indigo-500 text-white ">

                  </th>
                  <th
                    class="whitespace-nowrap border-t py-1 pl-4 pr-4  text-center text-sm font-semibold bg-indigo-500 text-white ">
                    <div class="flex space-x-6">
                      <span>AREA</span>
                      <span>/</span>
                      <span>VARIANCE</span>
                    </div>

                  </th>
                  <th
                    class="whitespace-nowrap border-t py-1 pl-4 pr-4 text-center text-sm font-semibold bg-indigo-500 text-white ">
                    <div class="flex space-x-6">
                      <span>TYPE OF TITLE</span>
                      <span>/</span>
                      <span>NO.</span>
                    </div>
                  </th>
                  <th
                    class="whitespace-nowrap border-t py-1 pl-4 pr-4 text-center text-sm font-semibold bg-indigo-500 text-white ">
                  </th>
                  <th
                    class="whitespace-nowrap border-t py-1 pl-4 pr-4 text-center text-sm font-semibold bg-indigo-500 text-white ">

                  </th>
                  <th
                    class="whitespace-nowrap border-t py-1 pl-4 pr-4 text-center text-sm font-semibold bg-indigo-500 text-white ">
                    REMARKS
                  </th>
                  <th
                    class="whitespace-nowrap border-t py-1 pl-4 pr-4 text-center text-sm font-semibold bg-indigo-500 text-white ">
                    STATUS
                  </th>
                  <th
                    class="whitespace-nowrap border-t py-1 pl-4 pr-4 text-center text-sm font-semibold bg-indigo-500 text-white ">

                  </th>
                  <th
                    class="whitespace-nowrap border-t py-1 pl-4 pr-4 text-center text-sm font-semibold bg-indigo-500 text-white ">
                    PHP
                  </th>
                  <th
                    class="whitespace-nowrap border-t py-1 pl-4 pr-4 text-center text-sm font-semibold bg-indigo-500 text-white ">
                    MONTHLY DAY YEAR
                  </th>
                  <th
                    class="whitespace-nowrap border-t py-1 pl-4 pr-4 text-center text-sm font-semibold bg-indigo-500 text-white ">
                    MONTHLY DAY YEAR
                  </th>
                  <th
                    class="whitespace-nowrap border-t py-1 pl-4 pr-4 text-center text-sm font-semibold bg-indigo-500 text-white ">

                    DIRECT
                    PAYMENT SCHEME
                  </th>
                  <th
                    class="whitespace-nowrap border-t py-1 pl-4 pr-4 text-center text-sm font-semibold bg-indigo-500 text-white ">

                  </th>
                  <th
                    class="whitespace-nowrap border-t py-1 pl-4 pr-4 text-center text-sm font-semibold bg-indigo-500 text-white ">
                  </th>


                </tr> --}}
              @elseif($count > 0)
                <tr class="divide-x divide-gray-200">

                  @if ($filters['number'] != false && $filters['number'] != null)
                    <th
                      class="whitespace-nowrap border-t py-1 pl-4 pr-4 text-center text-sm font-semibold bg-indigo-500 text-white">
                      NO.
                    </th>
                  @endif
                  @if ($filters['lot_number'] != false && $filters['lot_number'] != null)
                    <th
                      class="whitespace-nowrap border-t py-1 pl-4 pr-4 text-center text-sm font-semibold bg-indigo-500 text-white">
                      LOT NO.
                    </th>
                  @endif
                  @if ($filters['survey_number'] != false && $filters['survey_number'] != null)
                    <th
                      class="whitespace-nowrap border-t py-1 pl-4 pr-4 text-center text-sm font-semibold bg-indigo-500 text-white">
                      SURVEY NO.
                    </th>
                  @endif
                  @if ($filters['title_area'] != false && $filters['title_area'] != null)
                    <th
                      class="whitespace-nowrap border-t py-1 pl-4 pr-4 text-center text-sm font-semibold bg-indigo-500 text-white">
                      TITLE AREA
                    </th>
                  @endif
                  @if ($filters['awarded_area'] != false && $filters['awarded_area'] != null)
                    <th
                      class="whitespace-nowrap border-t py-1 pl-4 pr-4 text-center text-sm font-semibold bg-indigo-500 text-white">
                      AWARDED AREA
                    </th>
                  @endif
                  @if ($filters['previous_land_owner'] != false && $filters['previous_land_owner'] != null)
                    <th
                      class="whitespace-nowrap border-t py-1 pl-4 pr-4 text-center text-sm font-semibold bg-indigo-500 text-white">
                      PEVIOUS LAND OWNER
                    </th>
                  @endif
                  @if ($filters['field_number'] != false && $filters['field_number'] != null)
                    <th
                      class="whitespace-nowrap border-t py-1 pl-4 pr-4 text-center text-sm font-semibold bg-indigo-500 text-white">
                      FIELD NO.
                    </th>
                  @endif
                  @if ($filters['location'] != false && $filters['location'] != null)
                    <th
                      class="whitespace-nowrap border-t py-1 pl-4 pr-4 text-center text-sm font-semibold bg-indigo-500 text-white">
                      BARANGAY
                    </th>
                  @endif
                  @if ($filters['municipality'] != false && $filters['municipality'] != null)
                    <th
                      class="whitespace-nowrap border-t py-1 pl-4 pr-4 text-center text-sm font-semibold bg-indigo-500 text-white">
                      MUNICIPALITY
                    </th>
                  @endif
                  @if ($filters['title'] != false && $filters['title'] != null)
                    <th
                      class="whitespace-nowrap border-t py-1 pl-4 pr-4 text-center text-sm font-semibold bg-indigo-500 text-white">
                      TITLE
                    </th>
                  @endif
                  @if ($filters['cloa_number'] != false && $filters['cloa_number'] != null)
                    <th
                      class="whitespace-nowrap border-t py-1 pl-4 pr-4 text-center text-sm font-semibold bg-indigo-500 text-white">
                      CLOA NO.
                    </th>
                  @endif
                  @if ($filters['page'] != false && $filters['page'] != null)
                    <th
                      class="whitespace-nowrap border-t py-1 pl-4 pr-4 text-center text-sm font-semibold bg-indigo-500 text-white">
                      PAGE
                    </th>
                  @endif
                  @if ($filters['encumbered'] != false && $filters['encumbered'] != null)
                    <th
                      class="whitespace-nowrap border-t py-1 pl-4 pr-4 text-center text-sm font-semibold bg-indigo-500 text-white">
                      ENCUMBERED
                    </th>
                  @endif
                  @if ($filters['encumbered_area'] != false && $filters['encumbered_area'] != null)
                  <th
                    class="whitespace-nowrap border-t py-1 pl-4 pr-4 text-center text-sm font-semibold bg-indigo-500 text-white">
                    ENCUMBERED AREA
                  </th>
                   @endif
                    @if ($filters['encumbered_variance'] != false && $filters['encumbered_variance'] != null)
                    <th
                    class="whitespace-nowrap border-t py-1 pl-4 pr-4 text-center text-sm font-semibold bg-indigo-500 text-white">
                    ENCUMBERED VARIANCE
                    </th>
                    @endif
                  @if ($filters['previous_copy_of_title'] != false && $filters['previous_copy_of_title'] != null)
                    <th
                      class="whitespace-nowrap border-t py-1 pl-4 pr-4 text-center text-sm font-semibold bg-indigo-500 text-white">
                      PREVIOUS COPY OF TITLE
                    </th>
                  @endif
                    @if ($filters['previous_copy_of_title_type'] != false && $filters['previous_copy_of_title_type'] != null)
                    <th
                        class="whitespace-nowrap border-t py-1 pl-4 pr-4 text-center text-sm font-semibold bg-indigo-500 text-white">
                        PREVIOUS COPY OF TITLE (TYPE)
                    </th>
                    @endif
                    @if ($filters['previous_copy_of_title_number'] != false && $filters['previous_copy_of_title_number'] != null)
                    <th
                    class="whitespace-nowrap border-t py-1 pl-4 pr-4 text-center text-sm font-semibold bg-indigo-500 text-white">
                    PREVIOUS COPY OF TITLE (NO.)
                    </th>
                @endif
                  @if ($filters['title_status'] != false && $filters['title_status'] != null)
                    <th
                      class="whitespace-nowrap border-t py-1 pl-4 pr-4 text-center text-sm font-semibold bg-indigo-500 text-white">
                      TITLE STATUS
                    </th>
                  @endif
                  @if ($filters['title_copy'] != false && $filters['title_copy'] != null)
                    <th
                      class="whitespace-nowrap border-t py-1 pl-4 pr-4 text-center text-sm font-semibold bg-indigo-500 text-white">
                      TITLE COPY
                    </th>
                  @endif
                  @if ($filters['tax_dec_number'] != false && $filters['tax_dec_number'] != null)
                  <th
                    class="whitespace-nowrap border-t py-1 pl-4 pr-4 text-center text-sm font-semibold bg-indigo-500 text-white">
                    TAX DECLARATION NUMBER
                  </th>
                 @endif
                  @if ($filters['remarks'] != false && $filters['remarks'] != null)
                    <th
                      class="whitespace-nowrap border-t py-1 pl-4 pr-4 text-center text-sm font-semibold bg-indigo-500 text-white">
                      REMARKS
                    </th>
                  @endif
                  @if ($filters['status'] != false && $filters['status'] != null)
                    <th
                      class="whitespace-nowrap border-t py-1 pl-4 pr-4 text-center text-sm font-semibold bg-indigo-500 text-white">
                      STATUS
                    </th>
                  @endif
                  @if ($filters['land_bank_amortization'] != false && $filters['land_bank_amortization'] != null)
                    <th
                      class="whitespace-nowrap border-t py-1 pl-4 pr-4 text-center text-sm font-semibold bg-indigo-500 text-white">
                      LAND BANK AMORTIZATION
                    </th>
                  @endif
                  @if ($filters['amount'] != false && $filters['amount'] != null)
                    <th
                      class="whitespace-nowrap border-t py-1 pl-4 pr-4 text-center text-sm font-semibold bg-indigo-500 text-white">
                      AMOUNT
                    </th>
                  @endif
                  @if ($filters['date_paid'] != false && $filters['date_paid'] != null)
                    <th
                      class="whitespace-nowrap border-t py-1 pl-4 pr-4 text-center text-sm font-semibold bg-indigo-500 text-white">
                      DATE PAID
                    </th>
                  @endif
                  @if ($filters['date_of_cert'] != false && $filters['date_of_cert'] != null)
                    <th
                      class="whitespace-nowrap border-t py-1 pl-4 pr-4 text-center text-sm font-semibold bg-indigo-500 text-white">
                      DATE OF CERT
                    </th>
                  @endif
                  @if ($filters['ndc_direct_payment_scheme'] != false && $filters['ndc_direct_payment_scheme'] != null)
                    <th
                      class="whitespace-nowrap border-t py-1 pl-4 pr-4 text-center text-sm font-semibold bg-indigo-500 text-white">
                      NDC
                    </th>
                  @endif
                  @if ($filters['ndc_remarks'] != false && $filters['ndc_remarks'] != null)
                    <th
                      class="whitespace-nowrap border-t py-1 pl-4 pr-4 text-center text-sm font-semibold bg-indigo-500 text-white">
                      NDC REMARKS
                    </th>
                  @endif
                  @if ($filters['notes'] != false && $filters['notes'] != null)
                    <th
                      class="whitespace-nowrap border-t py-1 pl-4 pr-4 text-center text-sm font-semibold bg-indigo-500 text-white">
                      NOTES
                    </th>
                  @endif

                </tr>
                {{-- <tr class="divide-x divide-gray-200">
                  @if ($filters['number'] != false && $filters['number'] != null)
                    <th
                      class="whitespace-nowrap  py-1 pl-4 pr-4 text-center text-sm font-semibold bg-indigo-500 text-white">

                    </th>
                  @endif

                  @if ($filters['lot_number'] != false && $filters['lot_number'] != null)
                    <th
                      class="whitespace-nowrap  py-1 pl-4 pr-4 text-center text-sm font-semibold bg-indigo-500 text-white">

                    </th>
                  @endif
                  @if ($filters['survey_number'] != false && $filters['survey_number'] != null)
                    <th
                      class="whitespace-nowrap  py-1 pl-4 pr-4 text-center text-sm font-semibold bg-indigo-500 text-white">

                    </th>
                  @endif
                  @if ($filters['title_area'] != false && $filters['title_area'] != null)
                    <th
                      class="whitespace-nowrap  py-1 pl-4 pr-4 text-center text-sm font-semibold bg-indigo-500 text-white">
                      HAS./S
                    </th>
                  @endif
                  @if ($filters['awarded_area'] != false && $filters['awarded_area'] != null)
                    <th
                      class="whitespace-nowrap  py-1 pl-4 pr-4 text-center text-sm font-semibold bg-indigo-500 text-white">
                      HAS./S
                    </th>
                  @endif
                  @if ($filters['previous_land_owner'] != false && $filters['previous_land_owner'] != null)
                    <th
                      class="whitespace-nowrap  py-1 pl-4 pr-4 text-center text-sm font-semibold bg-indigo-500 text-white">
                      LAND OWNER
                    </th>
                  @endif
                  @if ($filters['field_number'] != false && $filters['field_number'] != null)
                    <th
                      class="whitespace-nowrap  py-1 pl-4 pr-4 text-center text-sm font-semibold bg-indigo-500 text-white">
                      NUMBER
                    </th>
                  @endif
                  @if ($filters['location'] != false && $filters['location'] != null)
                    <th
                      class="whitespace-nowrap  py-1 pl-4 pr-4 text-center text-sm font-semibold bg-indigo-500 text-white">

                    </th>
                  @endif
                  @if ($filters['municipality'] != false && $filters['municipality'] != null)
                    <th
                      class="whitespace-nowrap  py-1 pl-4 pr-4 text-center text-sm font-semibold bg-indigo-500 text-white">

                    </th>
                  @endif
                  @if ($filters['title'] != false && $filters['title'] != null)
                    <th
                      class="whitespace-nowrap  py-1 pl-4 pr-4 text-center text-sm font-semibold bg-indigo-500 text-white">

                    </th>
                  @endif
                  @if ($filters['cloa_number'] != false && $filters['cloa_number'] != null)
                    <th
                      class="whitespace-nowrap  py-1 pl-4 pr-4 text-center text-sm font-semibold bg-indigo-500 text-white">
                      NUMBER
                    </th>
                  @endif
                  @if ($filters['page'] != false && $filters['page'] != null)
                    <th
                      class="whitespace-nowrap  py-1 pl-4 pr-4 text-center text-sm font-semibold bg-indigo-500 text-white">

                    </th>
                  @endif
                  @if ($filters['encumbered'] != false && $filters['encumbered'] != null)
                    <th
                      class="whitespace-nowrap  py-1 pl-4 pr-4 text-center text-sm font-semibold bg-indigo-500 text-white">
                      <div class="flex space-x-6">
                        <span>AREA</span>
                        <span>/</span>
                        <span>VARIANCE</span>
                      </div>
                    </th>
                  @endif
                  @if ($filters['previous_copy_of_title'] != false && $filters['previous_copy_of_title'] != null)
                    <th
                      class="whitespace-nowrap  py-1 pl-4 pr-4 text-center text-sm font-semibold bg-indigo-500 text-white">
                      <div class="flex space-x-6">
                        <span>TYPE OF TITLE</span>
                        <span>/</span>
                        <span>NO.</span>
                      </div>
                    </th>
                  @endif
                  @if ($filters['title_status'] != false && $filters['title_status'] != null)
                    <th
                      class="whitespace-nowrap  py-1 pl-4 pr-4 text-center text-sm font-semibold bg-indigo-500 text-white">

                    </th>
                  @endif
                  @if ($filters['title_copy'] != false && $filters['title_copy'] != null)
                    <th
                      class="whitespace-nowrap  py-1 pl-4 pr-4 text-center text-sm font-semibold bg-indigo-500 text-white">

                    </th>
                  @endif
                  @if ($filters['remarks'] != false && $filters['remarks'] != null)
                    <th
                      class="whitespace-nowrap  py-1 pl-4 pr-4 text-center text-sm font-semibold bg-indigo-500 text-white">

                    </th>
                  @endif
                  @if ($filters['status'] != false && $filters['status'] != null)
                    <th
                      class="whitespace-nowrap  py-1 pl-4 pr-4 text-center text-sm font-semibold bg-indigo-500 text-white">

                    </th>
                  @endif
                  @if ($filters['land_bank_amortization'] != false && $filters['land_bank_amortization'] != null)
                    <th
                      class="whitespace-nowrap  py-1 pl-4 pr-4 text-center text-sm font-semibold bg-indigo-500 text-white">

                    </th>
                  @endif
                  @if ($filters['amount'] != false && $filters['amount'] != null)
                    <th
                      class="whitespace-nowrap  py-1 pl-4 pr-4 text-center text-sm font-semibold bg-indigo-500 text-white">
                      PHP
                    </th>
                  @endif
                  @if ($filters['date_paid'] != false && $filters['date_paid'] != null)
                    <th
                      class="whitespace-nowrap  py-1 pl-4 pr-4 text-center text-sm font-semibold bg-indigo-500 text-white">
                      MONTHLY DAY YEAR
                    </th>
                  @endif
                  @if ($filters['date_of_cert'] != false && $filters['date_of_cert'] != null)
                    <th
                      class="whitespace-nowrap  py-1 pl-4 pr-4 text-center text-sm font-semibold bg-indigo-500 text-white">
                      MONTHLY DAY YEAR
                    </th>
                  @endif
                  @if ($filters['ndc_direct_payment_scheme'] != false && $filters['ndc_direct_payment_scheme'] != null)
                    <th
                      class="whitespace-nowrap  py-1 pl-4 pr-4 text-center text-sm font-semibold bg-indigo-500 text-white">
                      DIRECT PAYMENT SCHEME
                    </th>
                  @endif
                  @if ($filters['ndc_remarks'] != false && $filters['ndc_remarks'] != null)
                    <th
                      class="whitespace-nowrap  py-1 pl-4 pr-4 text-center text-sm font-semibold bg-indigo-500 text-white">

                    </th>
                  @endif
                  @if ($filters['notes'] != false && $filters['notes'] != null)
                    <th
                      class="whitespace-nowrap  py-1 pl-4 pr-4 text-center text-sm font-semibold bg-indigo-500 text-white">

                    </th>
                  @endif


                </tr> --}}
              @endif
            </thead>
            <tbody class="divide-y divide-gray-200 bg-white">
              @foreach ($records as $record)
                @php
                  $encumbered = $record->encumbered;
                  $encumbered_array = json_decode($encumbered, true);

                  $previous_copy_of_title = $record->previous_copy_of_title;
                  $previous_copy_of_title_array = json_decode($previous_copy_of_title, true);
                @endphp
                @if ($count < 1)
                  <tr class="divide-x divide-gray-200">

                    {{-- <td class=" py-4 pl-4 pr-4 text-sm  text-gray-700 ">
                      {{ $record->number }}</td> --}}
                    <td class=" p-4 text-sm text-gray-700 text-left"> {{ $record->lot_number }}</td>
                    <td class="p-4 text-sm text-gray-700 text-left">{{ $record->survey_number }}</td>
                    <td class=" py-4 pl-4 pr-4 text-sm text-gray-700 text-left uppercase ">{{ $record->title_area }}
                    </td>
                    <td class=" py-4 pl-4 pr-4 text-sm text-gray-700 text-left uppercase ">{{ $record->awarded_area }}
                    </td>
                    {{-- <td class=" py-4 pl-4 pr-4 text-sm text-gray-700 text-left uppercase ">
                      {{ $record->previous_land_owner }}</td> --}}
                    {{-- <td class=" py-4 pl-4 pr-4 text-sm text-gray-700 text-left uppercase ">{{ $record->field_number }}
                    </td> --}}
                    <td class=" py-4 pl-4 pr-4 text-sm text-gray-700 text-left uppercase ">{{ $record->location }}</td>
                    <td class=" py-4 pl-4 pr-4 text-sm text-gray-700 text-left uppercase ">{{ $record->municipality }}
                    </td>
                    {{-- <td class=" py-4 pl-4 pr-4 text-sm text-gray-700 text-left uppercase ">{{ $record->title }}</td> --}}
                    <td class=" py-4 pl-4 pr-4 text-sm text-gray-700 text-left uppercase ">{{ $record->cloa_number }}
                    </td>
                    {{-- <td class=" py-4 pl-4 pr-4 text-sm text-gray-700 text-left uppercase ">{{ $record->page }}</td> --}}
                    {{-- <td class=" py-4 pl-4 pr-4 text-sm text-gray-700 text-left uppercase ">
                      {{ $encumbered_array['area'] }} / {{ $encumbered_array['variance'] }}</td> --}}
                    <td class=" py-4 pl-4 pr-4 text-sm text-gray-700 text-left uppercase ">
                      {{ $previous_copy_of_title_array['no.'] }}
                    </td>
                    {{-- <td class=" py-4 pl-4 pr-4 text-sm text-gray-700 text-left uppercase ">{{ $record->title_status }}
                    </td>
                    <td class=" py-4 pl-4 pr-4 text-sm text-gray-700 text-left uppercase ">{{ $record->title_copy }}
                    </td>
                    <td class=" py-4 pl-4 pr-4 text-sm text-gray-700 text-left uppercase ">{{ $record->remarks }}</td>
                    <td class=" py-4 pl-4 pr-4 text-sm text-gray-700 text-left uppercase ">{{ $record->status }}</td>
                    <td class=" py-4 pl-4 pr-4 text-sm text-gray-700 text-left uppercase ">
                      {{ $record->land_bank_amortization }}</td>
                    <td class=" py-4 pl-4 pr-4 text-sm text-gray-700 text-left uppercase ">{{ $record->amount }}</td>
                    <td class=" py-4 pl-4 pr-4 text-sm text-gray-700 text-left uppercase ">{{ $record->date_paid }}
                    </td>
                    <td class=" py-4 pl-4 pr-4 text-sm text-gray-700 text-left uppercase ">{{ $record->date_of_cert }}
                    </td>
                    <td class=" py-4 pl-4 pr-4 text-sm text-gray-700 text-left uppercase ">
                      {{ $record->ndc_direct_payment_scheme }}</td>
                    <td class=" py-4 pl-4 pr-4 text-sm text-gray-700 text-left uppercase ">{{ $record->ndc_remarks }}
                    </td>
                    <td class=" py-4 pl-4 pr-4 text-sm text-gray-700 text-left uppercase ">{{ $record->notes }}</td> --}}

                  </tr>
                @elseif($count > 0)
                  <tr class="divide-x divide-gray-200">

                    @if ($filters['number'] != false && $filters['number'] != null)
                      <td class=" py-4 pl-4 pr-4 text-sm font-medium text-gray-900 ">
                        {{ $record->number }}</td>
                    @endif

                    @if ($filters['lot_number'] != false && $filters['lot_number'] != null)
                      <td class=" p-4 text-sm text-gray-700 text-left"> {{ $record->lot_number }}</td>
                    @endif
                    @if ($filters['survey_number'] != false && $filters['survey_number'] != null)
                      <td class="p-4 text-sm text-gray-700 text-left">{{ $record->survey_number }}</td>
                    @endif

                    @if ($filters['title_area'] != false && $filters['title_area'] != null)
                      <td class=" py-4 pl-4 pr-4 text-sm text-gray-700 text-left uppercase ">{{ $record->title_area }}
                      </td>
                    @endif

                    @if ($filters['awarded_area'] != false && $filters['awarded_area'] != null)
                      <td class=" py-4 pl-4 pr-4 text-sm text-gray-700 text-left uppercase ">
                        {{ $record->awarded_area }}
                      </td>
                    @endif

                    @if ($filters['previous_land_owner'] != false && $filters['previous_land_owner'] != null)
                      <td class=" py-4 pl-4 pr-4 text-sm text-gray-700 text-left uppercase ">
                        {{ $record->previous_land_owner }}</td>
                    @endif

                    @if ($filters['field_number'] != false && $filters['field_number'] != null)
                      <td class=" py-4 pl-4 pr-4 text-sm text-gray-700 text-left uppercase ">
                        {{ $record->field_number }}
                      </td>
                    @endif

                    @if ($filters['location'] != false && $filters['location'] != null)
                      <td class=" py-4 pl-4 pr-4 text-sm text-gray-700 text-left uppercase ">{{ $record->location }}
                      </td>
                    @endif
                    @if ($filters['municipality'] != false && $filters['municipality'] != null)
                      <td class=" py-4 pl-4 pr-4 text-sm text-gray-700 text-left uppercase ">
                        {{ $record->municipality }}
                      </td>
                    @endif

                    @if ($filters['title'] != false && $filters['title'] != null)
                      <td class=" py-4 pl-4 pr-4 text-sm text-gray-700 text-left uppercase ">{{ $record->title }}</td>
                    @endif

                    @if ($filters['cloa_number'] != false && $filters['cloa_number'] != null)
                      <td class=" py-4 pl-4 pr-4 text-sm text-gray-700 text-left uppercase ">
                        {{ $record->cloa_number }}
                      </td>
                    @endif
                    @if ($filters['page'] != false && $filters['page'] != null)
                      <td class=" py-4 pl-4 pr-4 text-sm text-gray-700 text-left uppercase ">{{ $record->page }}</td>
                    @endif
                    @if ($filters['encumbered'] != false && $filters['encumbered'] != null)
                      <td class=" py-4 pl-4 pr-4 text-sm text-gray-700 text-left uppercase ">
                        {{ $encumbered_array['area'] }} / {{ $encumbered_array['variance'] }}</td>
                    @endif
                    @if ($filters['encumbered_area'] != false && $filters['encumbered_area'] != null)
                    <td class=" py-4 pl-4 pr-4 text-sm text-gray-700 text-left uppercase ">
                      {{ $encumbered_array['area'] }}</td>
                    @endif
                    @if ($filters['encumbered_variance'] != false && $filters['encumbered_variance'] != null)
                    <td class=" py-4 pl-4 pr-4 text-sm text-gray-700 text-left uppercase ">
                        {{ $encumbered_array['variance'] }}</td>
                    @endif

                    @if ($filters['previous_copy_of_title'] != false && $filters['previous_copy_of_title'] != null)
                      <td class=" py-4 pl-4 pr-4 text-sm text-gray-700 text-left uppercase ">
                        {{ $previous_copy_of_title_array['type of title'] }} /
                        {{ $previous_copy_of_title_array['no.'] }}
                      </td>
                    @endif
                        @if ($filters['previous_copy_of_title_type'] != false && $filters['previous_copy_of_title_type'] != null)
                        <td class=" py-4 pl-4 pr-4 text-sm text-gray-700 text-left uppercase ">
                            @if ($previous_copy_of_title_array['type of title'] === "TCT")
                                Transfer Certificate Title (TCT)
                            @elseif ($previous_copy_of_title_array['type of title'] === "OCT")
                                Original Certificate Title (OCT)
                            @endif
                        </td>
                    @endif
                    @if ($filters['previous_copy_of_title_number'] != false && $filters['previous_copy_of_title_number'] != null)
                    <td class=" py-4 pl-4 pr-4 text-sm text-gray-700 text-left uppercase ">
                        {{ $previous_copy_of_title_array['no.'] }}
                    </td>
                    @endif
                    @if ($filters['title_status'] != false && $filters['title_status'] != null)
                      <td class=" py-4 pl-4 pr-4 text-sm text-gray-700 text-left uppercase ">
                        @if ($record->title_status === "TWC")
                        Title With Cloa (TWC)
                        @elseif ($record->title_status === "TWOC")
                        Title Without Cloa (TWOC)
                        @elseif ($record->title_status === "UWC")
                        Untitled With Cloa (UWC)
                        @elseif ($record->title_status === "UWOC")
                        Untitled Without Cloa (UWOC)
                        @endif
                        {{-- {{ $record->title_status }} --}}
                      </td>
                    @endif
                    @if ($filters['title_copy'] != false && $filters['title_copy'] != null)
                      <td class=" py-4 pl-4 pr-4 text-sm text-gray-700 text-left uppercase ">{{ $record->title_copy }}
                      </td>
                    @endif
                    @if ($filters['tax_dec_number'] != false && $filters['tax_dec_number'] != null)
                    <td class=" py-4 pl-4 pr-4 text-sm text-gray-700 text-left uppercase ">{{ $record->tax_dec_number }}
                    </td>
                    @endif

                    @if ($filters['remarks'] != false && $filters['remarks'] != null)
                      <td class=" py-4 pl-4 pr-4 text-sm text-gray-700 text-left uppercase ">{{ $record->remarks }}
                      </td>
                    @endif

                    @if ($filters['status'] != false && $filters['status'] != null)
                      <td class=" py-4 pl-4 pr-4 text-sm text-gray-700 text-left uppercase ">{{ $record->status }}
                      </td>
                    @endif
                    @if ($filters['land_bank_amortization'] != false && $filters['land_bank_amortization'] != null)
                      <td class=" py-4 pl-4 pr-4 text-sm text-gray-700 text-left uppercase ">
                        {{ $record->land_bank_amortization }}</td>
                    @endif

                    @if ($filters['amount'] != false && $filters['amount'] != null)
                      <td class=" py-4 pl-4 pr-4 text-sm text-gray-700 text-left uppercase ">{{ $record->amount }}
                      </td>
                    @endif

                    @if ($filters['date_paid'] != false && $filters['date_paid'] != null)
                      <td class=" py-4 pl-4 pr-4 text-sm text-gray-700 text-left uppercase ">{{ \Carbon\Carbon::parse($record->date_paid)->format('F d, Y') }}
                      </td>
                    @endif

                    @if ($filters['date_of_cert'] != false && $filters['date_of_cert'] != null)
                      <td class=" py-4 pl-4 pr-4 text-sm text-gray-700 text-left uppercase ">
                        {{ \Carbon\Carbon::parse($record->date_of_cert)->format('F d, Y') }}
                      </td>
                    @endif
                    @if ($filters['ndc_direct_payment_scheme'] != false && $filters['ndc_direct_payment_scheme'] != null)
                      <td class=" py-4 pl-4 pr-4 text-sm text-gray-700 text-left uppercase ">
                        {{ $record->ndc_direct_payment_scheme }}</td>
                    @endif

                    @if ($filters['ndc_remarks'] != false && $filters['ndc_remarks'] != null)
                      <td class=" py-4 pl-4 pr-4 text-sm text-gray-700 text-left uppercase ">
                        {{ $record->ndc_remarks }}
                      </td>
                    @endif

                    @if ($filters['notes'] != false && $filters['notes'] != null)
                      <td class=" py-4 pl-4 pr-4 text-sm text-gray-700 text-left uppercase ">{{ $record->notes }}</td>
                    @endif

                  </tr>
                @endif
              @endforeach

              <!-- More people... -->
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>



  {{-- <x-modal wire:model="add_modal">
    <x-card title="Consent Terms">
      <p class="text-gray-600">
        Lorem Ipsum...
      </p>

      <x-slot name="footer">
        <div class="flex justify-end gap-x-4">
          <x-button flat label="Cancel" x-on:click="close" />
          <x-button primary label="I Agree" />
        </div>
      </x-slot>
    </x-card>
  </x-modal> --}}

  @push('scripts')
    <script>
      function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
      }
    </script>


<script>
    document.addEventListener('livewire:load', function () {
        var myTable = document.getElementById('my-table');

        if (myTable) {
            Livewire.on('exportTableData', function () {
                var headers = Array.from(myTable.querySelectorAll('th')).map(function (header) {
                    return header.innerText.trim();
                });

                var tableData = Array.from(myTable.querySelectorAll('tbody tr')).map(function (row) {
                    return Array.from(row.querySelectorAll('td')).map(function (cell) {
                        return cell.innerText.trim();
                    });
                });

                tableData.unshift(headers); // Add headers as the first row

                var collectionData = tableData.map(function (row) {
                    var rowData = {};

                    headers.forEach(function (header, index) {
                        rowData[header] = row[index];
                    });

                    return rowData;
                });

                //var collection = collect(collectionData);
                //console.log(collectionData);
                Livewire.emit('tableDataExported', collectionData);
            });
        }
    });
</script>
  @endpush

</div>
