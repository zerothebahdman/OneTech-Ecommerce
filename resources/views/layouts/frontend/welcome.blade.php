<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title', 'OneTech Ecommerce | Online shopping for Appliances, Tech Products & More')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="OneTech shop project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('backend/img/favicon.ico') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link href="{{ asset('frontend/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css') }}" rel="stylesheet"
        type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('frontend/plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/plugins/OwlCarousel2-2.2.1/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/plugins/slick-1.8.0/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/main_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/responsive.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/tags.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

</head>

<body>
    @include('sweetalert::alert')

    @yield('welcome')


    <script src="{{ asset('frontend/js/jquery-3.3.1.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    <script src="{{ asset('frontend/plugins/greensock/TweenMax.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/greensock/TimelineMax.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/scrollmagic/ScrollMagic.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/greensock/animation.gsap.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/greensock/ScrollToPlugin.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.js') }}"></script>
    <script src="{{ asset('frontend/plugins/slick-1.8.0/slick.js') }}"></script>
    <script src="{{ asset('frontend/plugins/easing/easing.js') }}"></script>
    <script src="{{ asset('frontend/js/custom.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    @yield('scripts')
    <script>
        $(document).ready(function() {
            $('.add_wishlist').on('click', function() {
                var id = $(this).data('id');
                if (id) {
                    $.ajax({
                        url: "{{ url('/user/add/wishlist/') }}/" + id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 4000,
                                timerProgressBar: true,
                                didOpen: (toast) => {
                                    toast.addEventListener('mouseenter', Swal
                                        .stopTimer)
                                    toast.addEventListener('mouseleave', Swal
                                        .resumeTimer)
                                }
                            })
                            if ($.isEmptyObject(data.error)) {
                                Toast.fire({
                                    icon: 'success',
                                    title: data.success
                                });
                            } else {
                                Toast.fire({
                                    icon: 'error',
                                    title: data.error
                                });
                            }
                        }
                    });
                } else {
                    alert(danger);
                }
            });
        });

        {{--$(document).ready(function() {--}}
        {{--    $('.add_cart').on('click', function() {--}}
        {{--        var id = $(this).data('id');--}}
        {{--        if (id) {--}}
        {{--            $.ajax({--}}
        {{--                url: "{{ url('/user/add/cart/') }}/" + id,--}}
        {{--                type: "GET",--}}
        {{--                dataType: "json",--}}
        {{--                success: function(data) {--}}
        {{--                    const Toast = Swal.mixin({--}}
        {{--                        toast: true,--}}
        {{--                        position: 'top-end',--}}
        {{--                        showConfirmButton: false,--}}
        {{--                        timer: 4000,--}}
        {{--                        timerProgressBar: true,--}}
        {{--                        didOpen: (toast) => {--}}
        {{--                            toast.addEventListener('mouseenter', Swal--}}
        {{--                                .stopTimer)--}}
        {{--                            toast.addEventListener('mouseleave', Swal--}}
        {{--                                .resumeTimer)--}}
        {{--                        }--}}
        {{--                    })--}}
        {{--                    if ($.isEmptyObject(data.error)) {--}}
        {{--                        Toast.fire({--}}
        {{--                            icon: 'success',--}}
        {{--                            title: data.success--}}
        {{--                        });--}}
        {{--                    } else {--}}
        {{--                        Toast.fire({--}}
        {{--                            icon: 'error',--}}
        {{--                            title: data.error--}}
        {{--                        });--}}
        {{--                    }--}}
        {{--                }--}}
        {{--            });--}}
        {{--        } else {--}}
        {{--            alert(danger);--}}
        {{--        }--}}
        {{--    });--}}
        {{--});--}}

    </script>
</body>

</html>
