<div class="text-center">
	<a href="{{ ($inventories->exists ?? false) != false ? url('inventories/' . $inventories->id) : url('users/' . $users->id) }}" class="btn btn-sm btn-primary btn-show"><i class="fas fa-eye"></i> Show</a>
	<a href="{{ ($inventories->exists ?? false) != false ? url('inventories/' . $inventories->id . '/edit') : url('users/' . $users->id . '/edit') }}" class="btn btn-sm btn-warning btn-edit" data-toggle="modal" data-target="#modal"><i class="fas fa-edit"></i> Edit</a>
	<a href="{{ ($inventories->exists ?? false) != false ? url('inventories/' . $inventories->id) : url('users/' . $users->id) }}" class="btn btn-sm btn-danger btn-delete"><i class="fas fa-trash"></i> Delete</a>
</div>