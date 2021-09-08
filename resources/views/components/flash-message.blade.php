@props(['style' => session('style','success'),'message' => session('message')])

<div x-data="{{json_encode(['show' => true, 'style' => $style, 'message' => $message])}}" >
    <div x-show="show && message"
         style="display: none"
         x-init="
                document.addEventListener('flash-message', event => {
                    style = event.detail.style;
                    message = event.detail.message;
                    show = true;
                });
            "
    >
        <div class="max-w-screen-xl mx-auto">
            <div class="flex items-center justify-between flex-wrap bg-gray-100 py-2 px-4 rounded shadow border-b-2"
                :class="{ 'border-green-400': style == 'success', 'boder-red-400' : style === 'danger' }"
            >
                <div class="w-0 flex-1 flex items-center min-w-0">
                    <span class="flex p-2 rounded-lg rounded-full" :class="{ 'bg-green-500': style == 'success', 'bg-red-600': style == 'danger' }">
                        <svg x-show="style == 'success'"  class="h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                          </svg>
                        <svg x-show="style == 'danger'" class="h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <svg x-show="style != 'success' && style != 'danger'" class="h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </span>
    
                    <p class="ml-3 font-semibold text-sm text-gray-800 truncate" x-text="message"></p>
                </div>
                <div class="flex-shrink-0 sm:ml-3">
                    <button
                        type="button"
                        class="-mr-1 flex p-2 rounded-full focus:outline-none sm:-mr-2 transition"
                        aria-label="Dismiss"
                        x-on:click="show = false">
                        <svg class="h-5 w-5 text-white" :class="{'text-green-500': style == 'success', 'text-red-500' : style == 'danger'}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div> 
    </div>
</div>