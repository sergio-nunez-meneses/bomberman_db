<?php
include 'include/header.php';
if ($_GET['error'] == 'yes') echo $_GET['error_message'];
?>

<main class="main-container">

  <div class="playmode-container">
    <form id="nickname-form" class="hidden" method="POST" action="controllers/start_game.php" enctype="application/x-www-form-urlencoded">
      <fieldset class="options-container">
        <legend>playmode</legend>
        <input type="text" name="nickname" placeholder="nickname">
        <input class="playmode-btn" type="submit" name="one_player" value="one player">
        <input class="playmode-btn" type="submit" name="two_players" value="two players">
      </fieldset>
    </form>
    <fieldset class="options-container">
      <legend>leaderboard</legend>
      <?php display_leaderboard(); ?>
    </fieldset>
  </div>

</main>
