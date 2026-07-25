<section id="tickets-section" class="relative mx-auto max-w-6xl px-4 sm:px-6 z-10">
    <h2 class="text-2xl sm:text-3xl text-center md:text-4xl font-normal text-slate-800 mb-2
                sm:mb-3" style="opacity: 1;">Conference Tickets</h2>
    <h3 class="text-sm sm:text-base md:text-lg font-normal py-2 sm:py-3 md:py-4 text-center text-slate-800 mb-6 sm:mb-8">
        You can book for the event using one of the tickets below</h3>
    <div class="max-w-7xl mx-auto " style="opacity: 1; transform: none;">
        <!--Inner Tabs section -->
        <div>
            <div x-data="wizard()">
                <section class="relative mx-auto max-w-6xl px-4 sm:px-6 z-10">
                <main id="wizardForm" @submit.prevent="submitForm">
                    <section x-cloak x-show="currentStep === 0" id="ticket-selection">
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6" style="opacity: 1;">

                        <div x-data="{ count: 1, selected:false }" :class="selected
                                                        ? 'bg-gradient-to-r from-[#f2b706] to-[#f25849] border-[#f2b706]'
                                                        : 'bg-white border-gray-200'"
                             class="p-4 sm:p-6 rounded-lg border-2 shadow-sm hover:shadow-lg transition-all duration-300 relative"
                             tabindex="0" style="opacity: 1; transform: none;">

                            <div
                                class="absolute -top-2 right-2 sm:right-4 px-2 sm:px-3 py-1 rounded-full text-xs font-semibold shadow-lg bg-red-500 text-white"
                                style="opacity: 1; transform: none;">MOST POPULAR
                            </div>
                            <div class="flex flex-col h-full">
                                <div class="mb-3 sm:mb-4">
                                    <h2 class="text-lg sm:text-xl font-bold
                                                                text-slate-800 mb-2">Individual Delegate</h2>
                                    <p class="text-slate-800/80 text-xs sm:text-sm">Access all keynotes, panels,
                                        exhibition &amp; networking app.</p>
                                </div>
                                <div class="mb-3 sm:mb-4">
                                    {{--                                                                <div class="flex items-baseline gap-2 mb-2"><span--}}
                                    {{--                                                                        class="text-gray-500 line-through text-xs--}}
                                    {{--                                                                        sm:text-sm">Ksh 20,000</span><span--}}
                                    {{--                                                                        class="text-xs--}}
                                    {{--                                                                        text-red-500 font-medium">Save 32%</span>--}}
                                    {{--                                                                </div>--}}
                                    <h3 class="text-2xl sm:text-3xl font-bold
                                                                text-slate-800">Ksh. 75,000</h3>
                                </div>
                                <div class="mb-4 sm:mb-6">
                                    <ul class="space-y-1 text-slate-800 text-xs sm:text-sm">
                                        <li class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true"
                                                 role="img"
                                                 class="w-3 h-3 sm:w-4 sm:h-4 text-emerald-400 mr-2 flex-shrink-0 iconify iconify--mdi"
                                                 width="1em"
                                                 height="1em" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                      d="M21 7L9 19l-5.5-5.5l1.41-1.41L9 16.17L19.59 5.59z"></path>
                                            </svg>
                                            Full 5-day access
                                        </li>
                                        <li class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true"
                                                 role="img"
                                                 class="w-3 h-3 sm:w-4 sm:h-4 text-emerald-400 mr-2 flex-shrink-0 iconify iconify--mdi"
                                                 width="1em" height="1em" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                      d="M21 7L9 19l-5.5-5.5l1.41-1.41L9 16.17L19.59 5.59z"></path>
                                            </svg>
                                            Exhibitions &amp; keynotes
                                        </li>
                                        <li class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true"
                                                 role="img"
                                                 class="w-3 h-3 sm:w-4 sm:h-4 text-emerald-400 mr-2 flex-shrink-0 iconify iconify--mdi"
                                                 width="1em" height="1em" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                      d="M21 7L9 19l-5.5-5.5l1.41-1.41L9 16.17L19.59 5.59z"></path>
                                            </svg>
                                            Refreshments & Lunch
                                        </li>
                                        <li class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true"
                                                 role="img"
                                                 class="w-3 h-3 sm:w-4 sm:h-4 text-emerald-400 mr-2 flex-shrink-0 iconify iconify--mdi"
                                                 width="1em" height="1em" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                      d="M21 7L9 19l-5.5-5.5l1.41-1.41L9 16.17L19.59 5.59z"></path>
                                            </svg>
                                            Digital certificate
                                        </li>
                                    </ul>
                                </div>
                                <div class="flex flex-col sm:flex-row items-center justify-between mt-auto gap-3">
                                    <!-- NOT SELECTED -->
                                    <div x-show="!selected"
                                         class="w-full flex flex-col gap-3 mt-auto">

                                        <button @click="selected = true; selectTicket
                                                                    ('Individual Delegate', 75000, count)"
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
                                                    <path fill="currentColor"
                                                          d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10s10-4.5 10-10S17.5 2 12 2m-2 15l-5-5l1.41-1.41L10 14.17l7.59-7.59L19 8z"></path>
                                                </svg>
                                                <span class="text-white font-semibold text-sm">
                                                                            Selected: <span x-text="count"></span> ticket(s)
                                                                        </span>
                                            </div>
                                        </div>

                                        <button @click="selected = false"
                                                class="w-full rounded-full px-4 py-2 font-medium transition-all text-sm bg-white/20 text-white hover:bg-red-500 hover:text-white border border-white/30 flex items-center justify-center gap-2">
                                            <svg class="w-4 h-4" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                      d="M12 2c5.53 0 10 4.47 10 10s-4.47 10-10 10S2 17.53 2 12S6.47 2 12 2m3.59 5L12 10.59L8.41 7L7 8.41L10.59 12L7 15.59L8.41 17L12 13.41L15.59 17L17 15.59L13.41 12L17 8.41z"></path>
                                            </svg>
                                            Remove Ticket
                                        </button>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div x-data="{ count: 10, selected:false }" :class="selected
                                                        ? 'bg-gradient-to-r from-[#f2b706] to-[#f25849] border-[#f2b706]'
                                                        : 'bg-white border-gray-200'"
                             class="p-4 sm:p-6 rounded-lg border-2 shadow-sm hover:shadow-lg transition-all duration-300 relative"
                             tabindex="0" style="opacity: 1; transform: none;">
                            <div class="absolute -top-2 right-2 sm:right-4 px-2 sm:px-3
                                                        py-1 rounded-full text-xs font-semibold shadow-lg
                                                        bg-[#84C1D9] text-white" style="opacity: 1; transform: none;
                                                        ">GROUP'S OFFER
                            </div>
                            <div class="flex flex-col h-full">
                                <div class="mb-3 sm:mb-4">
                                    <h2 class="text-lg sm:text-xl font-bold
                                                                text-slate-800 mb-2">Group Registration</h2>
                                    <p class="text-slate-800/80 text-xs
                                                                sm:text-sm">Special pricing for organization with
                                        more than <strong class="text-lg sm:text-xl font-bold text-red-500">10
                                            delegates</strong></p>
                                </div>
                                <div class="mb-3 sm:mb-4">

                                    <div class="flex items-center gap-2 whitespace-nowrap">
                                        <h3 class="text-2xl sm:text-3xl font-bold text-slate-800">
                                            Ksh. 63,750
                                        </h3>
                                        <h5 class="text-md sm:text-xl font-bold text-red-500">
                                            per person
                                        </h5>
                                    </div>

                                </div>
                                <div class="mb-4 sm:mb-6">
                                    <ul class="space-y-1 text-slate-800 text-xs sm:text-sm">
                                        <li class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true"
                                                 role="img"
                                                 class="w-3 h-3 sm:w-4 sm:h-4 text-emerald-400 mr-2 flex-shrink-0 iconify iconify--mdi"
                                                 width="1em"
                                                 height="1em" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                      d="M21 7L9 19l-5.5-5.5l1.41-1.41L9 16.17L19.59 5.59z"></path>
                                            </svg>
                                            <span
                                                class="text-gray-500 line-through text-xs
                                                                        sm:text-sm">Ksh. 11,250</span><span
                                                class="text-xs
                                                                         text-red-500 font-medium">&nbsp;Save
                                                                15%</span></li>
                                        <li class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true"
                                                 role="img"
                                                 class="w-3 h-3 sm:w-4 sm:h-4 text-emerald-400 mr-2 flex-shrink-0 iconify iconify--mdi"
                                                 width="1em"
                                                 height="1em" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                      d="M21 7L9 19l-5.5-5.5l1.41-1.41L9 16.17L19.59 5.59z"></path>
                                            </svg>
                                            Full 5-day access
                                        </li>
                                        <li class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true"
                                                 role="img"
                                                 class="w-3 h-3 sm:w-4 sm:h-4 text-emerald-400 mr-2 flex-shrink-0 iconify iconify--mdi"
                                                 width="1em"
                                                 height="1em"
                                                 viewBox="0 0
                                                                                                       24 24">
                                                <path
                                                    fill="currentColor" d="M21 7L9 19l-5
                                                                                .5-5.5l1.41-1.41L9 16.17L19.59 5
                                                                                .59z"></path>
                                            </svg>
                                            Refreshments & Lunch
                                        </li>
                                        <li class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true"
                                                 role="img"
                                                 class="w-3 h-3 sm:w-4 sm:h-4 text-emerald-400 mr-2 flex-shrink-0 iconify iconify--mdi"
                                                 width="1em"
                                                 height="1em"
                                                 viewBox="0 0
                                                                                                       24 24">
                                                <path
                                                    fill="currentColor" d="M21 7L9 19l-5
                                                                                .5-5.5l1.41-1.41L9 16.17L19.59 5
                                                                                .59z"></path>
                                            </svg>
                                            Exhibition access
                                        </li>
                                        <li class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true"
                                                 role="img"
                                                 class="w-3 h-3 sm:w-4 sm:h-4 text-emerald-400 mr-2 flex-shrink-0 iconify iconify--mdi"
                                                 width="1em" height="1em" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                      d="M21 7L9 19l-5.5-5.5l1.41-1.41L9 16.17L19.59 5.59z"></path>
                                            </svg>
                                            Digital certificate
                                        </li>
                                    </ul>
                                </div>
                                <div class="flex flex-col sm:flex-row items-center justify-between mt-auto gap-3">
                                    <!-- NOT SELECTED -->
                                    <div x-show="!selected"
                                         class="flex flex-col sm:flex-row items-center w-full justify-between mt-auto gap-3">

                                        <div class="flex items-center gap-2 sm:gap-3">
                                            <!-- subtract -->
                                            <button @click="if(count > 10) count--" :disabled="count <= 10"
                                                    class="w-8 h-8 sm:w-10 sm:h-10 rounded-full border-2 border-slate-800 flex items-center justify-center hover:bg-slate-800 hover:text-white transition-colors disabled:opacity-50">
                                                <svg class="w-4 h-4 sm:w-5 sm:h-5" viewBox="0 0 24 24">
                                                    <path fill="currentColor" d="M19 13H5v-2h14z"></path>
                                                </svg>
                                            </button>

                                            <!-- count -->
                                            <span x-text="count"
                                                  class="font-semibold text-slate-800 min-w-6 sm:min-w-8 text-center text-sm sm:text-base"></span>

                                            <!-- add -->
                                            <button @click="count++"
                                                    class="w-8 h-8 sm:w-10 sm:h-10 rounded-full border-2 border-slate-800 flex items-center justify-center hover:bg-slate-800 hover:text-white transition-colors">
                                                <svg class="w-4 h-4 sm:w-5 sm:h-5" viewBox="0 0 24 24">
                                                    <path fill="currentColor"
                                                          d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6z"></path>
                                                </svg>
                                            </button>
                                        </div>

                                        <button @click="selected = true; selectTicket
                                                                    ('Group registration', 63750, count)"
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
                                                    <path fill="currentColor"
                                                          d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10s10-4.5 10-10S17.5 2 12 2m-2 15l-5-5l1.41-1.41L10 14.17l7.59-7.59L19 8z"></path>
                                                </svg>
                                                <span class="text-white font-semibold text-sm">
                                                                            Selected: <span x-text="count"></span> ticket(s)
                                                                        </span>
                                            </div>
                                        </div>

                                        <button @click="selected = false"
                                                class="w-full rounded-full px-4 py-2 font-medium transition-all text-sm bg-white/20 text-white hover:bg-red-500 hover:text-white border border-white/30 flex items-center justify-center gap-2">
                                            <svg class="w-4 h-4" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                      d="M12 2c5.53 0 10 4.47 10 10s-4.47 10-10 10S2 17.53 2 12S6.47 2 12 2m3.59 5L12 10.59L8.41 7L7 8.41L10.59 12L7 15.59L8.41 17L12 13.41L15.59 17L17 15.59L13.41 12L17 8.41z"></path>
                                            </svg>
                                            Remove Ticket
                                        </button>

                                    </div>
                                </div>

                            </div>
                        </div>
                        <div x-data="{ count: 1, selected:false }" :class="selected
                                                        ? 'bg-gradient-to-r from-[#f2b706] to-[#f25849] border-[#f2b706]'
                                                        : 'bg-white border-gray-200'"
                             class="p-4 sm:p-6 rounded-lg border-2 shadow-sm hover:shadow-lg transition-all duration-300 relative"
                             tabindex="0" style="opacity: 1; transform: none;">
                            <div class="absolute -top-2 right-2 sm:right-4 px-2 sm:px-3
                                                        py-1 rounded-full text-xs font-semibold shadow-lg
                                                        bg-[#175C93] text-white" style="opacity: 1; transform: none;
                                                        ">FOR EXHIBITORS
                            </div>
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
                                                                text-slate-800">Ksh. 300,000</h3>

                                </div>
                                <div class="mb-4 sm:mb-6">
                                    <ul class="space-y-1 text-slate-800 text-xs sm:text-sm">
                                        <li class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true"
                                                 role="img"
                                                 class="w-3 h-3 sm:w-4 sm:h-4 text-emerald-400 mr-2 flex-shrink-0 iconify iconify--mdi"
                                                 width="1em"
                                                 height="1em" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                      d="M21 7L9 19l-5.5-5.5l1.41-1.41L9 16.17L19.59 5.59z"></path>
                                            </svg>
                                            Full 5-day access
                                        </li>
                                        <li class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true"
                                                 role="img"
                                                 class="w-3 h-3 sm:w-4 sm:h-4 text-emerald-400 mr-2 flex-shrink-0 iconify iconify--mdi"
                                                 width="1em"
                                                 height="1em"
                                                 viewBox="0 0
                                                                                                       24 24">
                                                <path
                                                    fill="currentColor" d="M21 7L9 19l-5
                                                                                .5-5.5l1.41-1.41L9 16.17L19.59 5
                                                                                .59z"></path>
                                            </svg>
                                            Exhibition booth
                                        </li>
                                        <li class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true"
                                                 role="img"
                                                 class="w-3 h-3 sm:w-4 sm:h-4 text-emerald-400 mr-2 flex-shrink-0 iconify iconify--mdi"
                                                 width="1em"
                                                 height="1em"
                                                 viewBox="0 0
                                                                                                       24 24">
                                                <path
                                                    fill="currentColor" d="M21 7L9 19l-5
                                                                                .5-5.5l1.41-1.41L9 16.17L19.59 5
                                                                                .59z"></path>
                                            </svg>
                                            Refreshments & Lunch
                                        </li>
                                        <li class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true"
                                                 role="img"
                                                 class="w-3 h-3 sm:w-4 sm:h-4 text-emerald-400 mr-2 flex-shrink-0 iconify iconify--mdi"
                                                 width="1em" height="1em" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                      d="M21 7L9 19l-5.5-5.5l1.41-1.41L9 16.17L19.59 5.59z"></path>
                                            </svg>
                                            Digital certificate
                                        </li>
                                    </ul>
                                </div>
                                <div class="flex flex-col sm:flex-row items-center justify-between mt-auto gap-3">
                                    <!-- NOT SELECTED -->
                                    <div x-show="!selected"
                                         class="flex flex-col sm:flex-row items-center w-full justify-between mt-auto gap-3">

                                        <div class="flex items-center gap-2 sm:gap-3">
                                            <!-- subtract -->
                                            <button @click="if(count > 1) count--" :disabled="count <= 1"
                                                    class="w-8 h-8 sm:w-10 sm:h-10 rounded-full border-2 border-slate-800 flex items-center justify-center hover:bg-slate-800 hover:text-white transition-colors disabled:opacity-50">
                                                <svg class="w-4 h-4 sm:w-5 sm:h-5" viewBox="0 0 24 24">
                                                    <path fill="currentColor" d="M19 13H5v-2h14z"></path>
                                                </svg>
                                            </button>

                                            <!-- count -->
                                            <span x-text="count"
                                                  class="font-semibold text-slate-800 min-w-6 sm:min-w-8 text-center text-sm sm:text-base"></span>

                                            <!-- add -->
                                            <button @click="count++"
                                                    class="w-8 h-8 sm:w-10 sm:h-10 rounded-full border-2 border-slate-800 flex items-center justify-center hover:bg-slate-800 hover:text-white transition-colors">
                                                <svg class="w-4 h-4 sm:w-5 sm:h-5" viewBox="0 0 24 24">
                                                    <path fill="currentColor"
                                                          d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6z"></path>
                                                </svg>
                                            </button>
                                        </div>

                                        <button @click="selected = true; selectTicket
                                                                    ('Exhibition Booth', 300000, count)"
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
                                                    <path fill="currentColor"
                                                          d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10s10-4.5 10-10S17.5 2 12 2m-2 15l-5-5l1.41-1.41L10 14.17l7.59-7.59L19 8z"></path>
                                                </svg>
                                                <span class="text-white font-semibold text-sm">
                                                                            Selected: <span x-text="count"></span> ticket(s)
                                                                        </span>
                                            </div>
                                        </div>

                                        <button @click="selected = false"
                                                class="w-full rounded-full px-4 py-2 font-medium transition-all text-sm bg-white/20 text-white hover:bg-red-500 hover:text-white border border-white/30 flex items-center justify-center gap-2">
                                            <svg class="w-4 h-4" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                      d="M12 2c5.53 0 10 4.47 10 10s-4.47 10-10 10S2 17.53 2 12S6.47 2 12 2m3.59 5L12 10.59L8.41 7L7 8.41L10.59 12L7 15.59L8.41 17L12 13.41L15.59 17L17 15.59L13.41 12L17 8.41z"></path>
                                            </svg>
                                            Remove Ticket
                                        </button>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    </section>
                    <section x-cloak x-show="currentStep === 1" id="contact-info-step">
                        <div class="mx-auto max-w-7xl ">
                            <div class="text-slate-800 text-center py-4">
                                <h2 class="font-bold text-2xl">Your Contact Information</h2>
                                <p class="font-normal">Let's continue with your basic information to secure your
                                    registration.</p>
                            </div>
                            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 pb-12" style="opacity: 1; transform: none;">
                                <div class="p-6 sm:p-8 lg:p-10 bg-white border border-gray-200 rounded-2xl shadow-xl">
                                    <div class="mb-8">
                                        <div class="flex items-center gap-4 mb-4">
                                            <div class="w-12 h-12 bg-[#84C1D9] rounded-xl flex items-center justify-center shadow-lg">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="w-7 h-7 text-white iconify iconify--mdi" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M12 19.2c-2.5 0-4.71-1.28-6-3.2c.03-2 4-3.1 6-3.1s5.97 1.1 6 3.1a7.23 7.23 0 0 1-6 3.2M12 5a3 3 0 0 1 3 3a3 3 0 0 1-3 3a3 3 0 0 1-3-3a3 3 0 0 1 3-3m0-3A10 10 0 0 0 2 12a10 10 0 0 0 10 10a10 10 0 0 0 10-10c0-5.53-4.5-10-10-10"></path>
                                                </svg>
                                            </div>
                                            <div>
                                                 <p class="text-gray-500 text-sm sm:text-base mt-1">Step 2 of 3 -
                                                    Contact Information</p>
                                            </div>
                                        </div>
                                        <p class="text-gray-600 text-base leading-relaxed">Please provide your contact information. This helps us keep you updated about your registration and follow up if needed.</p>
                                    </div>

                                    <div class="space-y-6">
                                        <div class="">
                                            <label for="fullName" class="block text-slate-800 text-sm font-semibold mb-2">Full Name <span class="text-red-500 ml-0.5">*</span></label>
                                            <div class="relative">
                                                <input id="fullName" class="w-full px-4 sm:px-4 py-2.5 sm:py-3 border rounded-lg bg-white focus:outline-none focus:ring-2 transition-all duration-300 text-sm sm:text-base border-gray-300 focus:ring-slate-800 focus:border-slate-800 hover:border-[#84C1D9] shadow-sm hover:shadow-md"
                                                       placeholder="John Doe" type="text" value="" name="fullName">
                                                <div class="custom-error-container"></div>
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                            <div class="">
                                                <label for="email" class="block text-slate-800 text-sm font-semibold mb-2">Email Address <span class="text-red-500 ml-0.5">*</span></label>
                                                <div class="relative">
                                                    <input id="email" class="w-full px-4 sm:px-4 py-2.5 sm:py-3 border rounded-lg bg-white focus:outline-none focus:ring-2 transition-all duration-300 text-sm sm:text-base border-gray-300 focus:ring-slate-800 focus:border-slate-800 hover:border-[#84C1D9] shadow-sm hover:shadow-md"
                                                           placeholder="john.doe@example.com" type="email" value="" name="email">
                                                </div>
                                                <div class="custom-error-container"></div>
                                            </div>
                                            <div class="">
                                                <label for="phone" class="block text-slate-800 text-sm font-semibold mb-2 ">Phone Number <span class="text-red-500 ml-0.5">*</span></label>
                                                <div class="relative">
                                                    <input
                                                        id="phone"
                                                        name="phone"
                                                        class="w-full px-4 sm:px-4 py-2.5 sm:py-3 border rounded-lg bg-white focus:outline-none focus:ring-2 transition-all duration-300 text-sm sm:text-base border-gray-300 focus:ring-slate-800 focus:border-slate-800 hover:border-[#84C1D9] shadow-sm hover:shadow-md"
                                                        phone-country-input="#country"
                                                    />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="">
                                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                                <div>
                                                    <label for="country" class="block text-[#172840] text-sm font-medium mb-2">Country <span class="text-red-500">*</span></label>
                                                    <div class="relative">
                                                        <input type="text" name="country" id="country" class="w-full px-4 sm:px-4 py-2.5 sm:py-3 border rounded-lg bg-white focus:outline-none focus:ring-2 transition-all duration-300 text-sm sm:text-base border-gray-300 focus:ring-slate-800 focus:border-slate-800 hover:border-[#84C1D9] shadow-sm hover:shadow-md" />
                                                    </div>
                                                </div>

                                                <div>
                                                    <label for="organizationRoot" class="block text-[#172840] text-sm font-medium mb-2">Organization</label>
                                                    <div class="relative">
                                                        <input id="organizationRoot" type="text" x-model="formData.organization" placeholder="Enter your organization" class="w-full px-4 sm:px-4 py-2.5 sm:py-3 border rounded-lg bg-white focus:outline-none focus:ring-2 transition-all duration-300 text-sm sm:text-base border-gray-300 focus:ring-slate-800 focus:border-slate-800 hover:border-[#84C1D9] shadow-sm hover:shadow-md" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pt-8 border-t border-gray-100">
                                            <div class="bg-blue-50 border border-[#84C1D9]/30 rounded-xl p-5 mb-6">
                                                <div class="flex
                                                items-start gap-3
                                                text-sm">
                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="w-5 h-5 text-[#84C1D9] mt-0.5 flex-shrink-0 iconify iconify--mdi" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M11 9h2V7h-2m1 13c-4.41 0-8-3.59-8-8s3.59-8 8-8s8 3.59 8 8s-3.59 8-8 8m0-18A10 10 0 0 0 2 12a10 10 0 0 0 10 10a10 10 0 0 0 10-10A10 10 0 0 0 12 2m-1 15h2v-6h-2z"></path></svg>
                                                    <p class="text-sm text-gray-700 leading-relaxed">By continuing with your registration, you acknowledge and agree to our Data Protection and Privacy Policy and consent to the collection and processing of your personal information for conference registration and related administrative purposes. You may also choose to receive updates, announcements, and relevant information about the KICP Conference.</p>
                                                </div>
                                                <div class="flex items-start mt-4">
                                                    <input id="terms" class="mr-3 mt-1 rounded-sm h-3 w-3"
                                                           type="checkbox" name="terms" value="1" />
                                                    <label for="terms" class="text-sm text-gray-700">I accept the
                                                        above terms &amp;  privacy policy <span class="text-red-500">*</span></label>
                                                </div>
                                                <div class="custom-error-container"></div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section x-cloak x-show="currentStep === 2">
                        <div class="mx-auto max-w-7xl ">
                            <div class="text-slate-800 text-center py-4">
                                <h2 class="font-bold text-2xl">Payment</h2>
                                <p class="font-normal">Complete your payment to secure your tickets.</p>
                            </div>

                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 sm:gap-8 pt-4 sm:pt-6 pb-8 sm:pb-10 max-w-7xl mx-auto px-3 sm:px-4">
                                <div>
                                    <div class="p-4 sm:p-6 bg-white border border-slate-800 rounded-lg shadow-sm">
                                        <h2 class="text-lg sm:text-xl font-bold text-slate-800 mb-3 sm:mb-4">Payment Method</h2>
                                        <form>
                                            <div class="space-y-4">
                                                <div>
                                                    <input id="card" class="mr-2" type="radio" value="card" checked="" name="method">
                                                    <label for="card" class="font-medium text-slate-800 text-sm sm:text-base">Credit/Debit Card</label>
                                                    <div class="ml-4 sm:ml-6 mt-2">
                                                        <p class="text-xs sm:text-sm text-gray-600">You will be redirected to Paystack's secure payment page to enter your card details.</p>
                                                    </div>
                                                </div>
                                                <div>
                                                    <input id="bank" class="mr-2" type="radio" value="bank" name="method">
                                                    <label for="bank" class="font-medium text-slate-800 text-sm sm:text-base">Bank Transfer/Invoice</label>
                                                </div>
                                                <div>
                                                    <input id="mpesa" class="mr-2" type="radio" value="mpesa" name="method">
                                                    <label for="mpesa" class="font-medium text-slate-800 text-sm sm:text-base">Mobile Money (Mpesa)</label>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="p-6  bg-white border ">
                                            <h2 class="text-xl font-semibold text-slate-800 mb-4">Terms &amp; Preferences</h2>
                                            <form>
                                                <div class="space-y-3">
                                                    <div class="flex items-start">
                                                        <input id="terms" class="mr-3 mt-1 rounded-sm h-3 w-3" type="checkbox" name="terms">
                                                        <label for="terms" class="text-sm text-gray-700">I accept the <a href="/terms-and-conditions" class="text-[#84C1D9] hover:underline">terms &amp; conditions</a> and <a href="/privacy-policy" class="text-[#84C1D9] hover:underline">privacy policy</a> <span class="text-red-500">*</span></label>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="p-4 sm:p-6 bg-white border border-slate-800 rounded-lg shadow-sm">
                                        <div class="flex justify-between mb-3 sm:mb-4">
                                            <h2 class="text-lg sm:text-xl font-semibold text-slate-800">Order Summary</h2>
                                            <p class="font-normal text-red-500 text-xs sm:text-sm">Early Bird active</p>
                                        </div>
                                        <div class="space-y-2 mb-3 sm:mb-4">
                                            <template x-if="!selectedTickets || selectedTickets.length === 0">
                                                <div class="text-sm text-gray-500">No tickets selected</div>
                                            </template>
                                            <template x-for="(ticket, idx) in selectedTickets" :key="idx">
                                                <div class="flex justify-between text-sm sm:text-base">
                                                    <span x-text="ticket.type + ' × ' + ticket.count"></span>
                                                    <span x-text="'Ksh. ' + (ticket.price * ticket.count)"></span>
                                                </div>
                                            </template>
                                            <hr class="my-2">
                                            <div class="flex justify-between text-sm sm:text-base"><span>Subtotal</span><span x-text="'Ksh. ' + totalAmount()"></span></div>
                                            <div class="flex justify-between text-sm sm:text-base"><span>Promo</span><span class="text-green-600">-Ksh. 0</span></div>
                                            <div class="flex justify-between font-bold text-base sm:text-lg"><span>Total</span><span x-text="'Ksh. ' + totalAmount()"></span></div>
                                        </div>
                                        <div class="mb-3 sm:mb-4">
                                            <form>
                                                <div class="flex flex-col sm:flex-row gap-2">
                                                    <input placeholder="Have a promo code?" class="flex-1 px-3 sm:px-4 py-2 sm:py-3 border border-[#84C1D9] rounded-lg bg-white focus:outline-none focus:ring-2 focus:ring-slate-800 focus:border-transparent text-sm sm:text-base" type="text" value="">
                                                    <div class="flex gap-2">
                                                        <button type="submit" disabled="" class="bg-slate-800 text-white px-3 sm:px-4 py-2 sm:py-3 rounded-lg hover:bg-slate-800 transition-colors disabled:opacity-50 disabled:cursor-not-allowed text-sm sm:text-base">Apply</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="flex flex-col sm:flex-row justify-between gap-3 sm:gap-0">
                                            <button @click="prevStep" class="bg-gray-200 text-gray-700 px-4 sm:px-6 py-2 sm:py-3
                                                rounded-full font-medium hover:bg-gray-300 transition-colors text-sm
                                                sm:text-base">Back to ticket selection</button>
                                            <button class="px-4 sm:px-6 py-2 sm:py-3 rounded-full font-medium transition-colors text-sm sm:text-base bg-red-500 text-white hover:bg-red-600">Complete Purchase</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <div x-show="hasSelectedTickets()" x-cloak
                         class="fixed bottom-0 left-0 right-0 bg-white border-t-2 border-[#84C1D9] shadow-2xl z-50"
                         style="opacity: 1; transform: none;">
                        <div class="max-w-7xl mx-auto px-4 sm:px-6 py-3 sm:py-4">
                            <div class="flex flex-col sm:flex-row items-center justify-between gap-3">
                                <div class="flex items-center gap-4 sm:gap-6">
                                    <div class="flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img"
                                             class="w-5 h-5 sm:w-6 sm:h-6 text-[#84C1D9] iconify iconify--mdi"
                                             width="1em" height="1em"
                                             viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                  d="M15.58 16.8L12 14.5l-3.58 2.3l1.08-4.12L6.21 10l4.25-.26L12 5.8l1.54 3.94l4.25.26l-3.29 2.68M20 12a2 2 0 0 1 2-2V6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v4a2 2 0 0 1 2 2a2 2 0 0 1-2 2v4a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-4a2 2 0 0 1-2-2"></path>
                                        </svg>
                                        <div>
                                            <p class="text-xs text-gray-500">Selected Tickets</p>
                                            <p class="font-bold text-slate-800 text-sm sm:text-base"
                                               x-text="totalTickets() + ' tickets'"></p>
                                        </div>
                                    </div>
                                    <div class="h-8 w-px bg-gray-300"></div>
                                    <div>
                                        <p class="text-xs text-gray-500">Total Amount</p>
                                        <p class="font-bold text-slate-800 text-lg sm:text-xl"
                                           x-text="'Ksh. ' + totalAmount()"></p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-3 w-full sm:w-auto">
                                    <button @click="prevStep" x-show="currentStep > 0"
                                            class="flex-1 sm:flex-none bg-gray-200 text-gray-700 px-4 sm:px-6 py-2.5 sm:py-3 rounded-full font-medium hover:bg-gray-300 transition-colors text-sm sm:text-base">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img"
                                             class="w-4 h-4 inline mr-1 iconify iconify--mdi" width="1em" height="1em"
                                             viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                  d="M20 11v2H8l5.5 5.5l-1.42 1.42L4.16 12l7.92-7.92L13.5 5.5L8 11z"></path>
                                        </svg>
                                        Back
                                    </button>
                                    <button x-show="currentStep < steps.length - 1" @click="currentStep === 1 ?
                                    validateStep() : nextStep"
                                            class="flex-1 sm:flex-none bg-red-500 text-white px-6 sm:px-8 py-2.5 sm:py-3
                                            rounded-full font-semibold hover:bg-slate-800 transition-all duration-300 shadow-lg hover:shadow-xl text-sm sm:text-base inline-flex items-center justify-center gap-2">
                                        Proceed to <span x-text="currentStep === 0 ? 'add your details' :
                                        'make payment'"></span>
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img"
                                             class="w-4 h-4 iconify iconify--mdi" width="1em" height="1em"
                                             viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                  d="M4 11v2h12l-5.5 5.5l1.42 1.42L19.84 12l-7.92-7.92L10.5 5.5L16 11z"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div x-show="hasSelectedTickets() && currentStep === 0"
                        class="mt-4 sm:mt-6 p-4 sm:p-6 bg-white border border-[#84C1D9] rounded-lg max-w-4xl mx-auto shadow-lg"
                        style="opacity: 1; transform: none;">
                        <h3 class="text-lg sm:text-xl font-bold text-slate-800 mb-3 sm:mb-4">Ticket Summary</h3>
                        <div class="space-y-2">
                            <template x-for="(ticket, idx) in selectedTickets" :key="idx">
                                <div
                                    class="flex justify-between items-center py-2 border-b border-gray-100 text-sm sm:text-base">
                                    <div class="flex-1"><span class="font-medium"
                                                              x-text="ticket.type + ' × ' + ticket.count"></span></div>
                                    <div class="flex items-center gap-3">
                                                        <span class="font-semibold" x-text="'Ksh. ' + (ticket.price *
                                                         ticket.count)"></span>

                                    </div>
                                </div>
                            </template>
                        </div>
                        <hr class="my-3 sm:my-4">
                        <div class="flex justify-between font-bold text-base sm:text-lg">
                            <span>Total</span>
                            <span x-text="'Ksh. ' + totalAmount()"></span>
                        </div>
                    </div>
                </main>

                </section>

            </div>

        </div>

    </div>
</section>
