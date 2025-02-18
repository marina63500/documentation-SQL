<?php
include_once "header.php";


?>

<body>
 <div class="container">
 <aside>
    <div class="requete">
    <ul class="requete-lien" >
        <h4>Requetes</h4>
        <li><a href="#create">CREATE</a></li>
        <li><a href="#insert">INSERT</a></li>
        <li><a href="#select">SELECT</a></li>
        <li><a href="#update">UPDATE</a></li>
        <li><a href="#delete">DELETE</a></li>
        <li><a href="#alter-t">ALTER TABLE</a></li>
        <li><a href="#order">ORDER BY</a></li>
        <li><a href="#group">GROUP BY</a></li>
        <li><a href="#join">JOIN</a></li>
        <li><a href="#avg">AVG</a></li>
    </ul>
    </div>
</aside>
    <main >
        <section class="chapitre-1">
            <h1>Documentation Technique SQL</h1>
            <div class="intro" >
                <hr>
                <h2 class="sous-titre" >Introduction</h2>
                <h3 class="titre3">Qu'est-ce que MySQL ?</h3>
                <p class="definition">MySQL est un système de gestion de bases de données relationnelles (SGBDR) open source. Il permet de stocker, organiser et manipuler des données dans des tables structurées. Utilisé largement dans le développement web, il se distingue par sa rapidité, sa fiabilité et son coût (gratuit dans sa version communautaire).</p>
                <h3>Rôle de MySQL :</h3>
                <p>Dans une application, MySQL sert à centraliser les données, les organiser en tables et permettre des opérations telles que la recherche, l’insertion, la mise à jour ou la suppression d’enregistrements. Sa popularité réside dans sa simplicité et son efficacité.</p>
            </div>
            <div class="astuce">
         <p><strong>Astuce</strong> : MySQL est souvent utilisé en combinaison avec PHP pour créer des applications web dynamiques. La communauté active et la documentation abondante facilitent son apprentissage.</p>
        </div>
        </section>
        
        <section class="chapitre-2" >
        <div class="composant" > 
            <h2 class="sous-titre" >Les composantes d'une base de données MySQL</h2> <hr>
            <p >Une base de données MySQL est constituée de plusieurs éléments essentiels :</p>
            <ul>
              <li><strong>Table:</strong><span> Structure fondamentale qui stocke des données sous forme de lignes et de colonnes.
               Chaque table représente une entité (exemple : Pokémon, Utilisateurs, Produits).</span></li>
              <li><strong>Colonne:</strong><span> Attribut ou propriété d'une entité. 
              Chaque colonne a un type de données spécifique (INT, VARCHAR, DATETIME, etc.).</span></li>
              <li><strong>Ligne (ou enregistrement) :</strong><span> de valeurs correspondant aux colonnes d'une table.
               Chaque ligne représente une instance de l'entité.</span></li>
               <li><strong>Clé primaire :</strong> <span>Identifiant unique d'une ligne dans une table, souvent auto-incrémenté.</span></li>

              <span> <li><strong>Clés étrangères : </strong>Elles établissent des relations entre deux tables en liant une colonne d'une table à la clé primaire d'une autre.
               Cela permet de structurer les données de manière cohérente et d'éviter les redondances.</span></li>
            </ul>
            <strong>Pourquoi organiser les données en tables ?</strong>
            <p>Une structure bien organisée facilite la maintenance,
               la recherche et l'évolution des données tout en assurant leur intégrité.</p>
        </div>
    </section>
    <section class="chapitre-3">
      <div class="commands"  id="section3">
    <h2 class="sous-titre" >Les commandes SQL de base</h2> <hr>
      </div>
      <div id="create" >
        <h3>CREATE</h3>
      <p>La commande <code> CREATE </code> sert à créer des bases de données et des tables.</p>
      <pre><code>CREATE TABLE pokemon (
  id INT AUTO_INCREMENT PRIMARY KEY,
  weight INT,
  height INT,
  base_experience INT,
  hp INT,
  atk INT,
  def INT,
  spa INT,
  spd INT,
  spe INT,
  name VARCHAR(50),
  slug VARCHAR(50),
  id_api INT,
  name_api VARCHAR(50),
  is_default BOOLEAN
);</code></pre>
      </div>
      <div id="insert">
        <h3>INSERT</h3>
        <p>Utilisez <code>INSERT INTO</code> pour ajouter de nouvelles données dans une table.</p>
        <pre>INSERT INTO pokemon (
          weight, 
          height, 
          base_experience, 
          name, 
          slug, 
          id_api, 
          name_api, 
          is_default)
        VALUES (69,'Bulbasaur', 'bulbasaur', TRUE);</pre>


      </div>
      <div id="select">
        <h3>SELECT</h3>
        <strong><span>Exemple simple :</strong> Pour sélectionner toutes les colonnes de tous les enregistrements :
        </span>
        <pre><code>SELECT * FROM pokemon;</code></pre>
        <strong><span>Exemple avancé :</strong>  Pour sélectionner uniquement certaines colonnes ou appliquer des filtres :
        </span></div>
        <pre>SELECT id, name, base_experience
