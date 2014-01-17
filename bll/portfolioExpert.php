<?php
	class portfolioExpert
	{
		private $db = null;

		public function __construct()
		{
			$this->db = new mysqli("localhost", "root", "", "seanmock4");
			if($this->db->connect_errno)
			{
				include("bll/connectfail.php");
			}
		}


		public function getAllEntries()
		{
			$q = "SELECT * FROM `portfolio`";

			return $this->db->query($q);

		} 

		public function getEntry($id)
		{
			$q = "SELECT * FROM `portfolio` where `id` = ?";

			$statement = $this->db->prepare($q);

			$statement->bind_param("i", $id);

			$statement->execute();

			$res = $statement->get_result();

			return $res->fetch_assoc();

		}

		public function editEntry($postdata)
		{
			$statement = null;

			// edit
			if($postdata['id'] != "")
			{
				$q = "UPDATE portfolio SET `name` = ?, `description` = ?, `type` = ?, `siteurl` = ?, `shortname` = ? WHERE `id` = ?";

				$statement = $this->db->prepare($q);
				$statement->bind_param("sssssi", $postdata['name'], $postdata['body'], $postdata['type'], $postdata['siteurl'], $postdata['shortname'], $postdata['id']);
				$statement->execute();


			}
			// new
			else
			{
				$q = "INSERT INTO portfolio(`name`, `description`, `type`, `siteurl`, `shortname`) VALUES(?, ?, ?, ?, ?)";

				$statement = $this->db->prepare($q);
				$statement->bind_param("sssss", $_POST['name'], $_POST['body'], $_POST['type'], $_POST['siteurl'], $_POST['shortname']);
				$statement->execute();

				$lastid = $this->db->insert_id;

				$q = "INSERT INTO portfolio_tags(`portfolio_id`, `tag`) VALUES(?, ?)";

				$statement = $this->db->prepare($q);

				foreach($postdata['tags'] as $tag)
				{
					$statement->bind_param("is", $lastid, $tag);
					$statement->execute();
				}
			}


		}



	}



?>