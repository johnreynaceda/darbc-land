<div class="flex space-x-2">
    <x-button label="Print" icon="printer" dark sm class="font-bold uppercase"
      @click="printOut($refs.printContainer.outerHTML);" />
    <x-button label="Export" icon="document-text" positive sm class="font-bold uppercase" wire:click="exportCompromiseAgreement" />
  </div>
  <div class="mt-3 overflow-x-auto">
    <table id="example" class="table-auto mt-5" style="width:100%" x-ref="printContainer">
      <thead class="font-normal">
        <tr>
          <th class="border bg-indigo-700   text-center px-2 text-sm font-medium text-white py-2 whitespace-nowrap">
            LOT NO.
          </th>
          <th class="border bg-indigo-700   text-center px-2 text-sm font-medium text-white py-2 whitespace-nowrap">
            SURVEY NO.
            </th>
          <th class="border bg-indigo-700   text-center px-2 text-sm font-medium text-white py-2 whitespace-nowrap">
            TITLE AREA
          </th>
          <th class="border bg-indigo-700   text-center px-2 text-sm font-medium text-white py-2 whitespace-nowrap">
            FIELD NO.</th>
          <th class="border bg-indigo-700   text-center px-2 text-sm font-medium text-white py-2 whitespace-nowrap">
            BARANGAY</th>
          <th class="border bg-indigo-700   text-center px-2 text-sm font-medium text-white py-2 whitespace-nowrap">
            MUNICIPALITY
          </th>
          <th class="border bg-indigo-700   text-center px-2 text-sm font-medium text-white py-2 whitespace-nowrap">
            TITLE STATUS</th>
          <th class="border bg-indigo-700   text-center px-2 text-sm font-medium text-white py-2 whitespace-nowrap">
            REMARKS
          </th>
          <th class="border bg-indigo-700   text-center px-2 text-sm font-medium text-white py-2 whitespace-nowrap">
            STATUS
          </th>
        </tr>
      </thead>
      <tbody class="">
        @foreach ($compromise_agreement as $item)
          <tr>
            <td class="border text-gray-600  px-3 py-1">{{ $item->lot_number }}</td>
            <td class="border text-gray-600  px-3 py-1">{{ $item->survey_number ?? '' }}</td>
            <td class="border text-gray-600  px-3 py-1">{{ $item->title_area ?? '' }}</td>
            <td class="border text-gray-600  px-3 py-1">{{ $item->field_number ?? '' }}</td>
            <td class="border text-gray-600  px-3 py-1">{{ $item->location ?? '' }}</td>
            <td class="border text-gray-600  px-3 py-1">{{ $item->municipality ?? '' }}</td>
            <td class="border text-gray-600  px-3 py-1">{{ $item->title_status ?? '' }}</td>
            <td class="border text-gray-600  px-3 py-1">{{ $item->remarks ?? '' }}</td>
            <td class="border text-gray-600  px-3 py-1">{{ $item->status ?? '' }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
