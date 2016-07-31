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

use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
include_once('simple_html_dom.php');


use Cake\ORM\TableRegistry;

/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link http://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController
{
    /**
     * Displays a view
     *
     * @return void|\Cake\Network\Response
     * @throws \Cake\Network\Exception\NotFoundException When the view file could not
     *   be found or \Cake\View\Exception\MissingTemplateException in debug mode.
     */

    public function home() {
	    $this->viewBuilder()->layout(false);
    }

    public function about() {
	    $this->viewBuilder()->layout(false);
    }

    public function tell() {
	    if($this->request->data) {
		    $articlesTable = TableRegistry::get('Stories');
		    $article = $articlesTable->newEntity();
		    $article->story = $this->request->data['story'];
		    $article->sector = $this->request->data['sector'];
		    $article->location = $this->request->data['location'];
		    $article->contact = $this->request->data['contact'];
		    $article->created = date('Y-m-d H:i:s', strtotime('+10 hours'));
		    if ($articlesTable->save($article)) {
			    $id = $article->id;
			    return $this->redirect(
					['controller' => 'Pages', 'action' => 'stories']
				);
			}
		}
    }

    public function stories() {
		$articles = TableRegistry::get('Stories');
		$query = $articles->find();
		$stories = [];
		foreach ($query as $row) {
			$stories[] = $row;
		}
		$this->set('stories',$stories);
    }

    public function factscode() {
	    $this->viewBuilder()->layout(false);
    }

    public function facts() {
	    $this->viewBuilder()->layout(false);
    }

    public function display()
    {
        $path = func_get_args();

        $count = count($path);
        if (!$count) {
            return $this->redirect('/');
        }
        $page = $subpage = null;

        if (!empty($path[0])) {
            $page = $path[0];
        }
        if (!empty($path[1])) {
            $subpage = $path[1];
        }
        $this->set(compact('page', 'subpage'));

        try {
            $this->render(implode('/', $path));
        } catch (MissingTemplateException $e) {
            if (Configure::read('debug')) {
                throw $e;
            }
            throw new NotFoundException();
        }
    }

	public function aqFundingRecipients()
	{
		$csv = utf8_encode(file_get_contents(WWW_ROOT . DS . '/csv/aq-funding-recipients.csv', true));

		print_r($this -> convertCSVtoJSON($csv));
		die();
	}

	public function sa3RegionInnovation()
	{
		$records = $this -> getRecordsFromDataGovAu('http://data.gov.au/api/action/datastore_search?resource_id=223e2340-5c0a-4bd8-8818-e3cd2fee13c8');

		print_r($records);
		die();
	}

	public function scienceCapability()
	{
		$records = $this -> getRecordsFromDataGovAu('https://data.qld.gov.au/api/action/datastore_search?resource_id=8b9178e0-2995-42ad-8e55-37c15b4435a3');
		$array = json_decode($records, true);

		foreach ( $array as $k=>$v )
		{
			$array[$k] ['subsector'] = $array[$k] ['Sub-sector'];
			$array[$k] ['keywords'] = $array[$k] ['Key words'];

			unset($array[$k]['Sub-sector']);
			unset($array[$k]['Key words']);
		}

		print_r(json_encode($array));
		die();
	}

	public function angelListInvestors()
	{
		$csv = utf8_encode(file_get_contents(WWW_ROOT . DS . '/csv/angellist/investors.csv', true));

		print_r($this -> convertCSVtoJSON($csv));
		die();
	}

	public function angelListStartups()
	{
		$csv = utf8_encode(file_get_contents(WWW_ROOT . DS . '/csv/angellist/startups.csv', true));

		print_r($this -> convertCSVtoJSON($csv));
		die();
	}

	public function brisbaneBusinessCentres()
	{
		$csv = utf8_encode(file_get_contents(WWW_ROOT . DS . '/csv/brisbane-business-centres.csv', true));

		print_r($this -> convertCSVtoJSON($csv));
		die();
	}

	public function scrapeStartups()
	{
		set_time_limit(500);
		$csv = utf8_encode(file_get_contents(WWW_ROOT . DS . '/csv/angellist/startups.csv', true));
		$array = json_decode($this -> convertCSVtoJSON($csv), true);
		$file = 'last.csv';

		//foreach ($array as $item)
		for ($i = 425; $i < count($array); $i++)
		{
			$item = $array[$i];
			$result = $this -> scrape($item['user_link']);
			$html = str_get_html($result);
			$headerArray = $html -> find('div[class=u-colorGray9 u-fontSize12 s-vgTop0_5]');
			$tags = '';

			$tagsArray = $headerArray[0] -> find('span[class=js-market_tags]');
			foreach ($tagsArray[0] -> find('a[class=tag]') as $tag)
			{
				$tags = $tags . $tag -> innertext . ';';
			}

			$url = $headerArray[0] -> children(3) -> children(4) -> children(0) -> href;
			$tagsAndURL = $tags . ',' . $url . PHP_EOL;
			echo $tagsAndURL . '<br>';

			file_put_contents($file, $tagsAndURL, FILE_APPEND | LOCK_EX);
		}

		die();
	}

	public function scrapeInvestors()
	{
		set_time_limit(500);
		$csv = utf8_encode(file_get_contents(WWW_ROOT . DS . '/csv/angellist/investors.csv', true));
		$array = json_decode($this -> convertCSVtoJSON($csv), true);

		//foreach ($array as $item)
		for ($i = 256; $i < count($array); $i++)
		{
			$item = $array[$i];
			$result = $this -> scrape($item['user_link']);
			$html = str_get_html($result);
			$headerArray = $html -> find('img[class=js-avatar-img]');
			echo $headerArray[0] -> src . '<br>';
		}

		die();
	}
}
