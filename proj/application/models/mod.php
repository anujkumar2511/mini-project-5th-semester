<?php
class Mod extends CI_Model
{
	function query1($year,$top,$mf)
	{
		$sql="SELECT * from babytable where babytable.year='$year' and babytable.sex='$mf' order by freq desc limit $top";
		$res=$this->db->query($sql);
		return $res->result();
	}
	function query2($year, $name)
	{
		$sql="SELECT * from babytable where babytable.name='$name' and babytable.year>='$year' order by year asc";
		$res=$this->db->query($sql);
		return $res->result();
	}
}