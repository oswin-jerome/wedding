<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>{{ $project->name ?? 'Banner' }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600|playfair-display:400,500,600" rel="stylesheet" />

        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif

        <style>
            .banner-sans {
                font-family: "Instrument Sans", ui-sans-serif, system-ui, sans-serif;
            }

            .banner-serif {
                font-family: "Playfair Display", ui-serif, Georgia, Cambria, "Times New Roman", Times, serif;
            }

            .carousel {
                scrollbar-width: none;
            }

            .carousel::-webkit-scrollbar {
                display: none;
            }

            .slide {
                scroll-snap-align: start;
            }

            @media (prefers-reduced-motion: reduce) {
                .banner-autoscroll {
                    scroll-behavior: auto !important;
                }
            }
        </style>
    </head>

    <body class="banner-sans min-h-screen bg-linear-to-br from-[#fff2f2] via-[#FDFDFC] to-[#F3BEC7]/35 dark:from-[#1D0002] dark:via-[#0a0a0a] dark:to-[#4B0600]/25 text-[#1b1b18] px-6 py-10">
        <div class="max-w-5xl mx-auto">
            <header class="flex items-center justify-between gap-4 mb-8">
                <a
                    href="{{ url('/' . $project->code) }}"
                    class="inline-flex items-center gap-2 text-sm underline underline-offset-4 hover:text-gray-700 dark:hover:text-gray-200"
                >
                    <span aria-hidden="true">←</span>
                    <span>Back to page</span>
                </a>

                <div class="text-sm text-gray-600 dark:text-gray-400">
                    Code: <span class="font-semibold">{{ $project->code }}</span>
                </div>
            </header>

            <div class="mb-6 text-center">
                <p class="uppercase tracking-wider text-sm text-gray-600 dark:text-gray-400 mb-2">Photo Banner</p>
                <h1 class="banner-serif text-3xl sm:text-4xl font-semibold tracking-tight">
                    {{ $project->name }}
                </h1>
            </div>

            @php
                $media = $project->getMedia('project_files');
            @endphp

            @if ($media->isEmpty())
                <div class="text-center text-gray-600 dark:text-gray-400">
                    No photos uploaded yet.
                </div>
            @else
                <div class="relative">
                    <button
                        id="carouselPrev"
                        type="button"
                        class="absolute left-0 top-1/2 -translate-y-1/2 z-10 inline-flex items-center justify-center w-10 h-10 rounded-md bg-white/80 dark:bg-[#161615]/80 hover:bg-white dark:hover:bg-[#161615] border border-gray-200 dark:border-gray-700"
                        aria-label="Previous photo"
                    >
                        ‹
                    </button>

                    <button
                        id="carouselNext"
                        type="button"
                        class="absolute right-0 top-1/2 -translate-y-1/2 z-10 inline-flex items-center justify-center w-10 h-10 rounded-md bg-white/80 dark:bg-[#161615]/80 hover:bg-white dark:hover:bg-[#161615] border border-gray-200 dark:border-gray-700"
                        aria-label="Next photo"
                    >
                        ›
                    </button>

                    <div
                        id="bannerCarousel"
                        class="carousel banner-autoscroll flex gap-4 overflow-x-auto scroll-smooth snap-x snap-mandatory pb-3"
                        aria-label="Scrolling photo carousel"
                    >
                        @foreach ($media as $item)
                            <div class="slide flex-none w-[320px] sm:w-[480px]">
                                <div class="overflow-hidden rounded-lg border border-gray-200/70 dark:border-gray-700 bg-white/60 dark:bg-[#161615]/60">
                                    <div class="aspect-16/10">
                                        <img
                                            src="{{ $item->getUrl('thumb') }}"
                                            alt="{{ $item->name }}"
                                            class="w-full h-full object-cover transition-transform duration-300 hover:scale-[1.03]"
                                            loading="lazy"
                                        >
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="mt-4 text-center text-sm text-gray-600 dark:text-gray-400">
                    Drag or swipe to browse. Auto-scroll pauses on hover.
                </div>
            @endif
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var carousel = document.getElementById('bannerCarousel');
                if (!carousel) return;

                var prev = document.getElementById('carouselPrev');
                var next = document.getElementById('carouselNext');

                var reduceMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
                var intervalMs = 3200;

                function getStep() {
                    return Math.max(320, Math.floor(carousel.clientWidth * 0.9));
                }

                function scrollNext() {
                    carousel.scrollBy({ left: getStep(), behavior: 'smooth' });
                }

                function scrollPrev() {
                    carousel.scrollBy({ left: -getStep(), behavior: 'smooth' });
                }

                if (prev) prev.addEventListener('click', scrollPrev);
                if (next) next.addEventListener('click', scrollNext);

                if (reduceMotion) return;

                var timer = null;
                var hoverPaused = false;

                function start() {
                    if (timer) return;
                    timer = window.setInterval(function () {
                        var maxScrollLeft = carousel.scrollWidth - carousel.clientWidth;
                        if (carousel.scrollLeft >= maxScrollLeft - 2) {
                            carousel.scrollTo({ left: 0, behavior: 'smooth' });
                        } else {
                            scrollNext();
                        }
                    }, intervalMs);
                }

                function stop() {
                    if (!timer) return;
                    window.clearInterval(timer);
                    timer = null;
                }

                carousel.addEventListener('pointerenter', function () {
                    if (hoverPaused) return;
                    hoverPaused = true;
                    stop();
                });

                carousel.addEventListener('pointerleave', function () {
                    if (!hoverPaused) return;
                    hoverPaused = false;
                    start();
                });

                start();
            });
        </script>
    </body>
</html>

