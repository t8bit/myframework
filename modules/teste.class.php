<?php
class teste extends db{
function __construct(){
$this->connect();
}
function get_all(){
$query='SELECT * FROM teste';
$data=$this->get($query);
return $data;}
function get_one($id){}
function get_filter($filter,$value){}
function delete($id){}
function update(){}
}
?>