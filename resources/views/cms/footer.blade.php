@extends('layouts.app')

@section('content')
    <br><br><br><br><br>
    <form action="/alter/footer" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-3  text-right  form-label-control form-label-control">Head Office</div>
            <div class="col-md-7">
                <textarea id="desc" name="head_office" cols="30" rows="12" class="form-control ckeditor"></textarea>
                <script type="text/javascript">
                    CKEDITOR.replace( 'desc' );
                    CKEDITOR.add            
                </script>
            </div>
        </div>

        <br>

        <div class="row">
            <div class="col-md-3  text-right  form-label-control">Contact Info</div>
            <div class="col-md-7">
                <textarea id="contact" name="contact" cols="30" rows="12" class="form-control ckeditor"></textarea>
                <script type="text/javascript">
                    CKEDITOR.replace( 'contact' );
                    CKEDITOR.add            
                </script>
            </div>
        </div>

        <br>

        <div class="row">
            <div class="col-md-3  text-right  form-label-control">Email Address</div>
            <div class="col-md-7">
                <input type="text" class="form-control" name="email" placeholder="Email Address">
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