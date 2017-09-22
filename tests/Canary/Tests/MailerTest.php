<?php

namespace Canary\Tests;

use Canary\Mailer;
use PHPMailer\PHPMailer\PHPMailer;

class MailerTest extends \PHPUnit_Framework_TestCase
{
    public function setUp() {}

    public function testInitialize()
    {
        $mailer = new Mailer();
        $this->assertInstanceOf('Canary\Mailer', $mailer);

        return $mailer;
    }

    /**
     * @depends testInitialize
     * @return Canary\Mailer $mailer
     */
    public function testAttach($mailer)
    {
        $mail = new PHPMailer(true);

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'sanches.webmaster@gmail.com';
        $mail->Password = 'secret';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('from@example.com', 'Mailer');
        $mail->addAddress('sanches.webmaster@gmail.com', 'Pablo Sanches');
        $mail->addReplyTo('no_reply@gmail.com');

        $mail->isHTML(true);
        $mail->Subject = 'Mail Subject';
        $mail->Body = '<h1>Mail body</h1>';
        $mail->AltBody = 'Raw body';

        $this->assertEquals(0, $mailer->getStack()->count());

        $mailer->attach($mail);

        $this->assertEquals(1, $mailer->getStack()->count());

        return $mailer;
    }

    /**
     * @depends testAttach
     * @return Canary\Mailer $mailer
     */
    public function testSend($mailer)
    {
        $this->assertFalse($mailer->send());
        $this->assertCount(1, $mailer->getErrors());
    }
}