FROM pokemon
WHERE base_experience > 100
ORDER BY base_experience DESC;</pre>
      
      <div id="update">
            <h3>UPDATE</h3>
            <p>La commande<code> UPDATE</code> permet de modifier des enregistrements existants.</p>
            <pre><code>UPDATE pokemon
SET hp = 50
WHERE name = 'Bulbasaur';</code></pre>
        </div>
        <div id="delete">
            <h3>DELETE</h3>
            <p><code>DELETE</code> est utilisée pour supprimer des enregistrements. </p>
            <pre><code>DELETE FROM pokemon
WHERE name = 'Bulbasaur';</code></pre>
        </div>
        <div id="alter-t">
            <h3>ALTER TABLE</h3>
            <p>Pour modifier la structure d'une table, par exemple en ajoutant de nouvelles colonnes :</p>
            <pre><code>ALTER TABLE pokemon 
ADD COLUMN adresse VARCHAR(255);
ADD COLUMN telephone VARCHAR(255);</code></pre></div></section>
<section class="chapitre-4">
        <div class="requetes-Avc">
            <h2 class="sous-titre" >Requêtes SQL Avancées</h2><hr>
            <p>Au-delà des commandes de base, voici des exemples de requêtes plus complexes qui permettent d'exploiter pleinement les capacités de MySQL.</p>
        </div>
        <div id="order">
            <h3>Filtrage  avec ORDER BY</h3>
            <p><code>ORDER BY</code> permet de trier les données sur une ou plusieurs colonnes, par ordre ascendant ou descendant.</p>
            <p>exemple :Afficher le pokémon ayant la somme de statistique (hp, atk, def, spa, spd, spe) la plus élevée : </p>
            <pre><code>SELECT name , (hp + atk + def + spa + spe +spd)
AS stat 
FROM pokemon
ORDER BY stat DESC LIMIT 1;</code></pre>
        </div>
        <div id="group">
            <h3>Agrégation avec GROUP BY</h3>
            <p><code>GROUP BY</code> permet de grouper plusieurs résultats et utiliser une fonction de totaux sur un groupe de résultat </p>
            <p>Exemple :Séléctionner le nom et prénom de chaque propriétaire et afficher son nombre d'animal :</p>
            <pre><code>SELECT proprietaire.nom,proprietaire.prenom,count(animal.id)
