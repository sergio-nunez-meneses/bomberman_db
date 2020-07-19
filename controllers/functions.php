<?php

function connection() {
  require dirname(__FILE__) . '/database.php';

  $host = 'localhost';
  $charset = 'utf8';
  $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

  try {
    $pdo = new PDO($dsn, $user, $password, $options);
  } catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
  }
  return $pdo;
}

function display_leaderboard() {
  $pdo = connection();
  $data = $pdo->query('SELECT * FROM players ORDER BY score DESC LIMIT 5')->fetchAll();

  echo '<div class="leaderboard-container">';
  echo '<table>';
  echo '<tr>';
  echo '<th> nickname </th>';
  echo '<th> score </th>';
  echo '</tr>';

  foreach ($data as $row) {
    echo '<tr>';
    echo '<td>' . $row['nickname'] . '</td>';
    echo '<td>' . $row['score'] . '</td>';
    echo '</tr>';
  }
  echo '</table>';
  echo '</div>';
}

function start_game() {
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $player = $_POST['nickname'];

    $pdo = connection();
    $stmt = $pdo->prepare('SELECT * FROM players WHERE nickname = :player');
    $stmt->execute([
      'player' => $player
    ]);
    $player = $stmt->fetch();

    if ($player == false) {
      $new_player = $_POST['nickname'];
      $score = 0;

      $pdo->prepare('INSERT INTO players (nickname, score) VALUES (:new_player, :score)')->execute([
        'new_player' => $new_player,
        'score' => $score
      ]);
      session_start();
      $_SESSION['player'] = $new_player;
      $_SESSION['score'] = $score;
    } else {
      session_start();
      $_SESSION['player'] = $player['nickname'];
      $_SESSION['score'] = $player['score'];
    }


    if (isset($_POST['one_player'])) {
      header('Location:../templates/one_player.php');
    } elseif (isset($_POST['two_players'])) {
      header('Location:../templates/two_players.php');
    }
  } else {
    session_destroy();
    header('Location:../index.php?error=yes&error_message=prevented navigation due to an unknown protocol');
  }
}

function save_score() {
  if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['save'])) {
    session_unset();
    session_destroy();
    $player = $_POST['nickname'];
    $score = $_POST['score'];

    $pdo = connection();
    $pdo->prepare('UPDATE players SET score = :score WHERE nickname = :player')->execute([
      'score' => $score,
      'player' => $player
    ]);
    header('Location:../index.php');
  } else {
    header('Location:../index.php?error=yes&error_message=failed to save score');
  }
}

?>
