# Récupération et installation du projet

1. Cloner dépôt :

```
git clone https://github.com/osaris/laravel-exa-frm-php-23.git
```

2. Installer laravel sail :

```
cd laravel-todomvc10
docker run --rm --interactive --tty   --volume $PWD:/app   --user $(id -u):$(id -g)   composer install
```

3. Mettre à la racine le fichier .env du projet (le renommer en .env au lieu de .env.txt) :

```
https://vault.bitwarden.eu/#/send/Y5cvi69rCEuY77CqAQ_HdA/mgEO7x3gChKWBykqPbqnHA
```

4. Démarrer docker et créer les containers :

```
./vendor/bin/sail up
```

5. Démarrer vitejs :

```
./vendor/bin/sail npm install
./vendor/bin/sail npm run dev
```

6. Accéder à la page : http://localhost

7. Cliquer sur "Run migrations" puis "Refresh" et l'app doit fonctionner

# Exercices

Chaque exercice comporte une suite de test pour vous aider à valider le fonctionnement de votre code. Attention, la suite de test ne peut pas valider l'intégralité du résultat, une suite de test avec tous les tests "passed" ne garantit pas une réponse 100% correcte (on peut toujours "duper" des tests), de la même manière il se peut que certains tests qui sont orientés vers une solution précise restent "failed" après votre implémentation (mais c'est rare !).

Je vous conseille de commencer par lire les tests avant de débuter un exercice, certains tests peuvent vous guider vers une solution.

Pour exécuter les tests d'un seul exercice vous pouvez utiliser la commande :

```
./vendor/bin/sail artisan test --filter Exercise01
```

## Exercice 1

Ajouter un champ nota (texte, pas obligatoire) à l'article, l'afficher dans la liste et dans le formulaire de création.

## Exercice 2

Ajouter un formulaire d'édition d'un article et le sauver avec les mêmes règles de validation que pour la création, essayer de dupliquer le moins de code possible.

## Exercice 3

Bloquer la suppression d'un article si son stock (quantity) est supérieur à 0 (penser à Fat Model, Skinny Controller).

## Exercice 4

Afficher le nombre d'articles et le stock total en bas de la liste des articles. Penser à adapter le libellé au singulier/pluriel.

## Exercice 5

Ajouter une action pour incrémenter de 1 la quantité en stock d'un article depuis la liste (bouton "+ stock", ici aussi, penser à Fat Model, Skinny Controller).

## Exercice 6

Ajouter un endpoint (route, action) pour effacer une tâche par API REST en respectant la condition d'effacement de l'exercice 3 si vous avez pu la mettre en place. 
L'API n'est pas sécurisée (pas de token etc.).