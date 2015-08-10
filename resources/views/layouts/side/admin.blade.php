<div col="col-sm-3">
  <ul class="nav nav-pills nav-stacked side-nav">
    <p>Admin</p>
    <li class="{{ setActive('admin/mainservice') }}"><a href="{{ route('admin.mainservice') }}">Main Service</a></li>
    <li class="{{ setActive('admin/read') }}"><a href="{{ route('admin.read') }}">Scripture of the Day</a></li>
    <li class="{{ setActive('admin/sundayschool') }}"><a href="{{ route('admin.sundayschool') }}">Sunday School</a></li>
    <li class="{{ setActive('admin/songs') }}"><a href="{{ route('admin.songs') }}">Worship</a></li>
    <li><a href="/auth/logout">Logout</a></li>
  </ul>
</div>


