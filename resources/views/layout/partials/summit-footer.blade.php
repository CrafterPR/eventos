<footer class="text-white relative"
        style="background-image:url(https://ik.imagekit.io/nkmvdjnna/PAAN/summit/summit-footer-pattern.webp), linear-gradient(to right, #84C1D9, #172840);background-repeat:repeat, no-repeat;background-position:center, center;background-size:auto, cover">
    <div class="relative z-10">

        <div class="border-t border-white/20">
            <div class="max-w-6xl mx-auto px-6 py-6">
                <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                    <div class="flex items-center gap-2"><span class="text-white/80 text-sm">© 2026 Pan African Agency Network. All rights reserved.</span>
                    </div>
                    <div class="flex gap-6 text-sm"><a href="/privacy-policy"
                                                       class="text-white/80 hover:text-red-500 transition-colors">Privacy
                            Policy</a><a href="/terms-and-conditions"
                                         class="text-white/80 hover:text-red-500 transition-colors">Terms of
                            Service</a></div>
                </div>
            </div>
        </div>
    </div>

<script>
    /**
     * Initialize and manage the event countdown timer
     * Event Date: April 21, 2026 (Summit-Registration)
     */
    console.log('✅ Countdown timer script loaded!');

    let countdownTimerInterval;

    function initializeCountdownTimer() {
        console.log('🚀 Initializing countdown timer...');

        // Event target date - April 21, 2026, 00:00:00 (UTC+3 Nairobi Time)
        const eventDate = new Date('2026-09-14T00:00:00+03:00').getTime();
        console.log('📅 Event Date (timestamp):', eventDate);
        console.log('📅 Event Date (readable):', new Date(eventDate).toString());

        // Get countdown display elements
        const daysElement = document.getElementById('countdown-days');
        const hoursElement = document.getElementById('countdown-hours');
        const minutesElement = document.getElementById('countdown-minutes');
        const secondsElement = document.getElementById('countdown-seconds');

        // Debug: Log what we found
        console.log('🔍 DOM Elements Found:');
        console.log('  - countdown-days:', daysElement ? '✅ Found' : '❌ Not found');
        console.log('  - countdown-hours:', hoursElement ? '✅ Found' : '❌ Not found');
        console.log('  - countdown-minutes:', minutesElement ? '✅ Found' : '❌ Not found');
        console.log('  - countdown-seconds:', secondsElement ? '✅ Found' : '❌ Not found');

        // Verify elements exist before proceeding
        if (!daysElement || !hoursElement || !minutesElement || !secondsElement) {
            console.error('❌ Countdown timer elements not found on page');
            return;
        }

        /**
         * Update countdown display with calculated remaining time
         */
        function updateCountdown() {
            const now = new Date().getTime();
            const distance = eventDate - now;

            // Calculate time units
            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Update DOM elements with zero-padded values
            daysElement.textContent = String(days).padStart(2, '0');
            hoursElement.textContent = String(hours).padStart(2, '0');
            minutesElement.textContent = String(minutes).padStart(2, '0');
            secondsElement.textContent = String(seconds).padStart(2, '0');

            // Log first update only to avoid console spam
            if (days > -1 && !window.countdownInitialLogged) {
                console.log(`⏱️ Countdown Updated: ${days}d ${hours}h ${minutes}m ${seconds}s remaining`);
                window.countdownInitialLogged = true;
            }

            // Handle countdown completion
            if (distance < 0) {
                clearInterval(countdownTimerInterval);
                daysElement.textContent = '00';
                hoursElement.textContent = '00';
                minutesElement.textContent = '00';
                secondsElement.textContent = '00';
                console.log('✅ Countdown timer completed - Event has started!');
            }
        }

        // Initial update (prevents 1-second delay)
        console.log('🎯 Running initial countdown update...');
        updateCountdown();

        // Update countdown every second
        countdownTimerInterval = setInterval(updateCountdown, 1000);
        console.log('✅ Countdown timer started - Updates every 1 second');

        // Store interval ID for cleanup if needed
        window.countdownTimerInterval = countdownTimerInterval;
    }

    // Initialize countdown timer immediately when DOM is ready
    function startCountdown() {
        const daysElement = document.getElementById('countdown-days');
        if (daysElement) {
            console.log('✨ DOM elements are ready, initializing countdown...');
            initializeCountdownTimer();
        } else {
            console.log('⏳ Waiting for DOM elements...');
            setTimeout(startCountdown, 100);
        }
    }

    // Check DOM state and start countdown
    if (document.readyState === 'loading') {
        console.log('📄 DOM still loading, waiting for DOMContentLoaded event...');
        document.addEventListener('DOMContentLoaded', startCountdown);
    } else {
        console.log('📄 DOM already loaded, initializing countdown immediately...');
        startCountdown();
    }

    // Fallback: also try on window load
    window.addEventListener('load', function() {
        if (!window.countdownInitialLogged) {
            console.log('🔄 Window load event fired - attempting initialization as fallback...');
            startCountdown();
        }
    });
</script>
</footer>
