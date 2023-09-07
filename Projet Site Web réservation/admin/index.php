<?php
session_start();
if (!isset($_SESSION["nom_client"])){
	header("Location:../connexion.php");
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Page des Réservations</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="../css/styles.css">
</head>

<style>
    .nav-item {
        font-size: medium;
        font-weight: bold;
    }

    .navbar>div {
        display: flex;
        gap: 100px;
        align-items: center;
    }

       .navbar {
        background-color: #e7480f;
        color: white;
        display: flex;
        justify-content: space-between;
        padding: 0 200px;
    }
</style>
	


<body>
<div class="navbar navbar-expand-md  fixed-top">
        <div class=" mt-2">
            <span class="nav-item">
                nom Société: <?php echo $_SESSION['nom_client']; ?>
            </span>
            <span class="nav-item">
                Responsable: <?php echo $_SESSION['responsable_client']; ?>
            </span>
            <span class="nav-item">
                Id Client: <?php echo $_SESSION['id_client']; ?>
            </span>
            <span class="nav-item">
                Date reservation: <?php echo $_SESSION['date']; ?>
            </span>
        </div>
        <span class="nav-item">
            <form action="logout.php">
                <Button class="btn btn-primary"> logout</Button>
            </form>	
        </span>
		<span class="nav-item">
		     <a href="recherche.php" class="btn btn-link"><span class="glyphicon glyphicon-search"></span >Page de recherche</a>
		</span>
</div>

    <div class="container site">
        <h1 class="text-logo"><span class="glyphicon glyphicon-calendar"></span> Page des Réservations <span class="glyphicon glyphicon-phone-alt"></span></h1>
        <?php
        require 'database.php';

        echo '<nav>
                        <ul class="nav nav-pills">';

        $db = Database::connect();
        $statement = $db->query('SELECT * FROM categories');
        $categories = $statement->fetchAll();
        foreach ($categories as $category) {
            if ($category['id_categorie'] == '1')
                echo '<li role="presentation" class="active"><a href="#' . $category['id_categorie'] . '" data-toggle="tab">' . $category['type_reservation'] . '</a></li>';
            else
                echo '<li role="presentation"><a href="#' . $category['id_categorie'] . '" data-toggle="tab">' . $category['type_reservation'] . '</a></li>';
        }

        echo    '</ul>
                      </nav>';

        echo '<div class="tab-content">';

        foreach ($categories as $category) {
            if ($category['id_categorie'] == '1')
                echo '<div class="tab-pane active" id="' . $category['id_categorie'] . '">';
            else
                echo '<div class="tab-pane" id="' . $category['id_categorie'] . '">';

            echo '<div class="row">';

            $statement = $db->prepare('SELECT * FROM salle WHERE salle.category = ?');
            $statement->execute(array($category['id_categorie']));
            while ($salle = $statement->fetch()) {

                echo '<div class="col-sm-6 col-md-4">
                            <form action="../facture.php" method="post">
                            <input type="hidden" name="id_salle" value="' . $salle["id_salle"] . '"/>
                                <div class="thumbnail">
                                    <img src="../images/' . $salle['image'] . '" alt="...">
                                    <div class="price">' . number_format($salle['price'], 2, '.', '') . ' €</div>
                                    <div class="caption">
                                        <h4>'. $salle['nom_salle'] . '</h4>
                                        <p>' . $salle['mail_contact_salle'] . '</p>
                                        <p>' . $salle['telephone_salle'] . '</p>
                                        <p>' . $salle['description'] . '</p>
                                        <h3><button type="submit" class="btn btn-success btn-lg">
                                        <span class="glyphicon glyphicon-shopping-cart"></span>
                                        Obténir le dévis </button></h3>
                                    </div>
                                </div>
                            </form>
                            </div>';
            }

            echo    '</div>
                        </div>';
        }
        Database::disconnect();
        echo  '</div>';
        ?>
    </div>
</body>

</html>