<x-home-layout>
    <main class="relative">
        @include('layout/partials/_summit-nav')
        <div class="relative w-full section-visible" id="home" style="height: 90vh">
            <div class="absolute inset-0 bg-cover bg-center"
                 style="background-image:url('{{ asset('assets/media/images/landing.webp') }}');
                 filter:brightness(0.9)"></div>
            <x-kicp.home-banner />
        </div>
        <x-kicp.count-down />

        <div id="about-us">
            <x-kicp.about-us />
        </div>
        <div class="bg-white relative py-12 sm:py-16 md:py-20 section-visible" id="objectives">
            <x-kicp.summit-objectives/>
        </div>
        <div class="mt-6 sm:mt-10 bg-gradient-to-br from-[#175C93] to-[#7BC7F0] relative overflow-hidden" id="at-a-glance">
            <div class="absolute inset-0 z-0 opacity-30"
                 style="background-image:url('https://ik.imagekit.io/nkmvdjnna/PAAN/summit/at-a-glance.png');background-size:cover;background-position:center;background-repeat:no-repeat"></div>
            <x-kicp.at-a-glance />
        </div>
        <div class="bg-white relative overflow-hidden section-visible" id="tracks-section">
            <x-kicp.tracks />
        </div>
        <div class="bg-[#F3F9FB] py-12 sm:py-16 md:py-20" id="programme-section">
            <x-kicp.programme />
        </div>

        <div class="bg-white relative py-12 sm:py-16 md:py-20" id="speakers-section">
            <x-kicp.speakers />
        </div>
        <div class="bg-[#DAECF3] relative py-12 sm:py-16 md:py-20" id="participants">
            <x-kicp.participants />
        </div>
        <div class="relative py-12 sm:py-16 md:py-20 overflow-hidden" id="sessions-section">
            <div class="absolute inset-0 z-0"
                 style="background:linear-gradient(to bottom right, #172840, #F25849)"></div>
            <div class="absolute inset-0 z-[1]"
                 style="background-image:url('https://ik.imagekit.io/nkmvdjnna/PAAN/summit/beyond-session-pattern.webp?updatedAt=1765954397048');background-repeat:repeat;background-position:center;background-size:cover;opacity:0.3"></div>
            <x-kicp.sessions />
        </div>
        <div class="flex flex-col sm:flex-row justify-center items-center mb-6 sm:mb-8 gap-4 py-20">
            <x-kicp.conference-tickets />
        </div>

        <div class="bg-[#D1D3D4] relative py-12 sm:py-16 md:py-20">
            <x-kicp.sponsors />
        </div>
        <div class="bg-white relative py-12 sm:py-16 md:py-20" id="faqs-section">
            <x-kicp.faqs />
        </div>
        @include('layout.partials.summit-footer')
    </main>


@push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
        /**
         * Speakers Carousel Functionality
         * Shows 3 speakers per view on desktop, responsive on mobile
         */
        (function () {
            const track = document.getElementById('speakers-carousel-track');
            const prevBtn = document.getElementById('speakers-prev');
            const nextBtn = document.getElementById('speakers-next');
            const nav = '';

            if (!track || !prevBtn || !nextBtn) {
                console.warn('Speakers carousel elements not found');
                return;
            }

            const container = track.parentElement;
            let currentIndex = 0;
            let itemsPerView = 1;

            function updateItemsPerView() {
                const width = window.innerWidth;
                if (width >= 1024) {
                    itemsPerView = 3;
                } else if (width >= 640) {
                    itemsPerView = 2;
                } else {
                    itemsPerView = 1;
                }
                currentIndex = Math.min(currentIndex, Math.max(0, track.children.length - itemsPerView));
                moveToCurrentIndex();
            }

            function moveToCurrentIndex() {
                const card = track.children[currentIndex];
                if (!card) return;
                const offset = card.offsetLeft - track.offsetLeft;
                track.style.transform = `translateX(-${offset}px)`;
            }

            window.addEventListener('resize', updateItemsPerView);

            prevBtn.addEventListener('click', () => {
                currentIndex = Math.max(0, currentIndex - 1);
                moveToCurrentIndex();
            });

            nextBtn.addEventListener('click', () => {
                const lastStartIndex = Math.max(0, track.children.length - itemsPerView);
                currentIndex = Math.min(lastStartIndex, currentIndex + 1);
                moveToCurrentIndex();
            });

            updateItemsPerView();
        })();

        document.addEventListener('alpine:init', () => {
            Alpine.data('scrollHandler', () => ({
                scrollTo(selector) {
                    const target = document.querySelector(selector)
                    if (!target) return

                    window.scrollTo({
                        top: target.offsetTop,
                        behavior: 'smooth'
                    })
                }
            }))
        });

        // aos animation
        document.addEventListener('DOMContentLoaded', () => {
            AOS.init({
                disable: () => window.innerWidth < 640,
                startEvent: 'DOMContentLoaded',
                duration: 1000,
                once: false,
            });
        });


    </script>
@endpush

</x-home-layout>
