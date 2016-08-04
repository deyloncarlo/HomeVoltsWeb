<?php
// <includes>
include_once('../comum/mensagem.php');
include_once('ConexaoBase.php');
include_once('../entidades/Dispositivo.php');
// </includes>

/**
* Descrição:
* Classe que irá persistir os Dispositivos no banco de dados.
*/
class DispositivoDao extends ConexaoBase
{
  /**
  * Atributo que irá receber a conexão com o banco.
  */
  protected $m_conexao;

  /**
  * Não utilizar este contrutor. Chamar sempre o método estático getInstancia().
  */
  function __construct()
  {
    parent::__construct();
  }

  /**
  * Método utilizado para pegar a instância de DispositivoDao.
  * Chamar sempre este método ao invés do construtor desta classe.
  */
  static function getInstancia()
  {
    return new DispositivoDao();
  }

  /**
  * Método que insere o registro de um dispositivo no banco de dados.
  * Caso o registro já existe no banco, é retornado o registro do banco.
  */
  public function inserir($p_dispositivo)
  {

    $v_id = $p_dispositivo->getId();
    $v_nomeDispositivo = $p_dispositivo->getNomeDispositivo();
    $v_ativo = $p_dispositivo->isAtivo();

    // Verificando se registro já existe no banco.
    $v_dispositivoDoBanco = DispositivoDao::getInstancia()->buscarPeloID($v_id);
    if($v_dispositivoDoBanco != null)
    {
      return $v_dispositivoDoBanco;
    }

    $v_sql = "insert into dispositivo (id, nome_dispositivo, ativo) values (?, ?, ?)";

    $v_stmt = $this->m_conexao->prepare($v_sql);
    $v_stmt->bindParam(1, $v_id);
    $v_stmt->bindParam(2, $v_nomeDispositivo);
    $v_stmt->bindParam(3, $v_ativo);
    $v_stmt->execute();

    $this->isErroInsercaoOuAtualizacao($v_stmt);
  }

  /**
  * Método que busca um dispositivo no banco de dados através de seu ID.
  * return Dispositivo
  */
  public function buscarPeloID($p_id)
  {

    $v_sql = "select * from dispositivo where id=?";

    $v_result = $this->m_conexao->prepare($v_sql);
    $v_result->bindParam(1, $p_id);

    if($v_result->execute())
    {
      if($v_dispositivo = $v_result->fetch(PDO::FETCH_OBJ))
      {
        return new Dispositivo($v_dispositivo->id, $v_dispositivo->nome_dispositivo, $v_dispositivo->ativo);
      }
      else
      {
        return null;
      }
    }
    else
    {
      Mensagem::erroExecucaoSql();
      return null;
    }
  }

  /**
  * Método que busca um dispositivo no banco de dados através de seu Nome.
  * return Dispositivo
  */
  public function buscarPeloNome($p_nome)
  {

    $v_sql = "select * from dispositivo where nome_dispositivo=?";

    $v_result = $this->m_conexao->prepare($v_sql);
    $v_result->bindParam(1, $p_nome);

    if($v_result->execute())
    {
      if($v_dispositivo = $v_result->fetch(PDO::FETCH_OBJ))
      {
        return new Dispositivo($v_dispositivo->id, $v_dispositivo->nome_dispositivo, $v_dispositivo->ativo);
      }
      else
      {
        return null;
      }
    }
    else
    {
      Mensagem::erroExecucaoSql();
      return null;
    }
  }

  /**
  * Método que irá atualizar o nome do dispositivo já existente no banco.
  * return Dispositivo
  */
  public function atualizarNome($p_dispositivo)
  {

    $v_id = $p_dispositivo->getId();
    $v_nomeDispositivo = $p_dispositivo->getNomeDispositivo();
    $v_ativo = $p_dispositivo->isAtivo();

    // Verificando se já existe regristro com mesmo nome no banco.
    $v_dispositivoDoBanco = DispositivoDao::getInstancia()->buscarPeloNome($v_nomeDispositivo);
    if($v_dispositivoDoBanco != null)
    {
      return $v_dispositivoDoBanco;
    }

    $v_sql = "update dispositivo set nome_dispositivo=? where id=?";

    $v_stmt = $this->m_conexao->prepare($v_sql);
    $v_stmt->bindParam(1, $v_nomeDispositivo);
    $v_stmt->bindParam(2, $v_id);
    $v_stmt->execute();

    $this->isErroInsercaoOuAtualizacao($v_stmt);

  }

}


 ?>
