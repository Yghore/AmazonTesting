<?php

return [
    'app_name' => 'AmazonTesting',
    'title' =>
    [
        'header' => 
        [
            'home' => 'Accueil',
            'product' => 'Les produits',
            'login' => 'Connexion',
        ],
        'page' => 
        [
            'home' => 'Accueil - Vos produits',
            'product' => 'Produits : :name',
        ]

    ],
    'navbar' =>
    [
        'title' => 'AmazonTesting',
        'product' => 'Vos produits',
        'login' => 'Connexion',
        'logout' => 'Déconnexion',
    ],
    'card' =>
    [
        'title' =>
        [
            'not_commanded' => 'Non commandé',
            'not_received' => 'Non reçu',
            'not_noted' => 'Non noté',
            'valided' => 'Commande terminée !',
            'refused' => 'Commande refusée !',
            'error' => 'Erreur !',
            'waiting' => 'Étape en cours de validation !',
        ],
        'desc' =>
        [
            'not_commanded' => 'Merci d\'acheter le produit',
            'not_received' => 'Avez vous reçu votre commande ?',
            'not_noted' => 'Veuillez mettre votre commantaire en suivant les conditions suivantes : Mettre 5 étoiles et ne pas critiquer le produit.',
            'valided' => 'Vous avez bien effectué toutes les étapes !',
            'refused' => 'Vous n\'avez pas bien suivi la procédures ! vous allez être contacté d\'ici peu',
            'error' => 'Une erreur est survenue, merci de contacter votre Responsable',
            'waiting' => 'Vérification en cours de l\'étape...',
        ],
        'button' =>
        [
            'commanded' => 'Confirmer l\'achat',
            'received' => 'J\'ai bien reçu la commande',
            'noted' => 'Commentaire ajouté',
            'archived' => 'Archiver',
            'refused' => 'Refusé !',
            'error' => 'Erreur !',
            'waiting' => 'En cours de validation !',
            'archived' => 'Archiver',
        ]
    ]
];