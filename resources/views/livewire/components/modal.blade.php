<div>
@if($isOpen)
  <div class="fixed z-10 inset-0 overflow-y-auto">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
      <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" wire:click="close"></div>

    <!-- This element is to trick the browser into centering the modal contents. -->
    {{--<span class="hidden sm:inline-block sm:align-middle sm:h-screen">&#8203;</span> --}}

      <div class="inline-block {{$modalSize}} w-9/12 align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle ">
        @livewire($type, compact('params'))
      </div>
    </div>
 </div>
@endif
</div>
