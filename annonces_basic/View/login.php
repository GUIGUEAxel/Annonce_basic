<?php $title= 'Exemple Annonces Basic PHP: Connexion'; ?>

<?php ob_start(); ?>
    <form method="post" action="/annonces/index.php/annonces">
        <label for="login"> Votre identifiant </label> :
        <input type="text" name="login" id="login" placeholder="defaut" maxlength="12" value="admin"/>
        <br />
        <label for="password"> Votre mot de passe </label> :
        <input type="password" name="password" id="password" maxlength="12" required value="admin" />

        <input type="submit" value="Envoyer">
    </form>
<?php $content = ob_get_clean(); ?>

<?php require 'layout.php'; ?>