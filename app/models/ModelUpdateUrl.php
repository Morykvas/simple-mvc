<?php 


class ModelUpdateUrl {
    public function setUrl($url) {
        $currentUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $urlSegments = explode('/', $currentUrl);
        $newUrlSegments = array_slice($urlSegments, 0, -2);
        $newController = $url; 
        $newUrl = implode('/', $newUrlSegments) . '/' . $newController;
        return  header("Location: $newUrl");
        exit();
    }
}