// Initialize KTMenu
KTMenu.init();

// Add click event listener to delete buttons
document.querySelectorAll('[data-kt-action="delete_row"]').forEach(function (element) {
    element.addEventListener('click', function () {
        Swal.fire({
            text: 'Are you sure you want to remove?',
            icon: 'warning',
            buttonsStyling: false,
            showCancelButton: true,
            confirmButtonText: 'Yes',
            cancelButtonText: 'No',
            customClass: {
                confirmButton: 'btn btn-danger',
                cancelButton: 'btn btn-secondary',
            }
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.emit('delete_speaker', this.getAttribute('data-kt-speaker-id'));
            }
        });
    });
});

// Add click event listener to update buttons
document.querySelectorAll('[data-kt-action="update_speaker"]').forEach(function (element) {
    element.addEventListener('click', function () {
        Livewire.emit('update_speaker', this.getAttribute('data-kt-speaker-id'));
    });
});

document.querySelectorAll('[data-kt-action="add_speaker"]').forEach(function (element) {
    element.addEventListener('click', function () {
        Livewire.emit('add_speaker');
    });
});

// Listen for 'success' event emitted by Livewire
Livewire.on('success', (message) => {
    // Reload the users-table datatable
    LaravelDataTables['speakers-table'].ajax.reload();
});
