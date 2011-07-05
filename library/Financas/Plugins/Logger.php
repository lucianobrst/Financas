<?php

class Financas_Plugins_Logger extends Zend_Controller_Plugin_Abstract {

    public function postDispatch(Zend_Controller_Request_Abstract $request) {
        $identity = Zend_Auth::getInstance()->setStorage(new Zend_Auth_Storage_Session('admin'))->getIdentity();
        
        if ($identity) {
            $user       = $identity->id;
            $module     = $request->getModuleName();
            $controller = $request->getControllerName();
            $action     = $request->getActionName();

            if ($controller != 'error' && $controller != 'styles') {
                $db = Zend_Db_Table::getDefaultAdapter();

                $columnMapping = array(
                    'users_id' => 'users_id',
                    'module' => 'module',
                    'controller' => 'controller',
                    'action' => 'action',
                    'created_at' => 'created_at'
                );

                $writerDb = new Zend_Log_Writer_Db($db, 'logger', $columnMapping);
                $logger   = new Zend_Log($writerDb);

                $logger->setEventItem('users_id', $user);
                $logger->setEventItem('module', $module);
                $logger->setEventItem('controller', $controller);
                $logger->setEventItem('action', $action);
                $logger->setEventItem('created_at', date('Y-m-d H:i:s'));

                $logger->info('Gravado em log');
            }
        }
    }
}
