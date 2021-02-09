@push('scripts')
    <script src="{{asset('backend/js/summernote.min.js')}}"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('.summernote').summernote({
                height: 350, // set editor height
                minHeight: null, // set minimum height of editor
                maxHeight: null, // set maximum height of editor
                focus: false // set focus to editable area after initializing summernote
            });
        });
    </script>
@endpush
