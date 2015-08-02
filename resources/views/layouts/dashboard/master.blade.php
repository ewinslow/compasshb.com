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
            <a href="{{ route('search') }}" aria-label="Search" id="toggle-search-show" style="float: right; color: #000; position: relative; top: 30px;"  title="Search">
                <span class="glyphicon glyphicon-search"></span>
            </a>

              @yield('content')
          </div>
        </div>

      </div>
    </div>

@include('layouts.footer')
