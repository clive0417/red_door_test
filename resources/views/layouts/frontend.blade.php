<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('layouts.head')

<body>

    <!--  preloader start 讀取時的頁面 -->
    @include('layouts.preloader')
    <!-- preloader end -->

    <div class="wrapper">

        <!--header start-->
        @include('layouts.header',['overlay'=>(isset($overlay))? $overlay:null])

        <!--header end-->

        <!--hero section-->
        @yield('hero')
        @yield('page_title')

        <!--hero section-->

        <!--body content start-->


            <!--feature to promo-->
            @yield('content')
           
            <!--feature to promo-->

        <!--body content end-->

        <!--footer start 1-->
        @include('layouts.footer')
        <!--footer 1 end-->

    </div>
    @include('layouts.js')

    @yield('script')


    
</body>

</html>
