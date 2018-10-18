<?php

namespace App;

use Sober\Controller\Controller;

class PageTemplateJobb extends Controller
{
	public function sommerjobbQuery() {
		return array('post_type' => 'jobb', 'post_per_page' => -1);
	}
	public function sommerjobb() {
		echo "Nei";
		return "hei";
	}
}
