<?php
//error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

include ('includes/dbcreds.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- CSS (Make sure Bootstrap is first) -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/styles.css">
   <link rel="stylesheet" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">

    <title>Patrick Dang</title>
</head>

<body>
<div class="container min-vh-100" id="main">
    <h1 class="mt-4 mb-4">Order Summary</h1>
    <a href="http://pdang.greenriverdev.com/305/myGuestbook/guestbook.php">Return back to Guestbook</a>
    <table id = "guest-table" class = "display">
        <thead>
        <tr>
            <td>ID</td>
            <td>Fname</td>
            <td>Lname</td>
            <td>Title</td>
            <td>Company</td>
            <td>LinkedIn</td>
            <td>Email</td>
            <td>Where we Met</td>
            <td>Other Meet</td>
            <td>Message</td>
            <td>Add to Mailing?</td>
            <td>Mail</td>
            <td>Submission Date</td>
        </tr>
        </thead>
        <tbody>
        <?php
        $sql = "SELECT * FROM guestbook";
        $result = mysqli_query($cnxn, $sql);
        //var_dump($result);

        foreach ($result as $row)
        {
            //var_dump($row);
            $ID = $row['orderID'];
            $fname = $row['fname'];
            $lname = $row['lname'];
            $title = $row['title'];
            $company = $row['company'];
            $linkedIn = $row['linkedIn'];
            $email = $row['email'];
            $meet = $row['meet'];
            $other = $row['other_meet'];
            $message = $row['message'];
            $add_mail = $row['add_mail'];
            $mailing = $row['mailing'];
            $guest_date = date("F j, Y g: i a", strtotime($row['guest_date']));

            echo "<tr>";
            echo "<td>$ID</td>";
            echo "<td>$fname </td>";
            echo "<td>$lname </td>";
            echo "<td>$title </td>";
            echo "<td>$company </td>";
            echo "<td>$linkedIn </td>";
            echo "<td>$email</td>";
            echo "<td>$meet </td>";
            echo "<td>$other</td>";
            echo "<td>$message </td>";
            echo "<td>$add_mail </td>";
            echo "<td>$mailing</td>";
            echo "<td>$guest_date</td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
</div>
</body>

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src ="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>

<script>
    $('#guest-table').DataTable();
</script>

</body>
</html>
