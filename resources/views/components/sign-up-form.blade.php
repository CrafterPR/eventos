<x-auth-layout>
<section>
    <h3 class="title_h3">Sign up </h3>
    <div class="flex ">
        <img src="{{ asset('assets/media/images/green_logo.svg') }}" alt=" image here" class="position_logo mt-5"/>

    </div>
    <div>
        <div class="newsletter-wrap">
            <form class="form w-100" id="sign-up-form"
                  action="{{ route('register_save') }}"
                  method="post"
            >
        @csrf
                <!--begin::Heading-->
                <div class="text-center mb-11">
            <h1 class="text-dark fw-bolder mb-3"></h1>
        </div>
                <!--end::Heading-->

        <div class="row mb-12">
            <!-- Left Column -->
            <div class="col-md-3">
                <div class="form-floating mb-3 custom-input">
                    <select name="salutation" id="salutation" class="form-select" data-control=""
                            data-placeholder="">
                        <option value=""></option>
                        <option value="Prof" {{ old('salutation') == 'Prof' ? 'selected' : '' }}>Prof.</option>
                        <option value="Eng" {{ old('salutation') == 'Eng' ? 'selected' : '' }}>Eng.</option>
                        <option value="Dr" {{ old('salutation') == 'Dr' ? 'selected' : '' }}>Dr.</option>
                        <option value="Mr" {{ old('salutation') == 'Mr' ? 'selected' : '' }}>Mr.</option>
                        <option value="Mrs" {{ old('salutation') == 'Mrs' ? 'selected' : '' }}>Mrs.</option>
                        <option value="Ms" {{ old('salutation') == 'Ms' ? 'selected' : '' }}>Ms.</option>
                        <option value="Amb" {{ old('salutation') == 'Amb' ? 'selected' : '' }}>Amb.</option>
                        <option value="Hon" {{ old('salutation') == 'Hon' ? 'selected' : '' }}>Hon.</option>
                    </select>
                    <label for="salutation">Salutation</label>
                    @error('salutation')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-floating mb-3 custom-input">
                    <input type="text" name="first_name" id="first_name" autocomplete="off"
                           value="{{ old("first_name") }}" class="focus:outline-none"/>
                    <label for="first_name">First name<span class="required"></span></label>
                    @error('first_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-5">
                <div class="form-floating mb-3">
                    <input type="text" name="last_name" id="last_name" autocomplete="off" value="{{ old("last_name") }}"
                           class="form-control"/>
                    <label for="last_name">Last name<span class="required"></span></label>
                    @error('last_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>


        </div>
        <div class="row mb-12">

            <div class="col-md-6">
                <div class="form-floating mb-3">
                    <input type="email" name="email" id="email" value="{{ old("email") }}" autocomplete="off"
                           class="form-control required"/>
                    <label for="email">Email address<span class="required"></span></label>
                    @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating mb-3">
                    <input type="text" name="mobile" id="mobile" value="{{ old("mobile") }}" autocomplete="off"
                           class="form-control required"/>
                    <label for="mobile">Phone number<span class="required"></span></label>
                    @error('mobile')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>


        </div>

        <div class="row mb-12">

            <div class="col-md-6">
                <div class="form-floating mb-3">
                    <input type="text" name="institution" id="institution" value="{{ old("institution") }}"
                           autocomplete="off"
                           class="form-control required"/>
                    <label for="institution">Institution<span class="required"></span></label>
                    @error('institution')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating mb-3">
                    <input type="text" name="position" id="position" value="{{ old("position") }}" autocomplete="off"
                           class="form-control required"/>
                    <label for="position">Position in Institution<span class="required"></span></label>
                    @error('position')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>


        </div>

        <div class="row mb-12">

            <div class="col-md-6">
                <div class="form-floating mb-3">
                    <select name="affiliation" id="affiliation" class="form-select" data-control="select2"
                            data-placeholder="">
                        <option value=""></option>
                        @foreach($affiliations as $affiliation)
                            <option
                                    value="{{ $affiliation->id  }}" {{ old('affiliation') == $affiliation->id ? 'selected' : '' }}>{{ $affiliation->name }}</option>
                        @endforeach

                    </select>
                    <label for="affiliation">Affiliation<span class="required"></span></label>
                    @error('affiliation')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-floating mb-3">
                    <select name="gender" id="gender" class="form-select" data-control=""
                            data-placeholder="">
                        <option value=""></option>
                        <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                        <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                        <option value="None" {{ old('gender') == 'None' ? 'selected' : '' }}>Prefer not to say</option>

                    </select>
                    <label for="gender">Gender<span class="required"></span></label>
                    @error('gender')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-floating mb-3">
                    <select name="disability" id="disability" class="form-select" data-control=""
                            data-placeholder="">
                        <option value=""></option>
                        <option value="No" {{ old('disability') == 'No' ? 'selected' : '' }}>No</option>
                        <option value="Yes" {{ old('disability') == 'Yes' ? 'selected' : '' }}>Yes</option>

                    </select>
                    <label for="disability">Disabled?<span class="required"></span></label>
                    @error('disability')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

        </div>
        <div class="row mb-12">

            <div class="col-md-6">
                <div class="form-floating mb-3">
                    <select name="country_id" id="country_id" class="form-select" data-control="select2"
                            data-placeholder="">
                        <option value=""></option>
                        @foreach($countries as $country)
                            <option
                                    value="{{ $country->id  }}" {{ old('country_id') == $country->id ? 'selected' : '' }}>{{ $country->name }}</option>
                        @endforeach

                    </select>
                    <label for="country_id">Home country<span class="required"></span></label>
                    @error('country_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating mb-3 d-none" id="county">
                    <select name="county_id" id="county_id" class="form-select" data-control="select2"
                            data-placeholder="">
                        <option value="">Select County</option>

                    </select>
                    <label for="county_id">County</label>
                    @error('country_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

        </div>
        <div class="row mb-12">

            <div class="form-floating mb-3">
                <select name="area_of_interest[]" id="area_of_interest" class="form-select" multiple
                        data-control="select2"
                >
                    <option value=""></option>
                    <option value="Youth Entrepreneurship">Youth Entrepreneurship</option>
                    <option value="Students’ Innovations">Students’ Innovations</option>
                    <option value="Innovation in Media">Innovation in Media</option>
                    <option value="Intellectual Property">Intellectual Property</option>
                    <option value="Digital Transformation">Digital Transformation</option>
                    <option value="Agriculture">Agriculture</option>
                    <option value="Intellectual Property">Intellectual Property</option>
                    <option value="Industry-Academia Linkages">Industry-Academia Linkages</option>
                    <option value="Talanta Hela, Non">Talanta Hela, Non</option>

                </select>
                <label for="area_of_interest">Area of Interest?<span class="required"></span></label>
                @error('area_of_interest')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

        </div>
        <div class="row mb-12">
            <!-- Left Column -->
            <div class="col-md-6">
                <div class="form-floating mb-3">
                    <input type="password" name="password" id="password" autocomplete="off" class="form-control"/>
                    <label for="password">Password<span class="required"></span></label>
                    @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating mb-3">
                    <input type="password" name="password_confirmation" id="password_confirmation" autocomplete="off"
                           class="form-control"/>
                    <label for="password_confirmation">Password confirmation<span class="required"></span></label>
                    @error('password_confirmation')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>


        </div>
        <div class="d-flex flex-wrap d-flex justify-content-between pb-lg-0">
            <a href="{{ route('login') }}" class="text text-success mb-4">Already registered? login</a>

            <button type="submit" class="btn btn-success me-4">
                @include('partials/general/_button-indicator', ['label' => 'Register'])
            </button>

        </div>

                <!-- Sign up and sign in links here -->
    </form>
        </div>
    </div>
</section>
</x-auth-layout>
<script type="text/javascript">
    $(function() {
        $('#country_id').on('change', function() {
            const selectedCountryId = $(this).val();
            const countyDropdown = $('#county_id');
            if(selectedCountryId == 112) {
                $('#county').removeClass('d-none');
            } else {
                $('#county').addClass('d-none')
            }
            // Clear previous options
            countyDropdown.empty().append('<option value="">Select County</option>');

            if (selectedCountryId) {
                // Fetch counties for the selected country via an AJAX request
                $.get('/get-counties/' + selectedCountryId, function(counties) {
                    counties.forEach(function(county) {
                        const option = $('<option>').val(county.id).text(county.name);
                        countyDropdown.append(option);
                    });
                });
            }
        });
    });

</script>

