<nav
    x-data="{
        isSticky: false,
        mobileMenuOpen: false,
        init() {
            window.addEventListener('scroll', () => {
                this.isSticky = window.scrollY > 100;
            });
        }
    }"
    :class="{
        'fixed top-0 left-0 right-0 shadow-lg': isSticky,
        'sm:absolute sm:left-1/2 sm:transform sm:-translate-x-1/2 mx-0 sm:mx-4 mt-0 sm:mt-4': !isSticky
    }"
    class="w-full z-50 transition-all duration-300 bg-white rounded-none sm:rounded-lg shadow-md max-w-none sm:max-w-7xl">
    <div class="w-full px-3 sm:px-4 md:px-6 lg:px-8">
        <div class="flex items-center justify-between py-2 sm:py-3">
            <!-- Logo -->
            <div class="flex-shrink-0">
                <a href="{{ route('/') }}">
                    <img alt="Logo" loading="lazy" width="200" height="70" decoding="async"
                         data-nimg="1"
                         class="w-20 sm:w-24 md:w-28 lg:w-32 xl:w-36 h-auto"
                         src="/home/paan-summit-logo.svg"
                         style="color: transparent;">
                </a>
            </div>

            <!-- Mobile menu button -->
            <div class="lg-custom:hidden flex items-center">
                <button @click="mobileMenuOpen = !mobileMenuOpen"
                        class="p-2 sm:p-3 rounded-md text-[#172840] focus:outline-none">
                    <svg class="h-5 w-5 sm:h-6 sm:w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>

            <!-- Desktop menu -->
            <div class="hidden lg-custom:flex lg-custom:items-center lg-custom:space-x-1 xl:space-x-2 w-full justify-end">
                <div class="flex space-x-1 xl:space-x-2 flex-grow justify-center md:justify-center">
                    <a href="{{ route('/') }}summit#home"
                       class="text-paan-dark-blue bg-paan-yellow px-2 sm:px-3 py-1.5 rounded-full transition-all duration-300 cursor-pointer text-xs sm:text-sm font-medium">Home</a>
                    <a href="{{ route('/') }}summit#program"
                       class="text-[#172840] hover:text-gray-900 hover:bg-[#F2B706] px-2 sm:px-3 py-1.5 rounded-full transition-all duration-300 cursor-pointer text-xs sm:text-sm">Sessions</a>
                    <a href="{{ route('/') }}summit#agenda"
                       class="text-[#172840] hover:text-gray-900 hover:bg-[#F2B706] px-2 sm:px-3 py-1.5 rounded-full transition-all duration-300 cursor-pointer text-xs sm:text-sm">Programme</a>
                    <a href="{{ route('/') }}summit#participants"
                       class="text-[#172840] hover:text-gray-900 hover:bg-[#F2B706] px-2 sm:px-3 py-1.5 rounded-full transition-all duration-300 cursor-pointer text-xs sm:text-sm">Who can attend</a>
                    <a href="{{ route('/') }}summit#speakers-section"
                       class="text-[#172840] hover:text-gray-900 hover:bg-[#F2B706] px-2 sm:px-3 py-1.5 rounded-full transition-all duration-300 cursor-pointer text-xs sm:text-sm">Speakers</a>
                    <a href="{{ route('/') }}summit#paan-awards-section"
                       class="text-[#172840] hover:text-gray-900 hover:bg-[#F2B706] px-2 sm:px-3 py-1.5 rounded-full transition-all duration-300 cursor-pointer text-xs sm:text-sm">Awards</a>
                    <a href="{{route('/') }}summit#exhibition"
                       class="text-[#172840] hover:text-gray-900 hover:bg-[#F2B706] px-2 sm:px-3 py-1.5 rounded-full transition-all duration-300 cursor-pointer text-xs sm:text-sm">Exhibit</a>
                    <a href="{{route('/') }}summit#tickets-section"
                       class="text-[#172840] hover:text-gray-900 hover:bg-[#F2B706] px-2 sm:px-3 py-1.5 rounded-full transition-all duration-300 cursor-pointer text-xs sm:text-sm">Tickets</a>
                    <a href="{{route('/') }}summit#plan-your-trip"
                       class="text-[#172840] hover:text-gray-900 hover:bg-[#F2B706] px-2 sm:px-3 py-1.5 rounded-full transition-all duration-300 cursor-pointer text-xs sm:text-sm">Plan</a>
                </div>

                <!-- Language selector -->
                <div class="relative">
                    <div id="google_translate_element"
                         style="position: absolute; height: 0px; overflow: hidden; top: -9999px; left: -9999px;"></div>
                    <div class="relative group">
                        <button class="p-2 rounded-full focus:outline-none hover:bg-sky-50 bg-white/50"
                                aria-label="Change Language">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                 aria-hidden="true" role="img" class="h-5 w-5 rounded-lg iconify iconify--flag"
                                 width="1em" height="1em" viewBox="0 0 512 512">
                                <path fill="#bd3d44" d="M0 0h512v512H0"></path>
                                <path stroke="#fff" stroke-width="40"
                                      d="M0 58h512M0 137h512M0 216h512M0 295h512M0 374h512M0 453h512"></path>
                                <path fill="#192f5d" d="M0 0h390v275H0z"></path>
                                <marker id="iconifyReact363" markerHeight="30" markerWidth="30">
                                    <path fill="#fff" d="m15 0l9.3 28.6L0 11h30L5.7 28.6"></path>
                                </marker>
                                <path fill="none" marker-mid="url(#iconifyReact363)"
                                      d="m0 0l18 11h65h65h65h65h66L51 39h65h65h65h65L18 66h65h65h65h65h66L51 94h65h65h65h65L18 121h65h65h65h65h66L51 149h65h65h65h65L18 177h65h65h65h65h66L51 205h65h65h65h65L18 232h65h65h65h65h66z"></path>
                            </svg>
                        </button>
                        <div class="absolute top-full left-1/2 -translate-x-1/2 mt-2 w-max bg-white text-xs py-2 px-3 rounded-full shadow-lg opacity-0 group-hover:opacity-100 translate-y-1 group-hover:translate-y-0 transition-all duration-200 ease-in-out text-gray-900 before:content-[''] before:absolute before:-top-1.5 before:left-1/2 before:-translate-x-1/2 before:border-4 before:border-transparent before:border-b-white">
                            Change Language
                        </div>
                    </div>
                </div>

                <!-- Register button -->
                <a href="{{ route('register') }}"
                   class="bg-paan-red text-white px-4 py-2 text-sm rounded-full hover:bg-paan-red/90 transition-all duration-300 font-medium shadow-lg flex items-center justify-center gap-2">
                    Register Now
                </a>
            </div>
        </div>

        <!-- Mobile menu -->
        <div x-show="mobileMenuOpen"
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 transform scale-95"
             x-transition:enter-end="opacity-100 transform scale-100"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 transform scale-100"
             x-transition:leave-end="opacity-0 transform scale-95"
             class="lg-custom:hidden">
            <div class="px-3 sm:px-4 pt-2 pb-3 space-y-1 bg-white rounded-none sm:rounded-lg shadow-lg border-t border-gray-200 sm:border border-gray-200">
                <!-- Language selector mobile -->
                <div class="px-3 sm:px-4 py-3 border-b border-gray-200">
                    <div class="relative">
                        <div id="google_translate_element"
                             style="position: absolute; height: 0px; overflow: hidden; top: -9999px; left: -9999px;"></div>
                        <div class="relative group">
                            <button class="p-2 rounded-full focus:outline-none hover:bg-sky-50 bg-white/50"
                                    aria-label="Change Language">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img"
                                     class="h-5 w-5 rounded-lg iconify iconify--flag" width="1em" height="1em"
                                     viewBox="0 0 512 512">
                                    <path fill="#bd3d44" d="M0 0h512v512H0"></path>
                                    <path stroke="#fff" stroke-width="40"
                                          d="M0 58h512M0 137h512M0 216h512M0 295h512M0 374h512M0 453h512"></path>
                                    <path fill="#192f5d" d="M0 0h390v275H0z"></path>
                                    <marker id="iconifyReact364" markerHeight="30" markerWidth="30">
                                        <path fill="#fff" d="m15 0l9.3 28.6L0 11h30L5.7 28.6"></path>
                                    </marker>
                                    <path fill="none" marker-mid="url(#iconifyReact364)"
                                          d="m0 0l18 11h65h65h65h65h66L51 39h65h65h65h65L18 66h65h65h65h65h66L51 94h65h65h65h65L18 121h65h65h65h65h66L51 149h65h65h65h65L18 177h65h65h65h65h66L51 205h65h65h65h65L18 232h65h65h65h65h66z"></path>
                                </svg>
                            </button>
                            <div class="absolute top-full left-1/2 -translate-x-1/2 mt-2 w-max bg-white text-xs py-2 px-3 rounded-full shadow-lg opacity-0 group-hover:opacity-100 translate-y-1 group-hover:translate-y-0 transition-all duration-200 ease-in-out text-gray-900 before:content-[''] before:absolute before:-top-1.5 before:left-1/2 before:-translate-x-1/2 before:border-4 before:border-transparent before:border-b-white">
                                Change Language
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Mobile menu links -->
                <a href="{{route('/') }}summit#home"
                   @click="mobileMenuOpen = false"
                   class="text-paan-dark-blue bg-paan-yellow block px-3 sm:px-4 py-2 sm:py-3 rounded-full transition-all duration-300 cursor-pointer text-sm sm:text-base font-medium">Home</a>
                <a href="{{route('/') }}summit#program"
                   @click="mobileMenuOpen = false"
                   class="text-[#172840] hover:text-gray-900 hover:bg-[#F2B706] block px-3 sm:px-4 py-2 sm:py-3 rounded-full transition-all duration-300 cursor-pointer text-sm sm:text-base">Sessions</a>
                <a href="{{route('/') }}summit#agenda"
                   @click="mobileMenuOpen = false"
                   class="text-[#172840] hover:text-gray-900 hover:bg-[#F2B706] block px-3 sm:px-4 py-2 sm:py-3 rounded-full transition-all duration-300 cursor-pointer text-sm sm:text-base">Programme</a>
                <a href="{{route('/') }}summit#participants"
                   @click="mobileMenuOpen = false"
                   class="text-[#172840] hover:text-gray-900 hover:bg-[#F2B706] block px-3 sm:px-4 py-2 sm:py-3 rounded-full transition-all duration-300 cursor-pointer text-sm sm:text-base">Who can attend</a>
                <a href="{{route('/') }}summit#speakers-section"
                   @click="mobileMenuOpen = false"
                   class="text-[#172840] hover:text-gray-900 hover:bg-[#F2B706] block px-3 sm:px-4 py-2 sm:py-3 rounded-full transition-all duration-300 cursor-pointer text-sm sm:text-base">Speakers</a>
                <a href="{{route('/') }}summit#paan-awards-section"
                   @click="mobileMenuOpen = false"
                   class="text-[#172840] hover:text-gray-900 hover:bg-[#F2B706] block px-3 sm:px-4 py-2 sm:py-3 rounded-full transition-all duration-300 cursor-pointer text-sm sm:text-base">Awards</a>
                <a href="{{route('/') }}summit#exhibition"
                   @click="mobileMenuOpen = false"
                   class="text-[#172840] hover:text-gray-900 hover:bg-[#F2B706] block px-3 sm:px-4 py-2 sm:py-3 rounded-full transition-all duration-300 cursor-pointer text-sm sm:text-base">Exhibit</a>
                <a href="{{route('/') }}summit#tickets-section"
                   @click="mobileMenuOpen = false"
                   class="text-[#172840] hover:text-gray-900 hover:bg-[#F2B706] block px-3 sm:px-4 py-2 sm:py-3 rounded-full transition-all duration-300 cursor-pointer text-sm sm:text-base">Tickets</a>
                <a href="{{route('/') }}summit#plan-your-trip"
                   @click="mobileMenuOpen = false"
                   class="text-[#172840] hover:text-gray-900 hover:bg-[#F2B706] block px-3 sm:px-4 py-2 sm:py-3 rounded-full transition-all duration-300 cursor-pointer text-sm sm:text-base">Plan</a>

                <!-- Register button mobile -->
                <div class="px-3 sm:px-4 py-3 mt-4">
                    <a href="{{ route('register') }}"
                       class="bg-paan-red text-white px-4 py-2 text-sm rounded-full hover:bg-paan-red/90 transition-all duration-300 font-medium shadow-lg flex items-center justify-center gap-2 w-full">
                        Register Now
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>

