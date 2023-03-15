<div class="">

  <div class="flow-root overflow-x-auto">
    <div class="">
      <div class="">
        <table class="min-w-full divide-y divide-gray-300">
          <thead>
            <tr class="divide-x divide-gray-200">
              <th scope="col" class="py-3 pl-4 pr-4 text-left text-sm font-semibold bg-indigo-500 text-white sm:pl-0">
                NO.
              </th>
              <th scope="col" class="px-4 py-3 text-left text-sm font-semibold bg-indigo-500 text-white">LOT#</th>
              <th scope="col" class="px-4 py-3 text-left text-sm font-semibold bg-indigo-500 text-white">SURVEY NO.
              </th>
              <th scope="col"
                class="py-3 pl-4 pr-4 text-left text-sm font-semibold bg-indigo-500 text-white sm:pr-0">TITLE AREA
              </th>
              <th scope="col"
                class="py-3 pl-4 pr-4 text-left text-sm font-semibold bg-indigo-500 text-white sm:pr-0">AWARDED AREA
              </th>
              <th scope="col"
                class="py-3 pl-4 pr-4 text-left text-sm font-semibold bg-indigo-500 text-white sm:pr-0">PREVIOUS
              </th>
              <th scope="col"
                class="py-3 pl-4 pr-4 text-left text-sm font-semibold bg-indigo-500 text-white sm:pr-0">FIELD
              </th>
              <th scope="col"
                class="py-3 pl-4 pr-4 text-left text-sm font-semibold bg-indigo-500 text-white sm:pr-0">LOCATION
              </th>
              <th scope="col"
                class="py-3 pl-4 pr-4 text-left text-sm font-semibold bg-indigo-500 text-white sm:pr-0">MUNICIPALITY
              </th>
              <th scope="col"
                class="py-3 pl-4 pr-4 text-left text-sm font-semibold bg-indigo-500 text-white sm:pr-0">TITLE
              </th>
              <th scope="col"
                class="py-3 pl-4 pr-4 text-left text-sm font-semibold bg-indigo-500 text-white sm:pr-0">CLOA NO.
              </th>
              <th scope="col"
                class="py-3 pl-4 pr-4 text-left text-sm font-semibold bg-indigo-500 text-white sm:pr-0">PAGE
              </th>
              <th scope="col"
                class="py-3 pl-4 pr-4 text-left text-sm font-semibold bg-indigo-500 text-white sm:pr-0">ENCUMBERED
              </th>
              <th scope="col"
                class="py-3 pl-4 pr-4 text-left text-sm font-semibold bg-indigo-500 text-white sm:pr-0">PREVIOUS COPY OF TITLE
              </th>
              <th scope="col"
                class="py-3 pl-4 pr-4 text-left text-sm font-semibold bg-indigo-500 text-white sm:pr-0">TITLE STATUS
              </th>
              <th scope="col"
                class="py-3 pl-4 pr-4 text-left text-sm font-semibold bg-indigo-500 text-white sm:pr-0">TITLE COPY
              </th>
              <th scope="col"
                class="py-3 pl-4 pr-4 text-left text-sm font-semibold bg-indigo-500 text-white sm:pr-0">REMARKS
              </th>
              <th scope="col"
                class="py-3 pl-4 pr-4 text-left text-sm font-semibold bg-indigo-500 text-white sm:pr-0">STATUS
              </th>
              <th scope="col"
                class="py-3 pl-4 pr-4 text-left text-sm font-semibold bg-indigo-500 text-white sm:pr-0">LAND BANK AMORTIZATION
              </th>
              <th scope="col"
                class="py-3 pl-4 pr-4 text-left text-sm font-semibold bg-indigo-500 text-white sm:pr-0">AMOUNT
              </th>
              <th scope="col"
                class="py-3 pl-4 pr-4 text-left text-sm font-semibold bg-indigo-500 text-white sm:pr-0">DATE PAID
              </th>
              <th scope="col"
                class="py-3 pl-4 pr-4 text-left text-sm font-semibold bg-indigo-500 text-white sm:pr-0">DATE OF CERT
              </th>
              <th scope="col"
                class="py-3 pl-4 pr-4 text-left text-sm font-semibold bg-indigo-500 text-white sm:pr-0">NDC DIRECT PAYMENT SCHEME
              </th>
              <th scope="col"
                class="py-3 pl-4 pr-4 text-left text-sm font-semibold bg-indigo-500 text-white sm:pr-0">NDC REMARKS
              </th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-200 bg-white">
            @foreach ($records as $record)
                @php
                    $encumbered = $record->encumbered;
                    $encumbered_array = json_decode($encumbered, true);

                    $previous_copy_of_title = $record->previous_copy_of_title;
                    $previous_copy_of_title_array = json_decode($previous_copy_of_title, true);
                @endphp
              <tr class="divide-x divide-gray-200">
                <td class="whitespace-nowrap py-4 pl-4 pr-4 text-sm font-medium text-gray-900 sm:pl-0">
                  {{ $record->number }}</td>
                <td class="whitespace-nowrap p-4 text-sm text-gray-500"> {{ $record->lot_number }}</td>
                <td class="whitespace-nowrap p-4 text-sm text-gray-500">{{ $record->survey_number }}</td>
                <td class="whitespace-nowrap py-4 pl-4 pr-4 text-sm text-gray-500 sm:pr-0">{{ $record->title_area }}</td>
                <td class="whitespace-nowrap py-4 pl-4 pr-4 text-sm text-gray-500 sm:pr-0">{{ $record->awarded_area }}</td>
                <td class="whitespace-nowrap py-4 pl-4 pr-4 text-sm text-gray-500 sm:pr-0">{{ $record->previous_land_owner }}</td>
                <td class="whitespace-nowrap py-4 pl-4 pr-4 text-sm text-gray-500 sm:pr-0">{{ $record->field_number }}</td>
                <td class="whitespace-nowrap py-4 pl-4 pr-4 text-sm text-gray-500 sm:pr-0">{{ $record->location }}</td>
                <td class="whitespace-nowrap py-4 pl-4 pr-4 text-sm text-gray-500 sm:pr-0">{{ $record->municipality }}</td>
                <td class="whitespace-nowrap py-4 pl-4 pr-4 text-sm text-gray-500 sm:pr-0">{{ $record->title }}</td>
                <td class="whitespace-nowrap py-4 pl-4 pr-4 text-sm text-gray-500 sm:pr-0">{{ $record->cloa_number }}</td>
                <td class="whitespace-nowrap py-4 pl-4 pr-4 text-sm text-gray-500 sm:pr-0">{{ $record->page }}</td>
                <td class="whitespace-nowrap py-4 pl-4 pr-4 text-sm text-gray-500 sm:pr-0">{{ $encumbered_array["area"] }} / {{ $encumbered_array["variance"] }}</td>
                <td class="whitespace-nowrap py-4 pl-4 pr-4 text-sm text-gray-500 sm:pr-0">{{ $previous_copy_of_title_array["type of title"] }} / {{ $previous_copy_of_title_array["no."] }}</td>
                <td class="whitespace-nowrap py-4 pl-4 pr-4 text-sm text-gray-500 sm:pr-0">{{ $record->title_status }}</td>
                <td class="whitespace-nowrap py-4 pl-4 pr-4 text-sm text-gray-500 sm:pr-0">{{ $record->title_copy }}</td>
                <td class="whitespace-nowrap py-4 pl-4 pr-4 text-sm text-gray-500 sm:pr-0">{{ $record->remarks }}</td>
                <td class="whitespace-nowrap py-4 pl-4 pr-4 text-sm text-gray-500 sm:pr-0">{{ $record->status }}</td>
                <td class="whitespace-nowrap py-4 pl-4 pr-4 text-sm text-gray-500 sm:pr-0">{{ $record->land_bank_amortization }}</td>
                <td class="whitespace-nowrap py-4 pl-4 pr-4 text-sm text-gray-500 sm:pr-0">{{ $record->amount }}</td>
                <td class="whitespace-nowrap py-4 pl-4 pr-4 text-sm text-gray-500 sm:pr-0">{{ $record->date_paid }}</td>
                <td class="whitespace-nowrap py-4 pl-4 pr-4 text-sm text-gray-500 sm:pr-0">{{ $record->date_of_cert }}</td>
                <td class="whitespace-nowrap py-4 pl-4 pr-4 text-sm text-gray-500 sm:pr-0">{{ $record->ndc_direct_payment_scheme }}</td>
                <td class="whitespace-nowrap py-4 pl-4 pr-4 text-sm text-gray-500 sm:pr-0">{{ $record->ndc_remarks }}</td>
                <td class="whitespace-nowrap py-4 pl-4 pr-4 text-sm text-gray-500 sm:pr-0">{{ $record->notes }}</td>
              </tr>
            @endforeach

            <!-- More people... -->
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
