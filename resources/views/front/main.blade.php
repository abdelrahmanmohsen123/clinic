<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>home</title>
</head>
<body>
    <div class="container-fluid">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="{{ route('main') }}">Home</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                {{-- <li class="nav-item active">
                  <a class="nav-link" href="{{ route('main') }}">Home <span class="sr-only">(current)</span></a>
                </li> --}}
                <li class="nav-item dropdown">
                    

                    <a class="nav-link dropdown-toggle"  id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                      Categories
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown" >
                      @foreach ($categories as $category)
                      
                          <a href="# " class="dropdown-item">{{ $category->name }} </a>                             
                    
                      @endforeach
               
                      
                  </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('dashboard.index') }}">Dashboard</a>
                </li>
               
                
              </ul>
              <form class="form-inline my-2 my-lg-0" method="POST" action="{{ route('search') }}">
                @csrf
                <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
              </form>
            </div>
        </nav>
            
            <div class="row  mb-5">
                <h2 style="text-align: center">All Posts</h2>
            </div>
           
            <div class="row my-5">
            @foreach ($posts as $post)
            <div class="col-4">    
                <div class="card " style="width: 18rem;">           
                    <img src="{{ asset('assets/uploads/post/'.$post->image) }}"  style=" width: 220px; height: 120px;object-fit: contain;text-center" class="card-img-top  w-100" alt="post">
                        <div class="card-body">
                            <div class="row">
                                <a href="{{ route('front.post',$post->id) }}" class="btn btn-primary card-title">{{$post->title}}</a>
                            </div>
                            {{-- <h5 class="card-title"></h5> --}}
                            <p class="card-text">{{$post->details}}</p>
                            <p class="card-text " style="float: right">Date :{{$post->date}}</p>                          
                        </div>
                </div>            
            </div>
            @endforeach 
        </div>
    </div> 

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>    
   
</body>
</html>