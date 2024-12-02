@extends('frontend')

       

@section('allMovies)

      <!-- <section class="container">  -->
           
           <div id="divContainer"class="row row-cols-1 row-cols-md-5 g-4 mt-5 ml-5">
               
             </div>


       <!-- </section> -->




@endsection

<!-- 
const loadmeals=(searchtext)=>{
    const url=`https://www.themealdb.com/api/json/v1/1/search.php?s=${searchtext}`
    fetch(url)
    .then(res => res.json())
    .then(data => displaymeals(data.meals))
 }
  
 const displaymeals=meals=>{
    console.log(meals)
const mealsContainer=document.getElementById('divContainer')
mealsContainer.innerHTML='';
    meals.forEach(meal => {
        console.log(meal)

    const mealDiv=document.createElement('div');
    mealDiv.classList.add('col');
    mealDiv.innerHTML=`
                <div class="card h-100">
                    <img src="${meal.strMealThumb}" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="">${meal.strMeal}</h5>
                      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                    <div class="card-footer">
                      <small class="text-muted">Last updated 3 mins ago</small>
                    </div>
    
    `;
    mealsContainer.appendChild(mealDiv);
    });
 }
 

 const searchbtn=()=>{
   //console.log("button clicked ")
   const searchfield=document.getElementById('searchinput').value;
         

  loadmeals(searchfield);
 }
 ;


 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body style="background-color: rgb(10, 93, 156);">
    <header>

    </header><br>
    <main>
        <section class="d-flex justify-content-center">
            <div>
                <input id="searchinput" type="text" placeholder="Search">
                <button id="btninput" onclick="searchbtn()" class="btn btn-primary">Search</button>
            </div>
        </section><br><br>
        <section class="container"> 
            <div id="divContainer"class="row row-cols-1 row-cols-md-3 g-4">
                
              </div>
        </section>
    </main>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="meal.js"></script>
</body>
</html>
 -->



@section('allMovies')


<!-- <section class="container">  -->
<div style="margin-top: 250px;">
<div id="divContainer" class="row row-cols-1 row-cols-md-5 g-4 mt-5 ml-5">
     <!-- insert element from main.js here -->
</div>

</div>



@endsection

