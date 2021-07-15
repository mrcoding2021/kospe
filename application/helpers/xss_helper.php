<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

function cetak($str)
{
  return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}
