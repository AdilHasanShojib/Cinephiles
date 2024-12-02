@extends('frontend')

@section('meme')



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="{{ asset('frontend/css/meme.css') }}">


<div style=" margin-left: 80px; margin-top:20px; margin-right: 100px; overflow: hidden;
 width: 300px;
 height: 550px;
 float: left;
 background-color:#212529;">


  <div style="margin-left: 70px;width: 150px; height: 150px;">

    <h2 style="color:white; text-align:center">Winner</h2>
    <img id="winnerimg" src="images/batman.jpg" style="border: 5px solid #4dbf00; max-width: 100%; height: auto; display: block; margin: auto;">
    <label id="winnername" style="color:white; text-align:center"> Foyez</label>

    <h2 id="hide1" style="color:white; text-align:center">Top Meme</h2>

    <img id="topmemeimg" src="images/batman.jpg" style="border: 5px solid #4dbf00;max-width: 100%; height: auto; display: block; margin: auto;">

  </div>

</div>

<div style="margin-left:50px; margin-top:20px; margin-right: 300px; overflow: hidden;
 width: 150px;
 height: 200px;
 float: left;">

  <div style="font-weight: bold;font-size: 20px; border: 5px solid #4dbf00 ;color:#212529;" class="Timer" id="current-time"></div>

  <div style="font-weight: bold;font-size: 20px; border: 5px solid #4dbf00 ;color:#212529; background-color: white;" class="countdown" id="timer">
  </div>
</div>



<div style="margin-left: 700px;margin-top: 200px; margin-right: 100px;">




  <div class="memebox">

    <label style="color:white" class="h2-style" for="meme">Choose a meme to upload:</label>
    <input style="color:white" type="file" id="memeimg" name="image">
    <br>
    <label style="color:white" class="h2-style" for="title">Meme title:</label>
    <input type="text" id="memetitle" name="title">
    <br>

    <button id="subbtn" onclick="addData()" type="submit">Upload Meme</button>
  </div>

  <hr class="hr-style">


  <h2 style='color:#fff;' class="h2-style" id="ti">Recent Memes</h2>

  <ul class="ul-style" id="meme-list">



  </ul>

</div>


<script>
  function allData() {
    $.ajax({
      type: "GET",
      datatype: "json",
      url: "/allData",
      success: function(data) {

        html = "";
        i = 0;
        $.each(data[0], function(key, value) {
          ck = "<i class='fa fa-thumbs-up'></i>";

          $.ajax({
            type: "GET",
            datatype: "json",
            url: "/ckvote" + value.Time,
            async: false,
            success: function(data) {
              ck = data.status;

            },
          });
          console.log(data);

          html += "<li class='li-style'>";
          html +=
            '<img src="images/' + value.PostImg + '" alt="Meme Title">';
          html += "<h3 style='color:#4dbf00;' >" + value.memetitle + "</h3>";
          html += "<h5 style='color:#fff;'>" + data[1][i] + " | " + value.Time + "</h5>";

          html +=
            '<button id="' +
            value.Time +
            '" onclick="editdata(\'' +
            value.Time +
            "')\">" +
            ck +
            "</button>";
          html += "<span style='color:#fff;' >" + value.PostLike + "</span>";
          html += "</li>";
          i++;
        });

        var memelist = document.getElementById("meme-list");
        memelist.innerHTML = html;

        const img1 = document.getElementById('winnerimg');
        img1.setAttribute('src', 'images/' + data[2].memeimg);
        document.getElementById("winnername").innerHTML = data[2].name;

      },
      error: function(xhr, status, error) {
        console.log(xhr.responseText);
      }
    });

  }
  allData();

  // memeimg and memetitle are adding here

  function addData() {
    var memeimg = document.getElementById("memeimg").value;
    var memetitle = document.getElementById("memetitle").value;

    $.ajax({
      type: "POST",
      dataType: "json",
      data: {
        memetitle: memetitle,
        memeimg: memeimg,
        _token: '{{ csrf_token() }}'
      },
      url: "/memestore",
      success: function(data) {
        allData();
        clearData();
      },
      error: function(xhr, status, error) {
        console.log(xhr.responseText);
      }
    });

  }

  // clearing data from the filed

  function clearData() {

    document.getElementById("memeimg").value = "";
    document.getElementById("memetitle").value = "";

  }

  //when the upvote button clicked

  function editdata(time) {
    $.ajax({
      type: "GET",
      datatype: "json",
      url: "/vote" + time,
      success: function(data) {
        allData();
        topmeme();
      },
    });
  }


  //timer

  function updateCurrentTime() {
    const currentTimeElement = document.getElementById("current-time");

    const now = new Date();
    const hours = now.getHours();
    const minutes = now.getMinutes();
    const seconds = now.getSeconds();



    const timeText =
      ("0" + hours).slice(-2) +
      ":" +
      ("0" + minutes).slice(-2) +
      ":" +
      ("0" + seconds).slice(-2);
    currentTimeElement.innerHTML = timeText;
  }


  setInterval(function() {

    updateCurrentTime();

    $.ajax({
      type: "GET",
      datatype: "json",
      url: "/gettime",
      success: function(data) {

        const now = new Date();
        const hours = now.getHours();
        const minutes = now.getMinutes();
        const seconds = now.getSeconds();
        const tot = (minutes * 60) + seconds;

        const tot1 = (data[0].m * 60) + data[0].s;
        const dif = tot - tot1;
        const currentTimeElement = document.getElementById("timer");
        const newmin = Math.floor(dif / 60);
        const newsec = dif % 60;
        console.log(dif);

        console.log(newmin + ' ' + newsec + ' ' + hours);

        if (dif <=120&&dif>=0) {



          const timeText =
            ("0" + 0).slice(-2) +
            ":" +
            ("0" + newmin).slice(-2) +
            ":" +
            ("0" + newsec).slice(-2);
          currentTimeElement.innerHTML = timeText;



        } else {

          currentTimeElement.innerHTML = "Contest End!";

          $.ajax({
            type: "GET",
            datatype: "json",
            url: "/Endcontest",
            success: function(data) {

              console.log("contest END");
              allData();


              // const hide1 = document.getElementById("hide1"); // get the div element by its ID
              // hide1.style.display = "none";
              // const hide2 = document.getElementById("topmemeimg"); // get the div element by its ID
              // hide2.style.display = "none";


            },
            error: function(xhr, status, error) {
              console.log(xhr.responseText);
            }
          });





        }

      },
      error: function(xhr, status, error) {
        console.log(xhr.responseText);
      }
    });


  }, 1000);



  function topmeme() {

    $.ajax({
      type: "GET",
      datatype: "json",
      url: "/topmeme",
      success: function(data) {


        console.log("topmeme");

        console.log(data);

        const img = document.getElementById('topmemeimg');
        img.setAttribute('src', 'images/' + data.PostImg);




      },
      error: function(xhr, status, error) {
        console.log(xhr.responseText);
      }
    });


  }

  topmeme();
</script>




@endsection