<x-home-layout>
    <main class="relative">
        @include('layout/partials/_summit-nav')
        <div class="relative h-screen w-full section-visible" id="home">
            <div class="absolute inset-0 bg-cover bg-center"
                 style="background-image:url('{{ asset('assets/media/images/landing.webp') }}');
                 filter:brightness(0.9)"></div>
            <div class="relative h-full flex items-center justify-center pt-4 sm:pt-2 md:pt-0">
                <div class="mx-auto max-w-6xl w-full px-4 sm:px-6">
                    <div class="max-w-2xl mx-auto text-center">
                        <img class="py-4" src="{{ asset('assets/media/logos/logo.webp') }}" alt="">
                        <div class="flex flex-col sm:flex-row gap-2 sm:gap-4 mb-6 sm:mb-10 justify-center"
                             style="opacity: 1; transform: none;">
                            <div class="flex flex-col sm:flex-row gap-2 sm:gap-4">
                                <div class="flex items-center gap-2 text-[#E22036] text-xs sm:text-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                         aria-hidden="truClie" role="img"
                                         class="text-white flex-shrink-0 iconify iconify--mdi" width="20" height="20"
                                         viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                              d="M12 11.5A2.5 2.5 0 0 1 9.5 9A2.5 2.5 0 0 1 12 6.5A2.5 2.5 0 0 1 14.5 9a2.5 2.5 0 0 1-2.5 2.5M12 2a7 7 0 0 0-7 7c0 5.25 7 13 7 13s7-7.75 7-13a7 7 0 0 0-7-7">

                                        </path>
                                    </svg>
                                    <span
                                        class="break-words sm:whitespace-nowrap">TBD,
                                        Nairobi
                                    </span>

                                </div>
                                <div class="flex items-center gap-2 text-[#E22036] text-xs sm:text-sm">
                                    <svg width="20" height="20" viewBox="0 0 1024 1024" class="icon"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path d="M182.067 383.79h664.916v473.911H182.067z" fill="#FCE3C3"/>
                                        <path
                                            d="M846.983 857.701H170.007V401.632h676.976v456.069zM189.428 838.28h638.134V421.053H189.428V838.28z"
                                            fill="#300604"/>
                                        <path
                                            d="M850.483 861.201H166.507V398.132h683.977v463.069z m-676.976-7h669.977V405.132H173.507v449.069z m657.555-12.421H185.929V417.553h645.134V841.78z m-638.133-7h631.134V424.553H192.929V834.78z"
                                            fill="#300604"/>
                                        <path d="M179.718 273.282h657.556v138.061H179.718z" fill="#300604"/>
                                        <path
                                            d="M840.774 414.844H176.219V269.782h664.556v145.062z m-657.555-7h650.556V276.782H183.219v131.062z"
                                            fill="#300604"/>
                                        <path
                                            d="M846.983 421.053H170.007V263.572h676.976v157.481z m-657.555-19.421h638.134V282.994H189.428v118.638z"
                                            fill="#300604"/>
                                        <path
                                            d="M850.483 424.553H166.507v-164.48h683.977v164.48z m-676.976-7h669.977v-150.48H173.507v150.48z m657.555-12.421H185.929V279.494h645.134v125.638z m-638.133-7h631.134V286.494H192.929v111.638z"
                                            fill="#300604"/>
                                        <path d="M672.215 190.225h63.426v162.87h-63.426z" fill="#ED8F27"/>
                                        <path
                                            d="M745.351 362.806h-82.847V180.514h82.847v182.292z m-63.426-19.421h44.005v-143.45h-44.005v143.45z"
                                            fill="#300604"/>
                                        <path d="M281.351 190.225h63.426v162.87h-63.426z" fill="#ED8F27"/>
                                        <path
                                            d="M354.487 362.806H271.64V180.514h82.847v182.292z m-63.426-19.421h44.005v-143.45h-44.005v143.45z"
                                            fill="#300604"/>
                                        <path d="M688.071 468.427h66.597v66.597h-66.597z" fill="#B12800"/>
                                        <path
                                            d="M688.071 596.369h66.597v66.597h-66.597zM688.071 724.31h66.597v66.598h-66.597zM546.156 468.427h66.597v66.597h-66.597z"
                                            fill="#228E9D"/>
                                        <path d="M546.156 596.369h66.597v66.597h-66.597z" fill="#B12800"/>
                                        <path
                                            d="M546.156 724.31h66.597v66.598h-66.597zM404.239 468.427h66.598v66.597h-66.598z"
                                            fill="#228E9D"/>
                                        <path d="M404.239 596.369h66.598v66.597h-66.598z" fill="#B12800"/>
                                        <path
                                            d="M404.239 724.31h66.598v66.598h-66.598zM262.323 596.369h66.598v66.597h-66.598z"
                                            fill="#228E9D"/>
                                        <path d="M262.323 724.31h66.598v66.598h-66.598z" fill="#B12800"/>
                                    </svg>
                                    <strong>

                                        14<sup>th</sup> - 18<sup>th</sup> September
                                        2026</strong>
                                </div>
                                <div class="flex items-center gap-2 text-[#E22036] text-xs sm:text-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                         aria-hidden="true" role="img"
                                         class="text-white flex-shrink-0 iconify iconify--mdi" width="20" height="20"
                                         viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                              d="M12 5.5A3.5 3.5 0 0 1 15.5 9a3.5 3.5 0 0 1-3.5 3.5A3.5 3.5 0 0 1 8.5 9A3.5 3.5 0 0 1 12 5.5M5 8c.56 0 1.08.15 1.53.42c-.15 1.43.27 2.85 1.13 3.96C7.16 13.34 6.16 14 5 14a3 3 0 0 1-3-3a3 3 0 0 1 3-3m14 0a3 3 0 0 1 3 3a3 3 0 0 1-3 3c-1.16 0-2.16-.66-2.66-1.62a5.54 5.54 0 0 0 1.13-3.96c.45-.27.97-.42 1.53-.42M5.5 18.25c0-2.07 2.91-3.75 6.5-3.75s6.5 1.68 6.5 3.75V20h-13zM0 20v-1.5c0-1.39 1.89-2.56 4.45-2.9c-.59.68-.95 1.62-.95 2.65V20zm24 0h-3.5v-1.75c0-1.03-.36-1.97-.95-2.65c2.56.34 4.45 1.51 4.45 2.9z"></path>
                                    </svg>
                                    <span class="whitespace-nowrap">500+ In Person</span>
                                </div>
                                <div class="flex items-center gap-2 text-[#E22036] text-xs sm:text-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                         aria-hidden="true" role="img"
                                         class="text-white flex-shrink-0 iconify iconify--mdi" width="20" height="20"
                                         viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                              d="M17.9 17.39c-.26-.8-1.01-1.39-1.9-1.39h-1v-3a1 1 0 0 0-1-1H8v-2h2a1 1 0 0 0 1-1V7h2a2 2 0 0 0 2-2v-.41a7.984 7.984 0 0 1 2.9 12.8M11 19.93c-3.95-.49-7-3.85-7-7.93c0-.62.08-1.22.21-1.79L9 15v1a2 2 0 0 0 2 2m1-16A10 10 0 0 0 2 12a10 10 0 0 0 10 10a10 10 0 0 0 10-10A10 10 0 0 0 12 2"></path>
                                    </svg>
                                    <span class="whitespace-nowrap">1,000+ Streaming</span>
                                </div>
                            </div>


                        </div>
                        <div class="flex flex-col sm:flex-row justify-center gap-4 sm:gap-6 md:gap-8 pb-20 font-bold">
                            <div class="flex items-center gap-2 text-[#E22036] text-xxl sm:text-xl">
                                <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img"
                                     class="text-white flex-shrink-0 iconify iconify--mdi" width="20" height="20"
                                     viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                     stroke-linecap="round" stroke-linejoin="round">
                                    <!-- Professional networking icon: central node connected to others -->
                                    <circle cx="12" cy="7" r="2" fill="currentColor"></circle>
                                    <circle cx="5" cy="17" r="1.6" fill="currentColor"></circle>
                                    <circle cx="19" cy="17" r="1.6" fill="currentColor"></circle>
                                    <path d="M12 9.5v3.5" stroke="currentColor"></path>
                                    <path d="M6 16l4-2.5" stroke="currentColor"></path>
                                    <path d="M18 16l-4-2.5" stroke="currentColor"></path>
                                </svg>
                                <span
                                    class="break-words sm:whitespace-nowrap text-[#E22036] text-3xl">Theme:  <span
                                        class="break-words sm:whitespace-nowrap"><strong>Shaping
                                                Tomorrow's Professional Landscape</strong></span></span>

                            </div>

                        </div>
                        <div class="flex flex-col sm:flex-row justify-center gap-4 sm:gap-6 md:gap-8"
                             style="opacity: 1; transform: none;">
                            <a href="@if(!request()->routeIs('/')) {{ route('/') }}#tickets-section @else #tickets-section
                        @endif"
                               class="bg-gradient-to-r from-[#175C93] to-[#175C90] text-white px-6 sm:px-8 py-3
                               rounded-full hover:opacity-90 transition-all duration-300 font-medium text-sm sm:text-base shadow-lg flex items-center justify-center gap-2 w-full sm:w-auto">
                                Register Now
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="absolute top-[100vh] left-0 right-0 z-10 pointer-events-none transform -translate-y-1/2">
            <div class="pointer-events-auto">
                <div class="hidden sm:block relative z-8">
                    <div class="mx-auto max-w-4xl px-4 sm:px-6">
                        <div class="rounded-lg shadow-2xl py-6 sm:py-8 px-4 sm:px-6 relative overflow-hidden">
                            <div class="absolute inset-0 rounded-lg opacity-40"
                                 style="background-image:url('https://ik.imagekit.io/nkmvdjnna/PAAN/summit/counter-pattern.webp');background-size:cover;background-position:center;background-repeat:repeat"></div>
                            <div
                                class="absolute inset-0 bg-gradient-to-r from-[#175C93] to-[#7BC7F0] rounded-lg opacity-100 mix-blend-overlay"></div>
                            <div class="text-center relative z-10">
                                <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 sm:gap-4 md:gap-6">
                                    <div class="text-center bg-white/20 backdrop-blur-sm rounded-lg p-3 sm:p-4">
                                        <div id="countdown-days"
                                             class="text-xl sm:text-2xl md:text-3xl font-bold text-white">49
                                        </div>
                                        <div class="text-xs sm:text-sm text-white/80">Days</div>
                                    </div>
                                    <div class="text-center bg-white/20 backdrop-blur-sm rounded-lg p-3 sm:p-4">
                                        <div id="countdown-hours"
                                             class="text-xl sm:text-2xl md:text-3xl font-bold text-white">7
                                        </div>
                                        <div class="text-xs sm:text-sm text-white/80">Hours</div>
                                    </div>
                                    <div class="text-center bg-white/20 backdrop-blur-sm rounded-lg p-3 sm:p-4">
                                        <div id="countdown-minutes"
                                             class="text-xl sm:text-2xl md:text-3xl font-bold text-white">20
                                        </div>
                                        <div class="text-xs sm:text-sm text-white/80">Minutes</div>
                                    </div>
                                    <div class="text-center bg-white/20 backdrop-blur-sm rounded-lg p-3 sm:p-4">
                                        <div id="countdown-seconds"
                                             class="text-xl sm:text-2xl md:text-3xl font-bold text-white">27
                                        </div>
                                        <div class="text-xs sm:text-sm text-white/80">Seconds</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="relative overflow-hidden z-5 w-full section-visible" id="about-us">
            <div class="absolute inset-0 z-0 bg-repeat bg-cover"
                 style="background-image:url('https://ik.imagekit.io/nkmvdjnna/PAAN/summit/about-summit-pattern.webp');background-size:60%;background-blend-mode:overlay;opacity:0.7"></div>
            <div class="absolute inset-0 bg-gradient-to-r from-[#172840] to-[#84c1d9cc] z-0"></div>
            <section class="relative mx-auto max-w-6xl z-10 px-4 sm:px-6" id="about">
                <div class="grid md:grid-cols-2 gap-8 py-12 sm:py-16 md:py-28 items-stretch min-h-screen">
                    <div class="flex flex-col gap-4 sm:gap-6 relative z-10 md:pr-6">
                        <div class="flex flex-col gap-3 sm:gap-4" style="opacity: 1; transform: none;">
                            <h2 class="text-2xl sm:text-3xl md:text-4xl text-white font-normal">About the
                                Conference</h2>
                            <h3 class="text-lg sm:text-xl md:text-2xl text-white font-normal">Shaping Tomorrow’s
                                Professional Landscape</h3>
                        </div>
                        <div class="space-y-3 sm:space-y-4 text-white text-sm sm:text-base md:text-lg leading-relaxed"
                             style="opacity: 1; transform: none;">
                            <p>
                                The 2nd KASNEB International Conference for Professionals (KICP) brings together
                                professionals,
                                industry leaders, policymakers and academia to examine the forces shaping the future of
                                work and professional practice. Through engaging conversations, practical insights and
                                networking opportunities, the Conference will challenge delegates to think beyond
                                today's
                                realities, share experiences across disciplines and explore how they can remain
                                relevant,
                                resilient and impactful in an increasingly dynamic professional landscape.
                            </p>
                        </div>

                    </div>
                    <div class="flex justify-center lg:justify-end h-full" style="opacity: 1; transform: none;">
                        <div class="relative overflow-hidden w-full max-w-md lg:max-w-none rounded-lg h-full">
                            <div class="w-full h-full overflow-hidden rounded-xl">
                                <img src="{{ asset('assets/media/images/about-kicp.webp') }}"
                                     class="w-full h-full object-cover" alt="about the event">
                            </div>

                        </div>
                    </div>
                </div>
            </section>
            <img alt="Background Pattern" loading="lazy" width="0" height="0" decoding="async" data-nimg="1"
                 class="absolute bottom-0 left-0 w-full h-1/3 object-cover z-0 opacity-10 pointer-events-none"
                 style="color:transparent" src="{{ asset('assets/media/images/bg-pattern.svg') }}">

        </section>
        <div class="bg-white relative py-12 sm:py-16 md:py-20 section-visible" id="objectives">
            <section class="relative mx-auto max-w-6xl px-4 sm:px-6">

                <div class="text-center mb-5 sm:mb-12">
                    <h2 class="text-2xl sm:text-3xl md:text-4xl text-[#172840] font-normal mb-5 sm:mb-4">Conference
                        Objectives</h2>
                    <h3 class="text-base sm:text-lg md:text-xl text-[#172840] font-normal max-w-3xl mx-auto">We aim to
                        unite professionals, leaders and emerging talent to share knowledge, mentor, network and drive
                        innovation and impact.
                        Knowledge Sharing
                    </h3>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 sm:gap-6">
                    <div
                        class="bg-slate-800 rounded-lg shadow-lg p-5 sm:p-7 md:p-8 flex flex-col h-full relative overflow-hidden group transition-all duration-300 hover:shadow-xl">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-[#175C93] to-[#7BC7F0] rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <div
                            class="absolute inset-0 rounded-lg opacity-0 group-hover:opacity-40 transition-opacity duration-300 z-[1]"
                            style="background-image:url('https://ik.imagekit.io/nkmvdjnna/PAAN/summit/summit-objective-pattern.webp');background-size:cover;background-position:center;background-repeat:repeat"></div>
                        <div class="relative z-10 flex flex-col h-full">
                            <div class="flex items-start justify-start mb-5 sm:mb-6">
                                <img src="{{ asset('assets/media/icons/knowledge-sharing.svg') }}"
                                     alt="Community Icon" class="w-10 h-10 sm:w-12 sm:h-12">
                            </div>
                            <p class="text-red-500 text-sm sm:text-base font-normal text-left mt-auto">Innovation &
                                Technology</p>
                            <div class="relative z-10 flex flex-col h-full justify-between">
                                <small class="text-gray-300 text-sm sm:text-sm font-light">
                                    Explore emerging technologies and innovative solutions that drive digital
                                    transformation,
                                    improve efficiency, and create sustainable opportunities for businesses,
                                    governments, and communities
                                </small>
                            </div>
                        </div>
                    </div>
                    <div
                        class="bg-slate-800 rounded-lg shadow-lg p-5 sm:p-7 md:p-8 flex flex-col h-full relative overflow-hidden group transition-all duration-300 hover:shadow-xl">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-[#175C93] to-[#7BC7F0] rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <div
                            class="absolute inset-0 rounded-lg opacity-0 group-hover:opacity-40 transition-opacity duration-300 z-[1]"
                            style="background-image:url('https://ik.imagekit.io/nkmvdjnna/PAAN/summit/summit-objective-pattern.webp');background-size:cover;background-position:center;background-repeat:repeat"></div>
                        <div class="relative z-10 flex flex-col h-full justify-between">
                            <div class="flex items-start justify-start mb-5 sm:mb-6">
                                <img src="https://ik.imagekit.io/nkmvdjnna/PAAN/summit/icons/user-group.svg"
                                     alt="Community Icon" class="w-10 h-10 sm:w-12 sm:h-12">
                            </div>
                            <p class="text-red-500 text-sm sm:text-base font-normal text-left">Leadership &
                                Governance</p>
                            <div class="relative z-10 flex flex-col h-full justify-between">
                                <small class="text-gray-300 text-sm sm:text-sm font-light">
                                    Strengthen leadership capacity and promote effective governance practices that
                                    foster
                                    accountability, collaboration, ethical decision-making, and sustainable
                                    organizational growth.
                                </small>
                            </div>
                        </div>
                    </div>
                    <div
                        class="bg-slate-800 rounded-lg shadow-lg p-5 sm:p-7 md:p-8 flex flex-col h-full relative overflow-hidden group transition-all duration-300 hover:shadow-xl">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-[#175C93] to-[#7BC7F0] rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <div
                            class="absolute inset-0 rounded-lg opacity-0 group-hover:opacity-40 transition-opacity duration-300 z-[1]"
                            style="background-image:url('https://ik.imagekit.io/nkmvdjnna/PAAN/summit/summit-objective-pattern.webp');background-size:cover;background-position:center;background-repeat:repeat"></div>
                        <div class="relative z-10 flex flex-col h-full">
                            <div class="flex items-start justify-start mb-5 sm:mb-6">
                                <img src="{{ asset('assets/media/icons/prof-dev.svg') }}"
                                     alt="Unlock Icon" class="w-10 h-10 sm:w-12 sm:h-12">
                            </div>
                            <p class="text-red-500 text-sm sm:text-base font-normal text-left mt-auto">Policy & Industry
                                Dialogue</p>
                            <div class="relative z-10 flex flex-col h-full justify-between">
                                <small class="text-gray-300 text-sm sm:text-sm font-light">
                                    Foster meaningful dialogue between policymakers, industry leaders, and stakeholders
                                    to
                                    shape forward-looking policies, address emerging challenges, and drive inclusive
                                    economic and sectoral development
                                </small>
                            </div>
                        </div>
                    </div>
                    <div
                        class="bg-slate-800 rounded-lg shadow-lg p-5 sm:p-7 md:p-8 flex flex-col h-full relative overflow-hidden group transition-all duration-300 hover:shadow-xl">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-[#175C93] to-[#7BC7F0] rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <div
                            class="absolute inset-0 rounded-lg opacity-0 group-hover:opacity-40 transition-opacity duration-300 z-[1]"
                            style="background-image:url('https://ik.imagekit.io/nkmvdjnna/PAAN/summit/summit-objective-pattern.webp');background-size:cover;background-position:center;background-repeat:repeat"></div>
                        <div class="relative z-10 flex flex-col h-full">
                            <div class="flex items-start justify-start mb-5 sm:mb-6">
                                <img
                                    src="{{ asset('assets/media/icons/mentorship.svg') }}"
                                    alt="Connect Icon" class="w-10 h-10 sm:w-12 sm:h-12">
                            </div>
                            <p class="text-red-500 text-sm sm:text-base font-normal text-left mt-auto">Networking &
                                Strategic Partnerships</p>
                            <div class="relative z-10 flex flex-col h-full justify-between">
                                <small class="text-gray-300 text-sm sm:text-sm font-light">
                                    Facilitate meaningful connections and strategic partnerships that encourage
                                    collaboration,
                                    knowledge exchange, investment opportunities, and long-term business and
                                    institutional growth
                                </small>
                            </div>
                        </div>
                    </div>
                    <div
                        class="bg-slate-800 rounded-lg shadow-lg p-5 sm:p-7 md:p-8 flex flex-col h-full relative overflow-hidden group transition-all duration-300 hover:shadow-xl">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-[#175C93] to-[#7BC7F0] rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <div
                            class="absolute inset-0 rounded-lg opacity-0 group-hover:opacity-40 transition-opacity duration-300 z-[1]"
                            style="background-image:url('https://ik.imagekit.io/nkmvdjnna/PAAN/summit/summit-objective-pattern.webp');background-size:cover;background-position:center;background-repeat:repeat"></div>
                        <div class="relative z-10 flex flex-col h-full">
                            <div class="flex items-start justify-start mb-5 sm:mb-6">
                                <img
                                    src="{{ asset('assets/media/icons/strategic-partnership.svg') }}"
                                    alt="Connect Icon" class="w-10 h-10 sm:w-12 sm:h-12">
                            </div>
                            <p class="text-red-500 text-sm sm:text-base font-normal text-left mt-auto">Talent
                                Development</p>
                            <div class="relative z-10 flex flex-col h-full justify-between">
                                <small class="text-gray-300 text-sm sm:text-sm font-light">
                                    Empower individuals and organizations through skills development, continuous
                                    learning,
                                    and capacity building to cultivate a future-ready, innovative, and resilient
                                    workforce.
                                </small>
                            </div>
                        </div>
                    </div>


                </div>
            </section>
        </div>
        <div class="mt-6 sm:mt-10 bg-gradient-to-br from-[#175C93] to-[#7BC7F0] relative overflow-hidden">
            <div class="absolute inset-0 z-0 opacity-30"
                 style="background-image:url('https://ik.imagekit.io/nkmvdjnna/PAAN/summit/at-a-glance.png');background-size:cover;background-position:center;background-repeat:no-repeat"></div>
            <section class="relative text-center mx-auto max-w-6xl py-12 sm:py-16 md:py-20 px-4 sm:px-6 z-10">
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-normal text-white">At a Glance</h2>
                <h3 class="text-sm sm:text-base md:text-md font-normal py-3 sm:py-4 text-slate-800">The scale and reach
                    of the Summit.</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
                    <div class="bg-white rounded-lg shadow-lg p-3 sm:p-4">
                        <div class="flex justify-end mb-2">
                            <div class="flex -space-x-1 sm:-space-x-2">
                                <div
                                    class="w-6 h-6 sm:w-8 sm:h-8 bg-[#F25849] rounded-full border-2 border-white flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                         aria-hidden="true" role="img" class="text-white iconify iconify--mdi"
                                         width="12" height="12" viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                              d="M12 4a4 4 0 0 1 4 4a4 4 0 0 1-4 4a4 4 0 0 1-4-4a4 4 0 0 1 4-4m0 10c4.42 0 8 1.79 8 4v2H4v-2c0-2.21 3.58-4 8-4"></path>
                                    </svg>
                                </div>
                                <div
                                    class="w-6 h-6 sm:w-8 sm:h-8 bg-[#84C1D9] rounded-full border-2 border-white flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                         aria-hidden="true" role="img" class="text-white iconify iconify--mdi"
                                         width="12" height="12" viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                              d="M12 4a4 4 0 0 1 4 4a4 4 0 0 1-4 4a4 4 0 0 1-4-4a4 4 0 0 1 4-4m0 10c4.42 0 8 1.79 8 4v2H4v-2c0-2.21 3.58-4 8-4"></path>
                                    </svg>
                                </div>
                                <div
                                    class="w-6 h-6 sm:w-8 sm:h-8 bg-[#172840] rounded-full border-2 border-white flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                         aria-hidden="true" role="img" class="text-white iconify iconify--mdi"
                                         width="12" height="12" viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                              d="M12 4a4 4 0 0 1 4 4a4 4 0 0 1-4 4a4 4 0 0 1-4-4a4 4 0 0 1 4-4m0 10c4.42 0 8 1.79 8 4v2H4v-2c0-2.21 3.58-4 8-4"></path>
                                    </svg>
                                </div>
                                <div
                                    class="w-6 h-6 sm:w-8 sm:h-8 bg-[#D1D3D4] rounded-full border-2 border-white flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                         aria-hidden="true" role="img" class="text-white iconify iconify--mdi"
                                         width="12" height="12" viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                              d="M12 4a4 4 0 0 1 4 4a4 4 0 0 1-4 4a4 4 0 0 1-4-4a4 4 0 0 1 4-4m0 10c4.42 0 8 1.79 8 4v2H4v-2c0-2.21 3.58-4 8-4"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <h4 class="text-2xl sm:text-3xl md:text-4xl text-slate-800 text-left">500+</h4>
                        <h5 class="text-sm sm:text-base font-normal text-left">In-person Attendees</h5>
                    </div>
                    <div class="bg-white rounded-lg shadow-lg p-3 sm:p-4">
                        <div class="flex justify-end mb-2">
                            <div class="flex -space-x-1">
                                <div
                                    class="w-8 h-8 sm:w-10 sm:h-10 rounded-full border-2 border-white flex items-center justify-center overflow-hidden shadow-sm">
                                    <img src="https://flagcdn.com/w40/ke.png" alt="Kenya"
                                         class="w-full h-full object-cover"></div>
                                <div
                                    class="w-8 h-8 sm:w-10 sm:h-10 rounded-full border-2 border-white flex items-center justify-center overflow-hidden shadow-sm">
                                    <img src="https://flagcdn.com/w40/tz.png" alt="Tanzania"
                                         class="w-full h-full object-cover"></div>
                                <div
                                    class="w-8 h-8 sm:w-10 sm:h-10 rounded-full border-2 border-white flex items-center justify-center overflow-hidden shadow-sm">
                                    <img src="https://flagcdn.com/w40/ug.png" alt="Uganda"
                                         class="w-full h-full object-cover"></div>

                            </div>
                        </div>
                        <h4 class="text-2xl sm:text-3xl md:text-4xl text-slate-800 text-left">3+</h4>
                        <h5 class="text-sm sm:text-base font-normal text-left">Countries Represented</h5>
                    </div>
                    <div class="bg-white rounded-lg shadow-lg p-3 sm:p-4">
                        <div class="flex justify-end mb-2">
                            <div class="flex items-center justify-center">
                                <img src="https://ik.imagekit.io/nkmvdjnna/PAAN/summit/icons/003-videocall%201.svg"
                                     alt="Video Call Icon" class="w-10 h-10 sm:w-12 sm:h-12">
                            </div>
                        </div>
                        <h4 class="text-2xl sm:text-3xl md:text-4xl text-slate-800 text-left">1,000+</h4>
                        <h5 class="text-sm sm:text-base font-normal text-left">Streaming Attendees</h5>
                    </div>
                    <div class="bg-white rounded-lg shadow-lg p-3 sm:p-4">
                        <div class="flex justify-end mb-2">
                            <div class="flex items-center justify-center">
                                <img src="https://ik.imagekit.io/nkmvdjnna/PAAN/summit/icons/038-microphones%201.svg"
                                     alt="Microphones Icon" class="w-10 h-10 sm:w-12 sm:h-12">
                            </div>
                        </div>
                        <h4 class="text-2xl sm:text-3xl md:text-4xl text-slate-800 text-left">30+</h4>
                        <h5 class="text-sm sm:text-base font-normal text-left">Industry‑leading speakers</h5>
                    </div>
                    <div class="bg-white rounded-lg shadow-lg p-3 sm:p-4">
                        <div class="flex justify-end mb-2">
                            <div class="flex items-center justify-center">
                                <img src="https://ik.imagekit.io/nkmvdjnna/PAAN/summit/icons/008-meeting%201.svg"
                                     alt="Meeting Icon" class="w-10 h-10 sm:w-12 sm:h-12">
                            </div>
                        </div>
                        <h4 class="text-2xl sm:text-3xl md:text-4xl text-slate-800 text-left">50+</h4>
                        <h5 class="text-sm sm:text-base font-normal text-left">Investors &amp; funds</h5>
                    </div>
                    <div class="bg-white rounded-lg shadow-lg p-3 sm:p-4">
                        <div class="flex justify-end mb-2">
                            <div class="flex items-center justify-center">
                                <img src="https://ik.imagekit.io/nkmvdjnna/PAAN/summit/icons/023-network%201.svg"
                                     alt="Network Icon" class="w-10 h-10 sm:w-12 sm:h-12">
                            </div>
                        </div>
                        <h4 class="text-2xl sm:text-3xl md:text-4xl text-slate-800 text-left">40+</h4>
                        <h5 class="text-sm sm:text-base font-normal text-left">Sessions &amp; networking</h5>
                    </div>
                </div>
                <div class="flex flex-col sm:flex-row gap-3 sm:gap-2 pt-4">
                    <a href="@if(!request()->routeIs('/')) {{ route('/') }}#tickets-section @else #tickets-section
                        @endif"
                       class="bg-gradient-to-r from-[#172840] to-[#F25849] text-white px-6 sm:px-8 py-3 text-sm sm:text-base font-medium w-full sm:w-auto rounded-full hover:opacity-90 transition-all duration-300 shadow-lg flex items-center justify-center gap-2">
                        Register Now
                    </a>

                </div>
            </section>
        </div>
        <div class="bg-white relative overflow-hidden section-visible" id="program">
            <section class="mx-auto max-w-6xl py-8 sm:py-12 md:py-16 lg:py-20 px-4 sm:px-6">
                <h2 class="text-2xl sm:text-3xl text-center md:text-4xl font-normal text-slate-800 mb-2
                sm:mb-3">Conference Tracks</h2>
                <h3 class="text-sm sm:text-base md:text-lg font-normal py-2 sm:py-3 md:py-4 text-center text-slate-800 mb-6 sm:mb-8">
                    Tracks and the five-day agenda snapshot.</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-5 md:gap-6">
                    <div
                        class="relative rounded-lg shadow-lg overflow-hidden min-h-[320px] sm:min-h-[360px] md:h-80 lg:h-96 flex flex-col md:block ">
                        <div
                            class="relative flex-1 min-h-[180px] sm:min-h-[200px] md:absolute md:inset-0 overflow-hidden">
                            <img alt="Film production"
                                 class="object-cover md:object-contain md:object-center md:-mt-20"
                                 style="position:absolute;height:100%;width:100%;left:0;top:0;right:0;bottom:0;
                                 color:transparent;border-radius:1px"
                                 src="{{ asset('assets/media/images/content-img-5.webp') }}">
                        </div>
                        <div class="bg-[#DAECF3] rounded-b-lg md:rounded-t-lg p-4 sm:p-5 md:p-6 transition-all
                        duration-300
                             md:absolute md:bottom-0 md:left-0 md:right-0 z-10 relative group"
                            style="background-image:none">

                            <div
                                class="absolute inset-0 bg-gradient-to-t from-[#F25849] to-[#172840] rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            <div
                                class="absolute inset-0 rounded-lg opacity-0 group-hover:opacity-40 transition-opacity duration-300 z-[1]"
                                style="background-image:url('https://ik.imagekit.io/nkmvdjnna/PAAN/summit/summit-objective-pattern.webp');background-size:cover;background-position:center;background-repeat:repeat"></div>
                            <div class="relative z-10 text-slate-800 group-hover:text-white">
                                <h4 class="text-base sm:text-lg md:text-xl font-bold mb-2 sm:mb-3 transition-colors duration-300 line-clamp-2">
                                    Leadership & Future of Work</h4>
                                <p class="text-xs sm:text-sm md:text-base mb-3 sm:mb-4 transition-colors duration-300 line-clamp-2">
                                    Preparing professionals to lead through disruption, build resilient institutions and
                                    thrive in a rapidly changing world.</p>
                                <div class="flex flex-wrap gap-2 sm:gap-2.5">
                                    <div class="flex items-center gap-1.5">
                                        <div
                                            class="w-1.5 h-1.5 sm:w-2 sm:h-2 bg-yellow-500 rounded-full flex-shrink-0"></div>
                                        <small
                                            class="text-[10px] sm:text-xs transition-colors duration-300 leading-tight">Digital Leadership & Transformation
                                            </small></div>
                                    <div class="flex items-center gap-1.5">
                                        <div
                                            class="w-1.5 h-1.5 sm:w-2 sm:h-2 bg-yellow-500 rounded-full flex-shrink-0"></div>
                                        <small
                                            class="text-[10px] sm:text-xs transition-colors duration-300 leading-tight">Governance, Ethics & Accountability
                                            </small>
                                    </div>
                                    <div class="flex items-center gap-1.5">
                                        <div
                                            class="w-1.5 h-1.5 sm:w-2 sm:h-2 bg-yellow-500 rounded-full flex-shrink-0"></div>
                                        <small
                                            class="text-[10px] sm:text-xs transition-colors duration-300
                                            leading-tight">Workplace Productivity & Performance
                                        </small>
                                    </div>
                                    <div class="flex items-center gap-1.5">
                                        <div
                                            class="w-1.5 h-1.5 sm:w-2 sm:h-2 bg-yellow-500 rounded-full flex-shrink-0"></div>
                                        <small
                                            class="text-[10px] sm:text-xs transition-colors duration-300 leading-tight">Technology & the Future of Work</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="relative rounded-lg shadow-lg overflow-hidden min-h-[320px] sm:min-h-[360px] md:h-80 lg:h-96 flex flex-col md:block ">
                        <div
                            class="relative flex-1 min-h-[180px] sm:min-h-[200px] md:absolute md:inset-0 overflow-hidden">
                            <img alt="AI, Technology &amp; The Future of Creative Work"
                                 class="object-cover md:object-contain md:object-center md:-mt-20"
                                 style="position:absolute;height:100%;width:100%;left:0;top:0;right:0;bottom:0;color:transparent"
                                 src="{{ asset('assets/media/images/content-img-2.webp') }}">
                        </div>
                        <div
                            class="bg-[#DAECF3] rounded-b-lg md:rounded-t-lg p-4 sm:p-5 md:p-6 transition-all duration-300 md:absolute md:bottom-0 md:left-0 md:right-0 z-10 relative group"
                            style="background-image:none">
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-[#F25849] to-[#172840] rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            <div
                                class="absolute inset-0 rounded-lg opacity-0 group-hover:opacity-40 transition-opacity duration-300 z-[1]"
                                style="background-image:url('https://ik.imagekit.io/nkmvdjnna/PAAN/summit/summit-objective-pattern.webp');background-size:cover;background-position:center;background-repeat:repeat"></div>
                            <div class="relative z-10 text-slate-800 group-hover:text-white">
                                <h4 class="text-base sm:text-lg md:text-xl font-bold mb-2 sm:mb-3 transition-colors duration-300 line-clamp-2">
                                    Digital Innovation
                                    <!-- -->&amp;<br class="hidden sm:block">Emerging Technologies</h4>
                                <p class="text-xs sm:text-sm md:text-base mb-3 sm:mb-4 transition-colors duration-300 line-clamp-2">
                                    Exploring AI, the digital economy, smart cities, innovation and the technologies
                                    transforming professional practice.
                                </p>
                                <div class="flex flex-wrap gap-2 sm:gap-2.5">
                                    <div class="flex items-center gap-1.5">
                                        <div
                                            class="w-1.5 h-1.5 sm:w-2 sm:h-2 bg-yellow-500 rounded-full flex-shrink-0"></div>
                                        <small
                                            class="text-[10px] sm:text-xs transition-colors duration-300 leading-tight">Artificial Intelligence & Machine Learning</small></div>
                                    <div class="flex items-center gap-1.5">
                                        <div
                                            class="w-1.5 h-1.5 sm:w-2 sm:h-2 bg-yellow-500 rounded-full flex-shrink-0"></div>
                                        <small
                                            class="text-[10px] sm:text-xs transition-colors duration-300 leading-tight">Emerging Technologies & Future Trends</small></div>
                                    <div class="flex items-center gap-1.5">
                                        <div
                                            class="w-1.5 h-1.5 sm:w-2 sm:h-2 bg-yellow-500 rounded-full flex-shrink-0"></div>
                                        <small
                                            class="text-[10px] sm:text-xs transition-colors duration-300 leading-tight"></small>
                                    </div>
                                    <div class="flex items-center gap-1.5">
                                        <div
                                            class="w-1.5 h-1.5 sm:w-2 sm:h-2 bg-yellow-500 rounded-full flex-shrink-0"></div>
                                        <small
                                            class="text-[10px] sm:text-xs transition-colors duration-300 leading-tight">Cybersecurity & Digital Trust</small></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="relative rounded-lg shadow-lg overflow-hidden min-h-[320px] sm:min-h-[360px] md:h-80 lg:h-96 flex flex-col md:block ">
                        <div
                            class="relative flex-1 min-h-[180px] sm:min-h-[200px] md:absolute md:inset-0 overflow-hidden">
                            <img alt="AI, Technology &amp; The Future of Creative Work"
                                 class="object-cover md:object-contain md:object-center md:-mt-20"
                                 style="position:absolute;height:100%;width:100%;left:0;top:0;right:0;bottom:0;color:transparent"
                                 src="{{ asset('assets/media/images/content-img-3.webp') }}">
                        </div>
                        <div
                            class="bg-[#DAECF3] rounded-b-lg md:rounded-t-lg p-4 sm:p-5 md:p-6 transition-all duration-300 md:absolute md:bottom-0 md:left-0 md:right-0 z-10 relative group"
                            style="background-image:none">
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-[#F25849] to-[#172840] rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            <div
                                class="absolute inset-0 rounded-lg opacity-0 group-hover:opacity-40 transition-opacity duration-300 z-[1]"
                                style="background-image:url('https://ik.imagekit.io/nkmvdjnna/PAAN/summit/summit-objective-pattern.webp');background-size:cover;background-position:center;background-repeat:repeat"></div>
                            <div class="relative z-10 text-slate-800 group-hover:text-white">
                                <h4 class="text-base sm:text-lg md:text-xl font-bold mb-2 sm:mb-3 transition-colors duration-300 line-clamp-2">
                                    Governance, Policy &
                                    <!-- --><br class="hidden sm:block">Global Affairs</h4>
                                <p class="text-xs sm:text-sm md:text-base mb-3 sm:mb-4 transition-colors duration-300 line-clamp-2">
                                    Examining governance, public policy, ethics, geopolitics and the
                                    partnerships shaping resilient economies and institutions.

                                </p>
                                <div class="flex flex-wrap gap-2 sm:gap-2.5">
                                    <div class="flex items-center gap-1.5">
                                        <div
                                            class="w-1.5 h-1.5 sm:w-2 sm:h-2 bg-yellow-500 rounded-full flex-shrink-0"></div>
                                        <small
                                            class="text-[10px] sm:text-xs transition-colors duration-300 leading-tight">Public Policy & Regulatory Frameworks</small></div>
                                    <div class="flex items-center gap-1.5">
                                        <div
                                            class="w-1.5 h-1.5 sm:w-2 sm:h-2 bg-yellow-500 rounded-full flex-shrink-0"></div>
                                        <small
                                            class="text-[10px] sm:text-xs transition-colors duration-300 leading-tight">Good Governance, Ethics & Accountability</small></div>
                                    <div class="flex items-center gap-1.5">
                                        <div
                                            class="w-1.5 h-1.5 sm:w-2 sm:h-2 bg-yellow-500 rounded-full flex-shrink-0"></div>
                                        <small
                                            class="text-[10px] sm:text-xs transition-colors duration-300 leading-tight">Digital Governance & Policy Innovation</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="relative rounded-lg shadow-lg overflow-hidden min-h-[320px] sm:min-h-[360px] md:h-80 lg:h-96 flex flex-col md:block ">
                        <div
                            class="relative flex-1 min-h-[180px] sm:min-h-[200px] md:absolute md:inset-0 overflow-hidden">
                            <img alt="AI, Technology &amp; The Future of Creative Work"
                                 class="object-cover md:object-contain md:object-center md:-mt-20"
                                 style="position:absolute;height:100%;width:100%;left:0;top:0;right:0;bottom:0;color:transparent"
                                 src="{{ asset('assets/media/images/content-img-4.webp') }}">
                        </div>
                        <div
                            class="bg-[#DAECF3] rounded-b-lg md:rounded-t-lg p-4 sm:p-5 md:p-6 transition-all duration-300 md:absolute md:bottom-0 md:left-0 md:right-0 z-10 relative group"
                            style="background-image:none">
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-[#F25849] to-[#172840] rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            <div
                                class="absolute inset-0 rounded-lg opacity-0 group-hover:opacity-40 transition-opacity duration-300 z-[1]"
                                style="background-image:url('https://ik.imagekit.io/nkmvdjnna/PAAN/summit/summit-objective-pattern.webp');background-size:cover;background-position:center;background-repeat:repeat"></div>
                            <div class="relative z-10 text-slate-800 group-hover:text-white">
                                <h4 class="text-base sm:text-lg md:text-xl font-bold mb-2 sm:mb-3 transition-colors duration-300 line-clamp-2">
                                    Economic Growth &
                                    <!-- --><br class="hidden sm:block">Financial Resilience</h4>
                                <p class="text-xs sm:text-sm md:text-base mb-3 sm:mb-4 transition-colors duration-300 line-clamp-2">
                                    From wealth creation and investment to trade, retirement and economic
                                    transformation, this track focuses on building sustainable prosperity.
                                </p>
                                <div class="flex flex-wrap gap-2 sm:gap-2.5">
                                    <div class="flex items-center gap-1.5">
                                        <div
                                            class="w-1.5 h-1.5 sm:w-2 sm:h-2 bg-yellow-500 rounded-full flex-shrink-0"></div>
                                        <small
                                            class="text-[10px] sm:text-xs transition-colors duration-300 leading-tight">Investment, Trade & Entrepreneurship</small></div>
                                    <div class="flex items-center gap-1.5">
                                        <div
                                            class="w-1.5 h-1.5 sm:w-2 sm:h-2 bg-yellow-500 rounded-full flex-shrink-0"></div>
                                        <small
                                            class="text-[10px] sm:text-xs transition-colors duration-300 leading-tight">Financial Inclusion & Access to Capital</small></div>
                                    <div class="flex items-center gap-1.5">
                                        <div
                                            class="w-1.5 h-1.5 sm:w-2 sm:h-2 bg-yellow-500 rounded-full flex-shrink-0"></div>
                                        <small
                                            class="text-[10px] sm:text-xs transition-colors duration-300 leading-tight">Macroeconomic Policy & Economic Stability</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="relative rounded-lg shadow-lg overflow-hidden min-h-[320px] sm:min-h-[360px] md:h-80 lg:h-96 flex flex-col md:block ">
                        <div
                            class="relative flex-1 min-h-[180px] sm:min-h-[200px] md:absolute md:inset-0 overflow-hidden">
                            <img alt="AI, Technology &amp; The Future of Creative Work"
                                 class="object-cover md:object-contain md:object-center md:-mt-20"
                                 style="position:absolute;height:100%;width:100%;left:0;top:0;right:0;bottom:0;color:transparent"
                                 src="{{ asset('assets/media/images/content-img-5.webp') }}">
                        </div>
                        <div
                            class="bg-[#DAECF3] rounded-b-lg md:rounded-t-lg p-4 sm:p-5 md:p-6 transition-all duration-300 md:absolute md:bottom-0 md:left-0 md:right-0 z-10 relative group"
                            style="background-image:none">
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-[#F25849] to-[#172840] rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            <div
                                class="absolute inset-0 rounded-lg opacity-0 group-hover:opacity-40 transition-opacity duration-300 z-[1]"
                                style="background-image:url('https://ik.imagekit.io/nkmvdjnna/PAAN/summit/summit-objective-pattern.webp');background-size:cover;background-position:center;background-repeat:repeat"></div>
                            <div class="relative z-10 text-slate-800 group-hover:text-white">
                                <h4 class="text-base sm:text-lg md:text-xl font-bold mb-2 sm:mb-3 transition-colors duration-300 line-clamp-2">
                                    Sustainability & <br class="hidden sm:block"> Inclusive Development</h4>
                                <p class="text-xs sm:text-sm md:text-base mb-3 sm:mb-4 transition-colors duration-300 line-clamp-2">
                                    Exploring climate action, sustainability, public-private collaboration and
                                    innovation for long-term impact and competitiveness.

                                </p>
                                <div class="flex flex-wrap gap-2 sm:gap-2.5">
                                    <div class="flex items-center gap-1.5">
                                        <div
                                            class="w-1.5 h-1.5 sm:w-2 sm:h-2 bg-yellow-500 rounded-full flex-shrink-0"></div>
                                        <small
                                            class="text-[10px] sm:text-xs transition-colors duration-300 leading-tight">Inclusive Growth & Social Equity</small></div>
                                    <div class="flex items-center gap-1.5">
                                        <div
                                            class="w-1.5 h-1.5 sm:w-2 sm:h-2 bg-yellow-500 rounded-full flex-shrink-0"></div>
                                        <small
                                            class="text-[10px] sm:text-xs transition-colors duration-300 leading-tight">Green Economy & Circular Innovation</small></div>
                                    <div class="flex items-center gap-1.5">
                                        <div
                                            class="w-1.5 h-1.5 sm:w-2 sm:h-2 bg-yellow-500 rounded-full flex-shrink-0"></div>
                                        <small
                                            class="text-[10px] sm:text-xs transition-colors duration-300 leading-tight">Sustainable Business & Responsible Investment</small></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="relative rounded-lg shadow-lg overflow-hidden min-h-[320px] sm:min-h-[360px] md:h-80 lg:h-96 flex flex-col md:block ">
                        <div
                            class="relative flex-1 min-h-[180px] sm:min-h-[200px] md:absolute md:inset-0 overflow-hidden">
                            <img alt="AI, Technology &amp; The Future of Creative Work"
                                 class="object-cover md:object-contain md:object-center md:-mt-20"
                                 style="position:absolute;height:100%;width:100%;left:0;top:0;right:0;bottom:0;color:transparent"
                                 src="{{ asset('assets/media/images/content-img-6.webp') }}">
                        </div>
                        <div
                            class="bg-[#DAECF3] rounded-b-lg md:rounded-t-lg p-4 sm:p-5 md:p-6 transition-all duration-300 md:absolute md:bottom-0 md:left-0 md:right-0 z-10 relative group"
                            style="background-image:none">
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-[#F25849] to-[#172840] rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            <div
                                class="absolute inset-0 rounded-lg opacity-0 group-hover:opacity-40 transition-opacity duration-300 z-[1]"
                                style="background-image:url('https://ik.imagekit.io/nkmvdjnna/PAAN/summit/summit-objective-pattern.webp');background-size:cover;background-position:center;background-repeat:repeat"></div>
                            <div class="relative z-10 text-slate-800 group-hover:text-white">
                                <h4 class="text-base sm:text-lg md:text-xl font-bold mb-2 sm:mb-3 transition-colors duration-300 line-clamp-2">
                                    Talent, Learning &
                                    <!-- -->&amp;<br class="hidden sm:block">Professional Excellence</h4>
                                <p class="text-xs sm:text-sm md:text-base mb-3 sm:mb-4 transition-colors duration-300 line-clamp-2">
                                    Reimagining education, professional standards, global careers and lifelong
                                    learning to prepare tomorrow's professionals.
                                </p>
                                <div class="flex flex-wrap gap-2 sm:gap-2.5">
                                    <div class="flex items-center gap-1.5">
                                        <div
                                            class="w-1.5 h-1.5 sm:w-2 sm:h-2 bg-yellow-500 rounded-full flex-shrink-0"></div>
                                        <small
                                            class="text-[10px] sm:text-xs transition-colors duration-300 leading-tight">Continuous Learning & Professional Growth</small></div>
                                    <div class="flex items-center gap-1.5">
                                        <div
                                            class="w-1.5 h-1.5 sm:w-2 sm:h-2 bg-yellow-500 rounded-full flex-shrink-0"></div>
                                        <small
                                            class="text-[10px] sm:text-xs transition-colors duration-300 leading-tight">Leadership & Executive Development</small></div>
                                    <div class="flex items-center gap-1.5">
                                        <div
                                            class="w-1.5 h-1.5 sm:w-2 sm:h-2 bg-yellow-500 rounded-full flex-shrink-0"></div>
                                        <small
                                            class="text-[10px] sm:text-xs transition-colors duration-300 leading-tight">Digital Skills & Technology Literacy</small></div>
                                    <div class="flex items-center gap-1.5">
                                        <div
                                            class="w-1.5 h-1.5 sm:w-2 sm:h-2 bg-yellow-500 rounded-full flex-shrink-0"></div>
                                        <small
                                            class="text-[10px] sm:text-xs transition-colors duration-300 leading-tight">Innovation, Creativity & Critical Thinking</small></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </section>
        </div>
        <div class="bg-[#F3F9FB] py-12 sm:py-16 md:py-20" id="agenda">
            <section class="mx-auto max-w-6xl px-4 sm:px-6">
                <div class="text-center mb-8 sm:mb-12">
                    <h2 class="text-2xl sm:text-3xl font-normal text-[#1a365d] mb-3 sm:mb-4">Conference Programme</h2>
                    <p class="text-base sm:text-lg text-gray-600">Five days of thought leadership and professional
                        networking</p>
                </div>

                <!--Inner Tabs section -->
                <div x-data="{ tabs: [
                        { id: 1, title: 'Day 1', active: true},
                        { id: 2, title: 'Day 2', active: false},
                        { id: 3, title: 'Day 3', active: false},
                        { id: 4, title: 'Day 4', active: false},
                        { id: 5, title: 'Day 5', active: false},
                        ], activeTab: 1, mobileActiveTab: 1 }">

                    <!-- desktop Tabs -->
                    <div class="block">
                        <div>
                            <nav class="flex justify-center gap-3 sm:gap-4 mb-8 sm:mb-8">
                                <template x-for="(tab, ix) in tabs" x-bind:key="tab.id" class="" aria-label="Tabs">
                                    <a href="#"
                                       @click.prevent="tabs.forEach(tab => tab.active = false); tabs[ix].active = true; mobileActiveTab = tab.id"
                                       class="inline-flex flex-col items-center justify-start pb-4 px-1"
                                       :aria-current="tab.active ? 'page' : 'undefined'">
                                        <!-- Icon container -->
                                        <div
                                            class="px-6 sm:px-8 py-2 sm:py-3 rounded-full transition-all duration-300 font-medium text-sm sm:text-base shadow-lg flex items-center gap-2"
                                            :class="tab.active ? 'bg-gradient-to-r from-[#175C93] to-[#7BC7F0] border border-transparent text-white' : 'uppercase bg-transparent border border-[#84C1D9] text-[#84C1D9] hover:bg-[#175C93] hover:text-white'"
                                            x-text="tab.title">
                                        </div>
                                    </a>
                                </template>
                            </nav>
                        </div>
                    </div>

                    <div>
                        <!-- tab 1 -->
                        <section x-cloak x-show="tabs.find(tab => tab.id === 1).active || mobileActiveTab == 1">
                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 sm:gap-12">

                                <div class="bg-white rounded-xl shadow-xl overflow-hidden flex flex-col"
                                     style="height:auto">
                                    <div
                                        class="bg-gradient-to-r from-[#175C93] to-[#7BC7F0] text-white p-4 sm:p-6
                                        flex-shrink-0">
                                        <h4 class="text-lg sm:text-xl font-bold">Day 1 – Registration</h4>
                                        <p class="text-xs sm:text-sm opacity-90 mt-1">Sep 14, 2026</p>
                                    </div>
                                    <div class="p-4 sm:p-6 relative flex-1 overflow-y-auto">
                                        <div class="space-y-4 sm:space-y-6 relative">
                                            {{--                                            <div--}}
                                            {{--                                                class="absolute left-[5px] top-[6px] bottom-[6px] w-0.5 bg-[#ef4444]"></div>--}}
                                            <div class="flex  relative">
                                                <div class="relative">
                                                    <div
                                                        class="w-3 h-3 bg-[#ef4444] rounded-full shadow-lg shadow-[#ef4444]/50 flex-shrink-0 z-10 relative">

                                                    </div>
                                                    <div
                                                        class="absolute inset-0 w-3 h-3 bg-[#ef4444] rounded-full opacity-30 animate-ping"></div>
                                                </div>
                                                <div class="ml-4 sm:ml-6">
                                                    <div class="text-xs sm:text-sm font-bold text-[#84C1D9]
                                                    mb-1">09:00 am
                                                        – 05:00 pm
                                                    </div>
                                                    <h5 class="text-[#1a365d] text-sm sm:text-base">Delegates /
                                                        Exhibitors
                                                        Registration</h5>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <!-- Day 2 -->
                        <section x-cloak x-show="tabs.find(tab => tab.id === 2).active || mobileActiveTab == 2">
                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 sm:gap-12">
                                <div class="bg-white rounded-xl shadow-xl overflow-hidden flex flex-col"
                                     style="height:680px">
                                    <div
                                        class="bg-gradient-to-r from-[#175C93] to-[#7BC7F0] text-white p-4 sm:p-6
                                        flex-shrink-0">
                                        <h4 class="text-lg sm:text-xl font-bold">DAY TWO: TUESDAY, 15 SEPTEMBER
                                            2026</h4>
                                        <p class="text-xs sm:text-sm opacity-90 mt-1">Morning session</p>
                                    </div>
                                    <div class="p-4 sm:p-6 relative flex-1 overflow-y-auto">
                                        <div class="space-y-4 sm:space-y-6 relative">
                                            <div
                                                class="absolute left-[5px] top-[6px] bottom-[6px] w-0.5 bg-[#ef4444]"></div>
                                            <div class="flex relative">
                                                <div class="relative">
                                                    <div
                                                        class="w-3 h-3 bg-[#ef4444] rounded-full shadow-lg shadow-[#ef4444]/50 flex-shrink-0 z-10 relative"></div>
                                                    <div
                                                        class="absolute inset-0 w-3 h-3 bg-[#ef4444] rounded-full opacity-30 animate-ping"></div>
                                                </div>
                                                <div class="ml-4 sm:ml-6">
                                                    <div class="text-xs sm:text-sm font-bold text-[#84C1D9] mb-1">
                                                        8:00a.m. – 8:30a.m.
                                                    </div>
                                                    <h5 class="text-[#1a365d] text-sm sm:text-base">Registration and
                                                        Networking
                                                        Breakfast</h5>
                                                    <div class="flex items-center gap-1 mt-0.5">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                             class="w-3 h-3 text-[#84C1D9] flex-shrink-0"
                                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                             stroke-width="2">
                                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                            <circle cx="12" cy="7" r="4"></circle>
                                                        </svg>
                                                        <h6 class="text-[#84C1D9] text-xs italic font-normal leading-tight">
                                                            All</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex  relative">

                                                <div class="ml-4 sm:ml-6">

                                                    <h5 class="text-[#1a365d] text-sm sm:text-base">Setting the Stage:
                                                        National Anthem & Prayers </h5>
                                                    <div class="flex items-center gap-1 mt-0.5">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                             class="w-3 h-3 text-[#84C1D9] flex-shrink-0"
                                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                             stroke-width="2">
                                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                            <circle cx="12" cy="7" r="4"></circle>
                                                        </svg>
                                                        <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                        leading-tight">Johnson Mwakazi,
                                                            Master of Ceremony</h6>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="flex  relative">

                                                <div class="ml-4 sm:ml-6">

                                                    <h5 class="text-[#1a365d] text-sm sm:text-base">Welcome Remarks
                                                        (10 minutes)</h5>
                                                    <div class="flex items-center gap-1 mt-0.5">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                             class="w-3 h-3 text-[#84C1D9] flex-shrink-0"
                                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                             stroke-width="2">
                                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                            <circle cx="12" cy="7" r="4"></circle>
                                                        </svg>
                                                        <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                        leading-tight">Prof. Nicholas K. Letting’,
                                                            Ph.D, EBS, HSC
                                                            Chief Executive Officer,
                                                            KASNEB</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex  relative">

                                                <div class="ml-4 sm:ml-6">

                                                    <h5 class="text-[#1a365d] text-sm sm:text-base">Opening Remarks
                                                        (15 minutes)</h5>
                                                    <div class="flex items-center gap-1 mt-0.5">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                             class="w-3 h-3 text-[#84C1D9] flex-shrink-0"
                                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                             stroke-width="2">
                                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                            <circle cx="12" cy="7" r="4"></circle>
                                                        </svg>
                                                        <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                        leading-tight">Dr. Percy Opio
                                                            Board Chairman, KASNEB</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex relative">

                                                <div class="ml-4 sm:ml-6">

                                                    <h5 class="text-[#1a365d] text-sm sm:text-base">Address
                                                        Topic: Professionals
                                                        Advancing Africa’s Global
                                                        Competitiveness</h5>
                                                    <div class="flex items-center gap-1 mt-0.5">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                             class="w-3 h-3 text-[#84C1D9] flex-shrink-0"
                                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                             stroke-width="2">
                                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                            <circle cx="12" cy="7" r="4"></circle>
                                                        </svg>
                                                        <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                        leading-tight">Mr. Walid Ben Salah
                                                            President, Pan African
                                                            Federation of Accountants</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex relative">
                                                <div class="relative">
                                                    <div
                                                        class="w-3 h-3 bg-[#ef4444] rounded-full shadow-lg shadow-[#ef4444]/50 flex-shrink-0 z-10 relative"></div>
                                                    <div
                                                        class="absolute inset-0 w-3 h-3 bg-[#ef4444] rounded-full opacity-30 animate-ping"></div>
                                                </div>
                                                <div class="ml-4 sm:ml-6">
                                                    <div class="text-xs sm:text-sm font-bold text-[#84C1D9]
                                                    mb-1">8:30a.m. – 10:30a.m.
                                                    </div>
                                                    <h5 class="text-[#1a365d] text-sm sm:text-base">
                                                        Opening Keynote Address
                                                        Topic: The Success Mindset
                                                        as A Competitive Advantage
                                                        (20 minutes)</h5>
                                                    <div class="flex items-center gap-1 mt-0.5">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                             class="w-3 h-3 text-[#84C1D9] flex-shrink-0"
                                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                             stroke-width="2">
                                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                            <circle cx="12" cy="7" r="4"></circle>
                                                        </svg>
                                                        <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                        leading-tight">Mr. Paul Russo, EBS
                                                            Group CEO, KCB Bank</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex relative">

                                                <div class="ml-4 sm:ml-6">
                                                    <h4 class="text-[#1a365d] text-sm sm:text-base">Fireside Chat</h4>
                                                    <h5 class="text-[#1a365d] text-sm sm:text-base">
                                                        Topic: The Reinvented
                                                        Leader: Leading Evolving
                                                        Professionals in a Dynamic
                                                        Work Environment
                                                        (45 minutes)
                                                    </h5>
                                                    <span class="py-20 text-justify text-sm text-red-500">
                                                        Session Chair:
                                                            Dr. Percy Opio
                                                            Board Chairman, KASNEB
                                                    </span>
                                                    <div class="flex items-center gap-1 mt-0.5">

                                                        <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                        leading-tight">
                                                            <strong>Speakers</strong>
                                                        </h6>
                                                        <div class="flex items-center gap-1 mt-0.5">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                 class="w-3 h-3 text-[#84C1D9] flex-shrink-0"
                                                                 viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                                 stroke-width="2">
                                                                <path
                                                                    d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                                <circle cx="12" cy="7" r="4"></circle>
                                                            </svg>
                                                            <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                            leading-tight">Mr. Walid Ben Salah
                                                                President, Pan African
                                                                Federation of Accountants</h6>
                                                        </div>
                                                        <div class="flex items-center gap-1 mt-0.5">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                 class="w-3 h-3 text-[#84C1D9] flex-shrink-0"
                                                                 viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                                 stroke-width="2">
                                                                <path
                                                                    d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                                <circle cx="12" cy="7" r="4"></circle>
                                                            </svg>
                                                            <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                            leading-tight">Mr. Walid Ben Salah
                                                                President, Pan African
                                                                Federation of Accountants</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="flex relative bg-[#84C1D9] rounded text-white ">
                                                <div class="relative">
                                                    <div
                                                        class="w-3 h-3 bg-[#ef4444] rounded-full shadow-lg shadow-[#ef4444]/50 flex-shrink-0 z-10 relative"></div>
                                                    <div
                                                        class="absolute inset-0 w-3 h-3 bg-[#ef4444] rounded-full opacity-30 animate-ping"></div>
                                                </div>
                                                <div class="ml-4 sm:ml-6 ">
                                                    <div class="text-xs sm:text-sm font-bold text-white
                                                    mb-1">10:30a.m. – 11:00a.m
                                                    </div>
                                                    <ul class="text-white text-sm sm:text-base space-y-2">
                                                        <li class="before:mr-2 before:text-red-500 before:content-['→']">
                                                            Exhibition Tour by Guests
                                                        </li>
                                                        <li class="before:mr-2 before:text-red-500 before:content-['→']">
                                                            Health Break
                                                        </li>
                                                    </ul>
                                                    <div class="flex items-center gap-1 mt-0.5">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                             class="w-3 h-3 text-white flex-shrink-0"
                                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                             stroke-width="2">
                                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                            <circle cx="12" cy="7" r="4"></circle>
                                                        </svg>
                                                        <h6 class="text-white text-xs italic font-normal
                                                        leading-tight">Dr. Percy Opio
                                                            Board Chairman, KASNEB</h6>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="flex relative">
                                                <div class="relative">
                                                    <div
                                                        class="w-3 h-3 bg-[#ef4444] rounded-full shadow-lg shadow-[#ef4444]/50 flex-shrink-0 z-10 relative"></div>
                                                    <div
                                                        class="absolute inset-0 w-3 h-3 bg-[#ef4444] rounded-full opacity-30 animate-ping"></div>
                                                </div>
                                                <div class="ml-4 sm:ml-6">
                                                    <div class="text-xs sm:text-sm font-bold text-[#84C1D9]
                                                    mb-1">11:00a.m. – 12:30p.m.
                                                    </div>
                                                    <h5 class="text-[#175C93] text-sm sm:text-base">
                                                        Parallel Sessions</h5>

                                                    <div class="block p-2 mb-2 sm:mb-4 sm:p-6 relative flex-1
                                                    overflow-y-auto bg-[#DAECF3] rounded-lg shadow-lg">
                                                        <ul>
                                                            <li><strong>Session 1:</strong>
                                                                Topic: Thriving in a World that
                                                                is Not Staying Still: Preparing
                                                                Professionals for What’s
                                                                Next?
                                                            </li>

                                                            <li>
                                                                <strong>Session Chair:</strong>
                                                                Prof. Charles Ochieng’
                                                                Ong’ondo
                                                                Chief Executive Officer
                                                                (CEO), Kenya Institute of
                                                                Curriculum Development
                                                            </li>
                                                        </ul>

                                                        <h2>Speaker:</h2>

                                                        <div class="flex items-center gap-1 mt-0.5">

                                                            <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                        leading-tight">
                                                                <strong>Speaker</strong>
                                                            </h6>
                                                            <div class="flex items-center gap-1 mt-0.5">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                     class="w-3 h-3 text-[#84C1D9] flex-shrink-0"
                                                                     viewBox="0 0 24 24" fill="none"
                                                                     stroke="currentColor"
                                                                     stroke-width="2">
                                                                    <path
                                                                        d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                                    <circle cx="12" cy="7" r="4"></circle>
                                                                </svg>
                                                                <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                            leading-tight">Mrs. Funmi Ekundayo, FCIS President,
                                                                    Corporate Secretaries International Association</h6>
                                                            </div>

                                                        </div>
                                                        <div class="flex items-center gap-1 mt-0.5">

                                                            <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                        leading-tight">
                                                                <strong>Discussants</strong>
                                                            </h6>
                                                            <div class="flex items-center gap-1 mt-0.5">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                     class="w-3 h-3 text-[#84C1D9] flex-shrink-0"
                                                                     viewBox="0 0 24 24" fill="none"
                                                                     stroke="currentColor"
                                                                     stroke-width="2">
                                                                    <path
                                                                        d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                                    <circle cx="12" cy="7" r="4"></circle>
                                                                </svg>
                                                                <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                            leading-tight">Dr. George Wakah
                                                                    Director of Administration,
                                                                    Finance and Corporate
                                                                    Affairs,
                                                                    Centre for Parliamentary
                                                                    Studies and Training (CPST)</h6>
                                                            </div>
                                                            <div class="flex items-center gap-1 mt-0.5">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                     class="w-3 h-3 text-[#84C1D9] flex-shrink-0"
                                                                     viewBox="0 0 24 24" fill="none"
                                                                     stroke="currentColor"
                                                                     stroke-width="2">
                                                                    <path
                                                                        d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                                    <circle cx="12" cy="7" r="4"></circle>
                                                                </svg>
                                                                <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                            leading-tight">Prof. Nura Mohamed
                                                                    Director General, Kenya
                                                                    School of Government</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="block p-2 mb-2 sm:mb-4 sm:p-6 relative flex-1
                                                    overflow-y-auto bg-[#DAECF3] rounded-lg shadow-lg">
                                                        <ul>
                                                            <li><strong>Session 2:</strong>
                                                                Topic: The Smart City
                                                            </li>

                                                            <li>
                                                                <strong>Session Chair:</strong>
                                                                Mr. David Mugonyi, EBS
                                                                Director General,
                                                                Communications Authority
                                                            </li>
                                                        </ul>

                                                        <h2>Speaker:</h2>

                                                        <div class="flex items-center gap-1 mt-0.5">

                                                            <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                        leading-tight">
                                                                <strong>Speaker</strong>
                                                            </h6>
                                                            <div class="flex items-center gap-1 mt-0.5">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                     class="w-3 h-3 text-[#84C1D9] flex-shrink-0"
                                                                     viewBox="0 0 24 24" fill="none"
                                                                     stroke="currentColor"
                                                                     stroke-width="2">
                                                                    <path
                                                                        d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                                    <circle cx="12" cy="7" r="4"></circle>
                                                                </svg>
                                                                <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                            leading-tight">Ms. Anacláudia Rossbach
                                                                    Executive Director, UNHabitat in Nairobi</h6>
                                                            </div>

                                                        </div>
                                                        <div class="flex items-center gap-1 mt-0.5">

                                                            <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                        leading-tight">
                                                                <strong>Discussants</strong>
                                                            </h6>
                                                            <div class="flex items-center gap-1 mt-0.5">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                     class="w-3 h-3 text-[#84C1D9] flex-shrink-0"
                                                                     viewBox="0 0 24 24" fill="none"
                                                                     stroke="currentColor"
                                                                     stroke-width="2">
                                                                    <path
                                                                        d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                                    <circle cx="12" cy="7" r="4"></circle>
                                                                </svg>
                                                                <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                            leading-tight">Mr. John Okwiri, OGW, MBA,
                                                                    MCIPS
                                                                    Chief Executive Officer,
                                                                    Technopolis Development
                                                                    Authority</h6>
                                                            </div>
                                                            <div class="flex items-center gap-1 mt-0.5">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                     class="w-3 h-3 text-[#84C1D9] flex-shrink-0"
                                                                     viewBox="0 0 24 24" fill="none"
                                                                     stroke="currentColor"
                                                                     stroke-width="2">
                                                                    <path
                                                                        d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                                    <circle cx="12" cy="7" r="4"></circle>
                                                                </svg>
                                                                <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                            leading-tight">Dr. Kenneth Chelule, P. Eng,
                                                                    FIET, EBS
                                                                    Chief Executive Office,
                                                                    Special Economic Zones
                                                                    Authority</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="block p-2 mb-2 sm:mb-4 sm:p-6 relative flex-1
                                                    overflow-y-auto bg-[#DAECF3] rounded-lg shadow-lg">
                                                        <ul>
                                                            <li><strong>Session 3:</strong>
                                                                Topic: Geopolitical Conflicts
                                                                Driving High Cost of Living:
                                                                Navigating Crisis the
                                                                Professional Way
                                                            </li>

                                                            <li>
                                                                <strong>Session Chair:</strong>
                                                                Prof. Isaiah I.C. Wakindiki
                                                                Vice Chancelor, KCA
                                                                University
                                                            </li>
                                                        </ul>

                                                        <h2>Speaker:</h2>

                                                        <div class="flex items-center gap-1 mt-0.5">

                                                            <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                        leading-tight">
                                                                <strong>Speaker</strong>
                                                            </h6>
                                                            <div class="flex items-center gap-1 mt-0.5">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                     class="w-3 h-3 text-[#84C1D9] flex-shrink-0"
                                                                     viewBox="0 0 24 24" fill="none"
                                                                     stroke="currentColor"
                                                                     stroke-width="2">
                                                                    <path
                                                                        d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                                    <circle cx="12" cy="7" r="4"></circle>
                                                                </svg>
                                                                <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                            leading-tight">Dr. Workneh Gebeyehu
                                                                    Executive Director,
                                                                    Intergovernmental
                                                                    Authority on Development</h6>
                                                            </div>

                                                        </div>
                                                        <div class="flex items-center gap-1 mt-0.5">

                                                            <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                        leading-tight">
                                                                <strong>Discussants</strong>
                                                            </h6>
                                                            <div class="flex items-center gap-1 mt-0.5">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                     class="w-3 h-3 text-[#84C1D9] flex-shrink-0"
                                                                     viewBox="0 0 24 24" fill="none"
                                                                     stroke="currentColor"
                                                                     stroke-width="2">
                                                                    <path
                                                                        d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                                    <circle cx="12" cy="7" r="4"></circle>
                                                                </svg>
                                                                <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                            leading-tight">Dr. Korir Sing'oei, Principal Secretary, Foreign
                                                                    Affairs</h6>
                                                            </div>
                                                            <div class="flex items-center gap-1 mt-0.5">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                     class="w-3 h-3 text-[#84C1D9] flex-shrink-0"
                                                                     viewBox="0 0 24 24" fill="none"
                                                                     stroke="currentColor"
                                                                     stroke-width="2">
                                                                    <path
                                                                        d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                                    <circle cx="12" cy="7" r="4"></circle>
                                                                </svg>
                                                                <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                            leading-tight">Ms. Regina Akoth Ombam
                                                                    Principal Secretary, State
                                                                    Department for Trade</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="flex relative bg-[#84C1D9] rounded text-white ">
                                                <div class="relative">
                                                    <div
                                                        class="w-3 h-3 bg-[#ef4444] rounded-full shadow-lg shadow-[#ef4444]/50 flex-shrink-0 z-10 relative"></div>
                                                    <div
                                                        class="absolute inset-0 w-3 h-3 bg-[#ef4444] rounded-full opacity-30 animate-ping"></div>
                                                </div>
                                                <div class="ml-4 sm:ml-6 ">
                                                    <div class="text-xs sm:text-sm font-bold text-white
                                                    mb-1">12:30p.m. – 1:00p.m.
                                                    </div>
                                                    <ul class="text-white text-sm sm:text-base space-y-2">
                                                        <li class="before:mr-2 before:text-red-500 before:content-['→']">
                                                            Networking & Tour of
                                                            Exhibition
                                                        </li>
                                                    </ul>
                                                    <div class="flex items-center gap-1 mt-0.5">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                             class="w-3 h-3 text-white flex-shrink-0"
                                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                             stroke-width="2">
                                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                            <circle cx="12" cy="7" r="4"></circle>
                                                        </svg>
                                                        <h6 class="text-white text-xs italic font-normal
                                                        leading-tight">All</h6>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="flex relative bg-[#84C1D9] rounded text-white ">
                                                <div class="relative">
                                                    <div
                                                        class="w-3 h-3 bg-[#ef4444] rounded-full shadow-lg shadow-[#ef4444]/50 flex-shrink-0 z-10 relative"></div>
                                                    <div
                                                        class="absolute inset-0 w-3 h-3 bg-[#ef4444] rounded-full opacity-30 animate-ping"></div>
                                                </div>
                                                <div class="ml-4 sm:ml-6 ">
                                                    <div class="text-xs sm:text-sm font-bold text-white
                                                    mb-1">1:00p.m - 2:00pm
                                                    </div>
                                                    <ul class="text-white text-sm sm:text-base space-y-2">
                                                        <li class="before:mr-2 before:text-red-500 before:content-['→']">
                                                            Lunch & Networking
                                                        </li>
                                                    </ul>
                                                    <div class="flex items-center gap-1 mt-0.5">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                             class="w-3 h-3 text-white flex-shrink-0"
                                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                             stroke-width="2">
                                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                            <circle cx="12" cy="7" r="4"></circle>
                                                        </svg>
                                                        <h6 class="text-white text-xs italic font-normal
                                                        leading-tight">All</h6>
                                                    </div>
                                                </div>
                                            </div>




                                        </div>
                                    </div>
                                </div>
                                <div class="bg-white rounded-xl shadow-xl overflow-hidden flex flex-col"
                                     style="height:680px">
                                    <div
                                        class="bg-gradient-to-r from-[#175C93] to-[#7BC7F0] text-white p-4 sm:p-6
                                        flex-shrink-0">
                                        <h4 class="text-lg sm:text-xl font-bold">Day TWO </h4>
                                        <p class="text-xs sm:text-sm opacity-90 mt-1">Afternoon session</p>
                                    </div>
                                    <div class="p-4 sm:p-6 relative flex-1 overflow-y-auto">
                                        <div class="space-y-4 sm:space-y-6 relative">
                                            <div
                                                class="absolute left-[5px] top-[6px] bottom-[6px] w-0.5 bg-[#ef4444]">

                                            </div>
                                            <div class="flex relative">
                                                <div class="relative">
                                                    <div
                                                        class="w-3 h-3 bg-[#ef4444] rounded-full shadow-lg shadow-[#ef4444]/50 flex-shrink-0 z-10 relative"></div>
                                                    <div
                                                        class="absolute inset-0 w-3 h-3 bg-[#ef4444] rounded-full opacity-30 animate-ping"></div>
                                                </div>
                                                <div class="ml-4 sm:ml-6 ">
                                                    <div class="text-xs sm:text-sm font-bold text-[#84C1D9]
                                                    mb-1">2:00p.m. – 2:30p.m.
                                                    </div>
                                                    <ul class="text-[#84C1D9] text-sm sm:text-base space-y-2">
                                                        <li class="before:mr-2 before:text-red-500 before:content-['→']">
                                                            The debate: Can Robots Be
                                                            Professional?
                                                        </li>
                                                    </ul>
                                                    <div class="flex items-center gap-1 mt-0.5">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                             class="w-3 h-3 text-[#84C1D9]  flex-shrink-0"
                                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                             stroke-width="2">
                                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                            <circle cx="12" cy="7" r="4"></circle>
                                                        </svg>
                                                        <h6 class="text-[#84C1D9]  text-xs italic font-normal
                                                        leading-tight">KCA University</h6>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="flex relative">
                                                <div class="relative">
                                                    <div
                                                        class="w-3 h-3 bg-[#ef4444] rounded-full shadow-lg shadow-[#ef4444]/50 flex-shrink-0 z-10 relative"></div>
                                                    <div
                                                        class="absolute inset-0 w-3 h-3 bg-[#ef4444] rounded-full opacity-30 animate-ping"></div>
                                                </div>
                                                <div class="ml-4 sm:ml-6">
                                                    <div class="text-xs sm:text-sm font-bold text-[#84C1D9]
                                                    mb-1">2:30p.m. – 4:00p.m
                                                    </div>
                                                    <h5 class="text-[#175C93] text-sm sm:text-base">
                                                        Parallel Sessions</h5>

                                                    <div class="block p-2 mb-2 sm:mb-4 sm:p-6 relative flex-1
                                                    overflow-y-auto bg-[#DAECF3] rounded-lg shadow-lg">
                                                        <ul>
                                                            <li><strong>Masterclass:</strong>
                                                                Beyond the
                                                                Paycheck: Building Wealth
                                                                That Lasts for Generations
                                                            </li>

                                                            <li>
                                                                <strong>Session Chair:</strong>
                                                                Dr Jonah Aiyabei, Ph.D
                                                                Chief Executive Officer,
                                                                Public Service
                                                                Superannuation Fund
                                                                (PSSF)
                                                            </li>
                                                        </ul>


                                                        <div class="flex items-center gap-1 mt-0.5">

                                                            <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                        leading-tight">
                                                                <strong>Speaker</strong>
                                                            </h6>
                                                            <div class="flex items-center gap-1 mt-0.5">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                     class="w-3 h-3 text-[#84C1D9] flex-shrink-0"
                                                                     viewBox="0 0 24 24" fill="none"
                                                                     stroke="currentColor"
                                                                     stroke-width="2">
                                                                    <path
                                                                        d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                                    <circle cx="12" cy="7" r="4"></circle>
                                                                </svg>
                                                                <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                            leading-tight">Mr. Philip Lopokoiyit
                                                                    Chief Executive Officer,
                                                                    ICEA Lion Group</h6>
                                                            </div>

                                                        </div>

                                                        <h3>
                                                            <strong>Panel Session:</strong> Evolving
                                                            Professional Standards in
                                                            Response to Technological
                                                            Changes
                                                        </h3>

                                                        <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                        leading-tight">
                                                            <strong>Panellists</strong>
                                                        </h6>
                                                        <div class="flex items-center gap-1 mt-0.5">

                                                            <div class="flex items-center gap-1 mt-0.5">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                     class="w-3 h-3 text-[#84C1D9] flex-shrink-0"
                                                                     viewBox="0 0 24 24" fill="none"
                                                                     stroke="currentColor"
                                                                     stroke-width="2">
                                                                    <path
                                                                        d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                                    <circle cx="12" cy="7" r="4"></circle>
                                                                </svg>
                                                                <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                            leading-tight">Prof. CPA Elizabeth N.
                                                                    Kalunda-Muvui, PhD
                                                                    President, Institute of
                                                                    Certified Public
                                                                    Accountants of Kenya</h6>
                                                            </div>

                                                        </div>
                                                        <div class="flex items-center gap-1 mt-0.5">

                                                            <div class="flex items-center gap-1 mt-0.5">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                     class="w-3 h-3 text-[#84C1D9] flex-shrink-0"
                                                                     viewBox="0 0 24 24" fill="none"
                                                                     stroke="currentColor"
                                                                     stroke-width="2">
                                                                    <path
                                                                        d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                                    <circle cx="12" cy="7" r="4"></circle>
                                                                </svg>
                                                                <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                            leading-tight">FCS Jacqueline Waihenya
                                                                    Chairperson, Institute of
                                                                    Certified Secretaries of
                                                                    Kenya</h6>
                                                            </div>

                                                        </div>
                                                        <div class="flex items-center gap-1 mt-0.5">

                                                            <div class="flex items-center gap-1 mt-0.5">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                     class="w-3 h-3 text-[#84C1D9] flex-shrink-0"
                                                                     viewBox="0 0 24 24" fill="none"
                                                                     stroke="currentColor"
                                                                     stroke-width="2">
                                                                    <path
                                                                        d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                                    <circle cx="12" cy="7" r="4"></circle>
                                                                </svg>
                                                                <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                            leading-tight">Mr. Charles Kanjama
                                                                    President, Law Society of
                                                                    Kenya</h6>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="block p-2 mb-2 sm:mb-4 sm:p-6 relative flex-1
                                                    overflow-y-auto bg-[#DAECF3] rounded-lg shadow-lg">
                                                        <ul>
                                                            <li>
                                                                Topic: Election Readiness,
                                                                Integrity and Resilience:
                                                                Global Lessons
                                                            </li>

                                                            <li>
                                                                <strong>Session Chair:</strong>
                                                                Geoffrey Odundo
                                                                Group Managing Director &
                                                                Chief Executive Officer,
                                                                Nation Media Group
                                                            </li>
                                                        </ul>

                                                        <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                        leading-tight">
                                                            <strong>Panellists</strong>
                                                        </h6>
                                                        <div class="flex items-center gap-1 mt-0.5">

                                                            <div class="flex items-center gap-1 mt-0.5">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                     class="w-3 h-3 text-[#84C1D9] flex-shrink-0"
                                                                     viewBox="0 0 24 24" fill="none"
                                                                     stroke="currentColor"
                                                                     stroke-width="2">
                                                                    <path
                                                                        d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                                    <circle cx="12" cy="7" r="4"></circle>
                                                                </svg>
                                                                <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                            leading-tight">Dr. Garry Conille
                                                                    United Nations Resident
                                                                    Coordinator, Kenya</h6>
                                                            </div>

                                                        </div>
                                                        <div class="flex items-center gap-1 mt-0.5">

                                                            <div class="flex items-center gap-1 mt-0.5">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                     class="w-3 h-3 text-[#84C1D9] flex-shrink-0"
                                                                     viewBox="0 0 24 24" fill="none"
                                                                     stroke="currentColor"
                                                                     stroke-width="2">
                                                                    <path
                                                                        d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                                    <circle cx="12" cy="7" r="4"></circle>
                                                                </svg>
                                                                <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                            leading-tight">Mr. Jean-Luc Stalon
                                                                    UNDP Resident
                                                                    Representative, Kenya</h6>
                                                            </div>

                                                        </div>
                                                        <div class="flex items-center gap-1 mt-0.5">

                                                            <div class="flex items-center gap-1 mt-0.5">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                     class="w-3 h-3 text-[#84C1D9] flex-shrink-0"
                                                                     viewBox="0 0 24 24" fill="none"
                                                                     stroke="currentColor"
                                                                     stroke-width="2">
                                                                    <path
                                                                        d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                                    <circle cx="12" cy="7" r="4"></circle>
                                                                </svg>
                                                                <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                            leading-tight">Ms. Henriette Geiger
                                                                    the European Union
                                                                    Ambassador to Kenya</h6>
                                                            </div>

                                                        </div>
                                                        <div class="flex items-center gap-1 mt-0.5">

                                                            <div class="flex items-center gap-1 mt-0.5">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                     class="w-3 h-3 text-[#84C1D9] flex-shrink-0"
                                                                     viewBox="0 0 24 24" fill="none"
                                                                     stroke="currentColor"
                                                                     stroke-width="2">
                                                                    <path
                                                                        d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                                    <circle cx="12" cy="7" r="4"></circle>
                                                                </svg>
                                                                <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                            leading-tight">Ms. Susan M. Burns
                                                                    Chargé d’Affaires,
                                                                    United States of America,
                                                                    Embassy in Nairobi</h6>
                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="flex relative bg-[#84C1D9] rounded text-white ">
                                                <div class="relative">
                                                    <div
                                                        class="w-3 h-3 bg-[#ef4444] rounded-full shadow-lg shadow-[#ef4444]/50 flex-shrink-0 z-10 relative"></div>
                                                    <div
                                                        class="absolute inset-0 w-3 h-3 bg-[#ef4444] rounded-full opacity-30 animate-ping"></div>
                                                </div>
                                                <div class="ml-4 sm:ml-6 ">
                                                    <div class="text-xs sm:text-sm font-bold text-white
                                                    mb-1">4:00p.m. – 5:00p.m
                                                    </div>
                                                    <ul class="text-white text-sm sm:text-base space-y-2">

                                                        <li class="before:mr-2 before:text-red-500 before:content-['→']">
                                                            Health Break
                                                        </li>
                                                    </ul>
                                                    <div class="flex items-center gap-1 mt-0.5">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                             class="w-3 h-3 text-white flex-shrink-0"
                                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                             stroke-width="2">
                                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                            <circle cx="12" cy="7" r="4"></circle>
                                                        </svg>
                                                        <h6 class="text-white text-xs italic font-normal
                                                        leading-tight">Dr. Percy Opio
                                                            Board Chairman, KASNEB</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex relative bg-[#84C1D9] rounded text-white ">
                                                <div class="relative">
                                                    <div
                                                        class="w-3 h-3 bg-[#ef4444] rounded-full shadow-lg shadow-[#ef4444]/50 flex-shrink-0 z-10 relative"></div>
                                                    <div
                                                        class="absolute inset-0 w-3 h-3 bg-[#ef4444] rounded-full opacity-30 animate-ping"></div>
                                                </div>
                                                <div class="ml-4 sm:ml-6 ">
                                                    <div class="text-xs sm:text-sm font-bold text-white
                                                    mb-1">5:00p.m. – 6:00p.m
                                                    </div>
                                                    <ul class="text-white text-sm sm:text-base space-y-2">

                                                        <li class="before:mr-2 before:text-red-500 before:content-['→']">
                                                            Networking & Tour of
                                                            Exhibition
                                                        </li>
                                                    </ul>
                                                    <div class="flex items-center gap-1 mt-0.5">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                             class="w-3 h-3 text-white flex-shrink-0"
                                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                             stroke-width="2">
                                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                            <circle cx="12" cy="7" r="4"></circle>
                                                        </svg>
                                                        <h6 class="text-white text-xs italic font-normal
                                                        leading-tight">All</h6>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- Day 3 -->
                        <section x-cloak x-show="tabs.find(tab => tab.id === 3).active || mobileActiveTab == 3">
                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 sm:gap-12">
                                <div class="bg-white rounded-xl shadow-xl overflow-hidden flex flex-col"
                                     style="height:680px">
                                    <div
                                        class="bg-gradient-to-r from-[#175C93] to-[#7BC7F0] text-white p-4 sm:p-6
                                        flex-shrink-0">
                                        <h4 class="text-lg sm:text-xl font-bold">DAY THREE: WEDNESDAY, 16 SEPTEMBER
                                            2026</h4>
                                        <p class="text-xs sm:text-sm opacity-90 mt-1">Morning session</p>
                                    </div>
                                    <div class="p-4 sm:p-6 relative flex-1 overflow-y-auto">
                                        <div class="space-y-4 sm:space-y-6 relative">
                                            <div
                                                class="absolute left-[5px] top-[6px] bottom-[6px] w-0.5 bg-[#ef4444]">

                                            </div>
                                            <div class="flex relative">
                                                <div class="relative">
                                                    <div
                                                        class="w-3 h-3 bg-[#ef4444] rounded-full shadow-lg shadow-[#ef4444]/50 flex-shrink-0 z-10 relative"></div>
                                                    <div
                                                        class="absolute inset-0 w-3 h-3 bg-[#ef4444] rounded-full opacity-30 animate-ping"></div>
                                                </div>
                                                <div class="ml-4 sm:ml-6">
                                                    <div class="text-xs sm:text-sm font-bold text-[#84C1D9] mb-1">
                                                        8:00a.m. – 8:30a.m.
                                                    </div>
                                                    <h5 class="text-[#1a365d] text-sm sm:text-base">Registration and
                                                        Networking
                                                        Breakfast</h5>
                                                    <div class="flex items-center gap-1 mt-0.5">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                             class="w-3 h-3 text-[#84C1D9] flex-shrink-0"
                                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                             stroke-width="2">
                                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                            <circle cx="12" cy="7" r="4"></circle>
                                                        </svg>
                                                        <h6 class="text-[#84C1D9] text-xs italic font-normal leading-tight">
                                                            All</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex  relative">

                                                <div class="ml-4 sm:ml-6">

                                                    <h5 class="text-[#1a365d] text-sm sm:text-base">Setting the Stage:
                                                        National Anthem & Prayers </h5>
                                                    <div class="flex items-center gap-1 mt-0.5">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                             class="w-3 h-3 text-[#84C1D9] flex-shrink-0"
                                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                             stroke-width="2">
                                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                            <circle cx="12" cy="7" r="4"></circle>
                                                        </svg>
                                                        <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                        leading-tight">Johnson Mwakazi,
                                                            Master of Ceremony</h6>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="flex  relative">

                                                <div class="ml-4 sm:ml-6">

                                                    <h5 class="text-[#1a365d] text-sm sm:text-base">Welcome Remarks
                                                        (10 minutes)</h5>
                                                    <div class="flex items-center gap-1 mt-0.5">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                             class="w-3 h-3 text-[#84C1D9] flex-shrink-0"
                                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                             stroke-width="2">
                                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                            <circle cx="12" cy="7" r="4"></circle>
                                                        </svg>
                                                        <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                        leading-tight">Prof. Nicholas K. Letting’,
                                                            Ph.D, EBS, HSC
                                                            Chief Executive Officer,
                                                            KASNEB</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex  relative">

                                                <div class="ml-4 sm:ml-6">

                                                    <h5 class="text-[#1a365d] text-sm sm:text-base">Opening Remarks
                                                        (15 minutes)</h5>
                                                    <div class="flex items-center gap-1 mt-0.5">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                             class="w-3 h-3 text-[#84C1D9] flex-shrink-0"
                                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                             stroke-width="2">
                                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                            <circle cx="12" cy="7" r="4"></circle>
                                                        </svg>
                                                        <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                        leading-tight">Dr. Percy Opio
                                                            Board Chairman, KASNEB</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex relative">

                                                <div class="ml-4 sm:ml-6">

                                                    <h5 class="text-[#1a365d] text-sm sm:text-base">Address
                                                        Topic: Professionals
                                                        Advancing Africa’s Global
                                                        Competitiveness</h5>
                                                    <div class="flex items-center gap-1 mt-0.5">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                             class="w-3 h-3 text-[#84C1D9] flex-shrink-0"
                                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                             stroke-width="2">
                                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                            <circle cx="12" cy="7" r="4"></circle>
                                                        </svg>
                                                        <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                        leading-tight">Mr. Walid Ben Salah
                                                            President, Pan African
                                                            Federation of Accountants</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex relative">
                                                <div class="relative">
                                                    <div
                                                        class="w-3 h-3 bg-[#ef4444] rounded-full shadow-lg shadow-[#ef4444]/50 flex-shrink-0 z-10 relative"></div>
                                                    <div
                                                        class="absolute inset-0 w-3 h-3 bg-[#ef4444] rounded-full opacity-30 animate-ping"></div>
                                                </div>
                                                <div class="ml-4 sm:ml-6">
                                                    <div class="text-xs sm:text-sm font-bold text-[#84C1D9]
                                                    mb-1">8:30a.m. – 10:30a.m.
                                                    </div>
                                                    <h5 class="text-[#1a365d] text-sm sm:text-base">
                                                        Opening Keynote Address
                                                        Topic: The Success Mindset
                                                        as A Competitive Advantage
                                                        (20 minutes)</h5>
                                                    <div class="flex items-center gap-1 mt-0.5">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                             class="w-3 h-3 text-[#84C1D9] flex-shrink-0"
                                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                             stroke-width="2">
                                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                            <circle cx="12" cy="7" r="4"></circle>
                                                        </svg>
                                                        <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                        leading-tight">Mr. Paul Russo, EBS
                                                            Group CEO, KCB Bank</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex relative">

                                                <div class="ml-4 sm:ml-6">
                                                    <h4 class="text-[#1a365d] text-sm sm:text-base">Fireside Chat</h4>
                                                    <h5 class="text-[#1a365d] text-sm sm:text-base">
                                                        Topic: The Reinvented
                                                        Leader: Leading Evolving
                                                        Professionals in a Dynamic
                                                        Work Environment
                                                        (45 minutes)
                                                    </h5>
                                                    <span class="py-20 text-justify text-sm text-red-500">
                                                        Session Chair:
                                                            Dr. Percy Opio
                                                            Board Chairman, KASNEB
                                                    </span>
                                                    <div class="flex items-center gap-1 mt-0.5">

                                                        <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                        leading-tight">
                                                            <strong>Speakers</strong>
                                                        </h6>
                                                        <div class="flex items-center gap-1 mt-0.5">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                 class="w-3 h-3 text-[#84C1D9] flex-shrink-0"
                                                                 viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                                 stroke-width="2">
                                                                <path
                                                                    d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                                <circle cx="12" cy="7" r="4"></circle>
                                                            </svg>
                                                            <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                            leading-tight">Mr. Walid Ben Salah
                                                                President, Pan African
                                                                Federation of Accountants</h6>
                                                        </div>
                                                        <div class="flex items-center gap-1 mt-0.5">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                 class="w-3 h-3 text-[#84C1D9] flex-shrink-0"
                                                                 viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                                 stroke-width="2">
                                                                <path
                                                                    d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                                <circle cx="12" cy="7" r="4"></circle>
                                                            </svg>
                                                            <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                            leading-tight">Mr. Walid Ben Salah
                                                                President, Pan African
                                                                Federation of Accountants</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="flex relative bg-[#84C1D9] rounded text-white ">
                                                <div class="relative">
                                                    <div
                                                        class="w-3 h-3 bg-[#ef4444] rounded-full shadow-lg shadow-[#ef4444]/50 flex-shrink-0 z-10 relative"></div>
                                                    <div
                                                        class="absolute inset-0 w-3 h-3 bg-[#ef4444] rounded-full opacity-30 animate-ping"></div>
                                                </div>
                                                <div class="ml-4 sm:ml-6 ">
                                                    <div class="text-xs sm:text-sm font-bold text-white
                                                    mb-1">10:30a.m. – 11:00a.m
                                                    </div>
                                                    <ul class="text-white text-sm sm:text-base space-y-2">
                                                        <li class="before:mr-2 before:text-red-500 before:content-['→']">
                                                            Exhibition Tour by Guests
                                                        </li>
                                                        <li class="before:mr-2 before:text-red-500 before:content-['→']">
                                                            Health Break
                                                        </li>
                                                    </ul>
                                                    <div class="flex items-center gap-1 mt-0.5">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                             class="w-3 h-3 text-white flex-shrink-0"
                                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                             stroke-width="2">
                                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                            <circle cx="12" cy="7" r="4"></circle>
                                                        </svg>
                                                        <h6 class="text-white text-xs italic font-normal
                                                        leading-tight">Dr. Percy Opio
                                                            Board Chairman, KASNEB</h6>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="flex relative">
                                                <div class="relative">
                                                    <div
                                                        class="w-3 h-3 bg-[#ef4444] rounded-full shadow-lg shadow-[#ef4444]/50 flex-shrink-0 z-10 relative"></div>
                                                    <div
                                                        class="absolute inset-0 w-3 h-3 bg-[#ef4444] rounded-full opacity-30 animate-ping"></div>
                                                </div>
                                                <div class="ml-4 sm:ml-6">
                                                    <div class="text-xs sm:text-sm font-bold text-[#84C1D9]
                                                    mb-1">11:00a.m. – 12:30p.m.
                                                    </div>
                                                    <h5 class="text-[#175C93] text-sm sm:text-base">
                                                        Parallel Sessions</h5>

                                                    <div class="block p-2 mb-2 sm:mb-4 sm:p-6 relative flex-1
                                                    overflow-y-auto bg-[#DAECF3] rounded-lg shadow-lg">
                                                        <ul>
                                                            <li><strong>Session 1:</strong>
                                                                Topic: Thriving in a World that
                                                                is Not Staying Still: Preparing
                                                                Professionals for What’s
                                                                Next?
                                                            </li>

                                                            <li>
                                                                <strong>Session Chair:</strong>
                                                                Prof. Charles Ochieng’
                                                                Ong’ondo
                                                                Chief Executive Officer
                                                                (CEO), Kenya Institute of
                                                                Curriculum Development
                                                            </li>
                                                        </ul>

                                                        <h2>Speaker:</h2>

                                                        <div class="flex items-center gap-1 mt-0.5">

                                                            <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                        leading-tight">
                                                                <strong>Speaker</strong>
                                                            </h6>
                                                            <div class="flex items-center gap-1 mt-0.5">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                     class="w-3 h-3 text-[#84C1D9] flex-shrink-0"
                                                                     viewBox="0 0 24 24" fill="none"
                                                                     stroke="currentColor"
                                                                     stroke-width="2">
                                                                    <path
                                                                        d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                                    <circle cx="12" cy="7" r="4"></circle>
                                                                </svg>
                                                                <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                            leading-tight">Mrs. Funmi Ekundayo, FCIS President,
                                                                    Corporate Secretaries International Association</h6>
                                                            </div>

                                                        </div>
                                                        <div class="flex items-center gap-1 mt-0.5">

                                                            <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                        leading-tight">
                                                                <strong>Discussants</strong>
                                                            </h6>
                                                            <div class="flex items-center gap-1 mt-0.5">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                     class="w-3 h-3 text-[#84C1D9] flex-shrink-0"
                                                                     viewBox="0 0 24 24" fill="none"
                                                                     stroke="currentColor"
                                                                     stroke-width="2">
                                                                    <path
                                                                        d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                                    <circle cx="12" cy="7" r="4"></circle>
                                                                </svg>
                                                                <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                            leading-tight">Dr. George Wakah
                                                                    Director of Administration,
                                                                    Finance and Corporate
                                                                    Affairs,
                                                                    Centre for Parliamentary
                                                                    Studies and Training (CPST)</h6>
                                                            </div>
                                                            <div class="flex items-center gap-1 mt-0.5">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                     class="w-3 h-3 text-[#84C1D9] flex-shrink-0"
                                                                     viewBox="0 0 24 24" fill="none"
                                                                     stroke="currentColor"
                                                                     stroke-width="2">
                                                                    <path
                                                                        d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                                    <circle cx="12" cy="7" r="4"></circle>
                                                                </svg>
                                                                <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                            leading-tight">Prof. Nura Mohamed
                                                                    Director General, Kenya
                                                                    School of Government</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="block p-2 mb-2 sm:mb-4 sm:p-6 relative flex-1
                                                    overflow-y-auto bg-[#DAECF3] rounded-lg shadow-lg">
                                                        <ul>
                                                            <li><strong>Session 2:</strong>
                                                                Topic: The Smart City
                                                            </li>

                                                            <li>
                                                                <strong>Session Chair:</strong>
                                                                Mr. David Mugonyi, EBS
                                                                Director General,
                                                                Communications Authority
                                                            </li>
                                                        </ul>

                                                        <h2>Speaker:</h2>

                                                        <div class="flex items-center gap-1 mt-0.5">

                                                            <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                        leading-tight">
                                                                <strong>Speaker</strong>
                                                            </h6>
                                                            <div class="flex items-center gap-1 mt-0.5">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                     class="w-3 h-3 text-[#84C1D9] flex-shrink-0"
                                                                     viewBox="0 0 24 24" fill="none"
                                                                     stroke="currentColor"
                                                                     stroke-width="2">
                                                                    <path
                                                                        d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                                    <circle cx="12" cy="7" r="4"></circle>
                                                                </svg>
                                                                <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                            leading-tight">Ms. Anacláudia Rossbach
                                                                    Executive Director, UNHabitat in Nairobi</h6>
                                                            </div>

                                                        </div>
                                                        <div class="flex items-center gap-1 mt-0.5">

                                                            <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                        leading-tight">
                                                                <strong>Discussants</strong>
                                                            </h6>
                                                            <div class="flex items-center gap-1 mt-0.5">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                     class="w-3 h-3 text-[#84C1D9] flex-shrink-0"
                                                                     viewBox="0 0 24 24" fill="none"
                                                                     stroke="currentColor"
                                                                     stroke-width="2">
                                                                    <path
                                                                        d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                                    <circle cx="12" cy="7" r="4"></circle>
                                                                </svg>
                                                                <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                            leading-tight">Mr. John Okwiri, OGW, MBA,
                                                                    MCIPS
                                                                    Chief Executive Officer,
                                                                    Technopolis Development
                                                                    Authority</h6>
                                                            </div>
                                                            <div class="flex items-center gap-1 mt-0.5">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                     class="w-3 h-3 text-[#84C1D9] flex-shrink-0"
                                                                     viewBox="0 0 24 24" fill="none"
                                                                     stroke="currentColor"
                                                                     stroke-width="2">
                                                                    <path
                                                                        d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                                    <circle cx="12" cy="7" r="4"></circle>
                                                                </svg>
                                                                <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                            leading-tight">Dr. Kenneth Chelule, P. Eng,
                                                                    FIET, EBS
                                                                    Chief Executive Office,
                                                                    Special Economic Zones
                                                                    Authority</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="block p-2 mb-2 sm:mb-4 sm:p-6 relative flex-1
                                                    overflow-y-auto bg-[#DAECF3] rounded-lg shadow-lg">
                                                        <ul>
                                                            <li><strong>Session 3:</strong>
                                                                Topic: Geopolitical Conflicts
                                                                Driving High Cost of Living:
                                                                Navigating Crisis the
                                                                Professional Way
                                                            </li>

                                                            <li>
                                                                <strong>Session Chair:</strong>
                                                                Prof. Isaiah I.C. Wakindiki
                                                                Vice Chancelor, KCA
                                                                University
                                                            </li>
                                                        </ul>

                                                        <h2>Speaker:</h2>

                                                        <div class="flex items-center gap-1 mt-0.5">

                                                            <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                        leading-tight">
                                                                <strong>Speaker</strong>
                                                            </h6>
                                                            <div class="flex items-center gap-1 mt-0.5">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                     class="w-3 h-3 text-[#84C1D9] flex-shrink-0"
                                                                     viewBox="0 0 24 24" fill="none"
                                                                     stroke="currentColor"
                                                                     stroke-width="2">
                                                                    <path
                                                                        d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                                    <circle cx="12" cy="7" r="4"></circle>
                                                                </svg>
                                                                <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                            leading-tight">Dr. Workneh Gebeyehu
                                                                    Executive Director,
                                                                    Intergovernmental
                                                                    Authority on Development</h6>
                                                            </div>

                                                        </div>
                                                        <div class="flex items-center gap-1 mt-0.5">

                                                            <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                        leading-tight">
                                                                <strong>Discussants</strong>
                                                            </h6>
                                                            <div class="flex items-center gap-1 mt-0.5">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                     class="w-3 h-3 text-[#84C1D9] flex-shrink-0"
                                                                     viewBox="0 0 24 24" fill="none"
                                                                     stroke="currentColor"
                                                                     stroke-width="2">
                                                                    <path
                                                                        d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                                    <circle cx="12" cy="7" r="4"></circle>
                                                                </svg>
                                                                <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                            leading-tight">Dr. Korir Sing'oei, Principal Secretary, Foreign
                                                                    Affairs</h6>
                                                            </div>
                                                            <div class="flex items-center gap-1 mt-0.5">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                     class="w-3 h-3 text-[#84C1D9] flex-shrink-0"
                                                                     viewBox="0 0 24 24" fill="none"
                                                                     stroke="currentColor"
                                                                     stroke-width="2">
                                                                    <path
                                                                        d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                                    <circle cx="12" cy="7" r="4"></circle>
                                                                </svg>
                                                                <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                            leading-tight">Ms. Regina Akoth Ombam
                                                                    Principal Secretary, State
                                                                    Department for Trade</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="flex relative bg-[#84C1D9] rounded text-white ">
                                                <div class="relative">
                                                    <div
                                                        class="w-3 h-3 bg-[#ef4444] rounded-full shadow-lg shadow-[#ef4444]/50 flex-shrink-0 z-10 relative"></div>
                                                    <div
                                                        class="absolute inset-0 w-3 h-3 bg-[#ef4444] rounded-full opacity-30 animate-ping"></div>
                                                </div>
                                                <div class="ml-4 sm:ml-6 ">
                                                    <div class="text-xs sm:text-sm font-bold text-white
                                                    mb-1">12:30p.m. – 1:00p.m.
                                                    </div>
                                                    <ul class="text-white text-sm sm:text-base space-y-2">
                                                        <li class="before:mr-2 before:text-red-500 before:content-['→']">
                                                            Networking & Tour of
                                                            Exhibition
                                                        </li>
                                                    </ul>
                                                    <div class="flex items-center gap-1 mt-0.5">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                             class="w-3 h-3 text-white flex-shrink-0"
                                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                             stroke-width="2">
                                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                            <circle cx="12" cy="7" r="4"></circle>
                                                        </svg>
                                                        <h6 class="text-white text-xs italic font-normal
                                                        leading-tight">All</h6>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="flex relative bg-[#84C1D9] rounded text-white ">
                                                <div class="relative">
                                                    <div
                                                        class="w-3 h-3 bg-[#ef4444] rounded-full shadow-lg shadow-[#ef4444]/50 flex-shrink-0 z-10 relative"></div>
                                                    <div
                                                        class="absolute inset-0 w-3 h-3 bg-[#ef4444] rounded-full opacity-30 animate-ping"></div>
                                                </div>
                                                <div class="ml-4 sm:ml-6 ">
                                                    <div class="text-xs sm:text-sm font-bold text-white
                                                    mb-1">1:00p.m - 2:00pm
                                                    </div>
                                                    <ul class="text-white text-sm sm:text-base space-y-2">
                                                        <li class="before:mr-2 before:text-red-500 before:content-['→']">
                                                            Lunch & Networking
                                                        </li>
                                                    </ul>
                                                    <div class="flex items-center gap-1 mt-0.5">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                             class="w-3 h-3 text-white flex-shrink-0"
                                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                             stroke-width="2">
                                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                            <circle cx="12" cy="7" r="4"></circle>
                                                        </svg>
                                                        <h6 class="text-white text-xs italic font-normal
                                                        leading-tight">All</h6>
                                                    </div>
                                                </div>
                                            </div>




                                        </div>
                                    </div>
                                </div>
                                <div class="bg-white rounded-xl shadow-xl overflow-hidden flex flex-col"
                                     style="height:680px">
                                    <div
                                        class="bg-gradient-to-r from-[#175C93] to-[#7BC7F0] text-white p-4 sm:p-6
                                        flex-shrink-0">
                                        <h4 class="text-lg sm:text-xl font-bold">DAY THREE </h4>
                                        <p class="text-xs sm:text-sm opacity-90 mt-1">Afternoon session</p>
                                    </div>
                                    <div class="p-4 sm:p-6 relative flex-1 overflow-y-auto">

                                        <div class="space-y-4 sm:space-y-6 relative">
                                            <div
                                                class="absolute left-[5px] top-[6px] bottom-[6px] w-0.5 bg-[#ef4444]">

                                            </div>
                                            <div class="flex relative">
                                                <div class="relative">
                                                    <div
                                                        class="w-3 h-3 bg-[#ef4444] rounded-full shadow-lg shadow-[#ef4444]/50 flex-shrink-0 z-10 relative"></div>
                                                    <div
                                                        class="absolute inset-0 w-3 h-3 bg-[#ef4444] rounded-full opacity-30 animate-ping">

                                                    </div>
                                                </div>
                                                <div class="ml-4 sm:ml-6 ">
                                                    <div class="text-xs sm:text-sm font-bold text-[#84C1D9]
                                                    mb-1">2:00p.m. – 2:30p.m.
                                                    </div>
                                                    <ul class="text-[#84C1D9] text-sm sm:text-base space-y-2">
                                                        <li class="before:mr-2 before:text-red-500 before:content-['→']">
                                                            The debate: Can Robots Be
                                                            Professional?
                                                        </li>
                                                    </ul>
                                                    <div class="flex items-center gap-1 mt-0.5">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                             class="w-3 h-3 text-[#84C1D9]  flex-shrink-0"
                                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                             stroke-width="2">
                                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                            <circle cx="12" cy="7" r="4"></circle>
                                                        </svg>
                                                        <h6 class="text-[#84C1D9]  text-xs italic font-normal
                                                        leading-tight">KCA University</h6>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="flex relative">
                                                <div class="relative">
                                                    <div
                                                        class="w-3 h-3 bg-[#ef4444] rounded-full shadow-lg shadow-[#ef4444]/50 flex-shrink-0 z-10 relative"></div>
                                                    <div
                                                        class="absolute inset-0 w-3 h-3 bg-[#ef4444] rounded-full opacity-30 animate-ping"></div>
                                                </div>
                                                <div class="ml-4 sm:ml-6">
                                                    <div class="text-xs sm:text-sm font-bold text-[#84C1D9]
                                                    mb-1">2:30p.m. – 4:00p.m
                                                    </div>
                                                    <h5 class="text-[#175C93] text-sm sm:text-base">
                                                        Parallel Sessions</h5>

                                                    <div class="block p-2 mb-2 sm:mb-4 sm:p-6 relative flex-1
                                                    overflow-y-auto bg-[#DAECF3] rounded-lg shadow-lg">
                                                        <ul>
                                                            <li><strong>Masterclass:</strong>
                                                                Beyond the
                                                                Paycheck: Building Wealth
                                                                That Lasts for Generations
                                                            </li>

                                                            <li>
                                                                <strong>Session Chair:</strong>
                                                                Dr Jonah Aiyabei, Ph.D
                                                                Chief Executive Officer,
                                                                Public Service
                                                                Superannuation Fund
                                                                (PSSF)
                                                            </li>
                                                        </ul>


                                                        <div class="flex items-center gap-1 mt-0.5">

                                                            <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                        leading-tight">
                                                                <strong>Speaker</strong>
                                                            </h6>
                                                            <div class="flex items-center gap-1 mt-0.5">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                     class="w-3 h-3 text-[#84C1D9] flex-shrink-0"
                                                                     viewBox="0 0 24 24" fill="none"
                                                                     stroke="currentColor"
                                                                     stroke-width="2">
                                                                    <path
                                                                        d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                                    <circle cx="12" cy="7" r="4"></circle>
                                                                </svg>
                                                                <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                            leading-tight">Mr. Philip Lopokoiyit
                                                                    Chief Executive Officer,
                                                                    ICEA Lion Group</h6>
                                                            </div>

                                                        </div>

                                                        <h3>
                                                            <strong>Panel Session:</strong> Evolving
                                                            Professional Standards in
                                                            Response to Technological
                                                            Changes
                                                        </h3>

                                                        <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                        leading-tight">
                                                            <strong>Panellists</strong>
                                                        </h6>
                                                        <div class="flex items-center gap-1 mt-0.5">

                                                            <div class="flex items-center gap-1 mt-0.5">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                     class="w-3 h-3 text-[#84C1D9] flex-shrink-0"
                                                                     viewBox="0 0 24 24" fill="none"
                                                                     stroke="currentColor"
                                                                     stroke-width="2">
                                                                    <path
                                                                        d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                                    <circle cx="12" cy="7" r="4"></circle>
                                                                </svg>
                                                                <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                            leading-tight">Prof. CPA Elizabeth N.
                                                                    Kalunda-Muvui, PhD
                                                                    President, Institute of
                                                                    Certified Public
                                                                    Accountants of Kenya</h6>
                                                            </div>

                                                        </div>
                                                        <div class="flex items-center gap-1 mt-0.5">

                                                            <div class="flex items-center gap-1 mt-0.5">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                     class="w-3 h-3 text-[#84C1D9] flex-shrink-0"
                                                                     viewBox="0 0 24 24" fill="none"
                                                                     stroke="currentColor"
                                                                     stroke-width="2">
                                                                    <path
                                                                        d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                                    <circle cx="12" cy="7" r="4"></circle>
                                                                </svg>
                                                                <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                            leading-tight">FCS Jacqueline Waihenya
                                                                    Chairperson, Institute of
                                                                    Certified Secretaries of
                                                                    Kenya</h6>
                                                            </div>

                                                        </div>
                                                        <div class="flex items-center gap-1 mt-0.5">

                                                            <div class="flex items-center gap-1 mt-0.5">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                     class="w-3 h-3 text-[#84C1D9] flex-shrink-0"
                                                                     viewBox="0 0 24 24" fill="none"
                                                                     stroke="currentColor"
                                                                     stroke-width="2">
                                                                    <path
                                                                        d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                                    <circle cx="12" cy="7" r="4"></circle>
                                                                </svg>
                                                                <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                            leading-tight">Mr. Charles Kanjama
                                                                    President, Law Society of
                                                                    Kenya</h6>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="block p-2 mb-2 sm:mb-4 sm:p-6 relative flex-1
                                                    overflow-y-auto bg-[#DAECF3] rounded-lg shadow-lg">
                                                        <ul>
                                                            <li>
                                                                Topic: Election Readiness,
                                                                Integrity and Resilience:
                                                                Global Lessons
                                                            </li>

                                                            <li>
                                                                <strong>Session Chair:</strong>
                                                                Geoffrey Odundo
                                                                Group Managing Director &
                                                                Chief Executive Officer,
                                                                Nation Media Group
                                                            </li>
                                                        </ul>

                                                        <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                        leading-tight">
                                                            <strong>Panellists</strong>
                                                        </h6>
                                                        <div class="flex items-center gap-1 mt-0.5">

                                                            <div class="flex items-center gap-1 mt-0.5">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                     class="w-3 h-3 text-[#84C1D9] flex-shrink-0"
                                                                     viewBox="0 0 24 24" fill="none"
                                                                     stroke="currentColor"
                                                                     stroke-width="2">
                                                                    <path
                                                                        d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                                    <circle cx="12" cy="7" r="4"></circle>
                                                                </svg>
                                                                <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                            leading-tight">Dr. Garry Conille
                                                                    United Nations Resident
                                                                    Coordinator, Kenya</h6>
                                                            </div>

                                                        </div>
                                                        <div class="flex items-center gap-1 mt-0.5">

                                                            <div class="flex items-center gap-1 mt-0.5">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                     class="w-3 h-3 text-[#84C1D9] flex-shrink-0"
                                                                     viewBox="0 0 24 24" fill="none"
                                                                     stroke="currentColor"
                                                                     stroke-width="2">
                                                                    <path
                                                                        d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                                    <circle cx="12" cy="7" r="4"></circle>
                                                                </svg>
                                                                <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                            leading-tight">Mr. Jean-Luc Stalon
                                                                    UNDP Resident
                                                                    Representative, Kenya</h6>
                                                            </div>

                                                        </div>
                                                        <div class="flex items-center gap-1 mt-0.5">

                                                            <div class="flex items-center gap-1 mt-0.5">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                     class="w-3 h-3 text-[#84C1D9] flex-shrink-0"
                                                                     viewBox="0 0 24 24" fill="none"
                                                                     stroke="currentColor"
                                                                     stroke-width="2">
                                                                    <path
                                                                        d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                                    <circle cx="12" cy="7" r="4"></circle>
                                                                </svg>
                                                                <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                            leading-tight">Ms. Henriette Geiger
                                                                    the European Union
                                                                    Ambassador to Kenya</h6>
                                                            </div>

                                                        </div>
                                                        <div class="flex items-center gap-1 mt-0.5">

                                                            <div class="flex items-center gap-1 mt-0.5">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                     class="w-3 h-3 text-[#84C1D9] flex-shrink-0"
                                                                     viewBox="0 0 24 24" fill="none"
                                                                     stroke="currentColor"
                                                                     stroke-width="2">
                                                                    <path
                                                                        d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                                    <circle cx="12" cy="7" r="4"></circle>
                                                                </svg>
                                                                <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                            leading-tight">Ms. Susan M. Burns
                                                                    Chargé d’Affaires,
                                                                    United States of America,
                                                                    Embassy in Nairobi</h6>
                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="flex relative bg-[#84C1D9] rounded text-white ">
                                                <div class="relative">
                                                    <div
                                                        class="w-3 h-3 bg-[#ef4444] rounded-full shadow-lg shadow-[#ef4444]/50 flex-shrink-0 z-10 relative"></div>
                                                    <div
                                                        class="absolute inset-0 w-3 h-3 bg-[#ef4444] rounded-full opacity-30 animate-ping"></div>
                                                </div>
                                                <div class="ml-4 sm:ml-6 ">
                                                    <div class="text-xs sm:text-sm font-bold text-white
                                                    mb-1">4:00p.m. – 5:00p.m
                                                    </div>
                                                    <ul class="text-white text-sm sm:text-base space-y-2">

                                                        <li class="before:mr-2 before:text-red-500 before:content-['→']">
                                                            Health Break
                                                        </li>
                                                    </ul>
                                                    <div class="flex items-center gap-1 mt-0.5">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                             class="w-3 h-3 text-white flex-shrink-0"
                                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                             stroke-width="2">
                                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                            <circle cx="12" cy="7" r="4"></circle>
                                                        </svg>
                                                        <h6 class="text-white text-xs italic font-normal
                                                        leading-tight">Dr. Percy Opio
                                                            Board Chairman, KASNEB</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex relative bg-[#84C1D9] rounded text-white ">
                                                <div class="relative">
                                                    <div
                                                        class="w-3 h-3 bg-[#ef4444] rounded-full shadow-lg shadow-[#ef4444]/50 flex-shrink-0 z-10 relative"></div>
                                                    <div
                                                        class="absolute inset-0 w-3 h-3 bg-[#ef4444] rounded-full opacity-30 animate-ping"></div>
                                                </div>
                                                <div class="ml-4 sm:ml-6 ">
                                                    <div class="text-xs sm:text-sm font-bold text-white
                                                    mb-1">5:00p.m. – 6:00p.m
                                                    </div>
                                                    <ul class="text-white text-sm sm:text-base space-y-2">

                                                        <li class="before:mr-2 before:text-red-500 before:content-['→']">
                                                            Networking & Tour of
                                                            Exhibition
                                                        </li>
                                                    </ul>
                                                    <div class="flex items-center gap-1 mt-0.5">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                             class="w-3 h-3 text-white flex-shrink-0"
                                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                             stroke-width="2">
                                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                            <circle cx="12" cy="7" r="4"></circle>
                                                        </svg>
                                                        <h6 class="text-white text-xs italic font-normal
                                                        leading-tight">All</h6>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- Day 4 -->
                        <section x-cloak x-show="tabs.find(tab => tab.id === 4).active || mobileActiveTab == 4">
                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 sm:gap-12">
                                <div class="bg-white rounded-xl shadow-xl overflow-hidden flex flex-col"
                                     style="height:680px">
                                    <div
                                        class="bg-gradient-to-r from-[#175C93] to-[#7BC7F0] text-white p-4 sm:p-6
                                        flex-shrink-0">
                                        <h4 class="text-lg sm:text-xl font-bold">DAY FOUR: THURSDAY, 17 SEPTEMBER
                                            2026</h4>
                                        <p class="text-xs sm:text-sm opacity-90 mt-1">Morning session</p>
                                    </div>
                                    <div class="p-4 sm:p-6 relative flex-1 overflow-y-auto">
                                        <div class="space-y-4 sm:space-y-6 relative">
                                            <div
                                                class="absolute left-[5px] top-[6px] bottom-[6px] w-0.5 bg-[#ef4444]"></div>
                                            <div class="flex relative">
                                                <div class="relative">
                                                    <div
                                                        class="w-3 h-3 bg-[#ef4444] rounded-full shadow-lg shadow-[#ef4444]/50 flex-shrink-0 z-10 relative"></div>
                                                    <div
                                                        class="absolute inset-0 w-3 h-3 bg-[#ef4444] rounded-full opacity-30 animate-ping"></div>
                                                </div>
                                                <div class="ml-4 sm:ml-6">
                                                    <div class="text-xs sm:text-sm font-bold text-[#84C1D9] mb-1">
                                                        8:00a.m. – 8:30a.m.
                                                    </div>
                                                    <h5 class="text-[#1a365d] text-sm sm:text-base">Registration and
                                                        Networking
                                                        Breakfast</h5>
                                                    <div class="flex items-center gap-1 mt-0.5">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                             class="w-3 h-3 text-[#84C1D9] flex-shrink-0"
                                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                             stroke-width="2">
                                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                            <circle cx="12" cy="7" r="4"></circle>
                                                        </svg>
                                                        <h6 class="text-[#84C1D9] text-xs italic font-normal leading-tight">
                                                            All</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex  relative">

                                                <div class="ml-4 sm:ml-6">

                                                    <h5 class="text-[#1a365d] text-sm sm:text-base">Setting the Stage:
                                                        National Anthem & Prayers </h5>
                                                    <div class="flex items-center gap-1 mt-0.5">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                             class="w-3 h-3 text-[#84C1D9] flex-shrink-0"
                                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                             stroke-width="2">
                                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                            <circle cx="12" cy="7" r="4"></circle>
                                                        </svg>
                                                        <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                        leading-tight">Johnson Mwakazi,
                                                            Master of Ceremony</h6>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="flex  relative">

                                                <div class="ml-4 sm:ml-6">

                                                    <h5 class="text-[#1a365d] text-sm sm:text-base">Welcome Remarks
                                                        (10 minutes)</h5>
                                                    <div class="flex items-center gap-1 mt-0.5">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                             class="w-3 h-3 text-[#84C1D9] flex-shrink-0"
                                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                             stroke-width="2">
                                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                            <circle cx="12" cy="7" r="4"></circle>
                                                        </svg>
                                                        <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                        leading-tight">Prof. Nicholas K. Letting’,
                                                            Ph.D, EBS, HSC
                                                            Chief Executive Officer,
                                                            KASNEB</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex  relative">

                                                <div class="ml-4 sm:ml-6">

                                                    <h5 class="text-[#1a365d] text-sm sm:text-base">Opening Remarks
                                                        (15 minutes)</h5>
                                                    <div class="flex items-center gap-1 mt-0.5">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                             class="w-3 h-3 text-[#84C1D9] flex-shrink-0"
                                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                             stroke-width="2">
                                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                            <circle cx="12" cy="7" r="4"></circle>
                                                        </svg>
                                                        <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                        leading-tight">Dr. Percy Opio
                                                            Board Chairman, KASNEB</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex relative">

                                                <div class="ml-4 sm:ml-6">

                                                    <h5 class="text-[#1a365d] text-sm sm:text-base">Address
                                                        Topic: Professionals
                                                        Advancing Africa’s Global
                                                        Competitiveness</h5>
                                                    <div class="flex items-center gap-1 mt-0.5">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                             class="w-3 h-3 text-[#84C1D9] flex-shrink-0"
                                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                             stroke-width="2">
                                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                            <circle cx="12" cy="7" r="4"></circle>
                                                        </svg>
                                                        <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                        leading-tight">Mr. Walid Ben Salah
                                                            President, Pan African
                                                            Federation of Accountants</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex relative">
                                                <div class="relative">
                                                    <div
                                                        class="w-3 h-3 bg-[#ef4444] rounded-full shadow-lg shadow-[#ef4444]/50 flex-shrink-0 z-10 relative"></div>
                                                    <div
                                                        class="absolute inset-0 w-3 h-3 bg-[#ef4444] rounded-full opacity-30 animate-ping"></div>
                                                </div>
                                                <div class="ml-4 sm:ml-6">
                                                    <div class="text-xs sm:text-sm font-bold text-[#84C1D9]
                                                    mb-1">8:30a.m. – 10:30a.m.
                                                    </div>
                                                    <h5 class="text-[#1a365d] text-sm sm:text-base">
                                                        Opening Keynote Address
                                                        Topic: The Success Mindset
                                                        as A Competitive Advantage
                                                        (20 minutes)</h5>
                                                    <div class="flex items-center gap-1 mt-0.5">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                             class="w-3 h-3 text-[#84C1D9] flex-shrink-0"
                                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                             stroke-width="2">
                                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                            <circle cx="12" cy="7" r="4"></circle>
                                                        </svg>
                                                        <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                        leading-tight">Mr. Paul Russo, EBS
                                                            Group CEO, KCB Bank</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex relative">

                                                <div class="ml-4 sm:ml-6">
                                                    <h4 class="text-[#1a365d] text-sm sm:text-base">Fireside Chat</h4>
                                                    <h5 class="text-[#1a365d] text-sm sm:text-base">
                                                        Topic: The Reinvented
                                                        Leader: Leading Evolving
                                                        Professionals in a Dynamic
                                                        Work Environment
                                                        (45 minutes)
                                                    </h5>
                                                    <span class="py-20 text-justify text-sm text-red-500">
                                                        Session Chair:
                                                            Dr. Percy Opio
                                                            Board Chairman, KASNEB
                                                    </span>
                                                    <div class="flex items-center gap-1 mt-0.5">

                                                        <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                        leading-tight">
                                                            <strong>Speakers</strong>
                                                        </h6>
                                                        <div class="flex items-center gap-1 mt-0.5">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                 class="w-3 h-3 text-[#84C1D9] flex-shrink-0"
                                                                 viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                                 stroke-width="2">
                                                                <path
                                                                    d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                                <circle cx="12" cy="7" r="4"></circle>
                                                            </svg>
                                                            <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                            leading-tight">Mr. Walid Ben Salah
                                                                President, Pan African
                                                                Federation of Accountants</h6>
                                                        </div>
                                                        <div class="flex items-center gap-1 mt-0.5">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                 class="w-3 h-3 text-[#84C1D9] flex-shrink-0"
                                                                 viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                                 stroke-width="2">
                                                                <path
                                                                    d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                                <circle cx="12" cy="7" r="4"></circle>
                                                            </svg>
                                                            <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                            leading-tight">Mr. Walid Ben Salah
                                                                President, Pan African
                                                                Federation of Accountants</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="flex relative bg-[#84C1D9] rounded text-white ">
                                                <div class="relative">
                                                    <div
                                                        class="w-3 h-3 bg-[#ef4444] rounded-full shadow-lg shadow-[#ef4444]/50 flex-shrink-0 z-10 relative"></div>
                                                    <div
                                                        class="absolute inset-0 w-3 h-3 bg-[#ef4444] rounded-full opacity-30 animate-ping"></div>
                                                </div>
                                                <div class="ml-4 sm:ml-6 ">
                                                    <div class="text-xs sm:text-sm font-bold text-white
                                                    mb-1">10:30a.m. – 11:00a.m
                                                    </div>
                                                    <ul class="text-white text-sm sm:text-base space-y-2">
                                                        <li class="before:mr-2 before:text-red-500 before:content-['→']">
                                                            Exhibition Tour by Guests
                                                        </li>
                                                        <li class="before:mr-2 before:text-red-500 before:content-['→']">
                                                            Health Break
                                                        </li>
                                                    </ul>
                                                    <div class="flex items-center gap-1 mt-0.5">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                             class="w-3 h-3 text-white flex-shrink-0"
                                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                             stroke-width="2">
                                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                            <circle cx="12" cy="7" r="4"></circle>
                                                        </svg>
                                                        <h6 class="text-white text-xs italic font-normal
                                                        leading-tight">Dr. Percy Opio
                                                            Board Chairman, KASNEB</h6>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="flex relative">
                                                <div class="relative">
                                                    <div
                                                        class="w-3 h-3 bg-[#ef4444] rounded-full shadow-lg shadow-[#ef4444]/50 flex-shrink-0 z-10 relative"></div>
                                                    <div
                                                        class="absolute inset-0 w-3 h-3 bg-[#ef4444] rounded-full opacity-30 animate-ping"></div>
                                                </div>
                                                <div class="ml-4 sm:ml-6">
                                                    <div class="text-xs sm:text-sm font-bold text-[#84C1D9]
                                                    mb-1">11:00a.m. – 12:30p.m.
                                                    </div>
                                                    <h5 class="text-[#175C93] text-sm sm:text-base">
                                                        Parallel Sessions</h5>

                                                    <div class="block p-2 mb-2 sm:mb-4 sm:p-6 relative flex-1
                                                    overflow-y-auto bg-[#DAECF3] rounded-lg shadow-lg">
                                                        <ul>
                                                            <li><strong>Session 1:</strong>
                                                                Topic: Thriving in a World that
                                                                is Not Staying Still: Preparing
                                                                Professionals for What’s
                                                                Next?
                                                            </li>

                                                            <li>
                                                                <strong>Session Chair:</strong>
                                                                Prof. Charles Ochieng’
                                                                Ong’ondo
                                                                Chief Executive Officer
                                                                (CEO), Kenya Institute of
                                                                Curriculum Development
                                                            </li>
                                                        </ul>

                                                        <h2>Speaker:</h2>

                                                        <div class="flex items-center gap-1 mt-0.5">

                                                            <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                        leading-tight">
                                                                <strong>Speaker</strong>
                                                            </h6>
                                                            <div class="flex items-center gap-1 mt-0.5">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                     class="w-3 h-3 text-[#84C1D9] flex-shrink-0"
                                                                     viewBox="0 0 24 24" fill="none"
                                                                     stroke="currentColor"
                                                                     stroke-width="2">
                                                                    <path
                                                                        d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                                    <circle cx="12" cy="7" r="4"></circle>
                                                                </svg>
                                                                <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                            leading-tight">Mrs. Funmi Ekundayo, FCIS President,
                                                                    Corporate Secretaries International Association</h6>
                                                            </div>

                                                        </div>
                                                        <div class="flex items-center gap-1 mt-0.5">

                                                            <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                        leading-tight">
                                                                <strong>Discussants</strong>
                                                            </h6>
                                                            <div class="flex items-center gap-1 mt-0.5">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                     class="w-3 h-3 text-[#84C1D9] flex-shrink-0"
                                                                     viewBox="0 0 24 24" fill="none"
                                                                     stroke="currentColor"
                                                                     stroke-width="2">
                                                                    <path
                                                                        d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                                    <circle cx="12" cy="7" r="4"></circle>
                                                                </svg>
                                                                <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                            leading-tight">Dr. George Wakah
                                                                    Director of Administration,
                                                                    Finance and Corporate
                                                                    Affairs,
                                                                    Centre for Parliamentary
                                                                    Studies and Training (CPST)</h6>
                                                            </div>
                                                            <div class="flex items-center gap-1 mt-0.5">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                     class="w-3 h-3 text-[#84C1D9] flex-shrink-0"
                                                                     viewBox="0 0 24 24" fill="none"
                                                                     stroke="currentColor"
                                                                     stroke-width="2">
                                                                    <path
                                                                        d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                                    <circle cx="12" cy="7" r="4"></circle>
                                                                </svg>
                                                                <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                            leading-tight">Prof. Nura Mohamed
                                                                    Director General, Kenya
                                                                    School of Government</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="block p-2 mb-2 sm:mb-4 sm:p-6 relative flex-1
                                                    overflow-y-auto bg-[#DAECF3] rounded-lg shadow-lg">
                                                        <ul>
                                                            <li><strong>Session 2:</strong>
                                                                Topic: The Smart City
                                                            </li>

                                                            <li>
                                                                <strong>Session Chair:</strong>
                                                                Mr. David Mugonyi, EBS
                                                                Director General,
                                                                Communications Authority
                                                            </li>
                                                        </ul>

                                                        <h2>Speaker:</h2>

                                                        <div class="flex items-center gap-1 mt-0.5">

                                                            <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                        leading-tight">
                                                                <strong>Speaker</strong>
                                                            </h6>
                                                            <div class="flex items-center gap-1 mt-0.5">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                     class="w-3 h-3 text-[#84C1D9] flex-shrink-0"
                                                                     viewBox="0 0 24 24" fill="none"
                                                                     stroke="currentColor"
                                                                     stroke-width="2">
                                                                    <path
                                                                        d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                                    <circle cx="12" cy="7" r="4"></circle>
                                                                </svg>
                                                                <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                            leading-tight">Ms. Anacláudia Rossbach
                                                                    Executive Director, UNHabitat in Nairobi</h6>
                                                            </div>

                                                        </div>
                                                        <div class="flex items-center gap-1 mt-0.5">

                                                            <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                        leading-tight">
                                                                <strong>Discussants</strong>
                                                            </h6>
                                                            <div class="flex items-center gap-1 mt-0.5">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                     class="w-3 h-3 text-[#84C1D9] flex-shrink-0"
                                                                     viewBox="0 0 24 24" fill="none"
                                                                     stroke="currentColor"
                                                                     stroke-width="2">
                                                                    <path
                                                                        d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                                    <circle cx="12" cy="7" r="4"></circle>
                                                                </svg>
                                                                <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                            leading-tight">Mr. John Okwiri, OGW, MBA,
                                                                    MCIPS
                                                                    Chief Executive Officer,
                                                                    Technopolis Development
                                                                    Authority</h6>
                                                            </div>
                                                            <div class="flex items-center gap-1 mt-0.5">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                     class="w-3 h-3 text-[#84C1D9] flex-shrink-0"
                                                                     viewBox="0 0 24 24" fill="none"
                                                                     stroke="currentColor"
                                                                     stroke-width="2">
                                                                    <path
                                                                        d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                                    <circle cx="12" cy="7" r="4"></circle>
                                                                </svg>
                                                                <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                            leading-tight">Dr. Kenneth Chelule, P. Eng,
                                                                    FIET, EBS
                                                                    Chief Executive Office,
                                                                    Special Economic Zones
                                                                    Authority</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="block p-2 mb-2 sm:mb-4 sm:p-6 relative flex-1
                                                    overflow-y-auto bg-[#DAECF3] rounded-lg shadow-lg">
                                                        <ul>
                                                            <li><strong>Session 3:</strong>
                                                                Topic: Geopolitical Conflicts
                                                                Driving High Cost of Living:
                                                                Navigating Crisis the
                                                                Professional Way
                                                            </li>

                                                            <li>
                                                                <strong>Session Chair:</strong>
                                                                Prof. Isaiah I.C. Wakindiki
                                                                Vice Chancelor, KCA
                                                                University
                                                            </li>
                                                        </ul>

                                                        <h2>Speaker:</h2>

                                                        <div class="flex items-center gap-1 mt-0.5">

                                                            <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                        leading-tight">
                                                                <strong>Speaker</strong>
                                                            </h6>
                                                            <div class="flex items-center gap-1 mt-0.5">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                     class="w-3 h-3 text-[#84C1D9] flex-shrink-0"
                                                                     viewBox="0 0 24 24" fill="none"
                                                                     stroke="currentColor"
                                                                     stroke-width="2">
                                                                    <path
                                                                        d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                                    <circle cx="12" cy="7" r="4"></circle>
                                                                </svg>
                                                                <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                            leading-tight">Dr. Workneh Gebeyehu
                                                                    Executive Director,
                                                                    Intergovernmental
                                                                    Authority on Development</h6>
                                                            </div>

                                                        </div>
                                                        <div class="flex items-center gap-1 mt-0.5">

                                                            <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                        leading-tight">
                                                                <strong>Discussants</strong>
                                                            </h6>
                                                            <div class="flex items-center gap-1 mt-0.5">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                     class="w-3 h-3 text-[#84C1D9] flex-shrink-0"
                                                                     viewBox="0 0 24 24" fill="none"
                                                                     stroke="currentColor"
                                                                     stroke-width="2">
                                                                    <path
                                                                        d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                                    <circle cx="12" cy="7" r="4"></circle>
                                                                </svg>
                                                                <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                            leading-tight">Dr. Korir Sing'oei, Principal Secretary, Foreign
                                                                    Affairs</h6>
                                                            </div>
                                                            <div class="flex items-center gap-1 mt-0.5">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                     class="w-3 h-3 text-[#84C1D9] flex-shrink-0"
                                                                     viewBox="0 0 24 24" fill="none"
                                                                     stroke="currentColor"
                                                                     stroke-width="2">
                                                                    <path
                                                                        d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                                    <circle cx="12" cy="7" r="4"></circle>
                                                                </svg>
                                                                <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                            leading-tight">Ms. Regina Akoth Ombam
                                                                    Principal Secretary, State
                                                                    Department for Trade</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="flex relative bg-[#84C1D9] rounded text-white ">
                                                <div class="relative">
                                                    <div
                                                        class="w-3 h-3 bg-[#ef4444] rounded-full shadow-lg shadow-[#ef4444]/50 flex-shrink-0 z-10 relative"></div>
                                                    <div
                                                        class="absolute inset-0 w-3 h-3 bg-[#ef4444] rounded-full opacity-30 animate-ping"></div>
                                                </div>
                                                <div class="ml-4 sm:ml-6 ">
                                                    <div class="text-xs sm:text-sm font-bold text-white
                                                    mb-1">12:30p.m. – 1:00p.m.
                                                    </div>
                                                    <ul class="text-white text-sm sm:text-base space-y-2">
                                                        <li class="before:mr-2 before:text-red-500 before:content-['→']">
                                                            Networking & Tour of
                                                            Exhibition
                                                        </li>
                                                    </ul>
                                                    <div class="flex items-center gap-1 mt-0.5">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                             class="w-3 h-3 text-white flex-shrink-0"
                                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                             stroke-width="2">
                                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                            <circle cx="12" cy="7" r="4"></circle>
                                                        </svg>
                                                        <h6 class="text-white text-xs italic font-normal
                                                        leading-tight">All</h6>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="flex relative bg-[#84C1D9] rounded text-white ">
                                                <div class="relative">
                                                    <div
                                                        class="w-3 h-3 bg-[#ef4444] rounded-full shadow-lg shadow-[#ef4444]/50 flex-shrink-0 z-10 relative"></div>
                                                    <div
                                                        class="absolute inset-0 w-3 h-3 bg-[#ef4444] rounded-full opacity-30 animate-ping"></div>
                                                </div>
                                                <div class="ml-4 sm:ml-6 ">
                                                    <div class="text-xs sm:text-sm font-bold text-white
                                                    mb-1">1:00p.m - 2:00pm
                                                    </div>
                                                    <ul class="text-white text-sm sm:text-base space-y-2">
                                                        <li class="before:mr-2 before:text-red-500 before:content-['→']">
                                                            Lunch & Networking
                                                        </li>
                                                    </ul>
                                                    <div class="flex items-center gap-1 mt-0.5">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                             class="w-3 h-3 text-white flex-shrink-0"
                                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                             stroke-width="2">
                                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                            <circle cx="12" cy="7" r="4"></circle>
                                                        </svg>
                                                        <h6 class="text-white text-xs italic font-normal
                                                        leading-tight">All</h6>
                                                    </div>
                                                </div>
                                            </div>




                                        </div>
                                    </div>
                                </div>
                                <div class="bg-white rounded-xl shadow-xl overflow-hidden flex flex-col"
                                     style="height:680px">
                                    <div
                                        class="bg-gradient-to-r from-[#175C93] to-[#7BC7F0] text-white p-4 sm:p-6
                                        flex-shrink-0">
                                        <h4 class="text-lg sm:text-xl font-bold">DAY FOUR </h4>
                                        <p class="text-xs sm:text-sm opacity-90 mt-1">Afternoon session</p>
                                    </div>
                                    <div class="p-4 sm:p-6 relative flex-1 overflow-y-auto">
                                        <div class="space-y-4 sm:space-y-6 relative">
                                            <div
                                                class="absolute left-[5px] top-[6px] bottom-[6px] w-0.5 bg-[#ef4444]">
                                            </div>
                                            <div class="flex relative">
                                                <div class="relative">
                                                    <div
                                                        class="w-3 h-3 bg-[#ef4444] rounded-full shadow-lg shadow-[#ef4444]/50 flex-shrink-0 z-10 relative"></div>
                                                    <div
                                                        class="absolute inset-0 w-3 h-3 bg-[#ef4444] rounded-full opacity-30 animate-ping"></div>
                                                </div>
                                                <div class="ml-4 sm:ml-6 ">
                                                    <div class="text-xs sm:text-sm font-bold text-[#84C1D9]
                                                    mb-1">2:00p.m. – 2:30p.m.
                                                    </div>
                                                    <ul class="text-[#84C1D9] text-sm sm:text-base space-y-2">
                                                        <li class="before:mr-2 before:text-red-500 before:content-['→']">
                                                            The debate: Can Robots Be
                                                            Professional?
                                                        </li>
                                                    </ul>
                                                    <div class="flex items-center gap-1 mt-0.5">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                             class="w-3 h-3 text-[#84C1D9]  flex-shrink-0"
                                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                             stroke-width="2">
                                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                            <circle cx="12" cy="7" r="4"></circle>
                                                        </svg>
                                                        <h6 class="text-[#84C1D9]  text-xs italic font-normal
                                                        leading-tight">KCA University</h6>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="flex relative">
                                                <div class="relative">
                                                    <div
                                                        class="w-3 h-3 bg-[#ef4444] rounded-full shadow-lg shadow-[#ef4444]/50 flex-shrink-0 z-10 relative"></div>
                                                    <div
                                                        class="absolute inset-0 w-3 h-3 bg-[#ef4444] rounded-full opacity-30 animate-ping"></div>
                                                </div>
                                                <div class="ml-4 sm:ml-6">
                                                    <div class="text-xs sm:text-sm font-bold text-[#84C1D9]
                                                    mb-1">2:30p.m. – 4:00p.m
                                                    </div>
                                                    <h5 class="text-[#175C93] text-sm sm:text-base">
                                                        Parallel Sessions</h5>

                                                    <div class="block p-2 mb-2 sm:mb-4 sm:p-6 relative flex-1
                                                    overflow-y-auto bg-[#DAECF3] rounded-lg shadow-lg">
                                                        <ul>
                                                            <li><strong>Masterclass:</strong>
                                                                Beyond the
                                                                Paycheck: Building Wealth
                                                                That Lasts for Generations
                                                            </li>

                                                            <li>
                                                                <strong>Session Chair:</strong>
                                                                Dr Jonah Aiyabei, Ph.D
                                                                Chief Executive Officer,
                                                                Public Service
                                                                Superannuation Fund
                                                                (PSSF)
                                                            </li>
                                                        </ul>


                                                        <div class="flex items-center gap-1 mt-0.5">

                                                            <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                        leading-tight">
                                                                <strong>Speaker</strong>
                                                            </h6>
                                                            <div class="flex items-center gap-1 mt-0.5">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                     class="w-3 h-3 text-[#84C1D9] flex-shrink-0"
                                                                     viewBox="0 0 24 24" fill="none"
                                                                     stroke="currentColor"
                                                                     stroke-width="2">
                                                                    <path
                                                                        d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                                    <circle cx="12" cy="7" r="4"></circle>
                                                                </svg>
                                                                <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                            leading-tight">Mr. Philip Lopokoiyit
                                                                    Chief Executive Officer,
                                                                    ICEA Lion Group</h6>
                                                            </div>

                                                        </div>

                                                        <h3>
                                                            <strong>Panel Session:</strong> Evolving
                                                            Professional Standards in
                                                            Response to Technological
                                                            Changes
                                                        </h3>

                                                        <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                        leading-tight">
                                                            <strong>Panellists</strong>
                                                        </h6>
                                                        <div class="flex items-center gap-1 mt-0.5">

                                                            <div class="flex items-center gap-1 mt-0.5">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                     class="w-3 h-3 text-[#84C1D9] flex-shrink-0"
                                                                     viewBox="0 0 24 24" fill="none"
                                                                     stroke="currentColor"
                                                                     stroke-width="2">
                                                                    <path
                                                                        d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                                    <circle cx="12" cy="7" r="4"></circle>
                                                                </svg>
                                                                <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                            leading-tight">Prof. CPA Elizabeth N.
                                                                    Kalunda-Muvui, PhD
                                                                    President, Institute of
                                                                    Certified Public
                                                                    Accountants of Kenya</h6>
                                                            </div>

                                                        </div>
                                                        <div class="flex items-center gap-1 mt-0.5">

                                                            <div class="flex items-center gap-1 mt-0.5">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                     class="w-3 h-3 text-[#84C1D9] flex-shrink-0"
                                                                     viewBox="0 0 24 24" fill="none"
                                                                     stroke="currentColor"
                                                                     stroke-width="2">
                                                                    <path
                                                                        d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                                    <circle cx="12" cy="7" r="4"></circle>
                                                                </svg>
                                                                <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                            leading-tight">FCS Jacqueline Waihenya
                                                                    Chairperson, Institute of
                                                                    Certified Secretaries of
                                                                    Kenya</h6>
                                                            </div>

                                                        </div>
                                                        <div class="flex items-center gap-1 mt-0.5">

                                                            <div class="flex items-center gap-1 mt-0.5">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                     class="w-3 h-3 text-[#84C1D9] flex-shrink-0"
                                                                     viewBox="0 0 24 24" fill="none"
                                                                     stroke="currentColor"
                                                                     stroke-width="2">
                                                                    <path
                                                                        d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                                    <circle cx="12" cy="7" r="4"></circle>
                                                                </svg>
                                                                <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                            leading-tight">Mr. Charles Kanjama
                                                                    President, Law Society of
                                                                    Kenya</h6>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="block p-2 mb-2 sm:mb-4 sm:p-6 relative flex-1
                                                    overflow-y-auto bg-[#DAECF3] rounded-lg shadow-lg">
                                                        <ul>
                                                            <li>
                                                                Topic: Election Readiness,
                                                                Integrity and Resilience:
                                                                Global Lessons
                                                            </li>

                                                            <li>
                                                                <strong>Session Chair:</strong>
                                                                Geoffrey Odundo
                                                                Group Managing Director &
                                                                Chief Executive Officer,
                                                                Nation Media Group
                                                            </li>
                                                        </ul>

                                                        <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                        leading-tight">
                                                            <strong>Panellists</strong>
                                                        </h6>
                                                        <div class="flex items-center gap-1 mt-0.5">

                                                            <div class="flex items-center gap-1 mt-0.5">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                     class="w-3 h-3 text-[#84C1D9] flex-shrink-0"
                                                                     viewBox="0 0 24 24" fill="none"
                                                                     stroke="currentColor"
                                                                     stroke-width="2">
                                                                    <path
                                                                        d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                                    <circle cx="12" cy="7" r="4"></circle>
                                                                </svg>
                                                                <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                            leading-tight">Dr. Garry Conille
                                                                    United Nations Resident
                                                                    Coordinator, Kenya</h6>
                                                            </div>

                                                        </div>
                                                        <div class="flex items-center gap-1 mt-0.5">

                                                            <div class="flex items-center gap-1 mt-0.5">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                     class="w-3 h-3 text-[#84C1D9] flex-shrink-0"
                                                                     viewBox="0 0 24 24" fill="none"
                                                                     stroke="currentColor"
                                                                     stroke-width="2">
                                                                    <path
                                                                        d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                                    <circle cx="12" cy="7" r="4"></circle>
                                                                </svg>
                                                                <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                            leading-tight">Mr. Jean-Luc Stalon
                                                                    UNDP Resident
                                                                    Representative, Kenya</h6>
                                                            </div>

                                                        </div>
                                                        <div class="flex items-center gap-1 mt-0.5">

                                                            <div class="flex items-center gap-1 mt-0.5">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                     class="w-3 h-3 text-[#84C1D9] flex-shrink-0"
                                                                     viewBox="0 0 24 24" fill="none"
                                                                     stroke="currentColor"
                                                                     stroke-width="2">
                                                                    <path
                                                                        d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                                    <circle cx="12" cy="7" r="4"></circle>
                                                                </svg>
                                                                <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                            leading-tight">Ms. Henriette Geiger
                                                                    the European Union
                                                                    Ambassador to Kenya</h6>
                                                            </div>

                                                        </div>
                                                        <div class="flex items-center gap-1 mt-0.5">

                                                            <div class="flex items-center gap-1 mt-0.5">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                     class="w-3 h-3 text-[#84C1D9] flex-shrink-0"
                                                                     viewBox="0 0 24 24" fill="none"
                                                                     stroke="currentColor"
                                                                     stroke-width="2">
                                                                    <path
                                                                        d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                                    <circle cx="12" cy="7" r="4"></circle>
                                                                </svg>
                                                                <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                            leading-tight">Ms. Susan M. Burns
                                                                    Chargé d’Affaires,
                                                                    United States of America,
                                                                    Embassy in Nairobi</h6>
                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="flex relative bg-[#84C1D9] rounded text-white ">
                                                <div class="relative">
                                                    <div
                                                        class="w-3 h-3 bg-[#ef4444] rounded-full shadow-lg shadow-[#ef4444]/50 flex-shrink-0 z-10 relative"></div>
                                                    <div
                                                        class="absolute inset-0 w-3 h-3 bg-[#ef4444] rounded-full opacity-30 animate-ping"></div>
                                                </div>
                                                <div class="ml-4 sm:ml-6 ">
                                                    <div class="text-xs sm:text-sm font-bold text-white
                                                    mb-1">4:00p.m. – 5:00p.m
                                                    </div>
                                                    <ul class="text-white text-sm sm:text-base space-y-2">

                                                        <li class="before:mr-2 before:text-red-500 before:content-['→']">
                                                            Health Break
                                                        </li>
                                                    </ul>
                                                    <div class="flex items-center gap-1 mt-0.5">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                             class="w-3 h-3 text-white flex-shrink-0"
                                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                             stroke-width="2">
                                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                            <circle cx="12" cy="7" r="4"></circle>
                                                        </svg>
                                                        <h6 class="text-white text-xs italic font-normal
                                                        leading-tight">Dr. Percy Opio
                                                            Board Chairman, KASNEB</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex relative bg-[#84C1D9] rounded text-white ">
                                                <div class="relative">
                                                    <div
                                                        class="w-3 h-3 bg-[#ef4444] rounded-full shadow-lg shadow-[#ef4444]/50 flex-shrink-0 z-10 relative"></div>
                                                    <div
                                                        class="absolute inset-0 w-3 h-3 bg-[#ef4444] rounded-full opacity-30 animate-ping"></div>
                                                </div>
                                                <div class="ml-4 sm:ml-6 ">
                                                    <div class="text-xs sm:text-sm font-bold text-white
                                                    mb-1">5:00p.m. – 6:00p.m
                                                    </div>
                                                    <ul class="text-white text-sm sm:text-base space-y-2">

                                                        <li class="before:mr-2 before:text-red-500 before:content-['→']">
                                                            Networking & Tour of
                                                            Exhibition
                                                        </li>
                                                    </ul>
                                                    <div class="flex items-center gap-1 mt-0.5">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                             class="w-3 h-3 text-white flex-shrink-0"
                                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                             stroke-width="2">
                                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                            <circle cx="12" cy="7" r="4"></circle>
                                                        </svg>
                                                        <h6 class="text-white text-xs italic font-normal
                                                        leading-tight">All</h6>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- Day 5 -->
                        <section x-cloak x-show="tabs.find(tab => tab.id === 5).active || mobileActiveTab == 5">
                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 sm:gap-12">
                                <div class="bg-white rounded-xl shadow-xl overflow-hidden flex flex-col"
                                     style="height:680px">
                                    <div
                                        class="bg-gradient-to-r from-[#175C93] to-[#7BC7F0] text-white p-4 sm:p-6
                                        flex-shrink-0">
                                        <h4 class="text-lg sm:text-xl font-bold">DAY FIVE: FRIDAY, 18 SEPTEMBER
                                            2026</h4>
                                        <p class="text-xs sm:text-sm opacity-90 mt-1">Morning session</p>
                                    </div>
                                    <div class="p-4 sm:p-6 relative flex-1 overflow-y-auto">
                                        <div class="space-y-4 sm:space-y-6 relative">
                                            <div
                                                class="absolute left-[5px] top-[6px] bottom-[6px] w-0.5 bg-[#ef4444]"></div>
                                            <div class="flex relative">
                                                <div class="relative">
                                                    <div
                                                        class="w-3 h-3 bg-[#ef4444] rounded-full shadow-lg shadow-[#ef4444]/50 flex-shrink-0 z-10 relative"></div>
                                                    <div
                                                        class="absolute inset-0 w-3 h-3 bg-[#ef4444] rounded-full opacity-30 animate-ping"></div>
                                                </div>
                                                <div class="ml-4 sm:ml-6">
                                                    <div class="text-xs sm:text-sm font-bold text-[#84C1D9] mb-1">
                                                        8:00a.m. – 8:30a.m.
                                                    </div>
                                                    <h5 class="text-[#1a365d] text-sm sm:text-base">Registration and
                                                        Networking
                                                        Breakfast</h5>
                                                    <div class="flex items-center gap-1 mt-0.5">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                             class="w-3 h-3 text-[#84C1D9] flex-shrink-0"
                                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                             stroke-width="2">
                                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                            <circle cx="12" cy="7" r="4"></circle>
                                                        </svg>
                                                        <h6 class="text-[#84C1D9] text-xs italic font-normal leading-tight">
                                                            All</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex  relative">

                                                <div class="ml-4 sm:ml-6">

                                                    <h5 class="text-[#1a365d] text-sm sm:text-base">Setting the Stage:
                                                        National Anthem & Prayers </h5>
                                                    <div class="flex items-center gap-1 mt-0.5">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                             class="w-3 h-3 text-[#84C1D9] flex-shrink-0"
                                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                             stroke-width="2">
                                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                            <circle cx="12" cy="7" r="4"></circle>
                                                        </svg>
                                                        <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                        leading-tight">Johnson Mwakazi,
                                                            Master of Ceremony</h6>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="flex  relative">

                                                <div class="ml-4 sm:ml-6">

                                                    <h5 class="text-[#1a365d] text-sm sm:text-base">Welcome Remarks
                                                        (10 minutes)</h5>
                                                    <div class="flex items-center gap-1 mt-0.5">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                             class="w-3 h-3 text-[#84C1D9] flex-shrink-0"
                                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                             stroke-width="2">
                                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                            <circle cx="12" cy="7" r="4"></circle>
                                                        </svg>
                                                        <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                        leading-tight">Prof. Nicholas K. Letting’,
                                                            Ph.D, EBS, HSC
                                                            Chief Executive Officer,
                                                            KASNEB</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex  relative">

                                                <div class="ml-4 sm:ml-6">

                                                    <h5 class="text-[#1a365d] text-sm sm:text-base">Opening Remarks
                                                        (15 minutes)</h5>
                                                    <div class="flex items-center gap-1 mt-0.5">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                             class="w-3 h-3 text-[#84C1D9] flex-shrink-0"
                                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                             stroke-width="2">
                                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                            <circle cx="12" cy="7" r="4"></circle>
                                                        </svg>
                                                        <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                        leading-tight">Dr. Percy Opio
                                                            Board Chairman, KASNEB</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex relative">

                                                <div class="ml-4 sm:ml-6">

                                                    <h5 class="text-[#1a365d] text-sm sm:text-base">Address
                                                        Topic: Professionals
                                                        Advancing Africa’s Global
                                                        Competitiveness</h5>
                                                    <div class="flex items-center gap-1 mt-0.5">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                             class="w-3 h-3 text-[#84C1D9] flex-shrink-0"
                                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                             stroke-width="2">
                                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                            <circle cx="12" cy="7" r="4"></circle>
                                                        </svg>
                                                        <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                        leading-tight">Mr. Walid Ben Salah
                                                            President, Pan African
                                                            Federation of Accountants</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex relative">
                                                <div class="relative">
                                                    <div
                                                        class="w-3 h-3 bg-[#ef4444] rounded-full shadow-lg shadow-[#ef4444]/50 flex-shrink-0 z-10 relative"></div>
                                                    <div
                                                        class="absolute inset-0 w-3 h-3 bg-[#ef4444] rounded-full opacity-30 animate-ping"></div>
                                                </div>
                                                <div class="ml-4 sm:ml-6">
                                                    <div class="text-xs sm:text-sm font-bold text-[#84C1D9]
                                                    mb-1">8:30a.m. – 10:30a.m.
                                                    </div>
                                                    <h5 class="text-[#1a365d] text-sm sm:text-base">
                                                        Opening Keynote Address
                                                        Topic: The Success Mindset
                                                        as A Competitive Advantage
                                                        (20 minutes)</h5>
                                                    <div class="flex items-center gap-1 mt-0.5">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                             class="w-3 h-3 text-[#84C1D9] flex-shrink-0"
                                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                             stroke-width="2">
                                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                            <circle cx="12" cy="7" r="4"></circle>
                                                        </svg>
                                                        <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                        leading-tight">Mr. Paul Russo, EBS
                                                            Group CEO, KCB Bank</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex relative">

                                                <div class="ml-4 sm:ml-6">
                                                    <h4 class="text-[#1a365d] text-sm sm:text-base">Fireside Chat</h4>
                                                    <h5 class="text-[#1a365d] text-sm sm:text-base">
                                                        Topic: The Reinvented
                                                        Leader: Leading Evolving
                                                        Professionals in a Dynamic
                                                        Work Environment
                                                        (45 minutes)
                                                    </h5>
                                                    <span class="py-20 text-justify text-sm text-red-500">
                                                        Session Chair:
                                                            Dr. Percy Opio
                                                            Board Chairman, KASNEB
                                                    </span>
                                                    <div class="flex items-center gap-1 mt-0.5">

                                                        <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                        leading-tight">
                                                            <strong>Speakers</strong>
                                                        </h6>
                                                        <div class="flex items-center gap-1 mt-0.5">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                 class="w-3 h-3 text-[#84C1D9] flex-shrink-0"
                                                                 viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                                 stroke-width="2">
                                                                <path
                                                                    d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                                <circle cx="12" cy="7" r="4"></circle>
                                                            </svg>
                                                            <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                            leading-tight">Mr. Walid Ben Salah
                                                                President, Pan African
                                                                Federation of Accountants</h6>
                                                        </div>
                                                        <div class="flex items-center gap-1 mt-0.5">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                 class="w-3 h-3 text-[#84C1D9] flex-shrink-0"
                                                                 viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                                 stroke-width="2">
                                                                <path
                                                                    d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                                <circle cx="12" cy="7" r="4"></circle>
                                                            </svg>
                                                            <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                            leading-tight">Mr. Walid Ben Salah
                                                                President, Pan African
                                                                Federation of Accountants</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="flex relative bg-[#84C1D9] rounded text-white ">
                                                <div class="relative">
                                                    <div
                                                        class="w-3 h-3 bg-[#ef4444] rounded-full shadow-lg shadow-[#ef4444]/50 flex-shrink-0 z-10 relative"></div>
                                                    <div
                                                        class="absolute inset-0 w-3 h-3 bg-[#ef4444] rounded-full opacity-30 animate-ping"></div>
                                                </div>
                                                <div class="ml-4 sm:ml-6 ">
                                                    <div class="text-xs sm:text-sm font-bold text-white
                                                    mb-1">10:30a.m. – 11:00a.m
                                                    </div>
                                                    <ul class="text-white text-sm sm:text-base space-y-2">
                                                        <li class="before:mr-2 before:text-red-500 before:content-['→']">
                                                            Exhibition Tour by Guests
                                                        </li>
                                                        <li class="before:mr-2 before:text-red-500 before:content-['→']">
                                                            Health Break
                                                        </li>
                                                    </ul>
                                                    <div class="flex items-center gap-1 mt-0.5">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                             class="w-3 h-3 text-white flex-shrink-0"
                                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                             stroke-width="2">
                                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                            <circle cx="12" cy="7" r="4"></circle>
                                                        </svg>
                                                        <h6 class="text-white text-xs italic font-normal
                                                        leading-tight">Dr. Percy Opio
                                                            Board Chairman, KASNEB</h6>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="flex relative">
                                                <div class="relative">
                                                    <div
                                                        class="w-3 h-3 bg-[#ef4444] rounded-full shadow-lg shadow-[#ef4444]/50 flex-shrink-0 z-10 relative"></div>
                                                    <div
                                                        class="absolute inset-0 w-3 h-3 bg-[#ef4444] rounded-full opacity-30 animate-ping"></div>
                                                </div>
                                                <div class="ml-4 sm:ml-6">
                                                    <div class="text-xs sm:text-sm font-bold text-[#84C1D9]
                                                    mb-1">11:00a.m. – 12:30p.m.
                                                    </div>
                                                    <h5 class="text-[#175C93] text-sm sm:text-base">
                                                        Parallel Sessions</h5>

                                                    <div class="block p-2 mb-2 sm:mb-4 sm:p-6 relative flex-1
                                                    overflow-y-auto bg-[#DAECF3] rounded-lg shadow-lg">
                                                        <ul>
                                                            <li><strong>Session 1:</strong>
                                                                Topic: Thriving in a World that
                                                                is Not Staying Still: Preparing
                                                                Professionals for What’s
                                                                Next?
                                                            </li>

                                                            <li>
                                                                <strong>Session Chair:</strong>
                                                                Prof. Charles Ochieng’
                                                                Ong’ondo
                                                                Chief Executive Officer
                                                                (CEO), Kenya Institute of
                                                                Curriculum Development
                                                            </li>
                                                        </ul>

                                                        <h2>Speaker:</h2>

                                                        <div class="flex items-center gap-1 mt-0.5">

                                                            <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                        leading-tight">
                                                                <strong>Speaker</strong>
                                                            </h6>
                                                            <div class="flex items-center gap-1 mt-0.5">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                     class="w-3 h-3 text-[#84C1D9] flex-shrink-0"
                                                                     viewBox="0 0 24 24" fill="none"
                                                                     stroke="currentColor"
                                                                     stroke-width="2">
                                                                    <path
                                                                        d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                                    <circle cx="12" cy="7" r="4"></circle>
                                                                </svg>
                                                                <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                            leading-tight">Mrs. Funmi Ekundayo, FCIS President,
                                                                    Corporate Secretaries International Association</h6>
                                                            </div>

                                                        </div>
                                                        <div class="flex items-center gap-1 mt-0.5">

                                                            <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                        leading-tight">
                                                                <strong>Discussants</strong>
                                                            </h6>
                                                            <div class="flex items-center gap-1 mt-0.5">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                     class="w-3 h-3 text-[#84C1D9] flex-shrink-0"
                                                                     viewBox="0 0 24 24" fill="none"
                                                                     stroke="currentColor"
                                                                     stroke-width="2">
                                                                    <path
                                                                        d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                                    <circle cx="12" cy="7" r="4"></circle>
                                                                </svg>
                                                                <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                            leading-tight">Dr. George Wakah
                                                                    Director of Administration,
                                                                    Finance and Corporate
                                                                    Affairs,
                                                                    Centre for Parliamentary
                                                                    Studies and Training (CPST)</h6>
                                                            </div>
                                                            <div class="flex items-center gap-1 mt-0.5">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                     class="w-3 h-3 text-[#84C1D9] flex-shrink-0"
                                                                     viewBox="0 0 24 24" fill="none"
                                                                     stroke="currentColor"
                                                                     stroke-width="2">
                                                                    <path
                                                                        d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                                    <circle cx="12" cy="7" r="4"></circle>
                                                                </svg>
                                                                <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                            leading-tight">Prof. Nura Mohamed
                                                                    Director General, Kenya
                                                                    School of Government</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="block p-2 mb-2 sm:mb-4 sm:p-6 relative flex-1
                                                    overflow-y-auto bg-[#DAECF3] rounded-lg shadow-lg">
                                                        <ul>
                                                            <li><strong>Session 2:</strong>
                                                                Topic: The Smart City
                                                            </li>

                                                            <li>
                                                                <strong>Session Chair:</strong>
                                                                Mr. David Mugonyi, EBS
                                                                Director General,
                                                                Communications Authority
                                                            </li>
                                                        </ul>

                                                        <h2>Speaker:</h2>

                                                        <div class="flex items-center gap-1 mt-0.5">

                                                            <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                        leading-tight">
                                                                <strong>Speaker</strong>
                                                            </h6>
                                                            <div class="flex items-center gap-1 mt-0.5">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                     class="w-3 h-3 text-[#84C1D9] flex-shrink-0"
                                                                     viewBox="0 0 24 24" fill="none"
                                                                     stroke="currentColor"
                                                                     stroke-width="2">
                                                                    <path
                                                                        d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                                    <circle cx="12" cy="7" r="4"></circle>
                                                                </svg>
                                                                <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                            leading-tight">Ms. Anacláudia Rossbach
                                                                    Executive Director, UNHabitat in Nairobi</h6>
                                                            </div>

                                                        </div>
                                                        <div class="flex items-center gap-1 mt-0.5">

                                                            <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                        leading-tight">
                                                                <strong>Discussants</strong>
                                                            </h6>
                                                            <div class="flex items-center gap-1 mt-0.5">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                     class="w-3 h-3 text-[#84C1D9] flex-shrink-0"
                                                                     viewBox="0 0 24 24" fill="none"
                                                                     stroke="currentColor"
                                                                     stroke-width="2">
                                                                    <path
                                                                        d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                                    <circle cx="12" cy="7" r="4"></circle>
                                                                </svg>
                                                                <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                            leading-tight">Mr. John Okwiri, OGW, MBA,
                                                                    MCIPS
                                                                    Chief Executive Officer,
                                                                    Technopolis Development
                                                                    Authority</h6>
                                                            </div>
                                                            <div class="flex items-center gap-1 mt-0.5">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                     class="w-3 h-3 text-[#84C1D9] flex-shrink-0"
                                                                     viewBox="0 0 24 24" fill="none"
                                                                     stroke="currentColor"
                                                                     stroke-width="2">
                                                                    <path
                                                                        d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                                    <circle cx="12" cy="7" r="4"></circle>
                                                                </svg>
                                                                <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                            leading-tight">Dr. Kenneth Chelule, P. Eng,
                                                                    FIET, EBS
                                                                    Chief Executive Office,
                                                                    Special Economic Zones
                                                                    Authority</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="block p-2 mb-2 sm:mb-4 sm:p-6 relative flex-1
                                                    overflow-y-auto bg-[#DAECF3] rounded-lg shadow-lg">
                                                        <ul>
                                                            <li><strong>Session 3:</strong>
                                                                Topic: Geopolitical Conflicts
                                                                Driving High Cost of Living:
                                                                Navigating Crisis the
                                                                Professional Way
                                                            </li>

                                                            <li>
                                                                <strong>Session Chair:</strong>
                                                                Prof. Isaiah I.C. Wakindiki
                                                                Vice Chancelor, KCA
                                                                University
                                                            </li>
                                                        </ul>

                                                        <h2>Speaker:</h2>

                                                        <div class="flex items-center gap-1 mt-0.5">

                                                            <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                        leading-tight">
                                                                <strong>Speaker</strong>
                                                            </h6>
                                                            <div class="flex items-center gap-1 mt-0.5">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                     class="w-3 h-3 text-[#84C1D9] flex-shrink-0"
                                                                     viewBox="0 0 24 24" fill="none"
                                                                     stroke="currentColor"
                                                                     stroke-width="2">
                                                                    <path
                                                                        d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                                    <circle cx="12" cy="7" r="4"></circle>
                                                                </svg>
                                                                <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                            leading-tight">Dr. Workneh Gebeyehu
                                                                    Executive Director,
                                                                    Intergovernmental
                                                                    Authority on Development</h6>
                                                            </div>

                                                        </div>
                                                        <div class="flex items-center gap-1 mt-0.5">

                                                            <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                        leading-tight">
                                                                <strong>Discussants</strong>
                                                            </h6>
                                                            <div class="flex items-center gap-1 mt-0.5">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                     class="w-3 h-3 text-[#84C1D9] flex-shrink-0"
                                                                     viewBox="0 0 24 24" fill="none"
                                                                     stroke="currentColor"
                                                                     stroke-width="2">
                                                                    <path
                                                                        d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                                    <circle cx="12" cy="7" r="4"></circle>
                                                                </svg>
                                                                <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                            leading-tight">Dr. Korir Sing'oei, Principal Secretary, Foreign
                                                                    Affairs</h6>
                                                            </div>
                                                            <div class="flex items-center gap-1 mt-0.5">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                     class="w-3 h-3 text-[#84C1D9] flex-shrink-0"
                                                                     viewBox="0 0 24 24" fill="none"
                                                                     stroke="currentColor"
                                                                     stroke-width="2">
                                                                    <path
                                                                        d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                                    <circle cx="12" cy="7" r="4"></circle>
                                                                </svg>
                                                                <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                            leading-tight">Ms. Regina Akoth Ombam
                                                                    Principal Secretary, State
                                                                    Department for Trade</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="flex relative bg-[#84C1D9] rounded text-white ">
                                                <div class="relative">
                                                    <div
                                                        class="w-3 h-3 bg-[#ef4444] rounded-full shadow-lg shadow-[#ef4444]/50 flex-shrink-0 z-10 relative"></div>
                                                    <div
                                                        class="absolute inset-0 w-3 h-3 bg-[#ef4444] rounded-full opacity-30 animate-ping"></div>
                                                </div>
                                                <div class="ml-4 sm:ml-6 ">
                                                    <div class="text-xs sm:text-sm font-bold text-white
                                                    mb-1">12:30p.m. – 1:00p.m.
                                                    </div>
                                                    <ul class="text-white text-sm sm:text-base space-y-2">
                                                        <li class="before:mr-2 before:text-red-500 before:content-['→']">
                                                            Networking & Tour of
                                                            Exhibition
                                                        </li>
                                                    </ul>
                                                    <div class="flex items-center gap-1 mt-0.5">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                             class="w-3 h-3 text-white flex-shrink-0"
                                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                             stroke-width="2">
                                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                            <circle cx="12" cy="7" r="4"></circle>
                                                        </svg>
                                                        <h6 class="text-white text-xs italic font-normal
                                                        leading-tight">All</h6>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="flex relative bg-[#84C1D9] rounded text-white ">
                                                <div class="relative">
                                                    <div
                                                        class="w-3 h-3 bg-[#ef4444] rounded-full shadow-lg shadow-[#ef4444]/50 flex-shrink-0 z-10 relative"></div>
                                                    <div
                                                        class="absolute inset-0 w-3 h-3 bg-[#ef4444] rounded-full opacity-30 animate-ping"></div>
                                                </div>
                                                <div class="ml-4 sm:ml-6 ">
                                                    <div class="text-xs sm:text-sm font-bold text-white
                                                    mb-1">1:00p.m - 2:00pm
                                                    </div>
                                                    <ul class="text-white text-sm sm:text-base space-y-2">
                                                        <li class="before:mr-2 before:text-red-500 before:content-['→']">
                                                            Lunch & Networking
                                                        </li>
                                                    </ul>
                                                    <div class="flex items-center gap-1 mt-0.5">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                             class="w-3 h-3 text-white flex-shrink-0"
                                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                             stroke-width="2">
                                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                            <circle cx="12" cy="7" r="4"></circle>
                                                        </svg>
                                                        <h6 class="text-white text-xs italic font-normal
                                                        leading-tight">All</h6>
                                                    </div>
                                                </div>
                                            </div>




                                        </div>
                                    </div>
                                </div>
                                <div class="bg-white rounded-xl shadow-xl overflow-hidden flex flex-col"
                                     style="height:680px">
                                    <div
                                        class="bg-gradient-to-r from-[#175C93] to-[#7BC7F0] text-white p-4 sm:p-6
                                        flex-shrink-0">
                                        <h4 class="text-lg sm:text-xl font-bold">DAY FIVE </h4>
                                        <p class="text-xs sm:text-sm opacity-90 mt-1">Afternoon session</p>
                                    </div>
                                    <div class="p-4 sm:p-6 relative flex-1 overflow-y-auto">
                                        <div class="space-y-4 sm:space-y-6 relative">
                                            <div
                                                class="absolute left-[5px] top-[6px] bottom-[6px] w-0.5 bg-[#ef4444]">

                                            </div>
                                            <div class="flex relative">
                                                <div class="relative">
                                                    <div
                                                        class="w-3 h-3 bg-[#ef4444] rounded-full shadow-lg shadow-[#ef4444]/50 flex-shrink-0 z-10 relative"></div>
                                                    <div
                                                        class="absolute inset-0 w-3 h-3 bg-[#ef4444] rounded-full opacity-30 animate-ping"></div>
                                                </div>
                                                <div class="ml-4 sm:ml-6 ">
                                                    <div class="text-xs sm:text-sm font-bold text-[#84C1D9]
                                                    mb-1">2:00p.m. – 2:30p.m.
                                                    </div>
                                                    <ul class="text-[#84C1D9] text-sm sm:text-base space-y-2">
                                                        <li class="before:mr-2 before:text-red-500 before:content-['→']">
                                                            The debate: Can Robots Be
                                                            Professional?
                                                        </li>
                                                    </ul>
                                                    <div class="flex items-center gap-1 mt-0.5">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                             class="w-3 h-3 text-[#84C1D9]  flex-shrink-0"
                                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                             stroke-width="2">
                                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                            <circle cx="12" cy="7" r="4"></circle>
                                                        </svg>
                                                        <h6 class="text-[#84C1D9]  text-xs italic font-normal
                                                        leading-tight">KCA University</h6>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="flex relative">
                                                <div class="relative">
                                                    <div
                                                        class="w-3 h-3 bg-[#ef4444] rounded-full shadow-lg shadow-[#ef4444]/50 flex-shrink-0 z-10 relative"></div>
                                                    <div
                                                        class="absolute inset-0 w-3 h-3 bg-[#ef4444] rounded-full opacity-30 animate-ping"></div>
                                                </div>
                                                <div class="ml-4 sm:ml-6">
                                                    <div class="text-xs sm:text-sm font-bold text-[#84C1D9]
                                                    mb-1">2:30p.m. – 4:00p.m
                                                    </div>
                                                    <h5 class="text-[#175C93] text-sm sm:text-base">
                                                        Parallel Sessions</h5>

                                                    <div class="block p-2 mb-2 sm:mb-4 sm:p-6 relative flex-1
                                                    overflow-y-auto bg-[#DAECF3] rounded-lg shadow-lg">
                                                        <ul>
                                                            <li><strong>Masterclass:</strong>
                                                                Beyond the
                                                                Paycheck: Building Wealth
                                                                That Lasts for Generations
                                                            </li>

                                                            <li>
                                                                <strong>Session Chair:</strong>
                                                                Dr Jonah Aiyabei, Ph.D
                                                                Chief Executive Officer,
                                                                Public Service
                                                                Superannuation Fund
                                                                (PSSF)
                                                            </li>
                                                        </ul>


                                                        <div class="flex items-center gap-1 mt-0.5">

                                                            <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                        leading-tight">
                                                                <strong>Speaker</strong>
                                                            </h6>
                                                            <div class="flex items-center gap-1 mt-0.5">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                     class="w-3 h-3 text-[#84C1D9] flex-shrink-0"
                                                                     viewBox="0 0 24 24" fill="none"
                                                                     stroke="currentColor"
                                                                     stroke-width="2">
                                                                    <path
                                                                        d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                                    <circle cx="12" cy="7" r="4"></circle>
                                                                </svg>
                                                                <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                            leading-tight">Mr. Philip Lopokoiyit
                                                                    Chief Executive Officer,
                                                                    ICEA Lion Group</h6>
                                                            </div>

                                                        </div>

                                                        <h3>
                                                            <strong>Panel Session:</strong> Evolving
                                                            Professional Standards in
                                                            Response to Technological
                                                            Changes
                                                        </h3>

                                                        <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                        leading-tight">
                                                            <strong>Panellists</strong>
                                                        </h6>
                                                        <div class="flex items-center gap-1 mt-0.5">

                                                            <div class="flex items-center gap-1 mt-0.5">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                     class="w-3 h-3 text-[#84C1D9] flex-shrink-0"
                                                                     viewBox="0 0 24 24" fill="none"
                                                                     stroke="currentColor"
                                                                     stroke-width="2">
                                                                    <path
                                                                        d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                                    <circle cx="12" cy="7" r="4"></circle>
                                                                </svg>
                                                                <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                            leading-tight">Prof. CPA Elizabeth N.
                                                                    Kalunda-Muvui, PhD
                                                                    President, Institute of
                                                                    Certified Public
                                                                    Accountants of Kenya</h6>
                                                            </div>

                                                        </div>
                                                        <div class="flex items-center gap-1 mt-0.5">

                                                            <div class="flex items-center gap-1 mt-0.5">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                     class="w-3 h-3 text-[#84C1D9] flex-shrink-0"
                                                                     viewBox="0 0 24 24" fill="none"
                                                                     stroke="currentColor"
                                                                     stroke-width="2">
                                                                    <path
                                                                        d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                                    <circle cx="12" cy="7" r="4"></circle>
                                                                </svg>
                                                                <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                            leading-tight">FCS Jacqueline Waihenya
                                                                    Chairperson, Institute of
                                                                    Certified Secretaries of
                                                                    Kenya</h6>
                                                            </div>

                                                        </div>
                                                        <div class="flex items-center gap-1 mt-0.5">

                                                            <div class="flex items-center gap-1 mt-0.5">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                     class="w-3 h-3 text-[#84C1D9] flex-shrink-0"
                                                                     viewBox="0 0 24 24" fill="none"
                                                                     stroke="currentColor"
                                                                     stroke-width="2">
                                                                    <path
                                                                        d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                                    <circle cx="12" cy="7" r="4"></circle>
                                                                </svg>
                                                                <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                            leading-tight">Mr. Charles Kanjama
                                                                    President, Law Society of
                                                                    Kenya</h6>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="block p-2 mb-2 sm:mb-4 sm:p-6 relative flex-1
                                                    overflow-y-auto bg-[#DAECF3] rounded-lg shadow-lg">
                                                        <ul>
                                                            <li>
                                                                Topic: Election Readiness,
                                                                Integrity and Resilience:
                                                                Global Lessons
                                                            </li>

                                                            <li>
                                                                <strong>Session Chair:</strong>
                                                                Geoffrey Odundo
                                                                Group Managing Director &
                                                                Chief Executive Officer,
                                                                Nation Media Group
                                                            </li>
                                                        </ul>

                                                        <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                        leading-tight">
                                                            <strong>Panellists</strong>
                                                        </h6>
                                                        <div class="flex items-center gap-1 mt-0.5">

                                                            <div class="flex items-center gap-1 mt-0.5">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                     class="w-3 h-3 text-[#84C1D9] flex-shrink-0"
                                                                     viewBox="0 0 24 24" fill="none"
                                                                     stroke="currentColor"
                                                                     stroke-width="2">
                                                                    <path
                                                                        d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                                    <circle cx="12" cy="7" r="4"></circle>
                                                                </svg>
                                                                <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                            leading-tight">Dr. Garry Conille
                                                                    United Nations Resident
                                                                    Coordinator, Kenya</h6>
                                                            </div>

                                                        </div>
                                                        <div class="flex items-center gap-1 mt-0.5">

                                                            <div class="flex items-center gap-1 mt-0.5">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                     class="w-3 h-3 text-[#84C1D9] flex-shrink-0"
                                                                     viewBox="0 0 24 24" fill="none"
                                                                     stroke="currentColor"
                                                                     stroke-width="2">
                                                                    <path
                                                                        d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                                    <circle cx="12" cy="7" r="4"></circle>
                                                                </svg>
                                                                <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                            leading-tight">Mr. Jean-Luc Stalon
                                                                    UNDP Resident
                                                                    Representative, Kenya</h6>
                                                            </div>

                                                        </div>
                                                        <div class="flex items-center gap-1 mt-0.5">

                                                            <div class="flex items-center gap-1 mt-0.5">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                     class="w-3 h-3 text-[#84C1D9] flex-shrink-0"
                                                                     viewBox="0 0 24 24" fill="none"
                                                                     stroke="currentColor"
                                                                     stroke-width="2">
                                                                    <path
                                                                        d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                                    <circle cx="12" cy="7" r="4"></circle>
                                                                </svg>
                                                                <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                            leading-tight">Ms. Henriette Geiger
                                                                    the European Union
                                                                    Ambassador to Kenya</h6>
                                                            </div>

                                                        </div>
                                                        <div class="flex items-center gap-1 mt-0.5">

                                                            <div class="flex items-center gap-1 mt-0.5">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                     class="w-3 h-3 text-[#84C1D9] flex-shrink-0"
                                                                     viewBox="0 0 24 24" fill="none"
                                                                     stroke="currentColor"
                                                                     stroke-width="2">
                                                                    <path
                                                                        d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                                    <circle cx="12" cy="7" r="4"></circle>
                                                                </svg>
                                                                <h6 class="text-[#84C1D9] text-xs italic font-normal
                                                            leading-tight">Ms. Susan M. Burns
                                                                    Chargé d’Affaires,
                                                                    United States of America,
                                                                    Embassy in Nairobi</h6>
                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="flex relative bg-[#84C1D9] rounded text-white ">
                                                <div class="relative">
                                                    <div
                                                        class="w-3 h-3 bg-[#ef4444] rounded-full shadow-lg shadow-[#ef4444]/50 flex-shrink-0 z-10 relative"></div>
                                                    <div
                                                        class="absolute inset-0 w-3 h-3 bg-[#ef4444] rounded-full opacity-30 animate-ping"></div>
                                                </div>
                                                <div class="ml-4 sm:ml-6 ">
                                                    <div class="text-xs sm:text-sm font-bold text-white
                                                    mb-1">4:00p.m. – 5:00p.m
                                                    </div>
                                                    <ul class="text-white text-sm sm:text-base space-y-2">

                                                        <li class="before:mr-2 before:text-red-500 before:content-['→']">
                                                            Health Break
                                                        </li>
                                                    </ul>
                                                    <div class="flex items-center gap-1 mt-0.5">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                             class="w-3 h-3 text-white flex-shrink-0"
                                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                             stroke-width="2">
                                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                            <circle cx="12" cy="7" r="4"></circle>
                                                        </svg>
                                                        <h6 class="text-white text-xs italic font-normal
                                                        leading-tight">Dr. Percy Opio
                                                            Board Chairman, KASNEB</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex relative bg-[#84C1D9] rounded text-white ">
                                                <div class="relative">
                                                    <div
                                                        class="w-3 h-3 bg-[#ef4444] rounded-full shadow-lg shadow-[#ef4444]/50 flex-shrink-0 z-10 relative"></div>
                                                    <div
                                                        class="absolute inset-0 w-3 h-3 bg-[#ef4444] rounded-full opacity-30 animate-ping"></div>
                                                </div>
                                                <div class="ml-4 sm:ml-6 ">
                                                    <div class="text-xs sm:text-sm font-bold text-white
                                                    mb-1">5:00p.m. – 6:00p.m
                                                    </div>
                                                    <ul class="text-white text-sm sm:text-base space-y-2">

                                                        <li class="before:mr-2 before:text-red-500 before:content-['→']">
                                                            Networking & Tour of
                                                            Exhibition
                                                        </li>
                                                    </ul>
                                                    <div class="flex items-center gap-1 mt-0.5">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                             class="w-3 h-3 text-white flex-shrink-0"
                                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                             stroke-width="2">
                                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                            <circle cx="12" cy="7" r="4"></circle>
                                                        </svg>
                                                        <h6 class="text-white text-xs italic font-normal
                                                        leading-tight">All</h6>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </section>
        </div>

        <div class="bg-white relative py-12 sm:py-16 md:py-20" id="speakers-section">
            <section class="relative mx-auto max-w-6xl px-4 sm:px-6">
                <div class="flex flex-col sm:flex-row justify-between items-start mb-6 sm:mb-8 gap-4">
                    <div>
                        <h3 class="text-3xl sm:text-4xl text-slate-800 font-normal">Meet the speakers</h3>
                        <p class="text-base sm:text-lg md:text-xl font-normal text-slate-800 mb-4">Gain insights from
                            leading voices in business, governance and professional development</p>
                    </div>
                    <div class="flex gap-2 self-end">
                        <button id="speakers-prev"
                                class="w-10 h-10 sm:w-12 sm:h-12 border border-slate-800 text-slate-800 rounded-full flex items-center justify-center hover:bg-slate-800 hover:text-white transition-colors duration-300 shadow-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                 aria-hidden="true" role="img" class="iconify iconify--mdi" width="20" height="20"
                                 viewBox="0 0 24 24">
                                <path fill="currentColor" d="M15.41 16.58L10.83 12l4.58-4.59L14 6l-6 6l6 6z"></path>
                            </svg>
                        </button>
                        <button id="speakers-next"
                                class="w-10 h-10 sm:w-12 sm:h-12 border border-slate-800 text-slate-800 rounded-full flex items-center justify-center hover:bg-slate-800 hover:text-white transition-colors duration-300 shadow-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                 aria-hidden="true" role="img" class="iconify iconify--mdi" width="20" height="20"
                                 viewBox="0 0 24 24">
                                <path fill="currentColor" d="M8.59 16.58L13.17 12L8.59 7.41L10 6l6 6l-6 6z"></path>
                            </svg>
                        </button>
                    </div>
                </div>
                <!-- Speakers Carousel -->
                <div id="speakers-carousel-container" class="overflow-hidden rounded-xl">
                    <div id="speakers-carousel-track"
                         class="flex gap-4 sm:gap-6 transition-transform duration-500 ease-out">
                        {{-- i. Koskei - COF--}}
                        <div class="flex-shrink-0 w-full sm:w-1/2 lg:w-1/3">
                            <div
                                class="relative rounded-xl shadow-xl overflow-hidden group cursor-pointer h-80 sm:h-96">
                                <img alt="Felix Koskei" loading="lazy" width="400" height="500"
                                     class="w-full h-full object-cover" style="color:transparent"
                                     src="{{ asset('assets/media/images/speakers/fkoskei.jpg') }}">
                                <div
                                    class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent group-hover:bg-gradient-to-t group-hover:from-black/0 group-hover:to-transparent transition-all duration-300 p-4 sm:p-6">
                                    <div
                                        class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-300"
                                        style="background:linear-gradient(to top, #175C93 0%, #BBE1F8 40%, rgba(0,0,0,0) 100%)"></div>
                                    <div class="relative z-10 flex justify-between items-center">
                                        <div>
                                            <h4 class="text-lg sm:text-xl font-bold text-white mb-1">Mr. Felix Koskei,
                                                EGH
                                            </h4>
                                            <p class="text-white/90 text-xs sm:text-sm">Chief of Staff and Head of
                                                Public Service</p>
                                        </div>
                                        <div class="flex-shrink-0"><a
                                                href="#"
                                                target="_blank" rel="noopener noreferrer"
                                                class="hover:scale-110 transition-transform duration-200">

                                            </a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--2. CS Mbadi--}}
                        <div class="flex-shrink-0 w-full sm:w-1/2 lg:w-1/3">
                            <div
                                class="relative rounded-xl shadow-xl overflow-hidden group cursor-pointer h-80 sm:h-96">
                                <img alt="CS Mbadi" loading="lazy" width="400" height="500"
                                     class="w-full h-full object-cover" style="color:transparent"
                                     src="{{ asset('assets/media/images/speakers/cs-mbadi.jpeg') }}">
                                <div
                                    class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent group-hover:bg-gradient-to-t group-hover:from-black/0 group-hover:to-transparent transition-all duration-300 p-4 sm:p-6">
                                    <div
                                        class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-300"
                                        style="background:linear-gradient(to top, #175C93 0%, #BBE1F8 40%, rgba(0,0,0,0) 100%)"></div>
                                    <div class="relative z-10 flex justify-between items-center">
                                        <div>
                                            <h4 class="text-lg sm:text-xl font-bold text-white mb-1">FCPA Hon. John
                                                Mbadi Ng'ongo, EGH
                                            </h4>
                                            <p class="text-white/90 text-xs sm:text-sm">Cabinet Secretary, The National
                                                Treasury and Economic Planning</p>
                                        </div>
                                        <div class="flex-shrink-0"><a
                                                href="#"
                                                target="_blank" rel="noopener noreferrer"
                                                class="hover:scale-110 transition-transform duration-200">

                                            </a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--3. Dr. Chris K. Kiptoo, CBS--}}
                        <div class="flex-shrink-0 w-full sm:w-1/2 lg:w-1/3">
                            <div
                                class="relative rounded-xl shadow-xl overflow-hidden group cursor-pointer h-80 sm:h-96">
                                <img alt="PS Kiptoo" loading="lazy" width="400" height="500"
                                     class="w-full h-full object-cover" style="color:transparent"
                                     src="{{ asset('assets/media/images/speakers/ps-Kiptoo.jpeg') }}">
                                <div
                                    class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent group-hover:bg-gradient-to-t group-hover:from-black/0 group-hover:to-transparent transition-all duration-300 p-4 sm:p-6">
                                    <div
                                        class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-300"
                                        style="background:linear-gradient(to top, #175C93 0%, #BBE1F8 40%, rgba(0,0,0,0) 100%)"></div>
                                    <div class="relative z-10 flex justify-between items-center">
                                        <div>
                                            <h4 class="text-lg sm:text-xl font-bold text-white mb-1">Dr. Chris K.
                                                Kiptoo, CBS
                                            </h4>
                                            <p class="text-white/90 text-xs sm:text-sm">Principal Secretary, The
                                                National Treasury</p>
                                        </div>
                                        <div class="flex-shrink-0"><a
                                                href="#"
                                                target="_blank" rel="noopener noreferrer"
                                                class="hover:scale-110 transition-transform duration-200">

                                            </a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Speaker 1: Anna -->
                        <div class="flex-shrink-0 w-full sm:w-1/2 lg:w-1/3">
                            <div
                                class="relative rounded-xl shadow-xl overflow-hidden group cursor-pointer h-80 sm:h-96">
                                <img alt="Anna Ceesay" loading="lazy" width="400" height="500"
                                     class="w-full h-full object-cover" style="color:transparent"
                                     src="{{ asset('assets/media/images/speakers/percy-opiyo.jpg') }}">
                                <div
                                    class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent group-hover:bg-gradient-to-t group-hover:from-black/0 group-hover:to-transparent transition-all duration-300 p-4 sm:p-6">
                                    <div
                                        class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-300"
                                        style="background:linear-gradient(to top, #175C93 0%, #BBE1F8 40%, rgba(0,0,0,0) 100%)"></div>
                                    <div class="relative z-10 flex justify-between items-center">
                                        <div>
                                            <h4 class="text-lg sm:text-xl font-bold text-white mb-1">Dr Percy Opio
                                                PhD</h4>
                                            <p class="text-white/90 text-xs sm:text-sm">Chairman of The Board of
                                                Directors</p>
                                        </div>
                                        <div class="flex-shrink-0"><a
                                                href="#"
                                                target="_blank" rel="noopener noreferrer"
                                                class="hover:scale-110 transition-transform duration-200">

                                            </a></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Speaker 2: Yannick -->
                        <div class="flex-shrink-0 w-full sm:w-1/2 lg:w-1/3">
                            <div
                                class="relative rounded-xl shadow-xl overflow-hidden group cursor-pointer h-80 sm:h-96">
                                <img alt="Yannick Lefang" loading="lazy" width="400" height="500"
                                     class="w-full h-full object-cover" style="color:transparent"
                                     src="{{ asset('assets/media/images/speakers/joseph-kanyi.jpg') }}">
                                <div
                                    class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent group-hover:bg-gradient-to-t group-hover:from-black/0 group-hover:to-transparent transition-all duration-300 p-4 sm:p-6">
                                    <div
                                        class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-300"
                                        style="background:linear-gradient(to top, #175C93 0%, #BBE1F8 40%, rgba(0,0,0,0) 100%)"></div>
                                    <div class="relative z-10 flex justify-between items-center">
                                        <div>
                                            <h4 class="text-lg sm:text-xl font-bold text-white mb-1">Dr. Joseph M. Kanyi
                                                PhD</h4>
                                            <p class="text-white/90 text-xs sm:text-sm">Vice Chairman of The Board of
                                                Directors, Representing Ministry of Education</p>
                                        </div>
                                        <div class="flex-shrink-0"><a
                                                href="#"
                                                target="_blank" rel="noopener noreferrer"
                                                class="hover:scale-110 transition-transform duration-200">

                                            </a></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Speaker 3: Dr. Gillian -->
                        <div class="flex-shrink-0 w-full sm:w-1/2 lg:w-1/3">
                            <div
                                class="relative rounded-xl shadow-xl overflow-hidden group cursor-pointer h-80 sm:h-96">
                                <img alt="Dr. Gillian Hammah" loading="lazy" width="400" height="500"
                                     class="w-full h-full object-cover" style="color:transparent"
                                     src="{{ asset('assets/media/images/speakers/letting.jpg') }}">
                                <div
                                    class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent group-hover:bg-gradient-to-t group-hover:from-black/0 group-hover:to-transparent transition-all duration-300 p-4 sm:p-6">
                                    <div
                                        class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-300"
                                        style="background:linear-gradient(to top, #84C1D9 0%, #84C1D9 40%, rgba(0,0,0,0) 100%)"></div>
                                    <div class="relative z-10 flex justify-between items-center">
                                        <div>
                                            <h4 class="text-lg sm:text-xl font-bold text-white mb-1">FCPA Prof. Nicholas
                                                K. Letting’ PhD, EBS, HSC</h4>
                                            <p class="text-white/90 text-xs sm:text-sm">Secretary/Chief Executive
                                                Officer</p>
                                        </div>
                                        <div class="flex-shrink-0"><a
                                                href="https://www.linkedin.com/in/gillian-hammah?originalSubdomain=gh"
                                                target="_blank" rel="noopener noreferrer"
                                                class="hover:scale-110 transition-transform duration-200">

                                            </a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-center sm:justify-start gap-2 mt-6 sm:mt-8">
                    <a href="@if(!request()->routeIs('/')) {{ route('/') }}#tickets-section @else #tickets-section
                        @endif"
                        class="bg-gradient-to-r from-[#175C93] to-[#84C1DA] border border-transparent text-white px-6
                         sm:px-8
                         py-3 rounded-full hover:opacity-90 transition-all duration-300 font-medium text-sm sm:text-base shadow-lg flex items-center justify-center gap-2 w-full sm:w-auto">
                        Register now
                    </a>
                </div>
            </section>
        </div>
        <div class="bg-[#DAECF3] relative py-12 sm:py-16 md:py-20" id="participants">
            <section class="relative mx-auto max-w-6xl px-4 sm:px-6">
                <div class="flex justify-center mb-8 sm:mb-12">
                    <h2 class="text-xs sm:text-sm w-fit border border-slate-800 text-slate-800 mb-4 bg-[#84C1DA] rounded-full px-3 sm:px-4 py-1">
                        Who can attend?</h2>
                </div>
                <div class="w-full overflow-hidden whitespace-nowrap py-4 sm:py-5 bg-white/20 rounded-lg mb-3 sm:mb-4">
                    <div class="inline-flex animate-marquee-right">
                        <div class="flex space-x-4 sm:space-x-6 md:space-x-8 whitespace-nowrap">
                            <div class="flex items-center space-x-4 sm:space-x-6 md:space-x-8"><span
                                    class="text-lg sm:text-xl md:text-2xl font-semibold text-slate-800 whitespace-nowrap">Finance & Accounting Professionals</span><span
                                    class="text-2xl sm:text-3xl text-red-500">•</span><span
                                    class="text-lg sm:text-xl md:text-2xl font-semibold text-slate-800 whitespace-nowrap">Business & Corporate Leaders</span>
                                <span class="text-2xl sm:text-3xl text-[#84C1DA]">•</span><span
                                    class="text-lg sm:text-xl md:text-2xl font-semibold text-slate-800 whitespace-nowrap">ICT & Digital Transformation Experts</span><span
                                    class="text-2xl sm:text-3xl text-slate-800">•</span>
                                <span
                                    class="text-lg sm:text-xl md:text-2xl font-semibold text-slate-800 whitespace-nowrap">Human Resource & Organizational Development Professionals</span>
                                <span class="text-2xl sm:text-3xl text-[#175C93]">•</span><span
                                    class="text-lg sm:text-xl md:text-2xl font-semibold text-slate-800 whitespace-nowrap">Marketing, Media & Communication Professionals</span><span
                                    class="text-2xl sm:xtext-3xl text-[#175C93]">•</span></div>
                            <div class="flex items-center space-x-4 sm:space-x-6 md:space-x-8"><span
                                    class="text-lg sm:text-xl md:text-2xl font-semibold text-slate-800 whitespace-nowrap">Procurement & Supply Chain Professionals</span><span
                                    class="text-2xl sm:text-3xl text-red-500">•</span>
                                <span
                                    class="text-2xl sm:text-3xl text-slate-800">
                                    •</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full overflow-hidden whitespace-nowrap py-4 sm:py-5 bg-white/20 rounded-lg">
                    <div class="inline-flex animate-marquee-left">
                        <div class="flex space-x-4 sm:space-x-6 md:space-x-8 whitespace-nowrap">
                            <div class="flex items-center space-x-4 sm:space-x-6 md:space-x-8"><span
                                    class="text-lg sm:text-xl md:text-2xl font-semibold text-slate-800 whitespace-nowrap">Legal & Governance Experts</span>
                                <span class="text-2xl sm:text-3xl text-[#84C1DA]">•</span><span
                                    class="text-lg sm:text-xl md:text-2xl font-semibold text-slate-800 whitespace-nowrap">Entrepreneurs & Business Owners</span><span
                                    class="text-2xl sm:text-3xl text-slate-800">•</span>
                                <span
                                    class="text-lg sm:text-xl md:text-2xl font-semibold text-slate-800 whitespace-nowrap">Academia, Researchers & Thought Leaders</span>
                                <span class="text-2xl sm:text-3xl text-[#175C93]">•</span><span
                                    class="text-lg sm:text-xl md:text-2xl font-semibold text-slate-800 whitespace-nowrap">Public Sector & Policy Makers </span><span
                                    class="text-2xl sm:text-3xl text-[#175C93]">•</span></div>
                            <div class="flex items-center space-x-4 sm:space-x-6 md:space-x-8"><span
                                    class="text-lg sm:text-xl md:text-2xl font-semibold text-slate-800 whitespace-nowrap">Development Partners & NGOs</span><span
                                    class="text-2xl sm:text-3xl text-red-500">•</span><span
                                    class="text-lg sm:text-xl md:text-2xl font-semibold text-slate-800 whitespace-nowrap">Students & Emerging Professionals</span>
                                <span class="text-2xl sm:text-3xl text-[#84C1DA]">•</span>
                                <span class="text-lg sm:text-xl md:text-2xl font-semibold text-slate-800
                                whitespace-nowrap">Public Sector & Policy Makers </span><span
                                    class="text-2xl sm:text-3xl text-[#175C93]">•</span></div>
                            <div class="flex items-center space-x-4 sm:space-x-6 md:space-x-8"><span
                                    class="text-lg sm:text-xl md:text-2xl font-semibold text-slate-800 whitespace-nowrap">Development Partners & NGOs</span><span
                                    class="text-2xl sm:text-3xl text-red-500">•</span><span
                                    class="text-lg sm:text-xl md:text-2xl font-semibold text-slate-800 whitespace-nowrap">Students & Emerging Professionals</span>
                                <span class="text-2xl sm:text-3xl text-[#84C1DA]">•</span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="relative py-12 sm:py-16 md:py-20 overflow-hidden" id="sessions-section">
            <div class="absolute inset-0 z-0"
                 style="background:linear-gradient(to bottom right, #172840, #F25849)"></div>
            <div class="absolute inset-0 z-[1]"
                 style="background-image:url('https://ik.imagekit.io/nkmvdjnna/PAAN/summit/beyond-session-pattern.webp?updatedAt=1765954397048');background-repeat:repeat;background-position:center;background-size:cover;opacity:0.3"></div>
            <section class="relative mx-auto max-w-6xl px-4 sm:px-6 z-10">
                <div class="flex flex-col sm:flex-row justify-center items-center mb-6 sm:mb-8 gap-4">
                    <div>
                        <h3 class="text-3xl sm:text-4xl text-white font-normal">Beyond the sessions</h3>
                        <p class="text-base sm:text-lg md:text-xl font-normal text-white mb-4">The Inaugural Kasneb
                            International Conference for Professionals (KICP)
                            Looking back to where it began
                        </p>
                    </div>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-6 sm:gap-8">

                    <div class="relative rounded-xl shadow-xl overflow-hidden group cursor-pointer h-80 sm:h-96">
                        <img alt="Creator Crawl" class="w-full h-full object-cover"
                             src="{{ asset('assets/media/images/city-excursions.webp') }}">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
                        <div
                            class="absolute bottom-0 left-0 right-0 p-4 sm:p-6 group-hover:bg-white transition-all duration-300 rounded-t-xl flex flex-col">
                            <div class="flex-1"></div>
                            <div>
                                <h4 class="text-lg sm:text-xl font-bold text-white group-hover:text-slate-800 transition-colors duration-300">
                                    Empowering Professionals to Lead the Future </h4>
                                <p class="hidden group-hover:block transition-all duration-300 text-slate-800 text-xs sm:text-sm leading-relaxed mt-2">
                                    Curated cultural and innovation hub visits to immerse participants in Nairobi's
                                    vibrant ecosystem.</p>
                            </div>
                        </div>
                    </div>
                    <div class="relative rounded-xl shadow-xl overflow-hidden group cursor-pointer h-80 sm:h-96">
                        <img alt="Creator Crawl" class="w-full h-full object-cover"
                             src="{{ asset('assets/media/images/investor-roundtable.webp') }}">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
                        <div
                            class="absolute bottom-0 left-0 right-0 p-4 sm:p-6 group-hover:bg-white transition-all duration-300 rounded-t-xl flex flex-col">
                            <div class="flex-1"></div>
                            <div>
                                <h4 class="text-lg sm:text-xl font-bold text-white group-hover:text-slate-800 transition-colors duration-300">
                                    Investor Roundtables</h4>
                                <p class="hidden group-hover:block transition-all duration-300 text-slate-800 text-xs sm:text-sm leading-relaxed mt-2">
                                    Invite-only sessions connecting startups, creators, and investors for candid
                                    deal-making discussions.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div
            class="flex flex-col sm:flex-row justify-center items-center mb-6 sm:mb-8 gap-4 py-20"
            >


            <section id="tickets-section" class="relative mx-auto max-w-6xl px-4 sm:px-6 z-10">
                <h2 class="text-2xl sm:text-3xl text-center md:text-4xl font-normal text-slate-800 mb-2
                sm:mb-3" style="opacity: 1;">Conference Tickets</h2>
                <h3 class="text-sm sm:text-base md:text-lg font-normal py-2 sm:py-3 md:py-4 text-center text-slate-800 mb-6 sm:mb-8">
                    You can book for the event using one of the tickets below</h3>
                <div class="max-w-7xl mx-auto " style="opacity: 1; transform: none;">
                    <!--Inner Tabs section -->
                    <div>
                        <div>
                                <section class="relative mx-auto max-w-6xl px-4 sm:px-6 z-10">

                                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6" style="opacity: 1;">
                                    <div x-data="{ count: 1, selected:false }" :class="selected
                                                        ? 'bg-gradient-to-r from-[#f2b706] to-[#f25849] border-[#f2b706]'
                                                        : 'bg-white border-gray-200'" class="p-4 sm:p-6 rounded-lg border-2 shadow-sm hover:shadow-lg transition-all duration-300 relative" tabindex="0" style="opacity: 1; transform: none;">

                                        <div class="absolute -top-2 right-2 sm:right-4 px-2 sm:px-3 py-1 rounded-full text-xs font-semibold shadow-lg bg-red-500 text-white" style="opacity: 1; transform: none;">MOST POPULAR</div>
                                        <div class="flex flex-col h-full">
                                            <div class="mb-3 sm:mb-4">
                                                <h2 class="text-lg sm:text-xl font-bold
                                                                text-slate-800 mb-2">Individual Delegate</h2>
                                                <p class="text-slate-800/80 text-xs sm:text-sm">Access all keynotes, panels, exhibition &amp; networking app.</p>
                                            </div>
                                            <div class="mb-3 sm:mb-4">
                                                {{--                                                                <div class="flex items-baseline gap-2 mb-2"><span--}}
                                                {{--                                                                        class="text-gray-500 line-through text-xs--}}
                                                {{--                                                                        sm:text-sm">Ksh 20,000</span><span--}}
                                                {{--                                                                        class="text-xs--}}
                                                {{--                                                                        text-red-500 font-medium">Save 32%</span>--}}
                                                {{--                                                                </div>--}}
                                                <h3 class="text-2xl sm:text-3xl font-bold
                                                                text-slate-800">Ksh. 20,000</h3>
                                            </div>
                                            <div class="mb-4 sm:mb-6">
                                                <ul class="space-y-1 text-slate-800 text-xs sm:text-sm">
                                                    <li class="flex items-center"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="w-3 h-3 sm:w-4 sm:h-4 text-emerald-400 mr-2 flex-shrink-0 iconify iconify--mdi"
                                                                                       width="1em"
                                                                                       height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M21 7L9 19l-5.5-5.5l1.41-1.41L9 16.17L19.59 5.59z"></path></svg>Full 5-day access</li>
                                                    <li class="flex items-center"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="w-3 h-3 sm:w-4 sm:h-4 text-emerald-400 mr-2 flex-shrink-0 iconify iconify--mdi"
                                                                                       width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M21 7L9 19l-5.5-5.5l1.41-1.41L9 16.17L19.59 5.59z"></path></svg>Exhibitions &amp; keynotes</li>
                                                    <li class="flex items-center"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="w-3 h-3 sm:w-4 sm:h-4 text-emerald-400 mr-2 flex-shrink-0 iconify iconify--mdi"
                                                                                       width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M21 7L9 19l-5.5-5.5l1.41-1.41L9 16.17L19.59 5.59z"></path></svg>Refreshments & Lunch</li>
                                                    <li class="flex items-center"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="w-3 h-3 sm:w-4 sm:h-4 text-emerald-400 mr-2 flex-shrink-0 iconify iconify--mdi"
                                                                                       width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M21 7L9 19l-5.5-5.5l1.41-1.41L9 16.17L19.59 5.59z"></path></svg>Digital certificate</li>
                                                </ul>
                                            </div>
                                            <div class="flex flex-col sm:flex-row items-center justify-between mt-auto gap-3">
                                                <!-- NOT SELECTED -->
                                                <div x-show="!selected" class="flex flex-col sm:flex-row items-center w-full justify-between mt-auto gap-3">

                                                    <div class="flex items-center gap-2 sm:gap-3">
                                                        <!-- subtract -->
                                                        <button @click="if(count > 1) count--" :disabled="count <= 1" class="w-8 h-8 sm:w-10 sm:h-10 rounded-full border-2 border-slate-800 flex items-center justify-center hover:bg-slate-800 hover:text-white transition-colors disabled:opacity-50">
                                                            <svg class="w-4 h-4 sm:w-5 sm:h-5" viewBox="0 0 24 24">
                                                                <path fill="currentColor" d="M19 13H5v-2h14z"></path>
                                                            </svg>
                                                        </button>

                                                        <!-- count -->
                                                        <span x-text="count" class="font-semibold text-slate-800 min-w-6 sm:min-w-8 text-center text-sm sm:text-base"></span>

                                                        <!-- add -->
                                                        <button @click="count++" class="w-8 h-8 sm:w-10 sm:h-10 rounded-full border-2 border-slate-800 flex items-center justify-center hover:bg-slate-800 hover:text-white transition-colors">
                                                            <svg class="w-4 h-4 sm:w-5 sm:h-5" viewBox="0 0 24 24">
                                                                <path fill="currentColor" d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6z"></path>
                                                            </svg>
                                                        </button>
                                                    </div>

                                                    <button @click="selected = true; selectTicket('Individual
                                                    Delegate', 20000, count)" class="rounded-full px-2 sm:px-4 py-2
                                                    font-medium transition-colors text-sm sm:text-base bg-slate-800 text-white hover:bg-[#84C1D9]">
                                                        Select Ticket
                                                    </button>
                                                </div>

                                                <!-- SELECTED -->
                                                <div x-show="selected" class="w-full flex flex-col gap-2 mt-auto">

                                                    <div class="flex items-center justify-between w-full">
                                                        <div class="flex items-center gap-2">
                                                            <svg class="w-5 h-5 text-white" viewBox="0 0 24 24">
                                                                <path fill="currentColor" d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10s10-4.5 10-10S17.5 2 12 2m-2 15l-5-5l1.41-1.41L10 14.17l7.59-7.59L19 8z"></path>
                                                            </svg>
                                                            <span class="text-white font-semibold text-sm">
                                                                            Selected: <span x-text="count"></span> ticket(s)
                                                                        </span>
                                                        </div>
                                                    </div>

                                                    <button @click="selected = false" class="w-full rounded-full px-4 py-2 font-medium transition-all text-sm bg-white/20 text-white hover:bg-red-500 hover:text-white border border-white/30 flex items-center justify-center gap-2">
                                                        <svg class="w-4 h-4" viewBox="0 0 24 24">
                                                            <path fill="currentColor" d="M12 2c5.53 0 10 4.47 10 10s-4.47 10-10 10S2 17.53 2 12S6.47 2 12 2m3.59 5L12 10.59L8.41 7L7 8.41L10.59 12L7 15.59L8.41 17L12 13.41L15.59 17L17 15.59L13.41 12L17 8.41z"></path>
                                                        </svg>
                                                        Remove Ticket
                                                    </button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div x-data="{ count: 1, selected:false }" :class="selected
                                                        ? 'bg-gradient-to-r from-[#f2b706] to-[#f25849] border-[#f2b706]'
                                                        : 'bg-white border-gray-200'" class="p-4 sm:p-6 rounded-lg border-2 shadow-sm hover:shadow-lg transition-all duration-300 relative" tabindex="0" style="opacity: 1; transform: none;">
                                        <div class="absolute -top-2 right-2 sm:right-4 px-2 sm:px-3
                                                        py-1 rounded-full text-xs font-semibold shadow-lg
                                                        bg-[#84C1D9] text-white" style="opacity: 1; transform: none;
                                                        ">GROUP'S OFFER</div>
                                        <div class="flex flex-col h-full">
                                            <div class="mb-3 sm:mb-4">
                                                <h2 class="text-lg sm:text-xl font-bold
                                                                text-slate-800 mb-2">Group registration</h2>
                                                <p class="text-slate-800/80 text-xs
                                                                sm:text-sm">Special pricing for organization,
                                                    groups and teams</p>
                                            </div>
                                            <div class="mb-3 sm:mb-4">

                                                <div class="flex items-center gap-2 whitespace-nowrap">
                                                    <h3 class="text-2xl sm:text-3xl font-bold text-slate-800">
                                                        Ksh. 14,500
                                                    </h3>
                                                    <h5 class="text-md sm:text-xl font-bold text-red-500">
                                                        per person
                                                    </h5>
                                                </div>

                                            </div>
                                            <div class="mb-4 sm:mb-6">
                                                <ul class="space-y-1 text-slate-800 text-xs sm:text-sm">
                                                    <li class="flex items-center"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="w-3 h-3 sm:w-4 sm:h-4 text-emerald-400 mr-2 flex-shrink-0 iconify iconify--mdi"
                                                                                       width="1em"
                                                                                       height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M21 7L9 19l-5.5-5.5l1.41-1.41L9 16.17L19.59 5.59z"></path></svg><span
                                                            class="text-gray-500 line-through text-xs
                                                                        sm:text-sm">Ksh. 5,500</span><span
                                                            class="text-xs
                                                                         text-red-500 font-medium">&nbsp;Save
                                                                27%</span></li>
                                                    <li class="flex items-center"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="w-3 h-3 sm:w-4 sm:h-4 text-emerald-400 mr-2 flex-shrink-0 iconify iconify--mdi"
                                                                                       width="1em"
                                                                                       height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M21 7L9 19l-5.5-5.5l1.41-1.41L9 16.17L19.59 5.59z"></path></svg>Full 5-day access</li>
                                                    <li class="flex items-center"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="w-3 h-3 sm:w-4 sm:h-4 text-emerald-400 mr-2 flex-shrink-0 iconify iconify--mdi"
                                                                                       width="1em"
                                                                                       height="1em"
                                                                                       viewBox="0 0
                                                                                                       24 24"><path
                                                                fill="currentColor" d="M21 7L9 19l-5
                                                                                .5-5.5l1.41-1.41L9 16.17L19.59 5
                                                                                .59z"></path></svg>Refreshments & Lunch</li>
                                                    <li class="flex items-center"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="w-3 h-3 sm:w-4 sm:h-4 text-emerald-400 mr-2 flex-shrink-0 iconify iconify--mdi"
                                                                                       width="1em"
                                                                                       height="1em"
                                                                                       viewBox="0 0
                                                                                                       24 24"><path
                                                                fill="currentColor" d="M21 7L9 19l-5
                                                                                .5-5.5l1.41-1.41L9 16.17L19.59 5
                                                                                .59z"></path></svg>Exhibition access</li>
                                                    <li class="flex items-center"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="w-3 h-3 sm:w-4 sm:h-4 text-emerald-400 mr-2 flex-shrink-0 iconify iconify--mdi"
                                                                                       width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M21 7L9 19l-5.5-5.5l1.41-1.41L9 16.17L19.59 5.59z"></path></svg>Digital certificate</li>
                                                </ul>
                                            </div>
                                            <div class="flex flex-col sm:flex-row items-center justify-between mt-auto gap-3">
                                                <!-- NOT SELECTED -->
                                                <div x-show="!selected" class="flex flex-col sm:flex-row items-center w-full justify-between mt-auto gap-3">

                                                    <div class="flex items-center gap-2 sm:gap-3">
                                                        <!-- subtract -->
                                                        <button @click="if(count > 1) count--" :disabled="count <= 1" class="w-8 h-8 sm:w-10 sm:h-10 rounded-full border-2 border-slate-800 flex items-center justify-center hover:bg-slate-800 hover:text-white transition-colors disabled:opacity-50">
                                                            <svg class="w-4 h-4 sm:w-5 sm:h-5" viewBox="0 0 24 24">
                                                                <path fill="currentColor" d="M19 13H5v-2h14z"></path>
                                                            </svg>
                                                        </button>

                                                        <!-- count -->
                                                        <span x-text="count" class="font-semibold text-slate-800 min-w-6 sm:min-w-8 text-center text-sm sm:text-base"></span>

                                                        <!-- add -->
                                                        <button @click="count++" class="w-8 h-8 sm:w-10 sm:h-10 rounded-full border-2 border-slate-800 flex items-center justify-center hover:bg-slate-800 hover:text-white transition-colors">
                                                            <svg class="w-4 h-4 sm:w-5 sm:h-5" viewBox="0 0 24 24">
                                                                <path fill="currentColor" d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6z"></path>
                                                            </svg>
                                                        </button>
                                                    </div>

                                                    <button @click="selected = true; selectTicket
                                                                    ('Group registration', 14500, count)"
                                                            class="rounded-full px-4
                                                                    sm:px-4 py-2 font-medium transition-colors
                                                                    text-sm sm:text-base bg-slate-800 text-white hover:bg-[#84C1D9]">
                                                        Select Ticket
                                                    </button>
                                                </div>

                                                <!-- SELECTED -->
                                                <div x-show="selected" class="w-full flex flex-col gap-2 mt-auto">

                                                    <div class="flex items-center justify-between w-full">
                                                        <div class="flex items-center gap-2">
                                                            <svg class="w-5 h-5 text-white" viewBox="0 0 24 24">
                                                                <path fill="currentColor" d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10s10-4.5 10-10S17.5 2 12 2m-2 15l-5-5l1.41-1.41L10 14.17l7.59-7.59L19 8z"></path>
                                                            </svg>
                                                            <span class="text-white font-semibold text-sm">
                                                                            Selected: <span x-text="count"></span> ticket(s)
                                                                        </span>
                                                        </div>
                                                    </div>

                                                    <button @click="selected = false" class="w-full rounded-full px-4 py-2 font-medium transition-all text-sm bg-white/20 text-white hover:bg-red-500 hover:text-white border border-white/30 flex items-center justify-center gap-2">
                                                        <svg class="w-4 h-4" viewBox="0 0 24 24">
                                                            <path fill="currentColor" d="M12 2c5.53 0 10 4.47 10 10s-4.47 10-10 10S2 17.53 2 12S6.47 2 12 2m3.59 5L12 10.59L8.41 7L7 8.41L10.59 12L7 15.59L8.41 17L12 13.41L15.59 17L17 15.59L13.41 12L17 8.41z"></path>
                                                        </svg>
                                                        Remove Ticket
                                                    </button>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div x-data="{ count: 1, selected:false }" :class="selected
                                                        ? 'bg-gradient-to-r from-[#f2b706] to-[#f25849] border-[#f2b706]'
                                                        : 'bg-white border-gray-200'" class="p-4 sm:p-6 rounded-lg border-2 shadow-sm hover:shadow-lg transition-all duration-300 relative" tabindex="0" style="opacity: 1; transform: none;">
                                        <div class="absolute -top-2 right-2 sm:right-4 px-2 sm:px-3
                                                        py-1 rounded-full text-xs font-semibold shadow-lg
                                                        bg-[#175C93] text-white" style="opacity: 1; transform: none;
                                                        ">FOR EXHIBITORS</div>
                                        <div class="flex flex-col h-full">
                                            <div class="mb-3 sm:mb-4">
                                                <h2 class="text-lg sm:text-xl font-bold
                                                                text-slate-800 mb-2">Exhibition Booth</h2>
                                                <p class="text-slate-800/80 text-xs
                                                                sm:text-sm">Price for exhibitors to
                                                    showcase their innovations, products and services</p>
                                            </div>
                                            <div class="mb-3 sm:mb-4">
                                                <h3 class="text-2xl sm:text-3xl font-bold
                                                                text-slate-800">Ksh. 30,000</h3>

                                            </div>
                                            <div class="mb-4 sm:mb-6">
                                                <ul class="space-y-1 text-slate-800 text-xs sm:text-sm">
                                                    <li class="flex items-center"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="w-3 h-3 sm:w-4 sm:h-4 text-emerald-400 mr-2 flex-shrink-0 iconify iconify--mdi"
                                                                                       width="1em"
                                                                                       height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M21 7L9 19l-5.5-5.5l1.41-1.41L9 16.17L19.59 5.59z"></path></svg>Full 5-day access</li>
                                                    <li class="flex items-center"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="w-3 h-3 sm:w-4 sm:h-4 text-emerald-400 mr-2 flex-shrink-0 iconify iconify--mdi"
                                                                                       width="1em"
                                                                                       height="1em"
                                                                                       viewBox="0 0
                                                                                                       24 24"><path
                                                                fill="currentColor" d="M21 7L9 19l-5
                                                                                .5-5.5l1.41-1.41L9 16.17L19.59 5
                                                                                .59z"></path></svg>Exhibition booth</li>
                                                    <li class="flex items-center"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="w-3 h-3 sm:w-4 sm:h-4 text-emerald-400 mr-2 flex-shrink-0 iconify iconify--mdi"
                                                                                       width="1em"
                                                                                       height="1em"
                                                                                       viewBox="0 0
                                                                                                       24 24"><path
                                                                fill="currentColor" d="M21 7L9 19l-5
                                                                                .5-5.5l1.41-1.41L9 16.17L19.59 5
                                                                                .59z"></path></svg>Refreshments & Lunch</li>
                                                    <li class="flex items-center"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="w-3 h-3 sm:w-4 sm:h-4 text-emerald-400 mr-2 flex-shrink-0 iconify iconify--mdi"
                                                                                       width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M21 7L9 19l-5.5-5.5l1.41-1.41L9 16.17L19.59 5.59z"></path></svg>Digital certificate</li>
                                                </ul>
                                            </div>
                                            <div class="flex flex-col sm:flex-row items-center justify-between mt-auto gap-3">
                                                <!-- NOT SELECTED -->
                                                <div x-show="!selected" class="flex flex-col sm:flex-row items-center w-full justify-between mt-auto gap-3">

                                                    <div class="flex items-center gap-2 sm:gap-3">
                                                        <!-- subtract -->
                                                        <button @click="if(count > 1) count--" :disabled="count <= 1" class="w-8 h-8 sm:w-10 sm:h-10 rounded-full border-2 border-slate-800 flex items-center justify-center hover:bg-slate-800 hover:text-white transition-colors disabled:opacity-50">
                                                            <svg class="w-4 h-4 sm:w-5 sm:h-5" viewBox="0 0 24 24">
                                                                <path fill="currentColor" d="M19 13H5v-2h14z"></path>
                                                            </svg>
                                                        </button>

                                                        <!-- count -->
                                                        <span x-text="count" class="font-semibold text-slate-800 min-w-6 sm:min-w-8 text-center text-sm sm:text-base"></span>

                                                        <!-- add -->
                                                        <button @click="count++" class="w-8 h-8 sm:w-10 sm:h-10 rounded-full border-2 border-slate-800 flex items-center justify-center hover:bg-slate-800 hover:text-white transition-colors">
                                                            <svg class="w-4 h-4 sm:w-5 sm:h-5" viewBox="0 0 24 24">
                                                                <path fill="currentColor" d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6z"></path>
                                                            </svg>
                                                        </button>
                                                    </div>

                                                    <button @click="selected = true; selectTicket
                                                                    ('Exhibition Booth', 30000, count)"
                                                            class="rounded-full px-4
                                                                    sm:px-4 py-2 font-medium transition-colors
                                                                    text-sm sm:text-base bg-slate-800 text-white hover:bg-[#84C1D9]">
                                                        Select Ticket
                                                    </button>
                                                </div>

                                                <!-- SELECTED -->
                                                <div x-show="selected" class="w-full flex flex-col gap-2 mt-auto">

                                                    <div class="flex items-center justify-between w-full">
                                                        <div class="flex items-center gap-2">
                                                            <svg class="w-5 h-5 text-white" viewBox="0 0 24 24">
                                                                <path fill="currentColor" d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10s10-4.5 10-10S17.5 2 12 2m-2 15l-5-5l1.41-1.41L10 14.17l7.59-7.59L19 8z"></path>
                                                            </svg>
                                                            <span class="text-white font-semibold text-sm">
                                                                            Selected: <span x-text="count"></span> ticket(s)
                                                                        </span>
                                                        </div>
                                                    </div>

                                                    <button @click="selected = false" class="w-full rounded-full px-4 py-2 font-medium transition-all text-sm bg-white/20 text-white hover:bg-red-500 hover:text-white border border-white/30 flex items-center justify-center gap-2">
                                                        <svg class="w-4 h-4" viewBox="0 0 24 24">
                                                            <path fill="currentColor" d="M12 2c5.53 0 10 4.47 10 10s-4.47 10-10 10S2 17.53 2 12S6.47 2 12 2m3.59 5L12 10.59L8.41 7L7 8.41L10.59 12L7 15.59L8.41 17L12 13.41L15.59 17L17 15.59L13.41 12L17 8.41z"></path>
                                                        </svg>
                                                        Remove Ticket
                                                    </button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>

                            </div>

                        </div>


                    </div>
            </section>
        </div>

        <div class="bg-[#D1D3D4] relative py-12 sm:py-16 md:py-20">
            <section class="relative mx-auto max-w-6xl px-4 sm:px-6">
                <div class="flex flex-col text-center mb-8 sm:mb-12 space-y-3 sm:space-y-4">
                    <h3 class="text-2xl sm:text-3xl text-slate-800 font-bold uppercase">Our Partners</h3>
                    <p class="text-base sm:text-lg md:text-xl font-normal text-slate-800 mb-6 sm:mb-8">Join leading
                        agencies, startups, and creative innovators in the Exhibition Zone. Share your work, connect
                        with investors and partners, and stand out at Africa's most influential creative economy
                        gathering.</p>
                </div>
                <div class="w-full overflow-hidden whitespace-nowrap py-6 sm:py-8">
                    <div class="inline-flex animate-marquee-right">
                        <div class="flex space-x-6 sm:space-x-8 md:space-x-10 whitespace-nowrap">
                            <div class="flex items-center space-x-6 sm:space-x-8 md:space-x-10">
                                <div
                                    class="bg-white w-28 h-28 sm:w-32 sm:h-32 md:w-36 md:h-36 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden relative flex items-center justify-center flex-shrink-0 border border-gray-100"
                                    style="background-color:#ffffff"><img
                                        src="{{ asset('assets/media/images/partners/psv.webp') }}" alt="PSV Logo"
                                        class="w-16 h-16 sm:w-20 sm:h-20 md:w-24 md:h-24 object-contain"></div>
                                <div
                                    class="bg-white w-28 h-28 sm:w-32 sm:h-32 md:w-36 md:h-36 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden relative flex items-center justify-center flex-shrink-0 border border-gray-100">
                                    <img src="{{ asset('assets/media/images/partners/kebs.webp') }}" alt="KEBS Logo"
                                         class="w-16 h-16 sm:w-20 sm:h-20 md:w-24 md:h-24 object-contain"></div>
                                <div
                                    class="bg-white w-28 h-28 sm:w-32 sm:h-32 md:w-36 md:h-36 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden relative flex items-center justify-center flex-shrink-0 border border-gray-100">
                                    <img src="{{ asset('assets/media/images/partners/ifac.webp') }}" alt="IFAC Logo"
                                         class="w-16 h-16 sm:w-20 sm:h-20 md:w-24 md:h-24 object-contain"></div>
                                <div
                                    class="bg-white w-28 h-28 sm:w-32 sm:h-32 md:w-36 md:h-36 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden relative flex items-center justify-center flex-shrink-0 border border-gray-100">
                                    <img src="{{ asset('assets/media/images/partners/mygov.webp') }}" alt="MyGov Logo"
                                         class="w-16 h-16 sm:w-20 sm:h-20 md:w-24 md:h-24 object-contain"></div>
                                <div
                                    class="bg-white w-28 h-28 sm:w-32 sm:h-32 md:w-36 md:h-36 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden relative flex items-center justify-center flex-shrink-0 border border-gray-100"
                                    style="background-color:#ffffff"><img
                                        src="{{ asset('assets/media/images/partners/kuccps.webp') }}" alt="KUCCPS Logo"
                                        class="w-16 h-16 sm:w-20 sm:h-20 md:w-24 md:h-24 object-contain"></div>
                                <div
                                    class="bg-white w-28 h-28 sm:w-32 sm:h-32 md:w-36 md:h-36 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden relative flex items-center justify-center flex-shrink-0 border border-gray-100"
                                    style="background-color:#ffffff"><img
                                        src="{{ asset('assets/media/images/partners/tveta.webp') }}" alt="TVETA Logo"
                                        class="w-16 h-16 sm:w-20 sm:h-20 md:w-24 md:h-24 object-contain"></div>
                                <div
                                    class="bg-white w-28 h-28 sm:w-32 sm:h-32 md:w-36 md:h-36 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden relative flex items-center justify-center flex-shrink-0 border border-gray-100"
                                    style="background-color:#ffffff"><img
                                        src="{{ asset('assets/media/images/partners/helb.webp') }}" alt="HELB Logo"
                                        class="w-16 h-16 sm:w-20 sm:h-20 md:w-24 md:h-24 object-contain"></div>
                                <div
                                    class="bg-white w-28 h-28 sm:w-32 sm:h-32 md:w-36 md:h-36 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden relative flex items-center justify-center flex-shrink-0 border border-gray-100"
                                    style="background-color:#ffffff"><img
                                        src="{{ asset('assets/media/images/partners/treasury.webp') }}"
                                        alt="Treasury Logo"
                                        class="w-16 h-16 sm:w-20 sm:h-20 md:w-24 md:h-24 object-contain"></div>
                                <div
                                    class="bg-white w-28 h-28 sm:w-32 sm:h-32 md:w-36 md:h-36 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden relative flex items-center justify-center flex-shrink-0 border border-gray-100"
                                    style="background-color:#ffffff"><img
                                        src="{{ asset('assets/media/images/partners/cpak.webp') }}" alt="CPAK Logo"
                                        class="w-16 h-16 sm:w-20 sm:h-20 md:w-24 md:h-24 object-contain"></div>
                                <div
                                    class="bg-white w-28 h-28 sm:w-32 sm:h-32 md:w-36 md:h-36 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden relative flex items-center justify-center flex-shrink-0 border border-gray-100"
                                    style="background-color:#ffffff"><img
                                        src="{{ asset('assets/media/images/partners/cue.webp') }}" alt="CUE Logo"
                                        class="w-16 h-16 sm:w-20 sm:h-20 md:w-24 md:h-24 object-contain"></div>
                                <div
                                    class="bg-white w-28 h-28 sm:w-32 sm:h-32 md:w-36 md:h-36 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden relative flex items-center justify-center flex-shrink-0 border border-gray-100"
                                    style="background-color:#ffffff"><img
                                        src="{{ asset('assets/media/images/partners/icifa.webp') }}" alt="ICIFA Logo"
                                        class="w-16 h-16 sm:w-20 sm:h-20 md:w-24 md:h-24 object-contain"></div>

                            </div>
                            <div class="flex items-center space-x-6 sm:space-x-8 md:space-x-10">
                                <div
                                    class="bg-white w-28 h-28 sm:w-32 sm:h-32 md:w-36 md:h-36 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden relative flex items-center justify-center flex-shrink-0 border border-gray-100"
                                    style="background-color:#ffffff">
                                    <img
                                        src="{{ asset('assets/media/images/partners/psv.webp') }}" alt="PSV
                                        Logo"
                                        class="w-16 h-16 sm:w-20 sm:h-20 md:w-24 md:h-24 object-contain"></div>
                                <div
                                    class="bg-white w-28 h-28 sm:w-32 sm:h-32 md:w-36 md:h-36 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden relative flex items-center justify-center flex-shrink-0 border border-gray-100"
                                    style="background-color:#ffffff">
                                    <img
                                        src="{{ asset('assets/media/images/partners/kebs.webp') }}" alt="KEBS
                                        Logo"
                                        class="w-16 h-16 sm:w-20 sm:h-20 md:w-24 md:h-24 object-contain"></div>
                                <div
                                    class="bg-white w-28 h-28 sm:w-32 sm:h-32 md:w-36 md:h-36 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden relative flex items-center justify-center flex-shrink-0 border border-gray-100">
                                    <img src="{{ asset('assets/media/images/partners/ifac.webp') }}" alt="IFAC Logo"
                                         class="w-16 h-16 sm:w-20 sm:h-20 md:w-24 md:h-24 object-contain"></div>
                                <div
                                    class="bg-white w-28 h-28 sm:w-32 sm:h-32 md:w-36 md:h-36 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden relative flex items-center justify-center flex-shrink-0 border border-gray-100">
                                    <img src="{{ asset('assets/media/images/partners/mygov.webp') }}" alt="MyGov Logo"
                                         class="w-16 h-16 sm:w-20 sm:h-20 md:w-24 md:h-24 object-contain"></div>
                                <div
                                    class="bg-white w-28 h-28 sm:w-32 sm:h-32 md:w-36 md:h-36 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden relative flex items-center justify-center flex-shrink-0 border border-gray-100">
                                    <img src="{{ asset('assets/media/images/partners/tveta.webp') }}" alt="TVETA Logo"
                                         class="w-16 h-16 sm:w-20 sm:h-20 md:w-24 md:h-24 object-contain"></div>
                                <div
                                    class="bg-white w-28 h-28 sm:w-32 sm:h-32 md:w-36 md:h-36 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden relative flex items-center justify-center flex-shrink-0 border border-gray-100">
                                    <img src="{{ asset('assets/media/images/partners/helb.webp') }}" alt="HELB Logo"
                                         class="w-16 h-16 sm:w-20 sm:h-20 md:w-24 md:h-24 object-contain"></div>
                                <div
                                    class="bg-white w-28 h-28 sm:w-32 sm:h-32 md:w-36 md:h-36 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden relative flex items-center justify-center flex-shrink-0 border border-gray-100">
                                    <img src="{{ asset('assets/media/images/partners/treasury.webp') }}" alt="Treasury
                                    Logo"
                                         class="w-16 h-16 sm:w-20 sm:h-20 md:w-24 md:h-24 object-contain"></div>
                                <div
                                    class="bg-white w-28 h-28 sm:w-32 sm:h-32 md:w-36 md:h-36 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden relative flex items-center justify-center flex-shrink-0 border border-gray-100">
                                    <img src="{{ asset('assets/media/images/partners/cpak.webp') }}" alt="CPAK
                                    Logo"
                                         class="w-16 h-16 sm:w-20 sm:h-20 md:w-24 md:h-24 object-contain"></div>
                                <div
                                    class="bg-white w-28 h-28 sm:w-32 sm:h-32 md:w-36 md:h-36 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden relative flex items-center justify-center flex-shrink-0 border border-gray-100">
                                    <img src="{{ asset('assets/media/images/partners/cue.webp') }}" alt="CUE
                                    Logo"
                                         class="w-16 h-16 sm:w-20 sm:h-20 md:w-24 md:h-24 object-contain"></div>
                                <div
                                    class="bg-white w-28 h-28 sm:w-32 sm:h-32 md:w-36 md:h-36 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden relative flex items-center justify-center flex-shrink-0 border border-gray-100">
                                    <img src="{{ asset('assets/media/images/partners/icifa.webp') }}" alt="ICIFA
                                    Logo"
                                         class="w-16 h-16 sm:w-20 sm:h-20 md:w-24 md:h-24 object-contain"></div>

                            </div>

                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="bg-white relative py-12 sm:py-16 md:py-20" id="plan-your-trip">
            <section class="relative mx-auto max-w-6xl px-4 sm:px-6">
                <div class="w-full">
                    <h3 class="text-xl sm:text-2xl font-bold text-slate-800 mb-4 sm:mb-6">Frequently Asked
                        Questions</h3>


                    <div x-data="{
                            open: 1,
                            items: [
                                { id: 1, title: 'Who Should Attend?', content: `
                                    <p> The conference is designed for professionals, accountants, business leaders, entrepreneurs, government officials, policymakers, academics, students, tech innovators, investors, and industry stakeholders seeking to stay ahead of emerging trends, expand their networks, and shape the future of the professional landscape..</p>
                                `},
                                { id: 2, title: 'How to register', content: `
                                    <p>
                                        To register for KICP, click Register Now, select your ticket, complete the registration form, choose your preferred payment method, make payment, and receive your registration confirmation.
                                    </p>
                                ` },
                                { id: 3, title: 'How to become a Sponsor', content:  `
                                    <p>
                                        Partner with KICP to position your brand before a diverse audience of professionals, corporate leaders, government representatives, and key decision-makers. A range of sponsorship packages is available, offering valuable branding, speaking, exhibition, and networking opportunities.
                                    </p>
                                ` },
                                { id: 4, title: 'How to book Exhibition Spot ', content: `
                                    <p>
                                        Organizations interested in showcasing their products, services, or innovations can reserve an exhibition booth by completing the online exhibition registration form. Exhibition spaces are allocated on a first-come, first-served basis, subject to availability.
                                    </p>
                                ` },
                                { id: 5, title: 'Safety &amp; Security', content: `
                                    <p>
                                        Nairobi is a vibrant business and conference destination with modern infrastructure and hospitality facilities. The conference organizers are working closely with the venue and security agencies to ensure a safe and secure environment throughout the event. Delegates are encouraged to observe normal safety precautions during their stay.
                                    </p>
                                ` },
                            ],
                            toggle(id) {
                                this.open = this.open === id ? 0 : id;
                            }
                        }" class="w-full mx-auto space-y-4">

                        <template x-for="item in items" :key="item.id">
                            <div
                                class="border border-gray-200 rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadow duration-300">
                                <button
                                    @click="toggle(item.id)"
                                    class="w-full px-6 py-4 text-left bg-white hover:bg-gray-50 transition-colors duration-200 flex justify-between items-center">
                                    <h3 class="font-semibold text-gray-800 text-lg pr-4" x-html="item.title"></h3>
                                    <span class="flex-shrink-0">

                                        <!-- Plus SVG -->
                                        <template x-if="open !== item.id">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                 stroke-linecap="round" stroke-linejoin="round"
                                                 class="transition-transform duration-300"><line x1="12" y1="5" x2="12"
                                                                                                 y2="19"></line><line
                                                    x1="5" y1="12" x2="19" y2="12"></line></svg>
                                        </template>

                                        <!-- X SVG -->
                            <template x-if="open === item.id">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                 stroke-linecap="round" stroke-linejoin="round"
                                                 class="transition-transform duration-300"><line x1="5" y1="12" x2="19"
                                                                                                 y2="12"></line></svg>
                                        </template>
                            </span>
                                </button>

                                <div x-ref="container" x-cloak x-show="open === item.id"
                                     x-transition:enter="transition-all duration-300 ease-out"
                                     x-transition:enter-start="max-h-0 opacity-0"
                                     x-transition:enter-end="max-h-[1000px] opacity-100"
                                     x-transition:leave="transition-all duration-300 ease-in"
                                     x-transition:leave-start="max-h-[1000px] opacity-100"
                                     x-transition:leave-end="max-h-0 opacity-0"
                                     class="overflow-hidden duration-300 ease-in-out max-h-96 opacity-100">
                                    <div class="px-6 py-4 bg-white border-t border-gray-100">
                                        <div x-html="item.content" class="text-gray-700 leading-relaxed"></div>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>
            </section>
        </div>
        @include('layout.partials.summit-footer')
    </main>
</x-home-layout>

<script>
    /**
     * Speakers Carousel Functionality
     * Shows 3 speakers per view on desktop, responsive on mobile
     */
    (function () {
        const track = document.getElementById('speakers-carousel-track');
        const prevBtn = document.getElementById('speakers-prev');
        const nextBtn = document.getElementById('speakers-next');

        if (!track || !prevBtn || !nextBtn) {
            console.warn('Speakers carousel elements not found');
            return;
        }

        let currentScroll = 0;
        const speakerCardWidth = 100; // 100% width for each speaker on mobile
        let itemsPerView = 1; // Default mobile view
        let gapSize = 16; // Default gap in pixels (gap-4 = 1rem = 16px)

        // Function to determine items per view based on screen size
        function updateItemsPerView() {
            const width = window.innerWidth;
            if (width >= 1024) { // lg breakpoint
                itemsPerView = 3;
                gapSize = 24; // gap-6 = 1.5rem = 24px on larger screens
            } else if (width >= 640) { // sm breakpoint
                itemsPerView = 2;
                gapSize = 20; // gap-6 adjusted for sm
            } else {
                itemsPerView = 1;
                gapSize = 16; // gap-4
            }
        }

        // Calculate scroll amount
        function getScrollAmount() {
            const trackWidth = track.parentElement.offsetWidth;
            // Calculate the width of one item plus gap
            const itemWidth = (trackWidth - (gapSize * (itemsPerView - 1))) / itemsPerView;
            return itemWidth + gapSize;
        }

        // Update carousel on window resize
        window.addEventListener('resize', () => {
            updateItemsPerView();
        });

        // Previous button click
        prevBtn.addEventListener('click', () => {
            updateItemsPerView();
            const scrollAmount = getScrollAmount();
            currentScroll = Math.max(0, currentScroll - scrollAmount);
            track.style.transform = `translateX(-${currentScroll}px)`;
        });

        // Next button click
        nextBtn.addEventListener('click', () => {
            updateItemsPerView();
            const scrollAmount = getScrollAmount();
            const maxScroll = track.scrollWidth - track.parentElement.offsetWidth;
            currentScroll = Math.min(maxScroll, currentScroll + scrollAmount);
            track.style.transform = `translateX(-${currentScroll}px)`;
        });

        // Initialize
        updateItemsPerView();
    })();
</script>

