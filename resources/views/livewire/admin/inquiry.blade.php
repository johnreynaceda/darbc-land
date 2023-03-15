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
        <x-checkbox label="LOT NO." wire:model.defer="filters.lot_number" />
      </div>
      <div class="border p-1 px-3 rounded">
        <x-checkbox id="right-label" label="SUREVY NO." wire:model.defer="filters.survey_number" />
      </div>
      <div class="border p-1 px-3 rounded">
        <x-checkbox id="right-label" label="TITLE AREA" wire:model.defer="filters.title_area" />
      </div>
      <div class="border p-1 px-3 rounded">
        <x-checkbox id="right-label" label="
        AWARDED-AREA" wire:model.defer="filters.awarded_area" />
      </div>
      <div class="border p-1 px-3 rounded">
        <x-checkbox id="right-label" label="PREVIOUS LAND OWNER" wire:model.defer="filters.previous_land_owner" />
      </div>
      <div class="border p-1 px-3 rounded">
        <x-checkbox id="right-label" label="
        FIELD" wire:model.defer="filters.field_number" />
      </div>
      <div class="border p-1 px-3 rounded">
        <x-checkbox id="right-label" label="LOCATION" wire:model.defer="filters.location" />
      </div>
      <div class="border p-1 px-3 rounded">
        <x-checkbox id="right-label" label="MUNICIPALITY" wire:model.defer="filters.municipality" />
      </div>
      <div class="border p-1 px-3 rounded">
        <x-checkbox id="right-label" label="TITTLE" wire:model.defer="filters.title" />
      </div>
      <div class="border p-1 px-3 rounded">
        <x-checkbox id="right-label" label="CLOA NO." wire:model.defer="filters.cloa_number" />
      </div>
      <div class="border p-1 px-3 rounded">
        <x-checkbox id="right-label" label="PAGE" wire:model.defer="filters.page" />
      </div>
      <div class="border p-1 px-3 rounded">
        <x-checkbox id="right-label" label="
            ENCONMBERED" wire:model.defer="filters.encumbered" />
      </div>
      <div class="border p-1 px-3 rounded">
        <x-checkbox id="right-label" label="
            AREA" wire:model.defer="filters.encumbered" />
      </div>
      <div class="border p-1 px-3 rounded">
        <x-checkbox id="right-label" label="
            VARIANCE" wire:model.defer="filters.encumbered" />
      </div>
      <div class="border p-1 px-3 rounded">
        <x-checkbox id="right-label" label="PREVIOUS COPY OF TITLE" wire:model.defer="filters.previous_copy_of_title" />
      </div>
      <div class="border p-1 px-3 rounded">
        <x-checkbox id="right-label" label="
            TITLE STATUS" wire:model.defer="filters.title_status" />
      </div>
      <div class="border p-1 px-3 rounded">
        <x-checkbox id="right-label" label="
            TITLE COPY" wire:model.defer="filters.title_copy" />
      </div>
      <div class="border p-1 px-3 rounded">
        <x-checkbox id="right-label" label="
            REMARKS" wire:model.defer="filters.remarks" />
      </div>
      <div class="border p-1 px-3 rounded">
        <x-checkbox id="right-label" label="
            STATUS" wire:model.defer="filters.status" />
      </div>
      <div class="border p-1 px-3 rounded">
        <x-checkbox id="right-label" label="
            AMORTIZATION" wire:model.defer="filters.land_bank_amortization" />
      </div>
      <div class="border p-1 px-3 rounded">
        <x-checkbox id="right-label" label="
            AMOUNT" wire:model.defer="filters.amount" />
      </div>
      <div class="border p-1 px-3 rounded">
        <x-checkbox id="right-label" label="
            DATE PAID" wire:model.defer="filters.date_paid" />
      </div>
      <div class="border p-1 px-3 rounded">
        <x-checkbox id="right-label" label="

            DATE OF CERT" wire:model.defer="filters.date_of_cert" />
      </div>
      <div class="border p-1 px-3 rounded">
        <x-checkbox id="right-label" label="
            NDC" wire:model.defer="filters.ndc_direct_payment_scheme" />
      </div>
    </div>

    <div class="mt-4">
      {{ $this->table }}
    </div>
  </div>



  <x-modal wire:model.defer="add_modal">
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
