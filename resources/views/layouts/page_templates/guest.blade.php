@include('layouts.navbars.navs.guest')
<div class="wrapper wrapper-full-page">
  <div class="page-header login-page header-filter" filter-color="black" style="" data-color="red">
  <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
    @yield('content')
    @include('layouts.footers.guest')
    <!-- <img class="background-img" src="{{ asset('material') }}/img/uniandes.jpg" /> -->
    <img class="background-img" srcset="{{ asset('material') }}/img/uniandes-576.jpg 576w,
               {{ asset('material') }}/img/uniandes-768.jpg 768w,
               {{ asset('material') }}/img/uniandes-992.jpg 992w,
               {{ asset('material') }}/img/uniandes-1200.jpg 1200w"
       src="{{ asset('material') }}/img/uniandes.jpg" alt="Universidad de los Andes">

    </div>
</div>
