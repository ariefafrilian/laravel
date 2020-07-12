<form action="{{ ($item->exists ?? false) != false ? url('inventories/'.$item->id) : url('inventories') }}" method="POST" enctype="multipart/form-data" id="form" autocomplete="off">
  @if($item->exists ?? false)
  @method('PATCH')
  @endif

  <div class="form-group">
    <label for="name">Name</label>
    <input name="name" value="{{ ($item->exists ?? false) != false ? $item->name : '' }}" type="text" class="form-control" id="name" placeholder="Enter item name">
  </div>

  <div class="form-group">
    <label for="serial">Serial number</label>
    <input name="serial" value="{{ ($item->exists ?? false) != false ? $item->serial : '' }}" type="text" class="form-control" id="serial" placeholder="Enter serial number">
  </div>

  <div class="form-group">
    <label for="description">Description</label>
    <textarea name="description" class="form-control" id="description" placeholder="Type here...">{{ ($item->exists ?? false) != false ? $item->description : '' }}</textarea>
  </div>

  <div class="form-group">
    <label for="price">Price</label>
    <input name="price" value="{{ ($item->exists ?? false) != false ? $item->price : '' }}" type="text" class="form-control" id="price" placeholder="Enter the price for the item">
  </div>

  <div class="form-group">
    <label for="photo">Photo</label>
    <input name="photo" type="file" class="form-control-file" id="photo">
  </div>
</form>