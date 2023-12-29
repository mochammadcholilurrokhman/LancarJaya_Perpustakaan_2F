<?php
require_once "../../Config/Connection.php";

class EditRepoForm
{
    private $conn;
    private $dataRepo;

    public function __construct($conn)
    {
        $this->conn = $conn;

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $query = "SELECT * FROM repository WHERE id_repo = $id";
            $result = mysqli_query($this->conn, $query);

            if ($result) {
                $this->dataRepo = mysqli_fetch_assoc($result);
            } else {
                echo "Error fetching repository data: " . mysqli_error($this->conn);
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
            <title>Edit Repository</title>
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
                        <h2>Edit Repository</h2>

                        <form action="../../Function/Admin/prosesrepo.php?aksi=ubah" method="post">
                            <input type="hidden" name="id_repo" value="<?php echo $this->dataRepo['id_repo']; ?>">

                            <label for="Judul_repo">The Title:</label>
                            <input type="text" id="Judul_repo" name="Judul_repo" value="<?php echo $this->dataRepo['Judul_repo']; ?>" required>

                            <label for="pengarang">The Author:</label>
                            <input type="text" id="pengarang" name="pengarang" value="<?php echo $this->dataRepo['pengarang']; ?>" required>

                            <label for="tahun_terbit">Year Publication:</label>
                            <input type="text" id="tahun_terbit" name="tahun_terbit" value="<?php echo $this->dataRepo['tahun_terbit']; ?>" required>

                            <label for="Kata_Kunci">Key Words:</label>
                            <input type="text" id="Kata_Kunci" name="Kata_Kunci" value="<?php echo $this->dataRepo['Kata_Kunci']; ?>" required>

                            <label for="status_repo">Status:</label>
                            <select id="status_repo" name="status_repo" required>
                                <option value="Available" <?php echo ($this->dataRepo['status_repo'] == 'Available') ? 'selected' : ''; ?>>Available</option>
                                <option value="Borrowed" <?php echo ($this->dataRepo['status_repo'] == 'Borrowed') ? 'selected' : ''; ?>>Borrowed</option>
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

// Membuat objek EditRepoForm
$editRepoForm = new EditRepoForm($conn);

$editRepoForm->renderForm();

// Menutup koneksi
mysqli_close($conn);
?>
