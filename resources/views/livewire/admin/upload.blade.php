<div>
    <x-button label="Reset"  dark sm wire:click="resetRemarks"/>
    <div class="border p-2">
        <h1>Basic Information</h1>
        <input type="file" wire:model="basic_information" />
        <x-button label="Upload" icon="upload" dark sm wire:click="uploadBasicInformation"/>
    </div>
    <div class="border p-2">
        <h1>Lot Amortization</h1>
        <input type="file" wire:model="amortization" />
        <x-button label="Upload" icon="upload" dark sm wire:click="uploadLot"/>
    </div>
    <div class="border p-2">
        <h1>Tax</h1>
        <input type="file" wire:model="tax" />
        <x-button label="Upload" icon="upload" dark sm wire:click="uploadTax"/>
    </div>
    <div class="border p-2">
        <h1>Actual</h1>
        <input type="file" wire:model="actual" />
        <x-button label="Upload" icon="upload" dark sm wire:click="uploadActual"/>
    </div>
</div>
