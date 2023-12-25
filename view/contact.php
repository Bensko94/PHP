<style>
    body {
        font-family: 'Arial', sans-serif;
        margin: 20px;
    }

    h1 {
        color: #333;
        text-align: center;
        margin-bottom: 30px;
    }

    form {
        max-width: 500px;
        margin: 0 auto;
        background: #f4f4f4;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    form label {
        display: block;
        margin: 10px 0 5px;
        font-weight: bold;
    }

    form input,
    form textarea {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    form textarea {
        resize: vertical;
    }

    form button {
        background-color: #4CAF50;
        color: white;
        padding: 12px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        width: 100%;
        font-size: 1.2em;
    }

    form button:hover {
        background-color: #45a049;
    }
</style>

<h1>Contact</h1>

<form action="" method="post">
    <label for="nom">Nom :</label>
    <input type="text" name="nom" required>

    <label for="prenom">Prénom :</label>
    <input type="text" name="prenom" required>

    <label for="email">Email :</label>
    <input type="email" name="email" required>

    <label for="message">Message :</label>
    <textarea name="message" rows="4" required></textarea>

    <button>Envoyer</button>
</form>
