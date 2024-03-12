<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $file = $_FILES["fileName"];
    if ($file["type"] === "application/pdf"){
        move_uploaded_file($file["tmp_name"], __DIR__.DIRECTORY_SEPARATOR."FileSalvati".DIRECTORY_SEPARATOR.$file["name"]);
    }else{
        echo "<h1 style=\"color: red\">questo non è un file PDF</h1>";
    }
    ?>
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Download</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $cartella = opendir("FileSalvati");
            $directoryFile = readdir($cartella);
            while ($directoryFile != false) {
                $directoryFile = readdir($cartella);
                if ($directoryFile === ".." || $directoryFile === false) {
                    continue;
                } 
                echo "<tr> <td>".$directoryFile."</td> <td> <a download href=\"FileSalvati".DIRECTORY_SEPARATOR.$directoryFile."\">Scarica</a> </tr>";
            }

            ?>
        </tbody>
    </table>
</body>
</html>