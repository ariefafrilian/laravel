<div class="card bg-dark text-white">
  <img class="card-img" src="{{ $item->photo == '0' ? asset('img/default.png') : asset('storage/product/'.$item->photo) }}" alt="Card image">
  @if($item->photo != '0')
  <div class="card-img-overlay">
  	<a href="{{ url('inventories/photo/'.$item->id) }}" class="btn btn-sm btn-danger" id="btn-delete-photo">
  		<i class="fas fa-trash"></i>
  	</a>
  </div>
  @endif
</div>

<strong><i class="fas fa-signature"></i> Name</strong>
<p class="text-muted text-truncate">{{ $item->name }}</p>
<hr>

<strong><i class="fas fa-barcode"></i> Serial number</strong>
<p class="text-muted text-truncate">{{ $item->serial }}</p>
<hr>

<strong><i class="fas fa-file-alt"></i> Description</strong>
<p class="text-muted text-truncate">{{ $item->description }}</p>
<hr>

<strong><i class="fas fa-dollar-sign"></i> Price</strong>
<p class="text-muted text-truncate">{{ 'Rp. ' . number_format($item->price, 0, ',', '.') }}</p>