<?php


function uidExists($conn, $useruid) {
  $sql = "SELECT * FROM users WHERE usersUid = ?;";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
	 	header("location: ../signup.php?error=stmtfailed");
		exit();
	}

	mysqli_stmt_bind_param($stmt, "s", $useruid);
	mysqli_stmt_execute($stmt);

	// "Get result" returns the results from a prepared statement
	$resultData = mysqli_stmt_get_result($stmt);

	if ($row = mysqli_fetch_assoc($resultData)) {
		return $row;
	}
	else {
		$result = false;
		return $result;
	}

	mysqli_stmt_close($stmt);
}

function createUser($conn, $useruid, $pwd, $role) {
  $sql = "INSERT INTO users ( usersUid, usersPwd, usersRole) VALUES ( ?, ?, ?);";

	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
	 	header("location: ../signup.php?error=stmtfailed");
		exit();
	}

	$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

	mysqli_stmt_bind_param($stmt, "sss", $useruid, $hashedPwd, $role);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	mysqli_close($conn);
	echo "<script>
    alert('Your account is created successfully');
    window.location.href='../signin.html';
    </script>";
	exit();
}
function loginUser($conn, $useruid, $pwd) {
	$uidExists = uidExists($conn, $useruid);

	if ($uidExists === false) {
			echo "<script>
alert('Please check your username/password');
window.location.href='../signin.html';
</script>";
		exit();
	}

	$pwdHashed = $uidExists["usersPwd"];
	$checkPwd = password_verify($pwd, $pwdHashed);

	if ($checkPwd === false) {
		echo "<script>
alert('Please check your username/password');
window.location.href='../signin.html';
</script>";
		exit();
	}
	elseif ($checkPwd === true) {
		print_r(uidExists($conn,$useruid));
		session_start();
		$_SESSION["userid"] = $uidExists["usersUid"];
		$_SESSION["role"] = $uidExists["usersRole"];
		header("location: ../profile.php");
		exit();
	}
}