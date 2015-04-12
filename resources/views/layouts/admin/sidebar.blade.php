<h1 class="page-title tk-seravek-web">&nbsp;</h1>
<p>&nbsp;</p><br/>

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title tk-seravek-web">Admin Pages</h3>
  </div>
  <div class="panel-body">
    <ul class="nav nav-pills nav-stacked">
        <li role="presentation" class="{{ setActive('admin/mainservice') }}"><a href="{{ route('admin.mainservice') }}">Main Service</a></li>
        <li role="presentation" class="{{ setActive('admin/read') }}"><a href="{{ route('admin.read') }}">Scripture of the Day</a></li>
        <li role="presentation" class="{{ setActive('admin/sundayschool') }}"><a href="{{ route('admin.sundayschool') }}">Sunday School</a></li>
        <li role="presentation" class="{{ setActive('admin/fellowship') }}"><a href="{{ route('admin.fellowship') }}">Home Fellowship Groups</a></li>
        <li role="presentation" class="{{ setActive('admin/songs') }}"><a href="{{ route('admin.songs') }}">Worship</a></li>
    </ul>
  </div>
</div>

<p><a href="/auth/logout" class="btn btn-default">Logout</a></p>
