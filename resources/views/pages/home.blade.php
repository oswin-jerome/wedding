<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $project->name ?? 'Wedding' }}</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600|playfair-display:400,500,600"
        rel="stylesheet" />

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    <style>
        .wedding-sans {
            font-family: "Instrument Sans", ui-sans-serif, system-ui, sans-serif;
        }

        .wedding-serif {
            font-family: "Playfair Display", ui-serif, Georgia, Cambria, "Times New Roman", Times, serif;
        }

        @keyframes wedding-float {
            0% {
                transform: translateY(0px) rotate(0deg);
                opacity: 0.35;
            }

            50% {
                transform: translateY(-18px) rotate(6deg);
                opacity: 0.6;
            }

            100% {
                transform: translateY(0px) rotate(0deg);
                opacity: 0.35;
            }
        }

        @keyframes wedding-shimmer {
            0% {
                transform: translateX(-20%) rotate(8deg);
                opacity: 0;
            }

            20% {
                opacity: 0.35;
            }

            60% {
                opacity: 0.2;
            }

            100% {
                transform: translateX(120%) rotate(8deg);
                opacity: 0;
            }
        }

        .wedding-float {
            animation: wedding-float 5.5s ease-in-out infinite;
        }

        .wedding-fade {
            opacity: 0;
            transform: translateY(14px) scale(0.99);
            filter: blur(2px);
        }

        .wedding-in-view {
            opacity: 1;
            transform: translateY(0) scale(1);
            filter: blur(0);
            transition: opacity 0.7s ease, transform 0.7s ease, filter 0.7s ease;
        }

        @media (prefers-reduced-motion: reduce) {
            .wedding-float {
                animation: none !important;
            }

            .wedding-in-view {
                transition: none !important;
            }
        }
    </style>
</head>

