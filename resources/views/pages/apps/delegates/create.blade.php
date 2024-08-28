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
                                    class="form-select form-control-solid mb-3 mb-lg-0 @error('salutation') border-danger @enderror"
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
                    <div class="col-md-10">
                        <div class="form-floating mb-3">
                            <input type="text" name="name" autocomplete="off" value="{{old("name")}}"
                                   class="form-control  @error('name') border-danger @enderror"/>
                            <label for="name">
                                Full name
                                <span class="required"></span>
                            </label>
                            @error('name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                </div>
                <div class="row">
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
                            </label>
                            @error('mobile')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" name="institution" id="institution"
                                   value="{{ old("institution") }}"
                                   autocomplete="off"
                                   class="form-control  @error('institution') border-danger @enderror "/>
                            <label for="institution">
                                Organization
                                <span class="required"></span>
                            </label>
                            @error('institution')
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
                                Home Country
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

                </div>

                <div class="text-center pt-15">
                    <a href="{{ route('users.delegates.index') }}" class="btn btn-light me-3">
                        Cancel
                    </a>
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

                    var selectElement = this;

                    // Get the selected option
                    var selectedOption = selectElement.options[selectElement.selectedIndex];

                    // Get the text content of the selected option
                    var selectedText = selectedOption.text;

                    switchView(selectedText, selectedCountryId)
                });

                function switchView(selectedText, selectedCountryId) {
                    const countyDropdown = $('#county_id');

                    if (selectedText === 'Kenya') {
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
