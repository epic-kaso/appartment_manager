<div class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
                <img src="http://localhost:8000/img/LOGO.gif" class="img-responsive" style="
                    height: 50px;
                ">
            </div>
        <ul class="nav navbar-nav">
            <li><a href="{{ route('tenant-dashboard.index') }}">Dashboard</a></li>
            <li><a href="{{ route('tenant-dashboard.complaints.index') }}">Complaints</a></li>
            <li><a href="{{ route('tenant-dashboard.profile.index') }}">Profile</a></li>
        </ul>

        <ul class="nav navbar-nav navbar-right">
            <li>
            <a href="{{ action('AppartmentManager\Controllers\Tenant\Auth\AuthController@getLogout') }}">
                @if(isset($tenant) && !empty($tenant))
                    {{  $tenant->first_name}}  - Logout
                @endif
            </a>
            </li>
        </ul>
    </div>
</div>