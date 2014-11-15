<div class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <ul class="nav navbar-nav">
            <li><a href="{{ route('appartment.index') }}">Complaints</a></li>
            <li><a href="{{ route('tenant.index') }}">Profile</a></li>
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