 <?php 
//include "../includes_admin/dbcon.php";
//include ("../seguridad.php");
//if($rol !='0'){
//header("location: logout.php");
//  exit();
//}

$dbhost="localhost";
$dbname = "noconven_tienda";
$dbuser="noconven_xu2qs5";
$dbpass="Javierto1";
$conexion = mysql_connect($dbhost,$dbuser,$dbpass);

if(! $conexion ) {
      die('Could not connect: ' . mysql_error());
   }
/*
$backupFile = $dbname . date("Y-m-d-H-i-s") . '.sql.gz';
$command = "mysqldump -u $dbuser --password=$dbpass $dbname | gzip > $backupFile";
$result = passthru($command);
//passthru($command, $output);

if(empty($result) == true) {
    echo "success";
} else {
    echo "failure";
}*/
$dumpfile = $dbname . "_" . date("Y-m-d_H-i-s") . ".sql";
system("mysqldump --opt -h $dbhost -u $dbuser -p $dbpass $dbname | gzip > ".$dumpfile);
// report - disable with // if not needed
// must look like "-- Dump completed on ..." 

echo "$dumpfile ";
?>
