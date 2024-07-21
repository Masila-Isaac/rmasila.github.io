<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Form</title>
  <style>
    /* Add your CSS styling here */
    .contact_section {
      padding: 20px;
      background-color: #f2f2f2;
      width: 100%;
      margin: 20px 0;
      border-radius: 10px;
    }
    .contact_section h2 {
      text-align: center;
    }
    .contact_section input,
    .contact_section button {
      width: 100%;
      padding: 10px;
      margin: 10px 0;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
    .contact_section button {
      background-color: #4CAF50;
      color: white;
      border: none;
      cursor: pointer;
    }
    .contact_section button:hover {
      background-color: #45a049;
    }
    .map_container {
      margin-top: 20px;
    }
  </style>
</head>
<body>

  <!-- info section -->
  <div class="info_section">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-10 ml-auto">
          <div class="row info_main-row">
            <div class="col-md-6 pr-0">

              <!-- contact section -->
              <section class="contact_section">
                <h2>Request A Call Back</h2>
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $name = htmlspecialchars($_POST['name']);
                    $phone = htmlspecialchars($_POST['phone']);
                    $email = htmlspecialchars($_POST['email']);
                    $message = htmlspecialchars($_POST['message']);
            
                    $to = "masilaisaacmim@example.com"; // Change this to your email address
                    $subject = "New Contact Request from $name";
                    $body = "Name: $name\nPhone: $phone\nEmail: $email\nMessage:\n$message";
                    $headers = "From: noreply@example.com"; // Change this to a valid sender email address
            
                    if (mail($to, $subject, $body, $headers)) {
                        echo "<p>Thank you, your message has been sent.</p>";
                    } else {
                        echo "<p>Sorry, there was an error sending your message. Please try again later.</p>";
                    }
                }
                ?>
                <form action="" method="POST">
                  <div>
                    <input type="text" name="name" placeholder="Name" required />
                  </div>
                  <div>
                    <input type="text" name="phone" placeholder="Phone Number" required />
                  </div>
                  <div>
                    <input type="email" name="email" placeholder="Email" required />
                  </div>
                  <div>
                    <input type="text" class="message-box" name="message" placeholder="Message" required />
                  </div>
                  <div class="d-flex ">
                    <button type="submit">SEND</button>
                  </div>
                </form>
                <div class="map_container">
                  <div class="map">
                    <div id="googleMap" style="width:100%;height:300px;"></div>
                  </div>
                </div>
              </section>
              <!-- end contact section -->

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Google Maps API -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY"></script>
  <script>
    function initMap() {
      var mapProp = {
        center: new google.maps.LatLng(51.508742, -0.120850),
        zoom: 5,
      };
      var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
    }
    google.maps.event.addDomListener(window, 'load', initMap);
  </script>
</body>
</html>
