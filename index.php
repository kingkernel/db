<?php
define('DB_HOST'        , "localhost");
define('DB_USER'        , "root");
define('DB_PASSWORD'    , "root");
define('DB_NAME'        , "dbkingkernel");
define('DB_DRIVER'      , "mysql");

require_once "Conexao.php";
use kingkernel\DB;
try{

    $Conexao = Conexao::getConnection();
    $query = $Conexao->query('show databases');
    $tabelas = $query->fetchAll();

 }catch(Exception $e){

    echo $e->getMessage();
    exit;

 }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Describe banco SQLSERVER 2014</title>
</head>
<body>
  <form>
        <table border=1>
            <tr>
               <td>nome da tabela</td>
               <td>Campos</td>
               <td>foreign keys</td>
            </tr>
            <?php
               foreach($tabelas as $tabela) {
            ?>
            <tr>
                <td><?php echo $tabela['TABLE_NAME']; ?></td>
                <td>
                <?php
                $query2 = $Conexao->query('exec sp_columns '."'". $tabela['TABLE_NAME']."'");
                $result = $query2->fetchAll();
                $numtables = count($tabelas);
                    foreach ($result as $coluna)
                    {
                        echo($coluna["COLUMN_NAME"] ." <b>tipo:</b> <i>". $coluna["TYPE_NAME"]."(".$coluna["PRECISION"].")</i> \n <br/>");
                    }
                 ?></td>
                 <td>
                <?php
                $query3 = $Conexao->query('SELECT COLUMN_NAME, CONSTRAINT_NAME FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE WHERE TABLE_NAME ='."'". $tabela['TABLE_NAME']."'");
                $result2 = $query3->fetchAll();
                    foreach ($result2 as $coluna)
                    {
                        echo($coluna["COLUMN_NAME"] ." <b>KEY TYPE: </b> <i>". $coluna["CONSTRAINT_NAME"]."</i> \n <br/>");
                    }
                 ?></td>
            </tr>
            <?php
               }
            ?>
        </table>
    </form>
</body>
</html>
<?php
echo "Número de tabelas : " . $numtables . "<br/>";

?>