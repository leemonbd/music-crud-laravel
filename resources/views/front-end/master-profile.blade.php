<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title')</title>
    <link rel="icon" type="image/png" href="{{asset('/')}}front-end/images/favicon.png">
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset('/')}}front-end/css/style.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset('/')}}front-end/css/bootstrap.css"/>
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset('/')}}front-end/css/magnific-popup.css"/>
</head>
<body>

    @include('front-end.includes.header')
    <div class="container">
        <div>
            @include('front-end.includes.big-header')
        </div>

        @yield('profileBody')
    </div>

    @include('front-end.includes.modals')

    <script src="{{asset('/')}}front-end/js/jquery-3.4.1.js"></script>
    <script src="{{asset('/')}}front-end/js/popper.js"></script>
    <script src="{{asset('/')}}front-end/js/jquery.magnific-popup.js"></script>
    <script src="{{asset('/')}}front-end/js/bootstrap.js"></script>
    <script src="{{asset('/')}}front-end/js/simple-sticky-sidebar.js"></script>
    <script src="{{asset('/')}}front-end/js/my.jquery.js"></script>
    <script type="text/javascript">
        simpleStickySidebar('.sidebar-inner', {
            container: '.sidebar',
            topSpace: document.querySelector('.main-header').getBoundingClientRect().height + 25, // or any no i.e 20
            bottomSpace : 25
        });
    </script>
    <script>
        $('#updateTextStatus').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var editText = button.data('edittext')
            var posttextid = button.data('posttextid')
            var modal = $(this)
           /* modal.find('.modal-title').text('New message to ' + recipient)*/
            modal.find('.modal-body #editText').val(editText)
            modal.find('.modal-body #posttextid').val(posttextid)
        })
    </script>

   {{-- <script type="text/javascript">
        $(document).ready(function (){
            $('select[name="division"]').on('change',function (){
                var division=$(this).val();
                if(division){
                    $.ajax({
                        url:"{{url('/get/district/')}}/"+division,
                        type:"GET",
                        dataType:"json",
                        success:function (data){
                            $("#district").empty();
                            $.each(data, function (key, value) {
                                $("#district").append('<option value="' + value.id + '">' + value.district_name + '</option>');
                            });
                        }
                    })
                }else {
                    alert('danger');
                }
            })

        })
    </script>--}}


</body>
</html>
