@extends('layouts.app')

@section('content')
    <br><br><br><br><br>
    <form action="/alter/index" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-3  text-right  form-label-control form-label-control">Carousel Image 1</div>
            <div class="col-md-7">
                <div>Please upload images with ratio of 3:2, e.g. 1920 x 1280 | max image size is 2 MB</div><br>
                <input type="file" class="form-control" name="url_1">
                <br>
                <img src="{{ $contents[0]->content }}" class="img-fluid" alt="Image 1">
            </div>
        </div>

        <br>

        <div class="row">
            <div class="col-md-3  text-right  form-label-control">Carousel Image 2</div>
            <div class="col-md-7">
                <div>Please upload images with ratio of 3:2, e.g. 1920 x 1280 | max image size is 2 MB</div><br>
                <input type="file" class="form-control" name="url_2" placeholder="Please upload images with ratio of 3:2, e.g. 1920 x 1280 | max image size is 2 MB">
                <br>
                <img src="{{ $contents[1]->content }}" class="img-fluid" alt="Image 1">
            </div>
        </div>

        <br>
        
        <div class="row">
            <div class="col-md-3  text-right  form-label-control">Carousel Image 3</div>
            <div class="col-md-7">
                <div>Please upload images with ratio of 3:2, e.g. 1920 x 1280 | max image size is 2 MB</div><br>
                <input type="file" class="form-control" name="url_3" placeholder="Please upload images with ratio of 3:2, e.g. 1920 x 1280 | max image size is 2 MB">
                <br>
                <img src="{{ $contents[2]->content }}" class="img-fluid" alt="Image 1">
            </div>
        </div>

        <br>

        <div class="row">
            <div class="col-md-3  text-right  form-label-control">Ecube Tagline</div>
            <div class="col-md-7">
                <input type="text" class="form-control" name="tagline" value="{{ $contents[3]->content }}" placeholder="Place the current value here">
            </div>
        </div>

        <br>

        <div class="row">
            <div class="col-md-3  text-right  form-label-control">Ecube Description</div>
            <div class="col-md-7">
                <div><i>Max 450 characters</i></div><br>
                <textarea name="description" class="form-control" id="article-ckeditor" cols="30" rows="10">{{ $contents[4]->content }}</textarea>
            </div>
        </div>
        
        <br>

        <div class="row">
            <div class="col-md-3  text-right  form-label-control">What we do Title 1</div>
            <div class="col-md-7">
                <input type="text" class="form-control" name="wwd[]" value="{{ $contents[5]->content }}" placeholder="What we do title">
            </div>
        </div>
        
        <br>

        <div class="row">
            <div class="col-md-3  text-right  form-label-control">What we do string 1</div>
            <div class="col-md-7">
                <div><i>Max 90 characters</i></div><br>
                <textarea name="wwds[]" id="editor1" class="form-control ckeditor" cols="30" rows="10">{{ $contents[10]->content }}</textarea>
                <script type="text/javascript">
                    CKEDITOR.replace( 'editor1' );
                    CKEDITOR.add            
                </script>
            </div>
        </div>
        
        <br>

        <div class="row">
            <div class="col-md-3  text-right  form-label-control">What we do Title 2</div>
            <div class="col-md-7">
                <input type="text" class="form-control" name="wwd[]" value="{{ $contents[6]->content }}" placeholder="What we do title">
            </div>
        </div>
        
        <br>

        <div class="row">
            <div class="col-md-3  text-right  form-label-control">What we do string 2</div>
            <div class="col-md-7">
                <div><i>Max 90 characters</i></div><br>
                <textarea name="wwds[]" id="editor2" class="form-control ckeditor" cols="30" rows="10">{{ $contents[11]->content }}</textarea>
                <script type="text/javascript">
                    CKEDITOR.replace( 'editor2' );
                    CKEDITOR.add            
                </script>
            </div>
        </div>
        
        <br>

        <div class="row">
            <div class="col-md-3  text-right  form-label-control">What we do Title 3</div>
            <div class="col-md-7">
                <input type="text" name="wwd[]" class="form-control" value="{{ $contents[7]->content }}" placeholder="What we do title">
            </div>
        </div>
        
        <br>

        <div class="row">
            <div class="col-md-3  text-right  form-label-control">What we do string 3</div>
            <div class="col-md-7">
                <div><i>Max 90 characters</i></div><br>
                <textarea name="wwds[]" id="editor3" class="form-control ckeditor" cols="30" rows="10">{{ $contents[12]->content }}</textarea>
                <script type="text/javascript">
                    CKEDITOR.replace( 'editor3' );
                    CKEDITOR.add            
                </script>
            </div>
        </div>
        
        <br>
        
        <div class="row">
            <div class="col-md-3  text-right  form-label-control">What we do Title 4</div>
            <div class="col-md-7">
                <input type="text" class="form-control ckeditor" name="wwd[]" value="{{ $contents[8]->content }}" placeholder="What we do title">
            </div>
        </div>
        
        <br>

        <div class="row">
            <div class="col-md-3  text-right  form-label-control">What we do string 4</div>
            <div class="col-md-7">
                <div><i>Max 90 characters</i></div><br>
                <textarea name="wwds[]" id="editor4" class="form-control ckeditor" cols="30" rows="10">{{ $contents[13]->content }}</textarea>
                <script type="text/javascript">
                    CKEDITOR.replace( 'editor4' );
                    CKEDITOR.add            
                </script>
            </div>
        </div>
        
        <br>
        
        <div class="row">
            <div class="col-md-3  text-right  form-label-control">What we do Title 5</div>
            <div class="col-md-7">
                <input type="text" class="form-control" name="wwd[]" value="{{ $contents[9]->content }}" placeholder="What we do title">
            </div>
        </div>
        
        <br>

        <div class="row">
            <div class="col-md-3  text-right  form-label-control">What we do string 5</div>
            <div class="col-md-7">
                <div><i>Max 90 characters</i></div><br>
                <textarea name="wwds[]" id="editor5" class="form-control ckeditor" cols="30" rows="10">{{ $contents[14]->content }}</textarea>
                <script type="text/javascript">
                    CKEDITOR.replace( 'editor5' );
                    CKEDITOR.add            
                </script>
            </div>
        </div>

        <br>

        <div class="row">
            <div class="col-md-5"></div>
            <div class="col-md-2"><button type="submit" class="btn btn-danger w-100">Save</button></div>
            <div class="col-md-5"></div>
        </div>
    </form>
@endsection