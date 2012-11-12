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
class Tx_Ajadomaps_Controller_MapController extends Tx_Extbase_MVC_Controller_ActionController {

	/**
	 * mapRepository
	 *
	 * @var Tx_Ajadomaps_Domain_Repository_MapRepository
	 */
	protected $mapRepository;

	/**
	 * injectMapRepository
	 *
	 * @param Tx_Ajadomaps_Domain_Repository_MapRepository $mapRepository
	 * @return void
	 */
	public function injectMapRepository(Tx_Ajadomaps_Domain_Repository_MapRepository $mapRepository) {
		$this->mapRepository = $mapRepository;
	}
	
	/**
	 * pinRepository
	 *
	 * @var Tx_Ajadomaps_Domain_Repository_PinRepository
	 */
	protected $pinRepository;

	/**
	 * injectMapRepository
	 *
	 * @param Tx_Ajadomaps_Domain_Repository_PinRepository $pinRepository
	 * @return void
	 */
	public function injectPinRepository(Tx_Ajadomaps_Domain_Repository_PinRepository $pinRepository) {
		$this->pinRepository = $pinRepository;
	}

	/**
	 * initialize the controller
	 *
	 * @return void
	 */
	protected function initializeAction() {
	    parent::initializeAction();
	    //fallback to current pid if no storagePid is defined
	    $configuration = $this->configurationManager->getConfiguration(Tx_Extbase_Configuration_ConfigurationManagerInterface::CONFIGURATION_TYPE_FRAMEWORK);
	    if(empty($configuration['persistence']['storagePid'])){
	        $currentPid['persistence']['storagePid'] = $GLOBALS["TSFE"]->id;
	        $this->configurationManager->setConfiguration(array_merge($configuration, $currentPid));
	    }
	    $this->pinRepository = new Tx_Ajadomaps_Domain_Repository_PinRepository();
	}
	 
	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
		$cObj = $this->configurationManager->getContentObject();
		$cid = $cObj->data['uid'];
		
		//var_dump($cid);var_dump($cObj->data["_LOCALIZED_UID"]);die();
		$maps = $this->mapRepository->findByParentid($cid);
		//print_r($maps);
		if(count($maps)){
			$pins = $this->pinRepository->findAllByMap($maps[0]);
			$this->view->assign('pins', $pins);
			$this->view->assign('maps', $maps);
			//$this->view->assign('map', $map);
		}
		$asdf = "asfdasdg";
	
		$this->view->assign('bla', $asdf);
		//print_r($pins);die();
		
		
	$this->view->assign('bla', 'asdf');
	}

	/**
	 * action show
	 *
	 * @param $map
	 * @return void
	 */
	public function showAction(Tx_Ajadomaps_Domain_Model_Map $map) {
		$this->view->assign('map', $map);
	}

	/**
	 * action new
	 *
	 * @param $newMap
	 * @dontvalidate $newMap
	 * @return void
	 */
	public function newAction(Tx_Ajadomaps_Domain_Model_Map $newMap = NULL) {
		$this->view->assign('newMap', $newMap);
	}

	/**
	 * action create
	 *
	 * @param $newMap
	 * @return void
	 */
	public function createAction(Tx_Ajadomaps_Domain_Model_Map $newMap) {
		
		$this->redirect('list');
	}

	/**
	 * action edit
	 *
	 * @param $map
	 * @return void
	 */
	public function editAction(Tx_Ajadomaps_Domain_Model_Map $map) {
		$this->view->assign('map', $map);
	}

	/**
	 * action update
	 *
	 * @param $map
	 * @return void
	 */
	public function updateAction(Tx_Ajadomaps_Domain_Model_Map $map) {
		
		$this->redirect('list');
	}

	/**
	 * action delete
	 *
	 * @param $map
	 * @return void
	 */
	public function deleteAction(Tx_Ajadomaps_Domain_Model_Map $map) {
		$this->redirect('list');
	}

}
?>