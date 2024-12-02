<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta name="csrf-token" content="{{csrf_token()}}">


    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <!-- bootstrap cdn link  -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- fontawesome cdn link  -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <!-- custom css local link  -->
    <link rel="stylesheet" href="{{ asset('frontend/css/custom.css') }}">
    <!-- custom js file  -->
    <script src="{{asset('frontend/js/main.js') }}"></script>
    <style>
        #time-div,
        #movie-div {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 40px auto;
            margin-top: 200px;
            width: 80%;
            border: 1px solid black;
            padding: 10px;
            background-color: #343a40;
        }

        #time-div label,
        #movie-div label {
            margin-right: 10px;
            color: white;

        }

        #time-div input,
        #movie-div input,
        #movie-div textarea {
            margin-bottom: 10px;
            padding: 5px;
            font-size: 16px;
        }

        #set-button {
            background-color: #4dbf00;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        #movie-div label[for="synopsis-input"] {
            align-self: flex-start;
            color: white;
        }

        #movie-div label[for="genres-input"] {
            align-self: flex-start;
            color: white;

        }

        #movie-div textarea {
            height: 100px;
        }

        #movie-div input[type="text"],
        #movie-div textarea {
            width: 100%;
        }
    </style>
</head>

<body>



    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand " href="index">
                <h1 class="logoName">Cinephiles</h1>
            </a>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item ">
                        <a style="color:white;" class="nav-link ml-12 navlink" href="index">Admin <span class="sr-only"></span></a>
                    </li>


                </ul>




            </div>
    </div>
    </div>
    </nav>




    </div>







    < <div id="time-div">
        <h1 style="color:aliceblue">Set Contest</h1>
        <label for="hour-input">Hour:</label>
        <input type="number" id="hour-input" min="0" max="23" value="0">
        <label for="min-input">Min:</label>
        <input type="number" id="min-input" min="0" max="59" value="0">
        <label for="sec-input">Sec:</label>
        <input type="number" id="sec-input" min="0" max="59" value="0">
        <button id="set-button">Set</button>
        </div>

        <div id="movie-div">
            <h1 style="color:aliceblue">Add Movie</h1>

            <label for="name-input">Name:</label>
            <input type="text" id="name-input">
            <label for="year-input">Release Year:</label>
            <input type="number" id="year-input" min="1900" max="2099">
            <label for="synopsis-input">Synopsis:</label>
            <textarea id="synopsis-input"></textarea>
            <label for="image-input">Image:</label>
            <input type="text" id="image-input">
            <label for="genres-input">Genres:</label>
            <input type="text" id="genres-input">
        </div>







        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

        <!-- Bootstrap JS -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script>
            const hourInput = document.getElementById("hour-input");
            const minInput = document.getElementById("min-input");
            const secInput = document.getElementById("sec-input");
            const setButton = document.getElementById("set-button");

            setButton.addEventListener("click", () => {
            const hour = hourInput.value;
            const min = minInput.value;
            const sec = secInput.value;

            console.log(`Time: ${hour}:${min}:${sec}`);
            $.ajax({
                type: "POST",
                dataType: "json",
                data: {
                    hour: hour,
                    min: min,
                    sec: sec,
                    _token: '{{ csrf_token() }}'
                },
                url: "/setContest",
                success: function(data) {
                    console.log("set");
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                }
            });
            });
           

            const nameInput = document.getElementById("name-input");
            const yearInput = document.getElementById("year-input");
            const synopsisInput = document.getElementById("synopsis-input");
            const imageInput = document.getElementById("image-input");
            const genresInput = document.getElementById("genres-input");

            const movieData = {
                name: "",
                year: "",
                synopsis: "",
                image: "",
                genres: "",
            };

            nameInput.addEventListener("change", () => {
                movieData.name = nameInput.value;
            });

            yearInput.addEventListener("change", () => {
                movieData.year = yearInput.value;
            });

            synopsisInput.addEventListener("change", () => {
                movieData.synopsis
            });

            imageInput.addEventListener("change", () => {
                movieData.image = imageInput.value;
            });

            genresInput.addEventListener("change", () => {
                movieData.genres = genresInput.value;
            });

            const saveButton = document.createElement("button");
            saveButton.textContent = "Save";
            saveButton.addEventListener("click", () => {

                console.log("Movie Data:");
                console.log(movieData);

                $.ajax({
                    type: "POST",
                    dataType: "json",
                    data: {
                        moviename: movieData.name,
                        genres: movieData.genres,
                        synopsis: movieData.synopsis,
                        year: movieData.year,

                        _token: '{{ csrf_token() }}'
                    },
                    url: "/moviestore",
                    success: function(data) {
                        console.log("YYY");
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr.responseText);
                    }
                });
            });

            const movieDiv = document.getElementById("movie-div");
            movieDiv.appendChild(saveButton);
        </script>
</body>

</html>