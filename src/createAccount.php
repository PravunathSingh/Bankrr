<?php
require_once "include/header.php";

require_once "include/db.php";
?>


<body class="bg-brand-primary">
  <section class="container">
    <div class="my-20">
      <h1 class="mb-20 text-4xl font-bold text-center md:text-5xl text-brand-text">Create Account</h1>
    </div>
    <div class="grid place-content-center place-items-center">
      <form method="POST" action="post/account.php" enctype = "multipart/form-data">
        <div
          class="grid grid-cols-2 gap-5 py-12 mb-20 shadow-xl place-content-between px-7 bg-brand-secondary rounded-xl">
          <div>
            <div class="mb-2">
              <label class="text-lg font-normal text-brand-text">Name *</label>
            </div>
            <div class="mb-8">
              <input type="text" name="name" required
                class="w-full px-5 py-2 text-lg font-normal rounded-lg shadow-lg outline-none bg-brand-primary text-brand-text focus:ring-1 focus:ring-brand-accent-secondary">
            </div>
          </div>
          <div>
            <div class="mb-2">
              <label class="text-lg font-normal text-brand-text">Email *</label>
            </div>
            <div class="mb-8">
              <input type="email" name="email" required
                class="w-full px-5 py-2 text-lg font-normal rounded-lg shadow-lg outline-none bg-brand-primary text-brand-text focus:ring-1 focus:ring-brand-accent-secondary">
            </div>
          </div>
          <div>
            <div class="mb-2">
              <label class="text-lg font-normal text-brand-text">Phone *</label>
            </div>
            <div class="mb-8">
              <input type="text" name="phone" required
                class="w-full px-5 py-2 text-lg font-normal rounded-lg shadow-lg outline-none bg-brand-primary text-brand-text focus:ring-1 focus:ring-brand-accent-secondary">
            </div>
          </div>
          <div>
            <div class="mb-2">
              <label class="text-lg font-normal text-brand-text">PAN Number *</label>
            </div>
            <div class="mb-8">
              <input type="text" name="pan" required
                class="w-full px-5 py-2 text-lg font-normal rounded-lg shadow-lg outline-none bg-brand-primary text-brand-text focus:ring-1 focus:ring-brand-accent-secondary">
            </div>
          </div>
           <div>
            <div class="mb-2">
              <label class="text-lg font-normal text-brand-text" required>Gender *</label>
            </div>
            <div class="mb-8">
              <input type="radio" name = "gender" value = "Male"
                class="mr-3 outline-none bg-brand-text focus:ring-1 focus:ring-brand-accent-secondary"> <span
                class="text-base font-normal text-brand-text">Male</span> 
              <input type="radio"  name = "gender" value = "Female"
                class="mr-3 outline-none bg-brand-text focus:ring-1 focus:ring-brand-accent-secondary"> <span
                class="text-base font-normal text-brand-text"> Female</span>
              <input type="radio"  name = "gender" value = "Other"
                class="mr-3 outline-none bg-brand-text focus:ring-1 focus:ring-brand-accent-secondary"> <span
                class="text-base font-normal text-brand-text">Other</span> 
            </div>
          </div>
          <div class="col-span-2">
            <div class="mb-2">
              <label class="text-lg font-normal text-brand-text">Address *</label>
            </div>
            <div class="mb-11">
              <textarea name="address" cols="30" rows="5"
                class="w-full px-5 py-2 mb-3 text-lg font-normal rounded-lg shadow-lg outline-none bg-brand-primary text-brand-text focus:ring-1 focus:ring-brand-accent-secondary"></textarea>
            </div>
          </div>
          <div>
            <div class="mb-2">
              <label class="text-lg font-normal text-brand-text">Address Proof *</label>
            </div>
            <div class="mb-8">
              <input type="radio" name = "doc" value="aadhar" 
                class="mr-3 outline-none bg-brand-text focus:ring-1 focus:ring-brand-accent-secondary"> <span
                class="text-base font-normal text-brand-text">Aadhar Card</span> <br>
              <input type="radio"  name = "doc" value="voter" 
                class="mr-3 outline-none bg-brand-text focus:ring-1 focus:ring-brand-accent-secondary"> <span
                class="text-base font-normal text-brand-text">Voter ID</span> <br>
              <input type="radio"  name = "doc" value="passport" 
                class="mr-3 outline-none bg-brand-text focus:ring-1 focus:ring-brand-accent-secondary"> <span
                class="text-base font-normal text-brand-text">Passport</span> <br>
            </div>
          </div>
          <div>
            <div class="mb-2">
              <label class="text-lg font-normal text-brand-text">Document Number *</label>
            </div>
            <div class="mb-8">
              <input type="text" name="doc_no" required
                class="w-full px-5 py-2 text-lg font-normal rounded-lg outline-none bg-brand-primary text-brand-text focus:ring-1 focus:ring-brand-accent-secondary">
            </div>
          </div>
          <div class="mb-8 has-tooltip">
            <label
              class="tracking-wide uppercase transition-all outline-none cursor-pointer text-brand-text hover:text-brand-accent-primary">
              <i class="mr-2 fa fa-cloud-upload-alt"></i>
              <span class="mt-2 text-base leading-normal"><span
                  class="p-3 -mt-12 text-sm font-light lowercase rounded shadow-lg bg-brand-primary tooltip text-brand-accent-secondary-dark">Image
                  should
                  be less than 1 MB</span> Upload User Image</span>
              <input type="file" name="user_image" class="hidden" id="customFile" />
            </label>
          </div>
          <div class="mb-8 has-tooltip">
            <label
              class="tracking-wide uppercase transition-all outline-none cursor-pointer text-brand-text hover:text-brand-accent-primary">
              <i class="mr-2 fa fa-cloud-upload-alt"></i>
              <span class="mt-2 text-base leading-normal"><span
                  class="p-3 -mt-16 text-sm font-light lowercase rounded shadow-lg md:-mt-12 bg-brand-primary tooltip text-brand-accent-secondary-dark">Total
                  Size
                  should
                  be less than 2 MB</span> Upload Documents</span>
              <input type="file" name="doc_image" class="hidden" id="customFile" />
            </label>
          </div>
          <div>
            <div class="mb-2">
              <label class="text-lg font-normal text-brand-text">Select Branch *</label>
            </div>
            <div class="mb-8">
              <select name="branch" 
                class="w-full px-5 py-2 text-lg font-normal rounded-lg outline-none bg-brand-primary text-brand-text focus:ring-1 focus:ring-brand-accent-secondary">

                <option value="">Choose Your Branch</option>
                
