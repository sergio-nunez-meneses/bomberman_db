<?php
session_start();
include '../include/header.php';
?>

<main class="main-container">

  <div class="information-container">
    <!-- player information -->
    <div class="player-container">
      <h1>game information</h1>
      <ul>
        <li>player: <span id="player"> <?php echo $_SESSION['player']; ?> </span></li>
        <li>last score: <span id="lastScore"> <?php echo $_SESSION['score']; ?> </span></li>
        <li>time: <span id="time">00:00</span></li>
        <li>current score: <span id="score">0</span></li>
        <li>bomb-up: <span id="bombUp">1</span></li>
        <li>fire: <span id="fire">1</span></li>
      </ul>
    </div>
    <!-- instructions -->
    <div class="instructions-container">
      <h1>instructions</h1>
      <ul>
        <li>arrow right = &#8594;</li>
        <li>arrow down = &#8595;</li>
        <li>arrow left = &#8592;</li>
        <li>arrow up = &#8593;</li>
        <li>spacebar = drop da bomb!</li>
      </ul>
    </div>
    <!-- notation -->
    <div class="symbols-container">
      <h1>symbols</h1>
      <ul>
        <li><div class="player"></div> = player</li>
        <li><div class="enemies"></div> = enemies</li>
        <li><div class="walls"></div> = destructible walls</li>
        <li><div class="bomb"></div> = bomb</li>
        <li><div class="bomb-up"></div> = bomb-up</li>
        <li><div class="fire"></div> = fire</li>
      </ul>
    </div>
  </div>
  <!-- board game -->
  <div class="canvas-container">
    <canvas id="canvas"></canvas>
  </div>

</main>

<script src="../public/js/updateScore.js"></script>
<script src="../public/js/game.js"></script>

<?php include '../include/footer.php'; ?>
