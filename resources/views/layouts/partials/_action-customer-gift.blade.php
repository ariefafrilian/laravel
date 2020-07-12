<div class="text-center">
	<a href="{{ ($gifts->exists ?? false) != false ? url('gifts/' . $gifts->id) : url('buy/' . $customers->id) }}" class="btn btn-sm btn-primary {{ ($gifts->exists ?? false) != false ? 'btn-show' : 'btn-buy' }}"><i class="fas {{ ($gifts->exists ?? false) != false ? 'fa-eye' : 'fa-check' }}"></i> {{ ($gifts->exists ?? false) != false ? 'Show' : 'Buy' }}</a>
	<a href="{{ ($gifts->exists ?? false) != false ? url('gifts/' . $gifts->id . '/edit') : url('customers/' . $customers->id . '/edit') }}" class="btn btn-sm btn-warning btn-edit" data-toggle="modal" data-target="#modal"><i class="fas fa-edit"></i> Edit</a>
	<a href="{{ ($gifts->exists ?? false) != false ? url('gifts/' . $gifts->id) : url('customers/' . $customers->id) }}" class="btn btn-sm btn-danger btn-delete"><i class="fas fa-trash"></i> Delete</a>
</div>