<?php
// <includes>
include_once('../conexao/DispositivoDao.php');
// </includes>

/**
* Descrição:
* Arquivo que irá fazer a inserção de um novo dispositivo no banco de dados
*/

$v_id = $_GET['ID'];
$v_nomeDispositivo = $_GET['NOME'];
$v_ativo = $_GET['ATIVO'];

$v_novoDispositivo = new Dispositivo($v_id, $v_nomeDispositivo, $v_ativo);

$v_DispositivoDao = new DispositivoDao();
$v_DispositivoDao->insere($v_novoDispositivo);

 ?>
