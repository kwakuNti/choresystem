<?php
include("../settings/connection.php");
include("../actions/get_a_chore.php");
checkLogin();

if (isset($_GET['id'])) {
    $choreId = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    $chore = getChoreById($choreId);

    if ($chore) {
?>
    <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Edit Chore</title>
            <link rel="stylesheet" href="../css/edit.css">

        </head>
        <body>
            <h1>Edit Chore</h1>
            <form action="../actions/edit_a_chore_action.php" method="post">
                <input type="hidden" name="choreId" value="<?php echo $chore['cid']; ?>">
                <label for="choreName">Chore Name:</label>
                <input type="text" id="choreName" name="choreName" value="<?php echo $chore['chorname']; ?>" required>
                <button type="submit">Update Chore</button>
            </form>
        </body>
        </html>
<?php
    } else {
        // No chore found with the provided ID
        echo "Chore not found.";
    }
} else {
    // Redirect to chore control view page if no ID is provided in the URL
    header("Location: ../admin/chore_control_view.php");
    exit;
}
