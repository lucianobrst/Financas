<?php

class Financas_Forms_Prospect extends Zend_Form {
       

    public function init() {

        $this->setMethod('post');

/*        // Id
        $id = $this->createElement('hidden', 'id');
        $this->addElement($id);
*/
        // Ativo
        $ativo = $this->createElement('checkbox', 'ativo')
                 ->setLabel('Ativo:')
                 ->setCheckedValue('Y')
                 ->setUncheckedValue('N');
                $this->addElement($ativo);
        
        // Cliente
        $prospect = $this->createElement('checkbox', 'prospect')
                 ->setLabel('Cliente:')
                 ->setCheckedValue('Y')
                 ->setUncheckedValue('N');
                $this->addElement($prospect);
                                
        // Nome
        $nome = $this->createElement('text', 'nome', array('label' => 'Nome:', 'class' => 'input-g'))
                ->setRequired(true)
                ->addValidator('StringLength', false, array(4,255));
        $this->addElement($nome);

        // Cpf-Cnpj
        $sobrenome = $this->createElement('text', 'cpf_cnpj', array('label' => 'Cpf/Cnpj:', 'class' => 'input-m'))
                ->setRequired(true)
                ->addValidator('StringLength', false, array(14,18));
        $this->addElement($sobrenome);
        
        // CEP
        $cep = $this->createElement('text', 'cep', array('label' => 'Cep:', 'class' => 'input-m'))
                ->addValidator('StringLength', false, array(0,11));
        $this->addElement($cep);

        // Logradouro
        $logradouro = $this->createElement('text', 'logradouro', array('label' => 'Logradouro:', 'class' => 'input-m'))
                ->addValidator('StringLength', false, array(0,255));
        $this->addElement($logradouro);

        // Numero
        $numero = $this->createElement('text', 'numero', array('label' => 'Número:', 'class' => 'input-m'))
                ->addValidator('StringLength', false, array(0,10));
        $this->addElement($numero);
        
        // Complemento
        $complemento = $this->createElement('text', 'complemento', array('label' => 'Complemento:', 'class' => 'input-m'))
                ->addValidator('StringLength', false, array(0,100));
        $this->addElement($complemento);

        // Bairro
        $bairro = $this->createElement('text', 'bairro', array('label' => 'Bairro:', 'class' => 'input-m'))
                ->addValidator('StringLength', false, array(0,255));
        $this->addElement($bairro);

        // Cidade
        $cidade = $this->createElement('text', 'cidade', array('label' => 'Cidade:', 'class' => 'input-m'))
                ->addValidator('StringLength', false, array(0,255));
        $this->addElement($cidade);

        // UF
        $uf = array('AC' => 'AC', 'AL' => 'AL', 'AM' => 'AM', 'AP' => 'AP','BA' => 'BA', 'CE' => 'CE', 'DF' => 'DF',
                    'ES' => 'ES', 'GO' => 'GO', 'MA' => 'MA', 'MG' => 'MG', 'MS' => 'MS', 'MT' => 'MT', 'PA' => 'PA', 'PB' => 'PB',
                    'PE' => 'PE', 'PI' => 'PI', 'PR' => 'PR', 'RJ' => 'RJ', 'RN' => 'RN', 'RO' => 'RO', 'RR' => 'RR', 'RS' => 'RS',
                    'SC' => 'SC', 'SE' => 'SE', 'SP' => 'SP', 'TO' => 'TO');

        $ufSelect = $this->createElement('select','uf',array('label' => 'UF', 'style' => 'width:260px'));
        $ufSelect->addMultiOptions(array('' => ''));

        $ufSelect->addMultiOptions($uf);
        $this->addElement($ufSelect);


        // Ramo de atividade
        $ramo = $this->createElement('text', 'ramo_atividade', array('label' => 'Ramo de Atividade:', 'class' => 'input-g'))
                ->addValidator('StringLength', false, array(0,255));
        $this->addElement($ramo);        

        // E-mail
        $email = $this->createElement('text', 'email', array('label' => 'Email:', 'class' => 'input-g'))
                ->setRequired(true)
                ->addValidator("EmailAddress");
        $this->addElement($email);            

        // telefone_residencial
        $telres = $this->createElement('text', 'telefone_residencial', array('label' => 'Telefone Residencial:', 'class' => 'input-m'))
                ->addValidator('StringLength', false, array(0,20));
        $this->addElement($telres);

        // telefone_comercial
        $telcom = $this->createElement('text', 'telefone_comercial', array('label' => 'Telefone Comercial:', 'class' => 'input-m'))
                ->setRequired(true)
                ->addValidator('StringLength', false, array(8,20));
        $this->addElement($telcom);
    
        // telefone_celular
        $telcel = $this->createElement('text', 'telefone_celular', array('label' => 'Telefone Celular:', 'class' => 'input-m'))
                ->addValidator('StringLength', false, array(0,20));
        $this->addElement($telcel);

        // telefone_fax
        $telfax = $this->createElement('text', 'telefone_fax', array('label' => 'Fax:', 'class' => 'input-m'))
                ->addValidator('StringLength', false, array(0,20));
        $this->addElement($telfax);

        // home_page
        $page = $this->createElement('text', 'home_page', array('label' => 'Home Page:', 'class' => 'input-m'))
                ->addValidator('StringLength', false, array(0,100));
        $this->addElement($page);

        // responsavel
        $responsavel = $this->createElement('text', 'responsavel', array('label' => 'Responsavel:', 'class' => 'input-m'))
                ->addValidator('StringLength', false, array(0,100));
        $this->addElement($responsavel);

        // contato
        $contato = $this->createElement('text', 'contato', array('label' => 'Contato:', 'class' => 'input-m'))
                ->addValidator('StringLength', false, array(0,100));
        $this->addElement($contato);

        // contato_telefone
        $contatofone = $this->createElement('text', 'contato_telefone', array('label' => 'Telefone do Contato:', 'class' => 'input-p'))
                ->addValidator('StringLength', false, array(0,20));
        $this->addElement($contatofone);

        // Estrelas
        $estrelas = $this->createElement('text', 'estrelas', array('label' => 'Estrelas:', 'class' => 'input-p'))
        		->setRequired(true)
                ->addValidator('StringLength', false, array(0,1));
        $this->addElement($estrelas);

        // potencial
        $potencial = $this->createElement('text', 'indice_potencial', array('label' => 'Potêncial:', 'class' => 'iput-p'))
        		->setRequired(true)
                ->addValidator('StringLength', false, array(0,1));
        $this->addElement($potencial);

        // lucro_estimado
        $lucro = $this->createElement('text', 'lucro_estimado', array('label' => 'Lucro Estimado:', 'class' => 'input-p'))
        		->setRequired(true)
                ->addValidator('StringLength', false, array(0,11));
        $this->addElement($lucro);
        
        $submit = $this->createElement('submit', 'submit', array('label' => 'Salvar', 'class' => 'buttom'));
        $this->addElement($submit);
    }
}
