<?php

class Financas_Forms_User extends Zend_Form {
    public function init() {
        $this->setMethod('post');
        
        // Id
        $id = $this->createElement('hidden', 'id');
        $this->addElement($id);
        
        // Nome
        $nome = $this->createElement('text', 'nome', array('label' => 'Nome:', 'class' => 'input-g'))
                ->setRequired(true)
                ->addValidator('StringLength', false, array(4));
        $this->addElement($nome);
        
        // Sobrenome
        $sobrenome = $this->createElement('text', 'sobrenome', array('label' => 'Sobrenome:', 'class' => 'input-g'))
                ->setRequired(true)
                ->addValidator('StringLength', false, array(4));
        $this->addElement($sobrenome);
        
        // E-mail
        $email = $this->createElement('text', 'email', array('label' => 'Email:', 'class' => 'input-g', 'autocomplete' => 'off'))
                ->setRequired(true)
                ->addValidator('EmailAddress');
        $this->addElement($email);
        
        // Senha
        $senha = $this->createElement('password', 'senha', array('label' => 'Senha:', 'class' => 'input-m', 'autocomplete' => 'off'))
                ->setRequired(true)
                ->addValidator('StringLength', false, array(6, 20));
        $this->addElement($senha);
        
        // Grupo
        $grupos = new Application_Model_Grupos();
        $gruposSelect = $this->createElement('select','grupos_id',array('label' => 'Grupo', 'style' => 'width:260px'))->setRequired(true);
        $gruposSelect->addMultiOptions(array('' => ''));
        $gruposSelect->addMultiOptions($grupos->fetchPair());
        $this->addElement($gruposSelect);
        
        // Ativo
        $ativo = $this->createElement('checkbox', 'ativo')
                 ->setLabel('Ativo:')
                 ->setCheckedValue('S')
                 ->setUncheckedValue('N');
        $this->addElement($ativo);
        
        $submit = $this->createElement('submit', 'submit', array('label' => 'Cadastrar', 'class' => 'buttom'));
        $this->addElement($submit);
    }
}
