<?php
    require 'vendor/autoload.php';

    class SendEmail{
        //Does not need instanciance
        public static function SendMail($to, $subject, $content){
            $key = "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";

            $email = new \SendGrid\Mail\Mail();
            $email->setFrom("nasa.nase72@gmail.com", "Paki");
            $email->setSubject($subject);
            $email->addTo($to);
            $email->addContent("text/plain", $content);

            $sendGrid = new \SendGrid($key);

            try{
                $response = $sendGrid->send($email);
                return $response;
            }
            catch(Exception $e){
                echo "Error: ".$e->getMessage();
                return false;
            }
        }
    }

    if(isset($_POST['submit'])){
      SendEmail::SendMail($_POST['email'], $_POST['subject'], $_POST['message']);
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us Using PHPMailer & Gmail SMTP</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css' />
</head>

<body class="bg-info">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6 mt-3">
        <div class="card border-danger shadow">
          <div class="card-header bg-danger text-light">
            <h3 class="card-title">Contact Us</h3>
          </div>
          <div class="card-body px-4">
            <form action="#" method="POST">
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name" required>
              </div>
              <div class="form-group">
                <label for="email">E-Mail</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Enter E-Mail" required>
              </div>
              <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text" name="subject" id="subject" class="form-control" placeholder="Enter Subject"
                  required>
              </div>
              <div class="form-group">
                <label for="message">Message</label>
                <textarea name="message" id="message" rows="5" class="form-control" placeholder="Write Your Message"
                  required></textarea>
              </div>
              <div class="form-group">
                <input type="submit" name="submit" value="Send" class="btn btn-danger btn-block" id="sendBtn">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>