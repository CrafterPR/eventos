@php use App\Enum\UserType;use Carbon\Carbon; @endphp
<x-auth-layout>
    <div class="bg-body d-flex flex-column align-items-stretch flex-center rounded-4 w-md-900px p-5">
        <div>
            <div class="newsletter-wrap">
                    <form class="form w-100" action="{{ route('register_save') }}" method="post">
                    @csrf
                        <div class="row mb-6">
                        <div class="col-md-2">
                            <div class="form-floating mb-3">
                                <select name="salutation" id="salutation"
                                        class="form-select custom-select2 @error('salutation') border-danger @enderror"
                                        data-control="select2"
                                        data-placeholder="">
                                    <option value=""></option>
                                    @foreach (config("setting.salutation") as $salutation)
                                        <option value="{{ $salutation }}" @selected(old('salutation') == $salutation)>
                                            {{$salutation}}
                                        </option>
                                    @endforeach
                                </select>
                                <label for="salutation">Title</label>
                                @error('salutation')
                                <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-floating mb-3">
                                <input type="text" name="first_name" id="first_name" autocomplete="off"
                                       value="{{ old("first_name") }}"
                                       class="form-control   @error('first_name') border-danger @enderror"/>
                                <label for="first_name">
                                    First name
                                    <span class="required"></span>
                                </label>
                                @error('first_name')
                                <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-floating mb-3">
                                <input type="text" name="last_name" id="last_name" autocomplete="off"
                                       value="{{ old("last_name") }}"
                                       class="form-control   @error('last_name') border-danger @enderror"/>
                                <label for="last_name">
                                    Last name
                                    <span class="required"></span>
                                </label>
                                @error('last_name')
                                <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mb-6">
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="email" name="email" id="email" value="{{ old("email") }}"
                                       autocomplete="off"
                                       class="form-control  @error('email') border-danger @enderror "/>
                                <label for="email">
                                    Email address
                                    <span class="required"></span>
                                </label>
                                @error('email')
                                <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="tel" name="mobile" id="phone" value="{{ old("mobile") }}"
                                       autocomplete="off" class="form-input @error('mobile') border-danger @enderror"
                                       phone-country-input="#country_id"/>
                                <label for="phone">
                                    Phone number

                                </label>
                                @error('mobile')
                                <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mb-6">
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" name="institution" id="institution" value="{{ old("institution") }}"
                                       autocomplete="off"
                                       class="form-control  @error('institution') border-danger @enderror "/>
                                <label for="institution">
                                    Institution
                                    <span class="required"></span>
                                </label>
                                @error('institution')
                                <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" name="position" id="position" value="{{ old("position") }}"
                                       autocomplete="off"
                                       class="form-control  @error('position') border-danger @enderror "/>
                                <label for="position">
                                    Position in Institution
                                    <span class="required"></span>
                                </label>
                                @error('position')
                                <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mb-6">
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <select name="affiliation_id" id="affiliation_id"
                                        class="form-select custom-select2  @error('affiliation_id') border-danger @enderror "
                                        data-control="select2"
                                        data-placeholder="">
                                    <option value=""></option>
                                    @foreach($affiliations as $affiliation)
                                        <option @selected(old('affiliation_id') == $affiliation->id)
                                                value="{{ $affiliation->id  }}">
                                            {{ $affiliation->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <label for="affiliation_id">
                                    Affiliation
                                    <span class="required"></span>
                                </label>
                                @error('affiliation_id')
                                <div class="error-message">{{ $message }}</div>
                                @enderror
                                <div class="mt-4 form-floating @if(old("other_affiliation") != 11) d-none @endif"
                                     id="other-affiliation">
                                    <input type="text" name="other_affiliation" id="other_affiliation"
                                           value="{{ old("other_affiliation") }}"
                                           autocomplete="off"
                                           class="form-control  @error('other_affiliation') border-danger @enderror "/>
                                    <label for="other_affiliation">
                                        Enter your affiliation
                                        <span class="required"></span>
                                    </label>
                                    @error('other_affiliation')
                                    <div class="error-message">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <select name="gender" id="gender"
                                        class="form-select  @error('gender') border-danger @enderror "
                                        data-control="select2"
                                        data-placeholder="">
                                    <option value=""></option>
                                    @foreach(config("setting.gender") as $key=>$value)
                                        <option value="{{$key}}" @selected(old('gender') == $key)>{{$value}}</option>
                                    @endforeach
                                </select>
                                <label for="gender">Gender
                                    <span class="required"></span>
                                </label>
                                @error('gender')
                                <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <div class="row mb-6">
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <select name="country_id" id="country_id"
                                        class="form-select  @error('country_id') border-danger @enderror "
                                        data-control="select2"
                                        data-placeholder="">
                                    <option value=""></option>
                                    @foreach($countries as $country)
                                        <option
                                                value="{{ $country->id  }}" @selected(old('country_id') == $country->id)>
                                            {{ $country->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <label for="country_id">
                                    Home country
                                    <span class="required"></span>
                                </label>
                                @error('country_id')
                                <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3  d-none" id="county">
                                <select name="county_id" id="county_id" class="form-select" data-control="select2"
                                        data-placeholder="">
                                    <option value="">Select County</option>
                                </select>
                                <label for="county_id">County</label>
                                @error('county_id')
                                <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mb-6 mt-4">
                        <div class="col-md-6">
                            <div class="radio-inline  @error('user_type') border-danger @enderror ">
                                <p style="padding-bottom: 10px;">You are registering as?<span class="required"></span>
                                </p>
                                <label class="radio" style="display: revert; float: right;  min-width: 50%;">
                                    <input type="radio" name="user_type"
                                           value="{{UserType::DELEGATE->value}}" {{ old('user_type') == UserType::DELEGATE->value ? 'checked' : '' }}/>
                                    <span></span>
                                    Delegate
                                </label>
                                <label class="radio">
                                    <input type="radio" name="user_type"
                                           value="{{UserType::EXHIBITOR->value}}" {{ old('user_type') == UserType::EXHIBITOR->value ? 'checked' : '' }}/>
                                    <span></span>
                                    Exhibitor
                                </label>
                                @error('user_type')
                                <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="radio-inline  @error('disability') border-danger @enderror ">
                                <p style="padding-bottom: 10px;">Do you identify as a person with a disability?<span
                                            class="required"></span>
                                </p>
                                <label class="radio" style="display: revert; float: right;  min-width: 50%;">
                                    <input type="radio" name="disability"
                                           value="Yes" {{ old('disability') == 'Yes' ? 'checked' : '' }}/>
                                    <span></span>
                                    Yes
                                </label>
                                <label class="radio">
                                    <input type="radio" name="disability"
                                           value="No" {{ old('disability') == 'No' ? 'checked' : '' }}/>
                                    <span></span>
                                    No
                                </label>
                                @error('disability')
                                <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-floating mb-3">
                                <select name="area_of_interest[]" id="area_of_interest"
                                        class="form-select @error('area_of_interest') border-danger @enderror"
                                        data-control="select2" multiple="multiple">
                                    <option value=""></option>
                                    @foreach(config("setting.area_of_interest") as $interest)
                                        <option value="{{$interest}}"
                                                @selected(in_array($interest,old("area_of_interest",[])))>
                                            {{$interest}}
                                        </option>
                                    @endforeach
                                </select>
                                <label for="area_of_interest">
                                    Area(s) of Interest?
                                    <span class="required"></span>
                                </label>
                                @error('area_of_interest')
                                <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mb-6 mt-6">
                        <div class="col-md-4">
                            <div class="form-floating mb-3">
                                <input type="text" name="coupon" id="coupon" value="{{ $coupon ?? old('coupon') }}"
                                       autocomplete="off"
                                       class="form-control  @error('coupon') border-danger @enderror "/>
                                <label for="coupon">Enter Coupon to redeem (Optional)</label>
                                @error('coupon')
                                <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating mb-3">
                                <input type="password" name="password" id="password" autocomplete="off"
                                       class="form-control  @error('password') border-danger @enderror "/>
                                <label for="password">Password<span class="required"></span></label>
                                @error('password')
                                <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating mb-3">
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                       autocomplete="off"
                                       class="form-control  @error('password_confirmation') border-danger @enderror "/>
                                <label for="password_confirmation">Password confirmation<span
                                            class="required"></span></label>
                                @error('password_confirmation')
                                <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-wrap d-flex justify-content-between pb-lg-0">

                        <div
                                class="form-check form-check-custom form-check-success form-check-solid required @error('terms') border-danger @enderror">
                            <input name="terms" class="form-check-input" type="checkbox" value="1"/>
                            <label class="form-check-label" for="terms">
                                I agree to <a href="{{ route('toc') }}" target="_blank" class="text-success">
                                    terms and conditions
                                </a>
                            </label> <br/>
                            @error('terms')
                            <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="d-flex">
                            <button type="submit" class="btn btn-success ">
                                @include('partials/general/_button-indicator', ['label' => 'Register'])
                            </button>
                        </div>

                    </div>
                    <div class="text-gray-500 text-center fw-semibold fs-6">
                        Already registered ?
                        <a href="{{ route('login') }}" class="link-success">
                            login
                        </a>
                    </div>

                </form>
                @else
                    <h2 class="text-danger">Registration has been closed after the execution of the event!</h2>
                @endif
            </div>
        </div>
    </div>
</x-auth-layout>
<script type="text/javascript">
    $(function () {
        let countryId = @json(old("country_id"));
        let countyId =@json(old("county_id"));

        if (countryId) {
            switchView(countryId)
        }

        $('#affiliation_id').on('change', function () {
            const selected = $(this).val();
            if (selected == 11) {
                $('#other-affiliation').removeClass('d-none');
            } else {
                $('#other-affiliation').addClass('d-none');
            }
        });

        $('#country_id').on('change', function () {
            const selectedCountryId = $(this).val();
            switchView(selectedCountryId)
        });

        function switchView(selectedCountryId) {
            const countyDropdown = $('#county_id');

            if (selectedCountryId == 112) {
                $('#county').removeClass('d-none');
            } else {
                $('#county').addClass('d-none');
            }
            // Clear previous options
            countyDropdown.empty().append('<option value="">Select County</option>');

            if (selectedCountryId) {
                // Fetch counties for the selected country via an AJAX request
                $.get('/get-counties/' + selectedCountryId, function (counties) {
                    counties.forEach(function (county) {
                        const option = $('<option>').val(county.id).text(county.name);

                        // Add the "selected" attribute to the option with a specific condition
                        if (county.id == countyId) {
                            option.attr('selected', 'selected');
                        }

                        countyDropdown.append(option);
                    });
                });
            }
        }
    });
</script>

