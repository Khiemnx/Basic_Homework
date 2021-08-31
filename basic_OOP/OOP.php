<?php 

    //----------------------------------------Homework1----------------------------------
    abstract class Shape {
        protected $width;
        protected $height;

        public function __construct($width, $height) {
            $this->width = $width;
            $this->height = $height;
        }
        abstract protected function area() {
          
        }
    }
    class Rectangle extends Shape {
        public function area() {
            return $this->width * $this->height;
        }
    }
    class Triangle extends Shape {
        public function area() {
            return (($this->width * $this->height) / 2);
        }
    }
    $triangle = new Triangle(5.5, 2.2);
    $rectangle = new Rectangle(6.5 ,4.0);
    echo "The area of triangle: " . $triangle->area() . "<br>";
    echo "The area of rectangle: " . $rectangle->area() . "<br>";

    ////////////////////////////////////////////////////////////////////////////////////////////////

    //----------------------------------------Homework2---------------------------------------

    abstract class Emailer {
        // Declare properties
        protected $sender;
        protected $recipients;
        protected $subject;
        protected $body;
      
        // Use Constructor to initialize sender and recipients
        function __construct($sender)
        {
          $this->sender = $sender;
          $this->recipients = array(); 
        }
      
        public function addRecipients($recipient)
        {
          array_push($this->recipients, $recipient);
          return $this;
        }
      
        public function setSubject($subject)
        {
          $this->subject = $subject;
          return $this;
        }
      
        public function setBody($body)
        {
          $this->body = $body;
          return $this;
        }
      }
      
      // Implement method sendEmail for SendGrid and MailChimp
      
    class SendGrid extends Emailer {
        public function sendEmail()
        {
          foreach ($this->recipients as $recipient) {
            $result = mail($recipient, $this->subject, $this->body, "From: {$this->sender}\r\n");
            echo "<br>" . "---SendGrid successfully sent to {$recipient}\n";
            echo "<br>" . "Sender: $this->sender\n";
            echo "<br>" . "Subject: $this->subject\n";
            echo "<br>" . "Content: $this->body\n";
          }
        }
    }
    class MailChimp extends Emailer {
        public function sendEmail()
        {
          foreach ($this->recipients as $recipient) {
            $result = mail($recipient, $this->subject, $this->body, "From: {$this->sender}\r\n");
            echo "<br>" . "---MailChimp successfully sent to {$recipient}\n";
            echo "<br>" . "Sender: $this->sender\n";
            echo "<br>" . "Subject: $this->subject\n";
            echo "<br>" . "Content: $this->body\n";
          }
        }
    }
    // SendGrid
    $sgEmailer = new SendGrid("khiemkthp@gmail.com");
    $sgEmailer->addRecipients("khiemnx@pascaliaasia.com")
    ->setSubject("welcome my friend!")
    ->setBody("Hi Name, How are you?")
    ->sendEmail();
    // MailChimp
    $mcEmailer = new MailChimp("khiemnx@pascaliaasia.com");
    $mcEmailer->addRecipients("khiemkthp@gmail.com")
    ->setSubject("welcome my friend!")
    ->setBody("Hi Name, How are you?")
    ->sendEmail();

    //you can check result here https://k99tech.xyz/ 

?>
