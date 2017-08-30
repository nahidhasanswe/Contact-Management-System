<?php 
include 'ContactAtt.php';

class DataOperation{


	function valid_Input($data)
	{
		$data=trim($data);
		$data=stripcslashes($data);
		$data=htmlspecialchars($data);
		$data=htmlentities($data);

		return $data;
	}

	function getContactList()
	{
		$db = mysqli_connect('localhost','root','','contact');

		$query='SELECT * FROM contactlist ORDER BY Name';

		$result=mysqli_query($db,$query);
		

		$contactList=array();

		$i=0;
		while($row=mysqli_fetch_assoc($result))
		{
			$contact=new contactInfo();

			$contact->Id=$row['Id'];
			$contact->Name=$row['Name'];
			$contact->Address=$row['Address'];
			$contact->City=$row['City'];
			$contact->District=$row['District'];
			$contact->Zipcode=$row['Zipcode'];
			$contact->Email=$row['Email'];
			$contact->Phone=$row['Phone'];
			$contact->Image=$row['Image'];

			$contactList[$i]=json_encode($contact);
			$i++;
		}

		return $contactList;
	}

	function addContact($Info)
	{

		$db = mysqli_connect('localhost','root','','contact');

		$contact=new contactinfo();
		$contact=$Info;

		$stmt=$db->prepare('INSERT INTO contactlist(Id,Name,Address,City,District,Zipcode,Email,Phone,Image) VALUES(null,?,?,?,?,?,?,?,?)');

		$stmt->bind_param('ssssssss',$contact->Name,$contact->Address,$contact->City,$contact->District,$contact->Zipcode,$contact->Email,$contact->Phone,$contact->Image);

		if($stmt->execute())
			return true;
		else
			return false;
	}

	function getContactSearch($search)
	{
		$db = mysqli_connect('localhost','root','','contact');

		$stmt=$db->prepare("SELECT * FROM contactlist WHERE Name LIKE ? ORDER BY Name");
		$srch=$search.'%';
		$stmt->bind_param('s',$srch);
		$stmt->execute();

		$result=$stmt->get_result();
		
		$contactList=array();

		$i=0;
		while($row=mysqli_fetch_assoc($result))
		{
			$contact=new contactInfo();

			$contact->Id=$row['Id'];
			$contact->Name=$row['Name'];
			$contact->Address=$row['Address'];
			$contact->City=$row['City'];
			$contact->District=$row['District'];
			$contact->ZipCode=$row['Zipcode'];
			$contact->Email=$row['Email'];
			$contact->Phone=$row['Phone'];
			$contact->Image=$row['Image'];

			$contactList[$i]=json_encode($contact);
			$i++;
		}
		
		return $contactList;
	}

	function getDetails($id)
	{
		$db = mysqli_connect('localhost','root','','contact');

		$ID=htmlspecialchars_decode($id);

		$stmt=$db->prepare('SELECT * FROM contactlist WHERE Id=?');
		$stmt->bind_param('i',$ID);
		$stmt->execute();

		$result=$stmt->get_result();

		$contact=new contactInfo();

		while ($row=mysqli_fetch_assoc($result)) {
				$contact->Id=$row['Id'];
				$contact->Name=$row['Name'];
				$contact->Address=$row['Address'];
				$contact->City=$row['City'];
				$contact->District=$row['District'];
				$contact->Zipcode=$row['Zipcode'];
				$contact->Email=$row['Email'];
				$contact->Phone=$row['Phone'];
				$contact->Image=$row['Image'];
		}

		return $contact;
	}

	function UpdateInfo($Info)
	{
		$db = mysqli_connect('localhost','root','','contact');

		$contact=new contactinfo();
		$contact=$Info;

		$stmt=$db->prepare('UPDATE contactlist SET Name=?,Address=?,City=?,District=?,Zipcode=?,Email=?,Phone=?,Image=? WHERE Id=?');

		$stmt->bind_param('sssssssss',$contact->Name,$contact->Address,$contact->City,$contact->District,$contact->Zipcode,$contact->Email,$contact->Phone,$contact->Image,$contact->Id);

		if($stmt->execute())
			return true;
		else
			return false;
	}


	function DeleteContact($Id)
	{
		$db = mysqli_connect('localhost','root','','contact');

		$ID=htmlspecialchars_decode($Id);

		$stmt=$db->prepare('DELETE FROM contactlist WHERE Id=?');
		$stmt->bind_param('i',$ID);

		if($stmt->execute())
			return true;
		else
			return false;
	}

	function ChangePassword($user,$pass,$newpass)
	{
		$db = mysqli_connect('localhost','root','','contact');

		$stmt=$db->prepare('SELECT * FROM User WHERE username=? AND password=?');
		$stmt->bind_param('ss',$user,$pass);
		$stmt->execute();
		$result=$stmt->get_result();

		if(mysqli_num_rows($result)<1)
		{
			$stmt->close();
			return 'Old Password is wrong';
		}else
		{
			$stmt->close();

			$stmt=$db->prepare('UPDATE user SET password=? WHERE username=?');
			$stmt->bind_param('ss',$newpass,$user);

			if($stmt->execute())
				return 'success';
			else
				return 'Something went wrong';
		}

	
	}

	
}

 ?>