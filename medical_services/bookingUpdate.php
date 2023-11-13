<!DOCTYPE html>
<!---Coding By CodingLab | www.codinglabweb.com--->
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <!--<title>Registration Form in HTML CSS</title>-->
    <!---Custom CSS File--->
    <link rel="stylesheet" href="styles/registration.css" />
  </head>
<body>
    <section class="container">
      <header>Registration Form</header>
        <form  class="form">
            <div class="input-box">
                <label>Full Name</label>
                <input type="text" name="fullname" placeholder="Enter full name" required />
            </div>

            <div class="input-box">
                <label>Email Address</label>
                <input type="text" name="email" placeholder="Enter email address" required />
            </div>

            <div class="column">
                <div class="input-box">
                    <label>Phone Number</label>
                    <input type="number" name="number" placeholder="Enter phone number" required />
                </div>
                <div class="input-box">
                    <label>Birth Date</label>
                    <input type="date" name="birth" placeholder="Enter birth date" required />
                </div>
            </div>
            <div class="gender-box">
                    <h3>Gender</h3>
                <div class="gender-option">
                    <div class="gender">
                        <input type="radio" id="check-male" name="gender" checked />
                        <label for="check-male">male</label>
                    </div>
                    <div class="gender">
                        <input type="radio" id="check-female" name="gender" />
                        <label for="check-female">Female</label>
                    </div>
                    <div class="gender">
                        <input type="radio" id="check-other" name="gender" />
                        <label for="check-other">prefer not to say</label>
                    </div>
                </div>
            </div>
            <div class="input-box address">
                <label>Address</label>
                    <input type="text" name="address" placeholder="Enter street address" required />
                    <input type="text" name="adressline2" placeholder="Enter street address line 2" required />
            <div class="column">
            <div class="select-box">
                <select>
                    <option hidden>Country</option>
                    <option>America</option>
                    <option>Japan</option>
                    <option>India</option>
                    <option>Nepal</option>
                </select>
            </div>
                <input type="text" name="city" placeholder="Enter your city" required />
            </div>
            <div class="column">
                <input type="text" name="region" placeholder="Enter your region" required />
                <input type="number" name="postalcode" placeholder="Enter postal code" required />
            </div>
            </div>
            <div class="button input-box">
                 <input type="submit" name="submit">
            </div>
        </form>
    </section>
  </body>
</html>  