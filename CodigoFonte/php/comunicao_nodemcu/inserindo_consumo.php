<?php
// <includes>
include_once('../comum/Mensagem.php');
include_once('../conexao/DispositivoDao.php');
// </includes>

/**
* Descrição:
* Arquivo que irá fazer a inserção de um novo dispositivo no banco de dados
*/

$v_id_dispositivo = $_GET['ID'];
$v_nomeDispositivo = $_GET['NOME'];
$v_corrente = $_GET['CORRENTE'];
$v_tempo = $_GET['TEMPO'];

$v_novoDispositivo = new Dispositivo($v_id, $v_nomeDispositivo, $v_ativo);

$v_dispositivoDoBanco = DispositivoDao::getInstancia()->inserir($v_novoDispositivo);

if($v_dispositivoDoBanco != null)
{
    Mensagem::registroJaExistente();
}
else
{
  Mensagem::registroInserido();
}

 ?>
