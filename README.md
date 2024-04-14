# Welcome to Power Universe !

## Introduction

Étant un amateur de la Saga "Power", j'ai crée un site en php qui regroupe l'ensemble des série, des acteurs & leurs rôles dans chaque série.

## Configuration

Créer un fichier `/db.ini` avec ce modèle (disponible dans `config/db.ini-template`) :

```ini
DB_HOST = 'localhost'
DB_NAME = 'db_name'
DB_CHARSET = 'utf8'
DB_USERNAME = 'db_username'
DB_PASSWORD = 'db_password'
```

Voici un [schéma représentatif de la base de donnée](<bdd.png>) du projet.

Retrouvez aussi le script SQL dans `/data/power.sql` pour reprendre les données du projet.

## Séries & Acteurs

Je fais simplement affiché mes acteurs dans leur(s) série(s) respective(s) avec mes méthodes dans mes classes `Actor` & `Serie`.

### Search

J'ai ajouté une barre de recherche seulement dans `/serie.php` qui permet la recherche d'un acteur avec son prénom. J'ai traîté la recherche avec les sessions, pour m'entraîner un peu + sur le traîtement des sessions.

À l'avenir : permettre la recherche avec le nom et/ou le surnom.

## Interface Admin

J'ai ajouté une interface Admin (accessible via le lien en tapant `/sign-in.php`) qui permet d'avoir un contrôle total sur les séries & les acteurs :
- Identifiant : admin
- Mot de passe : admin

### Messagerie 

J'ai simplement affiché tout les messages envoyés par les utilisateurs depuis la page `/contact.php` pour pouvoir les consulter depuis le site.

À l'avenir : créer une pagination sur le tableau des messages pour pouvoir filter le nombre de message affiché.

### Upload

Cette page permet à la fois l'ajout, la modification & la suppression des acteurs/séries. J'ai rangé toutes les pages rebonds dans le dossier `/process/` pour avoir une meilleure gestion de mes fichiers.

## Les classes

J'ai tenté de créer plusieurs classes qui regroupent les méthodes que j'utilisais plusieurs fois dans mon projet, mais je me suis rendu compte que mes méthodes étaient un peu trop "spécifiques" moins générales. C'était à la base pour factoriser mes pages rebonds, pour éviter d'avoir 15k lignes à "déchiffrer". Je ne sais pas si cela était une bonne idée, en tout cas ça fonctionne.

## Les Notifications

J'ai géré les messages d'erreurs & de succès via le paramètre "$_GET" dans ma classe "Notification", ce qui me forçait à déclarer de nombreux codes pour chaque situation différente, ce qui ne me plaisais pas vraiment. Le mieux aurait été de les gérer avec les "$_SESSION" pour pouvoir être + "propre" dans la gestion de messages.

## User

J'ai crée un formulaire d'inscription pour utilisateur, mais je n'ai pas eu le temps de créer des fonctionnalitées réservées aux utilisateurs inscrits. Malgré ça j'ai quand même pu voir l'insertion d'un utilisateur avec le chiffrage du mot de passe en base de donnée.

## Conclusion

Je suis quand même satisfait de ce que j'ai fourni, je ne voyais clairement pas tout cela en imaginant mon projet au départ. Je pense le laisser de la sorte (peut-être revoir le front) et refaire le même avec Symfony pour voir la différence, et pourquoi pas rajouter + de fonctionnalité comme la réponse des messages de contact par mail par exemple.