<div class="col-md-4">
    <div class="form-group">
        <img src="{{$album->url}}" class="img-fluid" alt="image">
    </div>
    <div class="form-group">
        <input type="text" class="form-control" name="caption[]" maxlength="30" value="{{ old('caption'.$loop->index) == null ? $album->caption : old('caption'.$loop->index) }}" placeholder="Caption for image" id="">
    </div>
    <div class="form-group">
        <label class="btn {{$album->featured != null ? 'btn-danger' : 'btn-success'}} w-100" id="img{{$album->id}}">
            <input type="radio" name="feature_id" id="new" value="{{$album->id}}" onclick="changeStatus('{{'img'.$album->id}}')" autocomplete="off" {{$album->featured != null ? 'checked': ''}}> Feature
        </label>
    </div>
    <div class="form-group">
        <a href="/media/photo/delete/{{$album->id}}" class="btn btn-warning w-100">Delete</a>
    </div>
    <br>
</div>