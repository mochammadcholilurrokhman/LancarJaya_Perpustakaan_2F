<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Perpustakaan</title>
    <link rel="stylesheet" href="../style/fitur.css">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        th:nth-child(1),
        td:nth-child(1) {
            width: 20%;
        }

        .back-btn {
          background-color: #1336CA;
            color: white;
            border: none;
            padding: 5px 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            margin: 2px 2px;
            cursor: pointer;
            border-radius: 7px;
            width: 157px;
        }

        .isi img {
            display: block;
            margin: 0 auto;
            max-width: 100%;
            height: auto;
            border-radius: 30px;
        }

        .center-text {
            text-align: center;
        }


    </style>
</head>


<body>
    
    <?php
    include('../komponen/headeruser.php');
    ?>
    <div class="content">
        <div id="sidebar">
            <?php
            include('../komponen/sidebaradmin.php');
            ?>

            <div class="isi">
                <img src="../img/BelajarC++.jpeg" alt="Book Cover">
                <br>
                <h1 class="center-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Laboriosam ipsam tenetur voluptatum velit nihil sunt omnis consequuntur. Quas porro modi accusamus soluta. Suscipit aliquid quidem consectetur, doloribus provident repellendus sapiente!</h1>
                
                <table>
        <tbody>
            <tr>
                <td>Id</td>
                <td>00011</td>
            </tr>
            <tr>
                <td>The Title</td>
                <td>Belajar C++</td>
            </tr>
            <tr>
                <td>The Author</td>
                <td>Abima Fadricho</td>
            </tr>
            <tr>
                <td>Year Publication</td>
                <td>2015</td>
            </tr>
            <tr>
                <td>Status</td>
                <td>Available</td>
            </tr>
        </tbody>
    </table>
    <br>
    <div> <a href="katalog.php?id=1" class="back-btn">Back</a></div>
        </div>

            
        </div>
    </div>
</body>

</html>