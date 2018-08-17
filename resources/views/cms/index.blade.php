@extends('layouts.app')

@section('content')
    <br><br><br><br><br>
    <form action="/alter/index" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-3  text-right  form-label-control form-label-control">Carousel Image 1</div>
            <div class="col-md-7">
                <input type="file" class="form-control" name="url_1" placeholder="address">
            </div>
        </div>

        <br>

        <div class="row">
            <div class="col-md-3  text-right  form-label-control">Carousel Image 2</div>
            <div class="col-md-7">
                <input type="file" class="form-control" name="url_2" placeholder="address">
            </div>
        </div>

        <br>
        
        <div class="row">
            <div class="col-md-3  text-right  form-label-control">Carousel Image 3</div>
            <div class="col-md-7">
                <input type="file" class="form-control" name="url_3" placeholder="address">
            </div>
        </div>

        <br>

        <div class="row">
            <div class="col-md-3  text-right  form-label-control">Ecube Tagline</div>
            <div class="col-md-7">
                <input type="text" class="form-control" name="tagline" placeholder="Place the current value here">
            </div>
        </div>

        <br>

        <div class="row">
            <div class="col-md-3  text-right  form-label-control">Ecube Description</div>
            <div class="col-md-7">
                <textarea name="description" class="form-control" id="article-ckeditor" cols="30" rows="10"></textarea>
            </div>
        </div>
        
        <br>

        <div class="row">
            <div class="col-md-3  text-right  form-label-control">What we do Title 1</div>
            <div class="col-md-7">
                <input type="text" class="form-control" name="wwd[]" placeholder="What we do title">
            </div>
        </div>
        
        <br>

        <div class="row">
            <div class="col-md-3  text-right  form-label-control">What we do string 1</div>
            <div class="col-md-7">
                <input type="text" class="form-control" name="wwds[]" placeholder="What we do title">
            </div>
        </div>
        
        <br>

        <div class="row">
            <div class="col-md-3  text-right  form-label-control">What we do Title 2</div>
            <div class="col-md-7">
                <input type="text" class="form-control" name="wwd[]" placeholder="What we do title">
            </div>
        </div>
        
        <br>

        <div class="row">
            <div class="col-md-3  text-right  form-label-control">What we do string 2</div>
            <div class="col-md-7">
                <input type="text" class="form-control" name="wwds[]" placeholder="What we do title">
            </div>
        </div>
        
        <br>

        <div class="row">
            <div class="col-md-3  text-right  form-label-control">What we do Title 3</div>
            <div class="col-md-7">
                <input type="text" name="wwd[]" class="form-control" placeholder="What we do title">
            </div>
        </div>
        
        <br>

        <div class="row">
            <div class="col-md-3  text-right  form-label-control">What we do string 3</div>
            <div class="col-md-7">
                <input type="text" class="form-control" name="wwds[]" placeholder="What we do title">
            </div>
        </div>
        
        <br>
        
        <div class="row">
            <div class="col-md-3  text-right  form-label-control">What we do Title 4</div>
            <div class="col-md-7">
                <input type="text" class="form-control" name="wwd[]" placeholder="What we do title">
            </div>
        </div>
        
        <br>

        <div class="row">
            <div class="col-md-3  text-right  form-label-control">What we do string 4</div>
            <div class="col-md-7">
                <input type="text" class="form-control" name="wwds[]" placeholder="What we do title">
            </div>
        </div>
        
        <br>
        
        <div class="row">
            <div class="col-md-3  text-right  form-label-control">What we do Title 5</div>
            <div class="col-md-7">
                <input type="text" class="form-control" name="wwd[]" placeholder="What we do title">
            </div>
        </div>
        
        <br>

        <div class="row">
            <div class="col-md-3  text-right  form-label-control">What we do string 5</div>
            <div class="col-md-7">
                <input type="text" class="form-control" name="wwds[]" placeholder="What we do title">
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