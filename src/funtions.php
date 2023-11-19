<?php

// function redirect(string $path)
// {
// 	header('Location: ' . $path);
// 	exit;
// }
function redirect($location, array $data = [])
	{
		foreach ($data as $key => $value) {
			$_SESSION[$key] = $value;
		}

		header('Location: ' . $location);
		exit();
	}
function render_page(string $document, array $data = [])
{
	$path = VIEWS_DIR . "/{$document}.php";
	extract($data, EXTR_PREFIX_SAME, '__var_');
	require VIEWS_DIR . '/header.php';
	require($path);
	require VIEWS_DIR . '/footer.php';
}
function render_view(string $document, array $data = [])
{
	$path = VIEWS_DIR . "/{$document}.php";
	extract($data, EXTR_PREFIX_SAME, '__var_');
	require($path);
}
function render_login(string $document)
{
	$path = VIEWS_DIR . "/{$document}.php";
	require($path);
}
function render_view_admin(string $document, array $data = [])
{	
	$path = ADMIN_DIR . "/{$document}.php";
	extract($data, EXTR_PREFIX_SAME, '__var_');
	require($path);
}
function render_page_admin(string $document, array $data = [])
{	
	$path = ADMIN_DIR . "/{$document}.php";
	extract($data, EXTR_PREFIX_SAME, '__var_');
	require ADMIN_DIR . '/header.php';
	require($path);
	require ADMIN_DIR . '/footer.php';
}

function render_login_admin(string $document)
{
	$path = ADMIN_DIR . "/{$document}.php";
	require($path);
}
function session_get_flash($key, $default = null)
{
	$message = $default;
	if (isset($_SESSION[$key])) {
		$message = $_SESSION[$key];
		unset($_SESSION[$key]);
	}
	return $message;
}
function uploadFile($fileToUpload)
{
	$targetDir = "uploads/"; // Thư mục chứa tệp tin đã tải lên
	$targetFile = $targetDir . basename($fileToUpload["name"]); // Đường dẫn đầy đủ của tệp tin đã tải lên
	$hasErrors = false; // Biến đánh dấu xem có lỗi xảy ra trong quá trình xử lý không
	$imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION)); // Định dạng của tệp tin đã tải lên
	$extensions = array("jpeg", "jpg", "png", "gif"); // Các định dạng được phép cho tệp tin
	// Kiểm tra xem tệp tin đã tải lên có phải là ảnh hay không
	if (isset($_POST["submit"])) { 
		$check = getimagesize($fileToUpload["tmp_name"]); 
		if ($check !== false) { 
			echo "Tệp tin là ảnh - " . $check["mime"] . ". "; 
		} else { 
			echo "Tệp tin không phải là ảnh."; 
			$hasErrors = true; 
		} 
	} 
	// Kiểm tra xem tệp tin đã tải lên có tồn tại trên server hay không
	// if (file_exists($targetFile)) { 
	// 	echo "Xin lỗi, tệp tin đã tồn tại."; 
	// 	$hasErrors = true; 
	// } 

	// Kiểm tra kích thước của tệp tin đã tải lên
	if ($_FILES["fileToUpload"]["size"] > 500000) { 
		echo "Xin lỗi, tệp tin của bạn quá lớn."; 
		$hasErrors = true; 
	} 

	// Kiểm tra định dạng của tệp tin đã tải lên
	if (! in_array($imageFileType, $extensions)) { 
		echo "Xin lỗi, chỉ có thể tải lên các tệp tin JPG, JPEG, PNG & GIF."; 
		$hasErrors = true; 
	} 
	// Kiểm tra xem có lỗi xảy ra trong quá trình xử lý không
	if ($hasErrors) { 
		return null;
	// Nếu không có lỗi, tiến hành tải lên tệp tin
	} else { 
		if (move_uploaded_file($fileToUpload["tmp_name"], $targetFile)) { 
			return $targetFile;
		} else { 
			return null;
		} 
	} 
}
function total_price(){
	$total=0;
	foreach ($_SESSION['cart'] as $cart) {
			
			$subtotal=$cart['quantity']*$cart['price'];
			$total+=$subtotal;
	}
	return $total;
}

function currency_format($number, $suffix = 'đ') {
	if (!empty($number)) {
		return number_format($number, 0, ',', '.') . " <u>{$suffix}</u>";
	}
}
function PDO(): \PDO
{
	global $PDO;
	return $PDO;
}
