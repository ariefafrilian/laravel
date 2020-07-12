<div class="card bg-dark text-white">
  <img class="card-img" src="{{ $customer->photo == '0' ? asset('img/default.png') : asset('storage/customer/'.$customer->photo) }}" alt="Card image">
  @if($customer->photo != '0')
  <div class="card-img-overlay">
  	<a href="{{ url('customers/photo/'.$customer->id) }}" class="btn btn-sm btn-danger" id="btn-delete-photo">
  		<i class="fas fa-trash"></i>
  	</a>
  </div>
  @endif
</div>

<strong><i class="fas fa-address-card"></i> Customer code</strong>
<p class="text-muted text-truncate">{{ $customer->code }}</p>
<hr>

<strong><i class="fas fa-signature"></i> First name</strong>
<p class="text-muted text-truncate">{{ $customer->first_name }}</p>
<hr>

<strong><i class="fas fa-signature"></i> Last name</strong>
<p class="text-muted text-truncate">{{ $customer->last_name }}</p>
<hr>

<strong><i class="fas fa-venus-mars"></i> Gender</strong>
<p class="text-muted text-truncate">{{ $customer->gender == 'M' ? 'Male' : 'Female' }}</p>
<hr>

<strong><i class="fas fa-city"></i> City</strong>
<p class="text-muted text-truncate">{{ $customer->city }}</p>
<hr>

<strong><i class="fas fa-calendar-alt"></i> Birth</strong>
<p class="text-muted text-truncate">{{ $customer->birth }}</p>
<hr>

<strong><i class="fas fa-map-pin"></i> Address</strong>
<p class="text-muted">{{ $customer->address }}</p>

<strong><i class="fas fa-at"></i> Email</strong>
<p class="text-muted text-truncate">{{ $customer->email }}</p>
<hr>

<strong><i class="fas fa-phone"></i> Phone</strong>
<p class="text-muted text-truncate">{{ $customer->phone }}</p>
<hr>

<strong><i class="fas fa-cube"></i> Points</strong>
<p class="text-muted text-truncate">{{ $customer->points }}</p>