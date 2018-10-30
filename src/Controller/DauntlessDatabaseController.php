<?php

namespace App\Controller;

use App\Entity\Gamedata;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DauntlessDatabaseController extends AbstractController
{
	const GAMEID = 2;
	const BEHEMOTHID = 1;

    /**
     * @Route("/dauntless/database", name="dauntless_database")
     */
    public function index()
    {

        return $this->render('dauntless_database/index.html.twig', [
            'controller_name' => 'DauntlessDatabaseController',
            'skin' => 'dark'
        ]);
    }

    /**
     * [behemoth description]
     * @Route("/dauntless/database/behemoth", name="dauntless_database_behemoth")
     * @param  [type] $search [description]
     * @return [type]         [description]
     */
    public function behemoth($search='')
    {
		if(!empty($search))
		{
			$product = $this->getDoctrine()->getRepository(Gamedata::class)->find($id);
		}
		else
		{			
			$doctrine = $this->getDoctrine();
			$doctrineConnection = $doctrine->getConnection();
			$stack = new \Doctrine\DBAL\Logging\DebugStack();
        	$doctrineConnection->getConfiguration()->setSQLLogger($stack);
        	$em = $doctrine->getManager();

        	$gamedata = $em->getRepository(Gamedata::class);
				
			$behemoths = $gamedata->findBy([ 
				'gameId'=>self::GAMEID,
	    		'datatypeId'=>self::BEHEMOTHID,
		    ]);

		    if(!empty($behemoths))
		    {
		    	foreach($behemoths as $key=>$behemoth)
		    	{
		    		$behemoth->image = 'behemoth.png';
		    		$behemoth->icon = 'behemoth.png';
		    		$data = $behemoth->getDatavalues();
		    		$behemoth->element = '';
		    		$behemoth->weakness = '';
		    		if(!empty($data))
				    {
				    	foreach($data as $property)
				    	{
			    			switch($property->getType())
			    			{
			    				case 'element':
			    						$behemoth->element = $property->getDatatypeId();
			    					break;
			    				case 'weakness':
			    						$behemoth->weakness = $property->getDatatypeId();
			    					break;
			    				case 'image':
			    						$behemoth->image = $property->getValue();
			    					break;
			    				case 'icon':
			    						$behemoth->icon = $property->getValue();
			    					break;
			    			}
				    	}
				    }				    
		    	}
		    }
		}
    	return $this->render('dauntless_database/behemoth.html.twig', ['skin' => 'dark','behemoths'=>$behemoths]);
    }
}
