<link rel="stylesheet" href="{{ asset('/assets/css/style.bundle.css') }}">
<link href="{{ asset('styles/exhibitor.css') }}" rel="stylesheet" />

    <main class="h-screen">
        <section class="w-full">
            <div class="banner-wrap d-flex flex-column flex-column-fluid flex-lg-row h-full"
                 style="background-image:url('{{ asset('assets/media/images/banner.webp') }}'); min-height: 100vh !important;  background-attachment: fixed;background-position: center;background-repeat: no-repeat;background-size: cover;">
                <section class="flex-column flex-column-fluid flex-lg-row">
                  <div class="d-flex flex-center w-lg-50 pt-15 pt-lg-0 px-10">
                      <div class="banner-wrap_content">

                      </div>
                  </div>
                  <div class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-12 p-lg-20">
                     {{ $slot  }}
                  </div>
                </section>

            </div>
        </section>
    </main>



