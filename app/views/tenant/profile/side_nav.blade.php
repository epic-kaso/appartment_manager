<div class="list-group">
    <a class="list-group-item" href="{{ route('tenant-dashboard.profile.index') }}">View Profile</a>
    <a class="list-group-item" href="{{ action('AppartmentManager\Controllers\Tenant\ProfileController@edit') }}">Edit Profile</a>
    <a class="list-group-item" href="{{ url('tenant/auth/change_password') }}">Change Password</a>
</div>