<?php
/**
 * User: TheCodeholic
 * Date: 4/26/2020
 * Time: 3:29 PM
 */

namespace backend\widgets;

use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/**
 * Class Nav
 *
 * @author  Zura Sekhniashvili <zurasekhniashvili@gmail.com>
 * @package backend\widgets
 */
class Nav extends \yii\bootstrap\Nav
{
    /**
     * See parent class comment on items array.
     * However each item has few more additional properties
     *
     * - icon: string, icon classes to display in front of label
     * - badge: mixed, badge value to display on menu item
     * - badgeClass: string, css classes to add to badge html element. Default is "badge-xs badge-info"
     */
    public $items = [];

    public $encodeLabels = false;

    public function init()
    {
        parent::init();
        $this->prepareItems();
    }

    public function prepareItems()
    {
        foreach ($this->items as &$item) {
            $item['label'] = '<span class="inner-text">' . $item['label'] . '</span>';
            if (isset($item['icon'])) {
                $item['label'] = '<i class="' . $item['icon'] . ' menu-item-icon"></i>'
                    . $item['label'];
            }
            if (isset($item['badge'])) {
                $item['label'] .= Html::tag(
                    'span',
                    Html::tag('span', $item['badge'],
                    ['class' => ArrayHelper::getValue($item, 'badgeClass', 'badge badge-xs badge-info')]
                ), ['class' => 'badge-wrapper']);
            }
        }
    }
}