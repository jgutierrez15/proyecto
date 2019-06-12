<?php

function con(){
	
	return new mysqli("localhost","talbacco_alexand","Admin2019","talbacco_dragon");;
}

//("localhost","talbacco_alexand","Admin2019","talbacco_dragon");



function insert_comentario($nombre,$usuario,$noticia){
	$con = con();
	$con->query("insert into comentario (comentario,created_at,codigo_usuario,cod_noticia) value 
	(\"$nombre\",NOW(),\"$usuario\",\"$noticia\")");
}

function insert_sld_principal($nombre,$folder,$image){
	$con = con();
	$con->query("insert into sld_principal (nom_sld_principal,folder,src,created_at) value 
	(\"$nombre\",\"$folder\",\"$image\",NOW())");
}
function insert_admin($usuario,$pass,$nombre,$dni,$celular,$tipo,$folder,$image){
	$con = con();
	$con->query("insert into users (user, pass,nom_user,dni,celular,id_tipo_user,folder,src,created_at) value 
	(\"$usuario\",\"$pass\",\"$nombre\",\"$dni\",\"$celular\",\"$tipo\",\"$folder\",\"$image\",NOW())");
}
function insert_noticia($nombre,$contenido,$folder,$image){
	$con = con();
	$con->query("insert into noticias (nom_noticia, contenido_noticia,folder,src,created_at) value 
	(\"$nombre\",\"$contenido\",\"$folder\",\"$image\",NOW())");
}
function insert_categoria($nombre){
	$con = con();
	$con->query("insert into categoria (nombre,created_at) value 
	(\"$nombre\",NOW())");
}
function insert_producto($nombre,$precio,$precio_desc,$des,$stock,$folder,$src,$idcategoria){
	$con = con();
	$con->query("insert into products (name,price,price_old,description,stock,folder,src,id_categoria,created) value 
	(\"$nombre\",\"$precio\",\"$precio_desc\",\"$des\",\"$stock\",\"$folder\",\"$src\",\"$idcategoria\",NOW())");
}
function get_productos(){
	$images = array();
	$con = con();
	$query=$con->query("SELECT * FROM products ORDER BY id DESC LIMIT 10");
	while($r=$query->fetch_object()){
		$images[] = $r;
	}
	return $images;
}


function get_producto($id){
	$image = null;
	$con = con();
	$query=$con->query("select * from products where id=$id ");
	while($r=$query->fetch_object()){
		$image = $r;
	}
	return $image;
}

function del_producto($id){
	$con = con();
	$con->query("delete from products where id=$id");
}

/* footer*/
function get_footers(){
	$images = array();
	$con = con();
	$query=$con->query("select * from footer  order by id_footer desc");
	while($r=$query->fetch_object()){
		$images[] = $r;
	}
	return $images;
}
function get_pedidos(){
	$images = array();
	$con = con();
	$query=$con->query("select * from pedidos  order by created_at desc");
	while($r=$query->fetch_object()){
		$images[] = $r;
	}
	return $images;
}

function get_categorias(){
	$images = array();
	$con = con();
	$query=$con->query("select * from categoria order by  id_categoria");
	while($r=$query->fetch_object()){
		$images[] = $r;
	}
	return $images;
}
function get_categoriasXProductos(){
	$images = array();
	$con = con();
	$query=$con->query("select * from categoria order by  id_categoria");
	while($r=$query->fetch_object()){
		$images[] = $r;
	}
	return $images;
}
function get_categoria($id){
	$image = null;
	$con = con();
	$query=$con->query("select * from categoria where id_categoria=$id ");
	while($r=$query->fetch_object()){
		$image = $r;
	}
	return $image;
}

function del_categoria($id){
	$con = con();
	$con->query("delete from categoria where id_categoria=$id");
}
/* Slider */

function get_comentarios($idpub){
	$images = array();
	$con = con();
	$query=$con->query("select *,u.src from comentario c inner join users u on c.codigo_usuario=u.codigo_user inner join noticias nr on c.cod_noticia=nr.cod_noticia where c.cod_noticia=$idpub order by c.id_comentario desc");
	while($r=$query->fetch_object()){
		$images[] = $r;
	}
	return $images;
}
function get_sliders(){
	$images = array();
	$con = con();
	$query=$con->query("select * from sld_principal  order by created_at desc");
	while($r=$query->fetch_object()){
		$images[] = $r;
	}
	return $images;
}


function get_slider_principal($id){
	$image = null;
	$con = con();
	$query=$con->query("select * from sld_principal where id_sld_principal=$id ");
	while($r=$query->fetch_object()){
		$image = $r;
	}
	return $image;
}

function del_slider_principal($id){
	$con = con();
	$con->query("delete from sld_principal where id_sld_principal=$id");
}


function get_sec_encabezados(){
	$images = array();
	$con = con();
	$query=$con->query("select * from sec_encabezado  order by order_enc");
	while($r=$query->fetch_object()){
		$images[] = $r;
	}
	return $images;
}
function get_noticias(){
	$images = array();
	$con = con();
	$query=$con->query("select * from noticias  order by cod_noticia desc");
	while($r=$query->fetch_object()){
		$images[] = $r;
	}
	return $images;
}
function get_estados(){
	$images = array();
	$con = con();
	$query=$con->query("select * from estado_pedido  order by nombre_estado desc");
	while($r=$query->fetch_object()){
		$images[] = $r;
	}
	return $images;
}
function get_noticia($id){
	$image = null;
	$con = con();
	$query=$con->query("select * from noticias where cod_noticia=$id ");
	while($r=$query->fetch_object()){
		$image = $r;
	}
	return $image;
}

function del_noticia($id){
	$con = con();
	$con->query("delete from noticias where cod_noticia=$id");
}
/**---------------------------------------------------------- */
function get_usuarios(){
	$images = array();
	$con = con();
	$query=$con->query("select u.*,t.nom_tipo_user  from users as u inner join tipo_user as t on u.id_tipo_user=t.id_tipo_user where u.id_tipo_user=1 order by u.created_at");
	while($r=$query->fetch_object()){
		$images[] = $r;
	}
	return $images;
}
function get_usuario($id){
	$image = null;
	$con = con();
	$query=$con->query("select * from users where codigo_user=$id");
	while($r=$query->fetch_object()){
		$image = $r;
	}
	return $image;
}

function del_usuario($id){
	$con = con();
	$con->query("delete from users where codigo_user=$id");
}

function get_comentario($id){
	$image = null;
	$con = con();
	$query=$con->query("select * from comentario where id_comentario=$id");
	while($r=$query->fetch_object()){
		$image = $r;
	}
	return $image;
}

function del_comentario($id){
	$con = con();
	$con->query("delete from comentario where id_comentario=$id");
}




?>