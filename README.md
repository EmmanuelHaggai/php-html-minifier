# PHP HTML Minifier

**Unlock lightning-fast load times with a simple PHP trick.** This lightweight tool uses PHP's `ob_start()` to automatically minify your HTML output on the fly. It strips out unnecessary whitespace, multiple spaces, and HTML comments—giving you a cleaner, faster website instantly.

Ideal for developers who care about performance, SEO optimization, and serving lean markup to their users without relying on external build tools.

## ✨ Features

- Real-time HTML minification using output buffering  
- Removes:
  - Whitespaces after and before HTML tags  
  - Extra/multiple spaces  
  - HTML comments  
- Plug-and-play with zero dependencies  
- Great for performance-focused PHP projects

## 🎥 Demo Video

Watch the full walkthrough on YouTube:  
👉 [How to Minify HTML with PHP Output Buffering - https://www.youtube.com/watch?v=hRgQSmu4bjA](https://www.youtube.com/watch?v=hRgQSmu4bjA)

Learn how this technique can make your pages load faster and cleaner in just a few lines of code.

## 🚀 How It Works

This script hooks into the PHP output buffer using `ob_start()`, then passes the entire HTML output through a `minifier()` function before it gets sent to the browser.

### Example:

```php
<?php
ob_start("minifier");

function minifier($code) {
    $search = array(
        '/\>[^\S ]+/s',     // remove whitespaces after tags
        '/[^\S ]+\</s',     // remove whitespaces before tags
        '/(\s)+/s',         // collapse multiple spaces
        '/<!--(.|\s)*?-->/' // remove HTML comments
    );
    $replace = array('>', '<', '\\1');
    return preg_replace($search, $replace, $code);
}
?>
<!-- Your HTML goes here -->
<?php ob_end_flush(); ?>
