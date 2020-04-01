<?php
/**
 * 
 */
class objectclass
{
	
	public function Navbar($value)
	{


		if ($value) {


			echo "

			<nav class='navbar navbar-inverse'>
  <div class='container-fluid'>
    <div class='navbar-header'>
      <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='#myNavbar'>
        <span class='icon-bar'></span>
        <span class='icon-bar'></span>
        <span class='icon-bar'></span>                        
      </button>
       <img src='img/coldiretti.png'>
    </div>
    <div class='collapse navbar-collapse' id='myNavbar'>
      <ul class='nav navbar-nav'>
        <li class='active'><a href='index.php'><b>Home</b></a></li>
        <li><a href='nuovoOrdine.php'><b> Nuovo Ordine </b></a></li>
        <li><a href='iMieiOrdini.php'><b> I miei ordini </b></a></li>
        <li><a href='contatti.php'><b> Contatti </b></a></li>
      </ul>
      <ul class='nav navbar-nav navbar-right'>
        <li><a href='php/logout.php'><span class='glyphicon glyphicon-log-in'></span><b> Logout </b></a></li>
      </ul>
    </div>
  </div>
  <img class='logo' src='img/logo.png'>
</nav>";
		}

		else
		{
echo "

			<nav class='navbar navbar-inverse'>
  <div class='container-fluid'>
    <div class='navbar-header'>
      <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='#myNavbar'>
        <span class='icon-bar'></span>
        <span class='icon-bar'></span>
        <span class='icon-bar'></span>                        
      </button>
       <img src='img/coldiretti.png'>
    </div>
    <div class='collapse navbar-collapse' id='myNavbar'>
      <ul class='nav navbar-nav'>
        <li class='active'><a href='index.php'><b>Home</b></a></li>
        <li><a href='contatti.php'><b> Contatti </b></a></li>
      </ul>
      <ul class='nav navbar-nav navbar-right'>
        <li><a href='loginform.php'><span class='glyphicon glyphicon-log-in'></span><b> Login </b></a></li>
      </ul>
    </div>
  </div>
  <img class='logo' src='img/logo.png'>
</nav>";
		}
	}
}

  ?>