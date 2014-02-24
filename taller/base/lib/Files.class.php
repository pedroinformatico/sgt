<?php
/**
 * Files
 *
 * Clase generica que contiene metodos estaticos para manipular archivos.
 *
 * Sinopsis:
 * <code>
 * $buffer = Files::readSingleFile($pathArchivo);
 * </code>
 *
 * @package     _core
 * @subpackage  altavoz
 * @author      CVI/YCC <desarrollo@altavoz.net>
 * @version     1.0.2
 * 1.0.0 - 01/11/2008 - CVI - Primera version<br>
 * 1.0.1 - 27/11/2008 - YCC - Agrega documentacion estilo phpdoc
 * 1.0.2 - 17/10/2009 - JBJ - Se agregan funciones para busqueda de directorios y archivos recursivamente
 * 
 *
 */
class Files {

    /**
     * readSingleFile()
     * Lee completo un archivo de disco.
     *
     * @param string $file Path del archivo a leer.
     * @return string con buffer leido.
     */
    public static function readSingleFile($file) {

        if (file_exists($file) && filesize($file)>0) {
            $fh = fopen($file, 'r');
            $buffer = fread($fh, filesize($file));
            fclose($fh);
            return $buffer;
        } else {
            return '';
        };
    }

    /**
     * writeSingleFile()
     * Escribe un archivo a disco.
     *
     * @param string $file Path del archivo a escribir.
     * @param string $buffer Contenido del archivo a escribir.
     * @return void
     */
    public static function writeSingleFile($file, $buffer) {

        if ($fh = fopen($file, 'w')) {
            fwrite($fh, $buffer);
            fclose($fh);
            return true;
        } else {
            return false;
        }
    }

    /**
     * deleteSingleFile()
     * Elimina un archivo de disco.
     *
     * @param string $filePath Path del archivo a eliminar.
     * @return void
     */
    public static function deleteSingleFile($filePath) {

        if (file_exists($filePath)) { // no distingue archivos de directorios, solo si la ruta existe o no.
            if (!is_dir($filePath)) {
                if ($fh = fopen($filePath, 'w')) {
                    fclose($fh);
                    unlink($filePath);
                    return true;
                }/* else {
                    // en caso que se requiera funcionamiento particular
                    //mensaje('No puede eliminarse el archivo ' . $file_name);
                    return false;
                }*/
            }
        }
        return false;
    }

    /**
     * getRecursiveDirectoriesByPath()
     * Devuelve un arreglo con los directorios encontrados con el nombre del directorio filtro.
     * En caso que el parametro $filtroDir sea falso retorna todos los directorios dentro.
     * Nota: NO cambiar el nombre de la funcion, pues  es recursiva y se autoinvoca
     *
     * @param string $ruta Path dentro que se va buscar directorios. DEBE contener / final.
     * @param string $filtroDir Nombre del directorio a buscar
     * @return array Arreglo con nombre de los directorios encontrados.
     */
    public static function getRecursiveDirectoriesByPath($ruta, $filtroDir) {

        $result = array();
        $resultTemp = array();
        // abrir un directorio y listarlo recursivo
        if (is_dir($ruta)) {
            if ($dh = opendir($ruta)) {
                while (($file = readdir($dh)) !== false) { // obtiene contenido completo del directorio (sin subdirectorios)
                    //esta linea se utilizaria si se quiere listar todo lo que hay en el directorio
                    //mostraria tanto archivos como directorios
                    //echo "<br>Nombre de archivo: $file : Es un: " . filetype($ruta . $file);
                    if (is_dir($ruta . $file) && $file != '.' && $file != '..') {
                        //solo si el archivo es un directorio, distinto que '.' y '..'
                        //echo "<br>Directorio: $ruta$file";

                        if ($filtroDir != false) {
                            if (basename($ruta . $file) == $filtroDir) {
                                //echo "<br>Directorio: $ruta$file";
                                array_push($result, $ruta . $file);
                                //print(dirname($ruta));
                            }
                        } else {
                            array_push($result, $ruta . $file);
                        }

                        //Acumula en arreglo
                        $resultTemp =Files::getRecursiveDirectoriesByPath($ruta . $file . '/', $filtroDir);
                       
                        if (is_array($resultTemp)) {
                            if (count($resultTemp) >= 1) {
                              $result = array_merge($result, $resultTemp);
                            }
                        }
                    }
                }
                closedir($dh);
            }
        }
        return $result;
    } 
    
    
    /**
     * getFilesFromDirectory()
     * Devuelve un arreglo con los archivos encontrados con ruta relativa.
     *
     * @param string $path  Path dentro que se va buscar directorios
     * @param boolean $returnFullPath  Boolean para indicar si a los archivos encontrados se retorna con la ruta completa o solo en nombre del archivo 
     * @return array Arreglo con nombre de los archivos
     */
    public static  function getFilesFromDirectory($path, $returnFullPath = false) {

        $result = array();
        if ($handle = opendir($path)) {
            while (false !== ($file = readdir($handle))) {
                if ($file != '.' && $file != '..') {
                    if (is_file($path . '/' . $file)) {
                        if ($returnFullPath) {
                            array_push($result, $path . '/' . $file);
                        } else {
                            array_push($result, $file);
                        }
                    }
                }
            }
            closedir($handle);
        }
        return $result;
    }

}

?>