// Initialize KTMenu

KTMenu.init();

// Add click event listener to delete buttons
document.querySelectorAll('[data-kt-action="disable_voter"]').forEach(function (element) {
    element.addEventListener('click', function () {
        Swal.fire({
            text: 'Are you sure you want to disable this voter?',
            icon: 'warning',
            buttonsStyling: false,
            showCancelButton: true,
            confirmButtonText: 'Yes, Disable!',
            cancelButtonText: 'No',
            customClass: {
                confirmButton: 'btn btn-danger',
                cancelButton: 'btn btn-secondary',
            }
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.dispatch('disable_voter', { uuid: this.getAttribute('data-kt-voter-id')});
            }
        });
    });
});


document.querySelectorAll('[data-kt-action="enable_voter"]').forEach(function (element) {
    element.addEventListener('click', function () {
        Swal.fire({
            text: 'Are you sure you want to enable this voter?',
            icon: 'success',
            buttonsStyling: false,
            showCancelButton: true,
            confirmButtonText: 'Yes, Enable!',
            cancelButtonText: 'No',
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-secondary',
            }
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.dispatch('enable_voter', { uuid: this.getAttribute('data-kt-voter-id') });
            }
        });
    });
});



document.querySelectorAll('[data-kt-action="delete_voter"]').forEach(function (element) {
    element.addEventListener('click', function () {
        Swal.fire({
            text: 'Are you sure you want to delete this voter?',
            icon: 'danger',
            buttonsStyling: false,
            showCancelButton: true,
            confirmButtonText: 'Yes, Delete it!',
            cancelButtonText: 'No',
            customClass: {
                confirmButton: 'btn btn-danger',
                cancelButton: 'btn btn-secondary',
            }
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.dispatch('delete_voter', { uuid: this.getAttribute('data-kt-voter-id') });
            }
        });
    });
});

// Listen for 'success' event emitted by Livewire

Livewire.on('success', (message) => {
    // Reload the users-table datatable

    LaravelDataTables['voters'].ajax.reload();
});
