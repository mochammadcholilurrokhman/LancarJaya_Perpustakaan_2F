<?php
require_once "../Connection.php";

class FormHandler
{
    private $Buku;

    public function __construct($Buku)
    {
        $this->Buku = $Buku;
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
            <link rel="stylesheet" href="../style/fitur.css">
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
            include('../komponen/headeruser.php');
            $this->displayMessage();
            ?>
            <div class="content">
                <div id="sidebar">
                    <?php
                    include('../komponen/sidebaradmin.php');
                    ?>
                    <div class="isi">
                        <h3>Form Tambah Data Buku</h3>
                        <form action="proses.php?aksi=tambah" method="post">
                            <label for="judul">Book Title :</label>
                            <input type="text" name="judul_buku" required><br>

                            <label for="pengarang">Author :</label>
                            <input type="text" name="pengarang" required><br>

                            <label for="tahun_terbit">Year Publication :</label>
                            <input type="text" name="tahun_terbit" required><br>

                            <label for="sinopsis">Synopsis :</label>
                            <textarea name="sinopsis" required></textarea><br>

                            <label for="status_buku">Book Status :</label>
                            <input type="text" name="status_buku" required><br>
                            <br>
                            <button type="submit" class="tambah">Tambah Data</button>
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
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $judul_buku = isset($_POST['judul_buku']) ? $_POST['judul_buku'] : '';
            $pengarang = isset($_POST['pengarang']) ? $_POST['pengarang'] : '';
            $sinopsis = isset($_POST['sinopsis']) ? $_POST['sinopsis'] : '';
            $tahun_terbit = isset($_POST['tahun_terbit']) ? $_POST['tahun_terbit'] : '';
            $status = isset($_POST['status_buku']) ? $_POST['status_buku'] : '';

            if ($this->Buku->tambahBuku($judul_buku, $pengarang, $sinopsis, $tahun_terbit, $status)) {
                header("Location: katalog.php?pesan=input");
                exit();
            } else {
                echo "Gagal menambahkan data.";
            }
        }
    }
}

class buku
{
};
// Membuat objek buku
$buku = new Buku($conn);
// Membuat objek FormHandler
$formHandler = new FormHandler($buku);

// Handle form submission
$formHandler->handleFormSubmission();

// Render the form
$formHandler->renderForm();

// Menutup koneksi
mysqli_close($conn);
?>