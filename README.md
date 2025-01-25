# Projet Symfony7 - Recettes de cuisine
Permet à l'utilisateur de découvrir et créer des recettes de cuisine
***
## Environnement
      - Front-end réalisé avec Twig7.0
      - Back-end réalisé avec Symfony7 PHP8.3.6
      - Base de données: MySQL8.3.0
## Les API RESTful est construit pour d'autres frameworks front-end :
      - GET -{urlBase}/api/recipes  //retourner id, titre, slug et category name des recettes
      - GET -{urlBase}/api/recipes/show  // retourner id, titre, slug et category name, contenu et la durée des recettes
      - GET -{urlBase}/api/recipes/show/{id}  // retourner id, titre, slug et category name, contenu et la durée d'une recette selon id
      - GET -{urlBase}/api/auth  //Ajouter dans headers Authorization: Bearer {Token}
      - POST -{urlBase}/api/recipes/create
        ```json
        {
            "title": "My first recipe",
            "content": "This is my first recipe content",
            "category": 2
        }
        ```
      - PUT -{urlBase}/api/recipes/update
        ```json
        {
            "title": "My first recipe update",
            "content": "This is my first recipe content update",
            "category": 3
        }
        ```

