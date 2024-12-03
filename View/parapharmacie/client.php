<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire Client</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 8px 5px 5px #4AD489;
            text-align: center;
        }

        h1 {
            color: #333;
        }

        input {
            padding: 10px;
            margin: 10px 0;
            width: 100%;
            box-sizing: border-box;
        }

        button {
            background-color: #4AD489;
            color: #fff;
            padding: 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color:#138D75;
        }
    </style>
</head>
<body>
    <form method="post" action="../../View/parapharmacie/client1.php">
        <h1>Please enter ID</h1>
        <input type="text" name="id" placeholder="ID" required>
        <button name="idd">ADD</button>
    </form>
</body>
</html>
