<?php

/**
 * @file tests/data/40-CreateUsersTest.inc.php
 *
 * Copyright (c) 2014 Simon Fraser University Library
 * Copyright (c) 2000-2014 John Willinsky
 * Distributed under the GNU GPL v2. For full terms see the file docs/COPYING.
 *
 * @class CreateUsersTest
 * @ingroup tests_data
 *
 * @brief Data build suite: Create test users
 */

import('lib.pkp.tests.WebTestCase');

class CreateUsersTest extends WebTestCase {
	/**
	 * Create a user account.
	 * @param $data array
	 */
	protected function createUser($data) {
		// Come up with sensible defaults for data not supplied
		$username = $data['username'];
		$data = array_merge(array(
			'email' => $username . '@mailinator.com',
			'password' => $username . $username,
			'password2' => $username . $username,
			'roles' => array()
		), $data);

		$this->open(self::$baseUrl);
		$this->waitForElementPresent('link=Users & Roles');
		$this->click('link=Users & Roles');
		$this->waitForElementPresent('css=[id^=component-grid-settings-user-usergrid-addUser-button-]');
		$this->click('css=[id^=component-grid-settings-user-usergrid-addUser-button-]');
		$this->waitForElementPresent('css=[id^=firstName-]');

		// Fill in user data
		$this->type('css=[id^=firstName-]', $data['firstName']);
		$this->type('css=[id^=lastName-]', $data['lastName']);
		$this->type('css=[id^=username-]', $username);
		$this->type('css=[id^=email-]', $data['email']);
		$this->type('css=[id^=password-]', $data['password']);
		$this->type('css=[id^=password2-]', $data['password2']);
		if (isset($data['country'])) $this->select('id=country', $data['country']);
		if (isset($data['affiliation'])) $this->type('css=[id^=affiliation-]', $data['affiliation']);
		$this->click('//span[text()=\'OK\']/..');
		$this->waitJQuery();

		// Roles
		foreach ($data['roles'] as $role) {
			$this->waitForElementPresent('css=[id^=component-listbuilder-users-userusergrouplistbuilder-addItem-button-]');
			$this->clickAt('css=[id^=component-listbuilder-users-userusergrouplistbuilder-addItem-button-]', '10,10');
			$this->waitForElementPresent('//select[@name=\'newRowId[name]\']//option[text()=\'' . $role . '\']');
			$this->select('name=newRowId[name]', $role);
			$this->waitJQuery();
		}

		$this->click('//span[text()=\'Save\']/..');
		$this->waitJQuery();
	}

	/**
	 * Create a user
	 */
	function testCreateRvaca() {
		$this->createUser(array(
			'username' => 'rvaca',
			'firstName' => 'Ramiro',
			'lastName' => 'Vaca',
			'country' => 'Mexico',
			'affiliation' => 'Universidad Nacional Autónoma de México',
			'roles' => array('Journal manager'),
		));
	}

	/**
	 * Create a user
	 */
	function testCreateDbarnes() {
		$this->createUser(array(
			'username' => 'dbarnes',
			'firstName' => 'Daniel',
			'lastName' => 'Barnes',
			'country' => 'Australia',
			'affiliation' => 'University of Melbourne',
			'roles' => array('Journal editor'),
		));
	}

	/**
	 * Create a user
	 */
	function testCreateDbuskins() {
		$this->createUser(array(
			'username' => 'dbuskins',
			'firstName' => 'David',
			'lastName' => 'Buskins',
			'country' => 'United States',
			'affiliation' => 'University of Chicago',
			'roles' => array('Section editor'),
		));
	}

	/**
	 * Create a user
	 */
	function testCreateSberardo() {
		$this->createUser(array(
			'username' => 'sberardo',
			'firstName' => 'Stephanie',
			'lastName' => 'Berardo',
			'country' => 'Canada',
			'affiliation' => 'University of Toronto',
			'roles' => array('Section editor'),
		));
	}

	/**
	 * Create a user
	 */
	function testCreateMinoue() {
		$this->createUser(array(
			'username' => 'minoue',
			'firstName' => 'Minoti',
			'lastName' => 'Inoue',
			'country' => 'Japan',
			'affiliation' => 'Kyoto University',
			'roles' => array('Section editor'),
		));
	}

	/**
	 * Create a user
	 */
	function testCreateJjanssen() {
		$this->createUser(array(
			'username' => 'jjanssen',
			'firstName' => 'Julie',
			'lastName' => 'Janssen',
			'country' => 'Netherlands',
			'affiliation' => 'Utrecht University',
			'roles' => array('External Reviewer'),
		));
	}

	/**
	 * Create a user
	 */
	function testCreatePhudson() {
		$this->createUser(array(
			'username' => 'phudson',
			'firstName' => 'Paul',
			'lastName' => 'Hudson',
			'country' => 'Canada',
			'affiliation' => 'McGill University',
			'roles' => array('External Reviewer'),
		));
	}

	/**
	 * Create a user
	 */
	function testCreateAmccrae() {
		$this->createUser(array(
			'username' => 'amccrae',
			'firstName' => 'Aisla',
			'lastName' => 'McCrae',
			'country' => 'Canada',
			'affiliation' => 'University of Manitoba',
			'roles' => array('External Reviewer'),
		));
	}

	/**
	 * Create a user
	 */
	function testCreateAgallego() {
		$this->createUser(array(
			'username' => 'agallego',
			'firstName' => 'Adela',
			'lastName' => 'Gallego',
			'country' => 'United States',
			'affiliation' => 'State University of New York',
			'roles' => array('External Reviewer'),
		));
	}

	/**
	 * Create a user
	 */
	function testCreateMfritz() {
		$this->createUser(array(
			'username' => 'mfritz',
			'firstName' => 'Maria',
			'lastName' => 'Fritz',
			'country' => 'Belgium',
			'affiliation' => 'Ghent University',
			'roles' => array('Copyeditor'),
		));
	}

	/**
	 * Create a user
	 */
	function testCreateSvogt() {
		$this->createUser(array(
			'username' => 'svogt',
			'firstName' => 'Sarah',
			'lastName' => 'Vogt',
			'country' => 'Chile',
			'affiliation' => 'Universidad de Chile',
			'roles' => array('Copyeditor'),
		));
	}

	/**
	 * Create a user
	 */
	function testCreateGcox() {
		$this->createUser(array(
			'username' => 'gcox',
			'firstName' => 'Graham',
			'lastName' => 'Cox',
			'country' => 'United States',
			'affiliation' => 'Duke University',
			'roles' => array('Layout Editor'),
		));
	}

	/**
	 * Create a user
	 */
	function testCreateShellier() {
		$this->createUser(array(
			'username' => 'shellier',
			'firstName' => 'Stephen',
			'lastName' => 'Hellier',
			'country' => 'South Africa',
			'affiliation' => 'University of Cape Town',
			'roles' => array('Layout Editor'),
		));
	}

	/**
	 * Create a user
	 */
	function testCreateCturner() {
		$this->createUser(array(
			'username' => 'cturner',
			'firstName' => 'Catherine',
			'lastName' => 'Turner',
			'country' => 'United Kingdom',
			'affiliation' => 'Imperial College London',
			'roles' => array('Proofreader'),
		));
	}

	/**
	 * Create a user
	 */
	function testCreateSkumar() {
		$this->createUser(array(
			'username' => 'skumar',
			'firstName' => 'Sabine',
			'lastName' => 'Kumar',
			'country' => 'Singapore',
			'affiliation' => 'National University of Singapore',
			'roles' => array('Proofreader'),
		));
	}
}
