<?php
/**
* Descrição:
* Classe base que irá estabelecer a conexão com o banco de dados
*/

class ConexaoBase
{
  // Atributo que irá receber a conexão com o banco
  protected $m_conexao;

  function __construct()
  {
      try {
          $this->m_conexao = new PDO("mysql:host=localhost;dbname=homevolts","root","");
          $this->m_conexao->exec("set names utf8");
      } catch (Exception $e) {
          echo "Falha na conexão: " . $e->getMessage();
          exit();
      }
  }

  public function getConexao(): PDO
  {
    return $this->m_conexao;
  }

  public function setConexao($p_conexao)
  {
    $this->m_conexao = $p_conexao;
  }

  /**
  * Método que irá exibir o erro encontrado na hora de executar a sql, caso houver erro
  */
  public function haveError($stmt)
  {
    if ($stmt->errorCode() != "00000") {
      echo ('Erro código ') . $stmt->errorCode() . ': ' . implode(", ", $stmt->errorInfo());
    }
  }
}
 ?>
