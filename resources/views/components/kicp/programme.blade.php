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
