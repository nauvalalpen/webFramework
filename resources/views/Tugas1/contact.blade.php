<!DOCTYPE html>
<html>
<head>
    <title>Contact Us</title>
</head>
<body>
    <h1>Contact Us</h1>
    <form method="POST" action="/contact/send">
        @csrf
        <div>
            <input type="text" name="name" placeholder="Your Name">
        </div>
        <div>
            <input type="email" name="email" placeholder="Your Email">
        </div>
        <div>
            <textarea name="message" placeholder="Your Message"></textarea>
        </div>
        <button type="submit">Send Message</button>
    </form>
</body>
</html>
