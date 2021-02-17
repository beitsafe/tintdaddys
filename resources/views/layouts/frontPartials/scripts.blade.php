<script src="{{asset('frontend/js/jquery-3.1.1.min.js')}}"></script>
<script src="{{asset('frontend/js/parallax.js')}}"></script>
<script src="{{asset('frontend/js/flickity.min.js')}}"></script>
<script src="{{asset('frontend/js/isotope.min.js')}}"></script>
<script src="{{asset('frontend/js/smooth-scroll.min.js')}}"></script>
<script src="{{asset('frontend/js/scripts.js')}}"></script>
<script src="{{asset('frontend/js/cart.js?v'.time())}}"></script>
<script src="//unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
@include('sweet::alert')
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
