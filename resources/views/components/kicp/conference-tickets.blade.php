<section id="tickets-section" class="relative mx-auto max-w-6xl px-4 sm:px-6 z-10">
    <h2 class="text-2xl sm:text-3xl text-center md:text-4xl font-normal text-slate-800 mb-2
                sm:mb-3" style="opacity: 1;">Conference Tickets</h2>
    <h3 class="text-sm sm:text-base md:text-lg font-normal py-2 sm:py-3 md:py-4 text-center text-slate-800 mb-6 sm:mb-8">
        You can book for the event using one of the tickets below</h3>
    <div class="max-w-7xl mx-auto " style="opacity: 1; transform: none;">
        <!--Inner Tabs section -->
        <div>
            @php $isPurchaseMore = $isPurchaseMore ?? false; @endphp
            <div wire:ignore x-data="wizard({ isPurchaseMore: {{ $isPurchaseMore ? 'true' : 'false' }} })">
                <section class="relative mx-auto max-w-6xl px-4 sm:px-6 z-10">
                <main id="wizardForm" @submit.prevent="submitForm">
                    <section x-cloak x-show="!showPaymentIframe && currentStep === 0" id="ticket-selection">
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6" style="opacity: 1;">

                        <div x-data="{ count: 1, selected:false }" data-ticket-type="Individual Delegate" data-kes-price="63750" data-usd-price="510" :class="selected
                                                       ? 'bg-gradient-to-r from-[#175C93] to-[#7BC7F0] border-[#E12035]'
                                                       : 'bg-white border-gray-200'"
                             class="p-4 sm:p-6 rounded-lg border-2 shadow-sm hover:shadow-lg transition-all duration-300 relative"
                             tabindex="0" style="opacity: 1; transform: none;">

                            <div
                               class="absolute -top-2 right-2 sm:right-4 px-2 sm:px-3 py-1 rounded-full text-xs font-semibold shadow-lg bg-red-500 text-white"
                               style="opacity: 1; transform: none;">MOST POPULAR
                            </div>
                            <div class="flex flex-col h-full">
                               <div class="mb-3 sm:mb-4">
                                   <div class="flex items-center justify-between gap-2 mb-2">
                                       <h2 class="text-lg sm:text-xl font-bold text-slate-800">Individual Delegate</h2>
                                          </div>
                                   <p class="text-slate-800/80 text-xs sm:text-sm">Access all keynotes, panels,
                                       exhibition &amp; networking app.</p>
                               </div>
                               <div class="mb-3 sm:mb-4">
                                   <span class="inline-flex items-center rounded-full bg-red-50 px-2 py-1 text-[10px] sm:text-[11px] font-semibold uppercase tracking-wide text-red-600">Early Bird</span>
                                   <div class="mt-2 text-[10px] sm:text-xs font-semibold uppercase tracking-wide
                                   text-red-500">Ends 25 September 2026 11:59pm</div>

                                   <h3 class="text-2xl sm:text-3xl font-bold text-slate-800">Ksh. 63,750</h3>
                                   <h4 class="text-1xl sm:text-1xl font-bold text-slate-800 line-through">Ksh. 75,
                                       000</h4>
                                   <div class="mt-1 text-xs sm:text-sm text-slate-600">USD $510</div>

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
                                                                    ('Individual Delegate', 63750, count)"
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
                        <div x-data="{ count: 10, selected:false }" data-ticket-type="Group Registration" data-kes-price="67500" data-usd-price="540" :class="selected
                                                        ? 'bg-gradient-to-r from-[#175C93] to-[#7BC7F0] border-[#E12035]'
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
                                           Ksh. 67,500
                                        </h3>
                                        <h5 class="text-md sm:text-xl font-bold text-red-500">
                                            per person
                                        </h5>
                                    </div>
                                   <div class="mt-1 text-xs sm:text-sm text-slate-600">USD $540</div>

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
                                                                       sm:text-sm">Ksh. 75,000</span><span
                                               class="text-xs
                                                                        text-red-500 font-medium">&nbsp;Save
                                                               10%</span></li>
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
                                                                    ('Group registration', 67500, count)"
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
                        <div x-data="{ count: 1, selected:false }" data-ticket-type="Virtual Ticket" data-kes-price="25000" data-usd-price="200" :class="selected
                                                        ? 'bg-gradient-to-r from-[#175C93] to-[#7BC7F0] border-[#E12035]'
                                                        : 'bg-white border-gray-200'"
                             class="p-4 sm:p-6 rounded-lg border-2 shadow-sm hover:shadow-lg transition-all duration-300 relative"
                             tabindex="0" style="opacity: 1; transform: none;">
                            <div class="absolute -top-2 right-2 sm:right-4 px-2 sm:px-3
                                                       py-1 rounded-full text-xs font-semibold shadow-lg
                                                       bg-[#175C93] text-white" style="opacity: 1; transform: none;
                                                       ">ONLINE ACCESS
                            </div>
                            <div class="flex flex-col h-full">
                               <div class="mb-3 sm:mb-4">
                                   <h2 class="text-lg sm:text-xl font-bold text-slate-800 mb-2">Virtual Ticket</h2>
                                   <p class="text-slate-800/80 text-xs sm:text-sm">Join the summit remotely with live access to presentations and sessions.</p>
                               </div>
                               <div class="mb-3 sm:mb-4">
                                   <h3 class="text-2xl sm:text-3xl font-bold text-slate-800">Ksh. 25,000</h3>
                                   <div class="mt-1 text-xs sm:text-sm text-slate-600">USD $200</div>
                               </div>
                               <div class="mb-4 sm:mb-6">
                                   <ul class="space-y-1 text-slate-800 text-xs sm:text-sm">
                                       <li class="flex items-center">
                                           <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="w-3 h-3 sm:w-4 sm:h-4 text-emerald-400 mr-2 flex-shrink-0 iconify iconify--mdi" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M21 7L9 19l-5.5-5.5l1.41-1.41L9 16.17L19.59 5.59z"></path></svg>
                                           Live virtual sessions
                                       </li>
                                       <li class="flex items-center">
                                           <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="w-3 h-3 sm:w-4 sm:h-4 text-emerald-400 mr-2 flex-shrink-0 iconify iconify--mdi" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M21 7L9 19l-5.5-5.5l1.41-1.41L9 16.17L19.59 5.59z"></path></svg>
                                           Digital networking access
                                       </li>
                                       <li class="flex items-center">
                                           <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="w-3 h-3 sm:w-4 sm:h-4 text-emerald-400 mr-2 flex-shrink-0 iconify iconify--mdi" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M21 7L9 19l-5.5-5.5l1.41-1.41L9 16.17L19.59 5.59z"></path></svg>
                                           Session recordings
                                       </li>
                                   </ul>
                               </div>
                               <div class="flex flex-col sm:flex-row items-center justify-between mt-auto gap-3">
                                   <div x-show="!selected" class="w-full flex flex-col gap-3 mt-auto">
                                       <button @click="selected = true; selectTicket('Virtual Ticket', 25000, count)" class="rounded-full px-4 sm:px-4 py-2 font-medium transition-colors text-sm sm:text-base bg-slate-800 text-white hover:bg-[#84C1D9]">Select Ticket</button>
                                   </div>
                                   <div x-show="selected" class="w-full flex flex-col gap-2 mt-auto">
                                       <div class="flex items-center justify-between w-full">
                                           <div class="flex items-center gap-2">
                                               <svg class="w-5 h-5 text-white" viewBox="0 0 24 24"><path fill="currentColor" d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10s10-4.5 10-10S17.5 2 12 2m-2 15l-5-5l1.41-1.41L10 14.17l7.59-7.59L19 8z"></path></svg>
                                               <span class="text-white font-semibold text-sm">Selected: <span x-text="count"></span> ticket(s)</span>
                                           </div>
                                       </div>
                                       <button @click="selected = false" class="w-full rounded-full px-4 py-2 font-medium transition-all text-sm bg-white/20 text-white hover:bg-red-500 hover:text-white border border-white/30 flex items-center justify-center gap-2">
                                           <svg class="w-4 h-4" viewBox="0 0 24 24"><path fill="currentColor" d="M12 2c5.53 0 10 4.47 10 10s-4.47 10-10 10S2 17.53 2 12S6.47 2 12 2m3.59 5L12 10.59L8.41 7L7 8.41L10.59 12L7 15.59L8.41 17L12 13.41L15.59 17L17 15.59L13.41 12L17 8.41z"></path></svg>
                                           Remove Ticket
                                       </button>
                                   </div>
                               </div>
                            </div>
                        </div>
                        <div x-data="{ count: 1, selected:false }" data-ticket-type="Student Ticket" data-kes-price="27500" data-usd-price="220" :class="selected
                                                       ? 'bg-gradient-to-r from-[#175C93] to-[#7BC7F0] border-[#E12035]'
                                                       : 'bg-white border-gray-200'"
                             class="p-4 sm:p-6 rounded-lg border-2 shadow-sm hover:shadow-lg transition-all duration-300 relative"
                             tabindex="0" style="opacity: 1; transform: none;">
                            <div class="absolute -top-2 right-2 sm:right-4 px-2 sm:px-3
                                                       py-1 rounded-full text-xs font-semibold shadow-lg
                                                       bg-[#175C93] text-white" style="opacity: 1; transform: none;
                                                       ">STUDENT
                            </div>
                            <div class="flex flex-col h-full">
                               <div class="mb-3 sm:mb-4">
                                   <h2 class="text-lg sm:text-xl font-bold text-slate-800 mb-2">Student Ticket</h2>
                                   <p class="text-slate-800/80 text-xs sm:text-sm">For enrolled students and emerging professionals attending the summit.</p>
                               </div>
                               <div class="mb-3 sm:mb-4">
                                   <h3 class="text-2xl sm:text-3xl font-bold text-slate-800">Ksh. 27,500</h3>
                                   <div class="mt-1 text-xs sm:text-sm text-slate-600">USD $220</div>
                               </div>
                               <div class="mb-4 sm:mb-6">
                                   <ul class="space-y-1 text-slate-800 text-xs sm:text-sm">
                                       <li class="flex items-center">
                                           <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="w-3 h-3 sm:w-4 sm:h-4 text-emerald-400 mr-2 flex-shrink-0 iconify iconify--mdi" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M21 7L9 19l-5.5-5.5l1.41-1.41L9 16.17L19.59 5.59z"></path></svg>
                                           Student-focused access
                                       </li>
                                       <li class="flex items-center">
                                           <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="w-3 h-3 sm:w-4 sm:h-4 text-emerald-400 mr-2 flex-shrink-0 iconify iconify--mdi" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M21 7L9 19l-5.5-5.5l1.41-1.41L9 16.17L19.59 5.59z"></path></svg>
                                           Keynotes & networking
                                       </li>
                                       <li class="flex items-center">
                                           <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="w-3 h-3 sm:w-4 sm:h-4 text-emerald-400 mr-2 flex-shrink-0 iconify iconify--mdi" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M21 7L9 19l-5.5-5.5l1.41-1.41L9 16.17L19.59 5.59z"></path></svg>
                                           Digital certificate
                                       </li>
                                   </ul>
                               </div>
                               <div class="flex flex-col sm:flex-row items-center justify-between mt-auto gap-3">
                                   <div x-show="!selected" class="w-full flex flex-col gap-3 mt-auto">
                                       <button @click="selected = true; selectTicket('Student Ticket', 27500, count)" class="rounded-full px-4 sm:px-4 py-2 font-medium transition-colors text-sm sm:text-base bg-slate-800 text-white hover:bg-[#84C1D9]">Select Ticket</button>
                                   </div>
                                   <div x-show="selected" class="w-full flex flex-col gap-2 mt-auto">
                                       <div class="flex items-center justify-between w-full">
                                           <div class="flex items-center gap-2">
                                               <svg class="w-5 h-5 text-white" viewBox="0 0 24 24"><path fill="currentColor" d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10s10-4.5 10-10S17.5 2 12 2m-2 15l-5-5l1.41-1.41L10 14.17l7.59-7.59L19 8z"></path></svg>
                                               <span class="text-white font-semibold text-sm">Selected: <span x-text="count"></span> ticket(s)</span>
                                           </div>
                                       </div>
                                       <button @click="selected = false" class="w-full rounded-full px-4 py-2 font-medium transition-all text-sm bg-white/20 text-white hover:bg-red-500 hover:text-white border border-white/30 flex items-center justify-center gap-2">
                                           <svg class="w-4 h-4" viewBox="0 0 24 24"><path fill="currentColor" d="M12 2c5.53 0 10 4.47 10 10s-4.47 10-10 10S2 17.53 2 12S6.47 2 12 2m3.59 5L12 10.59L8.41 7L7 8.41L10.59 12L7 15.59L8.41 17L12 13.41L15.59 17L17 15.59L13.41 12L17 8.41z"></path></svg>
                                           Remove Ticket
                                       </button>
                                   </div>
                               </div>
                            </div>
                        </div>
                        <div x-data="{ count: 1, selected:false }" data-ticket-type="Exhibition Booth" data-kes-price="300000" data-usd-price="2330" :class="selected
                                                       ? 'bg-gradient-to-r from-[#175C93] to-[#7BC7F0] border-[#E12035]'
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
                                    <div class="mt-1 text-xs sm:text-sm text-slate-600">USD $2,330</div>

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
                    <section x-cloak x-show="!showPaymentIframe && currentStep === 1 && !isPurchaseMore" id="contact-info-step">
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
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                            <div class="">
                                                <label for="firstName" class="block text-slate-800 text-sm font-semibold mb-2">First Name <span class="text-red-500 ml-0.5">*</span></label>
                                                <div class="relative">
                                                    <input id="firstName" class="w-full px-4 sm:px-4 py-2.5 sm:py-3 border
                                                    rounded-lg bg-white focus:outline-none focus:ring-2 transition-all duration-300 text-sm sm:text-base border-gray-300 focus:ring-slate-800 focus:border-slate-800 hover:border-[#84C1D9] shadow-sm hover:shadow-md"
                                                           placeholder="John" type="text" value="" name="firstName">
                                                    <div class="custom-error-container"></div>
                                                </div>
                                            </div>
                                            <div class="">
                                                <label for="lastName" class="block text-slate-800 text-sm font-semibold mb-2">Last Name <span class="text-red-500 ml-0.5">*</span></label>
                                                <div class="relative">
                                                    <input id="lastName" class="w-full px-4 sm:px-4 py-2.5 sm:py-3 border
                                                    rounded-lg bg-white focus:outline-none focus:ring-2 transition-all duration-300 text-sm sm:text-base border-gray-300 focus:ring-slate-800 focus:border-slate-800 hover:border-[#84C1D9] shadow-sm hover:shadow-md"
                                                           placeholder="Doe" type="text" value="" name="lastName">
                                                    <div class="custom-error-container"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                            <div class="">
                                                <label for="email" class="block text-slate-800 text-sm font-semibold mb-2">Email Address <span class="text-red-500 ml-0.5">*</span></label>
                                                <div class="relative">
                                                    <input id="email" class="w-full px-4 sm:px-4 py-2.5 sm:py-3 border rounded-lg bg-white focus:outline-none focus:ring-2 transition-all duration-300 text-sm sm:text-base border-gray-300 focus:ring-slate-800 focus:border-slate-800 hover:border-[#84C1D9] shadow-sm hover:shadow-md"
                                                           placeholder="john.doe@kasneb.or.ke" type="email" value=""
                                                           name="email">
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
                                            <div id="terms-wrapper" class="bg-blue-50 border border-[#84C1D9]/30 rounded-xl p-5 mb-6">
                                                <div x-show="formErrors.terms" x-cloak class="mt-2 p-3 bg-red-50 border border-red-200 rounded-lg">
                                                    <p x-text="formErrors.terms" class="text-red-600 text-sm"></p>
                                                </div>
                                                <div class="flex
                                                items-start gap-3
                                                text-sm">
                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="w-5 h-5 text-[#84C1D9] mt-0.5 flex-shrink-0 iconify iconify--mdi" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M11 9h2V7h-2m1 13c-4.41 0-8-3.59-8-8s3.59-8 8-8s8 3.59 8 8s-3.59 8-8 8m0-18A10 10 0 0 0 2 12a10 10 0 0 0 10 10a10 10 0 0 0 10-10A10 10 0 0 0 12 2m-1 15h2v-6h-2z"></path></svg>
                                                    <p class="text-sm text-gray-700 leading-relaxed">By continuing with your registration, you acknowledge and agree to our Data Protection and Privacy Policy and consent to the collection and processing of your personal information for conference registration and related administrative purposes. You may also choose to receive updates, announcements, and relevant information about the KICP Conference.</p>
                                                </div>
                                                <div class="flex items-start mt-4">
                                                    <input id="terms" class="mr-3 mt-1 rounded-sm h-3 w-3" :class="{'border-red-500 bg-red-50': formErrors.terms}"
                                                           type="checkbox" name="terms" value="1" @change="formErrors.terms = ''" />
                                                    <label for="terms" class="text-sm text-gray-700">I accept the
                                                        above terms &amp;  privacy policy <span class="text-red-500">*</span></label>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <div x-show="!showPaymentIframe && hasSelectedTickets()" x-cloak
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
                                    <div class="flex items-center justify-center">
                                        <div class="inline-flex items-center rounded-full border border-slate-200 bg-slate-100 p-1 shadow-sm">
                                            <button type="button" @click="formData.currency = 'KES'" :class="formData.currency === 'KES' ? 'bg-[#175C93] text-white shadow-sm' : 'text-slate-600'" class="min-w-[72px] rounded-full px-3 py-1.5 text-sm font-semibold transition-all">KES</button>
                                            <button type="button" @click="formData.currency = 'USD'" :class="formData.currency === 'USD' ? 'bg-[#175C93] text-white shadow-sm' : 'text-slate-600'" class="min-w-[72px] rounded-full px-3 py-1.5 text-sm font-semibold transition-all">USD</button>
                                        </div>
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-500">Total Amount</p>
                                        <p class="font-bold text-slate-800 text-lg sm:text-xl"
                                           x-text="formatPrice(totalAmount())"></p>
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
                                    <button x-show="hasSelectedTickets()" @click="proceedFromCurrentStep()"
                                            class="flex-1 sm:flex-none bg-red-500 text-white px-6 sm:px-8 py-2.5 sm:py-3
                                            rounded-full font-semibold hover:bg-slate-800 transition-all duration-300 shadow-lg hover:shadow-xl text-sm sm:text-base inline-flex items-center justify-center gap-2">
                                        Proceed to <span x-text="isPurchaseMore ? 'PesaFlow' : (currentStep === 0 ? 'add your details' : 'make payment')"></span>
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

                    <section x-cloak x-show="showPaymentIframe" class="mt-6">
                        <div class="mx-auto max-w-7xl">
                           <div class="bg-white border border-slate-200 rounded-2xl shadow-xl p-4 sm:p-6">
                               <div class="flex items-center justify-between gap-4 mb-4">
                                   <div>
                                       <h2 class="text-xl sm:text-2xl font-bold text-slate-800">Complete your payment</h2>
                                       <p class="text-sm text-gray-600">You will be redirected to the secure PesaFlow payment page.</p>
                                   </div>
                                   <button type="button" @click="showPaymentIframe = false; currentStep = 0;" class="px-4 py-2 rounded-full bg-gray-200 text-gray-700 font-medium hover:bg-gray-300">Back</button>
                               </div>

                        <!-- Fallback UI when the iframe cannot be embedded -->
                        <div x-show="showIframeBlocked" class="p-4 bg-yellow-50 border border-yellow-200 rounded-lg mt-4">
                            <div class="flex items-start gap-3">
                                <div class="flex-1">
                                    <div class="font-semibold text-yellow-800">Payment page cannot be embedded</div>
                                    <div class="text-sm text-yellow-700 mt-1">The payment provider prevents embedding this page in an iframe. Click the button below to open the payment page in a new tab.</div>
                                </div>
                                <div class="flex-shrink-0">
                                    <a :href="paymentFallbackUrl" target="_blank" rel="noopener noreferrer"
                                       class="bg-gradient-to-r from-[#175C93] to-[#84C1DA] border border-transparent text-white px-6
                         sm:px-8
                         py-3 rounded-full hover:opacity-90 transition-all duration-300 font-medium text-sm sm:text-base shadow-lg flex items-center justify-center gap-2 w-full sm:w-auto">Open payment
                                        in new tab</a>
                                </div>
                            </div>
                        </div>
                           </div>
                        </div>
                    </section>

                    <div x-show="!showPaymentIframe && hasSelectedTickets() && currentStep === 0"
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
                                                        <span class="font-semibold" x-text="formatPrice(getTicketPrice(ticket) * ticket.count)"></span>

                                    </div>
                                </div>
                            </template>
                        </div>
                        <hr class="my-3 sm:my-4">
                        <div class="flex justify-between font-bold text-base sm:text-lg">
                            <span>Total</span>
                            <span x-text="formatPrice(totalAmount())"></span>
                        </div>
                    </div>
                </main>

                </section>

            </div>

        </div>

    </div>
</section>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize country select for step 1
        const countryInput = document.querySelector('#country');
        if (countryInput) {
            $(countryInput).countrySelect({
                defaultCountry: "ke",  // No default country
                preferredCountries: ['ke', 'tz', 'ug', 'rw'], // African countries preferred
                responsiveDropdown: true
            });
        }

        // Also initialize for step 2 if needed
        const countryInputStep2 = document.querySelector('#wizardForm #country');
        if (countryInputStep2 && countryInputStep2 !== countryInput) {
            $(countryInputStep2).countrySelect({
                defaultCountry: "ke",
                preferredCountries: ['ke', 'tz', 'ug', 'rw'],
                responsiveDropdown: true
            });
        }
    });

    document.addEventListener('DOMContentLoaded', function() {
        // Initialize country select for step 1
        const countryInput = document.querySelector('#country1');
        if (countryInput) {
            $(countryInput).countrySelect({
                defaultCountry: "ke",  // No default country
                preferredCountries: ['ke', 'tz', 'ug', 'rw'], // African countries preferred
                responsiveDropdown: true
            });
        }

        // Also initialize for step 2 if needed
        const countryInputStep2 = document.querySelector('#wizardForm #country1');
        if (countryInputStep2 && countryInputStep2 !== countryInput) {
            $(countryInputStep2).countrySelect({
                defaultCountry: "ke",
                preferredCountries: ['ke', 'tz', 'ug', 'rw'],
                responsiveDropdown: true
            });
        }
    });

    function wizard(config = {}) {
        const isPurchaseMore = config.isPurchaseMore || false;
        return {
            currentStep: isPurchaseMore ? 0 : 0,
            steps: isPurchaseMore
                ? ['Ticket Selection']
                : ['Ticket Selection','Delegates Info'],
            isPurchaseMore: isPurchaseMore,
            validators: null,
            formData: {
                firstName: '',
                lastName: '',
                email: '',
                phone: '',
                country: '',
                organization: '',
                currency: 'KES',
                terms: 0
            },
            purchaserLocked: false,
            paymentMethod: 'pesaflow',
            paymentEmail: '',
            paymentPhone: '',
            isSubmitting: false,
            selectedTickets: [],
            showPaymentIframe: false,
            showIframeBlocked: false,
            paymentFallbackUrl: '',
            paymentPurchaseOrderId: null,
            paymentIframeUrl: '',
            polling: false,
            _pollInterval: null,

            paymentErrors: {
                method: '',
                email: '',
                phone: ''
            },
            formErrors: {
                terms: ''
            },

            init() {
                // Wait for Alpine to be ready
                this.$nextTick(() => {
                    // Small delay to ensure DOM is fully loaded
                    setTimeout(() => {
                        this.setupValidator();

                        // If this is a purchase-more flow and auth user data is present, prefill contact info
                        if (this.isPurchaseMore && window.authUser) {
                            try {
                                const u = window.authUser;
                                this.formData.firstName = u.first_name || '';
                                this.formData.lastName = u.last_name || '';
                                this.formData.email = u.email || '';
                                this.formData.phone = u.mobile || '';
                                this.formData.country = u.country || '';
                                this.formData.organization = u.organization || '';

                                // Lock purchaser fields to avoid accidental edits
                                this.purchaserLocked = true;

                                // Also prefill payment confirmation fields
                                this.paymentEmail = this.formData.email || '';
                                this.paymentPhone = this.formData.phone || '';
                            } catch (e) {
                                console.warn('Failed to prefill auth user data', e);
                            }
                        }

                        // Build a hidden lookup div and a map of ticket types -> USD values
                        try {
                            const tiles = Array.from(document.querySelectorAll('[x-data]'));
                            const lookup = {};
                            let lookupDiv = document.getElementById('ticket-usd-lookup');
                            if (!lookupDiv) {
                                lookupDiv = document.createElement('div');
                                lookupDiv.id = 'ticket-usd-lookup';
                                lookupDiv.style.display = 'none';
                                document.body.appendChild(lookupDiv);
                            }
                            lookupDiv.innerHTML = '';

                            tiles.forEach((t) => {
                                try {
                                    const heading = t.querySelector('h2');
                                    if (!heading) return;
                                    const type = heading.textContent.trim();
                                    if (!type) return;
                                    const usd = this.extractUsdValueFromTile(t, 0);
                                    if (usd && Number.isFinite(usd) && usd >= 1) {
                                        lookup[type] = usd;
                                        const span = document.createElement('span');
                                        span.dataset.type = type;
                                        span.dataset.usd = String(usd);
                                        lookupDiv.appendChild(span);
                                    }
                                } catch (e) {
                                    // ignore individual tile errors
                                }
                            });

                            this.ticketUsdMap = lookup;
                        } catch (e) {
                            console.warn('ticket usd map build error', e);
                        }
                    }, 200);
                });

                this.$watch('paymentMethod', (value) => {
                    if (this.isPurchaseMore && window.authUser) {
                        if (value === 'lpo') {
                            this.paymentEmail = window.authUser.email || this.paymentEmail || this.formData.email || '';
                        }

                        if (value === 'mpesa') {
                            this.paymentPhone = window.authUser.mobile || this.paymentPhone || this.formData.phone || '';
                        }
                    }
                });

                // Global click listener to handle Remove Ticket buttons inside ticket cards.
                const self = this;
                const removeHandler = function(e) {
                    const btn = e.target.closest && e.target.closest('button');
                    if (!btn) return;
                    if (btn.textContent && btn.textContent.trim() === 'Remove Ticket') {
                        const tile = btn.closest('[x-data]');
                        const heading = tile ? tile.querySelector('h2') : null;
                        const type = heading ? heading.textContent.trim() : null;
                        if (type) {
                            // Remove from selectedTickets if present
                            self.removeTicket(type);
                        }
                    }
                };
                document.addEventListener('click', removeHandler);
            },

            // Helper function to create error message with SVG icon
            createErrorMessage(text) {
                const container = document.createElement('div');
                container.className = 'text-red-600 text-xs sm:text-sm mt-1.5 flex items-center gap-1.5 animate-fade-in';

                // Create SVG element
                const svgNS = "http://www.w3.org/2000/svg";
                const svg = document.createElementNS(svgNS, "svg");
                svg.setAttribute("class", "w-4 h-4 flex-shrink-0");
                svg.setAttribute("fill", "currentColor");
                svg.setAttribute("viewBox", "0 0 20 20");

                const path = document.createElementNS(svgNS, "path");
                path.setAttribute("fill-rule", "evenodd");
                path.setAttribute("d", "M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z");
                path.setAttribute("clip-rule", "evenodd");

                svg.appendChild(path);

                // Create icon span
                const iconSpan = document.createElement('span');
                iconSpan.appendChild(svg);

                // Create text span
                const textSpan = document.createElement('span');
                textSpan.textContent = text;

                // Add both spans to container
                container.appendChild(iconSpan);
                container.appendChild(textSpan);

                return container;
            },

            setupValidator() {
                // Clean up old validator if exists
                if (this.validators) {
                    try {
                        this.validators.destroy();
                    } catch (e) {
                        console.log('Validator destroy error:', e);
                    }
                }

                try {
                    // Initialize JustValidate
                    this.validators = new JustValidate('#wizardForm', {
                        errorFieldCssClass: 'border-red-500',
                        errorLabelCssClass: 'text-red-500 text-sm mt-1 hidden', // Hide default label
                        focusInvalidField: true,
                        lockForm: true, // Prevent form submission
                    });

                    // Custom error container creator
                    const createCustomErrorLabel = (field, message) => {
                        const parent = field.parentElement;

                        // Remove existing custom error
                        const existingError = parent.querySelector('.custom-error-container');
                        console.log('parent element: ', parent);

                        if (existingError) {
                            existingError.remove();
                        }

                        // Create new error with SVG
                        const errorContainer = this.createErrorMessage(message);
                        errorContainer.classList.add('custom-error-container');
                        parent.appendChild(errorContainer);
                    };

                    // Add validation rules for step 1
                    this.validators
                        .addField('#firstName', [
                            {
                                rule: 'required',
                                errorMessage: 'First name is required'
                            },
                            {
                                rule: 'maxLength',
                                value: 50,
                                errorMessage: 'Name must be less than 50 characters'
                            }
                        ], {
                            errorsContainer: function(field) {
                                const parent = field.parentElement;
                                return {
                                    render: function(errors) {
                                        if (errors.length) {
                                            createCustomErrorLabel(field, errors[0]);
                                        }
                                    }
                                };
                            }
                        })
                        .addField('#lastName', [
                            {
                                rule: 'required',
                                errorMessage: 'Last name is required'
                            },
                            {
                                rule: 'maxLength',
                                value: 50,
                                errorMessage: 'Name must be less than 50 characters'
                            }
                        ], {
                            errorsContainer: function(field) {
                                const parent = field.parentElement;
                                return {
                                    render: function(errors) {
                                        if (errors.length) {
                                            createCustomErrorLabel(field, errors[0]);
                                        }
                                    }
                                };
                            }
                        })
                        .addField('#email', [
                            {
                                rule: 'required',
                                errorMessage: 'Email is required'
                            },
                            {
                                rule: 'email',
                                errorMessage: 'Please enter a valid email address'
                            }
                        ], {
                            errorsContainer: function(field) {
                                const parent = field.parentElement;
                                return {
                                    render: function(errors) {
                                        if (errors.length) {
                                            createCustomErrorLabel(field, errors[0]);
                                        }
                                    }
                                };
                            }
                        })
                        .addField('#phone', [
                            {
                                rule: 'required',
                                errorMessage: 'Phone number is required'
                            },
                            {
                                rule: 'customRegexp',
                                value: /^[\+]?[(]?[0-9]{1,4}[)]?[-\s\.]?[(]?[0-9]{1,4}[)]?[-\s\.]?[0-9]{1,5}[-\s\.]?[0-9]{1,5}$/,
                                errorMessage: 'Please enter a valid phone number'
                            }
                        ], {
                            errorsContainer: function(field) {
                                const parent = field.parentElement;
                                return {
                                    render: function(errors) {
                                        if (errors.length) {
                                            createCustomErrorLabel(field, errors[0]);
                                        }
                                    }
                                };
                            }
                        })
                        .addField('#country', [
                            {
                                rule: 'required',
                                errorMessage: 'Country is required'
                            }
                        ], {
                            errorsContainer: function(field) {
                                const parent = field.parentElement;
                                return {
                                    render: function(errors) {
                                        if (errors.length) {
                                            createCustomErrorLabel(field, errors[0]);
                                        }
                                    }
                                };
                            }
                        })
                        .addField('#terms', [
                            {
                                rule: 'required',
                                errorMessage: 'You must accept terms & conditions to proceed'
                            }
                        ], {
                            errorsContainer: function(field) {
                                const parent = field.parentElement;
                                return {
                                    render: function(errors) {
                                        if (errors.length) {
                                            createCustomErrorLabel(field, errors[0]);
                                        }
                                    }
                                };
                            }
                        });

                    console.log('Validator setup complete');
                } catch (error) {
                    console.error('Error setting up validator:', error);
                }
            },

            // New method to validate and go to payment step
            validateAndGoToPayment() {
                console.log('Validating step 2 and moving to payment');

                if (this.validateStep()) {
                    this.saveStep2Data();

                    // Validate Terms & Preferences


                    // Move to payment step (step 3)
                    this.currentStep = 3;
                    //console.log('Moving to payment step:', this.currentStep);

                    // Scroll to top of form
                    const wizardForm = document.getElementById('wizardForm');
                    if (wizardForm) {
                        wizardForm.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    }
                } else {
                    //console.log('Validation failed for step 2');

                    // Scroll to first error
                    const firstError = document.querySelector('.border-red-500');
                    if (firstError) {
                        firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    }
                }
            },

            async validateStep() {
                console.log('Validating step:', this.currentStep);

                if (!this.isPurchaseMore && this.currentStep === 1) {
                    // Save form data for step 1 and continue to normal validation below.
                    this.saveFormData();
                }

                const stepFields = {
                    0: [],
                    1: ['#firstName', '#lastName', '#email', '#phone', '#country', '#currency', '#terms'], // Contact info - handled
                    2: [] // Payment - to be implemented
                };

                const fieldsToValidate = stepFields[this.currentStep] || [];

                if (fieldsToValidate.length === 0) {
                    console.log('No fields to validate, moving to next step');
                    this.nextStep();
                    return true;
                }

                if (!this.validators) {
                    console.error('Validator not initialized');
                    this.setupValidator();
                    setTimeout(() => {
                        this.validateStep();
                    }, 100);
                    return;
                }

                try {
                    // Validate specific fields
                    this.clearAllErrors();
                    const isValid = await this.validators.revalidate();

                    console.log('Validation result:', isValid);

                    // Check terms checkbox after validator
                    const termsCheckbox = document.querySelector('#terms');
                    if (termsCheckbox && !termsCheckbox.checked) {
                        this.formErrors.terms = 'You must accept the terms and conditions to proceed';
                    const termsWrapper = document.querySelector('#terms-wrapper');
                    if (termsWrapper) {
                        termsWrapper.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    } else {
                        termsCheckbox.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    }
                    return false;
                    } else if (termsCheckbox) {
                    this.formErrors.terms = '';
                    }

                    if (isValid) {
                        // Clear all error messages
                        this.clearAllErrors();

                        // Save form data
                        this.saveFormData();
                        this.nextStep();
                        return true;
                    } else {
                        console.log('Validation failed');

                        // Show manual validation messages for each field
                        const manualOk = this.manualValidation(fieldsToValidate);
                        // make sure we scroll to first shown error
                        const firstError = document.querySelector('.custom-error-container') || document.querySelector('.border-red-500');
                        if (firstError) {
                            firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                        }

                        return manualOk;
                    }
                } catch (error) {
                    console.error('Validation error:', error);

                    // Fallback: check fields manually if validator fails
                    if (this.manualValidation(fieldsToValidate)) {
                        this.clearAllErrors();
                        this.saveFormData();
                        this.nextStep();
                        return true;
                    }
                    return false;
                }
            },

            clearAllErrors() {
                // Remove all custom error containers
                document.querySelectorAll('.custom-error-container').forEach(el => el.remove());

                // Remove border red from all fields
                document.querySelectorAll('.border-red-500').forEach(el => {
                    el.classList.remove('border-red-500');
                });
            },

            hasSelectedTickets() {
                // Check if any tickets are selected
                return this.selectedTickets && this.selectedTickets.length > 0;
            },

            totalTickets() {
                // Calculate total number of selected tickets
                return this.selectedTickets ? this.selectedTickets.reduce((sum, ticket) => sum + ticket.count, 0) : 0;
            },

            selectedCurrency() {
                return (this.formData && this.formData.currency) ? this.formData.currency.toUpperCase() : 'KES';
            },

            getTicketPrice(ticket) {
                const price = Number(ticket && ticket.price ? ticket.price : 0);

                if (this.selectedCurrency() === 'USD') {
                    // 1) explicit stored USD value on selected ticket
                    const usdStored = ticket && (ticket.usdPrice || ticket.usd_price || ticket.usd);
                    let usdVal = Number(usdStored || 0);

                    // 2) match the current ticket tile by type and read its data-usd-price attribute
                    if (!Number.isFinite(usdVal) || usdVal < 1) {
                        try {
                            const tiles = Array.from(document.querySelectorAll('[data-ticket-type]'));
                            const matchTile = tiles.find(t => {
                                const type = String(t.dataset.ticketType || '').trim().toLowerCase();
                                return type && type === String(ticket && ticket.type || '').trim().toLowerCase();
                            });
                            if (matchTile && matchTile.dataset && matchTile.dataset.usdPrice) {
                                const direct = Number(String(matchTile.dataset.usdPrice).replace(/[^0-9.]/g, ''));
                                if (Number.isFinite(direct) && direct >= 1) {
                                    usdVal = direct;
                                }
                            }
                        } catch (e) {
                            console.log('getTicketPrice dataset usd lookup error', e);
                        }
                    }

                    // 3) DOM extraction fallback
                    if (!Number.isFinite(usdVal) || usdVal < 1) {
                        try {
                            const tiles = Array.from(document.querySelectorAll('[x-data]'));
                            const matchTile = tiles.find(t => {
                                const h = t.querySelector('h2');
                                return h && String(h.textContent || '').trim().toLowerCase() === (String(ticket && ticket.type || '').toLowerCase());
                            });
                            if (matchTile) {
                                const extracted = this.extractUsdValueFromTile(matchTile, price);
                                if (extracted && Number.isFinite(extracted) && extracted >= 1) {
                                    usdVal = extracted;
                                }
                            }
                        } catch (e) {
                            console.log('getTicketPrice DOM usd extract error', e);
                        }
                    }

                    if (!Number.isFinite(usdVal) || usdVal < 1) {
                        usdVal = price ? (price / 125) : 0;
                    }

                    return usdVal;
                }

                return price;
            },



            extractUsdValueFromTile(tile, fallbackPrice = 0) {
                if (!tile) return Number(fallbackPrice > 0 ? (fallbackPrice / 125) : 0);

                const candidates = [];
                const textNodes = tile.querySelectorAll('*');
                textNodes.forEach((node) => {
                    const text = (node.textContent || '').trim();
                    if (!text) return;

                    if (/USD\s*\$|US\$/.test(text)) {
                        const match = text.match(/\$?\s?([0-9][0-9,]*(?:\.\d+)?)/);
                        if (match) {
                            const value = Number((match[1] || '').replace(/,/g, ''));
                            if (Number.isFinite(value) && value > 0) {
                                candidates.push(value);
                            }
                        }
                    }
                });

                if (candidates.length) {
                    return Math.max(...candidates);
                }

                const tileUsd = tile.dataset && (tile.dataset.usdPrice || tile.dataset.usd);
                if (tileUsd) {
                    const value = Number(String(tileUsd).replace(/[^0-9.]/g, ''));
                    if (Number.isFinite(value) && value > 0) return value;
                }

                const fallback = Number(fallbackPrice > 0 ? fallbackPrice : 0);
                return fallback > 0 ? (fallback / 125) : 0;
            },

            totalAmount() {
                if (!this.selectedTickets) return 0;
                return this.selectedTickets.reduce((sum, ticket) => sum + (this.getTicketPrice(ticket) * ticket.count), 0);
            },

            formatPrice(value) {
                const amount = Number(value || 0);
                if (this.selectedCurrency() === 'USD') {
                    return '$' + amount.toLocaleString('en-US', { minimumFractionDigits: 0, maximumFractionDigits: 2 });
                }
                return 'Ksh. ' + amount.toLocaleString('en-US', { minimumFractionDigits: 0, maximumFractionDigits: 0 });
            },

            removeTicket(ticketType) {
                const target = (ticketType || '').toLowerCase();
                this.selectedTickets = this.selectedTickets.filter(ticket => (ticket.type || '').toLowerCase() !== target);
                // Sync attendee fields whenever tickets change
                this.syncAttendees();
            },

            resetAllTicketCards() {
                // Reset all ticket card UI states
                const ticketCards = document.querySelectorAll('[x-data*="count"]');

                ticketCards.forEach((card, index) => {
                    // Method 1: Try to access Alpine component directly
                    try {
                        const alpineInstance = card._x_dataStack ? card._x_dataStack[0] : card.__x?.$data;
                        if (alpineInstance) {
                            alpineInstance.selected = false;
                            alpineInstance.count = alpineInstance.count > 5 ? 10 : 1;
                            return; // Success, skip other methods
                        }
                    } catch (e) {
                        // Continue to next method
                    }

                    // Method 2: Use Alpine's magic $el to dispatch and update
                    try {
                        if (card.__x_dataStack) {
                            const data = card.__x_dataStack[0];
                            if (data) {
                                data.selected = false;
                                data.count = data.count > 5 ? 10 : 1;
                            }
                        }
                    } catch (e) {
                        // Continue to next method
                    }

                    // Method 3: Reset via CSS classes (fallback)
                    card.classList.remove('bg-gradient-to-r', 'from-[#175C93]', 'to-[#7BC7F0]', 'border-[#E12035]');
                    card.classList.add('bg-white', 'border-gray-200');

                    // Reset button text if exists
                    const button = card.querySelector('button[x-show*="selected"]');
                    if (button) {
                        button.textContent = 'Select';
                    }

                    // Reset counter input if exists
                    const countInput = card.querySelector('input[type="number"]');
                    if (countInput) {
                        countInput.value = index > 0 && index < 2 ? '10' : '1';
                    }
                });
            },

            selectTicket(ticketType, price, count) {
                // Try to detect the clicked ticket card if the caller passed generic/hardcoded values.
                let type = ticketType;
                let pr = price;
                let usdPrice = null;

                try {
                    const active = document.activeElement;
                    const activeTile = active && active.closest ? active.closest('[x-data]') : null;
                    if (activeTile) {
                        const heading = activeTile.querySelector('h2');
                        const priceEl = activeTile.querySelector('h3');
                        const typeFromDom = heading ? heading.textContent.trim() : null;
                        const priceFromDom = priceEl ? parseInt(priceEl.textContent.replace(/[^0-9.]/g, '')) : NaN;

                        if (typeFromDom) type = typeFromDom;
                        if (!isNaN(priceFromDom)) pr = priceFromDom;
                    } else {
                        // Fallback: try to find tile by matching heading text for the ticket type
                        const tiles = Array.from(document.querySelectorAll('[x-data]'));
                        for (const t of tiles) {
                            const heading = t.querySelector('h2');
                            if (!heading) continue;
                            const headingText = heading.textContent.trim();
                            if (!headingText) continue;
                            if (String(headingText).toLowerCase() === String(type || '').toLowerCase()) {
                                const priceEl = t.querySelector('h3');
                                const priceFromDom = priceEl ? parseInt(priceEl.textContent.replace(/[^0-9.]/g, '')) : NaN;
                                if (!isNaN(priceFromDom)) pr = priceFromDom;
                                // use this tile for usd extraction
                                pr = pr || price;
                                try {
                                    const usdDetected = this.extractUsdValueFromTile(t, pr || price);
                                    if (usdDetected && Number.isFinite(usdDetected) && usdDetected >= 1) {
                                        // Use detected USD value
                                        usdPrice = usdDetected;
                                    }
                                } catch(e) {
                                    console.log('USD detect fallback error', e);
                                }
                                break;
                            }
                        }
                    }
                } catch (e) {
                    console.log('selectTicket detect error', e);
                }

                if (!type) return;

                // Check if ticket type already exists
                const normalizedType = (type || '').toLowerCase();
                const existingIndex = this.selectedTickets.findIndex(t => (t.type || '').toLowerCase() === normalizedType);

                // direct dataset-based match on the ticket card
                try {
                    const tiles = Array.from(document.querySelectorAll('[data-ticket-type]'));
                    const matchedTile = tiles.find(t => String(t.dataset.ticketType || '').trim().toLowerCase() === String(type || '').trim().toLowerCase());
                    if (matchedTile && matchedTile.dataset && matchedTile.dataset.usdPrice) {
                        const direct = Number(String(matchedTile.dataset.usdPrice).replace(/[^0-9.]/g, ''));
                        if (Number.isFinite(direct) && direct >= 1) {
                            usdPrice = direct;
                        }
                    }
                } catch (e) {
                    console.log('USD price dataset lookup error', e);
                }

                // Prefer ticketUsdMap when available
                if ((typeof usdPrice === 'undefined' || usdPrice === null) && this.ticketUsdMap && this.ticketUsdMap[type]) {
                    usdPrice = this.ticketUsdMap[type];
                }

                // First try lookup div if present (ensures immediate availability)
                try {
                    const lookupDiv = document.getElementById('ticket-usd-lookup');
                    if (lookupDiv && (!usdPrice || usdPrice < 1)) {
                        const spans = Array.from(lookupDiv.querySelectorAll('span'));
                        const matched = spans.find(s => s.dataset && s.dataset.type && String(s.dataset.type).trim().toLowerCase() === String(type || '').toLowerCase());
                        if (matched && matched.dataset && matched.dataset.usd) {
                            const parsed = Number(String(matched.dataset.usd).replace(/[^0-9.]/g, ''));
                            if (Number.isFinite(parsed) && parsed >= 1) {
                                usdPrice = parsed;
                            }
                        }
                    }
                } catch (e) {
                    // ignore
                }

                // If usdPrice wasn't set in fallback above, attempt extraction from active tile or general tile
                if (typeof usdPrice === 'undefined' || usdPrice === null) {
                    try {
                        const activeTile = document.activeElement && document.activeElement.closest ? document.activeElement.closest('[x-data]') : null;
                        const tile = activeTile || Array.from(document.querySelectorAll('[x-data]')).find(t => {
                            const h = t.querySelector('h2');
                            return h && String(h.textContent || '').trim().toLowerCase() === (String(type || '').toLowerCase());
                        }) || document.querySelector('[x-data]');
                        usdPrice = this.extractUsdValueFromTile(tile, pr || price);
                    } catch (e) {
                        console.log('USD price detect error', e);
                        usdPrice = null;
                    }
                }

                if (usdPrice === null || !Number.isFinite(usdPrice) || usdPrice < 1) {
                    usdPrice = Number((price && typeof price === 'number' && price > 0) ? (price / 125) : (pr ? (pr / 125) : 0));
                }

                if (existingIndex >= 0) {
                    // Update existing ticket
                    this.selectedTickets[existingIndex].count = count;
                    this.selectedTickets[existingIndex].usdPrice = usdPrice;
                } else {
                    // Add new ticket
                    this.selectedTickets.push({
                        type: type,
                        price: pr || price,
                        usdPrice: usdPrice,
                        count: count
                    });
                }

            },


            manualValidation(fields) {
                let isValid = true;

                fields.forEach(selector => {
                    const element = document.querySelector(selector);
                    if (!element) return;

                    const parent = element.parentElement;

                    // Remove existing custom errors
                    const existingError = parent.querySelector('.custom-error-container');
                    if (existingError) {
                        existingError.remove();
                    }

                    element.classList.remove('border-red-500');

                    // Check if empty
                    if (!element.value.trim()) {
                        element.classList.add('border-red-500');
                        isValid = false;

                        // Add error with SVG
                        const errorContainer = this.createErrorMessage('This field is compulsory');
                        errorContainer.classList.add('custom-error-container');
                        parent.appendChild(errorContainer);
                        return;
                    }

                    // Specific validation for email
                    if (selector === '#email') {
                        const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
                        if (!emailRegex.test(element.value)) {
                            element.classList.add('border-red-500');
                            isValid = false;

                            const errorContainer = this.createErrorMessage('Please enter a valid email address');
                            errorContainer.classList.add('custom-error-container');
                            parent.appendChild(errorContainer);
                        }
                    }

                    // Specific validation for phone
                    if (selector === '#phone') {
                        const digitsOnly = element.value.replace(/\D/g, '');
                        if (digitsOnly.length < 10 || digitsOnly.length > 15) {
                            element.classList.add('border-red-500');
                            isValid = false;

                            const errorContainer = this.createErrorMessage('Phone number must contain 10-15 digits');
                            errorContainer.classList.add('custom-error-container');
                            parent.appendChild(errorContainer);
                        }
                    }

                    // For country select plugin
                    if (selector === '#country') {
                        const countryValue = element.value || $(element).countrySelect('getSelectedCountryData')?.name || '';

                        if (!countryValue.trim()) {
                            element.classList.add('border-red-500');
                            isValid = false;

                            const errorContainer = this.createErrorMessage('Please select your country');
                            errorContainer.classList.add('custom-error-container');
                            parent.appendChild(errorContainer);
                        }
                    }
                });

                return isValid;
            },

            saveFormData() {
                // Save form data from step 0
                const firstName = document.querySelector('#firstName');
                const lastName = document.querySelector('#lastName');
                const email = document.querySelector('#email');
                const phone = document.querySelector('#phone');
                const accept = document.querySelector('#accept');
                const currency = document.querySelector('#currency');

                if (firstName) this.formData.firstName = firstName.value;
                if (lastName) this.formData.lastName = lastName.value;
                if (email) this.formData.email = email.value;
                if (phone) this.formData.phone = phone.value;
                if (accept) this.formData.accept = accept.checked;
                if (currency) this.formData.currency = (currency.value || 'KES').toUpperCase();

                // Read organization from root contact step
                const org = document.querySelector('#organizationRoot');
                if (org) this.formData.organization = org.value;

                // Get country value from the country select plugin
                const countryInput = document.querySelector('#country');
                if (countryInput) {
                    const countryData = $(countryInput).countrySelect('getSelectedCountryData');
                    this.formData.country = countryData ? countryData.name : countryInput.value;
                }

                this.formData.currency = (this.formData.currency || 'KES').toUpperCase();
                console.log('Form data saved:', this.formData);
            },

            logExternalPaymentOpen(purchaseOrderId) {
                try {
                    if (window.dataLayer && Array.isArray(window.dataLayer)) {
                        window.dataLayer.push({ event: 'purchase_opened_external', purchase_order_id: purchaseOrderId });
                    }
                    if (typeof window.gtag === 'function') {
                        window.gtag('event', 'purchase_opened_external', { purchase_order_id: purchaseOrderId });
                    }
                    if (window.mixpanel && typeof window.mixpanel.track === 'function') {
                        window.mixpanel.track('purchase_opened_external', { purchase_order_id: purchaseOrderId });
                    }
                    // Best-effort server-side analytics (fire-and-forget)
                    try {
                        fetch('/api/v1/analytics/event', {
                            method: 'POST',
                            headers: { 'Content-Type': 'application/json' },
                            body: JSON.stringify({ event: 'purchase_opened_external', purchase_order_id: purchaseOrderId }),
                            keepalive: true
                        }).catch(()=>{});
                    } catch(e) {}
                } catch (e) {
                    console.warn('Analytics logging failed', e);
                }
            },

            onPaymentMethodChange(method) {
                this.paymentMethod = method;
                this.paymentErrors.method = '';
                if (method === 'lpo') {
                    this.paymentEmail = this.formData.email || '';
                    this.paymentErrors.phone = '';
                } else if (method === 'mpesa') {
                    const phoneEl = document.querySelector('#phone');
                    let phoneVal = this.formData.phone || (phoneEl ? phoneEl.value : '');
                    this.paymentPhone = phoneVal || '';
                    this.paymentErrors.email = '';
                }
            },


            validatePaymentEmail() {
                if (!this.paymentEmail) {
                    this.paymentErrors.email = 'Email is required';
                    return false;
                }
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(this.paymentEmail)) {
                    this.paymentErrors.email = 'Please enter a valid email address';
                    return false;
                }
                this.paymentErrors.email = '';
                return true;
            },

            validatePaymentPhone() {
                if (!this.paymentPhone) {
                    this.paymentErrors.phone = 'Phone number is required';
                    return false;
                }
                const phoneRegex = /^\+?[1-9]\d{1,14}$/;
                if (!phoneRegex.test(this.paymentPhone.replace(/[\s\-()]/g, ''))) {
                    this.paymentErrors.phone = 'Please enter a valid phone number (with country code, e.g., +254712345678)';
                    return false;
                }
                this.paymentErrors.phone = '';
                return true;
            },

            validatePaymentMethod() {
                this.paymentMethod = this.paymentMethod || 'pesaflow';
                if (this.paymentMethod === 'pesaflow') {
                    this.paymentErrors.method = '';
                    return true;
                }
                if (!this.paymentMethod) {
                    this.paymentErrors.method = 'Please select a payment method';
                    return false;
                }
                if (this.paymentMethod === 'lpo') {
                    return this.validatePaymentEmail();
                } else if (this.paymentMethod === 'mpesa') {
                    return this.validatePaymentPhone();
                }
                return true;
            },

            validateTerms() {
                const termsCheckbox = document.querySelector('#terms');
                if (!termsCheckbox || !termsCheckbox.checked) {
                    this.formErrors.terms = 'You must accept the terms and conditions to proceed';
                    const termsWrapper = document.querySelector('#terms-wrapper');
                    if (termsWrapper) {
                        termsWrapper.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    } else if (termsCheckbox) {
                        termsCheckbox.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    }
                    return false;
                }
                this.formErrors.terms = '';
                return true;
            },

            async completePurchase() {
                if (this.isSubmitting) return;
                this.clearAllErrors();
                this.paymentMethod = this.paymentMethod || 'pesaflow';
                if (!this.isPurchaseMore) {
                    this.saveFormData();
                }

                // Force pesaflow payments (remove payment selection step)
                this.paymentMethod = 'pesaflow';

                // Run form validation before invoking the API (contact fields + terms)
                try {
                    const canProceed = await this.validateStep();
                    // validateStep() may return undefined when validator is still initializing — treat non-true as failure
                    if (canProceed !== true) {
                        // Ensure terms are validated and scrolled into view if missing
                        if (this.validateTerms && !this.validateTerms()) {
                            this.currentStep = 1;
                        }
                        return;
                    }
                } catch (e) {
                    console.error('Pre-submit validation failed:', e);
                    // If validation throws, stop submission
                    return;
                }

                this.isSubmitting = true;

                const currency = (this.formData.currency || 'KES').toUpperCase();
                const payload = {
                    formData: this.isPurchaseMore ? {} : this.formData,
                    selectedTickets: this.selectedTickets,
                    paymentMethod: this.paymentMethod,
                    paymentEmail: this.formData.email || this.paymentEmail || '',
                    paymentPhone: this.formData.phone || this.paymentPhone || '',
                    amount: this.selectedTickets.reduce((sum, ticket) => sum + (this.getTicketPrice(ticket) * ticket.count), 0),
                    currency,
                    isPurchaseMore: this.isPurchaseMore,
                };

                try {
                    const tokenMeta = document.querySelector('meta[name=csrf-token]');
                    const csrf = tokenMeta ? tokenMeta.getAttribute('content') : '';

                    Swal.fire({
                        title: 'Processing...',
                        text: 'Please wait while we create your order and launch the payment page.',
                        allowOutsideClick: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });

                    const res = await fetch('/api/v1/tickets/purchase', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': csrf
                        },
                        credentials: 'same-origin',
                        body: JSON.stringify(payload)
                    });

                    let data;
                    try {
                        data = await res.json();
                    } catch (e) {
                        console.log('Purchase response non-JSON, status:', res.status);
                        data = null;
                    }

                    if (res.status === 422 && data && data.errors) {
                        Swal.close();
                        this.currentStep = 1;

                        setTimeout(() => {
                            for (const key in data.errors) {
                                if (!Object.prototype.hasOwnProperty.call(data.errors, key)) continue;
                                const messages = data.errors[key];
                                const selector = document.querySelector(`#${key}`) || document.querySelector(`[name="${key}"]`);
                                const parent = selector ? (selector.closest && selector.closest('div') || selector.parentElement) : null;
                                if (selector && parent) {
                                    const existing = parent.querySelector('.custom-error-container');
                                    if (existing) existing.remove();
                                    const errEl = this.createErrorMessage(messages[0]);
                                    errEl.classList.add('custom-error-container');
                                    parent.appendChild(errEl);
                                }
                            }

                            const firstError = document.querySelector('.custom-error-container') || document.querySelector('.border-red-500');
                            if (firstError) firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                        }, 300);

                        return;
                    }

                    if (res.ok) {
                        const paymentUrl = data && (data.payment_url || data.iframe_url || data.invoice_link || data.url);
                        if (paymentUrl) {
                            // Use pesaflow invoice link — open a modal showing the invoice link for the user to pay.
                            this.paymentIframeUrl = paymentUrl;
                            this.paymentPurchaseOrderId = data && data.purchase_order_id ? data.purchase_order_id : null;

                            // Show modal and display invoice link (avoid attempting to embed to prevent framing issues)
                            this.showPaymentIframe = true;
                            this.showIframeBlocked = true;
                            this.paymentFallbackUrl = paymentUrl;
                            this.currentStep = 0;
                            Swal.close();

                            // Start polling the server for payment status while modal is open
                            try { this.startPaymentStatusPolling(); } catch (e) { console.warn('Start polling failed', e); }

                            // Log analytics event for modal open
                            try { this.logExternalPaymentOpen(this.paymentPurchaseOrderId); } catch(e) {}

                            return;
                        }

                        Swal.fire({
                            icon: 'success',
                            title: 'Registration successful!',
                            text: data && data.message ? data.message : 'Ticket purchased successfully!',
                            showCancelButton: false,
                        });

                        if (this.isPurchaseMore) {
                            setTimeout(() => {
                                window.location.href = '/dashboard';
                            }, 1500);
                        } else {
                            this.clearAllErrors();
                            this.formData = {
                                firstName: '',
                                lastName: '',
                                email: '',
                                phone: '',
                                country: '',
                                organization: '',
                                currency: 'KES',
                                terms: 0
                            };
                            this.selectedTickets = [];
                            this.paymentMethod = 'pesaflow';
                            this.paymentEmail = '';
                            this.paymentPhone = '';
                            this.paymentErrors = {
                                method: '',
                                email: '',
                                phone: ''
                            };
                            this.formErrors = {
                                terms: ''
                            };
                            this.currentStep = 0;

                            setTimeout(() => {
                                document.querySelectorAll('input[type="text"], input[type="email"], input[type="tel"], textarea, select').forEach(field => {
                                    if (field.name !== 'method' && field.name !== 'confirm_password_confirmation') {
                                        field.value = '';
                                    }
                                });

                                const termsCheckbox = document.querySelector('#terms');
                                if (termsCheckbox) {
                                    termsCheckbox.checked = false;
                                }

                                this.resetAllTicketCards();
                                window.scrollTo({ top: 0, behavior: 'smooth' });
                            }, 500);
                        }
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: data && data.message ? data.message : 'Failed to purchase ticket.',
                        });
                    }
                } catch (err) {
                    console.error('Purchase error:', err);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'An error occurred while processing your purchase.',
                    });
                } finally {
                    this.isSubmitting = false;
                }
            },


            proceedFromCurrentStep() {
                if (this.isPurchaseMore) {
                    this.completePurchase();
                    return;
                }

                if (this.currentStep === 1) {
                    this.validateStep().then((res) => {
                        if (res === true) {
                            this.completePurchase();
                        }
                    });
                    return;
                }

                this.nextStep();
            },

            nextStep() {
                if (this.isPurchaseMore) {
                    // Purchase-more users are sent directly to PesaFlow after ticket selection.
                    if (this.currentStep < this.steps.length - 1) {
                        this.currentStep++;
                    }
                } else {
                    // Normal flow - increment by 1
                    if (this.currentStep < this.steps.length - 1) {
                        this.currentStep++;
                    }
                }

                console.log('Moving to step:', this.currentStep);

                // If moving to Payment, prefill payment confirmation fields from step 1
                if ((this.isPurchaseMore && this.currentStep === 1) || (!this.isPurchaseMore && this.currentStep === 2)) {
                    this.saveFormData();
                    this.paymentEmail = this.formData.email || '';
                    const phoneEl = document.querySelector('#phone');
                    this.paymentPhone = this.formData.phone || (phoneEl ? phoneEl.value : '');
                }

                // Scroll to top of form
                const wizardForm = document.getElementById('wizardForm');
                if (wizardForm) {
                    wizardForm.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            },


            prevStep(step = null) {
                if (this.currentStep > 0) {
                    if (this.isPurchaseMore) {
                        // For purchase more, when on step 1 (payment), go back to step 0 (ticket selection)
                        this.currentStep = 0;
                    } else {
                        // Normal flow
                        if (this.currentStep >= step) {
                            this.currentStep -= step;
                        } else {
                            this.currentStep--;
                        }
                    }

                    // Scroll to top of form
                    const wizardForm = document.getElementById('wizardForm');
                    if (wizardForm) {
                        wizardForm.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    }
                }
            },


        };
    }
</script>
@endpush
