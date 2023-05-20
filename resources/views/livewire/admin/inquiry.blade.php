<div>
  <div>
    <div class="flex justify-between">
      <div>
        <h1 class="font-bold font-montserrat uppercase text-lg text-gray-700">Search</h1>
        <h1 class="text-gray-500 text-sm">
          You can search anything you like as long as the datails existed in the table columns
        </h1>
      </div>
    </div>
    <div class="mt-4">
      {{ $this->table }}
    </div>
  </div>

  <x-modal wire:model="add_modal">
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
  </x-modal>

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
  @endpush

</div>
