<?php
	/*
		 RTL URL Title Fix V 1.0
		 **************************
		 Works With ExpressionEngine 2.0

		 License :
		 *******************************
		Copyright [2013] [Jokhab, Yahya - Akwad.net]

		Licensed under the Apache License, Version 2.0 (the "License");
		you may not use this file except in compliance with the License.
		You may obtain a copy of the License at

		    http://www.apache.org/licenses/LICENSE-2.0

		Unless required by applicable law or agreed to in writing, software
		distributed under the License is distributed on an "AS IS" BASIS,
		WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
		See the License for the specific language governing permissions and
		limitations under the License.

		 What RTL URL Title Fix Does
		 ****************************
		 A small extension thats simulates RTL Languages letters Pronounce into English characters,when you type RTL Languages  text into Entry title field.
	*/

class Rtl_url_title_fix_ext {

	var $name			= 'RTL Url Title Fix';
	var $version 			= '1.0';
	var $description	= 'This Extintion converts the RTL Languages Characters to Latin for Your entry URL title';
	var $settings_exist	= 'n';
	var $docs_url		= 'http://akwad.net/';

	/**
	 * Constructor
	 */
	function Rtl_url_title_fix_ext($settings='')
	{
		$this->EE =& get_instance();
	}

	function RTL_characters()
	{
		$characters = array(
		// Hebrew
			// Vowels
		'1456' => '',
		'1457' => 'e',
		'1458' => 'a',
		'1459' => 'a',
		'1460' => 'i',
		'1461' => 'e',
		'1462' => 'e',
		'1463' => 'a',
		'1464' => 'a',
		'1465' => 'o',
		'1466' => 'o',
		'1467' => 'u',
		'1468' => '',
		'1469' => '',
		'1470' => '',
		'1471' => '',
		'1472' => '',
		'1473' => 'h',
		'1474' => '',
		'1475' => '',
		'1476' => '',
		'1477' => '',
		'1478' => '',
		'1479' => 'a',

			// Letters (assuming vowels are included)
/*		'1488' => '',
		'1489' => 'b',
		'1490' => 'g',
		'1491' => 'd',
		'1492' => 'h',
		'1493' => 'v',
		'1494' => 'z',
		'1495' => 'ch',
		'1496' => 't',
		'1497' => 'y',
		'1498' => 'ch',
		'1499' => 'ch',
		'1500' => 'l',
		'1501' => 'm',
		'1502' => 'm',
		'1503' => 'n',
		'1504' => 'n',
		'1505' => 's',
		'1506' => '',
		'1507' => 'p',
		'1508' => 'p',
		'1509' => 'tz',
		'1510' => 'tz',
		'1511' => 'k',
		'1512' => 'r',
		'1513' => 's',
		'1514' => 't',*/

			// Letters (assuming no vowels)
		'1488' => 'a',
		'1489' => 'b',
		'1490' => 'g',
		'1491' => 'd',
		'1492' => 'h',
		'1493' => 'o',
		'1494' => 'z',
		'1495' => 'ch',
		'1496' => 't',
		'1497' => 'i',
		'1498' => 'ch',
		'1499' => 'ch',
		'1500' => 'l',
		'1501' => 'm',
		'1502' => 'm',
		'1503' => 'n',
		'1504' => 'n',
		'1505' => 's',
		'1506' => 'a',
		'1507' => 'p',
		'1508' => 'p',
		'1509' => 'tz',
		'1510' => 'tz',
		'1511' => 'k',
		'1512' => 'r',
		'1513' => 's',
		'1514' => 't',


		// Arabic
		'1569' => '\'a',
		'1575' => 'a',
		'1570' => 'a',
		'1571' => 'a',
		'1573' => 'ae',
		'1609' => 'a',
		'1576' => 'b',
		'1577' => 't',
		'1578' => 't',
		'1579' => 'th',
		'1580' => 'j',
		'1581' => 'h',
		'1582' => 'kh',
		'1583' => 'd',
		'1584' => 'th',
		'1585' => 'r',
		'1586' => 'z',
		'1587' => 's',
		'1588' => 'sh',
		'1589' => 's',
		'1590' => 'dh',
		'1591' => 't',
		'1592' => 'dh',
		'1593' => 'a',
		'1594' => 'gh',
		'1600' => '',
		'1601' => 'f',
		'1602' => 'g',
		'1603' => 'k',
		'1604' => 'l',
		'1605' => 'm',
		'1606' => 'n',
		'1607' => 'h',
		'1608' => 'w',
		'1572' => 'w',
		'1610' => 'y',
		'1574' => 'a',
		'1615' => 'o',
		'1611' => 'n',
		'1613' => 'en',
		'1612' => 'on',
		'1614' => 'a',
		'1616' => 'i'
		);

		return $characters;
	}


	function activate_extension() {

	      $data = array(
	        'class'      => __CLASS__,
	        'method'    => "RTL_characters",
	        'hook'      => "foreign_character_conversion_array",
	        'settings'    => '',
	        'priority'    => 10,
	        'version'    => $this->version,
	        'enabled'    => "y"
	      );

	      // insert ext in database
	      $this->EE->db->insert('exp_extensions', $data);
	  }


	  function disable_extension() {

	      $this->EE->db->where('class', __CLASS__);
	      $this->EE->db->delete('exp_extensions');
	  }

	 /**
	 * Update Extension
	 *
	 * This function performs any necessary db updates when the extension page is visited
	 *
	 * @return 	mixed void on update / false if none
	 */
	function update_extension($current = '')
	{
		if ($current == '' OR $current == $this->version)
		{
			return FALSE;
		}

		if ($current < $this->version)
		{
			// Update to version 1.0
		}

		$this->EE->db->where('class', __CLASS__);
		$this->EE->db->update('extensions', array('version' => $this->version));
	}
}
// END CLASS
