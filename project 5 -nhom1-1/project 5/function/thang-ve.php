<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
$now = getdate(); 
    echo $thanghientai = $now["mon"]; 
 
?>
<?php
for ($i=$thanghientai; $i<=12; $i++) { 
	echo "<option value='".$i."'>".$i."</option>";
}
?>
