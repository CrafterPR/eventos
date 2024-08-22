// Initialize KTMenu
KTMenu.init();

// Add click event listener to delete buttons
document.querySelectorAll('[data-kt-action="delete_row"]').forEach(function (element) {
    element.addEventListener('click', function () {
        Swal.fire({
            text: 'Are you sure you want to delete the event?',
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
                Livewire.dispatch('delete_event', { 'event': this.getAttribute('data-kt-event-id')});
            }
        });
    });
});


document.querySelectorAll('[data-kt-action="approve_row"]').forEach(function (element) {
    element.addEventListener('click', function () {
        Swal.fire({
            text: 'Are you sure you want to approve this event?',
            icon: 'success',
            buttonsStyling: false,
            showCancelButton: true,
            confirmButtonText: 'Yes',
            cancelButtonText: 'No',
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-secondary',
            }
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.dispatch('approve_event', { 'event': this.getAttribute('data-kt-event-id')});
            }
        });
    });
});

document.querySelectorAll('[data-kt-action="reminder_row"]').forEach(function (element) {
    element.addEventListener('click', function () {
        Swal.fire({
            text: 'Send an email reminder for this pending payment to the delegate?',
            icon: 'success',
            buttonsStyling: false,
            showCancelButton: true,
            confirmButtonText: 'Yes',
            cancelButtonText: 'No',
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger',
            }
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.dispatch('remind_payment',{ 'event': this.getAttribute('data-kt-event-id')});
            }
        });
    });
});

document.querySelectorAll('[data-kt-action="update_manually"]').forEach(function (element) {
    element.addEventListener('click', function () {
        Livewire.dispatch('update_manually', this.getAttribute('data-kt-event-id'));
    });
});

document.querySelectorAll('[data-kt-action="inactivate_row"]').forEach(function (element) {
    element.addEventListener('click', function () {
        Swal.fire({
            text: 'Are you sure you want to Inactivate this event?',
            icon: 'warning',
            buttonsStyling: false,
            showCancelButton: true,
            confirmButtonText: 'Yes',
            cancelButtonText: 'No',
            customClass: {
                confirmButton: 'btn btn-warning',
                cancelButton: 'btn btn-secondary',
            }
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.dispatch('inactivate_row',{ 'event': this.getAttribute('data-kt-event-id')});
            }
        });
    });
});
document.querySelectorAll('[data-kt-action="activate_row"]').forEach(function (element) {
    element.addEventListener('click', function () {
        Swal.fire({
            text: 'Are you sure you want to activate this event?',
            icon: 'success',
            buttonsStyling: false,
            showCancelButton: true,
            confirmButtonText: 'Yes',
            cancelButtonText: 'No',
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-secondary',
            }
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.dispatch('activate_row', { 'event': this.getAttribute('data-kt-event-id')});
            }
        });
    });
});


document.querySelectorAll('[data-kt-action="update_event"]').forEach(function (element) {
    element.addEventListener('click', function () {
         Livewire.dispatch('update_event', { 'event': this.getAttribute('data-kt-event-id')});
    });
});
document.querySelectorAll('[data-kt-action="un_approve_row"]').forEach(function (element) {
    element.addEventListener('click', function () {
        Swal.fire({
            text: 'Are you sure you want to Un-approve this event?',
            icon: 'warning',
            buttonsStyling: false,
            showCancelButton: true,
            confirmButtonText: 'Yes',
            cancelButtonText: 'No',
            customClass: {
                confirmButton: 'btn btn-warning',
                cancelButton: 'btn btn-secondary',
            }
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.dispatch('un_approve_event', this.getAttribute('data-kt-event-id'));
            }
        });
    });
});




