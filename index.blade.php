@extends('frontend')

@section('content')

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">

    <div class="carousel-item active loopVideo">

      <video class="embed-responsive embed-responsive-4by3 img-fluid" autoplay loop muted>
        <source src="videos/Avatar.mp4" type="video/mp4" />
      </video>

      <div class="carousel-caption d-none d-md-block">
        <h2 style="color:#4dbf00;"  >Avatar</h5>
        <p style="color:white;"  >
            Jake, who is paraplegic, replaces his twin on the Na'vi inhabited Pandora for a corporate mission. After the natives accept him as one of their own, he must decide where his loyalties lie
        </p>
      </div>
    </div>





    <div class="carousel-item loopVideo">
      <video class=" embed-responsive embed-responsive-4by3 img-fluid " autoplay loop muted>
        <source src="videos/Conjuring.mp4" type="video/mp4" />
      </video>
      <div class="carousel-caption d-none d-md-block">
        <h2 style="color:#4dbf00;"  >Conjuring</h5>
        <p style="color:white;"  >
        The Perron family moves into a farmhouse where they experience paranormal phenomena. They consult demonologists, Ed and Lorraine Warren, to help them get rid of the evil entity haunting them.        </p>
      </div>
    </div>


    <div class="carousel-item loopVideo">
      <video class="embed-responsive embed-responsive-4by3 img-fluid" autoplay loop muted>
        <source src="videos/Batman.mp4" type="video/mp4" />
      </video>
      <div class="carousel-caption d-none d-md-block">
        <h2 style="color:white;" > THE BATMAN</h5>
        <p >
        Batman is called to intervene when the mayor of Gotham City is murdered. Soon, his investigation leads him to uncover a web of corruption, linked to his own dark past.
        </p>
      </div>
    </div>

    <a class="carousel-control-prev " href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon carousleClass" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon carousleClass" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>


  </div>

</div>

<!-- movie slider start  -->
<h1 style="color:#fff;" class="movieScroolHeader mt-2">Recommend</h1>
<div id="carousel" class="container">
  <div  class="control-container">
    <div style="border: 3px solid #4dbf00;" id="left-scroll-button" class="left-scroll button scroll">
      <i style="color:#4dbf00;"  class="fa fa-chevron-left" aria-hidden="true"></i>
    </div>
    <div style="border: 3px solid #4dbf00;" id="right-scroll-button" class="right-scroll button scroll">
      <i style="color:#4dbf00;" class="fa fa-chevron-right" aria-hidden="true"></i>
    </div>
  </div>

  <div class="items" id="carousel-items">



    

    @foreach ($users as $user)


    <div class="item">
      <img style="border: 3px solid #4dbf00;" class="item-image" src="{{ asset('images/' . $user->image) }}" alt="Photo" />

      <span class="item-title">{{ $user->movie_name }}</span>
        
      <button onclick="show('{{ $user->movie_name }}')" class="item-load-icon button opacity-none">
          <i class="fas fa-info-circle"></i>

          </button>
       
      </a>
    </div>


    @endforeach


  </div>
</div>




<!-- movie slider end  -->





<!-- movie slider start  -->
<h1 style="color:#fff;" class="movieScroolHeader mt-2">New Releases</h1>
<div id="carousel" class="container">
  <div  class="control-container">
    <div style="border: 3px solid #4dbf00;" id="left-scroll-button" class="left-scroll button scroll">
      <i style="color:#4dbf00;"  class="fa fa-chevron-left" aria-hidden="true"></i>
    </div>
    <div style="border: 3px solid #4dbf00;" id="right-scroll-button" class="right-scroll button scroll">
      <i style="color:#4dbf00;" class="fa fa-chevron-right" aria-hidden="true"></i>
    </div>
  </div>

  <div class="items" id="carousel-items">



    

    @foreach ($newmovies as $user)


    <div class="item">
      <img style="border: 3px solid #4dbf00;" class="item-image" src="{{ asset('images/' . $user->image) }}" alt="Photo" />

      <span class="item-title">{{ $user->movie_name }}</span>
        
      <button onclick="show('{{ $user->movie_name }}')" class="item-load-icon button opacity-none">
          <i class="fas fa-info-circle"></i>

          </button>
       
      </a>
    </div>


    @endforeach


  </div>
</div>




<!-- movie slider end  -->



<!-- movie slider start  -->
<h1 style="color:#fff;" class="movieScroolHeader mt-2">Old Movies</h1>
<div id="carousel" class="container">
  <div  class="control-container">
    <div style="border: 3px solid #4dbf00;" id="left-scroll-button" class="left-scroll button scroll">
      <i style="color:#4dbf00;"  class="fa fa-chevron-left" aria-hidden="true"></i>
    </div>
    <div style="border: 3px solid #4dbf00;" id="right-scroll-button" class="right-scroll button scroll">
      <i style="color:#4dbf00;" class="fa fa-chevron-right" aria-hidden="true"></i>
    </div>
  </div>

  <div class="items" id="carousel-items">



    

    @foreach ($oldmovies as $user)


    <div class="item">
      <img style="border: 3px solid #4dbf00;" class="item-image" src="{{ asset('images/' . $user->image) }}" alt="Photo" />

      <span class="item-title">{{ $user->movie_name }}</span>
        
      <button onclick="show('{{ $user->movie_name }}')" class="item-load-icon button opacity-none">
          <i class="fas fa-info-circle"></i>

          </button>
       
      </a>
    </div>


    @endforeach


  </div>
