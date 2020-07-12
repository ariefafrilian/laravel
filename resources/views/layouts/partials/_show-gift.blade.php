<div class="card bg-dark text-white">
  <img class="card-img" src="{{ $gift->photo == '0' ? asset('img/default.png') : asset('storage/gift/'.$gift->photo) }}" alt="Card image">
  @if($gift->photo != '0')
  <div class="card-img-overlay">
  	<a href="{{ url('gifts/photo/'.$gift->id) }}" class="btn btn-sm btn-danger" id="btn-delete-photo">
  		<i class="fas fa-trash"></i>
  	</a>
  </div>
  @endif
</div>

<strong><i class="fas fa-signature"></i> Name</strong>
<p class="text-muted text-truncate">{{ $gift->name }}</p>
<hr>

<strong><i class="fas fa-barcode"></i> Serial number</strong>
<p class="text-muted text-truncate">{{ $gift->serial }}</p>
<hr>

<strong><i class="fas fa-file-alt"></i> Description</strong>
<p class="text-muted text-truncate">{{ $gift->description }}</p>
<hr>

<strong><i class="fas fa-cube"></i> Points</strong>
<p class="text-muted text-truncate">{{ $gift->points }}</p>