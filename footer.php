<?php
/*
 * Displays a footer with links and copyright info
 */
 
 function displayFooter()
 {
	 echo <<< END
<footer class="page-footer orange">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Company Bio</h5>
          <p class="grey-text text-lighten-4">Money can be exchanged for goods and services.</p>
        </div>
        <div class="col l3 s12">
          <ul>
          </ul>
        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Connect</h5>
          <ul>
            <li><a class="white-text" href="rateThisPage.php">RATE THIS PAGE!</a></li> 
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      &copy; 2016 Team 3
      </div>
    </div>
  </footer>
END;

 }
?>