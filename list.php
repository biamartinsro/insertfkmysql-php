<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php  include('Submodulo.php'); ?>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>

</head>
<body>
<table>
    <thead>
    <tr>
        <th>Código</th>
        <th>Nome</th>
        <th>Módulo</th>
        <th colspan="2">Ação</th>
    </tr>
    </thead>
    <h1 align="center">Lista de Submódulos</h1>
    <?php
    $s = new Submodulo();
    $lista_submodulo = $s->lista();
    foreach($lista_submodulo as $lst_submodulo) { ?>
        <tr>
            <td><?php echo $lst_submodulo->getIdSubmodulo();?></td>
            <td><?php echo $lst_submodulo->getNome(); ?></td>
            <td><?php echo $lst_submodulo->getModulo(); ?></td>

        </tr>
    <?php } ?>
    <tfoot>
    <td colspan="4" align="center">
        <br> <button class="btn" name="listar" type="button" onclick="location.href='index.php';">Cadastrar Submodulo</button>
    </td>
    </tfoot>
</table>
<?php
if (isset($_GET['exclusao'])) {
    if ($_GET['exclusao'] == 0){
        $msg  = "<p name = 'msg' id='msg' class = 'msg_erro'>";
        $msg .= "Exclusão não pôde ser realizada.</p>";
        echo $msg;
    }
}
?>
</body>
</html>
