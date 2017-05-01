<?PHP

session_start();
	require 'connection.php';

	try{
		$username = $_POST['username'];
		$password = $_POST['password'];
		$type= $_POST['type'];

		if($type=='student')
		{
			if ($username == NULL || $password == NULL)
			{
				echo 'ERROR: Username or Password is not provided';
			}
			$collection = new MongoCollection($db, 'users');
			$condition = array('user' => 'it2');
			$cursor = $collection->find(array('username' => $username, 'password' => $password));
			$test = array();
			while( $cursor->hasNext() )
			{
				$test[] = ($cursor->getNext());
			}
			if ($test == NULL)
			{

			}
			else
			{
				if($type=='student')
				{

					$_SESSION['usernames'] = $username;
					header ("location:Student1.php");
				}
				else
				{
					echo 'not found';
				}
			$conn->close();
			}
		}

		if($type=='teacher')
		{
			if ($username == NULL || $password == NULL)
			{
				echo 'ERROR: Username or Password is not provided';
			}
			$collection = new MongoCollection($db, 'teacherinfo');
			$condition = array('user' => 'it2');
			$cursor = $collection->find(array('username' => $username, 'password' => $password));
			$test = array();
			while( $cursor->hasNext() )
			{
				$test[] = ($cursor->getNext());
			}
			if ($test == NULL)
			{

			}
			else
			{
				if($type=='teacher')
				{
					$_SESSION['usernamet'] = $username;
					header ("location:teacher.php");
				}
			$conn->close();
			}
		}

		if($type=='admin')
		{
			if ($username == NULL || $password == NULL)
			{
				echo 'ERROR: Username or Password is not provided';
			}
			$collection = new MongoCollection($db, 'admin');
			$condition = array('user' => 'it2');
			$cursor = $collection->find(array('username' => $username, 'password' => $password));
			$test = array();
			while( $cursor->hasNext() )
			{
				$test[] = ($cursor->getNext());
			}
			if ($test == NULL)
			{

			}
			else
			{
				if($type=='admin')
				{
					$_SESSION['usernamea'] = $username;
					header ("location:admin.php");
				}
				else{
					echo 'not found';
				}
			$conn->close();
			}
		}

	}
	catch (MongoConnectionException $e)
	{
		die('Error connecting to MongoDB server');
	}
	catch (MongoException $e)
	{
		die('Error: ' . $e->getMessage());
	}
?>
