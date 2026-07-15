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
                <div>
                    <span class="font-space">Fém</span><span>.</span>
                </div>
                <nav class="flex gap-8 font-ibmsans font-normal text-12 text-[#46464D] tracking-[1.2px]">
                    <a>Munkáink</a>
                    <a>Stúdió</a>
                    <a>Folyamat</a>
                </nav>
                <div class="font-ibmmono font-normal text-12 tracking-[0.96px]">
                    <button>Kapcsolat</button>
                </div>
            </div>
        </header>
        <main>
            <section>
                <div>
                    <div>Tárgyak, amelyek kiállják az idő próbáját</div>
                    <div>Letisztult ipari formatervezés a koncepciótól a sorozatgyártásig - felesleges díszítés nélkül.</div>
                    <div class="flex">
                        <button>Kezdjük a tervezést</button>
                        <button>A stúdióról</button>
                    </div>
                </div>
            </section>
            <section>
                <div>
                    <h2>Munkáink</h2>
                    <hr>
                    <!-- TODO: iterálni a képeken majd backendből, egyelőre placeholder -->
                    <div>
                        <img alt="kép alt">
                        <div>dátum</div>
                        <div>cím</div>
                    </div>
                </div>
            </section>
        </main>
        <footer>
            <div>
                <div>
                    <div>teszt</div>
                    <div>teszt</div>
                    <div>teszt</div>
                </div>
                <div>
                    <div>2026 fém stúdió</div>
                    <div>
                        <a>Adatvédelem</a>
                        <a>Impresszum</a>
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html>
