<script src="{{asset('frontend/js/jquery-3.1.1.min.js')}}"></script>
<script src="{{asset('frontend/js/parallax.js')}}"></script>
<script src="{{asset('frontend/js/flickity.min.js')}}"></script>
<script src="{{asset('frontend/js/isotope.min.js')}}"></script>
<script src="{{asset('frontend/js/smooth-scroll.min.js')}}"></script>
<script src="{{asset('frontend/js/scripts.js')}}"></script>
<script src="{{asset('frontend/js/cart.js?v'.time())}}"></script>
<script src="//unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"
        integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ=="
        crossorigin="anonymous"></script>
<link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"
      integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw=="
      crossorigin="anonymous" />

@include('sweet::alert')
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

