<?php
class Financas_Forms_Grupos extends Zend_Form
{
	public function init()
	{
	   
	   $this->setMethod('post');	 
		
	   $nome = $this->createElement('text','nome',array('label' => 'Grupo', 'class' => 'input5'))->setRequired(true);
	   $this->addElement($nome);
	   
	   $descricao = $this->createElement('textarea','descricao',array('label'=>'Descrição', 'style' => 'width=100px; height: 50px'))->setRequired(true);
	   $this->addElement($descricao);
	   
	   $submit = $this->createElement('submit','submit',array('label' => 'Salvar', 'class' => 'buttom'));
	   $this->addElement($submit);
	   
	   $botao = $this->createElement('button','voltar',array('label' => 'Voltar', 'class' => 'buttom botdir', 'onclick' => 'window.history.go(-1)'));
	   $this->addElement($botao);	   
	
	}
	
}