<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
$now = getdate(); 
    echo $namhientai = $now["year"]; 
 
?>
<?php
for ($i=$namhientai; $i<=2031; $i++) { 
	echo "<option value='".$i."'>".$i."</option>";
}
?>
