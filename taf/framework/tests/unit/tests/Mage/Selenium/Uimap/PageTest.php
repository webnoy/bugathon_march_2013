<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magentocommerce.com for more information.
 *
 * @category    tests
 * @package     selenium unit tests
 * @subpackage  Mage_PHPUnit
 * @author      Magento Core Team <core@magentocommerce.com>
 * @copyright   Copyright (c) 2013 Magento Inc. (http://www.magentocommerce.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class Mage_Selenium_Uimap_PageTest extends Mage_PHPUnit_TestCase
{
    /**
     * @covers Mage_Selenium_Uimap_Page::__construct
     */
    public function test__construct()
    {
        $pageContainer = array();
        $uipage = new Mage_Selenium_Uimap_Page('pageId', $pageContainer);
        $this->assertInstanceOf('Mage_Selenium_Uimap_Page', $uipage);
    }

    /**
     * @covers Mage_Selenium_Uimap_Page::getId
     */
    public function testGetId()
    {
        $pageId = 'testId';
        $pageContainer = array();
        $uipage = new Mage_Selenium_Uimap_Page($pageId, $pageContainer);
        $this->assertEquals($uipage->getPageId(), $pageId);
    }

    /**
     * @covers Mage_Selenium_Uimap_Page::getMainButtons
     */
    public function testGetMainButtons()
    {
        $fileHelper = new Mage_Selenium_Helper_File($this->_config);
        $pageContainers = $fileHelper->loadYamlFile
                (SELENIUM_TESTS_BASEDIR . '\fixture\default\core\Mage\UnitTest\uimap\frontend\UnitTests.yml');
        $uipage = new Mage_Selenium_Uimap_Page('pageId', $pageContainers['get_main_buttons']);
        $mainButtons = $uipage->getMainButtons();
        $this->assertInstanceOf('Mage_Selenium_Uimap_ElementsCollection', $mainButtons);

        $pageContainers = array();
        $uipage = new Mage_Selenium_Uimap_Page('pageId', $pageContainers);
        $mainButtons = $uipage->getMainButtons();
        $this->assertNull($mainButtons);
    }
}