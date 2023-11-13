<?php

class ErrorController
{
	function pageNotFound()
	{
		http_response_code(404);
		// echo '<h2>Page Not Found</h2>';
		echo '<div style="text-align: center;"><img src="/images/page_not_found.jpg" height="600px" width="600px"></div>';
	}
}

$router->set404('ErrorController@pageNotFound');
