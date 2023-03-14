@section('title', 'Inquiry')
<x-main-layout>
  {{-- <livewire:admin.masterlist /> --}}
  <div>
    <h1 class="font-bold font-montserrat uppercase text-lg text-gray-700">Search</h1>
    <h1 class="text-gray-500 text-sm">
      You can search anything you like as long as the datails existed in the table columns
    </h1>
    <div class="grid grid-cols-4 gap-2 mt-4">
      <div class="border p-1 px-3 rounded">
        <x-checkbox id="right-label" label="N0." wire:model.defer="model" />
      </div>
      <div class="border p-1 px-3 rounded">
        <x-checkbox id="right-label" label="LOT NO." wire:model.defer="model" />
      </div>
      <div class="border p-1 px-3 rounded">
        <x-checkbox id="right-label" label="SUREVY NO." wire:model.defer="model" />
      </div>
      <div class="border p-1 px-3 rounded">
        <x-checkbox id="right-label" label="TITLE AREA" wire:model.defer="model" />
      </div>
      <div class="border p-1 px-3 rounded">
        <x-checkbox id="right-label" label="
AWARDED-AREA" wire:model.defer="model" />
      </div>
      <div class="border p-1 px-3 rounded">
        <x-checkbox id="right-label" label="PREVIOUS LAND OWNER" wire:model.defer="model" />
      </div>
      <div class="border p-1 px-3 rounded">
        <x-checkbox id="right-label" label="
FIELD" wire:model.defer="model" />
      </div>
      <div class="border p-1 px-3 rounded">
        <x-checkbox id="right-label" label="LOCATION" wire:model.defer="model" />
      </div>
      <div class="border p-1 px-3 rounded">
        <x-checkbox id="right-label" label="MUNICIPALITY" wire:model.defer="model" />
      </div>
      <div class="border p-1 px-3 rounded">
        <x-checkbox id="right-label" label="TITTLE" wire:model.defer="model" />
      </div>
      <div class="border p-1 px-3 rounded">
        <x-checkbox id="right-label" label="CLOA NO." wire:model.defer="model" />
      </div>
      <div class="border p-1 px-3 rounded">
        <x-checkbox id="right-label" label="PAGE" wire:model.defer="model" />
      </div>
      <div class="border p-1 px-3 rounded">
        <x-checkbox id="right-label" label="
ENCONMBERED" wire:model.defer="model" />
      </div>
      <div class="border p-1 px-3 rounded">
        <x-checkbox id="right-label" label="
AREA" wire:model.defer="model" />
      </div>
      <div class="border p-1 px-3 rounded">
        <x-checkbox id="right-label" label="
VARIANCE" wire:model.defer="model" />
      </div>
      <div class="border p-1 px-3 rounded">
        <x-checkbox id="right-label" label="PREVIOUSE COPY OF TITLE" wire:model.defer="model" />
      </div>
      <div class="border p-1 px-3 rounded">
        <x-checkbox id="right-label" label="
TITLE STATUS" wire:model.defer="model" />
      </div>
      <div class="border p-1 px-3 rounded">
        <x-checkbox id="right-label" label="
TITLE COPY" wire:model.defer="model" />
      </div>
      <div class="border p-1 px-3 rounded">
        <x-checkbox id="right-label" label="
REMARKS" wire:model.defer="model" />
      </div>
      <div class="border p-1 px-3 rounded">
        <x-checkbox id="right-label" label="
STATUS" wire:model.defer="model" />
      </div>
      <div class="border p-1 px-3 rounded">
        <x-checkbox id="right-label" label="
AMORTIZATION" wire:model.defer="model" />
      </div>
      <div class="border p-1 px-3 rounded">
        <x-checkbox id="right-label" label="
AMOUNT" wire:model.defer="model" />
      </div>
      <div class="border p-1 px-3 rounded">
        <x-checkbox id="right-label" label="
DATE PAID" wire:model.defer="model" />
      </div>
      <div class="border p-1 px-3 rounded">
        <x-checkbox id="right-label" label="

DATE OF CERT" wire:model.defer="model" />
      </div>
      <div class="border p-1 px-3 rounded">
        <x-checkbox id="right-label" label="
NDC" wire:model.defer="model" />
      </div>


    </div>
  </div>
</x-main-layout>
