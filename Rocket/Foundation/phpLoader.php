<?php

/**
 * This file is part of the Voom Framework 
 */

declare(strict_types=1);

namespace Rocket\Foundation\Loaders;

//use Nette;
//use SplFileInfo;


/**
 * Voom auto loader is responsible for loading php files and functions.
 *
 * <code>
 * $loader = new Rocket\Foundation\Loaders\PhpLoader;
 * $loader->addDirectory('app');
 * $loader->excludeDirectory('app/exclude');
 * $loader->register();
 * </code>
 */
class PhpLoader
{
    //use Nette\SmartObject;

    private const RETRY_LIMIT = 3;

    /** @var string[] */
    public $ignoreDirs = ['.*', '*.old', '*.bak', '*.tmp', 'temp'];

    /** @var string[] */
    public $acceptFiles = ['*.php'];

    /** @var bool */
    private $autoRebuild = true;

    /** @var bool */
    private $reportParseErrors = true;

    /** @var string[] */
    private $scanPaths = [];

    /** @var string[] */
    private $excludeDirs = [];

    /** @var array of class => [file, time] */
    private $classes = [];

    /** @var bool */
    private $refreshed = false;

    /** @var array of missing classes */
    private $missing = [];

    /** @var string|null */
    private $tempDirectory;


    public function __construct()
    {
        if (!extension_loaded('tokenizer')) {
            throw new Exception('PHP extension Tokenizer is not loaded.');
        }
    }


    /**
     * Register autoloader.
     */
    public function register(bool $prepend = false): self
    {
        foreach (glob($this->scanPaths[0]."/*.php") as $file) {
            require_once($file);
        }
        return $this;
    }

    /**
     * Add path or paths to list.
     * @param  string  ...$paths  absolute path
     */
    public function addDirectory(...$paths): self
    {
        if (is_array($paths[0] ?? null)) {
            trigger_error(__METHOD__ . '() use variadics ...$paths to add an array of paths.', E_USER_WARNING);
            $paths = $paths[0];
        }
        $this->scanPaths = array_merge($this->scanPaths, $paths);
        return $this;
    }


    /**
     * Excludes path or paths from list.
     * @param  string  ...$paths  absolute path
     */
    public function excludeDirectory(...$paths): self
    {
        if (is_array($paths[0] ?? null)) {
            trigger_error(__METHOD__ . '() use variadics ...$paths to add an array of paths.', E_USER_WARNING);
            $paths = $paths[0];
        }
        $this->excludeDirs = array_merge($this->excludeDirs, $paths);
        return $this;
    }
}
