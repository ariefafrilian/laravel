<form action="{{ ($user->exists ?? false) != false ? url('users/'.$user->id) : url('users') }}" method="POST" enctype="multipart/form-data" id="form" autocomplete="off">
  @if($user->exists ?? false)
  @method('PATCH')
  @endif

  <div class="form-group">
    <label for="nip">NIP</label>
    <input name="nip" value="{{ ($user->exists ?? false) != false ? $user->nip : '' }}" type="text" class="form-control" id="nip" placeholder="NIP">
  </div>

  <div class="form-group">
    <label for="email">Email</label>
    <input name="email" value="{{ ($user->exists ?? false) != false ? $user->email : '' }}" type="email" class="form-control" id="email" placeholder="Email address">
  </div>

  <div class="form-group">
    <label for="password">Password</label>
    <input name="password" value="{{ ($user->exists ?? false) != false ? $user->password : '' }}" type="text" class="form-control" id="password" placeholder="Password">
  </div>

  <div class="form-group">
    <label for="first_name">First name</label>
    <input name="first_name" value="{{ ($user->exists ?? false) != false ? $user->first_name : '' }}" type="text" class="form-control" id="first_name" placeholder="First name">
  </div>

  <div class="form-group">
    <label for="last_name">Last name</label>
    <input name="last_name" value="{{ ($user->exists ?? false) != false ? $user->last_name : '' }}" type="text" class="form-control" id="last_name" placeholder="Last name">
  </div>

  <div class="form-group">
  	<div class="form-check form-check-inline">
  		<input class="form-check-input" type="radio" name="gender" id="male" value="M" {{ (($user->exists ?? false) != false) && ($user->gender == 'M') ? 'checked' : 'checked' }}>
  		<label class="form-check-label" for="male">Male</label>
	</div>
	<div class="form-check form-check-inline">
  		<input class="form-check-input" type="radio" name="gender" id="female" value="F" {{ (($user->exists ?? false) != false) && ($user->gender == 'F') ? 'checked' : '' }}>
  		<label class="form-check-label" for="female">Female</label>
	</div>
  </div>

  <div class="form-group">
    <label for="city">City</label>
    <input name="city" value="{{ ($user->exists ?? false) != false ? $user->city : '' }}" type="text" class="form-control" id="city" placeholder="City">
  </div>

  <div class="form-group">
    <label for="birth">Birth</label>
    <input name="birth" value="{{ ($user->exists ?? false) != false ? $user->birth : '' }}" type="date" class="form-control" id="birth" placeholder="Birth">
  </div>

  <div class="form-group">
    <label for="address">Address</label>
    <textarea name="address" class="form-control" id="address" placeholder="Address...">{{ ($user->exists ?? false) != false ? $user->address : '' }}</textarea>
  </div>

  <div class="form-group">
    <label for="photo">Photo</label>
    <input name="photo" type="file" class="form-control-file" id="photo">
  </div>
</form>