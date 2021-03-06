<?php
/*
# author Roland Soos
# copyright Copyright (C) Nextendweb.com. All Rights Reserved.
# @license - http://www.gnu.org/licenses/gpl-3.0.txt GNU/GPL
*/
defined('_JEXEC') or die('Restricted access'); ?><?php

nextendimportsmartslider2('nextend.smartslider.check');

class plgNextendSliderGeneratorCobalt extends NextendPluginBase {

    var $_group = 'cobalt';

    function onNextendSliderGeneratorList(&$group, &$list, $showall = false) {
        if($showall || smartsliderIsFull()){
            $installed = NextendFilesystem::existsFolder(JPATH_ADMINISTRATOR.DIRECTORY_SEPARATOR.'components'.DIRECTORY_SEPARATOR.'com_cobalt');
    	      if ($showall || $installed) {
                $group[$this->_group] = 'Cobalt';
        
                if (!isset($list[$this->_group])) $list[$this->_group] = array();
                $list[$this->_group][$this->_group . '_records'] = array(NextendText::_('Records'), $this->getPath() . 'records' . DIRECTORY_SEPARATOR, true, true, $installed ? true : 'http://extensions.joomla.org/extensions/authoring-a-content/content-construction/21340', null);
            }
        }
    }

    function getPath() {
        return dirname(__FILE__) . DIRECTORY_SEPARATOR;
    }
}

NextendPlugin::addPlugin('nextendslidergenerator', 'plgNextendSliderGeneratorCobalt');