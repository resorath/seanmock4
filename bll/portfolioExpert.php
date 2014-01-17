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
			$q = "SELECT `portfolio`.`id`, `name`, `type`, `siteurl`, `shortname`, GROUP_CONCAT(distinct `imageurl`) as imgurl, GROUP_CONCAT(distinct `thumburl`) as thumburl, GROUP_CONCAT(distinct `tag`) as tag FROM `portfolio` JOIN `portfolio_images` on `portfolio`.`id` = `portfolio_images`.`portfolio_id` JOIN `portfolio_tags` on `portfolio`.`id` = `portfolio_tags`.`portfolio_id`";

			return $this->db->query($q);

		} 

		public function getAllData()
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


				// do statements

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


				// do uploads

				$images_tmp = $_FILES['images']['tmp_name'];
				$images_name = $_FILES['images']['name'];
				$images_error = $_FILES['images']['error'];

				$thumbs_tmp = $_FILES['thumbs']['tmp_name'];
				$thumbs_name = $_FILES['thumbs']['name'];
				$thumbs_error = $_FILES['thumbs']['error'];



				for($i = 0; $i < sizeof($images_tmp); $i++)
				{
					if($images_error[$i] == 0)
						move_uploaded_file($images_tmp[$i], "img/" . $images_name[$i]);
				}

				for($i = 0; $i < sizeof($thumbs_tmp); $i++)
				{
					if($thumbs_error[$i] == 0)
						move_uploaded_file($thumbs_tmp[$i], "img/" . $thumbs_name[$i]);
				}

				// more queries
				$q = "INSERT INTO portfolio_images(`portfolio_id`, `imageurl`, `thumburl`, `isPrimary`) VALUES(?, ?, ?, ?)";

				$statement = $this->db->prepare($q);

				$primary = true;
				for($i = 0; $i < sizeof($images_tmp); $i++)
				{
					if($images_error[$i] == 0)
					{
						if($i > 0)
							$primary = false;

						$statement->bind_param("issi", $lastid, $images_name[$i], $thumbs_name[$i], $primary);
						$statement->execute();
					}
				}

			}


		}

	}



?>