<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Professeur</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        header {
            text-align: center;
            margin-bottom: 20px;
        }
        img {
            max-width: 80%;
            height: auto;
        }
        .logo {
    display: block;
    margin: 0 auto 20px auto;
    max-width: 200px;
}
        h1 {
            color: #2c3e50;
            font-size: 1.8em;
            margin: 10px 0;
        }
        h2 {
            color: #27ae60;
            font-size: 1.2em;
            margin: 10px 0;
        }
        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
        .box {
            background-color: white;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            margin: 10px;
            flex: 1 1 30%;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
            text-align: center;
            cursor: pointer; /* Indique que l'encadré est cliquable */
        }
        .box:hover {
            transform: scale(1.05);
        }
        @media (max-width: 600px) {
            .box {
                flex: 1 1 100%;
            }
        }
    </style>
</head>
<body>

    <header>
        <img src="logo-1.png" alt="Logo EMSI" class="logo">
        <h1>Ecole Marocaine des Sciences de l'Ingénieur</h1>
        <h2>Membre de Honoris United Universities</h2>
    </header>

    <div class="container">
        <div class="box" onclick="window.location='examinateur.html';">
            <h3>Examinateur</h3>
            <p>Informations sur l'examinateur.</p>
        </div>
        <div class="box" onclick="window.location='president.html';">
            <h3>Président</h3>
            <p>Informations sur le président.</p>
        </div>
        <div class="box" onclick="window.location='rapporteur.html';">
            <h3>Rapporteur</h3>
            <p>Informations sur le rapporteur.</p>
        </div>
        <div class="box" onclick="window.location='responsable.html';">
            <h3>Responsable</h3>
            <p>Informations sur le responsable.</p>
        </div>
        <div class="box" onclick="window.location='membre.html';">
            <h3>Membre</h3>
            <p>Informations sur le membre.</p>
        </div>
    </div>

</body>
</html>