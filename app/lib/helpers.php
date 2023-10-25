<?php
if (!function_exists("pre")) {
        function pre($var, $prefix = null)
        {
                echo $prefix ? "<h1>$prefix</h1>" : "";
                echo "<pre dir='ltr'>";
                var_dump($var);
                echo "</pre>";
        }
}
if (!function_exists("redirect")) {
        function redirect($path)
        {
                session_write_close();
                header("Location: $path");
                exit;
        }
}