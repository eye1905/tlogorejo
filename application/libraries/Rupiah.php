<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rupiah {

	public function rupiah_kurs($value)
	{
		return 'Rp. '.strrev(implode('.',str_split(strrev(strval($value)),3))).',00';
	}
}