<?php

require_once "../../Config/Connection.php";

class EditBukuForm
{
    private $conn;
    private $buku;
    private $dataBuku;

    public function __construct($conn, $buku)
    {
        $this->conn = $conn;
        $this->buku = $buku;

        // Periksa apakah ID buku disertakan dalam parameter GET
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            // Query untuk mendapatkan data buku berdasarkan id
            $query = "SELECT * FROM buku WHERE id_buku = $id";
            $result = mysqli_query($this->conn, $query);

            if ($result) {
                $this->dataBuku = mysqli_fetch_assoc($result);
            } else {
                echo "Error fetching book data: " . mysqli_error($this->conn);
                exit();
            }
        } else {
            echo "Invalid ID";
            exit();
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

                button {
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
            ?>
            <div class="content">
                <div id="sidebar">
                    <?php
                    include('../sidebaradmin.php');
                    ?>

                    <div class="isi">
                        <h2>Edit Book Details</h2>

                        <form action="../../Function/Admin/proses.php?aksi=ubah" method="post">
                            <input type="hidden" name="id" value="<?php echo $this->dataBuku['id_buku']; ?>">

                            <label for="judul">The Title :</label>
                            <input type="text" id="judul_buku" name="judul_buku" value="<?php echo $this->dataBuku['judul_buku']; ?>" required><br>

                            <label for="pengarang">Author :</label>
                            <input type="text" id="pengarang" name="pengarang" value="<?php echo $this->dataBuku['pengarang']; ?>" required><br>

                            <label for="tahun_terbit">Year Publication :</label>
                            <input type="text" id="tahun_terbit" name="tahun_terbit" value="<?php echo $this->dataBuku['tahun_terbit']; ?>" required>

                            <label for="deskripsi">Synopsis :</label>
                            <textarea name="deskripsi" required><?php echo $this->dataBuku['deskripsi']; ?></textarea><br>
                            
                            <label for="status">Status:</label>
                                <select id="status_buku" name="status_buku" required>
                                    <option value="Available" <?php echo ($this->dataBuku['status_buku'] == 'Available') ? 'selected' : ''; ?>>Available</option>
                                    <option value="Borrowed" <?php echo ($this->dataBuku['status_buku'] == 'Borrowed') ? 'selected' : ''; ?>>Borrowed</option>
                                </select>
                            <br><br>
                            <button type="submit">Update</button>
                        </form>
                    </div>
                </div>
            </div>

        </body>

        </html>
<?php
    }
}

class buku
{
};
// Membuat objek buku
$buku = new Buku($conn);

// Membuat objek EditBukuForm
$editBukuForm = new EditBukuForm($conn, $buku);

// Jika ada data yang dikirimkan dari formulir, panggil method updateBuku
// Render form
$editBukuForm->renderForm();

// Menutup koneksi
mysqli_close($conn);
?>