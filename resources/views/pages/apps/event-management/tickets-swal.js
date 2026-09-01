document.addEventListener('DOMContentLoaded', function () {
    const forms = document.querySelectorAll('.resend-reminder-form');
    forms.forEach(function (form) {
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            const ref = form.dataset.ref || '';

            if (typeof Swal === 'undefined') {
                // Fallback to native confirm
                if (confirm('Send payment reminder to purchaser for ' + ref + '?')) {
                    form.submit();
                }
                return;
            }

            Swal.fire({
                title: 'Send payment reminder?',
                text: 'Send reminder to purchaser for ' + ref + '?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, send',
                cancelButtonText: 'Cancel'
            }).then(function (result) {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });

    // Initialize flatpickr range for purchase date
    try {
        if (typeof flatpickr !== 'undefined') {
            flatpickr('#purchase_date_range', {
                mode: 'range',
                dateFormat: 'Y-m-d',
                allowInput: true,
                onClose: function(selectedDates, dateStr) {
                    if (!dateStr) {
                        document.getElementById('date_from').value = '';
                        document.getElementById('date_to').value = '';
                        return;
                    }
                    var parts = dateStr.split(' to ');
                    if (parts.length === 2) {
                        document.getElementById('date_from').value = parts[0];
                        document.getElementById('date_to').value = parts[1];
                    } else {
                        document.getElementById('date_from').value = parts[0];
                        document.getElementById('date_to').value = parts[0];
                    }
                }
            });
        }
    } catch (err) {
        // ignore
    }

});
