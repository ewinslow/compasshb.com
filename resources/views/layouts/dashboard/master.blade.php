@include('layouts.header')

<style>
body
{
  background:none;
}
</style>

@include('layouts.dashboard.nav')

    <div class="container-fluid" style="margin-bottom: 75px;">
      <div class="row">

      @include('layouts.dashboard.sidenav')

        <div class="col-sm-8 dashboard-main">
          <div class="row">
              @yield('content')
          </div>
        </div>

      </div>
    </div>

@include('layouts.footer')
