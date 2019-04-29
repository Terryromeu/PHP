Bienvenue sur le projet de classe réalisé avec le framework Symfony.

Une fois le repo cloné, ouvrir une console et exécuter les manipulations suivantes pour rendre le projet opérationnel:

	_ composer install
	_ php bin/console doctrine:database:create
	_ php bin/console doctrine:schema:update
	_ php bin/console doctrine:fixture:load

Un compte admin est créé d'office sur le site. Ses identifiants sont: Admin(username) Admin(password).

Une fois identifié en tant qu'admin, vous pourrez depuis la barre latérale accéder aux options d'administration du site. 

Il faut être identifié (pas forcément en tant qu'admin) pour pouvoir poster un commentaire sur un article.

### Possibles erreurs
* Si une erreur comme celle qui suit apparaît : 
```
[Symfony\Component\Debug\Exception\ContextErrorException]
  Warning: "continue" targeting switch is equivalent to "break". Did you mean to use "
  continue 2"?
```
Ouvrir vendor/doctrine/orm/lib/Doctrine/ORM/UnitOfWork.php et changer les lignes 2665 et 2636 en "continue 2;" au lieu de "continue;"
* Si une erreur comme celle qui suit apparaît :
```
[Doctrine\DBAL\Exception\ConnectionException]
  An exception occured in driver: SQLSTATE[HY000] [1049] Unknown database '...'
```
Créer manuellement la base de donnée et reprendre la procédure d'installation.
