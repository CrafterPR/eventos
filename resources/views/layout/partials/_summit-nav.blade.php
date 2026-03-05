<nav
    class="w-full z-20 transition-all duration-300 left-1/2 transform -translate-x-1/2 bg-white rounded-none sm:rounded-lg mx-0 sm:mx-4 mt-0 sm:mt-4 shadow-md max-w-none sm:max-w-7xl"
    id="floating-nav"
    style="position: fixed; top: 1px;">
    <div class="w-full px-3 sm:px-4 md:px-6 lg:px-8">
        <div class="flex items-center justify-between py-2 sm:py-3">
            <div class="flex-shrink-0">
                <a href="/"><img alt="Logo" loading="lazy" width="200" height="70" decoding="async"
                                 data-nimg="1" class="w-20 sm:w-24 md:w-28 lg:w-32 xl:w-36 h-auto"
                                 style="color:transparent"
                                 src="{{ asset('assets/media/images/paan-summit-logo.svg') }}"></a>
            </div>
            <div class="lg-custom:hidden flex items-center">
                <button id="mobile-menu-toggle" class="p-2 sm:p-3 rounded-md text-[#172840] focus:outline-none">
                    <svg class="h-5 w-5 sm:h-6 sm:w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
            <div
                class="hidden lg-custom:flex lg-custom:items-center lg-custom:space-x-1 xl:space-x-2 w-full justify-end">
                <div class="flex space-x-1 xl:space-x-2 flex-grow justify-center md:justify-center">
                    <a href="{{ route('/') }}"
                        class="text-slate-800 bg-yellow-500 px-2 sm:px-3 py-1.5 rounded-full transition-all duration-300 cursor-pointer text-xs sm:text-sm font-medium">Home</a>
                    <a
                        href="@if(request()->routeIs('register')) {{ route('/') }}#program @else #program @endif"
                        class="text-[#172840] hover:text-gray-900 hover:bg-[#F2B706] px-2 sm:px-3 py-1.5 rounded-full transition-all duration-300 cursor-pointer text-xs sm:text-sm">
                        Sessions
                    </a>
                    <a href="@if(request()->routeIs('register')) {{ route('/') }}#agenda @else #agenda @endif"
                       class="text-[#172840] hover:text-gray-900 hover:bg-[#F2B706] px-2 sm:px-3 py-1.5 rounded-full transition-all duration-300 cursor-pointer text-xs sm:text-sm">Programme</a>
                    <a
                        href="@if(request()->routeIs('register')) {{ route('/') }}#participants @else #participants @endif"
                        class="text-[#172840] hover:text-gray-900 hover:bg-[#F2B706] px-2 sm:px-3 py-1.5 rounded-full transition-all duration-300 cursor-pointer text-xs sm:text-sm">Who
                        can attend</a>
                    <a
                        href="@if(request()->routeIs('register')) {{ route('/') }}#speakers-section @else #speakers-section @endif"
                        class="text-[#172840] hover:text-gray-900 hover:bg-[#F2B706] px-2 sm:px-3 py-1.5 rounded-full transition-all duration-300 cursor-pointer text-xs sm:text-sm">Speakers</a>
                    <a
                        href="@if(request()->routeIs('register')) {{ route('/') }}#paan-awards-section @else #paan-awards-section @endif"
                        class="text-[#172840] hover:text-gray-900 hover:bg-[#F2B706] px-2 sm:px-3 py-1.5 rounded-full transition-all duration-300 cursor-pointer text-xs sm:text-sm">Awards</a>
                    <a href="@if(request()->routeIs('register')) {{ route('/') }}#exhibition @else #exhibition @endif"
                       class="text-[#172840] hover:text-gray-900 hover:bg-[#F2B706] px-2 sm:px-3 py-1.5 rounded-full transition-all duration-300 cursor-pointer text-xs sm:text-sm">Exhibit</a>
                    <a
                        href="@if(request()->routeIs('register')) {{ route('/') }}#tickets-section @else #tickets-section @endif"
                        class="text-[#172840] hover:text-gray-900 hover:bg-[#F2B706] px-2 sm:px-3 py-1.5 rounded-full transition-all duration-300 cursor-pointer text-xs sm:text-sm">Tickets</a>
                    <a
                        href="@if(request()->routeIs('register')) {{ route('/') }}#plan-your-trip @else #plan-your-trip @endif"
                        class="text-[#172840] hover:text-gray-900 hover:bg-[#F2B706] px-2 sm:px-3 py-1.5 rounded-full transition-all duration-300 cursor-pointer text-xs sm:text-sm">Plan</a>
                </div>
                
                @if(request()->routeIs('register'))
                <a href="#contact-info-step"
                    class="bg-red-500 text-white px-4 py-2 text-sm rounded-full hover:bg-red-500/90 transition-all duration-300 font-medium shadow-lg flex items-center justify-center gap-2">
                    Register Now
                </a>
                @else
                    <a href="{{ route('register') }}"
                       class="bg-red-500 text-white px-4 py-2 text-sm rounded-full hover:bg-red-500/90 transition-all duration-300 font-medium shadow-lg flex items-center justify-center gap-2">
                        Register Now
                    </a>
                @endif
            </div>
        </div>
        <div id="mobile-menu" class="hidden lg-custom:hidden">
            <div
                class="px-3 sm:px-4 pt-2 pb-3 space-y-1 bg-white rounded-none sm:rounded-lg shadow-lg border-t border-gray-200 sm:border border-gray-200">
                <div class="px-3 sm:px-4 py-3 border-b border-gray-200">
                    <div class="relative">
                        <div id="google_translate_element"
                             style="position:absolute;height:0;overflow:hidden;top:-9999px;left:-9999px"></div>
                        <div class="relative group">
                            <button class="p-2 rounded-full focus:outline-none hover:bg-sky-50 bg-white/50"
                                    aria-label="Change Language">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img"
                                     class="h-5 w-5 rounded-lg  iconify iconify--flag" width="1em" height="1em"
                                     viewBox="0 0 512 512">
                                    <path fill="#bd3d44" d="M0 0h512v512H0"></path>
                                    <path stroke="#fff" stroke-width="40"
                                          d="M0 58h512M0 137h512M0 216h512M0 295h512M0 374h512M0 453h512"></path>
                                    <path fill="#192f5d" d="M0 0h390v275H0z"></path>
                                    <marker id="iconifyReact66" markerHeight="30" markerWidth="30">
                                        <path fill="#fff" d="m15 0l9.3 28.6L0 11h30L5.7 28.6"></path>
                                    </marker>
                                    <path fill="none" marker-mid="url(#iconifyReact66)"
                                          d="m0 0l18 11h65h65h65h65h66L51 39h65h65h65h65L18 66h65h65h65h65h66L51 94h65h65h65h65L18 121h65h65h65h65h66L51 149h65h65h65h65L18 177h65h65h65h65h66L51 205h65h65h65h65L18 232h65h65h65h65h66z"></path>
                                </svg>
                            </button>
                            <div class="
      absolute top-full left-1/2 -translate-x-1/2 mt-2 w-max
      bg-white text-xs py-2 px-3 rounded-full shadow-lg
      opacity-0 group-hover:opacity-100 translate-y-1 group-hover:translate-y-0
      transition-all duration-200 ease-in-out
      text-gray-900
      before:content-[''] before:absolute before:-top-1.5 before:left-1/2
      before:-translate-x-1/2 before:border-4 before:border-transparent before:border-b-white
    ">Change Language
                            </div>
                        </div>
                    </div>
                </div>
                <a href="#home"
                   class="text-slate-800 bg-yellow-500 block px-3 sm:px-4 py-2 sm:py-3 rounded-full transition-all duration-300 cursor-pointer text-sm sm:text-base font-medium">Home</a><a
                    href="#program"
                    class="text-[#172840] hover:text-gray-900 hover:bg-[#F2B706] block px-3 sm:px-4 py-2 sm:py-3 rounded-full transition-all duration-300 cursor-pointer text-sm sm:text-base">Sessions</a>
                <a href="#agenda"
                   class="text-[#172840] hover:text-gray-900 hover:bg-[#F2B706] block px-3 sm:px-4 py-2 sm:py-3 rounded-full transition-all duration-300 cursor-pointer text-sm sm:text-base">Programme</a><a
                    href="#participants"
                    class="text-[#172840] hover:text-gray-900 hover:bg-[#F2B706] block px-3 sm:px-4 py-2 sm:py-3 rounded-full transition-all duration-300 cursor-pointer text-sm sm:text-base">Who
                    can attend</a><a href="#speakers-section"
                                     class="text-[#172840] hover:text-gray-900 hover:bg-[#F2B706] block px-3 sm:px-4 py-2 sm:py-3 rounded-full transition-all duration-300 cursor-pointer text-sm sm:text-base">Speakers</a>
                <a
                    href="#paan-awards-section"
                    class="text-[#172840] hover:text-gray-900 hover:bg-[#F2B706] block px-3 sm:px-4 py-2 sm:py-3 rounded-full transition-all duration-300 cursor-pointer text-sm sm:text-base">Awards</a>
                <a href="#exhibition"
                   class="text-[#172840] hover:text-gray-900 hover:bg-[#F2B706] block px-3 sm:px-4 py-2 sm:py-3 rounded-full transition-all duration-300 cursor-pointer text-sm sm:text-base">Exhibit</a><a
                    href="#tickets-section"
                    class="text-[#172840] hover:text-gray-900 hover:bg-[#F2B706] block px-3 sm:px-4 py-2 sm:py-3 rounded-full transition-all duration-300 cursor-pointer text-sm sm:text-base">Tickets</a><a
                    href="#plan-your-trip"
                    class="text-[#172840] hover:text-gray-900 hover:bg-[#F2B706] block px-3 sm:px-4 py-2 sm:py-3 rounded-full transition-all duration-300 cursor-pointer text-sm sm:text-base">Plan</a>
                <div class="px-3 sm:px-4 py-3 mt-4">
                    <a href="{{ route('register') }}"
                        class="bg-red-500 text-white px-4 py-2 text-sm rounded-full hover:bg-red-500/90 transition-all duration-300 font-medium shadow-lg flex items-center justify-center gap-2 w-full">
                        Register Now
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>

