<div class="list-group">
    <a class="list-group-item" href="{{ action('AppartmentManager\Controllers\Tenant\ProfileController@getIndex') }}">View Profile</a>
    <a class="list-group-item" href="{{ action('AppartmentManager\Controllers\Tenant\ProfileController@getEdit') }}">Edit Profile</a>
    <a class="list-group-item" href="{{ url('tenant/auth/change-password') }}">Change Password</a>
</div>