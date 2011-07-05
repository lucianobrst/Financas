<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    protected function _initAutoloader() {
        $autoloader = Zend_Loader_Autoloader::getInstance();
        $autoloader->registerNamespace('Financas');
        return $autoloader;
    }
    
    protected function _initViews() {
        $this->bootstrap('view');
        $view = $this->getResource('view');
        $view->doctype('XHTML1_TRANSITIONAL');
        Zend_Registry::set('view', $view);
        
        $view->headTitle()->setSeparator(' - ')->headTitle('Brasil Sistemas e tecnologia');
        $view->headMeta()->appendHttpEquiv('Content-type', 'text/html;charset=utf-8');
        $view->headMeta()->appendName('keywords', 'financeiro, brasil sistemas, finançasbr, finanças, financeiro on-line, financeiro web, safra, balança eletrônica, corretora de cereais, sistema safra');
        $view->headMeta()->appendName('description', 'O Finanças BR é um sistema de gerenciamento financeiro mais eficiente da web');
        $view->headMeta()->appendName('application-name', 'Brasil Sistemas');
        $view->headMeta()->appendName('robots', 'ALL');   
         
    }
    
    protected function _initConfig() {
        $this->bootstrap('view');
        $view = $this->getResource('view');
        
        $this->bootstrap('frontController');
        $frontController = $this->getResource('frontController');
        
        $this->bootstrap('translate');
        $translate = $this->getResource('traslate');
        
        $config = new Zend_Config_Ini(APPLICATION_PATH . '/configs/application.ini', APPLICATION_ENV);
        
        Zend_Registry::set('config', $config);
        Zend_Registry::set('view', $view);
        Zend_Registry::set('frontController', $frontController);
        Zend_Registry::set('translate', $translate);
        Zend_Registry::set('perPage', 10);
    }
    
    protected function _initPlugins() {
        $bootstrap = $this->getApplication(); 
        
        if ($bootstrap instanceof Zend_Application) {
            $bootstrap = $this;
        } 
        
        $bootstrap->bootstrap('FrontController'); 
        
        $front = $bootstrap->getResource('FrontController');
        $front->registerPlugin(new Financas_Plugins_Layout());
//        $front->registerPlugin(new Financas_Plugins_CheckAuth());
//        $front->registerPlugin(new Financas_Plugins_Logger());
    }

}

