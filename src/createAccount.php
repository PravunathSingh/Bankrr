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
          <div class="col-span-2">
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

          <div class="antialiased sans-serif" class="col-span-2">
            <div x-data="app()" x-init="[initDate(), getNoOfDays()]" x-cloak>
              <div>
                <div class="w-64 mb-5">
                  <label for="datepicker" class="block mb-1 font-bold text-brand-accent-secondary">Filter By
                    Date</label>
                  <div class="relative">
                    <input type="hidden" name="date" x-ref="date" :value="datepickerValue" />
                    <input type="text" x-on:click="showDatepicker = !showDatepicker" x-model="datepickerValue"
                      x-on:keydown.escape="showDatepicker = false"
                      class="w-full py-3 pl-4 pr-10 font-medium leading-none rounded-lg shadow-sm bg-brand-secondary text-brand-text focus:outline-none focus:ring focus:ring-brand-accent-secondary focus:ring-opacity-50"
                      placeholder="Select date" readonly />

                    <div class="absolute top-0 right-0 px-3 py-2">
                      <svg class="w-6 h-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                      </svg>
                    </div>

                    <!-- <div x-text="no_of_days.length"></div>
                      <div x-text="32 - new Date(year, month, 32).getDate()"></div>
                      <div x-text="new Date(year, month).getDay()"></div> -->

                    <div class="absolute top-0 left-0 p-4 mt-12 rounded-lg shadow bg-brand-secondary"
                      style="width: 17rem" x-show.transition="showDatepicker" @click.away="showDatepicker = false">
                      <div class="flex items-center justify-between mb-2">
                        <div>
                          <span x-text="MONTH_NAMES[month]" class="text-lg font-bold text-brand-text"></span>
                          <span x-text="year" class="ml-1 text-lg font-normal text-brand-text"></span>
                        </div>
                        <div>
                          <button type="button"
                            class="inline-flex p-1 transition duration-100 ease-in-out rounded-full cursor-pointer focus:outline-none focus:shadow-outline hover:bg-gray-100"
                            @click="if (month == 0) {
                                  year--;
                                  month = 12;
                                } month--; getNoOfDays()">
                            <svg class="inline-flex w-6 h-6 text-brand-text" fill="none" viewBox="0 0 24 24"
                              stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 19l-7-7 7-7" />
                            </svg>
                          </button>
                          <button type="button"
                            class="inline-flex p-1 transition duration-100 ease-in-out rounded-full cursor-pointer focus:outline-none focus:shadow-outline hover:bg-gray-100"
                            @click="if (month == 11) {
                                  month = 0; 
                                  year++;
                                } else {
                                  month++; 
                                } getNoOfDays()">
                            <svg class="inline-flex w-6 h-6 text-gray-400" fill="none" viewBox="0 0 24 24"
                              stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                          </button>
                        </div>
                      </div>

                      <div class="flex flex-wrap mb-3 -mx-1">
                        <template x-for="(day, index) in DAYS" :key="index">
                          <div style="width: 14.26%" class="px-0.5">
                            <div x-text="day" class="text-xs font-medium text-center text-brand-text"></div>
                          </div>
                        </template>
                      </div>

                      <div class="flex flex-wrap -mx-1">
                        <template x-for="blankday in blankdays">
                          <div style="width: 14.28%" class="p-1 text-sm text-center border border-transparent"></div>
                        </template>
                        <template x-for="(date, dateIndex) in no_of_days" :key="dateIndex">
                          <div style="width: 14.28%" class="px-1 mb-1">
                            <div @click="getDateValue(date)" x-text="date"
                              class="text-sm leading-none text-center transition duration-100 ease-in-out rounded-full cursor-pointer"
                              :class="{
                                'bg-indigo-200': isToday(date) == true, 
                                'text-brand-text hover:bg-indigo-200': isToday(date) == false && isSelectedDate(date) == false,
                                'bg-indigo-500 text-white hover:bg-opacity-75': isSelectedDate(date) == true 
                              }"></div>
                          </div>
                        </template>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/2.3.0/alpine.js"
    integrity="sha512-nIwdJlD5/vHj23CbO2iHCXtsqzdTTx3e3uAmpTm4x2Y8xCIFyWu4cSIV8GaGe2UNVq86/1h9EgUZy7tn243qdA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <script>
    const MONTH_NAMES = [
      "January",
      "February",
      "March",
      "April",
      "May",
      "June",
      "July",
      "August",
      "September",
      "October",
      "November",
      "December",
    ];
    const MONTH_SHORT_NAMES = [
      "Jan",
      "Feb",
      "Mar",
      "Apr",
      "May",
      "Jun",
      "Jul",
      "Aug",
      "Sep",
      "Oct",
      "Nov",
      "Dec",
    ];
    const DAYS = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];

    function app() {
      return {
        showDatepicker: false,
        datepickerValue: "",
        selectedDate: "2021-02-04",
        dateFormat: "DD-MM-YYYY",
        month: "",
        year: "",
        no_of_days: [],
        blankdays: [],
        initDate() {
          let today;
          if (this.selectedDate) {
            today = new Date(Date.parse(this.selectedDate));
          } else {
            today = new Date();
          }
          this.month = today.getMonth();
          this.year = today.getFullYear();
          this.datepickerValue = this.formatDateForDisplay(
            today
          );
        },
        formatDateForDisplay(date) {
          let formattedDay = DAYS[date.getDay()];
          let formattedDate = ("0" + date.getDate()).slice(
            -2
          ); // appends 0 (zero) in single digit date
          let formattedMonth = MONTH_NAMES[date.getMonth()];
          let formattedMonthShortName =
            MONTH_SHORT_NAMES[date.getMonth()];
          let formattedMonthInNumber = (
            "0" +
            (parseInt(date.getMonth()) + 1)
          ).slice(-2);
          let formattedYear = date.getFullYear();
          if (this.dateFormat === "DD-MM-YYYY") {
            return `${formattedDate}-${formattedMonthInNumber}-${formattedYear}`; // 02-04-2021
          }
          if (this.dateFormat === "YYYY-MM-DD") {
            return `${formattedYear}-${formattedMonthInNumber}-${formattedDate}`; // 2021-04-02
          }
          if (this.dateFormat === "D d M, Y") {
            return `${formattedDay} ${formattedDate} ${formattedMonthShortName} ${formattedYear}`; // Tue 02 Mar 2021
          }
          return `${formattedDay} ${formattedDate} ${formattedMonth} ${formattedYear}`;
        },
        isSelectedDate(date) {
          const d = new Date(this.year, this.month, date);
          return this.datepickerValue ===
            this.formatDateForDisplay(d) ?
            true :
            false;
        },
        isToday(date) {
          const today = new Date();
          const d = new Date(this.year, this.month, date);
          return today.toDateString() === d.toDateString() ?
            true :
            false;
        },
        getDateValue(date) {
          let selectedDate = new Date(
            this.year,
            this.month,
            date
          );
          this.datepickerValue = this.formatDateForDisplay(
            selectedDate
          );
          // this.$refs.date.value = selectedDate.getFullYear() + "-" + ('0' + formattedMonthInNumber).slice(-2) + "-" + ('0' + selectedDate.getDate()).slice(-2);
          this.isSelectedDate(date);
          this.showDatepicker = false;
        },
        getNoOfDays() {
          let daysInMonth = new Date(
            this.year,
            this.month + 1,
            0
          ).getDate();
          // find where to start calendar day of week
          let dayOfWeek = new Date(
            this.year,
            this.month
          ).getDay();
          let blankdaysArray = [];
          for (var i = 1; i <= dayOfWeek; i++) {
            blankdaysArray.push(i);
          }
          let daysArray = [];
          for (var i = 1; i <= daysInMonth; i++) {
            daysArray.push(i);
          }
          this.blankdays = blankdaysArray;
          this.no_of_days = daysArray;
        },
      };
    }
  </script>
</body>

</html>