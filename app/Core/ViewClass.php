<?php
/**
 * This file is part of the Chatomz PHP Framework package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author         Lela Ria Lestari
 * @copyright      Copyright (c) Lela Ria Lestari
 */

// -------------------------------------------------------------------------------------------------

namespace app\Core;

// -------------------------------------------------------------------------------------------------

class ViewClass
{

	// property Template
	private $admin 		= null;
	private $home 		= null;
	private $login 		= null;

	// directory
	private $dadmin 	= '../app/Views/Administrator';
	private $dhome 		= '../app/Views/Homepage';

	// property libraries
	private $bootstrap 	= bootstrap;
	private $chartjs 	= chartjs;
	private $fontawesome= fontawesome;
	private $jquery 	= jquery;
	private $fonts 		= fonts;
	private $phpfpdf 	= phpfpdf;
	private $popper 	= popper;

	public function getsetting($sistem,$nsistem)
	{
		switch ($sistem) {
			case 'admin':
				$this->admin 	= $nsistem;
				if ($this->admin != 'FALSE')
					self::dirAdmin();
				break;
			case 'home':
				$this->home 	= $nsistem;
				if ($this->home != 'FALSE')
					self::dirHome();
				break;
			case 'login':
				$this->login 	= $nsistem;
				if ($this->login != 'FALSE')
					self::themeLogin();
				break;
		}
	}

	public function statusLibrary()
	{
		if ($this->bootstrap == FALSE) {
			$folder = 'bootstrap4.1';
			self::droplibrary($folder);
		}
		if ($this->chartjs == FALSE) {
			$folder = 'chartjs';
			self::droplibrary($folder);
		}
		if ($this->fontawesome == FALSE) {
			$folder = 'font-awesome5';
			self::droplibrary($folder);
		}
		if ($this->jquery == FALSE) {
			$folder = 'j-query';
			self::droplibrary($folder);
		}
		if ($this->fonts == FALSE) {
			$folder = 'fonts';
			self::droplibrary($folder);
		}
		if ($this->phpfpdf == FALSE) {
			$folder = 'phpfpdf';
			self::droplibrary($folder);
		}
		if ($this->popper == FALSE) {
			$folder = 'popper';
			self::droplibrary($folder);
		}
	}

	public function dropLibrary($folder)
	{
		if (is_dir($folder)) {
			$dir = scandir($folder);
				foreach ($dir as $row) {
					if ($row != '.' AND $row != '..') {
					$path = $folder . '/' .$row;
						if (is_dir($path)) {
							$subdir = scandir($path);
							if (count($subdir) != 2) {
								for ($i=2; $i < count($subdir); $i++) { 
									unlink($path. '/' . $subdir[$i]);
								}
							}
							rmdir($path);
						}else
							unlink($path);
					}
				}
			rmdir($folder);	
		}
	}

	public function dirAdmin()
	{
		if (is_dir($this->dadmin) == null) {
			mkdir($this->dadmin);
		}
		self::themeAdmin();
	}


	public function dirHome()
	{
		if (is_dir($this->dhome) == null) {
			mkdir($this->dhome);
		}
		self::themeHome();
	}

	public function themeLogin()
	{
		$this->login 	= strtolower($this->login);
		$linksource 	= '../app/Theme/login/login_' . $this->login . '.php';
		$linkdesti 		= '../app/Views/login_' . $this->login . '.php';
		if (file_exists($linksource)) {
			if (!file_exists($linkdesti))
				copy($linksource, $linkdesti);
			else
				notif('Template Login Sudah ada','config');
		} else
			warning('Cek Kembali Konfigurasi Login Theme','config.php');
	}

	public function themeAdmin()
	{
		$linksourceh 	= '../app/Theme/admin/header_' . $this->admin . '.php';
		$linksourcef 	= '../app/Theme/admin/footer_' . $this->admin . '.php';
		$linkdestih 	= $this->dadmin . '/header_' . $this->admin . '.php';
		$linkdestif 	= $this->dadmin . '/footer_' . $this->admin . '.php';

		self::cektheme($linksourceh, $linksourcef, $linkdestih, $linkdestif);
	}

	public function themeHome()
	{
		$linksourceh 	= '../app/Theme/homepage/header_' . $this->home . '.php';
		$linksourcef 	= '../app/Theme/homepage/footer_' . $this->home . '.php';
		$linkdestih 	= $this->dhome . '/header_' . $this->home . '.php';
		$linkdestif 	= $this->dhome . '/footer_' . $this->home . '.php';

		self::cektheme($linksourceh, $linksourcef, $linkdestih, $linkdestif);
	}

	public function cektheme($linksourceh, $linksourcef, $linkdestih, $linkdestif)
	{
		if (file_exists($linksourceh) AND file_exists($linksourcef)) {
			if (!file_exists($linkdestih) AND !file_exists($linkdestih)) {
				copy($linksourceh, $linkdestih);
				copy($linksourcef, $linkdestif);
			} else 
				notif('Template sudah ada','config');
		} else
			warning('Cek Kembali Konfigurasi Template');
	}
}