<?php
require_once "../../Config/Connection.php";

class RepositoryFormHandler
{
    private $repo;

    public function __construct($repo)
    {
        $this->repo = $repo;
    }

    public function displayMessage()
    {
        if (isset($_GET['pesan'])) {
            $pesan = $_GET['pesan'];
            if ($pesan == "input") {
                echo "Data berhasil di input.";
            } else if ($pesan == "update") {
                echo "Data berhasil di update.";
            } else if ($pesan == "hapus") {
                echo "Data berhasil di hapus.";
            }
        }
    }

    public function renderForm()
    {
        ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Edit Katalog</title>
            <link rel="stylesheet" href="../../style/fitur.css">
            <style>
                body {
                    font-family: 'Arial', sans-serif;
                    margin: 20px;
                }

                .content {
                    display: flex;
                }

                .isi {
                    border: 1px solid black;
                    margin-left: auto;
                    margin-right: auto;
                }

                form {
                    width: 100%;
                }

                label {
                    display: block;
                    margin-bottom: 8px;
                }

                input,
                select,
                textarea {
                    width: 100%;
                    padding: 8px;
                    margin-bottom: 16px;
                    box-sizing: border-box;
                    border: 0.5px solid black;
                }

                .isi .form-title {
                    font-size: 2em;
                    margin-bottom: 10px;
                }

                .tambah {
                    background-color: #4CAF50;
                    border: 1.5px solid black;
                    padding: 10px 15px;
                    border-radius: 4px;
                    cursor: pointer;
                }

                button:hover {
                    background-color: antiquewhite;
                }
            </style>
        </head>

        <body>
        <?php
        include('../headeruser.php');
        $this->displayMessage();
        ?>
        <div class="content">
            <div id="sidebar">
                <?php
                include('../sidebaradmin.php');
                ?>
                <div class="isi">
                    <h3>Form Tambah Add Repo</h3>
                    <form action="../../Function/Admin/prosesrepo.php?aksi=tambah" method="post">
                        <label for="Judul_repo">Repository Title</label>
                        <input type="text" name="Judul_repo" required><br>

                        <label for="pengarang">Author:</label>
                        <input type="text" name="pengarang" required><br>

                        <label for="tahun_terbit">Year Publication:</label>
                        <input type="text" name="tahun_terbit" required><br>

                        <label for="Kata_Kunci">Key Words</label>
                        <input type="text" name="Kata_Kunci" required><br>

                        <label for="status_repo">Status Repository:</label>
                        <select name="status_repo" required>
                        <option value="Available">Available</option>
                        </select>
                        <br><br>

                        <button type="submit" class="tambah">Add data</button>
                    </form>
                </div>
            </div>
        </div>

        </body>

        </html>
        <?php
    }

    public function handleFormSubmission()
    {
    }
    }





// Membuat objek FormHandler
$formHandler = new RepositoryFormHandler($conn);

// Handle form submission
$formHandler->handleFormSubmission();

// Render the form
$formHandler->renderForm();

// Close the database connection
mysqli_close($conn);
?>
