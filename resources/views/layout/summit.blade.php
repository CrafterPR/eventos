<!DOCTYPE html>
<html lang="en" class="">
@include('layout.partials.summit-head')
<style>
    @import 'intl-tel-input/build/css/intlTelInput.css';
</style
{{ $slot }}
<script src="{{ asset('js/app.js') }}"></script>
@stack('scripts')

@laravelTelInputScripts
</html>

