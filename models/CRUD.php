<?php
require './conf/config.php';
require './lib/lib-pdo.php';
$connexion = getpDO();
$sql = "SELECT * FROM langues";
$resultSet = $connexion->query($sql);
var_dump($resultSet);
var_dump($sql);
$listeLangues = $resultSet->fecth(PDO::FETCH_ASSOC);
$resultSet = null;
?>

<div class="col-md-4 col-md-offset-2">

    <h2>CRUD sur Livres</h2>

    <table class="table table-bordered table-hover table-striped">
        <tr>

            <th>Id</th>
            <th>isbn</th>
            <th>titre</th>
            <th>date_publication</th>
            <th>nb_pages</th>
            <th>prix</th>
            <th>id_langue</th>
        </tr>

        <?--php $livres = $panier->getProduits();
        foreach ($livres as $livre):?>

        <form method="post" action="CRUD.php">
            <tr>
                <td><input type="number" name="Id" value="Livre_ID"></td>
                <td><input type="number" name="isbn" value="livre_isbn"></td>
                <td><input type="text" name="titre" value="livre_titre"></td>
                <td><input type="text" name="date_publication" value="date_publication"></td>
                <td><input type="number" name="nb_pages" value="nb_pages"></td>
                <td><input type="number" name="prix" value="livre_prix"></td>
                <td><div class="form-group">
                        <label class="">
                            Langue
                            <select class="form-control" name="choixLangue">
                                <option value="0">Choisissez une langue</option>
                                <?php foreach ($listeLangues as $item): ?>
                                    <option value="<?= $item['id'] ?>"
                                    <?= $item['id'] == $choixLangue ? "selected" : "" ?>
                                            >
                                                <?= $item['libelle_langue'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </label>
                    </div></td>

                <td><button type="submit" name="submit" value="recalculer" class="btn btn-sm btn-info">
                        Editer
                    </button>
                    <button type="submit" name="submit" value="supprimer" class="btn btn-sm btn-info">
                        Supprimer
                    </button></td>
            </tr>
        </form> 
        <?-- endforeach; ?>
        <tr>
            <td colspan="3" class="text-right">Ajouter un livre</td>
            <td colspan="2" class="text-right">
                <?-- $panier->getTotalPanier() ?>
            </td>
        </tr>

    </table>
</div>