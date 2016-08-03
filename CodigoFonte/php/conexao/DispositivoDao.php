<?php
// <includes>
include_once('ConexaoBase.php');
include_once('../entidades/Dispositivo.php');
// </includes>

/**
* Descrição:
* Classe que irá persistir os Dispositivos no banco de dados
*/
class DispositivoDao extends ConexaoBase
{
  /**
  * Atributo que irá receber a conexão com o banco
  */
  protected $m_conexao;

  function __construct()
  {
    parent::__construct();
  }

  /**
  * Método que insere o registro de um dispositivo no banco de dados
  */
  public function insere($p_dispositivo)
  {
    $v_sql = "insert into dispositivo (id, nome_dispositivo, ativo) values (?, ?, ?)";

    $v_id = $p_dispositivo->getId();
    $v_nomeDispositivo = $p_dispositivo->getNomeDispositivo();
    $v_ativo = $p_dispositivo->isAtivo();

    $v_stmt = $this->m_conexao->prepare($v_sql);
    $v_stmt->bindParam(1, $v_id);
    $v_stmt->bindParam(2, $v_nomeDispositivo);
    $v_stmt->bindParam(3, $v_ativo);
    $v_stmt->execute();

    $this->haveError($v_stmt);
  }
}


 ?>
