<?php
/**
* Classe que irá representar a entidade Dispositivo
*/
class Dispositivo
{
  // Id do dispositivo.
  private $m_id;

  // nome do dispositivo.
  private $m_nomeDispositivo;

  // informa se o dispositivo está em funcionamento ou não.
  private $m_ativo;

  function __construct($p_id, $p_nomeDispositivo, $p_ativo)
  {
    $this->setId($p_id);
    $this->setNomeDispositivo($p_nomeDispositivo);
    $this->setIsAtivo($p_ativo);
  }

  public function getId(): int
  {
    return $this->m_id;
  }

  public function setId($p_id)
  {
    $this->m_id = $p_id;
  }

  public function getNomeDispositivo(): string
  {
    return $this->m_nomeDispositivo;
  }

  public function setNomeDispositivo($p_nomeDispositivo)
  {
    $this->m_nomeDispositivo = $p_nomeDispositivo;
  }

  public function isAtivo(): int
  {
    return $this->m_ativo;
  }

  public function setIsAtivo($p_ativo)
  {
    $this->m_ativo = $p_ativo;
  }
}
 ?>
