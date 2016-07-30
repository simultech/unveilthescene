<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
    }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return void
     */
    public function beforeRender(Event $event)
    {
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }

	public function convertCSVtoJSON($csv)
	{
		$array = array_map("str_getcsv", explode("\n", $csv));

		array_walk($array, function(&$a) use ($array)
		{
			$a = array_combine($array[0], $a);
	    });
    	array_shift($array); # remove column header

		return json_encode($array);
	}

	// Because all data from the data.gov.au & data.qld.gov.au API has the format of data.result.records
	public function getRecordsFromDataGovAu($url)
	{
		$json = json_decode(file_get_contents($url));
		$records = json_encode($json -> result -> records);

		return $records;
	}

	function scrape($url)
    {
        $headers = Array(
                    "Accept: text/xml,application/xml,application/xhtml+xml,text/html;q=0.9,text/plain;q=0.8,image/png,*/*;q=0.5",
                    "Cache-Control: max-age=0",
                    "Connection: keep-alive",
                    "Keep-Alive: 300",
                    "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7",
                    "Accept-Language: en-us,en;q=0.5",
                    "Pragma: "
                );
        $config = Array(
                        CURLOPT_SSL_VERIFYPEER => false,
                        CURLOPT_SSL_VERIFYHOST => 0,
                        CURLOPT_CAINFO => getcwd() . '\CAcert.pem',
                        CURLOPT_RETURNTRANSFER => TRUE ,
                        CURLOPT_FOLLOWLOCATION => TRUE ,
                        CURLOPT_AUTOREFERER => TRUE ,
                        CURLOPT_CONNECTTIMEOUT => 120 ,
                        CURLOPT_TIMEOUT => 120 ,
                        CURLOPT_MAXREDIRS => 10 ,
                        CURLOPT_USERAGENT => "Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.9.1a2pre) Gecko/2008073000 Shredder/3.0a2pre ThunderBrowse/3.2.1.8"
                       ) ;
        $handle = curl_init($url) ;
        curl_setopt_array($handle,$config) ;
        curl_setopt($handle,CURLOPT_HTTPHEADER,$headers) ;
        $result = curl_exec($handle) ;

        curl_close($handle) ;
        return $result ;
    }
}
