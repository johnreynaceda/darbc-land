<div x-data>
  <div class="div mb-5 flex space-x-2 items-end">
    <div class="w-64">
      <x-native-select label="Select Report" wire:model="report">
        <option value="1">Actual</option>
        <option value="2">Tax</option>
      </x-native-select>
    </div>
    <x-button.circle icon="refresh" positive spinner="report" />
  </div>

  @if ($report == 1)
    <div class="flex space-x-2">
      <x-button label="Print" icon="printer" dark sm class="font-bold uppercase"
        @click="printOut($refs.printContainer.outerHTML);" />
      <x-button label="Export" icon="document-text" positive sm class="font-bold uppercase" wire:click="exportActual" />
    </div>
    <div class="mt-3 overflow-x-auto">
      <table id="example" class="table-auto mt-5" style="width:100%" x-ref="printContainer">
        <thead class="font-normal">
          <tr>

            <th class="border bg-indigo-700   text-center px-2 text-sm font-medium text-white py-2 whitespace-nowrap">
              NO.
            </th>
            <th class="border bg-indigo-700   text-center px-2 text-sm font-medium text-white py-2 whitespace-nowrap">
              LOT
              #</th>
            <th class="border bg-indigo-700   text-center px-2 text-sm font-medium text-white py-2 whitespace-nowrap">
              SURVEY #</th>
            <th class="border bg-indigo-700   text-center px-2 text-sm font-medium text-white py-2 whitespace-nowrap">
              PREVIOUS</th>
            <th class="border bg-indigo-700   text-center px-2 text-sm font-medium text-white py-2 whitespace-nowrap">
              FIELD</th>
            <th class="border bg-indigo-700   text-center px-2 text-sm font-medium text-white py-2 whitespace-nowrap">
              MUNICIPALITY
            </th>
            <th class="border bg-indigo-700   text-center px-2 text-sm font-medium text-white py-2 whitespace-nowrap">
              TITLE</th>
            <th class="border bg-indigo-700   text-center px-2 text-sm font-medium text-white py-2 whitespace-nowrap">
              CLOA
            </th>
            <th class="border bg-indigo-700   text-center px-2 text-sm font-medium text-white py-2 whitespace-nowrap">
              PREVIOUS COPY
              OF
              TITLE</th>
            <th class="border bg-indigo-700   text-center px-2 text-sm font-medium text-white py-2 whitespace-nowrap">
              PAGE
            </th>
            <th class="border bg-indigo-700   text-center px-2 text-sm font-medium text-white py-2 whitespace-nowrap">
              TITLE STATUS
            </th>
            <th class="border bg-indigo-700   text-center px-2 text-sm font-medium text-white py-2 whitespace-nowrap">
              TITLE AREA</th>
            <th class="border bg-indigo-700   text-center px-2 text-sm font-medium text-white py-2 whitespace-nowrap">
              LAND
            </th>
            <th class="border bg-indigo-700   text-center px-2 text-sm font-medium text-white py-2 whitespace-nowrap">
              DOLE
              PHIL</th>
            <th class="border bg-indigo-700   text-center px-2 text-sm font-medium text-white py-2 whitespace-nowrap">
              MANAGE BY</th>
            <th class="border bg-indigo-700   text-center px-2 text-sm font-medium text-white py-2 whitespace-nowrap">
              OTHER AREA</th>
            <th class="border bg-indigo-700   text-center px-2 text-sm font-medium text-white py-2 whitespace-nowrap">
              STATUS</th>
            <th class="border bg-indigo-700   text-center px-2 text-sm font-medium text-white py-2 whitespace-nowrap">
              REMARKS</th>
            <th class="border bg-indigo-700   text-center px-2 text-sm font-medium text-white py-2 whitespace-nowrap">
              GROSS AREA</th>
            <th class="border bg-indigo-700   text-center px-2 text-sm font-medium text-white py-2 whitespace-nowrap">
              PLANTED</th>
            <th class="border bg-indigo-700   text-center px-2 text-sm font-medium text-white py-2 whitespace-nowrap">
              GULLEY</th>
            <th class="border bg-indigo-700   text-center px-2 text-sm font-medium text-white py-2 whitespace-nowrap">
              TOTAL</th>
            <th class="border bg-indigo-700   text-center px-2 text-sm font-medium text-white py-2 whitespace-nowrap">
              FACILTY</th>
            <th class="border bg-indigo-700   text-center px-2 text-sm font-medium text-white py-2 whitespace-nowrap">
              UNUTILIZED</th>
            <th class="border bg-indigo-700   text-center px-2 text-sm font-medium text-white py-2 whitespace-nowrap">
              PORTION FIELD
            </th>
          </tr>
          <tr>
            <th class="border bg-indigo-700   text-center px-2 text-sm font-medium text-white py-2 whitespace-nowrap">
            </th>
            <th class="border bg-indigo-700   text-center px-2 text-sm font-medium text-white py-2 whitespace-nowrap">
            </th>
            <th class="border bg-indigo-700   text-center px-2 text-sm font-medium text-white py-2 whitespace-nowrap">
            </th>
            <th class="border bg-indigo-700   text-center px-2 text-sm font-medium text-white py-2 whitespace-nowrap">
              LAND
              OWNER</th>
            <th class="border bg-indigo-700   text-center px-2 text-sm font-medium text-white py-2 whitespace-nowrap">
              NO.
            </th>
            <th class="border bg-indigo-700   text-center px-2 text-sm font-medium text-white py-2 whitespace-nowrap">
            </th>
            <th class="border bg-indigo-700   text-center px-2 text-sm font-medium text-white py-2 whitespace-nowrap">
            </th>
            <th class="border bg-indigo-700   text-center px-2 text-sm font-medium text-white py-2 whitespace-nowrap">
              NO.
            </th>
            <th class="border bg-indigo-700   text-center px-2 text-sm font-medium text-white py-2 whitespace-nowrap">
              TYPE
              OF TITLE /
              NO.</th>
            <th class="border bg-indigo-700   text-center px-2 text-sm font-medium text-white py-2 whitespace-nowrap">
            </th>
            <th class="border bg-indigo-700   text-center px-2 text-sm font-medium text-white py-2 whitespace-nowrap">
            </th>
            <th class="border bg-indigo-700   text-center px-2 text-sm font-medium text-white py-2 whitespace-nowrap">
              HA./S</th>
            <th class="border bg-indigo-700   text-center px-2 text-sm font-medium text-white py-2 whitespace-nowrap">
              STATUS</th>
            <th class="border bg-indigo-700   text-center px-2 text-sm font-medium text-white py-2 whitespace-nowrap">
              LEASED</th>
            <th class="border bg-indigo-700   text-center px-2 text-sm font-medium text-white py-2 whitespace-nowrap">
              DARBC GROWER
            </th>
            <th class="border bg-indigo-700   text-center px-2 text-sm font-medium text-white py-2 whitespace-nowrap">
              OWNED BY DARBC
              BUT
              NOT PLANTED BY DOLE PHIL</th>
            <th class="border bg-indigo-700   text-center px-2 text-sm font-medium text-white py-2 whitespace-nowrap">
            </th>
            <th class="border bg-indigo-700   text-center px-2 text-sm font-medium text-white py-2 whitespace-nowrap">
            </th>
            <th class="border bg-indigo-700   text-center px-2 text-sm font-medium text-white py-2 whitespace-nowrap">
            </th>
            <th class="border bg-indigo-700   text-center px-2 text-sm font-medium text-white py-2 whitespace-nowrap">
              AREA
            </th>
            <th class="border bg-indigo-700   text-center px-2 text-sm font-medium text-white py-2 whitespace-nowrap">
              AREA
            </th>
            <th class="border bg-indigo-700   text-center px-2 text-sm font-medium text-white py-2 whitespace-nowrap">
              AREA
            </th>
            <th class="border bg-indigo-700   text-center px-2 text-sm font-medium text-white py-2 whitespace-nowrap">
              AREA
            </th>
            <th class="border bg-indigo-700   text-center px-2 text-sm font-medium text-white py-2 whitespace-nowrap">
              AREA
            </th>
            <th class="border bg-indigo-700   text-center px-2 text-sm font-medium text-white py-2 whitespace-nowrap">
              AREA
            </th>
          </tr>
        </thead>
        <tbody class="">
          @foreach ($actuals as $item)
            <tr>
              <td class="border text-gray-600  px-3 py-1">{{ $item->number }}</td>
              <td class="border text-gray-600  px-3 py-1">{{ $item->basic_information->lot_number ?? '' }}</td>
              <td class="border text-gray-600  px-3 py-1">{{ $item->basic_information->survey_number ?? '' }}</td>
              <td class="border text-gray-600  px-3 py-1">{{ $item->basic_information->previous_land_owner ?? '' }}</td>
              <td class="border text-gray-600  px-3 py-1">{{ $item->basic_information->field_number ?? '' }}</td>
              <td class="border text-gray-600  px-3 py-1">{{ $item->basic_information->municipality ?? '' }}</td>
              <td class="border text-gray-600  px-3 py-1">{{ $item->basic_information->title ?? '' }}</td>
              <td class="border text-gray-600  px-3 py-1">{{ $item->basic_information->cloa_number ?? '' }}</td>
              @php
                
                $previous_copy_of_title = $item->basic_information->previous_copy_of_title ?? '';
                $previous_copy_of_title_array = json_decode($previous_copy_of_title, true);
              @endphp
              <td class="border text-gray-600  px-3 py-1">
                {{ $previous_copy_of_title_array['type of title'] ?? '' }} /
                {{ $previous_copy_of_title_array['no.'] ?? '' }}
              </td>
              <td class="border text-gray-600  px-3 py-1">{{ $item->basic_information->page_number ?? '' }}</td>
              <td class="border text-gray-600  px-3 py-1">{{ $item->basic_information->title_status ?? '' }}</td>
              <td class="border text-gray-600  px-3 py-1">{{ $item->basic_information->title_area ?? '' }}</td>
              <td class="border text-gray-600  px-3 py-1">{{ $item->basic_information->status ?? '' }}</td>
              <td class="border text-gray-600  px-3 py-1">{{ $item->dolephil_leased }}</td>
              <td class="border text-gray-600  px-3 py-1">{{ $item->darbc_grower }}</td>
              <td class="border text-gray-600  px-3 py-1">{{ $item->owned_but_not_planted }}</td>
              <td class="border text-gray-600  px-3 py-1">{{ $item->status }}</td>
              <td class="border text-gray-600  px-3 py-1">{{ $item->remarks }}</td>
              <td class="border text-gray-600  px-3 py-1">{{ $item->gross_area }}</td>
              <td class="border text-gray-600  px-3 py-1">{{ $item->planted_area }}</td>
              <td class="border text-gray-600  px-3 py-1">{{ $item->gulley_area }}</td>
              <td class="border text-gray-600  px-3 py-1">{{ $item->total_area }}</td>
              <td class="border text-gray-600  px-3 py-1">{{ $item->facility_area }}</td>
              <td class="border text-gray-600  px-3 py-1">{{ $item->unutilized_area }}</td>
              @php
                
                $portion = $item->portion_field_areas ?? '';
                $portion_field_areas = json_decode($portion, true);
              @endphp
              <td class="border text-gray-600  px-3 py-1">
                {{ $portion_field_areas['1'] ?? '' }} /
                {{ $portion_field_areas['2'] ?? '' }}
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  @else
    sdsdsd
  @endif

</div>
