<?php
class PWS_FAQ_Block_Adminhtml_Faq_Articles_List extends Mage_Adminhtml_Block_Widget_Container
{
    protected $_addButtonLabel = 'Add New';
    protected $_backButtonLabel = 'Back';
    protected $_blockGroup = 'adminhtml';
    
    
    public function __construct()
    {
        parent::__construct();
        
        $this->_controller = 'faqArticles';
        $this->_headerText = Mage::helper('pws_faq')->__('Manage FAQ Articles');
        $this->_addButtonLabel = Mage::helper('pws_faq')->__('Add New Article');
        
        $this->setTemplate('widget/grid/container.phtml');

        $this->_addButton('add', array(
            'label'     => $this->getAddButtonLabel(),
            'onclick'   => 'setLocation(\'' . $this->getCreateUrl() .'\')',
            'class'     => 'add',
        ));
        
       
    }
    
    protected function _prepareLayout()
    {        
        $this->setChild( 'grid',
            $this->getLayout()->createBlock('pws_faq/adminhtml_faq_articles_grid',
            $this->_controller . '.grid')->setSaveParametersInSession(true) );
        return parent::_prepareLayout();
    }

    public function getCreateUrl()
    {
        return $this->getUrl('*/*/new');
    }

    public function getGridHtml()
    {
        return $this->getChildHtml('grid');
    }

    protected function getAddButtonLabel()
    {
        return $this->_addButtonLabel;
    }

    protected function getBackButtonLabel()
    {
        return $this->_backButtonLabel;
    }

    protected function _addBackButton()
    {
        $this->_addButton('back', array(
            'label'     => $this->getBackButtonLabel(),
            'onclick'   => 'setLocation(\'' . $this->getBackUrl() .'\')',
            'class'     => 'back',
        ));
    }

    public function getHeaderCssClass()
    {
        return 'icon-head ' . parent::getHeaderCssClass();
    }

    public function getHeaderWidth()
    {
        return 'width:50%;';
    }
}
