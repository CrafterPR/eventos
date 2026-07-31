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
            <div class="w-full h-full overflow-hidden rounded-xl">
                <video
                    class="w-full h-full object-cover"
                    autoplay
                    muted
                    loop
                    playsinline
                    preload="auto"
                >
                    <source src="{{ asset('assets/media/videos/about-kicp2.mp4') }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
            <div
                class="absolute bottom-0 left-0 right-0 p-4 sm:p-6 group-hover:bg-white transition-all duration-300 rounded-t-xl flex flex-col">
                <div class="flex-1"></div>
                <div>
                    <h4 class="text-lg sm:text-xl font-bold text-white group-hover:text-slate-800 transition-colors duration-300">
                        Inaugural Kasneb International Conference for Professionals (KICP)</h4>
                    <p class="hidden group-hover:block transition-all duration-300 text-slate-800 text-xs sm:text-sm leading-relaxed mt-2">
                        See how professionals, innovators and industry leaders came together to exchange ideas, spark innovation,
                        and shape the future of professional excellence. This is more than a conference it's where the future begins.</p>
                </div>
            </div>
        </div>
    </div>
</section>
