<?php
include("../actions/get_all_chores_action.php");

$allchores = getAllChores();

function displayChores($chores) {
    if (empty($chores)) {
        return;
    }

    echo "<table class='chore-table'>";
    echo "<tr><th>Chore Name</th><th>Action</th></tr>";
    foreach ($chores as $chore) {
        echo "<tr>";
        echo "<td>" . $chore['chorname'] . "</td>";
        echo "<td>
        <a href='../admin/edit_a_chore_view.php?id=" . $chore['cid'] . "'><span class='material-symbols-outlined'>edit</span></a> |
        <a href='../actions/delete_chore_action.php?id=" . $chore['cid'] . "'><span class='material-symbols-outlined'>delete</span></a>
        </td>";
        echo "</tr>";
    }
    echo "</table>";
}
