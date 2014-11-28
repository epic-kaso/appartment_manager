<div class="list-group">
    <a class="list-group-item" href="{{ action('AppartmentManager\Controllers\Admin\ProfileController@getIndex') }}">View Profile</a>
    <a class="list-group-item" href="{{ action('AppartmentManager\Controllers\Admin\ProfileController@getEdit') }}">Edit Profile</a>
    <a class="list-group-item" href="{{ url('admin/auth/change-password') }}">Change Password</a>
</div>