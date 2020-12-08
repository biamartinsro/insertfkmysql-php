<?php include ('Submodulo.php'); ?>
<?php
//your connection to the db and query would go here
$con=mysqli_connect("localhost","root","","suportedore");
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$sql = "SELECT idmodulo,nomodulo FROM `tbmodulo` ORDER BY nomodulo";
$result = mysqli_query($con, $sql);
?>

<h1 xmlns="http://www.w3.org/1999/html">Cadastrar Submodulo</h1>
<form method="post" action="submodulo.php" >

    <div class="input-group">
        <label>Nome:</label>
        <input type="text" name="nome" value="">
    </div>

    <div>
        Módulo:

        <select id="modulo" name="idmodulo">
            <option value = "modulo"></option>
            <?php
            while($row = mysqli_fetch_array($result)) {
                echo '<option value='.$row['idmodulo'].'>'.$row['nomodulo'].'</option>';

            }
            ?>
        </select>

    </div>
    <div class="input-group">
        <button class="btn" type="submit" name="cadastrar" >Cadastrar</button>

    </div>
</form>

<?php
if (isset($_POST['cadastrar'])) {

   $nome = $_POST['nome'];
   $modulo   = $_POST['idmodulo'];
  $codigo = $_POST[ 'id'];

  $s = new Submodulo();
  $s->insere($nome, $modulo);


   header('location: list.php');
}
?>

