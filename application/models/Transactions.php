<?php
class Transactions extends CI_Model
	{
      	public function __construct()
      		{
      			parent::__construct();
      		}
      	public function getValue()
      		{
      		  $this->db->select('*,page.id as pagex');
      		  $this->db->from('pagegroup');
      		  $this->db->join('page','pagegroup.id=page.page_group_id');
      		  $dbh=$this->db->get();
      		  return $dbh->result();
      		}
      	public function insertRecords($pageid,$count)
      	    {
      	       //return $pageid;
               $this->db->where('pageid',$pageid);
               $this->db->where('date_format(date,"%Y-%m-%d")',date('Y-m-d'));
               $sub=$this->db->get('pagestats');
               //return json_encode($sub->result());
               $da=array('pageid'=>$pageid,'fans'=>$count);
               if($sub->num_rows()>0)
	               	{
	               		//unset($da['pageid']);                   
	                  $this->db->where('pageid',$pageid)
                             ->where('date_format(date,"%Y-%m-%d")',date('Y-m-d'));
	               	  $this->db->update('pagestats',$da);	
	               	}
               	else
                	{
                		$this->db->insert('pagestats',$da);
                	}
                if($this->db->affected_rows()>0)
                   {
                   		return 'success';
                   }
                else
                	{
                		return 'fail';
                	}   
      	    }
      	public function creategroup()
      		{
      			$arr=array('facebook','twitter');
      			foreach ($arr as  $value)
      				{
      					$this->db->query('insert into pagegroup(accountgroup,account_type)values("{$this->input->post("group")}","{$value}")');
      				}
      		    
      		}
        public function getGroups()
        	{
        		$this->db->select('distinct(accountgroup) as grp')
        		         ->from('pagegroup');

        		$dbh=$this->db->get();
        		if($dbh->num_rows()>0)
        		 	{
        		 		return $dbh->result();
        		 	}
        	}
        public function groupstats($group,$social=NULL)
        	{
        		$this->db->select('*,page.id as pageid')
        		         ->from('pagegroup')
        		         ->join('page','pagegroup.id=page.page_group_id')
        		         ->where('accountgroup',$group)
        		         ->where('account_type',$social);
        		$dbh=$this->db->get();
        		if($dbh->num_rows()>0)
        		 	{
        		 		return $dbh->result();
        		 	}

        	}
        public function getstats($id,$date,$x=NULL)
        	{
        		$this->db->select('*,date_format(date,"%d-%m-%Y") as date')
        		         ->from('page')
        		         ->join('pagestats','page.id=pagestats.pageid')
        		         ->join('pagegroup','pagegroup.id=page.page_group_id')
                         ->like('date',$date,'both')
                         ->where('pageid',$id);
                $dbh=$this->db->get();
                if($dbh->num_rows()>0)
            		 	{
                    if($x==NULL)
                      {
                        return $dbh->result();
                      }
                    else
                      {
                        return $dbh;
                      }
            		 	}
        	}
        public function getstats3($group,$date)
        	{
        		$this->db->select('*,date_format(date,"%d-%m-%Y") as date')
        		         ->from('page')
        		         ->join('pagestats','page.id=pagestats.pageid')
        		         ->join('pagegroup','pagegroup.id=page.page_group_id')
                         ->like('date',$date,'both')
                         ->where('accountgroup',$group);
                $dbh=$this->db->get();
                if($dbh->num_rows()>0)
        		 	{
        		 		return $dbh->result();
        		 	}
        	}	
        public function getstats2($name,$date,$social)
        	{
        		$this->db->select('*,date_format(date,"%d-%m-%Y") as date')
        		         ->from('page')
        		         ->join('pagestats','page.id=pagestats.pageid')
        		         ->join('pagegroup','pagegroup.id=page.page_group_id')
                         ->like('date',$date,'both')
                         ->where('name',$name)
                         ->where('account_type',$social);
                $dbh=$this->db->get();
                if($dbh->num_rows()>0)
        		 	{
        		 		return $dbh->result();
        		 	}
        	}
        
        public function label($y)
        	{
        		$this->db->select('distinct(name) as namex')
        		         ->from('page')
        		         ->join('pagegroup','pagegroup.id=page.page_group_id')
                         ->where('accountgroup',$y);
                $dbh=$this->db->get();
                if($dbh->num_rows()>0)
        		 	{
        		 		return $dbh->result();
        		 	}
        	}
        public function getDates()
            {
            	$dbh=$this->db->query('select * from ( select distinct(date_format(date,"%Y-%m-%d")) as date from pagestats order by date desc LIMIT 12)t ORDER BY date ASC');
            	         
                
                if($dbh->num_rows()>0)
        		 	{
        		 		return $dbh->result();
        		 	}
            }
	}