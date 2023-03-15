<div>
  <x-button label="Add Land Owner" indigo wire:click="$set('add_modal', true)" spinner="$set('add_modal', true)" />

  <div class="mt-4">
    {{ $this->table }}
  </div>

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
