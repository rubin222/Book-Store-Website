document.addEventListener('DOMContentLoaded', function () {
  const heartLogo = document.querySelector('#heartLogo');

  // Check if the element is found
  if (heartLogo) {
      // Add a click event listener
      heartLogo.addEventListener('click', function () {
          // Redirect to 'reviews.html'
          window.location.href = 'reviews.html';
      });
  } else {
      console.error('Element with ID "heartLogo" not found.');
  }
});

// Define the click event handler for the search button
// Add event listener to the document to handle clicks on the search button
document.addEventListener('click', function(event) {
  // Check if the clicked element is the search button
  if (event.target && event.target.id === 'search-btn') {
      const searchForm = document.querySelector('.search-form');  
      searchForm.classList.toggle('active');
  }
});

// Add a scroll event listener to adjust header classes
window.onscroll = () => {
  const header2 = document.querySelector('.header .header-2');
  if (window.scrollY > 80) {
      header2.classList.add('active');
  } else {
      header2.classList.remove('active');
  }
};

// Execute on window load
window.onload = () => {
  const header2 = document.querySelector('.header .header-2');
  // Adjust header classes based on initial scroll position
  if (window.scrollY > 80) {
      header2.classList.add('active');
  } else {
      header2.classList.remove('active');
  }

  // Add click event listener to logout button
  const logout = document.querySelector('#logout');
  if (logout) {
      logout.addEventListener('click', () => {
          // Redirect to 'login3.php' when the logout button is clicked
          window.location.href = 'login3.php';
      });
  } else {
      console.error('Element with ID "logout" not found.');
  }
};


// Initialize Swiper sliders
const sliders = document.querySelectorAll('.swiper-container');
sliders.forEach(slider => {
  const swiper = new Swiper(slider, {
      // Add Swiper options and breakpoints here
      loop: true,
      centeredSlides: true,
      autoplay: {
          delay: 2000,
          disableOnInteraction: false,
      },
      navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
      },
      breakpoints: {
          0: {
              slidesPerView: 1,
          },
          768: {
              slidesPerView: 2,
          },
          1024: {
              slidesPerView: 3,
          },
      },
  });
});


document.addEventListener('DOMContentLoaded',function(){
var swiper = new Swiper(".books-slider", {
    loop:true,
    centeredSlides: true,
    autoplay: {
        delay: 800,
        disableOnInteraction: false,
    },
    direction:'horizontal',
    breakpoints: {
      0: {
        slidesPerView: 1,
      },
      768: {
        slidesPerView: 2,
      },
      1024: {
        slidesPerView: 3,
      },
    },
  });
});
document.addEventListener('DOMContentLoaded',function(){
    var swiper = new Swiper(".featured-slider", {
        spaceBetween: 10,
        loop:true,
        centeredSlides: true,
        autoplay: {
            delay: 2000,
            disableOnInteraction: false,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
          },
        breakpoints: {
          0: {
            slidesPerView: 1,
          },
          450: {
            slidesPerView: 2,
          },
          768: {
            slidesPerView: 3,
          },
          1024: {
            slidesPerView: 4,
          },
        },
      });
    });
    document.addEventListener('DOMContentLoaded',function(){
      var swiper = new Swiper(".arrivals-slider", {
          spaceBetween: 10,
          loop:true,
          centeredSlides: true,
          autoplay: {
              delay: 2000,
              disableOnInteraction: false,
          },
          breakpoints: {
            0: {
              slidesPerView: 1,
            },
            768: {
              slidesPerView: 2,
            },
            1024: {
              slidesPerView: 3,
            },
          },
        });
      });
      document.addEventListener('DOMContentLoaded',function(){
        var swiper = new Swiper(".Reviews-slider", {
          Grabcursor:true,
            spaceBetween: 10,
            loop:true,
            centeredSlides: true,
            autoplay: {
                delay: 2000,
                disableOnInteraction: false,
            },
            breakpoints: {
              0: {
                slidesPerView: 1,
              },
              768: {
                slidesPerView: 2,
              },
              1024: {
                slidesPerView: 3,
              },
            },
          });
        });
        
      document.addEventListener('DOMContentLoaded',function(){
        var swiper = new Swiper(".blogs-slider", {
            spaceBetween: 10,
            grabCursor:true,
            loop:true,
            centeredSlides: true,
            autoplay: {
                delay: 2000,
                disableOnInteraction: false,
            },
            breakpoints: {
              0: {
                slidesPerView: 1,
              },
              768: {
                slidesPerView: 2,
              },
              1024: {
                slidesPerView: 3,
              },
            },
          });
        });
// Function to update the cart count
// Assuming you have a cart icon with id 'cart-icon' in your HTML
const cartIcon = document.getElementById('#cartIcon');

// Function to handle the AJAX request to addToCart.php
function addToCart(productId, callback) {
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'addToCart.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                const response = JSON.parse(xhr.responseText);
                callback(response);
            } else {
                console.error('Error:', xhr.status);
            }
        }
    };
    xhr.send(`book_id=${productId}&name=${productName}&price=${productPrice}&quantity=${quantity}`);
}

