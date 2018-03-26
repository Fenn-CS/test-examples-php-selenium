<?php
/* vim: set expandtab sw=4 ts=4 sts=4: */
/**
 * Selenium TestCase for login related tests
 *
 * @package    TeraInform-test
 * @subpackage Selenium
 */

namespace TeraInform\Tests\Selenium;

/**
 * LoginTest class
 *
 * @package    TeraInform-test
 * @subpackage Selenium
 * @group      selenium
 */
class LoginTest extends TestBase
{
    public function setUpPage()
    {
        parent::setUpPage();
        $this->logOutIfLoggedIn();
    }
    /**
     * Test for successful login
     *
     * @return void
     *
     * @group large
     */
    public function testSuccessfulLogin()
    {
        $this->login();
        $this->waitForElement("byXPath", "//*[@id=\"serverinfo\"]");
        $this->assertTrue($this->isSuccessLogin());
        $this->logOutIfLoggedIn();
    }

    /**
     * Test for unsuccessful login
     *
     * @return void
     *
     * @group large
     */
    public function testLoginWithWrongPassword()
    {
        $this->login("Admin", "Admin");
        $this->waitForElement("byCssSelector", "div.error");
        $this->assertTrue($this->isUnsuccessLogin());
    }
}
