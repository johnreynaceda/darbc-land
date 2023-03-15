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
                class="py-3 pl-4 pr-4 text-left text-sm font-semibold bg-indigo-500 text-white sm:pr-0">Role
              </th>
              <th scope="col"
                class="py-3 pl-4 pr-4 text-left text-sm font-semibold bg-indigo-500 text-white sm:pr-0">Role
              </th>
              <th scope="col"
                class="py-3 pl-4 pr-4 text-left text-sm font-semibold bg-indigo-500 text-white sm:pr-0">Role
              </th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-200 bg-white">
            @foreach ($records as $record)
              <tr class="divide-x divide-gray-200">
                <td class="whitespace-nowrap py-4 pl-4 pr-4 text-sm font-medium text-gray-900 sm:pl-0">
                  {{ $record->number }}</td>
                <td class="whitespace-nowrap p-4 text-sm text-gray-500"> {{ $record->lot_number }}</td>
                <td class="whitespace-nowrap p-4 text-sm text-gray-500">lindsay.walton@example.com</td>
                <td class="whitespace-nowrap py-4 pl-4 pr-4 text-sm text-gray-500 sm:pr-0">Member</td>
                <td class="whitespace-nowrap py-4 pl-4 pr-4 text-sm text-gray-500 sm:pr-0">Member</td>
                <td class="whitespace-nowrap py-4 pl-4 pr-4 text-sm text-gray-500 sm:pr-0">Member</td>
                <td class="whitespace-nowrap py-4 pl-4 pr-4 text-sm text-gray-500 sm:pr-0">Member</td>
                <td class="whitespace-nowrap py-4 pl-4 pr-4 text-sm text-gray-500 sm:pr-0">Member</td>
                <td class="whitespace-nowrap py-4 pl-4 pr-4 text-sm text-gray-500 sm:pr-0">Member</td>
              </tr>
            @endforeach

            <!-- More people... -->
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
