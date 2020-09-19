<div class="row">
		<div class="col-md-9">
            <?php
            error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
            //tangkap request dari url/menu
            $hal = $_GET['hal'];
            //jika ada request
            //maka diarahkan ke halaman yg diminta
            if(!empty($hal)){
                include_once $hal.'.php';
            }
            else{
                include_once 'home.php';
            }
            ?>
		</div>