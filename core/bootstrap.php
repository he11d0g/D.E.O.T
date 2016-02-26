<?php
/**
 * Author: helldog
 * Email: im@helldog.net
 * Url: http://helldog.net
 */
namespace deot;

class Deot
{
    private static $app;
    private $config;

    /**
     * @return Deot
     */
    public static function init()
    {
        if(!self::$app){
            self::$app = new self;
        }

        return self::$app;
    }

    /**
     * @return mixed
     */
    public static function app()
    {
        return self::$app;
    }

    /**
     * @param $param string
     * @return mixed
     */
    public function getConfig($param)
    {
        return !isset($this->config[$param]) ?: $this->config[$param];
    }

    /**
     *
     */
    private function __construct()
    {
        $this->config = require_once ROOT_PATH . '/' . 'config.php';
        $this->loadModules();
        $this->loadProject();

    }

    private function loadModules()
    {

    }

    private function loadProject()
    {
        include_once ROOT_PATH . '/project/' . $this->getConfig('bootstrapProjectFile');
    }

}

Deot::init();