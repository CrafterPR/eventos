<x-home-layout>
    <main class="relative">
    @include('layout/partials/_summit-nav')

        <div style="opacity: 1;">
            <div class="relative h-screen w-full bg-gray-900 overflow-visible" id="home">
                <div class="absolute inset-0 w-full h-full bg-cover bg-center bg-no-repeat" style="background-image:url('{{ asset('assets/media/images/hero.webp') }}')"></div>
                <div class="absolute inset-0 bg-black bg-opacity-50"></div>
                <div class="relative h-full flex mx-auto max-w-6xl">
                    <div class="w-full px-4 sm:px-6 md:px-8 pb-0 sm:pb-24 flex flex-col justify-center sm:justify-end h-full">
                        <div class="max-w-2xl text-left space-y-4 sm:space-y-6">
                            <h1 class="text-4xl text-white font-bold uppercase">Borderless Creativity.<br> One Africa. Global Impact.</h1>
                            <p class="text-white text-base sm:text-lg mb-6 font-light w-full leading-relaxed">The Pan-African Agency Network (PAAN) is a collaborative ecosystem bringing together agencies, freelancers, clients, and partners across Africa. We exist to transform a fragmented industry into a united creative force capable
                                of shaping global markets.</p>
                            <div class="flex gap-4">
                                <button class="bg-red-500 border border-red-500 text-white py-3 px-8 sm:px-10 rounded-full hover:bg-orange-600 transition-all duration-300 transform ease-in-out hover:translate-y-[-5px] font-medium text-sm w-full sm:w-auto">Join the Network</button>
                                <button class="bg-[#84c1d9] border border-[#84c1d9] text-[#172840] py-3 px-8 sm:px-10 rounded-full hover:bg-[#172840] hover:text-white hover:border-[#172840] transition-all duration-300 transform ease-in-out hover:translate-y-[-5px] font-medium text-sm w-full sm:w-auto">See the challenge</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-[#E6F3F7] relative">
            <section class="relative text-center mx-auto max-w-6xl py-12 sm:py-16 md:py-20 px-4 sm:px-6">
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 sm:gap-6">
                    <div class="bg-white rounded-lg shadow-lg p-3 sm:p-4 flex flex-col items-center justify-center text-center">
                        <div class="mb-3">
                            <div class="flex items-center justify-center w-10 h-10 sm:w-12 sm:h-12">
                                <img src="{{ asset('assets/media/images/book.svg') }}" alt="Book Icon" class="w-8 h-8 sm:w-10 sm:h-10">
                            </div>
                        </div>
                        <h4 class="text-2xl sm:text-3xl md:text-4xl font-bold">200+</h4>
                        <h5 class="text-sm sm:text-base font-normal">Independent Agencies</h5>
                    </div>
                    <div class="bg-white rounded-lg shadow-lg p-3 sm:p-4 flex flex-col items-center justify-center text-center">
                        <div class="mb-3">
                            <div class="flex -space-x-1">
                                <div class="w-6 h-6 sm:w-7 sm:h-7 rounded-full border-2 border-white flex items-center justify-center overflow-hidden shadow-sm">
                                    <img src="{{ asset('assets/media/images/ke.png') }}" alt="Kenya" class="w-full h-full object-cover">
                                </div>
                                <div class="w-6 h-6 sm:w-7 sm:h-7 rounded-full border-2 border-white flex items-center justify-center overflow-hidden shadow-sm">
                                    <img src="{{ asset('assets/media/images/ng.png') }}" alt="Nigeria" class="w-full h-full object-cover">
                                </div>
                                <div class="w-6 h-6 sm:w-7 sm:h-7 rounded-full border-2 border-white flex items-center justify-center overflow-hidden shadow-sm">
                                    <img src="{{ asset('assets/media/images/za.png') }}" alt="South Africa" class="w-full h-full object-cover">
                                </div>
                                <div class="w-6 h-6 sm:w-7 sm:h-7 rounded-full border-2 border-white flex items-center justify-center overflow-hidden shadow-sm">
                                    <img src="{{ asset('assets/media/images/tz.png') }}" alt="Tanzania" class="w-full h-full object-cover">
                                </div>
                                <div class="w-6 h-6 sm:w-7 sm:h-7 rounded-full border-2 border-white flex items-center justify-center overflow-hidden shadow-sm">
                                    <img src="{{ asset('assets/media/images/ug.png') }}" alt="Uganda" class="w-full h-full object-cover">
                                </div>
                                <div class="w-6 h-6 sm:w-7 sm:h-7 rounded-full border-2 border-white flex items-center justify-center overflow-hidden shadow-sm">
                                    <img src="{{ asset('assets/media/images/gh.png') }}" alt="Ghana" class="w-full h-full object-cover">
                                </div>
                            </div>
                        </div>
                        <h4 class="text-2xl sm:text-3xl md:text-4xl font-bold">20+</h4>
                        <h5 class="text-sm sm:text-base font-normal">Countries</h5>
                    </div>
                    <div class="bg-white rounded-lg shadow-lg p-3 sm:p-4 flex flex-col items-center justify-center text-center">
                        <div class="mb-3">
                            <div class="flex items-center justify-center w-28">
                                <img src="{{ asset('assets/media/images/users.png') }}" alt="Users Icon" class="w-auto h-auto">
                            </div>
                        </div>
                        <h4 class="text-2xl sm:text-3xl md:text-4xl font-bold">2,000+</h4>
                        <h5 class="text-sm sm:text-base font-normal">Freelancers</h5>
                    </div>
                    <div class="bg-white rounded-lg shadow-lg p-3 sm:p-4 flex flex-col items-center justify-center text-center">
                        <div class="mb-3">
                            <div class="flex items-center justify-center w-10 h-10 sm:w-12 sm:h-12">
                                <img src="{{ asset('assets/media/images/infinite.png') }}" alt="Infinite Icon" class="w-8 h-8 sm:w-10 sm:h-10">
                            </div>
                        </div>
                        <h5 class="text-sm sm:text-base font-normal">Collaboration Potential</h5>
                    </div>
                </div>
            </section>
        </div>
        <div class="bg-[#172840] py-20 text-white">
            <div class="mx-auto max-w-6xl px-6">
                <section class="relative z-10 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    <div class="flex flex-col gap-8">
                        <div class="space-y-4">
                            <h3 class="font-semibold text-3xl lg:text-4xl text-white leading-tight">The Challenge We're Solving</h3>
                            <p class="text-white/90 text-lg leading-relaxed">Africa has over 30,000 agencies and millions of freelancers. Yet many operate in isolation, with minimal cross-border collaboration. The result? A continent overflowing with creativity but underrepresented on the global stage.</p>
                        </div>
                        <div class="space-y-6">
                            <div class="flex items-center gap-4 p-4 rounded-lg bg-white/5 backdrop-blur-sm border border-white/10 transform transition-all duration-300 hover:translate-y-[-2px] hover:bg-white/10">
                                <div class="flex-shrink-0">
                                    <img alt="Pan-African Reach" class="w-12 h-12" src="{{ asset('assets/media/images/pan-african-reach.svg') }}">
                                </div>
                                <p class="text-lg font-medium text-white">Agencies Compete in Silos</p>
                            </div>
                            <div class="flex items-center gap-4 p-4 rounded-lg bg-white/5 backdrop-blur-sm border border-white/10 transform transition-all duration-300 hover:translate-y-[-2px] hover:bg-white/10">
                                <div class="flex-shrink-0">
                                    <img alt="Strategic Collaboration" class="w-12 h-12" src="{{ asset('assets/media/images/strategic-collaboration.svg') }}">
                                </div>
                                <p class="text-lg font-medium text-white">Freelancers Hustle Alone</p>
                            </div>
                            <div class="flex items-center gap-4 p-4 rounded-lg bg-white/5 backdrop-blur-sm border border-white/10 transform transition-all duration-300 hover:translate-y-[-2px] hover:bg-white/10">
                                <div class="flex-shrink-0">
                                    <img alt="Innovation-Driven" class="w-12 h-12" src="{{ asset('assets/media/images/innovation-driven.svg') }}">
                                </div>
                                <p class="text-lg font-medium text-white">Knowledge-Sharing is Limited</p>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-center lg:justify-end">
                        <div class="relative">
                            <div class="absolute transform scale-105"></div>
                            <img alt="Pan-African Creative Challenges" class="relative w-full max-w-md lg:max-w-lg h-auto object-cover" style="color:transparent" src="{{ asset('assets/media/images/challenges-image.webp') }}">
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <div class="relative py-20" id="stats-section">
            <div class="absolute inset-0">
                <video autoplay="" loop="" muted="" playsinline="" class="w-full h-full object-cover opacity-30">
                    <source src="{{ asset('assets/media/images/2.webm') }}" type="video/webm"></video>
            </div>
            <div class="absolute inset-0 opacity-10">
                <img src="{{ asset('assets/media/images/clip-art.png') }}" alt="Background clip art" class="w-full h-full object-cover">
            </div>
            <div class="absolute inset-0 bg-[#f2b706] opacity-[20%]"></div>
            <section class="relative mx-auto max-w-6xl flex items-center justify-center min-h-[400px]">
                <div class="text-center">
                    <div class="flex flex-col gap-2">
                        <h3 class="text-4xl font-bold">Our Vision</h3>
                        <p class="text-xl font-normal">A borderless African creative economy where ideas and talent flow freely, agencies and freelancers collaborate seamlessly, and Africa exports world-class work to the globe. PAAN is building the infrastructure, relationships, and
                            platforms to make this a reality.</p>
                    </div>
                </div>
            </section>
        </div>
        <div class="bg-white relative mt-10 py-20">
            <section class="relative mx-auto max-w-6xl">
                <div class="text-left mb-12 space-y-4">
                    <h3 class="text-3xl text-[#172840] font-bold uppercase">Our Ecosystem</h3>
                    <p class="text-xl font-normal text-[#172840] mb-4">We connect the dots across Africa's creative economy.</p>
                </div>
                <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
                    <div class="rounded-xl shadow-xl overflow-hidden relative h-80 bg-cover bg-center" style="background-image:url('{{ asset('assets/media/images/agencies.webp') }}')">
                        <div class="absolute inset-0 bg-[#172840]/40"></div>
                        <div class="absolute bottom-0 mb-2 left-0 right-0 p-6 text-left">
                            <h4 class="text-xl font-bold text-white mb-2">Agencies</h4>
                            <p class="text-white mb-4">200+ firms in marketing, PR, design, digital &amp; more.</p>
                        </div>
                        <div class="absolute bottom-0 left-0 right-0 w-full h-[20px] sm:h-[30px] md:h-[40px]">
                            <img alt="" class="w-full h-full object-cover" src="{{ asset('assets/media/images/footer-pattern.svg') }}">
                        </div>
                    </div>
                    <div class="rounded-xl shadow-xl overflow-hidden relative h-80 bg-cover bg-center" style="background-image:url('{{ asset('assets/media/images/freelancers.webp') }}')">
                        <div class="absolute inset-0 bg-[#172840]/40"></div>
                        <div class="absolute bottom-0  mb-2 left-0 right-0 p-6 text-left">
                            <h4 class="text-xl font-bold text-white mb-2">Freelancers</h4>
                            <p class="text-white mb-4">Millions of creatives empowered through collaboration.</p>
                        </div>
                        <div class="absolute bottom-0 left-0 right-0 w-full h-[20px] sm:h-[30px] md:h-[40px]">
                            <img alt="" class="w-full h-full object-cover" style="color:transparent" src="{{ asset('assets/media/images/footer-pattern.svg') }}">
                        </div>
                    </div>
                    <div class="rounded-xl shadow-xl overflow-hidden relative h-80 bg-cover bg-center" style="background-image:url('{{ asset('assets/media/images/clients.webp')}}')">
                        <div class="absolute inset-0 bg-[#172840]/40"></div>
                        <div class="absolute bottom-0 mb-2 left-0 right-0 p-6 text-left">
                            <h4 class="text-xl font-bold text-white mb-2">Clients</h4>
                            <p class="text-white mb-4">Trusted, scalable solutions across markets.</p>
                        </div>
                        <div class="absolute bottom-0 left-0 right-0 w-full h-[20px] sm:h-[30px] md:h-[40px]">
                            <img alt="" class="w-full h-full object-cover" style="color:transparent" src="{{ asset('assets/media/images/footer-pattern.svg') }}">
                        </div>
                    </div>
                    <div class="rounded-xl shadow-xl overflow-hidden relative h-80 bg-cover bg-center" style="background-image:url('{{ asset('assets/media/images/partners.webp') }}')">
                        <div class="absolute inset-0 bg-[#172840]/40"></div>
                        <div class="absolute bottom-0 mb-2 left-0 right-0 p-6 text-left">
                            <h4 class="text-xl font-bold text-white mb-2">Partners</h4>
                            <p class="text-white mb-4">Tech, education &amp; innovation enablers strengthening the landscape.</p>
                        </div>
                        <div class="absolute bottom-0 left-0 right-0 w-full h-[20px] sm:h-[30px] md:h-[40px]">
                            <img alt="" class="w-full h-full object-cover" style="color:transparent" src="{{ asset('assets/media/images/footer-pattern.svg')}}">
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="bg-[#E6F3F7] relative overflow-hidden">
            <section class="relative mx-auto max-w-6xl mt-10 sm:mt-20 md:mt-20 px-4 sm:px-6 pb-20 sm:pb-28">
                <div class="flex flex-col gap-4">
                    <h3 class="text-3xl font-bold">Our Partners</h3>
                    <div class="flex justify-between">
                        <p class="text-lg">We collaborate with organizations across Africa and beyond to<br> strengthen the creative economy.</p><button class="bg-red-500 border border-red-500 text-white py-3 px-8 sm:px-10 rounded-full hover:bg-orange-600 transition-all duration-300 transform ease-in-out hover:translate-y-[-5px] font-medium text-sm w-full sm:w-auto">Become a Partner</button></div>
                </div>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6 sm:gap-8 lg:gap-12 items-center mt-8 sm:mt-10">
                    <div class="bg-white rounded-lg p-6 flex items-center justify-center h-24 hover:shadow-md transition-shadow duration-300">
                        <img src="{{ asset('assets/media/images/ICCO.png') }}" alt="Partner 1" class="max-h-full max-w-full object-contain">
                    </div>
                    <div class="bg-white rounded-lg p-6 flex items-center justify-center h-24 hover:shadow-md transition-shadow duration-300">
                        <img src="{{ asset('assets/media/images/ams.png') }}" alt="Partner 2" class="max-h-full max-w-full object-contain">
                    </div>
                    <div class="bg-white rounded-lg p-6 flex items-center justify-center h-24 hover:shadow-md transition-shadow duration-300">
                        <img src="{{ asset('assets/media/images/digitech.png') }}" alt="Partner 3" class="max-h-full max-w-full object-contain">
                    </div>
                    <div class="bg-white rounded-lg p-6 flex items-center justify-center h-24 hover:shadow-md transition-shadow duration-300">
                        <img src="{{ asset('assets/media/images/IAN.png') }}" alt="Partner 4" class="max-h-full max-w-full object-contain">
                    </div>
                    <div class="bg-white rounded-lg p-6 flex items-center justify-center h-24 hover:shadow-md transition-shadow duration-300">
                        <img src="{{ asset('assets/media/images/PRCA.png') }}" alt="Partner 5" class="max-h-full max-w-full object-contain">
                    </div>
                    <div class="bg-white rounded-lg p-6 flex items-center justify-center h-24 hover:shadow-md transition-shadow duration-300">
                        <img src="{{ asset('assets/media/images/aia.svg')}}" alt="Partner 6" class="max-h-full max-w-full object-contain invert">
                    </div>
                    <div class="bg-white rounded-lg p-6 flex items-center justify-center h-24 hover:shadow-md transition-shadow duration-300">
                        <img src="{{ asset('assets/media/images/bluehalo.svg')}}" alt="Partner 7" class="max-h-full max-w-full object-contain">
                    </div>
                    <div class="bg-white rounded-lg p-6 flex items-center justify-center h-24 hover:shadow-md transition-shadow duration-300">
                        <img src="{{ asset('assets/media/images/cevent.png') }}" alt="Partner 8" class="max-h-full max-w-full object-contain">
                    </div>
                </div>
            </section>
        </div>
        <div class="bg-white">
            <section class="relative mx-auto max-w-6xl py-10">
                <div class="flex flex-col gap-4 py-10">
                    <h3 class="font-bold text-4xl">Our Theory of Change</h3>
                    <p class="text-xl">We believe Africa’s creative economy can thrive through unity, collaboration, and shared growth. PAAN’s theory of change is built on three pillars:</p>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 py-10">
                    <div class="bg-red-500 rounded-xl shadow-xl overflow-hidden relative">
                        <div class="p-6 pt-8 text-left">
                            <div class="flex justify-start mb-6">
                                <img alt="Who Should Attend" class="w-20 h-20" src="{{ asset('assets/media/images/integration.png') }}">
                            </div>
                            <h4 class="text-xl font-bold text-white mb-2">Integration</h4>
                            <p class="text-white mb-8">Breaking borders between agencies, freelancers, and markets.</p>
                        </div>
                    </div>
                    <div class="bg-red-500 rounded-xl shadow-xl overflow-hidden relative">
                        <div class="p-6 pt-8 text-left">
                            <div class="flex justify-start mb-6">
                                <img alt="Who Should Attend" class="w-20 h-20" src="{{ asset('assets/media/images/capacity-building.png') }}">
                            </div>
                            <h4 class="text-xl font-bold text-white mb-2">Capacity Building</h4>
                            <p class="text-white mb-8">Upskilling via PAAN Academy and shared learning.</p>
                        </div>
                    </div>
                    <div class="bg-red-500 rounded-xl shadow-xl overflow-hidden relative">
                        <div class="p-6 pt-8 text-left">
                            <div class="flex justify-start mb-6">
                                <img alt="Who Should Attend" class="w-20 h-20" src="{{ asset('assets/media/images/market-access.png') }}">
                            </div>
                            <h4 class="text-xl font-bold text-white mb-2">Market Access &amp; Collaboration</h4>
                            <p class="text-white mb-8">Market Access &amp; Collaboration Co-create, pitch, and deliver regional &amp; global projects.</p>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="relative w-full bg-slate-900 overflow-hidden h-[70vh] min-h-[500px]">
            <div class="absolute inset-0 w-full h-[120%]" style="will-change: transform; transform: translateY(-130.488px);">
                <div class="w-full h-full bg-cover bg-center bg-no-repeat" style="background-image: url(&quot;https://ik.imagekit.io/nkmvdjnna/PAAN/about/parallax-image-min.png&quot;);"></div>
            </div>
            <div class="absolute inset-0 bg-gradient-to-br from-slate-900/90 via-slate-800/80 to-slate-900/90 z-10"></div>
            <div class="relative h-full flex mx-auto max-w-6xl z-20">
                <div class="max-w-6xl px-6 md:px-8 py-16 flex flex-col justify-center h-full">
                    <div class="max-w-2xl text-left space-y-4">
                        <h3 class="text-3xl text-white relative font-semibold">The Future We're Creating</h3>
                        <p class="text-white text-base md:text-lg mb-6 font-light max-w-lg">From scattered local outputs to a unified continental powerhouse—capable of delivering global campaigns, shaping narratives, and influencing culture worldwide. We're not just building a network. We're building the foundation of
                            a borderless African creative economy.</p>
                        <div class="flex gap-4"><button class="bg-red-500 font-semibold border border-red-500 text-white py-3 px-8 rounded-full hover:bg-red-600 transition-all duration-300 transform ease-in-out hover:translate-y-[-2px] font-medium text-sm">Become part of PAAN</button>
                            <button class="bg-[#84c1d9] font-semibold border border-[#84c1d9] text-[#172840] py-3 px-8 rounded-full hover:bg-white hover:border-white transition-all duration-300 transform ease-in-out hover:translate-y-[-2px] font-medium text-sm">Explore Programs</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="bg-[#172840] pt-28 pb-8 text-white">
            <div class="max-w-6xl mx-auto px-3 sm:px-0">
                <div class="grid grid-cols-1 md:grid-cols-6 justify-items-center gap-4 text-center md:text-left">
                    <p class="text-4xl font-medium">Collaborate</p><span class="flex bg-[#F2B706] rounded-full w-8 h-8"></span>
                    <p class="text-4xl font-medium">Innovate</p><span class="flex bg-[#84C1D9] rounded-full w-8 h-8"></span>
                    <p class="text-4xl font-medium">Dominate</p><span class="flex bg-[#F25849] rounded-full w-8 h-8"></span></div>
            </div>
            <div class="relative">
                <div class="absolute top-0 left-0 w-full h-full z-0 opacity-10">
                    <img alt="" loading="lazy" decoding="async" data-nimg="fill" class="object-cover" style="position:absolute;height:100%;width:100%;left:0;top:0;right:0;bottom:0;color:transparent" src="{{ asset('assets/media/images/bg-pattern.svg') }}"></div>
                <section class="relative max-w-6xl mx-auto px-3 sm:px-0 grid grid-cols-1 sm:grid-cols-4 gap-8 mt-20 pb-10 z-10">
                    <div class="flex flex-col gap-8">
                        <div class="text-white rounded-lg relative overflow-hidden">
                            <div class="relative z-0">
                                <h3 class="text-2xl font-normal mb-4">Sign up for our newsletter</h3>
                                <p class="text-gray-200 font-normal mb-6">Stay connected. Get insights, trend reports, and event invites delivered to your inbox.</p>
                                <form class="space-y-4">
                                    <div class="flex flex-col sm:flex-row gap-4">
                                        <div class="flex-1">
                                            <input type="text" placeholder="Your Name" class="w-full border-t-0 border-l-0 border-r-0 border-b border-gray-400 bg-transparent text-white placeholder-gray-400 focus:outline-none focus:border-white transition-colors duration-300  " required="" name="name"
                                                   value="">
                                        </div>
                                        <div class="flex-1">
                                            <input type="email" placeholder="yourmail@email.com" class="w-full border-t-0 border-l-0 border-r-0 border-b border-gray-400 bg-transparent text-white placeholder-gray-400 focus:outline-none focus:border-white transition-colors duration-300  " required=""
                                                   name="email" value="">
                                        </div>
                                        <button type="submit" class="bg-[#F25849] text-white px-8 py-3 rounded-full font-medium text-sm transition duration-300 hover:bg-[#D6473C]">
                                            Subscribe
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div>
                            <ul class="flex gap-2">
                                <li class="group pb-4 hover:translate-y-[-4px] transition-transform duration-300">
                                    <a target="_blank" rel="noopener noreferrer" aria-label="Facebook" href="https://www.facebook.com/panafricanagencynetwork">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="text-gray-400 iconify iconify--ic" width="32" height="32" viewBox="0 0 24 24" style="--hover-color: #1877F2; transition: color 0.3s;">
                                            <path fill="currentColor" d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3v3h-3v6.95c5.05-.5 9-4.76 9-9.95"></path>
                                        </svg>
                                    </a>
                                </li>
                                <li class="group pb-4 hover:translate-y-[-4px] transition-transform duration-300"><a target="_blank" rel="noopener noreferrer" aria-label="LinkedIn" href="https://www.linkedin.com/company/pan-african-agency-network"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="text-gray-400 iconify iconify--mdi" width="32" height="32" viewBox="0 0 24 24" style="--hover-color: #0077B5; transition: color 0.3s;"><path fill="currentColor" d="M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2zm-.5 15.5v-5.3a3.26 3.26 0 0 0-3.26-3.26c-.85 0-1.84.52-2.32 1.3v-1.11h-2.79v8.37h2.79v-4.93c0-.77.62-1.4 1.39-1.4a1.4 1.4 0 0 1 1.4 1.4v4.93zM6.88 8.56a1.68 1.68 0 0 0 1.68-1.68c0-.93-.75-1.69-1.68-1.69a1.69 1.69 0 0 0-1.69 1.69c0 .93.76 1.68 1.69 1.68m1.39 9.94v-8.37H5.5v8.37z"></path></svg></a></li>
                                <li class="group pb-4 hover:translate-y-[-4px] transition-transform duration-300"><a target="_blank" rel="noopener noreferrer" aria-label="Instagram" href="https://instagram.com/pan_african_agency_network"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="text-gray-400 iconify iconify--mingcute" width="32" height="32" viewBox="0 0 24 24" style="--hover-color: #E4405F; transition: color 0.3s;"><g fill="none"><path d="m12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035q-.016-.005-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093q.019.005.029-.008l.004-.014l-.034-.614q-.005-.018-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z"></path><path fill="currentColor" d="M16 3a5 5 0 0 1 5 5v8a5 5 0 0 1-5 5H8a5 5 0 0 1-5-5V8a5 5 0 0 1 5-5zm-4 5a4 4 0 1 0 0 8a4 4 0 0 0 0-8m0 2a2 2 0 1 1 0 4a2 2 0 0 1 0-4m4.5-3.5a1 1 0 1 0 0 2a1 1 0 0 0 0-2"></path></g></svg></a></li>
                                <li class="group pb-4 hover:translate-y-[-4px] transition-transform duration-300"><a target="_blank" rel="noopener noreferrer" aria-label="X" href="https://x.com/paan_network"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="text-gray-400 iconify iconify--iconoir" width="32" height="32" viewBox="0 0 24 24" style="--hover-color: #000000; transition: color 0.3s;"><g fill="none" stroke="currentColor" stroke-width="1.5"><path d="M16.82 20.768L3.753 3.968A.6.6 0 0 1 4.227 3h2.48a.6.6 0 0 1 .473.232l13.067 16.8a.6.6 0 0 1-.474.968h-2.48a.6.6 0 0 1-.473-.232Z"></path><path stroke-linecap="round" d="M20 3L4 21"></path></g></svg></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="flex flex-col gap-4">
                        <h3 class="text-lg font-semibold text-white mb-2">Tools</h3>
                        <ul class="space-y-2">
                            <li><a class="font-normal text-gray-200 hover:text-white hover:underline transition-all duration-300 cursor-pointer flex items-center gap-2" href="/ai-brief-builder"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="w-4 h-4 iconify iconify--fa-solid" width="1em" height="1em" viewBox="0 0 512 512"><path fill="currentColor" d="m224 96l16-32l32-16l-32-16l-16-32l-16 32l-32 16l32 16zM80 160l26.66-53.33L160 80l-53.34-26.67L80 0L53.34 53.33L0 80l53.34 26.67zm352 128l-26.66 53.33L352 368l53.34 26.67L432 448l26.66-53.33L512 368l-53.34-26.67zm70.62-193.77L417.77 9.38C411.53 3.12 403.34 0 395.15 0s-16.38 3.12-22.63 9.38L9.38 372.52c-12.5 12.5-12.5 32.76 0 45.25l84.85 84.85c6.25 6.25 14.44 9.37 22.62 9.37c8.19 0 16.38-3.12 22.63-9.37l363.14-363.15c12.5-12.48 12.5-32.75 0-45.24M359.45 203.46l-50.91-50.91l86.6-86.6l50.91 50.91z"></path></svg>AI Brief Builder</a></li>
                            <li><a class="font-normal text-gray-200 hover:text-white hover:underline transition-all duration-300 cursor-pointer flex items-center gap-2" href="/ai-invoice-generator"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="w-4 h-4 iconify iconify--fa-solid" width="0.75em" height="1em" viewBox="0 0 384 512"><path fill="currentColor" d="M377 105L279.1 7c-4.5-4.5-10.6-7-17-7H256v128h128v-6.1c0-6.3-2.5-12.4-7-16.9m-153 31V0H24C10.7 0 0 10.7 0 24v464c0 13.3 10.7 24 24 24h336c13.3 0 24-10.7 24-24V160H248c-13.2 0-24-10.8-24-24M64 72c0-4.42 3.58-8 8-8h80c4.42 0 8 3.58 8 8v16c0 4.42-3.58 8-8 8H72c-4.42 0-8-3.58-8-8zm0 80v-16c0-4.42 3.58-8 8-8h80c4.42 0 8 3.58 8 8v16c0 4.42-3.58 8-8 8H72c-4.42 0-8-3.58-8-8m144 263.88V440c0 4.42-3.58 8-8 8h-16c-4.42 0-8-3.58-8-8v-24.29c-11.29-.58-22.27-4.52-31.37-11.35c-3.9-2.93-4.1-8.77-.57-12.14l11.75-11.21c2.77-2.64 6.89-2.76 10.13-.73c3.87 2.42 8.26 3.72 12.82 3.72h28.11c6.5 0 11.8-5.92 11.8-13.19c0-5.95-3.61-11.19-8.77-12.73l-45-13.5c-18.59-5.58-31.58-23.42-31.58-43.39c0-24.52 19.05-44.44 42.67-45.07V232c0-4.42 3.58-8 8-8h16c4.42 0 8 3.58 8 8v24.29c11.29.58 22.27 4.51 31.37 11.35c3.9 2.93 4.1 8.77.57 12.14l-11.75 11.21c-2.77 2.64-6.89 2.76-10.13.73c-3.87-2.43-8.26-3.72-12.82-3.72h-28.11c-6.5 0-11.8 5.92-11.8 13.19c0 5.95 3.61 11.19 8.77 12.73l45 13.5c18.59 5.58 31.58 23.42 31.58 43.39c0 24.53-19.05 44.44-42.67 45.07"></path></svg>AI Invoice Generator</a></li>
                            <li><a class="font-normal text-gray-200 hover:text-white hover:underline transition-all duration-300 cursor-pointer flex items-center gap-2" href="/ai-business-plan-generator"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="w-4 h-4 iconify iconify--fa-solid" width="1em" height="1em" viewBox="0 0 512 512"><path fill="currentColor" d="M320 336c0 8.84-7.16 16-16 16h-96c-8.84 0-16-7.16-16-16v-48H0v144c0 25.6 22.4 48 48 48h416c25.6 0 48-22.4 48-48V288H320zm144-208h-80V80c0-25.6-22.4-48-48-48H176c-25.6 0-48 22.4-48 48v48H48c-25.6 0-48 22.4-48 48v80h512v-80c0-25.6-22.4-48-48-48m-144 0H192V96h128z"></path></svg>AI Business Plan Generator</a></li>
                        </ul>
                    </div>
                    <div class="flex flex-col items-center gap-4">
                        <a class="flex flex-col items-center" href="/academy"><img alt="PAAN Academy Logo" loading="lazy" width="144" height="144" decoding="async" data-nimg="1" class="mb-2 object-contain w-24 h-24 sm:w-32 sm:h-32 md:w-36 md:h-36" style="color:transparent" src="{{ asset('assets/media/images/logo.svg')}}"></a>
                    </div>
                    <div class="flex flex-col gap-4">
                        <h3 class="text-lg font-semibold text-white mb-2">Quick Links</h3>
                        <ul class="space-y-2">
                            <li><a class="font-normal text-gray-200 hover:text-white hover:underline transition-all duration-300 cursor-pointer flex items-center gap-2" href="https://member-portal.paan.africa/">Member Portal</a></li>
                            <li><a class="font-normal text-gray-200 hover:text-white hover:underline transition-all duration-300 cursor-pointer flex items-center gap-2" href="/paan-ambassador">Ambassador Program</a></li>
                            <li><a class="font-normal text-gray-200 hover:text-white hover:underline transition-all duration-300 cursor-pointer flex items-center gap-2" href="/pricing">Full Member Benefits &amp; Tiers</a></li>
                            <li><a class="font-normal text-gray-200 hover:text-white hover:underline transition-all duration-300 cursor-pointer flex items-center gap-2" href="/paan-ma-program">Mergers &amp; Acquisition Program</a></li>
                            <li><a class="font-normal text-gray-200 hover:text-white hover:underline transition-all duration-300 cursor-pointer flex items-center gap-2" href="/events">Events</a></li>
                            <li><a class="font-normal text-gray-200 hover:text-white hover:underline transition-all duration-300 cursor-pointer flex items-center gap-2" href="/blogs">Blog</a></li>
                            <li><a class="font-normal text-gray-200 hover:text-white hover:underline transition-all duration-300 cursor-pointer flex items-center gap-2" href="/careers">Careers &amp; RFP<span class="bg-[#F25849] text-white text-xs font-semibold px-2 py-1 rounded-full uppercase tracking-wide animate-pulse hover:animate-bounce transition-all duration-300 hover:scale-110 hover:shadow-lg hover:shadow-[#F25849]/50">New</span></a></li>
                            <li><a class="font-normal text-gray-200 hover:text-white hover:underline transition-all duration-300 cursor-pointer flex items-center gap-2" href="/faqs">FAQs</a></li>
                        </ul>
                    </div>
                </section>
            </div>
            <div class="max-w-6xl mx-auto px-3 sm:px-0">
                <p class="pt-10 pb-24 border-t border-gray-400 text-center text-gray-200 text-sm relative z-10">©
                    <!-- -->2026
                    <!-- -->PAAN.
                    <!-- -->All rights reserved.
                    <!-- -->|<a class="ml-2 text-white hover:text-[#84c1d9] transition-colors duration-300" href="/privacy-policy">Privacy Policy</a></p>
            </div>
            <div class="absolute bottom-0 left-0 w-full h-[20px] sm:h-[30px] md:h-[40px] z-0"><img alt="" loading="lazy" decoding="async" data-nimg="fill" class="object-cover" style="position:absolute;height:100%;width:100%;left:0;top:0;right:0;bottom:0;color:transparent" src="{{ asset('assets/media/images/footer-pattern.svg')}}"></div>
        </section>
    </main>

</x-home-layout>
