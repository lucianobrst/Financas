<?php
class Financas_Forms_Permissoes extends Zend_Form
{
	public function init()
	{
	   
	   $this->setMethod('post');	
		
	   $nome = $this->createElement('text','nome',array('label' => 'Permissão', 'class' => 'input5'))->setRequired(true);
	   $this->addElement($nome);
	   
	   //Grupos
	   $grupos = new Application_Model_Grupos();
	   $gruposSelect = $this->createElement('select','grupos_id',array('label' => 'Grupo', 'style' => 'width=150px'))->setRequired(true);
	   $gruposSelect->addMultiOptions(array('' => ''));
	   $gruposSelect->addMultiOptions($grupos->fetchPair());
	   $this->addElement($gruposSelect);
	   
	   $descricao = $this->createElement('textarea','descricao',array('label'=>'Descrição', 'style' => 'width=100px; height: 50px'))->setRequired(true);
	   $this->addElement($descricao);
	   
	   $submit = $this->createElement('submit','submit',array('label' => 'Salvar', 'class' => 'buttom'));
	   $this->addElement($submit);
	   
	   $botao = $this->createElement('button','voltar',array('label' => 'Voltar', 'class' => 'buttom botdir', 'onclick' => 'window.history.go(-1)'));
	   $this->addElement($botao);	   
	
	}
	
}