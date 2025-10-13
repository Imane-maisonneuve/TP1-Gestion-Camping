<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <title>
    <?= $page; ?>
  </title>
</head>

<body>
  <header>
    <nav id=navigation>
      <h1>Camping Les Belles Montagnes</h1>
      <div id=menu>
        <a href="index.php"><img src="img/home.png" alt=""></a>
        <?php
        // Vérifier si l'utilisateur est connecté
        if (isset($_SESSION['id']) && $_SESSION['id'] != null) {
        ?>
          <!-- Afficher les liens pour l'utilisateur connecté -->
          <a href="user_space.php"><img src="img/user.png" alt=""></a>
          <a href="logout.php"><img src="img/logout.png" alt=""></a>
        <?php
          // Si l'utilisateur n'est pas connecté, afficher le lien de connexion
        } else {
        ?>
          <a href="login.php"><img src="img/user.png" alt=""></a>

        <?php
        }
        ?>
      </div>
    </nav>
  </header>
  <main>