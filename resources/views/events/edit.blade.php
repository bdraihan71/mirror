@extends('layouts.app')

@section('content')
<br><br><br><br><br>
    <div class="card black-bg">
        <div class="row">
            <div class="col-md-7"><h1 class="page-title ml-5 pl-5">BASIC INFORMATION</h1></div>
            <div class="col-md-2"><a href="/events/{{$event->id}}" target="_blank" class="btn btn-primary w-100">Visit Event</a></div>
            <div class="col-md-2">
                @if ($event->deleted)
                    <a href="/event/restore/{{$event->id}}" class="btn btn-success w-100">Restore Event</a>
                @else
                    <a href="/event/delete/{{$event->id}}" class="btn btn-warning w-100">Delete Event</a>
                @endif
            </div>
        </div>
        <div class="card-body black-bg">
            <form action="/events/event/{{$event->id}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-md-10 pl-5 ml-2 pr-4">
                        <div class="form-group row">
                            <div class="col-md-6 text-center">
                                <div class="row">
                                    <div class="col-md-4 text-right font-sm">
                                        <label for="url_3">Carousel Image 1</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div>Please upload images with ratio of 3:2, e.g. 1920 x 1280 | max image size is 2 MB</div><br>
                                        <input type="file" class="form-control" name="url_3" placeholder="Please upload images with ratio of 3:2, e.g. 1920 x 1280 | max image size is 2 MB" accept="image/*"><br>
                                        <img class="img-fluid" src="{{$event->img_3}}" alt="Ticket Header">
                                    </div>
                                </div>
                                <br>
                            </div>
                            <div class="col-md-6 text-center">
                                <div class="row">
                                    <div class="col-md-4 text-right font-sm">
                                        <label for="url_4">Carousel Image 2</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div>Please upload images with ratio of 3:2, e.g. 1920 x 1280 | max image size is 2 MB</div><br>
                                        <input type="file" class="form-control" name="url_4" placeholder="Please upload images with ratio of 3:2, e.g. 1920 x 1280 | max image size is 2 MB" accept="image/*"><br>
                                        <img class="img-fluid" src="{{$event->img_4}}" alt="Ticket Footer">
                                    </div>
                                </div>
                                <br>
                            </div>
                        </div>
        
                        <div class="form-group row">
                            <div class="col-md-6 text-center">
                                <div class="row">
                                    <div class="col-md-4 text-right font-sm">
                                        <label for="url_5">Thumbnail</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div>Please upload images with ratio of 3:2, e.g. 346 x 300 | max image size is 2 MB</div><br>
                                        <input type="file" class="form-control" name="url_5" placeholder="Please upload images with ratio of 3:2, e.g. 1920 x 1280 | max image size is 2 MB" accept="image/*"><br>
                                        <img class="img-fluid" src="{{$event->img_5}}" alt="Ticket Header">
                                    </div>
                                </div>
                                <br>
                            </div>
                            <div class="col-md-6 text-center">
                                <div class="row">
                                    <div class="col-md-4 text-right font-sm">
                                        <label for="url_1">Ticket Header</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div>Please upload images with ratio of 3:2, e.g. 1920 x 1280 | max image size is 2 MB</div><br>
                                        <input type="file" class="form-control" name="url_1" placeholder="Please upload images with ratio of 3:2, e.g. 1920 x 1280 | max image size is 2 MB" accept="image/*"><br>
                                        <img class="img-fluid" src="{{$event->img_1}}" alt="Ticket Header">
                                    </div>
                                </div>
                                <br>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                </div>

                {{-- <div class="form-group row">
                    <div class="col-md-4 text-center">
                        <div class="row">
                            <div class="col-md-4 text-right font-sm">
                                <label for="url_3">Carousel Image 1</label>
                            </div>
                            <div class="col-md-8">
                                <div>Please upload images with ratio of 3:2, e.g. 1920 x 1280 | max image size is 2 MB</div>
                                <input type="file" class="form-control" name="url_3" placeholder="Please upload images with ratio of 3:2, e.g. 1920 x 1280 | max image size is 2 MB">
                            </div>
                        </div>
                        <br>
                        <img height="200" src="{{$event->img_3}}" alt="Carousel Image 1">
                    </div>
                    <div class="col-md-4 text-center">
                        <div class="row">
                            <div class="col-md-4 text-right font-sm">
                                <label for="url_4">Carousel Image 2</label>
                            </div>
                            <div class="col-md-8">
                                <div>Please upload images with ratio of 3:2, e.g. 1920 x 1280 | max image size is 2 MB</div>
                                <input type="file" class="form-control" name="url_4" placeholder="Please upload images with ratio of 3:2, e.g. 1920 x 1280 | max image size is 2 MB">
                            </div>
                        </div>
                        <br>
                        <img height="200" src="{{$event->img_4}}" alt="Carousel Image 2">
                    </div>
                    <div class="col-md-4 text-center">
                        <div class="row">
                            <div class="col-md-4 text-right font-sm">
                                <label for="url_5">Carousel Image 3</label>
                            </div>
                            <div class="col-md-8">
                                <div>Please upload images with ratio of 3:2, e.g. 1920 x 1280 | max image size is 2 MB</div>
                                <input type="file" class="form-control" name="url_5" placeholder="Please upload images with ratio of 3:2, e.g. 1920 x 1280 | max image size is 2 MB">
                            </div>
                        </div>
                        <br>
                        <img height="200" src="{{$event->img_5}}" alt="Carousel Image 3">
                    </div>
                </div>
                
                <br>

                <div class="form-group row">
                    <div class="col-md-6 text-center">
                        <div class="row">
                            <div class="col-md-4 text-right font-sm">
                                <label for="url_1">Ticket Header</label>
                            </div>
                            <div class="col-md-8">
                                <div>Please upload images with ratio of 3:2, e.g. 1920 x 1280 | max image size is 2 MB</div>
                                <input type="file" class="form-control" name="url_1" placeholder="Please upload images with ratio of 3:2, e.g. 1920 x 1280 | max image size is 2 MB">
                            </div>
                        </div>
                        <br>
                        <img class="img-fluid" src="{{$event->img_2}}" alt="Ticket Header">
                    </div>
                    <div class="col-md-6 text-center">
                        <div class="row">
                            <div class="col-md-4 text-right font-sm">
                                <label for="url_2">Ticket Footer</label>
                            </div>
                            <div class="col-md-8">
                                <div>Please upload images with ratio of 3:2, e.g. 1920 x 1280 | max image size is 2 MB</div>
                                <input type="file" class="form-control" name="url_2" placeholder="Please upload images with ratio of 3:2, e.g. 1920 x 1280 | max image size is 2 MB">
                            </div>
                        </div>
                        <br>
                        <img class="img-fluid" src="{{$event->img_2}}" alt="Ticket Footer">
                    </div>
                </div> --}}

                <div class="form-group row">
                    <label for="name" class="col-md-2 col-form-label text-md-right">Name</label>

                    <div class="col-md-8">
                        <input type="text" class="form-control" name="name" placeholder="Name of the event" value="{{ old('name') == null ? $event->name : old('name') }}" required autofocus>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="tagline" class="col-md-2 col-form-label text-md-right" >Tagline</label>

                    <div class="col-md-8">
                        <input type="text" class="form-control" name="tagline" value="{{ old('tagline') == null ? $event->tagline : old('tagline') }}" placeholder="Tagline of the event" required autofocus>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="date_start" class="col-md-2 col-form-label text-md-right" >Starting Date</label>

                    <div class="col-md-3">
                        <input type="date" class="form-control" name="date_start" value="{{ old('date_start') == null ? $event->date_start : old('date_start') }}" required autofocus>
                    </div>

                    <label for="date_end" class="col-md-2 col-form-label text-md-right" >Ending Date</label>

                    <div class="col-md-3">
                        <input type="date" class="form-control" name="date_end" value="{{ old('date_end') == null ? $event->date_end : old('date_end') }}" required autofocus>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="start" class="col-md-2 col-form-label text-md-right" >Starting Time</label>

                    <div class="col-md-3">
                        <input type="time" class="form-control" name="start" value="{{ old('start') == null ? $event->start : old('start') }}" required autofocus>
                    </div>

                    <label for="end" class="col-md-2 col-form-label text-md-right" >Ending Time</label>

                    <div class="col-md-3">
                        <input type="time" class="form-control" name="end" value="{{ old('end') == null ? $event->end : old('end') }}" required autofocus>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="description" class="col-md-2 col-form-label text-md-right">Description</label>

                    <div class="col-md-8">
                        <textarea id="desc" name="description" cols="30" rows="12" class="form-control ckeditor" required>{{ old('description') == null ? $event->description : old('description') }}</textarea>
                        <script type="text/javascript">
                            CKEDITOR.replace( 'desc' );
                            CKEDITOR.add            
                         </script>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="location" class="col-md-2 col-form-label text-md-right" >Location</label>

                    <div class="col-md-3">
                        <input type="text" class="form-control" name="location" value="{{ old('location') == null ? $event->location : old('location') }}" placeholder="Location of the event" required autofocus>
                    </div>
                </div>

                <div class="black-bg form-group row ml-1">
                    <div class="col-2"></div>
                    <div class="black-bg">
                        <button type="submit" class="black-bg btn btn-reg" style="width: 900px">
                            {{ __('Save Basic Information') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="card black-bg">
        <h1 class="page-title ml-5 pl-5">ADDITIONAL INFORMATION</h1>
        <div class="card-body black-bg" id="add">
            <form action="/events/add/{{$event->id}}" method="POST">
                @csrf

                @if (count($information) != 0)
                    @foreach($information as $info)
                        <div class="form-group row">
                            <label for="add_name[]" class="col-md-2 col-form-label text-md-right">Information Name {{$loop->iteration}}</label>

                            <div class="col-md-8">
                                <input type="text" class="form-control" name="add_name[]" value="{{ old('add_name'.$loop->index) == null ? $info->name : old('add_name'.$loop->index) }}" placeholder="Name of Information" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-2 text-right">
                                <label for="add_information[]" class="col-form-label text-md-right">New Information</label>
                                <br><br>
                                <a class="btn btn-warning" href="/delete/add-info/{{$info->id}}">Delete</a>
                            </div>

                            <div class="col-md-8">
                                <textarea name="add_information[]" id="{{'editor'.$loop->index}}" cols="30" rows="12" class="form-control ckeditor" required>{{ $info->info }}</textarea>
                                <script type="text/javascript">
                                    CKEDITOR.replace( 'editor'.$loop->index );
                                    CKEDITOR.add            
                                </script>
                            </div>
                        </div>
                    @endforeach
                @else
                    <h4 class="text-center">No Additional Information Present</h4>
                @endif

                @if($add_flow)
                    <div class="form-group row">
                        <label for="add_name[]" class="col-md-2 col-form-label text-md-right">New Information Name</label>
    
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="add_name[]" placeholder="Name of Information" required autofocus>
                        </div>
                    </div>
    
                    <div class="form-group row">
                        <label for="add_information[]" class="col-md-2 col-form-label text-md-right">New Information</label>
    
                        <div class="col-md-8">
                            <textarea id="article-ckeditor" name="add_information[]" cols="30" rows="12" class="form-control" required></textarea>
                        </div>
                    </div>
                @endif

                @if (count($information) != 0 || $add_flow)
                    <div class="black-bg form-group row ml-1">
                        <div class="col-2"></div>
                        <div class="black-bg">
                            <button type="submit" class="black-bg btn btn-reg" style="width: 900px">
                                {{ __('Save Additional Information') }}
                            </button>
                        </div>
                    </div>
                @endif
            </form>
            
            @if ($add_flow == false)
                <form action="/events/edit/{{$event->id}}" method="GET">
                    <input type="hidden" name="q_flow" value="{{$q_flow}}">
                    <input type="hidden" name="add_flow" value="true">
                    <div class="black-bg form-group row ml-1">
                        <div class="col-2"></div>
                        <div class="black-bg">
                            <button type="submit" class="black-bg btn btn-google" style="width: 900px">
                                {{ __('Add Additional Information Field') }}
                            </button>
                        </div>
                    </div>
                </form>
            @else
                <form action="/events/edit/{{$event->id}}" method="GET">
                    <input type="hidden" name="q_flow" value="{{$q_flow}}">
                    <input type="hidden" name="add_flow" value="false">
                    <div class="black-bg form-group row ml-1">
                        <div class="col-2"></div>
                        <div class="black-bg">
                            <button type="submit" class="black-bg btn btn-google" style="width: 900px">
                                {{ __('Cancel Additional information') }}
                            </button>
                        </div>
                    </div>
                </form>
            @endif
        </div>
    </div>

    <div class="card black-bg">
        <h1 class="page-title ml-5 pl-5">QUESTION</h1>
        <div class="card-body black-bg" id="q">
            <form action="/events/q/{{$event->id}}" method="POST">
                @csrf
                
                @if (count($questions) != 0)
                    @foreach($questions as $question)
                    <div class="form-group row">
                        <div class="col-md-2 text-right">
                            <label for="question[]" class="col-form-label text-md-right">Question {{$loop->iteration}}</label>
                            <br><br>
                            <a class="btn btn-warning" href="/delete/question/{{$question->id}}">Delete</a>
                        </div>

                        <div class="col-md-8">
                            <input type="text" class="form-control" name="question[]" value="{{ $question->question }}" placeholder="Question to be asked to the users" required autofocus>
                        </div>
                    </div>
                    <hr>
                @endforeach
                @else
                    <h4 class="text-center">No Questions Present</h4>
                @endif

                @if ($q_flow)
                    <div class="form-group row">
                        <label for="question[]" class="col-md-2 col-form-label text-md-right">New Question</label>

                        <div class="col-md-8">
                            <input type="text" class="form-control" name="question[]" placeholder="Question to be asked to the users" required autofocus>
                        </div>
                    </div>
                @endif



                @if (count($questions) != 0 || $q_flow)
                    <div class="black-bg form-group row ml-1">
                        <div class="col-2"></div>
                        <div class="black-bg">
                            <button type="submit" class="black-bg btn btn-reg" style="width: 900px">
                                {{ __('Save Question') }}
                            </button>
                        </div>
                    </div>
                @endif
                
            </form>

            @if ($q_flow == false)
                <form action="/events/edit/{{$event->id}}" method="GET">
                    <input type="hidden" name="add_flow" value="{{$add_flow}}">
                    <input type="hidden" name="q_flow" value="true">
                    <div class="black-bg form-group row ml-1">
                        <div class="col-2"></div>
                        <div class="black-bg">
                            <button type="submit" class="black-bg btn btn-google" style="width: 900px">
                                {{ __('Add Question') }}
                            </button>
                        </div>
                    </div>
                </form>
            @else
                <form action="/events/edit/{{$event->id}}" method="GET">
                    <input type="hidden" name="add_flow" value="{{$add_flow}}">
                    <input type="hidden" name="q_flow" value="false">
                    <div class="black-bg form-group row ml-1">
                        <div class="col-2"></div>
                        <div class="black-bg">
                            <button type="submit" class="black-bg btn btn-google" style="width: 900px">
                                {{ __('Cancel Question') }}
                            </button>
                        </div>
                    </div>
                </form>
            @endif
        </div>
    </div>
@endsection