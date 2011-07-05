<?php

class Financas_Forms_Vendedor extends Zend_Form {
    
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
        $email = $this->createElement('text', 'email', array('label' => 'Email:', 'class' => 'input-g'))
            ->setRequired(true)
            ->addValidator("EmailAddress");
        $this->addElement($email);
        
        // CEP
        $cep = $this->createElement('text', 'cep', array('label' => 'Cep:', 'class' => 'input-m', 'maxlength' => 8))
            ->setRequired(true)
            ->addValidator('StringLength', false, array(8));
        $this->addElement($cep);
        
        // Logradouro
        $logradouro = $this->createElement('text', 'logradouro', array('label' => 'Logradouro:', 'class' => 'input-m'))
            ->setRequired(true);
        $this->addElement($logradouro);
        
        // Numero
        $numero = $this->createElement('text', 'numero', array('label' => 'Número:', 'class' => 'input-m'))
            ->setRequired(true);
        $this->addElement($numero);
        
        // Complemento
        $complemento = $this->createElement('text', 'complemento', array('label' => 'Complemento:', 'class' => 'input-m'))
            ->setRequired(false);
        $this->addElement($complemento);
        
        // Bairro
        $bairro = $this->createElement('text', 'bairro', array('label' => 'Bairro:', 'class' => 'input-m'))
            ->setRequired(true);
        $this->addElement($bairro);
        
        // Cidade
        $cidade = $this->createElement('text', 'cidade', array('label' => 'Cidade:', 'class' => 'input-m'))
            ->setRequired(true);
        $this->addElement($cidade);
        
        // UF
        $uf = array('AC' => 'AC', 'AL' => 'AL', 'AM' => 'AM', 'AP' => 'AP','BA' => 'BA', 'CE' => 'CE', 'DF' => 'DF', 
                    'ES' => 'ES', 'GO' => 'GO', 'MA' => 'MA', 'MG' => 'MG', 'MS' => 'MS', 'MT' => 'MT', 'PA' => 'PA', 'PB' => 'PB',
                    'PE' => 'PE', 'PI' => 'PI', 'PR' => 'PR', 'RJ' => 'RJ', 'RN' => 'RN', 'RO' => 'RO', 'RR' => 'RR', 'RS' => 'RS',
                    'SC' => 'SC', 'SE' => 'SE', 'SP' => 'SP', 'TO' => 'TO');
        
        $ufSelect = $this->createElement('select','uf',array('label' => 'UF', 'style' => 'width:260px'))->setRequired(true);
        $ufSelect->addMultiOptions(array('' => ''));
        
        $ufSelect->addMultiOptions($uf);
        $this->addElement($ufSelect);
        
        // Telefone_fixo
        $telfixo = $this->createElement('text', 'telefone_fixo', array('label' => 'Telefone Fixo:', 'class' => 'input-m'))
            ->setRequired(true);
        $this->addElement($telfixo);
    
        // Telefone_celular
        $telcel = $this->createElement('text', 'telefone_celular', array('label' => 'Telefone Celular:', 'class' => 'input-m'))
            ->setRequired(true);
        $this->addElement($telcel);
        
        // Grupo
        $grupos = new Application_Model_Grupos();
        $gruposSelect = $this->createElement('select','grupos_id',array('label' => 'Grupo', 'style' => 'width:260px'))->setRequired(true);
        $gruposSelect->addMultiOptions(array('' => ''));
        $gruposSelect->addMultiOptions($grupos->fetchPair());
        $this->addElement($gruposSelect);
        
        $submit = $this->createElement('submit', 'submit', array('label' => 'Cadastrar', 'class' => 'buttom'));
        $this->addElement($submit);
    }
}
