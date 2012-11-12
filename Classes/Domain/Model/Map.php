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
 *  the Free Software Foundation; either version 3 of the License, or
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
 *
 *
 * @package ajadomaps
 * @license http://www.gnu.org/licenses/lgpl.html GNU Lesser General Public License, version 3 or later
 *
 */
class Tx_Ajadomaps_Domain_Model_Map extends Tx_Extbase_DomainObject_AbstractEntity {

	/**
	 * The background image of the map
	 *
	 * @var string
	 */
	protected $image;
        
        /**
	 * pinImage
	 *
	 * @var string
	 */
	protected $pinImage;

	/**
	 * one map can have many pins
	 *
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_Ajadomaps_Domain_Model_Pin>
	 */
	protected $pins;

	/**
	 * __construct
	 *
	 * @return void
	 */
	public function __construct() {
		//Do not remove the next line: It would break the functionality
		$this->initStorageObjects();
	}

	/**
	 * Initializes all Tx_Extbase_Persistence_ObjectStorage properties.
	 *
	 * @return void
	 */
	protected function initStorageObjects() {
		/**
		 * Do not modify this method!
		 * It will be rewritten on each save in the extension builder
		 * You may modify the constructor of this class instead
		 */
		$this->pins = new Tx_Extbase_Persistence_ObjectStorage();
	}

	/**
	 * Returns the image
	 *
	 * @return string $image
	 */
	public function getImage() {
		return $this->image;
	}

	/**
	 * Sets the image
	 *
	 * @param string $image
	 * @return void
	 */
	public function setImage($image) {
		$this->image = $image;
	}

	/**
	 * Adds a Pin
	 *
	 * @param Tx_Ajadomaps_Domain_Model_Pin $pin
	 * @return void
	 */
	public function addPin(Tx_Ajadomaps_Domain_Model_Pin $pin) {
		$this->pins->attach($pin);
	}

	/**
	 * Removes a Pin
	 *
	 * @param Tx_Ajadomaps_Domain_Model_Pin $pinToRemove The Pin to be removed
	 * @return void
	 */
	public function removePin(Tx_Ajadomaps_Domain_Model_Pin $pinToRemove) {
		$this->pins->detach($pinToRemove);
	}

	/**
	 * Returns the pins
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_Ajadomaps_Domain_Model_Pin> $pins
	 */
	public function getPins() {
		return $this->pins;
	}

	/**
	 * Sets the pins
	 *
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_Ajadomaps_Domain_Model_Pin> $pins
	 * @return void
	 */
	public function setPins(Tx_Extbase_Persistence_ObjectStorage $pins) {
		$this->pins = $pins;
	}

        /**
	 * Returns the pinImage
	 *
	 * @return string $pinImage
	 */
	public function getPinImage() {
		return $this->pinImage;
	}

	/**
	 * Sets the pinImage
	 *
	 * @param string $pinImage
	 * @return void
	 */
	public function setPinImage($pinImage) {
		$this->pinImage = $pinImage;
	}
}
?>