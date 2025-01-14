<?php
	// Edit these lines
	$your_name = "Your Name";
	$your_email = "leonoorelise@gmail.com";
	//Subject Field
	$mail_subject = "You have a message sent from your site";
?>

<?php
//If the form is submitted
if(isset($_POST['name'])) {

		//Check to make sure that the name field is not empty
		if(trim($_POST['name']) === '') {
			$hasError = true;
			$errorMessage = "You have forgot to type your name!";
		} else {
			$name = trim($_POST['name']);
		}

		//Check to make sure sure that a valid email address is submitted
		if(trim($_POST['email']) === '')  {
			$hasError = true;
			$errorMessage = "You have forgot to type an email!";
		} else if (!preg_match("/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,5})$/i", trim($_POST['email']))) {
			$hasError = true;
			$errorMessage = "Please enter a valid email address!";
		} else {
			$email = trim($_POST['email']);
		}

		// Company Name
		$companyname = trim($_POST['companyname']);

		// Phone Number
		$phone = trim($_POST['phone']);

		//Check to make sure messages were entered
		if(trim($_POST['message']) === '') {
			$hasError = true;
			$errorMessage = "You have forgot to type a message!";
		} else {
			if(function_exists('stripslashes')) {
				$message = stripslashes(trim($_POST['message']));
			} else {
				$message = trim($_POST['message']);
			}
		}

		//If there is no error, send the email
		if(!isset($hasError)) {

			$emailTo = $your_email;
			$subject = $mail_subject.' from '.$name;

			//message body
			$body  = "Here is what was sent:\n\n";
			$body .="Name: $name \n\n";
			$body .="Company Name: $companyname \n\n";
			$body .="Email: $email \n\n";
			$body .="Phone Number: $phone \n\n";
			$body .="Message: $message";


			$headers = 'From: '.$name.' <'.$email.'>' . "\r\n" . 'Reply-To: ' . $email;

			mail($emailTo, $subject, $body, $headers);

			$emailSent = true;
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Julie Creative Portfolio</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="format-detection" content="telephone=no">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="author" content="">
  <meta name="keywords" content="">
  <meta name="description" content="">
  <link rel="stylesheet" type="text/css" href="css/vendor.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="style.css">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;700;900&display=swap" rel="stylesheet">
</head>

<body class="bg-body homepage post-template">
  <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
		<defs>
			<symbol xmlns="http://www.w3.org/2000/svg" id="instagram" viewBox="0 0 15 15">
				<path fill="none" stroke="currentColor"
					d="M11 3.5h1M4.5.5h6a4 4 0 0 1 4 4v6a4 4 0 0 1-4 4h-6a4 4 0 0 1-4-4v-6a4 4 0 0 1 4-4Zm3 10a3 3 0 1 1 0-6a3 3 0 0 1 0 6Z" />
			</symbol>
			<symbol xmlns="http://www.w3.org/2000/svg" id="facebook" viewBox="0 0 15 15">
				<path fill="none" stroke="currentColor"
					d="M7.5 14.5a7 7 0 1 1 0-14a7 7 0 0 1 0 14Zm0 0v-8a2 2 0 0 1 2-2h.5m-5 4h5" />
			</symbol>
			<symbol xmlns="http://www.w3.org/2000/svg" id="twitter" viewBox="0 0 15 15">
				<path fill="currentColor"
					d="m14.478 1.5l.5-.033a.5.5 0 0 0-.871-.301l.371.334Zm-.498 2.959a.5.5 0 1 0-1 0h1Zm-6.49.082h-.5h.5Zm0 .959h.5h-.5Zm-6.99 7V12a.5.5 0 0 0-.278.916L.5 12.5Zm.998-11l.469-.175a.5.5 0 0 0-.916-.048l.447.223Zm3.994 9l.354.353a.5.5 0 0 0-.195-.827l-.159.474Zm7.224-8.027l-.37.336l.18.199l.265-.04l-.075-.495Zm1.264-.94c.051.778.003 1.25-.123 1.606c-.122.345-.336.629-.723 1l.692.722c.438-.42.776-.832.974-1.388c.193-.546.232-1.178.177-2.006l-.998.066Zm0 3.654V4.46h-1v.728h1Zm-6.99-.646V5.5h1v-.959h-1Zm0 .959V6h1v-.5h-1ZM10.525 1a3.539 3.539 0 0 0-3.537 3.541h1A2.539 2.539 0 0 1 10.526 2V1Zm2.454 4.187C12.98 9.503 9.487 13 5.18 13v1c4.86 0 8.8-3.946 8.8-8.813h-1ZM1.03 1.675C1.574 3.127 3.614 6 7.49 6V5C4.174 5 2.421 2.54 1.966 1.325l-.937.35Zm.021-.398C.004 3.373-.157 5.407.604 7.139c.759 1.727 2.392 3.055 4.73 3.835l.317-.948c-2.155-.72-3.518-1.892-4.132-3.29c-.612-1.393-.523-3.11.427-5.013l-.895-.446Zm4.087 8.87C4.536 10.75 2.726 12 .5 12v1c2.566 0 4.617-1.416 5.346-2.147l-.708-.706Zm7.949-8.009A3.445 3.445 0 0 0 10.526 1v1c.721 0 1.37.311 1.82.809l.74-.671Zm-.296.83a3.513 3.513 0 0 0 2.06-1.134l-.744-.668a2.514 2.514 0 0 1-1.466.813l.15.989ZM.222 12.916C1.863 14.01 3.583 14 5.18 14v-1c-1.63 0-3.048-.011-4.402-.916l-.556.832Z" />
			</symbol>
			<symbol xmlns="http://www.w3.org/2000/svg" id="pinterest" viewBox="0 0 15 15">
				<path fill="none" stroke="currentColor"
					d="m4.5 13.5l3-7m-3.236 3a2.989 2.989 0 0 1-.764-2V7A3.5 3.5 0 0 1 7 3.5h1A3.5 3.5 0 0 1 11.5 7v.5a3 3 0 0 1-3 3a2.081 2.081 0 0 1-1.974-1.423L6.5 9m1 5.5a7 7 0 1 1 0-14a7 7 0 0 1 0 14Z" />
			</symbol>
			<symbol xmlns="http://www.w3.org/2000/svg" id="youtube" viewBox="0 0 15 15">
				<path fill="currentColor"
					d="m1.61 12.738l-.104.489l.105-.489Zm11.78 0l.104.489l-.105-.489Zm0-10.476l.104-.489l-.105.489Zm-11.78 0l.106.489l-.105-.489ZM6.5 5.5l.277-.416A.5.5 0 0 0 6 5.5h.5Zm0 4H6a.5.5 0 0 0 .777.416L6.5 9.5Zm3-2l.277.416a.5.5 0 0 0 0-.832L9.5 7.5ZM0 3.636v7.728h1V3.636H0Zm15 7.728V3.636h-1v7.728h1ZM1.506 13.227c3.951.847 8.037.847 11.988 0l-.21-.978a27.605 27.605 0 0 1-11.568 0l-.21.978ZM13.494 1.773a28.606 28.606 0 0 0-11.988 0l.21.978a27.607 27.607 0 0 1 11.568 0l.21-.978ZM15 3.636c0-.898-.628-1.675-1.506-1.863l-.21.978c.418.09.716.458.716.885h1Zm-1 7.728a.905.905 0 0 1-.716.885l.21.978A1.905 1.905 0 0 0 15 11.364h-1Zm-14 0c0 .898.628 1.675 1.506 1.863l.21-.978A.905.905 0 0 1 1 11.364H0Zm1-7.728c0-.427.298-.796.716-.885l-.21-.978A1.905 1.905 0 0 0 0 3.636h1ZM6 5.5v4h1v-4H6Zm.777 4.416l3-2l-.554-.832l-3 2l.554.832Zm3-2.832l-3-2l-.554.832l3 2l.554-.832Z" />
			</symbol>
			<symbol xmlns="http://www.w3.org/2000/svg" id="dribble" viewBox="0 0 15 15">
				<path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
					d="M4.839 1.024c3.346 4.041 5.096 7.922 5.704 12.782M.533 6.82c5.985-.138 9.402-1.083 11.97-4.216M2.7 12.594c3.221-4.902 7.171-5.65 11.755-4.293M14.5 7.5a7 7 0 1 0-14 0a7 7 0 0 0 14 0Z" />
			</symbol>
			<symbol xmlns="http://www.w3.org/2000/svg" id="calendar" viewBox="0 0 24 24">
				<g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
					<rect width="20" height="18" x="2" y="4" rx="4" />
					<path d="M8 2v4m8-4v4M2 10h20" />
				</g>
			</symbol>
			<symbol xmlns="http://www.w3.org/2000/svg" id="shopping-bag" viewBox="0 0 24 24">
				<g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
					<path
						d="M3.977 9.84A2 2 0 0 1 5.971 8h12.058a2 2 0 0 1 1.994 1.84l.803 10A2 2 0 0 1 18.833 22H5.167a2 2 0 0 1-1.993-2.16l.803-10Z" />
					<path d="M16 11V6a4 4 0 0 0-4-4v0a4 4 0 0 0-4 4v5" />
				</g>
			</symbol>
			<symbol xmlns="http://www.w3.org/2000/svg" id="gift" viewBox="0 0 24 24">
				<g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
					<rect width="18" height="14" x="3" y="8" rx="2" />
					<path d="M12 5a3 3 0 1 0-3 3m6 0a3 3 0 1 0-3-3m0 0v17m9-7H3" />
				</g>
			</symbol>
			<symbol xmlns="http://www.w3.org/2000/svg" id="arrow-cycle" viewBox="0 0 24 24">
				<g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
					<path
						d="M22 12c0 6-4.39 10-9.806 10C7.792 22 4.24 19.665 3 16m-1-4C2 6 6.39 2 11.806 2C16.209 2 19.76 4.335 21 8" />
					<path d="m7 17l-4-1l-1 4M17 7l4 1l1-4" />
				</g>
			</symbol>
			<symbol xmlns="http://www.w3.org/2000/svg" id="link" viewBox="0 0 24 24">
				<path fill="currentColor"
					d="M12 19a1 1 0 1 0-1-1a1 1 0 0 0 1 1Zm5 0a1 1 0 1 0-1-1a1 1 0 0 0 1 1Zm0-4a1 1 0 1 0-1-1a1 1 0 0 0 1 1Zm-5 0a1 1 0 1 0-1-1a1 1 0 0 0 1 1Zm7-12h-1V2a1 1 0 0 0-2 0v1H8V2a1 1 0 0 0-2 0v1H5a3 3 0 0 0-3 3v14a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3V6a3 3 0 0 0-3-3Zm1 17a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-9h16Zm0-11H4V6a1 1 0 0 1 1-1h1v1a1 1 0 0 0 2 0V5h8v1a1 1 0 0 0 2 0V5h1a1 1 0 0 1 1 1ZM7 15a1 1 0 1 0-1-1a1 1 0 0 0 1 1Zm0 4a1 1 0 1 0-1-1a1 1 0 0 0 1 1Z" />
			</symbol>
			<symbol xmlns="http://www.w3.org/2000/svg" id="arrow-left" viewBox="0 0 24 24">
				<path fill="currentColor"
					d="M17 11H9.41l3.3-3.29a1 1 0 1 0-1.42-1.42l-5 5a1 1 0 0 0-.21.33a1 1 0 0 0 0 .76a1 1 0 0 0 .21.33l5 5a1 1 0 0 0 1.42 0a1 1 0 0 0 0-1.42L9.41 13H17a1 1 0 0 0 0-2Z" />
			</symbol>
			<symbol xmlns="http://www.w3.org/2000/svg" id="arrow-right" viewBox="0 0 24 24">
				<path fill="currentColor"
					d="M17.92 11.62a1 1 0 0 0-.21-.33l-5-5a1 1 0 0 0-1.42 1.42l3.3 3.29H7a1 1 0 0 0 0 2h7.59l-3.3 3.29a1 1 0 0 0 0 1.42a1 1 0 0 0 1.42 0l5-5a1 1 0 0 0 .21-.33a1 1 0 0 0 0-.76Z" />
			</symbol>
			<symbol xmlns="http://www.w3.org/2000/svg" id="play" viewBox="0 0 24 24">
				<g fill="none" fill-rule="evenodd">
					<path
						d="M24 0v24H0V0h24ZM12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035c-.01-.004-.019-.001-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427c-.002-.01-.009-.017-.017-.018Zm.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093c.012.004.023 0 .029-.008l.004-.014l-.034-.614c-.003-.012-.01-.02-.02-.022Zm-.715.002a.023.023 0 0 0-.027.006l-.006.014l-.034.614c0 .012.007.02.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01l-.184-.092Z" />
					<path fill="currentColor"
						d="M5.669 4.76a1.469 1.469 0 0 1 2.04-1.177c1.062.454 3.442 1.533 6.462 3.276c3.021 1.744 5.146 3.267 6.069 3.958c.788.591.79 1.763.001 2.356c-.914.687-3.013 2.19-6.07 3.956c-3.06 1.766-5.412 2.832-6.464 3.28c-.906.387-1.92-.2-2.038-1.177c-.138-1.142-.396-3.735-.396-7.237c0-3.5.257-6.092.396-7.235Z" />
				</g>
			</symbol>
			<symbol xmlns="http://www.w3.org/2000/svg" id="category" viewBox="0 0 24 24">
				<path fill="currentColor"
					d="M19 5.5h-6.28l-.32-1a3 3 0 0 0-2.84-2H5a3 3 0 0 0-3 3v13a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3v-10a3 3 0 0 0-3-3Zm1 13a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-13a1 1 0 0 1 1-1h4.56a1 1 0 0 1 .95.68l.54 1.64a1 1 0 0 0 .95.68h7a1 1 0 0 1 1 1Z" />
			</symbol>
			<symbol xmlns="http://www.w3.org/2000/svg" id="calendar" viewBox="0 0 24 24">
				<path fill="currentColor"
					d="M19 4h-2V3a1 1 0 0 0-2 0v1H9V3a1 1 0 0 0-2 0v1H5a3 3 0 0 0-3 3v12a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3V7a3 3 0 0 0-3-3Zm1 15a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-7h16Zm0-9H4V7a1 1 0 0 1 1-1h2v1a1 1 0 0 0 2 0V6h6v1a1 1 0 0 0 2 0V6h2a1 1 0 0 1 1 1Z" />
			</symbol>
			<symbol xmlns="http://www.w3.org/2000/svg" id="heart" viewBox="0 0 24 24">
				<path fill="currentColor"
					d="M20.16 4.61A6.27 6.27 0 0 0 12 4a6.27 6.27 0 0 0-8.16 9.48l7.45 7.45a1 1 0 0 0 1.42 0l7.45-7.45a6.27 6.27 0 0 0 0-8.87Zm-1.41 7.46L12 18.81l-6.75-6.74a4.28 4.28 0 0 1 3-7.3a4.25 4.25 0 0 1 3 1.25a1 1 0 0 0 1.42 0a4.27 4.27 0 0 1 6 6.05Z" />
			</symbol>
			<symbol xmlns="http://www.w3.org/2000/svg" id="plus" viewBox="0 0 24 24">
				<path fill="currentColor"
					d="M19 11h-6V5a1 1 0 0 0-2 0v6H5a1 1 0 0 0 0 2h6v6a1 1 0 0 0 2 0v-6h6a1 1 0 0 0 0-2Z" />
			</symbol>
			<symbol xmlns="http://www.w3.org/2000/svg" id="minus" viewBox="0 0 24 24">
				<path fill="currentColor" d="M19 11H5a1 1 0 0 0 0 2h14a1 1 0 0 0 0-2Z" />
			</symbol>
			<symbol xmlns="http://www.w3.org/2000/svg" id="cart" viewBox="0 0 24 24">
				<path fill="currentColor"
					d="M8.5 19a1.5 1.5 0 1 0 1.5 1.5A1.5 1.5 0 0 0 8.5 19ZM19 16H7a1 1 0 0 1 0-2h8.491a3.013 3.013 0 0 0 2.885-2.176l1.585-5.55A1 1 0 0 0 19 5H6.74a3.007 3.007 0 0 0-2.82-2H3a1 1 0 0 0 0 2h.921a1.005 1.005 0 0 1 .962.725l.155.545v.005l1.641 5.742A3 3 0 0 0 7 18h12a1 1 0 0 0 0-2Zm-1.326-9l-1.22 4.274a1.005 1.005 0 0 1-.963.726H8.754l-.255-.892L7.326 7ZM16.5 19a1.5 1.5 0 1 0 1.5 1.5a1.5 1.5 0 0 0-1.5-1.5Z" />
			</symbol>
			<symbol xmlns="http://www.w3.org/2000/svg" id="check" viewBox="0 0 24 24">
				<path fill="currentColor"
					d="M18.71 7.21a1 1 0 0 0-1.42 0l-7.45 7.46l-3.13-3.14A1 1 0 1 0 5.29 13l3.84 3.84a1 1 0 0 0 1.42 0l8.16-8.16a1 1 0 0 0 0-1.47Z" />
			</symbol>
			<symbol xmlns="http://www.w3.org/2000/svg" id="trash" viewBox="0 0 24 24">
				<path fill="currentColor"
					d="M10 18a1 1 0 0 0 1-1v-6a1 1 0 0 0-2 0v6a1 1 0 0 0 1 1ZM20 6h-4V5a3 3 0 0 0-3-3h-2a3 3 0 0 0-3 3v1H4a1 1 0 0 0 0 2h1v11a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V8h1a1 1 0 0 0 0-2ZM10 5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v1h-4Zm7 14a1 1 0 0 1-1 1H8a1 1 0 0 1-1-1V8h10Zm-3-1a1 1 0 0 0 1-1v-6a1 1 0 0 0-2 0v6a1 1 0 0 0 1 1Z" />
			</symbol>
			<symbol xmlns="http://www.w3.org/2000/svg" id="star-outline" viewBox="0 0 15 15">
				<path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
					d="M7.5 9.804L5.337 11l.413-2.533L4 6.674l2.418-.37L7.5 4l1.082 2.304l2.418.37l-1.75 1.793L9.663 11L7.5 9.804Z" />
			</symbol>
			<symbol xmlns="http://www.w3.org/2000/svg" id="star-solid" viewBox="0 0 15 15">
				<path fill="currentColor"
					d="M7.953 3.788a.5.5 0 0 0-.906 0L6.08 5.85l-2.154.33a.5.5 0 0 0-.283.843l1.574 1.613l-.373 2.284a.5.5 0 0 0 .736.518l1.92-1.063l1.921 1.063a.5.5 0 0 0 .736-.519l-.373-2.283l1.574-1.613a.5.5 0 0 0-.283-.844L8.921 5.85l-.968-2.062Z" />
			</symbol>
			<symbol xmlns="http://www.w3.org/2000/svg" id="search" viewBox="0 0 24 24">
				<path fill="currentColor"
					d="M21.71 20.29L18 16.61A9 9 0 1 0 16.61 18l3.68 3.68a1 1 0 0 0 1.42 0a1 1 0 0 0 0-1.39ZM11 18a7 7 0 1 1 7-7a7 7 0 0 1-7 7Z" />
			</symbol>
			<symbol xmlns="http://www.w3.org/2000/svg" id="user" viewBox="0 0 24 24">
				<path fill="currentColor"
					d="M15.71 12.71a6 6 0 1 0-7.42 0a10 10 0 0 0-6.22 8.18a1 1 0 0 0 2 .22a8 8 0 0 1 15.9 0a1 1 0 0 0 1 .89h.11a1 1 0 0 0 .88-1.1a10 10 0 0 0-6.25-8.19ZM12 12a4 4 0 1 1 4-4a4 4 0 0 1-4 4Z" />
			</symbol>
			<symbol xmlns="http://www.w3.org/2000/svg" id="close" viewBox="0 0 15 15">
				<path fill="currentColor"
					d="M7.953 3.788a.5.5 0 0 0-.906 0L6.08 5.85l-2.154.33a.5.5 0 0 0-.283.843l1.574 1.613l-.373 2.284a.5.5 0 0 0 .736.518l1.92-1.063l1.921 1.063a.5.5 0 0 0 .736-.519l-.373-2.283l1.574-1.613a.5.5 0 0 0-.283-.844L8.921 5.85l-.968-2.062Z" />
			</symbol>
			<symbol xmlns="http://www.w3.org/2000/svg" id="quote" viewBox="0 0 448 512">
				<path fill="currentColor" d="M0 216C0 149.7 53.7 96 120 96h8c17.7 0 32 14.3 32 32s-14.3 32-32 32h-8c-30.9 0-56 25.1-56 56v8h64c35.3 0 64 28.7 64 64v64c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V216zm256 0c0-66.3 53.7-120 120-120h8c17.7 0 32 14.3 32 32s-14.3 32-32 32h-8c-30.9 0-56 25.1-56 56v8h64c35.3 0 64 28.7 64 64v64c0 35.3-28.7 64-64 64h-64c-35.3 0-64-28.7-64-64V216z"/>
			</symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="folder" viewBox="0 0 18 18" fill="none">
        <path d="M14.0946 4.04689H9.56953L9.33895 3.3259C9.18947 2.90285 8.9122 2.53678 8.54555 2.27842C8.1789 2.02006 7.74102 1.8822 7.29258 1.88393H4.00687C3.43356 1.88393 2.88374 2.11181 2.47835 2.51744C2.07296 2.92308 1.84521 3.47324 1.84521 4.04689V13.4197C1.84521 13.9934 2.07296 14.5435 2.47835 14.9492C2.88374 15.3548 3.43356 15.5827 4.00687 15.5827H14.0946C14.6679 15.5827 15.2177 15.3548 15.6231 14.9492C16.0285 14.5435 16.2562 13.9934 16.2562 13.4197V6.20985C16.2562 5.6362 16.0285 5.08604 15.6231 4.68041C15.2177 4.27477 14.6679 4.04689 14.0946 4.04689ZM14.8151 13.4197C14.8151 13.6109 14.7392 13.7943 14.6041 13.9295C14.469 14.0648 14.2857 14.1407 14.0946 14.1407H4.00687C3.81577 14.1407 3.63249 14.0648 3.49736 13.9295C3.36223 13.7943 3.28632 13.6109 3.28632 13.4197V4.04689C3.28632 3.85567 3.36223 3.67229 3.49736 3.53707C3.63249 3.40186 3.81577 3.3259 4.00687 3.3259H7.29258C7.44364 3.32551 7.591 3.37264 7.71384 3.46061C7.83667 3.54859 7.92877 3.67297 7.97711 3.81617L8.3662 4.99859C8.41454 5.1418 8.50664 5.26618 8.62947 5.35415C8.75231 5.44213 8.89967 5.48925 9.05073 5.48886H14.0946C14.2857 5.48886 14.469 5.56483 14.6041 5.70004C14.7392 5.83525 14.8151 6.01863 14.8151 6.20985V13.4197Z" fill="black"/>
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="clock" viewBox="0 0 18 18" fill="none">
        <path d="M11.0931 9.19042L9.58134 8.3173V5.12838C9.58134 4.93716 9.50543 4.75377 9.3703 4.61856C9.23517 4.48335 9.05189 4.40739 8.86079 4.40739C8.66969 4.40739 8.48641 4.48335 8.35128 4.61856C8.21615 4.75377 8.14024 4.93716 8.14024 5.12838V8.73331C8.14024 8.85987 8.17354 8.9842 8.23678 9.0938C8.30002 9.2034 8.39098 9.29441 8.50051 9.35769L10.3725 10.4392C10.4545 10.4873 10.5452 10.5186 10.6393 10.5315C10.7335 10.5444 10.8292 10.5385 10.9211 10.5142C11.013 10.4899 11.0991 10.4477 11.1746 10.3899C11.2501 10.3322 11.3134 10.26 11.3609 10.1777C11.4084 10.0953 11.4392 10.0044 11.4515 9.91012C11.4637 9.81583 11.4572 9.72004 11.4323 9.62828C11.4074 9.53652 11.3646 9.45059 11.3064 9.37544C11.2482 9.3003 11.1757 9.23741 11.0931 9.19042ZM8.86079 1.52344C7.43567 1.52344 6.04256 1.94629 4.85762 2.73852C3.67268 3.53075 2.74913 4.65678 2.20376 5.97421C1.6584 7.29165 1.5157 8.74131 1.79373 10.1399C2.07175 11.5385 2.75801 12.8231 3.76572 13.8315C4.77343 14.8398 6.05733 15.5265 7.45506 15.8047C8.8528 16.0828 10.3016 15.9401 11.6182 15.3944C12.9349 14.8487 14.0602 13.9246 14.852 12.7389C15.6437 11.5532 16.0663 10.1593 16.0663 8.73331C16.0642 6.82178 15.3044 4.98914 13.9535 3.63748C12.6027 2.28582 10.7712 1.52554 8.86079 1.52344ZM8.86079 14.5012C7.7207 14.5012 6.60621 14.1629 5.65826 13.5291C4.7103 12.8954 3.97146 11.9945 3.53517 10.9406C3.09887 9.88665 2.98472 8.72691 3.20714 7.60805C3.42956 6.48919 3.97857 5.46145 4.78474 4.65479C5.5909 3.84814 6.61802 3.2988 7.73621 3.07624C8.8544 2.85369 10.0134 2.96791 11.0667 3.40447C12.12 3.84103 13.0203 4.58031 13.6537 5.52884C14.2871 6.47737 14.6252 7.59253 14.6252 8.73331C14.6233 10.2625 14.0154 11.7284 12.9347 12.8097C11.8541 13.891 10.389 14.4993 8.86079 14.5012Z" fill="black"/>
      </symbol>
		</defs>
	</svg>

  <a class="menu-btn"><span></span></a>

  <div class="container-fluid">

    <header id="header-nav" class="col-lg-2 position-fixed px-5 bg-white h-100">
			<div class="header-wrap d-flex flex-column justify-content-between h-100">
				<div class="navigation">
					<div class="site-logo mt-5">
						<a href="index.html">
							<img src="images/main-logo.png" alt="logo" class="img-fluid">
						</a>
					</div>

					<nav id="one-page-menu" class="vertical-menu my-5">
						<ul class="menu-list list-unstyled">
							<li><a href="index.html#billboard" class="nav-link">Home</a></li>
							<li><a href="index.html#about" class="nav-link">About</a></li>
							<li><a href="index.html#experience" class="nav-link">Experience</a></li>
							<li><a href="index.html#portfolio" class="nav-link">Works</a></li>
							<li><a href="index.html#contact" class="nav-link">Contact</a></li>
							<li>
								<a class="nav-link btn-toggle d-flex justify-content-between align-items-center collapsed"
									data-bs-toggle="collapse" data-bs-target="#pages-collapse" aria-expanded="false">
									Pages
								</a>
								<div id="pages-collapse" class="collapse">
									<ul class="list-unstyled py-3">
										<li>
											<a href="single-post.html">Single Post <span
													class="badge bg-primary">PRO</span></a>
										</li>
										<li>
											<a href="single-portfolio.html">Single Portfolio <span
													class="badge bg-primary">PRO</span></a>
										</li>
										<li>
											<a href="contact.html">Contact <span class="badge bg-primary">PRO</span></a>
										</li>
										<li>
											<a href="team.html">My Team <span class="badge bg-primary">PRO</span></a>
										</li>
										<li>
											<a href="blog.html">Blog <span class="badge bg-primary">PRO</span></a>
										</li>
										<li>
											<a href="portfolio-masonry.html">Portfolio Masonry <span
													class="badge bg-primary">PRO</span></a>
										</li>
										<li>
											<a href="styles.html">Styles <span class="badge bg-primary">PRO</span></a>
										</li>
									</ul>
								</div>
							</li>
							<li><a href="https://templatesjungle.gumroad.com/l/julia-onepage-portfolio" target="_blank"
									class="nav-link d-flex justify-content-between align-items-center fw-bold"><span>Get
										PRO</span> <svg width="18" height="18" viewBox="0 0 24 24">
										<use xlink:href="#cart"></use>
									</svg></a></li>
						</ul>
					</nav>
				</div>
				<div class="mt-5">
					<div class="email-links">
						<a href="mailto:contact@yoursite.com"
							class="py-3 my-3 border-bottom d-flex">contact@yoursite.com</a>
					</div>
					<ul class="list-unstyled d-flex justify-content-start flex-wrap gap-3">
						<li>
							<a href="#" class="text-dark">
								<svg width="24" height="24" viewBox="0 0 24 24">
									<use xlink:href="#facebook"></use>
								</svg>
							</a>
						</li>
						<li>
							<a href="#" class="text-dark">
								<svg width="24" height="24" viewBox="0 0 24 24">
									<use xlink:href="#twitter"></use>
								</svg>
							</a>
						</li>
						<li>
							<a href="#" class="text-dark">
								<svg width="24" height="24" viewBox="0 0 24 24">
									<use xlink:href="#youtube"></use>
								</svg>
							</a>
						</li>
						<li>
							<a href="#" class="text-dark">
								<svg width="24" height="24" viewBox="0 0 24 24">
									<use xlink:href="#pinterest"></use>
								</svg>
							</a>
						</li>
						<li>
							<a href="#" class="text-dark">
								<svg width="24" height="24" viewBox="0 0 24 24">
									<use xlink:href="#instagram"></use>
								</svg>
							</a>
						</li>
					</ul>
					<div class="py-4 border-top">
						<p>HTML by <a href="https://templatesjungle.com/" target="_blank">TemplatesJungle</a></p>
					</div>
				</div>
			</div>
		</header>

    <main class="col-lg-10 offset-lg-2">
      <div class="container">

        <div class="justify-content-center px-1 mx-1 px-xl-5 mx-xl-5">

		<section class="page-title mt-5 py-5">
            <div class="container">
              <div class="row">
                <div class="d-flex flex-wrap flex-column justify-content-between align-items-center mt-5">
                  <h1 class="display-1">Thank You!</h1>
                  <nav class="breadcrumb">
                    <a class="breadcrumb-item" href="#">Home</a>
                    <a class="breadcrumb-item" href="#">Pages</a>
                    <span class="breadcrumb-item active" aria-current="page">Thank You</span>
                  </nav>
                </div>
              </div>
            </div>
          </section>

			<section class="py-5">
				<div class="container">
				<div class="row justify-content-center">
					<div class="col-4">
						<?php if(isset($emailSent) == true) { ?>
							<div class="message-box success-box">
								<div class="message-box-content">
									<p>
										<strong>Thanks, <?php echo $name;?></strong><br>
										We've received your email. We'll be in touch as soon as we possibly can!
									</p>
									<span class="close"></span>
								</div>
							</div>
						<?php } ?>

						<?php if(isset($hasError) ) { ?>
							<div class="message-box error-box">
								<div class="message-box-content">
									<p>There was an error submitting the form.</p>
									<?php echo $errorMessage;?>
								</div>
							</div>
						<?php } ?>
					</div>
				</div>
				</div>
			</section>

			</div>

      </div>
    </main>

  </div>

  <script src="js/jquery-1.11.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
    crossorigin="anonymous"></script>
  <script src="js/plugins.js"></script>
  <script src="js/script.js"></script>
</body>

</html>