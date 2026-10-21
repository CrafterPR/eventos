<section class="relative mx-auto max-w-6xl px-4 sm:px-6">
    <div class="flex flex-col sm:flex-row justify-between items-start mb-6 sm:mb-8 gap-4">
        <div>
            <h3 class="text-3xl sm:text-4xl text-slate-800 font-normal">Meet the speakers</h3>
            <p class="text-base sm:text-lg md:text-xl font-normal text-slate-800 mb-4">Gain insights from
                leading voices in business, governance and professional development</p>
        </div>
        <div class="flex gap-2 self-end">
            <button id="speakers-prev"
                    class="w-10 h-10 sm:w-12 sm:h-12 border border-slate-800 text-slate-800 rounded-full flex items-center justify-center hover:bg-slate-800 hover:text-white transition-colors duration-300 shadow-lg">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                     aria-hidden="true" role="img" class="iconify iconify--mdi" width="20" height="20"
                     viewBox="0 0 24 24">
                    <path fill="currentColor" d="M15.41 16.58L10.83 12l4.58-4.59L14 6l-6 6l6 6z"></path>
                </svg>
            </button>
            <button id="speakers-next"
                    class="w-10 h-10 sm:w-12 sm:h-12 border border-slate-800 text-slate-800 rounded-full flex items-center justify-center hover:bg-slate-800 hover:text-white transition-colors duration-300 shadow-lg">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                     aria-hidden="true" role="img" class="iconify iconify--mdi" width="20" height="20"
                     viewBox="0 0 24 24">
                    <path fill="currentColor" d="M8.59 16.58L13.17 12L8.59 7.41L10 6l6 6l-6 6z"></path>
                </svg>
            </button>
        </div>
    </div>
    @php
        $additionalSpeakers = [
            ['name' => 'FCS Jeremiah Karanja', 'role' => 'Chief Executive Officer, Institute of Certified Secretaries', 'image' => 'jeremiah-karanja.webp'],
            ['name' => 'Dr. Charles Koech, OGW', 'role' => 'Chief Principal, The Eldoret National Polytechnic', 'image' => 'charles-koech-ogw.webp'],
            ['name' => 'Prof. Manasseh Nshuti', 'role' => 'Chairman, Board of Promoters, University of Kigali', 'image' => 'manasseh-nshuti.webp'],
            ['name' => 'CS. Debra Ajwang', 'role' => 'CEO, The Leadership Group Limited', 'image' => 'debra-ajwang.webp'],
            ['name' => 'Dr. Edwin Tarno, PhD, HSC', 'role' => 'Chief Executive Officer, Kenya School of TVET', 'image' => 'edwin-tarno.webp'],
            ['name' => 'Prof. Isaiah I.C. Wakindiki', 'role' => 'Vice Chancellor, KCA University', 'image' => 'isaiah-i-c-wakindiki.webp'],
//            ['name' => 'Dr. Mwanza', 'role' => 'Director General, Kenya School of Government Affairs', 'image' => 'mwanza.webp'],
            ['name' => 'Prof. Kenneth Wyne Mutuma', 'role' => 'Honorary Secretary, Association of Professional Societies in East Africa', 'image' => 'kenneth-wyne-mutuma.webp'],
            ['name' => 'Dr. Susan Musembi, PhD', 'role' => 'Director, Directorate of Innovation, Incubation and University Industry Linkages', 'image' => 'susan-musembi.webp'],
            ['name' => 'Charles Kanjama', 'role' => 'President, Law Society of Kenya', 'image' => 'charles-kanjama.webp'],
            ['name' => 'FA Diana Muriuki-Maina', 'role' => 'CEO, ICIFA', 'image' => 'diana-muriuki-maina.webp'],
//            ['name' => 'FCPA Dr. Benson Okundi, PhD', 'role' => 'Partner/Director, PwC', 'image' => 'benson-okundi.webp'],
            ['name' => 'Prof. Mike Kuria', 'role' => 'Commission Secretary/CEO, CUE', 'image' => 'mike-kuria.webp'],
            ['name' => 'Dr. Alice Kande, PhD', 'role' => 'Director General, KNQA', 'image' => 'alice-kande.webp'],
            ['name' => 'Dr. David Njengere, MBS', 'role' => 'CEO, KNEC – sending a representative', 'image' => 'david-njengere.webp'],
            ['name' => 'Mr. Shadrack Tonui', 'role' => 'National Chairperson, KATTI', 'image' => 'shadrack-tonui.webp'],
            ['name' => 'Dr. Mutembei Kigige, PhD, OGW', 'role' => 'Chief Principal, The Meru National Polytechnic', 'image' => 'mutembei-kigige.webp'],
            ['name' => 'Dr. Jay Bosire', 'role' => 'Medical & Health Consultant', 'image' => 'jay-bosire.webp'],
            ['name' => 'Gerald Kiti', 'role' => 'Principal Legal Counsel at the Senate of Kenya and a Legal
            Practitioner', 'image' => 'Gerald-Kiti.webp'],
            ['name' => "Dr Julius Kipng'etich", 'role' => 'Group Chief Executive Officer, Jubilee Group', 'image' =>
            'Dr-Julius-Kipngetich.webp'],
            ['name' => 'Dr Rose Ngondi', 'role' => 'Head of Training and Research, Chiromo Hospital Group', 'image'
            => 'Dr-Rose-Ngondi.webp'],
            ['name' => 'FCS Jacqueline Waihenya', 'role' => 'Chairperson, Institute of Certified Secretaries',
            'image' => 'Jacqueline-Waihenya.webp'],
            ['name' => 'Mr. Timothy Wambui', 'role' => 'Director Investments and Executive Director, CPF Asset
            Managers', 'image' => 'Timothy-Wambui.webp'],
            ['name' => 'Mr James Maina', 'role' => 'Acting Director General, Vision 2030 Delivery Secretariat',
            'image' => 'James-Maina.webp'],
            ['name' => 'Mr. David Koross', 'role' => 'Managing Trustee/CEO, National Social Security Fund', 'image'
            => 'David-Koross.webp'],
            ['name' => 'Dr. Hosea Kili, SC, MBS', 'role' => 'Group Managing Director/CEO, CPF Group', 'image' =>
            'Hosea-Kili.webp'],
            ['name' => 'Dr. Joel Onyango, Ph.D', 'role' => 'Director of Monitoring, Evaluation, Learning and Impact, The African Centre for Technology Studies (ACTS)', 'image' => 'Joel-Onyango.webp'],
            ];
    @endphp
    <!-- Speakers Carousel -->
    <div id="speakers-carousel-container" class="overflow-hidden rounded-xl">
        <div id="speakers-carousel-track"
             class="flex gap-4 sm:gap-6 transition-transform duration-500 ease-out">
            {{-- i. Koskei - COF--}}
            <div class="flex-shrink-0 w-full sm:w-1/2 lg:w-1/3">
                <div
                    class="relative rounded-xl shadow-xl overflow-hidden group cursor-pointer h-80 sm:h-96">
                    <img alt="Felix Koskei" loading="lazy" width="400" height="500"
                         class="w-full h-full object-cover" style="color:transparent"
                         src="{{ asset('assets/media/images/speakers/fkoskei.jpg') }}">
                    <div
                        class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent group-hover:bg-gradient-to-t group-hover:from-black/0 group-hover:to-transparent transition-all duration-300 p-4 sm:p-6">
                        <div
                            class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-300"
                            style="background:linear-gradient(to top, #175C93 0%, #BBE1F8 40%, rgba(0,0,0,0) 100%)"></div>
                        <div class="relative z-10 flex justify-between items-center">
                            <div>
                                <h4 class="text-lg sm:text-xl font-bold text-white mb-1">Mr. Felix Koskei,
                                    EGH
                                </h4>
                                <p class="text-white/90 text-xs sm:text-sm">Chief of Staff and Head of
                                    Public Service</p>
                            </div>
                            <div class="flex-shrink-0"><a
                                    href="#"
                                    target="_blank" rel="noopener noreferrer"
                                    class="hover:scale-110 transition-transform duration-200">

                                </a></div>
                        </div>
                    </div>
                </div>
            </div>
            {{--2. CS Mbadi--}}
            <div class="flex-shrink-0 w-full sm:w-1/2 lg:w-1/3">
                <div
                    class="relative rounded-xl shadow-xl overflow-hidden group cursor-pointer h-80 sm:h-96">
                    <img alt="CS Mbadi" loading="lazy" width="400" height="500"
                         class="w-full h-full object-cover" style="color:transparent"
                         src="{{ asset('assets/media/images/speakers/cs-mbadi.jpeg') }}">
                    <div
                        class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent group-hover:bg-gradient-to-t group-hover:from-black/0 group-hover:to-transparent transition-all duration-300 p-4 sm:p-6">
                        <div
                            class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-300"
                            style="background:linear-gradient(to top, #175C93 0%, #BBE1F8 40%, rgba(0,0,0,0) 100%)"></div>
                        <div class="relative z-10 flex justify-between items-center">
                            <div>
                                <h4 class="text-lg sm:text-xl font-bold text-white mb-1">FCPA Hon. John
                                    Mbadi Ng'ongo, EGH
                                </h4>
                                <p class="text-white/90 text-xs sm:text-sm">Cabinet Secretary, The National
                                    Treasury and Economic Planning</p>
                            </div>
                            <div class="flex-shrink-0"><a
                                    href="#"
                                    target="_blank" rel="noopener noreferrer"
                                    class="hover:scale-110 transition-transform duration-200">

                                </a></div>
                        </div>
                    </div>
                </div>
            </div>
            {{--3. Dr. Chris K. Kiptoo, CBS--}}
            <div class="flex-shrink-0 w-full sm:w-1/2 lg:w-1/3">
                <div
                    class="relative rounded-xl shadow-xl overflow-hidden group cursor-pointer h-80 sm:h-96">
                    <img alt="PS Kiptoo" loading="lazy" width="400" height="500"
                         class="w-full h-full object-cover" style="color:transparent"
                         src="{{ asset('assets/media/images/speakers/ps-Kiptoo.jpeg') }}">
                    <div
                        class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent group-hover:bg-gradient-to-t group-hover:from-black/0 group-hover:to-transparent transition-all duration-300 p-4 sm:p-6">
                        <div
                            class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-300"
                            style="background:linear-gradient(to top, #175C93 0%, #BBE1F8 40%, rgba(0,0,0,0) 100%)"></div>
                        <div class="relative z-10 flex justify-between items-center">
                            <div>
                                <h4 class="text-lg sm:text-xl font-bold text-white mb-1">Dr. Chris K.
                                    Kiptoo, CBS
                                </h4>
                                <p class="text-white/90 text-xs sm:text-sm">Principal Secretary, The
                                    National Treasury</p>
                            </div>
                            <div class="flex-shrink-0"><a
                                    href="#"
                                    target="_blank" rel="noopener noreferrer"
                                    class="hover:scale-110 transition-transform duration-200">

                                </a></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Speaker 1: Anna -->
            <div class="flex-shrink-0 w-full sm:w-1/2 lg:w-1/3">
                <div
                    class="relative rounded-xl shadow-xl overflow-hidden group cursor-pointer h-80 sm:h-96">
                    <img alt="Anna Ceesay" loading="lazy" width="400" height="500"
                         class="w-full h-full object-cover" style="color:transparent"
                         src="{{ asset('assets/media/images/speakers/percy-opiyo.jpg') }}">
                    <div
                        class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent group-hover:bg-gradient-to-t group-hover:from-black/0 group-hover:to-transparent transition-all duration-300 p-4 sm:p-6">
                        <div
                            class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-300"
                            style="background:linear-gradient(to top, #175C93 0%, #BBE1F8 40%, rgba(0,0,0,0) 100%)"></div>
                        <div class="relative z-10 flex justify-between items-center">
                            <div>
                                <h4 class="text-lg sm:text-xl font-bold text-white mb-1">Dr Percy Opio
                                    PhD</h4>
                                <p class="text-white/90 text-xs sm:text-sm">Chairman of The Board of
                                    Directors, KASNEB</p>
                            </div>
                            <div class="flex-shrink-0"><a
                                    href="#"
                                    target="_blank" rel="noopener noreferrer"
                                    class="hover:scale-110 transition-transform duration-200">

                                </a></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Speaker 2: Yannick -->
            <div class="flex-shrink-0 w-full sm:w-1/2 lg:w-1/3">
                <div
                    class="relative rounded-xl shadow-xl overflow-hidden group cursor-pointer h-80 sm:h-96">
                    <img alt="Yannick Lefang" loading="lazy" width="400" height="500"
                         class="w-full h-full object-cover" style="color:transparent"
                         src="{{ asset('assets/media/images/speakers/joseph-kanyi.jpg') }}">
                    <div
                        class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent group-hover:bg-gradient-to-t group-hover:from-black/0 group-hover:to-transparent transition-all duration-300 p-4 sm:p-6">
                        <div
                            class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-300"
                            style="background:linear-gradient(to top, #175C93 0%, #BBE1F8 40%, rgba(0,0,0,0) 100%)"></div>
                        <div class="relative z-10 flex justify-between items-center">
                            <div>
                                <h4 class="text-lg sm:text-xl font-bold text-white mb-1">Dr. Joseph M. Kanyi
                                    PhD</h4>
                                <p class="text-white/90 text-xs sm:text-sm">Vice Chairman of The Board of
                                    Directors, KASNEB, Representing Ministry of Education,</p>
                            </div>
                            <div class="flex-shrink-0"><a
                                    href="#"
                                    target="_blank" rel="noopener noreferrer"
                                    class="hover:scale-110 transition-transform duration-200">

                                </a></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Speaker 3: Dr. Gillian -->
            <div class="flex-shrink-0 w-full sm:w-1/2 lg:w-1/3">
                <div
                    class="relative rounded-xl shadow-xl overflow-hidden group cursor-pointer h-80 sm:h-96">
                    <img alt="Dr. Gillian Hammah" loading="lazy" width="400" height="500"
                         class="w-full h-full object-cover" style="color:transparent"
                         src="{{ asset('assets/media/images/speakers/letting.jpg') }}">
                    <div
                        class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent group-hover:bg-gradient-to-t group-hover:from-black/0 group-hover:to-transparent transition-all duration-300 p-4 sm:p-6">
                        <div
                            class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-300"
                            style="background:linear-gradient(to top, #84C1D9 0%, #84C1D9 40%, rgba(0,0,0,0) 100%)"></div>
                        <div class="relative z-10 flex justify-between items-center">
                            <div>
                                <h4 class="text-lg sm:text-xl font-bold text-white mb-1">Prof. Nicholas
                                    K. Letting’ PhD, EBS, KASNEB</h4>
                                <p class="text-white/90 text-xs sm:text-sm">Secretary/Chief Executive
                                    Officer</p>
                            </div>
                            <div class="flex-shrink-0"><a
                                    href="https://www.linkedin.com/in/gillian-hammah?originalSubdomain=gh"
                                    target="_blank" rel="noopener noreferrer"
                                    class="hover:scale-110 transition-transform duration-200">

                                </a></div>
                        </div>
                    </div>
                </div>
            </div>
            @foreach ($additionalSpeakers as $speaker)
                <div class="flex-shrink-0 w-full sm:w-1/2 lg:w-1/3">
                    <div class="relative rounded-xl shadow-xl overflow-hidden group cursor-pointer h-80 sm:h-96 bg-gradient-to-br from-slate-300 to-slate-500">
                        @if (!empty($speaker['image']))
                            <img alt="{{ $speaker['name'] }}" loading="lazy" width="400" height="500"
                                 class="w-full h-full object-cover" style="color:transparent"
                                 src="{{ asset('assets/media/images/speakers/' . $speaker['image']) }}">
                        @endif
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent group-hover:bg-gradient-to-t group-hover:from-black/0 group-hover:to-transparent transition-all duration-300 p-4 sm:p-6">
                            <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-300"
                                 style="background:linear-gradient(to top, #175C93 0%, #BBE1F8 40%, rgba(0,0,0,0) 100%)"></div>
                            <div class="relative z-10">
                                <h4 class="text-lg sm:text-xl font-bold text-white mb-1">{{ $speaker['name'] }}</h4>
                                <p class="text-white/90 text-xs sm:text-sm">{{ $speaker['role'] }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="flex justify-center sm:justify-start gap-2 mt-6 sm:mt-8">
        <a href="@if(!request()->routeIs('/')) {{ route('/') }}#tickets-section @else #tickets-section
                        @endif"
           class="bg-gradient-to-r from-[#175C93] to-[#84C1DA] border border-transparent text-white px-6
                         sm:px-8
                         py-3 rounded-full hover:opacity-90 transition-all duration-300 font-medium text-sm sm:text-base shadow-lg flex items-center justify-center gap-2 w-full sm:w-auto">
            Register now
        </a>
    </div>
</section>
