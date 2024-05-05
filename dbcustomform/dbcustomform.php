<?php

if (!defined('_PS_VERSION_')) {
    exit;
}

class dbcustomform extends Module
{
    public function __construct()
    {
        $this->name = 'dbcustomform';
        $this->version = '1.00.0';
        $this->author = 'Ana';
        $this->displayName = $this->l('DBCustomForm');
        $this->description = $this->l('Módulo para personalizar tus formularios');
        $this->controllers = array('default');
        $this->bootstrap = 1;
        parent::__construct();
    }

    public function install()
    {
        if( !parent::install() || !$this->registerHook('actionDispatcher')){
            return false;
        }
        return true;
    }

    public function uninstall()
    {
        if( !parent::uninstall() || !$this->unregisterHook('actionDispatcher')){
            return false;
        }
        return true;
    }
    public function hookActionDispatcher($params)
    {
        if ($this->context->controller instanceof FrontController && in_array($this->context->controller->php_self, array('authentication', 'identity'))) {
            if (Tools::isSubmit('submitAccount')) {
                $firstname = Tools::getValue('firstname');
                $lastname = Tools::getValue('lastname');

                if (Tools::strlen($firstname) > 512) {
                    $_POST['firstname'] = Tools::substr($firstname, 0, 512);
                }

                if (Tools::strlen($lastname) > 512) {
                    $_POST['lastname'] = Tools::substr($lastname, 0, 512);
                }
            }
        }
    }

    
}