FROM proprietaire
INNER JOIN animal on proprietaire.id = animal.proprietaire_id
GROUP BY proprietaire.id;</code></pre>
        </div>

        <div id="join">
            <h3>Jointures (JOIN)</h3>
            <p><code>INNER JOIN</code> permet de relier deux tables entre elles  pour pouvoir relier les informations entres elles</p>
            <p>Exemple : Supposons que nous devons joindre deux tables(une utilisateur et l'autre pays )
              pour pouvoir afficher l'utilisateur avec son pays. : </p>
            <pre><code>SELECT pays.label ,utilisateur.name
FROM pays
INNER JOIN utilisateur ON utilisateur.pays_id = pays.id ;</code></pre>
        </div>
        <div id="avg">
            <h3>Moyenne</h3>
            <p>Exemple pour sélectionner les Pokémon ayant une expérience supérieure à la moyenne de tous les Pokémon :</p>
            <pre><code>SELECT name, base_experience
FROM pokemon
WHERE base_experience > (
  SELECT AVG(base_experience) FROM pokemon
);
</code></pre>
        </div>

    </section>
    <section class="chapitre-5">
  <div class="myAdmin">
    <h2 class="sous-titre">Gestion de MySQL via phpMyAdmin</h2>
    <hr>
  </div>
  <div>
    <h3>Qu'est-ce que phpMyAdmin ?</h3>
    <p>
      <code>phpMyAdmin</code> est une application web qui offre une interface
      graphique pour la gestion des bases de données MySQL ou MariaDB. Il permet
      d'effectuer toutes les opérations classiques sans passer par la ligne de
      commande.
    </p>
  </div>
  <div>
    <h3>Création d'une base de données et d'une table</h3>
  </div>
  <div>
    <span><strong>Création d'une base :</strong> Dans phpMyAdmin, cliquez sur «
      Nouvelle base de données », entrez le nom et cliquez sur « Créer ».</span>
  </div>
  <div>
    
      <span><strong>Création d'une table : </strong>Sélectionnez la base, cliquez sur
      « Créer une table », définissez le nombre de colonnes, puis spécifiez les
      propriétés de chaque colonne (nom, type, taille).</span>
  </div>

    <h3>Modification de la structure</h3>
    <p>Dans l'onglet « Structure » de phpMyAdmin, vous pouvez ajouter, 
      modifier ou supprimer des colonnes, définir des clés primaires ou étrangères, et créer des index.
    </p>
    <h3>Avantages de phpMyAdmin</h3>
    <ul>
      <li><span>Interface graphique intuitive et accessible</span></li>
      <li><span>Gestion rapide et visuelle des bases de données</span> </li>
      <li><span>Fonctionnalités d'import/export facilitant les sauvegardes</span> </li>
    </ul>
  
</section>
<section class="Chapitre-6">
  <div class="save">
  <h2 class="sous-titre">Maintenance et Sauvegarde</h2><hr>
  <h3>Importances des Sauvegardes</h3>
  <p>Sauvegarder régulièrement vos bases de données est essentiel pour éviter la perte de données en cas de panne, 
    d'attaque ou d'erreur humaine.
  </p>
  <h3>Méthodes de Sauvegarde</h3>
  <ul>
    <li><strong><span>mysqldump :</strong> Outil en ligne de commande pour exporter une base de données dans un fichier SQL.</span> </li>
    <li><strong><span>phpMyAdmin :</strong> Utilisez la fonction d'export pour sauvegarder vos données.</span></li>
    <li><strong><span>Scripts Automatisés :</strong>Planifiez des sauvegardes régulières à l'aide de tâches cron (sous Linux) 
    ou de planificateur de tâches sous Windows.</li></span>
  </ul>
  <h3>Surveillance de la Performance</h3>
  <p>Pour surveiller la santé de votre base, vous pouvez utiliser :</p>
  <ul>
    <li><span>Outils de monitoring (par exemple, MySQL Enterprise Monitor).</span></li>
    <li><span>Commandes SQL telles que <code> SHOW STATUS </code> et <code>SHOW PROCESSLIST</code> pour obtenir des informations en temps réel.</span></li>
    <li><span>L'analyse des logs d'erreurs et de requêtes lentes.</span></li>
  </ul>
  </div>
  
</section>

<section class="chapitre-7" >
    <h2>
    Ressources et Liens Utiles
    </h2>
    <div>
        <ul>
            <li><a href="https://www.w3schools.com/sql/" target="_blank">W3Schools SQL Tutorial</a>- Un tutoriel complet sur SQL.</li>
            <li><a href="https://www.sqlzoo.net/wiki/SQL_Tutorial" target="_blank">SQLZoo </a>- Exercices interactifs pour pratiquer SQL.</li>
            <li><a href="https://dev.mysql.com/doc/" target="_blank">Documentation Officielle MySQL</a>- Référence complète sur MySQL.</li>
            <li><a href="https://www.phpmyadmin.net/docs/" target="_blank">Documentation phpMyAdmin </a> - Guide d'utilisation de phpMyAdmin.</li>
        </ul>
    </div>

        </div>
    </section>
    </main>
    </div>
   <?php
    include_once "footer.php";
    ?>
</body>
</html>
