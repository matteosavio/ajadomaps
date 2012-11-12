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
class Tx_Ajadomaps_Domain_Model_Pin extends Tx_Extbase_DomainObject_AbstractEntity {

	/**
	 * title
	 *
	 * @var string
	 */
	protected $title;

	/**
	 * description
	 *
	 * @var string
	 */
	protected $description;
        
        /**
	 * address
	 *
	 * @var string
	 */
	protected $address;

	/**
	 * x
	 *
	 * @var integer
	 */
	protected $x;

	/**
	 * y
	 *
	 * @var integer
	 */
	protected $y;

	/**
	 * pinImage
	 *
	 * @var string
	 */
	protected $pinImage;

	/**
	 * link
	 *
	 * @var string
	 */
	protected $link;
	
	/**
	 * __construct
	 *
	 * @return void
	 */
	public function __construct() {

	}

        /**
	 * Returns the id
	 *
	 * @return string $id
	 */
	public function getId() {
		return $this->id;
	}
        
	/**
	 * Returns the title
	 *
	 * @return string $title
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * Sets the title
	 *
	 * @param string $title
	 * @return void
	 */
	public function setTitle($title) {
		$this->title = $title;
	}
	
	/**
	 * Returns the link
	 *
	 * @return string $link
	 */
	public function getLink() {
		return $this->link;
	}

	/**
	 * Sets the link
	 *
	 * @param string $link
	 * @return void
	 */
	public function setLink($link) {
		$this->link = $link;
	}

	/**
	 * Returns the description
	 *
	 * @return string $description
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * Sets the description
	 *
	 * @param string $description
	 * @return void
	 */
	public function setDescription($description) {
		$this->description = $description;
	}

        /**
	 * Returns the address
	 *
	 * @return string $address
	 */
	public function getAddress() {
		return $this->address;
	}

	/**
	 * Sets the address
	 *
	 * @param string $address
	 * @return void
	 */
	public function setAddress($address) {
		$this->address = $address;
	}
        
	/**
	 * Returns the x
	 *
	 * @return integer $x
	 */
	public function getX() {
		return $this->x;
	}

	/**
	 * Sets the x
	 *
	 * @param integer $x
	 * @return void
	 */
	public function setX($x) {
		$this->x = $x;
	}

	/**
	 * Returns the y
	 *
	 * @return integer $y
	 */
	public function getY() {
		return $this->y;
	}

	/**
	 * Sets the y
	 *
	 * @param integer $y
	 * @return void
	 */
	public function setY($y) {
		$this->y = $y;
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