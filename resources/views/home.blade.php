<x-home-layout>
    <main class="relative">
        @include('layout/partials/_summit-nav')
        <div class="relative w-full section-visible" id="home" style="height: 95vh">
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
    <script type="text/javascript">
        /**
         * Speakers Carousel Functionality
         * Shows 3 speakers per view on desktop, responsive on mobile
         */
        (function () {
            const track = document.getElementById('speakers-carousel-track');
            const prevBtn = document.getElementById('speakers-prev');
            const nextBtn = document.getElementById('speakers-next');

            if (!track || !prevBtn || !nextBtn) {
                console.warn('Speakers carousel elements not found');
                return;
            }

            let currentScroll = 0;
            const speakerCardWidth = 100; // 100% width for each speaker on mobile
            let itemsPerView = 1; // Default mobile view
            let gapSize = 16; // Default gap in pixels (gap-4 = 1rem = 16px)

            // Function to determine items per view based on screen size
            function updateItemsPerView() {
                const width = window.innerWidth;
                if (width >= 1024) { // lg breakpoint
                    itemsPerView = 3;
                    gapSize = 24; // gap-6 = 1.5rem = 24px on larger screens
                } else if (width >= 640) { // sm breakpoint
                    itemsPerView = 2;
                    gapSize = 20; // gap-6 adjusted for sm
                } else {
                    itemsPerView = 1;
                    gapSize = 16; // gap-4
                }
            }

            // Calculate scroll amount
            function getScrollAmount() {
                const trackWidth = track.parentElement.offsetWidth;
                // Calculate the width of one item plus gap
                const itemWidth = (trackWidth - (gapSize * (itemsPerView - 1))) / itemsPerView;
                return itemWidth + gapSize;
            }

            // Update carousel on window resize
            window.addEventListener('resize', () => {
                updateItemsPerView();
            });

            // Previous button click
            prevBtn.addEventListener('click', () => {
                updateItemsPerView();
                const scrollAmount = getScrollAmount();
                currentScroll = Math.max(0, currentScroll - scrollAmount);
                track.style.transform = `translateX(-${currentScroll}px)`;
            });

            // Next button click
            nextBtn.addEventListener('click', () => {
                updateItemsPerView();
                const scrollAmount = getScrollAmount();
                const maxScroll = track.scrollWidth - track.parentElement.offsetWidth;
                currentScroll = Math.min(maxScroll, currentScroll + scrollAmount);
                track.style.transform = `translateX(-${currentScroll}px)`;
            });

            // Initialize
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

        document.addEventListener('DOMContentLoaded', function() {
            // Initialize country select for step 1
            const countryInput = document.querySelector('#country');
            if (countryInput) {
                $(countryInput).countrySelect({
                    defaultCountry: "ke",  // No default country
                    preferredCountries: ['ke', 'tz', 'ug', 'rw'], // African countries preferred
                    responsiveDropdown: true
                });
            }

            // Also initialize for step 2 if needed
            const countryInputStep2 = document.querySelector('#wizardForm #country');
            if (countryInputStep2 && countryInputStep2 !== countryInput) {
                $(countryInputStep2).countrySelect({
                    defaultCountry: "ke",
                    preferredCountries: ['ke', 'tz', 'ug', 'rw'],
                    responsiveDropdown: true
                });
            }
        });

        document.addEventListener('DOMContentLoaded', function() {
            // Initialize country select for step 1
            const countryInput = document.querySelector('#country1');
            if (countryInput) {
                $(countryInput).countrySelect({
                    defaultCountry: "ke",  // No default country
                    preferredCountries: ['ke', 'tz', 'ug', 'rw'], // African countries preferred
                    responsiveDropdown: true
                });
            }

            // Also initialize for step 2 if needed
            const countryInputStep2 = document.querySelector('#wizardForm #country1');
            if (countryInputStep2 && countryInputStep2 !== countryInput) {
                $(countryInputStep2).countrySelect({
                    defaultCountry: "ke",
                    preferredCountries: ['ke', 'tz', 'ug', 'rw'],
                    responsiveDropdown: true
                });
            }
        });

        function wizard() {
            return {
                currentStep: 0,
                steps: ['Delegates Info', 'Ticket Selection', 'Payment'],
                validators: null,
                formData: {
                    fullName: '',
                    email: '',
                    phone: '',
                    country: '',
                    organization: '',
                },
                purchaserLocked: false,
                selectedTickets: [],

                init() {
                    // Wait for Alpine to be ready
                    this.$nextTick(() => {
                        // Small delay to ensure DOM is fully loaded
                        setTimeout(() => {
                            this.setupValidator();
                        }, 200);
                    });

                    // Global click listener to handle Remove Ticket buttons inside ticket cards.
                    const self = this;
                    const removeHandler = function(e) {
                        const btn = e.target.closest && e.target.closest('button');
                        if (!btn) return;
                        if (btn.textContent && btn.textContent.trim() === 'Remove Ticket') {
                            const tile = btn.closest('[x-data]');
                            const heading = tile ? tile.querySelector('h2') : null;
                            const type = heading ? heading.textContent.trim() : null;
                            if (type) {
                                // Remove from selectedTickets if present
                                self.removeTicket(type);
                            }
                        }
                    };
                    document.addEventListener('click', removeHandler);
                },

                // Helper function to create error message with SVG icon
                createErrorMessage(text) {
                    const container = document.createElement('div');
                    container.className = 'text-red-600 text-xs sm:text-sm mt-1.5 flex items-center gap-1.5 animate-fade-in';

                    // Create SVG element
                    const svgNS = "http://www.w3.org/2000/svg";
                    const svg = document.createElementNS(svgNS, "svg");
                    svg.setAttribute("class", "w-4 h-4 flex-shrink-0");
                    svg.setAttribute("fill", "currentColor");
                    svg.setAttribute("viewBox", "0 0 20 20");

                    const path = document.createElementNS(svgNS, "path");
                    path.setAttribute("fill-rule", "evenodd");
                    path.setAttribute("d", "M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z");
                    path.setAttribute("clip-rule", "evenodd");

                    svg.appendChild(path);

                    // Create icon span
                    const iconSpan = document.createElement('span');
                    iconSpan.appendChild(svg);

                    // Create text span
                    const textSpan = document.createElement('span');
                    textSpan.textContent = text;

                    // Add both spans to container
                    container.appendChild(iconSpan);
                    container.appendChild(textSpan);

                    return container;
                },

                setupValidator() {
                    // Clean up old validator if exists
                    if (this.validators) {
                        try {
                            this.validators.destroy();
                        } catch (e) {
                            console.log('Validator destroy error:', e);
                        }
                    }

                    try {
                        // Initialize JustValidate
                        this.validators = new JustValidate('#wizardForm', {
                            errorFieldCssClass: 'border-red-500',
                            errorLabelCssClass: 'text-red-500 text-sm mt-1 hidden', // Hide default label
                            focusInvalidField: true,
                            lockForm: true, // Prevent form submission
                        });

                        // Custom error container creator
                        const createCustomErrorLabel = (field, message) => {
                            const parent = field.parentElement;

                            // Remove existing custom error
                            const existingError = parent.querySelector('.custom-error-container');
                            if (existingError) {
                                existingError.remove();
                            }

                            // Create new error with SVG
                            const errorContainer = this.createErrorMessage(message);
                            errorContainer.classList.add('custom-error-container');
                            parent.appendChild(errorContainer);
                        };

                        // Add validation rules for step 0
                        this.validators
                            .addField('#fullName', [
                                {
                                    rule: 'required',
                                    errorMessage: 'Full name is required'
                                },
                                {
                                    rule: 'minLength',
                                    value: 2,
                                    errorMessage: 'Name must be at least 2 characters'
                                },
                                {
                                    rule: 'maxLength',
                                    value: 50,
                                    errorMessage: 'Name must be less than 50 characters'
                                }
                            ], {
                                errorsContainer: function(field) {
                                    const parent = field.parentElement;
                                    return {
                                        render: function(errors) {
                                            if (errors.length) {
                                                createCustomErrorLabel(field, errors[0]);
                                            }
                                        }
                                    };
                                }
                            })
                            .addField('#email', [
                                {
                                    rule: 'required',
                                    errorMessage: 'Email is required'
                                },
                                {
                                    rule: 'email',
                                    errorMessage: 'Please enter a valid email address'
                                }
                            ], {
                                errorsContainer: function(field) {
                                    const parent = field.parentElement;
                                    return {
                                        render: function(errors) {
                                            if (errors.length) {
                                                createCustomErrorLabel(field, errors[0]);
                                            }
                                        }
                                    };
                                }
                            })
                            .addField('#phone', [
                                {
                                    rule: 'required',
                                    errorMessage: 'Phone number is required'
                                },
                                {
                                    rule: 'customRegexp',
                                    value: /^[\+]?[(]?[0-9]{1,4}[)]?[-\s\.]?[(]?[0-9]{1,4}[)]?[-\s\.]?[0-9]{1,5}[-\s\.]?[0-9]{1,5}$/,
                                    errorMessage: 'Please enter a valid phone number'
                                }
                            ], {
                                errorsContainer: function(field) {
                                    const parent = field.parentElement;
                                    return {
                                        render: function(errors) {
                                            if (errors.length) {
                                                createCustomErrorLabel(field, errors[0]);
                                            }
                                        }
                                    };
                                }
                            })
                            .addField('#country', [
                                {
                                    rule: 'required',
                                    errorMessage: 'Country is required'
                                }
                            ], {
                                errorsContainer: function(field) {
                                    const parent = field.parentElement;
                                    return {
                                        render: function(errors) {
                                            if (errors.length) {
                                                createCustomErrorLabel(field, errors[0]);
                                            }
                                        }
                                    };
                                }
                            });

                        console.log('Validator setup complete');
                    } catch (error) {
                        console.error('Error setting up validator:', error);
                    }
                },

                // New method to validate and go to payment step
                validateAndGoToPayment() {
                    console.log('Validating step 2 and moving to payment');

                    if (this.validateStep2()) {
                        this.saveStep2Data();

                        // Validate Terms & Preferences
                        const termsCheckbox = document.querySelector('#terms');
                        if (termsCheckbox) {
                            const parent = termsCheckbox.closest('.flex.items-start');
                            const existingError = parent.querySelector('.custom-error-container');
                            if (existingError) {
                                existingError.remove();
                            }

                            if (!termsCheckbox.checked) {
                                isValid = false;
                                termsCheckbox.classList.add('border-red-500');

                                const errorContainer = this.createErrorMessage('You must accept the terms and conditions to proceed');
                                errorContainer.classList.add('custom-error-container', 'mt-2');
                                parent.appendChild(errorContainer);
                            } else {
                                termsCheckbox.classList.remove('border-red-500');
                            }
                        }

                        // Move to payment step (step 3)
                        this.currentStep = 3;
                        //console.log('Moving to payment step:', this.currentStep);

                        // Scroll to top of form
                        const wizardForm = document.getElementById('wizardForm');
                        if (wizardForm) {
                            wizardForm.scrollIntoView({ behavior: 'smooth', block: 'start' });
                        }
                    } else {
                        //console.log('Validation failed for step 2');

                        // Scroll to first error
                        const firstError = document.querySelector('.border-red-500');
                        if (firstError) {
                            firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                        }
                    }
                },

                // Validate step 2 (Attendee Details)
                validateStep2() {
                    let isValid = true;
                    this.clearAllErrors();

                    // Validate Purchaser Information
                    const purchaserFields = [
                        { selector: '#fullName1', name: 'Purchaser full name', required: true },
                        { selector: '#wizardForm #email1', name: 'Purchaser email', required: true, isEmail: true },
                        { selector: '#wizardForm #phone1', name: 'Purchaser phone', required: true, isPhone: true },
                        { selector: '#organization', name: 'Organization', required: true },
                        { selector: '#country1', name: 'Purchaser country', required: true }
                    ];

                    // Validate each purchaser field
                    purchaserFields.forEach(field => {
                        const element = document.querySelector(field.selector);
                        if (!element) return;

                        const parent = element.parentElement;
                        element.classList.remove('border-red-500');

                        // Required field validation
                        if (field.required && !element.value.trim()) {
                            element.classList.add('border-red-500');
                            isValid = false;
                            const errorContainer = this.createErrorMessage(`${field.name} is required`);
                            errorContainer.classList.add('custom-error-container');
                            parent.appendChild(errorContainer);
                        }
                        // Email validation
                        else if (field.isEmail && element.value.trim()) {
                            const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
                            if (!emailRegex.test(element.value)) {
                                element.classList.add('border-red-500');
                                isValid = false;
                                const errorContainer = this.createErrorMessage('Please enter a valid email address');
                                errorContainer.classList.add('custom-error-container');
                                parent.appendChild(errorContainer);
                            }
                        }
                        // Phone validation
                        else if (field.isPhone && element.value.trim()) {
                            const digitsOnly = element.value.replace(/\D/g, '');
                            if (digitsOnly.length < 10 || digitsOnly.length > 15) {
                                element.classList.add('border-red-500');
                                isValid = false;
                                const errorContainer = this.createErrorMessage('Phone number must contain 10-15 digits');
                                errorContainer.classList.add('custom-error-container');
                                parent.appendChild(errorContainer);
                            }
                        }
                    });

                    // Validate that at least one ticket is selected
                    if (!this.hasSelectedTickets()) {
                        isValid = false;
                        const ticketSection = document.querySelector('#wizardForm .max-w-7xl .text-center');
                        if (ticketSection) {
                            const errorContainer = this.createErrorMessage('Please select at least one ticket before proceeding');
                            errorContainer.classList.add('custom-error-container', 'mb-4', 'text-center', 'justify-center');
                            errorContainer.style.marginTop = '10px';
                            ticketSection.parentElement.insertBefore(errorContainer, ticketSection.nextSibling);
                        }
                    }

                    // Validate Attendees (if any tickets selected)
                    const totalTickets = this.totalTickets();
                    if (totalTickets > 0) {
                        // Check each attendee section that exists
                        for (let i = 0; i < totalTickets; i++) {
                            const attendeeName = document.querySelector(`#attendee${i}Name`);
                            const attendeeEmail = document.querySelector(`#attendee${i}Email`);
                            const attendeeRole = document.querySelector(`#attendee${i}Role`);
                            const attendeeOrg = document.querySelector(`#attendee${i}Org`);

                            // Validate attendee name
                            if (attendeeName) {
                                const parent = attendeeName.parentElement;
                                attendeeName.classList.remove('border-red-500');

                                if (!attendeeName.value.trim()) {
                                    attendeeName.classList.add('border-red-500');
                                    isValid = false;
                                    const errorContainer = this.createErrorMessage(`Attendee ${i + 1} full name is required`);
                                    errorContainer.classList.add('custom-error-container');
                                    parent.appendChild(errorContainer);
                                }
                            }

                            // Validate attendee email
                            if (attendeeEmail) {
                                const parent = attendeeEmail.parentElement;
                                attendeeEmail.classList.remove('border-red-500');

                                if (!attendeeEmail.value.trim()) {
                                    attendeeEmail.classList.add('border-red-500');
                                    isValid = false;
                                    const errorContainer = this.createErrorMessage(`Attendee ${i + 1} email is required`);
                                    errorContainer.classList.add('custom-error-container');
                                    parent.appendChild(errorContainer);
                                } else {
                                    const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
                                    if (!emailRegex.test(attendeeEmail.value)) {
                                        attendeeEmail.classList.add('border-red-500');
                                        isValid = false;
                                        const errorContainer = this.createErrorMessage(`Please enter a valid email for attendee ${i + 1}`);
                                        errorContainer.classList.add('custom-error-container');
                                        parent.appendChild(errorContainer);
                                    }
                                }
                            }

                            // Validate attendee role
                            if (attendeeRole) {
                                const parent = attendeeRole.parentElement;
                                attendeeRole.classList.remove('border-red-500');

                                if (!attendeeRole.value.trim()) {
                                    attendeeRole.classList.add('border-red-500');
                                    isValid = false;
                                    const errorContainer = this.createErrorMessage(`Attendee ${i + 1} job/role is required`);
                                    errorContainer.classList.add('custom-error-container');
                                    parent.appendChild(errorContainer);
                                }
                            }

                            // Validate attendee organization
                            if (attendeeOrg) {
                                const parent = attendeeOrg.parentElement;
                                attendeeOrg.classList.remove('border-red-500');

                                if (!attendeeOrg.value.trim()) {
                                    attendeeOrg.classList.add('border-red-500');
                                    isValid = false;
                                    const errorContainer = this.createErrorMessage(`Attendee ${i + 1} organization is required`);
                                    errorContainer.classList.add('custom-error-container');
                                    parent.appendChild(errorContainer);
                                }
                            }
                        }
                    }


                    return isValid;
                },

                async validateStep() {
                    console.log('Validating step:', this.currentStep);

                    const stepFields = {
                        0: ['#fullName', '#email', '#phone', '#country'],
                        1: [], // Ticket selection - handled separately
                        2: [] // Payment - to be implemented
                    };

                    // if (this.currentStep === 2) {
                    //     // Use custom validation for step 2
                    //     if (this.validateStep2()) {
                    //         this.nextStep();
                    //     } else {
                    //         // Scroll to first error
                    //         const firstError = document.querySelector('.border-red-500');
                    //         if (firstError) {
                    //             firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    //         }
                    //     }
                    //     return;
                    // }

                    const fieldsToValidate = stepFields[this.currentStep] || [];

                    if (fieldsToValidate.length === 0) {
                        console.log('No fields to validate, moving to next step');
                        this.nextStep();
                        return;
                    }

                    // Check if validator exists
                    if (!this.validators) {
                        console.error('Validator not initialized');
                        this.setupValidator();
                        setTimeout(() => {
                            this.validateStep();
                        }, 100);
                        return;
                    }

                    try {
                        // Validate specific fields
                        const isValid = await this.validators.revalidateFields(fieldsToValidate);

                        console.log('Validation result:', isValid);

                        if (isValid) {
                            // Clear all error messages
                            this.clearAllErrors();

                            // Save form data
                            this.saveFormData();
                            this.nextStep();
                        } else {
                            console.log('Validation failed');

                            // Scroll to first error
                            const firstError = document.querySelector('.border-red-500');
                            if (firstError) {
                                firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                            }
                        }
                    } catch (error) {
                        console.error('Validation error:', error);

                        // Fallback: check fields manually if validator fails
                        if (this.manualValidation(fieldsToValidate)) {
                            this.clearAllErrors();
                            this.saveFormData();
                            this.nextStep();
                        }
                    }
                },

                // saveStep2Data() {
                //     // Save purchaser information
                //     const purchaserFullName = document.querySelector('#fullName1');
                //     const purchaserEmail = document.querySelector('#wizardForm #email');
                //     const purchaserPhone = document.querySelector('#wizardForm #phone');
                //     const purchaserOrg = document.querySelector('#organization');
                //     const purchaserCountry = document.querySelector('#country1');
                //     const isAttending = document.querySelector('#attending');
                //
                //     if (purchaserFullName) this.formData.purchaser.fullName = purchaserFullName.value;
                //     if (purchaserEmail) this.formData.purchaser.email = purchaserEmail.value;
                //     if (purchaserPhone) this.formData.purchaser.phone = purchaserPhone.value;
                //     if (purchaserOrg) this.formData.purchaser.organization = purchaserOrg.value;
                //     if (purchaserCountry) {
                //         const countryData = $(purchaserCountry).countrySelect('getSelectedCountryData');
                //         this.formData.purchaser.country = countryData ? countryData.name : purchaserCountry.value;
                //     }
                //     if (isAttending) this.formData.purchaser.isAttending = isAttending.checked;
                //
                //     // Attendees are bound to formData.attendees via x-model; ensure sync
                //     this.syncAttendees();
                //
                //     // If purchaser is attending, ensure purchaser.ticketType is recorded (bound via x-model in UI)
                //     if (this.formData.purchaser.isAttending && !this.formData.purchaser.ticketType) {
                //         const tickets = this.ticketTypesArray();
                //         this.formData.purchaser.ticketType = tickets[0] || null;
                //     }
                //
                //     // Normalize attendees (fill defaults where necessary)
                //     this.formData.attendees = (this.formData.attendees || []).map((a, idx) => ({
                //         name: a.name || '',
                //         email: a.email || '',
                //         role: a.role || '',
                //         organization: a.organization || this.formData.purchaser.organization || this.formData.organization || '',
                //         ticketType: a.ticketType || this.ticketTypesArray()[ (this.formData.purchaser.isAttending ? idx+1 : idx) ] || ''
                //     }));
                //
                //
                //     // Save terms & preferences
                //     const terms = document.querySelector('#terms');
                //
                //     if (terms) this.formData.terms.accepted = terms.checked;
                // },

                clearAllErrors() {
                    // Remove all custom error containers
                    document.querySelectorAll('.custom-error-container').forEach(el => el.remove());

                    // Remove border red from all fields
                    document.querySelectorAll('.border-red-500').forEach(el => {
                        el.classList.remove('border-red-500');
                    });
                },

                hasSelectedTickets() {
                    // Check if any tickets are selected
                    return this.selectedTickets && this.selectedTickets.length > 0;
                },

                totalTickets() {
                    // Calculate total number of selected tickets
                    return this.selectedTickets ? this.selectedTickets.reduce((sum, ticket) => sum + ticket.count, 0) : 0;
                },

                totalAmount() {
                    // Calculate total amount
                    return this.selectedTickets ? this.selectedTickets.reduce((sum, ticket) => sum + (ticket.price * ticket.count), 0) : 0;
                },

                removeTicket(ticketType) {
                    this.selectedTickets = this.selectedTickets.filter(ticket => ticket.type !== ticketType);
                    // Sync attendee fields whenever tickets change
                    this.syncAttendees();
                },

                selectTicket(ticketType, price, count) {
                    // Try to detect the clicked ticket card if the caller passed generic/hardcoded values.
                    let type = ticketType;
                    let pr = price;


                    try {
                        const active = document.activeElement;
                        const tile = active && active.closest && active.closest('[x-data]');
                        if (tile) {
                            const heading = tile.querySelector('h2');
                            const priceEl = tile.querySelector('h3');
                            const typeFromDom = heading ? heading.textContent.trim() : null;
                            const priceFromDom = priceEl ? parseInt(priceEl.textContent.replace(/[^0-9.]/g, '')) : NaN;

                            if (typeFromDom) type = typeFromDom;
                            if (!isNaN(priceFromDom)) pr = priceFromDom;

                        }
                    } catch (e) {
                        console.log('selectTicket detect error', e);
                    }

                    if (!type) return;

                    // Check if ticket type already exists
                    const existingIndex = this.selectedTickets.findIndex(t => t.type === type);

                    if (existingIndex >= 0) {
                        // Update existing ticket
                        this.selectedTickets[existingIndex].count = count;
                    } else {
                        // Add new ticket
                        this.selectedTickets.push({
                            type: type,
                            price: pr || price,
                            count: count
                        });
                    }

                    // Keep attendees in sync with tickets
                    this.syncAttendees();

                },

                // Return expanded array of ticket types (repeated per count)
                ticketTypesArray() {
                    const arr = [];
                    if (!this.selectedTickets) return arr;
                    this.selectedTickets.forEach(t => {
                        for (let i = 0; i < (t.count || 0); i++) arr.push(t.type);
                    });
                    return arr;
                },

                // Return distinct ticket types (for dropdown options)
                distinctTicketTypes() {
                    const set = new Set((this.selectedTickets || []).map(t => t.type));
                    return Array.from(set);
                },

                // Return ticket -> remaining count after accounting for assigned attendees
                availableTicketCounts() {
                    const counts = {};
                    (this.selectedTickets || []).forEach(t => { counts[t.type] = (counts[t.type] || 0) + (t.count || 0); });

                    // Build tickets array order
                    const tickets = this.ticketTypesArray();

                    // If purchaser attending, consume purchaser selected ticket only if explicitly assigned (non-empty)
                    let idx = 0;
                    if (this.formData.purchaser.isAttending) {
                        const ptype = (this.formData.purchaser.ticketType && this.formData.purchaser.ticketType !== '') ? this.formData.purchaser.ticketType : null;
                        if (ptype) {
                            counts[ptype] = (counts[ptype] || 0) - 1;
                        }
                        idx = 1;
                    }

                    // Subtract assigned attendee tickets. Treat explicit empty selections ('') as unassigned.
                    (this.formData.attendees || []).forEach((a, ai) => {
                        let ttype = null;
                        if (a.ticketType && a.ticketType !== '') {
                            ttype = a.ticketType;
                        } else if (a.ticketType == null) {
                            // no explicit selection stored: fall back to default ticket order
                            ttype = tickets[idx + ai] || null;
                        } else {
                            // a.ticketType is explicitly empty string => unassigned, skip
                            ttype = null;
                        }

                        if (ttype) counts[ttype] = (counts[ttype] || 0) - 1;
                    });

                    return counts; // may have negative numbers if over-assigned
                },


                // Whether an option is available for a given attendee index
                isOptionAvailable(opt, attendeeIndex) {
                    const counts = this.availableTicketCounts();
                    // If attendee already has this option, allow it (so they don't get forced out)
                    const current = (this.formData.attendees && this.formData.attendees[attendeeIndex] && this.formData.attendees[attendeeIndex].ticketType) || null;
                    if (current === opt) return true;

                    // Option available if count > 0
                    return (counts[opt] || 0) > 0;
                },

                // Whether purchaser can pick an option
                isOptionAvailableForPurchaser(opt) {
                    const counts = this.availableTicketCounts();
                    const current = this.formData.purchaser.ticketType || null;
                    if (current === opt) return true;
                    return (counts[opt] || 0) > 0;
                },

                // Ensure formData.attendees length matches number of attendee forms required
                syncAttendees() {
                    const tickets = this.ticketTypesArray();
                    const totalTickets = tickets.length;
                    const purchaserAttending = !!this.formData.purchaser.isAttending;
                    const needed = Math.max(0, totalTickets - (purchaserAttending ? 1 : 0));

                    // If purchaser attending and only one ticket selected, auto-assign and lock purchaser
                    if (purchaserAttending && totalTickets === 1) {
                        const single = tickets[0] || null;
                        if (single) {
                            this.formData.purchaser.ticketType = single;
                            this.purchaserLocked = true;
                        } else {
                            this.purchaserLocked = false;
                        }
                    } else {
                        this.purchaserLocked = false;
                    }

                    // Shrink or expand attendees array
                    this.formData.attendees = this.formData.attendees || [];

                    // Trim extras
                    if (this.formData.attendees.length > needed) {
                        this.formData.attendees = this.formData.attendees.slice(0, needed);
                    }

                    // Add missing attendee placeholders
                    for (let i = this.formData.attendees.length; i < needed; i++) {
                        const attendeeIndex = purchaserAttending ? i + 1 : i; // offset into tickets array
                        const defaultTicket = tickets[attendeeIndex] || this.distinctTicketTypes()[0] || '';
                        this.formData.attendees.push({
                            name: '',
                            email: '',
                            role: '',
                            organization: this.formData.purchaser.organization || this.formData.organization || '',
                            ticketType: defaultTicket
                        });
                    }

                    // Ensure existing attendees have organization filled
                    this.formData.attendees.forEach(a => {
                        if (!a.organization) a.organization = this.formData.purchaser.organization || this.formData.organization || '';
                    });
                },



                manualValidation(fields) {
                    let isValid = true;

                    fields.forEach(selector => {
                        const element = document.querySelector(selector);
                        if (!element) return;

                        const parent = element.parentElement;

                        // Remove existing custom errors
                        const existingError = parent.querySelector('.custom-error-container');
                        if (existingError) {
                            existingError.remove();
                        }

                        element.classList.remove('border-red-500');

                        // Check if empty
                        if (!element.value.trim()) {
                            element.classList.add('border-red-500');
                            isValid = false;

                            // Add error with SVG
                            const errorContainer = this.createErrorMessage('This field is required');
                            errorContainer.classList.add('custom-error-container');
                            parent.appendChild(errorContainer);
                            return;
                        }

                        // Specific validation for email
                        if (selector === '#email') {
                            const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
                            if (!emailRegex.test(element.value)) {
                                element.classList.add('border-red-500');
                                isValid = false;

                                const errorContainer = this.createErrorMessage('Please enter a valid email address');
                                errorContainer.classList.add('custom-error-container');
                                parent.appendChild(errorContainer);
                            }
                        }

                        // Specific validation for phone
                        if (selector === '#phone') {
                            const digitsOnly = element.value.replace(/\D/g, '');
                            if (digitsOnly.length < 10 || digitsOnly.length > 15) {
                                element.classList.add('border-red-500');
                                isValid = false;

                                const errorContainer = this.createErrorMessage('Phone number must contain 10-15 digits');
                                errorContainer.classList.add('custom-error-container');
                                parent.appendChild(errorContainer);
                            }
                        }

                        // For country select plugin
                        if (selector === '#country') {
                            const countryValue = element.value || $(element).countrySelect('getSelectedCountryData')?.name || '';

                            if (!countryValue.trim()) {
                                element.classList.add('border-red-500');
                                isValid = false;

                                const errorContainer = this.createErrorMessage('Please select your country');
                                errorContainer.classList.add('custom-error-container');
                                parent.appendChild(errorContainer);
                            }
                        }
                    });

                    return isValid;
                },

                saveFormData() {
                    // Save form data from step 0
                    const fullName = document.querySelector('#fullName');
                    const email = document.querySelector('#email');
                    const phone = document.querySelector('#phone');
                    const country = document.querySelector('#country');

                    if (fullName) this.formData.fullName = fullName.value;
                    if (email) this.formData.email = email.value;
                    if (phone) this.formData.phone = phone.value;

                    // Read organization from root contact step
                    const org = document.querySelector('#organizationRoot');
                    if (org) this.formData.organization = org.value;

                    // Get country value from the country select plugin
                    if (country) {
                        const countryData = $(country).countrySelect('getSelectedCountryData');
                        this.formData.country = countryData ? countryData.name : country.value;
                    }

                    console.log('Form data saved:', this.formData);
                },


                nextStep() {
                    if (this.currentStep < this.steps.length - 1) {
                        this.currentStep++;
                        console.log('Moving to step:', this.currentStep);

                        // If moving to Attendee Details (step 2), prefill purchaser info from step 0
                        // if (this.currentStep === 2) {
                        //     // Copy root formData values into purchaser if purchaser fields are empty
                        //     if (!this.formData.purchaser.fullName && this.formData.fullName) this.formData.purchaser.fullName = this.formData.fullName;
                        //     if (!this.formData.purchaser.email && this.formData.email) this.formData.purchaser.email = this.formData.email;
                        //     if (!this.formData.purchaser.phone1 && this.formData.phone) this.formData.purchaser.phone1 = this.formData.phone;
                        //     if (!this.formData.purchaser.country && this.formData.country) this.formData.purchaser.country = this.formData.country;
                        //     if (!this.formData.purchaser.organization && this.formData.organization) this.formData.purchaser.organization = this.formData.organization;
                        //
                        //     // Prefill attendees organization if not set
                        //     if (this.formData.purchaser.organization) {
                        //         this.formData.attendees = this.formData.attendees || [];
                        //         this.formData.attendees.forEach(a => {
                        //             if (!a.organization) a.organization = this.formData.purchaser.organization;
                        //         });
                        //     }
                        // }


                        // Scroll to top of form
                        const wizardForm = document.getElementById('wizardForm');
                        if (wizardForm) {
                            wizardForm.scrollIntoView({ behavior: 'smooth', block: 'start' });
                        }
                    }
                },


                prevStep() {
                    if (this.currentStep > 0) {
                        this.currentStep--;
                        console.log('Moving to step:', this.currentStep);

                        // Scroll to top of form
                        const wizardForm = document.getElementById('wizardForm');
                        if (wizardForm) {
                            wizardForm.scrollIntoView({ behavior: 'smooth', block: 'start' });
                        }
                    }
                },

                submitForm() {
                    console.log('Submitting form...');

                    // Validate final step (payment) if needed
                    if (this.currentStep === 3) {
                        // Add payment validation here if needed
                        this.saveFormData();
                        alert('Registration submitted successfully!\n\n' + JSON.stringify(this.formData, null, 2));
                        console.log('Complete form data:', this.formData);

                        // Here you would typically submit to your backend
                        // this.sendToBackend();
                    }
                },

                sendToBackend() {
                    // Send data to your server
                    fetch('/api/register', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify(this.formData)
                    })
                        .then(response => response.json())
                        .then(data => {
                            console.log('Success:', data);
                            alert('Registration successful!');
                        })
                        .catch((error) => {
                            console.error('Error:', error);
                            alert('Registration failed. Please try again.');
                        });
                }
            };
        }
    </script>
@endpush

</x-home-layout>

