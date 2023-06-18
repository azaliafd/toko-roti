// Toggle Kelas Aktif

const navbarNav = document.querySelector
('.navbar-nav');

// ketika hamburger menu di klik
document.querySelector('#hamburger-menu').
onclick = () => {
  navbarNav.classList.toggle('active');
};

// Toggle class active untuk search form
const searchForm = document.querySelector('.search-form');
const searchBox = document.querySelector('#search-box');

document.querySelector('#search-button').onclick = (e) => {
  searchForm.classList.toggle('active');
  searchBox.focus();
  e.preventDefault();
}


// Toggle kelas aktif untuk shopping cart
const shoppingCart = document.querySelector('.shopping-cart');
document.querySelector('#shopping-cart-button').onclick = (e) => {
  shoppingCart.classList.toggle('active');
  e.preventDefault();
};


// Klik diluar elemen
const hm = document.querySelector('#hamburger-menu');
const sb = document.querySelector('#search-button');
const sc = document.querySelector('#shopping-cart-button');

document.addEventListener('click', function(e) {
  if (!hm.contains(e.target) && !navbarNav.contains(e.target)) {
    navbarNav.classList.remove('active');
  }
  if (!sb.contains(e.target) && !searchForm.contains(e.target)) {
    searchForm.classList.remove('active');
  }
  if (!sc.contains(e.target) && !searchForm.contains(e.target)) {
    shoppingCart.classList.remove('active');
  }

});



// Modal Box
// const itemDetailModal = document.querySelector('#item-detail-modal');
// const itemDetailButtons = document.querySelectorAll('.item-detail-button');

// itemDetailButtons.forEach((btn) => {
//   btn.onclick = (e) => {
//   itemDetailModal.style.display = 'flex';
//   e.preventDefault();
// };
// })

// Modal
// const itemDetailModal = document.getElementById('item-detail-modal');
// const closeIcon = itemDetailModal.querySelector('.close-icon');
// const modalProductImage = itemDetailModal.querySelector('#modal-product-image');
// const modalProductName = itemDetailModal.querySelector('#modal-product-name');
// const modalProductPrice = itemDetailModal.querySelector('#modal-product-price');
// const itemDetailButtons = document.querySelectorAll('.item-detail-button');

// // Open item detail modal
// function openItemDetailModal(productId) {
//   const product = <?php echo json_encode(getProductDetails($productId)); ?>; // Ambil data produk dari database berdasarkan ID

//   // Mengisi konten modal dengan data produk
//   modalProductImage.src = product.img;
//   modalProductName.textContent = product.nama_produk;
//   modalProductPrice.textContent = 'IDR 100000' + product.harga;

//   itemDetailModal.style.display = 'block';
// }


// // Event listener untuk tombol item detail
// itemDetailButtons.forEach(button => {
//   button.addEventListener('click', () => {
//     const productId = button.getAttribute('data-product-id');
//     openItemDetailModal(productId);
//   });
// });

// // Event listener untuk tombol close pada modal
// closeIcon.addEventListener('click', () => {
//   itemDetailModal.style.display = 'none';
// });

// window.onclick = (e) => {
//   if (e.target == itemDetailModal) {
//     itemDetailModal.style.display = 'none';
//   }
// };

// script.js
const modalProductImage = document.getElementById('modal-product-image');
const modalProductName = document.getElementById('modal-product-name');
const modalProductPrice = document.getElementById('modal-product-price');
const itemDetailButtons = document.querySelectorAll('.item-detail-button');
const itemDetailModal = document.getElementById('item-detail-modal');
const closeIcon = itemDetailModal.querySelector('.close-icon');

itemDetailButtons.forEach(button => {
  button.addEventListener('click', (event) => {
    event.preventDefault();
    const productId = button.dataset.productId;
    openItemDetailModal(productId);
  });
});

// Open item detail modal
function openItemDetailModal(productId) {
  // Buat objek XMLHttpRequest
  const xhr = new XMLHttpRequest();

  // Menentukan endpoint PHP yang akan dipanggil
  const url = 'api.php';

  // Menentukan metode dan endpoint
  xhr.open('POST', url, true);

  // Menentukan tipe konten yang dikirimkan dalam permintaan
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

  // Menentukan callback untuk menangani respons dari server
  xhr.onload = function() {
    if (xhr.status === 200) {
      const product = JSON.parse(xhr.responseText);

      // Mengisi konten modal dengan data produk
      modalProductImage.src = product.img;
      modalProductName.textContent = product.nama_produk;
      modalProductPrice.textContent = 'IDR ' + product.harga;

      itemDetailModal.style.display = 'block';
    }
  };

  // Mengirim permintaan ke server dengan data produk ID
  xhr.send('productId=' + productId);
}

closeIcon.addEventListener('click', () => {
  itemDetailModal.style.display = 'none';
});

window.onclick = (e) => {
  if (e.target === itemDetailModal) {
    itemDetailModal.style.display = 'none';
  }
};


// Event listener untuk tombol item detail
