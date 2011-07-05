<?php
class Financas_Forms_Login extends Zend_Form
{	
    public function init()
    {
        $this->setMethod('post');
        
        $email = $this->createElement('text','email',array('label' => 'Email', 'class' => 'input3'))->setRequired(true);
        $this->addElement($email);
        
        $password = $this->createElement('password','password',array('label' => 'senha', 'class' => 'input3'))->setRequired(true);
        $this->addElement($password);
        
        $submit = $this->createElement('submit','submit',array('label' => 'Autenticar'));
        $this->addElement($submit);
    }
}
