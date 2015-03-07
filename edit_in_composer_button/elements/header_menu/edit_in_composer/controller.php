<?php
defined('C5_EXECUTE') or die("Access Denied.");
class EditInComposerConcreteInterfaceMenuItemController extends ConcreteInterfaceMenuItemController {

    public function displayItem() {
        $canCompose = false;
        $cobj = Page::getCurrentPage();
        if (is_object($cobj)) {
            $cpobj = new Permissions($cobj);
            $canEditPageProperties = $cpobj->canEditPageProperties();
            $h = Loader::helper('concrete/dashboard');
            $ct = CollectionType::getByID($cobj->getCollectionTypeID());
            if (is_object($ct)) {
                if ($ct->isCollectionTypeIncludedInComposer()) {
                    if ($canEditPageProperties && $h->canAccessComposer()) {
                        $canCompose = true;
                    }
                }
            }
        }
        return $canCompose;
    }

    public function getMenuLinkHTML() {
        $html = '';
        $cobj = Page::getCurrentPage();
        if (is_object($cobj)) {
            $cID = $cobj->getCollectionID();
            $link = View::url('/dashboard/composer/write/-/edit/', $cID);
            $attribs = '';
            if (is_array($this->menuItem->getLinkAttributes())) {
                foreach($this->menuItem->getLinkAttributes() as $key => $value) {
                    $attribs .= $key . '="' . $value . '" ';
                }
            }
            $html .= '<a id="ccm-page-edit-nav-' . $this->menuItem->getHandle() . '" ' . $attribs . ' href="' . h($link) . '">' . $this->menuItem->getName() . '</a>';
        }
        return $html;
    }
}
