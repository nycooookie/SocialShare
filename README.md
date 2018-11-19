Social Share
=========================

This "library" helps you generate share links for various (well at the moment rather limited) social services.

```
$s = new SocialShare('Google', 'https://google.com', 'This is Google');
$s->twitter();  // "https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fgoogle.com"
$s->facebook(); // "https://twitter.com/intent/tweet?text=Google&url=https%3A%2F%2Fgoogle.com"
$s->xing();     // "https://www.xing.com/spi/shares/new?url=https%3A%2F%2Fgoogle.com"
$s->linkedin(); // "https://www.linkedin.com/shareArticle?url=https%3A%2F%2Fgoogle.com&summary=This+is+Google"
$s->mail();     // "mailto:?subject=Google&body=This%20is%20Google%3A%20https%3A%2F%2Fgoogle.com"
$s->all();      // All of the above in an array
```