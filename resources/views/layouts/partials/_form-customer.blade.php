<form action="{{ ($customer->exists ?? false) != false ? url('customers/'.$customer->id) : url('customers') }}" method="POST" enctype="multipart/form-data" id="form" autocomplete="off">
  @if($customer->exists ?? false)
  @method('PATCH')
  @endif

  <div class="form-group">
    <label for="code">Code</label>
    <input name="code" value="{{ ($customer->exists ?? false) != false ? $customer->code : '' }}" type="text" class="form-control" id="code" placeholder="Customer code">
  </div>

  <div class="form-group">
    <label for="first_name">First name</label>
    <input name="first_name" value="{{ ($customer->exists ?? false) != false ? $customer->first_name : '' }}" type="text" class="form-control" id="first_name" placeholder="First name">
  </div>

  <div class="form-group">
    <label for="last_name">Last name</label>
    <input name="last_name" value="{{ ($customer->exists ?? false) != false ? $customer->last_name : '' }}" type="text" class="form-control" id="last_name" placeholder="Last name">
  </div>

  <div class="form-group">
  	<div class="form-check form-check-inline">
  		<input class="form-check-input" type="radio" name="gender" id="male" value="M" {{ (($customer->exists ?? false) != false) && ($customer->gender == 'M') ? 'checked' : 'checked' }}>
  		<label class="form-check-label" for="male">Male</label>
	</div>
	<div class="form-check form-check-inline">
  		<input class="form-check-input" type="radio" name="gender" id="female" value="F" {{ (($customer->exists ?? false) != false) && ($customer->gender == 'F') ? 'checked' : '' }}>
  		<label class="form-check-label" for="female">Female</label>
	</div>
  </div>

  <div class="form-group">
    <label for="city">City</label>
    <input name="city" value="{{ ($customer->exists ?? false) != false ? $customer->city : '' }}" type="text" class="form-control" id="city" placeholder="City">
  </div>

  <div class="form-group">
    <label for="birth">Birth</label>
    <input name="birth" value="{{ ($customer->exists ?? false) != false ? $customer->birth : '' }}" type="date" class="form-control" id="birth" placeholder="Birth">
  </div>

  <div class="form-group">
    <label for="address">Address</label>
    <textarea name="address" class="form-control" id="address" placeholder="Address...">{{ ($customer->exists ?? false) != false ? $customer->address : '' }}</textarea>
  </div>

  <div class="form-group">
    <label for="email">Email</label>
    <input name="email" value="{{ ($customer->exists ?? false) != false ? $customer->email : '' }}" type="email" class="form-control" id="email" placeholder="Email address">
  </div>

  <div class="form-group">
    <label for="phone">Phone</label>
    <input name="phone" value="{{ ($customer->exists ?? false) != false ? $customer->phone : '' }}" type="phone" class="form-control" id="phone" placeholder="Phone number">
  </div>

  <div class="form-group">
    <label for="photo">Photo</label>
    <input name="photo" type="file" class="form-control-file" id="photo">
  </div>
</form>