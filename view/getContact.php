<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 600px;
        margin: 20px auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
        color: #333;
        text-align: center;
    }

    .form-info {
        margin-top: 20px;
    }

    .form-info p {
        margin: 0;
        font-size: 16px;
    }
</style>

<div class="container">
        <h1>Vos informations</h1>
        <div class="form-info">
            <p>Nom : <?php echo $_POST['nom']; ?></p>
            <p>Prénom : <?php echo $_POST['prenom']; ?></p>
            <p>Email : <?php echo $_POST['email']; ?></p>
            <p>Message : <?php echo $_POST['message']; ?></p>
        </div>
    </div>

