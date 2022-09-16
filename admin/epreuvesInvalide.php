<?php
$req = $bdd->query('SELECT *,epreuves.url AS URLe FROM epreuves INNER JOIN users ON users.id_user=epreuves.id_user
                                         INNER JOIN matiere ON matiere.id_matiere=epreuves.id_matiere
                                         INNER JOIN classe ON classe.id_classe=epreuves.id_classe
                                         WHERE epreuves.etat=0');

$requete = $bdd->query('SELECT * FROM corriges INNER JOIN users ON users.id_user=corriges.id_user
INNER JOIN epreuves ON epreuves.id_epreuve=corriges.id_epreuve
INNER JOIN matiere ON matiere.id_matiere=epreuves.id_matiere
INNER JOIN classe ON classe.id_classe=epreuves.id_classe
WHERE corriges.etat=0');

?>
<div class="h3">Epreuves non validées</div>
<div class="ms-2">
    <table class="table w-100 user-table">
        <tr class="py-4 table-primary mb-2">
            <th scope="col">id <i class="fa-solid fa-caret-down"></i></th>
            <th scope="col">Titre</th>
            <th scope="col">Classe</th>
            <th scope="col">Matière</th>
            <th scope="col">Utilisateur</th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
        <div class="table-tr w-100  shadow mb-2">
            <?php
            while($data=$req->fetch())
            {echo'
            <tr class="py-2 mb-2 border-muted border-1">
                <td>'.$data['id_epreuve'].'</td>
                <td>'.$data['libelle'].'</td>
                <td>'.$data['libelle_classe'].'</td>
                <td>'.$data['libelle_matiere'].'</td>
                <td>'.$data['nom'].' '.$data['prenom'].'</td>
                <td><a href="view-epreuve.php?epreuve='.$data['id_epreuve'].'" target="blank" class="btn btn-warning"><i class="fa-solid fa-eye"></i> Voir</a></td>
                <td><a href="index.php?id='.$data['id_epreuve'].'" class="btn btn-success"><i class="fa-solid fa-check" ></i> Valider</a></td>
                <td><a href="index.php?ID='.$data['id_epreuve'].'" class="btn btn-danger"><i class="fa-solid fa-delete-left"></i> Supprimer</a></td>

            </tr>';}
            ?>
        </div>


    </table>

</div>
<div class="h3">Corrigés non validés</div>
<div class="ms-2">
    <table class="table w-100 user-table">
        <tr class="py-4 table-primary mb-2">
            <th scope="col">id <i class="fa-solid fa-caret-down"></i></th>
            <th scope="col">Titre</th>
            <th scope="col">Classe</th>
            <th scope="col">Matière</th>
            <th scope="col">Utilisateur</th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
        <div class="table-tr w-100  shadow mb-2">
            <?php
            while($data=$requete->fetch())
            {echo'
            <tr class="py-2 mb-2 border-muted border-1">
                <td>'.$data['id_corriges'].'</td>
                <td>'.$data['libelle'].'</td>
                <td>'.$data['libelle_classe'].'</td>
                <td>'.$data['libelle_matiere'].'</td>
                <td>'.$data['nom'].' '.$data['prenom'].'</td>
                <td><a href="view-corrige.php?corrige='.$data['id_corriges'].'" target="blank" class="btn btn-warning"><i class="fa-solid fa-eye"></i> Voir</a></td>
                <td><a href="view-epreuve.php?epreuve='.$data['id_epreuve'].'" target="blank" class="btn btn-warning">Epreuve</a></td>
                <td><a href="index.php?IDcorrige='.$data['id_corriges'].'" class="btn btn-success"><i class="fa-solid fa-check" ></i> Valider</a></td>
                <td><a href="index.php?idCorrige='.$data['id_corriges'].'" class="btn btn-danger"><i class="fa-solid fa-delete-left"></i> Supprimer</a></td>

            </tr>';}
            ?>
        </div>


    </table>

</div>