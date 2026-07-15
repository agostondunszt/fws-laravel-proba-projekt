<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono&family=IBM+Plex+Sans&family=Space+Grotesk:wght@300;400;500;600;700&display=swap" rel="stylesheet">

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <header class="h-18.75 bg-white">
            <div class="flex items-center justify-between mx-48 py-4 px-10">
                <div class="font-space">
                    <span class="text-[#16161A] text-[21px] font-bold">FÉM</span><span class="text-[#6D48FF]">.</span>
                </div>
                <nav class="flex gap-8 font-ibmsans font-normal text-[12px] text-[#46464D] tracking-[1.2px]">
                    <a>Munkáink</a>
                    <a>Stúdió</a>
                    <a>Folyamat</a>
                </nav>
                <div>
                    <button class="font-ibmmono font-normal text-[12px] tracking-[0.96px] text-white bg-[#16161A] h-11 w-26">Kapcsolat</button>
                </div>
            </div>
        </header>
        <main>
            <section class="relative w-full max-w-[1920px] h-[780px] flex items-center overflow-hidden mx-auto px-48">
                <img src="{{ asset('storage/' . $hero->background_image) }}" 
                     alt="FÉM Hero" 
                     class="absolute inset-0 w-full h-full object-cover object-top z-0">

                <img src="{{ asset('storage/hero/gradient.png') }}" 
                     alt="Overlay" 
                     class="absolute inset-0 w-full h-full object-cover z-[1] opacity-100">

                <div class="relative z-10">
                    <h1 class="font-space text-[66px] font-bold max-w-200 text-[#FFFFFF] leading-none">{{ $hero->title }}</h1>
                    <div class="font-ibmsans text-[18px] text-white/76 max-w-140 tracking-[0.6px] pt-6">{{ $hero->description }}</div>
                    <div class="flex gap-4 mt-8">
                        <button class="bg-white text-[#16161A] font-ibmmono font-normal text-[12px] px-6 py-3 tracking-[0.96px]">Kezdjük a tervezést</button>
                        <button class="border border-white/40 text-white font-ibmmono font-normal text-[12px] px-4 py-3 tracking-[0.96px]">A stúdióról</button>
                    </div>
                </div>
            </section>
            <section>
                <div class="px-48 py-21">
                    <h2 class="text-[44px] text-[#16161A] font-space font-bold">Munkáink</h2>
                    <hr class="border-[#E4E4E0] mb-10">
                    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">
                        @foreach ($references as $reference)
                            <x-reference-card :reference="$reference" />
                        @endforeach
                    </div>
                </div>
            </section>
        </main>
        <footer class="bg-[#16161A]">
            <div class="px-58 pt-18">
                <div class="border-b border-white/12 flex justify-between pb-14">
                    <div class="flex-1 max-w-[640px]">
                        <div class="flex pb-6">
                            <div class="font-space text-[24px] font-bold text-white">FÉM</div><span class="font-space text-[#6D4BFF] font-bold">.</span>
                        </div>
                        <div class="text-[14.5px] text-[#8D8D96] font-ibmsans">
                            Ipari formatervező stúdió Budapesten.
                        </div>
                    </div>
                    <div class="flex-1 max-w-[360px]">
                        <div class="text-[#75757E] text-[11px] tracking-[1.54px] font-ibmmono pb-4">Menü</div>
                        <ul class="text-[#C2C2C8] text-[14.5px] font-ibmsans flex flex-col gap-4">
                            <li>Munkáink</li>
                            <li>Stúdió</li>
                            <li>Folyamat</li>
                            <li>Kapcsolat</li>
                        </ul>
                    </div>
                    <div class="flex-1 max-w-[360px]">
                        <div class="text-[#75757E] text-[11px] tracking-[1.54px] font-ibmmono pb-4">Kapcsolat</div>
                        <div class="text-[#C2C2C8] text-[14.5px] font-ibmsans">
                            <div>1061 Budapest Fém utca 99.</div>
                            <div>studio@fem.hu</div>
                            <div>+36 1 234 5678</div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-between py-7">
                    <div class="font-ibmmono text-[11.5px] tracking-[1.61px] text-[#75757E]">&copy; 2026 FÉM Stúdió — Minden jog fenntartva</div>
                    <div class="text-[#8D8D96] text-[11px] tracking-[0.88px] font-ibmmono flex gap-6">
                        <a>Adatvédelem</a>
                        <a>Impresszum</a>
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html>
