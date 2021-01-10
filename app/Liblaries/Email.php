<?php

    namespace App\Liblaries;
    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    Class Email
    {
        /**
        * @param
        * 
        * Email parameter
        *
        */
        private static $host        = 'smtp.gmail.com';
        private static $username    = '';
        private static $password    = '';
        private static $from        = array('test', 'test@test.com');
        private static $to          = array('test', 'test@test.com');
        private static $reply_to    = null;
        private static $cc          = null;
        private static $bbc         = null;
        private static $subject     = '';
        private static $body        = '';
        private static $altBody     = '';
        private static $attachments = null;
        private static $attach_name = null;
        private static $port        = 465;

        /**
        * @var
        * 
        * Set host
        *
        */
        public function host($host)
        {
            self::$host             = $host;
        }

        /**
        * @param
        * 
        * Set username
        *
        */
        public function username($username)
        {
            self::$username         = $username;
        }

        /**
        * @param
        * 
        * Set password
        *
        */
        public function password($password)
        {
            self::$password         = $password;
        }

        /**
        * @param
        * 
        * Set port
        *
        */
        public function port($port)
        {
            self::$port             = $port;
        }

        /**
        * @param
        * 
        * Set From
        *
        */
        public function from($from = array())
        {
            self::$from             = $from;
        }

        /**
        * @param
        * 
        * Set To
        *
        */
        public function to($to = array())
        {
            self::$to             = $to;
        }

        /**
        * @param
        * 
        * Set Replyto
        *
        */
        public function reply_to($reply_to = array())
        {
            self::$reply_to       = $reply_to;
        }

        /**
        * @param
        * 
        * Set CC
        *
        */
        public function cc($cc)
        {
            self::$cc             = $cc;
        }

        /**
        * @param
        * 
        * Set BCC
        *
        */
        public function bbc($bbc)
        {
            self::$bbc            = $bbc;
        }

        /**
        * @param
        * 
        * Set Subject
        *
        */
        public function subject($subject)
        {
            self::$subject        = $subject;
        }

        /**
        * @param
        * 
        * Set Body
        *
        */
        public function body($body)
        {
            self::$body          = $body;
        }

        /**
        * @param
        * 
        * Set Alt Body
        *
        */
        public function alt_body($altBody)
        {
            self::$altBody        = $altBody;
        }

        /**
        * @param
        * 
        * Set Alt Body
        *
        */
        public function attachments($attachments)
        {
            self::$attachments    = $attachments;
        }

        /**
        * @param
        * 
        * Set Alt Body
        *
        */
        public function attach_name($attach_name)
        {
            self::$attach_name    = $attach_name;
        }

        /**
        * @return
        * 
        * Get host
        *
        */
        public function get_host()
        {
            return self::$host;
        }

        /**
        * @return
        * 
        * Get username
        *
        */
        public function get_username()
        {
            return self::$username;
        }

        /**
        * @return
        * 
        * Get password
        *
        */
        public function get_password()
        {
            return self::$password;
        }

        /**
        * @return
        * 
        * Get port
        *
        */
        public function get_port()
        {
            return self::$port;
        }

        /**
        * @return
        * 
        * Get from
        *
        */
        public function get_from()
        {
            return self::$from;
        }

        /**
        * @return
        * 
        * Get to
        *
        */
        public function get_to()
        {
            return self::$to;
        }

        /**
        * @return
        * 
        * Get to
        *
        */
        public function get_reply_to()
        {
            return self::$reply_to;
        }

        /**
        * @return
        * 
        * Get cc
        *
        */
        public function get_cc()
        {
            return self::$cc;
        }

        /**
        * @return
        * 
        * Get bbc
        *
        */
        public function get_bbc()
        {
            return self::$bbc;
        }

        /**
        * @return
        * 
        * Get subject
        *
        */
        public function get_subject()
        {
            return self::$subject;
        }

        /**
        * @return
        * 
        * Get body
        *
        */
        public function get_body()
        {
            return self::$body;
        }

        /**
        * @return
        * 
        * Get alt body
        *
        */
        public function get_alt_body()
        {
            return self::$altBody;
        }

        /**
        * @return
        * 
        * Get attachment
        *
        */
        public function get_attachments()
        {
            return self::$attachments;
        }

        /**
        * @return
        * 
        * Get attachment name
        *
        */
        public function get_attach_name()
        {
            return self::$attach_name;
        }

        /**
        * 
        * Execute
        *
        */
        public function send($config = array())
        {
            /**
            * 
            * Instance class PHPMailer
            *
            */
            $mail                       = new PHPMailer(true);

            try
            {
                $mail->SMTPDebug        = SMTP::DEBUG_SERVER;
                $mail->isSMTP();

                /**
                * 
                * Server setting
                *
                */
                $mail->Host             = self::get_host();                    
                $mail->SMTPAuth         = true;                                   
                $mail->Username         = self::get_username();                     
                $mail->Password         = self::get_password();

                // if(self::get_port() === 465)
                // {
                    $mail->SMTPSecure   = PHPMailer::ENCRYPTION_SMTPS;
                // }
                // else
                // {
                //     $mail->SMTPSecure   = PHPMailer::ENCRYPTION_STARTTLS;
                // }

                $mail->Port             = self::get_port();

                /**
                * 
                * Recipients setting
                *
                */
                $mail->From             = self::get_from()[0];
                $mail->FromName         = self::get_from()[1];
                $mail->addAddress(self::get_to()[0], self::get_to()[1]);     // Add a recipient
                // $mail->addAddress('ellen@example.com');               // Name is optional
                if(self::get_reply_to() !== null)
                {
                    $mail->addReplyTo(self::get_reply_to()[0], self::get_reply_to()[1]);
                }
                

                /**
                *
                * CC BBC
                *
                */
                if(self::get_cc() !== null)
                {
                    $mail->addCC(self::get_cc());
                }

                if(self::get_bbc() !== null)
                {
                    $mail->addBCC(self::get_bbc());
                }

                
                /**
                * 
                * Attachments
                *
                */
                if(self::get_attachments() !== null && self::get_attach_name() !== null)
                {
                    $mail->addAttachment(self::get_attachments(), self::get_attach_name());
                }
                else if(self::get_attachments() !== null)
                {
                    $mail->addAttachment(self::get_attachments());
                }


                /**
                * 
                * Content
                *
                */
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject          = self::get_subject();
                $mail->Body             = self::get_body();
                $mail->AltBody          = self::get_alt_body();
                
                /**
                *
                * 1 : High, 3 : Normal, 5 : Low, Default Null
                */
                $mail->Priority         = 1;
                /**
                *
                * May set to "Urgent" or "Highest" rather than "High"
                */
                $mail->AddCustomHeader("X-MSMail-Priority: Urgent");
                /**
                *
                * Not sure if Priority will also set the Importance
                */
                $mail->AddCustomHeader("Importance: High");

                /**
                * 
                * Execute
                *
                */
                return $mail->send();
            }
            catch(Exception $e)
            {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";

                die();                
            }
        }
    }
