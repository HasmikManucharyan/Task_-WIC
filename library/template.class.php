<?php
class Template {

/** Display Template **/

    function render($controller,$action,$data) {
		extract($data);

			if (file_exists(ROOT."/application/views/$controller/header.php")) {
				include (ROOT."/application/views/$controller/header.php");
			} else {
				include (ROOT."/application/views/header.php");
			}

        include (ROOT ."/application/views/$controller/$action.php");		 

			if (file_exists(ROOT."/application/views/$controller/footer.php")) {
				include (ROOT."/application/views/$controller/footer.php");
			} else {
				include (ROOT."/application/views/footer.php");
			}
    }

}
