<?php

namespace Canary;

use Canary\MailerStack;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

/**
 * Class Mailer
 *
 * @author Pablo Sanches <sanches.webmaster@gmail.com>
 * @license MIT
 */
class Mailer
{
    /**
     * Stack mailer
     *
     * @var Canary\MailerStack
     */
    private $_stack;

    /**
     * Error list
     *
     * @var array
     */
    private $errors = [];

    /**
     * The constructor
     */
    public function __construct()
    {
        $this->_stack = new MailerStack();
    }

    /**
     * Attach PHPMailer in queue
     * @param  PHPMailer $instance
     * @return Canary\Mailer
     */
    public function attach(PHPMailer $instance)
    {
        $this->_stack->attach($instance);

        return $this;
    }

    /**
     * Get stack
     *
     * @return Canary\MailerStack
     */
    public function getStack()
    {
        return $this->_stack;
    }

    /**
     * Get error list
     *
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * Send stack
     *
     * @return boolean
     */
    public function send()
    {
        try {
            $stack = $this->getStack();

            if ($stack->count() == 0) {
                return false;
            }

            foreach ($stack as $mail) {

                $mail->send();
                // try {
                //     $mail->send();
                // } catch (Exception $e) {
                //     $this->errors[] = $e->getMessage();
                // }
            }
        } catch (Exception $e) {
            exit(var_dump($e));
        }

        if (count($this->errors) > 0) {
            return false;
        }

        return true;
    }
}
