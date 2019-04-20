<?php
/**
 * Created by PhpStorm.
 * User: lijunpeng
 * Date: 2019-04-20
 * Time: 11:49
 */

class PTHelperExtension extends Minz_Extension {

    public function init(){
        // 消息写入前hook
        $this->registerHook('entry_before_insert', array($this, 'entryBeforeInsertHook'));
    }

    public function entryBeforeInsertHook($entry){
        // ttg时间特殊处理 +8小时
        $link = $entry->link();
        // 是TTG
        if (stripos($link, 'totheglory') !== false || stripos($link, 'ttg') !== false){
            $entry->_date($entry->date(true) + 8 * 3600);
        }



    }
}