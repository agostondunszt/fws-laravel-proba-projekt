@props(['reference'])

<div class="flex flex-col group w-[366px] max-w-full shrink-0">
    <div class="w-full h-70 overflow-hidden mb-4 bg-gray-100 flex items-center justify-center">
        <img src="{{ asset('storage/' . $reference->image_path) }}" 
             alt="{{ $reference->title }}" 
             class="w-full h-full object-cover">
    </div>
    
    <div class="font-ibmmono text-[11px] tracking-[0.66px] text-[#7C7C84]">
        {{ \Carbon\Carbon::parse($reference->project_date)->format('Y.m.d') }}
    </div>
    
    <h3 class="text-[19px] font-space font-medium text-[#16161A] mt-2 truncate w-full">
        {{ $reference->title }}
    </h3>
</div>