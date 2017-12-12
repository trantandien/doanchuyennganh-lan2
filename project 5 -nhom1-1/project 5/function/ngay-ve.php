<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
$now = getdate(); 
    echo $ngayhientai = $now["mday"]+1; 
 
?>
<?php
for ($i=$ngayhientai; $i<=31; $i++) { 
	echo "<option value='".$i."'>".$i."</option>";
}
?>
