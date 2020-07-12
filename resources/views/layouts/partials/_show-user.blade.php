<div class="card bg-dark text-white">
  <img class="card-img" src="{{ $user->photo == '0' ? asset('img/default.png') : asset('storage/employee/'.$user->photo) }}" alt="Card image">
  @if($user->photo != '0')
  <div class="card-img-overlay">
  	<a href="{{ url('users/photo/'.$user->id) }}" class="btn btn-sm btn-danger" id="btn-delete-photo">
  		<i class="fas fa-trash"></i>
  	</a>
  </div>
  @endif
</div>

<strong><i class="fas fa-address-card"></i> NIP</strong>
<p class="text-muted text-truncate">{{ $user->nip }}</p>
<hr>

<strong><i class="fas fa-at"></i> Email</strong>
<p class="text-muted text-truncate">{{ $user->email }}</p>
<hr>

<strong><i class="fas fa-key"></i> Password</strong>
<p class="text-muted text-truncate">{{ $user->password }}</p>
<hr>

<strong><i class="fas fa-signature"></i> First name</strong>
<p class="text-muted text-truncate">{{ $user->first_name }}</p>
<hr>

<strong><i class="fas fa-signature"></i> Last name</strong>
<p class="text-muted text-truncate">{{ $user->last_name }}</p>
<hr>

<strong><i class="fas fa-venus-mars"></i> Gender</strong>
<p class="text-muted text-truncate">{{ $user->gender == 'M' ? 'Male' : 'Female' }}</p>
<hr>

<strong><i class="fas fa-city"></i> City</strong>
<p class="text-muted text-truncate">{{ $user->city }}</p>
<hr>

<strong><i class="fas fa-calendar-alt"></i> Birth</strong>
<p class="text-muted text-truncate">{{ $user->birth }}</p>
<hr>

<strong><i class="fas fa-map-pin"></i> Address</strong>
<p class="text-muted">{{ $user->address }}</p>