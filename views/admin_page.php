<?php
session_start();
if (!isset($_SESSION['email'])) {
    header('Location: login_page.php?error=please login first');
}

include('../database/connection.php');
include('../components/header.php') ?>



<div class="tableContainer container-fluid d-flex justify-content-center flex-column">
    <h2 class="text-center">Teilnehmerliste</h2>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">id</th>
                <th scope="col">vorname</th>
                <th scope="col">nachname</th>
                <th scope="col">email</th>
                <th scope="col">firma</th>
                <th scope="col">workshop</th>
            </tr>
        </thead>
        <?php
        //the query to get all participants
        $sql = "SELECT participants.*, workshop_name 
        FROM participants JOIN rooms ON participants.room_id = rooms.id;";
        $result = mysqli_query($link, $sql);

        //check if query success
        if ($result) {
            //loop through all datas with while cos the datas are associated array
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tbody>
                <tr>
                <td>$row[id]</td>
                <td>$row[vorname]</td>
                <td>$row[nachname]</td>
                <td>$row[email]</td>
                <td>$row[firma]</td>
                <td>$row[workshop_name]</td>
                </tr>
                </tbody>";
            }
            // in case query failed, then throw the error
        } else {
            echo "error at " . mysqli_error($link);
        }
        ?>
    </table>
</div>
<?php include('../components/footer.php') ?>