<?php
use PHPUnit\Framework\TestCase;

/**
 *  Corresponding Class to test YourClass class
 *
 *  For each class in your library, there should be a corresponding Unit-Test for it
 *  Unit-Tests should be as much as possible independent from other test going on.
 *
 *  @author yourname
 */
class SocialTest extends TestCase
{

    /**
     * Just check if the YourClass has no syntax error
     *
     * This is just a simple check to make sure your library has no syntax error. This helps you troubleshoot
     * any typo before you even use this library in a real project.
     *
     */
    public function testIsThereAnySyntaxError()
    {
        $s = new \NYCooookie\SocialShare\SocialShare('Google', 'https://google.com');
        $this->assertTrue(is_object($s));
        unset($s);
    }


    public function testFacebook()
    {
        $s = new \NYCooookie\SocialShare\SocialShare('Google', 'https://google.com');
        $this->assertSame(
            'https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fgoogle.com',
            $s->facebook()
        );
        unset($var);
    }

    public function testTwitter()
    {
        $s = new \NYCooookie\SocialShare\SocialShare('Google', 'https://google.com');
        $this->assertSame(
            'https://twitter.com/intent/tweet?text=Google&url=https%3A%2F%2Fgoogle.com',
            $s->twitter()
        );
        unset($var);
    }

    public function testXing()
    {
        $s = new \NYCooookie\SocialShare\SocialShare('Google', 'https://google.com');
        $this->assertSame(
            'https://www.xing.com/spi/shares/new?url=https%3A%2F%2Fgoogle.com',
            $s->xing()
        );
        unset($var);
    }

    public function testLinkedIn()
    {
        $s = new \NYCooookie\SocialShare\SocialShare('Google', 'https://google.com', 'This is Google');
        $this->assertSame(
            'https://www.linkedin.com/shareArticle?url=https%3A%2F%2Fgoogle.com&summary=This+is+Google',
            $s->linkedin()
        );
        unset($var);
    }

    public function testMail()
    {
        $s = new \NYCooookie\SocialShare\SocialShare('Google', 'https://google.com', 'This is Google');
        $this->assertSame(
            'mailto:?subject=Google&body=This%20is%20Google%3A%20https%3A%2F%2Fgoogle.com',
            $s->mail()
        );
        unset($var);
    }

    public function testAll()
    {
        $s = new \NYCooookie\SocialShare\SocialShare('Google', 'https://google.com', 'This is Google');
        $this->assertSame(
            [
                'facebook' => 'https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fgoogle.com',
                'twitter' => 'https://twitter.com/intent/tweet?text=Google&url=https%3A%2F%2Fgoogle.com',
                'xing' => 'https://www.xing.com/spi/shares/new?url=https%3A%2F%2Fgoogle.com',
                'linkedin' => 'https://www.linkedin.com/shareArticle?url=https%3A%2F%2Fgoogle.com&summary=This+is+Google',
                'mail' => 'mailto:?subject=Google&body=This%20is%20Google%3A%20https%3A%2F%2Fgoogle.com'
            ],
            $s->all()
        );
        unset($var);
    }
}
