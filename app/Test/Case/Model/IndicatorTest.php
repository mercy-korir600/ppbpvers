<?php
App::uses('Indicator', 'Model');

/**
 * Indicator Test Case
 */
class IndicatorTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.indicator'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Indicator = ClassRegistry::init('Indicator');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Indicator);

		parent::tearDown();
	}

}
