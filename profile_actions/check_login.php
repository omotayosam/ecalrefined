<?php include '../include/session.php'; ?>
<?php
if (empty($user)) {
	# code...
	$return = 'false';

} else {
	# code...
	$return = 'true';
}

echo json_encode(['logged_in' => $return]);