<?php

/**
 * Classe que irá representar o consumo de cada dispositivo cadastrado na
 * aplicação.
 */
class Consumo
{

  /** ID do dispositivo */
  private m_idDispositivo;

  /** Nome do dispositivo */
  private m_nomeDispositivo;

  /* Conrrente consumida */
  private m_corrente;

  /** Tempo em que foi consumido toda a corrente */
  private m_tempo;

  function __construct($p_idDispositivo, $p_nomeDispositivo, $p_corrente, $p_tempo)
  {
    $this->m_idDispositivo = $p_idDispositivo;
    $this->m_nomeDispositivo = $p_nomeDispositivo;
    $this->m_corrente = $p_corrente;
    $this->m_tempo = $p_tempo;
  }

  public function getIdDispositivo()
  {
    return $this->m_idDispositivo;
  }

  public function setIdDispositivo($p_idDispositivo)
  {
    $this->m_idDispositivo = $p_idDispositivo;
  }

  public function getNomeDispositivo()
  {
    $this->m_nomeDispositivo;
  }

  public function setNomeDispositivo($p_nomeDispositivo)
  {
    $this->m_nomeDispositivo = $p_nomeDispositivo;
  }

  public function getCorrente()
  {
    return $this->m_corrente;
  }

  public function setCorrente($p_corrente)
  {
    $this->m_corrente = $p_corrente;
  }

  public function getTempo()
  {
    return $this->m_tempo;
  }

  public function setTempo($p_tempo)
  {
    $this->m_tempo = $p_tempo;
  }
}

 ?>
