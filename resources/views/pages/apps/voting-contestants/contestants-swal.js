// Initialize KTMenu

KTMenu.init();

// Add click event listener to delete buttons
document.querySelectorAll('[data-kt-action="disable_contestant"]').forEach(function (element) {
    element.addEventListener('click', function () {
        Swal.fire({
            text: 'Are you sure you want to disable this contestant?',
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
                Livewire.dispatch('disable_contestant', { uuid: this.getAttribute('data-kt-contestant-id')});
            }
        });
    });
});


document.querySelectorAll('[data-kt-action="enable_contestant"]').forEach(function (element) {
    element.addEventListener('click', function () {
        Swal.fire({
            text: 'Are you sure you want to enable this contestant?',
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
                Livewire.dispatch('enable_contestant', { uuid: this.getAttribute('data-kt-contestant-id') });
            }
        });
    });
});



document.querySelectorAll('[data-kt-action="delete_contestant"]').forEach(function (element) {
    element.addEventListener('click', function () {
        Swal.fire({
            text: 'Are you sure you want to delete this contestant?',
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
                Livewire.dispatch('delete_contestant', { uuid: this.getAttribute('data-kt-contestant-id') });
            }
        });
    });
});

// Listen for 'success' event emitted by Livewire

Livewire.on('success', (message) => {
    // Reload the users-table datatable

    LaravelDataTables['contestants'].ajax.reload();
});