<script>
    /**
     * Floating Navigation Bar
     * Makes the navbar float at the top of the viewport as user scrolls
     */
    (function() {
        const nav = document.getElementById('floating-nav');
        if (!nav) return;

        // Keep navbar fixed at top with smooth transitions
        window.addEventListener('scroll', () => {
            // The navbar stays at top: 5px regardless of scroll position
            // CSS already has position: fixed; top: 5px;
            // This is just for any additional smooth effects if needed
        });

        // Handle window resize to ensure navbar stays properly positioned
        window.addEventListener('resize', () => {
            // Navbar maintains its position relative to viewport
            // No adjustment needed as it's fixed positioned
        });
    })();

    /**
     * Mobile Hamburger Menu Toggle
     * Opens and closes the mobile navigation menu
     */
    (function() {
        const toggleBtn = document.getElementById('mobile-menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');

        if (!toggleBtn || !mobileMenu) {
            console.warn('Mobile menu elements not found');
            return;
        }

        // Toggle menu visibility on button click
        toggleBtn.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            mobileMenu.classList.toggle('hidden');
            console.log('Mobile menu toggled. Menu is now:', mobileMenu.classList.contains('hidden') ? 'hidden' : 'visible');
        });

        // Close menu when clicking on any mobile menu link
        const menuLinks = mobileMenu.querySelectorAll('a');
        menuLinks.forEach(link => {
            link.addEventListener('click', function() {
                mobileMenu.classList.add('hidden');
                console.log('Mobile menu closed via link click');
            });
        });

        // Close menu when clicking outside
        document.addEventListener('click', function(e) {
            if (!nav.contains(e.target)) {
                mobileMenu.classList.add('hidden');
            }
        });

        console.log('✅ Mobile hamburger menu initialized');
    })();
</script>