// Example usage: Call addToCart function when adding a product to the cart
addToCart('your_product_id', function(response) {
    // Update cart icon with the added product details
    cartIcon.innerHTML = `${response.productName} (${response.quantity}) - $${response.productPrice}`;
});
/*document.addEventListener('DOMContentLoaded', function () {
  const heartLogo = document.querySelector('#heartLogo');

  // Check if the element is found
  if (heartLogo) {
    // Add a click event listener
    heartLogo.addEventListener('click', function () {
      // Redirect to 'reviews.html'
      window.location.href = 'reviews.html';
    });
  } else {
    console.error('Element with ID "heartLogo" not found.');
  }

  // Toggle search form visibility
  const searchForm = document.querySelector('.search-form');
  const searchBtn = document.querySelector('#search-btn');
  searchBtn.addEventListener('click', function () {
    searchForm.classList.toggle('active');
  });

  window.onscroll = () => {
    searchForm.classList.remove('active');
    if (window.scrollY > 80) {
      document.querySelector('.header .header-2').classList.add('active');
    } else {
      document.querySelector('.header .header-2').classList.remove('active');
    }
  };

  window.onload = () => {
    if (window.scrollY > 80) {
      document.querySelector('.header .header-2').classList.add('active');
    } else {
      document.querySelector('.header .header-2').classList.remove('active');
    }
  };

  const logout = document.querySelector('#logout');

  // Check if the element is found
  if (logout) {
    // Add a click event listener
    logout.addEventListener('click', function () {
      // Redirect to 'login3.php' when the logout button is clicked
      window.location.href = 'login3.php';
    });
  } else {
    console.error('Element with ID "logout" not found.');
  }
});

// Initialize Swiper sliders
const sliders = document.querySelectorAll('.swiper-container');
sliders.forEach(slider => {
  const swiper = new Swiper(slider, {
    // Add Swiper options and breakpoints here
    loop: true,
    centeredSlides: true,
    autoplay: {
      delay: 2000,
      disableOnInteraction: false,
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    breakpoints: {
      0: {
        slidesPerView: 1,
      },
      768: {
        slidesPerView: 2,
      },
      1024: {
        slidesPerView: 3,
      },
    },
  });
});

// Function to update the cart count
// Assuming you have a cart icon with id 'cart-icon' in your HTML
const cartIcon = document.getElementById('#cartIcon');

// Function to handle the AJAX request to addToCart.php
function addToCart(productId, callback) {
  const xhr = new XMLHttpRequest();
  xhr.open('POST', 'addToCart.php', true);
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.onreadystatechange = function () {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        const response = JSON.parse(xhr.responseText);
        callback(response);
      } else {
        console.error('Error:', xhr.status);
      }
    }
  };
  xhr.send(`book_id=${productId}&name=${productName}&price=${productPrice}&quantity=${quantity}`);
}

// Example usage: Call addToCart function when adding a product to the cart
addToCart('your_product_id', function (response) {
  // Update cart icon with the added product details
  cartIcon.innerHTML = `${response.productName} (${response.quantity}) - $${response.productPrice}`;
});
document.addEventListener('DOMContentLoaded', function () {
  // Heart Logo Click Event
  const heartLogo = document.querySelector('#heartLogo');
  if (heartLogo) {
      heartLogo.addEventListener('click', function () {
          window.location.href = 'reviews.html';
      });
  } else {
      console.error('Element with ID "heartLogo" not found.');
  }

  // Search Form Toggle
  const searchForm = document.querySelector('.search-form');
  const searchBtn = document.querySelector('#search-btn');
  if (searchBtn) {
      searchBtn.addEventListener('click', function () {
          searchForm.classList.toggle('active');
      });
  }

  // Logout Click Event
  const logout = document.querySelector('#logout');
  if (logout) {
      logout.addEventListener('click', function () {
          window.location.href = 'login3.php';
      });
  } else {
      console.error('Element with ID "logout" not found.');
  }

  // Initialize Swiper Sliders
  const sliders = document.querySelectorAll('.swiper-container');
  sliders.forEach(slider => {
      new Swiper(slider, {
          loop: true,
          centeredSlides: true,
          autoplay: {
              delay: 2000,
              disableOnInteraction: false,
          },
          navigation: {
              nextEl: '.swiper-button-next',
              prevEl: '.swiper-button-prev',
          },
          breakpoints: {
              0: { slidesPerView: 1 },
              768: { slidesPerView: 2 },
              1024: { slidesPerView: 3 },
          },
      });
  });

  // Cart Icon
  const cartIcon = document.getElementById('cartIcon');

  // Function to handle adding product to cart
  function addToCart(productId, productName, productPrice, quantity, callback) {
      const xhr = new XMLHttpRequest();
      xhr.open('POST', 'addToCart.php', true);
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      xhr.onreadystatechange = function () {
          if (xhr.readyState === XMLHttpRequest.DONE) {
              if (xhr.status === 200) {
                  const response = JSON.parse(xhr.responseText);
                  callback(response);
              } else {
                  console.error('Error:', xhr.status);
              }
          }
      };
      xhr.send(`book_id=${productId}&name=${productName}&price=${productPrice}&quantity=${quantity}`);
  }

  // Example usage of addToCart function
  addToCart('your_product_id', 'your_product_name', 'your_product_price', 'your_quantity', function (response) {
      cartIcon.innerHTML = `${response.productName} (${response.quantity}) - $${response.productPrice}`;
  });
});*/


