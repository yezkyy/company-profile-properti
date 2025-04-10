@if (session('success') || session('error'))
    <div 
        x-data="{ show: true }" 
        x-init="setTimeout(() => show = false, 5000)" 
        x-show="show"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-3 scale-95"
        x-transition:enter-end="opacity-100 translate-y-0 scale-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0 scale-100"
        x-transition:leave-end="opacity-0 translate-y-2 scale-95"
        class="fixed top-6 right-6 z-50 w-full max-w-sm pointer-events-none">
        
        <div class="pointer-events-auto relative flex items-start gap-4 p-4 pr-6 rounded-xl border shadow-xl text-white
            {{ session('success') ? 'bg-green-600 border-green-700' : 'bg-red-600 border-red-700' }}">
            
            <!-- Icon -->
            <div class="flex items-center justify-center w-10 h-10 rounded-full bg-white/20 backdrop-blur-sm">
                @if (session('success'))
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                    </svg>
                @else
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                @endif
            </div>

            <!-- Message -->
            <div class="flex-1">
                <p class="text-sm font-medium leading-relaxed">
                    {{ session('success') ?? session('error') }}
                </p>
            </div>

            <!-- Close Button -->
            <button @click="show = false"
                class="absolute top-3 right-3 text-white/70 hover:text-white transition-all duration-150 ease-in-out">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>
@endif