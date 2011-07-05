<?php

class Financas_Plugins_CheckAuth extends Zend_Controller_Plugin_Abstract {

    public function dispatchLoopStartup(Zend_Controller_Request_Abstract $request) {
        $module = $request->getModuleName();
        $resource = $request->getControllerName();
        $action = $request->getActionName();
        
        if ($module == "default" &&  $resource <> 'index') {
            if (!Zend_Auth::getInstance()->setStorage(new Zend_Auth_Storage_Session('admin'))->hasIdentity()) {
                $request->setModuleName($module)
                        ->setControllerName('auth')
                        ->setActionName('index');
            }
        }
    }

}