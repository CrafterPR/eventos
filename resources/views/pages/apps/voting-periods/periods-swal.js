// Initialize KTMenu
KTMenu.init();

// Add click event listener to delete buttons
document.querySelectorAll('[data-kt-action="close_voting"]').forEach(function (element) {
    element.addEventListener('click', function () {
        Swal.fire({
            text: 'Are you sure you want to close this voting period?',
            icon: 'warning',
            buttonsStyling: false,
            showCancelButton: true,
            confirmButtonText: 'Yes, Close it!',
            cancelButtonText: 'No',
            customClass: {
                confirmButton: 'btn btn-danger',
                cancelButton: 'btn btn-secondary',
            }
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.dispatch('close_voting', { uuid: this.getAttribute('data-kt-period-id') });
            }
        });
    });
});


document.querySelectorAll('[data-kt-action="open_voting"]').forEach(function (element) {
    element.addEventListener('click', function () {
        Swal.fire({
            text: 'Are you sure you want to Open this voting period?',
            icon: 'success',
            buttonsStyling: false,
            showCancelButton: true,
            confirmButtonText: 'Yes, Open it!',
            cancelButtonText: 'No',
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-secondary',
            }
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.dispatch('open_voting_period', { uuid: this.getAttribute('data-kt-period-id') });
            }
        });
    });
});



document.querySelectorAll('[data-kt-action="delete_period"]').forEach(function (element) {
    element.addEventListener('click', function () {
        Swal.fire({
            text: 'Are you sure you want to delete this voting period?',
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
                Livewire.dispatch('delete_period', { uuid: this.getAttribute('data-kt-period-id') });
            }
        });
    });
});

document.querySelectorAll('[data-kt-action="send_reminder"]').forEach(function (element) {
    element.addEventListener('click', function () {
        Swal.fire({
            text: 'Are you sure you want to notify all voters to participate?',
            icon: 'success',
            buttonsStyling: false,
            showCancelButton: true,
            confirmButtonText: 'Yes, Send reminders!',
            cancelButtonText: 'No',
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-primary',
            }
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.dispatch('send_reminders', { period: this.getAttribute('data-kt-period-id') });
            }
        });
    });
});


// Listen for 'success' event dispatchted by Livewire

Livewire.on('success', (message) => {
    // Reload the users-table datatable
    LaravelDataTables['voting-periods'].ajax.reload();
});
