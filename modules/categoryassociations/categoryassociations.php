<?php
if (!defined('_PS_VERSION_')) {
  exit;
}
 
class categoryassociations extends Module
{
  public function __construct() {
    $this->name = 'categoryassociations';
    $this->tab = 'front_office_features';
    $this->version = '1.0.0';
    $this->author = 'MAMS BROS';
    $this->need_instance = 0;
    $this->ps_versions_compliancy = array('min' => '1.6', 'max' => _PS_VERSION_); 
    $this->bootstrap = true;
 
    parent::__construct();
 
    $this->displayName = $this->l('Category Associations');
    $this->description = $this->l('Associate products categories.');
 
    $this->confirmUninstall = $this->l('Are you sure you want to uninstall?');
 
  }

    public function install() {
      if (Shop::isFeatureActive()) {
        Shop::setContext(Shop::CONTEXT_ALL);
      }
     
      if (!parent::install() ||
        !$this->registerHook('leftColumn') ||
        !$this->registerHook('header') 
        
      ) {
        return false;
      }
     
      return true;
    }


    public function getContent()
    {
        if (Tools::isSubmit('submit'.$this->name) && $_SERVER['REQUEST_METHOD'] == 'POST')
        {
          $source = $_POST['check_list'] ; 
          $output = $this->select_ProductsOfCategories($source);  
          $pdesti = $_POST['catdest'];
          $this->insertionProductInCategory($output,$pdesti);     
        }
        $this->displayForm();
        return $output . $this->_html ;
    }


   public function displayForm() 
    {

       $sql = 'SELECT id_category,name FROM `ps_category_lang` WHERE `id_lang`= 2 ';
 
       $this->_html .= 
        '<form action="'.Tools::htmlentitiesUTF8($_SERVER['REQUEST_URI']).'" method="post"  enctype="multipart/form-data">
            <fieldset>
            <legend>'.$this->l('Category Associations').'</legend>    
            <p><strong>Veuillez selectionner les catégories souhaitées. </strong></p>              
                   <strong>Categories sources :</strong> <br/><br/>' ;

                   if ($result= Db::getInstance()->executeS($sql)) {
                        foreach ($result as  $row) {
                   $this->_html .=  '<span><input type="checkbox" name="check_list[]" value="'.$row['id_category'].'">' . $row['id_category']  . '  -   ' .$row['name'] . "&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  ". ' </span> ';
                          
      
                        }
                    }    

                  $this->_html .=   '<br/><br/> 

                   <p><strong>Veuillez choisir la cateogrie souhaitée.</strong></p>
                   <strong>Categorie Destination :</strong> <br/>  <br/>';

                   if ($result= Db::getInstance()->executeS($sql)) {
                        foreach ($result as  $row) {
                   $this->_html .=  '<span><input type="radio" name="catdest" value="'.$row['id_category'].'">'.  $row['id_category']  . '  -   ' .$row['name'] . "&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  ". '</span> ';
                          
                          }
                      }    

                    $this->_html .=  '  <br/> <br/><button id="popmodal" type="button" data-toggle="pop" data-target="#popup"   avalue="'.$this->l('Transferer').'"  > Submit </button>

                
                    
                              </fieldset>
                                <div   id="popup"  style="width: 33.333333%;
                    padding: 15px;
                    left: 0;
                    margin-left: 40.333333%;
                    border: 1px solid #ccc;
                    border-radius: 10px;
                    background: white;
                    position: absolute;
                    top: 30%;
                    box-shadow: 5px 5px 5px #000;
                    z-index: 10001;display:none;">
                    <p>This is the message</p>
                    <div  class="text-right">
                      <button id="annuler" class="btn btn-cancel">Annuler</button>
                      <input class="btn btn-primary" name="submit'.$this->name.'" type="submit" >
                    </div>
                  </div>
                          </form> <br/>

                  ' ;
    }
  


public function select_ProductsOfCategories($ids_categories){
              $tab_id_categories = $ids_categories;
              $out = "XXX";
              $tab_id_product = array();
              $db = Db::getInstance();

              for ($i= 0; $i < count($ids_categories); $i++) { 
                    //get product'us of each category and return ids
                    
                    $sqll='SELECT id_product FROM `ps_product` WHERE `id_category_default` ='.$tab_id_categories[$i] ;
                    $out .=  $tab_id_categories[$i];
                    if ($result1= $db->executeS($sqll)){
                      $out.="LOOOOl";
                        foreach ($result1 as  $row) {
                          $tab_id_product[]=$row['id_product'];
                          $out = $tab_id_product;
                         
                        }
                    }     
                   
              }

             // return $tab_id_product;
            return $out;
        }



    public function selectionProductsOfCategories($ids_categories){//ids_categories est une chaine de caractere
              $tab_id_categories = explode(",", $ids_categories);
              $out = "OUTOUT";
              $tab_id_product = array();
              for ($i= 0; $i < count($tab_id_categories); $i++) { 
                    //get product'us of each category and return ids

                    $sql='SELECT id_product FROM ps_product` WHERE `id_category_default` ='.$tab_id_categories[$i] ;
                    if ($result=Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql)){
                        foreach ($result as  $row) {
                          $tab_id_product[]=$row['id_product'];
                          $out = $tab_id_product;
                        }
                    }     
                   
              }

             // return $tab_id_product;
            return $out;
        }

         public function insertionProductInCategory($array_produtcs, $id_category_destination){

              for ($i= 0; $i < count($array_produtcs); $i++) { 
                    //insert products'category
                     $sql ='INSERT INTO `ps_category_product`(`id_category`, `id_product`) VALUES ('.$id_category_destination.','.$array_produtcs[$i].')';
                     Db::getInstance()->execute($sql);


              }

        }

       
      



}



