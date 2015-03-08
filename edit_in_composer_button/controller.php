<?php
defined('C5_EXECUTE') or die(_("Access Denied."));

class EditInComposerButtonPackage extends Package {

    protected $pkgHandle = 'edit_in_composer_button';
    protected $appVersionRequired = '5.6';
    protected $pkgVersion = '0.1';

    public function getPackageName() {
        return t('"Edit in Composer" Button');
    }

    public function getPackageDescription() {
        return t('Add an "Edit in Composer" button to your toolbar.');
    }

    public function on_start() {
        $ihm = Loader::helper('concrete/interface/menu');
        $ihm->addPageHeaderMenuItem('edit_in_composer', t('Edit in Composer'), 'left', array(
            'class' => 'ccm-icon-edit ccm-menu-icon',
        ), 'edit_in_composer_button');
    }

}
