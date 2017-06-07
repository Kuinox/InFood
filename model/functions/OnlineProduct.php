<?php
include_once(__DIR__."/../jsons/json_parse.php");
class OnlineProduct {
    private $_bdd;
    var $_barcode;
    var $_product;
    var $_images;
    var $_label = [];
    function __construct($bdd, $barcode) {
        $this->_bdd = $bdd;
        $this->_barcode = $barcode;
        $this->_product = $this->getProductObject($barcode);
        if (isset($this->_product['selected_images'])) {
            $this->_images = $this->_product['selected_images'];
        } else {
            $this->_images = false;
        }
        $labels = dataLabels();
        if (isset($labels["labels_tags"])) {
            foreach($this->_product["labels_tags"] as $value) {
                $this->_label[] = $labels[$value];
            }
        }
    }
    private function getProductObject($barcode) {
        $url  ="http://world.openfoodfacts.org/api/v0/product/$barcode.json";
        $ch = curl_init();
        if ($ch === false)
            throw new Exception('failed to initialize');
    	$timeout = 5;
    	curl_setopt($ch, CURLOPT_URL, $url);
    	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
    	$json = curl_exec($ch);
        if ($json === false)
            throw new Exception(curl_error($ch), curl_errno($ch));
    	curl_close($ch);
        $data = json_decode($json, true);
        if ($data['status'] === 0) {
            throw new Exception("Product not found on API");
        }
        return $data['product'];
    }
    function displayImage($image) {
        if(isset($this->_images[$image])) {
            echo "<img id='$image' src='".current($this->_images[$image]['display'])."'/>";
        }
    }
    function getLabel() {
        if (isset($this->_product['label'])) {
            return $this->_product['label'];
        } else {
            return "Aucun";
        }
    }

    function displayLabelImage() {
        foreach($this->_label as $label) {
            if(isset($label['image'])) {
                echo "<img class='label' src='".$label['image']."' />";
            }
        }
    }
}

?>
