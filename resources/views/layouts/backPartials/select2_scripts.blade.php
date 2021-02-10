@push('scripts')
    <link href="{{ asset('backend/css/select2.min.css') }}" rel="stylesheet">
    <script src="{{ asset('backend/js/select2.min.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('.select2').select2();
        });
    </script>
@endpush
