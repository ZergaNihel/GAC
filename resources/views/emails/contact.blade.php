
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
  </head>
  <body>
    <h2>Bienvenue  {{ $name }}  {{ $prenom}} sur notre site GAC</h2>
    <p>Voici votre coordonée pour se connecter</p>
    <ul>
      
      <li><strong>Email</strong> : {{ $email }}</li>
       <li><strong>password</strong> : {{ $password }}</li>
    </ul>
  </body>
</html>