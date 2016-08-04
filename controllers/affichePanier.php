<?php

if (isset($_SESSION['panier'])) {
    $panier = unserialize($_SESSION['panier']);
} else {
    $panier = new Panier;
}
echo getResponse('affichePanier', 
        [
            'titre' => 'Votre Panier', 
            'panier' => $panier
        ]
);
