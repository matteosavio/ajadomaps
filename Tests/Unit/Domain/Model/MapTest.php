<?php

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2012 Stephan Petzl <stephan.petzl@ajado.com>, Ajado
 *  			
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * Test case for class Tx_Ajadomaps_Domain_Model_Map.
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @package TYPO3
 * @subpackage Ajado maps
 *
 * @author Stephan Petzl <stephan.petzl@ajado.com>
 */
class Tx_Ajadomaps_Domain_Model_MapTest extends Tx_Extbase_Tests_Unit_BaseTestCase {
	/**
	 * @var Tx_Ajadomaps_Domain_Model_Map
	 */
	protected $fixture;

	public function setUp() {
		$this->fixture = new Tx_Ajadomaps_Domain_Model_Map();
	}

	public function tearDown() {
		unset($this->fixture);
	}
	
	
	/**
	 * @test
	 */
	public function getImageReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setImageForStringSetsImage() { 
		$this->fixture->setImage('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getImage()
		);
	}
	
	/**
	 * @test
	 */
	public function getPinsReturnsInitialValueForObjectStorageContainingTx_Ajadomaps_Domain_Model_Pin() { 
		$newObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->fixture->getPins()
		);
	}

	/**
	 * @test
	 */
	public function setPinsForObjectStorageContainingTx_Ajadomaps_Domain_Model_PinSetsPins() { 
		$pin = new Tx_Ajadomaps_Domain_Model_Pin();
		$objectStorageHoldingExactlyOnePins = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOnePins->attach($pin);
		$this->fixture->setPins($objectStorageHoldingExactlyOnePins);

		$this->assertSame(
			$objectStorageHoldingExactlyOnePins,
			$this->fixture->getPins()
		);
	}
	
	/**
	 * @test
	 */
	public function addPinToObjectStorageHoldingPins() {
		$pin = new Tx_Ajadomaps_Domain_Model_Pin();
		$objectStorageHoldingExactlyOnePin = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOnePin->attach($pin);
		$this->fixture->addPin($pin);

		$this->assertEquals(
			$objectStorageHoldingExactlyOnePin,
			$this->fixture->getPins()
		);
	}

	/**
	 * @test
	 */
	public function removePinFromObjectStorageHoldingPins() {
		$pin = new Tx_Ajadomaps_Domain_Model_Pin();
		$localObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$localObjectStorage->attach($pin);
		$localObjectStorage->detach($pin);
		$this->fixture->addPin($pin);
		$this->fixture->removePin($pin);

		$this->assertEquals(
			$localObjectStorage,
			$this->fixture->getPins()
		);
	}
	
}
?>