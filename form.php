<?php
    $errors = [];

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        if(!isset($_POST['first-name']) || trim($_POST['first-name']) === '') 
            $errors[] = "Le prénom est obligatoire";
          
        if(!isset($_POST['last-name']) || trim($_POST['last-name']) === '') 
            $errors[] = "Le nom est obligatoire";

        if(!isset($_POST['email']) || trim($_POST['email']) === '')
          $errors[] = "l'adresse e-mail est obligatoire";

        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
          $error[] = "l'adresse e-mail est invalide";

        if(!isset($_POST['phone-number']) || trim($_POST['phone-number']) === '') 
            $errors[] = "le numero de telephone est obligatoire";

        if(!isset($_POST['subject']) || trim($_POST['subject']) === '') 
            $errors[] = "le sujet est obligatoire";

        if(!isset($_POST['message']) || trim($_POST['message']) === '') 
            $errors[] = "le message est obligatoire";
        
        if(empty($errors)) {
            header('Location: thanks.php');
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commande</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
</head>
<body>
<?php
if (count($errors) > 0) : ?>
        <div class="border border-danger rounded p-3 m-5 bg-danger">
            <ul>
                <?php foreach ($errors as $error) : ?>
                    <li><?= $error ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
<?php endif; ?>
<form  action=""  method="post">
    <div>
      <label  for="first-name">Prenom :</label>
        <input  type="text"  id="first-name"  name="first-name">
    </div>
    <div>
      <label  for="last-name">Nom :</label>
        <input  type="text"  id="last-name"  name="last-name">
    </div>
    <div>
      <label  for="email">E-mail :</label>
        <input  type="email"  id="email"  name="email">
    </div>
    <div>
      <label  for="phone-number">téléphone :</label>
        <input  type="tel"  id="phone-number"  name="phone-number">
    </div>
    <div>
      <label  for="subject">Sujet :</label>
        <select name="subject" id="subject">
        <option value="">Choisissez le sujet de votre requête</option>
        <option value="problem">Probleme technique</option>
        <option value="question">Question</option>
        <option value="complain">Plainte</option>
        </select>
    </div>
    <div>
      <label  for="message">Message :</label>
      <textarea  id="message"  name="message"></textarea>
    </div>
    <div  class="button">
      <button  type="submit">Envoyer votre message</button>
    </div>
</form>
</body>
</html>