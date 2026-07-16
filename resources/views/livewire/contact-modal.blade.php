<div x-data="{ show: @entangle('show') }">
    <button @click="show = true" class="font-ibmmono font-normal text-[12px] tracking-[0.96px] text-white bg-[#16161A] h-11 w-26 hover:bg-[#101010] cursor-pointer">
        Kapcsolat
    </button>

    <div x-show="show" 
         x-transition.opacity.duration.300ms
         class="fixed inset-0 z-50 flex items-center justify-center bg-black/50" 
         x-cloak>
         
        <div @click.away="show = false" 
             x-show="show"
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 scale-95 translate-y-4"
             x-transition:enter-end="opacity-100 scale-100 translate-y-0"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 scale-100 translate-y-0"
             x-transition:leave-end="opacity-0 scale-95 translate-y-4"
             class="bg-white p-8 w-full max-w-md shadow-xl">
             
            <h2 class="text-xl font-bold mb-4 font-space">Kapcsolat</h2>
            
            <form wire:submit.prevent="submit" class="flex flex-col gap-4">
                <input wire:model="name" type="text" placeholder="Név" class="border border-[#16161A] p-2">
                @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror

                <input wire:model="email" type="email" placeholder="Email" class="border border-[#16161A] p-2">
                @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror

                <textarea wire:model="message" placeholder="Üzenet" class="border border-[#16161A] p-2"></textarea>
                @error('message') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror

                <button type="submit" class="font-ibmmono font-normal text-[12px] tracking-[0.96px] text-white bg-[#16161A] py-2 hover:bg-[#101010] cursor-pointer">Küldés</button>
            </form>
        </div>
    </div>
</div>