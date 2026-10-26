<section class="mx-auto max-w-6xl px-4 sm:px-6">
    <div class="text-center mb-8 sm:mb-12">
        <h2 class="text-2xl sm:text-3xl font-normal text-[#1a365d] mb-3 sm:mb-4">
            Conference Programme
        </h2>

        <p class="text-base sm:text-lg text-gray-600">
            Five days of thought leadership and professional networking
        </p>
    </div>

    <div
        x-data="{
            activeTab: 1,
            days: {
                1: {
                    title: 'DAY 1: MONDAY, 26th OCTOBER 2026',
                    subtitle: 'Arrival & Registration',
                    sessions: [
                        {
                            time: '9:00a.m. – 5:00p.m.',
                            title: 'Arrival and Registration',
                            facilitator: 'All',
                            type: 'normal'
                        }
                    ]
                },

                2: {
                    title: 'DAY 2: TUESDAY, 27th OCTOBER 2026',
                    subtitle: 'Conference Opening & Leadership',
                    sessions: [
                        {
                            time: '8:00a.m. – 8:30a.m.',
                            title: 'Registration and Networking Breakfast',
                            facilitator: 'All',
                            type: 'normal'
                        },
                        {
                            time: '8:30a.m. – 10:30a.m.',
                            title: 'Setting the Stage',
                            description: `
                                <ul class='space-y-2'>
                                    <li><strong>National Anthem & Prayers</strong></li>
                                    <li><strong>Welcome Remarks</strong></li>
                                    <li><strong>Opening Remarks</strong></li>
                                    <li>
                                        <strong>Keynote Address:</strong> Professionals Advancing Africa’s Global
                                        Competitiveness: A Perspective on the Kenya Vision 2030 and Beyond
                                    </li>
                                    <li>
                                        <strong>Opening Keynote Address:</strong> The Success Mindset as a
                                        Competitive Advantage
                                    </li>
                                    <li>
                                        <strong>Fireside Chat:</strong> The Reinvented Leader: Leading Evolving
                                        Professionals in a Dynamic Work Environment
                                    </li>
                                </ul>
                            `,
                            facilitator: `
                                Mr. Johnson Mwakazi, Master of Ceremony<br>
                                Prof. Nicholas K. Letting’, Ph.D, EBS, Secretary/Chief Executive Officer, KASNEB<br>
                                Dr. Joseph Kanyi, Ph.D, Vice Chairman, KASNEB Board<br>
                                Mr. Maina Kiumu, Ag. Director General, Kenya Vision 2030 Delivery Secretariat<br>
                                Dr. Julius Kipngétich, Regional Chief Executive Officer, Jubilee Holdings Ltd.<br>
                                Fireside Chat Session Chair: Dr. Joseph Kanyi, Ph.D, Vice Chairman, KASNEB Board<br>
                                Fireside Chat Speakers: Dr. Julius Kipngétich, Regional Chief Executive Officer,
                                Jubilee Holdings Ltd.; Dr. Jacqueline Onyango, OGW, Senior Deputy Director,
                                Curriculum Development Directorate, Kenya Institute of Curriculum Development
                            `,
                            type: 'normal'
                        },
                        {
                            time: '10:30a.m. – 11:00a.m.',
                            title: 'Exhibition Tour by Guests & Health Break',
                            facilitator: 'All',
                            type: 'break'
                        },
                        {
                            time: '11:00a.m. – 12:30p.m.',
                            title: 'Parallel Sessions',
                            type: 'parallel',
                            sessions: [
                                {
                                    title: 'Session 1',
                                    topic: 'Thriving in a World that is Not Staying Still: Preparing Professionals for What’s Next?',
                                    chair: 'CS Judy Olive Warui-Omurwa, Board Member, KASNEB',
                                    speaker: 'Mrs. Catherine Nyaga-Mbithi, Board Director, Institute of Risk Management (IRM-Global)',
                                    discussants: [
                                        'Dr. George Wakah, Director of Administration, Finance and Corporate Affairs, Centre for Parliamentary Studies and Training (CPST)',
                                        'Dr. Josephine Mwanzia, Ph.D, Senior Director, Academic Affairs, Kenya School of Government'
                                    ]
                                },
                                {
                                    title: 'Session 2',
                                    topic: 'The Smart City',
                                    chair: 'CPA Francis M. Kariuki, Board Member, KASNEB',
                                    speaker: 'Ms. Beryl Khanyile, Head of the Kenya Country Programme, UN-Habitat in Nairobi',
                                    discussants: [
                                        'Mr. John Okwiri, OGW, MBA, MCIPS, Chief Executive Officer, Technopolis Development Authority',
                                        'Dr. Kenneth Chelule, P. Eng, Tech, FIET, EBS, Chief Executive Officer, Special Economic Zones Authority'
                                    ]
                                },
                                {
                                    title: 'Session 3',
                                    topic: 'Geopolitical Conflicts Driving High Cost of Living: Navigating Crisis the Professional Way',
                                    chair: 'Prof. Isaiah I.C. Wakindiki, Vice Chancellor, KCA University',
                                    speaker: 'Mr. Kenneth Matiba, MBS, Chief Executive Officer, Kenya Institute of Supplies Management',
                                    discussants: [
                                        'Dr. Korir Sing’oei, PhD, EBS, Principal Secretary, State Department for Foreign Affairs',
                                        'Ms. Regina Akoth Ombam, Principal Secretary, State Department for Trade'
                                    ]
                                }
                            ]
                        },
                        {
                            time: '12:30p.m. – 1:00p.m.',
                            title: 'Networking & Tour of Exhibition',
                            facilitator: 'All',
                            type: 'break'
                        },
                        {
                            time: '1:00p.m. – 2:00p.m.',
                            title: 'Lunch & Networking',
                            facilitator: 'All',
                            type: 'break'
                        },
                        {
                            time: '2:00p.m. – 2:30p.m.',
                            title: 'Networking & Tour of Exhibition',
                            facilitator: 'All',
                            type: 'break'
                        },
                        {
                            time: '2:30p.m. – 4:00p.m.',
                            title: 'Parallel Sessions',
                            type: 'parallel',
                            sessions: [
                                {
                                    title: 'Masterclass',
                                    topic: 'Beyond the Paycheck: Building Wealth That Lasts for Generations',
                                    chair: 'Ms Lilian Abishai, Board Member, KASNEB',
                                    speaker: 'Mr. Antony Munene, Senior Investment Advisor, ICEA Lion Asset Management'
                                },
                                {
                                    title: 'Panel Session',
                                    topic: 'Evolving Professional Standards in Response to Technological Changes',
                                    chair: 'FCS Joshua Wambua, Board Member, KASNEB',
                                    discussantLabel: 'Panelists',
                                    discussants: [
                                        'Prof. CPA Elizabeth N. Kalunda-Muvui, PhD, Chairperson, Institute of Certified Public Accountants of Kenya',
                                        'FCS Jacqueline Waihenya, Chairperson, Institute of Certified Secretaries',
                                        'FA Catherine Karita, Chairperson, Institute of Certified Investment and Financial Analysts',
                                        'CPSP Jeniffer Cirindi Njiru, Chairperson, Kenya Institute of Supplies Management'
                                    ]
                                }
                            ]
                        },
                        {
                            time: '4:00p.m. – 5:00p.m.',
                            title: 'Health Break',
                            facilitator: 'All',
                            type: 'break'
                        },
                        {
                            time: '5:00p.m. – 6:00p.m.',
                            title: 'Networking & Tour of Exhibition',
                            facilitator: 'All',
                            type: 'break'
                        }
                    ]
                },

                3: {
                    title: 'DAY 3: WEDNESDAY, 28th OCTOBER 2026',
                    subtitle: 'Conference Official Opening',
                    sessions: [
                        {
                            time: '8:00a.m. – 8:30a.m.',
                            title: 'Registration and Networking Breakfast',
                            facilitator: 'All',
                            type: 'normal'
                        },
                        {
                            time: '8:30a.m. – 11:00a.m.',
                            title: 'Conference Official Opening',
                            description: `
                                <ul class='space-y-2'>
                                    <li><strong>Setting the Stage:</strong> National Anthem & Prayers</li>
                                    <li><strong>Entertainment</strong></li>
                                    <li><strong>Introduction & Objectives</strong></li>
                                    <li><strong>Welcome Remarks</strong></li>
                                    <li>
                                        <strong>Remarks:</strong> Professional Fine Tuning: How Can Industry,
                                        Regulators and Policymakers Collaborate to Build Future-Ready Professionals
                                        in the Era of AI, Sustainability and Global Disruption
                                    </li>
                                    <li>
                                        <strong>Remarks:</strong> Legislative and Regulatory Agility in a Rapidly
                                        Evolving World
                                    </li>
                                    <li>
                                        <strong>Official Opening Address:</strong> Professionals Building Resilient
                                        Economies Through Ethics, Innovation and Accountability
                                    </li>
                                </ul>
                            `,
                            facilitator: `
                                Mr. Johnson Mwakazi, Master of Ceremony<br>
                                Prof. Nicholas K. Letting’, Ph.D, EBS, Secretary/Chief Executive Officer, KASNEB<br>
                                Dr. Percy Opio, Board Chairman, KASNEB<br>
                                Mr. Lawrence Kibet, Director General, Public Investments and Portfolio Management,
                                The National Treasury<br>
                                Hon. Dorcas Oduor, SC, EGH, The Attorney General<br>
                                Mr. Felix K. Koskei, EGH, Chief of Staff and The Head of the Public Service, Kenya
                            `,
                            type: 'normal'
                        },
                        {
                            time: '11:00a.m. – 11:30a.m.',
                            title: 'Exhibition Tour by Guests & Tea Break',
                            facilitator: 'All',
                            type: 'break'
                        },
                        {
                            time: '11:30a.m. – 12:00p.m.',
                            title: 'Presentation: Professionals Building Institutions that Outlast the Leader',
                            facilitator: `
                                Session Chair: CPA Francis M. Kariuki, Board Member, KASNEB<br>
                                Ms. Debra Ajwang, Chief Officer: Governance & Board Practice, The Leadership Group Limited
                            `,
                            type: 'normal'
                        },
                        {
                            time: '12:00p.m. – 1:00p.m.',
                            title: 'Parallel Sessions',
                            type: 'parallel',
                            sessions: [
                                {
                                    title: 'Session 1',
                                    topic: 'Innovation and Intellectual Property Rights: What Professionals Need to Know',
                                    chair: 'FCPA Philip Kakai, Board Member, KASNEB',
                                    speaker: 'Dr. Susan Musembi, Director, Directorate of Innovation, Incubation and University Industry Linkages, Kenyatta University'
                                },
                                {
                                    title: 'Session 2',
                                    topic: 'Climate Change and Sustainability: Why Professionals Should be on the Drivers Seat',
                                    chair: 'Prof. CPA Elizabeth N. Kalunda Muvui, PhD, Chairperson, Institute of Certified Public Accountants of Kenya',
                                    speaker: 'Dr. Joel Onyango, Ph.D, Director, Monitoring, Evaluation, Learning and Impact, African Centre for Technology Studies'
                                }
                            ]
                        },
                        {
                            time: '1:00p.m. – 2:00p.m.',
                            title: 'Lunch & Networking',
                            facilitator: 'All',
                            type: 'break'
                        },
                        {
                            time: '2:00p.m. – 2:30p.m.',
                            title: 'Networking & Tour of Exhibition',
                            facilitator: 'All',
                            type: 'break'
                        },
                        {
                            time: '2:30p.m. – 4:00p.m.',
                            title: 'Panel',
                            description: `
                                <ul class='space-y-2'>
                                    <li><strong>Topic 1:</strong> A Sustainable Future: The Nexus Between Training, Research, Innovation and Impact</li>
                                    <li><strong>Topic 2:</strong> The Professional in the Age of AI: Competence, Ethics and Accountability</li>
                                    <li><strong>Topic 3:</strong> Quality Professionals in the New World Order</li>
                                    <li><strong>Question & Answer Session</strong></li>
                                </ul>
                            `,
                            facilitator: `
                                Session Chair: Prof. Kenneth Wyne Mutuma, Honorary Secretary, Association of
                                Professional Societies in East Africa<br>
                                FCS Jeremiah Karanja, Chief Executive Officer, Institute of Certified Secretaries<br>
                                Mr. Gerald Kiti, Principal Legal Counsel at the Senate of Kenya and a Legal Practitioner<br>
                                Mrs. Esther Ngari, EBS, Director General, Kenya Bureau of Standards
                            `,
                            type: 'normal'
                        },
                        {
                            time: '2:30p.m. – 4:00p.m.',
                            title: 'Mentorship Clinic',
                            facilitator: 'KASNEB',
                            type: 'normal'
                        },
                        {
                            time: '4:00p.m. – 5:00p.m.',
                            title: 'Health Break',
                            facilitator: 'All',
                            type: 'break'
                        },
                        {
                            time: '5:00p.m. – 6:00p.m.',
                            title: 'Networking & Tour of Exhibition',
                            facilitator: 'All',
                            type: 'break'
                        }
                    ]
                },

                4: {
                    title: 'DAY 4: THURSDAY, 29th OCTOBER 2026',
                    subtitle: 'Digital Economy, Policy, Wellness & Innovation',
                    sessions: [
                        {
                            time: '8:00a.m. – 9:00a.m.',
                            title: 'Registration and Networking Breakfast',
                            facilitator: 'All',
                            type: 'normal'
                        },
                        {
                            time: '9:00a.m. – 10:30a.m.',
                            title: 'Morning Reflection & Plenary Session',
                            description: `
                                <ul class='space-y-2'>
                                    <li>
                                        <strong>Topic 1:</strong> Digital Economy: How Professionals from Diverse
                                        Sectors Can Capitalize on the Opportunities and Mitigate Threats
                                    </li>
                                    <li>
                                        <strong>Topic 2:</strong> The Investor’s Mindset: Investing for Profit,
                                        People and Planet the Tech way
                                    </li>
                                    <li>
                                        <strong>Topic 3:</strong> Smarter, Faster, Different & Ethical: Keeping it
                                        Professional in the Era of AI
                                    </li>
                                    <li><strong>Question & Answer Session</strong></li>
                                </ul>
                            `,
                            facilitator: `
                                Mr. Johnson Mwakazi, Master of Ceremony<br>
                                Session Chair: FCPA Philip Kakai, Board Member, KASNEB<br>
                                Ms. Linah Ngumba, In-Charge, ICT and Digital Economy, Kenya National Bureau of Statistics<br>
                                Ms. Caroline Chelangat, Unit Manager - Global Markets, Standard Investment Bank<br>
                                Mr. Adam Lane, Director, Policy & Partnerships, Huawei Kenya
                            `,
                            type: 'normal'
                        },
                        {
                            time: '10:30a.m. – 11:00a.m.',
                            title: 'Health Break',
                            facilitator: 'All',
                            type: 'break'
                        },
                        {
                            time: '11:00a.m. – 12:30p.m.',
                            title: 'Parallel Sessions',
                            type: 'parallel',
                            sessions: [
                                {
                                    title: 'Keynote Address',
                                    topic: 'The Role of Parliament in Strengthening Professional Standards and National Competitiveness',
                                    chair: 'Mr. Charles Kanjama, President, Law Society of Kenya',
                                    speaker: 'Mr. Samuel Njoroge, CBS, The Clerk of The National Assembly'
                                },
                                {
                                    title: 'Fireside Chat',
                                    topic: 'Inside Parliament: The Policies and Laws That Will Shape the Next Decade of Professional Practice',
                                    chair: 'Mr. Charles Kanjama, President, Law Society of Kenya',
                                    discussantLabel: 'Participants',
                                    discussants: [
                                        'Hon. Dick Maungu, Chairman, Public Investment Committee on Governance and Education',
                                        'Hon. Mohammed Fatuma Zinab, Chairperson, Special Funds Accounts Committee'
                                    ]
                                },
                                {
                                    title: 'Panel B',
                                    topic: 'Turning Today’s Savings into Tomorrow’s Financial Wellness: How to Be a Wealthy Retiree',
                                    chair: 'FA Diana Muriuki-Maina, Chief Executive Officer, Institute of Certified Investment and Financial Analysts',
                                    discussantLabel: 'Panellists',
                                    speakerLabel: 'Panellist',
                                    speaker: 'Ms. Millicent Awiti, General Manager (Strategy, Research & Risk), National Social Security Fund',
                                    discussants: [
                                        'Mr. Timothy Wambui, Director Investments and Executive Director, CPF Asset Managers, CPF Group'
                                    ]
                                },
                                {
                                    title: 'Panel C, Part I',
                                    topic: 'Borrowing for Growth: Is Kenya Getting the Balance Right?',
                                    chair: 'FCPA Julius Mwatu, Board of Trustee, KASNEB Foundation',
                                    speaker: 'Mr. Raphael Owino Otieno, Director General, Public Debt Management Office, The National Treasury',
                                    discussants: ['FCPA Dr. Benson Okundi, Partner/Director, PricewaterhouseCoopers']
                                },
                                {
                                    title: 'Panel C, Part II: Presentation',
                                    topic: 'IPSAS accrual accounting: Overview of milestones and benefits in government accrual accounting',
                                    chair: 'FCPA Julius Mwatu, Board of Trustee, KASNEB Foundation',
                                    speaker: 'FCPA Pius Mungai Nduatih, Chairman, Public Sector Accounting Standards Board of Kenya'
                                }
                            ]
                        },
                        {
                            time: '12:30p.m. – 1:00p.m.',
                            title: 'Networking & Tour of Exhibition',
                            facilitator: 'All',
                            type: 'break'
                        },
                        {
                            time: '1:00p.m. – 2:00p.m.',
                            title: 'Lunch & Networking',
                            facilitator: 'All',
                            type: 'break'
                        },
                        {
                            time: '2:00p.m. – 3:00p.m.',
                            title: 'Panel Session: Health, Wellness and Work Life Balance',
                            facilitator: `
                                Session Chair: Prof. CPA Elizabeth N. Kalunda Muvui, PhD,
                                Chairperson, Institute of Certified Public Accountants of Kenya
                            `,
                            description: `
                                <strong>Panellists:</strong>
                                <ul class='mt-2 space-y-1'>
                                    <li>Mrs. Lina Njoroge, Chief Executive Officer Nutrition Consultant & Wellness Expert, Total Lifestyle Change and Wellness Centre</li>
                                    <li>Dr. Rose Ngondi, Head of Training and Research, Chiromo Hospital Group</li>
                                    <li>Dr. Job Zackariah Bosire, Clinical Instructor OLYMPUS, Consultant BF SUMA, Eagle Wellness Centers East Africa</li>
                                </ul>
                            `,
                            type: 'normal'
                        },
                        {
                            time: '3:00p.m. – 3:30p.m.',
                            title: 'Presentation: The Power of Media in Shaping Professional Reputation, Institutional Credibility and Public Accountability',
                            facilitator: `
                                Session Chair: FCS Joshua Wambua, Board Member, KASNEB<br>
                                Mr. Geoffrey Odundo, Group Managing Director & Chief Executive Officer, Nation Media Group
                            `,
                            type: 'normal'
                        },
                        {
                            time: '3:30p.m. – 4:00p.m.',
                            title: 'Presentation: Transforming TVET for the Future: Bridging Skills, Professional Qualifications and Industry Needs in a Changing Economy',
                            facilitator: `
                                Session Chair: CPA Francis M. Kariuki, Board Member, KASNEB<br>
                                Dr. Esther Thaara Muoria, PhD, Principal Secretary, State Department for Technical,
                                Vocational Education and Training
                            `,
                            type: 'normal'
                        },
                        {
                            time: '4:00p.m. – 5:00p.m.',
                            title: 'Innovation Showcase / Tech Demonstrations',
                            facilitator: 'Universities & TVETs',
                            type: 'normal'
                        },
                        {
                            time: '5:00p.m. – 5:30p.m.',
                            title: 'Health Break',
                            facilitator: 'All',
                            type: 'break'
                        },
                        {
                            time: '5:30p.m. – 6:30p.m.',
                            title: 'Networking & Tour of Exhibition',
                            facilitator: 'All',
                            type: 'break'
                        },
                        {
                            time: '6:30p.m. – 9:00p.m.',
                            title: 'Gala Dinner',
                            facilitator: 'All',
                            type: 'break'
                        }
                    ]
                },

                5: {
                    title: 'DAY 5: FRIDAY, 30th OCTOBER 2026',
                    subtitle: 'Professional Standards, Leadership & Closing',
                    sessions: [
                        {
                            time: '8:00a.m. – 9:00a.m.',
                            title: 'Registration and Networking Breakfast',
                            facilitator: 'All',
                            type: 'normal'
                        },
                        {
                            time: '9:00a.m. – 9:10a.m.',
                            title: 'Morning Reflection',
                            facilitator: 'Mr. Johnson Mwakazi, Master of Ceremony',
                            type: 'normal'
                        },
                        {
                            time: '9:10a.m. – 10:10a.m.',
                            title: 'Panel Session',
                            description: `
                                <strong>Topic:</strong> Future-Proofing Academic and Professional Standards
                                Through Innovation in a Rapidly Changing World
                            `,
                            facilitator: `
                                Session Chair: Dr. Joseph Kanyi, Ph.D, Vice Chairman, KASNEB Board<br>
                                Prof. Mike Kuria, Commission Secretary/CEO, Commission for University Education<br>
                                Dr. Alice Kande, Director General, Kenya National Qualifications Authority<br>
                                Dr. David Njengere, Chief Executive Officer, Kenya National Examinations Council<br>
                                Mr. Geoffrey Monari, Chief Executive Officer, Higher Education Loans Board
                            `,
                            type: 'normal'
                        },
                        {
                            time: '10:10a.m. – 11:10a.m.',
                            title: 'Panel Session',
                            description: `
                                <strong>Topic:</strong> Are we Training Professionals for a World That No Longer
                                Exists?: Showcasing Transformations in Training
                            `,
                            facilitator: `
                                Session Chair: Dr. Edwin Tarno, PhD, HSC, Chief Executive Officer, Kenya School of TVET<br>
                                Mr. Shadrack Tonui, Chairman, Kenya Association of Technical Training Institutions<br>
                                Dr. Charles Koech, Chief Principal, Eldoret National Polytechnic<br>
                                Dr. Mutembei Kigige, PhD, Chief Principal, Meru National Polytechnic<br>
                                Dr. Joshua Aura, Ph.D, CPA, Chief Executive Officer, RCM College
                            `,
                            type: 'normal'
                        },
                        {
                            time: '11:10a.m. – 11:30a.m.',
                            title: 'Health Break',
                            facilitator: 'All',
                            type: 'break'
                        },
                        {
                            time: '11:30a.m. – 1:30p.m.',
                            title: 'Conference Closing',
                            description: `
                                <ul class='space-y-2'>
                                    <li><strong>Brief Entertainment</strong></li>
                                    <li>
                                        <strong>Presentation:</strong> A Reset of Curricula, Learning and
                                        Assessments to Mold Thriving Professionals in a Rapidly Changing World —
                                        Prof. Nicholas K. Letting’, Ph.D, EBS
                                    </li>
                                    <li>
                                        <strong>Presentation:</strong> Building the Future We Want Today Through
                                        Impactful Professional Development — Prof. Manasseh Nshuti, Chairman,
                                        Board of Promoters, University of Kigali
                                    </li>
                                    <li><strong>Conference Resolutions:</strong> Prof. Nicholas K. Letting’, PhD, EBS</li>
                                    <li><strong>Remarks:</strong> Dr. Percy Opio, Board Chairman, KASNEB</li>
                                    <li>
                                        <strong>Official Closing Remarks:</strong> Turning Ideas to Impact Beyond
                                        the Conference — Mr. Lawrence Kibet, Director General, Public Investments
                                        and Portfolio Management, The National Treasury
                                    </li>
                                </ul>
                            `,
                            facilitator: `
                                Mr. Johnson Mwakazi, Master of Ceremony<br>
                                Prof. Nicholas K. Letting’, PhD, EBS, Secretary/Chief Executive Officer, KASNEB
                            `,
                            type: 'normal'
                        },
                        {
                            time: '1:30p.m. – 2:30p.m.',
                            title: 'Lunch & Networking',
                            facilitator: 'All',
                            type: 'break'
                        }
                    ]
                }
            }
        }"
    >

        <!-- Tabs -->
        <nav class="flex justify-center gap-3 sm:gap-4 mb-8 flex-wrap">
            <template x-for="day in [1,2,3,4,5]" :key="day">
                <button
                    type="button"
                    @click="activeTab = day"
                    class="inline-flex items-center justify-center px-6 sm:px-8 py-2 sm:py-3 rounded-full
                           transition-all duration-300 font-medium text-sm sm:text-base shadow-lg"
                    :class="activeTab === day
                        ? 'bg-gradient-to-r from-[#175C93] to-[#7BC7F0] text-white'
                        : 'bg-transparent border border-[#84C1D9] text-[#84C1D9] hover:bg-[#175C93] hover:text-white'"
                >
                    Day <span x-text="day" class="ml-1"></span>
                </button>
            </template>
        </nav>

        <!-- Programme -->
        <template x-for="day in [1,2,3,4,5]" :key="day">

            <section
                x-show="activeTab === day"
                x-cloak
            >

                <div
                        class="grid grid-cols-1 lg:grid-cols-2 gap-8 sm:gap-12"
                        :class="day === 1 ? 'lg:grid-cols-1' : ''" >

                    <!-- Morning / first column -->
                    <div
                        class="bg-white rounded-xl shadow-xl overflow-hidden flex flex-col"
                        :style="day !== 1 ? 'height:680px' : 'height:auto'"
                    >

                        <div
                            class="bg-gradient-to-r from-[#175C93] to-[#7BC7F0]
                                   text-white p-4 sm:p-6 flex-shrink-0"
                        >
                            <h4
                                class="text-lg sm:text-xl font-bold"
                                x-text="days[day].title"
                            ></h4>

                            <p
                                class="text-xs sm:text-sm opacity-90 mt-1"
                                x-text="days[day].subtitle"
                            ></p>
                        </div>

                        <div class="p-4 sm:p-6 relative flex-1 overflow-y-auto">

                            <div class="space-y-4 sm:space-y-6 relative">

                                <div
                                    class="absolute left-[5px] top-[6px] bottom-[6px]
                                           w-0.5 bg-[#ef4444]"
                                ></div>

                                <template
                                    x-for="(session, index) in days[day].sessions.slice(
                                        0,
                                        Math.ceil(days[day].sessions.length / 2)
                                    )"
                                    :key="index"
                                >

                                    <div
                                        class="flex relative"
                                        :class="session.type === 'break'
                                            ? 'bg-[#84C1D9] rounded text-white p-2'
                                            : ''"
                                    >

                                        <!-- Timeline marker -->
                                        <div class="relative flex-shrink-0">

                                            <div
                                                class="w-3 h-3 bg-[#ef4444] rounded-full
                                                       shadow-lg shadow-[#ef4444]/50
                                                       z-10 relative"
                                            ></div>

                                            <div
                                                class="absolute inset-0 w-3 h-3 bg-[#ef4444]
                                                       rounded-full opacity-30 animate-ping"
                                            ></div>

                                        </div>

                                        <div class="ml-4 sm:ml-6 flex-1">

                                            <!-- Time -->
                                            <div
                                                class="text-xs sm:text-sm font-bold mb-1"
                                                :class="session.type === 'break'
                                                    ? 'text-white'
                                                    : 'text-[#84C1D9]'"
                                                x-text="session.time"
                                            ></div>

                                            <!-- Title -->
                                            <h5
                                                class="text-sm sm:text-base font-medium"
                                                :class="session.type === 'break'
                                                    ? 'text-white'
                                                    : 'text-[#1a365d]'"
                                                x-text="session.title"
                                            ></h5>

                                            <!-- Description -->
                                            <div
                                                x-show="session.description"
                                                class="mt-2 text-sm leading-relaxed"
                                                :class="session.type === 'break'
                                                    ? 'text-white'
                                                    : 'text-gray-700'"
                                                x-html="session.description"
                                            ></div>

                                            <!-- Parallel sessions -->
                                            <div
                                                x-show="session.type === 'parallel'"
                                                class="mt-3 space-y-3"
                                            >

                                                <template
                                                    x-for="(parallel, pIndex) in session.sessions"
                                                    :key="pIndex"
                                                >

                                                    <div
                                                        class="p-3 sm:p-4 bg-[#DAECF3]
                                                               rounded-lg shadow-sm"
                                                    >

                                                        <h6
                                                            class="font-bold text-[#175C93] text-sm sm:text-base"
                                                            x-text="parallel.title"
                                                        ></h6>

                                                        <p
                                                            class="mt-1 text-sm text-[#1a365d]"
                                                        >
                                                            <strong>Topic:</strong>
                                                            <span x-text="parallel.topic"></span>
                                                        </p>

                                                        <p
                                                            x-show="parallel.chair"
                                                            class="mt-2 text-xs sm:text-sm text-[#84C1D9] italic"
                                                        >
                                                            <strong>Session Chair:</strong>
                                                            <span x-text="parallel.chair"></span>
                                                        </p>

                                                        <p
                                                            x-show="parallel.speaker"
                                                            class="mt-2 text-xs sm:text-sm text-[#84C1D9] italic"
                                                        >
                                                            <strong x-text="parallel.speakerLabel || 'Speaker'"></strong>:
                                                            <span x-text="parallel.speaker"></span>
                                                        </p>

                                                        <div
                                                            x-show="parallel.discussants && parallel.discussants.length"
                                                            class="mt-2"
                                                        >
                                                            <strong class="text-xs sm:text-sm text-[#84C1D9]">
                                                                <span x-text="parallel.discussantLabel || 'Discussants'"></span>:
                                                            </strong>

                                                            <ul class="mt-1 space-y-1">
                                                                <template x-for="(person, personIndex) in parallel.discussants" :key="personIndex">
                                                                    <li
                                                                        class="text-xs sm:text-sm text-gray-700"
                                                                        x-text="person"
                                                                    ></li>
                                                                </template>
                                                            </ul>
                                                        </div>

                                                    </div>

                                                </template>

                                            </div>

                                            <!-- Facilitator -->
                                            <div
                                                x-show="session.facilitator"
                                                class="flex items-start gap-1 mt-2"
                                            >

                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    class="w-3 h-3 text-[#84C1D9] flex-shrink-0 mt-1"
                                                    viewBox="0 0 24 24"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    stroke-width="2"
                                                >
                                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                    <circle cx="12" cy="7" r="4"></circle>
                                                </svg>

                                                <h6
                                                    class="text-[#84C1D9] text-xs italic font-normal leading-tight"
                                                    x-html="session.facilitator"
                                                ></h6>

                                            </div>

                                        </div>

                                    </div>

                                </template>

                            </div>

                        </div>

                    </div>


                    <!-- Afternoon / second column -->
                    <div
                        class="bg-white rounded-xl shadow-xl overflow-hidden flex flex-col"
                        style="height:680px"  x-show="day !== 1"
                    >

                        <div
                            class="bg-gradient-to-r from-[#175C93] to-[#7BC7F0]
                                   text-white p-4 sm:p-6 flex-shrink-0"
                        >
                            <h4 class="text-lg sm:text-xl font-bold">
                                <span x-text="'DAY ' + day"></span>
                            </h4>

                            <p class="text-xs sm:text-sm opacity-90 mt-1">
                                Afternoon session
                            </p>
                        </div>

                        <div class="p-4 sm:p-6 relative flex-1 overflow-y-auto">

                            <div class="space-y-4 sm:space-y-6 relative">

                                <div
                                    class="absolute left-[5px] top-[6px] bottom-[6px]
                                           w-0.5 bg-[#ef4444]"
                                ></div>

                                <template
                                    x-for="(session, index) in days[day].sessions.slice(
                                        Math.ceil(days[day].sessions.length / 2)
                                    )"
                                    :key="index"
                                >

                                    <div
                                        class="flex relative"
                                        :class="session.type === 'break'
                                            ? 'bg-[#84C1D9] rounded text-white p-2'
                                            : ''"
                                    >

                                        <div class="relative flex-shrink-0">

                                            <div
                                                class="w-3 h-3 bg-[#ef4444] rounded-full
                                                       shadow-lg shadow-[#ef4444]/50
                                                       z-10 relative"
                                            ></div>

                                            <div
                                                class="absolute inset-0 w-3 h-3 bg-[#ef4444]
                                                       rounded-full opacity-30 animate-ping"
                                            ></div>

                                        </div>

                                        <div class="ml-4 sm:ml-6 flex-1">

                                            <div
                                                class="text-xs sm:text-sm font-bold mb-1"
                                                :class="session.type === 'break'
                                                    ? 'text-white'
                                                    : 'text-[#84C1D9]'"
                                                x-text="session.time"
                                            ></div>

                                            <h5
                                                class="text-sm sm:text-base font-medium"
                                                :class="session.type === 'break'
                                                    ? 'text-white'
                                                    : 'text-[#1a365d]'"
                                                x-text="session.title"
                                            ></h5>

                                            <div
                                                x-show="session.description"
                                                class="mt-2 text-sm leading-relaxed"
                                                :class="session.type === 'break'
                                                    ? 'text-white'
                                                    : 'text-gray-700'"
                                                x-html="session.description"
                                            ></div>

                                            <div
                                                x-show="session.type === 'parallel'"
                                                class="mt-3 space-y-3"
                                            >

                                                <template
                                                    x-for="(parallel, pIndex) in session.sessions"
                                                    :key="pIndex"
                                                >

                                                    <div
                                                        class="p-3 sm:p-4 bg-[#DAECF3]
                                                               rounded-lg shadow-sm"
                                                    >

                                                        <h6
                                                            class="font-bold text-[#175C93] text-sm sm:text-base"
                                                            x-text="parallel.title"
                                                        ></h6>

                                                        <p class="mt-1 text-sm text-[#1a365d]">
                                                            <strong>Topic:</strong>
                                                            <span x-text="parallel.topic"></span>
                                                        </p>

                                                        <p
                                                            x-show="parallel.chair"
                                                            class="mt-2 text-xs sm:text-sm text-[#84C1D9] italic"
                                                        >
                                                            <strong>Session Chair:</strong>
                                                            <span x-text="parallel.chair"></span>
                                                        </p>

                                                        <p
                                                            x-show="parallel.speaker"
                                                            class="mt-2 text-xs sm:text-sm text-[#84C1D9] italic"
                                                        >
                                                            <strong x-text="parallel.speakerLabel || 'Speaker'"></strong>:
                                                            <span x-text="parallel.speaker"></span>
                                                        </p>

                                                        <div
                                                            x-show="parallel.discussants && parallel.discussants.length"
                                                            class="mt-2"
                                                        >
                                                            <strong class="text-xs sm:text-sm text-[#84C1D9]">
                                                                <span x-text="parallel.discussantLabel || 'Discussants'"></span>:
                                                            </strong>

                                                            <ul class="mt-1 space-y-1">
                                                                <template x-for="(person, personIndex) in parallel.discussants" :key="personIndex">
                                                                    <li
                                                                        class="text-xs sm:text-sm text-gray-700"
                                                                        x-text="person"
                                                                    ></li>
                                                                </template>
                                                            </ul>
                                                        </div>

                                                    </div>

                                                </template>

                                            </div>

                                            <div
                                                x-show="session.facilitator"
                                                class="flex items-start gap-1 mt-2"
                                            >

                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    class="w-3 h-3 text-[#84C1D9] flex-shrink-0 mt-1"
                                                    viewBox="0 0 24 24"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    stroke-width="2"
                                                >
                                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                    <circle cx="12" cy="7" r="4"></circle>
                                                </svg>

                                                <h6
                                                    class="text-[#84C1D9] text-xs italic font-normal leading-tight"
                                                    x-html="session.facilitator"
                                                ></h6>

                                            </div>

                                        </div>

                                    </div>

                                </template>

                            </div>

                        </div>

                    </div>

                </div>

            </section>

        </template>

        <div class="mt-8 text-center">
            <a
                href="{{ route('programme') }}"
                download
                class="inline-flex items-center justify-center rounded-full bg-[#175C93] px-6 py-3
                       font-medium text-white shadow-lg transition-colors hover:bg-[#124b78]"
            >
                Download the Full Programme (PDF)
            </a>
        </div>

    </div>
</section>
