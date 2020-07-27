<?php if(!defined('BASEPATH')) exit('No direct script access allowed'); 
    class Tanggal {
        function to_indonesia($tanggal){
            setlocale(LC_ALL, 'id-ID', 'id_ID');
            return strftime("%A, %d %B %Y", strtotime($tanggal));
        } 
    }
?>