<?php
/**
 * =-=-=-=-=-=- !BEGIN COPYRIGHT/LICENSE NOTICE! -=-=-=-=-=-=
 * MIT License
 *
 * Copyright (c) 2016 BinaryEvolved (BinaryEvolved.com)
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 * =-=-=-=-=-=- !END COPYRIGHT/LICENSE NOTICE! -=-=-=-=-=-=
 */


class EasyPHP
{
    private $config = array();
    private $settings = null;
    private $db = null;


    /**
     * EasyPHP constructor.
     */
    public function __construct()
    {
        /*
         * Begin Configuration
        */

        /**
         * Database Connection Details:
         */
        //Host(or IP) used to connect to the database server
        $this->config['db_host'] = "127.0.0.1";
        //Username used to connect to database server
        $this->config['db_username'] = "root";
        //Password used to connect to database server
        $this->config['db_password'] = "";
        //Name of database to select on database server
        $this->config['db_database'] = "easyphp";

        /*
         * End Configuration
         */

        /*
         * Begin Initialization
         */

        //Construct new PDO driver for MySQL
        $this->db = new PDO('mysql:host=localhost;'.
            'dbname='.$this->config['db_database'].
            ';charset=utf8mb4',
            $this->config['db_username'],
            $this->config['db_password'],
            array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false
        ));

        //Populate settings array
        if (!$this->refreshSettings())
            die('Refresh Settings Failed @ Initialization');


    }

    /**
     * Refreshes settings from database, and populates internal values in class
     * @return bool Returns true if refresh was successful
     */
    public function refreshSettings()
    {
        try {
            $settingsQuery = $this->db->prepare('SELECT * FROM `settings`;');
            $settingsQuery->execute();
            $settingsResults = $settingsQuery->fetchAll(PDO::FETCH_BOTH);
            $this->settings = null;
            $this->settings['SettingsTotal'] = $settingsQuery->rowCount();
            foreach($settingsResults as $value){
                $this->settings[$value['name']] = $value['value'];
            }
        } catch (PDOException $e) {
            // ## Write Log -> $e
            return false;
        }
        return true;

    }

    /**
     * Returns the value of a setting for supplied setting name
     * @param $key Name of setting
     * @return mixed Value of setting requested, returns false if non-existent setting
     */
    public function retrieveSettings($key)
    {
        if (isset($this->settings[$key]))//Check if key has an assigned value
             if (!$this->settings == null)
                return $this->settings[$key];
        return false;
    }
}

$ezphp = new EasyPHP();
echo $ezphp->retrieveSettings('test');
