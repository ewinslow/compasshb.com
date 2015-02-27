@include('layouts.header')

@include('layouts.dashboardnav')

    <div class="container-fluid">
      <div class="row">

      @include('layouts.dashboardsidenav');

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" style="padding-top: 70px;">
          <div class="row">
            <div class="col-md-8">

              @yield('content')

            </div>
            <div class="col-md-4">

              @yield('sidebar')

            </div>
          </div>

        </div>
      </div>
    </div>

  </body>
</html>