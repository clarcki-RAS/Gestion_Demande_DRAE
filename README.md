# Gestion des Demandes d'Aide Agricole – DRAE

Application web développée lors d'un stage à la DRAE Fianarantsoa
d'août à décembre 2023.

## Fonctionnalités

- Soumission et suivi des demandes d'aide agricole
- Interface web responsive (HTML + Bootstrap)
- Impression des demandes en PDF
- Conception de la base de données avec la méthode Merise (MCD → MLD)

## Stack technique

| Couche    | Technologie     |
|-----------|-----------------|
| Frontend  | HTML, Bootstrap |
| Backend   | PHP             |
| Base de données | MySQL     |

# Importer la base de données
mysql -u root -p < database/schema.sql

# Configurer la connexion
cp config/config.example.php config/config.php

# Remplir les infos DB dans config.php

# Lancer avec un serveur local (XAMPP, Laragon, ou PHP built-in)
php -S localhost:8000
```
