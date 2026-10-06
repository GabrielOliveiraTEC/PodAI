<?php

session_start();

require_once 'conexao.php';

$pacientes = $conn->query("
SELECT *
FROM usuarios
WHERE tipo_usuario='paciente'
ORDER BY nome
");

?>

<h1>Pacientes</h1>

<table border="1">

<tr>

<th>Nome</th>
<th>CPF</th>
<th>Cidade</th>
<th>Ação</th>

</tr>

<?php foreach($pacientes as $p): ?>

<tr>

<td><?= $p['nome'] ?></td>

<td><?= $p['cpf'] ?></td>

<td><?= $p['cidade'] ?></td>

<td>

<a href="
ficha_paciente.php?id=<?= $p['id'] ?>
">
Abrir
</a>

</td>

</tr>

<?php endforeach; ?>

</table>