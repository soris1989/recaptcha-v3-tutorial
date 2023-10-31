<?php
require_once __DIR__ . '/./vendor/autoload.php';
require_once __DIR__ . '/./constant.php';

if (isset($_POST['email']) && $_POST['email']) {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
} else {
    // set error message and redirect back to form... 
    header('location: subscribe_newsletter_form.php');
    exit;
}
$token = $_POST['token'];
$action = $_POST['action'];
// use the reCAPTCHA PHP client library for validation 
$recaptcha = new \ReCaptcha\ReCaptcha(SECRET_KEY);
$resp = $recaptcha->setExpectedAction($action)
                  ->setScoreThreshold(0.5)
                  ->verify($token, $_SERVER['REMOTE_ADDR']);
 // verify the response 
if ($resp->isSuccess()) {
    // valid submission 
    // go ahead and do necessary stuff 
} else {
    // collect errors and display it 
    $errors = $resp->getErrorCodes();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recaptcha Tutorial</title>
</head>
<body>
    <form id="newsletterForm" action="subscribe_newsletter_submit.php" method="post">
      <div>
          <div>
              <input type="email" id="email" name="email">
          </div>
          <div>
              <input type="submit" value="submit">
          </div>
      </div>
    </form>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://www.google.com/recaptcha/api.js?render=<?= SITE_KEY ?>"></script>

    <script>
        $('#newsletterForm').submit(function(event) {
            event.preventDefault();
            var email = $('#email').val();
    
            grecaptcha.ready(function() {
                grecaptcha.execute('<?= SITE_KEY ?>', {action: 'subscribe_newsletter'}).then(function(token) {
                    console.log(token);
                    $('#newsletterForm').prepend('<input type="hidden" name="token" value="' + token + '">');
                    $('#newsletterForm').prepend('<input type="hidden" name="action" value="subscribe_newsletter">');
                    $('#newsletterForm').unbind('submit').submit();
                });
            });
    });
  </script>
</body>
</html>