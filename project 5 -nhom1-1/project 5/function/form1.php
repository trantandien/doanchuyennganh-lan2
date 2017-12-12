<td><img width="20" align="center" src="image/calendar.png">Ngày về</td>
<td><input style="margin-left: -60px" name="setTodaysDate" type="date" value="<?php date_default_timezone_set('Asia/Ho_Chi_Minh');
        echo date('Y-m-d'); ?>">
        </td>
<script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="../js/script.js"></script>
<script>
$(document).ready(function(){
        $("select[name='ngay-ve']").show( function(){
                $.ajax({
                        url:'function/ngay-ve.php',
                        type: 'GET',
                        dataType:'html',
                })
                .done(function(dulieu){
                        $("select[name='ngay-ve']").html(dulieu)
                })
        });
        $("select[name='thang-ve']").show( function(){
                $.ajax({
                        url:'function/thang-ve.php',
                        type: 'GET',
                        dataType:'html',
                })
                .done(function(dulieu){
                        $("select[name='thang-ve']").html(dulieu)
                })
        });
        $("select[name='nam-ve']").show( function(){
                $.ajax({
                        url:'function/nam-ve.php',
                        type: 'GET',
                        dataType:'html',
                })
                .done(function(dulieu){
                        $("select[name='nam-ve']").html(dulieu)
                })
        });
});
</script>