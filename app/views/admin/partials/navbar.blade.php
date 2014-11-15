<div class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <ul class="nav navbar-nav">
            <li><a href="{{ route('admin-dashboard.index') }}">Dashboard</a></li>
            <li><a href="{{ route('admin-complaints.index') }}">Complaints</a></li>
            <li><a href="{{ route('appartment.index') }}">Appartments</a></li>
            <li><a href="{{ route('tenant.index') }}">Tenants</a></li>
            <li><a href="{{ route('complaints.category.index') }}">Complaints-Categories</a></li>
            <li><a href="{{ route('admin.index') }}">Admin</a></li>
        </ul>

        <ul class="nav navbar-nav navbar-right">
            <li>
                <a href="{{ action('AppartmentManager\Controllers\Admin\Auth\AuthController@getLogout') }}">
                    @if(isset($admin) && !empty($admin))
                        {{  $admin->name}}  - Logout
                    @endif
                </a>
            </li>
        </ul>
    </div>
</div>