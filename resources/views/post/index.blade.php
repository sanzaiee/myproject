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




<div class="card mb-3">
    <div class="card-header">
      <i class="fas fa-table"></i>
      <a href= "/post/create"> Add Post</a>  </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Slug</th>
                <th>Post By </th>    
                <th>Action</th>
            </tr>
          </thead>




          <tfoot>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Slug</th>
                <th>Post By </th>    
                <th>Action</th>
            </tr>
          </tfoot>
        
         <tbody>
          @if(count($poster)>0)course
                            @foreach ($poster as $index=>$poster)
                           
          
            
           <tr>
              <td>{{++$index}} </td>
              <td>{{$poster->title}}</td>
              <td>{{$poster->slug}}</td>
              <td>{{$poster->description}}</td>
              <td>{{$poster->post_by}}</td>
              
            
           
    
                         
                       <td> 
                     
                 <a href="/post/{{ $poster->id}}"><button class="btn btn-info">Details</button></a>

                <a href="/post/{{ $poster->id}}/edit"><button class="btn btn-primary">EDIT</button></a>
                 
            {{-- -    @if(!isset($poster->deleted_at))   --}}


               @if(!isset($poster->deleted_at))
                
                  <a href="/post/{{ $poster->id }}/delete">   <button type="button" class="btn btn-danger btn-sm action-delete">  Delete </button></a>
                @endif
                @if(isset($poster->deleted_at))
                <a href="/post/{{ $poster->id }}/restore">   <button type="button" class="btn btn-danger btn-sm action-delete">  Restore </button></a>
              @endif
             </td> 
           </tr>
           
 
               @endforeach
               @endif
            
          </tbody>
        </table>
      </div>
    </div>
  </div>

  
  

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>