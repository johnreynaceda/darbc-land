<div>
     <div class="px-5">
        <div class="flex space-x-4 items-center">
           </div>
           <div class="mt-2 h-72 overflow-y-auto">
          <div class="py-2">
            <div class="">
                <x-button emerald icon="arrow-left" wire:click="returnToView" label="Back" class="mb-3"/>
            </div>
            <span class="font-semibold text-sm text-gray-600">{{$type}}</span>
             @if ($basicInfo->attachments->where('document_type', $type)->count() == 0)
                     <ul role="list" class="divide-y divide-gray-100 rounded-md border border-gray-200">
                      <li class="flex items-center justify-between py-4 pl-4 pr-5 text-sm leading-6">
                       <div class="flex w-0 flex-1 items-center">
                       <svg class="h-5 w-5 flex-shrink-0 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                     </svg>
                    <div class="ml-4 flex min-w-0 flex-1 gap-2">
                    <span class="truncate font-medium">No Attachment</span>
                    </div>
                   </div>
                  </li>
                 </ul>
            @else
            @foreach($basicInfo->attachments->where('document_type', $type) as $attachment)
            <ul role="list" class="divide-y divide-gray-100 rounded-md border border-gray-200">
            <li class="flex items-center justify-between py-4 pl-4 pr-5 text-sm leading-6">
            <div class="flex w-0 flex-1 items-center">
            <svg class="h-5 w-5 flex-shrink-0 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
             <path fill-rule="evenodd" d="M15.621 4.379a3 3 0 00-4.242 0l-7 7a3 3 0 004.241 4.243h.001l.497-.5a.75.75 0 011.064 1.057l-.498.501-.002.002a4.5 4.5 0 01-6.364-6.364l7-7a4.5 4.5 0 016.368 6.36l-3.455 3.553A2.625 2.625 0 119.52 9.52l3.45-3.451a.75.75 0 111.061 1.06l-3.45 3.451a1.125 1.125 0 001.587 1.595l3.454-3.553a3 3 0 000-4.242z" clip-rule="evenodd" />
            </svg>
            <div class="ml-4 flex min-w-0 flex-1 gap-2">
            <span class="truncate font-medium">{{$attachment->document_name}}</span>
            </div>
            </div>
            <div class="ml-4 flex-shrink-0">
            <div class="flex space-x-3">
            <a href="{{ $this->getFileUrl($attachment->path) }}" x-data="{}" target='_blank' class="">
            <svg class="h-5 w-5 flex-shrink-0 text-indigo-800 font-medium" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
            </a>
            <button wire:click="deleteAttachment({{ $attachment->id }})">
            <svg  class="h-5 w-5 flex-shrink-0 font-medium text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
           </svg>
          </button>
         </div>
        </div>
        </li>
        </ul>
        @endforeach
        @endif
        </div>

     </div>
     </div>
</div>
