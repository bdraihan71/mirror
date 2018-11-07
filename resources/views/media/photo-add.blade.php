@extends('layouts.app')

@section('content')
<br><br><br><br><br><br><br>
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h4 class="text-center">ALL IMAGES HAVE TO BE OF 3:2 RATIO (290 x 193) AND OF MAX SIZE 2 MB</h4>
                <br><br>
                <form action="/media/photo/add" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label for="event" class="form-label-control">Photograps for</label>
                        </div>
                        <div class="col-md-9">
                            <select name="event" class="form-control" required>
                                <option value="">Please select an event to add the photograps to</option>
                                <option value="0">None</option>
                                @foreach ($events as $event)
                                    <option value="{{$event->id}}">{{$event->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label for="url[]" class="form-label-control">Image 1</label>
                        </div>
                        <div class="col-md-9">
                            <input required type="file" class="form-control" name="url[]">
                            <br>
                            <input type="text" name="caption[]" value="{{ old('caption.0') }}" class="form-control" required placeholder="Please provide a caption for the photograph">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label for="url[]" class="form-label-control">Image 2</label>
                        </div>
                        <div class="col-md-9">
                            <input required type="file" class="form-control" name="url[]">
                            <br>
                            <input type="text" name="caption[]" value="{{ old('caption.1') }}" class="form-control" required placeholder="Please provide a caption for the photograph">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label for="url[]" class="form-label-control">Image 3</label>
                        </div>
                        <div class="col-md-9">
                            <input required type="file" class="form-control" name="url[]">
                            <br>
                            <input type="text" name="caption[]" value="{{ old('caption.2') }}" class="form-control" required placeholder="Please provide a caption for the photograph">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label for="url[]" class="form-label-control">Image 4</label>
                        </div>
                        <div class="col-md-9">
                            <input required type="file" class="form-control" name="url[]">
                            <br>
                            <input type="text" name="caption[]" value="{{ old('caption.3') }}" class="form-control" required placeholder="Please provide a caption for the photograph">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label for="url[]" class="form-label-control">Image 5</label>
                        </div>
                        <div class="col-md-9">
                            <input required type="file" class="form-control" name="url[]">
                            <br>
                            <input type="text" name="caption[]" value="{{ old('caption.4') }}" class="form-control" required placeholder="Please provide a caption for the photograph">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label for="url[]" class="form-label-control">Image 6</label>
                        </div>
                        <div class="col-md-9">
                            <input required type="file" class="form-control" name="url[]">
                            <br>
                            <input type="text" name="caption[]" value="{{ old('caption.5') }}" class="form-control" required placeholder="Please provide a caption for the photograph">
                        </div>
                    </div>
                    <button class="btn btn-danger w-100" type="submit">Submit</button>
                </form>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
@endsection