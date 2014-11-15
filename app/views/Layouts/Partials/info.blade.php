@if(isset($message) && !empty($message))
<div style="margin-bottom: 10px;margin-left: auto;margin-right: auto;width: 300px;" class="alert alert-info">
    <p>{{ $message }}</p>
 </div>
@endif

@if(isset($errors) && count($errors->all()) > 0)
<div style="margin-bottom: 10px;margin-left: auto;margin-right: auto;width: 300px;" class="alert alert-danger">
    @foreach($errors->all() as $error)
    <p>{{ $error }}</p>
    @endforeach
 </div>
@endif