<body
    class="wedding-sans min-h-screen bg-linear-to-br from-[#fff2f2] via-[#FDFDFC] to-[#F3BEC7]/35 dark:from-[#1D0002] dark:via-[#0a0a0a] dark:to-[#4B0600]/25 text-[#1b1b18] flex items-center justify-center px-6 py-10">
    <div class="relative w-full max-w-4xl">
        {{-- Background decoration --}}
        <div aria-hidden="true" class="pointer-events-none absolute inset-0 overflow-hidden rounded-[1.25rem]">
            <div class="absolute -top-10 -left-10 w-[260px] h-[260px] rounded-full bg-[#fff2f2] dark:bg-[#1D0002] wedding-float"
                style="animation-delay: 0.1s;"></div>
            <div class="absolute top-24 -right-10 w-[220px] h-[220px] rounded-full bg-[#fff2f2] dark:bg-[#1D0002] wedding-float"
                style="animation-delay: 1.3s;"></div>

            <span class="absolute top-[16%] left-[8%] text-[#F8B803] dark:text-[#391800] wedding-float text-2xl"
                style="animation-duration: 6.2s;">&#10084;</span>
            <span class="absolute top-[42%] right-[12%] text-[#F53003] dark:text-[#FF4433] wedding-float text-xl"
                style="animation-duration: 5.2s; animation-delay: 0.7s;">&#10084;</span>
            <span class="absolute bottom-[18%] left-[16%] text-[#F3BEC7] dark:text-[#4B0600] wedding-float text-2xl"
                style="animation-duration: 6.8s; animation-delay: 0.4s;">&#10084;</span>
            <span class="absolute top-[30%] right-[40%] text-[#F3BEC7] dark:text-[#4B0600] wedding-float text-xl"
                style="animation-duration: 7.2s; animation-delay: 1.1s;">&#10084;</span>

            <span class="absolute top-[8%] right-[18%] text-[#F3BEC7] dark:text-[#4B0600] wedding-float text-lg"
                style="animation-duration: 6.5s; animation-delay: 0.2s;">&#10084;</span>
            <span class="absolute top-[58%] left-[10%] text-[#F8B803] dark:text-[#391800] wedding-float text-lg"
                style="animation-duration: 7.5s; animation-delay: 0.9s;">&#10084;</span>
            <span class="absolute top-[26%] left-[22%] text-[#F53003] dark:text-[#FF4433] wedding-float text-lg"
                style="animation-duration: 5.9s; animation-delay: 1.4s;">&#10084;</span>
            <span class="absolute bottom-[12%] right-[22%] text-[#F8B803] dark:text-[#391800] wedding-float text-xl"
                style="animation-duration: 6.9s; animation-delay: 0.6s;">&#10084;</span>
            <span class="absolute top-[36%] left-[44%] text-[#F3BEC7] dark:text-[#4B0600] wedding-float text-2xl"
                style="animation-duration: 8.2s; animation-delay: 1.8s;">&#10084;</span>
            <span class="absolute top-[64%] right-[36%] text-[#F53003] dark:text-[#FF4433] wedding-float text-lg"
                style="animation-duration: 6.3s; animation-delay: 0.1s;">&#10084;</span>
        </div>

        {{-- Top bar --}}
        <header class="relative flex items-center justify-between mb-8">

            <div class="text-sm text-gray-600 dark:text-gray-400">
                Code: <span class="font-semibold">{{ $project->code }}</span>
            </div>
        </header>

        <main class="relative">
            <section class="wedding-fade wedding-hero px-6 py-8 lg:px-10 lg:py-10 overflow-hidden text-center"
                data-animate>
                {{-- Shimmer stripe --}}
                <div aria-hidden="true" class="absolute top-0 left-0 w-full h-full pointer-events-none">
                    <div class="absolute -top-24 left-[-20%] w-[45%] h-[200px] bg-white/10 dark:bg-white/5 rotate-[8deg]"
                        style="animation: wedding-shimmer 3.2s ease-in-out infinite;"></div>
                </div>

                <div class="relative mx-auto max-w-2xl">
                    <p class="uppercase tracking-wider text-sm text-gray-600 dark:text-gray-400 mb-3">
                        Photos & Wishes
                    </p>

                    <h1 class="wedding-serif text-5xl sm:text-6xl font-semibold tracking-tight leading-[1.05] mb-3">
                        {{ $project->name }}
                    </h1>

                    @if (!empty($project->description))
                        <p class="text-gray-700 dark:text-gray-300 text-lg leading-7 max-w-2xl">
                            {{ $project->description }}
                        </p>
                    @else
                        <p class="text-gray-700 dark:text-gray-300 text-lg leading-7 max-w-2xl">
                            Browse the moments in the photos below, then leave your wishes for the couple.
                        </p>
                    @endif

                    <div class="mt-8 flex flex-col sm:flex-row gap-3 items-center justify-center">
                        <button type="button" data-scroll-to="photos"
                            class="relative inline-flex items-center justify-center px-6 py-3 rounded-md border border-[#F3BEC7] dark:border-[#4B0600] bg-white/90 dark:bg-[#161615]/90 hover:bg-white active:bg-white transition-all shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.04)]">
                            <span class="font-semibold">View photos</span>
                        </button>

                        <button type="button" data-scroll-to="wishes"
                            class="relative inline-flex items-center justify-center px-6 py-3 rounded-md border border-transparent bg-[#F8B803] text-[#1b1b18] hover:bg-[#F8B803]/90 active:bg-[#F8B803]/80 transition-all shadow-sm">
                            <span class="font-semibold">Send wishes</span>
                        </button>
                    </div>

                    <p class="mt-5 text-sm text-gray-600 dark:text-gray-400">
                        Share something kind — it will mean a lot.
                    </p>
                </div>
            </section>

            <section id="photos" class="mt-10 wedding-fade px-6 py-8 lg:px-10" data-animate>
                <div class="flex items-start justify-between gap-6 mb-6">
                    <div>
                        <h2 class="wedding-serif text-2xl font-semibold tracking-tight leading-[1.2]">Photos</h2>
                        <p class="text-gray-600 dark:text-gray-400 mt-1 text-sm">
                            A little gallery from our day.
                        </p>
                    </div>
                    <a href="#wishes"
                        class="text-sm underline underline-offset-4 hover:text-gray-700 dark:hover:text-gray-200">
                        Leave wishes →
                    </a>
                </div>

                @php
                    $media = $project->getMedia('project_files');
                @endphp

                @if ($media->isEmpty())
                    <div class="text-gray-600 dark:text-gray-400 text-sm">
                        No photos uploaded yet.
                    </div>
                @else
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-3">
                        @foreach ($media as $item)
                            <figure class="relative overflow-hidden group">
                                <img src="{{ $item->getUrl('thumb') }}" alt="{{ $item->name }}"
                                    class="w-full h-44 object-cover transition-all duration-300 group-hover:scale-[1.03]"
                                    loading="lazy">
                                <figcaption
                                    class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity bg-black/40 flex items-center justify-center">
                                    <div class="flex flex-col sm:flex-row items-center gap-2">
                                        <a href="{{ $item->getUrl() }}" target="_blank" rel="noopener noreferrer"
                                            aria-label="Open image {{ $item->name }}"
                                            class="inline-flex items-center justify-center px-3 py-2 rounded-md bg-white/95 text-black text-xs font-semibold hover:bg-white transition-all">
                                            Open
                                        </a>

                                        <a href="{{ $item->getUrl() }}" download="{{ $item->file_name }}"
                                            aria-label="Download image {{ $item->name }}"
                                            class="inline-flex items-center justify-center px-3 py-2 rounded-md bg-[#F8B803] text-[#1b1b18] text-xs font-semibold hover:bg-[#F8B803]/90 transition-all">
                                            Download
                                        </a>
                                    </div>
                                </figcaption>
                            </figure>
                        @endforeach
                    </div>
                @endif
            </section>

            <section id="wishes"
                class="mt-10 wedding-fade rounded-[1.25rem] bg-white/85 dark:bg-[#161615]/85 backdrop-blur-sm shadow-sm px-6 py-8 lg:px-10"
                data-animate>
                <div class="mb-6">
                    <h2 class="wedding-serif text-2xl font-semibold tracking-tight leading-[1.2]">Send wishes</h2>
                    <p class="text-gray-600 dark:text-gray-400 mt-1 text-sm">
                        Leave a note for the couple. Your wish will be saved for this project.
                    </p>
                </div>

                @if (session('status'))
                    <div class="mb-5 text-sm text-[#1b1b18] dark:text-[#ededec] rounded-md border border-green-200 bg-green-50 px-4 py-3 shadow-sm"
                        role="status" aria-live="polite">
                        {{ session('status') }}
                    </div>
                @endif

                <form id="wishesForm" method="POST" action="{{ route('projects.wishes.store', $project) }}"
                    class="space-y-4">
                    @csrf
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label for="wishName" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                                Name (optional)
                            </label>
                            <input id="wishName" name="name" type="text" maxlength="60"
                                class="mt-1 w-full rounded-md border border-gray-300 dark:border-gray-700 bg-white dark:bg-[#161615] px-3 py-2 text-sm outline-none focus:ring-2 focus:ring-gray-200 dark:focus:ring-gray-600"
                                autocomplete="name">
                        </div>
                    </div>

                    <div>
                        <label for="wishMessage" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                            Your wish
                        </label>
                        <textarea id="wishMessage" name="message" required minlength="2" maxlength="500" rows="4"
                            class="mt-1 w-full rounded-md border border-gray-300 dark:border-gray-700 bg-white dark:bg-[#161615] px-3 py-2 text-sm outline-none focus:ring-2 focus:ring-gray-200 dark:focus:ring-gray-600"
                            placeholder="Write something kind..."></textarea>
                    </div>

                    <div class="flex items-center justify-between gap-4">
                        <div class="text-xs text-gray-600 dark:text-gray-400">
                            Tip: press `Submit` to see your wish appear below.
                        </div>

                        <button type="submit"
                            class="relative inline-flex items-center justify-center px-6 py-3 rounded-md bg-[#F8B803] text-[#1b1b18] font-semibold hover:bg-[#F8B803]/90 active:bg-[#F8B803]/80 transition-all shadow-sm">
                            Submit
                        </button>
                    </div>
                </form>

                <div class="mt-8">
                    <div class="flex items-center justify-between gap-4">
                        <h3 class="text-sm font-semibold text-gray-700 dark:text-gray-200">Latest wishes</h3>
                    </div>

                    @php
                        $latestWishes = $project->wishes()->latest()->limit(5)->get();
                    @endphp

                    <div class="mt-4 space-y-3">
                        @if ($latestWishes->isEmpty())
                            <div class="text-sm text-gray-600 dark:text-gray-400">No wishes yet. Be the first.</div>
                        @else
                            @foreach ($latestWishes as $wish)
                                <article
                                    class="rounded-md border border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-800 px-4 py-3">
                                    <div class="flex items-center justify-between gap-4">
                                        <div class="text-sm font-semibold text-gray-800 dark:text-gray-200">
                                            {{ $wish->name ?? 'Anonymous' }}
                                        </div>
                                        <div class="text-xs text-gray-500 dark:text-gray-400">
                                            {{ $wish->created_at?->diffForHumans() }}
                                        </div>
                                    </div>
                                    <p class="mt-2 text-sm text-gray-700 dark:text-gray-200 whitespace-pre-wrap">
                                        {{ $wish->message }}
                                    </p>
                                </article>
                            @endforeach
                        @endif
                    </div>
                </div>

            </section>
        </main>
    </div>

    <script>
        (function() {
            var animated = document.querySelectorAll('[data-animate]');

            // Fade/slide in on scroll (keeps things lightweight and smooth)
            if ('IntersectionObserver' in window) {
                var observer = new IntersectionObserver(function(entries) {
                    entries.forEach(function(entry) {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('wedding-in-view');
                            observer.unobserve(entry.target);
                        }
                    });
                }, {
                    threshold: 0.2
                });

                animated.forEach(function(el) {
                    observer.observe(el);
                });
            } else {
                animated.forEach(function(el) {
                    el.classList.add('wedding-in-view');
                });
            }

            // Scroll to sections
            document.querySelectorAll('[data-scroll-to]').forEach(function(btn) {
                btn.addEventListener('click', function() {
                    var id = btn.getAttribute('data-scroll-to');
                    var target = document.getElementById(id);
                    if (!target) return;
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                });
            });
            animated.forEach(function(el) {
                el.classList.add('wedding-fade');
            });
        })();
    </script>
</body>

</html>
