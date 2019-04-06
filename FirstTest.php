<?php 

require_once('vendor/autoload.php');
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\WebDriverBy;
use PHPUnit\Framework\TestCase;

class FirstTest extends TestCase {

	public function testFirstTest() {
		$host = 'http://localhost:4444/wd/hub';

		$driver = RemoteWebDriver::create('localhost:9515', DesiredCapabilities::chrome());
		$driver->get('https://kasirpintar.co.id/');
		$driver->findElement(WebDriverBy::linkText("Karir"))->click();

		$driver->findElement(WebDriverBy::id("posisi"))->click();
		$driver->getKeyboard()->sendKeys('Quality Assurance Engineer');

		$select = $driver->findElement(WebDriverBy::id('divisi'));
		$options = $select->findElements(WebDriverBy::tagName('option'));
		foreach ($options as $option) {
		  if($option->getText() == "Technology")
		  	$option->click();
		}

		$driver->findElement(WebDriverBy::id("cari"))->click();
		foreach($driver->findElements(WebDriverBy::cssSelector('tr > td:nth-child(1)')) as $data)
			assert($data->getText() == "Technology");
	}

}




