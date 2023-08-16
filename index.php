<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>NSS Club</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <header class="bg-white py-4">
    <div class="container mx-auto px-4 flex items-center justify-between">
      <div class="flex items-center">
        <img src="https://seeklogo.com/images/N/new-nss-logo-F8180B4F6C-seeklogo.com.png" alt="NSS Club Logo" class="w-12 h-12">
        <span class="font-bold text-lg ml-2">CBITNSS</span>
      </div>
      <nav>
        <ul class="flex space-x-4">
          <li><a href="#about-us">About Us</a></li>
          <li><a href="#contact-us">Contact Us</a></li>
        </ul>
      </nav>
    </div>
  </header>
  <section class="hero bg-cover bg-center h-96" style="background-image: url('https://picsum.photos/800/400');">
    <div class="container mx-auto px-4 flex flex-col items-center justify-center h-full text-center">
      <h2 class="text-4xl font-bold text-white">Subscribe to Our Newsletter</h2>
      <p class="text-white mt-4">Stay updated with the latest news and events.</p>
      <form action="subscribe.php" method="POST" class="mt-6">
        <div class="flex items-center">
          <input type="email" name="email" placeholder="Enter your email address" required class="rounded-l-lg px-4 py-2 border-2 border-gray-300 focus:outline-none focus:border-blue-500">
          <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded-r-lg">Subscribe</button>
        </div>
      </form>
    </div>
  </section>
  <section id="about-us" class="py-12">
    <div class="container mx-auto px-4">
      <h3 class="text-2xl font-bold mb-4">About Us</h3>
      <p class="text-gray-800">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam consequat, lectus ut pulvinar porttitor, ipsum metus feugiat lacus, eu lobortis sapien nisi vitae arcu. Nulla sit amet tellus tristique, fringilla erat vitae, dapibus nunc. Aliquam bibendum consectetur tristique. Quisque feugiat orci sed purus eleifend efficitur. Ut tincidunt elit sit amet nisl dapibus tristique. Nam pellentesque risus in aliquet egestas. Mauris aliquam auctor malesuada. Morbi dapibus lacus ut magna commodo, in aliquet lacus bibendum. Mauris fringilla, purus ut rutrum ullamcorper, ligula nulla fringilla justo, in maximus eros turpis id lorem.</p>
    </div>
  </section>
  <section id="feedback" class="py-12 bg-gray-100">
    <div class="container mx-auto px-4">
      <div class="flex items-center mb-8">
        <div class="w-1/2">
          <h3 class="text-2xl font-bold mb-2">Feedback</h3>
          <p>Help us get better by providing your valuable feedback.</p>
        </div>
        <div class="w-1/2">
          <form action="feedback.php" method="POST" class="max-w-lg mx-auto">
            <div class="mb-4">
              <input type="text" id="first-name" name="first-name" required class="w-full rounded-lg px-4 py-2 border-2 border-gray-300 focus:outline-none focus:border-blue-500" placeholder="First Name">
            </div>
            <div class="mb-4">
              <input type="text" id="last-name" name="last-name" required class="w-full rounded-lg px-4 py-2 border-2 border-gray-300 focus:outline-none focus:border-blue-500" placeholder="Last Name">
            </div>
            <div class="mb-4">
              <input type="email" id="email" name="email" required class="w-full rounded-lg px-4 py-2 border-2 border-gray-300 focus:outline-none focus:border-blue-500" placeholder="Email">
            </div>
            <div class="mb-4">
              <textarea id="message" name="message" required class="w-full h-32 rounded-lg px-4 py-2 border-2 border-gray-300 focus:outline-none focus:border-blue-500" placeholder="Message"></textarea>
            </div>
            <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded-lg block mx-auto">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </section>
  <section id="contact-us" class="py-12">
    <div class="container mx-auto px-4">
      <h3 class="text-2xl font-bold mb-4">Contact Us</h3>
      <p class="text-gray-800">Have any questions or suggestions? Reach out to us:</p>
      <ul class="text-gray-800 mb-6">
        <li>Email: info@cbitnss.com</li>
        <li>Phone: +1 123-456-7890</li>
        <li>Address: 123 Main Street, City, Country</li>
      </ul>
      <div class="flex space-x-4">
        <a href="#" class="text-blue-500">Instagram</a>
        <a href="#" class="text-blue-500">Gmail</a>
      </div>
    </div>
  </section>
  <footer class="bg-gray-800 py-4">
    <div class="container mx-auto px-4">
      <p class="text-white text-center">&copy; 2023 NSS Club. All rights reserved.</p>
    </div>
  </footer>
</body>
</html>
