<?php

namespace App;

use Sober\Controller\Controller;

class Jobbinnhold extends Controller
{

	public static function hovedklasse($postid) {
		$invertert = get_field('hvit_tekst', $postid);
		$klasse = "boks";
		if($invertert) {
			$klasse .= " boks--invertert";
		}
		return $klasse;
	}

	public static function stiler($postid){
		return 'style="background-color:'.get_field('bakgrunnsfarge', $postid) . ';"';
	}

	public static function soknadsfrist() {
		$dato = get_field('soknadsfrist');
		if(strtotime($dato) > strtotime("now"))
			return '<b>'.$dato.'</b>';
		return $dato;
	}
}
