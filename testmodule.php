<?php
if (!defined('_PS_VERSION_')) {
    exit;
}

class TestModule extends Module
{
    public function __construct()
    {
        $this->name = 'testmodule';
        $this->tab = "emailing";
        $this->version = '1.0.0';
        $this->author = 'Hugo Decuq';
        $this->need_instance = 0;
        $this->ps_versions_compliancy = [
            'min' => '1.7',
            'max' => '1.7'
        ];

        parent::__construct();

        $this->displayName = $this->l('Test module');
        $this->description = $this->l('Envoi un mail aux utilisateurs dès que les stocks changent');

        $this->confirmUninstall = $this->l('Êtes-vous sûr de vouloir le déinsallé ?');
    }

    public function install()
    {
        return parent::install();
    }

    public function uninstall()
    {
        return parent::uninstall();
    }

    public function actionProductUpdate($params)
    {
        Mail::Send(
            (int)(Configuration::get('PS_LANG_DEFAULT')),
            'contact',
            ' Modification des stocks',
            array(
                '{email}' => Configuration::get('PS_SHOP_EMAIL'),
                '{message}' => 'Les stocks de votre magasin changent'
            ),
            Configuration::get('PS_SHOP_EMAIL'),
            NULL,
            NULL,
            NULL,
            NULL,
            _PS_MODULE_DIR_ . 'yourmodulename/mails'
        );
    }
}
