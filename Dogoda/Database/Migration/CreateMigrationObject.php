<?php


namespace Dogoda\Database\Migration;

use Dogoda\Reflection\PhpFileParser;
use function Composer\Autoload\includeFile;

/**
 * Class CreateMigrationObject
 * @package Dogoda\Database\Migration
 */
class CreateMigrationObject
{

    /**
     * @param string $file
     * @return mixed
     */
    public static function fromFile(string $file)
    {
        includeFile($file);
        $phpParser = new PhpFileParser();
        return $phpParser->getClassObjectFromFile($file);
    }
}
