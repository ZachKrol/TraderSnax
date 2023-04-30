#!/usr/local/bin/php
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>TraderSnax</title>
  <style>
    /* The flip card container - set the width and height to whatever you want. We have added the border property to demonstrate that the flip itself goes out of the box on hover (remove perspective if you don't want the 3D effect */
    .flip-card {
      background-color: transparent;
      width: 300px;
      height: 400px;
      perspective: 1000px;
      /* Remove this if you don't want the 3D effect */
    }

    /* This container is needed to position the front and back side */
    .flip-card-inner {
      position: relative;
      width: 100%;
      height: 100%;
      text-align: center;
      transition: transform 0.8s;
      transform-style: preserve-3d;
    }

    /* Do an horizontal flip when you move the mouse over the flip box container */
    .flip-card:hover .flip-card-inner {
      transform: rotateY(180deg);
    }

    /* Position the front and back side */
    .flip-card-front,
    .flip-card-back {
      position: absolute;
      width: 100%;
      height: 100%;
      -webkit-backface-visibility: hidden;
      /* Safari */
      backface-visibility: hidden;
    }

    /* Style the front side (fallback if image is missing) */
    .flip-card-front {
      background-color: #bbb;
      color: black;
    }

    /* Style the back side */
    .flip-card-back {
      background-color: dodgerblue;
      color: white;
      transform: rotateY(180deg);
    }
  </style>
</head>

<body>
  <h1>Trader Snax Product Card Demo</h1>
  <div class="flip-card">
    <div class="flip-card-inner">
      <div class="flip-card-front">
        <p>&starf;&starf;&starf;&starf;&star; (23)</p>
        <img src="elote-dippers.png" alt="elote dippers" style="height: 250px" />
        <h3>Organic Elote Corn Dippers</h3>
      </div>
      <div class="flip-card-back">
        <p>&starf;&starf;&starf;&starf;&star; (23)</p>
        <p style="padding: 20px; padding-bottom: 60px">
          Elotes typically come slathered in mayo or a crema-based sauce,
          rolled in grated cotija or añejo cheese, dusted with chili powder,
          and squirted with lime juice. As anyone who grew up visiting the
          neighborhood elotero (or making elotes at home) can tell you, it’s a
          highly craveable combination of flavors that’s sure to leave an
          impression.
        </p>
        <button style="font-size: 24px">Review</button>
      </div>
    </div>
  </div>
</body>

</html>