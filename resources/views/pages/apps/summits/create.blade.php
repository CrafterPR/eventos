<x-default-layout>

    @section('title')
        Create summits
    @endsection

    @section('breadcrumbs')
        {{ Breadcrumbs::render('summits.events.create') }}
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
                <form class="form w-100" action="{{ route('summits.events.store') }}" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-6">
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" name="title" autocomplete="off"
                                       value="{{ old("title") }}"
                                       class="form-control   @error('title') border-danger @enderror"/>
                                <label for="title">
                                    Summit name
                                    <span class="required"></span>
                                </label>
                                @error('title')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" name="lead_organization" id="lead_organization" autocomplete="off"
                                       value="{{ old("lead_organization") }}"
                                       class="form-control   @error('lead_organization') border-danger @enderror"/>
                                <label for="lead_organization">
                                    Lead organization
                                    <span class="required"></span>
                                </label>
                                @error('lead_organization')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="mb-6">
                        <div class="col-md-10">
                            <div class="form-floating mb-3">
                                <input type="text" name="longtitle" autocomplete="off"
                                       value="{{ old("longtitle") }}"
                                       class="form-control   @error('longtitle') border-danger @enderror"/>
                                <label for="longtitle">
                                    Long title
                                </label>
                                @error('longtitle')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="d-block fw-semibold fs-6 mb-5">Leader's photo</label>
                                <!--end::Label-->
                                <!--begin::Image placeholder-->
                            <style>
                                .image-input-placeholder {
	                                background-image: url('{{ image('svg/files/blank-image.svg') }}');
                                }

                                [data-bs-theme="dark"] .image-input-placeholder {
	                                background-image: url('{{ image('svg/files/blank-image-dark.svg') }}');
                                }
                            </style>
                                <!--end::Image placeholder-->
                                <!--begin::Image input-->
                            <div class="image-input image-input-outline image-input-placeholder image-input-empty"
                                 data-kt-image-input="true">
                                <!--begin::Preview existing avatar-->
                                    <div class="image-input-wrapper w-125px h-125px"
                                         style="background-image: url('');"></div>

                                <!--end::Preview existing avatar-->
                                <!--begin::Label-->
                                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                       data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                       title="Change avatar">
                                    {!! getIcon('pencil','fs-7') !!}
                                    <!--begin::Inputs-->
                                    <input type="file" name="profile_photo_url" accept="image/*"/>
                                    <input type="hidden" name="avatar_remove"/>
                                    <!--end::Inputs-->
                                </label>
                                <!--end::Label-->
                                <!--begin::Cancel-->
                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                      data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                      title="Cancel avatar">
                                    {!! getIcon('cross','fs-2') !!}
                                </span>
                                <!--end::Cancel-->
                                <!--begin::Remove-->
                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                      data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                      title="Remove avatar">
                                    {!! getIcon('cross','fs-2') !!}
                                </span>
                                <!--end::Remove-->
                            </div>
                                <!--end::Image input-->
                                <!--begin::Hint-->
                            <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                                <!--end::Hint-->
                                @error('profile_photo_url')
                                <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        </div>
                            <div class="col-md-4">
                            <div class="form-floating mb-3">
                                <input type="text" name="leader" id="leader" value="{{ old("leader") }}"
                                       autocomplete="off"
                                       class="form-control  @error('leader') border-danger @enderror "/>
                                <label for="leader">
                                    Summit leader name
                                    <span class="required"></span>
                                </label>
                                @error('leader')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            </div>
                        <div class="col-md-4">
                            <div class="form-floating mb-3">
                                <input type="tel" name="leader_contact" id="leader_contact"
                                       value="{{ old("leader_contact") }}"
                                       autocomplete="off"
                                       class="form-input @error('leader_contact') border-danger @enderror"/>
                                  <label for="leader_contact">
                                    Leader contact
                                    <span class="required"></span>
                                </label>
                                @error('leader_contact')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="mb-6">
                            <div class="mb-7">
                                 <label for="leader_bio">
                                    Leader bio
                                    <span class="required"></span>
                                </label>
                                <textarea name="leader_bio" id="leader_bio_ckeditor_classic"
                                          class="form-control   @error('leader_bio') border-danger @enderror ">
                                    {{ old("leader_bio") }}
                                </textarea>

                                @error('leader_bio')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                        </div>

                    </div>
                    <div class="mb-6">
                            <div class="mb-7">
                                 <label for="description">
                                    Summit brief
                                    <span class="required"></span>
                                </label>
                                <textarea name="description" id="description_ckeditor_classic"
                                          class="form-control @error('description') border-danger @enderror ">
                                    {{ old("description") }}
                                </textarea>

                                @error('description')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                        </div>

                    </div>
                    <div class="mb-6">
                    <div class="form-floating mb-7">

                        <input name="targets" id="targets"
                               class="form-control @error('targets') border-danger @enderror ">
                        {{ old("targets") }}
                        </textarea>
                        <label for="targets">
                            Target audience (Type and enter to create multiple audiences)
                            <span class="required"></span>
                        </label>
                        @error('targets')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                </div>
              </div>

                    <div class="d-flex flex-wrap d-flex justify-content-end pb-lg-0">
                        <a href="{{ route('summits.events.index') }}" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-success ml-3">
                            @include('partials/general/_button-indicator', ['label' => 'Save'])
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
              .create(document.querySelector('#description_ckeditor_classic'))
              .then(editor => {
              })
              .catch(error => {
                  console.error(error);
              });
          ClassicEditor
              .create(document.querySelector('#leader_bio_ckeditor_classic'))
              .then(editor => {
              })
              .catch(error => {
                  console.error(error);
              });

          new Tagify(document.querySelector("#targets"));
      </script>
    @endpush

</x-default-layout>
