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
                    title: 'DAY ONE: MONDAY, 14 SEPTEMBER 2026',
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
                    title: 'DAY TWO: TUESDAY, 15 SEPTEMBER 2026',
                    subtitle: 'Conference Opening & Leadership',
                    sessions: [
                        {
                            time: '8:00a.m. – 9:00a.m.',
                            title: 'Registration and Networking Breakfast',
                            facilitator: 'All',
                            type: 'normal'
                        },

                        {
                            time: '9:00a.m. – 10:30a.m.',
                            title: 'Setting the Stage',
                            description: `
                                <ul class='space-y-2'>
                                    <li><strong>National Anthem & Prayers</strong></li>
                                    <li><strong>Welcome Remarks</strong> (10 minutes)</li>
                                    <li><strong>Opening Remarks</strong> (15 minutes)</li>
                                    <li>
                                        <strong>Opening Keynote Address</strong> (20 minutes)<br>
                                        Topic: Professionals as Catalysts for Global Competitiveness
                                    </li>
                                    <li>
                                        <strong>Fireside Chat</strong> (45 minutes)<br>
                                        Topic: The Reinvented Leader: Leading Evolving Professionals in a Dynamic Work Environment
                                    </li>
                                </ul>
                            `,
                            facilitator: `
                                Master of Ceremony<br>
                                Prof. Nicholas K. Letting’, Ph.D, EBS, HSC<br>
                                Dr. Percy Opio<br>
                                Mr. Paul Russo, EBS<br>
                                Prof. Charles Ochieng’ Ong’ondo
                            `,
                            type: 'normal'
                        },

                        {
                            time: '10:30a.m. – 11:00a.m.',
                            title: 'Exhibition Tour by Guests & Health Break',
                            facilitator: 'Dr. Percy Opio, Board Chairman, KASNEB',
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
                                    chair: 'Prof. Charles Ochieng’ Ong’ondo, Chief Executive Officer, Kenya Institute of Curriculum Development',
                                    speaker: 'Mrs. Funmi Ekundayo, FCIS, President, Corporate Secretaries International Association',
                                    discussants: [
                                        'Dr. George Wakah, Director of Administration, Finance and Corporate Affairs, Centre for Parliamentary Studies and Training (CPST)',
                                        'Prof. Nura Mohamed, Director General, Kenya School of Government'
                                    ]
                                },

                                {
                                    title: 'Session 2',
                                    topic: 'The Smart City',
                                    chair: 'Prof. Nicholas K. Letting’, Ph.D, EBS, HSC, Chief Executive Officer, KASNEB',
                                    speaker: 'Ms. Anacláudia Rossbach, Executive Director, UN-Habitat in Nairobi',
                                    discussants: [
                                        'Mr. John Okwiri, OGW, MBA, MCIPS, Chief Executive Officer, Technopolis Development Authority',
                                        'Dr. Kenneth Chelule, P. Eng, FIET, EBS, Chief Executive Officer, Special Economic Zones Authority'
                                    ]
                                },

                                {
                                    title: 'Session 3',
                                    topic: 'Geopolitical Conflicts Driving High Cost of Living: Navigating Crisis the Professional Way',
                                    chair: 'Prof. Isaiah I.C. Wakindiki, Vice Chancellor, KCA University',
                                    speaker: 'Dr. Workneh Gebeyehu, Executive Director, Intergovernmental Authority on Development',
                                    discussants: [
                                        'Dr. Korir Sing’Oei, Principal Secretary, Foreign Affairs',
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
                            title: 'The Debate: Can Robots Be Professional?',
                            facilitator: 'KCA University',
                            type: 'normal'
                        },

                        {
                            time: '2:30p.m. – 4:00p.m.',
                            title: 'Parallel Sessions',
                            type: 'parallel',

                            sessions: [
                                {
                                    title: 'Masterclass',
                                    topic: 'Beyond the Paycheck: Building Wealth That Lasts for Generations',
                                    chair: 'Dr. George Wakah, Director of Administration, Finance and Corporate Affairs, Centre for Parliamentary Studies and Training (CPST)',
                                    speaker: 'Mr. Philip Lopokoiyit, Chief Executive Officer, ICEA Lion Group'
                                },

                                {
                                    title: 'Panel Session',
                                    topic: 'Evolving Professional Standards in Response to Technological Changes',
                                    chair: 'CS Judy Olive Warui-Omurwa, Board Member, KASNEB',
                                    discussants: [
                                        'Prof. CPA Elizabeth Kalunda, President, Institute of Certified Public Accountants of Kenya',
                                        'FCS Jacqueline Waihenya, Chairperson, Institute of Certified Secretaries of Kenya',
                                        'Mr. Charles Kanjama, President, Law Society of Kenya',
                                        'FFA Leah Nyambura-Kagumba, Chairperson, Institute of Certified Investment and Financial Analysts',
                                        'Mr. John Karani, MBS, Chairman, Kenya Institute of Supplies Management',
                                        'CHRP. Dalmas Odero, Chairman, Institute of Human Resource Management'
                                    ]
                                },

                                {
                                    title: 'Keynote',
                                    topic: 'Professional and Political Leadership: Are They Complementary or Conflicting?',
                                    chair: 'Seth Abeka, Chief Executive Officer, University of Nairobi Enterprise Services',
                                    speaker: 'Sen. Justice (Rtd.) Madzayo Stewart Mwachiru, EGH, MP, Senate Deputy Minority Leader',
                                    discussants: [
                                        'Dr. David Ndii, Economist, Author and President’s Policy Advisor',
                                        'Mr. Leonid Ashindu, Vice Chairman, Association of Professional Society in East Africa'
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
                    title: 'DAY THREE: WEDNESDAY, 16 SEPTEMBER 2026',
                    subtitle: 'Conference Official Opening',
                    sessions: [
                        {
                            time: '8:00a.m. – 9:00a.m.',
                            title: 'Registration and Networking Breakfast',
                            facilitator: 'All',
                            type: 'normal'
                        },

                        {
                            time: '9:00a.m. – 11:05a.m.',
                            title: 'Setting the Stage',
                            description: `
                                <ul class='space-y-2'>
                                    <li>National Anthem & Prayers (5 minutes)</li>
                                    <li>Entertainment (10 minutes)</li>
                                    <li>Introduction & Objectives (10 minutes)</li>
                                    <li>Welcome Remarks (15 minutes)</li>
                                    <li>
                                        Presentation: Legislative and Regulatory Agility in a Rapidly Evolving World
                                        (20 minutes)
                                    </li>
                                    <li>
                                        Address: Professional Fine Tuning: How Can Industry, Regulators and Policymakers
                                        Collaborate to Build Future-Ready Professionals in the Era of AI, Sustainability
                                        and Global Disruption? (20 minutes)
                                    </li>
                                    <li>
                                        Address: Beyond Competence: Professionals as the Architects of Value Driven
                                        Productivity and National Transformation (20 minutes)
                                    </li>
                                    <li>
                                        Keynote Address: The Strategic Role of African Professionals in Advancing
                                        Competitiveness and Economic Transformation Beyond Borders (25 minutes)
                                    </li>
                                </ul>
                            `,
                            facilitator: `
                                Master of Ceremony<br>
                                Prof. Nicholas K. Letting’, Ph.D, EBS, HSC<br>
                                Dr. Percy Opio<br>
                                Hon. Dorcas Oduor, SC, EGH<br>
                                FCPA Hon. John Mbadi, EGH<br>
                                Deputy President of ROK OR The Head of the Public Service<br>
                                H.E. Chileshe Mpundu Kapwepwe
                            `,
                            type: 'normal'
                        },

                        {
                            time: '11:05a.m. – 11:30a.m.',
                            title: 'Exhibition Tour by Guests & Tea Break',
                            facilitator: 'Dr. Percy Opio, Board Chairman, KASNEB',
                            type: 'break'
                        },

                        {
                            time: '11:30a.m. – 12:00p.m.',
                            title: 'Presentation: Professionals Building Institutions that Outlast the Leader',
                            facilitator: 'Session Chair: CPA Francis M. Kariuki, Board Member, KASNEB',
                            description: 'Dr. Martin Oduor Otieno, Chief Executive Officer, The Leadership Group Limited',
                            type: 'normal'
                        },

                        {
                            time: '12:00p.m. – 1:00p.m.',
                            title: 'Parallel Sessions',
                            type: 'parallel',

                            sessions: [
                                {
                                    title: 'Session 1',
                                    topic: 'Professionals Transversing the World: Global Job Opportunities and How to Clinch Them',
                                    chair: 'Ms Samantha Kipury, Board Member, KASNEB',
                                    speaker: 'Mr. Jeremy Awori, Chief Executive Officer, Eco Bank',
                                    discussants: [
                                        'Mrs. Edith Okoki, Director General, National Employment Authority'
                                    ]
                                },

                                {
                                    title: 'Session 2',
                                    topic: 'Innovation and Intellectual Property Rights: What Professionals Need to Know',
                                    chair: 'FCPA Philip Kakai, Board Member, KASNEB',
                                    speaker: 'Dr. Tony Omwanza, Chief Executive Officer, Kenya National Innovation Agency',
                                    discussants: [
                                        'Dr. Susan Musembi, Director, Directorate of Innovation, Incubation and University Industry Linkages'
                                    ]
                                },

                                {
                                    title: 'Session 3',
                                    topic: 'Climate Change and Sustainability: Why Professionals Should be on the Drivers Seat',
                                    chair: 'FCS Joshua Wambua, Board Member, KASNEB',
                                    speaker: 'Prof. Tom Ogada, Executive Director, African Centre for Technology Studies (ACTS)',
                                    discussants: [
                                        'Dr. Pacifica Achieng Ogola, Director, Climate Change, Ministry of Environment and Forestry'
                                    ]
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
                            title: 'Debate: Borrowing is the Price to Pay for Prosperity',
                            facilitator: 'Strathmore University',
                            type: 'normal'
                        },

                        {
                            time: '2:30p.m. – 4:00p.m.',
                            title: 'Plenary Session',
                            description: `
                                <ul class='space-y-2'>
                                    <li><strong>Topic 1:</strong> A Sustainable Future: The Nexus Between Training, Research, Innovation and Impact</li>
                                    <li><strong>Topic 2:</strong> Artificial Intelligence (AI) Ethical Dilemmas</li>
                                    <li><strong>Topic 3:</strong> Quality Professionals in the New World Order</li>
                                    <li><strong>Question & Answer Session</strong></li>
                                </ul>
                            `,
                            facilitator: `
                                Session Chair: Dr. Joseph Kanyi, Ph.D, Vice Chairman, KASNEB Board<br>
                                Prof. Richard Oduor, Registrar, Research, Innovation and Outreach, Kenyatta University<br>
                                Dr. Bright Gameli Mawudor, Founder of Africahackon<br>
                                Mrs. Esther Ngari, EBS, Managing Director, Kenya Bureau of Standards
                            `,
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
                        },

                        {
                            time: '6:30p.m. – 9:00p.m.',
                            title: 'Gala Dinner',
                            facilitator: 'All',
                            type: 'break'
                        }
                    ]
                },

                4: {
                    title: 'DAY FOUR: THURSDAY, 17 SEPTEMBER 2026',
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
                                        <strong>Topic 1:</strong>
                                        Digital Economy: How Professionals from Diverse Sectors Can Capitalize on
                                        the Opportunities and Mitigate Threats
                                    </li>
                                    <li>
                                        <strong>Topic 2:</strong>
                                        The Investor’s Mindset: Investing for Profit, People and Planet the Tech way
                                    </li>
                                    <li>
                                        <strong>Topic 3:</strong>
                                        Smarter, Faster, Different & Ethical: Keeping it Professional in the AI Era
                                    </li>
                                    <li>20 minutes for each presenter</li>
                                </ul>
                            `,
                            facilitator: `
                                Session Chair: Mr. John Karani, MBS, Chairman, Kenya Institute of Supplies Management<br>
                                Amb. Bitange Ndemo, Kenyan Ambassador to the Kingdom of Belgium and European Union<br>
                                Dr. James Mworia Mwirigi, Group Chief Executive Officer and Managing Director,
                                Centum Investment Company<br>
                                Ms. Nanjira Sambuli, Senior Advocacy Officer, Gates Foundation
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
                            time: '11:00a.m. – 11:40a.m.',
                            title: 'The Role of Parliament in Strengthening Professional Standards and National Competitiveness',
                            facilitator: `
                                Hon. Gladys Boss Shollei, Deputy Speaker, National Assembly<br>
                                Session Chair: Ms. Lillian Abishai, Board Member, KASNEB
                            `,
                            type: 'normal'
                        },

                        {
                            time: '11:40a.m. – 12:30p.m.',
                            title: 'Fireside Chat',
                            description: `
                                <strong>Topic:</strong>
                                Inside Parliament: The Policies and Laws That Will Shape the Next Decade of
                                Professional Practice
                            `,
                            facilitator: `
                                Session Chair: Charles Kanjama, President, Law Society of Kenya<br>
                                Hon. Jack Wamboka, Chairman, Public Investment Committee on Governance and Education<br>
                                Hon. Mohammed Fatuma Zinab, Chairperson Special Funds Accounts Committee
                            `,
                            type: 'normal'
                        },

                        {
                            time: '12:30p.m. – 2:00p.m.',
                            title: 'Lunch & Networking',
                            facilitator: 'All',
                            type: 'break'
                        },

                        {
                            time: '2:00p.m. – 3:00p.m.',
                            title: 'Panel Session: Health, Wellness and Work-Life Balance',
                            facilitator: `
                                Session Chair: CHRP Quresha Abdullahi, Chief Executive Officer,
                                Institute of Human Resource Management (IHRM)
                            `,
                            description: `
                                <strong>Panellists:</strong>
                                <ul class='mt-2 space-y-1'>
                                    <li>Mrs. Lina Njoroge, Chief Executive Officer, Nutrition Consultant & Wellness Expert, Total Lifestyle Change and Wellness Centre</li>
                                    <li>Dr. Vincent Hongo, Chief Executive Officer, Chiromo Hospital Group</li>
                                    <li>Ms. Chiki Onwukwe, Fitness Instructor, Choreographer and Media Personality</li>
                                    <li>Dr. Jay Bosire, Health Consultant</li>
                                </ul>
                            `,
                            type: 'normal'
                        },

                        {
                            time: '3:00p.m. – 4:00p.m.',
                            title: 'Innovation Showcase / Tech Demonstrations',
                            facilitator: `
                                Safaricom (sponsor)<br>
                                Jubilee Holdings Limited (sponsor)<br>
                                Universities (3)
                            `,
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

                5: {
                    title: 'DAY FIVE: FRIDAY, 18 SEPTEMBER 2026',
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
                            facilitator: 'Master of Ceremony',
                            type: 'normal'
                        },

                        {
                            time: '9:10a.m. – 10:10a.m.',
                            title: 'Panel Session',
                            description: `
                                <strong>Topic:</strong>
                                Future-Proofing Professional Standards Through Innovation in a Rapidly Changing World
                            `,
                            facilitator: `
                                Session Chair: Dr. Joseph Kanyi, Ph.D, Vice Chairman, KASNEB Board<br>
                                Prof. Mike Kuria, Chief Executive Officer, Commission of University Education<br>
                                Dr. Alice Kande, Director General, Kenya National Qualifications Authority<br>
                                Timothy Nyongesa Katiambo, Chief Executive Officer, TVETA<br>
                                Dr. David Njengere, Chief Executive Officer, Kenya National Examinations Council
                            `,
                            type: 'normal'
                        },

                        {
                            time: '10:10a.m. – 11:10a.m.',
                            title: 'Panel Session',
                            description: `
                                <strong>Topic:</strong>
                                Are we Training Professionals for a World That No Longer Exists?:
                                Showcasing Transformations in Training
                            `,
                            facilitator: `
                                Session Chair: Prof. CPA Elizabeth N. Kalunda-Muvui, PhD, President, ICPAK<br>
                                Mr. Shadrack Tonui, Chairman, Kenya Association of Technical Training Institutions<br>
                                Mrs. Rachel N. Kimani, Chief Principal, Nyeri National Polytechnic<br>
                                Dr. Charles Koech, Chief Principal, Eldoret National Polytechnic<br>
                                Mr. Michael Maina, Chief Principal, Kenya Coast National Polytechnic<br>
                                Mr. Mutembei Kigige, Chief Principal, Meru National Polytechnic<br>
                                Mr. Evans Bosire, Chief Principal, Sigalagala
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
                            time: '11:30a.m. – 12:30p.m.',
                            title: 'Keynote Address',
                            description: `
                                <strong>Topic:</strong>
                                Leadership in an Age of Disruption: Courage, Character and Conviction
                            `,
                            facilitator: `
                                Session Chair: FCS Jacqueline Waihenya, Chairperson, Institute of Certified Secretaries of Kenya<br>
                                Prof. Patrick Lumumba, LLD, D.Litt (hc), D.Sc (hc), FCPS (K), FKIM, FAAS (hon),
                                Chief Executive Officer, PLO Lumumba Foundation
                            `,
                            type: 'normal'
                        },

                        {
                            time: '12:30p.m. – 1:30p.m.',
                            title: 'Conference Closing',
                            description: `
                                <ul class='space-y-2'>
                                    <li>Brief Entertainment</li>
                                    <li>Conference Resolutions</li>
                                    <li>Remarks</li>
                                    <li>Official Closing Remarks</li>
                                </ul>
                            `,
                            facilitator: `
                                Master of Ceremony<br>
                                Prof. Nicholas K. Letting’, CEO, KASNEB<br>
                                Dr. Percy Opio, Board Chairman, KASNEB<br>
                                FCPA Dr. Fernandes Barasa, OGW, Governor, Kakamega County
                            `,
                            type: 'normal'
                        },

                        {
                            time: '1:30p.m. – 2:30p.m.',
                            title: 'Lunch & Networking',
                            facilitator: 'All',
                            type: 'break'
                        },

                        {
                            time: '2:30p.m. – 4:30p.m.',
                            title: 'Excursion & Networking',
                            facilitator: 'Conference Planning Committee',
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
                        :style="day !== 1 ? 'height:680px' : auto"
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
                                                            <strong>Speaker:</strong>
                                                            <span x-text="parallel.speaker"></span>
                                                        </p>

                                                        <div
                                                            x-show="parallel.discussants && parallel.discussants.length"
                                                            class="mt-2"
                                                        >
                                                            <strong class="text-xs sm:text-sm text-[#84C1D9]">
                                                                Discussants:
                                                            </strong>

                                                            <ul class="mt-1 space-y-1">
                                                                <template
                                                                    x-for="(person, personIndex) in parallel.discussants"
                                                                    :key="personIndex"
                                                                >
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
                                                            <strong>Speaker:</strong>
                                                            <span x-text="parallel.speaker"></span>
                                                        </p>

                                                        <div
                                                            x-show="parallel.discussants && parallel.discussants.length"
                                                            class="mt-2"
                                                        >
                                                            <strong class="text-xs sm:text-sm text-[#84C1D9]">
                                                                Discussants:
                                                            </strong>

                                                            <ul class="mt-1 space-y-1">
                                                                <template
                                                                    x-for="(person, personIndex) in parallel.discussants"
                                                                    :key="personIndex"
                                                                >
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

    </div>
</section>
