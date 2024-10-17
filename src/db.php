<?php
namespace Kingkernel;

class DB 
{
    public function __construct()
    {
        
    }
    public function connect($drive)
    {
        switch($drive)
        {
            case 'sqlite':
                try {
                    // Caminho do arquivo SQLite. Se o arquivo não existir, ele será criado.
                    $dbPath = 'caminho/para/o/banco.sqlite';
        
                    // Criação da conexão PDO
                    $pdo = new \PDO("sqlite:$dbPath");
        
                    // Configuração para lançar exceções em caso de erro
                    $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        
                    echo "Conexão com SQLite estabelecida com sucesso.";
        
                } catch (\PDOException $e) {
                    // Em caso de erro, exibe a mensagem
                    echo "Erro ao conectar ao SQLite: " . $e->getMessage();
                }
            break;
        }
        

    }
}