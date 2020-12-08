<?php
//your connection to the db and query would go here
$con=mysqli_connect("localhost","root","","suportedore");
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$sql = "SELECT b.idsubmodulo,b.nosubmodulo, nomodulo  FROM tbsubmodulo AS b
INNER JOIN tbmodulo AS i
ON b.idmodulo = i.idmodulo ORDER BY nosubmodulo";
$result = mysqli_query($con, $sql);
?>


Select Club:
<select id="club" name="club">
    <option value = ""></option>
    <?php
    while($row = mysqli_fetch_array($result)) {
        echo '<option value='.$row['idsubmodulo'].'>'.$row['nomodulo'].'</option>';
    }
    ?>
</select>