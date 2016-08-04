<?php

/**
 * Classe responsável por exibir as mensagem padrões da aplicação.
 */
class Mensagem
{
    /**
    * Método que irá exibir mensgem quando ocorrer um erro na execução de uma Sql.
    */
    static function erroExecucaoSql()
    {
      echo 'Falha na execução do SQL.';
    }

    /**
    * Método que irá exibir mensgem quando for feita a tentativa de inserir um registro que já existe.
    */
    static function registroJaExistente()
    {
      echo 'Registro já existe.';
    }

    /**
    * Método que irá exibir mensgem quando for feita atualizaçaõ de um registro.
    */
    static function registroAtualizado()
    {
      echo 'Registro atualizado.';
    }

    /**
    * Método que irá exibir mensgem quando um nome de dispositivo já existir no banco de dados.
    */
    static function nomeDeDispositivoExistente()
    {
      echo 'Nome pertencente a outro dispositivo.';
    }

    /**
    * Método que irá exibir mensgem quando for inserido um novo registro no bando de dados.
    */
    static function registroInserido()
    {
      echo 'Registro inserido.';
    }
}



 ?>
