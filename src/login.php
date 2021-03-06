<?php
require_once "include/header.php";
require_once "include/db.php";
?>

<body class="bg-brand-primary">
 <!--  <nav class="bg-brand-primary">
    <div class="container py-4 shadow-lg lg:py-2 md:flex md:justify-between">
      <div class="flex items-center justify-between justify-items-center">
        <div>
          <a href="/" class="text-4xl font-bold lg:text-5xl text-brand-accent-primary">Bankrr</a>
        </div>

        <div class="md:hidden">
          <button type="button" class="block" id="menuBtn">
            <i class="fa fa-dropdown fa-bars fa-2x text-brand-text hover:text-brand-accent-secondary" id="menuIcon"></i>
          </button>
        </div>
      </div>

      <div class="hidden py-4 md:flex md:justify-items-center md:items-center" id="links">
        <a href="#home"
          class="block mb-2 text-lg font-medium md:ml-10 md:mb-0 text-brand-text hover:text-brand-accennt-primary-dark">Home</a>
        <a href="./loans.html"
          class="block mb-2 text-lg font-medium md:ml-10 md:mb-0 text-brand-text hover:text-brand-accennt-primary-dark">Loans</a>
        <a href="./offers.html"
          class="block mb-2 text-lg font-medium md:ml-10 md:mb-0 text-brand-text hover:text-brand-accennt-primary-dark">Offers</a>
        <a href="./contact.html"
          class="block mb-2 text-lg font-medium md:ml-10 md:mb-0 text-brand-text hover:text-brand-accennt-primary-dark">Contact</a>
      </div>
    </div>
  </nav> -->

  <section class="container my-24">
    <h1 class="mb-20 text-4xl font-bold text-center md:text-5xl text-brand-text">Login <i class="fa fa-user-secret"></i>
    </h1>

<?php
if(isset($_SESSION['login_error'])){
            $Error = $_SESSION['login_error'];
            echo "<p style='color:red;'>".$Error."</p>";
            unset($_SESSION['login_error']);
        }

if(isset($_SESSION['attempt'])){
            $Error = $_SESSION['attempt'];
            echo "<p style='color:red;'>".$Error."</p>";
            unset($_SESSION['attempt']);
        }
        // if(isset($_SESSION['attempts'])){
        //     $Error = $_SESSION['attempts'];
        //     echo "<p style='color:red;'>".$Error."</p>";
        //     unset($_SESSION['attempts']);
        // }

?>

    <div class="max-w-2xl mx-auto">
      <form method="POST" action="post/login.php">
        <div class="px-8 py-6 shadow-xl bg-brand-secondary rounded-xl">
          <div class="mb-2">
            <label class="text-lg font-normal text-brand-text">Email *</label>
          </div>
          <div class="mb-8">
            <input type="email" name="user_email" required
              class="w-full px-5 py-2 text-lg font-normal rounded-lg shadow-lg outline-none bg-brand-primary text-brand-text focus:ring-1 focus:ring-brand-accent-secondary">
          </div>
          <div class="mb-2">
            <label class="text-lg font-normal text-brand-text">Password *</label>
          </div>
          <div class="mb-11">
            <input type="password" name="user_pass" required
              class="w-full px-5 py-2 mb-3 text-lg font-normal rounded-lg shadow-lg outline-none bg-brand-primary text-brand-text focus:ring-1 focus:ring-brand-accent-secondary">
            <div x-data="{ showModal : false }">
              <!-- Button -->
              <h1 @click="showModal = !showModal" class="text-sm font-light cursor-pointer text-brand-text-dark">Forgot
                Password ?</h1>

              <!-- Modal Background -->
              <div x-show="showModal"
                class="fixed top-0 bottom-0 left-0 right-0 z-50 flex items-center justify-center overflow-auto text-gray-500 bg-black bg-opacity-40"
                x-transition:enter="transition ease duration-300" x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100" x-transition:leave="transition ease duration-300"
                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                <!-- Modal -->
                <div x-show="showModal" class="p-6 mx-12 bg-gray-600 shadow-2xl rounded-xl sm:max-w-2xl"
                  @click.away="showModal = false" x-transition:enter="transition ease duration-100 transform"
                  x-transition:enter-start="opacity-0 scale-90 translate-y-1"
                  x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                  x-transition:leave="transition ease duration-100 transform"
                  x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                  x-transition:leave-end="opacity-0 scale-90 translate-y-1">
                  <!-- Title -->
                  <form>
                    <div class="mb-2">
                      <label class="text-lg font-normal text-brand-text">Enter OTP *</label>
                    </div>
                    <div class="mb-8">
                      <input type="text" required
                        class="w-full px-5 py-2 text-lg font-normal rounded-lg shadow-lg outline-none bg-brand-secondary text-brand-text focus:ring-1 focus:ring-brand-accent-secondary">
                    </div>

                    <div class="mb-2">
                      <label class="text-lg font-normal text-brand-text">New Password *</label>
                    </div>
                    <div class="mb-8">
                      <input type="text" required
                        class="w-full px-5 py-2 text-lg font-normal rounded-lg shadow-lg outline-none bg-brand-secondary text-brand-text focus:ring-1 focus:ring-brand-accent-secondary">
                    </div>

                    <div class="mb-2">
                      <label class="text-lg font-normal text-brand-text">Confirm New Password *</label>
                    </div>
                    <div class="mb-8">
                      <input type="text" required
                        class="w-full px-5 py-2 text-lg font-normal rounded-lg shadow-lg outline-none bg-brand-secondary text-brand-text focus:ring-1 focus:ring-brand-accent-secondary">
                    </div>
                  </form>

                  <!-- Buttons -->
                  <div class="mt-5 space-x-5 text-right">
                    <button @click="showModal = !showModal" class="px-4 py-2 text-base btn-primary">Update</button>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div>
            <button type="submit" name="login_submit" class="w-full shadow-lg btn-primary">Log In</button>
          </div>
      </form>
    </div>
  </section>

  <script src="./script.js"></script>
</body>

</html>