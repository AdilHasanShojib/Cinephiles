// navbar js start 


document.addEventListener("DOMContentLoaded", function(event) {

    const showNavbar = (toggleId, navId, bodyId, headerId) =>{
    const toggle = document.getElementById(toggleId),
    nav = document.getElementById(navId),
    bodypd = document.getElementById(bodyId),
    headerpd = document.getElementById(headerId)
    
    if(toggle && nav && bodypd && headerpd){
    toggle.addEventListener('click', ()=>{
    nav.classList.toggle('show')
    toggle.classList.toggle('bx-x')
    bodypd.classList.toggle('body-pd')
    headerpd.classList.toggle('body-pd')
    })
    }
    }
    
    showNavbar('header-toggle','nav-bar','body-pd','header')
    
    const linkColor = document.querySelectorAll('.nav_link')
    
    function colorLink(){
    if(linkColor){
    linkColor.forEach(l=> l.classList.remove('active'))
    this.classList.add('active')
    }
    }
    linkColor.forEach(l=> l.addEventListener('click', colorLink))
    
    });





    // profile name 

    function toggleClock() {
        var my = document.getElementById('dropdown');
        var displaySetting = my.style.display;
        if (displaySetting == 'block') {
          my.style.display = 'none';
        }
        else {
          my.style.display = 'block';
        }
      }



      function toggleClock2() {
        var my = document.getElementById('dropdown2');
        var displaySetting = my.style.display;
        if (displaySetting == 'block') {
          my.style.display = 'none';
        }
        else {
          my.style.display = 'block';
        }
      }


  
      function toggleClock3() {
        var my = document.getElementById('dropdown3');
        var displaySetting = my.style.display;
        if (displaySetting == 'block') {
          my.style.display = 'none';
        }
        else {
          my.style.display = 'block';
        }
      }



      
    function toggleClock4() {
      var my = document.getElementById('dropdown4');
      var displaySetting = my.style.display;
      if (displaySetting == 'block') {
        my.style.display = 'none';
      }
      else {
        my.style.display = 'block';
      }
    }


    //   hover video div 


    function MouseWheelHandler(e, element) {
        var delta = 0;
        if (typeof e === 'number') {
        delta = e;
        } else {
        if (e.deltaX !== 0) {
        delta = e.deltaX;
        } else {
        delta = e.deltaY;
        }
        e.preventDefault();
        }
        
        element.scrollLeft -= (delta);
        
        }
        
        window.onload = function() {
        var carousel = {};
        carousel.e = document.getElementById('carousel');
        carousel.items = document.getElementById('carousel-items');
        carousel.leftScroll = document.getElementById('left-scroll-button');
        carousel.rightScroll = document.getElementById('right-scroll-button');
        
        carousel.items.addEventListener("mousewheel", handleMouse, false);
        carousel.items.addEventListener("scroll", scrollEvent);
        carousel.leftScroll.addEventListener("click", leftScrollClick);
        carousel.rightScroll.addEventListener("click", rightScrollClick);
        
        setLeftScrollOpacity();
        setRightScrollOpacity();
        
        function handleMouse(e) {
        MouseWheelHandler(e, carousel.items);
        }
        
        function leftScrollClick() {
        MouseWheelHandler(100, carousel.items);
        }
        
        function rightScrollClick() {
        MouseWheelHandler(-100, carousel.items);
        }
        
        function scrollEvent(e) {
        setLeftScrollOpacity();
        setRightScrollOpacity();
        }
        
        function setLeftScrollOpacity() {
        if (isScrolledAllLeft()) {
        carousel.leftScroll.style.opacity = 0;
        } else {
        carousel.leftScroll.style.opacity = 1;
        }
        }
        
        function isScrolledAllLeft() {
        if (carousel.items.scrollLeft === 0) {
        return true;
        } else {
        return false;
        }
        }
        
        function isScrolledAllRight() {
        if (carousel.items.scrollWidth > carousel.items.offsetWidth) {
        if (carousel.items.scrollLeft + carousel.items.offsetWidth === carousel.items.scrollWidth) {
        return true;
        }
        } else {
        return true;
        }
        
        return false;
        }
        
        function setRightScrollOpacity() {
        if (isScrolledAllRight()) {
        carousel.rightScroll.style.opacity = 0;
        } else {
        carousel.rightScroll.style.opacity = 1;
        }
        }
    }

// navbar js end 




// all movie list api 





    const url=`https://www.themealdb.com/api/json/v1/1/search.php?s`
    fetch(url)
    .then(res => res.json())
    .then(data => displaymeals(data.meals))
  
 const displaymeals=meals=>{
    console.log(meals)
const mealsContainer=document.getElementById('divContainer')
    meals.forEach(meal => {
        console.log(meal)

    const mealDiv=document.createElement('div');
    mealDiv.classList.add('col');
    mealDiv.innerHTML=`


    <div class="mb-5">

    <div class="item">
    <img class="item-image" src="${meal.strMealThumb}" />
    <span class="item-title">${meal.strMeal}</span>
    <a href="streaming"><span  class="item-load-icon button opacity-none"><i class="fa fa-play"></i></span></a>
    <div class="item-description opacity-none">Lorem ipsum dolor sit amet, lorem ipsum dolor sit amet.</div>
    </div>
    </div>
   
    `;
    mealsContainer.appendChild(mealDiv);
    });
 }
 
