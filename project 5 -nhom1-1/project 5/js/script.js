$(document).ready(function(){
	$("#trip1").click(function(){
		$.ajax({
			url:'function/form1.php',
			type: 'GET',
			dataType:'html',
		})
		.done(function(dulieu){
			$("#ngayve").html(dulieu)
		})
		$("#form").css("height","380px");
	});
	$("#trip0").click(function(){
		$.ajax({
			url:'function/form0.php',
			type: 'GET',
			dataType:'html',
		})
		.done(function(dulieu){
			$("#ngayve").html(dulieu)
		})
		$("#form").css("height","320px");
	});
	$("select[name='noi-di']").show(function(){
		$.ajax({
			url:'function/noi-di.php',
			type: 'GET',
			dataType:'html',
		})
		.done(function(dulieu){
			$("select[name='noi-di']").html(dulieu)
		})
	});
	$("select[name='noi-den']").show(function(){
		$.ajax({
			url:'function/noi-den.php',
			type: 'GET',
			dataType:'html',
		})
		.done(function(dulieu){
			$("select[name='noi-den']").html(dulieu)
		})
	});
	$("select[name='ngay-di']").show( function(){
		$.ajax({
			url:'function/ngay-di.php',
			type: 'GET',
			dataType:'html',
		})
		.done(function(dulieu){
			$("select[name='ngay-di']").html(dulieu)
		})
	});
	$("select[name='thang-di']").show( function(){
		$.ajax({
			url:'function/thang-di.php',
			type: 'GET',
			dataType:'html',
		})
		.done(function(dulieu){
			$("select[name='thang-di']").html(dulieu)
		})
	});
	$("select[name='nam-di']").show( function(){
		$.ajax({
			url:'function/nam-di.php',
			type: 'GET',
			dataType:'html',
		})
		.done(function(dulieu){
			$("select[name='nam-di']").html(dulieu)
		})
	});
	$("#x").click(function(){
		$("#form1").hide();
	});
	$(".dang-nhap").click(function(){
		$("#form1").show(300);
		$("#form2").hide();
		$("#form3").hide();
	});
	$("#x1").click(function(){
		$("#form2").hide();
	});
	$(".dang-ky").click(function(){
		$("#form2").show(300);
		$("#form1").hide();
		$("#form3").hide();
	});
	$("#x2").click(function(){
		$("#form3").hide();
	});
	$(".quen-mat-khau").click(function(){
		$("#form3").show(300);
		$("#form1").hide();
		$("#form2").hide();
	});
	var today = new Date().toISOString().split('T')[0];
	document.getElementsByName("setTodaysDate")[0].setAttribute('min', today);
	$(".tim").click(function(){
		$(".timnhanh").slideToggle();
	});
	$("a[name='quan-ly-thanh-vien']").click(function(){
		$.ajax({
			url:'function/quan-ly-thanh-vien.php',
			type: 'GET',
			dataType:'html',
		})
		.done(function(dulieu){
			$("#hienthi").html(dulieu)
		})
	});
	$("a[name='quan-ly-chuyen-xe']").click(function(){
		$.ajax({
			url:'function/quan-ly-chuyen-xe.php',
			type: 'GET',
			dataType:'html',
		})
		.done(function(dulieu){
			$("#hienthi").html(dulieu)
		})
	});
	$("a[name='quan-ly-xe']").click(function(){
		$.ajax({
			url:'function/quan-ly-xe.php',
			type: 'GET',
			dataType:'html',
		})
		.done(function(dulieu){
			$("#hienthi").html(dulieu)
		})
	});
	$("a[name='quan-ly-tai-xe']").click(function(){
		$.ajax({
			url:'function/quan-ly-tai-xe.php',
			type: 'GET',
			dataType:'html',
		})
		.done(function(dulieu){
			$("#hienthi").html(dulieu)
		})
	});
	$("a[name='quan-ly-don-hang']").click(function(){
		$.ajax({
			url:'function/quan-ly-don-hang.php',
			type: 'GET',
			dataType:'html',
		})
		.done(function(dulieu){
			$("#hienthi").html(dulieu)
		})
	});
});
