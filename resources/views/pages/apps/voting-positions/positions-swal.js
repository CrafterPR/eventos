// Initialize KTMenu

KTMenu.init();

// Add click event listener to delete buttons
document.querySelectorAll('[data-kt-action="disable_position"]').forEach(function (element) {
    element.addEventListener('click', function () {
        Swal.fire({
            text: 'Are you sure you want to disable this voting position?',
            icon: 'warning',
            buttonsStyling: false,
            showCancelButton: true,
            confirmButtonText: 'Yes, Disable it!',
            cancelButtonText: 'No',
            customClass: {
                confirmButton: 'btn btn-danger',
                cancelButton: 'btn btn-secondary',
            }
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.dispatch('disable_position', { uuid: { uuid: this.getAttribute('data-kt-position-id') } });
            }
        });
    });
});


document.querySelectorAll('[data-kt-action="enable_position"]').forEach(function (element) {
    element.addEventListener('click', function () {
        Swal.fire({
            text: 'Are you sure you want to enable this voting position?',
            icon: 'success',
            buttonsStyling: false,
            showCancelButton: true,
            confirmButtonText: 'Yes, Enable it!',
            cancelButtonText: 'No',
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-secondary',
            }
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.dispatch('enable_position', { uuid: this.getAttribute('data-kt-position-id') });
            }
        });
    });
});



document.querySelectorAll('[data-kt-action="delete_position"]').forEach(function (element) {
    element.addEventListener('click', function () {
        Swal.fire({
            text: 'Are you sure you want to delete this voting position?',
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
                Livewire.dispatch('delete_position', { uuid: this.getAttribute('data-kt-position-id') });
            }
        });
    });
});

// Listen for 'success' event emitted by Livewire

Livewire.on('success', (message) => {
    // Reload the users-table datatable
    LaravelDataTables['voting-positions'].ajax.reload();
});
