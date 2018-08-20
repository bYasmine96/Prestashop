<?php
/**
 * 
 */

//PHP works with name attributes

class commentproduct extends Module 
{
	
	function __construct()
	{
		$this->name = 'commentproduct';
        $this->tab = 'front_office_features';
        $this->version = 1.1;
		$this->author = 'Yasmine boudjeli';

        $this->bootstrap = true;
		parent::__construct();	

		$this->displayName = $this->l('Comment product');
        $this->description = $this->l('Comment et rate different products.');
    
	}

	public function getContent(){
		$this->processConfiguration();
		return $this->display(__FILE__,'getContent.tpl');
	}

	public function processConfiguration(){
		if(Tools::isSubmit('submit_mymodcomments_form'))// Vérification que le formulaire  a bien été envoyé
		{
			$enable_grades=Tools::getValue('enable_grades');
			$enable_comments=Tools::getValue('enable_comments');
			Configuration::updateValue('GRADES','$enable_grades');
			Configuration::updateValue('COMMENTS','$enable_comments');
			$this->context->smarty->assign('confirmation','ok');
		}

	}

	public function install(){//Enregistrement du hook pour qu'il soit utilisable
		parent::install();
		$this->registerHook('hookDisplayProductTabContent');// Elle a besoin d'un ID du module
		return true;
	}

	public function hookDisplayProductTabContent()
}