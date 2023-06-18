<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width= , initial-scale=1.0">
  <title>La Maison des Pains</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap" rel="stylesheet">
  <!-- End Fonts -->

  <!-- Feather Icons -->
  <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
  <!-- End Feather Icons -->

  <!-- My Style -->
  <link rel="stylesheet" href="css/style.css">
  <!-- End My Style -->
</head>

<body>
  <!-- Navbar start -->
  <nav class="navbar">
    <a href="/toko-roti/admin/admin.php" class="navbar-logo">La Maison des <span>Pains</span>.</a>

    <div class="navbar-nav">
      <a href="#home">Home</a>
      <a href="#about">About Us</a>
      <a href="#menu">Menu</a>
      <a href="#products">Product</a>
      <a href="#contact">Contact</a>
    </div>

    <div class="navbar-extra">
      <a href="#" id="search-button"><i data-feather="search"></i></a>
      <a href="#" id="shopping-cart-button"><i data-feather="shopping-cart"></i></a>
      <a href="#" id="hamburger-menu"><i data-feather="menu"></i></a>
    </div>

    <!-- Search Form Start -->
    <div class="search-form">
      <input type="search" id="search-box" placeholder="Search here...">
      <label for="search-box"><i data-feather="search"></i></label>
    </div>
    <!-- End Search Form -->

    <!-- Shooping Cart Start -->
    <div class="shopping-cart">
      <div class="cart-item">
        <img src="img/products/1.jpeg" alt="Product 1">
        <div class="item-detail">
          <h3>Product 1</h3>
          <div class="item-price">IDR 35K</div>
        </div>
        <i data-feather="trash-2" class="remove-item"></i>
      </div>
      <div class="cart-item">
        <img src="img/products/1.jpeg" alt="Product 1">
        <div class="item-detail">
          <h3>Product 1</h3>
          <div class="item-price">IDR 35K</div>
        </div>
        <i data-feather="trash-2" class="remove-item"></i>
      </div>
      <div class="cart-item">
        <img src="img/products/1.jpeg" alt="Product 1">
        <div class="item-detail">
          <h3>Product 1</h3>
          <div class="item-price">IDR 35K</div>
        </div>
        <i data-feather="trash-2" class="remove-item"></i>
      </div>
    </div>
    <!-- End Shooping Cart -->

  </nav>
  <!-- End Navbar -->

  <!-- Hero Section -->
  <section class="hero" id="home">
  <main class="content">
    <h1> <span>Kebahagiaan</span> dalam Setiap Gigitan.</h1>
    <p>Pengalaman kuliner yang tak terlupakan.</p>
    <br><br>
    <a href="#" class="cta">Buy Now</a>
  </main>
  </section>
  <!-- End Hero Section -->

  <!-- About Section Start -->

  <section id="about" class="about">
    <h2><span>About</span> Us</h2>
  
    <div class="row">
      <div class="about-img">
        <img src="img/tentang-kami.jpeg" alt="Tentang Kami">
      </div>
      <div class="content">
        <h3>Kenapa memilih pastry kami?</h3>
        <p>La Maison des Pains, toko roti yang menawarkan pengalaman kuliner yang menggabungkan roti berkualitas lezat dengan desain estetis yang memukau.</p>
        <p>Dengan menggunakan bahan-bahan terbaik dan teknik tradisional, roti kami dipanggang dengan keahlian untuk menciptakan produk yang tak terlupakan.</p>
        <p>La Maison des Pains siap memberikan pengalaman kuliner yang tak terlupakan dan kebahagiaan sejati dalam setiap gigitan roti.</p>
      </div>
    </div>
  </section>

  <!-- End About Section -->

  <!-- Menu Section Start -->
  <section id="menu" class="menu">
    <h2>Menu</h2>
    <?php
    require_once 'koneksi.php';

    $stmt = $db->query("SELECT * FROM menu");
    $menuItems = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <div class="row">
    <?php foreach ($menuItems as $menuItem): ?>
      <div class="menu-card">
      <img src="data:img/jpeg;base64,<?php echo base64_encode($menuItem['img']); ?>" alt="<?php echo $menuItem['nama_roti']; ?>" class="menu-card-img">
        <h3 class="menu-card-title"><?php echo $menuItem['nama_roti']; ?></h3>
       <p class="menu-card-price">IDR <?php echo $menuItem['harga']; ?></p>
     </div>
   <?php endforeach; ?>
   </div>
  </section>
  <!-- End Menu Section -->


  <!-- Produk Section -->
  <section class="products" id="products">
    <h2><span>Top</span> Products</h2>

    <?php 
    $stmt = $db->query("SELECT * FROM menu");
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);    
    ?>
    <div class="row">
      <?php foreach ($products as $product) : ?>
        <div class="product-card">
          <div class="product-icons">
            <a href="#"><i data-feather="shopping-cart"></i></a>
            <a href="#" class="item-detail-button" data-product-id=<?php echo $product['id'] ?>><i data-feather="eye"></i></a>
          </div>
          <div class="product-image">
            <img src="data:img/jpeg;base64,<?php echo base64_encode($product['img']); ?>" alt="<?php echo $product['nama_roti']; ?>" class="menu-card-img">
          </div>
          <div class="product-content">
            <h3><?php echo $product['nama_produk']; ?></h3>
            <div class="product-stars">
              <?php for ($i = 0; $i < 5; $i++) : ?>
                <i data-feather="star" class="star-full"></i>
              <?php endfor; ?>
            </div>
            <div class="product-price">IDR <?php echo $product['harga']; ?> <span><?php echo $product['harga_diskon']; ?></span></div>
          </div>
        </div>
      <?php endforeach; ?>
  </div>
  </section>
  <!-- End Produk Section -->


  <!-- Contact Section Start-->
  <section id="contact" class="contact">
    <h2><span>Contact</span> Us</h2>
    <p>Open 10 am - 11 pm daily.</p>
    
    <div class="row">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126748.60965058926!2d107.56075500190089!3d-6.903271951947712!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e6398252477f%3A0x146a1f93d3e815b2!2sBandung%2C%20Bandung%20City%2C%20West%20Java!5e0!3m2!1sen!2sid!4v1686662042762!5m2!1sen!2sid"  allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="map"></iframe>
      <form action="">
        <div class="input-group">
          <i data-feather="user"></i>
          <input type="text" placeholder="Name"> 
        </div>
        <div class="input-group">
          <i data-feather="mail"></i>
          <input type="text" placeholder="E-mail"> 
        </div>
        <div class="input-group">
          <i data-feather="phone"></i>
          <input type="text" placeholder="Phone Number"> 
        </div>
        <button type="submit" class="btn">Send Message</button>
      </form>
    </div>
  </section>
  <!-- End Contact Section -->


  <!-- Foooter -->
  <footer>
    <div class="socials">
      <a href="#"><i data-feather="instagram"></i></a>
      <a href="#"><i data-feather="twitter"></i></a>
      <a href="#"><i data-feather="facebook"></i></a>
    </div>

    <div class="links">
      <a href="#home">Home</a>
      <a href="#about">About Us</a>
      <a href="#menu">Menu</a>
      <a href="#contact">Contact</a>
    </div>

    <div class="credit">
      <p>Created by <a href="">
      azaliafathimah</a> | &copy: 2023.
      </p>
    </div>
  </footer>
  <!-- End Footer -->


  <!-- Modal Box Item Detail Start -->
    <div class="modal" id="item-detail-modal">
      <div class="modal-container">
        <a href="#" class="close-icon"><i data-feather="x"></i></a>
        <div class="modal-content">
          <img src="" alt="" id="modal-product-image">
          <div class="product-content">
            <h3 id="modal-product-name"></h3>
            <div class="product-stars">
              <?php for ($i = 0; $i < 5; $i++) : ?>
                <i data-feather="star"></i>
              <?php endfor; ?>
            </div>
            <div class="product-price" id="modal-product-price"></div>
            <a href="#"><i data-feather="shopping-cart"></i><span>Add to cart</span></a>
          </div>
        </div>
      </div>
    </div>

  <!-- <div class="modal" id="item-detail-modal">
    <div class="modal-container">
      <a href="#" class="close-icon"><i data-feather="x"></i></a>
      <div class="modal-content">
        <img src="img/products/1.jpeg" alt="Product 1">
        <div class="product-content">
          <h3>Product 1</h3>
          <div class="product-content">
            <h3>Bread Package 1</h3>
            <div class="product-stars">
              <i data-feather="star"></i>
              <i data-feather="star"></i>
              <i data-feather="star"></i>
              <i data-feather="star"></i>
              <i data-feather="star"></i>
            </div>
            <div class="product-price">IDR 50K <span>65K</span></div>
            <a href="#"><i data-feather="shopping-cart"></i><span>Add to cart</span></a>
        </div>
      </div>
    </div>
  </div> -->

  <!-- <script>
    const itemDetailModal = document.getElementById('item-detail-modal');
