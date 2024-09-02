<x-default-layout>

    @section('title')
        Checkin Delegates
    @endsection

    @section('breadcrumbs')
        {{ Breadcrumbs::render('events.manage-events.checkin') }}
    @endsection

    <div class="card">

        <div class="card-body py-4">
            <!--begin::Table-->
            <h2 class="text-active-gray-900">Event: {{ $event->title }}</h2>
            <div class="justify-content-center" data-kt-user-table-toolbar="base">
                <form class="form" action="{{ route("events.delegates.checkin.store", ['event' => $event->id]) }}" method="post" id="delegateForm">
                    @csrf
                             <div class="form-floating mb-3">
                                <input type="text" name="delegate_id" id="delegate_id"
                                       tabindex="1"
                                       autocomplete="off"
                                       class="form-control  @error('delegate_id') border-danger @enderror "/>
                                <label for="delegate_id">
                                    Scan the Delegate QrCode on their tag (System generated)
                                    <span class="required"></span>
                                </label>
                                @error('delegate_id')
                                 <div class="alert alert-danger d-flex align-items-center alert-dismissible fade show mt-6" role="alert">
                                     <!-- Exclamation Icon -->
                                     <i class="fa fa-exclamation-circle me-2"></i>
                                     <!-- Error Message -->
                                     <div>
                                         {{ $message }}
                                     </div>
                                     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                                 </div
                                @enderror
                                 @if (session('success'))
                                     <div class="alert alert-success alert-dismissible fade show mt-6" role="alert">
                                         <i class="fas fa-check-circle me-2"></i>
                                         {{ session('success') }}
                                         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                     </div>
                                 @endif
                            </div>
                </form>
            </div>
            <!--end::Table-->
        </div>
        <!--end::Card body-->
    </div>

    @push('scripts')

        <script>

            document.addEventListener('DOMContentLoaded', function() {
                // Automatically focus the delegate_id input field
                const delegateInput = document.getElementById('delegate_id');
                delegateInput.focus();

                // Listen for input on the delegate_id field
                delegateInput.addEventListener('input', function() {
                    // Check if the input has a value
                    if (this.value.trim() !== '') {
                        // Automatically submit the form
                        document.getElementById('delegateForm').submit();
                    }
                });
            });

            document.addEventListener('DOMContentLoaded', function () {
                @if (session('success'))
                playSound('{{ asset('sounds/success.mp3') }}');
                @elseif (session('error') || $errors->any())
                playSound('{{ asset('sounds/error.mp3') }}');
                @endif
            });

            function playSound(url) {
                const audio = new Audio(url);
                audio.play();
            }

            // Wait until the document is fully loaded
            document.addEventListener('DOMContentLoaded', (event) => {
                // Select the alert element by its Class
                const alert = document.querySelector('.alert-dismissible');
                  if (alert) {
                    setTimeout(() => {
                        // Remove the alert using Bootstrap's dismissal method
                        alert.classList.remove('show');
                        $('#delegate_id').removeClass('border-danger');
                        // Optionally, completely remove the element from the DOM
                        setTimeout(() => alert.remove(), 150); // Delay to allow fade out
                    }, 3000); // 5000 milliseconds = 5 seconds
                }
            });

        </script>
    @endpush

</x-default-layout>
