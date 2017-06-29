<?php
class Fans extends CI_Controller
	{
		public function __construct()
		   {
		   		parent::__construct();
		   		$this->load->model('transactions');
		   }
		public function index()
		    {
		    	
		    	$data['view']='dashboard';
		    	$this->load->view('structure',$data); 
		    }
		public function twitter($page)
		    {

		    	
		    	try{
                        set_time_limit(0);
		    		    require_once( APPPATH . "third_party/TwitterAPIExchange.php" ); 
				    	$settings = array(
											'oauth_access_token' => "90997554-rKOODYPlO6mHFS0Q65kIt3Cv4K9xuKTkOkHIC0996",
											'oauth_access_token_secret' => "iBNFr3laSZV1LuJvSQebKbffPKgIkTbhO4CDxDelxVwtR",
											'consumer_key' => "97u8vOQFQfrZLA5l33JQZNpuh",
											'consumer_secret' => "XfUu472JZTWb2YiJMLH75EfbLU4vcYqyTcuGQCMxas65vpPd1x"
											);

						$ta_url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
						$getfield = '?screen_name='.$page;
						$requestMethod = 'GET';
						$twitter = new TwitterAPIExchange($settings);
						$follow_count=$twitter->setGetfield($getfield)
						->buildOauth($ta_url, $requestMethod)
						->performRequest();
						$data = json_decode($follow_count, true);
						@$followers_count=$data[0]['user']['followers_count'];
						return $followers_count;
			     	}
			    catch(Exception $e)
			        {
			        	echo $e->getMessage();
			        }
   
		    }
		public function facebook($page)
			{
				try{
		               	$resp = file_get_contents('https://graph.facebook.com/'.$page.'/?fields=fan_count&access_token=1601457996848009|2a9e7b13e53438eef0f7c4ff0a665c5d');
						$y=json_decode($resp);
						return @$y->fan_count;
					}
				catch(Exception $e)
					{
						echo $e->getMessage();
					}
			}
		public function act()
			{
				
				$x=$this->transactions->getValue();
				
				foreach($x as $value)
					{
                        switch($value->account_type)
                        	{
                        		case 'facebook':
                        		                 $fans=$this->facebook($value->name);
                        		                 break;
                        		case 'twitter':
                        		                 $fans=$this->twitter($value->name);
                        		                 break;

                        	}
                        $insert= $this->transactions->insertRecords($value->pagex,$fans);	
                        echo $value->account_type. ' - '.$value->name.':'.$fans.' ->'.$insert.':'.$value->pagex.'</br >';

					}
			}
		public function group()
			{
				$data['msg']=FALSE;
				if($this->input->post())
					{
						$data['msg']=json_encode($this->input->post());
					}
				$data['view']='group';
		    	$this->load->view('structure',$data); 
			}
        public function pages()
        	{
                $data['view']='pages';
		    	$this->load->view('structure',$data); 
        	}
        public function reports($group=null)
        	{
        		$data['date']=$y=$this->transactions->getDates();
        		
                $social=array('facebook','twitter');
                foreach($social as $soc)
	                {
		        		$j=$this->transactions->groupstats($group,$soc);
		        		//var_dump($j);
		        		foreach ($j as $val) 
		        			{
		        				foreach ($y as $value)
		        				   	{
		        					     $data['records'][$value->date][$soc][]=$this->transactions->getstats($val->pageid,$value->date);   				
		        					}
		        				
		        			}
	                }
                $data['view']='reports';
		    	$this->load->view('structure',$data); 
		    	
        	}
        function createcsv($group='entertainment')
        	{
		        $this->load->dbutil();
		        $this->load->helper('file');
		        $this->load->helper('download');
		        $delimiter = ",";
		        $newline = "\r\n";
		        $filename = "report.csv";

		        $query = $this->db->query("SELECT `date`, `name`, `fans` from page join pagegroup join pagestats on page.id=pagestats.pageid and pagegroup.id=page.page_group_id where accountgroup='Newspapers' and account_type='facebook'  order by `date` desc"); //USE HERE YOUR QUERY
		        //$result = $this->db->query($query);
		       
		        $data = $this->dbutil->csv_from_result($query, $delimiter, $newline);
		        force_download($filename, $data);

    		}

	}
?>