<?php
// +------------------------------------------------------------
// | Micro Framework
// +------------------------------------------------------------
// | Source: https://github.com/jasonweicn/MicroFramework
// +------------------------------------------------------------
// | Author: Jason.wei <jasonwei06@hotmail.com>
// +------------------------------------------------------------

class Autoloader
{
    /**
     * Autoloader Instance
     * 
     * @var Autoloader
     */
    protected static $_instance;
    
    /**
     * 获取实例
     * 
     */
    public static function getInstance()
    {
        if (self::$_instance === null) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }
    
    /**
     * 构造
     * 
     */
    protected function __construct()
    {
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }
    
    /**
     * 自动载入
     * 
     * @param string $className
     */
    public function autoload($className)
    {
        $file = MICRO_PATH . DIRECTORY_SEPARATOR . 'Library' . DIRECTORY_SEPARATOR . $className . '.php';
        if (file_exists($file)) {
            include_once($file);
        } else {
            throw new Exception('Class ' . $className . ' not found.');
        }
    }
}