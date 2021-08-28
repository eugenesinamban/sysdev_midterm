<?php
class ImageRepository {
    private $image_dir = '/var/www/public/image/';
    public function upload_image($tmp_name, $image_name) {
        $pathinfo = pathinfo($image_name);
        $extension = $pathinfo['extension'];

        $image_filename = strval(time()) . bin2hex(random_bytes(25)) . '.' . $extension;
        $filepath =  $this->image_dir . $image_filename;
        move_uploaded_file($tmp_name, $filepath);
        return $image_filename;
    }
}
