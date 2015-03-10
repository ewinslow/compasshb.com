@include('layouts.header')

<style>
body
{
  background:none;
}
</style>

@include('layouts.dashboardnav')

    <div class="container-fluid">
      <div class="row">

      @include('layouts.dashboardsidenav');

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" style="padding-top: 70px;">
          <div class="row">
            <div class="col-md-9" style="padding: 0 80px 0 40px;">

              @yield('content')

            </div>
            <div class="col-md-3">

              @yield('sidebar')

            </div>
          </div>

        </div>
      </div>
    </div>

    @include('layouts.script');

  </body>
</html>