<?php 
$query = "SELECT * FROM branch";
                        $connection = mysqli_query($db_connection, $query);
                       
                        while($row = mysqli_fetch_assoc($connection))
                        {
                           echo '<option value="'.$row['branch_id'].'">'.$row['branch_name'].'</option>';
                        }
                        ?>
                     
              </select>
            </div>
          </div>
          <div>
            <div class="mb-2">
              <label class="text-lg font-normal text-brand-text">Select Account Type*</label>
            </div>
            <div class="mb-8">
              <select name="type" 
                class="w-full px-5 py-2 text-lg font-normal rounded-lg outline-none bg-brand-primary text-brand-text focus:ring-1 focus:ring-brand-accent-secondary">
                <option value="Savings">Savings</option>
                <option value="Salary">Salary</option>
                <option value="Current">Current</option>
                <option value="Fixed Deposit">Fixed Deposit</option>
              </select>
            </div>
          </div>
          <div class="has-tooltip">
            <div class="mb-2">
              <label class="text-lg font-normal text-brand-text"><span
                  class="p-3 -mt-16 text-sm font-light text-red-300 lowercase rounded shadow-lg md:-mt-12 bg-brand-primary tooltip">Should
                  contain at least one special character, one number, one capital case letter and minimum of 6
                  characters
                </span>
                Password *</label>
            </div>
            <div class="mb-8">
              <input type="password" name="password" required
                class="w-full px-5 py-2 text-lg font-normal rounded-lg shadow-lg outline-none bg-brand-primary text-brand-text focus:ring-1 focus:ring-brand-accent-secondary">
            </div>
          </div>
          <div>
            <div class="mb-2">
              <label class="text-lg font-normal text-brand-text">Confirm Password *</label>
            </div>
            <div class="mb-8">
              <input type="password" name="ConfirmPassword" required
                class="w-full px-5 py-2 text-lg font-normal rounded-lg shadow-lg outline-none bg-brand-primary text-brand-text focus:ring-1 focus:ring-brand-accent-secondary">
            </div>
          </div>
          <div class="col-span-2">
            <button type="submit" name="create" class="w-full shadow-lg btn-primary">Create Account</button>
          </div>
        </div>

      </form>
    </div>
  </section>

  <script src="./script.js"></script>
</body>

</html>