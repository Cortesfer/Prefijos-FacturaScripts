<?php
if (!function_exists('fs_documento_new_codigo')) {
    function fs_documento_new_codigo($tipodoc, $codejercicio, $codserie, $numero, $sufijo = '')
    {
        switch (FS_NEW_CODIGO) {
            case 'eneboo':
                return $codejercicio . str_pad($codserie, 2, '0', STR_PAD_LEFT) . str_pad($numero, 6, '0', STR_PAD_LEFT);
            case '0-NUM':
                return str_pad($numero, 12, '0', STR_PAD_LEFT);
            case 'NUM':
                return (string) $codserie . $numero;
            case 'SERIE-YY-0-NUM':
                return $codserie . substr($codejercicio, -2) . str_pad($numero, 12, '0', STR_PAD_LEFT);
            case 'SERIE-YY-0-NUM-CORTO':
                if (strlen((string) $numero) < 4) {
                    $numero = str_pad($numero, 4, '0', STR_PAD_LEFT);
                }
                return $codserie . substr($codejercicio, -2) . $numero;
        }
        /// TIPO + EJERCICIO + SERIE + NÚMERO
        return strtoupper(substr($tipodoc, 0, 3)) . $codejercicio . $codserie . $numero . $sufijo;
    }
}