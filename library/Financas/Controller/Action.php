<?php

/**
 * Description of Action
 *
 * @author wesleywillians
 */
abstract class Financas_Controller_Action extends Zend_Controller_Action {

    protected $data;

    public function init() {
        if ($this->_request->isPost())
            $this->data = $this->_request->getPost();

        if ($this->data['submit'])
            unset ($this->data['submit']);
    }

}