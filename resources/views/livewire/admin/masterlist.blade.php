<div>
  <x-button label="Add Land Owner" indigo wire:click="$set('add_modal', true)" spinner="$set('add_modal', true)" />


  <x-modal wire:model.defer="add_modal" align="center" max-width="6xl">
    <x-card title="NEW LAND OWNER">
      <div class="grid grid-cols-5 gap-4">
        <x-input wire:model="firstName" label="No." placeholder="" />
        <x-input wire:model="firstName" label="Lot No." placeholder="" />
        <x-input wire:model="firstName" label="Survey No." placeholder="" />
        <x-input wire:model="Title Area Has.S" label="Title Area Has.S" placeholder="" />
        <x-input wire:model="Title Area Has.S" label="Awarded Area Has.S" placeholder="" />
        <x-input wire:model="Title Area Has.S" label="Previous Land Owner" placeholder="" />
        <x-input wire:model="Title Area Has.S" label="Field No." placeholder="" />
        <x-input wire:model="Title Area Has.S" label="Location" placeholder="" />
        <x-input wire:model="Title Area Has.S" label="Municipality" placeholder="" />
        <x-input wire:model="Title Area Has.S" label="Title" placeholder="" />
        <x-input wire:model="Title Area Has.S" label="Cloa No." placeholder="" />
        <x-input wire:model="Title Area Has.S" label="Page" placeholder="" />
        <div class="col-span-5 border-y-2 py-3 border-gray-500">
          <h1>Encumbered</h1>
          <div class="grid grid-cols-4 gap-4 mt-1">
            <x-input wire:model="Title Area Has.S" label="Area" placeholder="" />
            <x-input wire:model="Title Area Has.S" label="Variance" placeholder="" />
            <x-input wire:model="Title Area Has.S" label="Previous copy of title type" placeholder="" />
            <x-input wire:model="Title Area Has.S" label="Previous copy of title no." placeholder="" />
          </div>
        </div>
        <x-input wire:model="Title Area Has.S" label="Title Status" placeholder="" />
        <x-input wire:model="Title Area Has.S" label="Title Copy" placeholder="" />
        <x-input wire:model="Title Area Has.S" label="Title Status" placeholder="" />
        <x-input wire:model="Title Area Has.S" label="Land Bank Amortization" placeholder="" />
        <div class="col-span-3">
          <x-textarea wire:model="comment" label="Remarks" placeholder="Your comment" />
        </div>
        <div class="col-span-2">
          <x-textarea wire:model="comment" label="Status" placeholder="Your comment" />
        </div>

        <x-input wire:model="Title Area Has.S" label="Amount" placeholder="" />
        <x-input wire:model="Title Area Has.S" label="Date Paid" placeholder="" />
        <x-input wire:model="Title Area Has.S" label="Date of Certificate" placeholder="" />
        <x-input wire:model="Title Area Has.S" label="NDC Direct Payment Scheme" placeholder="" />
        <div class="col-span-3">
          <x-textarea wire:model="comment" label="NDC Remarks" placeholder="Your comment" />
        </div>
        <div class="col-span-2">
          <x-textarea wire:model="comment" label="Notes" placeholder="Your comment" />
        </div>
      </div>

      <x-slot name="footer">
        <div class="flex justify-end gap-x-4">
          <x-button flat label="Cancel" x-on:click="close" />
          <x-button indigo right-icon="save-as" label="Save Owner" />
        </div>
      </x-slot>
    </x-card>
  </x-modal>
</div>
