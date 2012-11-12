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
 * Test case for class Tx_Ajadomaps_Domain_Model_Pin.
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
class Tx_Ajadomaps_Domain_Model_PinTest extends Tx_Extbase_Tests_Unit_BaseTestCase {
	/**
	 * @var Tx_Ajadomaps_Domain_Model_Pin
	 */
	protected $fixture;

	public function setUp() {
		$this->fixture = new Tx_Ajadomaps_Domain_Model_Pin();
	}

	public function tearDown() {
		unset($this->fixture);
	}
	
	
	/**
	 * @test
	 */
	public function getTitleReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setTitleForStringSetsTitle() { 
		$this->fixture->setTitle('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getTitle()
		);
	}
	
	/**
	 * @test
	 */
	public function getDescriptionReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setDescriptionForStringSetsDescription() { 
		$this->fixture->setDescription('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getDescription()
		);
	}
	
	/**
	 * @test
	 */
	public function getXReturnsInitialValueForInteger() { 
		$this->assertSame(
			0,
			$this->fixture->getX()
		);
	}

	/**
	 * @test
	 */
	public function setXForIntegerSetsX() { 
		$this->fixture->setX(12);

		$this->assertSame(
			12,
			$this->fixture->getX()
		);
	}
	
	/**
	 * @test
	 */
	public function getYReturnsInitialValueForInteger() { 
		$this->assertSame(
			0,
			$this->fixture->getY()
		);
	}

	/**
	 * @test
	 */
	public function setYForIntegerSetsY() { 
		$this->fixture->setY(12);

		$this->assertSame(
			12,
			$this->fixture->getY()
		);
	}
	
	/**
	 * @test
	 */
	public function getPinImageReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setPinImageForStringSetsPinImage() { 
		$this->fixture->setPinImage('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getPinImage()
		);
	}
	
}
?>