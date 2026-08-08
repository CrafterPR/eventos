<footer class="text-white relative"
        style="background-image:url(https://ik.imagekit.io/nkmvdjnna/PAAN/summit/summit-footer-pattern.webp), linear-gradient(to right, #84C1D9, #172840);background-repeat:repeat, no-repeat;background-position:center, center;background-size:auto, cover">
    <div class="relative z-10">

        <div class="border-t border-white/20">
            <div class="max-w-6xl mx-auto px-6 py-6">
                <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                    <div class="flex items-center gap-2"><span class="text-white/80 text-sm">© 2026 KICP Conference.
                            All rights reserved.</span>
                    </div>
                    <div class="text-white/80 flex items-center gap-2 text-sm">Powered by
                        <span class="text-red-500"><a href="http://www.craftedpr.co.ke"
                                                                class="hover:text-white/80
                        transition-colors">Crafted PR</a></span>
                    </div>
                    <div class="flex gap-6 text-sm"><a href="/privacy-policy"
                                                       class="text-white/80 hover:text-red-500 transition-colors">Privacy
                            Policy</a><a href="/terms-and-conditions"
                                         class="text-white/80 hover:text-red-500 transition-colors">Terms of
                            Service</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>
    /**
     * Initialize and manage the event countdown timer
     * Event Date: April 21, 2026 (Summit-Registration)
     */

    let countdownTimerInterval;

    function initializeCountdownTimer() {
        // Event target date - April 21, 2026, 00:00:00 (UTC+3 Nairobi Time)
        const eventDate = new Date('2026-10-26T00:00:00+03:00').getTime();
        // Get countdown display elements
        const daysElement = document.getElementById('countdown-days');
        const hoursElement = document.getElementById('countdown-hours');
        const minutesElement = document.getElementById('countdown-minutes');
        const secondsElement = document.getElementById('countdown-seconds');


        // Verify elements exist before proceeding
        if (!daysElement || !hoursElement || !minutesElement || !secondsElement) {
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
                window.countdownInitialLogged = true;
            }

            // Handle countdown completion
            if (distance < 0) {
                clearInterval(countdownTimerInterval);
                daysElement.textContent = '00';
                hoursElement.textContent = '00';
                minutesElement.textContent = '00';
                secondsElement.textContent = '00';
            }
        }

        // Initial update (prevents 1-second delay)
        updateCountdown();

        // Update countdown every second
        countdownTimerInterval = setInterval(updateCountdown, 1000);

        // Store interval ID for cleanup if needed
        window.countdownTimerInterval = countdownTimerInterval;
    }

    // Initialize countdown timer immediately when DOM is ready
    function startCountdown() {
        const daysElement = document.getElementById('countdown-days');
        if (daysElement) {
            initializeCountdownTimer();
        } else {
            setTimeout(startCountdown, 100);
        }
    }

    // Check DOM state and start countdown
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', startCountdown);
    } else {
        startCountdown();
    }

    // Fallback: also try on window load
    window.addEventListener('load', function() {
        if (!window.countdownInitialLogged) {
            startCountdown();
        }
    });
</script>
</footer>
