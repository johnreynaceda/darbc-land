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
    <div class="grid grid-cols-4 gap-2 mt-4">
      <div class="border p-1 px-3 rounded">
        <x-checkbox label="N0." wire:model="filters.number" />
      </div>
      <div class="border p-1 px-3 rounded">
        <x-checkbox label="LOT NO." wire:model="filters.lot_number" />
      </div>
      <div class="border p-1 px-3 rounded">
        <x-checkbox id="right-label" label="SUREVY NO." wire:model="filters.survey_number" />
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
        FIELD" wire:model="filters.field_number" />
      </div>
      <div class="border p-1 px-3 rounded">
        <x-checkbox id="right-label" label="LOCATION" wire:model="filters.location" />
      </div>
      <div class="border p-1 px-3 rounded">
        <x-checkbox id="right-label" label="MUNICIPALITY" wire:model="filters.municipality" />
      </div>
      <div class="border p-1 px-3 rounded">
        <x-checkbox id="right-label" label="TITTLE" wire:model="filters.title" />
      </div>
      <div class="border p-1 px-3 rounded">
        <x-checkbox id="right-label" label="CLOA NO." wire:model="filters.cloa_number" />
      </div>
      <div class="border p-1 px-3 rounded">
        <x-checkbox id="right-label" label="PAGE" wire:model="filters.page" />
      </div>
      <div class="border p-1 px-3 rounded">
        <x-checkbox id="right-label" label="
            ENCUMBERED" wire:model="filters.encumbered" />
      </div>
      {{-- <div class="border p-1 px-3 rounded">
        <x-checkbox id="right-label" label="
            AREA" wire:model="filters.encumbered" />
      </div>
      <div class="border p-1 px-3 rounded">
        <x-checkbox id="right-label" label="
            VARIANCE" wire:model="filters.encumbered" />
      </div> --}}
      <div class="border p-1 px-3 rounded">
        <x-checkbox id="right-label" label="PREVIOUS COPY OF TITLE" wire:model="filters.previous_copy_of_title" />
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
            REMARKS" wire:model="filters.remarks" />
      </div>
      <div class="border p-1 px-3 rounded">
        <x-checkbox id="right-label" label="
            STATUS" wire:model="filters.status" />
      </div>
      <div class="border p-1 px-3 rounded">
        <x-checkbox id="right-label" label="
            AMORTIZATION" wire:model="filters.land_bank_amortization" />
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
</div>
