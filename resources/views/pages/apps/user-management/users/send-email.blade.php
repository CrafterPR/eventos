<x-default-layout>

    @section('title')
        Send email
    @endsection

        @section('breadcrumbs')
            {{ Breadcrumbs::render('users.user.index') }}
        @endsection

    <div class="card">
        <!--begin::Card header-->
        <div class="card-header border-0 pt-6">
            <!--begin::Card title-->
            <div class="card-title">
                <!--begin::Search-->

                <!--end::Search-->
            </div>
            <!--begin::Card title-->

            <!--begin::Card toolbar-->

            <!--end::Card toolbar-->
        </div>
        <!--end::Card header-->

        <!--begin::Card body-->
        <div class="card-body py-4">
            <!--begin::Table-->
             <div class="newsletter-wrap">
                <form class="form w-100" action="{{ route('users.emails.send') }}" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="mb-6">
                        <div class="col-md-12">
                            <div class="form-floating mb-3">
                                <input type="text" name="subject" autocomplete="off"
                                       value="{{ old("title") }}"
                                       class="form-control   @error('subject') border-danger @enderror"/>
                                <label for="subject">
                                    Email subject
                                    <span class="required"></span>
                                </label>
                                @error('subject')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                    </div>

                    <div class="mb-6">
                        <div class="col-md-12">
                            <div class="form-floating mb-3">
                                <select name="group_id" id="group_id"
                                        class="form-select custom-select2 @error('salutation') border-danger @enderror"
                                        data-control="select2" data-placeholder="">
                                <option value=""></option>
                                    @foreach ($groups as $group)
                                        <option value="{{ $group->id }}" @selected(old('group_id') == $group->id)>
                                        {{ $group->name }}
                                    </option>
                                    @endforeach
                            </select>
                                <label for="group_id">
                                    Target group
                                    <span class="required"></span>
                                </label>
                                @error('group_id')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                    </div>

                    <div class="mb-6">
                            <div class="mb-7">
                                 <label for="message">
                                    Email Message
                                    <span class="required"></span>
                                </label>
                                <textarea name="message" id="message_ckeditor_classic"
                                          class="form-control   @error('message') border-danger @enderror ">
                                    {{ old("message") }}
                                </textarea>

                                @error('message')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                        </div>

                    </div>

                    <div class="mb-6">
                    <div class="form-floating mb-7">

                        <textarea name="targets" id="targets" readonly
                               class="form-control @error('targets') border-danger @enderror ">
                        {first_name}, {last_name}, {email}, {phone},{institution}
                        </textarea>
                        <label for="targets">
                           Email place holders
                            <span class="required"></span>
                        </label>
                </div>
              </div>

                    <div class="d-flex flex-wrap d-flex justify-content-end pb-lg-0">
                        <a href="{{ route('summits.events.index') }}" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-success ml-3">
                            @include('partials/general/_button-indicator', ['label' => 'Send'])
                        </button>
                    </div>
                </form>
            </div>
            <!--end::Table-->
        </div>
        <!--end::Card body-->
    </div>

    @push('scripts')
        <script src="{{ asset('assets//plugins/custom/ckeditor/ckeditor-classic.bundle.js') }}"></script>
        <script>

          ClassicEditor
              .create(document.querySelector('#message_ckeditor_classic'))
              .then(editor => {
              })
              .catch(error => {
                  console.error(error);
              });

          new Tagify(document.querySelector("#targets"));
      </script>
    @endpush

</x-default-layout>
