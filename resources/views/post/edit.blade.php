<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Post create</title>
  </head>
  <body>
    <h1>Edit Post</h1>
    <div class="card-body">
        <form class="form-horizontal" method="POST" action="/post/{{$post->id}}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_method" value="PUT"> 
     
            <div class="form-group row">
                <label for="slug" class="col-md-4 col-form-label text-md-right">{{ __('Slug') }}</label>

                <div class="col-md-6">
                    <input id="slug" type="text" class="form-control{{ $errors->has('slug') ? ' is-invalid' : '' }}" name="slug" value="@if(old('slug')==""){{$post->slug}}@else{{old('slug')}}@endif" required autofocus>

                    @if ($errors->has('slug'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('slug') }}</strong>
                        </span>
                    @endif
                </div>
            </div>


            
            <div class="form-group row">
                <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                <div class="col-md-6">
                    <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="@if(old('title')==""){{$post->title}}@else{{old('title')}}@endif" required autofocus>

                    @if ($errors->has('title'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            

            <div class="form-group row">
                <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                <div class="col-md-6">
                    <input id="description" type="text" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="@if(old('description')==""){{$post->description}}@else{{old('description')}}@endif"  required autofocus>

                    @if ($errors->has('description'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="post_by" class="col-md-4 col-form-label text-md-right">{{ __('Post By') }}</label>
                    <div class="col-md-6">
                        <select class="form-control" id="post_by" name="post_by">
                        @if(old('post_by') == "")
                            <option class="form-control" value="{{ $post->id }}">{{ $post->name }}</option>
                            @foreach ($poster as $item)
                            <option class="form-control" value="{{$item->id}}" @if (old('post_by') == $item->id) selected="selected" @endif>{{$item->firstname}}</option>                                  @endforeach          
                        @else
                            <option class="form-control" value="0" @if (old('post_by') == 0) selected="selected" @endif>Please Select Poster</option>         
                            @foreach ($poster as $item)
                                <option class="form-control" value="{{$item->id}}" @if (old('post_by') == $item->id) selected="selected" @endif>{{$item->firstname}}</option>
                            @endforeach 
                        @endif    
                    </select>
                    </div>
                </div>
            </div>



      

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                     submit
                    </button>
                </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>