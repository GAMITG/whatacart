<?php
/**
 * @copyright Copyright (C) 2016 Usha Singhai Neo Informatique Pvt. Ltd
 * @license https://www.gnu.org/licenses/gpl-3.0.html
 */
namespace taxes\controllers;

use taxes\controllers\BaseController;
use taxes\models\ProductTaxClass;
use usni\UsniAdaptor;
use taxes\utils\TaxUtil;
/**
 * ProductTaxClassController class file.
 * 
 * @package taxes\controllers
 */
class ProductTaxClassController extends BaseController
{
    /**
     * @inheritdoc
     */
    protected function resolveModelClassName()
    {
        return ProductTaxClass::className();
    }
    
    /**
     * @inheritdoc
     */
    public function pageTitles()
    {
        return [
                    'create'         => UsniAdaptor::t('application','Create') . ' ' . ProductTaxClass::getLabel(1),
                    'update'         => UsniAdaptor::t('application','Update') . ' ' . ProductTaxClass::getLabel(1),
                    'view'           => UsniAdaptor::t('application','View') . ' ' . ProductTaxClass::getLabel(1),
                    'manage'         => UsniAdaptor::t('application','Manage') . ' ' . ProductTaxClass::getLabel(2)
               ];
    }
    
    /**
     * @inheritdoc
     */
    protected function deleteModel($model)
    {
        $isAllowedToDelete = TaxUtil::checkIfProductTaxClassAllowedToDelete($model);
        if(!$isAllowedToDelete)
        {
            $message = UsniAdaptor::t('taxflash', 'Delete failed as either this product tax class is associated with tax rule or product.');
            UsniAdaptor::app()->getSession()->setFlash('deleteFailed', $message);
            return false;
        }
        return parent::deleteModel($model);
    }
}