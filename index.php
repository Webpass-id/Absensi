<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Page</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/css/bootstrap.css" />
    <link rel="stylesheet" href="/css/sign.css" />

    <!-- ICON DLL -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
      rel="stylesheet"
    />
  </head>

  <style>
     .Line-8 {
      width: 50px;
      height: 1.2px;
      flex-grow: 0;
      margin: 5px 0 13px 10px;
      background-color: #000;
      position: absolute;
      top: 7.6rem;
      left: 3.2rem;
    }
    .Line-9 {
      width: 30px;
      height: 1.2px;
      flex-grow: 0;
      margin: 28px 20px 5px 10px;
      background-color: #000;
      position: absolute;
      top: 5.9rem;
      left: 4.3em;
    }
    .Line-6 {
      width: 50px;
      height: 1.2px;
      flex-grow: 0;
      margin: 5px 0 13px 10px;
      background-color: #000;
      position: absolute;
      top: 7.6rem;
      left: 12.5em;
    }
    .Line-7 {
      width: 30px;
      height: 1.2px;
      flex-grow: 0;
      margin: 28px 20px 5px 10px;
      background-color: #000;
      position: absolute;
      top: 5.9rem;
      left: 12.6em;
    }
    .input-group {
      position: relative;
    }

    .form-control {
      padding-right: 40px; 
    }

    .toggle-password {
      position: absolute;
      right: 10px;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
      color: #6c757d; /* Warna ikon */
      z-index: 10; /* Pastikan ikon tetap terlihat di atas input */
    }

    .toggle-password:hover {
      color: #000; /* Warna saat hover */
    }
  </style>

  <body>
    <!-- Container untuk memusatkan konten -->
    <div
      class="container d-flex justify-content-center align-items-center vh-100"
    >
      <!-- Kotak Login -->
      <div
        class="card p-4"
        style="width: 100%; max-width: 320px; border-radius: 15px"
      >
        <!-- Logo -->
        <div class="text-center mb-0">
          <img
            src="assets/image.png"
            alt="Logo"
            class="img-fluid"
            style="max-width: 120px"
          />
        </div>
        
        <div class="login-header">
          <div class="Line-6"></div>
          <div class="Line-9"></div>
            <h3 class="text-center text-black">LOGIN</h3>
          <div class="Line-7"></div>
          <div class="Line-8"></div>
        </div>
        
        
        <form id="loginForm" method="POST">
          <div class="mb-4">
            <label for="username" class="form-label text ms-2 mb-1">USERNAME</label>
            <input type="text" class="form-control" id="username" name="username" required />
          </div>
          <div class="mb-4">
            <label for="password" class="form-label ms-2 mb-1">PASSWORD</label>
            <div class="input-group">
              <input
                type="password"
                class="form-control"
                id="password"
                name="password"
                required
              />
              <i
                class="fas fa-eye-slash toggle-password"
                id="togglePasswordIcon"
                onclick="togglePasswordVisibility()"
              ></i>
            </div>
          </div>
          <div id="errorMessage" class="text-danger text-center mb-2" style="display: none;"></div>
          <button
            type="submit"
            class="btn btn-primary my-4 w-50 mx-auto d-block rounded-pill"
            style="font-weight: 600;"
          >
            LOGIN
          </button>
        </form>
        
        <script>
          const form = document.getElementById("loginForm");
          const errorMessage = document.getElementById("errorMessage");
        
          form.addEventListener("submit", async (event) => {
            event.preventDefault();
        
            const formData = new FormData(form);
        
            try {
              const response = await fetch("database/login-process.php", {
                method: "POST",
                body: formData,
              });
        
              const result = await response.json();
        
              if (result.status === "error") {
                errorMessage.style.display = "block";
                errorMessage.textContent = result.message;
              }
                else if (result.status === "success") {
                window.location.href = result.redirect;
              }
            } catch (error) {
              errorMessage.style.display = "block";
              errorMessage.textContent = "Terjadi kesalahan, coba lagi.";
            }
          });
        
          function togglePasswordVisibility() {
            const passwordInput = document.getElementById("password");
            const toggleIcon = document.getElementById("togglePasswordIcon");
        
            if (passwordInput.type === "password") {
              passwordInput.type = "text";
              toggleIcon.classList.remove("fa-eye-slash");
              toggleIcon.classList.add("fa-eye");
            }
            else {
              passwordInput.type = "password";
              toggleIcon.classList.remove("fa-eye");
              toggleIcon.classList.add("fa-eye-slash");
            }
          }
        </script>
        
        
      </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- JavaScript untuk toggle password -->
    <script>
      function togglePasswordVisibility() {
  const passwordInput = document.getElementById("password");
  const toggleIcon = document.getElementById("togglePasswordIcon");

  if (passwordInput.type === "password") {
    passwordInput.type = "text";
    toggleIcon.classList.remove("fa-eye-slash");
    toggleIcon.classList.add("fa-eye");
  } else {
    passwordInput.type = "password";
    toggleIcon.classList.remove("fa-eye");
    toggleIcon.classList.add("fa-eye-slash");
  }
}

    </script>
    <script
      src="https://kit.fontawesome.com/a076d05399.js"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