</div>




<!-- movie slider end  -->




<!-- movie slider start  -->

<h1 style="color:#fff;" class="movieScroolHeader mt-2">DRAMA</h1>
<div id="carousel" class="container">
  <div  class="control-container">
    <div style="border: 3px solid #4dbf00;" id="left-scroll-button" class="left-scroll button scroll">
      <i style="color:#4dbf00;"  class="fa fa-chevron-left" aria-hidden="true"></i>
    </div>
    <div style="border: 3px solid #4dbf00;" id="right-scroll-button" class="right-scroll button scroll">
      <i style="color:#4dbf00;" class="fa fa-chevron-right" aria-hidden="true"></i>
    </div>
  </div>

  <div class="items" id="carousel-items">



    

    @foreach ($DRAMA as $user)


    <div class="item">
      <img style="border: 3px solid #4dbf00;" class="item-image" src="{{ asset('images/' . $user->image) }}" alt="Photo" />

      <span class="item-title">{{ $user->movie_name }}</span>
        
      <button onclick="show('{{ $user->movie_name }}')" class="item-load-icon button opacity-none">
          <i class="fas fa-info-circle"></i>

          </button>
       
      </a>
    </div>


    @endforeach


  </div>
</div>




<!-- movie slider end  -->


<!-- movie slider start  -->
<h1 style="color:#fff;" class="movieScroolHeader mt-2">HORROR</h1>
<div id="carousel" class="container">
  <div  class="control-container">
    <div style="border: 3px solid #4dbf00;" id="left-scroll-button" class="left-scroll button scroll">
      <i style="color:#4dbf00;"  class="fa fa-chevron-left" aria-hidden="true"></i>
    </div>
    <div style="border: 3px solid #4dbf00;" id="right-scroll-button" class="right-scroll button scroll">
      <i style="color:#4dbf00;" class="fa fa-chevron-right" aria-hidden="true"></i>
    </div>
  </div>

  <div class="items" id="carousel-items">



    

    @foreach ($HORROR as $user)


    <div class="item">
      <img style="border: 3px solid #4dbf00;" class="item-image" src="{{ asset('images/' . $user->image) }}" alt="Photo" />

      <span class="item-title">{{ $user->movie_name }}</span>
        
      <button onclick="show('{{ $user->movie_name }}')" class="item-load-icon button opacity-none">
          <i class="fas fa-info-circle"></i>

          </button>
       
      </a>
    </div>


    @endforeach


  </div>
</div>




<!-- movie slider end  -->


<!-- movie slider start  -->
<h1 style="color:#fff;" class="movieScroolHeader mt-2">COMEDY</h1>
<div id="carousel" class="container">
  <div  class="control-container">
    <div style="border: 3px solid #4dbf00;" id="left-scroll-button" class="left-scroll button scroll">
      <i style="color:#4dbf00;"  class="fa fa-chevron-left" aria-hidden="true"></i>
    </div>
    <div style="border: 3px solid #4dbf00;" id="right-scroll-button" class="right-scroll button scroll">
      <i style="color:#4dbf00;" class="fa fa-chevron-right" aria-hidden="true"></i>
    </div>
  </div>

  <div class="items" id="carousel-items">



    

    @foreach ($COMEDY as $user)


    <div class="item">
      <img style="border: 3px solid #4dbf00;" class="item-image" src="{{ asset('images/' . $user->image) }}" alt="Photo" />

      <span class="item-title">{{ $user->movie_name }}</span>
        
      <button onclick="show('{{ $user->movie_name }}')" class="item-load-icon button opacity-none">
          <i class="fas fa-info-circle"></i>

          </button>
       
      </a>
    </div>


    @endforeach


  </div>
</div>




<!-- movie slider end  -->


<!-- movie slider start  -->
<h1 style="color:#fff;" class="movieScroolHeader mt-2">SCIENCE FICTION</h1>
<div id="carousel" class="container">
  <div  class="control-container">
    <div style="border: 3px solid #4dbf00;" id="left-scroll-button" class="left-scroll button scroll">
      <i style="color:#4dbf00;"  class="fa fa-chevron-left" aria-hidden="true"></i>
    </div>
    <div style="border: 3px solid #4dbf00;" id="right-scroll-button" class="right-scroll button scroll">
      <i style="color:#4dbf00;" class="fa fa-chevron-right" aria-hidden="true"></i>
    </div>
  </div>

  <div class="items" id="carousel-items">



    

    @foreach ($SCIENCEFICTION as $user)


    <div class="item">
      <img style="border: 3px solid #4dbf00;" class="item-image" src="{{ asset('images/' . $user->image) }}" alt="Photo" />

      <span class="item-title">{{ $user->movie_name }}</span>
        
      <button onclick="show('{{ $user->movie_name }}')" class="item-load-icon button opacity-none">
          <i class="fas fa-info-circle"></i>

          </button>
       
      </a>
    </div>


    @endforeach


  </div>
</div>




<!-- movie slider end  -->



@endsection