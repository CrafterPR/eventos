<section class="relative mx-auto max-w-6xl px-4 sm:px-6">
    <div class="w-full">
        <h3 class="text-xl sm:text-2xl font-bold text-slate-800 mb-4 sm:mb-6">Frequently Asked
            Questions</h3>


        <div x-data="{
                            open: 1,
                            items: [
                                { id: 1, title: 'Who Should Attend?', content: `
                                    <p> The conference is designed for professionals, accountants, business leaders, entrepreneurs, government officials, policymakers, academics, students, tech innovators, investors, and industry stakeholders seeking to stay ahead of emerging trends, expand their networks, and shape the future of the professional landscape..</p>
                                `},
                                { id: 2, title: 'How to register', content: `
                                    <p>
                                        To register for KICP, click Register Now, select your ticket, complete the registration form, choose your preferred payment method, make payment, and receive your registration confirmation.
                                    </p>
                                ` },
                                { id: 3, title: 'How to become a Sponsor', content:  `
                                    <p>
                                        Partner with KICP to position your brand before a diverse audience of professionals, corporate leaders, government representatives, and key decision-makers. A range of sponsorship packages is available, offering valuable branding, speaking, exhibition, and networking opportunities.
                                    </p>
                                ` },
                                { id: 4, title: 'How to book Exhibition Spot ', content: `
                                    <p>
                                        Organizations interested in showcasing their products, services, or innovations can reserve an exhibition booth by completing the online exhibition registration form. Exhibition spaces are allocated on a first-come, first-served basis, subject to availability.
                                    </p>
                                ` },
                                { id: 5, title: 'Safety &amp; Security', content: `
                                    <p>
                                        Nairobi is a vibrant business and conference destination with modern infrastructure and hospitality facilities. The conference organizers are working closely with the venue and security agencies to ensure a safe and secure environment throughout the event. Delegates are encouraged to observe normal safety precautions during their stay.
                                    </p>
                                ` },
                            ],
                            toggle(id) {
                                this.open = this.open === id ? 0 : id;
                            }
                        }" class="w-full mx-auto space-y-4">

            <template x-for="item in items" :key="item.id">
                <div
                    class="border border-gray-200 rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadow duration-300">
                    <button
                        @click="toggle(item.id)"
                        class="w-full px-6 py-4 text-left bg-white hover:bg-gray-50 transition-colors duration-200 flex justify-between items-center">
                        <h3 class="font-semibold text-gray-800 text-lg pr-4" x-html="item.title"></h3>
                        <span class="flex-shrink-0">

                                        <!-- Plus SVG -->
                                        <template x-if="open !== item.id">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                 stroke-linecap="round" stroke-linejoin="round"
                                                 class="transition-transform duration-300"><line x1="12" y1="5" x2="12"
                                                                                                 y2="19"></line><line
                                                    x1="5" y1="12" x2="19" y2="12"></line></svg>
                                        </template>

                            <!-- X SVG -->
                            <template x-if="open === item.id">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                 stroke-linecap="round" stroke-linejoin="round"
                                                 class="transition-transform duration-300"><line x1="5" y1="12" x2="19"
                                                                                                 y2="12"></line></svg>
                                        </template>
                            </span>
                    </button>

                    <div x-ref="container" x-cloak x-show="open === item.id"
                         x-transition:enter="transition-all duration-300 ease-out"
                         x-transition:enter-start="max-h-0 opacity-0"
                         x-transition:enter-end="max-h-[1000px] opacity-100"
                         x-transition:leave="transition-all duration-300 ease-in"
                         x-transition:leave-start="max-h-[1000px] opacity-100"
                         x-transition:leave-end="max-h-0 opacity-0"
                         class="overflow-hidden duration-300 ease-in-out max-h-96 opacity-100">
                        <div class="px-6 py-4 bg-white border-t border-gray-100">
                            <div x-html="item.content" class="text-gray-700 leading-relaxed"></div>
                        </div>
                    </div>
                </div>
            </template>
        </div>
    </div>
</section>
