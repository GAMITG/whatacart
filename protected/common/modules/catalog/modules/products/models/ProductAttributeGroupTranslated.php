<?php 
/**
 * @copyright Copyright (C) 2016 Usha Singhai Neo Informatique Pvt. Ltd
 * @license https://www.gnu.org/licenses/gpl-3.0.html
 */
namespace products\models;
    
use usni\library\components\UiSecuredActiveRecord;
/**
 * ProductAttributeGroupTranslated class file
 * @package products\models
 */
class ProductAttributeGroupTranslated extends UiSecuredActiveRecord
{
    /**
     * @inheritdoc
     */
    public function getProductAttributeGroup()
    {
        return $this->hasOne(ProductAttributeGroup::className(), ['id' => 'owner_id']);
    }
}
?>