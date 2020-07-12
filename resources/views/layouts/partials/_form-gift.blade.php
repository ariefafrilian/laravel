<form action="{{ ($gift->exists ?? false) != false ? url('gifts/' . $gift->id) : url('gifts') }}" method="POST" enctype="multipart/form-data" id="form" autocomplete="off">
  @if($gift->exists ?? false)
  @method('PATCH')
  @endif

  <div class="form-group">
    <label for="name">Name</label>
    <input name="name" value="{{ ($gift->exists ?? false) != false ? $gift->name : '' }}" type="text" class="form-control" id="name" placeholder="Enter gift name">
  </div>

  <div class="form-group">
    <label for="serial">Serial number</label>
    <input name="serial" value="{{ ($gift->exists ?? false) != false ? $gift->serial : '' }}" type="text" class="form-control" id="serial" placeholder="Enter serial number">
  </div>

  <div class="form-group">
    <label for="description">Description</label>
    <textarea name="description" class="form-control" id="description" placeholder="Type here...">{{ ($gift->exists ?? false) != false ? $gift->description : '' }}</textarea>
  </div>

  <div class="form-group">
    <label for="points">Points</label>
    <input name="points" value="{{ ($gift->exists ?? false) != false ? $gift->points : '' }}" type="number" class="form-control" id="points" placeholder="Enter the points for the gift">
  </div>

  <div class="form-group">
    <label for="photo">Photo</label>
    <input name="photo" type="file" class="form-control-file" id="photo">
  </div>
</form>