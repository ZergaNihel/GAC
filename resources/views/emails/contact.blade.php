
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
  </head>
  <body>
    <h2>Bienvenue " {{ $name }}  {{ $prenom}} " sur notre application GAC</h2>
    <p>Voici votre coordonées pour se connecter</p>
    <ul>
      
      <li><strong>Email</strong> : {{ $email }}</li>
       <li><strong>Mot de passe </strong> : {{ $password }}</li>
    </ul>
  </body>
</html>