const closeIcon = itemDetailModal.querySelector('.close-icon');
const modalProductImage = itemDetailModal.querySelector('#modal-product-image');
const modalProductName = itemDetailModal.querySelector('#modal-product-name');
const modalProductPrice = itemDetailModal.querySelector('#modal-product-price');
const itemDetailButtons = document.querySelectorAll('.item-detail-button');

// Open item detail modal
function openItemDetailModal(productId) {

  // Mengisi konten modal dengan data produk
  modalProductImage.src = product.img;
  modalProductName.textContent = product.nama_produk;
  modalProductPrice.textContent = 'IDR 100000' + product.harga;

  itemDetailModal.style.display = 'block';
}

// Event listener untuk tombol item detail
itemDetailButtons.forEach(button => {
  button.addEventListener('click', () => {
    const productId = button.getAttribute('data-product-id');
    openItemDetailModal(productId);
  });
});

// Event listener untuk tombol close pada modal
closeIcon.addEventListener('click', () => {
  itemDetailModal.style.display = 'none';
});

window.onclick = (e) => {
  if (e.target == itemDetailModal) {
    itemDetailModal.style.display = 'none';
  }
};
  </script> -->

  
  <!-- End Modal Box Item Detail -->
  


  <!-- Feather Icons -->
  <script>
    feather.replace();
  </script>
  <!-- End Feather Icons -->


  <!-- My Java Script -->
  <script src="js/script.js"></script>
  
</body>
</html>
