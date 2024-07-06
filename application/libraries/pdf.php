<?php
if (!defined('BASEPATH')) exit(header('Location:../'));
require_once('vendor/tecnickcom/tcpdf/tcpdf.php');;


class Pdf extends TCPDF
{
    function __construct()
    {
        parent::__construct();
    }
}
