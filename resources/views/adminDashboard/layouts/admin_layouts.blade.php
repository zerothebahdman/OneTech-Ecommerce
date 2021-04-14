<!DOCTYPE html>
<html lang="en">



<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>@yield('title', 'OneTech Ecommerce')</title>

    <link rel="shortcut icon" href="{{ asset('backend/img/favicon.ico') }}">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&amp;display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('backend/css/tags.css') }}">

    <link class="js-stylesheet" href="{{ asset('backend/css/light.css') }}" rel="stylesheet">


    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css"
        integrity="sha512-xmGTNt20S0t62wHLmQec2DauG9T+owP9e6VU8GigI0anN7OXLip9i7IwEhelasml2osdxX71XcYm6BQunTQeQg=="
        crossorigin="anonymous" />
</head>

<body data-theme="default" data-layout="fluid" data-sidebar-position="left" data-sidebar-behavior="sticky">
    <div class="wrapper">
        @include('adminDashboard.includes.sidebar')
        <div class="main">
            @include('sweetalert::alert')
            @include('adminDashboard.includes.navbar')
            @yield('dashboard')

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row text-muted">
                        <div class="col-6 text-left">
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a class="text-muted" href="#">Support</a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="text-muted" href="#">Help Center</a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="text-muted" href="#">Privacy</a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="text-muted" href="#">Terms of Service</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-6 text-right">
                            <p class="mb-0">
                                &copy;
                                <script>
                                    document.write(new Date().getFullYear());

                                </script> - <a href="{{ route('welcome') }}" class="text-muted">OneTech</a>
                            </p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="{{ asset('backend/js/app.js') }}"></script>
{{--     <script src="{{ asset('backend/js/jquery.js') }}"></script>--}}
{{--    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>--}}
{{--    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>--}}
{{--    <script src="https://cdn.datatables.net/fixedheader/3.1.8/js/dataTables.fixedHeader.min.js"></script>--}}
{{--    <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>--}}
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.js"
        integrity="sha512-VvWznBcyBJK71YKEKDMpZ0pCVxjNuKwApp4zLF3ul+CiflQi6aIJR+aZCP/qWsoFBA28avL5T5HA+RE+zrGQYg=="
        crossorigin="anonymous"></script>

    @yield('script')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Datatables Responsive
            $("#datatables-reponsive").DataTable({
                responsive: true,
            });
        });
    </script>
    <script>
        // $(document).ready(function() {
        //     var table = $('#datatables-reponsive').DataTable({
        //         responsive: true,
        //     });
        //
        //     new $.fn.dataTable.FixedHeader(table);
        // });

        $(document).ready(function() {
            $('select[name="category_id"]').on('change', function() {

                // console.log('Listening')
                var category_id = $(this).val();
                if (category_id) {

                    $.ajax({
                        url: "{{ url('/admin/products/subcategory/') }}/" + category_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="sub_category_id"]').empty();
                            $.each(data, function(key, value) {

                                $('select[name="sub_category_id"]').append(
                                    '<option value="' + key + '">' + value +
                                    '</option>');
                            });
                        },
                    });

                } else {
                    $('select[name="sub_category_id"]').empty();
                }

            });
        });
        $(document).on("click", "#delete", function(e) {
            e.preventDefault();
            var link = $(this).attr("href");

            swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this data!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        swal("Poof! File has been deleted successfull!", {
                            icon: "success",
                        });
                        // window.location.href = link;
                    } else {
                        swal("Your data is safe!", {
                            icon: "info"
                        });
                    }
                });
        });

    </script>

</body>

</html>
