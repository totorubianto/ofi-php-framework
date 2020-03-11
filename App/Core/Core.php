<?php
namespace App\Core;
class Core
{
    private $Url = null;
    private $Controller = '';
    private $Action = '';
    private $Params = [];

    public function run()
    {
        $this->getUrl();
        $this->getControllerActionParam();
        $this->execute();
    }
    public function getUrl()
    {
        $url = '/';
        if (isset($_GET['url']))
        {
            $url .= $_GET['url'];
        }
        $this->Url = $url;
    }
    public function getControllerActionParam()
    {
        if (!empty($this->Url) && $this->Url != '/')
        {
            $this->Url = explode('/', $this->Url);
            array_shift($this->Url);
            $this->Controller = $this->Url[0] . 'Controller';
            array_shift($this->Url);
        }
        else
        {
            $this->Url = array();
            $this->Controller = 'indexController';
        }
        $this->getAction();
        $this->getParams();
    }
    public function getAction()
    {
        $this->Action = 'index';
        if (isset($this->Url[0]) && !empty($this->Url[0]))
        {
            $this->Action = $this->Url[0];
        }

    }
    public function getParams()
    {
        if (count($this->Url) > 0)
        {
            $this->Params = $this->Url;
        }
    }
    public function execute()
    {
        $className = '\\APP\\Controllers\\' . $this->Controller;
        if (!class_exists($className))
        {
            (new \App\Controllers\errorController())->index();
        }
        $classNameController = new $className();
        call_user_func_array(array(
            $classNameController,
            $this->Action
        ) , $this->Params);
    }

}

