<x-default-layout>

    @section('title')
        New Delegate
    @endsection

    @section('breadcrumbs')
        {{ Breadcrumbs::render('users.user.index') }}
    @endsection

    <div class="card">
        <div class="card-body">
            <form class="form" action="{{route("users.delegates.store")}}" method="post">
                @csrf
                <div class="row mb-6">
                    <div class="col-md-2">
                        <div class="form-floating mb-3">
                            <select name="salutation" id="salutation"
                                    class="form-select custom-select2 @error('salutation') border-danger @enderror"
                                    data-control="select2" data-placeholder="">
                                <option value=""></option>
                                @foreach (config("setting.salutation") as $salutation)
                                    <option value="{{ $salutation }}" @selected(old('salutation') == $salutation)>
                                        {{$salutation}}
                                    </option>
                                @endforeach
                            </select>
                            <label for="salutation">Title</label>
                            @error('salutation')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-floating mb-3">
                            <input type="text" name="first_name" autocomplete="off" value="{{old("first_name")}}"
                                   class="form-control  @error('first_name') border-danger @enderror"/>
                            <label for="first_name">
                                First name
                                <span class="required"></span>
                            </label>
                            @error('first_name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-floating mb-3">
                            <input type="text" name="last_name" id="last_name"
                                   autocomplete="off"
                                   value="{{ old("last_name") }}"
                                   class="form-control   @error('last_name') border-danger @enderror"/>
                            <label for="last_name">
                                Last name
                                <span class="required"></span>
                            </label>
                            @error('last_name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row mb-6">
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="email" name="email" id="email"
                                   value="{{ old("email") }}"
                                   autocomplete="off"
                                   class="form-control  @error('email') border-danger @enderror "/>
                            <label for="email">
                                Email address
                                <span class="required"></span>
                            </label>
                            @error('email')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="tel" name="mobile" id="mobile"
                                   value="{{ old("mobile") }}"
                                   autocomplete="off"
                                   class="form-control  @error('mobile') border-danger @enderror "/>
                            <label for="mobile">
                                Phone number
                                <span class="required"></span>
                            </label>
                            @error('mobile')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row mb-6">
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" name="institution" id="institution"
                                   value="{{ old("institution") }}"
                                   autocomplete="off"
                                   class="form-control  @error('institution') border-danger @enderror "/>
                            <label for="institution">
                                Institution
                                <span class="required"></span>
                            </label>
                            @error('institution')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" name="position" id="position"
                                   value="{{ old("position") }}"
                                   autocomplete="off"
                                   class="form-control  @error('position') border-danger @enderror "/>
                            <label for="position">
                                Position in Institution
                                <span class="required"></span>
                            </label>
                            @error('position')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row mb-6">
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <select name="affiliation_id" id="select_affiliation_id"
                                    class="form-select custom-select2  @error('affiliation_id') border-danger @enderror "
                                    data-control="select2"
                                    data-placeholder="">
                                <option value=""></option>
                                @foreach($affiliations as $affiliation)
                                    <option @selected(old('affiliation_id') == $affiliation->id)
                                            value="{{ $affiliation->id }}">
                                        {{ $affiliation->name }}
                                    </option>
                                @endforeach
                            </select>
                            <label for="affiliation_id">
                                Affiliation
                                <span class="required"></span>
                            </label>
                            @error('affiliation_id')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <select name="gender"
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
                            <div class="text-danger">{{ $message }}</div>
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
                                    <option value="{{ $country->id}}" @selected(old('country_id') == $country->id)>
                                        {{ $country->name }}
                                    </option>
                                @endforeach
                            </select>
                            <label for="country_id">
                                Home country
                                <span class="required"></span>
                            </label>
                            @error('country_id')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3 readonly" id="county">
                            <select name="county_id" id="county_id"
                                    class="form-select"
                                    data-control="select2"
                                    data-placeholder="">
                                <option value="">Select County</option>
                            </select>
                            <label for="county_id">County</label>
                            @error('county_id')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row mb-6 mt-4">
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <select name="category_id" id="select_category_id"
                                    class="form-select custom-select2  @error('category_id') border-danger @enderror "
                                    data-control="select2"
                                    data-placeholder="">
                                <option value=""></option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id}}" @selected(old('category_id') == $category->id)>
                                        {{ $category->title }}
                                    </option>
                                @endforeach
                            </select>
                            <label for="category_id">
                                Delegate category
                                <span class="required"></span>
                            </label>
                            @error('category_id')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="radio-inline  @error('delegate.disability') border-danger @enderror ">
                            <p style="padding-bottom: 10px;">
                                Do you identify as a person with a disability?
                                <span class="required"></span>
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
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <select name="area_of_interest[]" id="select_area_of_interest"
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
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" name="coupon" id="coupon" value="{{old('coupon') }}"
                                   autocomplete="off"
                                   class="form-control  @error('coupon') border-danger @enderror "/>
                            <label for="coupon">Enter Coupon to redeem (Optional)</label>
                            @error('coupon')
                            <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="text-center pt-15">
                    <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal" aria-label="Close">
                        Discard
                    </button>
                    <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
                        <span class="indicator-label">Submit</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    @push('scripts')
        <script>
            $(function () {
                let countryId = @json(old("country_id"));
                let countyId =@json(old("county_id"));

                if (countryId) {
                    switchView(countryId)
                }

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
    @endpush

</x-default-layout>
