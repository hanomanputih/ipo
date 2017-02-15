<?
function resize( $filename, $thumbfilename, $thumbWidth )
{

      $img = imagecreatefromjpeg($filename);
      $width = imagesx( $img );
      $height = imagesy( $img );

      // calculate thumbnail size
      $new_width = $thumbWidth;
      $new_height = floor( $height * ( $thumbWidth / $width ) );

      // create a new temporary image
      $tmp_img = imagecreatetruecolor( $new_width, $new_height );

      // copy and resize old image into new image
      imagecopyresized( $tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height );

      // save thumbnail into a file
      imagejpeg($tmp_img,  $thumbfilename);

      @$hapus = unlink($filename);

    }

// $namafile = 'images/fotoasisten/ajun.jpg';       // panggil nama file exist yang ingin kita olah jadi thumbnail
// $namathumbnail = 'images/th_ajun.jpg';  //nama file baru thumbnail
// $ukuran = '150';  // ukuran thumbnail, tergantung selera

// createThumbs($namafile,$namathumbnail,$ukuran);
?>
<!-- <img src="images/th_ajun.jpg"> -->
