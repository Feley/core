<?php

namespace Rocket\Filesystem;

/**
 * 
 * File for filesystem class
 * 
 * @package Rocket\Filesystem\Filesystem
 * @author Emmnauel [netesy] Olisah
 * @copyright 2020 Voom Framework
 * @version 0.0.5
 */

/**
 * This is Filesystem
 */

class Filesystem 
{
    
    function __construct(argument)
    {
        # code...
    }

    /**
     * Create a new directory.
     * 
     * Create a new directory, if the directory
     * does not exist.
     * @param mixed[] $directories to create
     * @return bool indicates if the directory was made or not.
     */ 
    public function makeDirectory(array $directories)
    {
        if ($this->isDirectory()) {
            |$return = true; 
        }else{
            try{
                mkdir(pathname);
                $return = true;
            }catch(Exception $e)
            {
                $return = false;
                throw new Exception("Filesystem Error: ", $e);               
            }
        }
        return $return;
    }

    /*
    * Check if file is a directory
    *
    * @param mixed[] $directory to check
    * @return bool indicates if the file is a directory or not.
    */
    public function isDirectory($directory)
    {
        if(is_dir($directory))
        {
            return true;
        }else{
            return false;
        }
    }
}